<?php
    
    date_default_timezone_set("Asia/Jakarta");
    $tanggal = date('Y-m-d');//"2017-11-02";//date('Y-m-d');
    $jam = "17:50:01";//date('H:i:s');
    $username = $_SESSION['username'];
    $query = mysqli_query($GLOBALS["___mysqli_ston"], " SELECT * FROM user WHERE username='$username' ");
    $user = mysqli_fetch_array($query);
?>



<head>
    <title>Absen</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>

<body>

    <?php

        if(isset($_GET['action'])) {
            
            $nama = $user['nama'];
            $masuk = '08:00:00'; 

            if($jam>$masuk){
               $keterangan = 'Terlambat';
            } else {
                $keterangan = '-';
            }


            if($_GET['action']=='masuk') {
                
                // $data_absen = mysql_query(" SELECT * FROM master WHERE tanggal = '".$tanggal."'"); //select tanggal from master where username = username
                $data_absen = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM master WHERE  tanggal = '".$tanggal."' AND username = '".$username."' ");
                $absen = mysqli_fetch_array($data_absen);

                if($absen['tanggal']!=$tanggal) {
                    $query = mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO master(username,nama,tanggal,jam_masuk,status,keterangan) 
                        values('$username','$nama','$tanggal','$jam','0','$keterangan') ") or die (mysqli_error($GLOBALS["___mysqli_ston"]));
                           
                             echo " <div class='alert alert-success alert-dismissable fade in'>
                                    <a href='index.php?page=user/absence.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    <strong>Success</strong> Terimakasih anda Berhasil Mengabsen Datang.
                                    </div>";
                } else {
                           echo " <div class='alert alert-danger alert-dismissable fade in'>
                                  <a href='index.php?page=user/absence.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                  <strong>Failed</strong> Maaf anda Sudah Mengabsen Datang.
                                  </div>";

                }
            }

            if($_GET['action']=='pulang') {

                $data_absen = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM master WHERE tanggal = '".$tanggal."' AND username = '".$username."' ");
                $absen = mysqli_fetch_array($data_absen);

                if( $absen['status']=='0' ) { //$absen['jam_pulang']=='' AND $absen['tanggal']==$tanggal
                $query = mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE master SET jam_pulang='$jam',status='1' WHERE username='$username' AND tanggal='$tanggal'")or die (mysqli_error($GLOBALS["___mysqli_ston"]));
                           
                             echo " <div class='alert alert-success alert-dismissable fade in'>
                                    <a href='index.php?page=user/absence.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    <strong>Success </strong> Terimakasih anda Berhasil Mengabsen Pulang.
                                    </div>";
                } else {
                             echo " <div class='alert alert-danger alert-dismissable fade in'>
                                    <a href='index.php?page=user/absence.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    <strong>Failed </strong> Maaf anda Sudah Mengabsen Pulang.
                                    </div>";
                }   
            }
        }
    ?>
    <div class="jumbotron panel" style="height:520px">
        <center>
        <h2>"Sistem Absensi Anak Magang Telkom IS Operation Support Region 3" </h2>
            <br>

        </center>

        <form class="thead">
             <div class="col-md-4"></div>
             <div>
                    <table class= "well well-lg col col-md-4 ">       
                        <td><br>
                            <h5> Selamat datang <?php echo $user['nama'] ?> </h5> 
                            <h6>Silahkan mengabsen : </h6>

                            <?php
                                $pulang = '17:00:00';
                                if($jam<$pulang){
                                 echo  '<a class="btn btn-success" href="?page=user/absence.php&action=masuk">Absen Masuk</a><br><br>'; 
                                } else {
                                 echo  '<a class="btn btn-success" href="?page=user/absence.php&action=pulang">Absen Pulang</a><br><br>';
                                }

                                    echo  '<a class="btn btn-primary" href="?page=user/jurnal.php">Isi Jurnal Harian</a>'; 
                            ?>
                        <br><br><br>

                        </td>
                    </table>
              </div>
              <div class="col-md-4"></div>
        </form>
    </div>
</body>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

<body>

    <?php 
      require_once("config/koneksi.php");
      $username = $_GET['id'];
      $query_mysql = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user WHERE username='$username'")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
      while($user = mysqli_fetch_array($query_mysql)){
      ?>
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
      <form class="col col-md-6" >
         <h4>Nilai Untuk :</h4>
   	  <table  class= "panel panel-default table table-hover">

            <tr>
               <td>Username:</td>
               <td><?php echo $user['username'] ?></td>
            </tr>

            <tr>
               <td>Nama Lengkap:</td>
               <td><?php echo $user['nama'] ?></td>
            </tr>

            <tr>           
               <td>Alamat:</td>
               <td> <?php echo $user['alamat'] ?></td>
            </tr>

            <tr>
               <td>No Telepon/ HP :</td>
               <td><?php echo $user['tlp'] ?></td>
            </tr>
            
            <tr>
               <td>Asal Sekolah/Kampus :</td>
               <td><?php echo $user['asal'] ?></td>
            </tr>

            <tr>
               <td>Jurusan:</td>
               <td><?php echo $user['jurusan'] ?></td>
            </tr>

   	  </table>
      </form>

   <form class="col col-md-7" method = "post" action = "models/post_nilai.php">
      <h4>Silahkan Berikan Penilaian :</h4>
   <table class= "panel panel-default table table-hover">
   			
            <input type = "hidden" class="form-control" name = "username" value = "<?php echo $user['username'] ?>">
   			<tr>
                  <td>Kedisiplinan:</td>
                  <td><input type = "text" class="form-control" name = "disiplin">
                  </td>
               </tr>

   			<tr>
                  <td>Sopan Santun:</td>
                  <td><input type = "text" class="form-control" name = "sopan">
                  </td>
               </tr>

   			<tr>
                  <td>Kemampuan Kerja Personal:</td>
                  <td><input type = "text" class="form-control" name = "personal">
                  </td>
               </tr>

   			<tr>
                  <td>Kemampuan Kerja Tim:</td>
                  <td><input type = "text" class="form-control" name = "tim">
                  </td>
               </tr>

   			<tr>
                  <td>Kemampuan Beradaptasi:</td>
                  <td><input type = "text" class="form-control" name = "adaptasi">
                  </td>
               </tr>

   			<tr>
                  <td>Tanggung Jawab:</td>
                  <td><input type = "text" class="form-control" name = "tj">
                  </td>
               </tr>

   			<tr>
                  <td>Kejujuran:</td>
                  <td><input type = "text" class="form-control" name = "jujur">
                  </td>
               </tr>

               <td>
                  	<input type = "submit" class="btn btn-primary" name = "submit" value = "Submit Nilai"> 
               </td>
   			</tr>

   	<?php
   	}
   	?>
   </table>
      <?php 
         $url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : ''; 
      ?>
   <a class="btn btn-default" href="<?=$url?>">Back</a>
   </form>
   
   
   
       <script src="assets/js/jquery-3.2.1.min.js"></script>
       <script src="assets/js/bootstrap.min.js"></script>
</body>
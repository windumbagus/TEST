 <?php 
   require_once("config/koneksi.php");
   $username = $_GET['id'];
   $query_mysql = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user INNER JOIN nilai on user.username=nilai.username WHERE user.username='$username' ")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
   while($nilai = mysqli_fetch_array($query_mysql)){
   ?>
   <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<form class="col col-md-5" method = "post" action = "models/post_edit_nilai.php">
<h4>Nilai Untuk :</h4>
	<table  class= "panel panel-default table table-hover">
            <tr>
               <td>Username:</td>
               <td><?php echo $nilai['username'] ?></td>
            </tr>

            <tr>
               <td>Nama Lengkap:</td>
               <td><?php echo $nilai['nama'] ?></td>
            </tr>
	</table>

<table class= "panel panel-default table table-hover">

	<input type = "hidden" class="form-control" name = "username" value = "<?php echo $nilai['username'] ?>">
			
			
         <table  class= "panel panel-default table table-hover">


			<tr>
               <td>Kedisiplinan :</td>
               <td><?php echo $nilai['disiplin'] ?></td>
            </tr>

			<tr>
               <td>Sopan Santun :</td>
               <td><?php echo $nilai['sopan'] ?></td>
            </tr>

			<tr>
               <td>Kemampuan Kerja Personal :</td>
               <td> <?php echo $nilai['personal'] ?></td>
            </tr>

			<tr>
               <td>Kemampuan Kerja Tim :</td>
               <td><?php echo $nilai['tim'] ?></td>
            </tr>

			<tr>
               <td>Kemampuan Beradaptasi :</td>
               <td><?php echo $nilai['adaptasi'] ?></td>
            </tr>

			<tr>
               <td>Tanggung Jawab :</td>
               <td><?php echo $nilai['tj'] ?></td>
            </tr>

			<tr>
               <td>Kejujuran :</td>
               <td><?php echo $nilai['jujur'] ?></td>
            </tr>

            <tr>
            	<td>Nilai Akhir :</td>
            	<td><?php echo $nilai['n_akhir'] ?></td>
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


<!-- <html>
<head>
<meta charset="utf-8">
<title>View Absen</title>
</head>

<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<body>
	<table class= "panel panel-default table table-hover">
		<thead class="panel-heading-custom">
			<tr>
				<td>Username</td>
				<td>Kedisiplinan</td>
				<td>Sopan Santun</td>
				<td>Kemampuan Kerja Personal</td>
				<td>Kemampuan Kerja Tim</td>
				<td>Kemampuan Beradaptasi</td>
				<td>Tanggung Jawab:</td>
				<td>Kejujuran:</td>
				<td>Nilai Akhir</td>
			</tr>
		</thead>
		<tbody>
		<?php

			require_once("config/koneksi.php");

			$sql = mysqli_query($GLOBALS["___mysqli_ston"], " SELECT * FROM nilai");
			while ( $data = mysqli_fetch_array($sql) ){

		?>
			<tr>
				
				<td><?php echo $data['username']; ?></td>
				<td><?php echo $data['disiplin']; ?></td>
				<td><?php echo $data['sopan']; ?></td>
				<td><?php echo $data['personal']; ?></td>
				<td><?php echo $data['tim']; ?></td>
				<td><?php echo $data['adaptasi']; ?></td>
				<td><?php echo $data['tj']; ?></td>
				<td><?php echo $data['jujur']; ?></td>
				<td><?php echo $data['n_akhir']; ?></td>
			</tr>
		<?php

			}

		?>
		</tbody>
	</table>
<?php 
$url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : ''; 
?>
<a class="btn btn-default" href="<?=$url?>">Back</a>
</body>

    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</html> -->
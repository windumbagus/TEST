<title>Manage User</title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

<?php
	if (@$_GET['alert']=='success') {
			
  			echo " <div class='alert alert-success alert-dismissable fade in'>
			  			<a href='index.php?page=admin/manage_user.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    		<strong>Success </strong> Data Berhasil di Hapus.
			  		</div>";
	}else if (@$_GET['alert']=='update') {

		echo " <div class='alert alert-warning alert-dismissable fade in'>
			  			<a href='index.php?page=admin/manage_user.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    		<strong>Success </strong> Data Berhasil di Update.
			  		</div>";
	}else if (@$_GET['alert']=='failed') {

		echo " <div class='alert alert-danger alert-dismissable fade in'>
			  			<a href='index.php?page=admin/manage_user.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    		<strong>Failed </strong> Data Gagal di Update.
			  		</div>";
	}
?>
<table class= "panel panel-default table table-hover">
	<thead class=" thead panel-heading-custom">
		<tr>

			<td>Username</td>
			<td>password</td>
			<td>Nama Lengkap</td>
			<td>alamat</td>
			<td>No Telpon</td>
			<td>Asal Sekolah/Kampus</td>
			<td>Jurusan</td>
			<td>action</td>
		</tr>
	</thead>
	<tbody>
	<?php

		require_once("config/koneksi.php");

		$sql = mysqli_query($GLOBALS["___mysqli_ston"], " SELECT * FROM user WHERE opsi = 2 ");
		while ( $data = mysqli_fetch_array($sql) ){

	?>
		<tr>
			<td><?php echo $data['username']; ?></td>
			<td><?php echo $data['password']; ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td><?php echo $data['alamat']; ?></td>
			<td><?php echo $data['tlp']; ?></td>
			<td><?php echo $data['asal']; ?></td>
			<td><?php echo $data['jurusan']; ?></td>
			<td class="thead">
				<a class="btn btn-warning" href="index.php?page=admin/edituser.php&id=<?php echo $data['username']; ?>">Edit</a> 
				 <a class="btn btn-danger" href="models/delete.php?username=<?php echo $data['username']; ?>" onclick="return confirm('Apakah Anda yakin akan menghapus item ini ?');">Hapus</a>
			</td>
		</tr>
	<?php
	}
	?>
	</tbody>
</table>


<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<table  class= "panel panel-default table table-hover">
	<thead class="panel-heading-custom ">
		<tr>
			<td>Username</td>
			<td>password</td>
			<td>Nama Lengkap</td>
			<td>alamat</td>
			<td>No Telpon</td>
			<td>Asal Sekolah/Kampus</td>
			<td>Jurusan</td>
		</tr>
	</thead>
	<tbody class="panel-body">
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
		</tr>
	<?php

		}

	?>
	</tbody>
</table>

    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
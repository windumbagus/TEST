

<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<h4 class="thead">Laporan Hasil PKL / Magang di TELKOM Div. IS Center Regional 3</h4>
<form class="col col-md-7">
			<table  class= "panel panel-default table table-hover">
			<thead class="thead panel-heading-custom">
				<tr>
					<td>Username</td>
					<td>Nama Lengkap</td>
					<td>Action</td>
				</tr>
			</thead>
				<tbody>
					<?php
						require_once("config/koneksi.php");
						$sql = mysqli_query($GLOBALS["___mysqli_ston"], " SELECT * FROM user WHERE opsi = 2");
						while ( $data = mysqli_fetch_array($sql) ){
					?>
						<tr>
							<td><?php echo $data['username']; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td class="thead">
							<a class="btn btn-info" href="index.php?page=admin/view_laporan.php&id=<?php echo $data['username'];?>">View Laporan</a>
							<!-- <a class="btn btn-success glyphicon glyphicon-print" href="#"> Print</a>							 -->
							
							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
		</table>
</form>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
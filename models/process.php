<?php

//konek ke my sql
require_once("../config/koneksi.php");

//get value dari form login 
$username =$_POST['username'];
$password =$_POST['password'];

$result = mysqli_query($GLOBALS["___mysqli_ston"], " SELECT * FROM user WHERE username = BINARY '$username' AND password =BINARY '$password' ");


$cek = mysqli_num_rows($result);
$data = mysqli_fetch_array($result);

if($cek > 0) {
	
	session_start();

	if($data['opsi'] == '1'){

		$_SESSION['username'] = $data['username'];

		header('location:../index.php?page=admin/dashboard.php');

	} elseif ($data['opsi'] == '2') {

		$_SESSION['username'] = $data['username'];
		
		header('location:../index.php?page=user/absence.php');

	} 

} else {
echo " <script>window.location.href='../login.php?&alert=failed';</script> ";
}

?>


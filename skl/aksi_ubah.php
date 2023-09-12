<?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
include "koneksi.php";
if (isset($_POST['op']) && isset($_POST['np'])
	&& isset($_POST['c_np'])) {
	
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);

	if (empty($op)) {
		header("Location: ubah.php?error=Old Password required");
		exit();
	}elseif (empty($np)) {
		header("Location: ubah.php?error=New Password required");
		exit();
	}elseif ($np !== $c_np) {
		header("Location: ubah.php?error=The Confirmation password does not match");
		exit();
	}else{
		$op = md5($op);
		$np = md5($np);
		$id = $_SESSION['level'];

		$sql = "SELECT password 
				FROM user WHERE 
				level='$id' AND password='$op'";

		$result = mysqli_query($koneksi, $sql);

		if (mysqli_num_rows($result) === 1) {
			
			$sql_2 = "UPDATE user
						SET password='$np'
						WHERE level='$id'";
			mysqli_query($koneksi, $sql_2);
			header("Location: ubah.php?success=Your Password has been changed successfully");
			exit();
		}else {
			header("Location: ubah.php?error=Incorrect Password");
		exit();
		}
	}

} else {
	header("Location: ubah.php");
	exit();
}

?>

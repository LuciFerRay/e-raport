<?php 
require_once "koneksi.php";

$passwordlama = $_POST['passwordlama'];
$passwordbaru = $_POST['passwordbaru'];
$konfirmasipassword = $_POST['konfirmasipassword'];
$username = $_POST['username'];
$cekuser = "SELECT * FROM user WHERE username = '$username' and password = '$passwordlama'";
$querycekuser = mysql_query($cekuser);
$count = mysql_num_rows($querycekuser);
if ($count >= 1){
$updatepassword = "UPDATE user set password = '$passwordbaru' where username = '$username'";
$updatequery = mysqli_query($updatepassword);
if($updatequery)
{
"Password telah diganti menjadi $passwordbaru";

}

}

?>

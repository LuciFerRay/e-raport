<?php 
$koneksi = mysqli_connect("localhost","root","","data_login");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 //echo "Koneksi Berhasil";
?>
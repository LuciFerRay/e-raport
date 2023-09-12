<?php 
 
include 'koneksi.php';
 	$idkelas = $_POST["idkelas"];
    $kelas = $_POST["kelas"];
    $jurusan = $_POST["jurusan"];
    $angkatan = $_POST["angkatan"];
    $walikelas = $_POST["walikelas"];
 
mysqli_query($koneksi, "UPDATE kelas SET kelas='$kelas',
 jurusan='$jurusan', angkatan='$angkatan', walikelas='$walikelas'  WHERE idkelas='$idkelas'");
 
header("location:data_kelas.php?pesan=update");
?>
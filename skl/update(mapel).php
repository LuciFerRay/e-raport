<?php 
 
include 'koneksi.php';
 	$kodemp = $_POST["kodemp"];
    $matapelajaran = $_POST["matapelajaran"];
    $kelas = $_POST["kelas"];
    $pengampu = $_POST["pengampu"];
 
mysqli_query($koneksi, "UPDATE mapel SET matapelajaran='$matapelajaran', kelas='$kelas', pengampu='$pengampu',  WHERE kodemp='$kodemp'");
 
header("location:data_mapel.php?pesan=update");
?>
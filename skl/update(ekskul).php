<?php 
 
include 'koneksi.php';
 	$kodeeks = $_POST["kodeeks"];
    $ekstrakurikuler = $_POST["ekstrakurikuler"];
    $pembina = $_POST["pembina"];
    $nopembina = $_POST["nopembina"];
 
mysqli_query($koneksi, "UPDATE ekstrakurikuler SET ekstrakurikuler='$ekstrakurikuler',
 pembina='$pembina', nopembina='$nopembina',  WHERE kodeeks='$kodeeks'");
 
header("location:data_ekskul.php?pesan=update");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tampilan Awal</title>
	<link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="style(utama).css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="icon" href="jabon.png">
</head>
<body>
	<?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}

	?>
	<input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
    <header>Menu Pilihan</header>
    <img src="profil.png" class="profil_img" alt="" align="center">
    <p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
  <ul>
    <li><a href="ubah_siswa.php"><i class="fas fa-qrcode"></i>Ubah Password</a></li>
    <li><a href="data_siswa1.php"><i class="fas fa-link"></i>Data Siswa</a></li>
    <li><a href="data_mapel_siswa.php"><i class="fas fa-stream"></i>Data Mapel</a></li>
    <li><a href="data_nilai_siswa.php"><i class="fas fa-question-circle"></i>Data Nilai</a></li>
    <li><a href="data_presensi_siswa.php"><i class="fas fa-calendar-check"></i>Data Presensi</a></li>
    <li><a href="data_kelas_siswa.php"><i class="fas fa-sliders-h"></i>Data Kelas</a></li>
    <li><a href="data_ekskul_siswa.php"><i class="far fa-envelope"></i>Data Ekskul</a></li>
    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
  </ul>
</div>
 <section>
<div class="container-padding">
<div class="padding">
    <div class="content1">
    <p><b>SELAMAT DATANG</b></p><br>
    <p><b>DI SISTEM INFORMASI AKADEMIK SISWA</b></p><br>
    <p><b>SMKN 1 JABON</b></p>
    </div>
</div>
</div>
 </section>
</body>
</html>
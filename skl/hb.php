<!DOCTYPE html>
<html>
<head>
	<title>Tampilan Awal</title>
	<link rel="stylesheet" href="style1.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="icon" href="jabon.png">
</head>
<body>
	<?php 
	//session_start();

	// cek apakah yang mengakses halaman ini sudah login
	//if($_SESSION['level']==""){
		//header("location:index.php?pesan=gagal");
	//}

	?>
	<input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
    <header>Menu Pilihan</header>
    <img src="profil.png" class="profil_img" alt="">
    <p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
  <ul>
    <li><a href="#"><i class="fas fa-qrcode"></i>Ubah Password</a></li>
    <li><a href="#"><i class="fas fa-link"></i>Data Siswa</a></li>
    <li><a href="#"><i class="fas fa-stream"></i>Data Mapel</a></li>
    <li><a href="#"><i class="fas fa-question-circle"></i>Data Nilai</a></li>
    <li><a href="#"><i class="fas fa-calendar-check"></i>Data Presensi</a></li>
    <li><a href="#"><i class="fas fa-sliders-h"></i>Data Kelas</a></li>
    <li><a href="#"><i class="far fa-envelope"></i>Data Ekskul</a></li>
    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
  </ul>
</div>
 <section>
  <br>
  <br>
  <br>
  <br>
  <br>
   <p align="center" style="font-size: 30px; margin-top: 110px; color: white;"><b>SELAMAT DATANG</b></p>
   <p align="center" style="font-size: 30px; color: white;"><b>DI SISTEM INFORMASI AKADEMIK SISWA</b></p>
   <p align="center" style="font-size: 30px; color: white;"><b>SMKN 1 JABON</b></p>
 </section>
</body>
</html>
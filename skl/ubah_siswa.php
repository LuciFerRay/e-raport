<!DOCTYPE html>
<html>
<head>
	<title>Ganti Password</title>
	<link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="style(ubah).css">
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
    <img src="profil.png" class="profil_img" alt="">
     <p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
  <ul>
    <li><a href="ubah.php"><i class="fas fa-qrcode"></i>Ubah Password</a></li>
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
<form action="aksi_ubah.php" method="post">
<h2> Ubah Password</h2>
<?php if (isset($_GET['error'])) { ?>
  <p class="error"><?php echo $_GET['error'];?></p>
<?php }?>
<?php if (isset($_GET['success'])) { ?>
  <p class="success"><?php echo $_GET['success'];?></p>
<?php }?> 
<label>Old Password</label>
<input  type="password" 
        name="op" 
        placeholder="Old Password">


<label>New Password</label>
<input  type="password" 
        name="np" 
        placeholder="New Password">


<label>Confirm Password</label>
<input  type="password" 
        name="c_np" 
        placeholder="Confirm New Password">
        
  <button type="submit">Ubah</button>
  <br>
</form>
 </section>
</body>

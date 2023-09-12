<?php 
  error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Mapel</title>
	<link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="style(data_mapel).css">
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
<form action="" method="post">
<h2> Data Mapel</h2>
<label>Cari :</label>
  <input type="text" name="keyword" placeholder="Kode/mata Pelajaran" autocomplete="off">
  <input type="submit" name="cari" value="Cari"><br/>
<br>
  <table border="1" class="table">
    <tr>
      <th>Kode Mapel</th>
      <th>Mata Pelajaran</th>
      <th>Kelas</th>
      <th>Guru Pengajar</th>  
    </tr>
    <?php 
    include "koneksi.php";
    $query = $_POST['keyword'];
    if ($query !='') {
      $query_mysql = $koneksi->query("SELECT * FROM mapel WHERE 
                                      kodemp LIKE '%$query%' OR
                                      matapelajaran LIKE '%$query%' ");
    }else{
      $query_mysql = $koneksi->query("SELECT * FROM mapel")or die(mysql_error());
    }
    while($data = $query_mysql->fetch_assoc()): 
    ?>
    <tr>
      <td><?php echo $data['kodemp']; ?></td>
      <td><?php echo $data['matapelajaran']; ?></td>
      <td><?php echo $data['kelas']; ?></td>
      <td><?php echo $data['pengampu']; ?></td>
    </tr>
    <?php endwhile; ?>
  </table>
</form>
 </section>
</body>
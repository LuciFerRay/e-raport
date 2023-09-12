<!DOCTYPE html>
<html>
<head>
	<title>Data Siswa</title>
	<link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="style(data_siswa).css">
  <link rel="stylesheet" href="style(input_siswa).css">
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
    <li><a href="data_siswa.php"><i class="fas fa-link"></i>Data Siswa</a></li>
    <li><a href="data_mapel.php"><i class="fas fa-stream"></i>Data Mapel</a></li>
    <li><a href="data_nilai.php"><i class="fas fa-question-circle"></i>Data Nilai</a></li>
    <li><a href="data_presensi.php"><i class="fas fa-calendar-check"></i>Data Presensi</a></li>
    <li><a href="data_kelas.php"><i class="fas fa-sliders-h"></i>Data Kelas</a></li>
    <li><a href="data_eskul.php"><i class="far fa-envelope"></i>Data Ekskul</a></li>
    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
  </ul>
  </div>
 <section>
  <?php 
  include "koneksi.php";
    //cek apakah tombol submit sudah di tekan
  $nis = $_GET['edit'];
  $result = $koneksi->query("SELECT * FROM siswa WHERE nis='$nis'")or die(mysqli_error());
  if (isset($_POST["submit"])) {
    $nis = $_POST["nis"];
    $namasw = $_POST["namasw"];
    $ttlsw = $_POST["ttlsw"];
    $tgllahirsw = $_POST["tgllahirsw"];
    $alamatsw = $_POST["alamatsw"];
    $jenkelsw = $_POST["jenkelsw"];
    $agamasw = $_POST["agamasw"];
    $angkatan = $_POST["angkatan"];

    $query = "UPDATE siswa 
              SET
              namasw='$namasw', 
              tgllahirsw='$tgllahirsw', 
              ttlsw='$ttlsw', 
              alamatsw='$alamatsw', 
              jenkelsw='$jenkelsw', 
              agamasw='$agamasw', 
              angkatan='$angkatan' WHERE nis='$nis'
      ";

    mysqli_query($koneksi, $query);

    // cek apakah data berhasil di tambahkan atau tidak
    if (mysqli_affected_rows($koneksi)>0) {
      echo "
        <script>
        alert('Data Berhasil Diubah :');
        document.location.href = 'data_siswa.php';
        </script>
      ";
    }else{
      echo "
        <script>
        alert('Data Gagal Diubah : 'mysqli_error('$koneksi'));
        document.location.href = 'data_siswa.php';
        </script> 
        ";
    }

  }
  while($data = mysqli_fetch_array($result)){
   ?>
<form action="" method="post">
<h2> Edit Data Siswa</h2><br>
<ul>
  <li>
    <label for="nis">NIS : </label>
    <input type="hidden" name="nis" id="nis" value="<?php echo $data['nis']; ?>">
  </li>
  <li>
    <label for="namasw">Nama Siswa : </label>
    <input type="text" name="namasw" id="namasw" value="<?php echo $data['namasw']; ?>">
  </li>
  <li>
    <label for="ttlsw">Tempat Lahir Siswa : </label>
    <input type="text" name="ttlsw" id="ttlsw" value="<?php echo $data['ttlsw']; ?>">
  </li>
  <li>
    <label for="tgllahirsw">Tanggal Lahir Siswa :</label>
    <input type="text" name="tgllahirsw" id="tgllahirsw" value="<?php echo $data['tgllahirsw']; ?>">
  </li>
  <li>
    <label for="alamatsw">Kota Asal :</label>
    <input type="text" name="alamatsw" id="alamatsw" value="<?php echo $data['alamatsw']; ?>">
  </li>
  <li>
    <label for="jenkelsw">Jenis Kelamin :</label>
    <input type="text" name="jenkelsw" id="jenkelsw" value="<?php echo $data['jenkelsw']; ?>">
  </li>
  <li>
    <label for="agamasw">Agama :</label>
    <input type="text" name="agamasw" id="agamasw" value="<?php echo $data['agamasw']; ?>">
  </li>
  <li>
    <label for="angkatan">Angkatan :</label>
    <input type="text" name="angkatan" id="angkatan" value="<?php echo $data['angkatan']; ?>">
  </li>
  <li>
    <button type="submit" name="submit" class="submit">Ubah Data</button>
  </li>
</ul>
<?php } ?>
<br>
</form>
 </section>
</body>
</html>
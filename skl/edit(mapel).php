<!DOCTYPE html>
<html>
<head>
	<title>Data Mata Pelajaran</title>
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
    $kodemp = $_GET['edit'];
    $result = $koneksi->query("SELECT * FROM mapel WHERE kodemp='$kodemp'")or die(mysqli_error());
      if (isset($_POST["submit"])) {
    $kodemp = $_POST["kodemp"];
    $matapelajaran = $_POST["matapelajaran"];
    $kelas = $_POST["kelas"];
    $pengampu = $_POST["pengampu"];

    $query = "UPDATE mapel 
              SET 
              matapelajaran='$matapelajaran', kelas='$kelas', pengampu='$pengampu' WHERE kodemp='$kodemp'
      ";

    mysqli_query($koneksi, $query);

    // cek apakah data berhasil di tambahkan atau tidak
    if (mysqli_affected_rows($koneksi)>0) {
      echo "
        <script>
        alert('Data Berhasil Diubah :');
        document.location.href = 'data_mapel.php';
        </script>
      ";
    }else{
      echo "<script>
        alert('Data Gagal Diubah :'mysqli_error($koneksi));
        document.location.href = 'data_mapel.php';
        </script> 
        ";
    }

  }
    while($data = mysqli_fetch_array($result)){

   ?>
<form action="" method="post">
<h2> Ubah Data Mata Pelajaran</h2><br>
<ul>
  <li>
    <label for="kodemp">Kode Mapel :</label>
    <input type="hidden" name="kodemp" id="kodemp" value="<?php echo $data['kodemp']; ?>">
  </li>
  <li>
    <label for="matapelajaran">Mata Pelajaran :</label>
    <input type="text" name="matapelajaran" id="matapelajaran" value="<?php echo $data['matapelajaran']; ?>">
  </li>
  <li>
    <label for="kelas">Kelas :</label>
    <input type="text" name="kelas" id="kelas" value="<?php echo $data['kelas']; ?>">
  </li>
  <li>
    <label for="pengampu">Pengajar :</label>
    <input type="text" name="pengampu" id="pengampu" value="<?php echo $data['pengampu']; ?>">
  </li>
  <li>
    <button type="submit" name="submit" class="submit" >Ubah Data</button>
  </li>
</ul>
<?php } ?>
<br>
</form>
 </section>
</body>
</html>
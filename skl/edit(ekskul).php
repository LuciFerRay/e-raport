<!DOCTYPE html>
<html>
<head>
	<title>Data Ekstrakurikuler</title>
	<link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="style(data_ekskul).css">
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
    <li><a href="data_ekskul.php"><i class="far fa-envelope"></i>Data Ekskul</a></li>
    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
  </ul>
  </div>
 <section>
  <?php 
  include "koneksi.php";
    $kodeeks = $_GET['edit'];
    $result = $koneksi->query("SELECT * FROM ekstrakurikuler WHERE kodeeks='$kodeeks'")or die(mysqli_error());
      if (isset($_POST["submit"])) {
    $kodeeks = $_POST["kodeeks"];
    $ekstrakurikuler = $_POST["ekstrakurikuler"];
    $pembina = $_POST["pembina"];
    $nopembina = $_POST["nopembina"];

    $query = "UPDATE ekstrakurikuler 
              SET 
              ekstrakurikuler='$ekstrakurikuler', pembina='$pembina', nopembina='$nopembina' WHERE kodeeks='$kodeeks'
      ";

    mysqli_query($koneksi, $query);

    // cek apakah data berhasil di tambahkan atau tidak
    if (mysqli_affected_rows($koneksi)>0) {
      echo "
        <script>
        alert('Data Berhasil Diubah :');
        document.location.href = 'data_ekskul.php';
        </script>
      ";
    }else{
      echo "<script>
        alert('Data Gagal Diubah :'mysqli_error($koneksi));
        document.location.href = 'data_ekskul.php';
        </script> 
        ";
    }

  }
    while($data = mysqli_fetch_array($result)){

   ?>
<form action="" method="post">
<h2> Ubah Data Ekstrakurikuler</h2><br>
<ul>
  <li>
    <label for="kodeeks">Kode Ekstrakurikuler :</label>
    <input type="hidden" name="kodeeks" id="kodeeks" value="<?php echo $data['kodeeks']; ?>">
  </li>
  <li>
    <label for="ekstrakurikuler">Nama Ekstrakurikuler :</label>
    <input type="text" name="ekstrakurikuler" id="ekstrakurikuler" value="<?php echo $data['ekstrakurikuler']; ?>">
  </li>
  <li>
    <label for="pembina">Nama Pembina :</label>
    <input type="text" name="pembina" id="pembina" value="<?php echo $data['pembina']; ?>">
  </li>
  <li>
    <label for="pengampu">No Telepon :</label>
    <input type="text" name="nopembina" id="nopembina" value="<?php echo $data['nopembina']; ?>">
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
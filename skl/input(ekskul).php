<!DOCTYPE html>
<html>
<head>
	<title>Data Mata Pelajaran</title>
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
  $conn = mysqli_connect("localhost", "root", "", "data_login");
    //cek apakah tombol submit sudah di tekan
  if (isset($_POST["submit"])) {
    $kodeeks = htmlspecialchars($_POST["kodeeks"]);
    $ekstrakurikuler = htmlspecialchars($_POST["ekstrakurikuler"]);
    $pembina = htmlspecialchars($_POST["pembina"]);
    $nopembina = htmlspecialchars($_POST["nopembina"]);

    $query = "INSERT INTO ekstrakurikuler 
              VALUES 
              ('$kodeeks', '$ekstrakurikuler', '$pembina', '$nopembina')
      ";

    mysqli_query($conn, $query);

    // cek apakah data berhasil di tambahkan atau tidak
    if (mysqli_affected_rows($conn)>0) {
      echo "
        <script>
        alert('Data Berhasil Ditambahkan :');
        document.location.href = 'data_ekskul.php';
        </script>
      ";
    }else{
      echo "<script>
        alert('Data Gagal Ditambahkan :'mysqli_error($conn));
        document.location.href = 'data_ekskul.php';
        </script> 
        ";
    }

  }
   ?>
<form action="" method="post">
<h2> Tambah Data Ekstrakurikuler</h2><br>
<ul>
  <li>
    <label for="kodeeks">Kode Ekstrakurikuler :</label>
    <input type="text" name="kodeeks" id="kodeeks">
  </li>
  <li>
    <label for="ekstrakurikuler">Nama Ekstrakurikuler :</label>
    <input type="text" name="ekstrakurikuler" id="ekstrakurikuler">
  </li>
  <li>
    <label for="pembina">Nama Pembina :</label>
    <input type="text" name="pembina" id="pembina">
  </li>
  <li>
    <label for="nopembina">No Telepon :</label>
    <input type="text" name="nopembina" id="nopembina">
  </li>
  <li>
    <button type="submit" name="submit" class="submit">Tambah Data</button>
  </li>
</ul>
<br>
</form>
 </section>
</body>
</html>
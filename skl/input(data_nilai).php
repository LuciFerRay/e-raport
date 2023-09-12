<!DOCTYPE html>
<html>
<head>
	<title>Data Nilai</title>
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
  $conn = mysqli_connect("localhost", "root", "", "data_login");
    //cek apakah tombol submit sudah di tekan
  if (isset($_POST["submit"])) {
    $idnilai = htmlspecialchars($_POST["idnilai"]);
    $nis = htmlspecialchars($_POST["nis"]);
    $namasw = htmlspecialchars($_POST["namasw"]);
    $pengampu = htmlspecialchars($_POST["pengampu"]);
    $mapel = htmlspecialchars($_POST["mapel"]);
    $kkm = htmlspecialchars($_POST["kkm"]);
    $tugas = htmlspecialchars($_POST["tugas"]);
    $uts = htmlspecialchars($_POST["uts"]);
    $uas = htmlspecialchars($_POST["uas"]);
    $afektif = htmlspecialchars($_POST["afektif"]);
    $ekskul = htmlspecialchars($_POST["ekskul"]);

    $query = "INSERT INTO nilai 
              VALUES 
              ('$idnilai','$nis', '$namasw', '$pengampu', '$mapel', '$kkm', '$tugas', '$uts', '$uas', '$afektif', '$ekskul')
      ";

    mysqli_query($conn, $query);

    // cek apakah data berhasil di tambahkan atau tidak
    if (mysqli_affected_rows($conn)>0) {
      echo "
        <script>
        alert('Data Berhasil Ditambahkan :');
        document.location.href = 'data_nilai.php';
        </script>
      ";
    }else{
      echo "<script>
        alert('Data Gagal Ditambahkan :'mysqli_error($conn));
        document.location.href = 'data_nilai.php';
        </script> 
        ";
    }

  }
   ?>
<form action="" method="post">
<h2> Tambah Data Nilai</h2><br>
<ul>
  <li>
    <label for="idnilai">Id Nilai : </label>
    <input type="text" name="idnilai" id="idnilai">
  </li>
  <li>
    <label for="nis">NIS : </label>
    <input type="text" name="nis" id="nis">
  </li>
  <li>
    <label for="namasw">Nama Siswa : </label>
    <input type="text" name="namasw" id="namasw">
  </li>
  <li>
    <label for="pengampu">Pengajar : </label>
    <input type="text" name="pengampu" id="pengampu">
  </li>
  <li>
    <label for="mapel">Mata Pelajaran :</label>
    <input type="text" name="mapel" id="mapel" placeholder="mapel">
  </li>
  <li>
    <label for="kkm">KKM :</label>
    <input type="text" name="kkm" id="kkm">
  </li>
  <li>
    <label for="tugas">Tugas :</label>
    <input type="text" name="tugas" id="tugas">
  </li>
  <li>
    <label for="uts">UTS :</label>
    <input type="text" name="uts" id="uts">
  </li>
  <li>
    <label for="uas">UAS :</label>
    <input type="text" name="uas" id="uas">
  </li>
  <li>
    <label for="afektif">Afektif :</label>
    <input type="text" name="afektif" id="afektif">
  </li>
  <li>
    <label for="ekskul">Ekstrakulikuler :</label>
    <input type="text" name="ekskul" id="ekskul">
  </li>
  <li>
    <br><button type="submit" name="submit" class="submit">Tambah Data</button>
  </li>

</ul>
<br>
</form>
 </section>
</body>
</html>
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
  $idnilai = $_GET['edit'];
  $result = $conn->query("SELECT * FROM nilai WHERE idnilai='$idnilai'")or die(mysqli_error());
  if (isset($_POST["submit"])) {
    $idnilai = $_POST["idnilai"];
    $nis     = $_POST["nis"];
    $namasw  = $_POST["namasw"];
    $pengampu = $_POST["pengampu"];
    $mapel   = $_POST["mapel"];
    $kkm     = $_POST["kkm"];
    $tugas   = $_POST["tugas"];
    $uts     = $_POST["uts"];
    $uas     = $_POST["uas"];
    $afektif = $_POST["afektif"];
    $ekskul  = $_POST["ekskul"];

    $query = "UPDATE nilai 
              SET
              nis='$nis', namasw='$namasw', pengampu='$pengampu', mapel='$mapel', kkm='$kkm', tugas='$tugas', uts='$uts', uas='$uas', afektif='$afektif', ekskul='$ekskul' WHERE idnilai='$idnilai'
      ";

    mysqli_query($conn, $query);

    // cek apakah data berhasil di tambahkan atau tidak
    if (mysqli_affected_rows($conn)>0) {
      echo "
        <script>
        alert('Data Berhasil Diubah :');
        document.location.href = 'data_nilai.php';
        </script>
      ";
    }else{
      echo "<script>
        alert('Data Gagal Diubah :'mysqli_error($conn));
        document.location.href = 'data_nilai.php';
        </script> 
        ";
    }

  }
   while($data = mysqli_fetch_array($result)){
   ?>
<form action="" method="post">
<h2> Tambah Data Nilai</h2><br>
<ul>
  <li>
    <label for="idnilai">Id Nilai : </label>
    <input type="hidden" name="idnilai" id="idnilai" value="<?php echo $data['idnilai']; ?>">
  </li>
  <li>
    <label for="nis">NIS : </label>
    <input type="text" name="nis" id="nis" value="<?php echo $data['nis']; ?>">
  </li>
  <li>
    <label for="namasw">Nama Siswa : </label>
    <input type="text" name="namasw" id="namasw" value="<?php echo $data['namasw']; ?>">
  </li>
  <li>
    <label for="pengampu">Pengajar : </label>
    <input type="text" name="pengampu" id="pengampu" value="<?php echo $data['pengampu']; ?>">
  </li>
  <li>
    <label for="mapel">Mata Pelajaran :</label>
    <input type="text" name="mapel" id="mapel" placeholder="mapel" value="<?php echo $data['mapel']; ?>">
  </li>
  <li>
    <label for="kkm">KKM :</label>
    <input type="text" name="kkm" id="kkm" value="<?php echo $data['kkm']; ?>">
  </li>
  <li>
    <label for="tugas">Tugas :</label>
    <input type="text" name="tugas" id="tugas" value="<?php echo $data['tugas']; ?>">
  </li>
  <li>
    <label for="uts">UTS :</label>
    <input type="text" name="uts" id="uts" value="<?php echo $data['uts']; ?>">
  </li>
  <li>
    <label for="uas">UAS :</label>
    <input type="text" name="uas" id="uas" value="<?php echo $data['uas']; ?>">
  </li>
  <li>
    <label for="afektif">Afektif :</label>
    <input type="text" name="afektif" id="afektif" value="<?php echo $data['afektif']; ?>">
  </li>
  <li>
    <label for="ekskul">Ekstrakulikuler :</label>
    <input type="text" name="ekskul" id="ekskul" value="<?php echo $data['ekskul']; ?>">
  </li>
  <li>
    <br><button type="submit" name="submit" class="submit">Tambah Data</button>
  </li>
</ul>
<?php } ?>
<br>
</form>
 </section>
</body>
</html>
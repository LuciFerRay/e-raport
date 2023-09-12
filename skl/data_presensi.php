<?php 
  error_reporting(0);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Presensi</title>
	<link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style(data_presensi).css">
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
<form method="post">
<h2> Data Presensi</h2>
<label>Cari :</label>
	<input type="text" name="keyword" placeholder="NIS/Nama Siswa" autocomplete="off">
	<input type="submit" name="cari" value="Cari"><br/>
<?php 
  if(isset($_GET['pesan'])){
    $pesan = $_GET['pesan'];
    if($pesan == "input"){
      echo "Data berhasil di input.";
    }else if($pesan == "update"){
      echo "Data berhasil di update.";
    }else if($pesan == "hapus"){
      echo "Data berhasil di hapus.";
    }
  }
  ?>
  <button class="input"><a class="tombol" href="input(presensi).php">+ Tambah Data Baru</a></button>
  <br/><br/><br/>
  <table border="1" class="table">
    <tr>
	  <th>idPresensi</th>
      <th>NIS</th>
      <th>Nama</th>
      <th>Sakit</th>
      <th>Alpha</th>
	  <th>Izin</th>
      <th colspan="2">Opsi</th>   
    </tr>
    <?php 
    include "koneksi.php";
	$query = $_POST['keyword'];
	if ($query !='') {
        $query_mysql = $koneksi->query("SELECT * FROM presensi WHERE 
                                      idpresensi LIKE '%$query%' OR
                                      namasw LIKE '%$query%' ");
	}else{
		$query_mysql = $koneksi->query("SELECT * FROM presensi")or die(mysql_error());
	}
    while($data = $query_mysql->fetch_assoc()){
    ?>
    <tr>
	  <td><?php echo $data['idpresensi']; ?></td>
	  <td><?php echo $data['nis']; ?></td>
    <td><?php echo $data['namasw']; ?></td>
    <td><?php echo $data['sakit']; ?></td>
	  <td><?php echo $data['alpha']; ?></td>
	  <td><?php echo $data['izin']; ?></td>
      <td>
        <button class="edite"><a href="edit(presensi).php?edit=<?php echo $data['idpresensi']; ?>">Edit</a></button>
      </td>
      <td>
        <button class="delet"><a href="hapus(presensi).php?hapus=<?php echo $data['idpresensi']; ?>">Hapus</a></button>   
      </td>
    </tr>
    <?php } ?>
  </table>
  <br>
</form>
 </section>
</body>
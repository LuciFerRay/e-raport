<?php 
  error_reporting(0);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Siswa</title>
	<link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="style(data_siswa).css">
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
<form action="" method="post">
<h2> Data Siswa</h2>
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
  <button class="input"><a class="tombol" href="input(siswa).php">+ Tambah Data Baru</a></button>
  <br/><br/><br/>
  <table border="1" class="table">
    <tr>
      <th>No</th>
      <th>Nis</th>
      <th>Nama</th>
      <th colspan="2">Tempat Lahir</th>
      <th>alamat</th>
      <th>Jenis Kelamin</th>
      <th>Agama</th>
      <th>Angkatan</th>
      <th colspan="2">Opsi</th>   
    </tr>
    <?php 
    include "koneksi.php";
    $query = $_POST['keyword'];
    if ($query !='') {
      $query_mysql = $koneksi->query("SELECT * FROM siswa WHERE nis LIKE '%$query%' OR namasw LIKE '%$query%'");
    }else{
    $query_mysql = $koneksi->query("SELECT * FROM siswa")or die(mysql_error());
    }
    $nomor = 1;
    while($data = $query_mysql->fetch_assoc()){ 
    ?>
    <tr>
      <td><?php echo $nomor++; ?></td>
      <td><?php echo $data['nis']; ?></td>
      <td><?php echo $data['namasw']; ?></td>
      <td><?php echo $data['ttlsw']; ?></td>
      <td><?php echo $data['tgllahirsw']; ?></td>
      <td><?php echo $data['alamatsw']; ?></td>
      <td><?php echo $data['jenkelsw']; ?></td>
      <td><?php echo $data['agamasw']; ?></td>
      <td><?php echo $data['angkatan']; ?></td>
      <td>
        <button class="edite"><a href="edit(siswa).php?edit=<?php echo $data['nis']; ?>">Edit</a></button>
      </td>
      <td>
        <button class="delet"><a href="hapus(siswa).php?nis=<?php echo $data['nis']; ?>">Hapus</a></button>   
      </td>
    </tr>
    <?php } ?>
  </table>
</form>
 </section>
</body>

<?php 
    session_start();
    if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }
    $con = new PDO("mysql:host=localhost;dbname=data_login",'root','');
    if (isset($_POST["submit"])) {
      $str = $_POST["search"];
      $sth = $con->prepare("SELECT * FROM 'ekstrakurikuler' WHERE ekstrakurikuler = '$str'");

      $sth->setFetchMode(PDO:: FETCH_OBJ);
      $sth -> execute();

      if($row = $sth->fetch()){
        ?>
<head>
  <title>Data Ekstrakurikuler</title>
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="style(data_ekskul).css">
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
<h2> Data Ekstrakurikuler</h2>
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
  <label>Cari :</label>
  <input type="text" name="search" placeholder="Kode/Ekstrakurikuler">
  <input type="submit" name="submit" action="aksi_cari_ekskul.php">
  <button><a class="tombol" href="data_ekskul.php">view</a></button><br/>
  <button class="input"><a class="tombol" href="input(ekskul).php">+ Tambah Data Baru</a></button>
  <br/><br/><br/>
  <table border="1" class="table">
    <tr>
      <th>Kode Ekstrakurikuler</th>
      <th>Nama Ekstrakurikuler</th>
      <th>Nama Pembina</th>
      <th>No Telepon</th>
      <th colspan="2">Opsi</th>   
    </tr>
    <tr>
      <td><?php echo $data->kodeeks; ?></td>
      <td><?php echo $data->ekstrakurikuler; ?></td>
      <td><?php echo $data->pembina; ?></td>
      <td><?php echo $data->nopembina; ?></td>
      <td>
        <button class="edite"><a href="edit(ekskul).php?id=<?php echo $data->kodeeks; ?>">Edit</a></button>
      </td>
      <td>
        <button class="delet"><a href="hapus(ekskul).php?id=<?php echo $data->kodeeks; ?>">Hapus</a></button>   
      </td>
    </tr>

  </table>
</form>
 </section>
</body>
<?php
      }else {
        header("Location: data_ekskul.php?error=Data Tidak Ada");
    exit();
      }
    }
   ?>
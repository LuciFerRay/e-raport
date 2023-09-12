<?php 
$conn = mysqli_connect("localhost", "root", "", "data_login");
$conn->query("DELETE FROM presensi WHERE idpresensi='".$_GET['idpresensi']."'");
if ( mysqli_affected_rows($conn)>0) {
	echo "
        <script>
        alert('Data Berhasil Dihapus :');
        document.location.href = 'data_presensi.php';
        </script>
      ";
}else{
	echo "
        <script>
        alert('Data Gagal Dihapus :');
        document.location.href = 'data_presensi.php';
        </script>
      ";
	}



 ?>
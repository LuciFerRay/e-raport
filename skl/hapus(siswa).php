<?php 
$conn = mysqli_connect("localhost", "root", "", "data_login");
$conn->query("DELETE FROM siswa WHERE nis='".$_GET['nis']."'");
if ( mysqli_affected_rows($conn)>0) {
	echo "
        <script>
        alert('Data Berhasil Dihapus :');
        document.location.href = 'data_siswa.php';
        </script>
      ";
}else{
	echo "
        <script>
        alert('Data Gagal Dihapus :');
        document.location.href = 'data_siswa.php';
        </script>
      ";
	}
 ?>
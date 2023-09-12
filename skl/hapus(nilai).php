<?php 
$conn = mysqli_connect("localhost", "root", "", "data_login");
$conn->query("DELETE FROM nilai WHERE idnilai='".$_GET['hapus']."'");
if ( mysqli_affected_rows($conn)>0) {
	echo "
        <script>
        alert('Data Berhasil Dihapus :');
        document.location.href = 'data_nilai.php';
        </script>
      ";
}else{
	echo "
        <script>
        alert('Data Gagal Dihapus :');
        document.location.href = 'data_nilai.php';
        </script>
      ";
	}



 ?>
<?php 
   session_start();
   if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {   ?>
<!DOCTYPE html>
<html>
<head>
	<title>Web SMKN 1</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="icon" href="jabon.png">
</head>
<body background="web.png" style="background-repeat: no-repeat; background-position: center; background-size: cover;">
      <div class="container d-flex justify-content-center align-items-center"
      style="min-height: 100vh">
      	<form class="border shadow p-3 rounded"
      	      action="cek_login.php" 
      	      method="post" 
      	      style="width: 450px;background-color: white;">
      	      <table style="width:100%">
	 		<tr>
	 			<td style="width:70px">
	 				<div class="a">
	 					<img src="jabon.png" class="logo" width="70px" height="70px" />
	 				</div>
	 			</td>
	 			<td style="width:fit-content;">
	 					
	 			<div class="a">
	 			<p class="tulisan_login" align="center"><b> Selamat Datang</b></p>
	 			<p class="tulisan_login" align="center">Di Sistem Informasi Akademik Siswa</p>
	 			<p class="tulisan_login" align="center">SMKN 1 Jabon</p>
	 			</div>
	 			</td>
	 		</tr>
	 	</table>
      	      <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
		  <div class="mb-3">
		    <label for="username" 
		           class="form-label">Username :</label>
		    <input type="text" 
		           class="form-control" 
		           name="username" 
		           id="username">
		  </div>
		  <div class="mb-3">
		    <label for="password" 
		           class="form-label">Password :</label>
		    <input type="password" 
		           name="password" 
		           class="form-control" 
		           id="password">
		  </div>
		  <div class="mb-1">
		    <label class="form-label">Sebagai :</label>
		  </div>
		  <select class="form-select mb-3"
		          name="role" 
		          aria-label="Default select example">
			  <option selected value="user">Guru</option>
			  <option value="admin">Admin</option>
			  <option value="admin">Siswa</option>
		  </select>
		 
		  <button type="submit" 
		          class="btn btn-primary">LOGIN</button>
		</form>
      </div>
</body>
</html>
<?php }else{
	header("Location: index.php");
} ?>
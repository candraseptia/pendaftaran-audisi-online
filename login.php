<?php 
session_start();

if ( isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
}
require 'koneksi.php';

// cek apakah tombol login sudah di tekan apa belum
if ( isset($_POST["login"]) ) {
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	// apakah ada usrname di database yang sama degan username yang di inputkan saat login
	$result = mysqli_query($conn, "SELECT * FROM t_registrasi WHERE username = '$username'"); 

	// cek username
	if ( mysqli_num_rows($result) === 1 ) {
		// cek password
		$row = mysqli_fetch_assoc($result);
		if ( password_verify($password, $row["password"]) ) { //punction password_verify untuk mengecek sbuah string 	
            $_SESSION["login"] = true;						// sama atau tidak dengan password_hash 
			header('Location: index.php');
			exit;
		}
	}
	$error = true;
}

 ?>
 <?php require 'template/header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Form Login</h2>
        </div>
        <div class="card-body">
 	<?php if (isset($error) ) :?>
 		<p style="color: red; font-style: italic;">*username / password salah</p>
 	<?php endif; ?>
 	<form action="" class="form-horizontal" method="post">
 			<div class="form-group">
                <label for="username" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username" required>
                </div>
            </div>
 			<div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukan password" required>
                </div>
            </div>
             <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                <button type="submit" name="login" class="btn btn-success">Login</button>
                </div>
            </div><br>
            <p style="text-underline-position: center;"> Belum Punya Akun ?  <a href="registrasi.php">Regsitrasi</a></p>
 	      </form>
        </div>      
    </div>
</div>
<?php require 'template/footer.php'; ?>
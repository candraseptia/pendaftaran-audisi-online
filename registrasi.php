<?php 
require 'koneksi.php';
// cek apakah tombol register sudah di tekan apa belum
if ( isset($_POST["register"])) {
	
	if (registrasi($_POST) >0 ) {
		echo "<script>
				alert('Selamat anda berhasil registrasi!!!');
                document.location.href = 'login.php';
		</script>";
	} else{
		echo mysqli_error($conn);
	}
}
?>

 <?php require 'template/header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Form Registrasi Peserta</h2>
        </div>
    <div class="card-body">
 	<form action="" class="form-horizontal" method="post">
 			<div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama :</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan username" required>
                </div>
            </div>
 			<div class="form-group">
                <label for="username" class="col-sm-2 control-label">Username :</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username" required>
                </div>
            </div>
 			<div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email :</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email" required>
                </div>
            </div>
 			<div class="form-group">
                <label for="password" class="col-sm-2 control-label">Passwrd :</label>
                <div class="col-sm-4">
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukan password" required>
                </div>
            </div>
 			<div class="form-group">
                <label for="password2" class="col-sm-3 control-label">Konfiramsi Password :</label>
                <div class="col-sm-4">
                <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulang password" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                <button type="submit" name="register" class="btn btn-success">Registrasi</button>
                </div>
            </div>	
 	      </form>
        </div>
    </div>
</div>
<?php require 'template/footer.php'; ?>
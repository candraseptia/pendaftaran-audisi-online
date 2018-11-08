<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
require 'koneksi.php';


// cek apakan tomol submit sudah di tekan apa belum
if (isset($_POST["submit"])) {
	// cek apakah data berhasil di tambah atau tidak
	if ( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('Berhasil mendaftar!!!');
				document.location.href = 'index.php';
			</script>
		";		
	} else{
		echo "
			<script>
				alert('Gagal mendaftar!!!');
				document.location.href = 'index.php';
			</script>
		";		
	}
	
}

 ?>
<?php require 'template/header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Formulir Pendaftaran</h2>
        </div>
    <div class="card-body">
                
    <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
	<div class="form-group">
        <label for="nama" class="col-sm-2 control-label">Nama :</label>
        <div class="col-sm-4">
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama" required>
        </div>
    </div>
	<div class="form-group">
              <label for="jk" class="col-sm-2 control-label">Jenis Kelamin :</label>
              <div class="col-sm-4">
              <input type="text" class="form-control" id="jk" name="jk" placeholder="Masukan jk" required>
              </div>
          </div>
	<div class="form-group">
              <label for="alamat" class="col-sm-2 control-label">Alamat :</label>
              <div class="col-sm-4">
              <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan alamat" required>
              </div>
            </div>
	   <div class="form-group">
            <label for="kota" class="col-sm-2 control-label">Kota :</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="kota" name="kota" placeholder="Masukan kota" required>
            </div>
        </div>
	   <div class="form-group">
            <label for="prov" class="col-sm-2 control-label">Provinsi :</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="prov" name="prov" placeholder="Masukan prov" required>
            </div>
        </div>
	   <div class="form-group">
            <label for="status" class="col-sm-2 control-label">Status :</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="status" name="status" placeholder="Masukan status" required>
            </div>
        </div>
            <div class="form-group">
                <label for="agama" class="col-sm-2 control-label">Agama :</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="agama" name="agama" placeholder="Masukan agama" required>
                </div>
            </div>
			<div class="form-group">
                <label for="tlp" class="col-sm-2 control-label">No Tlp :</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="tlp" name="tlp" placeholder="Masukan tlp" required>
                </div>
            </div>
			<div class="form-group">
                <label for="foto" class="col-sm-2 control-label">Foto :</label>
                <div class="col-sm-4">
                <input type="file" id="foto" name="foto" placeholder="Masukan foto" required>
                </div>
            </div><br>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                <button type="submit" name="submit" class="btn btn-success">Daftar</button>
                </div>
            </div>
 	</form>
     </div>
    </div>
</div>
<?php require 'template/footer.php'; ?>
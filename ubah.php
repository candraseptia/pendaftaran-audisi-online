<?php 
require 'koneksi.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$peserta = query("SELECT * FROM t_peserta WHERE id = $id")[0];

// cek apakan tomol submit sudah di tekan apa belum
if (isset($_POST["submit"])) {
	// cek apakah data berhasil di ubah atau tidak
	if ( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah');
				document.location.href = 'index.php';
			</script>
		";		
	} else{
		echo "
			<script>
				alert('data gagal diubah');
				document.location.href = 'index.php';
			</script>
		";		
	}
	
}
// include_once('template/head.php');
 ?>
<?php require 'template/header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Form Ubah Peserta</h2>
        </div>
    <div class="card-body">
 	<form action="" class="form-vertical" method="post">
 		
 			<div class="form-group">
                <input type="hidden" name="id" required value="<?php echo $peserta["id"]; ?>">	
            </div>
 			<div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama :</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $peserta["nama"]; ?>" required>
                </div>
            </div>
 			<div class="form-group">
                <label for="jk" class="col-sm-2 control-label">Jenis Kelamin :</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="jk" name="jk" value="<?php echo $peserta["jk"]; ?>" required>
                </div>
 			<div class="form-group">
                <label for="alamat" class="col-sm-2 control-label">Alamat :</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $peserta["alamat"]; ?>" required>
                </div>
 			<div class="form-group">
                <label for="kota" class="col-sm-2 control-label">Kota :</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="kota" name="kota" value="<?php echo $peserta["kota"]; ?>" required>
                </div>
 			<div class="form-group">
                <label for="prov" class="col-sm-2 control-label">Provinsi :</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="prov" name="prov" value="<?php echo $peserta["prov"]; ?>" required>
                </div>
 			<div class="form-group">
                <label for="status" class="col-sm-2 control-label">Status :</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="status" name="status" value="<?php echo $peserta["status"]; ?>" required>
                </div>
 			<div class="form-group">
                <label for="agama" class="col-sm-2 control-label">Agama :</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="agama" name="agama" value="<?php echo $peserta["agama"]; ?>" required>
                </div>
 			<div class="form-group">
                <label for="tlp" class="col-sm-2 control-label">No Tlp :</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="tlp" name="tlp" value="<?php echo $peserta["tlp"]; ?>" required>
                </div>
 			<div class="form-group">
                <label for="foto" class="col-sm-2 control-label">Foto :</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="foto" name="foto" value="<?php echo $peserta["foto"]; ?>" required>
                </div>
             <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4"><br>
                <button type="submit" name="submit" class="btn btn-success">Ubah Peserta</button>
                </div>
            </div>
 	      </form>
        </div>
    </div>
</div>
<?php require 'template/footer.php'; ?>

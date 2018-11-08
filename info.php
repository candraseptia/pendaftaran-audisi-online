<?php 
require 'koneksi.php';
if (isset($_POST["submit"])) {
	// cek apakah data berhasil di tambah atau tidak
	if ( posting($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan');
				document.location.href = 'index.php';
			</script>
		";		
	} else{
		echo "
			<script>
				alert('data gagal ditambahkan');
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
            <h2>Tambah Informasi Audisi</h2>
        </div>
    <div class="card-body">
                
    <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
	<div class="form-group">
        <label for="judul" class="col-sm-2 control-label">Judul :</label>
        <div class="col-sm-4">
        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan judul" required>
        </div>
    </div>
	<div class="form-group">
        <label for="gambar" class="col-sm-2 control-label">Gambar :</label>
        <div class="col-sm-4">
        <input type="file" id="gambar" name="gambar" placeholder="Masukan gambar" required>
        </div>
    </div>
    <div class="form-group">
        <label for="isi" class="col-sm-2 control-label">Info :</label>
        <div class="col-sm-4">
        <textarea id="isi" id="gambar" name="isi" placeholder="tambah info" required></textarea>
        </div>
    </div>
    <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                <button type="submit" name="submit" class="btn btn-success">Posting</button>
                </div>
        </div>

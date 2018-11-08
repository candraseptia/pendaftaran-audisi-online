<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'koneksi.php';
$jumlahDataPerHalaman = 2;
$jumlahData = count(query("SELECT * FROM t_peserta"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

$peserta = query("SELECT * FROM t_peserta LIMIT $awalData,$jumlahDataPerHalaman");

if (isset($_POST["cari"])) {
	// mencari data peserta berdasarkan keyword yang di inputkan
	$peserta = cari($_POST["keyword"]);
}


 ?>

<?php require 'template/header.php'; ?>

<div class="container"><br>
	<div class="card mt-5">
		<div class="card-header">
			<h2>Daftar Peserta Audisi</h2>
		</div>
		<div class="card-body">
 	<table class="table table-bordered">
 		<tr>
 			<th>No</th>
 			<th>Foto</th>
 			<th>Nama Lengkap</th>
 			<th>Jenis Kelamin</th>
 			<th>Alamat</th>
 			<th>Kota</th>
 			<th>Provinsi</th>
 			<th>Status</th>
 			<th>Agama</th>
 			<th>No Tlp</th>
 			<th>Aksi</th>
 		</tr>
 		<?php $i=1; ?>
 		<?php foreach ($peserta as $row) : ?>
 		<tr>
 			<td><?php echo $i; ?></td>
 			<td><img src="img/<?php echo $row["foto"]; ?>" width="50"></td>
 			<td><?php echo $row["nama"]; ?></td>
 			<td><?php echo $row["jk"]; ?></td>
 			<td><?php echo $row["alamat"]; ?></td>
 			<td><?php echo $row["kota"]; ?></td>
 			<td><?php echo $row["prov"]; ?></td>
 			<td><?php echo $row["status"]; ?></td>
 			<td><?php echo $row["agama"]; ?></td>
 			<td><?php echo $row["tlp"]; ?></td>
 			<td>
 				<a href="ubah.php?id=<?php echo $row["id"]; ?>" <i class="fa fa-pencil">ubah</a> |
 				<a href="hapus.php?id=<?php echo$row["id"]; ?>"" onclick="return confirm('Yakin ingin menghapus!!!')" class="fa fa-trash">hapus</a>
 			</td>

 		</tr>
 		<?php $i++; ?>
 	<?php endforeach; ?>

 	</table>
 	</div>		
	</div><br>
	<?php if ( $halamanAktif > 1) : ?>
 		<a href="?halaman=<?php echo $halamanAktif -1; ?>">&lt</a>   
 		<!-- &laqou; -->
 	<?php endif; ?>

 	<?php for ($i=1; $i <= $jumlahHalaman ; $i++) : ?>
 		<?php if( $i == $halamanAktif) : ?>
 		<a href="?halaman=<?php echo $i; ?>" style="font-weight: bold; color: red;"><?php echo $i; ?></a>
 	<?php else : ?>
 		<a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
 	<?php endif; ?>
 	<?php endfor; ?>

 	<?php if ($halamanAktif < $jumlahHalaman ) : ?>
 		<a href="?halaman=<?php echo $halamanAktif + 1; ?>">&gt</a>
 		<!-- &raqou; -->
 	<?php endif; ?>
 	<p class="text-right"><a href="cetak.php" target="_blank" class="fa fa-print">Cetak Daftra Peserta</a></p>
</div>

<?php require 'template/footer.php'; ?>
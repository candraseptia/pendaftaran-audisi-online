<?php 
// koneksi ke database
// Urutanya -> mysqli_connect("hostname","username","password","nama database");
// 			   mysqli_connect("localhost","root"," ","phpdasar ");
$conn = mysqli_connect("localhost","root","","projectweb2");

function query($query){

	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data){
	global $conn;
	// cara mengatasi inputan sembarang -> htmlspecialchars
	$nama = htmlspecialchars($_POST["nama"]);
	$jk = htmlspecialchars($_POST["jk"]);
	$alamat = htmlspecialchars($_POST["alamat"]);
	$kota = htmlspecialchars($_POST["kota"]);
	$prov = htmlspecialchars($_POST["prov"]);
	$status = htmlspecialchars($_POST["status"]);
	$agama = htmlspecialchars($_POST["agama"]);
	$tlp = htmlspecialchars($_POST["tlp"]);
	$foto = upload();
	if (!$foto) {
		return false;
	}

	$query = "INSERT INTO t_peserta VALUES ('','$nama','$jk','$alamat','$kota','$prov','$status','$agama','$tlp','$foto')";

	mysqli_query($conn, $query); 

	return mysqli_affected_rows($conn); 
}
function posting($data){
	global $conn;
	// cara mengatasi inputan sembarang -> htmlspecialchars
	$judul = htmlspecialchars($_POST["judul"]);
	$gambar = upload();
	if (!$gambar) {
		return false;
	}
	$isi = htmlspecialchars($_POST["isi"]);

	$query = "INSERT INTO t_info VALUES ('','$judul','$gambar','$isi')";

	mysqli_query($conn, $query); 

	return mysqli_affected_rows($conn); 
}

function hapus($id){
	global $conn;
	mysqli_query($conn," DELETE FROM t_peserta WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;
	// cara mengatasi inputan sembarang -> htmlspecialchars
	$id = $data["id"];
	$nama = htmlspecialchars($_POST["nama"]);
	$jk = htmlspecialchars($_POST["jk"]);
	$alamat = htmlspecialchars($_POST["alamat"]);
	$kota = htmlspecialchars($_POST["kota"]);
	$prov = htmlspecialchars($_POST["prov"]);
	$status = htmlspecialchars($_POST["status"]);
	$agama = htmlspecialchars($_POST["agama"]);
	$tlp = htmlspecialchars($_POST["tlp"]);
	$foto = htmlspecialchars($_POST["foto"]);

	$query = "UPDATE t_peserta SET 
			  nama = '$nama',
			  jk = '$jk',
			  alamat = '$alamat',
			  kota = '$kota',
			  prov = '$prov',
			  status = '$status',
			  agama = '$agama',
			  tlp = '$tlp',
			  foto = '$foto'

			  WHERE id = $id

			  ";

	mysqli_query($conn, $query); 

	return mysqli_affected_rows($conn); 

}

function cari($keyword){
	$query = "SELECT * FROM t_peserta WHERE
			  nama LIKE '%$keyword%' OR
			  jk LIKE '%keyword%' OR
			  alamat LIKE '%keyword%' OR
			  kota LIKE '%keyword%' OR
			  prov LIKE '%keyword%' OR
			  status LIKE 'keyword' OR
			  tlp LIKE '%keyword%'
			  ";
	return query($query);
}

function upload(){
	
	$namaFile = $_FILES['foto']['name'];
	$ukuranFile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$temName = $_FILES['foto']['tmp_name'];

	// cek apakah tidak ada foto yang di upload
	if ($error === 4) {
		echo "<script>
				alert('pilih foto terlebih dahulu!!!')
			  </script>";
		return false;
	}
	// cek apakah yang di upload adalah foto
	$ektensiGambarValid = ['jpg','jpeg','png'];
	$ektensiGambar = explode('.', $namaFile);
	$ektensiGambar = strtolower(end($ektensiGambar)); // memaksa huruf besar menjadi huruf kecil
	if (!in_array($ektensiGambar, $ektensiGambarValid)) {
		echo "<script>
				alert('yang anda masukan bukan foto!!!')
			  </script>";
		return false;
	}

	// cek jika ukuran foto terlalu besar
	if ($ukuranFile > 3000000) {
		echo "<script>
				alert('ukuran foto teralu besar!!!')
			  </script>";
		return false;
	}
	// lolos pengecekan gambar, gambar siap di upload
	// generad nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ektensiGambar;


	move_uploaded_file($temName, 'img/' . $namaFileBaru );

	return $namaFileBaru;
}

function registrasi($data){
	global $conn;

	$nama = strtolower(stripcslashes($data["nama"]));
	$email = strtolower(stripcslashes($data["email"]));
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]); // berpungsi jika user memaskan password karakter
	$password2 = mysqli_real_escape_string($conn,$data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM t_registrasi WHERE username = '$username'");
	
	if (mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah ada!!!')
			  </script>";
		return false;
	}

	// cek konfirmasi password
	if ($password !== $password2) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!!!')
			  </script>";
		return false;
	}
	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	
	// tambahkan user aru ke database
	mysqli_query($conn, "INSERT INTO t_registrasi VALUES('','$nama','$email','$username','$password')");

	return mysqli_affected_rows($conn);
}

 ?>
<?php

require_once __DIR__ . '/vendor/autoload.php';
require 'koneksi.php';
$peserta = query("SELECT * FROM t_peserta");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
 <html>
 <head>
 	<title>Daftar Peserta Audisi</title>
 	<link rel="stylesheet" href="css/print.css">
 </head>
 <body>
 	<h1>Daftar Peserta Audisi</h1>
 	<table border="1" cellpadding="10" cellspacing="0">
 	<tr>
 		<th>No</th>
 		<th>Foto</th>
 		<th>Nama</th>
 		<th>Jenis Kelamin</th>
 		<th>Alamat</th>
 		<th>Kota</th>
 		<th>Provnsi</th>
 		<th>Status</th>
 		<th>Agama</th>
 		<th>No Tlp</th>
 	</tr>';

 	$i = 1;
 	foreach ($peserta as $row ) {
 		$html .='<tr>
 				<td>'. $i++ .'</td>
 				<td><img src="img/'. $row["foto"] .'" width="50"></td>
 				<td>'. $row["nama"] .'</td>
 				<td>'. $row["jk"] .'</td>
 				<td>'. $row["alamat"] .'</td>
 				<td>'. $row["kota"] .'</td>
 				<td>'. $row["prov"] .'</td>
 				<td>'. $row["status"] .'</td>
 				<td>'. $row["agama"] .'</td>
 				<td>'. $row["tlp"] .'</td>

 		</tr>';
 	}
$html .= '</table>
 </body>
 </html>';
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-peserta-audisi.pdf',\Mpdf\Output\Destination::INLINE);
?>
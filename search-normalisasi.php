<?php
	include "koneksi.php";
	
	$jenis = $_POST['jenis'];
	$search = $_POST['search-normalisasi'];
	if($jenis == "normalisasi"){
		header("location:normalisasi.php?cari=$search");
	}
?>
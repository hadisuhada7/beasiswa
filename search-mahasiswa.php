<?php
	include "koneksi.php";
	
	$jenis = $_POST['jenis'];
	$search = $_POST['search-mahasiswa'];
	if($jenis == "mahasiswa"){
		header("location:mahasiswa.php?cari=$search");
	}
?>
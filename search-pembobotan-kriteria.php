<?php
	include "koneksi.php";
	
	$jenis = $_POST['jenis'];
	$search = $_POST['search-pembobotan'];
	if($jenis == "pembobotan"){
		header("location:pembobotan-kriteria.php?cari=$search");
	}
?>
<?php
	include "koneksi.php";
	
	$jenis = $_POST['jenis'];
	$search = $_POST['search-kriteria'];
	if($jenis == "kriteria"){
		header("location:kriteria.php?cari=$search");
	}
?>
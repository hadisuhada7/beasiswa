<?php
	include "koneksi.php";
	
	$jenis = $_POST['jenis'];
	$search = $_POST['search-user'];
	if($jenis == "user"){
		header("location:user.php?cari=$search");
	}
?>
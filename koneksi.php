<?php
	$koneksi = mysql_connect('localhost','root','');
	if($koneksi){
		mysql_select_db('db_beasiswa');
	}else{
		echo "Koneksi Gagal";
	}
?>
<?php
	session_start();
	if(empty($_SESSION['username'])){
		header("location:form-login.php");
	}
?>

<?php
	include "koneksi.php";
	$username = $_POST['username'];
	$password = $_POST['password'];
	$level = $_POST['level'];
	$status = $_POST['status'];
	
	$query = mysql_query("SELECT max(id_admin) as id FROM tbl_admin ");
		while ($data = mysql_fetch_array($query)){
			$nilai = $data['id'];
			$nilai++;
			$angka = substr($nilai,-3);
		}
	$id = "USR" .sprintf("%03s", $angka);
	
	$daftar = date ('Y-m-d');
	
		if($status == "0"){
			$query = mysql_query("INSERT INTO tbl_admin (id_admin, username, password, level) VALUES ('$id', '$username', '$password', 
			'$level')");
		}else{
			$kode = $_POST['kode'];
			$query = mysql_query("UPDATE tbl_admin SET 
			username = '$username',
			password = '$password',
			level = '$level'
			WHERE id_admin = '$kode'");
		}
		
		if($query){
			echo'<META HTTP-EQUIV="Refresh" Content="0; URL=user.php">';exit;
		}else{
			echo mysql_error();
		}			
?>

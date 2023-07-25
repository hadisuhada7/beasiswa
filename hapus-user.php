<?php
	session_start();
	if(empty($_SESSION['username'])){
		header("location:form-login.php");
	}
?>

<?php
	include "koneksi.php";
	$kode = $_GET['kode'];
	
	if(isset($kode)){
		$query = mysql_query("DELETE FROM tbl_admin WHERE id_admin = '$kode'");
		if($query){
			echo'<META HTTP-EQUIV="Refresh" Content="0; URL=user.php">';exit;
		}else{
			echo mysql_error();
		}
	}else{
		echo'<META HTTP-EQUIV="Refresh" Content="0; URL=user.php">';exit;
	}
?>
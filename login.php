<?php
	session_start();
	include "koneksi.php";
	$username = $_POST['username']; 
	$password = $_POST['password'];
	
	$operator = $_GET['operator'];
	if($operator=="in"){
		$cek = mysql_query("SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'");
			if(mysql_num_rows($cek)==1){
				$c = mysql_fetch_array($cek);
				$_SESSION['username'] = $c['username'];
				$_SESSION['level'] = $c['level'];
				if($c['level']=="Admin"){
					header("location:halaman-admin.php");
				}else if($c['level']=="Kepala Bagian Akademik"){
					header("location:halaman-akademik.php");
				}else if($c['level']=="Rektor"){
					header("location:halaman-rektor.php");
				}
			}else{
				header("location:form-login.php");
			}
	}
	else if($operator=="out"){
		unset($_SESSION['username']);
		unset($_SESSION['level']);
		header("location:form-login.php");
	}
?>
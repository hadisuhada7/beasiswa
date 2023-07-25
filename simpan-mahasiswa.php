<?php
	session_start();
	if(empty($_SESSION['username'])){
		header("location:form-login.php");
	}
?>

<?php
	include "koneksi.php";
	$nim = $_POST['nim'];
	$nama = $_POST['nama_lengkap'];
	$program_studi = $_POST['program_studi'];
	$kelas = $_POST['kelas'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$agama = $_POST['agama'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['no_telepon'];
	$status = $_POST['status'];
	
	$daftar = date ('Y-m-d');
	
		if($status == "0"){
			$query = mysql_query("INSERT INTO tbl_mahasiswa (nim, nama_lengkap, program_studi, kelas, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, alamat, no_telepon) 
			VALUES ('$nim', '$nama', '$program_studi', '$kelas', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$agama', '$alamat', '$telepon')");
		}else{
			$kode = $_POST['kode'];
			$query = mysql_query("UPDATE tbl_mahasiswa SET 
			nama_lengkap = '$nama',
			program_studi = '$program_studi',
			kelas = '$kelas',
			tempat_lahir = '$tempat_lahir',
			tanggal_lahir = '$tanggal_lahir',
			jenis_kelamin = '$jenis_kelamin',
			agama = '$agama',
			alamat = '$alamat',
			no_telepon = '$telepon'
			WHERE nim = '$kode'");
		}
		
		if($query){
			echo'<META HTTP-EQUIV="Refresh" Content="0; URL=mahasiswa.php">';exit;
		}else{
			echo mysql_error();
		}			
?>

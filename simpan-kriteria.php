<?php
	session_start();
	if(empty($_SESSION['username'])){
		header("location:form-login.php");
	}
?>

<?php
	include "koneksi.php";
	$mahasiswa = $_POST['nim'];
	$penghasilan_ortu = $_POST['penghasilan_ortu'];
	$nilai_ipk = $_POST['nilai_ipk'];
	$semester = $_POST['semester'];
	$tanggungan_ortu = $_POST['tanggungan_ortu'];
	$saudara_kandung = $_POST['saudara_kandung'];
	$status = $_POST['status'];
	
	$query = mysql_query("SELECT max(id_kriteria) as id FROM tbl_kriteria ");
	while ($data = mysql_fetch_array($query)){
		$nilai = $data['id'];
		$nilai++;
		$angka = substr($nilai,-3);
	}
	$id = "KRT" .sprintf("%03s", $angka);

	$daftar = date ('Y-m-d');
	
		if($status == "0"){
			$query = mysql_query("INSERT INTO tbl_kriteria (id_kriteria, nim, penghasilan_ortu, nilai_ipk, semester, tanggungan_ortu, saudara_kandung) 
			VALUES ('$id', '$mahasiswa', '$penghasilan_ortu', '$nilai_ipk', '$semester', '$tanggungan_ortu', '$saudara_kandung')");
		}else{
			$kode = $_POST['kode'];
			$query = mysql_query("UPDATE tbl_kriteria SET 
			nim = '$mahasiswa',
			penghasilan_ortu = '$penghasilan_ortu',
			nilai_ipk = '$nilai_ipk',
			semester = '$semester',
			tanggungan_ortu = '$tanggungan_ortu',
			saudara_kandung = '$saudara_kandung'
			WHERE id_kriteria = '$kode'");
		}
		
		if($query){
			echo'<META HTTP-EQUIV="Refresh" Content="0; URL=kriteria.php">';exit;
		}else{
			echo mysql_error();
		}			
?>

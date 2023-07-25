<?php
	session_start();
	if(empty($_SESSION['username'])){
		header("location:form-login.php");
	}
?>

<?php
	include "koneksi.php";
	$kriteria = $_POST['id_kriteria'];

	$query = mysql_query("SELECT min(penghasilan_ortu) as minimal FROM tbl_kriteria")or die(mysql_error());
	while ($data = mysql_fetch_array($query)) {
		$n_penghasilan_ortu = $data['minimal'];
	}

	$query = mysql_query("SELECT penghasilan_ortu as id FROM tbl_kriteria WHERE id_kriteria = '$kriteria'")or die(mysql_error());
	while ($data = mysql_fetch_array($query)) {
		$penghasilan_ortu = $data['id'];
	}

	$hasil_penghasilan_ortu = $n_penghasilan_ortu/$penghasilan_ortu;

	$query = mysql_query("SELECT max(nilai_ipk) as maksimal FROM tbl_kriteria")or die(mysql_error());
	while ($data = mysql_fetch_array($query)) {
		$n_nilai_ipk = $data['maksimal'];
	}

	$query = mysql_query("SELECT nilai_ipk as id FROM tbl_kriteria WHERE id_kriteria = '$kriteria'")or die(mysql_error());
	while ($data = mysql_fetch_array($query)) {
		$nilai_ipk = $data['id'];
	}

	$hasil_nilai_ipk = $nilai_ipk/$n_nilai_ipk;

	$query = mysql_query("SELECT max(semester) as maksimal FROM tbl_kriteria")or die(mysql_error());
	while ($data = mysql_fetch_array($query)) {
		$n_semester = $data['maksimal'];
	}

	$query = mysql_query("SELECT semester as id FROM tbl_kriteria WHERE id_kriteria = '$kriteria'")or die(mysql_error());
	while ($data = mysql_fetch_array($query)) {
		$semester = $data['id'];
	}

	$hasil_semester = $semester/$n_semester;

	$query = mysql_query("SELECT max(tanggungan_ortu) as maksimal FROM tbl_kriteria")or die(mysql_error());
	while ($data = mysql_fetch_array($query)) {
		$n_tanggungan_ortu = $data['maksimal'];
	}

	$query = mysql_query("SELECT tanggungan_ortu as id FROM tbl_kriteria WHERE id_kriteria = '$kriteria'")or die(mysql_error());
	while ($data = mysql_fetch_array($query)) {
		$tanggungan_ortu = $data['id'];
	}

	$hasil_tanggungan_ortu = $tanggungan_ortu/$n_tanggungan_ortu;

	$query = mysql_query("SELECT max(saudara_kandung) as maksimal FROM tbl_kriteria")or die(mysql_error());
	while ($data = mysql_fetch_array($query)) {
		$n_saudara_kandung = $data['maksimal'];
	}

	$query = mysql_query("SELECT saudara_kandung as id FROM tbl_kriteria WHERE id_kriteria = '$kriteria'")or die(mysql_error());
	while ($data = mysql_fetch_array($query)) {
		$saudara_kandung = $data['id'];
	}

	$hasil_saudara_kandung = $saudara_kandung/$n_saudara_kandung;

	$status = $_POST['status'];
	
	$query = mysql_query("SELECT max(id_normalisasi) as id FROM tbl_normalisasi");
	while ($data = mysql_fetch_array($query)){
		$nilai = $data['id'];
		$nilai++;
		$angka = substr($nilai,-3);
	}
	$id = "NRM" .sprintf("%03s", $angka);

	$daftar = date ('Y-m-d');
	
		if($status == "0"){
			$query = mysql_query("INSERT INTO tbl_normalisasi (id_normalisasi, id_kriteria, n_penghasilan_ortu, n_nilai_ipk, n_semester, n_tanggungan_ortu, n_saudara_kandung) 
			VALUES ('$id', '$kriteria', '$hasil_penghasilan_ortu', '$hasil_nilai_ipk', '$hasil_semester', '$hasil_tanggungan_ortu', '$hasil_saudara_kandung')");
		}else{
			$kode = $_POST['kode'];
			$query = mysql_query("UPDATE tbl_normalisasi SET 
			id_kriteria = '$kriteria',
			n_penghasilan_ortu = '$hasil_penghasilan_ortu',
			n_nilai_ipk = '$hasil_nilai_ipk',
			n_semester = '$hasil_semester',
			n_tanggungan_ortu = '$hasil_tanggungan_ortu',
			n_saudara_kandung = '$hasil_saudara_kandung'
			WHERE id_normalisasi = '$kode'");
		}
		
		if($query){
			echo'<META HTTP-EQUIV="Refresh" Content="0; URL=normalisasi.php">';exit;
		}else{
			echo mysql_error();
		}			
?>

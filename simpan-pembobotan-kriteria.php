<?php
	session_start();
	if(empty($_SESSION['username'])){
		header("location:form-login.php");
	}
?>

<?php
	include "koneksi.php";
	$normalisasi = $_POST['id_normalisasi'];

	$query = mysql_query("SELECT n_penghasilan_ortu as id FROM tbl_normalisasi WHERE id_normalisasi = '$normalisasi'")or die(mysql_error());
	while ($data = mysql_fetch_array($query)) {
		$n_penghasilan_ortu = $data['id'];
	}

	$hasil_penghasilan_ortu = $n_penghasilan_ortu*25;

	$query = mysql_query("SELECT n_nilai_ipk as id FROM tbl_normalisasi WHERE id_normalisasi = '$normalisasi'")or die(mysql_error());
	while ($data = mysql_fetch_array($query)) {
		$n_nilai_ipk = $data['id'];
	}

	$hasil_nilai_ipk = $n_nilai_ipk*30;

	$query = mysql_query("SELECT n_semester as id FROM tbl_normalisasi WHERE id_normalisasi = '$normalisasi'")or die(mysql_error());
	while ($data = mysql_fetch_array($query)) {
		$n_semester = $data['id'];
	}

	$hasil_semester = $n_semester*20;

	$query = mysql_query("SELECT n_tanggungan_ortu as id FROM tbl_normalisasi WHERE id_normalisasi = '$normalisasi'")or die(mysql_error());
	while ($data = mysql_fetch_array($query)) {
		$n_tanggungan_ortu = $data['id'];
	}

	$hasil_tanggungan_ortu = $n_tanggungan_ortu*15;

	$query = mysql_query("SELECT n_saudara_kandung as id FROM tbl_normalisasi WHERE id_normalisasi = '$normalisasi'")or die(mysql_error());
	while ($data = mysql_fetch_array($query)) {
		$n_saudara_kandung = $data['id'];
	}

	$hasil_saudara_kandung = $n_saudara_kandung*10;

	$hasil_pembobotan = $hasil_penghasilan_ortu+$hasil_nilai_ipk+$hasil_semester+$hasil_tanggungan_ortu+$hasil_saudara_kandung;

	$status = $_POST['status'];
	
	$query = mysql_query("SELECT max(id_pembobotan) as id FROM tbl_pembobotan");
	while ($data = mysql_fetch_array($query)){
		$nilai = $data['id'];
		$nilai++;
		$angka = substr($nilai,-3);
	}
	$id = "PBN" .sprintf("%03s", $angka);

	$daftar = date ('Y-m-d');
	
		if($status == "0"){
			$query = mysql_query("INSERT INTO tbl_pembobotan (id_pembobotan, id_normalisasi, p_penghasilan_ortu, p_nilai_ipk, p_semester, p_tanggungan_ortu, p_saudara_kandung, hasil_pembobotan) 
			VALUES ('$id', '$normalisasi', '$hasil_penghasilan_ortu', '$hasil_nilai_ipk', '$hasil_semester', '$hasil_tanggungan_ortu', '$hasil_saudara_kandung', '$hasil_pembobotan')");
		}else{
			$kode = $_POST['kode'];
			$query = mysql_query("UPDATE tbl_pembobotan SET 
			id_normalisasi = '$normalisasi',
			p_penghasilan_ortu = '$hasil_penghasilan_ortu',
			p_nilai_ipk = '$hasil_nilai_ipk',
			p_semester = '$hasil_semester',
			p_tanggungan_ortu = '$hasil_tanggungan_ortu',
			p_saudara_kandung = '$hasil_saudara_kandung',
			hasil_pembobotan = '$hasil_pembobotan'
			WHERE id_pembobotan = '$kode'");
		}
		
		if($query){
			echo'<META HTTP-EQUIV="Refresh" Content="0; URL=pembobotan-kriteria.php">';exit;
		}else{
			echo mysql_error();
		}			
?>

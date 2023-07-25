<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
	session_start();
	if(empty($_SESSION['username'])){
		header("location:form-login.php");
	}
?>
<html>
	<head>
		<title> Hasil Seleksi </title>
		<meta charset='utf-8'>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel='shortcut icon' href='images/favicon.jpg'/>
		<link rel='stylesheet' type='text/css' href='css/style.css'/>
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="js/script.js"></script>
	</head>
<body>
	<div id='header-wrap'>
		<div id='header'>
			<div id='logo'>
				<img src='images/logo.png'/>
				<div class="admin"> Selamat Datang, <?php echo $_SESSION['username']; ?><br>
					<a href="#"> Lihat Website </a> | <a href="#"> Help </a> | <a href="logout.php"> Logout </a>
				</div>
			</div>
		</div>
	</div>
	<div id='menu-wrap'>
		<div id='menu-padding'>
			<div id='cssmenu'>
				<ul>
					<li><a href='halaman-admin.php'>Beranda</a></li>
					<li><a href='mahasiswa.php'>Mahasiswa</a></li>
					<li><a href='kriteria.php'>Kriteria</a></li>
					<li><a href='normalisasi.php'>Normalisasi</a></li>
					<li><a href='pembobotan-kriteria.php'>Pembobotan&nbsp;Kriteria</a></li>
					<li><a href='hasil-seleksi.php'>Hasil&nbsp;Seleksi</a></li>
					<li><a href='laporan.php'>Laporan</a></li>
					<li><a href='user.php'>Manajemen&nbsp;User</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id='main-wrap'>
		<div id='main-center'>
			<div id='head-main'>
				<span> Rincian Data Hasil Seleksi </span>
			</div>
			<div id='main'>
				<?php
				include "koneksi.php";
				$kode = $_GET['kode'];
				
				if(isset($kode)){
					$query = mysql_query("SELECT tbl_mahasiswa.nim, tbl_mahasiswa.nama_lengkap, tbl_mahasiswa.program_studi, tbl_mahasiswa.kelas, tbl_mahasiswa.tempat_lahir, tbl_mahasiswa.tanggal_lahir, tbl_mahasiswa.jenis_kelamin, tbl_mahasiswa.agama, tbl_mahasiswa.alamat, tbl_mahasiswa.no_telepon, tbl_kriteria.id_kriteria, tbl_kriteria.penghasilan_ortu, tbl_kriteria.nilai_ipk, tbl_kriteria.semester, tbl_kriteria.tanggungan_ortu, tbl_kriteria.saudara_kandung, tbl_normalisasi.id_normalisasi, tbl_normalisasi.n_penghasilan_ortu, tbl_normalisasi.n_nilai_ipk, tbl_normalisasi.n_semester, tbl_normalisasi.n_tanggungan_ortu, tbl_normalisasi.n_saudara_kandung, tbl_pembobotan.id_pembobotan, tbl_pembobotan.p_penghasilan_ortu, tbl_pembobotan.p_nilai_ipk, tbl_pembobotan.p_semester, tbl_pembobotan.p_penghasilan_ortu, tbl_pembobotan.p_saudara_kandung, tbl_pembobotan.p_tanggungan_ortu, tbl_pembobotan.hasil_pembobotan FROM tbl_mahasiswa, tbl_kriteria, tbl_normalisasi, tbl_pembobotan WHERE tbl_mahasiswa.nim=tbl_kriteria.nim AND tbl_kriteria.id_kriteria=tbl_normalisasi.id_kriteria AND tbl_normalisasi.id_normalisasi=tbl_pembobotan.id_normalisasi AND tbl_mahasiswa.nim = '$kode'");
					$row = mysql_fetch_array($query);
					if($query){
						?>
						<hr>
						<table>
							<tr><td align="center"><b> Data Mahasiswa </b></td></tr>
						</table>
						<hr>
						<table>
							<tr><td width="180px"><b> NIM </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[nim]"; ?> </td></tr>
							<tr><td width="180px"><b> Nama Lengkap </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[nama_lengkap]"; ?> </td></tr>
							<tr><td width="180px"><b> Program Studi </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[program_studi]"; ?> </td></tr>
							<tr><td width="180px"><b> Kelas </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[kelas]"; ?> </td></tr>
							<tr><td width="180px"><b> Tempat Lahir </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[tempat_lahir]"; ?> </td></tr>
							<tr><td width="180px"><b> Tanggal Lahir </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[tanggal_lahir]"; ?> </td></tr>
							<tr><td width="180px"><b> Jenis Kelamin </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[jenis_kelamin]"; ?> </td></tr>
							<tr><td width="180px"><b> Agama </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[agama]"; ?> </td></tr>
							<tr><td width="180px"><b> Alamat </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[alamat]"; ?> </td></tr>
							<tr><td width="180px"><b> No. Telepon </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[no_telepon]"; ?> </td></tr>
						</table>
						<br>
						<hr>
						<table>
							<tr><td align="center"><b> Data Kriteria </b></td></tr>
						</table>
						<hr>
						<table>
							<tr><td width="180px"><b> Id. Kriteria </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[id_kriteria]"; ?> </td></tr>
							<tr><td width="180px"><b> Penghasilan Orang Tua </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[penghasilan_ortu]"; ?> </td></tr>
							<tr><td width="180px"><b> Nilai IPK </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[nilai_ipk]"; ?> </td></tr>
							<tr><td width="180px"><b> Semester </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[semester]"; ?> </td></tr>
							<tr><td width="180px"><b> Tanggungan Orang Tua </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[tanggungan_ortu]"; ?> </td></tr>
							<tr><td width="180px"><b> Saudara Kandung </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[saudara_kandung]"; ?> </td></tr>
						</table>
						<br>
						<hr>
						<table>
							<tr><td align="center"><b> Data Normalisasi </b></td></tr>
						</table>
						<hr>
						<table>
							<tr><td width="180px"><b> Id. Normalisasi </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[id_normalisasi]"; ?> </td></tr>
							<tr><td width="180px"><b> Penghasilan Orang Tua </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[n_penghasilan_ortu]"; ?> </td></tr>
							<tr><td width="180px"><b> Nilai IPK </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[n_nilai_ipk]"; ?> </td></tr>
							<tr><td width="180px"><b> Semester </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[n_semester]"; ?> </td></tr>
							<tr><td width="180px"><b> Tanggungan Orang Tua </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[n_tanggungan_ortu]"; ?> </td></tr>
							<tr><td width="180px"><b> Saudara Kandung </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[n_saudara_kandung]"; ?> </td></tr>
						</table>
						<br>
						<hr>
						<table>
							<tr><td align="center"><b> Data Pembobotan Kriteria </b></td></tr>
						</table>
						<hr>
						<table>
							<tr><td width="180px"><b> Id. Pembobotan </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[id_pembobotan]"; ?> </td></tr>
							<tr><td width="180px"><b> Penghasilan Orang Tua </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[p_penghasilan_ortu]"; ?> </td></tr>
							<tr><td width="180px"><b> Nilai IPK </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[p_nilai_ipk]"; ?> </td></tr>
							<tr><td width="180px"><b> Semester </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[p_semester]"; ?> </td></tr>
							<tr><td width="180px"><b> Tanggungan Orang Tua </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[p_tanggungan_ortu]"; ?> </td></tr>
							<tr><td width="180px"><b> Saudara Kandung </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[p_saudara_kandung]"; ?> </td></tr>
						</table>
						<br>
						<hr>
						<table>
							<tr><td align="center"><b> Data Hasil Seleksi </b></td></tr>
						</table>
						<hr>
						<table>
							<tr><td width="180px"><b> Hasil Pembobotan Kriteria </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[hasil_pembobotan]"; ?> </td></tr>
						</table>
						<br>
						<?php
					}else{
						echo mysql_error();
					}
				}else{
					echo'<META HTTP-EQUIV="Refresh" Content="0; URL=hasil-seleksi.php">';exit;
				}
			?>
			<br>
			<form method=post>
				<center><input type=button class=button value=Kembali onclick=self.history.back()></center>
			</form>
			</div>
		</div>
	</div>
	<div id='footer'>
		<div id='footer-wrap'>
			<div class="cleaner_h20"></div>
				<div align="center">
					Copyright &copy; 2018 Hadi Suhada & Friends <br>
					All Rights Reserved.
				</div>
			<div class="cleaner_h30"></div>
		</div>
	</div>	
</body>
</html>
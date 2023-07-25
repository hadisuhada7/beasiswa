<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
	session_start();
	if(empty($_SESSION['username'])){
		header("location:form-login.php");
	}
?>
<html>
	<head>
		<title> Pembobotan Kriteria </title>
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
				<span> Rincian Data Pembobotan Kriteria </span>
			</div>
			<div id='main'>
				<?php
				include "koneksi.php";
				$kode = $_GET['kode'];
				
				if(isset($kode)){
					$query = mysql_query("SELECT * FROM tbl_pembobotan WHERE id_pembobotan = '$kode'");
					$row = mysql_fetch_array($query);
					if($query){
						?>
						<table>
							<tr><td width="180px"><b> Id. Pembobotan </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[id_pembobotan]"; ?> </td></tr>
							<tr><td width="180px"><b> Id. Normalisasi </b></td><td width="5px"> : </td>
							<td> <?php echo "<a href='detail-normalisasi.php?kode=".$row['id_normalisasi']."'>".$row['id_normalisasi']."</a>"; ?> </td></tr>
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
							<tr><td width="180px"><b> Hasil Pembobotan Kriteria </b></td><td width="5px"> : </td>
							<td> <?php echo "$row[hasil_pembobotan]"; ?> </td></tr>
						</table>
						<?php
					}else{
						echo mysql_error();
					}
				}else{
					echo'<META HTTP-EQUIV="Refresh" Content="0; URL=pembobotan-kriteria.php">';exit;
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
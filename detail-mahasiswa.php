<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
	session_start();
	if(empty($_SESSION['username'])){
		header("location:form-login.php");
	}
?>
<html>
	<head>
		<title> Mahasiswa </title>
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
				<span> Rincian Data Mahasiswa </span>
			</div>
			<div id='main'>
				<?php
				include "koneksi.php";
				$kode = $_GET['kode'];
				
				if(isset($kode)){
					$query = mysql_query("SELECT * FROM tbl_mahasiswa WHERE nim = '$kode'");
					$row = mysql_fetch_array($query);
					if($query){
						?>
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
						<?php
					}else{
						echo mysql_error();
					}
				}else{
					echo'<META HTTP-EQUIV="Refresh" Content="0; URL=mahasiswa.php">';exit;
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
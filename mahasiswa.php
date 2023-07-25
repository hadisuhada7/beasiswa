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
	</div>
	<div id='main-wrap'>
		<div id='main-center'>
			<div id='head-main'>
				<span> Data Mahasiswa </span>
			</div>
			<div id='main'>
				<form action="search-mahasiswa.php" method="post">
					<input type="text" class="search" name="search-mahasiswa" placeHolder="Search" required />
					<input type="hidden" name="jenis" value="mahasiswa">
					<input type="submit" class="button" value="Search">
					<a href="mahasiswa.php" class="button"> Kembali </a>
					<a href="form-mahasiswa.php" class="button"> Tambah </a>
				</form>
				<br>
				<table class="bordered">
					<thead>
						<tr>
							<th width="25px"> No. </th>
							<th> NIM </th>
							<th> Nama Lengkap </th>
							<th> Program Studi </th>
							<th> Kelas </th>
							<th> Jenis Kelamin </th>
							<th width="141px"> Aksi </th>
						</tr>
					</thead>
					<?php
						include "koneksi.php";
						$no_urut = 0;
						if(isset($_GET['cari'])){
							$search = $_GET['cari'];
							$query = mysql_query("SELECT * FROM tbl_mahasiswa WHERE nim LIKE '%$search%' OR nama_lengkap LIKE '%$search%' OR program_studi LIKE '%$search%' OR kelas LIKE '%$search%' OR jenis_kelamin LIKE '%$search%'");
							while($row = mysql_fetch_array($query)) {
								$no_urut++;
								echo "<tr> <td align=center>$no_urut</td>
										   <td align=center>".$row['nim']."</td>
										   <td>".$row['nama_lengkap']."</td>
										   <td>".$row['program_studi']."</td>
										   <td>".$row['kelas']."</td>
									       <td>".$row['jenis_kelamin']."</td>
									       <td align=center> 
												<a href='detail-mahasiswa.php?kode=".$row['nim']."'>Detail</a> |
												<a href='form-mahasiswa.php?kode=".$row['nim']."'>Ubah</a> |
												<a href='hapus-mahasiswa.php?kode=".$row['nim']."'>Hapus</a>
									       </td>
									 </tr>";
								}
						}else{
						$no_urut = 0;
						$query = mysql_query("SELECT * FROM tbl_mahasiswa");
						while($row = mysql_fetch_array($query)) {
							$no_urut++;
							echo "<tr> <td align=center>$no_urut</td>
									   <td align=center>".$row['nim']."</td>
									   <td>".$row['nama_lengkap']."</td>
									   <td>".$row['program_studi']."</td>
									   <td>".$row['kelas']."</td>
									   <td>".$row['jenis_kelamin']."</td>
									   <td align=center> 
											<a href='detail-mahasiswa.php?kode=".$row['nim']."'>Detail</a> |
											<a href='form-mahasiswa.php?kode=".$row['nim']."'>Ubah</a> |
											<a href='hapus-mahasiswa.php?kode=".$row['nim']."'>Hapus</a>
									   </td>
								 </tr>";
							}
						}
					?> 
				</table>
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
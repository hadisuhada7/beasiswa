<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
	session_start();
	if(empty($_SESSION['username'])){
		header("location:form-login.php");
	}
?>
<html>
	<head>
		<title> Kriteria </title>
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
					<li><a href='halaman-akademik.php'>Beranda</a></li>
					<li><a href='a-mahasiswa.php'>Mahasiswa</a></li>
					<li><a href='a-kriteria.php'>Kriteria</a></li>
					<li><a href='a-normalisasi.php'>Normalisasi</a></li>
					<li><a href='a-pembobotan-kriteria.php'>Pembobotan&nbsp;Kriteria</a></li>
					<li><a href='a-hasil-seleksi.php'>Hasil&nbsp;Seleksi</a></li>
					<li><a href='a-laporan.php'>Laporan</a></li>
				</ul>
			</div>
		</div>
	</div>
	</div>
	<div id='main-wrap'>
		<div id='main-center'>
			<div id='head-main'>
				<span> Data Kriteria </span>
			</div>
			<div id='main'>
				<form action="search-kriteria.php" method="post">
					<input type="text" class="search" name="search-kriteria" placeHolder="Search" required />
					<input type="hidden" name="jenis" value="kriteria">
					<input type="submit" class="button" value="Search">
					<a href="kriteria.php" class="button"> Kembali </a>
					<a href="form-kriteria.php" class="button"> Tambah </a>
				</form>
				<br>
				<table class="bordered">
					<thead>
						<tr>
							<th> Id. Kriteria </th>
							<th> NIM </th>
							<th> Penghasilan Orang Tua </th>
							<th> IPK </th>
							<th> Semester </th>
							<th> Tanggungan Orang Tua </th>
							<th> Saudara </th>
							<th width="141px"> Aksi </th>
						</tr>
					</thead>
					<?php
						include "koneksi.php";
						if(isset($_GET['cari'])){
							$search = $_GET['cari'];
							$query = mysql_query("SELECT * FROM tbl_kriteria WHERE nim LIKE '%$search%'");
							while($row = mysql_fetch_array($query)) {
								echo "<tr> <td align=center>".$row['id_kriteria']."</td>
										   <td><a href='detail-mahasiswa.php?kode=".$row['nim']."'>".$row['nim']."</a></td>
									       <td>".$row['penghasilan_ortu']."</td>
									       <td>".$row['nilai_ipk']."</td>
									       <td>".$row['semester']."</td>
									       <td>".$row['tanggungan_ortu']."</td>
									       <td>".$row['saudara_kandung']."</td>
									       <td align=center> 
												<a href='detail-kriteria.php?kode=".$row['id_kriteria']."'>Detail</a> |
												<a href='form-kriteria.php?kode=".$row['id_kriteria']."'>Ubah</a> |
												<a href='hapus-kriteria.php?kode=".$row['id_kriteria']."'>Hapus</a>
									       </td>
									 </tr>";
								}
						}else{
						$query = mysql_query("SELECT * FROM tbl_kriteria");
						while($row = mysql_fetch_array($query)) {
							echo "<tr> <td align=center>".$row['id_kriteria']."</td>
									   <td><a href='detail-mahasiswa.php?kode=".$row['nim']."'>".$row['nim']."</a></td>
									   <td>".$row['penghasilan_ortu']."</td>
									   <td>".$row['nilai_ipk']."</td>
									   <td>".$row['semester']."</td>
									   <td>".$row['tanggungan_ortu']."</td>
									   <td>".$row['saudara_kandung']."</td>
									   <td align=center> 
											<a href='detail-kriteria.php?kode=".$row['id_kriteria']."'>Detail</a> |
											<a href='form-kriteria.php?kode=".$row['id_kriteria']."'>Ubah</a> |
											<a href='hapus-kriteria.php?kode=".$row['id_kriteria']."'>Hapus</a>
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
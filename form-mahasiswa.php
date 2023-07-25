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
				<span> Formulir Data Mahasiswa </span>
			</div>
			<div id='main'>
				<form action="simpan-mahasiswa.php" method="post">
				<?php
					if(isset($_GET['kode'])){
						include "koneksi.php";
						$kode = $_GET['kode'];
						$query = mysql_query("SELECT * FROM tbl_mahasiswa WHERE nim = '$kode'");
						$row = mysql_fetch_array($query);
						?>
						<table>
							<tr>
								<td width="180px"><b> NIM </b></td><td><input type="text" class="pendek" name="kode" required 
								value="<?php echo $kode; ?>" readonly /></td>
							</tr>
							<tr> 
								<td><b> Nama Lengkap </b></td><td><input type="text" class="sedang" name="nama_lengkap" required 
								value="<?php echo $row['nama_lengkap']; ?>" /></td>
							</tr>
							<tr>
								<td><b> Program Studi </b></td>
								<td> <select name="program_studi">
										<option value='...'> ... </option>
										<option value="Teknik Informatika (S1)"> Teknik Informatika (S1) </option>
										<option value="Manajemen Informatika (D3)"> Manajemen Informatika (D3) </option>
										<option value="Komputerisasi Akuntansi (D3)"> Komputerisasi Akuntansi (D3) </option>
									</select>
								</td>
							</tr>
							<tr> 
								<td><b> Kelas </b></td><td><input type="text" class="sedang" name="kelas" required 
								value="<?php echo $row['kelas']; ?>" /></td>
							</tr>
							<tr> 
								<td><b> Tempat Lahir </b></td><td><input type="text" class="sedang" name="tempat_lahir" required 
								value="<?php echo $row['tempat_lahir']; ?>" /></td>
							</tr>
							<tr> 
								<td><b> Tanggal Lahir </b></td><td><input type="date" name="tanggal_lahir" required 
								value="<?php echo $row['tanggal_lahir']; ?>" /></td>
							</tr>
							<tr> 
								<td><b> Jenis Kelamin </b></td><td><input type="radio" name="jenis_kelamin" value="Perempuan"/> Perempuan 
								<input type="radio" name="jenis_kelamin" value="Laki-Laki"/> Laki-Laki </td>
							</tr>
							<tr>
								<td><b> Agama </b></td>
								<td> <select name="agama">
										<option value='...'> ... </option>
										<option value="Islam"> Islam </option>
										<option value="Kristen Protestan"> Kristen Protestan </option>
										<option value="Khatolik"> Khatolik </option>
										<option value="Hindu"> Hindu </option>
										<option value="Buddha"> Buddha </option>
										<option value="Kong Hu Cu"> Kong Hu Cu </option>
									</select>
								</td>
							</tr>
							<tr> 
								<td><b> Alamat </b></td><td><input type="text" class="panjang" name="alamat" required 
								value="<?php echo $row['alamat']; ?>" /></td>
							</tr>
							<tr> 
								<td><b> No. Telepon </b></td><td><input type="text" class="sedang" name="no_telepon" required 
								value="<?php echo $row['no_telepon']; ?>" /></td>
							</tr>
							<tr>
								<input type="hidden" name="status" value="1"/>
							</tr>
							<tr>
								<td></td>
								<td>	
									<input type="submit" class="button" value="Update"/>
									<input type="reset" class="button" value="Cancel"/>
									<input type=button class=button value=Kembali onclick=self.history.back()>
								</td>
							</tr>
						</table>
					<?php
					}else{
						?>
						<table>
							<tr>
								<td width="180px"><b> NIM </b></td>
								<td><input type="text" class="sedang" name="nim" required /></td>
							</tr>
							<tr>
								<td><b> Nama Lengkap </b></td>
								<td><input type="text" class="sedang" name="nama_lengkap" required /></td>
							</tr>
							<tr>
								<td><b> Program Studi </b></td>
								<td> <select name="program_studi">
										<option value='...'> ... </option>
										<option value="Teknik Informatika (S1)"> Teknik Informatika (S1) </option>
										<option value="Manajemen Informatika (D3)"> Manajemen Informatika (D3) </option>
										<option value="Komputerisasi Akuntansi (D3)"> Komputerisasi Akuntansi (D3) </option>
									</select>
								</td>
							</tr>
							<tr>
								<td><b> Kelas </b></td>
								<td><input type="text" class="sedang" name="kelas" required /></td>
							</tr>
							<tr>
								<td><b> Tempat Lahir </b></td>
								<td><input type="text" class="sedang" name="tempat_lahir" required /></td>
							</tr>
							<tr>
								<td><b> Tanggal Lahir </b></td>
								<td><input type="date" name="tanggal_lahir" required /></td> 
							</tr>
							<tr>
								<td><b> Jenis Kelamin </b></td><td><input type="radio" name="jenis_kelamin" value="Perempuan"/> Perempuan 
								<input type="radio" name="jenis_kelamin"  value="Laki-Laki"/> Laki-Laki </td>
							</tr>
							<tr>
								<td><b> Agama </b></td>
								<td> <select name="agama">
										<option value='...'> ... </option>
										<option value="Islam"> Islam </option>
										<option value="Kristen Protestan"> Kristen Protestan </option>
										<option value="Khatolik"> Khatolik </option>
										<option value="Hindu"> Hindu </option>
										<option value="Buddha"> Buddha </option>
										<option value="Kong Hu Cu"> Kong Hu Cu </option>
									</select>
								</td>
							</tr>
							<tr>
								<td><b> Alamat </b></td>
								<td><input type="text" class="panjang" name="alamat" required /></td> 
							</tr>
							<tr>
								<td><b> No. Telepon </b></td>
								<td><input type="text" class="sedang" name="no_telepon" required /></td> 
							</tr>
							<tr>
								<input type="hidden" name="status" value="0" />
							</tr>
							<tr>
								<td></td>
								<td>
									<input type="submit" class="button" value="Submit"/>
									<input type="reset" class="button" value="Cancel"/>
									<input type=button class=button value=Kembali onclick=self.history.back()>
								</td>
							</tr>
						</table>
					<?php
					}
				?>
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
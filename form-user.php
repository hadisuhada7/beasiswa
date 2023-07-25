<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
	session_start();
	if(empty($_SESSION['username'])){
		header("location:form-login.php");
	}
?>
<html>
	<head>
		<title> User </title>
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
				<span> Formulir Data User </span>
			</div>
			<div id='main'>
				<form action="simpan-user.php" method="post">
				<?php
					if(isset($_GET['kode'])){
						include "koneksi.php";
						$kode = $_GET['kode'];
						$query = mysql_query("SELECT * FROM tbl_admin WHERE id_admin = '$kode'");
						$row = mysql_fetch_array($query);
						?>
						<table>
							<tr>
								<td width="180px"><b> Id User </b></td><td><input type="text" class="pendek" name="kode" required 
								value="<?php echo $kode; ?>" readonly /></td>
							</tr>
							<tr> 
								<td><b> Username </b></td><td><input type="text" class="sedang" name="username" required 
								value="<?php echo $row['username']; ?>" /></td>
							</tr>
							<tr> 
								<td><b> Password </b></td><td><input type="password" class="sedang" name="password" required 
								value="<?php echo $row['password']; ?>" /></td>
							</tr>
							<tr>
								<td><b> Level </b></td>
								<td> <select name="level">
										<option value='...'> ... </option>
										<option value="Admin"> Admin </option>
										<option value="Kepala Bagian Akademik"> Kepala Bagian Akademik </option>
										<option value="Rektor"> Rektor </option>
									</select>
								</td>
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
								<td width="180px"><b> Username </b></td>
								<td><input type="text" class="sedang" name="username" required /></td>
							</tr>
							<tr>
								<td><b> Password </b></td>
								<td><input type="password" class="sedang" name="password" required /></td>
							</tr>
							<tr>
								<td><b> Level </b></td>
								<td> <select name="level">
										<option value='...'> ... </option>
										<option value="Admin"> Admin </option>
										<option value="Kepala Bagian Akademik"> Kepala Bagian Akademik </option>
										<option value="Rektor"> Rektor </option>
									</select>
								</td>
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
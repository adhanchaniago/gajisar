<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
</head>
<body>
<div class="container">
	<div class="header">
		<img class="header" src="images/head2.png">
	</div>
	<div class="mar">
		<marquee>Selamat Datang "<?php echo $uid; ?>" || Hari ini : <?php echo date("d / m / Y"); ?></marquee>
	</div>
	<div class="sidemenu">
		<div id="nav">
			<p align="center"><font size="+1"><b>MENU UTAMA :</b></font><hr></p>
			<ul>
				<li><a href="home.php">Beranda</a></li>
				<li><a href="team.php">Team</a></li>
				<br>
				<li><a href="in_gol.php">Input Golongan</a></li>
				<li><a href="in_gp.php">Input Gaji Pokok</a></li>
				<li><a href="in_jab.php">Input Jabatan</a></li>
				<li><a href="in_tunj.php">Input Tunjangan Kinerja</a></li>
				<li><a href="in_kary.php">Input Data Karyawan</a></li>
				<li><a href="#">Input Kehadiran</a></li>
				<br>
				<li><a href="view_kary.php">Lihat Data Karyawan</a></li>
				<li><a href="#">Lihat Gaji</a></li>
				<br>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
	<div class="content">
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Sistem Penilaian Kokurikulum Sekolah</title>
<link rel="shortcut icon" href="files/favicon.ico">
<link rel="stylesheet" type="text/css" href="files/style.css">
<script type="text/javascript" src="files/jawa.js"></script>
</head>

<body>
<table width="1000" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
    <table width="100%" border="0" cellpadding="5" cellspacing="0">
      <tr>
        <td align="right" bgcolor="#112F8A" class="tkmenu">Selamat Datang<?php if (isset($_SESSION['user'])) { echo " " . output1($tm['unama']); } ?>! | <?php echo date("d/m/Y"); ?> </td>
      </tr>
    </table>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center"><img src="files/banner.png" width="1000"></td>
      </tr>
    </table>
    <table width="100%" border="0" cellpadding="5" cellspacing="0">
      <tr>
        <td align="left" bgcolor="#5970B2" class="tkmenu">
			<ul id="sddm">
				<li><a href="index.php" onmouseover="mopen('m1')" onmouseout="mclosetime()">Utama</a></li>
                <?php
				//jika dah login
				if (isset($_SESSION['user'])) {
					?>
                    <li><a href="daftar.php?menu=senarai" onmouseover="mopen('m2')" onmouseout="mclosetime()">Daftar Kokurikulum</a></li>
                    <li><a href="markah.php?menu=senarai" onmouseover="mopen('m3')" onmouseout="mclosetime()">Markah Kokurikulum</a></li>
                    <li><a href="laporan.php?menu=senarai" onmouseover="mopen('m4')" onmouseout="mclosetime()">Laporan Penilaian</a></li>
                    <!-- <li><a href="kalendar.php" onmouseover="mopen('m5')" onmouseout="mclosetime()">Kalendar</a></li> -->
                <?php
				}
				?>
				<li><a href="manual.php" onmouseover="mopen('m6')" onmouseout="mclosetime()">Manual Pengguna</a></li>
                <?php
				if (isset($_SESSION['user'])) {
					//jika user adalah admin
					if ($tm['ulevel'] == 1) {
						?>
						<li>
							<a href="#" onmouseover="mopen('m7')" onmouseout="mclosetime()">Tetapan</a>
							<div id="m7" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
								<a href="tahun.php?menu=senarai">Senarai Tahun</a>
								<a href="kelas.php?menu=senarai">Senarai Kelas</a>
								<a href="kokurikulum.php?menu=senarai">Senarai Kokurikulum</a>
								<a href="guru.php?menu=senarai">Senarai Guru</a>
								<a href="pelajar.php?menu=senarai">Senarai Pelajar</a>
								<a href="sesi.php?menu=senarai">Sesi Persekolahan</a>
								<a href="info.php?menu=senarai">Senarai Pengumuman</a>
							</div>
						</li>
					<?php
					}
					?>
					<li><a href="profil.php?menu=logout" onmouseover="mopen('m8')" onmouseout="mclosetime()">Log Keluar</a></li>
                <?php
				}
				?>
			</ul>
        </td>
      </tr>
    </table>

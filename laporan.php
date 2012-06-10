<?php
if (!isset($_SESSION)) { session_start(); }
include('inc/conn.php');
include('inc/fungsi.php');
include('tmp/header.php');
//menu ini hanya bole diakses oleh pengguna sudah login sahaja
if (isset($_SESSION['user'])) {
	if (!empty($_GET['menu'])) {
		switch($_GET['menu']) {
			case "senarai":
				//jika admin, paparkan semua pelajar
				if ($tm['ulevel'] == 1) {
					include('tmp/laporan_koko1.php');
				}
				//jika guru biasa, paparkan murid kelas berkenaan sahaja
				else {
					include('tmp/laporan_koko2.php');
				}
				break;
	
			case "pelajar":
				if (!empty($_GET['id'])) {
					include('tmp/laporan_koko.php');
				}
				break;
	
			default:
				echo '<meta http-equiv="Refresh" content="0;url=index.php">';
				break;
		}
	}
	else {
		echo '<meta http-equiv="Refresh" content="0;url=index.php">';
	}
}
//jika belum login
else {
	echo '<meta http-equiv="Refresh" content="0;url=index.php">';
}
include('tmp/footer.php');
?>
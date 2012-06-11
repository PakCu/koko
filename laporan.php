<?php
if (!isset($_SESSION)) { session_start(); }
include('inc/conn.php');
include('inc/fungsi.php');
//menu ini hanya bole diakses oleh pengguna sudah login sahaja
if (isset($_SESSION['user'])) {
	if (!empty($_GET['menu'])) {
		switch($_GET['menu']) {
			case "senarai":
				include('tmp/header.php');
				//jika admin, paparkan semua pelajar
				if ($tm['ulevel'] == 1) {
					include('tmp/laporan_koko1.php');
				}
				//jika guru biasa, paparkan murid kelas berkenaan sahaja
				else {
					include('tmp/laporan_koko2.php');
				}
				include('tmp/footer.php');
				break;
	
			case "pelajar":
				if (!empty($_GET['id']) && is_numeric($_GET['id']) && strlen($_GET['id']) == 12) {
					include('tmp/laporan_pelajar.php');
				}
				break;
	
			default:
				include('tmp/header.php');
				echo '<meta http-equiv="Refresh" content="0;url=index.php">';
				include('tmp/footer.php');
				break;
		}
	}
	else {
		include('tmp/header.php');
		echo '<meta http-equiv="Refresh" content="0;url=index.php">';
		include('tmp/footer.php');
	}
}
//jika belum login
else {
	include('tmp/header.php');
	echo '<meta http-equiv="Refresh" content="0;url=index.php">';
	include('tmp/footer.php');
}
?>
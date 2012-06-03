<?php
if (!isset($_SESSION)) { session_start(); }
include('inc/conn.php');
include('inc/fungsi.php');
include('tmp/header.php');
//menu ini hanya bole diakses oleh admin sahaja
if (isset($_SESSION['user']) && $tm['ulevel'] == 1) {
	if (!empty($_GET['menu'])) {
		switch($_GET['menu']) {
			case "senarai":
				include('tmp/sesi_senarai.php');
				break;
	
			case "kelas":
				if (!empty($_POST['kelas'])) {
					include('inc/sesi_kelas.php');
				}
				else {
					include('tmp/sesi_kelas.php');
				}
				break;
	
			case "kemaskinikelas":
				if (!empty($_POST['tahun'])) {
					include('inc/sesi_kelas.php');
				}
				else {
					include('tmp/sesi_kelaskemaskini.php');
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
//jika belum login @ bukan admin
else {
	echo '<meta http-equiv="Refresh" content="0;url=index.php">';
}
include('tmp/footer.php');
?>
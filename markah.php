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
				include('tmp/markah_koko.php');
				break;
	
			case "kemaskini":
				if (!empty($_POST['id'])) {
					include('inc/markah_koko.php');
				}
				else {
					include('tmp/markah_kemaskini.php');
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
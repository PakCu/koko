<?php
if (!isset($_SESSION)) { session_start(); }
include('inc/conn.php');
include('inc/fungsi.php');
include('tmp/header.php');
//jika dah login
if (isset($_SESSION['user'])) {
	if (!empty($_GET['menu'])) {
		switch($_GET['menu']) {
			case "logout":
				include('inc/logout.php');
				break;
	
			case "daftar":
				if (!empty($_POST['nokp'])) {
					include('inc/profil_daftar.php');
				}
				else {
					include('tmp/profil_daftar.php');
				}
				break;
	
			case "maklumat":
				include('tmp/profail_maklumat.php');
				break;
	
			case "katalaluan":
				if (!empty($_POST['pass2'])) {
					include('inc/profail_pass.php');
				}
				else {
					include('tmp/profail_pass.php');
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
	if (!empty($_GET['menu'])) {
		switch($_GET['menu']) {
			case "login":
				include('inc/login.php');
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
include('tmp/footer.php');
?>
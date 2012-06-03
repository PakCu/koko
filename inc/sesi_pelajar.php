<?php
if (isset($_GET['di']) && is_numeric($_GET['di'])) {
	//dptkan id sesi kelas
	$sx = "SELECT * FROM sesipelajar 
		WHERE sidp = '" . input1($_GET['di']) . "'
		ORDER BY sidp ASC
	";
	$dx = mysql_query($sx);
	$tx = mysql_fetch_array($dx);
	//hapus maklumat sesi pelajar
	$s = "DELETE FROM sesipelajar 
		WHERE sidp = '" . input1($_GET['di']) . "'
	";
	mysql_query($s);
	?>
	<meta http-equiv="Refresh" content="2;url=sesi.php?menu=pelajar&id=<?php echo $tx['sidk']; ?>">
	<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
	<p>&nbsp;</p>
	<table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
	<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
		Maklumat sesi pelajar berjaya dihapuskan.
	</b></font><p>&nbsp;</p></td></tr></table>
	<p>&nbsp;</p>
	</td></tr></table>
<?php
}
else {
	//jika nilai no kp pelajar ada
	if (empty($_POST['nokp'])) {
		?>
		<meta http-equiv="Refresh" content="2;url=sesi.php?menu=senarai">
		<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
		<p>&nbsp;</p>
		<table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
		<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
			Sila masukkan no kad pengenalan pelajar.
		</b></font><p>&nbsp;</p></td></tr></table>
		<p>&nbsp;</p>
		</td></tr></table>
	<?php
	}
	else {
		//jika daftar baru
		if ($_POST['submit'] == "Hantar") {
			//semak samada sesi pelajar telah ada dalam database
			$s = "SELECT * FROM sesipelajar
				WHERE sidk = '" . input1($_POST['id']) . "'
				AND pnokp = '" . input1($_POST['nokp']) . "'
				ORDER BY pnokp ASC
			";
			$d = mysql_query($s);
			//jika ada
			if (mysql_num_rows($d) >= 1) {
				?>
				<meta http-equiv="Refresh" content="2;url=sesi.php?menu=pelajar&id=<?php echo $_POST['id']; ?>">
				<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
				<p>&nbsp;</p>
				<table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
				<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
					Maklumat pelajar telah didaftarkan.
				</b></font><p>&nbsp;</p></td></tr></table>
				<p>&nbsp;</p>
				</td></tr></table>
			<?php
			}
			//jika tiada
			else {
				//insert sesi pelajar baru dalam database
				$s = "INSERT INTO sesipelajar SET
					sidk = '" . input1($_POST['id']) . "',
					pnokp = '" . input1($_POST['nokp']) . "'
				";
				mysql_query($s);
				?>
				<meta http-equiv="Refresh" content="2;url=sesi.php?menu=pelajar&id=<?php echo $_POST['id']; ?>">
				<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
				<p>&nbsp;</p>
				<table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
				<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
					Maklumat sesi pelajar berjaya didaftarkan.
				</b></font><p>&nbsp;</p></td></tr></table>
				<p>&nbsp;</p>
				</td></tr></table>
			<?php
			}
		}
		else {
			?>
			<meta http-equiv="Refresh" content="0;url=sesi.php?menu=senarai">
			<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td height="400" align="center" valign="middle" bgcolor="#FFDFA3">
			<p>&nbsp;</p>
			<table border="1" width="450" align="center" cellspacing="1" cellpadding="10" bgcolor="#F1F3F5" bordercolor="#CCCCCC">
			<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>&nbsp;</b></font><p>&nbsp;</p></td></tr></table>
			<p>&nbsp;</p>
			</td></tr></table>
		<?php
		}
	}
}
?>
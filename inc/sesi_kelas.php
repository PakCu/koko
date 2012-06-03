<?php
//jika nilai kelas ada
if (empty($_POST['kelas'])) {
	?>
	<meta http-equiv="Refresh" content="2;url=sesi.php?menu=kelas">
	<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
    <p>&nbsp;</p>
    <table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
    <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
        Sila pilih maklumat kelas.
    </b></font><p>&nbsp;</p></td></tr></table>
    <p>&nbsp;</p>
    </td></tr></table>
<?php
}
else {
	//jika delete
	if ($_POST['submit'] == "Hapus" && !empty($_POST['id'])) {
		$s = "DELETE FROM sesikelas 
			WHERE sidk = '" . input1($_POST['id']) . "'
		";
		mysql_query($s);
		?>
		<meta http-equiv="Refresh" content="2;url=sesi.php?menu=senarai">
        <table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
        <p>&nbsp;</p>
        <table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
        <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
            Maklumat sesi kelas berjaya dihapuskan.
        </b></font><p>&nbsp;</p></td></tr></table>
        <p>&nbsp;</p>
        </td></tr></table>
	<?php
	}
	//jika kemaskini
	elseif ($_POST['submit'] == "Kemaskini") {
		//kemaskini kelas dalam database
		$s = "UPDATE sesikelas SET
			tahun = '" . input1($_POST['tahun']) . "',
			kid = '" . input1($_POST['kelas']) . "',
			unokp = '" . input1($_POST['guru']) . "'
			WHERE sidk = '" . input1($_POST['id']) . "'
		";
		mysql_query($s);
		?>
		<meta http-equiv="Refresh" content="2;url=sesi.php?menu=senarai">
		<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
		<p>&nbsp;</p>
		<table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
		<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
			Maklumat sesi kelas berjaya dikemaskini.
		</b></font><p>&nbsp;</p></td></tr></table>
		<p>&nbsp;</p>
		</td></tr></table>
	<?php
	}
	//jika daftar baru
	elseif ($_POST['submit'] == "Hantar") {
		//semak samada sesi kelas telah ada dalam database
		$s = "SELECT * FROM sesikelas
			WHERE tahun = '" . input1($_POST['tahun']) . "'
			AND kid = '" . input1($_POST['kelas']) . "'
			ORDER BY kid ASC
		";
		$d = mysql_query($s);
		//jika ada
		if (mysql_num_rows($d) >= 1) {
			?>
            <meta http-equiv="Refresh" content="2;url=sesi.php?menu=senarai">
            <table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
            <p>&nbsp;</p>
            <table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
            <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
                Maklumat sesi kelas telah didaftarkan.<br />Sila kemaskini maklumat sesi kelas.
            </b></font><p>&nbsp;</p></td></tr></table>
            <p>&nbsp;</p>
            </td></tr></table>
        <?php
		}
		//jika tiada
		else {
			//insert sesi kelas baru dalam database
			$s = "INSERT INTO sesikelas SET
				tahun = '" . input1($_POST['tahun']) . "',
				kid = '" . input1($_POST['kelas']) . "',
				unokp = '" . input1($_POST['guru']) . "'
			";
			mysql_query($s);
			?>
            <meta http-equiv="Refresh" content="2;url=sesi.php?menu=senarai">
            <table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
            <p>&nbsp;</p>
            <table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
            <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
                Maklumat sesi kelas berjaya didaftarkan.
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
?>
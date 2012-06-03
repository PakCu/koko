<?php
//jika nilai nokp dan nama ada
if (empty($_POST['nokp']) || empty($_POST['nama'])) {
	?>
	<meta http-equiv="Refresh" content="2;url=guru.php?menu=daftar">
	<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
    <p>&nbsp;</p>
    <table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
    <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
        Sila masukkan no kad pengenalan dan nama penuh.
    </b></font><p>&nbsp;</p></td></tr></table>
    <p>&nbsp;</p>
    </td></tr></table>
<?php
}
else {
	//jika delete
	if ($_POST['submit'] == "Hapus") {
		$s = "DELETE FROM user 
			WHERE uid = '" . input1($_POST['id']) . "'
		";
		mysql_query($s);
		?>
		<meta http-equiv="Refresh" content="2;url=guru.php?menu=senarai">
        <table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
        <p>&nbsp;</p>
        <table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
        <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
            Maklumat guru berjaya dihapuskan.
        </b></font><p>&nbsp;</p></td></tr></table>
        <p>&nbsp;</p>
        </td></tr></table>
	<?php
	}
	//jika kemaskini
	elseif ($_POST['submit'] == "Kemaskini") {
		//kemaskini guru dalam database
		$s = "UPDATE user SET
			ulevel = '" . input1($_POST['level']) . "',
			unama = '" . input1($_POST['nama']) . "',
			ujawatan = '" . input1($_POST['jawatan']) . "'
			WHERE uid = '" . input1($_POST['id']) . "'
		";
		mysql_query($s);
		?>
		<meta http-equiv="Refresh" content="2;url=guru.php?menu=senarai">
		<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
		<p>&nbsp;</p>
		<table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
		<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
			Maklumat guru berjaya dikemaskini.
		</b></font><p>&nbsp;</p></td></tr></table>
		<p>&nbsp;</p>
		</td></tr></table>
	<?php
	}
	//jika daftar baru
	elseif ($_POST['submit'] == "Hantar") {
		//semak samada guru telah ada dalam database
		$s = "SELECT * FROM user
			WHERE unokp = '" . input1($_POST['nokp']) . "'
			ORDER BY unokp ASC
		";
		$d = mysql_query($s);
		//jika ada
		if (mysql_num_rows($d) >= 1) {
			?>
            <meta http-equiv="Refresh" content="2;url=guru.php?menu=daftar">
            <table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
            <p>&nbsp;</p>
            <table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
            <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
                Maklumat guru telah didaftarkan.
            </b></font><p>&nbsp;</p></td></tr></table>
            <p>&nbsp;</p>
            </td></tr></table>
         <?php
		}
		//jika tiada
		else {
			//insert guru baru dalam database
			$s = "INSERT INTO user SET
				ulevel = '" . input1($_POST['level']) . "',
				unokp = '" . input1($_POST['nokp']) . "',
				upass = '" . input1($_POST['nokp']) . "',
				unama = '" . input1($_POST['nama']) . "',
				ujawatan = '" . input1($_POST['jawatan']) . "'
			";
			mysql_query($s);
			?>
            <meta http-equiv="Refresh" content="2;url=guru.php?menu=senarai">
            <table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
            <p>&nbsp;</p>
            <table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
            <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
                Maklumat guru berjaya didaftarkan.
            </b></font><p>&nbsp;</p></td></tr></table>
            <p>&nbsp;</p>
            </td></tr></table>
        <?php
		}
	}
	else {
		?>
        <meta http-equiv="Refresh" content="0;url=guru.php?menu=senarai">
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
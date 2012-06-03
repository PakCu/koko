<?php
//jika nilai nokp dan nama ada
if (empty($_POST['nokp']) || empty($_POST['nama'])) {
	?>
	<meta http-equiv="Refresh" content="2;url=pelajar.php?menu=daftar">
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
		$s = "DELETE FROM pelajar 
			WHERE pid = '" . input1($_POST['id']) . "'
		";
		mysql_query($s);
		?>
		<meta http-equiv="Refresh" content="2;url=pelajar.php?menu=senarai">
        <table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
        <p>&nbsp;</p>
        <table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
        <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
            Maklumat pelajar berjaya dihapuskan.
        </b></font><p>&nbsp;</p></td></tr></table>
        <p>&nbsp;</p>
        </td></tr></table>
	<?php
	}
	//jika kemaskini
	elseif ($_POST['submit'] == "Kemaskini") {
		//kemaskini pelajar dalam database
		$s = "UPDATE pelajar SET
			pnama = '" . input1($_POST['nama']) . "',
			pjantina = '" . input1($_POST['jantina']) . "',
			pnogiliran = '" . input1($_POST['giliran']) . "'
			WHERE pid = '" . input1($_POST['id']) . "'
		";
		mysql_query($s);
		?>
		<meta http-equiv="Refresh" content="2;url=pelajar.php?menu=senarai">
		<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
		<p>&nbsp;</p>
		<table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
		<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
			Maklumat pelajar berjaya dikemaskini.
		</b></font><p>&nbsp;</p></td></tr></table>
		<p>&nbsp;</p>
		</td></tr></table>
	<?php
	}
	//jika daftar baru
	elseif ($_POST['submit'] == "Hantar") {
		//semak samada pelajar telah ada dalam database
		$s = "SELECT * FROM pelajar
			WHERE pnokp = '" . input1($_POST['nokp']) . "'
			ORDER BY pnokp ASC
		";
		$d = mysql_query($s);
		//jika ada
		if (mysql_num_rows($d) >= 1) {
			?>
            <meta http-equiv="Refresh" content="2;url=pelajar.php?menu=daftar">
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
			//insert pelajar baru dalam database
			$s = "INSERT INTO pelajar SET
				pnokp = '" . input1($_POST['nokp']) . "',
				pnama = '" . input1($_POST['nama']) . "',
				pjantina = '" . input1($_POST['jantina']) . "',
				pnogiliran = '" . input1($_POST['giliran']) . "'
			";
			mysql_query($s);
			?>
            <meta http-equiv="Refresh" content="2;url=pelajar.php?menu=senarai">
            <table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
            <p>&nbsp;</p>
            <table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
            <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
                Maklumat pelajar berjaya didaftarkan.
            </b></font><p>&nbsp;</p></td></tr></table>
            <p>&nbsp;</p>
            </td></tr></table>
        <?php
		}
	}
	else {
		?>
        <meta http-equiv="Refresh" content="0;url=pelajar.php?menu=senarai">
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
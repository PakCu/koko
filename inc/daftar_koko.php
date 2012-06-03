<?php
//jika nilai id ada
if (empty($_POST['id'])) {
	?>
	<meta http-equiv="Refresh" content="0;url=daftar.php?menu=senarai">
	<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
    <p>&nbsp;</p>
    <table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
    <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
        &nbsp;
    </b></font><p>&nbsp;</p></td></tr></table>
    <p>&nbsp;</p>
    </td></tr></table>
<?php
}
else {
	//kemaskini maklumat koko dalam database
	$s = "UPDATE sesipelajar SET
		uniform = '" . input1($_POST['uniform']) . "',
		kelab = '" . input1($_POST['kelab']) . "',
		sukan = '" . input1($_POST['sukan']) . "'
		WHERE sidp = '" . input1($_POST['id']) . "'
	";
	mysql_query($s);
	?>
    <meta http-equiv="Refresh" content="2;url=daftar.php?menu=senarai">
	<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
	<p>&nbsp;</p>
	<table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
	<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
		Maklumat kokurikulum pelajar berjaya dikemaskini.
	</b></font><p>&nbsp;</p></td></tr></table>
	<p>&nbsp;</p>
	</td></tr></table>
<?php
}
?>
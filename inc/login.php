<?php
if (isset($_SESSION['user'])) {
	?>
	<meta http-equiv="Refresh" content="2;url=index.php">
	<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
    <p>&nbsp;</p>
    <table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
    <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
        Anda telah daftar masuk.<br />Anda akan dibawa ke halaman utama sebentar lagi.
    </b></font><p>&nbsp;</p></td></tr></table>
    <p>&nbsp;</p>
    </td></tr></table>
<?php
}
else {
	if (empty($_POST['nokp']) || empty($_POST['pass'])) {
		?>
		<meta http-equiv="Refresh" content="2;url=index.php">
        <table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
        <p>&nbsp;</p>
        <table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
        <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
            Sila masukkan No. Kad Pengenalan dan katalaluan yang betul.
        </b></font><p>&nbsp;</p></td></tr></table>
        <p>&nbsp;</p>
        </td></tr></table>
	<?php
	}
	else {
		$s = "SELECT * FROM user 
			WHERE unokp = '" . input1($_POST['nokp']) . "' 
			AND upass = '" . input2($_POST['pass']) . "'
		";
		$d = mysql_query($s);

		if (mysql_num_rows($d) == 1) {
			$t = mysql_fetch_array($d);
			$_SESSION['user'] = $t['unokp'];
			?>
			<meta http-equiv="Refresh" content="2;url=index.php">
            <table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
            <p>&nbsp;</p>
            <table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
            <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
				Selamat datang <?php echo ucwords(strtolower(output1($t['unama']))); ?> !!<br />Anda akan dibawa ke halaman utama sebentar lagi.            </b></font><p>&nbsp;</p></td></tr></table>
            <p>&nbsp;</p>
            </td></tr></table>
		<?php
		}
		else {
			?>
            <meta http-equiv="Refresh" content="2;url=index.php">
            <table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
            <p>&nbsp;</p>
            <table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
            <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
                Maaf !! Katalaluan anda salah.<br />Sila cuba sekali lagi.
            </b></font><p>&nbsp;</p></td></tr></table>
            <p>&nbsp;</p>
            </td></tr></table>
		<?php
		}
	}
}
?>
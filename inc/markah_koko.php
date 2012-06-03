<?php
//jika nilai id ada
if (empty($_POST['id'])) {
	?>
	<meta http-equiv="Refresh" content="0;url=markah.php?menu=senarai">
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
	$jawatan1 = explode("|",$_POST['jawatan1']);
	$jawatan1 = $jawatan1[0];
	$penglibatan1 = explode("|",$_POST['penglibatan1']);
	$penglibatan1 = $penglibatan1[0];
	$jawatan2 = explode("|",$_POST['jawatan2']);
	$jawatan2 = $jawatan2[0];
	$penglibatan2 = explode("|",$_POST['penglibatan2']);
	$penglibatan2 = $penglibatan2[0];
	$jawatan3 = explode("|",$_POST['jawatan3']);
	$jawatan3 = $jawatan3[0];
	$penglibatan3 = explode("|",$_POST['penglibatan3']);
	$penglibatan3 = $penglibatan3[0];
	
	//dptkan markah keseluruhan 2 terbaik
	if ($_POST['markah1'] > $_POST['markah2']) {
		if ($_POST['markah1'] > $_POST['markah3']) {
			if ($_POST['markah2'] > $_POST['markah3']) { $markah = $_POST['markah1'] + $_POST['markah2']; } //uniform + kelab
			else { $markah = $_POST['markah1'] + $_POST['markah3']; } //uniform + sukan
		}
		else { $markah = $_POST['markah3'] + $_POST['markah1']; } //sukan + uniform
	}
	else { // $x < $y
		if ($_POST['markah1'] > $_POST['markah3']) { $markah = $_POST['markah2'] + $_POST['markah1']; } //kelab + uniform
		else {
			if ($_POST['markah2'] > $_POST['markah3']) { $markah = $_POST['markah2'] + $_POST['markah3']; } //kelab + sukan
			else { $markah = $_POST['markah3'] + $_POST['markah2']; } //sukan + kelab
		}
	}
	$markah = $markah / 2;
	
	$s = "UPDATE sesipelajar SET
		jawatan1 = '" . input1($jawatan1) . "',
		jawat1 = '" . input1($_POST['jawat1']) . "',
		penglibatan1 = '" . input1($penglibatan1) . "',
		libat1 = '" . input1($_POST['libat1']) . "',
		pencapaian1 = '" . input1($_POST['pencapaian1']) . "',
		capai1 = '" . input1($_POST['capai1']) . "',
		hadir2 = '" . input1($_POST['hadir2']) . "',
		hadir3 = '" . input1($_POST['hadir3']) . "',
		markah1 = '" . input1($_POST['markah1']) . "',
		gred1 = '" . input1($_POST['gred1']) . "',
		
		jawatan2 = '" . input1($jawatan2) . "',
		jawat2 = '" . input1($_POST['jawat2']) . "',
		penglibatan2 = '" . input1($penglibatan2) . "',
		libat2 = '" . input1($_POST['libat2']) . "',
		pencapaian2 = '" . input1($_POST['pencapaian2']) . "',
		capai2 = '" . input1($_POST['capai2']) . "',
		hadir5 = '" . input1($_POST['hadir5']) . "',
		hadir6 = '" . input1($_POST['hadir6']) . "',
		markah2 = '" . input1($_POST['markah2']) . "',
		gred2 = '" . input1($_POST['gred2']) . "',
		
		jawatan3 = '" . input1($jawatan3) . "',
		jawat3 = '" . input1($_POST['jawat3']) . "',
		penglibatan3 = '" . input1($penglibatan3) . "',
		libat3 = '" . input1($_POST['libat3']) . "',
		pencapaian3 = '" . input1($_POST['pencapaian3']) . "',
		capai3 = '" . input1($_POST['capai3']) . "',
		hadir8 = '" . input1($_POST['hadir8']) . "',
		hadir9 = '" . input1($_POST['hadir9']) . "',
		markah3 = '" . input1($_POST['markah3']) . "',
		gred3 = '" . input1($_POST['gred3']) . "',
		
		markah = '" . input1($markah) . "',
		gred = '" . input1(gred($markah)) . "'
		
		WHERE sidp = '" . input1($_POST['id']) . "'
	";
	mysql_query($s);
	?>
    <meta http-equiv="Refresh" content="2;url=markah.php?menu=senarai">
	<table width="100%" cellspacing="0" cellpadding="2" border="0"><tr><td height="250" align="center" valign="middle">
	<p>&nbsp;</p>
	<table border="1" width="450" align="center" cellspacing="0" cellpadding="10" class="table2">
	<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
		Markah kokurikulum pelajar berjaya dikemaskini.
	</b></font><p>&nbsp;</p></td></tr></table>
	<p>&nbsp;</p>
	</td></tr></table>
<?php
}
?>
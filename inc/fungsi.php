<?php
//security input
function semakSlash($input) {
	if(!get_magic_quotes_gpc()) {
		$input = mysql_real_escape_string($input);
	}
	return $input;
}

//semua input huruf besar
function input1($str) {
	$str = htmlentities(strtoupper(trim(semakSlash($str))));
	return $str;
}

function input2($str) {
	$str = htmlentities(trim(semakSlash($str)));
	return $str;
}

//semua output huruf besar
function output1($str) {
	if(!get_magic_quotes_gpc()) {
		$str = stripslashes($str);
	}
	return $str;
}

function output2($str) {
	if(!get_magic_quotes_gpc()) {
		$str = html_entity_decode(stripslashes($str));
	}
	return html_entity_decode($str);
}

//fetchkan maklumat user yg login tadi
if (!empty($_SESSION['user'])) {
	$sm = "SELECT * FROM user
		WHERE unokp = '" . input1($_SESSION['user']) . "'
		ORDER BY unokp ASC
	";
	$dm = mysql_query($sm);
	$tm = mysql_fetch_array($dm);
}
?>
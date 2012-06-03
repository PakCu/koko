<?php
$conn = mysql_connect("localhost","admin","admin");
$dbase = mysql_select_db("koko",$conn);
if (!$dbase) { die("SILA HUBUNGI PENTADBIR SISTEM"); }
?>
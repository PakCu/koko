<?php
$conn = mysql_connect("localhost","admin","admin"); //tukar ikut setting dbase
$dbase = mysql_select_db("koko",$conn);
if (!$dbase) { die("SILA HUBUNGI PENTADBIR SISTEM"); }
?>
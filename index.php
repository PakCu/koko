<?php
if (!isset($_SESSION)) { session_start(); }
include('inc/conn.php'); //connection database
include('inc/fungsi.php'); //panggil fail fungsi
include('tmp/header.php'); //panggil fail header
include('tmp/index.php'); //panggil fail content
include('tmp/footer.php'); //panggil fail footer
?>
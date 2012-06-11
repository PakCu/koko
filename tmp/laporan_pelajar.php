<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Sistem Penilaian Kokurikulum Sekolah</title>
<link rel="shortcut icon" href="files/favicon.ico">
<link rel="stylesheet" type="text/css" href="files/stylesurat.css">
</head>

<body>
<?php
$s = "SELECT s.*, d.*, k.*, p.*
	FROM sesipelajar AS s, sesikelas AS d, kelas AS k, pelajar AS p
	WHERE s.sidk = d.sidk
	AND s.pnokp = p.pnokp
	AND d.kid = k.kid
	AND d.tahun = '".input1($_GET['tahun'])."'
	AND p.pnokp = '".input1($_GET['id'])."'
	ORDER BY k.kelas,p.pnama ASC
";
$d = mysql_query($s);
if (mysql_num_rows($d) == 1) {
	$t = mysql_fetch_array($d);
	?>
    <table width="780" border="0" cellpadding="3" cellspacing="0">
      <tr>
        <td width="345" align="left" valign="middle"><b>A.GILIRAN :</b> <?php echo output1($t['pnogiliran']); ?></td>
        <td width="423" align="left" valign="middle"><img src="files/logo.jpg"></td>
      </tr>
      <tr>
        <td colspan="2" align="center" valign="top" class="tkmenu">
        	PENILAIAN AKHIR AKTIVITI KOKURIKULUM<br>
            TAHUN : <?php echo $_GET['tahun']; ?>
            
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td width="126" align="left" valign="top"><b>Nama Murid : </b></td>
            <td width="237" align="left" valign="top"><?php echo output1($t['pnama']); ?></td>
            <td width="27">&nbsp;</td>
            <td width="126" align="left" valign="top"><b>No. K.P :</b></td>
            <td width="238" align="left" valign="top"><?php echo output1($t['pnokp']); ?></td>
          </tr>
          <tr>
            <td align="left" valign="top"><b>Tingkatan/Darjah :</b></td>
            <td align="left" valign="top"><?php echo output1($t['kelas']); ?></td>
            <td>&nbsp;</td>
            <td align="left" valign="top"><b>Jantina :</b></td>
            <td align="left" valign="top"><?php echo output1($t['pjantina']); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan="2" align="center" valign="top"><table width="100%" border="1" cellspacing="0" cellpadding="2">
          <tr>
            <td width="215" rowspan="2" align="center" valign="middle"><b>Aspek Yang Dinilai</b></td>
            <td width="129" rowspan="2" align="center" valign="middle"><b>Agihan Markah</b></td>
            <td width="98" align="center" valign="middle"><b>I</b></td>
            <td width="98" align="center" valign="middle"><b>II</b></td>
            <td width="98" align="center" valign="middle"><b>III</b></td>
            <td width="98" align="center" valign="middle"><b>IV</b></td>
          </tr>
          <tr>
            <td align="center" valign="middle"><b>Badan<br>
            Beruniform</b></td>
            <td align="center" valign="middle"><b>Kelab/<br>
            Persatuan</b></td>
            <td align="center" valign="middle"><b>Sukan/<br>
            Permainan</b></td>
            <td align="center" valign="middle"><b>Program<br>
            Khidmat<br>
            Negara</b></td>
          </tr>
          <tr>
            <td align="left" valign="middle"><b>KEHADIRIAN</b></td>
            <td align="center" valign="middle">50</td>
            <td align="center" valign="middle"><?php
				$hadir = $t['hadir2'] / (18 - $t['hadir3']) * 50;
				if ($hadir > 0) { echo round($hadir); }
				else { echo "0"; }
                ?></td>
            <td align="center" valign="middle"><?php
				$hadir = $t['hadir5'] / (12 - $t['hadir6']) * 50;
				if ($hadir > 0) { echo round($hadir); }
				else { echo "0"; }
                ?></td>
            <td align="center" valign="middle"><?php
				$hadir = $t['hadir8'] / (12 - $t['hadir9']) * 50;
				if ($hadir > 0) { echo round($hadir); }
				else { echo "0"; }
                ?></td>
            <td rowspan="2" align="center" valign="middle" bgcolor="#CCCCCC">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle"><b>JAWATAN YANG DISANDANG</b></td>
            <td align="center" valign="middle">10</td>
            <td align="center" valign="middle"><?php
				if ($t['jawat1'] > 0) { echo round($t['jawat1']); }
				else { echo "0"; }
            ?></td>
            <td align="center" valign="middle"><?php
				if ($t['jawat2'] > 0) { echo round($t['jawat2']); }
				else { echo "0"; }
            ?></td>
            <td align="center" valign="middle"><?php
				if ($t['jawat3'] > 0) { echo round($t['jawat3']); }
				else { echo "0"; }
            ?></td>
          </tr>
          <tr>
            <td align="left" valign="middle"><b>PENGLIBATAN</b></td>
            <td align="center" valign="middle">20</td>
            <td align="center" valign="middle"><?php
				if ($t['libat1'] > 0) { echo round($t['libat1']); }
				else { echo "0"; }
            ?></td>
            <td align="center" valign="middle"><?php
				if ($t['libat2'] > 0) { echo round($t['libat2']); }
				else { echo "0"; }
            ?></td>
            <td align="center" valign="middle"><?php
				if ($t['libat3'] > 0) { echo round($t['libat3']); }
				else { echo "0"; }
            ?></td>
            <td align="center" valign="middle">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle"><b>PENCAPAIAN</b></td>
            <td align="center" valign="middle">20</td>
            <td align="center" valign="middle"><?php
				if ($t['capai1'] > 0) { echo round($t['capai1']); }
				else { echo "0"; }
            ?></td>
            <td align="center" valign="middle"><?php
				if ($t['capai2'] > 0) { echo round($t['capai2']); }
				else { echo "0"; }
            ?></td>
             <td align="center" valign="middle"><?php
				if ($t['capai3'] > 0) { echo round($t['capai3']); }
				else { echo "0"; }
            ?></td>
            <td align="center" valign="middle">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="middle"><b>JUMLAH MARKAH</b></td>
            <td align="center" valign="middle">100</td>
             <td align="center" valign="middle"><?php
				if ($t['markah1'] > 0) { echo round($t['markah1']); }
				else { echo "0"; }
            ?></td>
             <td align="center" valign="middle"><?php
				if ($t['markah2'] > 0) { echo round($t['markah2']); }
				else { echo "0"; }
            ?></td>
             <td align="center" valign="middle"><?php
				if ($t['markah3'] > 0) { echo round($t['markah3']); }
				else { echo "0"; }
            ?></td>
            <td align="center" valign="middle">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="middle"><b>GRED</b></td>
            <td align="center" valign="middle">&nbsp;</td>
             <td align="center" valign="middle"><?php
				if (!empty($t['gred1'])) { echo $t['gred1']; }
				else { echo "&nbsp;"; }
            ?></td>
             <td align="center" valign="middle"><?php
				if (!empty($t['gred2'])) { echo $t['gred2']; }
				else { echo "&nbsp;"; }
            ?></td>
             <td align="center" valign="middle"><?php
				if (!empty($t['gred3'])) { echo $t['gred3']; }
				else { echo "&nbsp;"; }
            ?></td>
            <td align="center" valign="middle">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td align="left" valign="middle"><b>Jawatan bidang-bidang lain : </b></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan="2" align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="151" align="left" valign="middle"><b>Markah Bonus : </b></td>
            <td width="603" align="left" valign="middle"><?php
				if (!empty($t['bns'])) { echo $t['bns']; }
				else { echo "&nbsp;"; }
              ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan="2" align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="151" align="left" valign="middle"><b>Gred Keseluruhan :</b></td>
            <td width="207" align="left" valign="middle"><?php
				if (!empty($t['gred'])) { echo $t['gred']; }
				else { echo "&nbsp;"; }
              ?></td>
            <td width="80" align="left" valign="middle"><b>GPA :</b></td>
            <td width="91" align="left" valign="middle"><?php
				if (!empty($t['markah'])) { echo sprintf('%01.2f',$t['markah']); }
				else { echo "&nbsp;"; }
                ?></td>
            <td width="80" align="left" valign="middle"><b>CGPA :</b></td>
            <td width="105" align="left" valign="middle"><?php
				$sx = "SELECT * FROM tahun WHERE tahun <= '".input1($_GET['tahun'])."' ORDER BY tahun ASC";
				$dx = mysql_query($sx);
				$cgpa = 0;
				$h = 0;
				while ($tx = mysql_fetch_array($dx)) {
					//echo $tx['tahun']."<br>";
					$sy = "SELECT s.*, d.*, k.*, p.*
						FROM sesipelajar AS s, sesikelas AS d, kelas AS k, pelajar AS p
						WHERE s.sidk = d.sidk
						AND s.pnokp = p.pnokp
						AND d.kid = k.kid
						AND d.tahun = '".input1($tx['tahun'])."'
						AND p.pnokp = '".input1($t['pnokp'])."'
						ORDER BY p.pnokp ASC
					";
					$dy = mysql_query($sy);
					if (mysql_num_rows($dy) == 1) {
						$h = $h + 1;
						$ty = mysql_fetch_array($dy);
						if (!empty($ty['markah'])) {
							if ($h > 1) { $cgpa = ($cgpa + $ty['markah']) / 2; }
							else { $cgpa = ($cgpa + $ty['markah']); }
						}
					}
				}
				if (!empty($cgpa)) { echo sprintf('%01.2f',$cgpa); }
				else { echo "&nbsp;"; }
                ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td align="left" valign="top"><b>Ulasan : </b></td>
          </tr>
        </table></td>
      </tr>
    </table>
<?php
}
else {
	echo '<meta http-equiv="Refresh" content="0;url=index.php">';
}
?>
</body>
</html>
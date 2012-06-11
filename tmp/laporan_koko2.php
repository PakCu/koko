<table width="100%" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="100%" align="center" valign="top">
      <br />
      <?php
	  //dptkan tahun sesi persekolahan terkini drp table tahun
	  $sx = "SELECT * FROM tahun ORDER BY tahun DESC";
	  $dx = mysql_query($sx);
	  $tx = mysql_fetch_array($dx);
	  $tahun = $tx['tahun'];
	  
	  //dptkan kelas sesi persekolahan utk guru yg login
	  $sx = "SELECT s.*, k.*
		FROM sesikelas AS s, kelas AS k
		WHERE s.kid = k.kid
		AND s.tahun = '".input1($tahun)."'
		AND s.unokp = '".$tm['unokp']."'
		ORDER BY s.unokp ASC
	  ";
	  $dx = mysql_query($sx);
	  if (mysql_num_rows($dx) == 1) {
		  $tx = mysql_fetch_array($dx);
		  ?>
		  <table width="100%" border="1" cellspacing="0" cellpadding="5">
			<tr>
			  <td align="center" bgcolor="#49A3FF" class="tkmenu2">MAKLUMAT KELAS</td>
			</tr>
		  </table>
		  <table width="100%" border="1" cellspacing="0" cellpadding="3" class="table2">
			<tr>
			  <td width="24%" align="right" valign="middle" bgcolor="#CCCCCC">Tahun Persekolahan :</td>
			  <td width="76%" align="left" valign="middle"><?php echo $tahun; ?></td>
			</tr>
			<tr>
			  <td align="right" valign="middle" bgcolor="#CCCCCC">Nama Kelas :</td>
			  <td align="left" valign="middle"><?php echo $tx['kelas']; ?></td>
			</tr>
			<tr>
			  <td align="right" valign="middle" bgcolor="#CCCCCC">Nama Guru :</td>
			  <td align="left" valign="middle"><?php echo output1($tm['unama']); ?></td>
			</tr>
		  </table>
          <table width="100%" border="1" cellspacing="0" cellpadding="5">
            <tr>
              <td align="center" bgcolor="#49A3FF" class="tkmenu2">MARKAH PENILAIAN 10% KOKURIKULUM</td>
            </tr>
          </table>
          <table width="100%" border="1" cellspacing="0" cellpadding="3" class="table2">
            <tr class="tkmenu2">
              <td width="5%" align="center" valign="middle" bgcolor="#999999">Bil</td>
              <td width="28%" align="left" valign="middle" bgcolor="#999999">Nama Pelajar</td>
              <td width="9%" align="center" valign="middle" bgcolor="#999999">Angka Giliran</td>
              <td width="10%" align="center" valign="middle" bgcolor="#999999">Uniform</td>
              <td width="10%" align="center" valign="middle" bgcolor="#999999">Kelab</td>
              <td width="10%" align="center" valign="middle" bgcolor="#999999">Sukan</td>
              <td width="7%" align="center" valign="middle" bgcolor="#999999">Markah</td>
              <td width="7%" align="center" valign="middle" bgcolor="#999999">Gred</td>
              <td width="7%" align="center" valign="middle" bgcolor="#999999">CGPA</td>
              <td width="7%" align="center" valign="middle" bgcolor="#999999">10%</td>
            </tr>
            <?php	  
            //dptkan maklumat pelajar dan kelas untuk sesi tahun berkenaan
			$s = "SELECT s.*, p.*
				FROM sesipelajar AS s, pelajar AS p
				WHERE s.pnokp = p.pnokp
				AND s.sidk = '".$tx['sidk']."'
				ORDER BY p.pnama ASC
			";
            $d = mysql_query($s);
            $n = 0;
            while ($t = mysql_fetch_array($d)) {
                $n = $n + 1;
                ?>
                <tr>
                  <td align="center" valign="top"><?php echo $n; ?></td>
                  <td align="left" valign="top"><a href="laporan.php?menu=pelajar&id=<?php echo $t['pnokp']; ?>&tahun=<?php echo $tahun; ?>"><?php echo output1($t['pnama']); ?></a></td>
                  <td align="center" valign="top"><?php if (!empty($t['pnogiliran'])) { echo output1($t['pnogiliran']); } else { echo "&nbsp;"; } ?></td>
                  <td align="center" valign="top">
                    <?php
                    //dptkan maklumat koko uniform pelajar
                    $sa = "SELECT * FROM kokurikulum 
                        WHERE oid = '".$t['uniform']."'
                        ORDER BY oid ASC
                    ";
                    $da = mysql_query($sa);
                    $ta = mysql_fetch_array($da);
                    if (!empty($ta['kokurikulum'])) { echo $ta['kokurikulum']; } else { echo "&nbsp;"; }
                    ?>
                  </td>
                  <td align="center" valign="top">
                    <?php
                    //dptkan maklumat koko kelab pelajar
                    $sa = "SELECT * FROM kokurikulum 
                        WHERE oid = '".$t['kelab']."'
                        ORDER BY oid ASC
                    ";
                    $da = mysql_query($sa);
                    $ta = mysql_fetch_array($da);
                    if (!empty($ta['kokurikulum'])) { echo $ta['kokurikulum']; } else { echo "&nbsp;"; }
                    ?>
                  </td>
                  <td align="center" valign="top">
                    <?php
                    //dptkan maklumat koko sukan pelajar
                    $sa = "SELECT * FROM kokurikulum 
                        WHERE oid = '".$t['sukan']."'
                        ORDER BY oid ASC
                    ";
                    $da = mysql_query($sa);
                    $ta = mysql_fetch_array($da);
                    if (!empty($ta['kokurikulum'])) { echo $ta['kokurikulum']; } else { echo "&nbsp;"; }
                    ?>
                  </td>
                  <td align="center" valign="top"><?php if (!empty($t['markah'])) { echo output1($t['markah']); } else { echo "&nbsp;"; } ?></td>
                  <td align="center" valign="top"><?php if (!empty($t['markah'])) { echo output1($t['gred']); } else { echo "&nbsp;"; } ?></td>
                  <td align="center" valign="top">
                    <?php
                    $sx = "SELECT * FROM tahun WHERE tahun <= '".input1($tahun)."' ORDER BY tahun ASC";
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
                    if (!empty($cgpa)) { echo round($cgpa,2); }
                    else { echo "&nbsp;"; }
                    ?>
                  </td>
                  <td align="center" valign="top"><?php if (!empty($cgpa)) { echo round($cgpa * 0.1,2); } else { echo "&nbsp;"; } ?></td>
                </tr>
            <?php
            }
            if (!$n) {
                ?>
                <tr>
                  <td colspan="10" align="center" valign="top">TIADA MAKLUMAT PELAJAR</td>
                </tr>
            <?php
            }
            ?>
		  </table>
      <?php
	  }
	  else {
		  ?>
		  <table width="100%" border="1" cellspacing="0" cellpadding="5">
			<tr>
			  <td align="center" bgcolor="#49A3FF" class="tkmenu2">SENARAI PELAJAR</td>
			</tr>
	  	  </table>
		  <table width="100%" border="1" cellspacing="0" cellpadding="3" class="table2">
			<tr class="tkmenu2">
              <td width="5%" align="center" valign="middle" bgcolor="#999999">Bil</td>
              <td width="28%" align="left" valign="middle" bgcolor="#999999">Nama Pelajar</td>
              <td width="9%" align="center" valign="middle" bgcolor="#999999">Angka Giliran</td>
              <td width="10%" align="center" valign="middle" bgcolor="#999999">Uniform</td>
              <td width="10%" align="center" valign="middle" bgcolor="#999999">Kelab</td>
              <td width="10%" align="center" valign="middle" bgcolor="#999999">Sukan</td>
              <td width="7%" align="center" valign="middle" bgcolor="#999999">Markah</td>
              <td width="7%" align="center" valign="middle" bgcolor="#999999">Gred</td>
              <td width="7%" align="center" valign="middle" bgcolor="#999999">CGPA</td>
              <td width="7%" align="center" valign="middle" bgcolor="#999999">10%</td>
            </tr>
            <tr>
              <td colspan="10" align="center" valign="top">ANDA BUKAN GURU KELAS</td>
            </tr>
		  </table>
      <?php
	  }
	  ?>
    <br></td>
  </tr>
</table>

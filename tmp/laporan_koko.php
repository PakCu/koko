<table width="100%" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="100%" align="center" valign="top">
      <br />
      <?php
	  //dptkan tahun default
	  if (!empty($_POST['tahun'])) { $tahun = $_POST['tahun']; }
	  else {
		  $sx = "SELECT * FROM tahun
			  ORDER BY tahun DESC
		  ";
		  $dx = mysql_query($sx);
		  $tx = mysql_fetch_array($dx);
		  $tahun = $tx['tahun'];
	  }
	  ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
      	<form name="koko" action="laporan.php?menu=senarai" method="post">
        <tr>
          <td width="87%" align="right">Tahun :</td>
          <td width="5%" align="right"><select name="tahun" id="tahun" class="input">
          	<?php
			$sx = "SELECT * FROM tahun
				ORDER BY tahun DESC
			";
			$dx = mysql_query($sx);
			while ($tx = mysql_fetch_array($dx)) {
				if ($tx['tahun'] == $tahun) { $select = 'selected="selected"'; }
				else { $select = ""; }
				?>
                <option value="<?php echo $tx['tahun']; ?>" <?php echo $select; ?>><?php echo $tx['tahun']; ?></option>
            <?php
			}
			?>
          </select></td>
          <td width="8%" align="right"><input name="submit" type="submit" class="button" id="submit" value="Hantar" /></td>
        </tr>
        </form>
      </table>
      <table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tr>
          <td align="center" bgcolor="#49A3FF" class="tkmenu2">MARKAH PENILAIAN 10% KOKURIKULUM</td>
        </tr>
      </table>
      <table width="100%" border="1" cellspacing="0" cellpadding="3" class="table2">
        <tr class="tkmenu2">
          <td width="5%" align="center" valign="middle" bgcolor="#999999">Bil</td>
          <td width="18%" align="left" valign="middle" bgcolor="#999999">Nama Pelajar</td>
          <td width="10%" align="center" valign="middle" bgcolor="#999999">Kelas</td>
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
	  	$s = "SELECT s.*, d.*, k.*, p.*
			FROM sesipelajar AS s, sesikelas AS d, kelas AS k, pelajar AS p
			WHERE s.sidk = d.sidk
			AND s.pnokp = p.pnokp
			AND d.kid = k.kid
			AND d.tahun = '".input1($tahun)."'
			ORDER BY k.kelas,p.pnama ASC
	  	";
	  	$d = mysql_query($s);
	  	$n = 0;
	  	while ($t = mysql_fetch_array($d)) {
			$n = $n + 1;
			?>
			<tr>
			  <td align="center" valign="top"><?php echo $n; ?></td>
			  <td align="left" valign="top"><a href="laporan.php?menu=pelajar&id=<?php echo $t['pnokp']; ?>"><?php echo output1($t['pnama']); ?></a></td>
			  <td align="center" valign="top"><?php echo output1($t['kelas']); ?></td>
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
			  <td colspan="11" align="center" valign="top">TIADA MAKLUMAT PELAJAR</td>
			</tr>
		<?php
		}
		?>
	  </table>
    <br></td>
  </tr>
</table>

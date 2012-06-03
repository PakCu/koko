<table width="100%" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="100%" align="center" valign="top">
      <br />
      <?php
	  //dptkan tahun sesi persekolahan terkini drp table tahun
	  $sx = "SELECT * FROM tahun ORDER BY tahun DESC";
	  $dx = mysql_query($sx);
	  $tx = mysql_fetch_array($dx);
	  
	  //dptkan kelas sesi persekolahan utk guru yg login
	  $sx = "SELECT s.*, k.*
		FROM sesikelas AS s, kelas AS k
		WHERE s.kid = k.kid
		AND s.tahun = '".$tx['tahun']."'
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
			  <td width="76%" align="left" valign="middle"><?php echo $tx['tahun']; ?></td>
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
			  <td align="center" bgcolor="#49A3FF" class="tkmenu2">SENARAI MAKLUMAT KOKURIKULUM PELAJAR</td>
			</tr>
		  </table>
		  <table width="100%" border="1" cellspacing="0" cellpadding="3" class="table2">
            <tr class="tkmenu2">
              <td width="5%" align="center" valign="middle" bgcolor="#999999">Bil</td>
              <td width="25%" align="left" valign="middle" bgcolor="#999999">Nama Pelajar</td>
              <td width="14%" align="center" valign="middle" bgcolor="#999999">No. Kad Pengenalan</td>
              <td width="9%" align="center" valign="middle" bgcolor="#999999">Angka Giliran</td>
              <td width="13%" align="center" valign="middle" bgcolor="#999999">Badan Uniform</td>
              <td width="13%" align="center" valign="middle" bgcolor="#999999">Kelab/Persatuan</td>
              <td width="13%" align="center" valign="middle" bgcolor="#999999">Sukan/Permainan</td>
              <td width="8%" align="center" valign="middle" bgcolor="#999999">Tindakan</td>
            </tr>
            <?php
			//select from table pelajar
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
                  <td align="left" valign="top"><?php echo output1($t['pnama']); ?></td>
                  <td align="center" valign="top"><?php echo output1($t['pnokp']); ?></td>
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
					echo $ta['kokurikulum'];
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
					echo $ta['kokurikulum'];
					?>
                  </td>
                  <td align="center" valign="top">
                  	<?php
					//dptkan maklumat koko kelab pelajar
					$sa = "SELECT * FROM kokurikulum 
						WHERE oid = '".$t['sukan']."'
						ORDER BY oid ASC
					";
					$da = mysql_query($sa);
					$ta = mysql_fetch_array($da);
					echo $ta['kokurikulum'];
					?>
                  </td>
                  <td align="center" valign="top"><a href="daftar.php?menu=kemaskini&id=<?php echo $t['sidp']; ?>">KEMASKINI</a></td>
                </tr>
			<?php
			}
			if (!$n) {
				?>
				<tr>
				  <td colspan="8" align="center" valign="top">TIADA MAKLUMAT</td>
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
			  <td width="30%" align="left" valign="middle" bgcolor="#999999">Nama Penuh</td>
			  <td width="18%" align="center" valign="middle" bgcolor="#999999">No. Kad Pengenalan</td>
			  <td width="23%" align="center" valign="middle" bgcolor="#999999">Jantina</td>
			  <td width="12%" align="center" valign="middle" bgcolor="#999999">Angka Giliran</td>
			  <td width="12%" align="center" valign="middle" bgcolor="#999999">Tindakan</td>
			</tr>
            <tr>
              <td colspan="6" align="center" valign="top">ANDA BUKAN GURU KELAS</td>
            </tr>
		  </table>
      <?php
	  }
	  ?>
    <br></td>
  </tr>
</table>

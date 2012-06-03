<table width="100%" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="100%" align="center" valign="top">
      <table width="70%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td align="center" class="tkmenu3">[ <a href="sesi.php?menu=kelas">TAMBAH KELAS & GURU</a> ] [ <a href="sesi.php?menu=pelajar">TAMBAH PELAJAR</a> ]</td>
        </tr>
      </table>
      <form name="sesi" action="sesi.php?menu=senarai" method="post">
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
      <table width="70%" border="0" cellspacing="0" cellpadding="2">
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
      </table>
      </form>
      <table width="70%" border="1" cellspacing="0" cellpadding="5">
        <tr>
          <td align="center" bgcolor="#49A3FF" class="tkmenu2">SENARAI KELAS TAHUN <?php echo $tahun; ?></td>
        </tr>
      </table>
      <table width="70%" border="1" cellspacing="0" cellpadding="3" class="table2">
        <tr class="tkmenu2">
          <td width="7%" align="center" valign="middle" bgcolor="#999999">Bil</td>
          <td width="24%" align="left" valign="middle" bgcolor="#999999">Nama Kelas</td>
          <td width="52%" align="left" valign="middle" bgcolor="#999999">Nama Guru</td>
          <td width="17%" align="center" valign="middle" bgcolor="#999999">Jumlah Pelajar</td>
        </tr>
        <?php
		//gabungkan table sesi, table tahun, table kelas
		$s = "SELECT s.*, t.*, k.*
			FROM sesikelas AS s, tahun AS t, kelas AS k
			WHERE s.tahun = t.tahun
			AND s.kid = k.kid
			AND t.tahun = '" . input1($tahun) . "'
			ORDER BY k.kelas ASC
		";
		$d = mysql_query($s);
		$n = 0;
		while ($t = mysql_fetch_array($d)) {
			$n = $n + 1;
			?>
            <tr>
              <td align="center" valign="top"><?php echo $n; ?></td>
              <td align="left" valign="top"><?php echo output1($t['kelas']); ?></td>
              <td align="left" valign="top">
			  	<?php 
				//dptkan maklumat guru
				$sx = "SELECT * FROM user 
					WHERE unokp = '" . input1($t['unokp']) . "'
					ORDER BY unokp ASC
				";
				$dx = mysql_query($sx);
				if (mysql_num_rows($dx) >= 1) {
					$tx = mysql_fetch_array($dx);
					echo '<a href="sesi.php?menu=kemaskinikelas&id='.$t['sidk'].'">'.output1($tx['unama']).'</a>';
				}
				else { echo "&nbsp;"; }
				?>
              </td>
              <td align="center" valign="top"><?php echo output1($t['unokp']); ?></td>
            </tr>
        <?php
		}
		if (!$n) {
			?>
            <tr>
              <td colspan="4" align="center" valign="top">TIADA MAKLUMAT</td>
            </tr>
        <?php
		}
		?>
      </table>
    <br></td>
  </tr>
</table>

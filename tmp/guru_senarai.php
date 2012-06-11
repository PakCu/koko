<table width="100%" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="100%" align="center" valign="top">
      <table width="50%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td align="center" class="tkmenu3">[ <a href="guru.php?menu=daftar">TAMBAH MAKLUMAT GURU</a> ]</td>
        </tr>
      </table>
      <table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tr>
          <td align="center" bgcolor="#49A3FF" class="tkmenu2">SENARAI GURU</td>
        </tr>
      </table>
      <table width="100%" border="1" cellspacing="0" cellpadding="3" class="table2">
        <tr class="tkmenu2">
          <td width="5%" align="center" valign="middle" bgcolor="#999999">Bil</td>
          <td width="30%" align="left" valign="middle" bgcolor="#999999">Nama Penuh</td>
          <td width="18%" align="center" valign="middle" bgcolor="#999999">No. Kad Pengenalan</td>
          <td width="23%" align="center" valign="middle" bgcolor="#999999">Jawatan</td>
          <td width="12%" align="center" valign="middle" bgcolor="#999999">Level</td>
          <td width="12%" align="center" valign="middle" bgcolor="#999999">Tindakan</td>
        </tr>
        <?php
		//select from table guru
		$s = "SELECT * FROM user
			ORDER BY unama ASC
		";
		$d = mysql_query($s);
		$n = 0;
		while ($t = mysql_fetch_array($d)) {
			$n = $n + 1;
			?>
            <tr>
              <td align="center" valign="top"><?php echo $n; ?></td>
              <td align="left" valign="top"><?php echo output1($t['unama']); ?></td>
              <td align="center" valign="top"><?php echo output1($t['unokp']); ?></td>
              <td align="center" valign="top"><?php if (!empty($t['ujawatan'])) { echo output1($t['ujawatan']); } else { echo "&nbsp;"; } ?></td>
              <td align="center" valign="top"><?php if ($t['ulevel'] == 1) { echo "PENTADBIR"; } else { echo "GURU"; } ?></td>
              <td align="center" valign="top"><a href="guru.php?menu=kemaskini&id=<?php echo $t['uid']; ?>">KEMASKINI</a></td>
            </tr>
        <?php
		}
		if (!$n) {
			?>
            <tr>
              <td colspan="6" align="center" valign="top">TIADA MAKLUMAT</td>
            </tr>
        <?php
		}
		?>
      </table>
    <br></td>
  </tr>
</table>

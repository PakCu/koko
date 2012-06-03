<table width="100%" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="100%" align="center" valign="top">
      <table width="50%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td align="center" class="tkmenu3">[ <a href="pelajar.php?menu=daftar">TAMBAH MAKLUMAT PELAJAR</a> ]</td>
        </tr>
      </table>
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
        <?php
		//select from table pelajar
		$s = "SELECT * FROM pelajar
			ORDER BY pnama ASC
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
              <td align="center" valign="top"><?php echo output1($t['pjantina']); ?></td>
              <td align="center" valign="top"><?php if (!empty($t['pnogiliran'])) { echo output1($t['pnogiliran']); } else { echo "&nbsp;"; } ?></td>
              <td align="center" valign="top"><a href="pelajar.php?menu=kemaskini&id=<?php echo $t['pid']; ?>">KEMASKINI</a></td>
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

<table width="100%" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="100%" align="center" valign="top">
      <table width="70%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td align="center" class="tkmenu3">[ <a href="info.php?menu=daftar">TAMBAH PENGUMUMAN</a> ]</td>
        </tr>
      </table>
      <table width="70%" border="1" cellspacing="0" cellpadding="5">
        <tr>
          <td align="center" bgcolor="#49A3FF" class="tkmenu2">SENARAI PENGUMUMAN</td>
        </tr>
      </table>
      <table width="70%" border="1" cellspacing="0" cellpadding="3" class="table2">
        <tr class="tkmenu2">
          <td width="7%" align="center" valign="middle" bgcolor="#999999">Bil</td>
          <td align="left" valign="middle" bgcolor="#999999">Pengumuman</td>
          <td width="17%" align="center" valign="middle" bgcolor="#999999">Tindakan</td>
        </tr>
        <?php
		//dptkan senarai info drp table info
		$s = "SELECT * FROM info
			ORDER BY id DESC
		";
		$d = mysql_query($s);
		$n = 0;
		while ($t = mysql_fetch_array($d)) {
			$n = $n + 1;
			?>
            <tr>
              <td align="center" valign="top"><?php echo $n; ?></td>
              <td align="left" valign="top"><?php echo ucfirst(output2($t['info'])); ?></td>
              <td align="center" valign="top"><a href="info.php?menu=kemaskini&amp;id=<?php echo $t['id']; ?>">KEMASKINI</a></td>
            </tr>
        <?php
		}
		if (!$n) {
			?>
            <tr>
              <td colspan="3" align="center" valign="top">TIADA MAKLUMAT</td>
            </tr>
        <?php
		}
		?>
      </table>
    <br></td>
  </tr>
</table>

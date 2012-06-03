<table width="100%" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="100%" align="center" valign="top">
      <table width="40%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td align="center" class="tkmenu3">[ <a href="tahun.php?menu=daftar">TAMBAH TAHUN</a> ]</td>
        </tr>
      </table>
      <table width="40%" border="1" cellspacing="0" cellpadding="5">
        <tr>
          <td align="center" bgcolor="#49A3FF" class="tkmenu2">SENARAI TAHUN PERSEKOLAHAN</td>
        </tr>
      </table>
      <table width="40%" border="1" cellspacing="0" cellpadding="3" class="table2">
        <tr class="tkmenu2">
          <td width="13%" align="center" valign="middle" bgcolor="#999999">Bil</td>
          <td width="59%" align="center" valign="middle" bgcolor="#999999">Tahun</td>
          <td width="28%" align="center" valign="middle" bgcolor="#999999">Tindakan</td>
        </tr>
        <?php
		$s = "SELECT * FROM tahun ORDER BY tahun DESC";
		$d = mysql_query($s);
		$n = 0;
		while ($t = mysql_fetch_array($d)) {
			$n = $n + 1;
			?>
            <tr>
              <td align="center" valign="top"><?php echo $n; ?></td>
              <td align="center" valign="top"><?php echo output1($t['tahun']); ?></td>
              <td align="center" valign="top"><a href="tahun.php?menu=kemaskini&id=<?php echo $t['tahun']; ?>">KEMASKINI</a></td>
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

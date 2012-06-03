<table width="100%" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="100%" align="center" valign="top">
      <table width="50%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td align="center" class="tkmenu3">[ <a href="kokurikulum.php?menu=daftar">TAMBAH KOKURIKULUM</a> ]</td>
        </tr>
      </table>
      <table width="70%" border="1" cellspacing="0" cellpadding="5">
        <tr>
          <td align="center" bgcolor="#49A3FF" class="tkmenu2">SENARAI KOKURIKULUM</td>
        </tr>
      </table>
      <table width="70%" border="1" cellspacing="0" cellpadding="3" class="table2">
        <tr class="tkmenu2">
          <td width="8%" align="center" valign="middle" bgcolor="#999999">Bil</td>
          <td width="27%" align="left" valign="middle" bgcolor="#999999">Kategori</td>
          <td width="48%" align="left" valign="middle" bgcolor="#999999">Aktiviti Kokurikulum</td>
          <td width="17%" align="center" valign="middle" bgcolor="#999999">Tindakan</td>
        </tr>
        <?php
		//select from 2 table - table kategori dan table kokurikulum
		$s = "SELECT a.*, k.*
			FROM kategori AS a, kokurikulum AS k
			WHERE a.aid = k.aid
			ORDER BY a.aid,k.kokurikulum ASC
		";
		$d = mysql_query($s);
		$n = 0;
		while ($t = mysql_fetch_array($d)) {
			$n = $n + 1;
			?>
            <tr>
              <td align="center" valign="top"><?php echo $n; ?></td>
              <td align="left" valign="top"><?php echo output1($t['kategori']); ?></td>
              <td align="left" valign="top"><?php echo output1($t['kokurikulum']); ?></td>
              <td align="center" valign="top"><a href="kokurikulum.php?menu=kemaskini&id=<?php echo $t['oid']; ?>">KEMASKINI</a></td>
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

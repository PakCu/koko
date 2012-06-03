<table width="100%" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="100%" align="center" valign="top">
      <?php
	  //semak maklumat adalah sah
	  $s = "SELECT s.*, t.*, k.*
		FROM sesikelas AS s, tahun AS t, kelas AS k
		WHERE s.tahun = t.tahun
		AND s.kid = k.kid
		AND s.sidk = '" . input1($_GET['id']) . "'
		ORDER BY s.sidk ASC
	  ";
	  $d = mysql_query($s);
	  //jika maklumat ada sah
	  if (mysql_num_rows($d) == 1) {
		  $t = mysql_fetch_array($d);
		  ?>
      	  <table width="70%" border="0" cellspacing="0" cellpadding="5">
            <tr>
              <td align="center" class="tkmenu3">[ <a href="sesi.php?menu=kemaskinipelajar&id=<?php echo $t['sidk']; ?>">TAMBAH PELAJAR</a> ]</td>
            </tr>
          </table>
          <table width="100%" border="1" cellspacing="0" cellpadding="5">
            <tr>
              <td align="center" bgcolor="#49A3FF" class="tkmenu2">MAKLUMAT KELAS SESI PERSEKOLAHAN</td>
            </tr>
          </table>
          <table width="100%" border="1" cellspacing="0" cellpadding="3" class="table2">
            <tr>
              <td width="24%" align="right" valign="middle" bgcolor="#CCCCCC">Tahun Persekolahan :</td>
              <td width="76%" align="left" valign="middle"><?php echo $t['tahun']; ?></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Nama Kelas :</td>
              <td align="left" valign="middle"><?php echo $t['kelas']; ?></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Nama Guru :</td>
              <td align="left" valign="middle">
				<?php 
				//dptkan maklumat guru
				$sx = "SELECT * FROM user 
					WHERE unokp = '" . input1($t['unokp']) . "'
					ORDER BY unokp ASC
				";
				$dx = mysql_query($sx);
				$tx = mysql_fetch_array($dx);
				echo output1($tx['unama']);
				?>
			  </td>
            </tr>
          </table>
      <table width="100%" border="1" cellspacing="0" cellpadding="5">
            <tr>
              <td align="center" bgcolor="#49A3FF" class="tkmenu2">SENARAI PELAJAR SESI PERSEKOLAHAN</td>
            </tr>
          </table>
          <table width="100%" border="1" cellspacing="0" cellpadding="3" class="table2">
            <tr class="tkmenu2">
              <td width="5%" align="center" valign="middle" bgcolor="#999999">Bil</td>
              <td width="33%" align="left" valign="middle" bgcolor="#999999">Nama Penuh</td>
              <td width="20%" align="center" valign="middle" bgcolor="#999999">No. Kad Pengenalan</td>
              <td width="17%" align="center" valign="middle" bgcolor="#999999">Jantina</td>
              <td width="13%" align="center" valign="middle" bgcolor="#999999">Angka Giliran</td>
              <td width="12%" align="center" valign="middle" bgcolor="#999999">Tindakan</td>
            </tr>
          <?php
		  $sx = "SELECT s.*, p.*
		  	FROM sesipelajar AS s, pelajar AS p
			WHERE s.pnokp = p.pnokp
			AND sidk = '".input1($t['sidk'])."'
			ORDER BY p.pnama ASC
		  ";
		  $dx = mysql_query($sx);
		  $n = 0;
		  while ($tx = mysql_fetch_array($dx)) {
			  $n = $n + 1;
			  ?>
              <tr>
                <td align="center" valign="middle"><?php echo $n; ?></td>
                <td align="left" valign="middle"><?php echo output1($tx['pnama']); ?></td>
                <td align="center" valign="top"><?php echo output1($tx['pnokp']); ?></td>
                <td align="center" valign="top"><?php echo output1($tx['pjantina']); ?></td>
                <td align="center" valign="top"><?php if (!empty($tx['pnogiliran'])) { echo output1($tx['pnogiliran']); } else { echo "&nbsp;"; } ?></td>
                <td align="center" valign="middle"><a href="sesi.php?menu=kemaskinipelajar&di=<?php echo $tx['sidp']; ?>">HAPUS</a></td>
              </tr>
          <?php
		  }
		  if (!$n) {
			  ?>
              <tr>
                <td colspan="6" align="center" valign="middle">TIADA MAKLUMAT</td>
              </tr>
          <?php
		  }
		  ?>
        </table>
      <?php
	  }
	  //jika tidak sah
	  else {
		  echo '<meta http-equiv="Refresh" content="0;url=sesi.php?menu=senarai">';
	  }
	  ?>
    <br></td>
  </tr>
</table>

<table width="100%" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="100%" align="center" valign="top">
    <br />
      <?php
	  //semak maklumat adalah sah
	  $s = "SELECT s.*, t.*, k.*
		FROM sesikelas AS s, tahun AS t, kelas AS k
		WHERE s.tahun = t.tahun
		AND s.kid = k.kid
		AND s.sidk = '" . input1($_GET['id']) . "'
		ORDER BY k.kelas ASC
	  ";
	  $d = mysql_query($s);
	  //jika maklumat ada sah
	  if (mysql_num_rows($d) == 1) {
		  $t = mysql_fetch_array($d);
		  ?>
      	  <form name="kelas" action="sesi.php?menu=kemaskinipelajar" method="post">
          <table width="70%" border="1" cellspacing="0" cellpadding="5">
            <tr>
              <td align="center" bgcolor="#49A3FF" class="tkmenu2">MAKLUMAT KELAS SESI PERSEKOLAHAN</td>
            </tr>
          </table>
          <table width="70%" border="1" cellspacing="0" cellpadding="3" class="table2">
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
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">No Kad Pengenalan Pelajar :</td>
              <td align="left" valign="middle"><input name="nokp" type="text" class="input" id="nokp" size="15" maxlength="12" />
              <span  class="tkmarkah">cth: 051023081234</span></td>
            </tr>
            <tr>
              <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
              <td align="left" valign="top"><input name="id" type="hidden" id="id" value="<?php echo $t['sidk']; ?>" />
                <input name="submit" type="submit" class="button" id="submit" value="Hantar" />
                <input name="Reset" type="reset" class="button" id="submit" value="Reset" /></td>
            </tr>
          </table>
   	    </form>
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

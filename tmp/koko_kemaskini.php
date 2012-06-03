<table width="100%" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="100%" align="center" valign="top">
      <br />
      <?php
	  //semak maklumat adalah sah
	  $s = "SELECT * FROM kokurikulum 
	  	WHERE oid = '" . input1($_GET['id']) . "'
	  ";
	  $d = mysql_query($s);
	  //jika maklumat ada sah
	  if (mysql_num_rows($d) == 1) {
		  $t = mysql_fetch_array($d);
		  ?>
          <form name="kelas" action="kokurikulum.php?menu=daftar" method="post">
          <table width="50%" border="1" cellspacing="0" cellpadding="5">
            <tr>
              <td align="center" bgcolor="#49A3FF" class="tkmenu2">KEMASKINI AKTIVITI KOKURIKULUM</td>
            </tr>
          </table>
          <table width="50%" border="1" cellspacing="0" cellpadding="3" class="table2">
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Kategori Kokurikulum</td>
              <td align="left" valign="middle"><select name="kategori" class="input" id="kategori">
                <?php
                $sx = "SELECT * FROM kategori
                    ORDER BY aid ASC
                ";
                $dx = mysql_query($sx);
                while ($tx = mysql_fetch_array($dx)) {
					if ($tx['aid'] == $t['aid']) { $select = 'selected="selected"'; }
					else { $select = ""; }
                    ?>
                    <option value="<?php echo $tx['aid']; ?>" <?php echo $select; ?>><?php echo $tx['kategori']; ?></option>
                <?php
                }
                ?>
              </select></td>
            </tr>
            <tr>
              <td width="25%" align="right" valign="middle" bgcolor="#CCCCCC">Aktiviti Kokurikulum :</td>
              <td width="75%" align="left" valign="middle"><input name="koko" type="text" value="<?php echo $t['kokurikulum']; ?>" class="input" id="koko" size="45" maxlength="200" />
                <span  class="tkmarkah">cth: BOLA SEPAK</span></td>
            </tr>
            <tr>
              <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
              <td align="left" valign="top"><input name="id" type="hidden" id="id" value="<?php echo $t['oid']; ?>" />
                <input name="submit" type="submit" class="button" id="submit" value="Kemaskini" />
                <input name="submit" type="submit" class="button" id="submit" value="Hapus" />
              <input name="Reset" type="reset" class="button" id="submit" value="Reset" /></td>
            </tr>
          </table>
          </form>
      <?php
	  }
	  //jika tidak sah
	  else {
		  echo '<meta http-equiv="Refresh" content="0;url=kokurikulum.php?menu=senarai">';
	  }
	  ?>
    <br></td>
  </tr>
</table>

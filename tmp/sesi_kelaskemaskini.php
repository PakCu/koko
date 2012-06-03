<table width="100%" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="100%" align="center" valign="top">
      <br />
      <?php
	  //semak maklumat adalah sah
	  $s = "SELECT * FROM sesikelas 
	  	WHERE sidk = '" . input1($_GET['id']) . "'
	  ";
	  $d = mysql_query($s);
	  //jika maklumat ada sah
	  if (mysql_num_rows($d) == 1) {
		  $t = mysql_fetch_array($d);
		  ?>
          <form name="kelas" action="sesi.php?menu=kemaskinikelas" method="post">
          <table width="70%" border="1" cellspacing="0" cellpadding="5">
            <tr>
              <td align="center" bgcolor="#49A3FF" class="tkmenu2">KEMASKINI MAKLUMAT KELAS SESI PERSEKOLAHAN</td>
            </tr>
          </table>
          <table width="70%" border="1" cellspacing="0" cellpadding="3" class="table2">
            <tr>
              <td width="24%" align="right" valign="middle" bgcolor="#CCCCCC">Tahun Persekolahan :</td>
              <td width="76%" align="left" valign="middle"><select name="tahun" class="input" id="tahun">
                <?php
                $sx = "SELECT * FROM tahun ORDER BY tahun DESC";
                $dx = mysql_query($sx);
                while ($tx = mysql_fetch_array($dx)) {
					if ($tx['tahun'] == $t['tahun']) { $select = 'selected="selected"'; }
					else { $select = ""; }
                    ?>
                    <option value="<?php echo $tx['tahun']; ?>" <?php echo $select; ?>><?php echo $tx['tahun']; ?></option>
                <?php	
                }
                ?>
              </select></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Nama Kelas :</td>
              <td align="left" valign="middle"><select name="kelas" class="input" id="kelas">
                <?php
                $sx = "SELECT * FROM kelas ORDER BY kelas ASC";
                $dx = mysql_query($sx);
                while ($tx = mysql_fetch_array($dx)) {
					if ($tx['kid'] == $t['kid']) { $select = 'selected="selected"'; }
					else { $select = ""; }
                    ?>
                    <option value="<?php echo $tx['kid']; ?>" <?php echo $select; ?>><?php echo $tx['kelas']; ?></option>
                <?php	
                }
                ?>
              </select></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Nama Guru :</td>
              <td align="left" valign="middle"><select name="guru" class="input" id="guru">
                <?php
                $sx = "SELECT * FROM user  
                    WHERE ulevel = 2
                    ORDER BY unama ASC
                ";
                $dx = mysql_query($sx);
                while ($tx = mysql_fetch_array($dx)) {
					if ($tx['unokp'] == $t['unokp']) { $select = 'selected="selected"'; }
					else { $select = ""; }
                    ?>
                    <option value="<?php echo $tx['unokp']; ?>" <?php echo $select; ?>><?php echo $tx['unama'] . " (" . $tx['unokp'] . ")"; ?></option>
                <?php	
                }
                ?>
              </select></td>
            </tr>
            <tr>
              <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
              <td align="left" valign="top"><input name="id" type="hidden" id="id" value="<?php echo $t['sidk']; ?>" />
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
		  echo '<meta http-equiv="Refresh" content="0;url=sesi.php?menu=senarai">';
	  }
	  ?>
    <br></td>
  </tr>
</table>

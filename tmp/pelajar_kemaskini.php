<table width="100%" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="100%" align="center" valign="top">
      <br />
      <?php
	  //semak maklumat adalah sah
	  $s = "SELECT * FROM pelajar 
	  	WHERE pid = '" . input1($_GET['id']) . "'
	  ";
	  $d = mysql_query($s);
	  //jika maklumat ada sah
	  if (mysql_num_rows($d) == 1) {
		  $t = mysql_fetch_array($d);
		  ?>
          <form name="pelajar" action="pelajar.php?menu=kemaskini" method="post">
          <table width="70%" border="1" cellspacing="0" cellpadding="5">
            <tr>
              <td align="center" bgcolor="#49A3FF" class="tkmenu2">KEMASKINI MAKLUMAT PELAJAR</td>
            </tr>
          </table>
          <table width="70%" border="1" cellspacing="0" cellpadding="3" class="table2">
            <tr>
              <td width="27%" align="right" valign="middle" bgcolor="#CCCCCC">No. Kad Pengenalan :</td>
              <td width="73%" align="left" valign="middle"><input name="nokp" type="text" value="<?php echo $t['pnokp']; ?>" class="input" id="nokp" size="15" maxlength="12" readonly="readonly" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Nama Penuh :</td>
              <td align="left" valign="middle"><input name="nama" type="text" value="<?php echo $t['pnama']; ?>" class="input" id="nama" size="80" maxlength="250" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Jantina :</td>
              <td align="left" valign="middle"><select name="jantina" class="input" id="jantina">
                <option value="LELAKI" <?php if ($t['pjantina'] == "LELAKI") { echo 'selected="selectec"'; } ?>>LELAKI</option>
                <option value="PEREMPUAN" <?php if ($t['pjantina'] == "PEREMPUAN") { echo 'selected="selectec"'; } ?>>PEREMPUAN</option>
              </select></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Angka Giliran :</td>
              <td align="left" valign="middle"><input name="giliran" type="text" value="<?php echo $t['pnogiliran']; ?>" class="input" id="giliran" size="20" maxlength="20" /></td>
            </tr>
            <tr>
              <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
              <td align="left" valign="top"><input name="id" type="hidden" id="id" value="<?php echo $t['pid']; ?>" />
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
		  echo '<meta http-equiv="Refresh" content="0;url=pelajar.php?menu=senarai">';
	  }
	  ?>
    <br></td>
  </tr>
</table>

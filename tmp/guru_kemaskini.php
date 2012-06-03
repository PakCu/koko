<table width="100%" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="100%" align="center" valign="top">
      <br />
      <?php
	  //semak maklumat adalah sah
	  $s = "SELECT * FROM user 
	  	WHERE uid = '" . input1($_GET['id']) . "'
	  ";
	  $d = mysql_query($s);
	  //jika maklumat ada sah
	  if (mysql_num_rows($d) == 1) {
		  $t = mysql_fetch_array($d);
		  ?>
          <form name="guru" action="guru.php?menu=kemaskini" method="post">
          <table width="70%" border="1" cellspacing="0" cellpadding="5">
            <tr>
              <td align="center" bgcolor="#49A3FF" class="tkmenu2">KEMASKINI MAKLUMAT GURU</td>
            </tr>
          </table>
          <table width="70%" border="1" cellspacing="0" cellpadding="3" class="table2">
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Level :</td>
              <td align="left" valign="middle"><select name="level" class="input" id="level">
                <option value="1" <?php if ($t['ulevel'] == 1) { echo 'selected="selected"'; } ?>>PENTADBIR</option>
                <option value="2" <?php if ($t['ulevel'] == 2) { echo 'selected="selected"'; } ?>>GURU</option>
              </select></td>
            </tr>
            <tr>
              <td width="27%" align="right" valign="middle" bgcolor="#CCCCCC">No. Kad Pengenalan :</td>
              <td width="73%" align="left" valign="middle"><input name="nokp" type="text" class="input" id="nokp" value="<?php echo $t['unokp']; ?>" size="15" maxlength="12" readonly="readonly" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Nama Penuh :</td>
              <td align="left" valign="middle"><input name="nama" type="text" value="<?php echo $t['unama']; ?>" class="input" id="nama" size="80" maxlength="250" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Jawatan :</td>
              <td align="left" valign="middle"><input name="jawatan" type="text" value="<?php echo $t['ujawatan']; ?>" class="input" id="jawatan" size="80" maxlength="250" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">&nbsp;</td>
              <td align="left" valign="middle" class="tkmenu2"><span  class="tkmarkah">Katalaluan bagi pendaftaran baru adalah sama dengan no. kad pengenalan</span></td>
            </tr>
            <tr>
              <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
              <td align="left" valign="top"><input name="id" type="hidden" id="id" value="<?php echo $t['uid']; ?>" />
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
		  echo '<meta http-equiv="Refresh" content="0;url=guru.php?menu=senarai">';
	  }
	  ?>
    <br></td>
  </tr>
</table>

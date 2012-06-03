<table width="100%" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="100%" align="center" valign="top">
      <br />
      <?php
	  //semak maklumat adalah sah
	  $s = "SELECT * FROM tahun 
	  	WHERE tahun = '" . input1($_GET['id']) . "'
	  ";
	  $d = mysql_query($s);
	  //jika maklumat ada sah
	  if (mysql_num_rows($d) == 1) {
		  $t = mysql_fetch_array($d);
		  ?>
          <form name="tahun" action="tahun.php?menu=daftar" method="post">
          <table width="40%" border="1" cellspacing="0" cellpadding="5">
            <tr>
              <td align="center" bgcolor="#49A3FF" class="tkmenu2">KEMASKINI TAHUN PERSEKOLAHAN</td>
            </tr>
          </table>
          <table width="40%" border="1" cellspacing="0" cellpadding="3" class="table2">
            <tr>
              <td width="28%" align="right" valign="middle" bgcolor="#CCCCCC">Tahun :</td>
              <td width="72%" align="left" valign="middle"><input name="tahun" type="text" value="<?php echo $t['tahun']; ?>" class="input" id="tahun" size="8" maxlength="4" />
                <span  class="tkmarkah">cth: 2012</span></td>
              </tr>
            <tr>
              <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
              <td align="left" valign="top"><input name="id" type="hidden" id="id" value="<?php echo $t['tid']; ?>" />
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
		  echo '<meta http-equiv="Refresh" content="0;url=tahun.php?menu=senarai">';
	  }
	  ?>
    <br></td>
  </tr>
</table>

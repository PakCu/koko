<table width="100%" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="100%" align="center" valign="top">
      <br />
      <?php
	  //semak maklumat adalah sah
	  $s = "SELECT * FROM kelas 
	  	WHERE kid = '" . input1($_GET['id']) . "'
	  ";
	  $d = mysql_query($s);
	  //jika maklumat ada sah
	  if (mysql_num_rows($d) == 1) {
		  $t = mysql_fetch_array($d);
		  ?>
          <form name="kelas" action="kelas.php?menu=kemaskini" method="post">
          <table width="50%" border="1" cellspacing="0" cellpadding="5">
            <tr>
              <td align="center" bgcolor="#49A3FF" class="tkmenu2">KEMASKINI MAKLUMAT KELAS</td>
            </tr>
          </table>
          <table width="50%" border="1" cellspacing="0" cellpadding="3" class="table2">
            <tr>
              <td width="25%" align="right" valign="middle" bgcolor="#CCCCCC">Nama Kelas :</td>
              <td width="75%" align="left" valign="middle"><input name="kelas" type="text" value="<?php echo $t['kelas']; ?>" class="input" id="kelas" size="45" maxlength="200" />
                <span  class="tkmarkah">cth: 1 Amanah</span></td>
            </tr>
            <tr>
              <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
              <td align="left" valign="top"><input name="id" type="hidden" id="id" value="<?php echo $t['kid']; ?>" />
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
		  echo '<meta http-equiv="Refresh" content="0;url=kelas.php?menu=senarai">';
	  }
	  ?>
    <br></td>
  </tr>
</table>

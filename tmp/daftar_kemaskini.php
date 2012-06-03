<table width="100%" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="100%" align="center" valign="top">
    <br />
      <?php
	  //semak maklumat adalah sah
	  $s = "SELECT s.*, d.*, k.*, p.*
		FROM sesipelajar AS s, sesikelas AS d, kelas AS k, pelajar AS p
		WHERE s.sidk = d.sidk
		AND s.pnokp = p.pnokp
		AND d.kid = k.kid
		AND s.sidp = '" . input1($_GET['id']) . "'
		ORDER BY s.sidp ASC
	  ";
	  $d = mysql_query($s);
	  //jika maklumat ada sah
	  if (mysql_num_rows($d) == 1) {
		  $t = mysql_fetch_array($d);
		  ?>
      	  <form name="koko" action="daftar.php?menu=kemaskini" method="post">
          <table width="70%" border="1" cellspacing="0" cellpadding="5">
            <tr>
              <td align="center" bgcolor="#49A3FF" class="tkmenu2">MAKLUMAT PELAJAR</td>
            </tr>
          </table>
          <table width="70%" border="1" cellspacing="0" cellpadding="3" class="table2">
            <tr>
              <td width="24%" align="right" valign="middle" bgcolor="#CCCCCC">Nama Pelajar :</td>
              <td width="76%" align="left" valign="middle"><?php echo output1($t['pnama']); ?></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Nama Kelas :</td>
              <td align="left" valign="middle"><?php echo output1($t['kelas']); ?></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">No Kad Pengenalan :</td>
              <td align="left" valign="middle"><?php echo output1($t['pnokp']); ?></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Angka Giliran :</td>
              <td align="left" valign="middle"><?php if (!empty($t['pnogiliran'])) { echo output1($t['pnogiliran']); } else { echo "&nbsp;"; } ?></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Jantina :</td>
              <td align="left" valign="middle"><?php echo output1($t['pjantina']); ?></td>
            </tr>
          </table>
          <table width="70%" border="1" cellspacing="0" cellpadding="5">
            <tr>
              <td align="center" bgcolor="#49A3FF" class="tkmenu2">MAKLUMAT KOKURIKULUM</td>
            </tr>
          </table>
          <table width="70%" border="1" cellspacing="0" cellpadding="3" class="table2">
            <tr>
              <td width="24%" align="right" valign="middle" bgcolor="#CCCCCC">Badan Uniform :</td>
              <td width="76%" align="left" valign="middle"><select name="uniform" class="input" id="uniform">
                <?php
                $sx = "SELECT * FROM kokurikulum WHERE aid = 1 ORDER BY kokurikulum ASC";
                $dx = mysql_query($sx);
                while ($tx = mysql_fetch_array($dx)) {
					if ($tx['oid'] == $t['uniform']) { $select = 'selected="selected"'; }
					else { $select = ""; }
                    ?>
                <option value="<?php echo $tx['oid']; ?>" <?php echo $select; ?>><?php echo $tx['kokurikulum']; ?></option>
                <?php	
                }
                ?>
              </select></td>
            </tr>
            <tr>
              <td width="24%" align="right" valign="middle" bgcolor="#CCCCCC">Kelab/Persatuan :</td>
              <td width="76%" align="left" valign="middle"><select name="kelab" class="input" id="kelab">
                <?php
                $sx = "SELECT * FROM kokurikulum WHERE aid = 2 ORDER BY kokurikulum ASC";
                $dx = mysql_query($sx);
                while ($tx = mysql_fetch_array($dx)) {
					if ($tx['oid'] == $t['kelab']) { $select = 'selected="selected"'; }
					else { $select = ""; }
                    ?>
                <option value="<?php echo $tx['oid']; ?>" <?php echo $select; ?>><?php echo $tx['kokurikulum']; ?></option>
                <?php	
                }
                ?>
              </select></td>
            </tr>
            <tr>
              <td width="24%" align="right" valign="middle" bgcolor="#CCCCCC">Sukan/Permainan :</td>
              <td width="76%" align="left" valign="middle"><select name="sukan" class="input" id="sukan">
                <?php
                $sx = "SELECT * FROM kokurikulum WHERE aid = 3 ORDER BY kokurikulum ASC";
                $dx = mysql_query($sx);
                while ($tx = mysql_fetch_array($dx)) {
					if ($tx['oid'] == $t['sukan']) { $select = 'selected="selected"'; }
					else { $select = ""; }
                    ?>
                <option value="<?php echo $tx['oid']; ?>" <?php echo $select; ?>><?php echo $tx['kokurikulum']; ?></option>
                <?php	
                }
                ?>
              </select></td>
            </tr>
            <tr>
              <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
              <td align="left" valign="top"><input name="id" type="hidden" id="id" value="<?php echo $t['sidp']; ?>" />
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

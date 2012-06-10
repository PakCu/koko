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
      	  <form name="koko" action="markah.php?menu=kemaskini" method="post">
          <table width="70%" border="1" cellspacing="0" cellpadding="5">
            <tr>
              <td align="center" bgcolor="#49A3FF" class="tkmenu2">MAKLUMAT PELAJAR</td>
            </tr>
          </table>
          <table width="70%" border="1" cellspacing="0" cellpadding="3" class="table2">
            <tr>
              <td width="25%" align="right" valign="middle" bgcolor="#CCCCCC">Nama Pelajar :</td>
              <td width="75%" align="left" valign="middle"><?php echo output1($t['pnama']); ?></td>
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
              <td align="right" valign="middle" bgcolor="#CCCCCC">Badan Uniform :</td>
              <td align="left" valign="middle" class="tkmenu2">
              	<?php
				//dptkan maklumat koko uniform pelajar
				$sa = "SELECT * FROM kokurikulum 
					WHERE oid = '".$t['uniform']."'
					ORDER BY oid ASC
				";
				$da = mysql_query($sa);
				$ta = mysql_fetch_array($da);
				if (!empty($ta['kokurikulum'])) { echo $ta['kokurikulum']; } else { echo "&nbsp;"; }
				?>
              </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Jawatan :</td>
              <td align="left" valign="middle">
              	<select name="jawatan1" class="input" id="jawatan1" onchange="mjawat1(this.value);" onfocus="startKira1();" onblur="stopKira();">
					<?php
                    $sx = "SELECT * FROM jawatanuniform ORDER BY markah DESC,jawatan ASC";
                    $dx = mysql_query($sx);
                    while ($tx = mysql_fetch_array($dx)) {
                        if ($tx['jawatan'] == $t['jawatan1']) { $select = 'selected="selected"'; }
                        else { $select = ""; }
                        ?>
                    <option value="<?php echo $tx['jawatan']."|".$tx['markah']; ?>" <?php echo $select; ?>><?php echo $tx['jawatan']; ?></option>
                    <?php	
                    }
                    ?>
              	</select>
                <input name="jawat1" type="hidden" value="<?php if (!empty($t['jawatan1'])) { echo $t['jawat1']; } else { echo "10"; } ?>" />
              </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Penglibatan :</td>
              <td align="left" valign="middle">
              	<select name="penglibatan1" class="input" id="penglibatan1" onchange="mlibat1(this.value);" onfocus="startKira1();" onblur="stopKira();">
					<?php
                    $sx = "SELECT * FROM penglibatan ORDER BY markah ASC";
                    $dx = mysql_query($sx);
                    while ($tx = mysql_fetch_array($dx)) {
                        if ($tx['penglibatan'] == $t['penglibatan1']) { $select = 'selected="selected"'; }
                        else { $select = ""; }
                        ?>
                    <option value="<?php echo $tx['penglibatan']."|".$tx['markah']; ?>" <?php echo $select; ?>><?php echo $tx['penglibatan']; ?></option>
                    <?php	
                    }
                    ?>
              	</select>
                <input name="libat1" type="hidden" value="<?php if (!empty($t['penglibatan1'])) { echo $t['libat1']; } else { echo "8"; } ?>" />
              </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Pencapaian :</td>
              <td align="left" valign="middle">
              	<select name="pencapaian1" class="input" id="pencapaian1" onchange="mcapai1(this.value);" onfocus="startKira1();" onblur="stopKira();">
                    <option value=""></option>
                    <option value="JOHAN" <?php if ($t['pencapaian1'] == "JOHAN") { echo 'selected="selected"'; } ?>>JOHAN</option>
                    <option value="NAIB JOHAN" <?php if ($t['pencapaian1'] == "NAIB JOHAN") { echo 'selected="selected"'; } ?>>NAIB JOHAN</option>
                    <option value="KETIGA" <?php if ($t['pencapaian1'] == "KETIGA") { echo 'selected="selected"'; } ?>>KETIGA</option>
              	</select>
                <input name="capai1" type="hidden" value="<?php if (!empty($t['pencapaian1'])) { echo $t['capai1']; } else { echo "0"; } ?>" />
              </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Jumlah Perjumpaan :</td>
              <td align="left" valign="middle"><input name="hadir1" type="text" class="input" id="hadir1" value="18" size="5" maxlength="2" readonly="readonly" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Jumlah Kehadiran :</td>
              <td align="left" valign="middle"><input name="hadir2" type="text" class="input" id="hadir2" value="<?php echo $t['hadir2']; ?>" size="5" maxlength="2" onkeyup="nombor();" onfocus="startKira1();" onblur="stopKira();" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Tidak Hadir Dengan Kenyataan :</td>
              <td align="left" valign="middle"><input name="hadir3" type="text" class="input" id="hadir3" value="<?php echo $t['hadir3']; ?>" size="5" maxlength="2" onkeyup="nombor();" onfocus="startKira1();" onblur="stopKira();" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC" class="tkmenu2">Jumlah Markah :</td>
              <td align="left" valign="middle"><input name="markah1" type="text" class="input" id="markah1" value="<?php echo $t['markah1']; ?>" size="5" maxlength="2" readonly="readonly" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC" class="tkmenu2">Gred :</td>
              <td align="left" valign="middle"><input name="gred1" type="text" class="input" id="gred1" value="<?php if (!empty($t['gred1'])) { echo $t['gred1']; } else { echo "E"; } ?>" size="5" maxlength="2" readonly="readonly" /></td>
            </tr>
            <tr>
              <td width="25%" align="right" valign="middle" bgcolor="#CCCCCC">&nbsp;</td>
              <td width="75%" align="left" valign="middle">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Kelab/Persatuan :</td>
              <td align="left" valign="middle" class="tkmenu2">
              	<?php
				//dptkan maklumat koko uniform pelajar
				$sa = "SELECT * FROM kokurikulum 
					WHERE oid = '".$t['kelab']."'
					ORDER BY oid ASC
				";
				$da = mysql_query($sa);
				$ta = mysql_fetch_array($da);
				if (!empty($ta['kokurikulum'])) { echo $ta['kokurikulum']; } else { echo "&nbsp;"; }
				?>
              </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Jawatan :</td>
              <td align="left" valign="middle">
              	<select name="jawatan2" class="input" id="jawatan2" onchange="mjawat2(this.value);" onfocus="startKira2();" onblur="stopKira();">
					<?php
                    $sx = "SELECT * FROM jawatankelab ORDER BY markah DESC,jawatan ASC";
                    $dx = mysql_query($sx);
                    while ($tx = mysql_fetch_array($dx)) {
                        if ($tx['jawatan'] == $t['jawatan2']) { $select = 'selected="selected"'; }
                        else { $select = ""; }
                        ?>
                    <option value="<?php echo $tx['jawatan']."|".$tx['markah']; ?>" <?php echo $select; ?>><?php echo $tx['jawatan']; ?></option>
                    <?php	
                    }
                    ?>
              	</select>
                <input name="jawat2" type="hidden" value="<?php if (!empty($t['jawatan2'])) { echo $t['jawat2']; } else { echo "10"; } ?>" />
              </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Penglibatan :</td>
              <td align="left" valign="middle">
              	<select name="penglibatan2" class="input" id="penglibatan2" onchange="mlibat2(this.value);" onfocus="startKira2();" onblur="stopKira();">
					<?php
                    $sx = "SELECT * FROM penglibatan ORDER BY markah ASC";
                    $dx = mysql_query($sx);
                    while ($tx = mysql_fetch_array($dx)) {
                        if ($tx['penglibatan'] == $t['penglibatan2']) { $select = 'selected="selected"'; }
                        else { $select = ""; }
                        ?>
                    <option value="<?php echo $tx['penglibatan']."|".$tx['markah']; ?>" <?php echo $select; ?>><?php echo $tx['penglibatan']; ?></option>
                    <?php	
                    }
                    ?>
              	</select>
                <input name="libat2" type="hidden" value="<?php if (!empty($t['penglibatan2'])) { echo $t['libat2']; } else { echo "8"; } ?>" />
              </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Pencapaian :</td>
              <td align="left" valign="middle">
              	<select name="pencapaian2" class="input" id="pencapaian2" onchange="mcapai2(this.value);" onfocus="startKira2();" onblur="stopKira();">
                    <option value=""></option>
                    <option value="JOHAN" <?php if ($t['pencapaian2'] == "JOHAN") { echo 'selected="selected"'; } ?>>JOHAN</option>
                    <option value="NAIB JOHAN" <?php if ($t['pencapaian2'] == "NAIB JOHAN") { echo 'selected="selected"'; } ?>>NAIB JOHAN</option>
                    <option value="KETIGA" <?php if ($t['pencapaian2'] == "KETIGA") { echo 'selected="selected"'; } ?>>KETIGA</option>
              	</select>
                <input name="capai2" type="hidden" value="<?php if (!empty($t['pencapaian2'])) { echo $t['capai2']; } else { echo "0"; } ?>" />
              </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Jumlah Perjumpaan :</td>
              <td align="left" valign="middle"><input name="hadir4" type="text" class="input" id="hadir4" value="12" size="5" maxlength="2" readonly="readonly" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Jumlah Kehadiran :</td>
              <td align="left" valign="middle"><input name="hadir5" type="text" class="input" id="hadir5" value="<?php echo $t['hadir5']; ?>" size="5" maxlength="2" onkeyup="nombor();" onfocus="startKira2();" onblur="stopKira();" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Tidak Hadir Dengan Kenyataan :</td>
              <td align="left" valign="middle"><input name="hadir6" type="text" class="input" id="hadir6" value="<?php echo $t['hadir6']; ?>" size="5" maxlength="2" onkeyup="nombor();" onfocus="startKira2();" onblur="stopKira();" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC" class="tkmenu2">Jumlah Markah :</td>
              <td align="left" valign="middle"><input name="markah2" type="text" class="input" id="markah2" value="<?php echo $t['markah2']; ?>" size="5" maxlength="2" readonly="readonly" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC" class="tkmenu2">Gred :</td>
              <td align="left" valign="middle"><input name="gred2" type="text" class="input" id="gred2" value="<?php if (!empty($t['gred2'])) { echo $t['gred2']; } else { echo "E"; } ?>" size="5" maxlength="2" readonly="readonly" /></td>
            </tr>
            <tr>
              <td width="25%" align="right" valign="middle" bgcolor="#CCCCCC">&nbsp;</td>
              <td width="75%" align="left" valign="middle">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Sukan/Permainan :</td>
              <td align="left" valign="middle" class="tkmenu2">
              	<?php
				//dptkan maklumat koko uniform pelajar
				$sa = "SELECT * FROM kokurikulum 
					WHERE oid = '".$t['sukan']."'
					ORDER BY oid ASC
				";
				$da = mysql_query($sa);
				$ta = mysql_fetch_array($da);
				if (!empty($ta['kokurikulum'])) { echo $ta['kokurikulum']; } else { echo "&nbsp;"; }
				?>
              </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Jawatan :</td>
              <td align="left" valign="middle">
              	<select name="jawatan3" class="input" id="jawatan3" onchange="mjawat3(this.value);" onfocus="startKira3();" onblur="stopKira();">
					<?php
                    $sx = "SELECT * FROM jawatankelab ORDER BY markah DESC,jawatan ASC";
                    $dx = mysql_query($sx);
                    while ($tx = mysql_fetch_array($dx)) {
                        if ($tx['jawatan'] == $t['jawatan3']) { $select = 'selected="selected"'; }
                        else { $select = ""; }
                        ?>
                    <option value="<?php echo $tx['jawatan']."|".$tx['markah']; ?>" <?php echo $select; ?>><?php echo $tx['jawatan']; ?></option>
                    <?php	
                    }
                    ?>
              	</select>
                <input name="jawat3" type="hidden" value="<?php if (!empty($t['jawatan3'])) { echo $t['jawat3']; } else { echo "10"; } ?>" />
              </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Penglibatan :</td>
              <td align="left" valign="middle">
              	<select name="penglibatan3" class="input" id="penglibatan3" onchange="mlibat3(this.value);" onfocus="startKira3();" onblur="stopKira();">
					<?php
                    $sx = "SELECT * FROM penglibatan ORDER BY markah ASC";
                    $dx = mysql_query($sx);
                    while ($tx = mysql_fetch_array($dx)) {
                        if ($tx['penglibatan'] == $t['penglibatan3']) { $select = 'selected="selected"'; }
                        else { $select = ""; }
                        ?>
                    <option value="<?php echo $tx['penglibatan']."|".$tx['markah']; ?>" <?php echo $select; ?>><?php echo $tx['penglibatan']; ?></option>
                    <?php	
                    }
                    ?>
              	</select>
                <input name="libat3" type="hidden" value="<?php if (!empty($t['penglibatan3'])) { echo $t['libat3']; } else { echo "8"; } ?>" />
              </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Pencapaian :</td>
              <td align="left" valign="middle">
              	<select name="pencapaian3" class="input" id="pencapaian3" onchange="mcapai3(this.value);" onfocus="startKira3();" onblur="stopKira();">
                    <option value=""></option>
                    <option value="JOHAN" <?php if ($t['pencapaian3'] == "JOHAN") { echo 'selected="selected"'; } ?>>JOHAN</option>
                    <option value="NAIB JOHAN" <?php if ($t['pencapaian3'] == "NAIB JOHAN") { echo 'selected="selected"'; } ?>>NAIB JOHAN</option>
                    <option value="KETIGA" <?php if ($t['pencapaian3'] == "KETIGA") { echo 'selected="selected"'; } ?>>KETIGA</option>
              	</select>
                <input name="capai3" type="hidden" value="<?php if (!empty($t['pencapaian3'])) { echo $t['capai3']; } else { echo "0"; } ?>" />
              </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Jumlah Perjumpaan :</td>
              <td align="left" valign="middle"><input name="hadir7" type="text" class="input" id="hadir7" value="12" size="5" maxlength="2" readonly="readonly" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Jumlah Kehadiran :</td>
              <td align="left" valign="middle"><input name="hadir8" type="text" class="input" id="hadir8" value="<?php echo $t['hadir8']; ?>" size="5" maxlength="2" onkeyup="nombor();" onfocus="startKira3();" onblur="stopKira();" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Tidak Hadir Dengan Kenyataan :</td>
              <td align="left" valign="middle"><input name="hadir9" type="text" class="input" id="hadir9" value="<?php echo $t['hadir9']; ?>" size="5" maxlength="2" onkeyup="nombor();" onfocus="startKira3();" onblur="stopKira();" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC" class="tkmenu2">Jumlah Markah :</td>
              <td align="left" valign="middle"><input name="markah3" type="text" class="input" id="markah3" value="<?php echo $t['markah3']; ?>" size="5" maxlength="2" readonly="readonly" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC" class="tkmenu2">Gred :</td>
              <td align="left" valign="middle"><input name="gred3" type="text" class="input" id="gred3" value="<?php if (!empty($t['gred3'])) { echo $t['gred3']; } else { echo "E"; } ?>" size="5" maxlength="2" readonly="readonly" /></td>
            </tr>
            <tr>
              <td width="25%" align="right" valign="middle" bgcolor="#CCCCCC">&nbsp;</td>
              <td width="75%" align="left" valign="middle">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Markah Bonus :</td>
              <td align="left" valign="middle" class="tkmenu2"><select name="bonus" class="input" id="bonus" onchange="mbonus(this.value);">
              	<option value=""></option>
                <?php
				$sx = "SELECT * FROM bonus ORDER BY markah DESC,bonus ASC";
				$dx = mysql_query($sx);
				while ($tx = mysql_fetch_array($dx)) {
					if ($tx['bonus'] == $t['bonus']) { $select = 'selected="selected"'; }
					else { $select = ""; }
					?>
                	<option value="<?php echo $tx['bonus']."|".$tx['markah']; ?>" <?php echo $select; ?>><?php echo $tx['bonus']; ?></option>
                <?php	
                }
                ?>
              </select>
              <input name="bns" type="hidden" value="<?php if (!empty($t['bonus'])) { echo $t['bns']; } else { echo "0"; } ?>" /></td>
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

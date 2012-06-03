<table width="100%" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="100%" align="center" valign="top">
      <table width="70%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td align="center" class="tkmenu3">[ <a href="sesi.php?menu=kelas">TAMBAH KELAS & GURU</a> ] [ <a href="sesi.php?menu=pelajar">TAMBAH PELAJAR</a> ]</td>
        </tr>
      </table>
      <form name="kelas" action="sesi.php?menu=kelas" method="post">
      <table width="70%" border="1" cellspacing="0" cellpadding="5">
        <tr>
          <td align="center" bgcolor="#49A3FF" class="tkmenu2">DAFTAR KELAS SESI PERSEKOLAHAN</td>
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
				?>
                <option value="<?php echo $tx['tahun']; ?>"><?php echo $tx['tahun']; ?></option>
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
				?>
	            <option value="<?php echo $tx['kid']; ?>"><?php echo $tx['kelas']; ?></option>
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
				?>
	            <option value="<?php echo $tx['unokp']; ?>"><?php echo $tx['unama'] . " (" . $tx['unokp'] . ")"; ?></option>
            <?php	
			}
			?>
          </select></td>
        </tr>
        <tr>
          <td align="right" valign="top" bgcolor="#CCCCCC">&nbsp;</td>
          <td align="left" valign="top"><input name="submit" type="submit" class="button" id="submit" value="Hantar" />
            <input name="Reset" type="reset" class="button" id="submit" value="Reset" /></td>
        </tr>
      </table>
      </form>
    <br></td>
  </tr>
</table>

<table width="100%" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="75%" align="left" valign="top">
      <table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tr>
          <td align="left" bgcolor="#49A3FF" class="tkmenu2">:: Sistem Penilian Kokurikulum Sekolah</td>
        </tr>
      </table>
      <table width="100%" border="1" cellspacing="0" cellpadding="5" class="table2">
        <tr>
          <td align="left">Pengenalan mengenai sistem</td>
        </tr>
      </table>
    </td>
    <td width="25%" align="right" valign="top">
      <table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tr>
          <td align="left" bgcolor="#49A3FF" class="tkmenu2">
          	<?php
			//jika dah login
			if (isset($_SESSION['user'])) { echo ":: Selamat Datang"; }
			//jika belom
			else { echo ":: Log Masuk"; }
			?>
          </td>
        </tr>
      </table>
      <?php
	  //jika dah login paparkan maklumat user
	  if (isset($_SESSION['user'])) {
		  ?>
          <table width="100%" border="1" cellspacing="0" cellpadding="5" class="table2">
            <tr>
              <td align="left">
              <table width="100%" border="0" cellspacing="0" cellpadding="2" class="table2">
                <tr>
                  <td width="100%" align="center" valign="middle">
                    <span class="tkmenu2"><?php echo output1($tm['unama']); ?></span><br>
                	<?php echo output1($tm['unokp']) . "<br>" . output1($tm['ujawatan']); ?>
				  </td>
                </tr>
              </table>
              </td>
            </tr>
          </table>
      <?php
	  }
	  //jika belum login paparkan form login
	  else {
		  ?>
          <form name="login" action="profil.php?menu=login" method="post">
          <table width="100%" border="1" cellspacing="0" cellpadding="5" class="table2">
            <tr>
              <td align="left">
              <table width="100%" border="0" cellspacing="0" cellpadding="2" class="table2">
                <tr>
                  <td width="35%" align="left" valign="middle">No. K/P</td>
                  <td width="65%" align="left" valign="middle"><input name="nokp" type="text" class="input2" id="nokp" size="22" maxlength="12"></td>
                </tr>
                <tr>
                  <td align="left" valign="middle">Katalaluan</td>
                  <td align="left" valign="middle"><input name="pass" type="password" class="input2" id="pass" size="22" maxlength="20"></td>
                </tr>
                <tr>
                  <td align="left" valign="middle">&nbsp;</td>
                  <td align="left" valign="middle"><input name="submit" type="submit" class="button" id="submit" value="Hantar">
                    <input name="Reset" type="reset" class="button" id="submit" value="Reset"></td>
                </tr>
              </table>
              </td>
            </tr>
          </table>
      <?php
	  }
	  ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td class="tksep">&nbsp;</td></tr></table>
      <table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tr>
          <td align="left" bgcolor="#49A3FF" class="tkmenu2">:: Pengumuman</td>
        </tr>
      </table>
      <table width="100%" border="1" cellspacing="0" cellpadding="5" class="table2">
        <tr>
          <td align="left">
            <DIV id="marqueecontainer" onmouseover="copyspeed=pausespeed" onmouseout="copyspeed=marqueespeed">
            <DIV style="width: 98%; position: absolute;" id="vmarquee">
            <?php
			//limit 10 berita terkini
			$sx = "SELECT * FROM info
				ORDER BY id DESC
				LIMIT 0,10
			";
			$dx = mysql_query($sx);
			//$dx = mysql_query($sx) or die(mysql_error().$sx);
			while ($tx = mysql_fetch_array($dx)) {
				?>
            	&plusmn; <?php echo ucfirst(output2($tx['info'])); ?><br>
            <?php
			}
			?>
            </DIV></DIV>
          </td>
        </tr>
      </table>
      </form>
    </td>
  </tr>
</table>

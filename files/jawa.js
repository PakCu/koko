// DROPDOWN MENU
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;
function mopen(id)
{	
	mcancelclosetime();
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';
}
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}
document.onclick = mclose; 

// MARQUEE
var delayb4scroll=2000;
var marqueespeed=1; 
var pauseit=1; 

var copyspeed=marqueespeed;
var pausespeed=(pauseit==0)? copyspeed: 0;
var actualheight='';

function scrollmarquee(){
	if (parseInt(cross_marquee.style.top)>(actualheight*(-1)+8))
		cross_marquee.style.top=parseInt(cross_marquee.style.top)-copyspeed+"px";
	else
		cross_marquee.style.top=parseInt(marqueeheight)+8+"px";
}

function initializemarquee(){
	cross_marquee=document.getElementById("vmarquee");
	cross_marquee.style.top=0;
	marqueeheight=document.getElementById("marqueecontainer").offsetHeight;
	actualheight=cross_marquee.offsetHeight;
	if (window.opera || navigator.userAgent.indexOf("Netscape/7")!=-1){ 
		cross_marquee.style.height=marqueeheight+"px";
		cross_marquee.style.overflow="scroll";
		return;
	}
	setTimeout('lefttime=setInterval("scrollmarquee()",30)', delayb4scroll);
}

if (window.addEventListener) {
	window.addEventListener("load", initializemarquee, false);
}
else if (window.attachEvent) {
	window.attachEvent("onload", initializemarquee);
}
else if (document.getElementById) {
	window.onload=initializemarquee;
}

// NOMBOR ONLY
function nombor() {
	if (document.koko.hadir2) {
		if (isNaN(document.koko.hadir2.value)) {
			alert("Sila masukkan nombor sahaja!!");
			document.koko.hadir2.value = "";
			document.koko.hadir2.focus();
			return false;
		}
	}
	if (document.koko.hadir3) {
		if (isNaN(document.koko.hadir3.value)) {
			alert("Sila masukkan nombor sahaja!!");
			document.koko.hadir3.value = "";
			document.koko.hadir3.focus();
			return false;
		}
	}
	if (document.koko.hadir5) {
		if (isNaN(document.koko.hadir5.value)) {
			alert("Sila masukkan nombor sahaja!!");
			document.koko.hadir5.value = "";
			document.koko.hadir5.focus();
			return false;
		}
	}
	if (document.koko.hadir6) {
		if (isNaN(document.koko.hadir6.value)) {
			alert("Sila masukkan nombor sahaja!!");
			document.koko.hadir6.value = "";
			document.koko.hadir6.focus();
			return false;
		}
	}
	if (document.koko.hadir8) {
		if (isNaN(document.koko.hadir8.value)) {
			alert("Sila masukkan nombor sahaja!!");
			document.koko.hadir8.value = "";
			document.koko.hadir8.focus();
			return false;
		}
	}
	if (document.koko.hadir9) {
		if (isNaN(document.koko.hadir9.value)) {
			alert("Sila masukkan nombor sahaja!!");
			document.koko.hadir9.value = "";
			document.koko.hadir9.focus();
			return false;
		}
	}
	else { return true; }
}

// AUTOFILL ON CHANGE 
function mjawat1(opt) {
	var jawat = document.koko.jawatan1.options[document.koko.jawatan1.selectedIndex].value;
	var jawatan = jawat.split("|")
	document.koko.jawat1.value = jawatan[1];
}
function mlibat1(opt) {
	var libat = document.koko.penglibatan1.options[document.koko.penglibatan1.selectedIndex].value;
	var libatan = libat.split("|")
	document.koko.libat1.value = libatan[1];
	
	var capai = document.koko.pencapaian1.options[document.koko.pencapaian1.selectedIndex].value;
	if (libatan[1] == 11) { 
		if (capai == "JOHAN") { var nilai = 11; }
		else if (capai == "NAIB JOHAN") { var nilai = 10; }
		else if (libat == "KETIGA") { var nilai = 9; }
		else { var nilai = 0; }
	}
	else if (libatan[1] == 14) { 
		if (capai == "JOHAN") { var nilai = 14; }
		else if (capai == "NAIB JOHAN") { var nilai = 13; }
		else if (libat == "KETIGA") { var nilai = 12; }
		else { var nilai = 0; }
	}
	else if (libatan[1] == 17) { 
		if (capai == "JOHAN") { var nilai = 17; }
		else if (capai == "NAIB JOHAN") { var nilai = 16; }
		else if (libat == "KETIGA") { var nilai = 15; }
		else { var nilai = 0; }
	}
	else if (libatan[1] == 20) { 
		if (capai == "JOHAN") { var nilai = 20; }
		else if (capai == "NAIB JOHAN") { var nilai = 19; }
		else if (libat == "KETIGA") { var nilai = 18; }
		else { var nilai = 0; }
	}
	else { 
		if (capai == "JOHAN") { var nilai = 8; }
		else if (capai == "NAIB JOHAN") { var nilai = 7; }
		else if (libat == "KETIGA") { var nilai = 6; }
		else { var nilai = 0; }
	}
	document.koko.capai1.value = nilai;
}
function mcapai1(opt) {
	var libat = document.koko.penglibatan1.options[document.koko.penglibatan1.selectedIndex].value;
	if (opt == "JOHAN") { 
		if (libat == "ZON/DAERAH/BAHAGIAN|11") { var nilai = 11; }
		else if (libat == "NEGERI|14") { var nilai = 14; }
		else if (libat == "KEBANGSAAN|17") { var nilai = 17; }
		else if (libat == "ANTARABANGSA|20") { var nilai = 20; }
		else { var nilai = 8; }
	}
	else if (opt == "NAIB JOHAN") { 
		if (libat == "ZON/DAERAH/BAHAGIAN|11") { var nilai = 10; }
		else if (libat == "NEGERI|14") { var nilai = 13; }
		else if (libat == "KEBANGSAAN|17") { var nilai = 16; }
		else if (libat == "ANTARABANGSA|20") { var nilai = 19; }
		else { var nilai = 7; }
	}
	else if (opt == "KETIGA") { 
		if (libat == "ZON/DAERAH/BAHAGIAN|11") { var nilai = 9; }
		else if (libat == "NEGERI|14") { var nilai = 12; }
		else if (libat == "KEBANGSAAN|17") { var nilai = 15; }
		else if (libat == "ANTARABANGSA|20") { var nilai = 18; }
		else { var nilai = 6; }
	}
	else { var nilai = 0; }
	document.koko.capai1.value = nilai;
}
function mjawat2(opt) {
	var jawat = document.koko.jawatan2.options[document.koko.jawatan2.selectedIndex].value;
	var jawatan = jawat.split("|")
	document.koko.jawat2.value = jawatan[1];
}
function mlibat2(opt) {
	var libat = document.koko.penglibatan2.options[document.koko.penglibatan2.selectedIndex].value;
	var libatan = libat.split("|")
	document.koko.libat2.value = libatan[1];
	
	var capai = document.koko.pencapaian2.options[document.koko.pencapaian2.selectedIndex].value;
	if (libatan[1] == 11) { 
		if (capai == "JOHAN") { var nilai = 11; }
		else if (capai == "NAIB JOHAN") { var nilai = 10; }
		else if (libat == "KETIGA") { var nilai = 9; }
		else { var nilai = 0; }
	}
	else if (libatan[1] == 14) { 
		if (capai == "JOHAN") { var nilai = 14; }
		else if (capai == "NAIB JOHAN") { var nilai = 13; }
		else if (libat == "KETIGA") { var nilai = 12; }
		else { var nilai = 0; }
	}
	else if (libatan[1] == 17) { 
		if (capai == "JOHAN") { var nilai = 17; }
		else if (capai == "NAIB JOHAN") { var nilai = 16; }
		else if (libat == "KETIGA") { var nilai = 15; }
		else { var nilai = 0; }
	}
	else if (libatan[1] == 20) { 
		if (capai == "JOHAN") { var nilai = 20; }
		else if (capai == "NAIB JOHAN") { var nilai = 19; }
		else if (libat == "KETIGA") { var nilai = 18; }
		else { var nilai = 0; }
	}
	else { 
		if (capai == "JOHAN") { var nilai = 8; }
		else if (capai == "NAIB JOHAN") { var nilai = 7; }
		else if (libat == "KETIGA") { var nilai = 6; }
		else { var nilai = 0; }
	}
	document.koko.capai2.value = nilai;
}
function mcapai2(opt) {
	var libat = document.koko.penglibatan2.options[document.koko.penglibatan2.selectedIndex].value;
	if (opt == "JOHAN") { 
		if (libat == "ZON/DAERAH/BAHAGIAN|11") { var nilai = 11; }
		else if (libat == "NEGERI|14") { var nilai = 14; }
		else if (libat == "KEBANGSAAN|17") { var nilai = 17; }
		else if (libat == "ANTARABANGSA|20") { var nilai = 20; }
		else { var nilai = 8; }
	}
	else if (opt == "NAIB JOHAN") { 
		if (libat == "ZON/DAERAH/BAHAGIAN|11") { var nilai = 10; }
		else if (libat == "NEGERI|14") { var nilai = 13; }
		else if (libat == "KEBANGSAAN|17") { var nilai = 16; }
		else if (libat == "ANTARABANGSA|20") { var nilai = 19; }
		else { var nilai = 7; }
	}
	else if (opt == "KETIGA") { 
		if (libat == "ZON/DAERAH/BAHAGIAN|11") { var nilai = 9; }
		else if (libat == "NEGERI|14") { var nilai = 12; }
		else if (libat == "KEBANGSAAN|17") { var nilai = 15; }
		else if (libat == "ANTARABANGSA|20") { var nilai = 18; }
		else { var nilai = 6; }
	}
	else { var nilai = 0; }
	document.koko.capai2.value = nilai;
}
function mjawat3(opt) {
	var jawat = document.koko.jawatan3.options[document.koko.jawatan3.selectedIndex].value;
	var jawatan = jawat.split("|")
	document.koko.jawat3.value = jawatan[1];
}
function mlibat3(opt) {
	var libat = document.koko.penglibatan3.options[document.koko.penglibatan3.selectedIndex].value;
	var libatan = libat.split("|")
	document.koko.libat3.value = libatan[1];
	
	var capai = document.koko.pencapaian3.options[document.koko.pencapaian3.selectedIndex].value;
	if (libatan[1] == 11) { 
		if (capai == "JOHAN") { var nilai = 11; }
		else if (capai == "NAIB JOHAN") { var nilai = 10; }
		else if (libat == "KETIGA") { var nilai = 9; }
		else { var nilai = 0; }
	}
	else if (libatan[1] == 14) { 
		if (capai == "JOHAN") { var nilai = 14; }
		else if (capai == "NAIB JOHAN") { var nilai = 13; }
		else if (libat == "KETIGA") { var nilai = 12; }
		else { var nilai = 0; }
	}
	else if (libatan[1] == 17) { 
		if (capai == "JOHAN") { var nilai = 17; }
		else if (capai == "NAIB JOHAN") { var nilai = 16; }
		else if (libat == "KETIGA") { var nilai = 15; }
		else { var nilai = 0; }
	}
	else if (libatan[1] == 20) { 
		if (capai == "JOHAN") { var nilai = 20; }
		else if (capai == "NAIB JOHAN") { var nilai = 19; }
		else if (libat == "KETIGA") { var nilai = 18; }
		else { var nilai = 0; }
	}
	else { 
		if (capai == "JOHAN") { var nilai = 8; }
		else if (capai == "NAIB JOHAN") { var nilai = 7; }
		else if (libat == "KETIGA") { var nilai = 6; }
		else { var nilai = 0; }
	}
	document.koko.capai3.value = nilai;
}
function mcapai3(opt) {
	var libat = document.koko.penglibatan3.options[document.koko.penglibatan3.selectedIndex].value;
	if (opt == "JOHAN") { 
		if (libat == "ZON/DAERAH/BAHAGIAN|11") { var nilai = 11; }
		else if (libat == "NEGERI|14") { var nilai = 14; }
		else if (libat == "KEBANGSAAN|17") { var nilai = 17; }
		else if (libat == "ANTARABANGSA|20") { var nilai = 20; }
		else { var nilai = 8; }
	}
	else if (opt == "NAIB JOHAN") { 
		if (libat == "ZON/DAERAH/BAHAGIAN|11") { var nilai = 10; }
		else if (libat == "NEGERI|14") { var nilai = 13; }
		else if (libat == "KEBANGSAAN|17") { var nilai = 16; }
		else if (libat == "ANTARABANGSA|20") { var nilai = 19; }
		else { var nilai = 7; }
	}
	else if (opt == "KETIGA") { 
		if (libat == "ZON/DAERAH/BAHAGIAN|11") { var nilai = 9; }
		else if (libat == "NEGERI|14") { var nilai = 12; }
		else if (libat == "KEBANGSAAN|17") { var nilai = 15; }
		else if (libat == "ANTARABANGSA|20") { var nilai = 18; }
		else { var nilai = 6; }
	}
	else { var nilai = 0; }
	document.koko.capai3.value = nilai;
}
function mbonus() {
	var bonus = document.koko.bonus.options[document.koko.bonus.selectedIndex].value;
	var bonusSplit = bonus.split("|");
	document.koko.bns.value = bonusSplit[1];
}

// AUTO CALCULATE
function startKira1() {
  interval = setInterval("kira1()",1);
}
function kira1() {
  k1 = document.koko.jawat1.value;
  k2 = document.koko.libat1.value; 
  k3 = document.koko.capai1.value;
  k6 = document.koko.hadir2.value;
  k7 = document.koko.hadir3.value;
  k4 = (k6  * 1) / ((18 * 1) - (k7 * 1)) * 50;
  k5 = k4.toFixed(0);
  k6 = (k1 * 1) + (k2 * 1) + (k3 * 1) + (k5 * 1);
  document.koko.markah1.value = k6;
  if (k6 > 79) { document.koko.gred1.value = "A"; }
  else if (k6 > 59) { document.koko.gred1.value = "B"; }
  else if (k6 > 39) { document.koko.gred1.value = "C"; }
  else if (k6 > 19) { document.koko.gred1.value = "D"; }
  else { document.koko.gred1.value = "E"; }
}
function startKira2() {
  interval = setInterval("kira2()",1);
}
function kira2() {
  k1 = document.koko.jawat2.value;
  k2 = document.koko.libat2.value; 
  k3 = document.koko.capai2.value;
  k6 = document.koko.hadir5.value;
  k7 = document.koko.hadir6.value;
  k4 = (k6  * 1) / ((12 * 1) - (k7 * 1)) * 50;
  k5 = k4.toFixed(0);
  k6 = (k1 * 1) + (k2 * 1) + (k3 * 1) + (k5 * 1);
  document.koko.markah2.value = k6;
  if (k6 > 79) { document.koko.gred2.value = "A"; }
  else if (k6 > 59) { document.koko.gred2.value = "B"; }
  else if (k6 > 39) { document.koko.gred2.value = "C"; }
  else if (k6 > 19) { document.koko.gred2.value = "D"; }
  else { document.koko.gred2.value = "E"; }
}
function startKira3() {
  interval = setInterval("kira3()",1);
}
function kira3() {
  k1 = document.koko.jawat3.value;
  k2 = document.koko.libat3.value; 
  k3 = document.koko.capai3.value;
  k6 = document.koko.hadir8.value;
  k7 = document.koko.hadir9.value;
  k4 = (k6  * 1) / ((12 * 1) - (k7 * 1)) * 50;
  k5 = k4.toFixed(0);
  k6 = (k1 * 1) + (k2 * 1) + (k3 * 1) + (k5 * 1);
  document.koko.markah3.value = k6;
  if (k6 > 79) { document.koko.gred3.value = "A"; }
  else if (k6 > 59) { document.koko.gred3.value = "B"; }
  else if (k6 > 39) { document.koko.gred3.value = "C"; }
  else if (k6 > 19) { document.koko.gred3.value = "D"; }
  else { document.koko.gred3.value = "E"; }
}
function stopKira() {
  clearInterval(interval);
}
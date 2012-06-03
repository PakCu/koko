// Dropdown menu
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

// Marquee
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

if (window.addEventListener)
	window.addEventListener("load", initializemarquee, false);
else if (window.attachEvent)
	window.attachEvent("onload", initializemarquee);
else if (document.getElementById)
	window.onload=initializemarquee;

var offsetfrommouse = [30, 15];
//var displayduration=0;
//var currentimageheight = 500;
//var defaultimageheight = 40;
//var defaultimagewidth = 40;
//a=new Image(100,25); b=new Image(100,25); c=new Image(100,25);
//a.src="/images/loading.gif"; b.src="/images/wen.gif"; c.src="/images/bnow.gif";
document.write('<div style="display: none; position: absolute;z-index:110;left:-800px" id="trailimageid"></div>');
function gettrailobj()
{ if (document.getElementById) return document.getElementById("trailimageid").style; else if (document.all) return document.all.trailimagid.style }
function gettrailobjnostyle()
{ if (document.getElementById) return document.getElementById("trailimageid"); else if (document.all) return document.all.trailimagid }
function truebody()
{ return (!window.opera && document.compatMode && document.compatMode != "BackCompat") ? document.documentElement : document.body }
function showtrail(swfname, name, title, price, size, color) {
    defaultimageheight = 475;
    defaultimagewidth = 425;
    document.onmousemove = followmouse;
    newHTML = '<table class = "table_1" width="380" border="0" bordercolor="666666" cellpadding="0" cellspacing="0"><tr><td><table class = "table_2"  width="380" height="184%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" class="VS"><tr style="color: #D41E2; margin-top: 0px; margin-left: 3px; margin-bottom: 0px; font-family: Verdana; font-size: 18px"><td style="color: #FF3333"></td><td style="color: #FF3333"></td></tr><tr><td width="14"></td><td width="376" align="center"><embed src="' + swfname + '" width="368" height="283" border="0"></embed></td><td width="14" height="283"></td></tr><tr class="VS"><td height="26"></td><td style="color: #2b6494" align="Left" class="VS"><span class="style1 VS" style="font-size: 15px"><b>Tên sản phẩm: ' + name + '</b></br><b>Size: ' + size + '</b></br><b>Màu: ' + color + '</b></br><b>Giá: ' + price + '</b></span></td><td></td></tr><tr class="VS"><td></td><td class="VS">' + title + ' </td><td></td></tr></table></td></tr></table>';
    gettrailobjnostyle().innerHTML = newHTML; gettrailobj().visibility = "visible"; gettrailobj().display = "block";
}
function hidetrail() { gettrailobj().visibility = "hidden"; document.onmousemove = ""; gettrailobj().left = "-800px"; }
function followmouse(e) {
    var xcoord = offsetfrommouse[0];
    var ycoord = offsetfrommouse[1];
    var docwidth = document.all ? truebody().scrollLeft + truebody().clientWidth : pageXOffset + window.innerWidth - 15;
    var docheight = document.all ? Math.min(truebody().scrollHeight, truebody().clientHeight) : Math.min(window.innerHeight);

    //var docheight = (typeof(  window.innerHeight ) == 'number') ? docHeight = window.innerHeight : docHeight  = document.documentElement.clientHeight;


    if (typeof e != "undefined") {
        if (docwidth - e.pageX < defaultimagewidth + 2 * offsetfrommouse[0]) {
            xcoord = e.pageX - xcoord - defaultimagewidth;
        } else {
            xcoord += e.pageX;
        }
        if (docheight - e.pageY < defaultimageheight + 2 * offsetfrommouse[1]) {

            var tmpScroll = truebody().scrollTop;
            if (tmpScroll == 0) {
                tmpScroll = window.scrollY;
            }
            ycoord += e.pageY - Math.max(0, (2 * offsetfrommouse[1] + defaultimageheight + e.pageY - docheight - tmpScroll));
        } else {
            ycoord += e.pageY;
        }
    } else if (typeof window.event != "undefined") {
        if (docwidth - event.clientX < defaultimagewidth + 2 * offsetfrommouse[0]) {
            xcoord = event.clientX + truebody().scrollLeft - xcoord - defaultimagewidth;
        } else {
            xcoord += truebody().scrollLeft + event.clientX
        }

        if (docheight - event.clientY < (defaultimageheight + 2 * offsetfrommouse[1])) {
            ycoord += event.clientY + truebody().scrollTop - Math.max(0, (2 * offsetfrommouse[1] + defaultimageheight + event.clientY - docheight));
        } else {
            ycoord += truebody().scrollTop + event.clientY;
        }
    } gettrailobj().left = xcoord + "px"; gettrailobj().top = ycoord + "px"
}
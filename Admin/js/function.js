function ajax(url_,data_,id_)
{
	//alert(data_);
	$.ajax({
	   type: "POST",
	   url: url_,
	   data: data_,
	   success: function(html){
		   //alert(html);
		   $(id_).empty();
		   $(id_).html(html);
	   }
	 });

}
function advance_search(url_,cmd,cmd1,lang)
{
	catid1 = document.frm.catid1.value;
	catid2 = document.frm.catid2.value;
	catid3 = document.frm.catid3.value;
	key = document.frm.key.value;
	if(cmd=='cat1'){
		catid2='';
		catid3='';
	}
	
	$.ajax({
	   type: "POST",
	   url: url_,
	   data: "catid1="+catid1+"&catid2="+catid2+"&catid3="+catid3+"&key="+key+"&cmd="+cmd1+"&lang="+lang,
	   success: function(html){
		  	//alert(html);
		   $('#advance_search').empty();
		   $('#advance_search').html(html);
	   }
	});
}
function update_field(url_,data_)
{
	//alert(data_);
	$.ajax({
	   type: "POST",
	   url: url_,
	   data: data_,
	   success: function(html){
	   }
	 });
}
function get_size(url,num1,num2)
{
	url +="?num1="+num1+"&num2="+num2;
	url+="&thdiem=".concat((new Date()).getTime());	
	try{ 
	var h;
	if(window.ActiveXObject) h=new ActiveXObject("Microsoft.XMLHTTP");				
	else h= new XMLHttpRequest();	
	h.onreadystatechange=function() {	
			
			if (h.readyState==4) 
			{
				if (h.status==200) 
				{
						document.getElementById("size").innerHTML=h.responseText;
				}
				else 
					alert("Không l?y d? li?u du?c. " + h.statusText+ "-"+ h.responseText);
			}			
	}
	h.open("GET",url);	
	h.send(null);	
	}
	catch (e) { alert("L?i "+ e.description + "-"+ h.responseText);}
}
function get_color(url,num1,num2)
{
	url +="?num1="+num1+"&num2="+num2;
	url+="&thdiem=".concat((new Date()).getTime());	
	try{ 
	var h;
	if(window.ActiveXObject) h=new ActiveXObject("Microsoft.XMLHTTP");				
	else h= new XMLHttpRequest();	
	h.onreadystatechange=function() {	
			
			if (h.readyState==4) 
			{
				if (h.status==200) 
				{
						document.getElementById("color").innerHTML=h.responseText;
				}
				else 
					alert("Không l?y d? li?u du?c. " + h.statusText+ "-"+ h.responseText);
			}			
	}
	h.open("GET",url);	
	h.send(null);	
	}
	catch (e) { alert("L?i "+ e.description + "-"+ h.responseText);}
}
function del_img(url,id,str)
{
	//alert(str);
	url +="?id="+id+"&str="+str;
	url+="&thdiem=".concat((new Date()).getTime());	
	try{ 
	var h;
	if(window.ActiveXObject) h=new ActiveXObject("Microsoft.XMLHTTP");				
	else h= new XMLHttpRequest();	
	h.onreadystatechange=function() {	
			
			if (h.readyState==4) 
			{
				if (h.status==200) 
				{
						document.getElementById("del_img").innerHTML=h.responseText;
				}
				else 
					alert("Không l?y d? li?u du?c. " + h.statusText+ "-"+ h.responseText);
			}			
	}
	h.open("GET",url);	
	h.send(null);	
	}
	catch (e) { alert("L?i "+ e.description + "-"+ h.responseText);}
}
function get_img(url,num1,num2)
{
	url +="?num1="+num1+"&num2="+num2;
	url+="&thdiem=".concat((new Date()).getTime());	
	try{ 
	var h;
	if(window.ActiveXObject) h=new ActiveXObject("Microsoft.XMLHTTP");				
	else h= new XMLHttpRequest();	
	h.onreadystatechange=function() {	
			
			if (h.readyState==4) 
			{
				if (h.status==200) 
				{
						document.getElementById("img").innerHTML=h.responseText;
				}
				else 
					alert("Không l?y d? li?u du?c. " + h.statusText+ "-"+ h.responseText);
			}			
	}
	h.open("GET",url);	
	h.send(null);	
	}
	catch (e) { alert("L?i "+ e.description + "-"+ h.responseText);}
}
function get_(url,id,cmd)
{
	url +="?id="+id+"&cmd="+cmd;
	url+="&thdiem=".concat((new Date()).getTime());	
	try{ 
	var h;
	if(window.ActiveXObject) h=new ActiveXObject("Microsoft.XMLHTTP");				
	else h= new XMLHttpRequest();	
	h.onreadystatechange=function() {	
			
			if (h.readyState==4) 
			{
				if (h.status==200) 
				{
						document.getElementById("cat2").innerHTML=h.responseText;
				}
				else 
					alert("Không l?y d? li?u du?c. " + h.statusText+ "-"+ h.responseText);
			}			
	}
	h.open("GET",url);	
	h.send(null);	
	}
	catch (e) { alert("L?i "+ e.description + "-"+ h.responseText);}
}
function get1_(url,id,id1,cmd)
{
	url +="?id="+id+"&id1="+id1+"&cmd="+cmd;
	url+="&thdiem=".concat((new Date()).getTime());	
	try{ 
	var h;
	if(window.ActiveXObject) h=new ActiveXObject("Microsoft.XMLHTTP");				
	else h= new XMLHttpRequest();	
	h.onreadystatechange=function() {	
			
			if (h.readyState==4) 
			{
				if (h.status==200) 
				{
						document.getElementById("cat3").innerHTML=h.responseText;
				}
				else 
					alert("Không l?y d? li?u du?c. " + h.statusText+ "-"+ h.responseText);
			}			
	}
	h.open("GET",url);	
	h.send(null);	
	}
	catch (e) { alert("L?i "+ e.description + "-"+ h.responseText);}
}
function update_order(url,id,order,tbl)
{
	//alert(str);
	url +="?id="+id+"&order="+order+"&tbl="+tbl;
	url+="&thdiem=".concat((new Date()).getTime());	
	try{ 
	var h;
	if(window.ActiveXObject) h=new ActiveXObject("Microsoft.XMLHTTP");				
	else h= new XMLHttpRequest();	
	h.onreadystatechange=function() {	
			
			if (h.readyState==4) 
			{
				if (h.status==200) 
				{
				}
				else 
					alert("Không l?y d? li?u du?c. " + h.statusText+ "-"+ h.responseText);
			}			
	}
	h.open("GET",url);	
	h.send(null);	
	}
	catch (e) { alert("L?i "+ e.description + "-"+ h.responseText);}
}
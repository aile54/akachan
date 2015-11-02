<html>

<head>
<title>Chained Selects</title>

<script language="javascript" src="chainedselects.js">

/***********************************************
* Chained Selects script- By Xin Yang (http://www.yxscripts.com/)
* Script featured on/available at http://www.dynamicdrive.com/
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
<script language="javascript" src="data.php"></script>
</head>

<body onload="initListGroup('group', document.forms[0].secid, document.forms[0].catid, document.forms[0].scatid, 'cs')">
<h2>Chained Selects Example II (with Disable/Hide Empty Lists)</h2>
Example prepared by <a href="http://www.dynamicdrive.com">Dynamic Drive</a>.

<?php 

	if (isset($_POST['secid'])) {
			$secid = $_POST['secid'];
			$catid = $_POST['catid'];
			$scatid = $_POST['scatid'];
			echo "secid = {$secid}<br> catid = {$catid} <br> subcat = {$scatid}";		
	} 
	


?>

<form method="post">
<table align="center"><tr>
<td>Select a vehicle:&nbsp;</td>
<td><select name="secid" style="width:160px;"></select></td>
<td><select name="catid" style="width:160px;"></select></td>
<td><select name="scatid" style="width:160px;"></select></td>
<td><input type="button" value="Reset" onclick="resetListGroup('vehicles')">
<input type = 'submit'></input>
</tr></table>
</form>

<p>This example is essentially the same menu as Example One, except for the following:</p>
<ol>
  <li>An arbitrary string (&quot;cs&quot;) is passed in as the last argument for function 
  initListGroup() inside this page, &quot;example2.htm&quot;, enabling the <b>session-only 
  cookie persistent feature</b>. What this means is that the script will save and 
  load the last state of the chained Selection lists when you reload or return 
  to this page.</li>
  <li>The first option of each list is set to empty, enabling the ability to hide or disable the list when it's empty. See "exampleconfig2.js", and compare that with "exampleconfig.js" in Example 1.</li>
</ol>

<p align="center" class="copyright">Copyright 2004&nbsp;&nbsp;&nbsp;&nbsp;Xin Yang</p>
</body>

</html>
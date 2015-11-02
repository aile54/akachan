<?php
	include('../library/loader.php');
	$id=$_REQUEST['id'];
	$ck=$_REQUEST['val'];
	$field_name=$_REQUEST['field_name'];
	$tbl_name = $_REQUEST['tbl_name'];
	
	if($ck=='true')
		$flag=1;
	else
		$flag=0;
	
	$res = mysql_query('update '.$tbl_name.' set '.$field_name.'='.$flag.' where id='.$id);
?>
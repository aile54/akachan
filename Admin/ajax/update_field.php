<?php 
	if(!isset($_GET['choose']))
		include('../library/loader.php'); 	
		
	$id = $_REQUEST['id'];
	$val = $_REQUEST['val'];
	$field_name = $_REQUEST['field_name'];
	$tbl_name = $_REQUEST['tbl_name'];
		
	$tbl = new table($tbl_name);
	$field = array($field_name);
	$values = array(
					format($val,0)
					);
	$res = $tbl->updateObject($field,$values,'id='.$id);
?>
<?php 
	if(!isset($_GET['choose']))
		include('../library/loader.php'); 	
		
	$id = $_GET['id'];
	$order = $_GET['order'];
	$tbl_name = $_GET['tbl'];
		
	$tbl = new table($tbl_name);
	$field = array('ordering');
	$values = array(
					format($order,0)
					);
	$res = $tbl->updateObject($field,$values,'id='.$id);
?>
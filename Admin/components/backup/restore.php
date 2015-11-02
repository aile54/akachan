<?php
	$id = $_GET["id"];
	$tbl = new table('backup');
	$res = $tbl->loadOne('id='.$id);
	
	
	
	if($res){
			$row=mysql_fetch_array($res);

			$output =$row['file'];
			
			$structure_only = false;
			
			$backup = new mysql_backup($db_host,$db_name,$db_user,$db_pass,$output,$structure_only);	
			$backup->restore();	
	
	header('location: '.loadPage('backup'));
			
	}

?>

<?php
	require_once('database.php');
	class xl_logo_db extends database
	{
		function getLogo(){
			$fielName = array("logo");
			$table = array("setting");
			$query = $this->createQuery($fielName, $table);
			$this->setQuery($query);
			$result = $this->loadResult(); 
			return $result;
		}
	}
	$xl_logo = new xl_logo_db();
	$result_logo = "../";
	$result_logo .= $xl_logo->getLogo();
	//echo json_encode($result);
?>
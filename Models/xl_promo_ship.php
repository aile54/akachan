<?php
	require_once('database.php');
	class xl_ship_db extends database
	{
		function getAll(){
			$result = array();
			$fieldName = array('*');
			$table = array("advertise");
			$condition =  array('catid = 9 ORDER BY ordering');
			$query = $this->createQuery($fieldName, $table, $condition);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			return $result;
		}
	}
	$result_ship = array();
	$list_ship = new xl_ship_db();
	$result_ship = $list_ship->getAll();
?>
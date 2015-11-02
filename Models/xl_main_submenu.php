<?php
	require_once('database.php');
	
	class xl_main_submenu extends database
	{
		function getProduct($catid1){
			$table = array ('`category2`');
			$conditions = array("catid = $catid1");
			$order = array('ORDER BY ordering');
			$query = $this->createQueryAll($table, $conditions, $order);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			return $result;
		}
	}
?>
<?php
	require_once('database.php');
	
	class xl_sp_yeuthich_db extends database
	{
		function getProduct(){
			$result = array();
			$table =  array('promotion');
			$conditions = array();
			$other = array('order by RAND() limit 8');
			$query = $this->createQueryAll($table, $conditions, $other);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			return $result;
		}
	}
	$xl_sp_yeuthich = new xl_sp_yeuthich_db();
	$items = array();
	$result = array();
	$items = $xl_sp_yeuthich->getProduct();
?>
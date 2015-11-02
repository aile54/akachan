<?php
	require_once('database.php');
	
	class xl_main_db extends database
	{
		function getProduct(){
			$table = array('category1');
			$condition = array();
			$order=array('ORDER BY ordering');
			$query = $this->createQueryAll($table, $condition, $order);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			return $result;
		}
	}
	$xl_main = new xl_main_db();
	$categories = array();
	$result = array();
	$categories = $xl_main->getProduct();
?>
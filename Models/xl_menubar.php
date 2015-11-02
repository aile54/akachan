<?php
	require_once('database.php');
	class xl_menubar_db extends database
	{
		function getAll(){
			$result = array();
			$fieldName = array('*');
			$table = "category";
			$condition =  array('1 = 1 Order by ordering');
			$query = $this->createQuery($fieldName, $table, $condition);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			return $result;
		}
	}
	$result = array();
	$list_menubar = new xl_menubar_db();
	$result = $list_menubar->getAll();
?>
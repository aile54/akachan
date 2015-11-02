<?php
	require_once('database.php');
	class xl_slide_db extends database
	{
		function getAll(){
			$result = array();
			$fieldName = array('*');
			$table = array("advertise");
			$condition =  array('catid = 8 ORDER BY ordering');
			$query = $this->createQuery($fieldName, $table, $condition);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			return $result;
		}
	}
	$result = array();
	$list_brand = new xl_slide_db();
	$result = $list_brand->getAll();
?>
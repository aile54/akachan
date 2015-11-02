<?php
	require_once('database.php');
	class xl_brand_db extends database
	{
		function getAll(){
			$result = array();
			$fieldName = array('*');
			$table = array("nsx");
			$condition =  array('1 = 1 order by RAND() limit 8');
			//$condition =  array('image != null or image != "" order by RAND() limit 8');
			$query = $this->createQuery($fieldName, $table, $condition);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			return $result;
		}
	}
	$result = array();
	$list_brand = new xl_brand_db();
	$result = $list_brand->getAll();
?>
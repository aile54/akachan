<?php
	require_once('database.php');
	class xl_transport_info extends database
	{
		function getInfo(){
			$result = array();
			$fieldName = array('*');
			$table = array("category_bv");
			$condition =  array('id BETWEEN 1 AND 4  ORDER BY ordering');
			$query = $this->createQuery($fieldName, $table, $condition);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			return $result;
		}
	}
	$result_transport_info = array();
	$list_info = new xl_transport_info();
	$result_transport_info = $list_info->getInfo();
?>
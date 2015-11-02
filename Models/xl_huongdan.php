<?php
	require_once('database.php');
	class xl_hd_db extends database
	{
		function GetHD($id)
		{
			$result = array();
			$fieldName = array('name', 'details', 'id', 'image');
			$table = array("combi");
			$condition = array("id = $id");
			$query = $this->createQuery($fieldName, $table, $condition);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			return $result;
		}
	}
?>
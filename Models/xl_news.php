<?php
	require_once('database.php');
	class xl_news_db extends database
	{
		function SelectNews()
		{
			$result = array();
			$fieldName = array('name', 'details', 'id', 'image', 'detailsInfo');
			$table = array("news");
			$query = $this->createQuery($fieldName, $table);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			return $result;
		}
		
		function GetNews($id)
		{
			$result = array();
			$fieldName = array('name', 'details', 'id', 'image', 'detailsInfo');
			$table = array("news");
			$condition = array("id = $id");
			$query = $this->createQuery($fieldName, $table, $condition);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			return $result;
		}
	}
?>
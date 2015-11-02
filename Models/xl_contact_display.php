<?php
	require_once('database.php');
	class xl_contact_db extends database
	{
		function getContact()
		{
			$table = array("support");
			$query = $this->createQueryAll($table);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			return $result;
		}
	}
	$xl_contact_display = new xl_contact_db();
	$result_contact = $xl_contact_display->getContact();
?>
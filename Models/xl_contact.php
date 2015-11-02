<?php
	require_once('database.php');
	class xl_contactsetting_db extends database
	{
		function getContactSetting()
		{
			$table = array("setting");
			$query = $this->createQueryAll($table);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			return $result;
		}
	}
	$xl_contact = new xl_contactsetting_db();
	$result_contact1 = $xl_contact->getContactSetting();
?>
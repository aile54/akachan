<?php
	require_once('database.php');
	class xl_shortcut_icon_db extends database
	{
		function getImg(){
			$fielName = array("favicon");
			$table = array("setting");
			$query = $this->createQuery($fielName, $table);
			$this->setQuery($query);
			$result = $this->loadResult(); 
			return $result;
		}
	}
	$xl_shortcut_icon = new xl_shortcut_icon_db();
	$result = "../";
	$result .= $xl_shortcut_icon->getImg();
?>
<?php
	require_once('database.php');
	include_once('../Templates/Plugin/jcart/jcart.php');
	
	class xl_getInfoUser extends database
	{
		function getInfoUser($userid){
			$result = array();
			$fieldName = array('*');
			$table = array("user");
			$condition = array("id = $userid");
			$query = $this->createQuery($fieldName, $table, $condition);
			$this->setQuery($query);
			$result = $this->loadAllRow();
			return $result;
		}
	}
	$userid = !empty($_SESSION['userid']) ? $_SESSION['userid'] : "";
	$list_user = new xl_getInfoUser();
	$result = array();
	if((!empty($userid) && !is_null($userid)))
	{
		$result = $list_user->getInfoUser($userid);
	}
	echo json_encode($result);
?>
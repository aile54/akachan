<?php
	require_once('database.php');
	class xl_footer extends database
	{
		function getFooterInfo(){
			$result = array();
			$fieldName = array('footer');
			$table = array("setting");
			$query = $this->createQuery($fieldName, $table);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			return $result;
		}
	}
	$result_footer = array();
	$list_footerinfo = new xl_footer();
	$result_footer = $list_footerinfo->getFooterInfo();
?>
<?php
	require_once('database.php');
	
	class xl_sp_tieubieu_db extends database
	{
		function getProduct(){
			$fieldName = array('pro.id','pro.mavach','pro.name','img.name AS color',
								'IF(img.image IS NULL, pro.image, IF(img.image = "", pro.image, img.image)) image',
								'pro.catid1','tp.id AS tbid',
								'tp.proid', 'IFNULL(MAX(tp.price), 0) AS tbprice', 'tp.size AS tbsize',
								'tp.`price_promo` AS tbprice_promo', 'pro.promo', 'pro.love as love');
			$table = array ('products AS pro LEFT JOIN tabprice AS tp ON pro.`id` = tp.`proid`
					 LEFT JOIN img AS img ON pro.`id` = img.`proid`');
			$conditions = array('pro.typical = 1');
			$other = array('GROUP BY tp.`proid`');
			$query = $this->createQuery($fieldName, $table, $conditions, $other);
			$this->setQuery($query);
			$result = $this->loadAllRow();
			//echo $query; 
			return $result;
		}
	}
	$xl_sp_tieubieu = new xl_sp_tieubieu_db();
	$items = array();
	$result = array();
	$items = $xl_sp_tieubieu->getProduct();
?>
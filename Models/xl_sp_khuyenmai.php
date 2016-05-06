<?php
	require_once('database.php');
	
	class xl_sp_khuyenmai_db extends database
	{
		function getProduct(){
			$fieldName = array('pro.id','pro.mavach','pro.name','img.name AS color',
								'IF(img.image IS NULL, pro.image, IF(img.image = "", pro.image, img.image)) image',
								'pro.catid1','tp.id AS tbid',
								'tp.proid', 'IFNULL(MAX(tp.price), 0) AS tbprice', 'tp.size AS tbsize',
								'tp.`price_promo` AS tbprice_promo', 'pro.promo', 'pro.love as love');
			$table = array ('products AS pro LEFT JOIN tabprice AS tp ON pro.`id` = tp.`proid`
					 LEFT JOIN img AS img ON pro.`id` = img.`proid`');
			$conditions = array('pro.promo = 1');
			$other = array('GROUP BY tp.`proid`','ORDER BY RAND() limit 4');
			$query = $this->createQuery($fieldName, $table, $conditions, $other);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			//echo $query;
			return $result;
		}
	}
	$xl_sp_khuyenmai = new xl_sp_khuyenmai_db();
	$items_sp_khuyenmai = array();
	$items_sp_khuyenmai = $xl_sp_khuyenmai->getProduct();
?>
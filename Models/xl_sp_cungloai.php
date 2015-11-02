<?php
	require_once('database.php');
	
	class xl_sp_cungloai_db extends database
	{
		function getProduct(){
			$fieldName = array('pro.id','pro.mavach','pro.name','img.name AS color',
								'IF(img.image IS NULL, pro.image, IF(img.image = "", pro.image, img.image)) image',
								'pro.catid1','tp.id AS tbid',
								'tp.proid', 'IFNULL(MAX(tp.price), 0) AS tbprice', 'tp.size AS tbsize',
								'tp.`price_promo` AS tbprice_promo', 'pro.promo');
			$table = array ('products AS pro LEFT JOIN tabprice AS tp ON pro.`id` = tp.`proid`
					 LEFT JOIN img AS img ON pro.`id` = img.`proid`',
					'(SELECT catid3 id FROM products WHERE id = '.$_SESSION["proId"].') as cat3');
			$conditions = array('pro.catid3 = cat3.id',
							'pro.id != '.$_SESSION["proId"]);
			$other = array('GROUP BY tp.`proid`', 'ORDER BY RAND()');
			$query = $this->createQuery($fieldName, $table, $conditions, $other);
			$this->setQuery($query);
			$result = $this->loadAllRow();
			//echo $query;
			return $result;
		}
	}
	$xl_sp_cungloai = new xl_sp_cungloai_db();
	$items_same = array();
	$result = array();
	$items_same = $xl_sp_cungloai->getProduct();
?>
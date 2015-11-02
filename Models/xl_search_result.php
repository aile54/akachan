<?php
	require_once('database.php');
	class xl_search_result extends database
	{
		function SelectProductForResult($plantext)
		{
			$fieldName = array('pro.id', 'pro.mavach', 'pro.name', 'img.name AS color',
								'IF(img.image IS NULL, pro.image, IF(img.image = "", pro.image, img.image)) image',
								'pro.catid1','tp.id AS tbid',
								'tp.proid', 'IFNULL(MAX(tp.price), 0) AS tbprice', 'tp.size AS tbsize',
								'tp.`price_promo` AS tbprice_promo', 'cat.*', 'pro.promo');
			$table = array ('products AS pro LEFT JOIN tabprice AS tp ON pro.`id` = tp.`proid`
					 LEFT JOIN img AS img ON pro.`id` = img.`proid`',
					"(SELECT id AS catid, name AS catname, image AS catimg 
						FROM category1) as cat");
			$conditions = array('pro.catid1 = cat.catid', "pro.`name` LIKE '%$plantext%'");
			$other = array('GROUP BY tp.`proid`');
			$query = $this->createQuery($fieldName, $table, $conditions, $other);
			//echo $query;
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			return $result;
		}
	}
?>
                                                                                                <?php
	require_once('database.php');
	
	class xl_product_detail_db extends database
	{
		function getProduct($catid){
			$fieldName = array('pro.id','pro.mavach','pro.name','img.name AS color',
								'pro.image',
								'pro.catid1','tp.id AS tbid',
								'tp.proid', 'tp.price AS tbprice', 'tp.size AS tbsize',
								'tp.`price_promo` AS tbprice_promo','cat.*', 'pro.promo', 'pro.love as love');
			$table = array ("products AS pro 
					LEFT JOIN (SELECT id, proid, IFNULL(MAX(price), 0) AS price, price_promo, size FROM tabprice GROUP BY proid) AS tp ON pro.`id` = tp.`proid`
					 LEFT JOIN img AS img ON pro.`id` = img.`proid`",
					"(SELECT id AS catid, name AS catname, image AS catimg 
						FROM category1 
						WHERE id = $catid) as cat");
			$conditions = array('pro.catid1 = cat.catid');
			
			$query = $this->createQuery($fieldName, $table, $conditions);
			$this->setQuery($query);
			$result = $this->loadAllRow();
			//echo $query;
			//echo $result;
			return $result;
		}
	}
?>
                            
                            
                            
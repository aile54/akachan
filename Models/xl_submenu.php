<?php
	require_once('database.php');
	class xl_submenu_db extends database
	{
		function getCategorydetail($id, $flag){
			$result = array();
			$fieldName = array('cat1.`id` AS cat1id', 'cat2.`id` AS cat2id', 'cat3.`id` AS cat3id',
								'cat1.`name` AS cat1name', 'cat2.`name` AS cat2name', 'cat3.`name` AS cat3name',
								'cat1.`image` AS cat1image', 'cat2.`image` AS cat2image', 'cat3.`image` AS cat3image');
			$table = array ('`category3` AS cat3
							  INNER JOIN `category1` AS cat1 
								ON cat3.`catid1` = cat1.`id`
							  INNER JOIN `category2` AS cat2 
								ON cat2.`id` = cat3.`catid2`
								AND cat2.`catid` = cat1.`id`');
			if ($flag == 1)
			{
				$conditions = array("cat1.`id` = $id");
				$other = array('GROUP BY cat2name ORDER BY cat2.`ordering`,cat3.`ordering`');
			}
			else if ($flag == 2)
			{
				$conditions = array("cat2.`id` = $id");
				$other = array('GROUP BY cat3name ORDER BY cat3.`ordering`');
			}
			else if ($flag == 3)
			{
				$conditions = array("cat3.`id` = $id");
				$other = array('ORDER BY cat3.`ordering`');
			}
			
			if($flag != 0)
			{
				$query = $this->createQuery($fieldName, $table, $conditions, $other);
				$this->setQuery($query);
				$result = $this->loadAllRow(); 
				//echo $query;
			}
			return $result;
		}
		
		function getProduct_detail_submenu($cat1id, $cat2id, $cat3id, $flag, $start = 0, $limit = 0){
			$fieldName = array('pro.id','pro.mavach','pro.name','img.name AS color',
								'pro.image',
								'pro.catid1','tp.id AS tbid', 'cat2.cat2id',
								'tp.proid', 'tp.price AS tbprice', 'tp.size AS tbsize',
								'tp.`price_promo` AS tbprice_promo, cat3.cat3id', 'pro.promo', 'pro.love as love');
			$table = array ('products AS pro 
					 LEFT JOIN (SELECT id, proid, IFNULL(MAX(price), 0) AS price, price_promo, size FROM tabprice GROUP BY proid) AS tp ON pro.`id` = tp.`proid`
					 LEFT JOIN img AS img ON pro.`id` = img.`proid`',
					"(SELECT id AS cat1id, name AS cat1name, image AS cat1img 
						FROM category1 
						WHERE category1.id = $cat1id) as cat1",
					"(SELECT id AS cat2id, name AS cat2name, image AS cat2img 
						FROM category2 
						WHERE category2.id = $cat2id) as cat2",
					"(SELECT id AS cat3id, name AS cat3name, image AS cat3img 
						FROM category3 
						WHERE category3.id = $cat3id) as cat3");
			$conditions = array('1 = 1');
			if ($flag == 1)
			{
				$conditions[1] = 'pro.catid1 = cat1.cat1id';
				//$conditions[2] = 'pro.catid2 = cat2.cat2id';
				$order = array('Order By Rand() LIMIT 0, 12');
			}
			else if ($flag == 2)
			{
				$conditions[1] = 'pro.catid1 = cat1.cat1id';
				$conditions[2] = 'pro.catid2 = cat2.cat2id';
				//$conditions[3] = 'pro.catid3 = cat3.cat3id';
				$order = array('Order By Rand() LIMIT 0, 12');
			}
			else if ($flag == 3)
			{
				$conditions[1] = 'pro.catid1 = cat1.cat1id';
				$conditions[2] = 'pro.catid2 = cat2.cat2id';
				$conditions[3] = 'pro.catid3 = cat3.cat3id';
				$order = array('LIMIT '.$start.','.$limit);
			}
			
			$query = $this->createQuery($fieldName, $table, $conditions, $order);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			//echo $query;
			return $result;
		}
		
		function getProduct_promo($start, $limit){
			$fieldName = array('pro.id','pro.name','img.name AS color',
								'pro.image',
								'pro.catid1','tp.id AS tbid',
								'tp.proid', 'tp.price AS tbprice', 'tp.size AS tbsize', 'pro.promo',
								'tp.`price_promo` AS tbprice_promo', 'pro.love as love');
			$table = array ('products AS pro 
					 LEFT JOIN (SELECT id, proid, IFNULL(MAX(price), 0) AS price, price_promo, size FROM tabprice GROUP BY proid) AS tp ON pro.`id` = tp.`proid`
					 LEFT JOIN img AS img ON pro.`id` = img.`proid`');
			$conditions = array('pro.promo = 1');
			$order = array('LIMIT '.$start.','.$limit);
			$query = $this->createQuery($fieldName, $table, $conditions, $order);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			//echo $query;
			return $result;
		}
		
		function countProduct_detail_submenu($cat1id, $cat2id, $cat3id, $flag){
			$fieldName = array('count(*)');
			$table = array ('products as pro',
					"(SELECT id AS cat1id, name AS cat1name, image AS cat1img 
						FROM category1 
						WHERE category1.id = $cat1id) as cat1",
					"(SELECT id AS cat2id, name AS cat2name, image AS cat2img 
						FROM category2 
						WHERE category2.id = $cat2id) as cat2",
					"(SELECT id AS cat3id, name AS cat3name, image AS cat3img 
						FROM category3 
						WHERE category3.id = $cat3id) as cat3",
					'(SELECT id as tbid, proid, IFNULL(MAX(price),0) as tbprice, size as tbsize, price_promo as tbprice_promo 
						FROM tabprice GROUP BY proid) as tp');
			$conditions = array('pro.id = tp.proid');
			if ($flag == 1)
			{
				$conditions[1] = 'pro.catid1 = cat1.cat1id';
				//$conditions[2] = 'pro.catid2 = cat2.cat2id';
			}
			else if ($flag == 2)
			{
				$conditions[1] = 'pro.catid1 = cat1.cat1id';
				$conditions[2] = 'pro.catid2 = cat2.cat2id';
				//$conditions[3] = 'pro.catid3 = cat3.cat3id';
			}
			else if ($flag == 3)
			{
				$conditions[1] = 'pro.catid1 = cat1.cat1id';
				$conditions[2] = 'pro.catid2 = cat2.cat2id';
				$conditions[3] = 'pro.catid3 = cat3.cat3id';
			}

			$query = $this->createQuery($fieldName, $table, $conditions);
			$this->setQuery($query);
			$result = $this->loadResult(); 
			return $result;
		}
		
		function getProduct_nsx($nsx, $start, $limit){
			$fieldName = array('pro.id','pro.name','img.name AS color',
								'pro.image',
								'pro.catid1','tp.id AS tbid',
								'tp.proid', 'tp.price AS tbprice', 'tp.size AS tbsize', 'pro.promo',
								'tp.`price_promo` AS tbprice_promo', 'nsx.`name` as nsxName', 
								'nsx.`image` as nsxImg', 'pro.love as love');
			$table = array ('products AS pro 
					 LEFT JOIN (SELECT id, proid, IFNULL(MAX(price), 0) AS price, price_promo, size FROM tabprice GROUP BY proid) AS tp ON pro.`id` = tp.`proid`
					 LEFT JOIN img AS img ON pro.`id` = img.`proid`
					 LEFT JOIN nsx ON pro.`nsx` = nsx.`id`');
			$conditions = array("pro.nsx = $nsx");
			$order = array('LIMIT '.$start.','.$limit);
			$query = $this->createQuery($fieldName, $table, $conditions, $order);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			//echo $query;
			return $result;
		}
		
		function countProduct_nsx($nsx){
			$fieldName = array('count(*)');
			$table = array ('products AS pro');
			$conditions = array("pro.nsx = $nsx");
			$query = $this->createQuery($fieldName, $table, $conditions);
			$this->setQuery($query);
			$result = $this->loadResult(); 
			//echo $query;
			return $result;
		}
		
		function countProduct_promo(){
			$fieldName = array('count(*)');
			$table = array ('products AS pro');
			$conditions = array('pro.promo = 1');
			//$other = array('GROUP BY tp.`proid`');
			$query = $this->createQuery($fieldName, $table, $conditions);
			$this->setQuery($query);
			$result = $this->loadResult(); 
			//echo $query;
			return $result;
		}
	}
?>
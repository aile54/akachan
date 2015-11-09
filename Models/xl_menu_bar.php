<?php
	require_once('database.php');
	class xl_menu_bar_db extends database
	{
		function getAll(){
			$result = array();
			$fieldName = array('F.*,
								C.name AS thirdname,
								C.id AS cid3,
								C.alias AS thirdalias');
			$table = array("(SELECT A.id, A.name firstname, B.secondname, 
						B.secondimage, B.secondalias, 
						B.cid2, A.ordering AS Firstordering,
						B.ordering AS Secondordering
					FROM 
						(SELECT * FROM category1) A 
						LEFT JOIN (
							SELECT 
								a.name firstname, 
								b.id cid2,
								b.name secondname, 
								b.image secondimage, 
								b.alias secondalias,
								b.ordering
							FROM 
								category1 a 
								INNER JOIN category2 b ON a.id = b.catid 
							ORDER BY 
								a.ordering, 
								b.ordering
						) B ON A.name = B.firstname) AS F
					LEFT JOIN category3 AS C ON C.catid1 = F.id AND C.catid2 = F.cid2");
			$condition =  array('1 = 1');
			$order = array('ORDER BY F.Firstordering, F.Secondordering, C.ordering');
			$query = $this->createQuery($fieldName, $table, $condition, $order);
			//var_dump($query);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			return $result;
		}
		function getHDan(){
			$result = array();
			$fieldName = array('*');
			$table = array("combi");
			$condition =  array('1 = 1');
			$order = array('ORDER BY ordering');
			$query = $this->createQuery($fieldName, $table, $condition, $order);
			$this->setQuery($query);
			$result = $this->loadAllRow(); 
			return $result;
		}
	}
	$result = array();
	$resultHDan = array();
	$list_menu = new xl_menu_bar_db();
	$result = $list_menu->getAll();
	$resultHDan = $list_menu->getHDan();
?>
<?php
	require_once('database.php');
	class xl_menu_bar_db extends database
	{
		function getAll(){
			$result = array();
			$fieldName = array('A.id, A.name firstname, B.secondname, B.secondimage, B.secondalias, B.thirdname,
								B.cid2, B.cid3, B.thirdalias');
			$table = array("(SELECT * FROM category1) A LEFT JOIN (SELECT a.name firstname, b.id cid2, c.id cid3,
						b.name secondname, b.image secondimage, b.alias secondalias,
						c.name thirdname, c.alias thirdalias FROM category1 a INNER JOIN category2 b
						ON a.id = b.catid INNER JOIN category3 c ON a.id = c.catid1 AND
						b.id = c.catid2 ORDER BY a.ordering, b.ordering, c.ordering) B
						ON A.name = B.firstname");
			$condition =  array('1 = 1');
			$order = array('ORDER BY ordering');
			$query = $this->createQuery($fieldName, $table, $condition, $order);
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
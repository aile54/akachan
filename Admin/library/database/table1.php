<?php

class table{

	/*
		*
		* variable
		*
	*/
	//  table name
	var $_name ='';
	
	// query string sql
	var $_sql = '';
	
	// limit of query
	var $_limit = 0;
	
	/* 
		*
		* initialize
		*
	*/
	
	// initialize with : table name, sql query, limit
	function table($name='',$sql='',$limit=0){
		$this->_name = $name;
		$this->_sql = $sql;
		$this->_limit = $limit;
	}
	
	
	/* 
		*
		* set method
		*
	*/
	// set the Sql query
	function setSql($sql){
		$this->_sql=$sql;
	}
	
	// set table name
	function setName($name){
		$this->_name = $name;
	}
	
	// set limit
	function setLimit($limit){
		$this->_limit = $limit;
	}
	
	
	
	
	/* 
		*
		* get method
		*
	*/
	// get the sql query
	function getSql(){
		return $this->_sql;
	}
	
	// get the table name
	function getName(){
		return $this->_name;
	}
	
	// get the limit
	function getLimit(){
		return $this->_limit;
	}
	
	// get lasted Id
	function getLastId(){
		$str = "select id from $this->_name order by id desc limit 1";
		$res = mysql_query($str);
		if($res){
			$row = mysql_fetch_array($res);
			return $row['id'];
		}else return "<h1 style='color:#FF0000'>"."getLastId Error!"."</h1>";
	}
	
	// get lasted ordering
	function getLastOrdering(){
		$str = "select ordering from $this->_name order by ordering desc limit 1";
		$res = mysql_query($str);
		if($res){
				$row = mysql_fetch_array($res);
				return $row['ordering'];
			}else return "<h1 style='color:#FF0000'>"."getLastOrdering Error!"."</h1>";
		
	}
	
	// get total
	function getTotal(){
			$str = "select count(*) from $this->_name";
			$res = mysql_query($str);
			if($res){
					$row=mysql_fetch_array($res);
					return $row[0];
				}
		}
	
	
	/* 
		*
		* function
		*
	*/
	
	/*
		*
		* login
		*
	*/
	
	function login($username,$password,& $permission=''){
			$str = "select * from $this->_name where username=$username and password=$password";
			$res = mysql_query($str);
			if($res){
					
					$row=mysql_fetch_array($res);
					$permission = $row['per'];
				
					$count=mysql_num_rows($res);
					if($count>0){
							return 1;
						}else return 0;
				}
		}

	
	// load Result
	function loadResult(){
		$res = mysql_query($this->_sql);
		if($res){
			return $res;
		}else return "<h1 style='color:#FF0000'>"."loadResult Error!"."</h1>";
	}
	
	// load one
	function loadOne($where){
		$str = "select * from $this->_name where $where ";
		// echo $str;
		$res = @mysql_query($str);
		if($res){
			return $res;
		}else return "<h1 style='color:#FF0000'>"."LoadOne Error!"."</h1>";
	}
	
	// load all
	function loadAll($order='order by id desc'){
		$str = "select * from $this->_name $order";
		$res = mysql_query($str);
		if($res){
			return $res;
		}else return "<h1 style='color:#FF0000'>"."loadAll Error!"."</h1>";
	}
	
	
	// insert with insert query
	function insert(){
		$res = mysql_query($this->_sql);
		if($res){
			return $res;
		}else return "<h1 style='color:#FF0000'>"."Insert Error!"."</h1>";
	}
	
	// insert with no insert query
	function insertObject($field,$value){
			$str = "insert into $this->_name($field) value($value)";
			
			$res = mysql_query($str);
			if($res){
				return $res;
			}else return "<h1 style='color:#FF0000'>"."InsertObject Error!"."</h1>";
	}
	
	// update with update query
	function update(){
		$res = mysql_query($this->_sql);
		if($res){
			return $res;
		}else return "<h1 style='color:#FF0000'>"."Update Error!"."</h1>";
	}
	
	// update with no update query
	function updateObject($field=array(),$value=array(),$where){
		$count = count($field);
		$check=0; // 0 as true
		for($i=0;$i<$count;$i++){
			$str = "update $this->_name set $field[$i]=$value[$i] where $where";
			$res=mysql_query($str);
			if($res)$check=0; else $check=1;
		}
		if($check==1){
			return "<h1 style='color:#FF0000'>"."updateObject Error!"."</h1>";
		}else return $res;
		
	}
	
	// update check box
	function updateCheck($arrId,$field,$start=0,$limit=100,$value=1,$where='id',$order='order by id desc'){
	
		if($value==1){
			$value2=0;
		}else $value2=1;
		
		$list = "-1";
		// list id
		foreach($arrId as $arr){
			$list .= ",".$arr;
		}

		$listUncheck = "-1";
		$str =  "select id from $this->_name $order limit $start,$limit";
		$res = mysql_query($str);
		if($res){
			while($row=mysql_fetch_array($res)){
				$listUncheck.=",".$row['id'];
			}
		}
		
		// set all id as 0 first.
		$str = "update $this->_name set $field=$value2 where $where in($listUncheck)";
		mysql_query($str);
		
		// set id as 1 where id in $list
		$str = "update $this->_name set $field=$value where $where in($list)";
		mysql_query($str);

	}
	
	// remove all
	function removeAll(){
			$str = "delete from $this->_name";
			$res = mysql_query($str);
		}
	
	// remove record
	function remove($arr,$field='id'){
	
		foreach($arr as $val){
			$str = "delete from $this->_name where $field='$val'";
			$res = mysql_query($str);
		}
	}
	
	
	/*
		*
		* paging
		*
	*/
	function loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc'){
		$limit = $limit;
		$start = & $start;
		if(!isset($start)){
			$start=0;
		}

		
		// get nume of page rows
		$str = "select * from $this->_name $where";
		$res = mysql_query($str);
		if($res){
			 $nume = mysql_num_rows($res);
		}
		
		// query with limit
		$str = "select * from $this->_name $where $order limit $start,$limit";

		$res = mysql_query($str);
		if($res){
			return $res;
		}
	}
	


/*
	*
	* end class
	*
*/
}

?>
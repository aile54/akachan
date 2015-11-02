<?php
class database {
	var $_sql = '';
	var $_connection = '';
	var $_cursor = null;
	
	function database() 
	{
                $db_host = "localhost";	//---- Database host(usually localhost).
                //$db_user = "hangnhat_chobe";	//---- Your database username.
                //$db_pass = "hYhnTR34^";	//---- Your database password.
				$db_user = "root";
				$db_pass = "root";
		$this->_connection = @mysql_connect($db_host,$db_user,$db_pass);
		if (!$this->_connection ) 
		{
			die( "Khong the ket noi MySQL" );
		}
		//table name
		$db='hangnhat_chobe';
		if ($db != '' && !mysql_select_db( $db, $this->_connection )) 
		{
			die ( "Khong the mo CSDL $db: ".mysql_error() );
		}
	}

	function setQuery( $sql) 
	{
		$this->_sql = $sql;
	}

	function query() 
	{	
		mysql_query('SET NAMES UTF8', $this->_connection);
		$this->_cursor = mysql_query( $this->_sql, $this->_connection );
		return $this->_cursor;
	}

	/* This method loads the first row returned by the query.*/
	function loadRow() {
		if (!($cur = $this->query())) {
			return null;
		}
		$ret = null;
		if ($row = mysql_fetch_array( $cur )) {
			$ret = $row;
		}
		mysql_free_result( $cur );
		return $ret;
	}
	
	/**
	* This method loads the first field of the first row returned by the query.
	*
	* @return The value returned in the query or null if the query failed.
	*/
	function loadResult() {
		if (!($cur = $this->query())) {
			return null;
		}
		$ret = null;
		if ($row = mysql_fetch_row( $cur )) {
			$ret = $row[0];
		}
		mysql_free_result( $cur );
		return $ret;
	}
	/**
	* Load an array of single field results into an array
	*/
	function loadArrayField($numinarray = 0) {
		if (!($cur = $this->query())) {
			return null;
		}
		$array = array();
		while ($row = mysql_fetch_row( $cur )) {
			$array[] = $row[$numinarray];
		}
		mysql_free_result( $cur );
		return $array;
	}
	/**
	* Load a  list of database rows
	*/
	function loadAllRow() {
		if (!($cur = $this->query())) {
			return null;
		}
		$array = array();
		while ($row = mysql_fetch_assoc( $cur )) 
		{
			// ketqua = mang ket qua
			$array[] = $row;
		}
		mysql_free_result( $cur );
		return $array;
	}
	
	function disconnect() 
	{
		mysql_close( $this->_connection );
	}
	
	function getInsert_id() {
		return mysql_insert_id();
	}
	
	function createNewRow($ten_bang)
	{
		$kq = array();
		$cur = mysql_query("SHOW COLUMNS FROM $ten_bang");
		
		while($row=mysql_fetch_array($cur))
		{
			$field = $row['Field'];
			$kq[$field] = null;
		}
		return $kq;
	}
	
	function createQuery($fieldName = array(), $tableName, $condition = array(), $other = array()){
		$query = "SELECT ";	
		if($fieldName[0] == '')
			$query .= "*";
		else
		{
			for($i = 0; $i < count($fieldName); $i++)
			{
				if($i < count($fieldName) && $i != 0)
				{
					$query .= ",";
				}
				
				$query .= $fieldName[$i];
				
			}
		}
		$query .= " FROM ";
		
		for($i = 0; $i < count($tableName); $i++)
			{
				if($i < count($tableName) && $i != 0)
				{
					$query .= ",";
				}
				
				$query .= $tableName[$i];
				
			}
		
		for($i = 0; $i < count($condition); $i++)
		{
			if($i == 0)
			{
				$query .= " WHERE ";
			}
			if($i < count($condition) && $i != 0)
			{
				$query .= " AND ";
			}
			$query .= "$condition[$i]";
		}
		
		for($i = 0; $i < count($other); $i++)
			{
				$query .= " $other[$i]";	
			}
		return $query;
	}
	
	function createQueryAll($tableName, $condition = array(), $other = array()){
		$query = "SELECT *";	
			
		$query .= " FROM ";
		
		for($i = 0; $i < count($tableName); $i++)
			{
				if($i < count($tableName) && $i != 0)
				{
					$query .= ",";
				}
				
				$query .= $tableName[$i];
				
			}
		
		for($i = 0; $i < count($condition); $i++)
		{
			if($i == 0)
			{
				$query .= " WHERE ";
			}
			if($i < count($condition) && $i != 0)
			{
				$query .= " AND ";
			}
			$query .= "$condition[$i]";
		}
		
		for($i = 0; $i < count($other); $i++)
			{
				$query .= " $other[$i]";	
			}
		return $query;
	}
}
?>
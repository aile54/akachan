<?php
	require_once('database.php');
	include_once('../Templates/Plugin/jcart/jcart.php');
	
	class xl_order_cart extends database
	{
		function productExists($productid)
		{
			$sql = sprintf("SELECT id FROM products WHERE id = %d;", $productid); 
			
			return mysql_num_rows(mysql_query($sql)) > 0;
		}
		
		function insertOrdersdetails($values)
		{
			$tbl = "ordersdetails";
			// get field
			$field = "orderid, productid, quantity, color, size, total";
			//$field = "orderid, productid, quantity, tabpriceid, color, size, total";
			// insertObject($field,$value)
			$sql = sprintf("INSERT INTO $tbl ($field) VALUES($values)");
			//echo $sql;
			return mysql_query($sql);
		}
	}
	
	//orders
	$name = $_POST["name"];
	$address = $_POST["address"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$loinhan = !empty($_POST["loinhan"]) ? $_POST["loinhan"] : 'NULL';
	
	$name_nn = $_POST["name_nn"];
	$address_nn = $_POST["address_nn"];
	$phone_nn = $_POST["phone_nn"];
	$email_nn = $_POST["email_nn"];
	
	$ngaygiao = 'NULL';
	$ngaydat = 'NULL';
	
	//ordersdetails
	$orderid = 'NULL';
	$productid = 'NULL';
	$quantity = 'NULL';
	$color = 'NULL';
	$size = 'NULL';
	$total = 'NULL';
	
	//other
	$error = false;
	$insertOk = false; // nếu chưa insert thì insert
	$datas = "";
	$userid = !empty($_SESSION['userid']) ? $_SESSION['userid'] : "NULL";	
	
	$xl_order_cart = new xl_order_cart();
	
	if((!empty($name) && !is_null($name)) || (!empty($name_nn) && !is_null($name_nn)))
	{
		$result = mysql_query("SELECT DATE_FORMAT(NOW(), '%Y-%m-%d')");
		$row = mysql_fetch_row($result);
		$date = $row[0];
		
		$ngaygiao = $date;
		$ngaydat = $date;
		
		$query = "INSERT INTO orders VALUES(NULL,  " . $userid . ",
												   '" . $name . "',
												   '" . $address . "',
												   '" . $phone . "',
												   '" . $email . "',
												   '" . $name_nn . "',
												   '" . $address_nn . "',
												   '" . $phone_nn . "',
												   '" . $email_nn . "',
												   '" . $loinhan . "',
												   '" . $ngaygiao . "',
												   '" . $ngaydat . "')";
		mysql_query("SET character_set_client=utf8");
		mysql_query("SET character_set_connection=utf8");
		$insertOk = mysql_query($query);
		
		if($insertOk)
		{												   
			$orderid = mysql_insert_id();
						
			foreach ($jcart->get_contents() as $item) {
				$productid = !empty($item['id']) ? $item['id'] : 'NULL';
				$quantity = !empty($item['qty']) ? $item['qty'] : 'NULL';
				$size = !empty($item['size']) ? $item['size'] : 'NULL';
				$color = !empty($item['color']) ? $item['color'] : 'NULL';
				$total = !empty($item['price']) ? $item['price'] : 'NULL';
				
				if(empty($productid) || is_null($productid) || !$xl_order_cart->productExists($productid))
				{
					$error = true;
					break;
				}
				else
				{
					$error = false;
					$datas .= "('" . $orderid . "', '" . $productid . "', '" . $quantity . "', '"
						. $color . "', '" . $size . "', '" . $total . "'),";
				}
			}
		}
		else
		{
			$error = true;
		}
	}
	else
	{
		$error = true;
	}
		
	if($error)
	{
		if($insertOk)
		{
			mysql_query("DELETE FROM orders WHERE id = " .$orderid);
		}
		else
		{
			//$aaaaa= $query;
			//echo $aaaaa;
		}
	}
	else
	{		
		$values = substr(substr($datas,0,-2),1);
		$res = $xl_order_cart->insertOrdersdetails($values);
		if($res)
		{
			$query = "UPDATE user SET name_nn = '" . $name_nn . "', " .
								  "address_nn = '" . $address_nn . "', " . 
								    "phone_nn = '" . $phone_nn . "',  " .
									"email_nn = '" . $email_nn . "' " . 
								  "WHERE id = " . $userid;
			mysql_query("SET character_set_client=utf8");
			mysql_query("SET character_set_connection=utf8");
			$res = mysql_query($query);
			if($res)
			{
				$jcart = $_SESSION['jcart'] = new Jcart();
			}
			else
			{
				echo "Error creating database: " . mysql_error();
				mysql_query("DELETE FROM orders WHERE id = " .$orderid);
			}
		}
		else
		{
			echo "Error creating database: " . mysql_error();
			mysql_query("DELETE FROM orders WHERE id = " .$orderid);
		}
		echo json_encode($res);
	}
?>
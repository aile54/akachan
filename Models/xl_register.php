<?php
	require_once('database.php');
	
	class xl_register extends database
	{
		function userExists($username)
		{
			$username = mysql_real_escape_string($username);
			$sql = sprintf("SELECT username FROM user WHERE username = '" . $username . "';"); 
			return mysql_num_rows(mysql_query($sql)) > 0;
		}
	}
	
	//user
	$name = $_POST["name"];
	$facebookname = $_POST["facebookname"];
	$phone = $_POST["phone"];
	$username = $_POST["username"];
	$address = $_POST["address"];
	$email = $_POST["email"];
	$pass = md5($_POST["password"]);
	$password2 = md5($_POST["password2"]);
	
	$name_nn = $name;
	$address_nn = $address;
	$phone_nn = $phone;
	$email_nn = $email;
	
	//other
	$error = false;
	$insertOk = false; // nếu chưa insert thì insert
	
	$xl_register = new xl_register();
	
	if(empty($username) || is_null($username) || $xl_register->userExists($username))
	{
		$error = true;
	}
	else
	{
		$tbl = "user";
		$field = "username, pass, name, address, phone, email, "
				." name_nn, address_nn, phone_nn, email_nn";
		$values = "('" . $username . "', '" . $pass . "', '"
						. $name . "', '" . $address . "', '" . $phone . "', '" . $email . "', '"
						. $name_nn . "', '" . $address_nn . "', '" . $phone_nn . "', '" . $email_nn . "'),";
		$values = substr(substr($values,0,-2),1);
		
		$query = "INSERT INTO $tbl ($field) VALUES($values)";
		//echo $query;
		mysql_query("SET character_set_client=utf8");
		mysql_query("SET character_set_connection=utf8");
		$insertOk = mysql_query($query);
	}

	if($error)
	{
		// nếu error = true
		echo json_encode("isExisted");
	}
	else
	{
		if($insertOk)
		{
			// nếu error = false và insertOK = true
			echo json_encode($insertOk);
		}
		else
		{
			// nếu error = false và insertOK = false
			echo json_encode($insertOk);
		}
	}
?>
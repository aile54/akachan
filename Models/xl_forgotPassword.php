<?php
	require_once('database.php');
	include_once('../Templates/Plugin/jcart/jcart.php');
	include_once("../Models/send_gmail/send_gmail.php");
	include_once("../Admin/library/security/security.php");
	
	class xl_forgotPassword extends database
	{
		function emailExists($email)
		{
			$email = mysql_real_escape_string($email); 
			//alert($email);
			$sql = sprintf("SELECT * FROM user WHERE email = '" . $email . "';"); 
			return mysql_query($sql);
		}
		
		function generateRandomString($length)
		{
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, strlen($characters) - 1)];
			}
			return $randomString;
		}
	}
	
	$email = $_POST['email'];
	$xl_forgotPassword = new xl_forgotPassword();
	$returnCode = "";
	$updateIsOK = false;
	if(!empty($email) && !is_null($email))
	{
		$query = $xl_forgotPassword->emailExists($email);
		@$row = mysql_fetch_array($query);
		if($row == false)
		{
			@$returnCode = "NotExisted";
		}
		else
		{
			$email = $row["email"];
			$name = $row["name"];
			$username = $row["username"];
			
			$to_mail = $email;
			$to_name = $username;
			
			$newpass = $xl_forgotPassword->generateRandomString(10);
			
			$chude = "[Akachan shop] Cap lai mat khau";
			$content = "Mat khau moi cua ban la: ". $newpass ."<br/>";
			$content .= "Vui long dang nhap de doi lai mat khau khac! <br/>";
			$content .= "Tran trong, <br/>";
			$content .= "Akachan Administrator. <br/>";
			$send_mail = send_mail($to_mail,$to_name,$chude,$content,"Akachan Administrator");
			if($send_mail)
			{
				$query = "UPDATE user SET pass = '" . md5($newpass) . "' " .
										 "WHERE username = '" . $username . "'";
				mysql_query("SET character_set_client=utf8");
				mysql_query("SET character_set_connection=utf8");
				mysql_query($query);
				$returnCode = "Success";
			}
			else
			{
				$returnCode = "Fail";
			}
		}
	}
	echo json_encode($returnCode);
?>
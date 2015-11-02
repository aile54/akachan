<?php
	require_once('database.php');
	include_once('../Templates/Plugin/jcart/jcart.php');
	include_once("../Models/send_gmail/send_gmail.php");
	
	class xl_forgotPassword extends database
	{
		function userExists($username, $cmnd)
		{
			$username = mysql_real_escape_string($username);
			$cmnd = mysql_real_escape_string($cmnd);
			$sql = sprintf("SELECT email, name FROM user WHERE username = '" . $username . "' AND cmnd = '" . $cmnd . "';");
			//echo $sql;
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
	$username = $_POST['username'];
	$pass = $_POST['pass'];
	$cmnd = $_POST['cmnd'];
	$xl_forgotPassword = new xl_forgotPassword();
	$returnCode = "";
	$updateIsOK = false;
	if(!empty($username) && !is_null($username) && !empty($cmnd) && !is_null($cmnd))
	{
		$query = $xl_forgotPassword->userExists($username, $cmnd);
		@$row = mysql_fetch_array($query);
		if($row == false)
		{
			@$returnCode = "NotExisted";
		}
		else
		{
			$query = "UPDATE user SET pass = '" . md5($pass) . "' " .
											 "WHERE username = '" . $username . "' AND cmnd = '" . $cmnd . "';";
			mysql_query("SET character_set_client=utf8");
			mysql_query("SET character_set_connection=utf8");
			//echo $query;
			$updateIsOK = mysql_query($query);
			if($updateIsOK)
			{
				$returnCode = "Success";
			}
			else
			{
				$returnCode = "Fail";
			}
					
			// Close đến khi dùng dc send mail
			if(false)
			{
				$email = $row["email"];
				$name = $row["name"];
				
				$to_mail = $email;
				$to_name = $name;
				
				$newpass = $xl_forgotPassword->generateRandomString(10);
				
				$chude = "[Akachan shop] Cap lai mat khau";
				$content = "Mật khẩu mới của bạn: ". $newpass ."<br/>";
				$content .= "Vui lòng đăng nhập để thay đổi lại mật khẩu! <br/>";
				$hoten = "";
				$send_mail = send_mail($to_mail,$to_name,$chude,$content,$hoten);
				if($send_mail)
				{
					$query = "UPDATE user SET pass = '" . md5($newpass) . "', " .
											 "WHERE username = " . $username;
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
	}
	echo json_encode($returnCode);
?>
<?php
	require_once('database.php');
	include_once('../Templates/Plugin/jcart/jcart.php');
	
	class xl_changePassword extends database
	{
		function userExists($userid)
		{
			$userid = mysql_real_escape_string($userid);
			$sql = "SELECT pass FROM USER WHERE id = '$userid';";
			$query = mysql_query($sql);
			//echo ($sql);
			return $query;
		}
	}
	$userid = !empty($_SESSION["userid"]) ? $_SESSION["userid"] : "";
	$xl_changePassword = new xl_changePassword();
	$returnCode = "";
	$oldPass = !empty($_POST["oldPass"]) ? md5($_POST["oldPass"]) : "";
	$newPass = !empty($_POST["newPass"]) ? md5($_POST["newPass"]) : "";
	if(!empty($userid) && !is_null($userid))
	{
		$query = $xl_changePassword->userExists($userid);
		@$row = mysql_fetch_array($query);
		
		if($row == false)
		{
			$returnCode = "SessionOut";
		}
		else if(empty($oldPass) || is_null($oldPass))
		{
			$returnCode = "oldPass";
		}
		else if(empty($newPass) || is_null($newPass))
		{
			$returnCode = "newPass1";
		}
		else
		{
			$pass = $row["pass"];
			
			if($pass == $oldPass)
			{
				if($oldPass != $newPass)
				{
					$query = "UPDATE user SET pass = '" . $newPass . "' " .
											 "WHERE id = " . $userid;
					mysql_query("SET character_set_client=utf8");
					mysql_query("SET character_set_connection=utf8");
					//echo ($query);
					if(mysql_query($query))
					{
						$returnCode = "Success";
					}
					else
					{
						$returnCode = "Fail";
					}
				}
				else
				{
					$returnCode = "newPass2";
				}
			}
			else
			{
				$returnCode = "Fail";
			}
		}
	}
	else
	{
		$returnCode = "SessionOut";
	}
	echo json_encode($returnCode);
?>
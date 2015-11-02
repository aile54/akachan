<?php
	require_once('database.php');
	
	class xl_login extends database
	{
		function userExists($u, $p)
		{
			$u = mysql_real_escape_string($u);
			$p = mysql_real_escape_string($p);
			$sql = "SELECT * FROM USER WHERE username = '$u' AND pass = '$p';";
			$query = mysql_query($sql);
			return $query;
		}
	}
	
	$u=$p="";
	$u=$_POST['username'];
	$p=md5($_POST["password"]);
	if($u && $p)
	{
		$xl_login = new xl_login();
		$query = $xl_login->userExists($u, $p);
		
		@$row = mysql_fetch_array($query);
		if($row == false)
		{
			$error = "Tên đăng nhập và mật khẩu không đúng";
			echo json_encode($error);
		}
		else
		{
			if (!isset($_SESSION)) {
			  session_start();
			}
			$_SESSION['userid'] = $row['id'];
			$_SESSION['username'] = $row['username'];
			$success = true;
			echo json_encode($success);
		}
	}
?>
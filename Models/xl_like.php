<?php
	require_once('database.php');
	class xl_like extends database
	{
		function GetNumberLove($productId)
		{
			$userid = mysql_real_escape_string($productId);
			$sql = "SELECT love FROM products WHERE id = '$productId';";
			$query = mysql_query($sql);
			return $query;
		}
	}
	
	$productId = $_POST["productId"];
	$xl_like = new xl_like();
	if(!empty($productId) && !is_null($productId))
	{
		$cookie_name = "product_" . $productId . "_like";
		if(isset($_COOKIE[$cookie_name])) {
			$query = $xl_like->GetNumberLove($productId);
			@$row = mysql_fetch_array($query);
			$returnCode = $row["love"];
		}
		else {
			setcookie($cookie_name, true, time() + (10 * 365 * 24 * 60 * 60), "/");
			$query = $xl_like->GetNumberLove($productId);
			
			$query = "UPDATE products SET love = love + 1 " .
									 "WHERE id = " . $productId;
			//echo ($query);
			if(mysql_query($query))
			{
				$query = $xl_like->GetNumberLove($productId);
				@$row = mysql_fetch_array($query);
				$returnCode = $row["love"];
			}
			else
			{
				$returnCode = "Fail";
			}
		}
	}
	echo json_encode($returnCode);
?>
<?php

$db_host = "localhost";	//---- Database host(usually localhost).
//$db_user = "hangnhat_chobe";	//---- Your database username.
//$db_pass = "hYhnTR34^";	//---- Your database password.
$db_name = "hangnhat_chobe";	//---- Your database name.
$db_user = "root";
$db_pass = "root";
$link = @mysql_connect($db_host,$db_user,$db_pass); //@mysql_connect(

mysql_select_db($db_name);
mysql_query( " set names 'utf8'");
?>

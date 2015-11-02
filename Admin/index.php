<?php
	
	session_start();
	ob_start();	
	require_once('library/loader.php');
	//checkLogin();
	//echo $_SESSION["username"];
	//$_SESSION["admin"];
	//if(!session_is_registered('admin')){
//			session_unregister('admin');
//			header('location: ../Admin/source/login.php');
//		}
	
	//if($_SESSION['log']=='sadmin')
		$perid=0;
	//else{
//		$tbl_per = new table('admin');
//		$res_per = $tbl_per->loadOne('username="'.$_SESSION["log"].'"');
//		$row_per = mysql_fetch_object($res_per);
//		$perid = $row_per->per;
//	}
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<script type="text/javascript" src="../development/Templates/Scripts/dialog.js"></script>
<script type="text/javascript" src="../development/ImageManager/assets/dialog.js"></script>
<script type="text/javascript" src="../development/ImageManager/IMEStandalone.js"></script>
<script type="text/javascript" src="../inv/scripts/innovaeditor.js"></script>
<script type="text/javascript" src="js/function.js"></script>
<?php include('source/head.php'); ?>


<body>
<div id="main">
	<?php include('source/top.php'); ?>
	<div id="middle">
		<?php
			include('source/left.php');
		?>
		
		<div id="result">
		<?php
			include('source/main.php');
		?>
		</div>
		<?php include('source/right.php'); ?>
	</div>
	<div id="footer"></div>
</div>


</body>
</html>
                            
                            
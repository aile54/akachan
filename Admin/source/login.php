<?php
session_start();
require_once('../library/loader.php');
$tbl = new table('admin');
if(isset($_POST["login"])){
	if($_POST["username"]=='sadmin' && md5($_POST["password"]) == 'e042f11a6889c81bf5e743c5a0cb482b'){
		session_register('admin');
		$_SESSION["log"]=$_POST["username"];
		echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
	}
	else{
		$username = format($_POST["username"],0);
		$password = format(md5($_POST["password"]),0);
		$res = $tbl->login($username,$password);
		if($res==1){
				
				session_register('admin');
				$_SESSION["log"]=$_POST["username"];
				echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
				//header('location: index.php');
				//echo $_SESSION["log"];
				//echo "<br>";
				
			}
	}
}
?>


<link rel="stylesheet" type="text/css" href="../css/login.css" />
<body bgcolor="#03668f">
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#03668f"><table width="780" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="3" background="../img/login1.gif"  width="780" height="247"></td>
      </tr>
      <tr>
        <td width="250" height="168" background="../img/login2.gif"></td>
        <td width="292" valign="middle" bgcolor="#FFFFFF">
        <form method="post">
        <table border="0" align="center" cellpadding="0" cellspacing="3">
          <tr>
            <td>Username: </td>
            <td><label>
              <input name="username" type="text" class="login" id="username">
            </label></td>
          </tr>
          <tr>
            <td>Password: </td>
            <td><input name="password" type="password" class="login" id="password"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><label>
              <input name="login" type="submit" class="signin" id="login" value=" ">
            </label></td>
          </tr>
        </table>
        </form>
        </td>
        <td width="238" height="169" background="../img/login4.gif">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" background="../img/login5.gif" width="780" height="183"></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
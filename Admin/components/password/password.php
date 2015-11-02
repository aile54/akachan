<?php

	$tbl = new table('admin');
	if(isset($_POST["done"])){
		
			$username = format($_SESSION["log"],0);;
			// check old password
			$password = format(md5($_POST["password"]),0);
			$res = $tbl->login($username,$password);
			if($res == 0){
					echo "Wrong Password!!!";
				}
				else if($_POST["newpassword"]!=$_POST["againpassword"]){
					echo "Again new password wrong!!!";
				}else{
					// get field
					$field = array('name','password');
					
					// get value
					$values = array(
									format($_POST["name"],0),
									format(md5($_POST["newpassword"]),0)
								   );
					// updateObject($field=array(),$value=array(),$where)
					$res = $tbl->updateObject($field,$values,'username='.$username);
					if($res){
							header('location: '.loadPage(''));
						}
				}			
		}
$res = $tbl->loadOne('username="'.$_SESSION["log"].'"');
if($res){
		$row=mysql_fetch_array($res);
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Change Password</h1>
				<div class="breadcrumbs"><a href="#">Content</a> / <a href="#">Sửa</a></div>
			</div><br />
 
		  
		  
			<div class="table">
				<img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post" enctype="multipart/form-data">
				<table class="listing form" cellpadding="0" cellspacing="0">
					<tr>
						<th class="full" colspan="3">NỘI DUNG</th>
					</tr>
					<tr>
						<td class="first" width="150"><strong>Name</strong></td>
						<td colspan="2" class="last"><input name="name" type="text" class="text" id="name" value="<?php echo $row['name']; ?>" /></td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Username</strong></td>
						<td colspan="2" class="last"><input name="username" type="text" class="text" id="username" value="<?php echo $row['username']; ?>" readonly="readonly" /></td>
					</tr>
					<tr>
					  <td class="first"><strong>Old Password</strong></td>
					  <td colspan="2" class="last"><input name="password" type="password" class="text" id="password" value="" /></td>
				  </tr>
					<tr>
						<td class="first"><strong>New Password</strong></td>
						<td colspan="2" class="last"><input name="newpassword" type="password" class="text" id="newpassword" value="" /></td>
					</tr>
                    <tr>
						<td class="first"><strong>Again new password</strong></td>
						<td colspan="2" class="last"><input name="againpassword" type="password" class="text" id="againpassword" value="" /></td>
					</tr>
					<tr class="bg">
					  <td class="first">&nbsp;</td>
					  <td colspan="2" class="last"><label>
					    <input type="submit" name="done" value="Submit" id="done" />
					  </label></td>
				  </tr>
				</table>
				</form>
	        <p>&nbsp;</p>
		  </div>
		</div>
<?php
	}
?>
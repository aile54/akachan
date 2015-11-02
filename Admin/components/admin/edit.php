<?php

	if(isset($_GET["username"])){
			$username = $_GET["username"];
		}
	$tbl = new table('admin');
	if(isset($_POST["done"])){
			// get field
			$field = array('name','password');
			
			// get value
			$values = array(
							format($_POST["name"],0),
							format(md5($_POST["password"]),0)
						   );
			// updateObject($field=array(),$value=array(),$where)
			$res = $tbl->updateObject($field,$values,'per <> 0 and username='.format($username,0));
			if($res){
					echo "OK";
				}
		}
$res = $tbl->loadOne('username='.format($username,0));
if($res){
		$row=mysql_fetch_array($res);
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Admin</h1>
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
						<td class="first"><strong>Name</strong></td>
						<td colspan="2" class="last"><input name="name" type="text" class="text" id="name" value="<?php echo $row['name']; ?>" /></td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Username</strong></td>
						<td colspan="2" class="last"><input name="username" type="text" class="text" id="username" value="<?php echo $row['username']; ?>" readonly="readonly" /></td>
					</tr>
					<tr>
						<td class="first" width="96"><strong>Password</strong></td>
						<td colspan="2" class="last"><input name="password" type="password" class="text" id="password" value="<?php echo $row['password']; ?>" /></td>
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
<?php
	$tbl = new table('admin');
	if(isset($_POST["done"])){
			// get field
			$field = 'name,username,password';
			
			// get values
			// format($str,$isComma=1)
			$values.= format($_POST["name"],1);
			$values.= format($_POST["username"],1);
			$values.= format(md5($_POST["password"]),0);
			
			if(isEmpty($_POST["username"])==1){
					echo "Username invalid!";
				}else{
					// insertObject($field,$value)
					$res = $tbl->insertObject($field,$values);
					if($res){
							header('location: '.loadPage('admin'));
						}
				}
		}
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Admin</h1>
				<div class="breadcrumbs"><a href="#">Content</a> / <a href="#">Thêm</a></div>
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
						<td colspan="2" class="last"><input name="name" type="text" class="text" id="name" /></td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Username</strong></td>
						<td colspan="2" class="last"><input name="username" type="text" class="text" id="username" /></td>
					</tr>
					<tr>
						<td class="first" width="96"><strong>Password</strong></td>
						<td colspan="2" class="last"><input name="password" type="password" class="text" id="password" /></td>
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
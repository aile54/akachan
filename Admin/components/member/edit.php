<?php

	if(isset($_GET["id"])){
			$id = $_GET["id"];
		}
	$tbl = new table('user');
	if(isset($_POST["done"])){
			// get field
			if($_POST['pass']=='')
				$field = array('username','name','image','address','phone','email','name_nn','address_nn','phone_nn','email_nn','name_bank','chuthe','num_acc','block');
			else
				$field = array('username','pass','name','image','address','phone','email','name_nn','address_nn','phone_nn','email_nn','name_bank','chuthe','num_acc','block');
			
			$filename=$_FILES['image']['name'];
			if($filename=='')
				$image = $_POST["tmpImage"];
			else
				$image = uploadFile('image',0,'../uploads/');
			// get value
			if($_POST['pass']=='')
				$values = array(
								format($_POST['username'],0),
								format($_POST['name'],0),
								format(str_replace('../','',$image),0) ,
								format($_POST['address'],0),
								format($_POST['phone'],0),
								format($_POST['email'],0),
								format($_POST['name_nn'],0),
								format($_POST['address_nn'],0),
								format($_POST['phone_nn'],0),
								format($_POST['email_nn'],0),
								format($_POST['name_bank'],0),
								format($_POST['chuthe'],0),
								format($_POST['num_acc'],0),
								format(isCheck(isset($_POST["block"])),0)
							   );
			else
				$values = array(
								format($_POST['username'],0),
								format(md5($_POST['pass']),0),
								format($_POST['name'],0),
								format(str_replace('../','',$image),0) ,
								format($_POST['address'],0),
								format($_POST['phone'],0),
								format($_POST['email'],0),
								format($_POST['name_nn'],0),
								format($_POST['address_nn'],0),
								format($_POST['phone_nn'],0),
								format($_POST['email_nn'],0),
								format($_POST['name_bank'],0),
								format($_POST['chuthe'],0),
								format($_POST['num_acc'],0),
								format(isCheck(isset($_POST["block"])),0)
							   );
			// updateObject($field=array(),$value=array(),$where)
			$res = $tbl->updateObject($field,$values,'id='.$id);
			if($res){
					echo "OK";
				}
		}
$res = $tbl->loadOne('id='.$id);
if($res){
		$row=mysql_fetch_array($res);
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>User</h1>
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
                    <tr class="bg">
						<td class="first"><strong>Username</strong></td>
						<td colspan="2" class="last"><input name="username" type="text" class="text" id="username" value="<?php echo $row['username']; ?>" readonly="readonly" /></td>
					</tr>
					<tr>
						<td class="first" width="96"><strong>Password</strong></td>
						<td colspan="2" class="last"><input name="pass" type="password" class="text" id="pass"/></td>
					</tr>
					<tr>
						<td class="first"><strong>Name</strong></td>
						<td colspan="2" class="last"><input name="name" type="text" class="text" id="name" value="<?php echo $row['name']; ?>" /></td>
					</tr>
                    <tr>
						<td class="first"><strong>Phone</strong></td>
						<td colspan="2" class="last"><input name="phone" type="text" class="text" id="phone" value="<?php echo $row['phone']; ?>"/></td>
					</tr>
                    <tr>
						<td class="first"><strong>Address</strong></td>
						<td colspan="2" class="last"><input name="address" type="text" class="text" id="address" value="<?php echo $row['address']; ?>"/></td>
					</tr>
                    <tr>
						<td class="first"><strong>Email</strong></td>
						<td colspan="2" class="last"><input name="email" type="text" class="text" id="email" value="<?php echo $row['email']; ?>"/></td>
					</tr>
                    <tr>
						<td class="first" width="75"><strong>Image</strong></td>
						<td width="225" class="last"><input name="image" type="file" id="image"  />
                        <input type="hidden" name="tmpImage" value="<?php echo $row['image']; ?>"  /><?php echo $row['image']; ?>                         </td>
						
					</tr>
                    <tr><td colspan="2"><strong>Địa chỉ ship hàng</strong></td></tr>
                    <tr>
						<td class="first"><strong>Người nhận</strong></td>
						<td colspan="2" class="last"><input name="name_nn" value="<?php echo $row['name_nn']; ?>" type="text" class="text"/></td>
					</tr>
                    <tr>
						<td class="first"><strong>Số điện thoại</strong></td>
						<td colspan="2" class="last"><input name="phone_nn" value="<?php echo $row['phone_nn']; ?>"  type="text" class="text" /></td>
					</tr>
                    <tr>
						<td class="first"><strong>Địa chỉ</strong></td>
						<td colspan="2" class="last"><input name="address_nn" value="<?php echo $row['address_nn']; ?>" type="text" class="text"/></td>
					</tr>
                    <tr>
						<td class="first"><strong>Email</strong></td>
						<td colspan="2" class="last"><input name="email_nn" value="<?php echo $row['email_nn']; ?>"  type="text" class="text" /></td>
					</tr>
                    <tr><td colspan="2"><strong>Thông tin thanh toán</strong></td></tr>
                    <tr>
						<td class="first"><strong>Tên ngân hàng</strong></td>
						<td colspan="2" class="last"><input name="name_bank" value="<?php echo $row['name_bank']; ?>"  type="text" class="text"/></td>
					</tr>
                    <tr>
						<td class="first"><strong>Chủ thẻ</strong></td>
						<td colspan="2" class="last"><input name="chuthe" value="<?php echo $row['chuthe']; ?>"  type="text" class="text" /></td>
					</tr>
                    <tr>
						<td class="first"><strong>Số tài khoản</strong></td>
						<td colspan="2" class="last"><input name="num_acc" value="<?php echo $row['num_acc']; ?>"  type="text" class="text"/></td>
					</tr>
                    <tr>
						<td class="first"><strong>Block</strong></td>
						<td colspan="2" class="last"><input name="block" type="checkbox" id="block" <?php loadChecked($row['block']) ?> /></td>
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
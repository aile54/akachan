<?php
	$tbl = new table('user');
	if(isset($_POST["done"])){
			// get field
			$field = 'id,username,pass,name,image,address,phone,email,name_nn,address_nn,phone_nn,email_nn,name_bank,chuthe,num_acc,date_add,block';
			
			$now=mktime(0,0,0,date("m"),date("d"),date("Y"));
			$image = uploadFile('image',0,'../uploads/');
			// get values
			// format($str,$isComma=1)
			$values = format($tbl->getLastId()+1,1);
			$values.= format($_POST['username'],1);
			$values.= format(md5($_POST['pass']),1);
			$values.= format($_POST['name'],1);
			$values.= format(str_replace('../','',$image),1);
			$values.= format($_POST['address'],1);
			$values.= format($_POST['phone'],1);
			$values.= format($_POST['email'],1);
			$values.= format($_POST['name_nn'],1);
			$values.= format($_POST['address_nn'],1);
			$values.= format($_POST['phone_nn'],1);
			$values.= format($_POST['email_nn'],1);
			$values.= format($_POST['name_bank'],1);
			$values.= format($_POST['chuthe'],1);
			$values.= format($_POST['num_acc'],1);
			$values.= format($now,1);
			$values.= format(isCheck(isset($_POST["block"])),0);
			
			if(isEmpty($_POST["username"])==1){
					echo "Username invalid!";
				}else{
					// insertObject($field,$value)
					$res = $tbl->insertObject($field,$values);
					if($res){
							header('location: '.loadPage('member'));
						}
				}
		}
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Thành viên</h1>
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
                    <tr class="bg">
						<td class="first"><strong>Username</strong></td>
						<td colspan="2" class="last"><input name="username" type="text" class="text" id="username" /></td>
					</tr>
					<tr>
						<td class="first" width="96"><strong>Password</strong></td>
						<td colspan="2" class="last"><input name="pass" type="password" class="text" id="pass" /></td>
					</tr>
					<tr>
						<td class="first"><strong>Name</strong></td>
						<td colspan="2" class="last"><input name="name" type="text" class="text" id="name" /></td>
					</tr>
                    <tr>
						<td class="first"><strong>Phone</strong></td>
						<td colspan="2" class="last"><input name="phone" type="text" class="text" id="phone" /></td>
					</tr>
                    <tr>
						<td class="first"><strong>Address</strong></td>
						<td colspan="2" class="last"><input name="address" type="text" class="text" id="address" /></td>
					</tr>
                    <tr>
						<td class="first"><strong>Email</strong></td>
						<td colspan="2" class="last"><input name="email" type="text" class="text" id="email" /></td>
					</tr>
                    <tr>
						<td class="first" width="75"><strong>Image</strong></td>
						<td class="last"><input name="image" type="file" id="image"  /> </td>
					</tr>
                    <tr><td colspan="2"><strong>Địa chỉ ship hàng</strong></td></tr>
                    <tr>
						<td class="first"><strong>Người nhận</strong></td>
						<td colspan="2" class="last"><input name="name_nn" type="text" class="text"/></td>
					</tr>
                    <tr>
						<td class="first"><strong>Số điện thoại</strong></td>
						<td colspan="2" class="last"><input name="phone_nn" type="text" class="text" /></td>
					</tr>
                    <tr>
						<td class="first"><strong>Địa chỉ</strong></td>
						<td colspan="2" class="last"><input name="address_nn" type="text" class="text"/></td>
					</tr>
                    <tr>
						<td class="first"><strong>Email</strong></td>
						<td colspan="2" class="last"><input name="email_nn" type="text" class="text" /></td>
					</tr>
                    <tr><td colspan="2"><strong>Thông tin thanh toán</strong></td></tr>
                    <tr>
						<td class="first"><strong>Tên ngân hàng</strong></td>
						<td colspan="2" class="last"><input name="name_bank" type="text" class="text"/></td>
					</tr>
                    <tr>
						<td class="first"><strong>Chủ thẻ</strong></td>
						<td colspan="2" class="last"><input name="chuthe" type="text" class="text" /></td>
					</tr>
                    <tr>
						<td class="first"><strong>Số tài khoản</strong></td>
						<td colspan="2" class="last"><input name="num_acc" type="text" class="text"/></td>
					</tr>
                    <tr>
						<td class="first"><strong>Block</strong></td>
						<td colspan="2" class="last"><input name="block" type="checkbox" id="block" /></td>
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
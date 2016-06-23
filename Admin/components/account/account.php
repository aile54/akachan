<?php
	$tbl = new table('account');
	$row = null;
	$res = $tbl->loadOne('id=1');
	$row=mysql_fetch_object($res);
	if(isset($_POST["done"])){
		$field = array('name','pass');
		if(isset($_POST["name"]) && $_POST["name"] != '')
		{
			$name = $_POST["name"];
			if(!Validator($name))
			{
				echo "<script language='javascript'>alert('Địa chỉ email không phù hợp!');</script>";
			}
			else
			{
				if(isset($_POST["pass"]) && $_POST["pass"] != "")
				{
					$pass = $_POST["pass"];
					$crypt = encrypt_decrypt('encrypt', $pass);
					//var_dump($crypt);
					/*$decrypt = encrypt_decrypt('decrypt', $crypt);
					var_dump($decrypt);*/
					if($row)
					{
						if($crypt != $row->pass && $name != $row->name)
						{
							$values = array(format($_POST["name"],0),format($crypt,0));
							$res = $tbl->updateObject($field,$values,'id=1');
							//var_dump($res);
							if($res)
							{
								echo "Update thành công!!!!";
								$res = $tbl->loadOne('id=1');
								$row=mysql_fetch_object($res);
							}
						}
					}
					else
					{
						$values = array(format($_POST["name"],0),format($crypt,0));
						$res = $tbl->updateObject($field,$values,'id=1');
						//var_dump($res);
						if($res)
						{
							echo "Update thành công!!!!";
							$res = $tbl->loadOne('id=1');
							$row=mysql_fetch_object($res);
						}
					}
				}
				else
				{
					echo "<script language='javascript'>alert('Vui lòng nhập mật khẩu!');</script>";
				}
			}
		}
	}
	
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Danh mục 1</h1>
				<div class="breadcrumbs">Account Setting</div>
			</div><br />
 
		  
		  
			<div class="table">
				<img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post" enctype="multipart/form-data">
				<table class="listing form" cellpadding="0" cellspacing="0">
					<tr>
						<th class="full" colspan="2">NỘI DUNG</th>
					</tr>
					<tr>
						<td class="first"><strong>Account Name</strong></td>
						<td colspan="2" class="last">
                        	<input name="name" type="text" class="text" 
                            	value="<?php if($row){echo $row->name;} ?>" />
                        </td>
					</tr>
                    <tr>
						<td class="first"><strong>Password</strong></td>
						<td colspan="2" class="last">
                        	<input name="pass" type="text" class="text" 
                            	value="<?php if($row){echo encrypt_decrypt('decrypt',$row->pass);} ?>" />
                       	</td>
					</tr>
					<tr class="bg">
					  <td class="first">&nbsp;</td>
					  <td class="last"><label>
					    <input type="submit" name="done" value="Submit" id="done" />
					  </label></td>
				  </tr>
				</table>
			  </form>
	        <p>&nbsp;</p>
		  </div>
		</div>
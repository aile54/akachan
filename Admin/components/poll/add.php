<?php 
	$tbl = new table('ketqua');
	
	if($_POST["done"]){
			
			// get field
			$field = 'id,ms,image,solanchon';
			
			// upload file
			// uploadFile($file,$auto=1,$dir='uploads/images/')
			$res_kt = $tbl -> loadOne('ms="'.$_POST['ms'].'"');
			$num_kt = mysql_num_rows($res_kt);
			if($num_kt==0){
				$image = uploadFile('image',0,'../uploads/');
			}
			
			
			$id = $tbl->getLastId()+1;
			$values = format($id,1);
			$values.= format($_POST["ms"],1);
			$values.= format(str_replace('../','',$image),1);
			$values.= format($_POST["solanchon"],0);
			
			if($num_kt==0){
			// insertObject($field,$value)
			if($num_kt==0){
				$res = $tbl->insertObject($field,$values);
				if($res){
						echo "OK";
					}
				}
			}
			else
				echo "Mã số không được trùng";
		}
	
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Bình chọn</h1>
			  <div class="breadcrumbs"><a href="#">Thêm</a></div>
  </div><br />
 
		  
		  
			<div class="table">
				<img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post" enctype="multipart/form-data">
				<table class="listing form" cellpadding="0" cellspacing="0">
					<tr>
						<th class="full" colspan="4">NỘI DUNG</th>
					</tr>
					<tr>
						<td class="first" width="135"><strong>Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
						<td width="521" colspan="3" class="last">#<?php echo $tbl->getLastId()+1; ?></td>
					</tr>
                    <tr>
						<td class="first" width="135"><strong>MS</strong></td>
						<td colspan="3" class="last"><input name="ms" type="text" /> </td>
					</tr>
                    <tr>
						<td width="135" class="first"><strong>Hình ảnh</strong></td>
						<td colspan="3" class="last"><input name="image" type="file" id="image"  /> </td>
					</tr>
					<tr>
						<td class="first" width="135"><strong>Số Phiếu</strong></td>
						<td colspan="3" class="last"><input name="solanchon" type="text" value="0"/> </td>
			 		</tr>
					<tr class="bg">
					  <td class="first">&nbsp;</td>
					  <td colspan="3" class="last"><label>
					    <input type="submit" name="done" value="Submit" id="done" />
					  </label>                      </td>
				  </tr>
				</table>
			  </form>
	        <p>&nbsp;</p>
		  </div>
		</div>
<?php 
	if(isset($_GET['id'])){
			$id = $_GET["id"];
		}
	$tbl = new table('ketqua');
	
	if($_POST["done"]){
			
			// get field
			$res_kt = $tbl -> loadOne('ms="'.$_POST['ms'].'"');
			$num_kt = mysql_num_rows($res_kt);

			if($_POST['tmpms']==$_POST['ms']){
				$filea = $_FILES["image"]["name"];
				if($filea=='')
					$image = '../'.$_POST['tmpimage'];
				else
					$image = uploadFile('image',0,'../uploads/');
				
			}
			else{
				if($num_kt==0){
					$filea = $_FILES["image"]["name"];
					if($filea=='')
						$image = '../'.$_POST['tmpimage'];
					else
						$image = uploadFile('image',0,'../uploads/');
				}
				else
					echo 'Mã số không được trùng';
			}
			
			$field = array('ms','image','solanchon');
			
			// get values
			$ms = format($_POST["ms"],0);
			$solanchon = format($_POST["solanchon"],0);
			$image = format(str_replace('../','',$image),0);
			
			$values = array($ms,$image,$solanchon);
			// insertObject($field,$value)
			if($_POST['tmpms']==$_POST['ms']){
				$res = $tbl->updateObject($field,$values,'id='.$id);
				if($res){
						header('location: '.loadPage('poll'));
					}
			}
			else{
				if($num_kt==0){
					$res = $tbl->updateObject($field,$values,'id='.$id);
					if($res){
							header('location: '.loadPage('poll'));
						}
				}
			}
		}
$res = $tbl->loadOne('id='.$id);	
if($res){
		$row = mysql_fetch_array($res);	
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Bình chọn</h1>
			  <div class="breadcrumbs"><a href="#">Sửa</a></div>
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
						<td width="521" colspan="3" class="last">#<?php echo $id; ?></td>
					</tr>
                    <tr>
						<td class="first" width="135"><strong>MS</strong></td>
						<td colspan="3" class="last"><input name="ms" type="text" value="<?php echo $row['ms'];?>"/> 
                        <input type="hidden" name="tmpms" value="<?=$row['ms']?>" />
                        </td>
					</tr>
                    <tr>
						<td width="135" class="first"><strong>Hình ảnh</strong></td>
						<td colspan="3" class="last"><input name="image" type="file" id="image"  /> 
                         <input type="hidden" name="tmpimage" value="<?php echo $row['image']; ?>"  /><?php echo $row['image'] ?></td>
                    </tr>
					<tr class="bg">
						<td class="first"><strong>Số phiếu</strong></td>
						<td colspan="3" class="last"><input name="solanchon" type="text" value="<?php echo $row['solanchon'];?>"/> 
                        </td>
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
<?php }?>
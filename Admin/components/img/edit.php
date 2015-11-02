<?php 
	
	if(isset($_GET['id'])){
			$id = $_GET["id"];
		}
	$tbl = new table('img');
	
	if(isset($_POST["done"])){
			
			// get field
			
			$field = array('proid','name','image');
			
			$img = edit_img('../','Images/Products/','img','image',$_POST['tmpimage'],$id,50,50);		
			
			$values = array(
							format($_POST["proid"],0) ,
							format($_POST["name"],0),
							format($img,0)
							);
			$res = $tbl->updateObject($field,$values,'id='.$id);
			
			if($res){
					echo "OK";
				}
			
		}
$res = $tbl->loadOne('id='.$id);	
if($res){
		$row = mysql_fetch_array($res);	
		$proid = $row['proid'];
		
		$thumb_img = get_thumb('Images/Products/',$row['image']);
?>
<div id="center-column">
			<div class="top-bar">
            	<a href="<?php echo loadPage('addimg')."&proid=".$proid; ?>"  class="button"><img src="img/add-folder-icon.png" width="30" height="30" border="0" />  </a>
			  <h1>Kích thước & Giá</h1>
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
						<td class="first" width="135"><strong>ID sản phẩm</strong></td>
						<td colspan="3" class="last"><input name="proid" type="text" style="width:300px" value="<?php echo $row['proid'];?>"/> </td>
					</tr>
                    <tr>
						<td class="first" width="135"><strong>Tên màu</strong></td>
						<td colspan="3" class="last"><input name="name" type="text" style="width:300px" value="<?php echo $row['name']?>"/> </td>
					</tr>
                    <tr>
						<td class="first" width="75"><strong>Hình ảnh</strong></td>
						<td width="225" class="last"><input name="image" type="file" id="image"  />
                        <input type="hidden" name="tmpimage" value="<?php echo $row['image']; ?>"  />
						<img src="../<?php echo $thumb_img?>" height="50" align="absmiddle" />                        
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
            <?php
		
	$tbl= new table('img');
	
	// chec update
	if(isset($_POST["update"])){
			// remove($arr,$field='id')
			if(isset($_POST["del"])){
					$del = $_POST["del"];
					del_img_array('../Images/Products/','img','image',$del);
				}
		}
?>
				<form method="post">

				<table width="100%" cellpadding="0" cellspacing="0" class="listing">
					<tr>
						<th class="first">Tên màu</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
						<th class="last">Xóa</th>
					</tr>

<?php

	$pagename = $_SERVER["PHP_SELF"]."?choose=img";
	$limit = 20;
	if(isset($_GET["start"])){
			$start = $_GET["start"];
		}
	if(!isset($start)) $start=0;
	$nume=0;
	
	if(isset($_POST["search"])){
			// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc');
			// formatCompare($str,$pos=0);
			$res = $tbl->loadPaging($start,$nume,$limit,'where proid='.$_POST["key"],'order by proid desc');
		}else{
		// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc');	
			$res = $tbl->loadPaging($start,$nume,$limit,'where proid='.$proid.' and id <>'.$_GET['id'],'order by proid desc');
		}
		
	if($res){
			while($row=mysql_fetch_array($res)){
				$tbl_pro = new table('products');
				$res_pro = $tbl_pro -> loadOne('id='.$row['proid']);
				$row_pro = mysql_fetch_array($res_pro);
				
				$thumb_img = get_thumb('../Images/Products/',$row['image']);
?>					
                    <tr>
                    	<td class="first style1"><a href="<?php echo loadPage('editimg&id='.$row['id']); ?>"><?php echo $row['name']?></a></td>
                        <td><a href="<?php echo loadPage('editimg&id='.$row['id']); ?>"><img src="../<?php echo $thumb_img?>" height="50" /></a></td>
                        <td><a href="<?php echo loadPage('editimg&id='.$row['id']); ?>"><?php echo $row_pro['name']?></a></td>
					  <td align="center" class="last"><input type="checkbox" name="del[]" value="<?php echo $row['id']; ?>" id="del[]" /></td>
					</tr>
<?php
			}
		}
?>
					<tr class="bg">
					  <td colspan="9" class="first style2">
<?php
	// loadPageTable($pagename,& $start,$limit,$nume)
	loadPageTable($pagename,$start,$limit,$nume);
	
?>


		  </td>
				  </tr>
					<tr class="bg">
					  <td colspan="9" class="first style2"><label>
					    <input name="update" type="submit" id="update" value="Update"/>
                        <input type="hidden" name="start" value="<?php echo $start; ?>"  />
                        <input type="hidden" name="limit" value="<?php echo $limit; ?>"  />
                        
					  </label></td>
				  </tr>
				</table>
			  </form>
			</div>
		</div>
<?php }?>
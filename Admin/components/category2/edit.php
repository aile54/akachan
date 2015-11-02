<?php
	
	if(isset($_GET['id'])){
			$id = $_GET["id"];
		}
	$tbl = new table('category2');
	
	if(isset($_POST["done"])){
		/*if(test_isset2('category2','alias',$_POST["catid"],$_POST['name'])==0)
		{	*/
			// get field
			$field = array('catid','name','image','ordering','alias');
			
			$img = edit_img('../','Images/Category2/','category2','image',$_POST['tmpimage'],$id,22,22);
			
			$values = array(
						format($_POST["catid"],0),
						format($_POST["name"],0) ,
						format($img,0) ,
						format($_POST['ordering'],0),
						format(convert($_POST["name"]),0)
						);
						
			$res = $tbl->updateObject($field,$values,'id='.$id);
			if($res)
				header('location: '.loadPage('category2'));
		/*}
		else
			echo "Lỗi trùng tên. Vui lòng nhập tên khác.";*/
	}

$res = $tbl->loadOne('id='.$id);	
if($res){
		$row = mysql_fetch_array($res);
		$thumb_img = get_thumb('Images/Category2/',$row['image']);
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Danh mục 2</h1>
				<div class="breadcrumbs"><a href="<?php loadPage('category2')?>">Danh mục 2</a> / <a href="#">Sửa</a></div>
			</div><br />
 
			<div class="table">
				<img src="../c/img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="../c/img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post" enctype="multipart/form-data">
				<table class="listing form" cellpadding="0" cellspacing="0">
					<tr>
						<th class="full" colspan="2">NỘI DUNG</th>
					</tr>
					<tr>
						<td class="first"><strong>Danh mục 1</strong></td>
						<td class="last"><select name="catid">
                        <option value="">---[Chọn một]---</option>
                        <?php
						 	$tbl_cat = new table('category1');
							$res_cat = $tbl_cat ->loadAll('order by ordering');
							while($row_cat = mysql_fetch_array($res_cat)){
						?>
						  <option value="<?php echo $row_cat['id'] ?>" <?php if($row['catid']==$row_cat['id']) echo 'selected';?>><?php echo $row_cat['name'] ?></option>
						<?php }?>
					    </select></td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Name</strong></td>
						<td class="last"><input name="name" type="text" class="text" id="name" value="<?php echo $row['name']; ?>" /></td>
					</tr>
                    <tr>
						<td class="first" width="75"><strong>Image</strong></td>
						<td width="225" class="last"><input name="image" type="file"/>
                        <input type="hidden" name="tmpimage" value="<?php echo $row['image']; ?>"  />
						<img src="../<?php echo $thumb_img?>" height="22" align="absmiddle" />
                        </td>
					</tr>
					<tr>
						<td class="first" width="75"><strong>Ordering</strong></td>
						<td class="last"><input name="ordering" type="text" class="text" id="ordering" value="<?php echo $row['ordering']; ?>" /></td>
					</tr>
					<tr class="bg">
					  <td class="first">&nbsp;</td>
					  <td class="last"><label>
					    <input type="submit" name="done" value="Submit" id="done"/>
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
<?php
	if(isset($_GET["id"])){
			$id = $_GET["id"];
		}
	
	$tbl = new table('nsx');
	
	if(isset($_POST["done"])){
		if(test_isset1('nsx','alias',$_POST['name'],$id)==0){
			$field = array('name','image','ordering','alias');
			
			$img = edit_img('../','Images/Brand/','nsx','image',$_POST['tmpimage'],$id,180,84);
			
			$values = array(
						format($_POST["name"],0) ,
						format($img,0) ,
						format($_POST['ordering'],0),
						format(convert($_POST["name"]),0)
						);
			// updateObject($field=array(),$value=array(),$where)
			$res = $tbl->updateObject($field,$values,'id='.$id);
			if($res){
					header('location: '.loadPage('nsx'));
				}
		}
		else
			echo "Lỗi trùng tên. Vui lòng nhập tên khác.";
	}
	
	$res = $tbl->loadOne('id='.$id);
	if($res){
			$row=mysql_fetch_array($res);
			$thumb_img = get_thumb('../Images/Brand/',$row['image']);
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Thương hiệu nổi tiếng</h1>
				<div class="breadcrumbs"><a href="<?=loadPage('nsx')?>">Thương hiệu nổi tiếng</a> / <a href="#">Sửa</a></div>
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
						<td class="first" width="75"><strong>Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
						<td colspan="2" class="last">#<?php echo $id ?></td>
					</tr>
					<tr>
						<td class="first"><strong>Name</strong></td>
						<td colspan="2" class="last"><input name="name" type="text" class="text" id="name" value="<?php echo $row['name']; ?>" /></td>
					</tr>
                    <tr>
						<td class="first" width="75"><strong>Image</strong></td>
						<td width="225" class="last"><input name="image" type="file" id="image"  />
                        <input type="hidden" name="tmpimage" value="<?php echo $row['image']; ?>"  />
						<img src="../<?=$thumb_img?>" height="50" align="absmiddle" />                        
                         </td>
					</tr>
					<tr>
						<td class="first" width="75"><strong>Ordering</strong></td>
						<td class="last"><input name="ordering" type="text" class="text" id="ordering" value="<?php echo $row['ordering']; ?>" /></td>
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
<?php
	if(isset($_GET["id"])){
			$id = $_GET["id"];
		}
	
	$tbl = new table('baiviet');
	
	if(isset($_POST["done"])){
		if(test_isset1('baiviet','alias',$_POST['name'],$id)==0){
			$field = array('catid','name','image','details','ordering','alias');
			
			$img = edit_img('../','uploads/category/','baiviet','image',$_POST['tmpimage'],$id,52,42);
			
			$values = array(
						format($_POST["catid"],0) ,
						format($_POST["name"],0) ,
						format($img,0) ,
						format($_POST["details"],0) ,
						format($_POST['ordering'],0),
						format(convert($_POST["name"]),0)
						);
			// updateObject($field=array(),$value=array(),$where)
			$res = $tbl->updateObject($field,$values,'id='.$id);
			if($res){
					header('location: '.loadPage('baiviet'));
				}
		}
		else
			echo "Lỗi trùng tên. Vui lòng nhập tên khác.";
	}
	
	$res = $tbl->loadOne('id='.$id);
	if($res){
			$row=mysql_fetch_array($res);
			$thumb_img = get_thumb('uploads/category/',$row['image']);
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Bài viết</h1>
				<div class="breadcrumbs"><a href="<?=loadPage('baiviet')?>">Bài viết</a> / <a href="#">Sửa</a></div>
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
                    <tr class="bg">
						<td class="first"><strong>Details</strong></td>
						<td colspan="2" class="last editor"><textarea name="details" cols="80" rows="2" id="details" style="width: 100%"><?php echo $row['details']
						; ?></textarea>
                        <script> //STEP 2: Replace the textarea (txtContent)
						var oEdit2 = new InnovaEditor("oEdit2");
						oEdit2.arrStyle=[["BODY",false,"","font-family:Tahoma,Arial,Helvetica;font-size:10pt"]];
						oEdit2.width="100%";//You can also use %, for example: oEdit1.width="100%"
						oEdit2.height="100%";		
						oEdit2.cmdAssetManager = "modalDialogShow('/inv/assetmanager/assetmanager.php',640,400)"; //Command to open the Asset Manager add-on.
						oEdit2.REPLACE("details");//Specify the id of the textarea here
						</script></td>
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
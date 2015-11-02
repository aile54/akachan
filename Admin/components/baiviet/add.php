<?php
	
	$tbl = new table('baiviet');
	if(isset($_POST["done"])){
		if(test_isset1('baiviet','alias',$_POST['name'])==0){	
			
			$field = 'id,catid,name,image,details,ordering,alias';
			
			$str_img= upload_img('image','../uploads/category/',52,42);
						
			// values
			// format($str,$isComma=1)
			// isCheck($check)
			$values = format($tbl->getLastId()+1,1);
			$values.= format($_POST["catid"],1);
			$values.= format($_POST["name"],1);
			$values.= format(str_replace('../','',$str_img),1);
			$values.= format($_POST["details"],1);
			$values.= format($_POST['ordering'],1);
			$values.= format(convert($_POST["name"]),0);
			
			// insertObject($field,$value)
			$res = $tbl->insertObject($field,$values);
			if($res){
					echo "OK";
				}
		}
		else
			echo "Lỗi trùng tên. Vui lòng nhập tên khác.";
	}
	
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Bài viết</h1>
				<div class="breadcrumbs"><a href="<?=loadPage('baiviet')?>">Bài viết</a> / <a href="#">Thêm</a></div>
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
						<td class="first"><strong>Danh mục 1</strong></td>
						<td class="last"><select name="catid">
                        <option value="">---[Chọn một]---</option>
                        <?php
						 	$tbl_cat = new table('category_bv');
							$res_cat = $tbl_cat ->loadAll('order by ordering');
							while($row_cat = mysql_fetch_array($res_cat)){
						?>
						  <option value="<?php echo $row_cat['id'] ?>"><?php echo $row_cat['name'] ?></option>
						<?php }?>
					    </select></td>
					</tr>
					<tr>
						<td class="first"><strong>Name</strong></td>
						<td class="last"><input name="name" type="text" class="text" id="name" /></td>
					</tr>
                    <tr>
						<td class="first" width="75"><strong>Image</strong></td>
						<td class="last"><input name="image" type="file" id="image"  /> </td>
					</tr>
                    <tr class="bg">
						<td class="first"><strong>Nội dung</strong></td>
						<td colspan="2" class="last editor"><textarea name="details" cols="80" rows="2" id="details" style="width: 100%"></textarea>
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
						<td class="last"><input name="ordering" type="text" class="text" id="ordering" value="<?php echo $tbl->getLastOrdering()+1; ?>" /></td>
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
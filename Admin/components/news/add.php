<?php 
	$tbl = new table('news');
	
	if(isset($_POST["done"])){
			
			// get field
			$field = 'id,name,details,image,hot,date_add,alias,url,lang';
			
			$str_img= upload_img('image','../Images/News/',250,163);
			
			$id = $tbl->getLastId()+1;
			$values = format($id,1);
			//$values.= format($_POST["catid"],1);
			$values.= format($_POST["name"],1);
			$values.= format($_POST["details"],1);
			$values.= format(str_replace('../','',$str_img),1);
			$values.= format(isCheck(isset($_POST["hot"])),1);
			$values.= format(time(),1);
			$values.= format(rand_name($_POST["name"],$id),1);
			$values.= format($_POST["url"],1);
			$values.= format('0',0);
			
			// insertObject($field,$value)
			$res = $tbl->insertObject($field,$values);
			if($res){
				//var_dump($res);
					echo "OK";
				}
			
		}
	
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Tin tức</h1>
			  <div class="breadcrumbs"><a href="<?php echo loadPage('news')?>">Tin tức</a> / <a href="#">Thêm</a></div>
			</div><br />
 
		  
		  
			<div class="table">
				<img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post" enctype="multipart/form-data">
				<table class="listing form" cellpadding="0" cellspacing="0">
					<tr>
						<th class="full" colspan="4">NỘI DUNG</th>
					</tr>
                    <tr class="bg" style="display:none">
						<td class="first"><strong>Danh mục</strong></td>
						<td colspan="3" class="last">
							<select name="catid" id="catid">
                            	<option value="">---Chọn một---</option>
								<?php
                                    $tbl_cat = new table('category_news');
                                    $res_cat = $tbl_cat->loadAll();
                                    if($res_cat){
                                            while($row_cat=mysql_fetch_array($res_cat)){
                                ?>
                               <option value="<?php echo $row_cat['id']; ?>"><?php echo $row_cat['name']; ?></option>
                                <?php
                                                }
                                            }
                                ?>
						  </select>						</td>
					</tr>
                    <tr>
						<td class="first" width="135"><strong>Tiêu đề</strong></td>
						<td colspan="3" class="last"><input name="name" type="text" id="name" style="width:300px"/> </td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Nội dung</strong></td>
						<td colspan="3" class="last editor"><textarea name="details" cols="80" rows="2" id="details"></textarea>
                        <script> //STEP 2: Replace the textarea (txtContent)
						var oEdit2 = new InnovaEditor("oEdit2");
						oEdit2.arrStyle=[["BODY",false,"","font-family:Tahoma,Arial,Helvetica;font-size:10pt"]];
						oEdit2.width="100%";//You can also use %, for example: oEdit1.width="100%"
						oEdit2.height=200;		
						oEdit2.width=590;
						oEdit2.cmdAssetManager = "modalDialogShow('/inv/assetmanager/assetmanager.php',640,400)"; //Command to open the Asset Manager add-on.
						oEdit2.REPLACE("details");//Specify the id of the textarea here
						</script></td>
					</tr>
					<tr>
						<td width="135" class="first"><strong>Hình ảnh</strong></td>
						<td colspan="3" class="last"><input name="image" type="file" id="image"  /> </td>
					</tr>
                    <tr>
                        <td class="first"><strong>URL</strong></td>
                        <td colspan="3" class="last"><input name="url" type="text" class="text" id="url" /></td>
                    </tr>
                    <tr>
						<td class="first"><strong>Hot</strong></td>
						<td class="last"><input name="hot" type="checkbox"/></td>
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
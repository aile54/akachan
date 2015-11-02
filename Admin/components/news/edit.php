<?php 
	if(isset($_GET['id'])){
			$id = $_GET["id"];
		}
	$tbl = new table('news');
	
	if(isset($_POST["done"])){
						
			$field = array('catid','name','details','image','hot','date_add','alias');
			
			$img = edit_img('../','Images/News/','news','image',$_POST['tmpimage'],$id,250,163);		

			$values = array(
						format($_POST["catid"],0) ,
						format($_POST["name"],0) ,
						format($_POST["details"],0),
						format($img,0) ,
						format(isCheck(isset($_POST["hot"])),0),
						format(strtotime(date('H:i:s ').$_POST["date_add"]),0),
						format(rand_name($_POST["name"],$id),0)
						);
			// insertObject($field,$value)
			$res = $tbl->updateObject($field,$values,'id='.$id);
			if($res){
					header('location: '.loadPage('news'));
				}
			
		}
$res = $tbl->loadOne('id='.$id);	
if($res){
		$row = mysql_fetch_array($res);	
		$thumb_img = get_thumb('Images/News/',$row['image']);
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Tin tức</h1>
			  <div class="breadcrumbs"><a href="<?php echo loadPage('news')?>">Tin tức</a> / <a href="#">Sửa</a></div>
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
                               <option value="<?php echo $row_cat['id']; ?>" <? if($row['catid']==$row_cat['id']) echo 'selected' ?>><?php echo $row_cat['name']; ?></option>
                                <?php
                                                }
                                            }
                                ?>
						  </select>						</td>
					</tr>
                    <tr>
						<td class="first" width="135"><strong>Tiêu đề</strong></td>
						<td colspan="3" class="last"><input name="name" type="text" id="name" style="width:300px" value="<?php echo $row['name'];?>"/> </td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Nội dung</strong></td>
						<td colspan="3" class="last editor"><textarea name="details" cols="80" rows="2" id="details"><?php echo $row['details'];?></textarea>
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
						<td class="first" width="75"><strong>Image</strong></td>
						<td width="225" class="last"><input name="image" type="file" id="image"  />
                        <input type="hidden" name="tmpimage" value="<?php echo $row['image']; ?>"  />
						<img src="../<?php echo $thumb_img?>" height="50" align="absmiddle" />                        
                         </td>
					</tr>
                    <tr class="bg">
						<td class="first"><strong>Date</strong></td>
						<td colspan="2" class="last">
                        	<input type="text" class="text" value="
								<?php echo date('d-m-Y',$row['date_add']); ?>" name="date_add" />
                                <img style="cursor:pointer;" src="js/calendar/images/calendar.gif" onClick="displayCalendar(document.forms[0].date_add,'dd-mm-yyyy',this)" >
                    	</td>
					</tr>
                    <tr>
						<td class="first"><strong>Hot</strong></td>
						<td class="last"><input name="hot" type="checkbox" id="hot" <?php loadChecked($row['hot']) ?> /></td>
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
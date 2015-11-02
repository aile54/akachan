<?php
	if(isset($_GET["id"])){
			$id = $_GET["id"];
		}
	
	$tbl = new table('advertise');
	
	if(isset($_POST["done"])){
		
			
			$field = array('catid','name','url','image','published','ordering','view','date','lang');
			
			// upload file
			// uploadFile($file,$auto=1,$dir='uploads/images/')
			$filename=$_FILES['image']['name'];
			if($filename=='')
				$image = $_POST["tmpImage"];
			else{
				del_file('advertise','image',$id);
				$image = uploadFile('image',0,'../Images/Advertisement/');
			}
			
			// format($str,$isComma=1)
			$values = array(
							format($_POST["catid"],0) ,
							format($_POST["name"],0) ,
							format($_POST["url"],0) ,
							format(str_replace('../','',$image),0) ,
							format(isCheck(isset($_POST["published"])),0) ,
							format($_POST["ordering"],0) ,
							format($_POST["view"],0) ,
							format($_POST["date"],0),
							format($lang,0)
							);
			// updateObject($field=array(),$value=array(),$where)
			$res = $tbl->updateObject($field,$values,'id='.$id);
			if($res){
					header('location: '.loadPage('advertise'));
				}
			
			
		}
	
	$res = $tbl->loadOne('id='.$id);
	if($res){
			$row=mysql_fetch_array($res);
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Advertise</h1>
				<div class="breadcrumbs"><a href="index.php?choose=advertise">Advertise</a> / <a href="#">Sửa</a></div>
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
						<td class="first" width="75"><strong>Danh mục</strong></td>
						<td colspan="2" class="last">
                        	<select name="catid">
                            	<option value="">---[Chọn một]---</option>
                                <?php
									$tbl_cat = new table('category_adv');
									$res_cat = $tbl_cat ->loadAll();
									while($row_cat = mysql_fetch_array($res_cat)){
								?>
                                <option value="<?php echo $row_cat['id']?>" <? if($row_cat['id']==$row['catid']) echo 'selected';?>><?php echo $row_cat['name']?></option>
                                <?php }?>
                            </select>
                        </td>
					</tr>
					<tr>
						<td class="first"><strong>Name</strong></td>
						<td colspan="2" class="last"><input name="name" type="text" class="text" id="name" value="<?php echo $row['name']; ?>" /></td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>URL</strong></td>
						<td colspan="2" class="last"><input name="url" type="text" class="text" id="url" value="<?php echo $row['url']; ?>" /></td>
					</tr>
					<tr>
						<td class="first" width="75"><strong>Image</strong></td>
						<td width="225" class="last"><input name="image" type="file" id="image"  />
                        <input type="hidden" name="tmpImage" value="<?php echo $row['image']; ?>"  /><img src="../<?php echo $row['image']; ?>" height="50" align="absmiddle" />                         </td>
						
					</tr>
					<tr style="display:none">
						<td class="first" width="75"><strong>Published</strong></td>
						<td colspan="2" class="last"><label>
						  <input name="published" type="checkbox" id="published" <?php loadChecked($row['published']) ?> />
					  </label></td>
					</tr>
					<tr>
					  <td class="first"><strong>Ordering</strong></td>
					  <td colspan="2" class="last"><input name="ordering" type="text" class="text" id="ordering" value="<?php echo $row['ordering']; ?>" /></td>
				  </tr>
					<tr style="display:none">
						<td class="first" width="75"><strong>View</strong></td>
						<td colspan="2" class="last"><input name="view" type="text" class="text" id="view" value="<?php echo $row['view']; ?>" /></td>
					</tr>
					<tr class="bg" style="display:none">
						<td class="first"><strong>Date</strong></td>
						<td colspan="2" class="last"><input type="text" class="text" value="<?php echo $row['date']; ?>" name="date" /><img style="cursor:pointer;" src="js/calendar/images/calendar.gif" onClick="displayCalendar(document.forms[0].date,'yyyy-mm-dd',this)" ></td>
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
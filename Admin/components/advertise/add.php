<script language="javascript" type="text/javascript">
	function kiem_tra_gui()
	{
		ten = document.getElementById('name');
		danhmuc = document.getElementById('danhmuc');
		if(danhmuc.value=='')
		{
			document.getElementById('thong_bao').innerHTML='Vui lòng chọn danh mục!';
			return false;
		}
		if(ten.value=='')
		{
			document.getElementById('thong_bao').innerHTML='Vui lòng nhập tên hình!';
			ten.focus();
			return false;
		}
	}
</script>
<?php
	$tbl = new table('advertise');
	if(isset($_POST["done"])){
			
			$field = 'id,catid,name,url,image,published,ordering,view,date,lang';
			
			// upload file
			// uploadFile($file,$auto=1,$dir='uploads/images/')
			$path =	'../Images/Advertisement/';
			$image = uploadFile('image',0,$path);
						
			// values
			// format($str,$isComma=1)
			// isCheck($check)
			$values = format($tbl->getLastId()+1,1);
			$values.= format($_POST["catid"],1);
			$values.= format($_POST["name"],1);
			$values.= format($_POST["url"],1);
			$values.= format(str_replace('../','',$image),1);
			$values.= format(isCheck(isset($_POST["published"])),1);
			$values.= format($_POST["ordering"],1);
			$values.= format($_POST["view"],1);
			$values.= format($_POST["date"],1);
			@$values.= format($lang,0);
			
			// insertObject($field,$value)
			$res = $tbl->insertObject($field,$values);
			if($res){
					$thongbao = "OK";
				}
		}
	
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Advertise</h1>
				<div class="breadcrumbs"><a href="index.php?choose=advertise">Advertise</a> / <a href="#">Thêm</a></div>
			</div><br />
 
		  
		  	<p>
            	<b style="color:#F00" id="thong_bao"><?php echo @$thongbao;?></b>
        	</p>
			<div class="table">
				<img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post" enctype="multipart/form-data">
				<table class="listing form" cellpadding="0" cellspacing="0">
					<tr>
						<th class="full" colspan="2">NỘI DUNG</th>
					</tr>
					<tr>
						<td class="first" width="75"><strong>Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
						<td width="536" class="last">#<?php echo $tbl->getLastId()+1 ?></td>
					</tr>
                    <tr>
						<td class="first" width="75"><strong>Danh mục (*)</strong></td>
						<td colspan="2" class="last">
                        	<select name="catid" id="danhmuc">
                            	<option value="">---[Chọn một]---</option>
                                <?php
									$tbl_cat = new table('category_adv');
									$res_cat = $tbl_cat ->loadAll();
									
									while($row_cat = mysql_fetch_array($res_cat)){
								?>
                                <option value="<?php echo $row_cat['id']?>"><?php echo $row_cat['name']?></option>
                                <?php }?>
                            </select>
                        </td>
					</tr>
					<tr>
						<td class="first"><strong>Name (*)</strong></td>
						<td class="last"><input name="name" type="text" class="text" id="name" value=""/></td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>URL</strong></td>
						<td class="last"><input name="url" type="text" class="text" id="url" value="http://" /></td>
					</tr>
					<tr>
						<td class="first" width="75"><strong>Image</strong></td>
						<td class="last"><input name="image" type="file" id="image"  /> </td>
					</tr>
					<tr style="display:none">
						<td class="first" width="75"><strong>Published</strong></td>
						<td class="last"><label>
						  <input name="published" type="checkbox" id="published" value="1" checked="checked" />
					  </label></td>
					</tr>
					<tr>
					  <td class="first"><strong>Ordering</strong></td>
					  <td class="last"><input name="ordering" type="text" class="text" id="ordering" value="<?php echo $tbl->getLastOrdering()+1; ?>" /></td>
				  </tr>
					<tr style="display:none">
						<td class="first" width="75"><strong>View</strong></td>
						<td class="last"><input name="view" type="text" class="text" id="view" value="0" /></td>
					</tr>
					<tr class="bg" style="display:none">
						<td class="first"><strong>Date</strong></td>
						<td class="last"><input type="text" class="text" value="<?php echo getToday(); ?>" name="date" /><img style="cursor:pointer;" src="js/calendar/images/calendar.gif" onClick="displayCalendar(document.forms[0].date,'yyyy-mm-dd',this)" ></td>
					</tr>
					<tr class="bg">
					  <td class="first">&nbsp;</td>
					  <td class="last"><label>
					    <input type="submit" name="done" value="Submit" onclick="return kiem_tra_gui();" id="done"/>
					  </label></td>
				  	</tr>
				</table>
			  </form>
	        <p>&nbsp;</p>
		  </div>
		</div>
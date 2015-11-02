<?php
	
	$tbl = new table('promotion');
	if(isset($_POST["done"])){
		if(test_isset1('promotion','name',$_POST['name'])==0){		
			
			$field = 'id,name,url,image';
			
			$str_img= upload_img('image','../Images/Promotion/',22,22);
			
			// values
			$values = format($tbl->getLastId()+1,1);
			$values.= format($_POST["name"],1);
			$values.= format($_POST['url'],1);
			$values.= format(str_replace('../','',$str_img),0);
			
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
			  <h1>Thông tin khuyến mãi</h1>
				<div class="breadcrumbs"><a href="<?php loadPage('promotion')?>">Thông tin khuyến mãi</a> / <a href="#">Thêm</a></div>
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
						<td class="first" width="75"><strong>Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
						<td width="536" class="last">#<?php echo $tbl->getLastId()+1 ?></td>
					</tr>
					<tr>
						<td class="first"><strong>Name</strong></td>
						<td class="last"><input name="name" type="text" class="text" id="name" /></td>
					</tr>
                    <tr>
						<td class="first"><strong>URL</strong></td>
                		<td colspan="3" class="last"><input name="url" type="text" class="text" /></td>
                	</tr>
                    <tr>
						<td class="first" width="75"><strong>Image</strong></td>
						<td class="last"><input name="image" type="file" id="image"  /> </td>
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
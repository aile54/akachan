<?php
	if(isset($_GET["id"])){
			$id = $_GET["id"];
		}
	
	$tbl = new table('promotion');
	
	if(isset($_POST["done"])){
		/*if(test_isset1('category1','alias',$_POST['name'],$id)==0){*/
			$field = array('name','url','image');
			
			// upload file
			// uploadFile($file,$auto=1,$dir='uploads/images/')
			$filename=$_FILES['image']['name'];
			if($filename=='')
				$image = $_POST["tmpImage"];
			else{
				del_file('promotion','image',$id);
				$image = uploadFile('image',0,'../Images/Promotion/');
			}
			
			$values = array(
						format($_POST['name'],0) ,
						format($_POST['url'],0),
						format(str_replace('../','',$image),0)
						);
			// updateObject($field=array(),$value=array(),$where)
			$res = $tbl->updateObject($field,$values,'id='.$id);
			if($res){
					header('location: '.loadPage('promotion'));
				}
		/*}
		else
			echo "Lỗi trùng tên. Vui lòng nhập tên khác.";*/
	}
	
	$res = $tbl->loadOne('id='.$id);
	if($res){
			$row=mysql_fetch_array($res);
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Thông tin khuyến mãi</h1>
				<div class="breadcrumbs"><a href="<?php loadPage('promotion')?>">Thông tin khuyến mãi</a> / <a href="#">Sửa</a></div>
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
						<td colspan="2" class="last">
                        	<input name="name" type="text" class="text" id="name" 
                            		value="<?php echo $row['name']; ?>" />
                        </td>
					</tr>
                    <tr>
						<td class="first"><strong>URL</strong></td>
                		<td colspan="3" class="last">
                        	<input name="url" type="text" class="text" id="url" value="<?php echo $row['url']; ?>" />
                        </td>
                	</tr>
                    <tr>
						<td class="first" width="75"><strong>Image</strong></td>
						<td width="225" class="last">
                            <input name="image" type="file" id="image"  />
                            <input type="hidden" name="tmpImage" value="<?php echo $row['image']; ?>"  />
                           	<img src="../<?php echo $row['image']; ?>" height="50" align="absmiddle" />                         
                       	</td>
					</tr>                  
					
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
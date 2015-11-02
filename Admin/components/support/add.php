<?php
	@$a=$_SESSION['language'];
	$tbl = new table('support');
	
	if(isset($_POST["done"])){
			$field = 'id,loai,name,nickname,details,image,ordering,phone';
			
			$image = uploadFile('image',0,'../Images/Support/');
			// values
			// format($str,$isComma=1)
			$values = format($tbl->getLastId()+1,1);
			$values.= format($_POST["loai"],1);
			$values.= format($_POST["name"],1);
			$values.= format($_POST["nickname"],1);
			$values.= format($_POST["details"],1);
			$values.= format(str_replace('../','',$image),1);
			$values.= format($_POST["ordering"],0);
			$values.= format($_POST["phone"],0);
			
			// insertObject($field,$value)
			$res = $tbl->insertObject($field,$values);
			if($res){
					echo "OK!";
				}
		}
	
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Support</h1>
				<div class="breadcrumbs"><a href="#">Content</a> / <a href="#">Thêm</a></div>
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
						<td class="first" width="96"><strong>Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
						<td width="536" colspan="2" class="last">#<?php echo $tbl->getLastId()+1 ?></td>
					</tr>
					<tr>
						<td class="first"><strong>Name</strong></td>
						<td colspan="2" class="last"><input name="name" type="text" class="text" id="name" /></td>
					</tr>
                    <tr>
						<td class="first"><strong>Loại</strong></td>
						<td colspan="2" class="last">
                        	<input type="radio" name="loai" value="0" checked="checked"/> Yahoo
                            <input type="radio" name="loai" value="1" /> Skyper
                        </td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Nickname</strong></td>
						<td colspan="2" class="last">
                        	<input type="text" class="text" name="nickname" />
                        </td>
					</tr>
                    <tr class="bg">
						<td class="first"><strong>Số điện thoại</strong></td>
						<td colspan="2" class="last">
                        	<input type="text" class="text" name="phone" />
                        </td>
					</tr>
                    <tr class="bg">
						<td class="first"><strong>Mô tả</strong></td>
						<td colspan="3" class="last editor"><textarea name="details" cols="80" rows="2" id="details"></textarea>
                        <script> //STEP 2: Replace the textarea (txtContent)
						var oEdit2 = new InnovaEditor("oEdit2");
						oEdit2.arrStyle=[["BODY",false,"","font-family:Tahoma,Arial,Helvetica;font-size:10pt"]];
						oEdit2.width="100%";//You can also use %, for example: oEdit1.width="100%"
						oEdit2.height=200;		
						oEdit2.cmdAssetManager = "modalDialogShow('/inv/assetmanager/assetmanager.php',640,400)"; //Command to open the Asset Manager add-on.
						oEdit2.REPLACE("details");//Specify the id of the textarea here
						</script></td>
					</tr>
                    <tr class="bg">
						<td class="first"><strong>Image</strong></td>
						<td colspan="2" class="last">
                        	<input type="file" name="image" />
                        </td>
					</tr>
					<tr>
						<td class="first" width="96"><strong>Ordering</strong></td>
						<td colspan="2" class="last"><input name="ordering" type="text" class="text" id="ordering" value="<?php echo $tbl->getLastOrdering()+1; ?>" /></td>
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
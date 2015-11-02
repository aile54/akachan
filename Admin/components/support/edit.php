<?php
	//$a=$_SESSION['language'];
	if(isset($_GET["id"])){
			$id = $_GET["id"];
		}
	$tbl = new table('support');
	
	
	if(isset($_POST["done"])){
		
		// updateObject($field=array(),$value=array(),$where)
			$field = array('loai','name','nickname','details','image','ordering','phone');
			
			$filename = $_FILES['image']['name'];
			if($filename=='')
				$image = '../'.$_POST["tmpImage"];
			else
				$image = uploadFile('image',0,'../Images/Support/');
				
			$values = array(
							format($_POST["loai"],0),
							format($_POST["name"],0),
							format($_POST["nickname"],0),
							format($_POST["details"],0),
							format(str_replace('../','',$image),0),
							format($_POST["ordering"],0),
							format($_POST["phone"],0)
							);
			$res = $tbl->updateObject($field,$values,'id='.$id);
			if($res){
					header('location: '.loadPage('support'));
				}
		}
	
	$res = $tbl->loadOne('id='.$id);
	if($res){
			$row=mysql_fetch_array($res);

?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Support</h1>
				<div class="breadcrumbs"><a href="#">Content</a> / <a href="#">Edit</a></div>
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
						<td width="536" colspan="2" class="last">#<?php echo $id; ?></td>
					</tr>
					<tr>
						<td class="first"><strong>Name</strong></td>
						<td colspan="2" class="last"><input name="name" type="text" class="text" id="name" value="<?php echo $row['name']; ?>" /></td>
					</tr>
                    <tr>
						<td class="first"><strong>Loại</strong></td>
						<td colspan="2" class="last">
                        	<input type="radio" name="loai" value="0" <?php if($row['loai']== 0) echo 'checked="checked"';?> /> Yahoo
                            <input type="radio" name="loai" value="1" <?php if($row['loai']== 1) echo 'checked="checked"';?> /> Skyper
                        </td>
					</tr>
                    <tr class="bg">
						<td class="first"><strong>Nickname</strong></td>
						<td colspan="2" class="last">
                        	<input type="text" name="nickname" class="text" value="<?php echo $row['nickname']; ?>" />
                        </td>
					</tr>
                    <tr class="bg">
						<td class="first"><strong>Số điện thoại</strong></td>
						<td colspan="2" class="last">
							<input type="text" name="phone" class="text" value="<?php echo $row['phone']; ?>" />
                        </td>
					</tr>
                    <tr class="bg">
						<td class="first"><strong>Mô tả</strong></td>
						<td colspan="3" class="last editor"><textarea name="details" cols="80" rows="2" id="details"><?php echo $row['details']; ?></textarea>
                        <script> //STEP 2: Replace the textarea (txtContent)
						var oEdit2 = new InnovaEditor("oEdit2");
						oEdit2.arrStyle=[["BODY",false,"","font-family:Tahoma,Arial,Helvetica;font-size:10pt"]];
						oEdit2.width="100%";//You can also use %, for example: oEdit1.width="100%"
						oEdit2.height=200;		
						oEdit2.cmdAssetManager = "modalDialogShow('/inv/assetmanager/assetmanager.php',640,400)"; //Command to open the Asset Manager add-on.
						oEdit2.REPLACE("details");//Specify the id of the textarea here
						</script></td>
					</tr>
                    <tr>
						<td class="first" width="75"><strong>Image</strong></td>
						<td width="225" class="last"><input name="image" type="file" id="image"  /><?php echo $row['image']; ?>
                        <input type="hidden" name="tmpImage" value="<?php echo $row['image']; ?>"  /></td>
					</tr>
					<tr>
						<td class="first" width="96"><strong>Ordering</strong></td>
						<td colspan="2" class="last"><input name="ordering" type="text" class="text" id="ordering" value="<?php echo $row['ordering']; ?>" /></td>
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
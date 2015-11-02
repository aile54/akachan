<?php 
	if(isset($_GET['id'])){
			$id = $_GET["id"];
		}
	$tbl = new table('combi');
	
	if(isset($_POST["done"])){
			
			// get field
			/*$filea = $_FILES["image"]["name"];
			if($filea=='')
				$image = '../'.$_POST['tmpimage'];
			else
				$image = uploadFile('image',0,'../uploads/');*/
			
			$field = array('name','details','ordering','alias');
			
			$values = array(
						format($_POST["name"],0) ,
						format($_POST["details"],0),
						format($_POST["ordering"],0), 
						format(rand_name($_POST["name"],$id),0)
						);
			// insertObject($field,$value)
			$res = $tbl->updateObject($field,$values,'id='.$id);
			
			if($res){
					header('location: '.loadPage('combi'));
				}
			
		}
$res = $tbl->loadOne('id='.$id);	
if($res){
		$row = mysql_fetch_array($res);	
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Mua hàng trên web Nhật</h1>
			  <div class="breadcrumbs"><a href="#">Sửa</a></div>
  </div><br />
 
		  
		  
			<div class="table">
				<img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post" enctype="multipart/form-data">
				<table class="listing form" cellpadding="0" cellspacing="0">
					<tr>
						<th class="full" colspan="4">NỘI DUNG</th>
					</tr>
					<tr>
						<td class="first" width="135"><strong>Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
						<td width="521" colspan="3" class="last">#<?php echo $id; ?></td>
					</tr>
                    <tr>
						<td class="first" width="135"><strong>Name</strong></td>
						<td colspan="3" class="last"><input name="name" type="text" id="name" style="width:300px" value="<?php echo $row['name'];?>"/> </td>
					</tr>
                    <!--<tr>
						<td width="135" class="first"><strong>Hình ảnh</strong></td>
						<td colspan="3" class="last"><input name="image" type="file" id="image"  /> 
                         <input type="hidden" name="tmpimage" value="<?php echo $row['image']; ?>"  /><?php echo $row['image'] ?>              </td>
                    </tr>-->
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
						<td class="first" width="75"><strong>Ordering</strong></td>
						<td class="last"><input name="ordering" type="text" class="text" id="ordering" value="<?php echo $row['ordering']; ?>" /></td>
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
<?php
	if(isset($_GET["id"])){
			$id = $_GET["id"];
		}
	$tbl = new table('pages');
	
	
	if(isset($_POST["done"])){
		if(test_isset1('pages','alias',$_POST['name'],$id)==0){
			$field = array('name','details','alias');
			// vn
			$values = array(
							format($_POST["name"],0),
							format($_POST["details"],0),
							format(convert($_POST["name"]),0)
							);
			$res = $tbl->updateObject($field,$values,'id='.$id);
			
			if($res)
				header('location: '.loadPage('pages'));
		}
		else
			echo "Lỗi trùng tên. Vui lòng nhập tên khác.";
	}
	
	$res = $tbl->loadOne('id='.$id);
	$row=mysql_fetch_object($res);
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Pages</h1>
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
						<td width="536" colspan="2" class="last">#<?php echo $row->id; ?></td>
					</tr>
					<tr>
						<td class="first"><strong>Name</strong></td>
						<td colspan="2" class="last"><input name="name" type="text" class="text" id="name" value="<?php echo $row->name; ?>" /></td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Details</strong></td>
						<td colspan="2" class="last editor"><textarea name="details" cols="80" rows="2" id="details" style="width: 100%"><?php echo $row->details; ?></textarea>
                        <script> //STEP 2: Replace the textarea (txtContent)
						var oEdit2 = new InnovaEditor("oEdit2");
						oEdit2.arrStyle=[["BODY",false,"","font-family:Tahoma,Arial,Helvetica;font-size:10pt"]];
						oEdit2.width="100%";//You can also use %, for example: oEdit1.width="100%"
						oEdit2.height="100%";		
						oEdit2.cmdAssetManager = "modalDialogShow('/inv/assetmanager/assetmanager.php',640,400)"; //Command to open the Asset Manager add-on.
						oEdit2.REPLACE("details");//Specify the id of the textarea here
						</script></td>
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
<?php
	// get id

	if(isset($_GET['id'])){
			$id = $_GET["id"];
		}
	$tbl = new table('linkweb');
	
	/*
		*
		* update edit
		*
	*/
	if(isset($_POST["done"])){
		
			// get field
				
			$field = array('name','address','image','ordering');

			$filename=$_FILES['logo']['name'];
			if($filename=='')
				$image = $_POST["tmplogo"];
			else
				$image = uploadFile('logo',0,'../uploads/');
				
			// get values
			$name = format($_POST["name"],0);
			$url = format($_POST["url"],0);
			$logo = format(str_replace('../','',$image),0);
			$vitri = format($_POST["vitri"],0);
			
			$value = array($name,$url,$logo,$vitri);
			// updateObject($field=array(),$value=array(),$where);
			$res=$tbl->updateObject($field,$value,'id='.$id);
			if($res){
					header('location: '.loadPage('linkweb'));
				}
			
		}
	
	
	
	
	$res = $tbl->loadOne('id='.$id);
	if($res){
		$row=mysql_fetch_array($res);
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Liên kết website</h1>
				<div class="breadcrumbs"><a href="#">Content</a> / <a href="#">Sửa</a></div>
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
						<td colspan="2" class="last">#
						<?php 
							echo $row['id'];
						?>						</td>
					</tr>
					<tr>
						<td class="first"><strong>Name</strong></td>
						<td colspan="2" class="last"><input name="name" type="text" class="text" id="name" value="<?php echo $row['name']; ?>" /></td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Url</strong></td>
						<td colspan="2" class="last"><input name="url" type="text" class="text" id="url" value="<?php echo $row['address']; ?>" /></td>
					</tr>
					<tr class="bg">
					  <td class="first"><strong>Logo</strong></td>
					  <td width="225" valign="middle" class="last"><input type="file" name="logo" /></td>
					  <td width="311" valign="middle" class="last">
                      <input type="hidden" name="tmplogo" value="<?php echo $row['image']; ?>"  />
					  <?php echo $row['image'] ?></td>
				  </tr>
					<tr>
					  <td class="first"><strong>Vị trí</strong></td>
					  <td colspan="2" class="last"><input name="vitri" type="text" class="text" id="vitri" value="<?php echo $row['ordering']; ?>" /></td>
				  </tr>
					<tr class="bg">
					  <td class="first">&nbsp;</td>
					  <td colspan="2" class="last"><label>
					    <input name="done" type="submit" id="done" value="Submit" />
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
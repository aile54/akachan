<?php
	$tbl = new table('linkweb');
	
	if(isset($_POST["done"])){
		// get fields
		$field = 'id,name,address,image,ordering';
		
		// upload file
		$file = "logo";
		
		// uploadFile($file,$auto=1,$dir='uploads/images/');
		$logo=uploadFile($file,0,'../uploads/');
		
		// format($str,$isComma=1)
		$values = $tbl->getLastId()+1 . ",";
		$values.= format($_POST["name"]);
		$values.= format($_POST["url"]);
		$values.= format(str_replace('../','',$logo));
		$values.= format($_POST["vitri"],0);
		
		// insert
		$res = $tbl->insertObject($field,$values);
		if($res){

			header('location: '. loadPage('addlinkweb'));
		}	
	
	}

?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Liên kết website</h1>
				<div class="breadcrumbs"><a href="#">Content</a> / <a href="#">Thêm</a></div>
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
						<td width="536" class="last">#
						<?php 
							echo $tbl->getLastId()+1;
						?>						</td>
					</tr>
					<tr>
						<td class="first"><strong>Name</strong></td>
						<td class="last"><input name="name" type="text" class="text" id="name" /></td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Url</strong></td>
						<td class="last"><input name="url" type="text" class="text" id="url" /></td>
					</tr>
					<tr class="bg">
					  <td class="first"><strong>Logo</strong></td>
					  <td class="last"><input type="file" name="logo" /></td>
				  </tr>
					<tr>
					  <td class="first"><strong>Vị trí</strong></td>
					  <td class="last"><input name="vitri" type="text" class="text" id="vitri" value="<?php echo $tbl->getLastOrdering()+1; ?>"/></td>
				  </tr>
					<tr class="bg">
					  <td class="first">&nbsp;</td>
					  <td class="last"><label>
					    <input name="done" type="submit" id="done" value="Submit" />
					  </label></td>
				  </tr>
				</table>
			  </form>
	        <p>&nbsp;</p>
		  </div>
		</div>
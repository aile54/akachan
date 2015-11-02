<?php
	$tbl = new table('seo');
	
	if(isset($_POST["done"])){
			$field = 'id,name,title,keywords,description';
			
			// vn
			$values = format($tbl->getLastId()+1,1);
			$values.= format($_POST["name"],1);
			$values.= format($_POST["title"],1);
			$values.= format($_POST["keywords"],1);
			$values.= format($_POST["description"],0);
			
			$res = $tbl->insertObject($field,$values);
			
			if($res)
				echo "OK!";
		}
	
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>SEO</h1>
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
					<tr class="bg">
						<td class="first"><strong>Title</strong></td>
						<td colspan="2" class="last"><textarea name="title" style="width: 98%"></textarea></td>
					</tr>
                    <tr class="bg">
						<td class="first"><strong>Keywords</strong></td>
						<td colspan="2" class="last"><textarea name="keywords" style="width: 98%"></textarea></td>
					</tr>
                    <tr class="bg">
						<td class="first"><strong>Description</strong></td>
						<td colspan="2" class="last"><textarea name="description" style="width: 98%"></textarea></td>
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
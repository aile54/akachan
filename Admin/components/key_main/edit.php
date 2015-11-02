<?php
	if(isset($_GET["id"])){
			$id = $_GET["id"];
		}
	$tbl = new table('key_main');
	
	
	if(isset($_POST["done"])){
		
			$field = array('name','key_');
			
			// vn
			$values = array(
							format($_POST["name"],0),
							format(convert($_POST["key"]),0)
							);
			$res = $tbl->updateObject($field,$values,'id='.$id);
			
			if($res)
				header('location: '.loadPage('key_main'));
		}
	
	$res = $tbl->loadOne('id='.$id);
	$row=mysql_fetch_object($res);
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Key main</h1>
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
						<td colspan="2" class="last"><input name="name" type="text" class="text" id="name" value="<?php echo $row->name; ?>" <? if($perid!=0) echo 'readonly="readonly"'?> /></td>
					</tr>
                    <tr class="bg">
						<td class="first"><strong>Key</strong></td>
						<td colspan="2" class="last"><input name="key" type="text" class="text" id="key" value="<?php echo $row->key_; ?>" /></td>
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
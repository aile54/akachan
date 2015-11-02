<?php
	$a=$_SESSION['language'];
	$a=0;
	if(isset($_GET['id'])){
			$id = $_GET["id"];
		}
	$tbl = new table('category');
	
	/*
		*
		* edit to category
		*
	*/
	
	if(isset($_POST["done"])){
			
			// get field
			$field = array('sections','name','hit','published','loai','lang','ordering');
			
			// get values
			// format
			// format($str,$isComma=1)
			$sections = format($_POST["sections"],0);
			$name = format($_POST["name"],0);
			$hit = format($_POST["hit"],0);
			
			// isCheck($check)
			$published = isCheck(isset($_POST["published"]));
			$loai = format($b,1);
			$lang = format($a,1);
			$ordering = format($_POST["ordering"],0);
			
			// values
			$values = array($sections,$name,$hit,$published,$loai,$lang,$ordering);
			
			// updateObject($field=array(),$value=array(),$where)
			$res = $tbl->updateObject($field,$values,'id='.$id);
			if($res){
					echo "OK!";
				}
			
		}
	
	

$res = $tbl->loadOne('id='.$id);	
if($res){
		$row = mysql_fetch_array($res);
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Category</h1>
				<div class="breadcrumbs"><a href="#">Content</a> / <a href="#">Sửa</a></div>
			</div><br />
 
		  
		  
			<div class="table">
				<img src="../c/img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="../c/img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post">
				<table class="listing form" cellpadding="0" cellspacing="0">
					<tr>
						<th class="full" colspan="2">NỘI DUNG</th>
					</tr>
					<tr>
						<td class="first" width="75"><strong>Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
						<td width="536" class="last">#<?php echo $id?></td>
					</tr>
					<tr>
						<td class="first"><strong>sections</strong></td>
						<td class="last"><select name="sections" id="sections">
<?php
	$tblsections = (" select * from sections where loai=0 and lang=".$a." ");
	$ressections = mysql_query($tblsections);
	if($ressections){
		while($rowsections=mysql_fetch_array($ressections)){
?>

						  <option value="<?php echo $rowsections['id'] ?>" <?php if($row['sections']==$rowsections['id']) echo "selected"; ?> ><?php echo $rowsections['name'] ?></option>
                          
<?php
		}
	}
?>
					    </select></td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Name</strong></td>
						<td class="last"><input name="name" type="text" class="text" id="name" value="<?php echo $row['name']; ?>" /></td>
					</tr>
					<tr>
					  <td class="first"><strong>Hit</strong></td>
					  <td class="last"><input name="hit" type="text" class="text" id="hit" value="<?php echo $row['hit']; ?>" /></td>
				  </tr>
					<tr>
						<td class="first" width="75"><strong>Published</strong></td>
						<td class="last"><label>
						  <input type="checkbox" name="published" id="published" 
						  <?php 
						  	//loadChecked($check)
							loadChecked($row['published']);
						  ?> 
                          />
						</label></td>
					</tr>
					<tr>
						<td class="first" width="75"><strong>Ordering</strong></td>
						<td class="last"><input name="ordering" type="text" class="text" id="ordering" value="<?php echo $row['ordering']; ?>" /></td>
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
<?php
	}
?>
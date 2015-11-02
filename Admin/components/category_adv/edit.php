<?php
	if(isset($_GET["id"])){
			$id = $_GET["id"];
		}
	
	$tbl = new table('category_adv');
	
	/*
		*
		* edit to categoryadvertise
		*
	*/
	
	if(isset($_POST["done"])){
			
			// get field
			$field = array('name','ordering','lang');
			
			// get values
			// format
			// format($str,$isComma=1)
			$name = format($_POST["name"],0);
			$ordering = format($_POST["ordering"],0);
			
			// values
			$values = array($name,$ordering,$lang);
			
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
			  <h1>category advertise</h1>
				<div class="breadcrumbs"><a href="#">Content</a> / <a href="#">Sửa</a></div>
			</div><br />
 
		  
		  
			<div class="table">
				<img src="../Copy of categoryadvertise/img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="../Copy of categoryadvertise/img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post">
				<table class="listing form" cellpadding="0" cellspacing="0">
					<tr>
						<th class="full" colspan="2">NỘI DUNG</th>
					</tr>
					<tr>
						<td class="first" width="75"><strong>Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
						<td width="536" class="last">#<?php echo $id?></td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Name</strong></td>
						<td class="last"><input name="name" type="text" class="text" id="name" value="<?php echo $row['name']; ?>" /></td>
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
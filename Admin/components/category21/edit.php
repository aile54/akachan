<?php
	if(isset($_GET['id'])){
			$id = $_GET["id"];
		}
	$tbl = new table('category2');
	
	if(isset($_POST["done"])){
			
			// get field
			$field = array('catid','name','ordering');
			
			// get values
			// format
			// format($str,$isComma=1)
			$catid = format($_POST["catid"],0);
			$name = format($_POST["name"],0);
			$ordering = format($_POST["ordering"],0);
			
			// values
			$values = array($catid,$name,$ordering);
			
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
			  <h1>Danh mục 2</h1>
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
						<td class="first"><strong>Danh mục 1</strong></td>
						<td class="last"><select name="catid">
                        <option value="">---[Chọn một]---</option>
                        <?
						 	$tbl_cat = new table('category1');
							$res_cat = $tbl_cat ->loadAll('order by ordering');
							while($row_cat = mysql_fetch_array($res_cat)){
						?>
						  <option value="<?php echo $row_cat['id'] ?>" <? if($row['catid']==$row_cat['id']) echo 'selected';?>><?php echo $row_cat['name'] ?></option>
						<? }?>
					    </select></td>
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
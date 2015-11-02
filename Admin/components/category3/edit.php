<?php
	
	if(isset($_GET['id'])){
			$id = $_GET["id"];
		}
	$tbl = new table('category3');
	
	if(isset($_POST["done"])){
		if(test_isset3('category3','alias',$_POST["catid1"],$_POST["catid2"],$_POST['name'])==0){			
			// get field
			$field = array('catid1','catid2','name','ordering','alias');
			
			$values = array(
						format($_POST["catid1"],0),
						format($_POST["catid2"],0),
						format($_POST["name"],0) ,
						format($_POST['ordering'],0),
						format(convert($_POST["name"]),0)
						);
						
			// updateObject($field=array(),$value=array(),$where)
			$res = $tbl->updateObject($field,$values,'id='.$id);
			if($res){
					header('location: '.loadPage('category3'));
				}
		}
		else
			echo "Lỗi trùng tên. Vui lòng nhập tên khác.";
	}

$res = $tbl->loadOne('id='.$id);	
if($res){
		$row = mysql_fetch_array($res);
?>
<div id="center-column">
    <div class="top-bar">
      <h1>Danh mục 3</h1>
        <div class="breadcrumbs"><a href="<?=loadPage('category3')?>">Danh mục 3</a> / <a href="#">Sửa</a></div>
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
						<td class="last"><select name="catid1" onchange="get_('components/category3/xuly.php',this.value,'cat2')">
                        <option value="">---[Chọn một]---</option>
                        <?php
						 	$tbl_cat = new table('category1');
							$res_cat = $tbl_cat ->loadAll('order by ordering');
							while($row_cat = mysql_fetch_array($res_cat)){
						?>
						  <option value="<?php echo $row_cat['id'] ?>" <?php if($row['catid1']==$row_cat['id']) echo 'selected';?>><?php echo $row_cat['name'] ?></option>
						<?php }?>
					    </select></td>
					</tr>
                    <tr class="bg">
						<td class="first"><strong>Danh mục 2</strong></td>
						<td colspan="3" class="last"><div id="cat2">
                        <select name="catid2">	
                            <option value="">---Chọn một---</option>
                            <?php
								$tbl_cat2 = new table('category2');
								$res_cat2 = $tbl_cat2->loadOne('catid='.$row['catid1'].' order by ordering');
                            	while($row_cat2=mysql_fetch_array($res_cat2)){
							?>
                            <option value="<?php echo $row_cat2['id'];?>" <?php if($row['catid2']==$row_cat2['id']) echo 'selected'?>><?php echo $row_cat2['name'];?></option>
                            <?php }?>
                        </select>
                        </div></td>
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
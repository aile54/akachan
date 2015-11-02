<?php

	$tbl = new table('category3');
	
	/*
		*
		* add to category1
		*
	*/
	
	if(isset($_POST["done"])){
		if(test_isset3('category3','alias',$_POST["catid1"],$_POST["catid2"],$_POST['name'])==0){	
			// get field
			$field = "id,catid1,catid2,name,ordering,alias";
			
			// format($str,$isComma=1)
			// isCheck($check)
			$values = format($tbl->getLastId()+1,1);
			$values.= format($_POST["catid1"],1);
			$values.= format($_POST["catid2"],1);
			$values.= format($_POST["name"],1);
			$values.= format($_POST["ordering"],1);
			$values.= format(convert($_POST["name"]),0);
			
			// submit
			// insertObject($field,$value)
			$res = $tbl->insertObject($field,$values);
			if($res){
					echo "OK";
				}
		}
		else
			echo "Lỗi trùng tên. Vui lòng nhập tên khác.";	
	}	
	
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Danh mục 3</h1>
				<div class="breadcrumbs"><a href="<?=loadPage('category3')?>">Danh mục 3</a> / <a href="#">Thêm</a></div>
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
						<td width="536" class="last">#<?php echo $tbl->getLastId()+1; ?></td>
					</tr>
					<tr>
						<td class="first"><strong>Danh mục 1</strong></td>
						<td class="last"><select name="catid1" onchange="get_('components/category3/xuly.php',this.value,'cat2')">
                        <option value="">---[Chọn một]---</option>
                        <?
						 	$tbl_cat = new table('category1');
							$res_cat = $tbl_cat ->loadAll('order by ordering');
							while($row_cat = mysql_fetch_array($res_cat)){
						?>
						  <option value="<?php echo $row_cat['id'] ?>"><?php echo $row_cat['name'] ?></option>
						<? }?>
					    </select></td>
					</tr>
                    <tr class="bg">
						<td class="first"><strong>Danh mục 2</strong></td>
						<td colspan="3" class="last"><div id="cat2">
                        <select name="catid2">
                        <option value="">---[Chọn một]---</option>
                        </select>
                        </div></td>
				  	</tr>
					<tr class="bg">
						<td class="first"><strong>Name</strong></td>
						<td class="last"><input name="name" type="text" class="text" id="name" /></td>
					</tr>
					<tr>
						<td class="first" width="75"><strong>Ordering</strong></td>
						<td class="last"><input name="ordering" type="text" class="text" id="ordering" value="<?php echo $tbl->getLastOrdering()+1; ?>" /></td>
					</tr>
					<tr class="bg">
					  <td class="first">&nbsp;</td>
					  <td class="last"><label>
					    <input type="submit" name="done" value="done" id="done" />
					  </label></td>
				  </tr>
				</table>
				</form>
	        <p>&nbsp;</p>
		  </div>
		</div>
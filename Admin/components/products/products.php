<?php
	$tbl = new table('products');
	
	if(isset($_POST["update"])){
		//del
			if(isset($_POST["del"])){
					$del = $_POST["del"];
					del_multi_img('../','Images/Products/','products','image',$del);
				}
		}
?>
<div id="center-column">
			<div class="top-bar">
				<a href="<?php echo loadPage('addProducts'); ?>" class="button" ><img src="img/add-folder-icon.png" width="30" height="30" border="0" />  </a>
				<h1>Products</h1>
				<div class="breadcrumbs"><a href="#">Homepage</a> / <a href="#">Products</a></div>
			</div><br />
			<form method="post">
		  <div class="select-bar">
		    <label>
		    <input type="text" name="key" id="key" />
		    </label>
		    <label>
			<input type="submit" name="search" value="Search" id="search" />
			</label>
		  </div>
		  	</form>
		  
		  
		  
			<div class="table">
				<img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post">
				<table class="listing" cellpadding="0" cellspacing="0">
					<tr>
						<th class="first">Name </th>
						<th>Danh mục 1</th>
                        <th>Danh mục 2</th>
                        <th>Danh mục 3</th>
                        <th>Thêm giá</th>
                        <th>Thêm màu sắc</th>
                        <th>Khuyến mãi</th>
                        <th>Mới về</th>
                        <th>Tiêu biểu</th>
                        <th>Mới</th>
                        <th>SP yêu thích</th>
					  <th class="last">Xóa</th>
					</tr>
                    
<?php

	$pagename = $_SERVER["PHP_SELF"]."?choose=products";
	$limit = 20;
	if(isset($_GET["start"])){
			$start = $_GET["start"];
		}
	if(!isset($start)) $start = 0;
	$nume=0;
	
	if(isset($_POST["search"])){
			// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc');
			// formatCompare($str,$pos=0);
			$res = $tbl->loadPaging($start,$nume,$limit,'where name like'.formatCompare($_POST["key"],0));
		}else{
		// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc');	
			$res = $tbl->loadPaging($start,$nume,$limit);
		}
		
	if($res){
			while($row=mysql_fetch_array($res)){
?>
					<tr>
						<td class="first style1">
                        	<a href="<?php echo loadPage('editProducts&id='.$row['id']); ?>"><?php echo $row['name'] ?></a>
                        </td>
						<td>
							<?php
								if($row['catid1']!='' && $row['catid1']!=0){
									$tbl_cat1 = new table('category1');
									$res_cat1 = $tbl_cat1->loadOne('id='.$row['catid1']);
									if($res_cat1){
											$row_cat1 = mysql_fetch_array($res_cat1);
											echo $row_cat1['name'];
										}
								}
                            ?>
                        </td>
                        <td>
							<?php
								if($row['catid2']!='' && $row['catid2']!=0){
									$tbl_cat2 = new table('category2');
									$res_cat2 = $tbl_cat2->loadOne('id='.$row['catid2']);
									if($res_cat2){
											$row_cat2 = mysql_fetch_array($res_cat2);
											echo $row_cat2['name'];
										}
								}
                            ?>
                        </td>
                        <td>
							<?php
								if($row['catid3']!='' && $row['catid3']!=0){
									$tbl_cat3 = new table('category3');
									$res_cat3 = $tbl_cat3->loadOne('id='.$row['catid3']);
									if($res_cat3){
											$row_cat3 = mysql_fetch_array($res_cat3);
											echo $row_cat3['name'];
										}
								}
                            ?>
                        </td>
                        <td>
                        	<a href="index.php?choose=addprice&proid=<?php echo $row['id']?>"><img src="img/plus.gif" border="0" /></a>
                        </td>
                        
                        <td>
                        	<a href="index.php?choose=addimg&proid=<?php echo $row['id']?>"><img src="img/plus.gif" border="0" /></a>
                        </td>
                        <td>
                        	<input type="checkbox" <?php loadChecked($row['promo']); ?> onclick="update_field('ajax/get_check.php','id=<?php echo $row['id']?>&val='+this.checked+'&field_name=promo&tbl_name=products')" />
                        </td>
                        
                        <td>
                        	<input type="checkbox" <?php loadChecked($row['new']); ?> onclick="update_field('ajax/get_check.php','id=<?php echo $row['id']?>&val='+this.checked+'&field_name=new&tbl_name=products')" />
                        </td>
                        
                        <td>
                        	<input type="checkbox" <?php loadChecked($row['typical']); ?> onclick="update_field('ajax/get_check.php','id=<?php echo $row['id']?>&val='+this.checked+'&field_name=typical&tbl_name=products')" />
                        </td>
                        
                        <td>
                        	<input type="checkbox" <?php loadChecked($row['featured']); ?> onclick="update_field('../ajax/get_check.php','id=<?php echo $row['id']?>&val='+this.checked+'&field_name=featured&tbl_name=products')" />
                        </td>
                        
                        <td>
                        	<input type="checkbox" <?php loadChecked($row['liked']); ?> onclick="update_field('ajax/get_check.php','id=<?php echo $row['id']?>&val='+this.checked+'&field_name=liked&tbl_name=products')" />
                        </td>
                        
						<td align="center" class="last">
                        	<input type="checkbox" name="del[]" value="<?php echo $row['id']; ?>" id="del[]" />
                        </td>
					</tr>
<?php
				}
			}
?>
					<tr class="bg">
					  <td colspan="13" class="first style2">
<?php
	// loadPageTable($pagename,& $start,$limit,$nume)
	loadPageTable($pagename,$start,$limit,$nume);
?>
					  </td>
				  </tr>
					<tr class="bg">
					  <td colspan="13" class="first style2"><label>
					    <input name="update" type="submit" id="update" value="Update" />
                        <input type="hidden" name="start" value="<?php echo $start; ?>"  />
                        <input type="hidden" name="limit" value="<?php echo $limit; ?>"  />
					  </label></td>
				  </tr>
				</table>
			  </form>
			</div>
		</div>

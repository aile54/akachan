<?php

	$tbl = new table('category2');
	
	// proccess update
	if(isset($_POST["update"])){
		// delete
		if(isset($_POST["del"])){
			$del = $_POST["del"];
			del_img_array('Images/Category2/','category2','image',$del);
		}
	}
?>

<div id="center-column">
			<div class="top-bar">
				<a href="<?php echo loadPage('addCategory2'); ?>" class="button"><img src="img/add-folder-icon.png" width="30" height="30" border="0" />  </a>
				<h1>Danh mục 2</h1>
				<div class="breadcrumbs"><a href="#">Homepage</a> / <a href="#">category</a></div>
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
				<img src="../c/img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="../c/img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post">
				<table class="listing" cellpadding="0" cellspacing="0">
					<tr>
						<th class="first">Name </th>
                        <th>Hình ảnh</th>
						<th>Danh mục 1</th>
                        <th>Order</th>
						<th class="last">Xóa</th>
					</tr>
					
<?php
	
	// get value
	$pagename = $_SERVER["PHP_SELF"]."?choose=category2";
	$limit = 20;
	if(isset($_GET["start"])){
			$start = $_GET["start"];
		}
	if(!isset($start)) $start = 0;
	$nume = 0;

	if(isset($_POST["search"])){
			// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc')		
			// formatCompare($str,$pos=0)
			$res = $tbl->loadPaging($start,$nume,$limit,'where name like '.formatCompare($_POST["key"],0),'order by catid,ordering');
		}else{
			// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc')
			$res = $tbl->loadPaging($start,$nume,$limit,'','order by catid,ordering');
		}
		/*$sql=("select * from category1 where lang = ".$a." ");
		$res=mysql_query($sql);*/
	if($res){
			while($row=mysql_fetch_array($res)){
				$thumb_img = get_thumb('../Images/Category2/',$row['image']);
?>                    
                    <tr>
						<td class="first style1">
                        	<a href="<?php echo loadPage('editCategory2&id='.$row['id']); ?>"><?php echo $row['name']; ?></a>
                        </td>
                        <td>
                        	<a href="<?php echo loadPage('editCategory2&id='.$row['id']); ?>"><img src="../<?php echo $thumb_img?>" height="22" align="absmiddle" /></a>
                        </td>
						<td>
                            <span class="first style1">
								<?php 
									if($row['catid']!='' && $row['catid']!=0){
										$tbl_cat = new table('category1');
										$res_cat = $tbl_cat ->loadOne('id='.$row['catid']);
										$row_cat = mysql_fetch_array($res_cat);
										echo $row_cat['name'];
									}
                                ?>
                            </span>
                        </td>
                        <td align="center">
                        	<input type="text" value="<?php echo $row['ordering']; ?>" 
                                onkeyup="update_order('ajax/ajax_order.php',<?php echo $row['id']?>,this.value,'category2')" 
                                class="txt_order"/>
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
					  <td colspan="5" class="first style2">
<?php
	// loadPageTable($pagename,& $start,$limit,$nume)
	loadPageTable($pagename,$start,$limit,$nume);
?>
					  </td>
				  </tr>
					<tr class="bg">
					  <td colspan="5" class="first style2"><label>
					    <input name="update" type="submit" id="update" value="Update"/>
                        <input type="hidden" name="limit" value="<?php echo $limit; ?>"  />
                        <input type="hidden" name="start" value="<?php echo $start ?>"  />
					  </label></td>
				  </tr>
				</table>
				</form>
			</div>
		</div>

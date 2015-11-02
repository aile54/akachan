<?php

	$tbl = new table('promotion');
	
	// proccess update
	if(isset($_POST["update"])){
		// delete
		if(isset($_POST["del"])){
			$del = $_POST["del"];
			del_img_array('Images/Promotion/','promotion','image',$del);
		}
	}
?>

<div id="center-column">
			<div class="top-bar">
				<a href="<?php echo loadPage('addPromotion'); ?>" class="button"><img src="img/add-folder-icon.png" width="30" height="30" border="0" />  </a>
				<h1>Thông tin khuyến mãi</h1>
				<div class="breadcrumbs"><a href="#">Homepage</a> / <a href="#">Thông tin khuyến mãi</a></div>
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
						<th>Url</th>
						<th class="last">Xóa</th>
					</tr>
					
<?php
	
	// get value
	$pagename = $_SERVER["PHP_SELF"]."?choose=promotion";
	$limit = 20;
	if(isset($_GET["start"])){
			$start = $_GET["start"];
		}
	if(!isset($start)) $start = 0;
	$nume = 0;

	if(isset($_POST["search"])){
			$res = $tbl->loadPaging($start,$nume,$limit,'where name like '.formatCompare($_POST["key"],0),
																						'order by id');
		}else{
			$res = $tbl->loadPaging($start,$nume,$limit,'','order by id');
		}
	
	if($res){
			while($row=mysql_fetch_array($res)){
				$thumb_img = get_thumb('../Images/Promotion/',$row['image']);
?>                    
                    <tr>
						<td class="first style1">
                        	<a href="<?php echo loadPage('editPromotion&id='.$row['id']); ?>"><?php echo $row['name']; ?></a>
                        </td>
                        <td>
                        	<a href="<?php echo loadPage('editPromotion&id='.$row['id']); ?>">
                            	<img src="../<?php echo $thumb_img?>" height="22" align="absmiddle" />
                            </a>
                        </td>
						<td>
                        	<a href="http://<?php echo $row['url']; ?>">
                            	<?php echo $row['url']; ?>
                            </a>
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

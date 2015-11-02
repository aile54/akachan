<?php
		
	$tbl= new table('img');
	
	// chec update
	if(isset($_POST["update"])){
			// remove($arr,$field='id')
			if(isset($_POST["del"])){
					$del = $_POST["del"];
					del_img_array('../Images/Products/','img','image',$del);
				}
		}
?>

<div id="center-column">
			<div class="top-bar">
				<a href="<?php echo loadPage('addimg'); ?>"  class="button">
                	<img src="img/add-folder-icon.png" width="30" height="30" border="0" />
				</a>
				<h1>Màu sắc sản phẩm</h1>
				<div class="breadcrumbs"><a href="#">Homepage</a></div>
			</div><br />
			<form method="post">
		  <div class="select-bar">
		    <label>
		    <input type="text" name="key" id="key" />
		    </label>
		    <label>
			<input type="submit" name="search" value="Search" id="search" />
			</label> (ID sản phẩm)
		  </div>
		  	</form>
		  
		  
            <div class="table">
            

            
				<img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post">

				<table width="100%" cellpadding="0" cellspacing="0" class="listing">
					<tr>
						<th class="first">Tên màu</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
						<th class="last">Xóa</th>
					</tr>

<?php

	$pagename = $_SERVER["PHP_SELF"]."?choose=img";
	$limit = 20;
	if(isset($_GET["start"])){
			$start = $_GET["start"];
		}
	if(!isset($start)) $start=0;
	$nume=0;
	
	if(isset($_POST["search"])){
			// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc');
			// formatCompare($str,$pos=0);
			$res = $tbl->loadPaging($start,$nume,$limit,'where proid='.$_POST["key"],'order by proid desc');
		}else{
		// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc');	
			$res = $tbl->loadPaging($start,$nume,$limit,'','order by proid desc');
		}
		
	if($res){
			while($row=mysql_fetch_array($res)){
				$tbl_pro = new table('products');
				$res_pro = $tbl_pro -> loadOne('id='.$row['proid']);
				$row_pro = mysql_fetch_array($res_pro);
				
				$thumb_img = get_thumb('../Images/Products/',$row['image']);
?>					
                    <tr>
                    	<td class="first style1">
                        	<a href="<?php echo loadPage('editimg&id='.$row['id']); ?>"><?php echo $row['name']?></a>
                        </td>
                        <td><a href="<?php echo loadPage('editimg&id='.$row['id']); ?>"><img src="../<?php echo $thumb_img?>" height="50" /></a></td>
                        <td><a href="<?php echo loadPage('editimg&id='.$row['id']); ?>"><?php echo $row_pro['name']?></a></td>
					  <td align="center" class="last"><input type="checkbox" name="del[]" value="<?php echo $row['id']; ?>" id="del[]" /></td>
					</tr>
<?php
			}
		}
?>
					<tr class="bg">
					  <td colspan="9" class="first style2">
<?php
	// loadPageTable($pagename,& $start,$limit,$nume)
	loadPageTable($pagename,$start,$limit,$nume);
	
?>


		  </td>
				  </tr>
					<tr class="bg">
					  <td colspan="9" class="first style2"><label>
					    <input name="update" type="submit" id="update" value="Update"/>
                        <input type="hidden" name="start" value="<?php echo $start; ?>"  />
                        <input type="hidden" name="limit" value="<?php echo $limit; ?>"  />
                        
					  </label></td>
				  </tr>
				</table>
			  </form>
			</div>
		</div>

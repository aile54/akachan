<?php
	$tbl= new table('news');
	
	// chec update
	if(isset($_POST["update"])){
			// remove($arr,$field='id')
			if(isset($_POST["del"])){
					$del = $_POST["del"];
					del_img_array('Images/News/','news','image',$del);
				}
		}
?>

<div id="center-column">
			<div class="top-bar">
				<a href="<?php echo loadPage('addnews'); ?>"  class="button"><img src="img/add-folder-icon.png" width="30" height="30" border="0" />  </a>
				<h1>Danh sách tin tức</h1>
				<div class="breadcrumbs"><a href="#">Homepage</a> / <a href="#">News</a></div>
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

				<table width="100%" cellpadding="0" cellspacing="0" class="listing">
					<tr>
						<th class="first">Tiêu đề tin</th>
						<th>Hình ảnh</th>
						<th class="last">Xóa</th>
					</tr>

<?php

	$pagename = $_SERVER["PHP_SELF"]."?choose=news";
	$limit = 20;
	if(isset($_GET["start"])){
			$start = $_GET["start"];
		}
	if(!isset($start)) $start=0;
	$nume=0;
	
	if(isset($_POST["search"])){
			// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc');
			// formatCompare($str,$pos=0);
			$res = $tbl->loadPaging($start,$nume,$limit,'where name like'.formatCompare($_POST["key"],0),'order by date_add');
		}else{
		// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc');	
			$res = $tbl->loadPaging($start,$nume,$limit,'','order by date_add');
		}
		
	if($res){
			while($row=mysql_fetch_array($res)){
				$thumb_img = get_thumb('../Images/News/',$row['image']);
?>					
                    <tr>
						<td class="first style1"><a href="<?php echo loadPage('editnews&id='.$row['id']); ?>"><?php echo $row['name']; ?></a></td>
						
					 <!-- <td align="center" class="last">
                      <?
					  	if($row['catid']!=''){
							$tbl_cat = new table('category_news');
							$res_cat = $tbl_cat ->loadOne('id='.$row['catid']);
							$row_cat = mysql_fetch_array($res_cat);
							echo $row_cat['name'];
						}
					  ?>
                      </td>-->
                      <td><a href="<?php echo loadPage('editnews&id='.$row['id']); ?>"><img src="../<?php echo $thumb_img?>" height="50" /></a></td>
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
					    <input name="update" type="submit" id="update" value="Update" />
                        <input type="hidden" name="start" value="<?php echo $start; ?>"  />
                        <input type="hidden" name="limit" value="<?php echo $limit; ?>"  />
                        
					  </label></td>
				  </tr>
				</table>
			  </form>
			</div>
		</div>

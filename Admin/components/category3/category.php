<?php
		
	$tbl = new table('category3');
	
	// proccess update
	if(isset($_POST["update"])){
			
			// delete
			if(isset($_POST["del"])){
					$del = $_POST["del"];
					
					// remove($arr,$field='id')
					$tbl->remove($del,'id');
				}
			
			// published
			if(isset($_POST["published"])){
					$published = $_POST["published"];
					$start = $_POST["start"];
					$limit = $_POST["limit"];
					
					// updateCheck($arrId,$field,$start=0,$limit=100,$value=1,$where='id',$order='order by id desc')
					$tbl->updateCheck($published,'published',$start,$limit);
				}
			
		}
?>

<div id="center-column">
			<div class="top-bar">
				<a href="<?php echo loadPage('addCategory3'); ?>" class="button"><img src="img/add-folder-icon.png" width="30" height="30" border="0" />  </a>
				<h1>Danh mục 3</h1>
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
						<th>Danh mục 1</th>
                        <th>Danh mục 2</th>
                        <th>Order</th>
						<th class="last">Xóa</th>
					</tr>
					
<?php
	
	// get value
	$pagename = $_SERVER["PHP_SELF"]."?choose=category3";
	$limit = 20;
	if(isset($_GET["start"])){
			$start = $_GET["start"];
		}
	if(!isset($start)) $start = 0;
	$nume = 0;

	if(isset($_POST["search"])){
			// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc')		
			// formatCompare($str,$pos=0)
			$res = $tbl->loadPaging($start,$nume,$limit,'where name like '.formatCompare($_POST["key"],0),'order by catid1,catid2,ordering');
		}else{
			// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc')
			$res = $tbl->loadPaging($start,$nume,$limit,'','order by catid1,catid2,ordering');
		}
		/*$sql=("select * from category1 where lang = ".$a." ");
		$res=mysql_query($sql);*/
	if($res){
			while($row=mysql_fetch_array($res)){
			//$sec=$row['sections'];
?>                    
                    <tr>
						<td class="first style1"><a href="<?php echo loadPage('editCategory3&id='.$row['id']); ?>"><?php echo $row['name']; ?></a></td>
						<td><span class="first style1">
						<?php 
						if($row['catid1']!='' && $row['catid1']!=0){
							$tbl_cat = new table('category1');
							$res_cat = $tbl_cat ->loadOne('id='.$row['catid1']);
							$row_cat = mysql_fetch_array($res_cat);
							echo $row_cat['name'];
						}
						?></span></td>
                        <td><span class="first style1">
						<?php 
						if($row['catid2']!='' && $row['catid2']!=0){
							$tbl_cat = new table('category2');
							$res_cat = $tbl_cat ->loadOne('id='.$row['catid2']);
							$row_cat = mysql_fetch_array($res_cat);
							echo $row_cat['name'];
						}
						?></span></td>
                        <td align="center"><input type="text" value="<?= $row['ordering']; ?>" onkeyup="update_order('ajax/ajax_order.php',<?=$row['id']?>,this.value,'category3')" class="txt_order"/></td>
						<td align="center" class="last"><input type="checkbox" name="del[]" value="<?php echo $row['id']; ?>" id="del[]" /></td>
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

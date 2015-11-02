<?php
	$tbl= new table('combi');
	
	// chec update
	if(isset($_POST["update"])){
			// remove($arr,$field='id')
			if(isset($_POST["del"])){
					$del = $_POST["del"];
					$tbl->remove($del,'id');
				}
				
			if(isset($_POST["hot"])){
					$hot = $_POST["hot"];
					$start = $_POST["start"];
					$limit = $_POST["limit"];
					
					// updateCheck($arrId,$field,$start=0,$limit=100,$value=1,$where='id',$order='order by id desc')
					$tbl->updateCheck($hot,'hot',$start,$limit);
				}
		}
?>

<div id="center-column">
			<div class="top-bar">
				<a href="<?php echo loadPage('addcombi'); ?>"  class="button"><img src="img/add-folder-icon.png" width="30" height="30" border="0" />  </a>
				<h1>Mua hàng trên web Nhật</h1>
			  <div class="breadcrumbs"><a href="#">Homepage</a> / <a href="#">combi</a></div>
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
						<th class="first">Name</th>
                        <th>Thứ tự</th>
						<th class="last">Xóa</th>
					</tr>

<?php

	$pagename = $_SERVER["PHP_SELF"]."?choose=combi";
	$limit = 20;
	if(isset($_GET["start"])){
			$start = $_GET["start"];
		}
	if(!isset($start)) $start=0;
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
						<td class="first style1"><a href="<?php echo loadPage('editcombi&id='.$row['id']); ?>"><?php echo $row['name']; ?></a></td>
						<td align="center"><input type="text" value="<?= $row['ordering']; ?>" onkeyup="update_order('ajax/ajax_order.php',<?=$row['id']?>,this.value,'combi')" class="txt_order"/></td>
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

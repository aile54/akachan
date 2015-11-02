<?php
	$tbl = new table('orders');
	if(isset($_POST["update"])){
			if($_POST["del"]){
					$del = $_POST["del"];
					
					/* remove ordersdetails first */
					$tblDetails = new table('ordersdetails');
					$tblDetails->remove($del,'orderid');
					
					// remove($arr,$field='id')
					$tbl->remove($del,'id');
				}
		}
	
?>
<div id="center-column">
			<div class="top-bar">
		    <h1>Orders</h1>
				<div class="breadcrumbs"><a href="#">Homepage</a> / <a href="#">Orders</a></div>
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
				<img src="../Copy of orders/img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="../Copy of orders/img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post">
				<table class="listing" cellpadding="0" cellspacing="0">
					<tr>
						<th class="first">Số ĐĐH</th>
						<th>Họ tên</th>
						<th class="last">Xóa</th>
					</tr>
<?php
	$pagename = $_SERVER["PHP_SELF"]."?choose=orders";
	$limit = 20;
	if(isset($_GET["start"])){
			$start = $_GET["start"];
		}
	if(!isset($start)) $start = 0;
	$nume = 0;
	
	// search
	if(isset($_POST["search"])){
			// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc')
			$res = $tbl->loadPaging($start,$nume,$limit,'where title like'.formatCompare($_POST["key"],0));
		}else {
			// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc')
			$res = $tbl->loadPaging($start,$nume,$limit);
		}
		
	if($res){
			while($row=mysql_fetch_array($res)){
?>
                    <tr>
						<td class="first style1">
                        	<a href="<?php echo loadPage('viewOrders&id='.$row['id']); ?>"><?php echo $row['id']; ?> </a>
                        </td>
						<td>
                        	<span class="first style1">
                            	<a href="<?php echo loadPage('viewOrders&id='.$row['id']); ?>"><?php echo $row['name']; ?></a>
                            </span>
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
					  <td colspan="3" class="first style2">
<?php
	// loadPageTable($pagename,& $start,$limit,$nume);
	loadPageTable($pagename,$start,$limit,$nume);
?>						  
					  </td>
				  </tr>
					<tr class="bg">
					  <td colspan="3" class="first style2"><label>
					    <input name="update" type="submit" id="update" value="update" />
					  </label></td>
				  </tr>
				</table>
</form>
			</div>
		</div>

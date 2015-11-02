<?php
	$tbl = new table('pageaddress');
	if($_POST["done"]){
			$tbl->removeAll();
		}
?>
<div id="center-column">
			<div class="top-bar">
		    <h1>Page transfer</h1>
				<div class="breadcrumbs"></div>
			</div><br />
			<div class="table">
				<img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post">
				<table class="listing" cellpadding="0" cellspacing="0">
					<tr>
						<th class="first">Id</th>
						<th>From</th>
						<th>Date</th>
					</tr>
<?php
	$pagename = $_SERVER["PHP_SELF"]."?choose=pageaddress";
	$limit = 20;
	$start = $_GET["start"];
	if(!isset($start)) $start =0;
	$nume = 0;
	
	// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc')
	$res = $tbl->loadPaging($start,$nume,$limit);
	if($res){
			while($row=mysql_fetch_array($res)){
?>
                    <tr>
						<td class="first style1"><?php echo $row['id']; ?></td>
						<td><span class="first style1"><?php echo $row['from']; ?></span></td>
						<td><?php echo $row['date']; ?></td>
					</tr>
<?php
				}
			}
?>
					<tr class="bg">
					  <td colspan="3" class="first style2">
<?php
	// loadPageTable($pagename,& $start,$limit,$nume)
	loadPageTable($pagename,$start,$limit,$nume);
?>
					  </td>
				  </tr>
					<tr class="bg">
					  <td colspan="3" class="first style2"><label>
					    <input name="done" type="submit" id="done" value="Xóa" />
					  </label></td>
				  </tr>
				</table>
</form>
			</div>
		</div>

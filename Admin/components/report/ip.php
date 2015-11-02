<?php
	$tbl = new table('counter');
	if($_POST["done"]){
		$res = $tbl->loadOne('(month(timelogin) < '.(date('m')-1).' and year(timelogin) ='.date('Y').') or year(timelogin) <'.date('Y'));
		$num = mysql_num_rows($res);
		
		mysql_query('update setting set visitall=visitall+'.$num.' where id=1');
		
		mysql_query('delete from counter where (month(timelogin) < '.(date('m')-1).' and year(timelogin) ='.date('Y').') or year(timelogin) <'.date('Y'));
		
		header('location: '.loadPage('report'));
	}
?>
<div id="center-column">
			<div class="top-bar">
				<h1>Report</h1>
			</div><br />
			<div class="table">
				<img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post">
				<table class="listing" cellpadding="0" cellspacing="0">
					<tr>
						
						<th>IP</th>
						<th>Date</th>
					</tr>
<?php
	$pagename = $_SERVER["PHP_SELF"]."?choose=ip";
	$limit = 20;
	$start = $_GET["start"];
	if(!isset($start)) $start = 0;
	$nume = 0;
	// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc')
	$res = $tbl->loadPaging($start,$nume,$limit);
	if($res){
			while($row=mysql_fetch_array($res)){
?>
                    <tr>
						<td><?php echo $row['ip']; ?></td>
						<td><?php echo $row['timelogin']; ?></td>
					</tr>
<?php
				}
			}
?>
					<tr>
					  <td colspan="3" class="first style2">
<?php
	// loadPageTable($pagename,& $start,$limit,$nume)
	loadPageTable($pagename,$start,$limit,$nume);
?>
                      </td>
				  </tr>
					<tr>
					  <td colspan="3" align="left"><label>
					    <input type="submit" name="done" id="done" value="Xóa" />
				      </label></td>
				  </tr>
				</table>
				</form>
			</div>
		</div>
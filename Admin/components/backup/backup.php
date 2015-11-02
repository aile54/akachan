<?php
	$tbl = new table('backup');
?>
<div id="center-column">
			<div class="top-bar">
				<a href="<?php echo loadPage('addBackup'); ?>" ><img src="img/add-folder-icon.png" width="30" height="30" border="0" />  </a>
				<h1>Backup</h1>
				<div class="breadcrumbs"><a href="#">Homepage</a> / <a href="#">Backup</a></div>
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
						<th class="first">Name</th>
						<th>Date</th>
						<th>Download</th>
						<th class="last">Xóa</th>
					</tr>

<?php

	$pagename = $_SERVER["PHP_SELF"]."?choose=backup";
	$limit = 20;
	$start = $_GET["start"];
	if(!isset($start)) $start=0;
	$nume = 0;
	
	if($_POST["search"]){
			// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc')
			$res = $tbl->loadPaging($start,$nume,$limit,'where name like'.formatCompare($_POST["key"],0));
		}else{
			// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc')
			$res = $tbl->loadPaging($start,$nume,$limit);			
		}

	if($res){
			while($row=mysql_fetch_array($res)){
?>
                    <tr>
						<td class="first style1"><a href="<?php echo loadPage('restore&id='.$row['id']); ?>"><?php echo $row['name']; ?></a></td>
						<td><span><?php echo $row['date']; ?></span></td>
						<td><span class="first style1"><a href="<?php echo $row['file']; ?>" target="_blank">Download</a></span></td>
						<td class="last"><input type="checkbox" name="del[]" value="<?php echo $row['id']; ?>" id="del[]" /></td>
					</tr>
<?php
				}
			}
?>
					<tr class="bg">
					  <td colspan="4" class="first style2">
<?php
	// loadPageTable($pagename,& $start,$limit,$nume)
	loadPageTable($pagename,$start,$limit,$nume);
?>
					  </td>
				  </tr>
					<tr class="bg">
					  <td colspan="4" class="first style2"><label>
					    <input name="update" type="submit" id="update" value="Update" />
					  </label></td>
				  </tr>
				</table>
			  </form>
			</div>
		</div>

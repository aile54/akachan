<?php
	$tbl = new table('linkweb');
	
						/*
							*
							* check update
							*
						*/

						if(isset($_POST["update"])){
							$del = $_POST["del"];
							if($_POST["del"]){
								$tbl->remove($del,'id');
							}
							
						}
	
	/*
		*************************** end check update **************************
	*/	
	
	
	
?>
<div id="center-column">
			<div class="top-bar">
				<a href="<?php echo loadPage('addlinkweb'); ?>" class="button" ><img src="img/add-folder-icon.png" width="30" height="30" border="0" />  </a>
				<h1>Liên kết website</h1>
				<div class="breadcrumbs"><a href="#">Homepage</a> / <a href="#">Liên kết website</a></div>
			</div><br />
			<form method="post" action="<?php echo loadPage('linkweb'); ?>">
		  <div class="select-bar">
		    <label>
		    <input name="key" type="text" id="key" />
		    </label>
		    <label>
			<input name="search" type="submit" id="search" value="Search" />
			</label>
		  </div>
		  	</form>
		  
		  
		  
			<div class="table">
				<img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post">
				<table class="listing" cellpadding="0" cellspacing="0">
					<tr>
						<th class="first">Tên</th>
						<th>Url </th>
						<th>Vị trí</th>
						<th class="last">Xóa</th>
					</tr>
<?php

	/*
		*
		* get value
		*
	*/
	// get value
	$pagename = $_SERVER["PHP_SELF"]."?choose=linkweb";
	$limit = 20;
	if(isset($_GET["start"])){
			$start = $_GET["start"];
		}

	
	if(!isset($start)){
		$start=0;
	}

	$nume=0;
	
	// search
	if(isset($_POST["search"])){
		// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc')
		$res = $tbl->loadPaging($start,$nume,$limit,'where name like'.formatCompare($_POST["key"],0),'order by ordering');
	}else{
	
		// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc')
		$res = $tbl->loadPaging($start,$nume,$limit,'','order by ordering');
	}
	
	if($res){
		while($row=mysql_fetch_array($res)){
?>
					<tr>
						<td class="first style1"><a href="<?php echo loadPage('editlinkweb&id='.$row['id']); ?>"><?php echo $row['name']; ?> </a></td>
						<td><?php echo $row['address']; ?></td>
						<td align="center"><input type="text" value="<?= $row['ordering']; ?>" onkeyup="update_order('ajax/ajax_order.php',<?=$row['id']?>,this.value,'linkweb')" class="txt_order"/></td>
						<td class="last"><a href="#">
						  <input name="del[]" type="checkbox" id="del[]" value="<?php echo $row['id']; ?>" />
						</a></td>
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
					    <input name="update" type="submit" id="update" value="Cập nhật" />
						<input type="hidden" name="x" value="<?php echo $start; ?>" />
						<input type="hidden" name="y" value="<?php echo $limit; ?>" />
					  </label></td>
				  </tr>
				</table>
				</form>
			</div>
		</div>
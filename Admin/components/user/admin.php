<?php
	$tbl = new table('admin');
	if(isset($_POST["update"])){
			if(isset($_POST["del"])){
					$del = $_POST["del"];
					
					// remove($arr,$field='id')
					$tbl->remove($del,'username');
				}
		}
?>
<div id="center-column">
			<div class="top-bar">
				<a href="<?php echo loadPage('addAdmin'); ?>" class="button"><img src="img/add-folder-icon.png" width="30" height="30" border="0" />  </a>
				<h1>Thành viên</h1>
				<div class="breadcrumbs"><a href="#">Homepage</a> / <a href="#">Admin</a></div>
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
					  <th class="first">Stt</th>
						<th class="first">Email đăng nhập</th>
						<th>Permission</th>
						<th>Họ tên</th>
						<th>Năn sinh</th>
						<th>Tình trạng</th>
						<th colspan="2">Hạn chế</th>
						<th class="last">Xóa</th>
					</tr>
<?php

	$pagename = $_SERVER["PHP_SELF"]."?choose=user";
	$stt=0;
	$limit = 10;
	if(isset($_GET["start"])){
			$start = $_GET["start"];
		}

	if(!isset($start)) $start =0;
	$nume = 0;

	if(isset($_POST["search"])){
				// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc')
				// formatCompare($str,$pos=0)
				$res = $tbl->loadPaging($start,$nume,$limit,'where username like'.formatCompare($_POST["key"],0),'order by per asc');
		}else{
				// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc')
				$res = $tbl->loadPaging($start,$nume,$limit,'where username =""','order by per asc');			
			}

	if($res){
			while($row=mysql_fetch_array($res)){
			$id=$row['id'];
			$stt++;
?>
                    <tr>
                      <td ><? echo $stt;?></td>
						<td class="first style1"><a href="<?php echo loadPage('editAdmin&username='.$row['username']); ?>"></a><?php echo $row['mail']; ?></td>
						<td><span class="first style1"><a href="#">
<?php
	$tblPer = new table('permission');
	$resPer = $tblPer->loadOne('id='.$row['per']);
	if($resPer){
			$rowPer = mysql_fetch_array($resPer);
			echo $rowPer['name'];
		}
?>
                        </a></span></td>
						<td><?php echo $row['name']; ?></td>
						<td><? echo $row['ngaysinh']?></td>
						<td><?
                        	if($row['admin_active']==1)
								echo "Đã kích hoạt";
							else
								echo "Đã khóa";
						
						?></td>
						<td><a href="#"><img src="img/public.gif" width="20" height="20" hspace="3" vspace="3" border="0" /></a></td>
						<td><a href="#"><img src="img/khoa.gif" width="20" height="20" hspace="3" vspace="3" border="0" /></a></td>
						<td align="center" class="last"><? if($id !=1){?><input type="checkbox" name="del[]" value="<?php echo $row['username']; ?>" id="del[]" />
                        <? } ?>                        </td>
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
?>					  </td>
				  </tr>
					<tr class="bg">
					  <td colspan="9" class="first style2"><label>
					    <input name="update" type="submit" id="update" value="Update" />
					  </label></td>
				  </tr>
				</table>
			  </form>
			</div>
		</div>
<?
	switch ($_GET['action'])
	{
		case 'khoa' :
			$id1 = $_GET['id'];
			$sql1 = mysql_query("UPDATE admin SET admin_active =0 WHERE id = ".$id1." LIMIT 1");
				
			break;
		case 'mo' :
			$id2 = $_GET['id'];
			$sql2 = mysql_query("UPDATE user SET admin_active =1 WHERE id  = ".$id2." LIMIT 1");
			break;
		case 'xoa' :
			$id3 = $_GET['id'];
			$sql3 = mysql_query("delete from user where id='".$id3."'");
			break;
	}
?>
<?php
	$id = $_GET["id"];
	$tbl = new table('binhluan');
	$res = $tbl->loadOne('id='.$id);
	if($res){
			$row=mysql_fetch_array($res);
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Thảo Luận</h1>
				<div class="breadcrumbs"><a href="#">Content</a> / <a href="#">View</a></div>
			</div><br />
 
		  
		  
			<div class="table">
				<img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post" enctype="multipart/form-data">
				<table class="listing form" cellpadding="0" cellspacing="0">
					<tr>
						<th class="full" colspan="3">NỘI DUNG</th>
					</tr>
					<tr>
						<td class="first" width="150"><strong>Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
						<td colspan="2" class="last">#<?php echo $id; ?></td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Thành viên</strong></td>
						<td colspan="2" class="last">
						<?php 
						$tbl_u = new table('user');
						$res_u = $tbl_u -> loadOne('id='.$row['uid']);
						$row_u = mysql_fetch_object($res_u);
						echo $row_u->name;?></td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Tin chia sẻ</strong></td>
						<td colspan="2" class="last">
						<?php 
							$tbl_pro = new table('products');
							$res_pro = $tbl_pro -> loadOne('id='.$row['proid']);
							$row_pro = mysql_fetch_object($res_pro);
							echo $row_pro->name;
						?>
                        </td>
					</tr>
					<tr>
						<td class="first"><strong>Nội dung bình luận</strong></td>
						<td class="last" colspan="2"><?php echo $row['details']; ?></td>
					</tr>
					<tr>
						<td class="first"><strong>Ngày bình luận</strong></td>
						<td colspan="2" class="last"><?=date('d/m/Y',$row['date_add'])?></td>
					</tr>
					<tr class="bg">
						<td class="first">&nbsp;</td>
						<td colspan="2" class="last"><a href="<?php echo loadPage('binhluan'); ?>">Go back</a></td>
					</tr>
					<tr class="bg">
					  <td class="first">&nbsp;</td>
					  <td colspan="2" class="last">&nbsp;</td>
				  </tr>
				</table>
			  </form>
	        <p>&nbsp;</p>
		  </div>
		</div>
<?php
	}
?>
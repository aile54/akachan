<?php
	// report
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
						<th class="first">Tên report </th>
						<th>Tổng số </th>
					</tr>
					<tr class="bg">
						<td class="first style2">Sản phẩm</td>
						<td>
<?php
	$tbl = new table('products');
	echo $tbl->getTotal();
	
?>                        </td>
					</tr>
                    <tr class="bg">
						<td class="first style2">Thương hiệu</td>
						<td>
<?php
	$tbl = new table('nsx');
	echo $tbl->getTotal();
	
?>                        </td>
					</tr>
                    <tr class="bg">
						<td class="first style2">Tin tức</td>
						<td>
<?php
	$tbl = new table('news');
	echo $tbl->getTotal();
	
?>                        </td>
					</tr>
					<tr>
						<td class="first style1">Tổng số khách liên hệ</td>
						<td>
<?php
	$tbl = new table('contact');
	echo $tbl->getTotal();
	
?>                        </td>
					</tr>
                    <tr>
						<td class="first style1">Tổng số khách đặt hàng</td>
						<td>
<?php
	$tbl = new table('orders');
	echo $tbl->getTotal();
	
?>                        </td>
					</tr>
                    <tr>
						<td class="first style1">Tổng số thành viên</td>
						<td>
<?php
	$tbl = new table('user');
	echo $tbl->getTotal();
	
?>                        </td>
					</tr>
					<tr class="bg">
						<td class="first style2"><a href="<?php echo loadPage('ip'); ?>">IP truy cập</a></td>
						<td>
<?php
	$tbl = new table('ipaddress');
	echo $tbl->getTotal();
	
?>                        </td>
					</tr>
				</table>
			  </form>
			</div>
		</div>
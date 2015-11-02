<?php


include("library/loader.php");

header("Content-Type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: attachment; filename=products.xls;");
header("Pragma: no-cache");
header("Expires: 0");
 


?> 


<table cellpadding="0" cellspacing="0" border="1">
<tr> 
    <th>Mã sản phẩm</th>
    <th>Tên</th> 
    <th>Giá</th>
</tr>
<?php 
	$tbl = new table('news');
	$res = $tbl->loadAll();
	if ($res) {
			while ($row = mysql_fetch_object($res)) {
?>
<tr> 
    <td><?php echo $row->code; ?></td>
    <td><?php echo $row->title; ?></td>
    <td><font color ="red"><?php echo $row->summary; ?></font></td>
</tr>
<?php
			}
		}
?>
</table>
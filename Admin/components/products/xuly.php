<?php if(!isset($_GET['choose']))
		include('../../library/loader.php'); 
		$catid1 = $_GET['id'];
		$cmd = $_GET['cmd'];
		$tbl_cat2 = new table('category2');
		$res_cat2 = $tbl_cat2->loadOne('catid='.$catid1.' order by ordering');
		if($cmd=='cat2'){
?>
	<select name="catid2" onchange="get1_('components/products/xuly.php',<?=$catid1?>,this.value,'cat3')">	
    	<option value="">---Chọn một---</option>
        <?php while($row_cat2=mysql_fetch_array($res_cat2)){?>
        <option value="<?php echo $row_cat2['id'];?>"><?php echo $row_cat2['name'];?></option>
        <?php }?>
    </select>
<?php } if($cmd=='cat3') {
	$catid2 = $_GET['id1'];
	$tbl_cat3 = new table('category3');
	$res_cat3 = $tbl_cat3->loadOne('catid1='.$catid1.' and catid2 = '.$catid2.' order by ordering');
?>
	<select name="catid3">	
    	<option value="">---Chọn một---</option>
        <?php while($row_cat3=mysql_fetch_array($res_cat3)){?>
        <option value="<?php echo $row_cat3['id'];?>"><?php echo $row_cat3['name'];?></option>
        <?php }?>
    </select>
<?php }?>
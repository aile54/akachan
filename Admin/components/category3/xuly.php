<?php if(!isset($_GET['choose']))
		include('../../library/loader.php'); 
		$catid = $_GET['id'];
		$tbl_cat2 = new table('category2');
		$res_cat2 = $tbl_cat2->loadOne('catid='.$catid.' order by ordering');
?>
	<select name="catid2">	
    	<option value="">---Chọn một---</option>
        <?php while($row_cat2=mysql_fetch_array($res_cat2)){?>
        <option value="<?php echo $row_cat2['id'];?>"><?php echo $row_cat2['name'];?></option>
        <?php }?>
    </select>
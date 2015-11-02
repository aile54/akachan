<?php if(!isset($_GET['choose']))
		include('../../library/loader.php'); 
		
		$tbl = new table('products');
		$str = $_GET['str'];
		$id = $_GET['id'];
		
		$file = '../../../'.$str;
		if(is_file($file)) 
			unlink($file);
		
		$file1= '../../../'.get_thumb('uploads/products/',$str);
		if(is_file($file1)) 
			unlink($file1);
		
		$res_kt = $tbl ->loadOne('id='.$id);
		$row_kt = mysql_fetch_array($res_kt);
		$img_kt = explode('(*_^)',$row_kt['image']);
		if(count($img_kt)==1)
			$image = str_replace($str,'',$row_kt['image']);
		else{
			if($str==$img_kt[count($img_kt)-1])
				$image = str_replace('(*_^)'.$str,'',$row_kt['image']);
			else
				$image = str_replace($str.'(*_^)','',$row_kt['image']);
		}
		
		$field = array('image');
		$values = array(
			format($image,0)
		);
		$res = $tbl->updateObject($field,$values,'id='.$id);
		
		$res = $tbl ->loadOne('id='.$id);
		$row = mysql_fetch_array($res);
		$img = explode('(*_^)',$row['image']);
		if($row['image']!=''){
		for($i=0;$i<count($img);$i++){
?>
      <div style="margin-bottom:5px">
      <input name="image<?=$i?>" type="file"/> <span onclick="del_img('components/products/del_img.php',<?=$row['id'];?>,'<?=$img[$i];?>')"><img src="img/bt_del1.png" width="20" align="absmiddle"/></span>
        <input type="hidden" name="tmpimage<?=$i?>" class="text" value="<?php echo $img[$i]; ?>"  />      <img src="../<?php echo $img[$i]; ?>" width="50" align="top" />            
      </div> 
<? }}?>
<input type="hidden" name="tmpnum" value="<? if($row['image']=='') echo 0; else echo count($img)?>" />
<div>
<input type="text" name="num_img" onkeyup="get_img('components/products/ajax.php',this.value,<? if($row['image']=='') echo 0 ; else echo count($img)?>)"/> (Nhập số hình mà bạn muốn thêm vào) </div>
<div id="img"></div>
<?php 
	$num1 = $_GET['num1'];
	$num2 = $_GET['num2'];
	$total = $num1+$num2;
	if(is_numeric($num1)){
	for($i=$num2;$i<$total;$i++){
?>
	<div><input type="file" name="image<?php echo $i?>" />
    	<input type="hidden" name="tmpimage<?php echo $i?>" value=""/>
    </div>
<?php }} else echo'Vui lòng nhập số!!!'?>


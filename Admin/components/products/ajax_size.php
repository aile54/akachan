<div style="padding-top:5px">
<?php 
	$num1 = $_GET['num1'];
	$num2 = $_GET['num2'];
	$total = $num1+$num2;
	if(is_numeric($num1)){
		$dem=0;
	for($i=$num2;$i<$total;$i++){
		$dem++;
?>
	<div><? if($dem!=1){?><div style="float:left; line-height:25px;margin-right:5px; margin-left:5px">-</div><? }?><input type="text" name="size<?=$i?>" style="float:left; width:60px;"/>
    	<input type="hidden" name="tmpsize<?=$i?>" value=""/>
    </div>
<? }} else echo'Vui lòng nhập số!!!'?>
</div>

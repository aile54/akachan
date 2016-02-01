<?php 
function createCapchar()
{
	$getidkt=mt_rand(1,30);
	$sql_makt="select * from hinhkt where idHinh=".$getidkt;#idHinh, maXacnhan, UrlHinh
	$result_makt=mysql_query($sql_makt);
	$row_makt = mysql_fetch_assoc($result_makt);
	
	$_SESSION['imagegt']=$row_makt['maXacnhan'];
	echo "<span id='hinhkiemtra'><img src='images/hinhkt/".$row_makt['UrlHinh']."' height='25' /></span>&nbsp;&nbsp;<img src=\"images/refresh.png\" width=\"15\" onclick=\"reloadhinhkiemtra();\" />";
	
}
function fewchars($s, $lenght) 
			{
			  if ($s=='' || $s==NULL) return $s;
			if (is_array($s)) return $s;
			$s = strip_tags(trim($s));
				if(strlen($s) >= $lenght  && ($espacio = strpos($s, " ", $lenght ))) {
			$s = substr($s, 0, $espacio).'...';
				}
			return $s;
			}
//HAM NAY LOAI BO CAC LENH INJECTION
function killInjection($str){
	$bad = array("'","\\","=",":");
	$good = str_replace($bad,"", $str);
	return $good;
}
function currency($str){

	$s="";

	for($i = 1; $i<=strlen($str); $i++){

		if($i%3==0&&$i<strlen($str))

			$s = ".".$str[strlen($str)-$i].$s;

		else

			$s = $str[strlen($str)-$i].$s;

	}

		return $s;

}
function online()
{
$tg=time();
$tgout=900;
$tgnew=$tg - $tgout;

mysql_query("insert into online(tgtmp,ip,local) values('$tg','$_SERVER[REMOTE_ADDR]','$_SERVER[PHP_SELF]')");

mysql_query("delete from online where tgtmp < $tgnew ");

$on=mysql_query("SELECT DISTINCT ip FROM online WHERE local='$_SERVER[PHP_SELF]'");
return mysql_num_rows($on);

}
/*function counter()
{
$count=mysql_query("select * from counter");
$row=mysql_fetch_array($count);
$count=$row["count"];
if(!isset($_SESSION["count"])){  //chỉ tăng biến count nếu chưa có hoặc cookie quá hạn
  	$count+=1;
	session_start();
$_SESSION["count"]=1;
	
	mysql_query("update counter set count=count+1");	
}
return $count;
}*/

function curPageURL() {

	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; 
	}
	return $pageURL;
}
function checklink($str){
	for($i=0;$i<=strlen($str);$i++){
		if ($str[$i] == '?')
			return '&';
	}
	return '?';
}

function url($str){
		if (substr($str,7,4) == "www."){
			$len = strlen($str) - 29;
			echo substr($str,29,$len);
		}
		else{
				$len = strlen($str) - 25;
				echo substr($str,25,$len);
		}

	return $str;
}
function format_price($lang,$price){
	if($lang==0){
		if($price==0)
			$price_format = 'Liên hệ';
		else
			$price_format = number_format($price).' VNĐ';
	}
	else{
		if($price==0)
			$price_format = 'Call';
		else
			$price_format = $price.' USD';
	}
	return $price_format;
}
function convert($str) 
{
	$str = trim($str);
	$chars = array(
          ''  =>  array('"','\'','  ',' -','- ',':','?','~','!','@','#','$','%','*',';',',','.','&'),
        '-' =>  array(' ','  ','#','@','!','#','-','/'),
		'a'	=>	array('ấ','ầ','ẩ','ẫ','ậ','Ấ','Ầ','Ẩ','Ẫ','Ậ','ắ','ằ','ẳ','ẵ','ặ','Ắ','Ằ','Ẳ','Ẵ','Ặ','á','à','ả','ã','ạ','â','ă','Á','À','Ả','Ã','Ạ','Â','Ă','A'),
		'e' =>	array('ế','ề','ể','ễ','ệ','Ế','Ề','Ể','Ễ','Ệ','é','è','ẻ','ẽ','ẹ','ê','É','È','Ẻ','Ẽ','Ẹ','Ê','E'),
		'i'	=>	array('í','ì','ỉ','ĩ','ị','Í','Ì','Ỉ','Ĩ','Ị','I'),
		'o'	=>	array('ố','ồ','ổ','ỗ','ộ','Ố','Ồ','Ổ','Ô','Ộ','ớ','ờ','ở','ỡ','ợ','Ớ','Ờ','Ở','Ỡ','Ợ','ó','ò','ỏ','õ','ọ','ô','ơ','Ó','Ò','Ỏ','Õ','Ọ','Ô','Ơ','O'),
		'u'	=>	array('U','ứ','ừ','ử','ữ','ự','Ứ','Ừ','Ử','Ữ','Ự','ú','ù','ủ','ũ','ụ','ư','Ú','Ù','Ủ','Ũ','Ụ','Ư'),
		'y'	=>	array('ý','ỳ','ỷ','ỹ','ỵ','Ý','Ỳ','Ỷ','Ỹ','Ỵ','Y'),
		'd'	=>	array('đ','Đ','D'),
		'b'=>array('B'),
		'c'=>array('C'),
		'f'=>array('F'),
		'g'=>array('G'),
		'h'=>array('H'),
		'j'=>array('J'),
		'k'=>array('K'),
		'l'=>array('L'),
		'm'=>array('M'),
		'n'=>array('N'),
		'p'=>array('P'),
		'q'=>array('Q'),
		'r'=>array('R'),
		's'=>array('S'),
		't'=>array('T'),
		'v'=>array('V'),
		'x'=>array('X'),
		'z'=>array('Z'),
		'w'=>array('W'),
 	);
	
	foreach ($chars as $key => $arr) 
		foreach ($arr as $val)
			$str = str_replace($val,$key,$str);
	return $str;
}
function permission($gid,$boxid){

	$tbl_per = new table('permission');
	$res_per = $tbl_per ->loadOne('gid='.$gid.' and boxid='.$boxid);
	$num_per = mysql_num_rows($res_per);
	return $num_per;
}
function per_cmd($gid,$boxid,$cmd)
{
	$tbl_per = new table('permission');
	$res_per = $tbl_per ->loadOne('gid='.$gid.' and boxid='.$boxid.' and '.$cmd.'=1');
	$num_per = mysql_num_rows($res_per);
	return $num_per;
}
function del_file($tbl_name,$field_name,$id){

	$tbl_ = new table($tbl_name); 
	$res_ = $tbl_ ->loadOne('id='.$id);
	$row_ = mysql_fetch_object($res_);
					
	$file = '../'.$row_->$field_name;
	
	if(is_file($file)) 
		unlink($file);
}
function edit_img($root,$dir,$tbl_name,$img_name,$tmp_img,$id,$w,$h){

	$filea = $_FILES[$img_name]["name"];
	if($filea=='')
		$image = $tmp_img;
	else{
		$tbl_ = new table($tbl_name); 
		$res_ = $tbl_ ->loadOne('id='.$id);
		$row_ = mysql_fetch_object($res_);
						
		$file = $root.$row_->$img_name;
		
		if(is_file($file)) 
			unlink($file);
			
		$file1=$root.get_thumb($dir,$row_->$img_name);
		if(is_file($file1)) 
			unlink($file1);
		
		$image = str_replace('../','',upload_img($img_name,$root.$dir,$w,$h));
	}
	return $image;
}
function del_img_array($dir,$tbl_name,$field_name,$del){
	foreach($del as $val){
						
		//echo $val;
		$tbl_ = new table($tbl_name); 
		$res_ = $tbl_ ->loadOne('id='.$val);
		$row_ = mysql_fetch_object($res_);
						
		$file1 = '../'.$row_->$field_name;
		
		if(is_file($file1)) 
			unlink($file1);
		
		$file1='../'.get_thumb($dir,$row_->$field_name);
		if(is_file($file1)) 
			unlink($file1);
		
		$str = "delete from ".$tbl_name." where id='$val'";
			mysql_query($str);
	}
}
function del_file_array($tbl_name,$field_name,$del){
	foreach($del as $val){
						
		//echo $val;
		$tbl_ = new table($tbl_name); 
		$res_ = $tbl_ ->loadOne('id='.$val);
		$row_ = mysql_fetch_object($res_);
						
		$file1 = '../'.$row_->$field_name;
		
		if(is_file($file1)) 
			unlink($file1);
		
		$str = "delete from ".$tbl_name." where id='$val'";
			mysql_query($str);
	}
}
function getid($tbl_name,$alias,$catid1=0,$catid2=0){
	$tbl = new table($tbl_name);
	$dk='';
	if($catid1!=0)
		$dk=' and catid='.$catid1;
	if($catid2!=0)
		$dk=' and catid1='.$catid1.' and catid2='.$catid2;
	$res = $tbl->loadOne('alias="'.$alias.'"'.$dk.' limit 1');
	if(mysql_num_rows($res)==0)
		echo "<script>self.location='index.html'</script>";
	else{
		$row = mysql_fetch_object($res);
		return $row->id;
	}
}
//Mã hóa
function hexID($id, $ID=321277085)
{
	$id_encode=dechex($ID + $id);
	return strtoupper($id_encode);
}
//Gải mã
function decID($id, $ID=321277085)
{
	$id_decode=hexdec($id)-$ID;
	return $id_decode;
}

function rand_name($name,$id){
	
	$str=hexID($id);
	return convert(trim($name)).'-'.$str;
}
function get_thumb($dir,$image){
	return str_replace($dir,$dir.'thumbs/thumb_',$image);
}
/*function format_price($price){
	$price_format = str_replace(',','.',number_format($price));
	return $price_format;
}*/
function test_isset1($table_name,$field_name,$name,$id=0){
	if($id==0)
		$dk='';
	else
		$dk = ' and id <>'.$id;
	$tbl = new table($table_name);
	$res = $tbl -> loadOne($field_name.'="'.convert($name).'"'.$dk);
	$num = mysql_num_rows($res);
	return $num;
}
function test_isset2($table_name,$field_name,$catid,$name,$id=0){
	if($id==0)
		$dk='';
	else
		$dk = ' and id <>'.$id;
	$tbl = new table($table_name);
	$res = $tbl -> loadOne('catid='.$catid.' and '.$field_name.'="'.convert($name).'"'.$dk);
	$num = mysql_num_rows($res);
	return $num;
}
function test_isset3($table_name,$field_name,$catid1,$catid2,$name,$id=0){
	if($id==0)
		$dk='';
	else
		$dk = ' and id <>'.$id;
	$tbl = new table($table_name);
	$res = $tbl -> loadOne('catid1='.$catid1.' and catid2='.$catid2.' and '.$field_name.'="'.convert($name).'"'.$dk);
	$num = mysql_num_rows($res);
	return $num;
}
function add_multi_img($dir,$num_img,$img_name,$w,$h){
	
	if(!is_numeric($num_img) || $num_img==0)
		$image='';
	else{
		for($i=0;$i<$num_img;$i++){
			$cuoi = '';
			if($i!=($num_img-1))
				$cuoi='(*_^)';
			$filename = $_FILES[$img_name.$i]['name'];
			if($filename!=''){
				@$image .= str_replace('../','',upload_img($img_name.$i,$dir,$w,$h)).$cuoi;
			}
		}
	}
	$img = '';
	$tam = explode('(*_^)',$image);
	if($tam[count($tam)-1]==''){
		for($i=0;$i<count($tam)-1;$i++){
			$cuoi = '';
			if($i!=(count($tam)-2))
				$cuoi='(*_^)';
			$img .=$tam[$i].$cuoi;
	}}else
		$img = $image;
	
	return $img;
}
function edit_multi_img($root,$dir,$num_img,$tmp_num,$img_name,$tmpimg_name,$w,$h){
	if(!is_numeric($num_img) || $num_img==0){
		for($i=0;$i<$tmp_num;$i++){
			$cuoi = '';
			if($i!=($tmp_num-1))
				$cuoi='(*_^)';
			$filename = $_FILES[$img_name.$i]['name'];
			if($filename!=''){
				$file = $root.$_POST[$tmpimg_name.$i];
				if(is_file($file)) 
					unlink($file);
					
				$file1=$root.get_thumb($dir,$_POST[$tmpimg_name.$i]);
				if(is_file($file1)) 
					unlink($file1);
						
				$image .= str_replace('../','',upload_img($img_name.$i,$root.$dir,$w,$h)).$cuoi;
			}else
				$image .= $_POST[$tmpimg_name.$i].$cuoi;
			
		}
	}else{
		for($i=0;$i<$tmp_num+$num_img;$i++){
			$cuoi = '';
			if($i!=($tmp_num+$num_img-1))
				$cuoi='(*_^)';
			$filename = $_FILES[$img_name.$i]['name'];
			if($filename!=''){
				$file = $root.$_POST[$tmpimg_name.$i];
				if(is_file($file)) 
					unlink($file);
					
				$file1=$root.get_thumb($dir,$_POST[$tmpimg_name.$i]);
				if(is_file($file1)) 
					unlink($file1);
					
				$image .= str_replace('../','',upload_img($img_name.$i,$root.$dir,$w,$h)).$cuoi;
			}else
				if($_POST[$tmpimg_name.$i]!='')
					$image .= $_POST[$tmpimg_name.$i].$cuoi;
			
		}
	}
	
	$tam = explode('(*_^)',$image);
	if($tam[count($tam)-1]=='')
		for($i=0;$i<count($tam)-1;$i++){
			$cuoi = '';
			if($i!=(count($tam)-2))
				$cuoi='(*_^)';
			$img .=$tam[$i].$cuoi;
	}else
		$img = $image;
	
	return $img;
}
function del_multi_img($root,$dir,$tbl_name,$field_name,$del){
	foreach($del as $val){
		//echo $val;
		$tbl_ = new table($tbl_name); 
		$res_ = $tbl_ ->loadOne('id='.$val);
		$row_ = mysql_fetch_object($res_);
						
		$tmp = explode('(*_^)',$row_->$field_name);
		for($i=0;$i<count($tmp);$i++){
			
			$file1 = $root.$tmp[$i];
			if(is_file($file1)) 
				unlink($file1);
				
			$file2= $root.get_thumb($dir,$tmp[$i]);
			if(is_file($file2)) 
				unlink($file2);
		}

		$str = "delete from ".$tbl_name." where id='$val'";
			mysql_query($str);
	}
}
?>
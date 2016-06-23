<div class="class" title = "contact" style="display:none"></div>
<script>
$( document ).ready(function() {
	var title = $("div.class").attr("title").toLowerCase();
	var isActive = false;
	if(!isActive)
	{
		$(".sub-nav-inner li.menubar").each(function(){
			var name = $(this).find("a").eq(0).attr("href");
			if(name != undefined && name != '')
			{
				name = name.toLowerCase();
			}
			if((title + ".php") == name && !isActive)
			{
				$(this).addClass("activated");
				isActive = true;
			}
		});
	}
});
</script>
<p>
	<div id="contact_title">Bản đồ đường đi</div>
</p>
<br/>
<?php
     include_once("../Models/ban_do.php");
	 include_once("../Models/send_gmail/send_gmail.php");
	 include_once("../Models/xl_contact.php");
	 
	$to_mail = $result_contact1[0]['email'];
	$to_name = "Akachan";
	
	@$hoten = $_POST['hoten'];
	@$from = $_POST['email'];
	@$add = $_POST['diachi'];
	@$dt = $_POST['dienthoai'];
	@$noidung = $_POST['noidung'];
	@$chude = $_POST['chude'];
	@$ma_ba_mat = $_POST['code'];
	
	@$content = "Họ và tên khách hàng: ".$hoten."<br/>";
	if(isset($_POST['diachi']))
	{
		@$content = "Địa chỉ: ".$add."<br/>";
	}
	@$content .= "Email: ".$from."<br/>";
	@$content .= "Điện thoại: ".$dt."<br/>";
	@$content .= "Nội dung: ".$noidung."<br/>";
	if(isset($_POST['gui'])){
		$m_time2 = microtime();
		if(($m_time2 - $_SESSION['m_time']) < 180000000){
			if($ma_ba_mat == $_SESSION['word']){
				$dir = opendir("../Models/captcha");
				while(($file = readdir($dir)) != false){
					if($file != "." && $file != ".."){
						unlink("../Models/captcha/$file");
					}
				}
				closedir($dir);
				if(isset($_POST['hoten']) && isset($_POST['noidung']) && isset($_POST['email']) || isset($_POST['dienthoai'])){
					//var_dump($to_mail,$to_name,$chude,$content,$hoten);
					$send_mail = send_mail($to_mail,$to_name,$chude,$content,$hoten);
					//var_dump($send_mail);
					if($send_mail)
					{
						$tbl = new table('contact');
						$field = 'name,email,address,tel,content,date';
						$values = format($_POST["hoten"],1);
						$values.= format($_POST["email"],1);
						$values.= format($_POST["diachi"],1);
						$values.= format($_POST["dienthoai"],1);
						$values.= format($_POST["noidung"],1);
						$now=date('Y-m-d');
						$values.= format($now,0);
						$res = $tbl->insertObject($field,$values);
						//var_dump($res);
						if($res ){
							 echo "<script language='javascript'>alert('Cảm ơn bạn đã liên hệ với chúng tôi!');</script>";
						}
						else 
						{
							echo "<script language='javascript'>alert('Xin lỗi! Thông tin của bạn chưa thể gửi vào lúc này!');</script>";
						}
					}
					else
					{
						echo "<script language='javascript'>alert('Xin lỗi! Thông tin của bạn chưa thể gửi vào lúc này!');</script>";
					}
				}
				else{
					$thongbao = "Xin vui lòng nhập đầy đủ thông tin cần thiết!";
				}
			}
			else{
				$thongbao = "Vui lòng nhập lại mã bảo mật!";
			}
		}
		else{
			$thongbao = "Vui lòng nhập lại mã bảo mật!";
			?>
			<script language="javascript" type="text/javascript">
					if(window.XMLHttpRequest){
						xmlhttp = new XMLHttpRequest();
					}
					else{
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					
					xmlhttp.onreadystatechange=function(){
						if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
							document.getElementById("code").innerHTML = "<img src='../Models/captcha/"+xmlhttp.responseText+"'>";
						}
					}
					
					xmlhttp.open("GET","../../Models/captcha_code.php?reset=1",true);
					xmlhttp.send();
			</script>
			<?php
		}
	}
?>
<script language="javascript" type="text/javascript">
	function kiem_tra_gui()
	{
		ten = document.getElementById('username');
		ma_bao_mat = document.getElementById('mbm');
		if(ten.value=='')
		{
			document.getElementById('thong_bao').innerHTML='Vui lòng nhập đầy đủ thông tin cần thiết!';
			return false;
		}
		if(ma_bao_mat.value=='')
		{
			document.getElementById('thong_bao').innerHTML='Vui lòng nhập mã bảo mật!';
			ma_bao_mat.focus();
			return false;
		}
	}
</script>
<script language="javascript" type="text/javascript">
	function reset_captcha()
	{
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}
		else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				document.getElementById("code").innerHTML = "<img src='../Models/captcha/"+xmlhttp.responseText+"'>";
			}
		}
		
		xmlhttp.open("GET","../Models/captcha_code.php?reset=1",true);
		xmlhttp.send();
	}
</script>
<p>
    <div id="contact_title">Liên hệ</div>
</p>
<p>
    <b style="color:#F00" id="thong_bao"></b>
</p>
<p>
    <b style="color:#F00" id="thong_bao"><?php echo @$thongbao;?></b>
</p>
<form method="post" name="contact" action="#">
    <table>
        <tr>
            <td width="80px	">Họ tên<span style="color:#F00">*</span></td>
            <td style="padding:10px 0px 0px 10px">
            	<input type="text" name="hoten" id="username" value="" style="width:200px; padding:0px 10px" />
            </td>
        </tr>
        <tr>
            <td>Email<span style="color:#F00">*</span></td>
            <td style="padding:10px 0px 0px 10px">
            	<input type="text" name="email" style="width:200px; padding:0px 10px" />
            </td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td style="padding:10px 0px 0px 10px">
            	<input type="text" name="diachi" style="width:200px; padding:0px 10px" />
            </td>
        </tr>
        <tr>
            <td>Điện thoại<span style="color:#F00">*</span></td>
            <td style="padding:10px 0px 0px 10px">
            	<input type="text" name="dienthoai" style="width:200px; padding:0px 10px" />
            </td>
        </tr>
        <tr>
            <td>Chủ đề</td>
            <td style="padding:10px 0px 0px 10px">
            	<input type="text" name="chude" style="width:350px; padding:0px 10px" />
            </td>
        </tr>
        <tr>
            <td>Nội dung<span style="color:#F00">*</span></td>
            <td style="padding:10px 0px 0px 10px">
                <textarea name="noidung" rows="8" cols="40" style="width:500px; padding:10px 10px 10px 10px"></textarea>
            </td>
        </tr>
        
        <tr>
            <td colspan="2" style="padding:20px 300px">
                <span id="code" style="padding-left:20px">
                	<img src="../Models/captcha_code.php"/>
                </span>
                <input type="text" name="code" id="mbm" value="" style="width:100px; text-align:center" />
                &nbsp; &nbsp;
                <input type="button" name="reset"  value="Reset" onclick="reset_captcha()"  align="middle"/>
                
            </td>
        </tr>
        
        <tr>
            <td colspan="2" style="padding:10px 340px">
                <input type="submit" name="gui" onclick="return kiem_tra_gui()" value="Gửi"  align="middle"/>
            </td>
        </tr>
    </table>
</form>
<br><br>
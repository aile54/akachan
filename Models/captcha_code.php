<?php
	session_start();
	if(!isset($_GET['reset'])){
		$m_time = microtime();
		$_SESSION['m_time'] = $m_time;
		$ranStr = md5($m_time); //Lấy chuỗi mã hóa md5
		$ranStr = substr($ranStr, 0, 6); //Cắt chuỗi lấy 6 ký tự 
		$_SESSION['word'] = $ranStr; //Lưu giá trị vào sesion
		$newImage = imagecreatefromjpeg('image/bg_captcha.jpg'); //tạo hình nền
		$textColor = imagecolorallocate($newImage, 0, 0, 0); //Thêm màu sắc cho hình
		$font = 'fonts/aristoni.ttf'; // Chọn font chữ
		imagettftext($newImage, 15, 0, 10,20, $textColor, $font, $ranStr);
		header("Content-type: image/jpeg"); //Xuất ra định dạng 
		imagejpeg($newImage, 'captcha/'.time().'.jpg'); //Xuất hình ảnh xuống ổ đĩa
		imagejpeg($newImage);	
	}
	else{
		$m_time = microtime();
		$_SESSION['m_time'] = $m_time;
		$ranStr = md5($m_time);
		$ranStr = substr($ranStr, 0, 6);
		$_SESSION['word'] = $ranStr;
		$time = time();
		$newImage = imagecreatefromjpeg('image/bg_captcha.jpg');
		$textColor = imagecolorallocate($newImage, 0, 0, 0);
		$font = 'fonts/aristoni.ttf';
		imagettftext($newImage, 15, 0, 10,20, $textColor, $font, $ranStr);
		header("Content-type: image/jpeg");
		imagejpeg($newImage, 'captcha/'.$time.'.jpg');
		echo $time.'.jpg';
	}

?>
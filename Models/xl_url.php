<?php
	function xl_url($urll){
		$url = $urll;
		$url_array = explode("/",$url);
		$url_array2 = explode("?",$url_array[2]);
		return $url_array2;
	}
	
	function xl_chuoiurl($chuoiurl){
		$chuoi_url = $chuoiurl;
		$curl = explode("=",$chuoi_url);
		return $curl;
	}

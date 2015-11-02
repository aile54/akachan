<?php
	function uploadFile($file,$auto=1,$dir='uploads/images/'){
// process upload
		//upload logo
		$filename = date("U").$_FILES[$file]["name"];
		$filetype = $_FILES[$file]["type"];
		$fileerror = $_FILES[$file]["error"];
		$tmpname = $_FILES[$file]["tmp_name"];
		$filesize = $_FILES[$file]["size"]; // byte
		$uploaddir = $dir;
		$destination = $uploaddir . $filename;
		
		$start=strlen($filename)-4;
        $duoi=substr($filename,$start,4);
		$duoi = strtolower($duoi);
		// set datetime
		$date = date('dmy-H-i-s');
			// auto rename
			if($auto==0){
				if($duoi=='.swf' || $duoi=='.jpg' || $duoi=='.gif' || $duoi=='.png' || $duoi=='.doc' || $duoi=='.xls' 
				|| $duoi=='.pdf' || $duoi=='.mp3' || $duoi=='.rar' || $duoi=='.zip' || $duoi=='.mp4' || $duoi=='.flv' 
				|| $duoi=='.bmp' || $duoi=='.ico'){
					if(move_uploaded_file($tmpname,$destination)){
						return $destination;
				}
			}
			}else{
			
				if(move_uploaded_file($tmpname,$destination)){
					// rename file
					$x='';
					switch($filetype){
						case 'image/jpeg':
							rename($destination,$uploaddir.$filename.$date.".jpg");
							$x = $destination.$uploaddir.$filename.$date.".jpg";
							break;	
						case 'image/gif':
							rename($destination,$uploaddir.$filename.$date.".gif");
							$x=$destination.$uploaddir.$filename.$date.".gif";
							break;
						case 'image/png':
							rename($destination,$uploaddir.$filename.$date.".png");
							$x=$destination.$uploaddir.$filename.$date.".png";
							break;
						case 'application/msword':
							rename($destination,$uploaddir.$filename.$date.".doc");
							$x=$destination.$uploaddir.$filename.$date.".doc";
							break;
						case 'application/vnd.ms-excel':
							rename($destination,$uploaddir.$filename.$date.".xls");
							$x=$destination.$uploaddir.$filename.$date.".xls";
							break;
						case 'application/pdf':	
							rename($destination,$uploaddir.$filename.$date.".pdf");
							$x=$destination.$uploaddir.$filename.$date.".pdf";
							break;
						case 'application/mp3':	
							rename($destination,$uploaddir.$filename.$date.".mp3");
							$x=$destination.$uploaddir.$filename.$date.".mp3";
							break;
					}
					
					return $x;
					
					
				}
				// end auto rename
			}
			

			// end if filetype
			// return 0


		
/*
	*
	* end function
	*
*/		
	}
?>
<?php

function loadPage($pagename){
	return $_SERVER['PHP_SELF']."?choose=".$pagename;
}

function format($str,$isComma=1){
	
	// 1 as visible comma, 0 as not comma
	// default as 1
	if($isComma==1){
		return "'".$str."',";
	}else return "'".$str."'";
}

function formatCompare($str,$pos=0){
	// between front and background
	if($pos==0){
		return "'%".$str."%'";
	}else if($pos==-1){
		return "'%".$str."'";
	}else if($pos==1){
		return "'".$str."%'";
	}
	
}

// check empty
// 1 = empty
// 0 = string
function isEmpty($str){
	if($str==null || $str==' '){
		return 1;
	}else return 0;
}

// check box is checked
function isCheck($check){
	if($check==1){
		return 1;
	}else return 0;
}

// view tick check box when edit
function loadChecked($check){
		// 1 value =1 checked
		if($check==1){
				echo "value = 1 checked";
			}else echo "value = 1";
	}

function getToday(){
		$date = date('Y-m-d');
		return $date;
	}

// check login
function checkLogin(){
		if(!session_is_registered('admin')){
			session_unregister('admin');
			header('location: login.php');
		}
		else{
			header('location: index.php');
		}
	}

?>
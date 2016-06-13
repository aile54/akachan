<?php		
	function online1()
	{
	$tg=time();
	$tgout=900;
	$tgnew=$tg - $tgout;
	
	mysql_query("insert into online(tgtmp,ip,local) values('$tg','$_SERVER[REMOTE_ADDR]','$_SERVER[PHP_SELF]')");
	
	mysql_query("delete from online where tgtmp < $tgnew ");
	
	$on=mysql_query("SELECT DISTINCT ip FROM online WHERE local='$_SERVER[PHP_SELF]'");
	return mysql_num_rows($on);
	
	}
		function getRealIpAddr()
		{
			if (!empty($_SERVER['HTTP_CLIENT_IP']))  //check ip from share internet
			{
			  $ip=$_SERVER['HTTP_CLIENT_IP'];
			}
			elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   
			//to check ip is pass from proxy
			{
			  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
			}
			else
			{
			  $ip=$_SERVER['REMOTE_ADDR'];
			}
			return $ip;
		}
		
		function getBrowserinfo(){
			$browserInfo=array(	'name'=>'',
								'version'=>'');
			$aBrowser=array('Firefox'=>'','MSIE'=>'','Chrome'=>'','Opera'=>'','Safari'=>'');
			$subject=$_SERVER['HTTP_USER_AGENT'];
			
			foreach($aBrowser as $key => $info)
			{
				$pattern = '#'.$key.'#imsU';
				if(preg_match($pattern, $subject, $matches))
				{
					$browserInfo['name']=$key;
					if($key=='MSIE')
					{
						$pattern_ = '#(?<=MSIE )[0-9.]+#';
						preg_match($pattern_, $subject, $matche);
						$browserInfo['version']=$matche[0];
					}
					else{
						$pattern_ = '#(?<='.$key.'/)[0-9.]+#';
						preg_match($pattern_, $subject, $matche);
						$browserInfo['version']=$matche[0];						
					}
					return $browserInfo; //array
				}
			}
			return null;
		}
	
		function getCountofWeek($day){
			$date['first'] = mktime(0,0,0,date("m"),date("d",$day)-date("w",$day),date("Y"));
			$date['last'] = mktime(0,0,0,date("m"),date("d",$day)+(6-date("w",$day)),date("Y"));
			return $date;
		}
		
if(substr_count($_SERVER['HTTP_USER_AGENT'],"Googlebot")==0)
{	
		if(!isset($_SESSION['counter']))
		{
			
			$sql="insert into counter values('','".getRealIpAddr()."',now(),'".$_SERVER['HTTP_USER_AGENT']."')";
			$result=mysql_query($sql);
			if($result)
			{
			
				$sql="select count(*) as allcounter from counter";
				$result=mysql_query($sql);
				$row=mysql_fetch_array($result);
				$_SESSION['counter']['allcounter']=$row['allcounter'];
				
				$sql="select count(*) as today from counter where DATE(timelogin) = CURDATE()";
				$result=mysql_query($sql);
				$row=mysql_fetch_array($result);
				$_SESSION['counter']['today']=$row['today'];
				
				$yesterday = mktime(0,0,0,date("m"),date("d")-1,date("Y"));
				$sql="select count(*) as yesterday from counter where date(timelogin) like '%".date('Y-m-d',$yesterday)."%'";
				$result=mysql_query($sql);
				$row=mysql_fetch_array($result);
				$_SESSION['counter']['yesterday']=$row['yesterday'];
				
				$dow=getCountofWeek(mktime(0,0,0,date("m"),date("d"),date("Y")));
				$sql="select count(*) as thisweek from counter where date(timelogin)>='".date('Y-m-d',$dow['first'])."' and date(timelogin)<='".date('Y-m-d',$dow['last'])."'";
				$result=mysql_query($sql);
				$row=mysql_fetch_array($result);
				$_SESSION['counter']['thisweek']=$row['thisweek'];	
				
				$dow=getCountofWeek(mktime(0,0,0,date("m"),date("d")-7,date("Y")));
				$sql="select count(*) as lastweek from counter where date(timelogin)>='".date('Y-m-d',$dow['first'])."' and date(timelogin)<='".date('Y-m-d',$dow['last'])."'";
				$result=mysql_query($sql);
				$row=mysql_fetch_array($result);
				$_SESSION['counter']['lastweek']=$row['lastweek'];				
				
				$sql="select count(*) as thismonth from counter where month(timelogin)=".date('m')." and year(timelogin) =".date('Y');
				$result=mysql_query($sql);
				$row=mysql_fetch_array($result);
				$_SESSION['counter']['thismonth']=$row['thismonth'];
				
				$lastmonth = mktime(0,0,0,date("m")-1,date("d"),date("Y"));
				$sql="select count(*) as lastmonth from counter where month(timelogin)=".date('m',$lastmonth)." and year(timelogin) =".date('Y');
				$result=mysql_query($sql);
				$row=mysql_fetch_array($result);
				$_SESSION['counter']['lastmonth']=$row['lastmonth'];
				//$_SESSION['counter']['ipadd']=getRealIpAddr();
				//$bw=getBrowserinfo();
				//$_SESSION['counter']['browser']=$bw['name'].' version:' .$bw['version'];
				
				
				
				$tbl_set = new table('setting');
				$res_set = $tbl_set->loadOne('id=1');
				$row_set = mysql_fetch_object($res_set);
				//echo"
//				<div>Online: <span style='color:#b10000'>".($row_set->online+online())."</span></div>
//				<div>Total: <span style='color:#b10000'>".($row_set->visitall+$_SESSION['counter']['allcounter'])."</span></div>				";
			}
			else
			{
				echo "loi insert";
			}
		}
		else
		{
			//All
			$sql="select count(*) as allcounter from counter";
			$result=mysql_query($sql);
			$row=mysql_fetch_array($result);
			$_SESSION['counter']['allcounter']=$row['allcounter'];
			$all = $row['allcounter'];
			
			//Today
			$sql="select count(*) as today from counter where DATE(timelogin) = CURDATE()";
			$result=mysql_query($sql);
			$row=mysql_fetch_array($result);
			$_SESSION['counter']['today']=$row['today'];
			$today = $row['today'];
			
			//yesterday
			$yesterday = mktime(0,0,0,date("m"),date("d")-1,date("Y"));
			$sql="select count(*) as yesterday from counter where date(timelogin) like '%".date('Y-m-d',$yesterday)."%'";
			$result=mysql_query($sql);
			$row=mysql_fetch_array($result);
			$_SESSION['counter']['yesterday']=$row['yesterday'];
			
			
			//this week
			$dow=getCountofWeek(mktime(0,0,0,date("m"),date("d"),date("Y")));
			$sql="select count(*) as thisweek from counter where date(timelogin)>='".date('Y-m-d',$dow['first'])."' and date(timelogin)<='".date('Y-m-d',$dow['last'])."'";
			$result=mysql_query($sql);
			$row=mysql_fetch_array($result);
			$_SESSION['counter']['thisweek']=$row['thisweek'];	
			$thisweek =	$row['thisweek'];		
			
			//last week
			$dow=getCountofWeek(mktime(0,0,0,date("m"),date("d")-7,date("Y")));
			$sql="select count(*) as lastweek from counter where date(timelogin)>='".date('Y-m-d',$dow['first'])."' and date(timelogin)<='".date('Y-m-d',$dow['last'])."'";
			$result=mysql_query($sql);
			$row=mysql_fetch_array($result);
			$_SESSION['counter']['lastweek']=$row['lastweek'];				
			
			//month
			$sql="select count(*) as thismonth from counter where month(timelogin)=".date('m')." and year(timelogin) =".date('Y');
			$result=mysql_query($sql);
			$row=mysql_fetch_array($result);
			$_SESSION['counter']['thismonth']=$row['thismonth'];
			$thismonth = $row['thismonth'];
			
			//last month
			$lastmonth = mktime(0,0,0,date("m")-1,date("d"),date("Y"));
			$sql="select count(*) as lastmonth from counter where month(timelogin)=".date('m',$lastmonth)." and year(timelogin) =".date('Y');
			$result=mysql_query($sql);
			$row=mysql_fetch_array($result);
			$_SESSION['counter']['lastmonth']=$row['lastmonth'];

			$tbl_set = new table('setting');
			$res_set = $tbl_set->loadOne('id=1');
			$row_set = mysql_fetch_object($res_set);
			//echo"
//				<div>Online: <span style='color:#b10000'>".($row_set->online+online())."</span></div>
//				<div>Total: <span style='color:#b10000'>".($row_set->visitall+$_SESSION['counter']['allcounter'])."</span></div>				";
		}
}
?>
<?php
/*
	author : Nguyen Luc Si
	email: taddynguyen@gmail.com
	
	database:
	create table `useronline`(
		`session` char(100),
		`time` int(11),
	primary key (`session`)
	);

*/
	class useronline{
			var $_session;
			var $_time ;
			var $_count=0;
			
			/*
				initialize
				time check default 600 -> 10 miniture
				time check is second
			*/ 
			function useronline($sess,$check=600){
					$this->_session = $sess;
					
					$time = time();
					$timecheck = $time - $check;
					
					
					// check session exist on database
					$str = "select * from useronline where session='$this->_session'";
					$res = mysql_query($str);
					$count = mysql_num_rows($res);
					
					// if not exist => Add new record
					if($count == 0){
							$str = "insert into useronline(session,time) values('$this->_session',$time)";
							mysql_query($str);
						}else{
								// if exist -> update time
								$str = "update useronline(time) set time = $time where session='$this->_session'";
								mysql_query($str);
							}
					
					// set count
					$str = "select * from useronline";
					$res = mysql_query($str);
					$this->_count = mysql_num_rows($res);
					
					// Delete session, if over timecheck
					$str = "delete from useronline where time < $timecheck";
					mysql_query($str);
					
				}
				
				function getCount(){
						return $this->_count;
					}
					
		// end useronline		
		}
		
/*
	*******************************************
	count Total User online
	*******************************************
*/
	class totalOnline{
			var $path = "";
			var $result = 0;
			
			function totalOnline($filePath="counter.txt"){
					$this->path = $filePath;
					$connect = fopen($this->path,"r");
					
					$count = fread($connect,filesize($this->path));
					echo $count;
					
					fclose($connect);
					$count ++;
					$connect = fopen($this->path,"w");
					fwrite($connect,$count);
					fclose($connect);
					
				}
			
		
		}
		
		
?>
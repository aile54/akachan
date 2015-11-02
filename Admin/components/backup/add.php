
<?php
		$tbl = new table('backup');
if($_POST["done"]){
	
		// get value
		$name = $_POST["name"];
		$date = $_POST["date"];
		
		/* 
			*
			* backup file
			*
		*/
		$output = 'uploads/backup/'.$name.'-'.$date.'.sql';
		
		$structure_only = false;
		
		// mysql_backup($host,$db,$user,$pass,$output,$structure_only)
		$backup = new mysql_backup($db_host,$db_name,$db_user,$db_pass,$output,$structure_only);	

		$backup->backup();
		
		// ---------------- end backup ------------------------------------
		
		// field
		$field = 'id,name,date,file';
		
		// format($str,$isComma=1)
		// values
		$values = format($tbl->getLastId()+1,1);
		$values.= format($_POST["name"],1);
		$values.= format($_POST["date"],1);
		$values.= format($output,0);
		
		// insertObject($field,$value)
		$res = $tbl->insertObject($field,$values);
		if($res){
				header('location: '.loadPage('backup'));
			}
		
	}


?>

<div id="center-column">
			<div class="top-bar">
			  <h1>Backup</h1>
				<div class="breadcrumbs"><a href="#">Content</a> / <a href="#">Thêm</a></div>
			</div><br />		  
			<div class="table">
				<img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post" enctype="multipart/form-data">
				<table class="listing form" cellpadding="0" cellspacing="0">
					<tr>
						<th class="full" colspan="3">NỘI DUNG</th>
					</tr>
					<tr>
						<td class="first" width="96"><strong>Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
						<td width="536" colspan="2" class="last">#<?php echo $tbl->getLastId()+1; ?></td>
					</tr>
					<tr>
						<td class="first"><strong>Name</strong></td>
						<td colspan="2" class="last"><input name="name" type="text" class="text" id="name" value="backupfile" /></td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Date</strong></td>
						<td colspan="2" class="last"><input type="text" class="text" value="<?php echo getToday(); ?>" name="date" /><img style="cursor:pointer;" src="js/calendar/images/calendar.gif" onClick="displayCalendar(document.forms[0].date,'yyyy-mm-dd',this)" ></td>
					</tr>
					<tr class="bg">
					  <td class="first">&nbsp;</td>
					  <td colspan="2" class="last"><label>
					    <input type="submit" name="done" value="Submit" id="done" />
					  </label></td>
				  </tr>
				</table>
				</form>
	        <p>&nbsp;</p>
		  </div>
		</div>
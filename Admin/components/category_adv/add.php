<script language="javascript" type="text/javascript">
	function kiem_tra_gui()
	{
		ten = document.getElementById('name');
		if(ten.value=='')
		{
			document.getElementById('thong_bao').innerHTML='Vui lòng nhập tên!';
			ten.focus();
			return false;
		}
	}
</script>
<?php
	$tbl = new table('category_adv');
	
	/*
		*
		* add to categoryadvertise
		*
	*/
	
	if(isset($_POST["done"])){
			// get field
			$field = "id,name,ordering,lang";
			//$field = "id,name,ordering";
			
			// format($str,$isComma=1)
			// isCheck($check)
			$values = format($tbl->getLastId()+1,1);
			$values.= format($_POST["name"],1);
			$values.= format($_POST["ordering"],1);
			@$values.= format($lang,0);
			
			// submit
			// insertObject($field,$value)
			$res = $tbl->insertObject($field,$values);
			if($res){
					echo "OK";
				}
		}	
	
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>category advertise</h1>
				<div class="breadcrumbs"><a href="#">Content</a> / <a href="#">Thêm</a></div>
			</div><br />
 
		  
		  	<p>
            	<b style="color:#F00" id="thong_bao"><?php echo @$thongbao;?></b>
        	</p>
			<div class="table">
				<img src="../Copy of categoryadvertise/img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="../Copy of categoryadvertise/img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post">
				<table class="listing form" cellpadding="0" cellspacing="0">
					<tr>
						<th class="full" colspan="2">NỘI DUNG</th>
					</tr>
					<tr>
						<td class="first" width="75"><strong>Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
						<td width="536" class="last">#<?php echo $tbl->getLastId()+1; ?></td>
					</tr>

					<tr class="bg">
						<td class="first"><strong>Name (*)</strong></td>
						<td class="last"><input name="name" type="text" class="text" id="name" value=""/></td>
					</tr>
					<!--<tr>
					  <td class="first"><strong>Section</strong></td>
					  <td class="last"><input name="section" type="text" class="text" id="section" /></td>
				  </tr>-->
					<tr>
						<td class="first" width="75"><strong>Ordering</strong></td>
						<td class="last"><input name="ordering" type="text" class="text" id="ordering" value="<?php echo $tbl->getLastOrdering()+1; ?>" /></td>
					</tr>
					<tr class="bg">
					  <td class="first">&nbsp;</td>
					  <td class="last"><label>
					    <input type="submit" name="done" value="done" id="done" onclick="return kiem_tra_gui();"/>
					  </label></td>
				  </tr>
				</table>
			  </form>
	        <p>&nbsp;</p>
		  </div>
		</div>
<?php
	$tbl = new table('advertise');
	
	if(isset($_POST["update"])){
			// remove
			if(isset($_POST["del"])){
					$del = $_POST["del"];
					
					del_file_array('advertise','image',$del);
				}
				
			// update
			if(isset($_POST["published"])){
					$published = $_POST["published"];
					$start = $_POST["start"];
					$limit = $_POST["limit"];
					
					// updateCheck($arrId,$field,$start=0,$limit=100,$value=1,$where='id',$order='order by id desc')
					$tbl->updateCheck($published,'published',$start,$limit);
				}
		}
?>
<div id="center-column">
			<div class="top-bar">
				<a href="<?php echo loadPage('addAdvertise'); ?>" class="button"><img src="img/add-folder-icon.png" width="30" height="30" border="0" />  </a>
				<h1>Advertise</h1>
				<div class="breadcrumbs"><a href="#">Homepage</a> / <a href="#">Advertise</a></div>
			</div><br />
			<form method="post">
		  <div class="select-bar">
		    <label>
		    <input type="text" name="key" id="key" />
		    </label>
		    <label>
			<input type="submit" name="search" value="Search" id="search" />
			</label>
		  </div>
		  	</form>
		  
		  
		  
			<div class="table">
				<img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post">
				<table class="listing" cellpadding="0" cellspacing="0">
					<tr>
						<th class="first">Tên </th>
                        <th>Hình ảnh</th>
                        <th>Danh mục</th>
						<th class="last">Xóa</th>
					</tr>
<?php
	
	$pagename = $_SERVER["PHP_SELF"]."?choose=advertise";
	$limit = 20;
	if(isset($_GET["start"])){
			$start = $_GET["start"];
		}
	if(!isset($start)) $start=0;
	$nume = 0;
	
	
	// search
	if(isset($_POST["search"])){
			// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc')
			$res = $tbl->loadPaging($start,$nume,$limit,'where name like'.formatCompare($_POST["key"],0));
		}else{
				// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc')
				$res = $tbl->loadPaging($start,$nume,$limit);
			}
		/*$sql=("select * from advertise where lang = ".$a." ");
		$res=mysql_query($sql);*/
		if($res){
			while($row=mysql_fetch_array($res)){
?>
                    <tr>
						<td class="first style1">
                        	<a href="<?php echo loadPage('editAdvertise&id='.$row['id']); ?>"><?php echo $row['name']; ?></a>
                        </td>
                        <td>
                            <a href="<?php echo loadPage('editAdvertise&id='.$row['id']); ?>">
                                <div>
                                    <?php $start1=strlen($row['image'])-3;
                                        if(substr($row['image'],$start1,3)=='swf'){
                                    ?>
                                        <embed wmode="transparent" src="../<?php echo $row['image']?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" height="50"></embed>
                                    <?php }else {?>
                                    <img border="0" alt="" src="../<?php echo $row['image'];?>" height="50"/>
                                    <?php }?>
                                </div>
                            </a>
                        </td>
						<td>
                        	<?php
							if($row['catid']!=''){
								$tbl_cat = new table('category_adv');
								$res_cat = $tbl_cat ->loadOne('id='.$row['catid']);
								$row_cat = mysql_fetch_array($res_cat);
								echo $row_cat['name'];
							}
							?>
                        </td>
						<td align="center" class="last">
                        	<input type="checkbox" name="del[]" value="<?php echo $row['id']; ?>" id="del[]" />
                        </td>
					</tr>
<?php
				}
			}
?>
					<tr class="bg">
					  <td colspan="5" class="first style2">
<?php
// loadPageTable($pagename,& $start,$limit,$nume)
	loadPageTable($pagename,$start,$limit,$nume);
?>
					  </td>
				  </tr>
					<tr class="bg">
					  <td colspan="5" class="first style2"><label>
					    <input name="update" type="submit" id="update" value="Update" />
                        <input type="hidden" name="start" value="<?php echo $start; ?>"  />
                        <input type="hidden" name="limit" value="<?php echo $limit; ?>"  />
					  </label></td>
				  </tr>
				</table>
			  </form>
			</div>
		</div>

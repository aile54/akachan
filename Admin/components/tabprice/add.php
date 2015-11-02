<script language="javascript" type="text/javascript">
	function kiem_tra_gui()
	{
		//size = document.getElementById('size');
		price = document.getElementById('price');
		/*if(size.value=='')
		{
			document.getElementById('thong_bao').innerHTML='Vui lòng nhập khích thước!';
			size.focus();
			return false;
		}else */
		if(price.value=='')
		{
			document.getElementById('thong_bao').innerHTML='Vui lòng nhập giá!';
			price.focus();
			return false;
		}
	}
	
	function numbersonly(myfield, e, dec)
	{
		var key;
		var keychar;
		
		if (window.event)
		   key = window.event.keyCode;
		else if (e)
		   key = e.which;
		else
			//alert(key);
		   return true;
		keychar = String.fromCharCode(key);
		//alert(keychar);
//		alert(key);
		// control keys
		if ((key==null) || (key==0) || (key==8) || 
			(key==9) || (key==13) || (key==27) )
			//alert(key);
		   return true;
		
		// numbers
		else if ((("0123456789").indexOf(keychar) > -1))
		   return true;
		
		// decimal point jump
		else if (dec && (keychar == "."))
		   {
		   myfield.form.elements[dec].focus();
		   return false;
		   }
		else
		   return false;
	}
</script>
<?php 
	$tbl = new table('tabprice');
	
	if(isset($_POST["done"])){
	
			// get field
			$field = 'id,proid,price,price_promo,size';
			
			// upload file
			//$image = uploadFile('image',0,'../uploads/');
			
			// get values
			$now = mktime(0,0,0,date('m'),date('d'),date('Y'));
			
			$id = $tbl->getLastId()+1;
			$values = format($id,1);
			$values.= format($_POST["proid"],1);
			$values.= format($_POST["price"] == ''?'0':$_POST["price"],1);
			$values.= format($_POST["price_promo"] == ''?'0':$_POST["price_promo"],1);
			$values.= format($_POST["size"] == ''?'0':$_POST["size"],0);
			
			// insertObject($field,$value)
			$res = $tbl->insertObject($field,$values);
			if($res){
					$thongbao = "OK";
					//var_dump($res);
			}
		}
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Kích thước &amp; Giá</h1>
			  <div class="breadcrumbs"><a href="#">Thêm</a></div>
			</div><br />
 			<p>
            	<b style="color:#F00" id="thong_bao"><?php echo @$thongbao;?></b>
        	</p>
			<div class="table">
				<img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post" enctype="multipart/form-data">
				<table class="listing form" cellpadding="0" cellspacing="0">
					<tr>
						<th class="full" colspan="4">NỘI DUNG</th>
					</tr>
					<tr>
						<td class="first" width="135"><strong>Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
						<td width="521" colspan="3" class="last">#<?php echo $tbl->getLastId()+1; ?></td>
					</tr>
                    <tr>
						<td class="first" width="135"><strong>ID sản phẩm</strong></td>
						<td colspan="3" class="last">
                        	<input name="proid" type="text" style="width:300px" value="<?php 
																							if(isset($_GET['id'])) 
																								echo $_GET['id'];
																							else if(isset($_GET['proid']))
																								echo $_GET['proid'];
																						?>"/> 
                        </td>
					</tr>
                    <tr>
						<td class="first" width="135"><strong>Kích thước</strong></td>
						<td colspan="3" class="last"><input name="size" type="text" id="size" style="width:300px" value=""/> </td>
					</tr>
                    <tr>
						<td class="first" width="135"><strong>Giá</strong></td>
						<td colspan="3" class="last">
                        <!--<input name="price" type="text" pattern="[1-9][0-9]" id="price" style="width:300px" value=""/> -->
                        <input type="text" id="price" name="price" style="width:300px"
                            	onKeyPress="return numbersonly(this, event)" 
                                value=""></input>
					</td>
					</tr>
                    <tr>
						<td class="first" width="135"><strong>Khuyến mãi</strong></td>
						<td colspan="3" class="last"><input name="price_promo" type="text" id="price_promo" style="width:300px"/> </td>
					</tr>
					
					<tr class="bg">
					  <td class="first">&nbsp;</td>
					  <td colspan="3" class="last"><label>
					    <input type="submit" name="done" value="Submit" id="done" onclick="return kiem_tra_gui()" />
					  </label>                      </td>
				  </tr>
				</table>
			  </form>
	        <p>&nbsp;</p>
            
            <?php
			if(isset($_GET['proid'])){
				$tbl= new table('tabprice');
				
				// chec update
				if(isset($_POST["update"])){
						// remove($arr,$field='id')
						if(isset($_POST["del"])){
								$del = $_POST["del"];
								$tbl->remove($del,'id');
							}
							
						if(isset($_POST["hot"])){
								$hot = $_POST["hot"];
								$start = $_POST["start"];
								$limit = $_POST["limit"];
								
								// updateCheck($arrId,$field,$start=0,$limit=100,$value=1,$where='id',$order='order by id desc')
								$tbl->updateCheck($hot,'hot',$start,$limit);
							}
					}
			?>
            
            <form method="post">

				<table width="100%" cellpadding="0" cellspacing="0" class="listing">
					<tr>
						<th class="first">Tên sản phẩm</th>
                        <th>Kích thước</th>
                        <th>Giá</th>
						<th class="last">Xóa</th>
					</tr>

<?php

	$pagename = $_SERVER["PHP_SELF"]."?choose=tabprice";
	$limit = 20;
	if(isset($_GET["start"])){
			$start = $_GET["start"];
		}
	if(!isset($start)) $start=0;
	$nume=0;
	
	if(isset($_POST["search"])){
			// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc');
			// formatCompare($str,$pos=0);
			$res = $tbl->loadPaging($start,$nume,$limit,'where proid='.$_POST["key"],'order by proid desc');
		}else{
		// loadPaging(&$start,&$nume,$limit=20,$where='',$order='order by id desc');	
			$res = $tbl->loadPaging($start,$nume,$limit,'where proid='.$_GET['proid'],'order by price desc');
		}
		
	if($res){
			while($row=mysql_fetch_array($res)){
				$tbl_pro = new table('products');
				$res_pro = $tbl_pro -> loadOne('id='.$row['proid']);
				$row_pro = mysql_fetch_array($res_pro);
?>					
                    <tr>
						<td class="first style1">
                        	<a href="<?php echo loadPage('editprice&id='.$row['id']); ?>"><?php echo $row_pro['name']?></a>
                        </td>
                        <td><?php echo $row['size']?></td>
                        <td><?php echo number_format($row['price'])?> VNĐ</td>
					  	<td align="center" class="last">
                        	<input type="checkbox" name="del[]" value="<?php echo $row['id']; ?>" id="del[]" />
                        </td>
					</tr>
<?php
			}
		}
?>
					<tr class="bg">
					  <td colspan="9" class="first style2">
<?php
	// loadPageTable($pagename,& $start,$limit,$nume)
	loadPageTable($pagename,$start,$limit,$nume);
	
?>


		  </td>
				  </tr>
					<tr class="bg">
					  <td colspan="9" class="first style2"><label>
					    <input name="update" type="submit" id="update" value="Update"/>
                        <input type="hidden" name="start" value="<?php echo $start; ?>"  />
                        <input type="hidden" name="limit" value="<?php echo $limit; ?>"  />
                        
					  </label></td>
				  </tr>
				</table>
			  </form>
              <?php }?>
		  </div>
		</div>
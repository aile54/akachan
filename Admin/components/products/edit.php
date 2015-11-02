<?php
	$id = $_GET["id"];
	$tbl = new table('products');
	
	// done
	if(isset($_POST["done"])){
		if(test_isset1('products','mavach',$_POST['mavach'],$id)==0){		
			// field
						
			$field = array('catid1','catid2','catid3','chuyenmucid','name','mavach','ghichu','nsx','status','image','color','details','new','promo','typical','featured','liked','chobe','chome','chogiadinh','huongdan','alias','url');
			
			$str_img = edit_multi_img('../','Images/Products/',$_POST['num_img'],$_POST['tmpnum'],'image','tmpimage',80,75);
			 
			if($_POST['tmpnum_color']!=0){
				if(!is_numeric($_POST['num_color']) || $_POST['num_color']==0)
					$max=$_POST['tmpnum_color'];
				else
					$max=$_POST['tmpnum_color']+$_POST['num_color'];
				$dem=0;
				for($i=0;$i<$max;$i++){
					$colorname = $_POST['color'.$i];
					if($colorname!=''){
						$cuoi = '';
						$dem++;
						if($dem!=1)
							$cuoi='-';
						$color .= $cuoi.$colorname;
					}
				}
			}
			else{
				if(!is_numeric($_POST['num_color']) || $_POST['num_color']==0)
					$color='';
				else{
					$max=$_POST['num_color'];
					$dem=0;
					for($i=0;$i<$max;$i++){
						$colorname = $_POST['color'.$i];
						if($colorname!=''){
							$cuoi = '';
							$dem++;
							if($dem!=1)
								$cuoi='-';
							$color .= $cuoi.$colorname;
						}
					}
				}
			}
			
			/*if($_POST['tmpnum_size']!=0){
				if(!is_numeric($_POST['num_size']) || $_POST['num_size']==0)
					$max=$_POST['tmpnum_size'];
				else
					$max=$_POST['tmpnum_size']+$_POST['num_size'];
				$dem=0;
				for($i=0;$i<$max;$i++){
					$sizename = $_POST['size'.$i];
					if($sizename!=''){
						$cuoi1 = '';
						$dem1++;
						if($dem1!=1)
							$cuoi1='-';
						$size .= $cuoi1.$sizename;
					}
				}
			}
			else{
				if(!is_numeric($_POST['num_size']) || $_POST['num_size']==0)
					$size='';
				else{
					$max=$_POST['num_size'];
					$dem=0;
					for($i=0;$i<$max;$i++){
						$sizename = $_POST['size'.$i];
						if($sizename!=''){
							$cuoi = '';
							$dem++;
							if($dem!=1)
								$cuoi='-';
							$size .= $cuoi.$sizename;
						}
					}
				}
			}
			*/
			// values
				$values = array(
							// format($str,$isComma=1)
							format($_POST["catid1"],0) ,
							format($_POST["catid2"],0) ,
							format($_POST["catid3"],0) ,
							format($_POST["chuyenmucid"],0) ,
							format($_POST["name"],0) ,
							format($_POST["mavach"],0) ,
							format($_POST["ghichu"],0) ,
							format($_POST["nsx"],0) ,
							format($_POST["status"],0) ,
							format($str_img,0) ,
							format($color,0) ,
							format($_POST["details"],0) ,
							format(isCheck($_POST["new"]),0),
							format(isCheck($_POST["promo"]),0),
							format(isCheck($_POST["typi"]),0),
							format(isCheck($_POST["feat"]),0),
							format(isCheck($_POST["like"]),0),
							format(isCheck($_POST["chobe"]),0),
							format(isCheck($_POST["chome"]),0),
							format(isCheck($_POST["chogiadinh"]),0),
							format($_POST["huongdan"],0),
							format(rand_name($_POST["name"],$id),0)
							);
			
			// updateObject($field=array(),$value=array(),$where)
			$res = $tbl->updateObject($field,$values,'id='.$id);
			if($res){
					header('location: '.loadPage('products'));
				}
		}
		else
			echo "Lỗi trùng mã vạch. Vui lòng nhập mã vạch khác.";
	}
			
	
	// load page
	// loadOne($where)
	$res = $tbl->loadOne('id='.$id);
	if($res){
			$row=mysql_fetch_array($res);
			$img = explode('(*_^)',$row['image']);
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Products</h1>
				<div class="breadcrumbs"><a href="#">Products</a> / <a href="#">Sửa</a></div>
			</div><br />
 
		  
		  
			<div class="table">
				<img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post" enctype="multipart/form-data">
				<table class="listing form" cellpadding="0" cellspacing="0">
					<tr>
						<th class="full" colspan="4">NỘI DUNG</th>
					</tr>
					<tr>
						<td class="first" width="106"><strong>Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
						<td colspan="3" class="last">#<?php echo $id; ?></td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Danh mục 1</strong></td>
						<td colspan="3" class="last">
							<select name="catid1" onchange="get_('components/products/xuly.php',this.value,'cat2'); document.getElementById('cat3').innerHTML='<select name=catid2><option value=>---[Chọn một]---</option></select>'">
                            <option value="">---Chọn một---</option>
							<?php
                                $tbl_cat1= new table('category1');
                                $res_cat1 = $tbl_cat1->loadAll('order by ordering');
                                if($res_cat1){
                                        while($row_cat1=mysql_fetch_array($res_cat1)){
                            ?>
                                                            <option value="<?php echo $row_cat1['id']; ?>" <?php if($row['catid1']==$row_cat1['id']) echo "selected"; ?> ><?php echo $row_cat1['name']; ?></option>
                            <?php
                                            }
                                        }
                            ?>
						  </select>						</td>
					</tr>
                    <tr class="bg">
						<td class="first"><strong>Danh mục 2</strong></td>
						<td colspan="3" class="last"><div id="cat2">
                        	<select name="catid2" onchange="get1_('components/products/xuly.php',<?php echo $row['catid1']?>,this.value,'cat3')">
                            <option value="">---Chọn một---</option>
							<?php
                                $tbl_cat2 = new table('category2');
                                $res_cat2 = $tbl_cat2->loadOne('catid='.$row['catid1'].' order by ordering');
                                if($res_cat2){
                                        while($row_cat2=mysql_fetch_array($res_cat2)){
                            ?>
                             <option value="<?php echo $row_cat2['id']; ?>" <?php if($row['catid2']==$row_cat2['id']) echo "selected"; ?> ><?php echo $row_cat2['name']; ?></option>
                            <?php
                                            }
                                        }
                            ?>
						  </select>
                        </div></td>
				  </tr>
                  <tr class="bg">
						<td class="first"><strong>Danh mục 3</strong></td>
						<td colspan="3" class="last"><div id="cat3">
                        <select name="catid3">	
                            <option value="">---Chọn một---</option>
                            <?php 
							$tbl_cat3 = new table('category3');
							$res_cat3 = $tbl_cat3->loadOne('catid1='.$row['catid1'].' and catid2 = '.$row['catid2'].' order by ordering');
							while($row_cat3=mysql_fetch_array($res_cat3)){?>
                            <option value="<?php echo $row_cat3['id'];?>" <?php if($row_cat3['id']==$row['catid3']) echo 'selected'?>><?php echo $row_cat3['name'];?></option>
                            <?php }?>
                        </select>
                        </div></td>
				  </tr>
                  <tr style="display:none">
						<td class="first"><strong>Chuyên mục riêng</strong></td>
						<td colspan="3" class="last">
                        <select name="chuyenmucid">
                        <?php
							$tbl_chuyenmuc = new table('chuyenmuc');
							$res_chuyenmuc = $tbl_chuyenmuc -> loadAll('order by ordering');
							while($row_chuyenmuc = mysql_fetch_object($res_chuyenmuc)){
						?>
                        	<option value="<?php echo $row_chuyenmuc->id?>" <?php if($row['chuyenmucid']==$row_chuyenmuc->id) echo 'selected'?>><?php echo $row_chuyenmuc->name?></option>
                        <?php }?>
                        </select>
                        </td>
					</tr>
                    <tr>
						<td class="first"><strong>Tên sản phẩm</strong></td>
						<td colspan="3" class="last"><input name="name" type="text" class="text" id="name" value="<?php echo $row['name']; ?>" /></td>
					</tr>
                    <tr>
						<td class="first"><strong>Mã hàng</strong></td>
						<td colspan="3" class="last"><input name="mavach" type="text" class="text"value="<?php echo $row['mavach']; ?>" /></td>
					</tr>
                    <tr>
						<td class="first"><strong>Ghi chú</strong></td>
						<td colspan="3" class="last"><input name="ghichu" type="text" class="text" value="<?php echo $row['ghichu']; ?>" /></td>
					</tr>
                    <tr>
						<td class="first"><strong>Nhà sản xuất</strong></td>
						<td colspan="3" class="last">
                        <select name="nsx">
                        <?php
							$tbl_nsx = new table('nsx');
							$res_nsx = $tbl_nsx -> loadAll('order by id');
							while($row_nsx = mysql_fetch_object($res_nsx)){
						?>
                        	<option value="<?php echo $row_nsx->id?>" <?php if($row['nsx']==$row_nsx->id) echo 'selected'?>><?php echo $row_nsx->name?></option>
                        <?php }?>
                        </select>
                        </td>
					</tr>
                    <tr>
						<td class="first"><strong>Trình trạng hàng</strong></td>
						<td colspan="3" class="last"><input name="status" type="text" class="text" value="<?php echo $row['status']; ?>" /></td>
					</tr>
					<tr>
						<td class="first" width="106"><strong>Hình ảnh</strong></td>
					  <td colspan="3" class="last" valign="middle">
                      <div id="del_img">
                      <?php
					  if($row['image']!=''){
					  	for($i=0;$i<count($img);$i++){
                      ?>
                      <div style="margin-bottom:5px">
                      <input name="image<?=$i?>" type="file"/> <span onclick="del_img('components/products/del_img.php',<?php echo $row['id'];?>,'<?php echo $img[$i];?>')"><img src="img/bt_del1.png" width="20" align="absmiddle"/></span>
                        <input type="hidden" name="tmpimage<?php echo $i?>" class="text" value="<?php echo $img[$i]; ?>"  />       <img src="../<?php echo $img[$i]; ?>" width="50" align="top" />                      </div> 
                       <?php }}?>
                       <input type="hidden" name="tmpnum" value="<?php if($row['image']=='') echo 0; else echo count($img)?>" />
                       <div>
                       <input type="text" name="num_img" onkeyup="get_img('components/products/ajax.php',this.value,<?php if($row['image']=='') echo 0 ; else echo count($img)?>)"/> (Nhập số hình mà bạn muốn thêm vào) </div>
                       <div id="img"></div>
                      </div>
                       </td>
					</tr>
                    <tr style="display:none">
						<td class="first" width="106"><strong>Màu sắc</strong></td>
					  <td colspan="3" class="last" valign="middle">
                      <div style="width:500px;">
                      <?php
					  $color = explode('-',$row['color']);
					  if($row['color']!=''){
					  	for($i=0;$i<count($color);$i++){
                      ?>
                      <div style="margin-bottom:5px;">
                      <?php if($i!=0){?><div style="float:left; line-height:25px;margin-right:5px; margin-left:5px">-</div><?php }?><input name="color<?php echo $i?>" type="text" value="<?php echo $color[$i]?>" style=" <?php if($i!=count($color)-1){?>float:left;<?php }?> width:60px"/>
                        <input type="hidden" name="tmpcolor<?php echo $i?>" class="text" value="<?php echo $color[$i]; ?>"  /></div> 
                       <?php }}?>
                       <input type="hidden" name="tmpnum_color" value="<?php if($row['color']=='') echo 0; else echo count($color)?>" />
                       </div>
                       <div>
                       <input type="text" name="num_color" onkeyup="get_color('components/products/ajax_color.php',this.value,<?php if($row['color']=='') echo 0 ; else echo count($color)?>)"/> (Nhập số màu mà bạn muốn thêm vào) </div>
                       <div id="color"></div>                       </td>
					</tr>
                    <!--<tr>
						<td class="first" width="106"><strong>Size</strong></td>
					  <td colspan="3" class="last" valign="middle">
                      <div style="width:500px;">
                      <?php
					  $size = explode('-',$row['size']);
					  if($row['size']!=''){
					  	for($i=0;$i<count($size);$i++){
                      ?>
                      <div style="margin-bottom:5px;">
                      <?php if($i!=0){?><div style="float:left; line-height:25px;margin-right:5px; margin-left:5px">-</div><?php }?><input name="size<?php echo $i?>" type="text" value="<?php echo $size[$i]?>" style=" <?php if($i!=count($size)-1){?>float:left;<?php }?> width:60px"/>
                        <input type="hidden" name="tmpsize<?php echo $i?>" class="text" value="<?php echo $size[$i]; ?>"  /></div> 
                       <?php }}?>
                       <input type="hidden" name="tmpnum_size" value="<?php if($row['size']=='') echo 0; else echo count($size)?>" />
                       </div>
                       <div>
                       <input type="text" name="num_size" onkeyup="get_size('components/products/ajax_size.php',this.value,<?php if($row['size']=='') echo 0 ; else echo count($size)?>)"/> (Nhập số size mà bạn muốn thêm vào) </div>
                       <div id="size"></div>                       </td>
					</tr>-->
                    <tr class="bg">
						<td class="first"><strong>Chi tiết</strong></td>
						<td colspan="3" class="last editor"><textarea name="details" cols="80" rows="2" id="details" style="width: 100%"><?php echo $row['details']; ?></textarea>
                        <script> //STEP 2: Replace the textarea (txtContent)
						var oEdit2 = new InnovaEditor("oEdit2");
						oEdit2.arrStyle=[["BODY",false,"","font-family:Tahoma,Arial,Helvetica;font-size:10pt"]];
						oEdit2.width="100%";//You can also use %, for example: oEdit1.width="100%"
						oEdit2.height=200;
						oEdit2.cmdAssetManager = "modalDialogShow('/inv/assetmanager/assetmanager.php',640,400)"; //Command to open the Asset Manager add-on.
						oEdit2.REPLACE("details");//Specify the id of the textarea here
						</script></td>
					</tr>
                    <tr class="bg">
						<td class="first"><strong>Hướng dẫn sử dụng</strong></td>
						<td colspan="3" class="last editor"><textarea name="huongdan" cols="80" rows="2" id="huongdan" style="width: 100%"><?php echo $row['huongdan']; ?></textarea>
                        <script> //STEP 2: Replace the textarea (txtContent)
						var oEdit1 = new InnovaEditor("oEdit1");
						oEdit1.arrStyle=[["BODY",false,"","font-family:Tahoma,Arial,Helvetica;font-size:10pt"]];
						oEdit1.width="100%";//You can also use %, for example: oEdit1.width="100%"
						oEdit1.height=200;
						oEdit1.cmdAssetManager = "modalDialogShow('/inv/assetmanager/assetmanager.php',640,400)"; //Command to open the Asset Manager add-on.
						oEdit1.REPLACE("huongdan");//Specify the id of the textarea here
						</script></td>
					</tr>
                    <tr class="bg">
						<td class="first"><strong>Khuyến mãi</strong></td>
						<td width="45" class="last" colspan="3"><input type="checkbox" name="promo" <?php loadChecked($row['promo']); ?> /></td>
                  </tr>
                  	<tr class="bg">
						<td class="first"><strong>Mới về</strong></td>
						<td colspan="3" class="last"><input type="checkbox" name="new" <?php loadChecked($row['new']); ?> /></td>
					</tr>
                    <tr class="bg">
						<td class="first"><strong>Tiêu biểu</strong></td>
						<td colspan="3" class="last"><input type="checkbox" name="typi" <?php loadChecked($row['typical']); ?> /></td>
					</tr>
                    <tr class="bg">
						<td class="first"><strong>Mới</strong></td>
						<td colspan="3" class="last"><input type="checkbox" name="feat" <?php loadChecked($row['featured']); ?> /></td>
					</tr>
                    <tr class="bg">
						<td class="first"><strong>SP được yêu thích</strong></td>
						<td colspan="3" class="last"><input type="checkbox" name="like" <?php loadChecked($row['liked']); ?> /></td>
					</tr>
                    <tr class="bg" style="display:none">
						<td class="first"></td>
						<td colspan="3" class="last"><input type="checkbox" name="chobe" <?php loadChecked($row['chobe']); ?> /> Cho bé <input type="checkbox" name="chome" <?php loadChecked($row['chome']); ?> /> Cho mẹ <input type="checkbox" name="chogiadinh" <?php loadChecked($row['chogiadinh']); ?> /> Cho gia đình</td>
					</tr>
					<tr class="bg">
					  <td class="first">&nbsp;</td>
					  <td colspan="3" class="last"><label>
					    <input type="submit" name="done" value="Submit" id="done" />
					  </label></td>
				  </tr>
				</table>
			  </form>
	        <p>&nbsp;</p>
		  </div>
		</div>
<?php
	}
?>
<?php 
	$tbl = new table('products');
	
	if(isset($_POST["done"])){
		if(test_isset1('products','mavach',$_POST['mavach'])==0){		
			// get field
			$field = 'id,catid1,catid2,catid3,chuyenmucid,name,mavach,ghichu,nsx,status,image,color,details,new,promo,typical,featured,liked,chobe,chome,chogiadinh,huongdan,alias';
			
			// upload file
			// uploadFile($file,$auto=1,$dir='uploads/images/')
			$str_img = add_multi_img('../Images/Products/',$_POST['num_img'],'image',80,75);
						
			if(!is_numeric($_POST['num_color']) || $_POST['num_color']==0)
				$color='';
			else{
				$dem=0;
				for($i=0;$i<$_POST['num_color'];$i++){
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
			
			/*if(!is_numeric($_POST['num_size']) || $_POST['num_size']==0)
				$size='';
			else{
				$dem=0;
				for($i=0;$i<$_POST['num_size'];$i++){
					$sizename = $_POST['size'.$i];
					if($sizename!=''){
						$cuoi1 = '';
						$dem1++;
						if($dem1!=1)
							$cuoi1='-';
						$size .= $cuoi1.$sizename;
					}
				}
			}*/
			
			// get values
			// format
			// format($str,$isComma=1)
			$id = $tbl->getLastId()+1;
			$values = format($id,1);
			$values.= format($_POST["catid1"],1);
			$values.= format($_POST["catid2"],1);
			$values.= format($_POST["catid3"],1);
			$values.= format($_POST["chuyenmucid"],1);
			$values.= format($_POST["name"],1);
			$values.= format($_POST["mavach"],1);
			$values.= format($_POST["ghichu"],1);
			$values.= format($_POST["nsx"],1);
			$values.= format($_POST["status"],1);
			$values.= format($str_img,1);
			$values.= format($color,1);
			$values.= format($_POST["details"],1);
			$values.= format(isCheck(isset($_POST["new"])),1);
			$values.= format(isCheck(isset($_POST["promo"])),1);
			$values.= format(isCheck(isset($_POST["typi"])),1);
			$values.= format(isCheck(isset($_POST["feat"])),1);
			$values.= format(isCheck(isset($_POST["like"])),1);
			$values.= format(isCheck(isset($_POST["chobe"])),1);
			$values.= format(isCheck(isset($_POST["chome"])),1);
			$values.= format(isCheck(isset($_POST["chogiadinh"])),1);
			$values.= format($_POST["huongdan"],1);
			$values.= format(rand_name($_POST["name"],$id),0);
			//echo $values;
			// insertObject($field,$value)
			$res = $tbl->insertObject($field,$values);
			if($res){
					//var_dump($res);
					echo "<script>self.location='index.php?choose=addprice&proid=".$id."';</script>";
				}	
		}
		else
			echo "Lỗi trùng mã vạch. Vui lòng nhập mã vạch khác.";
	}
	
?>
<div id="center-column">
    <div class="top-bar">
      <h1>Products</h1>
        <div class="breadcrumbs"><a href="#">Products</a> / <a href="#">Thêm</a></div>
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
                <td class="first" width="135"><strong>Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
                <td colspan="3" class="last">#<?php echo $tbl->getLastId()+1; ?></td>
            </tr>
            <tr class="bg">
                <td class="first"><strong>Danh mục 1</strong></td>
          <td colspan="3" class="last">
                    <select name="catid1" onchange="get_('components/products/xuly.php',this.value,'cat2')">
                        <option value="">---Chọn một---</option>
                        <?php
                            $tbl_cat1 = new table('category1');
                            $res_cat1 = $tbl_cat1->loadAll('order by ordering');
                            if($res_cat1){
                                    while($row_cat1=mysql_fetch_array($res_cat1)){
                        ?>
                       <option value="<?php echo $row_cat1['id']; ?>"><?php echo $row_cat1['name']; ?></option>
                        <?php
                                        }
                                    }
                        ?>
                  </select></td>
            </tr>
            <tr class="bg">
                <td class="first"><strong>Danh mục 2</strong></td>
                <td colspan="3" class="last">
                    <div id="cat2">
                        <select name="catid2">
                        	<option value="">---[Chọn một]---</option>
                        </select>
                    </div>
                </td>
          </tr>
          <tr class="bg">
                <td class="first"><strong>Danh mục 3</strong></td>
                <td colspan="3" class="last"><div id="cat3">
                <select name="catid3">
                <option value="">---[Chọn một]---</option>
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
                    <option value="<?php echo $row_chuyenmuc->id?>"><?php echo $row_chuyenmuc->name?></option>
                <?php }?>
                </select>
                </td>
            </tr>
            <tr>
                <td class="first"><strong>Tên sản phẩm</strong></td>
                <td colspan="3" class="last"><input name="name" type="text" class="text" id="name" /></td>
            </tr>
            <tr>
                <td class="first"><strong>Mã hàng</strong></td>
                <td colspan="3" class="last"><input name="mavach" type="text" class="text" /></td>
            </tr>
            <tr>
                <td class="first"><strong>Ghi chú</strong></td>
                <td colspan="3" class="last"><input name="ghichu" type="text" class="text" /></td>
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
                    <option value="<?php echo $row_nsx->id?>"><?php echo $row_nsx->name?></option>
                <?php }?>
                </select>
                </td>
            </tr>
            <tr>
                <td class="first"><strong>Trình trạng hàng</strong></td>
                <td colspan="3" class="last"><input name="status" type="text" class="text" /></td>
            </tr>
            <tr>
                <td class="first" width="135"><strong>Hình ảnh chi tiết</strong></td>
                <td colspan="3" class="last">
                <div><input type="text" name="num_img" onkeyup="get_img('components/products/ajax.php',this.value,0)"/> (Nhập số hình mà bạn muốn thêm vào)</div>
                <div id="img"></div>                        </td>
            </tr>
            <tr style="display:none">
                <td class="first" width="135"><strong>Màu sắc</strong></td>
                <td colspan="3" class="last">
                <div><input type="text" name="num_color" onkeyup="get_color('components/products/ajax_color.php',this.value,0)"/> (Nhập số màu mà bạn muốn thêm vào)</div>
                <div id="color"></div>                        </td>
            </tr>
            <!--<tr>
                <td class="first" width="135"><strong>Size</strong></td>
                <td colspan="3" class="last">
                <div><input type="text" name="num_size" onkeyup="get_size('components/products/ajax_size.php',this.value,0)"/> (Nhập số size mà bạn muốn thêm vào)</div>
                <div id="size"></div>                        </td>
            </tr>-->
            <tr class="bg">
                <td class="first"><strong>Chi tiết</strong></td>
                <td colspan="3" class="last editor"><textarea name="details" cols="80" rows="2" id="details"></textarea>
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
                <td colspan="3" class="last editor"><textarea name="huongdan" cols="80" rows="2" id="huongdan"></textarea>
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
                <td width="54" class="last" colspan="3"><input type="checkbox" name="promo" /></td>
          </tr>
            <tr class="bg">
                <td class="first"><strong>Hàng mới về</strong></td>
                <td colspan="3" class="last"><input type="checkbox" name="new" /></td>
            </tr>
            <tr class="bg">
                <td class="first"><strong>Tiêu biểu</strong></td>
                <td colspan="3" class="last"><input type="checkbox" name="typi" /></td>
            </tr>
            <tr class="bg">
                <td class="first"><strong>Mới</strong></td>
                <td colspan="3" class="last"><input type="checkbox" name="feat" /></td>
            </tr>
            <tr class="bg">
                <td class="first"><strong>SP được yêu thích</strong></td>
                <td colspan="3" class="last"><input type="checkbox" name="like" /></td>
            </tr>
            <tr class="bg" style="display:none">
                <td class="first">&nbsp;</td>
                <td colspan="3" class="last"><input type="checkbox" name="chobe" /> Cho bé <input type="checkbox" name="chome" /> Cho mẹ <input type="checkbox" name="chogiadinh" /> Cho gia đình</td>
            </tr>
            <tr class="bg">
              <td class="first">&nbsp;</td>
              <td colspan="3" class="last"><label>
                <input type="submit" name="done" value="Submit" id="done" />
              </label>                      </td>
          </tr>
        </table>
      </form>
    <p>&nbsp;</p>
  </div>
</div>
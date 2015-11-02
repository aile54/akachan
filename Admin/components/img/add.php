<script language="javascript" type="text/javascript">
	function kiem_tra_gui()
	{
		name_color = document.getElementById('name_color');
		if(name_color.value=='')
		{
			document.getElementById('thong_bao').innerHTML='Vui lòng nhập tên màu sắc!';
			name_color.focus();
			return false;
		}
	}
</script>
<?php 
	
	$tbl = new table('img');
	
	if(isset($_POST["done"])){
			
			// get field
			$field = 'id,proid,name,image';
			
			// upload file
			$str_img= upload_img('image','../Images/Products/',50,50);
			
			// get values
			$now = mktime(0,0,0,date('m'),date('d'),date('Y'));
			
			$id = $tbl->getLastId()+1;
			$values = format($id,1);
			$values.= format($_POST["proid"],1);
			$values.= format($_POST["name"],1);
			$values.= format(str_replace('../','',$str_img),0);
			
			// insertObject($field,$value)
			$res = $tbl->insertObject($field,$values);
			if($res){
					$thongbao = "OK";
			}
			
		}
	
?>
<div id="center-column">
<div class="top-bar">
  <h1>Màu sắc sản phẩm</h1>
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
            <td colspan="3" class="last"><input name="proid" type="text" style="width:300px" value="<?php 
																							if(isset($_GET['id'])) 
																								echo $_GET['id'];
																							else if(isset($_GET['proid']))
																								echo $_GET['proid'];
																						?>"/> </td>
        </tr>
        <tr>
            <td class="first" width="135"><strong>Tên màu</strong></td>
            <td colspan="3" class="last"><input name="name" type="text" style="width:300px" value="" id="name_color"/> </td>
        </tr>
        <tr>
            <td class="first" width="135"><strong>Hình ảnh</strong></td>
            <td colspan="3" class="last"><input name="image" type="file" id="image"/> </td>
        </tr>
        <tr class="bg">
          <td class="first">&nbsp;</td>
          <td colspan="3" class="last">
              <label>
                <input type="submit" name="done" value="Submit" id="done" onclick="return kiem_tra_gui()"/>
              </label>                      
          </td>
      </tr>
    </table>
  </form>
<p>&nbsp;</p>

<?php
	if(isset($_GET['proid'])){	
	$tbl= new table('img');
	
	// chec update
	if(isset($_POST["update"])){
			// remove($arr,$field='id')
			if(isset($_POST["del"])){
					$del = $_POST["del"];
					del_img_array('../Images/Products/','img','image',$del);
				}
		}
?>

<form method="post">

<table width="100%" cellpadding="0" cellspacing="0" class="listing">
    <tr>
        <th class="first">Tên màu</th>
        <th>Hình ảnh</th>
        <th>Tên sản phẩm</th>
        <th class="last">Xóa</th>
    </tr>

<?php

	$pagename = $_SERVER["PHP_SELF"]."?choose=img";
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
			$res = $tbl->loadPaging($start,$nume,$limit,'where proid='.$_GET['proid'],'order by proid desc');
		}
		
	if($res){
			while($row=mysql_fetch_array($res)){
				$tbl_pro = new table('products');
				$res_pro = $tbl_pro -> loadOne('id='.$row['proid']);
				$row_pro = mysql_fetch_array($res_pro);
				
				$thumb_img = get_thumb('../Images/Products/',$row['image']);
?>					
                    <tr>
                    	<td class="first style1">
                        	<a href="<?php echo loadPage('editimg&id='.$row['id']); ?>"><?php echo $row['name']?></a>
                        </td>
                        <td>
                        	<a href="<?php echo loadPage('editimg&id='.$row['id']); ?>">
                            	<img src="../<?php $thumb_img ?>" height="50" />
                            </a>
                        </td>
                        <td>
                        	<a href="<?php echo loadPage('editimg&id='.$row['id']); ?>"><?php echo $row_pro['name']?></a>
                        </td>
					  <td align="center" class="last"><input type="checkbox" name="del[]" value="<?php echo $row['id']; ?>" id="del[]" /></td>
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

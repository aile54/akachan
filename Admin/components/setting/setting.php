<?php
	$tbl = new table('setting');
	
	if(isset($_POST["done"])){
		
			$field = array('logo','favicon','visitall','online','noimg','footer','design','link_orders','link_ykien','email','facebook','fanpage');
						
			$filename1=$_FILES['noimg']['name'];
			if($filename1=='')
				$noimg = $_POST["tmpnoimg"];
			else{
				del_file('setting','noimg',1);
				$noimg = uploadFile('noimg',0,'../Templates/Content/images/logo/');
			}
			
			$filename3=$_FILES['logo']['name'];
			if($filename3=='')
				$logo = $_POST["tmplogo"];
			else{
				del_file('setting','logo',1);
				$logo = uploadFile('logo',0,'../Templates/Content/images/logo/');
			}
			
			$filename4=$_FILES['favicon']['name'];
			if($filename4=='')
				$favicon = $_POST["tmpfavicon"];
			else{
				del_file('setting','favicon',1);
				$favicon = uploadFile('favicon',0,'../Templates/Content/images/logo/');
			}
			//var_dump($favicon);
			// vn
			$values = array(
							format(str_replace('../','',$logo),0),
							format(str_replace('../','',$favicon),0),
							format($_POST["visitall"],0),
							format($_POST["online"],0),
							format(str_replace('../','',$noimg),0),
							format($_POST["footer"],0),
							format($_POST["design"],0),
							format($_POST["link_orders"],0),
							format($_POST["link_ykien"],0),
							format($_POST["email"],0),
							format($_POST["facebook"],0),
							format($_POST["fanpage"],0)
							);
			$res = $tbl->updateObject($field,$values,'id=1');
			
			if($res)
				echo "Update thành công!!!!";
		}
	
	$res = $tbl->loadOne('id=1');
	$row=mysql_fetch_object($res);
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Setting</h1>
				<div class="breadcrumbs"><a href="#">setting</a> / <a href="#">Edit</a></div>
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
						<td class="first"><strong>Visited all</strong></td>
						<td colspan="2" class="last"><input name="visitall" type="text" class="text" value="<?php echo $row->visitall; ?>" /></td>
					</tr>
                    <tr>
						<td class="first"><strong>Online</strong></td>
						<td colspan="2" class="last"><input name="online" type="text" class="text" value="<?php echo $row->online; ?>" /></td>
					</tr>
                    <tr class="bg">
						<td class="first"><strong>Footer</strong></td>
						<td colspan="2" class="last editor">
                        	<textarea name="footer" cols="80" rows="20" id="footer" style="width: 100%"><?php echo $row->footer; ?></textarea>
							<script> //STEP 2: Replace the textarea (txtContent)
                            var oEdit1 = new InnovaEditor("oEdit1");
                            oEdit1.arrStyle=[["BODY",false,"","font-family:Tahoma,Arial,Helvetica;font-size:10pt"]];
                            oEdit1.width="100%";//You can also use %, for example: oEdit1.width="100%"
                            oEdit1.height="100%";		
                            oEdit1.cmdAssetManager = "modalDialogShow('../inv/assetmanager/assetmanager.php',640,400)"; //Command to open the Asset Manager add-on.
                            oEdit1.REPLACE("footer");//Specify the id of the textarea here
                            </script>
                        </td>
					</tr>      
                    <tr>
						<td class="first"><strong>Link theo dỏi đơn hàng</strong></td>
						<td colspan="2" class="last"><input name="link_orders" type="text" class="text" value="<?php echo $row->link_orders; ?>" /></td>
					</tr>
                    <tr>
						<td class="first"><strong>Link đóng góp ý kiến</strong></td>
						<td colspan="2" class="last"><input name="link_ykien" type="text" class="text" value="<?php echo $row->link_ykien; ?>" /></td>
					</tr>              
                    <tr><td colspan="3"><strong>Hình ảnh</strong></td></tr>
                    <tr>
						<td class="first" width="75"><strong>Logo</strong></td>
						<td width="225" class="last">
                        	<input name="logo" type="file" />
                        	<input type="hidden" name="tmplogo" value="<?php echo $row->logo; ?>"  />
                            <img src="../<?php echo $row->logo; ?>" height="50" align="absmiddle" />          
                    	</td>
						
					</tr>
                    <tr>
						<td class="first" width="75"><strong>No image</strong></td>
						<td width="225" class="last"><input name="noimg" type="file" />
                        <input type="hidden" name="tmpnoimg" value="<?php echo $row->noimg; ?>"  /><img src="../<?php echo $row->noimg; ?>" height="50" align="absmiddle" />                         </td>
						
					</tr>
                    <tr>
						<td class="first"><strong>Akachans` email:</strong></td>
						<td colspan="2" class="last">
                        	<input name="email" type="text" class="text" value="<?php echo $row->email; ?>" />
                        </td>
					</tr>
                    <tr>
						<td class="first"><strong>Akachans` facebook:</strong></td>
						<td colspan="2" class="last">
                        	<input name="facebook" type="text" class="text" value="<?php echo $row->facebook; ?>" />
                        </td>
					</tr>
                    <tr>
						<td class="first"><strong>Akachans` Fanpages:</strong></td>
						<td colspan="2" class="last">
                        	<input name="fanpage" type="text" class="text" value="<?php echo $row->fanpage; ?>" />
                        </td>
					</tr>
                    <? if($perid==0) {?>
                    <tr><td colspan="3"><strong>Only SupperAdmin</strong></td></tr>
                    <tr class="bg">
						<td class="first"><strong>Design by</strong></td>
						<td colspan="2" class="last editor"><textarea name="design" cols="80" rows="2" id="design" style="width: 100%"><?php echo $row->design; ?></textarea>
                        <script> //STEP 2: Replace the textarea (txtContent)
						var oEdit2 = new InnovaEditor("oEdit2");
						oEdit2.arrStyle=[["BODY",false,"","font-family:Tahoma,Arial,Helvetica;font-size:10pt"]];
						oEdit2.width="100%";//You can also use %, for example: oEdit1.width="100%"
						oEdit2.height="100%";		
						oEdit2.cmdAssetManager = "modalDialogShow('/inv/assetmanager/assetmanager.php',640,400)"; //Command to open the Asset Manager add-on.
						oEdit2.REPLACE("design");//Specify the id of the textarea here
						</script></td>
					</tr>
                    <tr>
						<td class="first"><strong>Favicon</strong></td>
						<td class="last">
                        	<input name="favicon" type="file" />
                        	<input type="hidden" name="tmpfavicon" value="<?php echo $row->favicon; ?>"  />
                            <img src="../<?php echo $row->favicon; ?>" height="50" align="absmiddle" />              
                    	</td>
					</tr>
                    
                    <? }?>
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
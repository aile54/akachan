<?php
	$id = $_GET["id"];
	$tbl = new table('orders');
	$res = $tbl->loadOne('id='.$id);
	if($res){
			$row=mysql_fetch_array($res);
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Orders</h1>
				<div class="breadcrumbs"><a href="#">Content</a> / <a href="#">View</a></div>
			</div><br />
 
		  
		  
			<div class="table">
				<img src="../Copy of orders/img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="../Copy of orders/img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post" enctype="multipart/form-data">
				<table class="listing form" cellpadding="0" cellspacing="0">
					<tr>
						<th class="full" colspan="3">NỘI DUNG</th>
					</tr>
					<tr>
						<td class="first" width="96"><strong>Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
						<td colspan="2" class="last">#<?php echo $id; ?></td>
					</tr>
                    <tr class="bg">
						<td colspan="3"><hr /></td>
					</tr>
                    <tr>
						<td colspan="3"><strong>Địa chỉ người đặt hàng</strong></td>
					</tr>
                    
					<tr class="bg">
						<td class="first"><strong>Name</strong></td>
						<td colspan="2" class="last"><?php echo $row['name']; ?></td>
					</tr>
					<tr>
						<td class="first"><strong>Address</strong></td>
						<td colspan="2" class="last"><?php echo $row['address']; ?></td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Email</strong></td>
						<td colspan="2" class="last"><?php echo $row['email']; ?></td>
					</tr>
					<tr>
						<td class="first" width="96"><strong>Phone</strong></td>
						<td width="225" class="last"><?php echo $row['phone']; ?></td>
						<td width="311" class="last">&nbsp;</td>
					</tr>      
                    <tr>
						<td colspan="3"><strong>Địa chỉ người nhận hàng</strong></td>
					</tr>
<tr class="bg">
						<td class="first"><strong>Name</strong></td>
						<td colspan="2" class="last"><?php echo $row['name_nn']; ?></td>
					</tr>
					<tr>
						<td class="first"><strong>Address</strong></td>
						<td colspan="2" class="last"><?php echo $row['address_nn']; ?></td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Email</strong></td>
						<td colspan="2" class="last"><?php echo $row['email_nn']; ?></td>
					</tr>
					<tr>
						<td class="first" width="96"><strong>Phone</strong></td>
						<td width="225" class="last" colspan="2"><?php echo $row['phone_nn']; ?></td>
					</tr>					
					<tr class="bg">
						<td class="first"><strong>Lời nhắn</strong></td>
						<td colspan="2" class="last">
							<?php 
								if($row['loinhan'] != 'NULL')
								{
									echo $row['loinhan']; 
								}
							?>
                        </td>
					</tr>
                    <tr>
                    	<td colspan="3"><hr /></td>
                    </tr>               
                    <tr class="bg">
						<td class="first"><strong>Ngày đặt hàng: </strong></td>
						<td colspan="2" class="last">
						<?php
						$tam = explode('-',$row['ngaydat']);
						$day = $tam[2];
						$month = $tam[1];
						$year = $tam[0];
						echo $day.'/'.$month.'/'.$year;
						?></td>
					</tr>
                    <!--<tr class="bg">
						<td class="first"><strong>Ngày giao hàng: </strong></td>
						<td colspan="2" class="last">
						<?php 
						$ngay = substr($row['ngaygiao'],8,2);
						$thang = substr($row['ngaygiao'],5,2);
						$nam = substr($row['ngaygiao'],0,4);
						
						$date = "{$ngay}-{$thang}-{$nam}";
						echo $date; 
						
						?></td>
					</tr>
                     <tr class="bg">
						<td class="first"><strong>Giờ giao hàng: </strong></td>
						<td colspan="2" class="last">
						<?php 
						echo $row['gio']; echo "h";
						
						?></td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Phí vận chuyển: </strong></td>
						<td colspan="2" class="last">
						<?php 
							$tblShipping = new table('shipping');
							$resShipping = $tblShipping->loadOne("id = {$row['shipping']}");
							if ($resShipping) {
								$rowShipping = mysql_fetch_object($resShipping);
								echo number_format($rowShipping->price);
							}
						?> VNĐ</td>
					</tr>
					<tr>
						<td class="first" width="96"><strong>Tiền hàng</strong></td>
						<td colspan="2" class="last">
						<?php echo number_format($row['ttt']); ?> đ
                        
                        </td>
					</tr>
                    <tr>
						<td class="first" width="96"><strong>Tổng cộng</strong></td>
						<td colspan="2" class="last">
						<?php echo number_format($row['ttt'] + $rowShipping->price); ?> đ
                        
                        </td>
					</tr>-->
					<tr class="bg">
						<td colspan="3" class="first"><table border="0" cellspacing="3" cellpadding="0">
						  <tr>
						    <td><strong>Chi tiết đơn hàng</strong></td>
					      </tr>
						  <tr>
						    <td><table border="0" cellspacing="3" cellpadding="0">
						      <tr>
						        <td><strong>Tên sản phẩm</strong></td>
                                <td><strong>Kích thước</strong></td>
                                <td><strong>Màu sắc</strong></td>
						        <td><strong>Đơn giá</strong></td>
                                <td><strong>Số lượng</strong></td>
						        <td><strong>Thành tiền</strong></td>
					          </tr>
<?php
	$tblDetails = new table('ordersdetails');
	$resDetails = $tblDetails->loadOne('orderid = '.$id);
	if($resDetails){
		$sum_sl ='';
		$sum_gia='';
			while($rowDetails=mysql_fetch_array($resDetails)){
				$sum_sl +=$rowDetails['quantity'];
				//$sum_gia +=$rowDetails['total'];
				$sum_gia = 0;
	
?>
                              <tr>
						        <td>
								<?php 
									//var_dump($rowDetails['productid']);
									$tbl_price = new table('tabprice');
									$res_price = $tbl_price -> loadOne('proid='.$rowDetails['productid']);
									$row_price = mysql_fetch_object($res_price);
									if($rowDetails['color'] != 'undefined' && $rowDetails['color'] != 'NULL')
									{
										//var_dump($rowDetails);
										$tbl_color = new table('img');
										//var_dump($rowDetails);
										$res_color = $tbl_color->loadOne('proid='.$rowDetails['color']);
										
										$row_color = mysql_fetch_object($res_color);
									}
									else 
										$row_color = null;
										
									$tblPro = new table('products');
									$resPro = $tblPro->loadOne('id='.$rowDetails['productid']);
									$rowPro = mysql_fetch_array($resPro);
									//var_dump($row_price);
									$pricePro = 0;
									if($row_price)
									{
										$pricePro = $row_price->price;
										if($row_price->price_promo!=0)
											$pricePro = $row_price->price_promo;
										
										$sum_gia += ($rowDetails['quantity'] * $pricePro);
									}
									
									echo $rowPro['name']; ?>                                </td>
                                <td>
									<?php 
										if($row_price)
											echo $row_price->size; 
									?>
                                </td>
                                <td>
									<?php
										if($row_color) 
										{
											echo $row_color->name; 
										}
									?>
                                </td>
						        <td><?php echo number_format($pricePro); ?> VNĐ</td>
                                <td><?php echo $rowDetails['quantity']; ?></td>
						        <td><?php echo number_format($rowDetails['quantity'] * $pricePro) ?> VNĐ</td>
					          </tr>
                           
<?php
				}
			}
?>
							 <tr>
						        <td colspan="4"><b>Tổng cộng</b></td>
					           <td><?php echo $sum_sl; ?></td>
						        <td><?php echo number_format($sum_gia); ?> VNĐ</td>
					          </tr>
					        </table></td>
					      </tr>
					    </table></td>
					</tr>
					<tr class="bg">
					  <td class="first">&nbsp;</td>
					  <td colspan="2" class="last">&nbsp;</td>
				  </tr>
				</table>
				</form>
	        <p>&nbsp;</p>
		  </div>
		</div>
<?php
	}
?>
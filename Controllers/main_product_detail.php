                                <?php
	require_once('../Models/xl_main_detail.php');
	include_once('../Models/xl_main_submenu.php'); 
	class main_product
	{
		function creater ($id, $name, $image)
		{
			$xl_product_detail = new xl_product_detail_db();
			$items = array();
			$items = $xl_product_detail->getProduct($id);
			//var_dump($items);
			if(count($items) > 0){
?>
          	<section id="content">
				<div class="groupProduct">
                    <div class="groupProduct-header">
                        <img src="../<?php echo $image; ?>"/>
                        <div> <?php echo $name;?> </div>
                        <?php 
                            $xl_main_submenu = new xl_main_submenu();
                            $submenu_items = array();
                            $submenu_items = $xl_main_submenu->getProduct($id);
							//var_dump($submenu_items);
                            foreach($submenu_items as $submenu_item)
                            {
								//var_dump($submenu_item);
                        ?>
                                <a class="subMenu" 
                                	href="sub_menu.php?cid2=<?php echo $submenu_item['id']?>" 
                                    title="<?php echo $submenu_item['name']; ?>">
                                    <img src="../<?php  
									if($submenu_item['image'] != ''
									&& $submenu_item['image'] != null
									&& file_exists("../".@$submenu_item['image']))
									{
										echo $submenu_item['image']; 
									}
									else
									{
										echo "Templates/img/no photo.gif";
									}
									?>"/>
                                </a>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="groupProduct-content marginCenter" id="featured_products">
                        <ul id="ul-products">
                            <?php
                            	//var_dump($items);
                                $range_num = array();
                                if(count($items) >= 12)
                                {
                                    $range_num = getArrayRandomNoRepeat(range(0,count($items)-1), 12);
                                }
                                else
                                {
                                    $range_num = getArrayRandomNoRepeat(range(0,count($items)-1), count($items));
                                }
                                for($i = 0; $i < count($range_num); $i++)
                                {
									$CheckPromo = $items[$range_num[$i]]['promo'];
									$priceNew = $items[$range_num[$i]]['tbprice_promo'];
									$priceOld = $items[$range_num[$i]]['tbprice'];
									$price = $priceOld;
									$IsPromo = false;
									$SalePercent = 0;
									if($CheckPromo == '1' && $priceNew != null 
									&& $priceNew != '' && $priceNew != 0 && $priceOld != 0)
									{
										$price = $priceNew;
										$IsPromo = true;
										$SalePercent = intval((($priceOld - $priceNew)/$priceOld)*100);
									}
									//var_dump($items[$range_num[$i]]['image']);
                            ?>
                                    <li class="">
        							<form method="post" action="" class="jcart">
                                    <a class="" href="Detail.php?id=<?php echo $items[$range_num[$i]]['id']?>" 
                                                title="<?php echo $items[$range_num[$i]]['name']?>">
										<?php if ($IsPromo)
                                        {
                                        ?>
                                        <div>
                                            <div class = "numberSale"><?php echo '  '.$SalePercent."%" ?></div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        <img class="image-wrap" 
                                            src="../<?php 
												if($items[$range_num[$i]]['image'] != ''
												&& $items[$range_num[$i]]['image'] != null)
												{
													$arrIma = explode("(*_^)", $items[$range_num[$i]]['image']);
													//var_dump($arrIma);
													$n = count($arrIma);
													for($z=0; $z<$n; $z++)
													{
														if(file_exists('../'.$arrIma[$z]))
														{
															echo $arrIma[$z];
															break;
														}
														
														if(($z + 1) == $n)
														{
															echo "Templates/img/no photo.gif";
														}
													}
												}
												else
												{
													echo "Templates/img/no photo.gif";
												}
											?>" 
                                            alt="" 
                                            onmouseover="showtrail('../<?php 
												if($items[$range_num[$i]]['image'] != ''
												&& $items[$range_num[$i]]['image'] != null)
												{
													$arrIma = explode("(*_^)", $items[$range_num[$i]]['image']);
													//var_dump($arrIma);
													$n = count($arrIma);
													for($z=0; $z<$n; $z++)
													{
														if(file_exists('../'.$arrIma[$z]))
														{
															echo $arrIma[$z];
															break;
														}
														
														if(($z + 1) == $n)
														{
															echo "Templates/img/no photo.gif";
														}
													}
												}
												else
												{
													echo "Templates/img/no photo.gif";
												}
											?>',
                                                                        '<?php echo $items[$range_num[$i]]['name']?>','',
                                                                        '<?php 
																			if ($price == null
																				|| $price == ''
																				|| $price == '0')
																			{
																				echo "Liên hệ để biết giá!";
																			}
																			else
																			{
																				echo number_format($price)." VNĐ";
																			}
																		?>',
                                                                        '<?php  
																			if ($items[$range_num[$i]]['tbsize'] == null
																				|| $items[$range_num[$i]]['tbsize'] == '')
																			{
																				echo "n/a";
																			}
																			else
																			{
																				echo $items[$range_num[$i]]['tbsize'];
																			}
																		?>',
																		'<?php  
																			if ($items[$range_num[$i]]['color'] == null
																				|| $items[$range_num[$i]]['color'] == '')
																			{
																				echo "n/a";
																			}
																			else
																			{
																				echo $items[$range_num[$i]]['color'];
																			}
																		?>'); "
                                            onmouseout="hidetrail();" border="0" align="middle">
                                    </a>
                                        <div class="info home">
                                            <div class="vertical">
                                                <div>
                                                 	<h4 id = "product_linkID">Mã sản phẩm: <?php echo $items[$range_num[$i]]['mavach']?></h4>
                                                    <a class="product_link" 
                                                        href="Detail.php?id=<?php echo $items[$range_num[$i]]['id']?>"
                                                        title="<?php echo $items[$range_num[$i]]['name']?>">
                                                        <h4><?php echo $items[$range_num[$i]]['name']?></h4>
                                                    </a>
												<?php if($IsPromo)
													{
												?>
												<span class="price-old" style="text-align:left">
													<?php echo number_format($priceOld)." VNĐ"; ?>
												</span>
                                                <br/>
												<?php
													}
												?>
                                                    <span class="price" style="text-align:left">
														<?php 
															if ($price == null
																|| $price == ''
																|| $price == '0')
															{
																echo "Liên hệ để biết giá!";
															}
															else
															{
																echo number_format($price)." VNĐ";
															}
														?>
                                                    </span>
												<?php if($IsPromo)
													{
												?>
                                                	<a class="exclusive btnAddToCart" style = "margin: -25px 0px 15px 20px;"></a>
												<?php
													}
													else
													{
												?>
                                                	<a class="exclusive btnAddToCart"></a>
												<?php
													}
												?>
                                                	<a class="exclusive btnAddFavorite"></a>
                                                </div>
                                            </div>
                                        </div>         
                                        <?php 
											$id = $items[$range_num[$i]]['id'];
										?>   
                                        <input type="hidden" name="jcartToken" value="<?php echo $_SESSION['jcartToken'];?>" />
                                        <input type="hidden" name="my-item-id" value="<?php echo $id ?>" />
                                        <input type="hidden" name="my-item-name" value="<?php echo $items[$range_num[$i]]['name'] ?>" />
                                        <input type="hidden" name="my-item-price" value="<?php echo ($price == "" ? 0 : $price) ?>" />
                                        <input type="hidden" name="my-item-size" value="<?php echo $items[$range_num[$i]]['tbsize']?>" />
                                        <input type="hidden" name="my-item-color" value="<?php echo $items[$range_num[$i]]['color']?>" />
                                        <input type="hidden" name="my-item-url" value="" />
                                        <input type="hidden" name="my-item-qty" value="1" size="3" />                                           
                                        <input class="buyproduct" type="submit" name="my-add-button" value="add to cart" style="display:none;" />
                                    </form>
                                    </li>
                            <?php } ?>
                        </ul>
                                <p align="right">
                                    <a href="sub_menu.php?cid1=<?php echo $items[0]['catid1']?>">
                                        Xem thêm...
                                    </a>
                                </p>
                    </div>    
                </div>
            </section>
            <div id="clearbetween">
            </div>
<?php 
			}
		}
	} 
?>
                            
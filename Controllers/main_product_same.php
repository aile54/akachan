<?php
	require_once('../Models/xl_sp_cungloai.php');
?>
<?php
if(count($items_same) > 0)
{
?>
<section id="content">
<div class="groupProduct" style="padding:10px 0px 0px 0px">
    <div class="product-header" >
        <div>
            Khách mua sản phẩm này thường xem thêm
        </div>
    </div>
    <div class="groupProduct-content marginCenter" id="featured_products" style="padding:20px 0px 0px 0px">
        <ul id="ul-products">
			<?php 
				$range_num = array();
				if(count($items_same) >= 12)
				{
					$range_num = getArrayRandomNoRepeat(range(0,count($items_same)-1), 12);
				}
				else
				{
					$range_num = getArrayRandomNoRepeat(range(0,count($items_same)-1), count($items_same));
				}
				for($i = 0; $i < count($range_num); $i++)
				{
					$CheckPromo = $items_same[$range_num[$i]]['promo'];
					$priceNew = $items_same[$range_num[$i]]['tbprice_promo'];
					$priceOld = $items_same[$range_num[$i]]['tbprice'];
					$price = $priceOld;
					$IsPromo = false;
					$SalePercent = 0;
					if($CheckPromo == '1' && $priceNew != null && $priceNew != '' && $priceNew != '0')
					{
						$price = $priceNew;
						$IsPromo = true;
						$SalePercent = intval((($priceOld - $priceNew)/$priceOld)*100);
					}
			?>
                    <li class="">
        			<form method="post" action="" class="jcart">
                    <a class="" href="Detail.php?id=<?php echo $items_same[$range_num[$i]]['id']?>" 
                    			title="<?php echo $items_same[$range_num[$i]]['name']?>">
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
								if($items_same[$range_num[$i]]['image'] != ''
								&& $items_same[$range_num[$i]]['image'] != null)
								{
									$arrIma = explode("(*_^)", $items_same[$range_num[$i]]['image']);
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
														if($items_same[$range_num[$i]]['image'] != ''
														&& $items_same[$range_num[$i]]['image'] != null)
														{
															$arrIma = explode("(*_^)", $items_same[$range_num[$i]]['image']);
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
                            							'<?php echo $items_same[$range_num[$i]]['name']?>','',
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
															if ($items_same[$range_num[$i]]['tbsize'] == null
																|| $items_same[$range_num[$i]]['tbsize'] == '')
															{
																echo "n/a";
															}
															else
															{
																echo $items_same[$range_num[$i]]['tbsize'];
															}
														?>',
                                                        '<?php  
															if ($items_same[$range_num[$i]]['color'] == null
																|| $items_same[$range_num[$i]]['color'] == '')
															{
																echo "n/a";
															}
															else
															{
																echo $items_same[$range_num[$i]]['color'];
															}
														?>'); "
                            onmouseout="hidetrail();" border="0" align="middle"/>
                    </a>
                        <div class="info home">
                            <div class="vertical">
                                <div>
                                	<h4 id = "product_linkID">Mã sản phẩm: <?php echo $items_same[$range_num[$i]]['mavach']?></h4>
                                    <a class="product_link" href="Detail.php?id=<?php echo $items_same[$range_num[$i]]['id']?>"
                                        title="<?php echo $items_same[$range_num[$i]]['name']?>">
										<h4><?php echo $items_same[$range_num[$i]]['name']?></h4></a><br />
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
                                    <!--<a class="exclusive btnAddFavorite"></a>-->
                                </div>
                            </div>
                        </div>         
						<?php 
                            $id = $items_same[$range_num[$i]]['id'];
                            $price = $items_same[$range_num[$i]]['tbprice'];
                        ?>   
                        <input type="hidden" name="jcartToken" value="<?php echo $_SESSION['jcartToken'];?>" />
                        <input type="hidden" name="my-item-id" value="<?php echo $id ?>" />
                        <input type="hidden" name="my-item-name" value="<?php echo $name ?>" />
                        <input type="hidden" name="my-item-price" value="<?php echo ($price == "" ? 0 : $price) ?>" />
                        <input type="hidden" name="my-item-size" value="<?php echo $items_same[$range_num[$i]]['tbsize']?>" />
                        <input type="hidden" name="my-item-color" value="<?php echo $items_same[$range_num[$i]]['color']?>" />
                        <input type="hidden" name="my-item-url" value="" />
                        <input type="hidden" name="my-item-qty" value="1" size="3" />                                           
                        <input class="buyproduct" type="submit" name="my-add-button" value="add to cart" style="display:none;" />
                    </form>
              </li>
            <?php } ?>      
        </ul>
    </div>
</div>
</section>
<?php } ?> 
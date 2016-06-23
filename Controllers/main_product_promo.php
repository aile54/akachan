<?php
	require_once('../Models/xl_sp_khuyenmai.php');
	if(count($items_sp_khuyenmai) > 0 )
	{
?>
   	<section id="content">
		<div class="groupProduct">
            <div class="groupProduct-header">
                <img src="../Templates/Content/images/icon/promotion.jpg" />
                <div>
                    Sản phẩm khuyến mãi
                </div>
            </div>
            <div class="groupProduct-content marginCenter" id="featured_products">
                <ul id="ul-products">
                	<?php 
						for($i = 0; $i < count($items_sp_khuyenmai); $i++)
						{
							$CheckPromo = $items_sp_khuyenmai[$i]['promo'];
							$priceNew = $items_sp_khuyenmai[$i]['tbprice_promo'];
							$priceOld = $items_sp_khuyenmai[$i]['tbprice'];
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
                                    <a class="" href="Detail.php?id=<?php echo $items_sp_khuyenmai[$i]['id']?>"
                                    title="<?php echo $items_sp_khuyenmai[$i]['name']?>">
										<?php if ($IsPromo)
                                        {
                                        ?>
                                        <div>
                                            <div class = "numberSale"><?php echo '  '.$SalePercent."%" ?></div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        <img class="image-wrap" src="../<?php
																	$image = $items_sp_khuyenmai[$i]['image'];
																	if($items_sp_khuyenmai[$i]['image'] != ''
																	&& $items_sp_khuyenmai[$i]['image'] != null)
																	{
																		$arrIma = explode("(*_^)", $items_sp_khuyenmai[$i]['image']);
																		//var_dump($arrIma);
																		$n = count($arrIma);
																		for($z=0; $z<$n; $z++)
																		{
																			if(file_exists('../'.$arrIma[$z]))
																			{
																				$image = $arrIma[$z];
																				echo $arrIma[$z];
																				break;
																			}
																			
																			if(($z + 1) == $n)
																			{
																				$image = "Templates/img/no photo.gif";
																				echo $image;
																			}
																		}
																	}
																	else
																	{
																		$image = "Templates/img/no photo.gif";
																		echo $image;
																	} 
																	?>" alt="" 
                                            onmouseover="showtrail('../<?php
																	if($items_sp_khuyenmai[$i]['image'] != ''
																	&& $items_sp_khuyenmai[$i]['image'] != null)
																	{
																		$arrIma = explode("(*_^)", $items_sp_khuyenmai[$i]['image']);
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
                                                                    '<?php echo $items_sp_khuyenmai[$i]['name']?>','',
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
																		if ($items_sp_khuyenmai[$i]['tbsize'] == null
																			|| $items_sp_khuyenmai[$i]['tbsize'] == '')
																		{
																			echo "n/a";
																		}
																		else
																		{
																			echo $items_sp_khuyenmai[$i]['tbsize'];
																		}
																	?>',
                                                                    '<?php  
																		if ($items_sp_khuyenmai[$i]['color'] == null
																			|| $items_sp_khuyenmai[$i]['color'] == '')
																		{
																			echo "n/a";
																		}
																		else
																		{
																			echo $items_sp_khuyenmai[$i]['color'];
																		}
																	?>'); "
                                            onmouseout="hidetrail();" border="0" align="middle">
                                    </a>
                                    <div class="info home">
                                        <div class="vertical" style="margin: 0 auto;">
                                            <div>
                                            <?php 
                                                if ($price == null
                                                    || $price == ''
                                                    || $price == '0')
                                                {
                                            ?>
                                                <span class="price" style="color:red">
                                            <?php
                                                     echo "Liên hệ để biết giá!";
                                            ?>
                                                </span>
                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                                <span class="price">
                                            <?php
                                                    echo number_format($price)."đ";
                                            ?>
                                                </span>
                                            <?php
                                                }
                                            ?>
                                            <?php if($IsPromo)
                                                {
                                            ?>
                                                <span class="price-old" style="text-align:left">
                                                    <?php echo number_format($priceOld)."đ"; ?>
                                                </span>
                                            <?php
                                                }
                                            ?>
                                                <div class="clear"></div>
                                                <div>
                                                    <a class="product_link" 
                                                        href="Detail.php?id=<?php echo $items[$range_num[$i]]['id']?>"
                                                        title="<?php echo $items[$range_num[$i]]['name']?>">
                                                        <h4><?php echo $items[$range_num[$i]]['name']?></h4>
                                                    </a>
                                                    <a class="exclusive btnAddToCart">
                                                    </a>   
                                                <?php 
                                                    $id = $items[$range_num[$i]]['id'];
                                                    $numberlove = $items[$range_num[$i]]['love'];
                                                ?>
                                                
                                                <?php $cookie_name = "product_" . $id . "_like";
                                                if(!isset($_COOKIE[$cookie_name])) 
                                                {
                                                ?>
                                                    <a class="exclusived btnAddFavorite" onclick="clickAddFavorite(this, <?php echo $id?>);"></a>
                                                <?php 
                                                }
                                                else
                                                {
                                                ?>
                                                    <a class="exclusived btnAddFavoriteActive" title="<?php echo number_format($numberlove) ?>">
                                                        <label>
                                                        <?php echo number_format($numberlove) ?>
                                                        </label>
                                                    </a>
                                                <?php 
                                                } 
                                                ?>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
									<?php 
										$id = $items_sp_khuyenmai[$i]['id'];
										$price = $IsPromo ? $priceNew : $priceOld;
									?> 
                                    <input type="hidden" name="jcartToken" value="<?php echo $_SESSION['jcartToken'];?>" />
                                    <input type="hidden" name="my-item-id" value="<?php echo $id ?>" />
                                    <input type="hidden" name="my-item-name" value="<?php echo $items_sp_khuyenmai[$i]['name']?>" />
                        			<input type="hidden" name="my-item-price" value="<?php echo ($price == "" ? 0 : $price) ?>" />
                                    <input type="hidden" name="my-item-size" value="<?php echo $items_sp_khuyenmai[$i]['tbsize']?>" />
                                    <input type="hidden" name="my-item-color" value="<?php echo $items_sp_khuyenmai[$i]['color']?>" />
									<input type="hidden" name="my-item-url" value="./Detail.php?id=<?php echo $id?>" />
                                    <input type="hidden" name="my-item-image" value="<?php echo $image ?>" id="my-item-image" />
									<input type="hidden" name="my-item-qty" value="1" size="3" />                                           
                                    <input class="buyproduct" type="submit" name="my-add-button" value="add to cart" style="display:none;" />
                                 </form>
                            </li>
                    <?php } ?>
                </ul>
                <p align="right">
                    <a href="sub_menu.php?cid=pro">
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
?>
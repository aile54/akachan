<?php
	require_once('../Models/xl_search_result.php');
	$plantext = $_GET['q'];
	//var_dump($plantext);
	$xl_result_detail = new xl_search_result();
	$items = array();
	$items = $xl_result_detail->SelectProductForResult($plantext);
	//var_dump($items);
	?>
    <script>
	$(document).ready(function () {
		$('title').html($("div.groupProduct-header div").text().trim());
	});
	</script>
    <section id="content">
		<div class="groupProduct">
            <div class="groupProduct-header">
                <div>
                    Kết quả tìm kiếm
                    <?php
					if(count($items) > 0)
					{
					?>
                    (<?php echo count($items) ?>)
                    <?php
					}
					?>
                </div>
            </div>
	<?php
	if(count($items) > 0)
	{
	?>
            <div class="groupProduct-content marginCenter" id="featured_products">
                <ul id="ul-products">
                	<?php 
						for($i = 0; $i < count($items); $i++)
						{
							$CheckPromo = $items[$i]['promo'];
							$priceNew = $items[$i]['tbprice_promo'];
							$priceOld = $items[$i]['tbprice'];
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
                                    <a class="" href="Detail.php?id=<?php echo $items[$i]['proid']?>"
                                    	title="<?php echo $items[$i]['name']?>">
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
																	$image = $items[$i]['image'];
																	if($items[$i]['image'] != ''
																	&& $items[$i]['image'] != null 
																	&& file_exists('../'.@$items[$i]['image']))
																	{
																		echo $items[$i]['image'];
																	}
																	else
																	{
																		$image = "Templates/img/no photo.gif";
																		echo $image;
																	}
																	?>" alt="" 
                                            onmouseover="showtrail('../<?php
																	if($items[$i]['image'] != ''
																	&& $items[$i]['image'] != null 
																	&& file_exists('../'.@$items[$i]['image']))
																	{
																		echo $items[$i]['image'];
																	}
																	else
																	{
																		$image = "Templates/img/no photo.gif";
																		echo $image;
																	}
																	?>',
                                            '<?php echo $items[$i]['name']?>','',
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
												if ($items[$i]['tbsize'] == null
													|| $items[$i]['tbsize'] == '')
												{
													echo "n/a";
												}
												else
												{
													echo $items[$i]['tbsize'];
												}
											?>',
                                            '<?php  
												if ($items[$i]['color'] == null
													|| $items[$i]['color'] == '')
												{
													echo "n/a";
												}
												else
												{
													echo $items[$i]['color'];
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
										$id = $items[$i]['id'];
										$price = $IsPromo ? $priceNew : $priceOld;
									?> 
                                    <input type="hidden" name="jcartToken" value="<?php echo $_SESSION['jcartToken'];?>" />
                                    <input type="hidden" name="my-item-id" value="<?php echo $items[$i]['id']?>" />
                                    <input type="hidden" name="my-item-name" value="<?php echo $items[$i]['name']?>" />
                                    <input type="hidden" name="my-item-price" value="<?php echo ($price == "" ? 0 : $price) ?>" />
                                    <input type="hidden" name="my-item-size" value="<?php echo $items[$i]['tbsize']?>" />
                                    <input type="hidden" name="my-item-color" value="<?php echo $items[$i]['color']?>" />
									<input type="hidden" name="my-item-url" value="./Detail.php?id=<?php echo $id?>" />
									<input type="hidden" name="my-item-image" value="<?php echo $image ?>" id="my-item-image" />
                                    <input type="hidden" name="my-item-qty" value="1" size="3" />                                           
                                    <input class="buyproduct" type="submit" name="my-add-button" value="add to cart" style="display:none;" />
                                 </form>
                            </li>
                    <?php } ?>
                </ul>
            </div>
<?php
	}
	else
	{
?>
    <script>
	$(document).ready(function () {
		$('title').html($("div.noresult").text().trim());
	});
	</script>
	<div class = "noresult">
		Không tìm thấy dữ liệu!
    </div>
    <div class = "noresult">
    	<img src="../Templates/Content/images/Layout/noResult.png" />
    </div>
<?php
	}
?>
 </div>
    </section>
    <div id="clearbetween">
    </div>
</br>
<?php
	require_once('../Models/xl_submenu.php');
	require_once('../Models/Pager.php');
	$result_submenu = array();
	$product_detail_submenu = array();
	$flag=0;
	$nsx='';
	$nsxName='';
	$nsxImg='';
	$xl_submenu_db = new xl_submenu_db();
	
	$pager = new pager();
	$limit = 16;
	$start = $pager->findStart($limit);
	
	if(isset($_GET['cid1']))
	{
		$flag=1;
		$cid = $_GET['cid1'];
		$_SESSION["loai"] = "1/".$_GET['cid1'];
		$result_submenu = $xl_submenu_db->getCategorydetail($cid,$flag);
	}
	else if (isset($_GET['cid2']))
	{
		$flag=2;
		$cid = $_GET['cid2'];
		$_SESSION["loai"] = "2/".$_GET['cid2'];
		$result_submenu = $xl_submenu_db->getCategorydetail($cid,$flag);
	}
	else if (isset($_GET['cid3']))
	{
		$flag=3;
		$cid = $_GET['cid3'];
		$_SESSION["loai"] = "3/".$_GET['cid3'];
		$result_submenu = $xl_submenu_db->getCategorydetail($cid,$flag);
		//var_dump($result_submenu);
	}
	else if (isset($_GET['cid']))
	{
		if ($_GET['cid']=='pro')
		{
			$flag=4;
			$_SESSION["loai"] = "all";
			$result_submenu = array("pro");
		}
		else if ($_GET['cid']=='nsx')
		{
			$flag=5;
			if(isset($_GET['cid']))
			{
				$nsx = $_GET['nsx'];
				//var_dump($nsx );
				$_SESSION["nsxx"] = $nsx;
				//$a = $_SESSION["nsxx"];
				//var_dump($a );
			}
			
			$_SESSION["loai"] = 'nsx';
			$result_submenu = array("nsx");
		}
	}
	else
	{
		$loai = $_SESSION["loai"];
		//var_dump($loai);
		if($loai == "all")
		{
			$flag=4;
			$result_submenu = array("pro");
		}
		else if($loai == "nsx")
		{
			$flag=5;
			$nsx = $_SESSION["nsxx"];
			//var_dump($nsx );
			$result_submenu = array("nsx");
		}
		else
		{
			$loai1 = explode("/",$loai);
			/*var_dump($loai);
			var_dump($loai1);*/
			$flag=$loai1[0];
			$cid = $loai1[1];
			$result_submenu = $xl_submenu_db->getCategorydetail($cid,$flag);
		}
	}
	
	$DisplayActive = '';
	//var_dump(count($result_submenu));
	for($i=0; $i < count($result_submenu); $i++)
	{
		if($flag == 4)
		{
			$product_detail_submenu = $xl_submenu_db->getProduct_promo($start, $limit);
			$total = $xl_submenu_db->countProduct_promo();
		}
		else if ($flag == 5)
		{
			$product_detail_submenu = $xl_submenu_db->getProduct_nsx($nsx, $start, $limit);
			$total = $xl_submenu_db->countProduct_nsx($nsx);
		}
		else
		{
			$total = $xl_submenu_db->countProduct_detail_submenu($result_submenu[$i]['cat1id'],
																	$result_submenu[$i]['cat2id'],
																	$result_submenu[$i]['cat3id'],
																	$flag);
			//var_dump($result_submenu[$i]['cat3id']);	
			$product_detail_submenu = null;
			$product_detail_submenu = $xl_submenu_db->getProduct_detail_submenu($result_submenu[$i]['cat1id'],
																	$result_submenu[$i]['cat2id'],
																	$result_submenu[$i]['cat3id'],
																	$flag, $start, $limit);														
			$DisplayActive = $result_submenu[$i]['cat1id'];
		}
		
		//var_dump($total);
		//var_dump($product_detail_submenu);
		
		//tạo thành phân trang
		$pages = $pager->findPages($total,$limit);
		$thanh_phan_trang = $pager->pageList($_GET['page'],$pages);
?>
        <div class="class" title = "<?php echo $DisplayActive ?>" style="display:block"></div>
<script>
        $( document ).ready(function() {
            var title = $("div.class").attr("title").toLowerCase();
            var isActive = false;
			if(!isActive)
			{
				$(".sub-nav-inner li.menubar").each(function(){
					var name = $(this).find("a").eq(0).attr("href");
					if(name != undefined && name != '')
					{
						name = name.toLowerCase();
					}
					if(("sub_menu.php?cid1=" + title) == name && !isActive)
					{
						$(this).addClass("activated");
						isActive = true;
					}
				});
			}
        });
</script>
<?php
		if(count($product_detail_submenu) > 0)
		{
			if ($flag == 5)
			{
				$nsxName = $product_detail_submenu[0]['nsxName'];
				$nsxImg = $product_detail_submenu[0]['nsxImg'];
			}
?>
			<section id="content">
                <div class="groupProduct">
                    <div class="groupProduct-header">
                        <?php    	
                                if($flag == 1)
                                {
									if($result_submenu[$i]['cat2image'] != ''
										&& $result_submenu[$i]['cat2image'] != null
										&& file_exists('../'.@$result_submenu[$i]['cat2image']))
                                    {
                        ?>
                                        <img src="../<?php echo $result_submenu[$i]['cat2image']; ?>"/>
                                     <?php }
									 else
									{
										echo '<img src="../Templates/img/no photo.gif"/>';
									} ?>
                                    <div> <?php echo $result_submenu[$i]['cat2name'];?> </div>
                        <?php
                                }
                                else if ($flag == 2 || $flag ==3)
                                {
									if($result_submenu[$i]['cat3image'] != ''
										&& $result_submenu[$i]['cat3image'] != null
										&& file_exists('../'.@$result_submenu[$i]['cat3image']))
                                    {
                        ?>
                                        <img src="../<?php echo $result_submenu[$i]['cat3image']; ?>"/>
                                     <?php }
									   ?>
                                    <div> <?php echo $result_submenu[$i]['cat3name'];?> </div>
                        <?php
                                }
								else if ($flag == 4)
								{
						?>
			                        <img src="../Templates/Content/images/icon/promotion.jpg" />
                        			<div>Sản phẩm khuyến mãi</div>
                        <?php
								}
								else if ($flag == 5)
								{
									if($nsxImg != '' && $nsxImg != null
									&& file_exists('../'.@$nsxImg))
                                    {
						?>
                        				<img src="../<?php echo $nsxImg ?>"/>
                              <?php } ?>
                        			<div><?php echo $nsxName ?></div>
						<?php
								}
                        ?>
                   </div>
                </div>
	<?php	
			//var_dump($product_detail_submenu);
	?>
                <div class="groupProduct-content marginCenter" id="featured_products">
                    <ul id="ul-products">
                        <?php
                            $k = 0;
                             for($j = 0; $j < count($product_detail_submenu); $j++)
                             {
                                $CheckPromo = $product_detail_submenu[$j]['promo'];
                                $priceNew = $product_detail_submenu[$j]['tbprice_promo'];
                                $priceOld = $product_detail_submenu[$j]['tbprice'];
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
                                    <a class="" href="Detail.php?id=<?php echo $product_detail_submenu[$j]['id']?>" 
                                                title="<?php echo $product_detail_submenu[$j]['name']?>">
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
                                            if($product_detail_submenu[$j]['image'] != ''
                                            && $product_detail_submenu[$j]['image'] != null)
                                            {
                                                $arrIma = explode("(*_^)", $product_detail_submenu[$j]['image']);
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
																		$image = $product_detail_submenu[$j]['image'];
                                                                        if($product_detail_submenu[$j]['image'] != ''
                                                                        && $product_detail_submenu[$j]['image'] != null)
                                                                        {
                                                                            $arrIma = explode("(*_^)", $product_detail_submenu[$j]['image']);
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
                                                                        ?>',
                                                                        '<?php echo $product_detail_submenu[$j]['name']?>','',
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
                                                                            if ($product_detail_submenu[$j]['tbsize'] == null
                                                                                || $product_detail_submenu[$j]['tbsize'] == '')
                                                                            {
                                                                                echo "n/a";
                                                                            }
                                                                            else
                                                                            {
                                                                                echo $product_detail_submenu[$j]['tbsize'];
                                                                            }
                                                                        ?>',
                                                                        '<?php  
                                                                            if ($product_detail_submenu[$j]['color'] == null
                                                                                || $product_detail_submenu[$j]['color'] == '')
                                                                            {
                                                                                echo "n/a";
                                                                            }
                                                                            else
                                                                            {
                                                                                echo $product_detail_submenu[$j]['color'];
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
                                                            href="Detail.php?id=<?php echo $product_detail_submenu[$j]['id']?>"
                                                            title="<?php echo $product_detail_submenu[$j]['name']?>">
                                                            <h4><?php echo $product_detail_submenu[$j]['name']?></h4>
                                                        </a>
                                                        <a class="exclusive btnAddToCart">
                                                        </a>   
                                                    <?php 
                                                        $id = $product_detail_submenu[$j]['id'];
														$numberlove = $product_detail_submenu[$j]['love'];
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
                                            $id = $product_detail_submenu[$j]['id'];
                                            $name = $product_detail_submenu[$j]['name'];
											$price = $IsPromo ? $priceNew : $priceOld;
                                        ?> 
                                        <input type="hidden" name="jcartToken" value="<?php echo $_SESSION['jcartToken'];?>" />
                                        <input type="hidden" name="my-item-id" value="<?php echo $id ?>" />
                                        <input type="hidden" name="my-item-name" value="<?php echo $name ?>" />
                                        <input type="hidden" name="my-item-price" value="<?php echo ($price == "" ? 0 : $price) ?>" />
                                        <input type="hidden" name="my-item-size" value="<?php echo $product_detail_submenu[$j]['tbsize']?>" />
                                        <input type="hidden" name="my-item-color" value="<?php echo $product_detail_submenu[$j]['color']?>" />
										<input type="hidden" name="my-item-url" value="./Detail.php?id=<?php echo $id?>" />
										<input type="hidden" name="my-item-image" value="<?php echo $image ?>" id="my-item-image" />
                                        <input type="hidden" name="my-item-qty" value="1" size="3" />                                           
                                        <input class="buyproduct" type="submit" name="my-add-button" value="add to cart" style="display:none;" />
                                    </form>
                                    </li>
                        <?php 	
                                $k++;
                                if(($k % 4) == 0)
                                {
                                    echo '</ul> <ul id="ul-products">';
                                }
                            } 
                        ?>
                    </ul>
                        <?php
                            if($flag == 1)
                            {
                        ?>
                                <p align="right">
                                    <a href="sub_menu.php?cid2=<?php echo $product_detail_submenu[0]['cat2id']?>">
                                        Xem thêm...
                                    </a>
                                </p>
                        <?php
                            }
                            else if($flag == 2)
                            {
                        ?>
                                <p align="right">
                                    <a href="sub_menu.php?cid3=<?php echo $product_detail_submenu[0]['cat3id']?>">
                                        Xem thêm...
                                    </a>
                                </p>
                        <?php
                            }
                            else if($flag == 3 || $flag == 5 || $flag == 4)
                            { 
                                if($pages != 1){
                            ?>
                                    <div class="phan_trang" style="width:775px; text-align:center">
                            <?php
                                        echo $thanh_phan_trang;
                            ?>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                </div>
            </section>
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
			break;
		}
	}
?>
<script>
$(document).ready(function () {
	var name = $("div.groupProduct-header div").text().trim();
	if(name != null && name != "")
	{
		$('title').html(name);
	}
});
</script>
                            
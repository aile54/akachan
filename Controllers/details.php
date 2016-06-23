
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-576abf001771b77c"></script>


<?php
	require_once('../Models/xl_productdetail.php');
	$id = $result[0]['id'];
	$name = $result[0]['name'];
	$mavach = $result[0]['mavach'];
	
	$hasImage = true;
	//var_dump($result);
	if($result[0]['image'] != ''
	&& $result[0]['image'] != null)
	{
		$arrIma = explode("(*_^)", $result[0]['image']);
		//var_dump($arrIma);
		$n = count($arrIma);
		if($n > 0)
		{
			if(file_exists('../'.$arrIma[0]))
			{
				$image = $arrIma[0];
			}
			else
			{
				$hasImage  = false;
				$image = "Templates/img/no photo.gif";
			}
		}
		else
		{
			if(file_exists('../'.@$result[0]['image']))
			{
				$image = $result[0]['image'];
			}
			else
			{
				$hasImage  = false;
				$image = "Templates/img/no photo.gif";
			}
		}
	}
	else
	{
		$hasImage  = false;
		$image = "Templates/img/no photo.gif";
	}
	$details = $result[0]['details'];
	$huongdan = $result[0]['huongdan'];
	$status = $result[0]['status'];
	$remark = $result[0]['ghichu'];
	$CheckPromo = $result[0]['promo'];
	$priceNew = $result[0]['tbprice_promo'];
	$priceOld = $result[0]['tbprice'];
	$nsxName = $result[0]['nsxName'];
	$nsxID = $result[0]['nsxID'];
	$nsx = $result[0]['nsxImg'];
	$numberlove = $result[0]['love'];
	$URL = $result[0]['URL'];
	if($nsx == null || $nsx == "")
	{
		$nsx = "Templates/Content/images/Brand/default.png";
	}
	$price = $priceOld;
	$IsPromo = false;
	$SalePercent = 0;
	if($CheckPromo == '1' && $priceNew != null && $priceNew != '' && $priceNew != '0')
	{
		$price = $priceNew;
		$IsPromo = true;
		$SalePercent = intval((($priceOld - $priceNew)/$priceOld)*100);
	}
	$sizeCart = "";
	$colorCart = "";
	if($name != null && $mavach != null)
	{
?>
<?php if($hasImage)
{
?>
<script>
$(document).ready(function () {
	$("#zoom_03").elevateZoom({gallery:'gallery_01',
							cursor: 'pointer', galleryActiveClass: 'active',
							imageCrossfade: true,
							loadingIcon: '../Templates/Content/images/Layout/spinner.gif',
							zoomWindowFadeIn: 500,
							zoomWindowFadeOut: 500,
							lensFadeIn: 500,
							lensFadeOut: 500,
							easing : true,
							zoomWindowWidth:400,
							zoomWindowHeight:400,
							zoomWindowOffetx: 10}); 

	$("#zoom_03").bind("click", function(e) {  
	  return false;
	  var ez = $('#zoom_03').data('elevateZoom');	
		ez.closeAll();
		$.fancybox(ez.getGalleryList());
	  return false;
	});
});
</script>
<?php
}
?>
<script>  
$(document).ready(function () {
	$('title').html($("div.extra-wrap h1").text().trim());
	
	$("ul#ul-products li").each(function(){
		if($(this).closest("div.notResize").length > 0)
		{
		}
		else
		{
			$(this).find("div.info").remove();
			var imgWidth = $(this).find("a img").width();
			var imgHeight = $(this).find("a img").height();
			$(this).find("a img").width(Math.ceil(imgWidth/2));
			$(this).find("a img").height(Math.ceil(imgHeight/2));
			var liWidth = $(this).width();
			$(this).width(Math.ceil(liWidth/2));
			$(this).height(Math.ceil(imgHeight/2));
			$(this).css("min-height", Math.ceil(imgHeight/2) + 10);	
			$(this).css("margin", "0 30px 0");
		}
	});
	$('div.zoom-wrapper div.zoom-left div#gallery_01 a:first').addClass("active");
	
	lastValueSize = "0";
	$("select#cboSize").on("click",function(){
	  var currentValueSize = "0";
	  currentValueSize = $(this).val();
	  var sizeInput = $("form.jcart input:hidden#my-item-size");
	  if(lastValueSize == currentValueSize || currentValueSize == "0") {
		  sizeInput.val(currentValueSize);
	  }
	  else {
		  sizeInput.val(currentValueSize);
		  var size = sizeInput.val();
		  var id = $("form.jcart input:hidden#my-item-id").val();
		  $.post("../Models/xl_productdetail.php", { size: size, id: id })
					.done(function(data) {
						var result = $.parseJSON(data);
						for (var i = 0; i < result.length; i++) {
							var price = result[i]["price"];
							$("form.jcart input:hidden#my-item-price").val(price);
							$("span#price").text(addCommas(price) + " VNĐ");
						}
					  })
					.fail(function() {
					  });
	  }
	  lastValueSize = currentValueSize;
	  currentValueSize = "0";	  
	})
	
	lastValueColor = "0";
	$("select#cboColor").on("click",function(){
	  var currentValueColor = "0";
	  currentValueColor = $(this).val();
	  var colorInput = $("form.jcart input:hidden#my-item-color");
	  if(lastValueColor == currentValueColor || currentValueColor == "0") {
		  colorInput.val(currentValueColor);
	  }
	  else {
		  colorInput.val(currentValueColor);
	  }
	  lastValueColor = currentValueColor;
	  currentValueColor = "0";	  
	})
	
	function addCommas(nStr)
	{
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return x1 + x2;
	}
});
</script>
<section id="content" style="font-family: Calibri">
    <div class = "zoom-wrapper">
        <div class="zoom-left">
        	<?php if ($IsPromo)
			{
			?>
        	<div>
				<div class = "numberSaleDetail"><?php echo '  '.$SalePercent."%" ?></div>
            </div>
            <?php
			}
            ?>
        	<img style="border: 1px solid rgb(232, 232, 230); position: absolute; height: 383.4587629px; width:411px" id="zoom_03" 
            src="../<?php echo $image ?>" data-zoom-image="../<?php echo $image ?>">
            <?php if($hasImage)
				{
			?>
        		<div id="gallery_01" style="width:412px; float:left;">
            <?php
				}
				else
				{
			?>
        		<div id="gallery_01" style="width:412px;">
            <?php
				}
			?>
        	<?php
        	//var_dump($result);
				for($i = 0; $i < count($result); $i++)
				{
					if($result[0]['image'] != ''
					&& $result[0]['image'] != null)
					{
						$arrIma = explode("(*_^)", $result[0]['image']);
						$n = count($arrIma);
						if($n > 0)
						{
							for($j = 0; $j < $n; $j++)
							{
								if(file_exists('../'.$arrIma[$j]))
								{
									$imageInList = $arrIma[$j];
								}
								else
								{
									$imageInList = "Templates/img/no photo.gif";
								}
			?>
								<a href="#" 
                                    data-image="../<?php echo $imageInList; ?>" 
                                 data-zoom-image="../<?php echo $imageInList; ?>" 
                                 class = "elevatezoom-gallery">
                                <img src="../<?php  echo $imageInList; ?>"/>
                                </a>			
			<?php
							}
						}
						else
						{
							if(file_exists('../'.@$result[0]['image']))
							{
								$imageInList = $result[0]['image'];
							}
				?>
                            <a href="#" 
                                data-image="../<?php echo $imageInList; ?>" 
                             data-zoom-image="../<?php echo $imageInList; ?>" 
                             class = "elevatezoom-gallery">
                            <img src="../<?php  echo $imageInList; ?>"/>
                            </a>
                <?php
						}
					}
					else
					{
						$imageInList = "Templates/img/no photo.gif";
			?>
                        <a href="#" 
                            data-image="../<?php echo $imageInList; ?>" 
                         data-zoom-image="../<?php echo $imageInList; ?>" 
                         class = "elevatezoom-gallery">
                        <img src="../<?php  echo $imageInList; ?>"/>
                        </a>
        	<?php
					}
				}
			?>
        	</div>
        </div>
        <div class="zoom-right">
            <div class="product-info">
                <div class="wrapper indent-bot">
                    <div class="extra-wrap">
                        <h1 style="text-transform: capitalize !important;">
                            <?php echo $name ?>
                        </h1>
                        <div class="description">
                            <div class="price">
                            	<b>Nhà sản xuất:</b> 
                                <a href="sub_menu.php?cid=nsx&nsx=<?php echo $nsxID?>">
                                	<img class="image-wrap" src="../<?php echo $nsx ?>" align="middle" style="height:32px; width: 80px;"/>
								</a>
                            </div>
                            <div class="clear"></div>
                            <div class="price">
                                <span class="text-price"><b>Mã sản phẩm:</b></span>
                                <span class="price-new" style="font-weight:bold"><?php echo $mavach ?></span>
                            </div>
                            <div class="clear"></div>
                            <div class="price" style="">
                                <span class="text-price"><b>Tình trạng hàng:</b></span>
                                <span class="price-new" style="font-weight:bold"><?php echo $status ?></span>
                            </div>
                            <div class="clear"></div>
                            <div>
                                <span class="text-price"><b>Tùy chọn mua hàng:</b></span>
                                <br>
                            	<?php
									if($resultSize != false && $resultSize != NULL &&
										count($resultSize) > 0 && $resultSize[0]["tbsize"] != NULL)
									{
								?>
                                        <span class="text-price" style="padding: 0px 10px 0 15px">Size/Loại: </span>
                                        <select id="cboSize">
                            	<?php
										for($i = 0; $i < count($resultSize); $i++)
										{
											if(empty($sizeCart))
											{
												$sizeCart = $size;
											}
											$size = $resultSize[$i]["tbsize"];
								?>
                                            <option value = "<?php echo $size ?>"><?php echo $size ?></option>
                            	<?php
										}
								?>
										</select>
                            	<?php
									}
								?>
                            </div>
                            <div>
                            	<?php
									if($resultColor != false)
									{
								?>
                                		<span class="text-price" style="padding: 0px 13px 0 15px">Màu sắc: </span>
										<select id="cboColor">
                            	<?php
										for($i = 0; $i < count($resultColor); $i++)
										{
											if(empty($colorCart))
											{
												$colorCart = $color;
											}
											$color = $resultColor[$i]["name"];
								?>
                                            <option value = "<?php echo $color ?>"><?php echo $color ?></option>
                            	<?php
										}
								?>
										</select>
                            	<?php
									}
								?>
                            </div>
                            <div class="clear"></div><br />
                            <div class="price" style="width: 350px;">
                                <span class="text-price" style="font-size: 20px"><b>Giá:</b></span>
							<?php 
                                if ($price == null
                                    || $price == ''
                                    || $price == '0')
                                {
							?>
                                <span class="price-new" style="color: #EE0000; font-size: 19px; font-weight:bolder;" id="price">
							<?php 
                                    echo "Liên hệ để biết giá!";
                                }
                                else
                                {
							?>
                                <span class="price-new" style="color: #00B04F; font-size: 19px; font-weight:bolder;" id="price">
							<?php 
                                    echo number_format($price)." VNĐ";
                                }
                            ?>
                                </span>
                                
							<?php if($IsPromo)
                                {
                            ?>
								<span class="price-old" style="">
                                	<?php echo number_format($priceOld)." VNĐ"; ?>
                                </span>
							<?php
                                }
                            ?>
                            </div>
                            <div class="clear"></div>                     
                            <div class="productcart"  style="float:right; margin-top: 0%">
                                <div class="upcart">
                                    <div class="prod-row">
                                        <div class="cart-top">	
                                            <a class="exclusived btnAddToCart" ></a>
                                        </div>
                                    </div>
                                    <?php //if(!empty($_SESSION["username"]))
									{
									?>
                                    <script>
									$(document).ready(function(){
									});
                                    </script>
                                    <div class="prod-row">
                                        <div class="cart-top">
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
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <br />
                            <div class="price" style="">
                                <!--<span class="text-price">Tình trạng:</span>-->
                                <span class="price-new" style="color: black; font-size: 16px"><?php echo $remark ?></span>
                            </div>
                            <div style="color: Black; font-size: 13px; font-style: normal; padding: 0px 0px 20px 50px;">
                            	<!-- test facebook like -->
                                <div class="fb-like" 
                                	data-href="<?php echo $URL; ?>" 
                                    data-layout="button_count" 
                                    data-action="like" 
                                    data-show-faces="true" 
                                    data-share="false" style="float:left;"></div>
                                    
									<!-- Go to www.addthis.com/dashboard to customize your tools -->
									<div class="addthis_native_toolbox"></div>

                                <!-- AddThis Button BEGIN -->
                           <!--     <div class="addthis_toolbox addthis_default_style addthis_16x16_style">
                                    <a class="addthis_counter addthis_pill_style"></a>
                                </div>
                                <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
								<script type="text/javascript" src="../Templates/Scripts/addthis_widget.js"></script>-->
                                <!-- AddThis Button END -->
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>       
		<?php 
			$price = $IsPromo ? $priceNew : $priceOld;
		?> 
        <form method="post" action="" class="jcart">            
            <input type="hidden" name="jcartToken" value="<?php echo $_SESSION['jcartToken'];?>" />
            <input type="hidden" name="my-item-id" value="<?php echo $id ?>" id="my-item-id" />
            <input type="hidden" name="my-item-name" value="<?php echo $name ?>" />
            <input type="hidden" name="my-item-price" value="<?php echo ($price == "" ? 0 : $price) ?>" id="my-item-price" />
            <input type="hidden" name="my-item-size" value="<?php echo $sizeCart ?>" id="my-item-size" />
            <input type="hidden" name="my-item-color" value="<?php echo $colorCart ?>" id="my-item-color" />
            <input type="hidden" name="my-item-image" value="<?php echo $image ?>" id="my-item-image" />
            <input type="hidden" name="my-item-url" value="./Detail.php?id=<?php echo $id?>" />
            <input type="hidden" name="my-item-qty" value="1" size="3" />                                           
           	<input class="buyproduct" type="submit" name="my-add-button" value="add to cart" style="display:none;" />
		</form>
    </div>
    <div id="clearbetween">
    </div>
    <?php
		if($details != null && $details != "")
		{
	?>
    <div class="info-product">
    	<div class="product-header">	
            <div>
                Thông tin sản phẩm:
            </div>
    	</div>
        <div class="detailsInfor">
        	<?php echo $details ?>
        </div>
    </div>
    <?php
		}
		if($huongdan != null && $huongdan != "")
		{
	?>
    <div class="info-product">
    	<div class="product-header">	
            <div>
                Hướng dẫn sử dụng:
            </div>
    	</div>
        <div class="detailsInfor">
        	<?php echo $huongdan ?>
        </div>
    </div>
    <?php
		}
	?>
</section>
<div id="clearbetween">
</div>
<div class="notResize">
<?php include_once('main_product_same.php');?>
</div>
<div id="clearbetween">
</div>
<?php include_once('main_product_typical.php')?>
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
                            
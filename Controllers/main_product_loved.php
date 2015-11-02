<?php
	require_once('../Models/xl_sp_yeuthich.php');
?>

<div class="groupProduct">					
<!--<div class="groupProduct-header">
    <img src="../Templates/Content/images/icon/hot.png" />
    <div>
        Được quan tâm nhiều nhất
    </div>
</div>-->
<script type="text/javascript">
	function gotoPage()
	{
		//window.open('www.facebook.com');
		window.location.href = "http://www.facebook.com";
	}
</script>
<div class="groupProduct-content marginCenter" id="featured_products">
    <ul id="ul-products-hot">
        	<?php
            	$range_num = array();
				if(count($items) >= 8)
				{
					$range_num = getArrayRandomNoRepeat(range(0,count($items)-1), 8);
				}
				else
				{
					$range_num = getArrayRandomNoRepeat(range(0,count($items)-1), count($items));
				}
				for($i = 0; $i < count($range_num); $i++)
				{
			?>
                    <li class="">
                    	<a href="http://<?php echo $items[$range_num[$i]]['url']?>"
                        						title="<?php echo $items[$range_num[$i]]['name']?>">
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
                                alt="" border="0" align="middle">
                    	</a>
                    </li>
            <?php } 
				if(count($range_num) == 0)
				{					
			?>
                <li class=""><a class="" href="home.php" title="San Pham 1">
                <img class="image-wrap" src="../Templates/Content/images/Popular/Hot1.png" alt="" border="0" align="middle">
                </a></li>
                <li class=""><a class="" href="home.php" title="San Pham 2">
                <img class="image-wrap" src="../Templates/Content/images/Popular/Hot2.png" alt="" border="0" align="middle">
                </a></li>
                <li class=""><a class="" href="home.php" title="San Pham 1">
                <img class="image-wrap" src="../Templates/Content/images/Popular/Hot3.png" alt="" border="0" align="middle">
                </a></li>
                <li class=""><a class="" href="home.php" title="San Pham 1">
                <img class="image-wrap" src="../Templates/Content/images/Popular/Hot4.png" alt="" border="0" align="middle">
                </a></li>
                <li class=""><a class="" href="home.php" title="San Pham 2">
                <img class="image-wrap" src="../Templates/Content/images/Popular/Hot5.png" alt="" border="0" align="middle">
                </a></li>
                <li class=""><a class="" href="home.php" title="San Pham 1">
                <img class="image-wrap" src="../Templates/Content/images/Popular/Hot6.png" alt="" border="0" align="middle">
                </a></li>
                <li class=""><a class="" href="home.php" title="San Pham 2">
                <img class="image-wrap" src="../Templates/Content/images/Popular/Hot7.png" alt="" border="0" align="middle">
                </a></li>
                <li class=""><a class="" href="home.php" title="San Pham 1">
                <img class="image-wrap" src="../Templates/Content/images/Popular/Hot8.png" alt="" border="0" align="middle">
                </a></li>
            <?php
				}
			?>
    </ul>
</div>
</div>
<div id="clearbetween">
</div>
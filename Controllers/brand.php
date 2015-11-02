<?php
	require_once('../Models/xl_brand.php');
?>
<section id="content">
    <div class="groupProduct">					
        <div class="groupBrand-header">
            <div>
                Các thương hiệu có mặt tại Akachan-shop
            </div>
        </div>
        <div class="groupProduct-content marginCenter" id="featured_products">
            <ul id="ul-products-hot" style="margin:0px 0px 0px 20px">
            	<?php 
					for($i = 0; $i < count($result); $i++)
					{
						$alias = $result[$i]['alias'];
						$name = $result[$i]['name'];
						$image = $result[$i]['image'];
						$nsxID = $result[$i]['id'];
				?>
                	<li class="brand">
                    	<a href="sub_menu.php?cid=nsx&nsx=<?php echo $nsxID?>"
                        	title="<?php echo $name ?>">
						<?php 
                            if($image != null && $image != "")
							{
                        ?>
                            <img class="image-wrap" src="../<?php echo $image ?>"
                                align="middle" />
						<?php 
                            }
							else
							{
                        ?>
                            <img class="image-wrap" src="../Templates/Content/images/Brand/default.png"
                                align="middle" />
						<?php 
                            }
                        ?>
                		</a>
                    </li>
				<?php 
					}
				?>
            </ul>
        </div>
    </div>
</section>
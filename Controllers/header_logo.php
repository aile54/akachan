<?php
	require_once('../Models/xl_logo.php');
	require_once('../Models/xl_promo_ship.php');
?>
<a href="../index.php">
    <img class="logoImage" id='logo' src="<?php echo $result_logo?>" />
</a>
<?php
	if($result_ship != null
		|| count($result_ship) > 0)
	{
?>
		<a href="../Views/Transport.php">
            <div id="sitetag">
                <div id="s2" style="position: relative; width: 270px; height: 45px; overflow: hidden;">
                	<?php
                    	for($i = 0; $i < count($result_ship); $i++)
						{
					?>
                            <img style="padding-top: 3px; padding-left: 50px; position: absolute;
	                            left: 0px; display: block; z-index: 3; opacity: 1; width: 220px; height: 43px;"
    	                        src="../<?php echo $result_ship[$i]['image'];?>">
                    <?php
						}
					?>
                    <!--<img style="padding-top: 3px; padding-left: 50px; position: absolute;
                        left: 0px; display: block; z-index: 2; opacity: 1; width: 220px; height: 43px;"
                        src="../Templates/Content/images/promotion/carters_FS_nav_banner_slide2.jpg">-->
                </div>
            </div>
        </a>
<?php
	}
?>
<!--<a href="../Views/Transport.php">
    <div id="sitetag">
        <div id="s2" style="position: relative; width: 270px; height: 45px; overflow: hidden;">
            <img style="padding-top: 3px; padding-left: 50px; position: absolute;
                left: 0px; display: block; z-index: 3; opacity: 1; width: 220px; height: 43px;"
                src="../Templates/Content/images/promotion/carters_FS_nav_banner_slide1.jpg">
            <img style="padding-top: 3px; padding-left: 50px; position: absolute;
                left: 0px; display: block; z-index: 2; opacity: 1; width: 220px; height: 43px;"
                src="../Templates/Content/images/promotion/carters_FS_nav_banner_slide2.jpg">
        </div>
    </div>
</a>-->
<?php include_once('cart.php')?>
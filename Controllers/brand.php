<?php
	require_once('../Models/xl_brand.php');
?>
<link rel="stylesheet" type="text/css" href="../Templates/Plugin/als/als_style.css"/>
<script type="text/javascript" src="../Templates/Plugin/als/jquery.als-1.7.min.js"></script>

<section id="content">
    <div class="groupProduct">					
        <div class="groupBrand-header">
            <div>
                Các thương hiệu có mặt tại Akachan-shop
            </div>
        </div>
        <div class="groupProduct-content marginCenter" id="featured_products">
            <!-- in our example the container has id="my-als-list" thus ALS is initialized like this -->
            
            <script type="text/javascript">
				$(document).ready(function(){
					$("#demo3").als({
						visible_items: 8,
						scrolling_items: 2,
						orientation: "horizontal",
						circular: "yes",
						autoscroll: "yes",
						interval: 5000,
						speed: 400,
						easing: "linear",
						direction: "right",
						start_from: 1
					});
				});	
            </script>

            <!-- define a container with class "als-container": this will be the object binded to ALS; we suggest to give it an ID
            to retrieve it easily during ALS inizialization -->
            
            <div class="als-container" id="demo3">
            
                <!-- if you choose manual scrolling (which is set by default), insert <span> with class "als-prev"  and "als-next": 
                they define the buttons "previous" and "next"; within the <span> you can use images or simple text -->	
                
                <span class="als-prev" data-id="als-prev_3">
                	<img src="../Templates/Content/images/icon/back.ico" alt="prev" title="previous" width="25px">
                </span>
                
                <!-- define a container with class "als-viewport": this will be the viewport for the list visible elements -->
                
                <div class="als-viewport">
                
                    <!-- define a container with class "als-wrapper": this will be the wrapper for the list elements, 
                    it can be a classic <ul> element or even a <div> element -->
                    
                    <ul class="als-wrapper">
						<?php 
                            for($i = 0; $i < count($result); $i++)
                            {
                                $alias = $result[$i]['alias'];
                                $name = $result[$i]['name'];
                                $image = $result[$i]['image'];
                                $nsxID = $result[$i]['id'];
                        ?>
                            <li class="als-item">
                                <a href="sub_menu.php?cid=nsx&nsx=<?php echo $nsxID?>"
                                    title="<?php echo $name ?>">
                                <?php 
                                    if($image != null && $image != "")
                                    {
                                ?>
                                    <img class="" src="../<?php echo $image ?>"
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
                    </ul> <!-- als-wrapper end -->
                </div> <!-- als-viewport end -->
                <span class="als-next" data-id="als-next_3">
                	<img src="../Templates/Content/images/icon/next.ico" alt="next" title="next" width="25px">
                </span>
            </div> <!-- als-container end -->
            
            <div id="clearbetween"></div>
        </div>
    </div>
</section>
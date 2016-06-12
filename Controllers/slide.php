<?php
	require_once('../Models/xl_slide.php');
?>
<script>
$(document).ready(function () {
	$('div.carousel ol.carousel-indicators li:first').addClass("active");
	$('div.carousel div.carousel-inner div.item:first').addClass("active");
});
</script>
<div id="this-carousel-id" class="carousel slide">
        <ol class="carousel-indicators" style="z-index:1">
        	<?php 
			$isExist = false;
			if($result != null && count($result) > 0)
			{
				$isExist = true;
			}
			if($isExist)
			{
				//var_dump($result);
				for($i = 0; $i < count($result); $i++)
				{
			?>
        	<li data-target="#this-carousel-id" data-slide-to="<?php echo $i ?>" class=""></li>
			<?php 
                }
			}
			else
			{
			?>
        	<li data-target="#this-carousel-id" data-slide-to="0" class=""></li>
        	<li data-target="#this-carousel-id" data-slide-to="1" class=""></li>
			<?php 
			}
            ?>
        </ol>
        <div class="carousel-inner">
        	<?php 
			if($isExist)
			{
				for($i = 0; $i < count($result); $i++)
				{
			?>
            <div class="item">
                <a href='<?php echo $result[$i]["url"]?>'>
                    <img src="../<?php echo $result[$i]['image'] ?>" alt="../<?php echo $result[$i]['name'] ?>" />
                </a>
            </div>
			<?php 
                }
			}
			else
			{
			?>
            <div class="item">
                <a>
                    <img src="../Templates/Content/images/Slide/default.png" alt="" />
                </a>
            </div>
            <div class="item">
                <a>
                    <img src="../Templates/Content/images/Slide/default.png" alt="" />
                </a>
            </div>
			<?php 
			}
			?>
        </div>
        <a class="carousel-control left" href="#this-carousel-id" data-slide="prev">
            <span class="icon-prev" style="color:white"></span>
        </a>
        <a class="carousel-control right" href="#this-carousel-id" data-slide="next">
            <span class="icon-next" style="color:white"></span>
        </a>
    </div>
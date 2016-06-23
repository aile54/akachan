<?php
	require_once('../Models/xl_menu_bar.php');
	//var_dump($result);
?>
<style>
</style>
<script>
$(document).ready(function(e) {
    divScroll();
	$(window).resize(function()
	{
    	divScroll();
	});
	
	$('div.scrollingHotSpotLeft').css('left', $('.imageLogo').width());
});

function divScroll()
{
	//$("#ulSubTopMenu").smoothDivScroll({
		//hotSpotScrolling: true,
		//mousewheelScrolling: "",
	//});
}
</script>
<div class="bg-header" style="margin: auto;">
    <ul id="ulSubTopMenu" class="sub-nav-inner">
    	<li class="menubar">
            <a href="Home.php"><em>Trang chủ</em></a>
        </li>
    <?php 
		for($i = 0; $i < count($result); $i++)
		{
			$isFirstOk = false;
			$cid1 = $result[$i]['id'];
			$first1 = $result[$i]['firstname'];
			$second1 = $result[$i]['secondname'];
			if($i >0)
			{
				$first2 = $result[$i-1]['firstname'];
				if($first1 != $first2)
				{
					$isFirstOk = true;
				}
			}
			else
			{
				$isFirstOk = true;
			}
			if($isFirstOk)
			{
	?>
        <li class="dropdown menubar">
            <a href="sub_menu.php?cid1=<?php echo $cid1 ?>" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="100" on id="dropdownMenu<?php echo $cid1?>">
                <em><?php echo $first1 ?></em>
            </a>
        </li>
	<?php 
			}
		}
	?>
    
    	<li class="dropdown menubar">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="100" on id="dropdownMenu99">
                <em>Hướng dẫn</em>
            </a>
        </li>
    	<li class="menubar">
            <a href="Contact.php"><em>Liên Hệ</em></a>
        </li>
        <li class="menubar">
            <a href="Contact.php"><em>Khuyến Mãi</em></a>
        </li>
    </ul>
    <!-- Detail dropdownmenu -->
    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu99" style="width:900px">
        <li>
            <div class="menu_category_left">
                <?php 
                    for($j = 0; $j < count($resultHDan); $j++)
                    {
                ?>
                        <div class="menu_title">
                            <a href="HuongDan.php?id=<?php echo $resultHDan[$j]["id"] ?>&key=menu" 
                                                title="<?php echo $resultHDan[$j]["name"] ?>">
                                <?php echo $resultHDan[$j]["name"] ?>
                            </a>
                        </div>
                <?php 
                    }
                ?>
             </div>
         </li>
    </ul>
	<?php 
		for($i = 0; $i < count($result); $i++)
		{
			$isFirstOk = false;
			$cid1 = $result[$i]['id'];
			$first1 = $result[$i]['firstname'];
			$second1 = $result[$i]['secondname'];
			if($i >0)
			{
				$first2 = $result[$i-1]['firstname'];
				if($first1 != $first2)
				{
					$isFirstOk = true;
				}
			}
			else
			{
				$isFirstOk = true;
			}
			if($isFirstOk)
			{
				if($second1 != null)
				{
			?>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu<?php echo $cid1?>">
            <?php 
					for($j = 0; $j < count($result); $j++)
					{
						$isSecondOk = false;
						$cid2 = $result[$j]['cid2'];
						$first = $result[$j]['firstname'];
						$second1 = $result[$j]['secondname'];
						$secondimage = $result[$j]['secondimage'];
						//var_dump($result[$j]);
						
						if($j >0)
						{
							$second2 = $result[$j-1]['secondname'];
							
							if($second1 != $second2)
							{
								$isSecondOk = true;
							}
						}
						else
						{
							$isSecondOk = true;
						}
						if($isSecondOk && $first == $first1)
						{
            ?>
                <li>
                    <div class="menu_category_left">
                        <div class="menu_title">
                            <a href="sub_menu.php?cid2=<?php echo $cid2 ?>" title="<?php echo $second1 ?>">
                                <?php echo $second1 ?>
                            </a>
                        </div>
                        <div class="menu_sub_left">
                        <?php 
                            for($k = 0; $k < count($result); $k++)
                            {
                                $isThirdOk = false;
								$cid3 = $result[$k]['cid3'];
                                $first = $result[$k]['firstname'];
                                $second = $result[$k]['secondname'];
                                $third1 = $result[$k]['thirdname'];
								
                                if($k >0)
                                {
                                    $third2 = $result[$k-1]['thirdname'];
                                    if($third1 != $third2)
                                    {
                                        $isThirdOk = true;
                                    }
                                }
                                else 
                                {
                                    $isThirdOk = true;
                                }
								
                                if($isThirdOk && $first == $first1 && $second == $second1 && $third1 != null)
                                {
                        ?>
                             <div class="menu_sub_left_text">
                                <a href="sub_menu.php?cid3=<?php echo $cid3 ?>" title="<?php echo $third1 ?>">
                                    _ <?php echo $third1 ?>
                                </a>
                             </div>
                        <?php 
                                }
                            }
                        ?>
                        </div>
                        <div class="menu_sub_img">
                        <?php 
							if($secondimage != null && $secondimage != "")
							{
						?>
                            <img src="../<?php echo $secondimage ?>">
                        <?php
							}
							else
							{
						?>
                            <img src="../Templates/Content/images/LargeMenu/default.png">
                        <?php
							}
						?>
                        </div>
                    </div>
                </li>
				<?php 
                        }
                    }
                ?>
            </ul>
			<?php 
				}
			}
		}
	?>
</div>
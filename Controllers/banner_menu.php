<?php
	include_once('../Controllers/news.php');
	$titleNews = new News();
	$result_title = $titleNews->SelectTitle();
	//var_dump($result_title);
?>
<div id="bannermenu">
    <aside class="support">
    	<a href="../Views/News.php" style="padding-left:10px">
            <div id="lbsupport">
            </div>
        </a>
        <marquee behavior="scroll"  direction="up" scrollamount="2" height="210px" style="" onMouseOver="this.stop()" onMouseOut="this.start()">
        <div id="chatlist" >
            <ul>
            	<?php
					foreach($result_title as $detail)
					{
				?>
                        <li>
                            <div class="news">
                                <!--<div class="bodynews" style="width:30px; float:left;">
                                    <img src="" />
                                    <p class="date"><?php //echo $detail['id'];?></p>
                                </div>-->
                                <div class="bodynews" style="width:180px; float:left; padding-left: 10px">
                                    <div class="infornews">
                                    	<img src="../Templates/Content/images/News/1382736218_calendar.png" style = "width:10px;"/>
                                        <a href="../Views/News_detail.php?id=<?php echo $detail['id']; ?>" 
                                        style="padding-left:10px">
											<?php echo $detail['name'];?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                <?php
					}
                ?>
            </ul>
        </div>
        </marquee>
    </aside>
    <?php include('../Controllers/slide.php'); ?>
</div>

<!--<li>
                    <div class="news">
                        <div class="bodynews" style="width:30px; float:left;">
                            <img src="../Templates/Content/images/News/1382736218_calendar.png" />
                            <p class="date">02</p>
                        </div>
                        <div class="bodynews" style="width:165px; float:left; padding-left: 10px">
                            <div class="infornews">anh em mình là một gia đình một gia đình là chơi hết mình chơi hết mình là lên thiên đình lên thiên đình rồi nhảy xập xình nhảy xập xình là nhảy xập xình
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="news">
                        <div class="bodynews" style="width:30px; float:left;">
                            <img src="../Templates/Content/images/News/1382736218_calendar.png" />
                            <p class="date">03</p>
                        </div>
                        <div class="bodynews" style="width:165px; float:left; padding-left: 10px">
                            <div class="infornews">lắc cái đầu là lắc cái đầu lắc cái đầu để cho sạch gầu lắc cái mông là lắc cái mông lắc cái mông để giống con công bay 
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="news">
                        <div class="bodynews" style="width:30px; float:left;">
                            <img src="../Templates/Content/images/News/1382736218_calendar.png" />
                            <p class="date">04</p>
                        </div>
                        <div class="bodynews" style="width:165px; float:left; padding-left: 10px">
                            <div class="infornews">lên nào là bay lên nào lên trời cao là lên trời cao lên trời cao ta gặp chị hằng gặp chị hằng ta nói với chị Ilove YOU là Ilove You..::))
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="news">
                        <div class="bodynews" style="width:30px; float:left;">
                            <img src="../Templates/Content/images/News/1382736218_calendar.png" />
                            <p class="date">01</p>
                        </div>
                        <div class="bodynews" style="width:165px; float:left; padding-left: 10px">
                            <div class="infornews">lên là lên là lên là lên lên nóc nhà là bắt con gà chọc tiết gà là chọc tiết gà vặt﻿ lông gà là vặt lông gà ăn thịt gà là ăn thịt gà
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="news">
                        <div class="bodynews" style="width:30px; float:left;">
                            <img src="../Templates/Content/images/News/1382736218_calendar.png" />
                            <p class="date">02</p>
                        </div>
                        <div class="bodynews" style="width:165px; float:left; padding-left: 10px">
                            <div class="infornews">anh em mình là một gia đình một gia đình là chơi hết mình chơi hết mình là lên thiên đình lên thiên đình rồi nhảy xập xình nhảy xập xình là nhảy xập xình
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="news">
                        <div class="bodynews" style="width:30px; float:left;">
                            <img src="../Templates/Content/images/News/1382736218_calendar.png" />
                            <p class="date">03</p>
                        </div>
                        <div class="bodynews" style="width:165px; float:left; padding-left: 10px">
                            <div class="infornews">lắc cái đầu là lắc cái đầu lắc cái đầu để cho sạch gầu lắc cái mông là lắc cái mông lắc cái mông để giống con công bay 
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="news">
                        <div class="bodynews" style="width:30px; float:left;">
                            <img src="../Templates/Content/images/News/1382736218_calendar.png" />
                            <p class="date">04</p>
                        </div>
                        <div class="bodynews" style="width:165px; float:left; padding-left: 10px">
                            <div class="infornews">lên nào là bay lên nào lên trời cao là lên trời cao lên trời cao ta gặp chị hằng gặp chị hằng ta nói với chị Ilove YOU là Ilove You..::))
                            </div>
                        </div>
                    </div>
                </li>-->
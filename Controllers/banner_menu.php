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
        <marquee behavior="scroll"  direction="up" scrollamount="2" height="220px"  style="margin-top:-6px" onMouseOver="this.stop()" onMouseOut="this.start()">
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
    <div id="clearbetween"></div>
</div>
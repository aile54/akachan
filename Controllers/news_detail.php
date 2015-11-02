<?php
	require_once('../Models/xl_news.php');
	$id_news = $_GET['id'];
	$xl_slide_db = new xl_news_db();
	$result = $xl_slide_db->GetNews($id_news);
	//var_dump($result);
?>
	<section id="content">
        <div class="groupProduct">
            <div class="groupProduct-header">
                <div class = "header-news">
                    <?php echo $result[0]['name']?>
                </div>
            </div>
        </div>
        <div class="detailsnews">
            <div class="newsdetails-info">
                <div class="infonews">
                    <?php echo $result[0]['detailsInfo'] ?>
                </div>
                <div class="details-Info">
					<?php
						?>
                        <img src="../<?php echo $result[0]['image'] ?>" />
                        <?php
						echo "</br>";
                        echo $result[0]['details'];
                    ?>                                	
            	</div>                               	
            </div>
            <div>
    <p align="right">
        <a href="http://localhost:1803/akachan/Views/News.php">
            Trở về "Góc Chia Sẻ"
        </a>
    </p>
    </div>
        </div>
    <div id="clearbetween">
    </div>
    </section>
    <div id="clearbetween">
    </div>
    
<?php
	require_once('../Models/xl_huongdan.php');
	$id_news = $_GET['id'];
	$xl_slide_db = new xl_hd_db();
	$result = $xl_slide_db->GetHD($id_news);
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
                <div class="details-Info">
					<?php
						if($result[0]['image'] != null && $result[0]['image'] != '')
						{
							?>
							<img src="../<?php echo $result[0]['image'] ?>" />
							<?php
							echo "</br>";
						}
                        echo $result[0]['details'];
                    ?>                                	
            	</div>                               	
            </div>
        </div>
    <div id="clearbetween">
    </div>
    </section>
    <div id="clearbetween">
    </div>
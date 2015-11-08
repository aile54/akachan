<style>
ul#others li a {
    color: #000066;
    border-radius: 4px 4px 0 0;
}

ul#others li a:hover {
    color: blue;
}
</style>
<?php
	require_once('../Models/xl_news.php');
	$id_news = $_GET['id'];
	$xl_slide_db = new xl_news_db();
	$result = $xl_slide_db->GetNews($id_news);
	$result2 = $xl_slide_db->SelectNews();
	//var_dump($result);
?>
	<section id="content">
        <div class="groupProduct">
            <div class="groupProduct-header">
                <div class = "header-news">
                    <?php echo $result[0]['name']?>
                    
					<script>
                        $(document).ready(function() {
                            new Share(".share-button");
                        });
                    </script>
                    <div style="color: Black; font-size: 13px; font-style: normal; padding: 0px 15px 0px 0px; float:right">
                        <div class ="share-button"></div>
                    </div>
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
    <section id="content">
      <div class="groupProduct" style="padding:10px 0px 0px 0px">
        <div class="product-header" >
            <div class="header-news">
                Các tin khác
            </div>
        </div>
      </div>
      <br>
      <div class="details-Info">
        <ul id="others">
		  <?php 
			  for($i = 0; $i < count($result2); $i++)
			  {
				  if($result2[$i]["id"] != $result[0]['id'])
				  {
		  ?>
          			<li>
                    	<a href="../Views/News_detail.php?id=<?php echo $result2[$i]["id"] ?>" style="float:left">
                        	- <?php echo $result2[$i]["name"] ?>
                        </a>
                        <p style="font-size:12px; font-style:italic"> &nbsp; 
							<?php echo date('d-m-Y', $result2[$i]["date_add"]) ?>
                        </p>
                    </li>
		  <?php
				  }
			  }
		  ?>
        </ul> 
      </div>
   </section>
      
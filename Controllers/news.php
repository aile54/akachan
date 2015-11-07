<script>
	$(document).ready(function() {
		var numlink = 0;
		$(".newsdetails:nth-child(2n-1) div#link-newsdetails a").each(function(){
			numlink++;
			var height1 = $(this).css("height");
			var outerHeight1 = $(this).outerHeight();
			var height2 = $(".newsdetails:nth-child(" + 1 * numlink + ") div#link-newsdetails a").css("height");
			var outerHeight2 = $(".newsdetails:nth-child(" + 1 * numlink + ") div#link-newsdetails a").outerHeight();
			var height3 = "100px";
			var outerHeight3 = "100";
			if(height1 >= height2)
			{
				height3 = height1;
				outerHeight3 = outerHeight1;
			}
			else
			{
				height3 = height2;
				outerHeight3 = outerHeight2;
			}
			$(this).parent().height(height3);
			$(".newsdetails:nth-child(" + 1 * numlink + ") div#link-newsdetails").height(height3);
				
			$(this).parent().parent().height(outerHeight3 + 150 + "px");
			$(".newsdetails:nth-child(" + 1 * numlink + ") div#link-newsdetails").parent().height(outerHeight3 + 150 + "px");
		});
	});
</script>

<?php
	require_once('../Models/xl_news.php');

	class News
	{
		function SelectTitle()
		{
			$xl_slide_db = new xl_news_db();
			$result = $xl_slide_db->SelectNews();
			return $result;
		}
		
		function Getnews()
		{
			$xl_slide_db = new xl_news_db();
			$titles = $xl_slide_db->SelectNews();
			?>
            <section id="content">
                <div class="groupProduct">
                    <div class="groupProduct-header">
                        <div>
                            Góc Chia Sẻ
                        </div>
                    </div>
                </div>
                <div class="groupProduct-content marginCenter" id="featured_products">
                    		<ul id="ul-products">
					<?php
                        if(count($titles) > 0)
                        {
                            foreach($titles as $title)
                            {
								$details = $title['details'];
                    ?>
                            <li style ="width: 47%; margin: 0 20px 0px 0px;">
                                <div class="newsdetails">		
                                    <!--echo '<a href="../Views/News_detail.php?id='.$title['id'].'" -->
                                    <div id = "link-newsdetails"> 
                                        <a href="../Views/News_detail.php?id=<?php echo $title['id'] ?>"
                                        style="color:#000066">
                                            <?php echo $title['name']; ?>
                                        </a></br>
                                    </div>
                                    <div class="newsdetails-info">
                                        <div class="newsimage">
                                            <a href="../Views/News_detail.php?id=<?php echo $title['id'] ?>">
                                            	<?php if ( strlen ($title['image']) > 5)
												{
												?>
                                                	<img src="../<?php echo $title['image']?>" />
                                                <?php
												} else
												{
												?>
                                                	<img src="../Templates/Content/images/News/news.png" />
                                                <?php
												}
												?>
                                            </a>
                                        </div>
                                        <div class="newsinfo">
                                            <?php echo mb_substr($details, 0, 150,'UTF-8') ?>
                                            <?php if ( strlen ($details) > 0)
                                            {
                                            ?>
                                                ... 
                                                <a href="../Views/News_detail.php?id=<?php echo $title['id'] ?>" 
                                                style="font-size:12px; ">
                                                 Đọc thêm
                                                </a>
                                                
                                            <?php
                                            }
                                            ?>
                                        </div>                                	
                                    </div>	
                                </div>
                            </li>
                    <?php
                            }
                        }
                    ?>
                         	</ul>
            	</div>
                <div id="clearbetween">
                </div>
                
            </section>
            <div id="clearbetween">
            </div>
			<?php
		}
	}	
?>

<!--
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like" data-href="https://www.facebook.com/akachanshop.hangnhatnoidia?fref=ts" data-width="500" data-layout="standard" data-action="like" data-show-faces="true" data-share="false"></div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-page" data-href="https://www.facebook.com/akachanshop.hangnhatnoidia?fref=ts" data-width="500" data-height="500" data-hide-cover="true" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/akachanshop.hangnhatnoidia?fref=ts"><a href="https://www.facebook.com/akachanshop.hangnhatnoidia?fref=ts">Akachan Shop</a></blockquote></div></div>-->
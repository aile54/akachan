<div class = "bigfooter">
	<div style="margin: 0 auto; width: 1000px;">
		<img src="../Templates/Content/images/footer_circles.png"/>
    </div>
    <div style="background-color: #0066DA; margin-top: -20px;">
        <!--<div id="footer-logo3">
        </div>-->
        <div id="footer-logo2">
            <?php include_once('transport_info.php');?>
            <div id="clearbetween">
            </div>
            <footer>
            <?php 
                require_once('../Models/xl_footer.php');
                echo $result_footer[0]["footer"];
            ?>
               
            </footer>
        </div>
    </div>
    <div class = "clear"></div>
</div>
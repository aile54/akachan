<?php 
	include_once('../Models/xl_transport_info.php');
	//var_dump($result_transport_info);
?>
<script>
	$(document).ready(function () {
		$("#footer-logo2 .groupTransport").css("color", "white");
		$("article.home .groupTransport").css("color", "#0066DA");
		
		$("#transportImage_Parent, #transportImage_Parent > img").css("overflow", "hidden").css("max-height", $("#tranportDetail_Parent").height());
		//chơi vs hidden + click vào xem thêm
		//$("#transportImage_Parent").css("overflow", "hidden").css("max-height", $("#tranportDetail_Parent").height());
	});
</script>
<div class="groupTransport">
    <div class = "groupTransport-header">
        <div class="groupTransport-header-content">
            Hướng dẫn đặt hàng
        </div>
    </div>
    <div class="transportImage" id="transportImage_Parent">
    	<?php 
			if(count($result_transport_info) > 3)
			{
				if($result_transport_info[3]['image'] != null )
				{
					echo '<img src="../'.$result_transport_info[3]['image'].'"/>';
				}
				else
				{
					?>
						<img src="../Templates/Content/images/Transport/model.png"/>
                    <?php
				}
			}
			else
			{
		?>
        		<img src="../Templates/Content/images/Transport/model.png"/>
      	<?php
			}
        ?>
    </div>
    <div style="float:left" id="tranportDetail_Parent">
        <div class="transport">
            <div class="transport-header">
                <img src="../Templates/Content/images/Transport/transport.png"/>
                <div>
                    <?php echo $result_transport_info[0]['name']; ?>
                </div>
            </div>
            <div class="transport-content">
                <?php echo $result_transport_info[0]['details']; ?>
            </div>
        </div>
        <div class="transport">
            <div class="transport-header">
                <img src="../Templates/Content/images/Transport/payment.png"/>
                <div>
                    <?php echo $result_transport_info[1]['name']; ?>
                </div>
            </div>
            <div class="transport-content">
                <div>
                    <div class="transport-content-details">							
                        <?php echo $result_transport_info[1]['details']; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="transport">
            <div class="transport-header">
                <img src="../Templates/Content/images/Transport/gift.png"/>
                <div>
                    <?php echo $result_transport_info[2]['name']; ?>
                </div>
            </div>
            <div class="transport-content">
                <div>
                    <div class="transport-content-details">
                        <?php echo $result_transport_info[2]['details']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearBoth"></div>
</div>
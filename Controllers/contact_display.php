<?php 
	require_once('../Models/xl_contact_display.php');
	$phone = '';
?>
<script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
<div class="contact">
    <div class="span4" style="float: right; width: auto;">
        <div class="yahoo" style="float: right; margin-left: 10px; margin-right: 10px; margin-top: 4px;">
        	<?php
            	for($i=0; $i < count($result_contact); $i++)
				{
					$j = $i;
					$link1 = '';
					$link2 = '';
					if($result_contact[$i]["phone"] != null && $result_contact[$i]["phone"] != '')
					{
						if($phone != "")
						{
							$phone .=" - ";
						}
						$phone .= $result_contact[$i]["phone"];
					}
					if($result_contact[$i]["loai"] == 0)
					{
						$link1 = "http://opi.yahoo.com/online?u=".$result_contact[$i]['nickname']."&amp;t=5";
						$link2 = "ymsgr:sendim?".$result_contact[$i]['nickname'];
					}
					else if($result_contact[$i]["loai"] == 1)
					{
						$link1 = "http://mystatus.skype.com/smallicon/".$result_contact[$i]['nickname'];
						$link2 = "skype:".$result_contact[$i]['nickname']."?chat";
					}
			?>
            		<a href=<?php echo $link2;?> 
                    	style="font-family: 'OpenSans-Bold'; color: #333; text-decoration: none; color: black; font-weight: bold;">
			                <img src=<?php echo $link1;?> alt="" style="vertical-align: -1px; margin-right: 4px;"/>
                                    Hỗ trợ <?php echo $j+1;?>
                	</a>
            <?php
				}
			?>
        </div>
        <?php 
			if($phone != "")
			{
		?>
                <div class="phone">
                    <img src="../Templates/Content/images/phone.png" style="margin-top: 8px; margin-right: 5px;
                        float: left">
                    <strong style="margin-top: 4px; margin-right: 20px; float: right; color: black">
                        <?php echo $phone;?>
                    </strong>
                </div>
        <?php
			}
		?>
    </div>
</div>
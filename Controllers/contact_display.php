<?php 
	require_once('../Models/xl_contact_display.php');
	$phone = '';
?>
<script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
<div class="contact">
	<div class="span4" style="float: left; width: auto;">
        <!-- Search Box -->
        <div style="padding-top:3px; float:left">
            <form name="search-box" action="../Views/Search_result.php" class="form-search-box">
                <input type="text" name="q" value="" class="search-textbox" placeholder="Bạn cần tìm gì?" autocomplete="off" role="textbox" style="width: 120px;padding: 4px 6px 15px;">
                <input type="submit" hidden="hidden" />
            </form>
        </div>
        <a class="icon" style="float:right" onclick='$("[name=search-box]").submit();'></a>
        <div class="clear"></div>
    </div>
    <div class="span4" style="float: right; width: auto;margin-left: 0px;">
    	<?php
    	if($result_setting != null && count($result_setting) > 0)
			{
		?>
                <div class="mail" style="float: right; margin-left: 5px; margin-right: 5px; margin-top: 4px;">
                    <img src="../Templates/Content/images/mail.ico" style="margin-right: 5px;
                        float: left; width:20px" />
                    <strong style="margin-right: 5px; float: right; color: black">
                        <?php echo $result_setting[0]["email"]?>
                    </strong>
                </div>
                <div class="fb" style="float: right; margin-left: 5px; margin-right: 5px; margin-top: 4px;">
                    <img src="../Templates/Content/images/icon/facebook.png" style="margin-right: 5px;
                        float: left; width:20px" />
                        
                    <strong style="margin-right: 5px; float: right; color: black">
                    	<a href='http://<?php echo $result_setting[0]["facebook"]?>'> Facebook </a> 
                        
                    /
                        <a href='http://<?php echo $result_setting[0]["fanpage"]?>'> Fanpage </a> 
                    </strong>
                    
                </div>
        <?php
			}
		?>
        <div class="yahoo" style="float: right; margin-left: 10px; margin-right: 10px;">
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
                    <strong style="margin-top: 4px; float: right; color: black">
                        <?php echo $phone;?>
                    </strong>
                </div>
        <?php
			}
		?>
    </div>
</div>
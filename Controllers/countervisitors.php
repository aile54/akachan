<? include('counter.php')?>
<div style="position: fixed; left: 0; bottom: 50px; z-index: 1000; cursor: pointer; background-image: url(../Templates/Content/images/icon/paper.png); background-size: 100% 100%" id="counter_visitors">
	<div style="" class="form-horizontal">
        <div class="control-group">
            <label class="control-label">Lượt truy đang truy cập:</label>
            <div class="controls">
            	<?php echo ($row_set->online+online()) ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Tổng lượt truy cập:</label>
            <div class="controls">
            	<?php echo ($row_set->visitall+$_SESSION['counter']['allcounter'])?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Thành viên:</label>
            <div class="controls">
            	<span style='color:#b10000'>
					<?
                        $tbl = new table('user');
                        $res = $tbl -> loadAll();
                        $num = mysql_num_rows($res);
                        echo $num;
                    ?>
                </span>
            </div>
        </div>
	</div>
</div>
<style>	
	#counter_visitors .control-group {
		margin: 0 0 5px 0;
		color: white;
		font-weight: bolder;
	}
	
	#counter_visitors .control-label {
		text-align: left;
		font-weight: bolder;
		width: auto;
		padding: 7px 0 0 26px;
		margin: 0;
	}
	
	#counter_visitors .controls {
		text-align: right;
		margin-top: 8px;
		margin-left: 200px;
		padding-right: 25px;
	}
</style>
<script>
 $(document).ready(function(){	
    var counterLeft = "-" + ($("#counter_visitors").width() - 16);
    $("#counter_visitors").css("left", counterLeft);
	$("#counter_visitors").mouseout(function () {
		$("#counter_visitors").animate({ left: counterLeft }, { queue: false, duration: 500 })
	});
	$("#counter_visitors").mouseover(function () {
		$("#counter_visitors").animate({ left: "0" }, { queue: false, duration: 500 })
	});
 });
</script>
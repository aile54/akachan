<div style="position: fixed; left: -271px; bottom: 50px; z-index: 1000; cursor: pointer; background-image: url(../Templates/Content/images/icon/paper.png); background-size: 100% 100%" id="counter_visitors">
	<div style="" class="form-horizontal">
        <div class="control-group">
            <label class="control-label">Tổng số lượt truy cậ̣p:</label>
            <div class="controls">
            	200.000.000
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Lượt truy cậ̣p hôm nay:</label>
            <div class="controls">
            	1.000.000
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Lượt truy cậ̣p hiện tại:</label>
            <div class="controls">
            	999.999
            </div>
        </div>
	</div>
</div>
<style>	
	#counter_visitors .control-group {
		margin: 0;
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
		margin-left: 190px;
		padding-right: 25px;
	}
</style>
<script>
 $(document).ready(function(){	
	$("#counter_visitors").mouseout(function () {
		$("#counter_visitors").animate({ left: "-271px" }, { queue: false, duration: 500 })
	});
	$("#counter_visitors").mouseover(function () {
		$("#counter_visitors").animate({ left: "0" }, { queue: false, duration: 500 })
	});
 });
</script>
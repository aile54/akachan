<div style="margin-left:10px; margin-top:10px; width:190px; line-height:1.5">
	<? include('counter.php')?>
    <div>Thành viên: <span style='color:#b10000'>
	<?
        $tbl = new table('user');
        $res = $tbl -> loadAll();
        $num = mysql_num_rows($res);
        echo $num;
    ?>
    </span></div>
</div>
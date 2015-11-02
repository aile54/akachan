<div class="class" title = "Home" style="display:none"></div>
<script>
$( document ).ready(function() {
	var title = $("div.class").attr("title").toLowerCase();
	var isActive = false;
	if(!isActive)
	{
		$(".sub-nav-inner li.menubar").each(function(){
			var name = $(this).find("a").eq(0).attr("href");
			if(name != undefined && name != '')
			{
				name = name.toLowerCase();
			}
			if((title + ".php") == name && !isActive)
			{
				$(this).addClass("activated");
				isActive = true;
			}
		});
	}
});
</script>
<?php require_once('../Models/xl_main.php'); ?>

<?php include_once('main_product_detail.php'); ?>

<?php include_once('main_product_loved.php'); ?>

<?php include_once('main_product_typical.php')?>

<?php 
	//var_dump($categories);
	foreach($categories as $category) 
	{
?>
<?php         
		$create_product = new main_product();
		$create_product -> creater($category['id'], $category['name'], $category['image']);
?>
   
<?php } ?>

<?php include_once('main_product_promo.php')?>
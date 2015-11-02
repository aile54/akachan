<?php 

include '../../library/loader.php';

echo "

//var hide_empty_list=true; //uncomment this line to hide empty selection lists

var disable_empty_list=true; //uncomment this line to disable empty selection lists

addListGroup('group', 'car-makers');

addOption('car-makers', 'Chọn chủng loại rượu', 'null', '', 1); //Empty starter option

";
$tbl ="select * from sections where lang =".$_SESSION['language']." and loai=0";
$res = mysql_query($tbl);
if ($res) {
	while($row = mysql_fetch_object($res)) {
		echo " addList('car-makers', '{$row->name}', '{$row->id}', '{$row->name}.{$row->id}'); ";
		echo " addOption('{$row->name}.{$row->id}', 'Chọn danh mục rượu', 'null', '', 1); ";
		
		// list category
		$tblCate = new table('category');
		$resCate = $tblCate->loadOne("sections = {$row->id}");
		if ($resCate) {
			while ($rowCate = mysql_fetch_object($resCate)) {
				
				echo " addList('{$row->name}.{$row->id}', '{$rowCate->name}', '{$rowCate->id}', '{$rowCate->name}.{$rowCate->id}'); ";
				
				// list subcate
				$tblSub = new table('subcate');
				$resSub = $tblSub->loadOne("secid = {$row->id} and catid = {$rowCate->id}");
				if ($resSub) {
				echo " addOption('{$rowCate->name}.{$rowCate->id}', 'Chọn danh mục con', 'null'); ";	
					while ($rowSub = mysql_fetch_object($resSub)){

						echo " addOption('{$rowCate->name}.{$rowCate->id}', '{$rowSub->name}', '{$rowSub->id}'); ";
					}
				}
			}
		}
		
	}
}


?>

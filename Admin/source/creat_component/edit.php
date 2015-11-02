<?php
	if(isset($_POST["done"])){
		
		/*-----------View------------------*/
		if($_POST['source_view']!=''){
			$f="../components/".$_POST['tbl_name_new']."/".$_POST['tbl_name_new'].".php";
			unlink($f);
			
			clearstatcache();
			$f= "../components/".$_POST['tbl_name_new']."/".$_POST['tbl_name_new'].".php";
			@$ft = fopen($f,'w');
			
			$view = str_replace('\"','"',$_POST['source_view']);
			$view = str_replace("\'","'",$view);
			$view = str_replace($_POST['tbl_name_old'],$_POST['tbl_name_new'],$view);
			$view = str_replace($_POST['subject_old'],$_POST['subject_new'],$view);
			
			fwrite($ft,$view);
			fclose($ft);
		}
		/*-----------add------------------*/
		if($_POST['source_add']!=''){
			$f="../components/".$_POST['tbl_name_new']."/add.php";
			unlink($f);
			
			clearstatcache();
			$f= "../components/".$_POST['tbl_name_new']."/add.php";
			@$ft = fopen($f,'w');
			
			$add = str_replace('\"','"',$_POST['source_add']);
			$add = str_replace("\'","'",$add);
			$add = str_replace($_POST['tbl_name_old'],$_POST['tbl_name_new'],$add);
			$add = str_replace($_POST['subject_old'],$_POST['subject_new'],$add);
			
			fwrite($ft,$add);
			fclose($ft);
		}
		/*-----------Edit------------------*/
		if($_POST['source_edit']!=''){
			$f="../components/".$_POST['tbl_name_new']."/edit.php";
			unlink($f);
			
			clearstatcache();
			$f= "../components/".$_POST['tbl_name_new']."/edit.php";
			@$ft = fopen($f,'w');
			
			$edit = str_replace('\"','"',$_POST['source_edit']);
			$edit = str_replace("\'","'",$edit);
			$edit = str_replace($_POST['tbl_name_old'],$_POST['tbl_name_new'],$edit);
			$edit = str_replace($_POST['subject_old'],$_POST['subject_new'],$edit);
			
			fwrite($ft,$edit);
			fclose($ft);
		}
	}
?>
<div id="center-column">
    <div class="top-bar">
      <h1>Creat component</h1>
      <div class="breadcrumbs"><a href="#">Creat component</a></div>
    </div><br />

  
  
    <div class="table">
        <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
        <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
        <form method="post" enctype="multipart/form-data">
        <table class="listing form" cellpadding="0" cellspacing="0">
            <tr>
                <th class="full" colspan="2">NỘI DUNG</th>
            </tr>
            <tr>
                <td class="first"><strong>Tên table (Old)</strong></td>
                <td class="last">
                <select name="tbl_name_old">
                	<?php
						$dir    = 'components';
						$fol = scandir($dir);
						for($i=3;$i<count($fol);$i++){
							echo '<option value="'.$fol[$i].'">'.$fol[$i].'</option>';
						}
					?>
                </select>
                </td>
            </tr>
            <tr>
                <td class="first"><strong>Tên table (New)</strong></td>
                <td class="last">
                <select name="tbl_name_new">
                	<?php
						$fol = scandir('components');
						for($i=3;$i<count($fol);$i++){
					    	echo '<option value="'.$fol[$i].'">'.$fol[$i].'</option>';
                   		}
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td class="first"><strong>Tên Subject (Old)</strong></td>
                <td class="last"><input name="subject_old" type="text" class="text"/></td>
            </tr>
            <tr>
                <td class="first"><strong>Tên Subject (New)</strong></td>
                <td class="last"><input name="subject_new" type="text" class="text"/></td>
            </tr>
            <tr class="bg">
                <td class="first"><strong>Source view</strong></td>
                <td class="last editor">
                <textarea name="source_view" cols="80" rows="2" id="source" style="width:98%"></textarea>
                </td>
            </tr>
            <tr class="bg">
                <td class="first"><strong>Source add</strong></td>
                <td class="last editor">
                <textarea name="source_add" cols="80" rows="2" id="source" style="width:98%"></textarea>
                </td>
            </tr>
            <tr class="bg">
                <td class="first"><strong>Source edit</strong></td>
                <td class="last editor">
                <textarea name="source_edit" cols="80" rows="2" id="source" style="width:98%"></textarea>
                </td>
            </tr>
            <tr class="bg">
              <td class="first">&nbsp;</td>
              <td class="last"><label>
                <input type="submit" name="done" value="Submit" id="done" />
              </label></td>
          </tr>
        </table>
      </form>
    <p>&nbsp;</p>
  </div>
</div>
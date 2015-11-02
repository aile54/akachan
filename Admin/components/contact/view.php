<?php
	$id = $_GET["id"];
	$tbl = new table('contact');
	$res = $tbl->loadOne('id='.$id);
	if($res){
			$row=mysql_fetch_array($res);
?>
<div id="center-column">
			<div class="top-bar">
			  <h1>Contact</h1>
				<div class="breadcrumbs"><a href="#">Content</a> / <a href="#">View</a></div>
			</div><br />
 
		  
		  
			<div class="table">
				<img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" />
				<img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
				<form method="post" enctype="multipart/form-data">
				<table class="listing form" cellpadding="0" cellspacing="0">
					<tr>
						<th class="full" colspan="3">NỘI DUNG</th>
					</tr>
					<tr>
						<td class="first" width="96"><strong>Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
						<td colspan="2" class="last">#<?php echo $id; ?></td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Name</strong></td>
						<td colspan="2" class="last"><?php echo $row['name']; ?></td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Email</strong></td>
						<td colspan="2" class="last"><?php echo $row['email']; ?></td>
					</tr>
					<tr>
						<td class="first" width="96"><strong>Tel</strong></td>
						<td width="225" class="last"><?php echo $row['tel']; ?></td>
						<td width="311" class="last">&nbsp;</td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Address</strong></td>
						<td colspan="2" class="last"><?php echo $row['address']; ?></td>
					</tr>
					<tr>
						<td class="first" width="96"><strong>Title</strong></td>
						<td colspan="2" class="last"><?php echo $row['title']; ?></td>
					</tr>
					<tr class="bg">
						<td class="first"><strong>Content</strong></td>
						<td colspan="2" class="last"><?php echo $row['content']; ?></td>
					</tr>
					<tr>
						<td class="first" width="96"><strong>Date</strong></td>
						 <?php
				   // get current date and time
				   $now = getdate();
				
				   // turn it into strings
				
				   $currentDate = $now["mday"] . "-" . $now["mon"] . "-" . $now["year"];
				
				   // result: "It is now 12:37:47 on 30.10.2006" (example)
				  
				?>
						<td colspan="2" class="last"><?php echo "$currentDate" ; ?></td>
					</tr>
					<tr class="bg">
						<td class="first">&nbsp;</td>
						<td colspan="2" class="last"><a href="<?php echo loadPage('contact'); ?>">Go back</a></td>
					</tr>
					<tr class="bg">
					  <td class="first">&nbsp;</td>
					  <td colspan="2" class="last">&nbsp;</td>
				  </tr>
				</table>
			  </form>
	        <p>&nbsp;</p>
		  </div>
		</div>
<?php
	}
?>
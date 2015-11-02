<?php
	function loadPageTable($pagename,& $start,$limit,$nume){
	
	echo "<table border='0' cellspacing='5' cellpadding='0'>
							<tr>";
								if($start-$limit >=0){
								echo "<td><a href='". $pagename.'&start='.($start-$limit)."'>&laquo;</a></td> ";
								}
							  	//start
								if(ceil($start/$limit)>=3)
									echo "<td><a href='".$pagename."&start=0'>1</a></td> ";
								if(ceil($start/$limit)>=4)
								{
									echo "<td><a href='".$pagename."&start=$limit'>2</a></td> ";
								//cham cham
									if(ceil($start/$limit)!=4)
									echo "<td>...</td> ";
								}
								//current
								if(($nume*$limit)>$start)
									for($i=ceil($start/$limit)-2;$i<=ceil($start/$limit)+2;$i++)
									{
										$l=$i+1;
										if($i>-1 && $i<(ceil($nume/$limit)))
										{
											if(ceil($start/$limit)!=$i)
												echo "<td><a href='".$pagename.'&start='.($i*$limit)."'>".($l)."</a></td> ";								
											else
												echo "<td><a class='cur-pag'>".($l)."</a></td> ";								
										}
										$l++;
									}
								
								if(ceil($start/$limit)<(ceil($nume/$limit)-3))
								{
									if(ceil($start/$limit)<(ceil($nume/$limit)-4))
									{
										//cham cham	
										if(ceil($start/$limit)!=(ceil($nume/$limit)-4))							
											echo "<td>...</td> ";
										//end
										echo "<td><a href='".$pagename.'&start='.(ceil($nume/$limit)-2)*$limit."'>".(ceil($nume/$limit)-1)."</a></td> ";
									
									}
									echo "<td><a href='".$pagename.'&start='.(ceil($nume/$limit)-1)*$limit."'>".ceil($nume/$limit)."</a></td> ";
								}
																	
								
								
								/*
								$l=1;								
								for($i=0;$i<$nume;$i+=$limit){
									if($start<>$i){
										// link
									echo "<td><a href='".$pagename.'&start='.$i."'>$l</a></td> ";
									}else{
										// no link
										echo "<td>$l</td>";
									}
									$l++;
								}*/
								
								
								
							  	if($start+$limit <$nume){
							  echo "<td><a href='".$pagename.'&start='.($start+$limit) ."'>&raquo;</a></td> ";
							  	}
	echo "</tr>
						  </table>";
}
?>
<?php
/* if(isset($_GET['countryCode'])){
  switch($_GET['countryCode']){
    
  	// query sectionsid
  	
    case "no":
      echo "obj.options[obj.options.length] = new Option('Bergen','1');\n";
      echo "obj.options[obj.options.length] = new Option('Haugesund','2');\n";
      echo "obj.options[obj.options.length] = new Option('Oslo','3');\n";
      echo "obj.options[obj.options.length] = new Option('Stavanger','4');\n";
      
      break;
    case "dk":
      
      echo "obj.options[obj.options.length] = new Option('Aalborg','11');\n";
      echo "obj.options[obj.options.length] = new Option('Copenhagen','12');\n";
      echo "obj.options[obj.options.length] = new Option('Odense','13');\n";
      
      break;
    case "us":
      
      echo "obj.options[obj.options.length] = new Option('Atlanta','21');\n";
      echo "obj.options[obj.options.length] = new Option('Chicago','22');\n";
      echo "obj.options[obj.options.length] = new Option('Denver','23');\n";
      echo "obj.options[obj.options.length] = new Option('Los Angeles','24');\n";
      echo "obj.options[obj.options.length] = new Option('New York','25');\n";
      echo "obj.options[obj.options.length] = new Option('San Fransisco','26');\n";
      echo "obj.options[obj.options.length] = new Option('Seattle','27');\n";
      
      break;
  }  
}
 */
// connect
include("../../library/database/connection.php");
if(isset($_GET['countryCode']));
$secid = $_GET['countryCode'];


// select sections
$str = "select * from category where secid = $secid";

$res = mysql_query($str);
if($res){
		while($row = mysql_fetch_array($res)){
			echo "obj.options[obj.options.length] = new Option('".$row["name"]."','".$row["id"]."');\n";
		}
}
?> 
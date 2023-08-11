 <?php

 include_once("../../include/mysql_connection.php"); 

 $key = $_GET['name'];

 $col =  $_GET['colmn'];


$result = $mysql->query("SELECT Name FROM Vendor Where  $col = '$key' ");
if($result->num_rows == 0) {
      echo 1;
    
} else {
    echo 0;
}
$mysqli->close();

























 ?>
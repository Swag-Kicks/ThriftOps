<?php

include_once("../../include/mysql_connection.php"); 
 $key = $_GET['name'];


     $sql = "SELECT * FROM `Vendor` where Name = '$key'";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>



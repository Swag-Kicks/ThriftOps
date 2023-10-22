<?php

include_once("../../include/mysql_connection.php"); 

$id = $_GET['id'];
     $sql = "SELECT * FROM `addition` WHERE SKU = '$id' ";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>



<?php

include_once("../includes/db.php"); 

$key = $_GET['wid'];

     $sql = "SELECT * FROM Warehouse where Warehouse_ID = $key ";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>


<?php

include_once("../../include/mysql_connection.php"); 

$id = $_GET['id'];
$rnumber = $_GET['rn'];

    //  $sql = "SELECT * FROM `racks` INNER JOIN Warehouse on racks.Warehouse_ID=Warehouse.Warehouse_ID where Warehouse.Warehouse_ID = $id ";
    
    $sql = "SELECT * FROM `racks` INNER JOIN addition on racks.SKU=addition.SKU INNER JOIN  Category on racks.Category=Category.Category_ID where racks.number = '$rnumber' and racks.Warehouse_ID = '$id' and racks.Status='Filled' ";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>


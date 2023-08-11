

<?php

include_once("../../include/mysql_connection.php"); 

$SK = $_GET['id'];

      $sql = " SELECT id,name FROM `racks` INNER JOIN Warehouse on Warehouse.Warehouse_ID=racks.Warehouse_ID where Warehouse.SK_Format LIKE '%$SK%' and racks.SKU = '' LIMIT 1 ";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>



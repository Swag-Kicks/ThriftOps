<?php

include_once("../../include/mysql_connection.php"); 


//      $sql = "SELECT o.id, a.Image_1, o.SKU, o.Order_Number, o.Date
// FROM `Order` o 
// INNER JOIN `addition` a ON o.SKU = a.SKU 
// WHERE o.Status = 'Booked' AND o.Date > '2023-03-31' 
// AND o.SKU IN (SELECT SKU FROM addition WHERE SKU = o.SKU)";

$sql = "SELECT o.*, a.*, r.*
FROM `Order` o 
INNER JOIN `addition` a ON o.SKU = a.SKU 
INNER JOIN `racks` r ON r.SKU = o.SKU
WHERE o.Status = 'Booked' 
AND o.Date > '2023-03-31' 
AND o.SKU IN (SELECT SKU FROM addition WHERE SKU = o.SKU)";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>



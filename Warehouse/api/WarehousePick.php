<?php

include_once("../../include/mysql_connection.php"); 

$WH = $_GET['wh'];

     $sql = "SELECT orders.id,addition.Image_1,orders.Items,orders.order_num,addition.DateTime from `orders` INNER Join addition on orders.Items=addition.SKU where orders.Status = 'None' and orders.Items LIKE '%$WH%'";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>



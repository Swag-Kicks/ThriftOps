<?php

include_once("../../include/mysql_connection.php"); 

$FD = $_GET['fd'];
$TD = $_GET['td'];
$Istatus = $_GET['status'];
$limit = (int)$_GET['limit'];

     $sql = "SELECT  
     `Order`.`id` ,
     `Order`.`Order_ID` ,
     `Order`.`SKU` ,
     `addition`.`Title`,
     `addition`.`Image_1`,
     `Order`.`Total`,
     `Order`.`Order_Number`,
     `Order`.`Tracking`,
     `Order`.`Status`,
     `Order`.`Item_Status`,
     `Order`.`Date`
     
     
     
     from `Order` Inner Join `addition` on `Order`.`SKU` = `addition`.`SKU`  where `Order`.`Shipping_Status` = 'Returned' and `Order`.`Item_Status` = '$Istatus' And Date BETWEEN '$FD' AND '$TD' limit $limit";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>






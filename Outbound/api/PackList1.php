<?php

include_once("../../include/mysql_connection.php"); 

$FD = $_GET['fd'];
$TD = $_GET['td'];
     $sql = "SELECT `Order`.`id`,`addition`.`Image_1`, `addition`.`SKU`,`Order`.`Order_Number`,`Order`.`Picked_by`,`addition`.`Category_ID` ,`Order`.`Date` FROM `Order` INNER JOIN `addition` on `Order`.`SKU`=`addition`.`SKU` where `Order`.`Item_Status` = 'Picked'";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>



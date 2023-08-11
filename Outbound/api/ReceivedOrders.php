<?php

include_once("../../include/mysql_connection.php"); 

$FD = $_GET['fd'];
$TD = $_GET['td'];
     $sql = "SELECT * FROM `Order` INNER JOIN `addition` on `Order`.`SKU`=`addition`.`SKU` where `Order`.`Status` = 'Received' AND `Date` Between '$FD' AND '$TD'";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>



<?php

include_once("../../include/mysql_connection.php"); 

$status = $_GET['status'];

     $sql = "SELECT * FROM `Order` INNER JOIN banks on `banks`.`User_ID` = `Order`.`Order_Number` where `banks`.`refund_status` = '$status' ";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>





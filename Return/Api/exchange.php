<?php

include_once("../../include/mysql_connection.php"); 

$FD = $_GET['fd'];
$TD = $_GET['td'];
$limit = (int)$_GET['limit'];
    // $sql = "SELECT * FROM `Order` where  `Order`.`Exchange` != '' and Date BETWEEN '$FD' AND '$TD' limit  $limit ";
    $sql = "SELECT * FROM `Order` where  `Order`.`Exchange` != '' limit  $limit ";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>





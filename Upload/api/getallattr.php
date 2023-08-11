

<?php

include_once("../../include/mysql_connection.php"); 

$attrID = $_GET['id'];

     $sql = " SELECT * FROM `Category` where Product_ID = $attrID ";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>



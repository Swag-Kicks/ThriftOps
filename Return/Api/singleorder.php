

<?php

include_once("../../include/mysql_connection.php"); 

$oid = $_POST['oid'];

     $sql = "SELECT `Order`.`Order_Number` ,`Order`.`Date`, `Order`.`Name` , `Order`.`SKU` , `Order`.`id`,`Order`.`Total`,`Order`.`Tracking`,`Order`.`Item_Status`,`addition`.`Title`,`addition`.`Image_1` FROM `Order` inner join addition addition on `addition`.`SKU` =`Order`.`SKU`  where `Order_Number` like '%$oid%' limit 20 ";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>





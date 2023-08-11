

<?php

include_once("../../include/mysql_connection.php"); 

$FD = $_GET['fd'];
$TD = $_GET['td'];


     $sql = "SELECT `Order`.`id`,`addition`.`Image_1`,`Order`.`SKU`,`Order`.`Status`,`addition`.`Category_ID`,`Order`.`Date`,`Order`.`Order_Number` FROM `Order` INNER JOIN `addition` on `Order`.`SKU`=`addition`.`SKU` where `Order`.`Item_Status` = 'Returned' OR `Order`.`Item_Status` = 'Not_Found' OR `Order`.`Item_Status` = 'QC_Rejected' OR `Order`.`Item_Status` = 'Cancel' AND `Date` Between '$FD' AND '$TD'  LIMIT 80 ";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>



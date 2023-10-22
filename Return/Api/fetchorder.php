<?php

include_once("../../include/mysql_connection.php"); 

// $Order = $_GET['order'];
$Order=$_POST['ordernumber'];
    if(is_numeric($Order))
    {
      $sql = "SELECT * FROM `Order` INNER JOIN addition on `addition`.`SKU` = `Order`.`SKU` WHERE `Order`.`Order_Number` = '#$Order' ";
      $result = mysqli_query($mysql, $sql);  
    }
    else
    {
        $sql = "SELECT * FROM `Order` INNER JOIN addition on `addition`.`SKU` = `Order`.`SKU` WHERE `Order`.`Order_Number` = '$Order' ";
        $result = mysqli_query($mysql, $sql);
    }

     
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>





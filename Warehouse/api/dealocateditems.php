<?php

include_once("../../include/mysql_connection.php"); 

$id = $_GET['id'];
$rnumber = $_GET['rn'];

    //  $sql = "SELECT * FROM `racks` INNER JOIN Warehouse on racks.Warehouse_ID=Warehouse.Warehouse_ID where Warehouse.Warehouse_ID = $id ";
    
    //$sql = "SELECT * FROM `racks` INNER JOIN addition on racks.SKU=addition.SKU INNER JOIN  Category on racks.Category=Category.Category_ID where racks.number = '$rnumber' and racks.Warehouse_ID = '$id' and racks.AStatus LIKE 'DA' ";
      
   //   $sql= "SELECT racks.Warehouse_ID,racks.id ,addition.Image_1,addition.SKU,racks.name,Category.Name,racks.Filled_at FROM `racks` INNER JOIN addition on racks.SKU=addition.SKU INNER JOIN Category on racks.Category=Category.Category_ID  WHERE AStatus = 'DA' racks.number = '$rnumber' and racks.Warehouse_ID = '$id'";
     
     $sql = "SELECT racks.Warehouse_ID,racks.id ,addition.Image_1,addition.SKU,racks.name,Category.Name,racks.Filled_at , racks.reason , racks.Removed_By FROM `racks`  INNER JOIN addition on racks.Pre_SKU = addition.SKU INNER JOIN  Category on racks.Category=Category.Category_ID  WHERE AStatus = 'DA' and racks.number = '$rnumber' and racks.Warehouse_ID = '$id'";
      
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

   $to_encode[] = $row;
    //  $to_encode[] = array("Rack_ID"=>$wid,"Image_1"=>$row['Location'],"SKU"=>$racks,"name"=>$racks);
}

echo json_encode($to_encode);
?>


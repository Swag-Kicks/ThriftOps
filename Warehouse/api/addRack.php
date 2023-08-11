
<?php
include_once("../../include/mysql_connection.php"); 

$Status = "Empty";
$Allocation = "Enabled";
$wID = $_POST['wID'];
$category = $_POST['category'];
$Rnumber = $_POST['Rnumber'];
$rack =  json_decode($_POST['rackArray']);

// echo $rack[0] ;




$length = count($rack);
for ($i = 0; $i < $length; $i++) {
    $rackV='R'.$Rnumber.'-'.$rack[$i];

   
    $sql = "INSERT INTO racks (Warehouse_ID,Category,number,name,Status,Allocation,Inventory_Status,is_active,AStatus,SKU) VALUES ('$wID','$category','$Rnumber','$rackV','$Status','$Allocation','Active','Active','Active','')";
     $result = mysqli_query($mysql, $sql);
     

 
}

echo "RACKS ADDED";




?>
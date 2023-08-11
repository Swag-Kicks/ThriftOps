<?php
include_once("../../include/mysql_connection.php"); 

$id = $_GET['id'];
$rnumber = $_GET['rn'];

$sql = "SELECT * 
        FROM `racks` 
        LEFT JOIN `addition` ON `racks`.`SKU` = `addition`.`SKU` 
        INNER JOIN `Category` ON `racks`.`Category` = `Category`.`Category_ID` 
        WHERE `racks`.`number` = '$rnumber' 
        AND `racks`.`Warehouse_ID` = '$id'";
        
$result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {
    // Check if the SKU is null and replace with "empty"
    if ($row['SKU'] == null) {
        $row['SKU'] = "Empty";
    }
    $to_encode[] = $row;
}

echo json_encode($to_encode);
?>


<?php

include_once("../../include/mysql_connection.php"); 

$id = $_GET['id'];

    //  $sql = "SELECT * FROM `racks` INNER JOIN Warehouse on racks.Warehouse_ID=Warehouse.Warehouse_ID where Warehouse.Warehouse_ID = $id ";
    
    $sql = "select count(*) as capacity from racks where number =  $id ";
    // $sql .= "select count(*) as capacity from racks where number =  $id and Status != 'Empty' ";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>


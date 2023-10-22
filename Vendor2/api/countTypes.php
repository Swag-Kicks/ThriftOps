

<?php

include_once("../../include/mysql_connection.php"); 

$key = $_GET['type'];

     $sql = "SELECT COUNT(Type) as total
FROM Vendor
WHERE Type = '$key'

";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>



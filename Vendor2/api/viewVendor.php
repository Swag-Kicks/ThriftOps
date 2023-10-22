

<?php

include_once("../../include/mysql_connection.php"); 

$key = $_GET['id'];

     $sql = "SELECT * FROM Vendor INNER JOIN User ON Vendor.Name=User.Name INNER JOIN banks ON Vendor.Vendor_ID=banks.User_ID where Vendor_ID  = $key ";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>



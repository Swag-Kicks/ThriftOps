

<?php

include_once("../../include/mysql_connection.php"); 



     $sql = "SELECT * FROM Vendor INNER JOIN User ON Vendor.Name=User.Name INNER JOIN banks ON Vendor.Vendor_ID=banks.User_ID order by Vendor.Vendor_ID ";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>



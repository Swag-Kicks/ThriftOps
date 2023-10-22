<?php

include_once("../../include/mysql_connection.php"); 


    //  $sql = "SELECT * FROM Vendor";
     $sql = " SELECT * FROM `User` inner join Vendor on Vendor.Name=User.Name where User.Dept_ID=4";
   
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>



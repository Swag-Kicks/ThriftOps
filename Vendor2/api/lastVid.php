<?php

include_once("../../include/mysql_connection.php"); 


     $sql = "SELECT * FROM Vendor ORDER BY Vendor_ID DESC LIMIT 1";
              $result = mysqli_query($mysql, $sql);
   

while ($row = $result->fetch_assoc()) {

            $id = $row['Vendor_ID'];
       echo $id + 1;
}


?>
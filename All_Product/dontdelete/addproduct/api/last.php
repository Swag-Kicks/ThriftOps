<?php

include_once("../db.php"); 


     $sql = "SELECT * FROM Product ORDER BY id DESC LIMIT 1";
              $result = mysqli_query($mysql, $sql);
   

while ($row = $result->fetch_assoc()) {

            $id = $row['id'];
       echo $id + 1;
}


?>
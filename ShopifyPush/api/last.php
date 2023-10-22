<?php

include_once("../../include/mysql_connection.php");


     $sql = "SELECT * FROM addition ORDER BY id DESC LIMIT 1";
              $result = mysqli_query($mysql, $sql);
   

while ($row = $result->fetch_assoc()) {

            $id = $row['id'];
       echo $id + 1;
}


?>
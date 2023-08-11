
<?php

include_once("../../include/mysql_connection.php"); 

$key = $_GET['id'];

     $sql = "SELECT Dept_ID FROM User WHERE Username  = '$key' LIMIT 1 ";
              $result = mysqli_query($mysql, $sql);
   

while ($row = $result->fetch_assoc()) {

     echo $row['Dept_ID'];
}


?>

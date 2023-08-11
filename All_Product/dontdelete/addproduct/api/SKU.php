<?php

include_once("../db.php"); 
 $key = $_GET['name'];


     $sql = "SELECT SK_Format FROM `Warehouse` where Location = '$key'";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

     echo $row['SK_Format'];
}

// echo json_encode($to_encode);
?>



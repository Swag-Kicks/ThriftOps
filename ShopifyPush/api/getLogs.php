

<?php

include_once("../includes/db.php"); 

 $Pid = $_GET['id'];

     $sql = "SELECT Type,Type_ID,Status,DateTime,Name FROM `Logs` INNER join User on Logs.User_ID=User.User_ID where Type = 'Product' and Type_ID = $Pid";
     
     
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>





<?php

include_once("../includes/db.php"); 

$pid = $_GET['id'];

     $sql = "SELECT * FROM `Product` where id = $pid ";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>

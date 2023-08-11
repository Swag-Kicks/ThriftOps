

<?php

include_once("../includes/db.php"); 

$attrID = $_GET['id'];

     $sql = " SELECT * FROM `Sub_Category` where Category_ID = $attrID ";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) {

      $to_encode[] = $row;
}

echo json_encode($to_encode);
?>



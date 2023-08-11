<?php

session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);

// if (isset($_SESSION['id']) && $_SESSION['id'] == true) {
    
// }
// else {
   
//     echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';

// }


//$cat_id=3;
$cat_id=$_GET['cat_id'];

/// Preventing injection attack //// 
if(!is_numeric($cat_id)){
echo "Data Error";
exit;
 }

$main=array();
$sql="SELECT Name,Category_ID FROM `Category` WHERE Product_ID=$cat_id";
$row=$dbo->prepare($sql);
$row->execute();
$result=$row->fetchAll(PDO::FETCH_ASSOC);

$main = array('data'=>$result);
echo json_encode($main);
?>
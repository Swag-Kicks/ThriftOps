<?php

session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);

// if (isset($_SESSION['id']) && $_SESSION['id'] == true) {
    
// }
// else {
   
//     echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';

// };


//$ven_id=8;
$ven_id=$_GET['ven_id'];

/// Preventing injection attack //// 
if(!is_numeric($ven_id)){
echo "Data Error";
exit;
 }

$main=array();
$sql="SELECT Lot_Number,id FROM `lot` WHERE Vendor_ID=$ven_id";
$row=$dbo->prepare($sql);
$row->execute();
$result=$row->fetchAll(PDO::FETCH_ASSOC);

$main = array('data'=>$result);
echo json_encode($main);
?>
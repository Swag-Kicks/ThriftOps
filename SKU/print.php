<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
include_once("../include/barcode128.php");
error_reporting(0);

$SKU=$_GET['GETID'];
$bar=bar128(stripcslashes($SKU)); 
echo ($bar);

    


?>


<?php


include_once("../include/mysql_connection.php"); 
error_reporting(0);
date_default_timezone_set("Asia/Karachi");

$user=$_SESSION['Username'];
$datetime=date('Y-m-d/h:i:a');




for ($x = 0; $x <= 100; $x++)
{
    //$as+=50;
    //for update insert product
    //echo '<iframe src="https://backup.thriftops.com/Inventory_Sync/multi.php?var1='.$as.'" width="100%" height="150"></iframe>';
    //for vendor lot id update
    $as+=20;
    echo '<iframe src="https://backup.thriftops.com/Inventory_Sync/vendorlotfetch.php?var1='.$as.'" width="100%" height="150"></iframe>';
    
}


?>
<?php

session_start();
include_once("../../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['id'];

if(isset($_POST['war']) && isset($_POST['sku']) && isset($_POST['cat']))
{
    $sub=$_POST['cat'];
    $war=$_POST['war'];
    $sku=$_POST['sku'];
    $C_Date = date('Y-m-d/h:i:a');
    
     //insert rack
    $myresult = mysqli_query($mysql, "SELECT * FROM `racks` where Warehouse_ID='$war' AND Category='$sub' and SKU='' LIMIT 1;");
    $row12 = mysqli_fetch_assoc($myresult);
    $index=$row12["id"];
    // echo $index;
    $query1 = mysqli_query($mysql,"UPDATE `racks` SET SKU='$sku',Status='Filled' where id='$index'");
    
    //logs
    $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID, Reference,Status,DateTime) VALUES ('$cr','Allocate','$id', '$sku', 'Filled', '$C_Date')";
    $result1 = mysqli_query($mysql, $sql1);
    
    echo "1";
}
else
{
    echo "0";
}


?>
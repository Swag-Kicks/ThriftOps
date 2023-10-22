<?php
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);


if(isset($_POST["ven"]))
{
    $cat=$_POST["cat"];
    $ven=$_POST["ven"];
    
   
    $sql1 = "SELECT * FROM `Vendor` WHERE Vendor_ID='$ven'";
    $result1 = mysqli_query($mysql, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $vensk=$row1['SK_Prefix'];
    

    
    $sql2 = "SELECT * FROM `Category` WHERE Category_ID='$cat'";
    $result2 = mysqli_query($mysql, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $catsk=$row2['SKU_Format'];

    
    $output="$vensk-$catsk";
    echo $output;
    // echo json_encode($output);
    
}
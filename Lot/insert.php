<?php
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);
   

if(isset($_POST["number"]))
{
   $ven=$_POST["ven_id"];
   $number=$_POST["number"];
   $unit=$_POST["quantity"];
   $desc=$_POST["desc"];

    $sql = "INSERT INTO Lot (Vendor_ID,Number,Units,Description) VALUES ('$ven', '$number', '$unit', '$desc')";
    $result = mysqli_query($mysql, $sql);
      
   
   


 
    if(isset($result))
    {
        echo "1";
    }
    else
    {
        echo "0";
    }
}
?>
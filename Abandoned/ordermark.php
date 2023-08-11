<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['id'];


if(isset($_POST["id"]) && isset($_POST["ordtesxt"]))
{
    
    $id=$_POST["id"];
    $ordtesxt=$_POST["ordtesxt"];
    $C_Date = date('Y-m-d/h:i:a'); 

    $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Abandoned','$id', 'Order Placed', '$C_Date')";
    $result1 = mysqli_query($mysql, $sql1);
    
    $sql2 = "UPDATE `Abandoned` SET Status = 'Order Placed',Reference='$ordtesxt' WHERE Shopify_ID='$id'";
    $result2 = mysqli_query($mysql, $sql2);
    
    
    if($result2)
    {
        echo "1";

    }
    else 
    {
        echo "0";
    }
     
     

}


?>
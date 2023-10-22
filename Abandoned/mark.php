<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['id'];


if(isset($_POST["id"]) && isset($_POST["option"]))
{
    $stat=$_POST["option"];
    $id=$_POST["id"];
     
    $C_Date = date('Y-m-d/h:i:a'); 

    $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Abandoned','$id', '$stat', '$C_Date')";
    $result1 = mysqli_query($mysql, $sql1);
    
    $sql2 = "UPDATE `Abandoned` SET Status = '$stat' WHERE Shopify_ID='$id'";
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
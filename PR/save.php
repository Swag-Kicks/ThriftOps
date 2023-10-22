<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['id'];


if(isset($_POST["id"]))
{
    //$User_ID=$_POST["stat"];
    $stat=$_POST["stat"];
    $id=$_POST["id"];
     
    $C_Date = date('Y-m-d/h:i:a'); 

    $sql2 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','PR','$id', '$stat', '$C_Date')";
    $result1 = mysqli_query($mysql, $sql2);
    
    $sql2 = "UPDATE PR SET Status = '".$stat."' WHERE PR_ID='".$id."'";
    $result1 = mysqli_query($mysql, $sql2);
    
    
    if($result1)
    {
        echo "1";

    }
    else 
    {
        echo "0";
    }
     
     

}







?>
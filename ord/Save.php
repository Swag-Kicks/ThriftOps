<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['id'];


if(isset($_POST["id"]) && isset($_POST["stats"]))
{
    $stat=$_POST["stats"];
    $id=$_POST["id"];
     
    $C_Date = date('Y-m-d/h:i:a'); 

    
    
    if($_POST['stats']=='Cancel')
    {
        $sql2 = "UPDATE `Order` SET Status = '$stat',Inventory_Status='Pending' WHERE Order_ID='$id'";
        $result2 = mysqli_query($mysql, $sql2);
        
        $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$id', '$stat', '$C_Date')";
        $result1 = mysqli_query($mysql, $sql1);
        if($result1)
        {
            echo "1";
    
        }
        else 
        {
            echo "0";
        }
    }
    else
    {
        $sql2 = "UPDATE `Order` SET Status = '$stat' WHERE Order_ID='$id'";
        $result2 = mysqli_query($mysql, $sql2);
        
        $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$id', '$stat', '$C_Date')";
        $result1 = mysqli_query($mysql, $sql1);
        
        
        if($result1)
        {
            echo "1";
    
        }
        else 
        {
            echo "0";
        }
    }
    
   
     
     

}


?>
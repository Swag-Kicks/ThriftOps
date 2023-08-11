<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['id'];


if(isset($_POST["id"]) && isset($_POST["cou"]) && isset($_POST["track"]))
{
    $track=$_POST["track"];
    $cou=$_POST["cou"];
    $id=$_POST["id"];
     
    $C_Date = date('Y-m-d/h:i:a'); 

    $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$id', 'Booked', '$C_Date')";
    $result1 = mysqli_query($mysql, $sql1);
    
    $sql2 = "UPDATE `Order` SET Status='Booked',Courier='$cou',Tracking='$track' WHERE Order_ID='$id'";
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
else
{
    echo "2";
}

?>
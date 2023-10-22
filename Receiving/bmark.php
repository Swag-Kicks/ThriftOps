<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['id'];




if(isset($_POST["id"]))
{
    $id=$_POST["id"];
    $order=$_POST["order"];
    $date=date('Y-m-d/h:i:a');
     
    $C_Date = date('Y-m-d/h:i:a');

    foreach($_POST["id"] as $id)
    {
        //orderid 
        $find = mysqli_query($mysql, "Select Order_ID from `Order` where id='".$id."'");
        $data2 = mysqli_fetch_array($find);
        $order=$data2['Order_ID'];
        
        $que3="UPDATE `Order` SET Status='Received' where id='".$id."'";
        $result3 = mysqli_query($mysql, $que3);
    
        // $que2="UPDATE `Order` SET Item_Status='Received' where id='".$id."'";
        // $result2 = mysqli_query($mysql, $que2);
        
        $sql3 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$order', '', 'Received', '$C_Date')";
        $result3 = mysqli_query($mysql, $sql3);
    }
     
    echo '1';
   
}



?>
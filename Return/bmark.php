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
        $find = mysqli_query($mysql, "Select Order_ID,SKU from `Order` where id='".$id."'");
        $data2 = mysqli_fetch_array($find);
        $order=$data2['Order_ID'];
        $sku=$data2['SKU'];
        $que3="UPDATE `Order` SET Shipping_Status='Received',Inventory_Status='Pending' where id='".$id."'";
        $result3 = mysqli_query($mysql, $que3);
    
        $sql3 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$order', '$sku', 'Received', '$C_Date')";
        $result3 = mysqli_query($mysql, $sql3);
    }
     
    echo '1';
   
}



?>
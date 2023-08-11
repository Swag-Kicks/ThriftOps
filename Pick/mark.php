<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['id'];
//echo $cr;



if(isset($_POST["id"]))
{
     $id=$_POST["id"];
     $order=$_POST["order"];
     $date=date('Y-m-d/h:i:a');
     
     $C_Date = date('Y-m-d/h:i:a');

     
    //  $query = "Select * from racks where SKU= '".$id."'";
    //  if(mysqli_query($mysql, $query))
    
    $que3="UPDATE `Order` SET Status='Picked' where SKU='".$id."' AND Order_ID='".$order."'";
    $result3 = mysqli_query($mysql, $que3);
    //  {
    // $que2="UPDATE `Order` SET Item_Status='Picked' where SKU='".$id."' AND Order_ID='".$order."'";
    // $result2 = mysqli_query($mysql, $que2);
    
    $que="UPDATE racks SET Pre_SKU='$id',SKU='',Status='Empty',Empty_at='$date',Removed_By='$cr' where SKU='".$id."'";
    $result1 = mysqli_query($mysql, $que);
    
    
    
    
     $sql3 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$order', '', 'Picked', '$C_Date')";
     $result3 = mysqli_query($mysql, $sql3);
     
     
    echo '1';
    //  }
}







?>
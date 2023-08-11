<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['Username'];
//echo $cr;



if(isset($_POST["id"]))
{
     $id=$_POST["id"];
     $order=$_POST["order"];
     $date=date('Y-m-d/h:i:a');
     
     $C_Date = date('Y-m-d/h:i:a');

     
     $query = "Select * from racks where SKU= '".$id."'";
     if(mysqli_query($mysql, $query))
     {
        $que="UPDATE racks SET Pre_SKU='$SKU',SKU='',Status='Empty',Empty_at='$date',Removed_By='$cr' where SKU='".$id."'";
        $result1 = mysqli_query($mysql, $que);
        
        
        $que="UPDATE orders SET Status='Picked',Picked_By='$cr',Picked_By_Time='$C_Date' where Items='".$id."' AND order_id='".$order."'";
        $result1 = mysqli_query($mysql, $que);
        echo 'Picked Successfully';
     }
}







?>
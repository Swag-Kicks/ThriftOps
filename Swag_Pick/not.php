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

        
        $que="UPDATE orders SET Status='Not_Found',Updated_By='$cr',Updated_By_Time='$C_Date' where Items='".$id."' AND order_id='".$order."'";
        $result1 = mysqli_query($mysql, $que);
        echo 'Marked Successfully';

}







?>
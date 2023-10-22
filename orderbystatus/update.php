<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['id'];

if(isset($_POST['order']) && isset($_POST['name']) && isset($_POST['address']) && isset($_POST['city'])  && isset($_POST['contact']) && isset($_POST['advise']) && isset($_POST['note']) && isset($_POST['ship']) && isset($_POST['disc']) && isset($_POST['total']))
{
    
   
    if(!empty($_POST['reason']))
    {
        $order=$_POST['order'];
        $reason=$_POST['reason'];
        $discount=$_POST['disc'];
        $total=$_POST['total'];
        $ship=$_POST['ship'];
        $C_Date = date('Y-m-d/h:i:a'); 
        //update order value
        $var="Update `Order` SET Shipping='$ship',Discount='$discount',Total='$total',Adjusment_Reason='$reason' WHERE Order_ID='$order'";
        $update=mysqli_query($mysql,$var);
        if($update)
        {
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$order', 'Order Price Adjusted With Disccount', 'Update', '$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
            echo "1";
        }
    }
   if(empty($_POST['reason']))
   {
        $order=$_POST['order'];
        $name=$_POST['name'];
        $address=$_POST['address'];
        $contact=$_POST['contact'];
        $city=$_POST['city'];
        $advice=$_POST['advise'];
        $notes=$_POST['note'];
        $ship=$_POST['ship'];
        $total=(int)$_POST['total'];
        
        //update order value
        $var="Update `Order` SET Name='$name',Address='$address',Contact='$contact',City='$city' WHERE Order_ID='$order'";
        $update=mysqli_query($mysql,$var); 
        
        
        $update1=mysqli_query($mysql,"Update `Order` SET Shipping='$ship',Dispatch_Advise='$advice',Notes='$notes',Total='$total' WHERE Order_ID='$order'"); 
        if($update1)
        {
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$order', 'Basic Order information Adjusted ', 'Update', '$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
            echo "1";
        }
        
    }
}
else
{
    echo "0";
}
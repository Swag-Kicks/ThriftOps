<?php

include_once("../../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['id'];
if(!empty($_POST['order']) && !empty($_POST['sku']) && !empty($_POST['status']) && !empty($_POST['name']))
{
    $order = $_POST['order'];
    $status = $_POST['status'];
    $sku=$_POST['sku'];
    $name=$_POST['name'];
    $C_Date = date('Y-m-d/h:i:a');
    if(is_numeric($order))
    {
        if($status=='Refund')
        {
            $var=explode(",",$sku);
            $method=$_POST['method'];
            $account=$_POST['account'];
            foreach($var as $item)
            {
                
            	
                $sql = "UPDATE `Order` SET `Status` = '$status', `Shipping_Status` = '$status' WHERE Order_Number = '#$order' AND SKU='$item'";
                $result = mysqli_query($mysql, $sql);
                
                $sql1 = "INSERT INTO `banks`(`title`, `bank_name`, `account_no`, `User_ID`, `user_type`, `refund_status`, `Date`,`Reference`) Values('$name','$method','$account','#$order','Refund','Due','$C_Date','$item')";
                $result1 = mysqli_query($mysql, $sql1);
                
                $sql2 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','#$order', '$status', '$C_Date')";
                $result2 = mysqli_query($mysql, $sql2);
                
            }
            echo "1";
        }
        else if($status=='Reattempt')
        {
            $var=explode(",",$sku);
            foreach($var as $item)
            {
                
            	
                $sql = "UPDATE `Order` SET `Status` = '$status', `Shipping_Status` = '$status'  WHERE Order_Number = '#$order' AND SKU='$item'";
                $result = mysqli_query($mysql, $sql);
                $sql2 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','#$order', '$status', '$C_Date')";
                $result2 = mysqli_query($mysql, $sql2);
                
            }
             echo "1";
        }
        else if($status=='Returned')
        {
            $var=explode(",",$sku);
            foreach($var as $item)
            {
                
            	
                $sql = "UPDATE `Order` SET `Status` = '$status', `Shipping_Status` = '$status'  WHERE Order_Number = '#$order' AND SKU='$item'";
                $result = mysqli_query($mysql, $sql);
                $sql2 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','#$order', '$status', '$C_Date')";
                $result2 = mysqli_query($mysql, $sql2);
                
            }
             echo "1";
        }
        else
        {
            $exchange = $_POST['exchange'];
            $var=explode(",",$sku);
            foreach($var as $item)
            {
                
            	
                $sql = "UPDATE `Order` SET `Status` = '$status', `Shipping_Status` = '$status' , `Exchange` = '$exchange'  WHERE Order_Number = '#$order' AND SKU='$item'";
                $result = mysqli_query($mysql, $sql);
                $sql2 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','#$order', '$status', '$C_Date')";
                $result2 = mysqli_query($mysql, $sql2);
                
            }
             echo "1";
        }
        
    }
    else
    {
        if($status=='Refund')
        {
            $var=explode(",",$sku);
            $method=$_POST['method'];
            $account=$_POST['account'];
            foreach($var as $item)
            {
                
            	
                $sql = "UPDATE `Order` SET `Status` = '$status', `Shipping_Status` = '$status' WHERE Order_Number = '$order' AND SKU='$item'";
                $result = mysqli_query($mysql, $sql);
                
                $sql1 = "INSERT INTO `banks`(`title`, `bank_name`, `account_no`, `User_ID`, `user_type`, `refund_status`, `Date`,`Reference`) Values('$name','$method','$account','$order','Refund','Due','$C_Date','$item')";
                $result1 = mysqli_query($mysql, $sql1);
                
                $sql2 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$order', '$status', '$C_Date')";
                $result2 = mysqli_query($mysql, $sql2);
                
            }
             echo "1";
        }
        else if($status=='Reattempt')
        {
            $var=explode(",",$sku);
            foreach($var as $item)
            {
                
            	
                $sql = "UPDATE `Order` SET `Status` = '$status', `Shipping_Status` = '$status'  WHERE Order_Number = '$order' AND SKU='$item'";
                $result = mysqli_query($mysql, $sql);
                $sql2 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$order', '$status', '$C_Date')";
                $result2 = mysqli_query($mysql, $sql2);
                
            }
             echo "1";
        }
        else if($status=='Returned')
        {
            $var=explode(",",$sku);
            foreach($var as $item)
            {
                
            	
                $sql = "UPDATE `Order` SET `Status` = '$status', `Shipping_Status` = '$status'  WHERE Order_Number = '$order' AND SKU='$item'";
                $result = mysqli_query($mysql, $sql);
                $sql2 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$order', '$status', '$C_Date')";
                $result2 = mysqli_query($mysql, $sql2);
                
            }
             echo "1";
        }
        else
        {
            $exchange = $_POST['exchange'];
            $var=explode(",",$sku);
            foreach($var as $item)
            {
                
            	
                $sql = "UPDATE `Order` SET `Status` = '$status', `Shipping_Status` = '$status' , `Exchange` = '$exchange'  WHERE Order_Number = '$order' AND SKU='$item'";
                $result = mysqli_query($mysql, $sql);
                $sql2 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$order', '$status', '$C_Date')";
                $result2 = mysqli_query($mysql, $sql2);
                
            }
             echo "1";
        }
    }
}

 





     
   
   
?>



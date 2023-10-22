<?php  
session_Start();
include_once("mysql_connection.php"); 

$query="SELECT Order_Number FROM `Order` where Date > '2022-12-31' GROUP BY Order_Number DESC HAVING COUNT(DISTINCT SKU) > 1";
$records = mysqli_query($mysql, $query); 
while($data = mysqli_fetch_array($records))
{
   $order=$data['Order_Number'];
  
   
    $my ="SELECT Price,Discount,Shipping from `Order` where Order_Number='$order'"; 
    $records1 = mysqli_query($mysql, $my);
    while($data1 = mysqli_fetch_array($records1))
    {
        $price+=(int)$data1['Price'];
        $del=(int)$data1['Discount'];
        $ship=(int)$data1['Shipping'];
    }
    
    (int)$newprice=($price+$ship)-$del;
    $price=0;
    $update = mysqli_query($mysql, "Update `Order` Set Total='$newprice' Where Order_Number='$order'");
    echo "Order :".$order."- Price :".$newprice;
    echo "<br>";
} 

?>
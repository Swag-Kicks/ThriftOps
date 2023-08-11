<?php  
session_Start();
include_once("../include/mysql_connection.php"); 

$query="SELECT Order_Number FROM `Order` GROUP BY Order_Number DESC HAVING COUNT(DISTINCT SKU) > 1";
$records = mysqli_query($mysql, $query); 
while($data = mysqli_fetch_array($records))
{
   $order=$data['Order_Number'];
  
   
  $my ="SELECT Price,Discount,Shipping from `Order` where Order_Number='$order'"; 
//   $total_data=mysqli_num_rows(mysqli_query($mysql, $my));
//   if($total_data>1)
//   {
      $records1 = mysqli_query($mysql, $my);
      while($data1 = mysqli_fetch_array($records1))
      {
          $price+=$data1['Price'];
          $del=$data1['Discount'];
          $ship=$data1['Shipping'];
      }
      
      $newprice=$price+$ship-$del;
//   }
//   else
//   {
//         $newprice=$data['new_pr'];
//   }
   echo "Order :"."- Price :".$newprice;
   echo "<br>";
} 

?>
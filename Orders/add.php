<?php


session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);
date_default_timezone_set("Asia/Karachi");
$C_Date = date('Y-m-d/h:i:a');

$cr=$_SESSION['Username'];
if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
{
    $pr="Select * from Users Where Dept_ID=2 AND Username='$cr' OR Dept_ID=3 AND Username='$cr'";
    $resu2 = mysqli_query($mysql, $pr);
    $rowq1 =mysqli_fetch_array($resu2);
    $dept=$rowq1['Dept_ID'];
    //echo $dept;
    if($dept=='')
    {
        echo '<script>alert("Your Are Not Authorized !");window.location.href="../Dashboard/Home.php";</script>';
    }   
}
else 
{
    echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
   
}

$id=$_GET['id'];
echo $id;
$SKU=$_POST['sku'];
echo $SKU;
$PRICE=$_POST['price'];
echo $PRICE;

$sql = "SELECT *,GROUP_CONCAT(Items) FROM orders WHERE order_id='$id' GROUP BY order_num ASC";
$result = mysqli_query($mysql, $sql);

while($row = mysqli_fetch_assoc($result)) 
{   
    $Order_Num = $row['order_num'];
    $invoice_total =$row['Total_Amount'];
    $Customer_Name=$row['Customer_Name'];
    $Customer_Phone=$row['Customer_Contact'];
    $Customer_Address=$row['Customer_Address'];
    $City=$row['Customer_City'];
    $Date=$row['Date'];
    $dis=$row['Total_Discount'];
    $deliv=$row['Courier_Charges'];
    $stat=$row['Status'];
}
echo "<br>";
echo $invoice_total; 
echo "<br>";
$tot=$PRICE+$invoice_total;
echo $tot;
$ins = "INSERT INTO orders (order_id,order_num,date,Customer_Name,Customer_Address,Customer_Contact,Customer_City,Items,Items_Price,Total_Discount,Total_Amount,Courier_Charges,Status) VALUES ('$id', '$Order_Num', '$Date', '$Customer_Name', '$Customer_Address', '$Customer_Phone', '$City', '$SKU', '$PRICE', '$dis', '$tot', '$deliv', '$stat')";
$res_ins = mysqli_query($mysql, $ins);

if(!$res_ins)
{
    echo "<script>alert('Error While Inserting !.')</script>";
}
else
{
  
} 

$up="UPDATE orders SET Total_Amount='$tot',Updated_By='$cr',Updated_By_Time='$C_Date' WHERE order_id='$id'";
$res_up=mysqli_query($mysql,$up);
if(!$res_up)
{
    echo "<script>alert('Error While Updating !.')</script>";
}
else
{
     echo '<script>alert("Updated Successfully");window.location.href="item.php?GETID='.$id.'";</script>';
    //echo '<script>window.location.href="item.php?GETID='$id'";</script>';
}




?>
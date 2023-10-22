<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);
date_default_timezone_set("Asia/Karachi");
$C_Date = date('Y-m-d/h:i:a');

$cr=$_SESSION['Username'];
if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
{
    $pr="Select * from Users Where Dept_ID=6 AND Username='$cr' OR Dept_ID=3 AND Username='$cr'";
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


$ID= $_GET['GETID'];
// echo $ID;



$date=date('Y-m-d/h:i:a');
//echo $date;
$space='';



$sq2l = "SELECT * FROM orders WHERE order_id LIKE '%$ID' AND Status='Recieved'";
$res12ult = mysqli_query($mysql, $sq2l);

if ($res12ult)
{
    $que="UPDATE orders SET Status='Packed',Packed_By='$cr',Packed_By_Time='$C_Date' where order_id='$ID'";
    $result1 = mysqli_query($mysql, $que);
    
    
    if(!$result1)
    {
        echo "<script>alert('Error While Picking !.')</script>";
    }
    else
    {
        echo '<script>alert("Packed Successfully");window.location.href="Packed.php";</script>';
    }
    
}





?>
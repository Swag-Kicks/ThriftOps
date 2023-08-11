<?php

require_once("../../../include/mysql_connection.php"); 
error_reporting(0);



$push=array();
$sql="SELECT * FROM Vendor LIMIT 10";
$res=mysqli_query($mysql, $sql);
if(isset($_POST['from']) && isset($_POST['to']))
{
   $from=$_POST['from'];
    $to=$_POST['to'];
    while($row=mysqli_fetch_array($res))
    {
       $query="SELECT Count(SKU) as items,Sum(Price) as tot FROM addition Where DateTime Between '$from 00:00:00' AND '$to 23:59:59' AND Vendor_ID='".$row['Vendor_ID']."'";
        $res1=mysqli_query($mysql, $query);
        $row1=mysqli_fetch_array($res1);
        $vendor=$row['Name'];
        $item=$row1['items'];
        $total=(int)$row1['tot'];
        // echo $item."<br>";
        $push[]=array("ven"=>$vendor,"count"=>$item,"total"=>$total);
    }
}
else
{
    //$sql="SELECT * FROM Vendor LIMIT 5";
    while($row=mysqli_fetch_array($res))
    {
        $query="SELECT Count(SKU) as items,Sum(Price) as tot FROM addition Where Vendor_ID='".$row['Vendor_ID']."'";
        $res1=mysqli_query($mysql, $query);
        $row1=mysqli_fetch_array($res1);
        $vendor=$row['Name'];
        $item=$row1['items'];
        $total=(int)$row1['tot'];
        // echo $item."<br>";
         $push[]=array("ven"=>$vendor,"count"=>$item,"total"=>$total);
    }
    
    
}
echo json_encode($push);
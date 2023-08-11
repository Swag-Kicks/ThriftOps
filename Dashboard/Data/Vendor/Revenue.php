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
       $query="SELECT Count(`Order`.SKU) as items,Sum(`Order`.Price) as tot FROM addition inner join `Order` on addition.SKU=`Order`.SKU Where `Order`.Date Between '$from' AND '$to' AND addition.Vendor_ID='".$row['Vendor_ID']."'";
        $res1=mysqli_query($mysql, $query);
        $row1=mysqli_fetch_array($res1);
        $vendor=$row['Name'];
        $item=$row1['items'];
        $total=(int)$row1['tot'];
        // echo $item."<br>";
        $push[]=array("ven"=>$vendor,"count"=>number_format($item),"total"=>number_format($total));
    }
}
else
{
    //$sql="SELECT * FROM Vendor LIMIT 5";
    while($row=mysqli_fetch_array($res))
    {
        $query="SELECT Count(`Order`.SKU) as items,Sum(`Order`.Price) as tot FROM addition inner join `Order` on addition.SKU=`Order`.SKU Where MONTH(`Order`.Date) = MONTH(now()) and YEAR(`Order`.Date) = YEAR(now()) AND addition.Vendor_ID='".$row['Vendor_ID']."'";
        $res1=mysqli_query($mysql, $query);
        $row1=mysqli_fetch_array($res1);
        $vendor=$row['Name'];
        $item=$row1['items'];
        $total=(int)$row1['tot'];
        // echo $item."<br>";
         $push[]=array("ven"=>$vendor,"count"=>number_format($item),"total"=>number_format($total));
    }
    
    
}
echo json_encode($push);
<?php

require_once("../include/mysql_connection.php"); 
error_reporting(0);



$push=array();
$sql="SELECT * FROM Category Order By Product_ID ASC";
$res=mysqli_query($mysql, $sql);
if(isset($_POST['from']) && isset($_POST['to']))
{
   $from=$_POST['from'];
    $to=$_POST['to'];
    while($row=mysqli_fetch_array($res))
    {
       $format="SK-".$row['SKU_Format'];
       $query="SELECT Count(SKU) as items,SUM(Price) as tot FROM `Order` Where Date Between '$from' AND '$to' AND SKU LIKE '%$format%'";
        $res1=mysqli_query($mysql, $query);
        $row1=mysqli_fetch_array($res1);
        $vendor=$row['Name'];
        $item=$row1['items'];
        
        $total=(int)$row1['tot'];
        // echo $item."<br>";
         $push[]=array("cat"=>$vendor,"count"=>number_format($item),"total"=>number_format($total));
    }
}
else
{
    //$sql="SELECT * FROM Vendor LIMIT 5";
    while($row=mysqli_fetch_array($res))
    {
        $format="SK-".$row['SKU_Format'];
        $query="SELECT Count(SKU) as items,SUM(Price) as tot,SKU FROM `Order` Where MONTH(Date) = MONTH(now()) and YEAR(Date) = YEAR(now()) AND SKU LIKE '%$format%'";
        //echo $query."<br>";
        $res1=mysqli_query($mysql, $query);
        $row1=mysqli_fetch_array($res1);
       
        $valid=$row1['SKU'];
        $load = preg_replace('/[0-9]+/', '', $valid);
        // echo $load."<br>";
        if($load==$format)
        {
            $vendor=$row['Name'];
            $item=$row1['items'];
            $total=(int)$row1['tot'];
            $push[]=array("cat"=>$vendor,"count"=>number_format($item),"total"=>number_format($total));
            // echo $item."<br>";
        }
        
         
    }
    
    
}
echo json_encode($push);
<?php

require_once("../../../include/mysql_connection.php"); 
error_reporting(0);

$push=array();
if(isset($_POST['from']) && isset($_POST['to']))
{
    $from=$_POST['from'];
    $to=$_POST['to'];
    
    // //monthly rev
    // $confirm = "SELECT SUM(Total) as tot FROM `Order` where Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    // $ctotal=mysqli_fetch_array((mysqli_query($mysql, $confirm)));
    
    // //today rev
    // $dispatch = "SELECT Count(Total) as td FROM `Order` where DAY(Date)= DAY(now()) AND MONTH(Date) = MONTH(now()) and YEAR(Date) = YEAR(now()) GROUP BY Order_ID ASC";
    // $distotal=mysqli_num_rows(mysqli_query($mysql, $dispatch));
    
    //monthly rev
    $confirm = (mysqli_query($mysql,"SELECT SUM(Total) as tot FROM `Order`  where Date Between '$from' AND '$to' GROUP BY Order_ID ASC"));
    while($row=mysqli_fetch_array($confirm))
    {
        $month+=(int)$row['tot'];
    }
    
    
    //today rev
    $dispatch = (mysqli_query($mysql,"SELECT Sum(Total) as td FROM `Order` where DAY(Date)= DAY(now()) AND MONTH(Date) = MONTH(now()) and YEAR(Date) = YEAR(now()) GROUP BY Order_ID ASC"));
    //$today=$distotal['td'];
    while($distotal=mysqli_fetch_array($dispatch))
    {
        $today+=(int)$distotal['td'];
    }    
    
    
    
    //uploads products
    $intransit = "SELECT * FROM `addition` where DateTime Between '$from 00:00:00' AND '$to 23:59:59' ORDER BY SKU ASC";
    $uploads=mysqli_num_rows(mysqli_query($mysql, $intransit));
    
    //total orders
    $deliver = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $totalo=mysqli_num_rows(mysqli_query($mysql, $deliver));
    
      $push=array(0=>number_format($month),1=>number_format($today),2=>number_format($uploads),3=>number_format($totalo));
}
else
{
    //monthly rev
    $confirm = (mysqli_query($mysql,"SELECT SUM(Total) as tot FROM `Order` where MONTH(Date) = MONTH(now()) and YEAR(Date) = YEAR(now()) GROUP BY Order_ID ASC"));
    while($row=mysqli_fetch_array($confirm))
    {
        $month+=(int)$row['tot'];
    }
    
    
    //today rev
    $dispatch = (mysqli_query($mysql,"SELECT Sum(Total) as td FROM `Order` where DAY(Date)= DAY(now()) AND MONTH(Date) = MONTH(now()) and YEAR(Date) = YEAR(now()) GROUP BY Order_ID ASC"));
    //$today=$distotal['td'];
    while($distotal=mysqli_fetch_array($dispatch))
    {
        $today+=(int)$distotal['td'];
    }
    
    //uploads products
    $intransit = "SELECT * FROM `addition` where MONTH(DateTime) = MONTH(now()) and YEAR(DateTime) = YEAR(now()) ORDER BY SKU ASC";
    $uploads=mysqli_num_rows(mysqli_query($mysql, $intransit));
    
    //total orders
    $deliver = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where MONTH(Date) = MONTH(now()) and YEAR(Date) = YEAR(now()) GROUP BY Order_ID ASC";
    $totalo=mysqli_num_rows(mysqli_query($mysql, $deliver));

    
    //array fill
    $push=array(0=>number_format($month),1=>number_format($today),2=>number_format($uploads),3=>number_format($totalo));
}


echo json_encode($push);
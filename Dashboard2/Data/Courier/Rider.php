<?php

require_once("../../../include/mysql_connection.php"); 
error_reporting(0);

$push=array();
if(isset($_POST['from']) && isset($_POST['to']))
{
    $from=$_POST['from'];
    $to=$_POST['to'];
    
    //Booked
    $confirm = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Booked%' AND Courier = 'Rider' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $ctotal=mysqli_num_rows(mysqli_query($mysql, $confirm));
    
    //dispatch
    $dispatch = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Dispatched%' AND Courier = 'Rider' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $distotal=mysqli_num_rows(mysqli_query($mysql, $dispatch));
    
    //intransit
    $intransit = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Intransit%' AND Courier = 'Rider' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $intotal=mysqli_num_rows(mysqli_query($mysql, $intransit));
    
    //delivered
    $deliver = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Delivered%' AND Courier = 'Rider' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $deltotal=mysqli_num_rows(mysqli_query($mysql, $deliver));
    
    //returned
    $return = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Returned%' AND Courier = 'Rider' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $rettotal=mysqli_num_rows(mysqli_query($mysql, $return));
    
    //lost
    $lost = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Loss%' AND Courier = 'Rider' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $lostotal=mysqli_num_rows(mysqli_query($mysql, $lost));
    
    //total all
    $allord = 'SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status in ("Booked","Dispatched","InTransit","Delivered","Returned","Loss") AND Courier = "Rider" AND Date Between "'.$from.'" AND "'.$to.'" GROUP BY Order_ID ASC';
    $all=mysqli_num_rows(mysqli_query($mysql, $allord));
    
    
    //$all=$ptotal+$contotal+$cantotal+$htotal+$retotal;
    
    //array fill
    $push=array(0=>$ctotal,1=>$distotal,2=>$intotal,3=>$deltotal,4=>$rettotal,5=>$lostotal,6=>$all);
}
else
{
    //Booked
    $confirm = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Booked%' AND Courier = 'Rider' GROUP BY Order_ID ASC";
    $ctotal=mysqli_num_rows(mysqli_query($mysql, $confirm));
    
    //dispatch
    $dispatch = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Dispatched%' AND Courier = 'Rider' GROUP BY Order_ID ASC";
    $distotal=mysqli_num_rows(mysqli_query($mysql, $dispatch));
    
    //intransit
    $intransit = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Intransit%' AND Courier = 'Rider' GROUP BY Order_ID ASC";
    $intotal=mysqli_num_rows(mysqli_query($mysql, $intransit));
    
    //delivered
    $deliver = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Delivered%' AND Courier = 'Rider' GROUP BY Order_ID ASC";
    $deltotal=mysqli_num_rows(mysqli_query($mysql, $deliver));
    
    //returned
    $return = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Returned%' AND Courier = 'Rider' GROUP BY Order_ID ASC";
    $rettotal=mysqli_num_rows(mysqli_query($mysql, $return));
    
    //lost
    $lost = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Loss%' AND Courier = 'Rider' GROUP BY Order_ID ASC";
    $lostotal=mysqli_num_rows(mysqli_query($mysql, $lost));
    
    //total all
    $allord = 'SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status in ("Booked","Dispatched","InTransit","Delivered","Returned","Loss") AND Courier = "Rider" GROUP BY Order_ID ASC';
    $all=mysqli_num_rows(mysqli_query($mysql, $allord));
    
    
    //$all=$ptotal+$contotal+$cantotal+$htotal+$retotal;
    
    //array fill
    $push=array(0=>$ctotal,1=>$distotal,2=>$intotal,3=>$deltotal,4=>$rettotal,5=>$lostotal,6=>$all);
}


echo json_encode($push);
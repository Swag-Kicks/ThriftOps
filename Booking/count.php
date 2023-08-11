
<?php

include_once("../include/mysql_connection.php"); 
error_reporting(0);

$push=array();
if(isset($_POST['from']) && isset($_POST['to']))
{
    $from=$_POST['from'];
    $to=$_POST['to'];
    
    //confirmed
    $confirm = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Confirmed%' AND Date Between '$from' AND '$to'  GROUP BY Order_ID ASC";
    $ctotal=mysqli_num_rows(mysqli_query($mysql, $confirm));
    
    //dispatch
    $dispatch = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Dispatched%' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $distotal=mysqli_num_rows(mysqli_query($mysql, $dispatch));
    
    //intransit
    $intransit = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Intransit%' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $intotal=mysqli_num_rows(mysqli_query($mysql, $intransit));
    
    //delivered
    $deliver = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Delivered%' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $deltotal=mysqli_num_rows(mysqli_query($mysql, $deliver));
    
    //returned
    $return = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Returned%' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $rettotal=mysqli_num_rows(mysqli_query($mysql, $return));
    
    //lost
    $lost = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Loss%' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $lostotal=mysqli_num_rows(mysqli_query($mysql, $lost));
    
    //booked
    $book = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Courier !='' AND Tracking !='' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $booktotal=mysqli_num_rows(mysqli_query($mysql, $book));
    
    //total all
    $allord = 'SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status in ("Confirmed","Dispatched","InTransit","Delivered","Returned","Loss") AND Date Between "'.$from.'" AND "'.$to.'" GROUP BY Order_ID ASC';
    $all=mysqli_num_rows(mysqli_query($mysql, $allord));
    
    
    //$all=$ptotal+$contotal+$cantotal+$htotal+$retotal;
    
    //array fill
    $push=array(0=>$ctotal,1=>$distotal,2=>$intotal,3=>$deltotal,4=>$rettotal,5=>$lostotal,6=>$booktotal,7=>$all);
}
else
{
    //confirmed
    $confirm = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Confirmed%' GROUP BY Order_ID ASC";
    $ctotal=mysqli_num_rows(mysqli_query($mysql, $confirm));
    
    //dispatch
    $dispatch = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Dispatched%' GROUP BY Order_ID ASC";
    $distotal=mysqli_num_rows(mysqli_query($mysql, $dispatch));
    
    //intransit
    $intransit = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Intransit%' GROUP BY Order_ID ASC";
    $intotal=mysqli_num_rows(mysqli_query($mysql, $intransit));
    
    //delivered
    $deliver = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Delivered%' GROUP BY Order_ID ASC";
    $deltotal=mysqli_num_rows(mysqli_query($mysql, $deliver));
    
    //returned
    $return = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Returned%' GROUP BY Order_ID ASC";
    $rettotal=mysqli_num_rows(mysqli_query($mysql, $return));
    
    //lost
    $lost = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Loss%' GROUP BY Order_ID ASC";
    $lostotal=mysqli_num_rows(mysqli_query($mysql, $lost));
    
    //book
    $book = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Courier !='' AND Tracking !='' GROUP BY Order_ID ASC";
    $booktotal=mysqli_num_rows(mysqli_query($mysql, $book));
    
    //total all
    $allord = 'SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status in ("Confirmed","Dispatched","InTransit","Delivered","Returned","Loss") GROUP BY Order_ID ASC';
    $all=mysqli_num_rows(mysqli_query($mysql, $allord));
    
    
    //$all=$ptotal+$contotal+$cantotal+$htotal+$retotal;
    
    //array fill
    $push=array(0=>$ctotal,1=>$distotal,2=>$intotal,3=>$deltotal,4=>$rettotal,5=>$lostotal,6=>$booktotal,7=>$all);
}


echo json_encode($push);


?>
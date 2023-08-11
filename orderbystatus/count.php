
<?php

include_once("../include/mysql_connection.php"); 
error_reporting(0);

$push=array();
if(isset($_POST['from']) && isset($_POST['to']))
{
    $from=$_POST['from'];
    $to=$_POST['to'];
    //confirmed
    $pending = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Confirmed%' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $ptotal=mysqli_num_rows(mysqli_query($mysql, $pending));
    
    //cancel
    $confirm = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Cancel%' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $contotal=mysqli_num_rows(mysqli_query($mysql, $confirm));
    
    //hold
    $cancel = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Hold%' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $cantotal=mysqli_num_rows(mysqli_query($mysql, $cancel));
    
    //picked
    $hold = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` INNER JOIN Logs on `Order`.Order_ID=Logs.Type_ID WHERE Logs.Status= "Picked" AND Logs.DateTime Between "2023-05-01 00:00:00" AND "2023-05-14 23:59:59" GROUP BY Order_ID DESC LIMIT 0, 10 GROUP BY Order_ID ASC";
    $htotal=mysqli_num_rows(mysqli_query($mysql, $hold));
    
    //notfound
    $reattempt = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status='Not_Found' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $retotal=mysqli_num_rows(mysqli_query($mysql, $reattempt));
    
    //qcrej
    $wait = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%QC_Reject%' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $wfr=mysqli_num_rows(mysqli_query($mysql, $wait));
   
    //packed
    $wait1 = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Packed%' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $wfr1=mysqli_num_rows(mysqli_query($mysql, $wait1));
    
    //dispatched
    $wait2 = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Dispatched%' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $wfr2=mysqli_num_rows(mysqli_query($mysql, $wait2));
    
    //total all
     $allord = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Date Between '$from' AND '$to' AND Status in ('Packed','Confirmed','Cancel','Hold','Picked','Not_Found','QC_Reject','Dispatched') GROUP BY Order_ID ASC";
    $all=mysqli_num_rows(mysqli_query($mysql, $allord));
    //$all=$ptotal+$contotal+$cantotal+$htotal+$retotal;
    
    //array fill
    $push=array(0=>$ptotal,1=>$contotal,2=>$cantotal,3=>$htotal,4=>$retotal,5=>$wfr,6=>$wfr1,7=>$wfr2,8=>$all);
}
else
{
    //confirmed
    $pending = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Confirmed%' GROUP BY Order_ID ASC";
    $ptotal=mysqli_num_rows(mysqli_query($mysql, $pending));
    
   //cancel
    $confirm = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Cancel%' GROUP BY Order_ID ASC";
    $contotal=mysqli_num_rows(mysqli_query($mysql, $confirm));
    
    //hold
    $cancel = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Hold%' GROUP BY Order_ID ASC";
    $cantotal=mysqli_num_rows(mysqli_query($mysql, $cancel));
    
    //picked
    $hold = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Picked%' GROUP BY Order_ID ASC";
    $htotal=mysqli_num_rows(mysqli_query($mysql, $hold));
    
    //notfund
    $reattempt = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status='Not_Found'  GROUP BY Order_ID ASC";
    $retotal=mysqli_num_rows(mysqli_query($mysql, $reattempt));
    
    //qcrej
    $wait = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%QC_Reject%' GROUP BY Order_ID ASC";
    $wfr=mysqli_num_rows(mysqli_query($mysql, $wait));
    
    //packed
    $wait1 = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Packed%' GROUP BY Order_ID ASC";
    $wfr1=mysqli_num_rows(mysqli_query($mysql, $wait1));
    
    //dispacthed
    $wait2 = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Dispatched%' GROUP BY Order_ID ASC";
    $wfr2=mysqli_num_rows(mysqli_query($mysql, $wait2));
    
    //total all
    $allord = 'SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status in ("Packed","Confirmed","Cancel","Hold","Picked","Not_Found","QC_Reject","Dispatched") GROUP BY Order_ID ASC';
    $all=mysqli_num_rows(mysqli_query($mysql, $allord));
    
    
    //$all=$ptotal+$contotal+$cantotal+$htotal+$retotal;
    
    //array fill
    $push=array(0=>$ptotal,1=>$contotal,2=>$cantotal,3=>$htotal,4=>$retotal,5=>$wfr,6=>$wfr1,7=>$wfr2,8=>$all);
}


echo json_encode($push);


?>
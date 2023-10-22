
<?php

include_once("../include/mysql_connection.php"); 
error_reporting(0);

$push=array();
if(isset($_POST['from']) && isset($_POST['to']))
{
    $from=$_POST['from'];
    $to=$_POST['to'];
    //pending
    $pending = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%None%' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $ptotal=mysqli_num_rows(mysqli_query($mysql, $pending));
    
    //confirmed
    $confirm = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Confirmed%' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $contotal=mysqli_num_rows(mysqli_query($mysql, $confirm));
    
    //cancel
    $cancel = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Cancel%' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $cantotal=mysqli_num_rows(mysqli_query($mysql, $cancel));
    
    //onhold
    $hold = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Hold%' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $htotal=mysqli_num_rows(mysqli_query($mysql, $hold));
    
    //reattempt
    $reattempt = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Reattempt%' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $retotal=mysqli_num_rows(mysqli_query($mysql, $reattempt));
   
    //wfr
    $wait = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%WFR%' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $wfr=mysqli_num_rows(mysqli_query($mysql, $wait));
    
    //total all
     $allord = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Date Between '$from' AND '$to' AND Status in ('None','Confirmed','Cancel','Hold','Reattempt','WFR') GROUP BY Order_ID ASC";
    $all=mysqli_num_rows(mysqli_query($mysql, $allord));
    //$all=$ptotal+$contotal+$cantotal+$htotal+$retotal;
    
    //array fill
    $push=array(0=>$ptotal,1=>$contotal,2=>$cantotal,3=>$htotal,4=>$retotal,5=>$all,6=>$wfr);
}
else
{
    //pending
    $pending = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%None%' GROUP BY Order_ID ASC";
    $ptotal=mysqli_num_rows(mysqli_query($mysql, $pending));
    
    //confirmed
    $confirm = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Confirmed%' GROUP BY Order_ID ASC";
    $contotal=mysqli_num_rows(mysqli_query($mysql, $confirm));
    
    //cancel
    $cancel = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Cancel%' GROUP BY Order_ID ASC";
    $cantotal=mysqli_num_rows(mysqli_query($mysql, $cancel));
    
    //onhold
    $hold = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Hold%' GROUP BY Order_ID ASC";
    $htotal=mysqli_num_rows(mysqli_query($mysql, $hold));
    
    //reattempt
    $reattempt = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Reattempt%' GROUP BY Order_ID ASC";
    $retotal=mysqli_num_rows(mysqli_query($mysql, $reattempt));
    
    //wfr
    $wait = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%WFR%' GROUP BY Order_ID ASC";
    $wfr=mysqli_num_rows(mysqli_query($mysql, $wait));
    
    //total all
    $allord = 'SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status in ("None","Confirmed","Cancel","Hold","Reattempt","WFR") GROUP BY Order_ID ASC';
    $all=mysqli_num_rows(mysqli_query($mysql, $allord));
    
    
    //$all=$ptotal+$contotal+$cantotal+$htotal+$retotal;
    
    //array fill
    $push=array(0=>$ptotal,1=>$contotal,2=>$cantotal,3=>$htotal,4=>$retotal,5=>$all,6=>$wfr);
}


echo json_encode($push);


?>
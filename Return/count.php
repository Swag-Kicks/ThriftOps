
<?php

include_once("../include/mysql_connection.php"); 
error_reporting(0);

$push=array();
if(isset($_POST['from']) && isset($_POST['to']))
{
    $from=$_POST['from'];
    $to=$_POST['to'];
    //
    $pending = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Exchange%' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $ptotal=mysqli_num_rows(mysqli_query($mysql, $pending));
    
    //confirmed
    $confirm = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Reattempt%' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $contotal=mysqli_num_rows(mysqli_query($mysql, $confirm));
    
    //cancel
    $cancel = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Returned%' AND Date Between '$from' AND '$to' GROUP BY Order_ID ASC";
    $cantotal=mysqli_num_rows(mysqli_query($mysql, $cancel));

    //total all
     $allord = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Date Between '$from' AND '$to' AND Status in ('Exchange','Returned','Reattempt') GROUP BY Order_ID ASC";
    $all=mysqli_num_rows(mysqli_query($mysql, $allord));
    //$all=$ptotal+$contotal+$cantotal+$htotal+$retotal;
    
    //array fill
     $push=array(0=>$ptotal,1=>$contotal,2=>$cantotal,3=>$all);
}
else
{
    //pending
    $pending = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Exchange%' GROUP BY Order_ID ASC";
    $ptotal=mysqli_num_rows(mysqli_query($mysql, $pending));
    
    //confirmed
    $confirm = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Reattempt%' GROUP BY Order_ID ASC";
    $contotal=mysqli_num_rows(mysqli_query($mysql, $confirm));
    
    //cancel
    $cancel = "SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status LIKE '%Returned%' GROUP BY Order_ID ASC";
    $cantotal=mysqli_num_rows(mysqli_query($mysql, $cancel));
    
    //total all
    $allord = 'SELECT *,GROUP_Concat(SKU) as con FROM `Order` where Status in ("Exchange","Returned","Reattempt") GROUP BY Order_ID ASC';
    $all=mysqli_num_rows(mysqli_query($mysql, $allord));
    
    
    //$all=$ptotal+$contotal+$cantotal+$htotal+$retotal;
    
    //array fill
    $push=array(0=>$ptotal,1=>$contotal,2=>$cantotal,3=>$all);
}


echo json_encode($push);


?>

<?php

include_once("../include/mysql_connection.php"); 
error_reporting(0);

$push=array();
if(isset($_POST['from']) && isset($_POST['to']))
{
    $from=$_POST['from'];
    $to=$_POST['to'];
    //pending
    $pending = "SELECT *,GROUP_Concat(Shopify_ID) as con FROM `Abandoned` where Status LIKE '%Pending%' AND DateTime Between '$from 00:00:00' AND '$to' GROUP BY Shopify_ID ASC";
    $ptotal=mysqli_num_rows(mysqli_query($mysql, $pending));
    
    //confirmed
    $confirm = "SELECT *,GROUP_Concat(Shopify_ID) as con FROM `Abandoned` where Status in ('Order Placed','Already Placed','Ordered on Chat') AND DateTime Between '$from 00:00:00' AND '$to' GROUP BY Shopify_ID ASC";
    $contotal=mysqli_num_rows(mysqli_query($mysql, $confirm));
    
    //cancel
    $cancel = "SELECT *,GROUP_Concat(Shopify_ID) as con FROM `Abandoned` where Status in ('Unreachable','Not Answering') AND DateTime Between '$from 00:00:00' AND '$to' GROUP BY Shopify_ID ASC";
    $cantotal=mysqli_num_rows(mysqli_query($mysql, $cancel));
    
    //onhold
    $hold = "SELECT *,GROUP_Concat(Shopify_ID) as con FROM `Abandoned` where Status LIKE '%Not Interested%' AND DateTime Between '$from 00:00:00' AND '$to' GROUP BY Shopify_ID ASC";
    $htotal=mysqli_num_rows(mysqli_query($mysql, $hold));
    
    //reattempt
    $reattempt = "SELECT *,GROUP_Concat(Shopify_ID) as con FROM `Abandoned` where Status in ('Payment Issue','DC Issue','Size Issue','Will Order Soon') AND DateTime Between '$from 00:00:00' AND '$to' GROUP BY Shopify_ID ASC";
    $retotal=mysqli_num_rows(mysqli_query($mysql, $reattempt));
    
    //total all
     $allord = "SELECT *,GROUP_Concat(Shopify_ID) as con FROM `Abandoned` where DateTime Between '$from 00:00:00' AND '$to' AND Status in ('Order Placed','Pending','Already Placed','Not Answering','Unreachable','Payment Issue','DC Issue','Size Issue','Will Order Soon','Ordered on Chat','Not Interested') GROUP BY Shopify_ID ASC";
    $all=mysqli_num_rows(mysqli_query($mysql, $allord));
    //$all=$ptotal+$contotal+$cantotal+$htotal+$retotal;
    
    //array fill
    $push=array(0=>$ptotal,1=>$contotal,2=>$cantotal,3=>$htotal,4=>$retotal,5=>$all);
}
else
{
    //pending
    $pending = "SELECT *,GROUP_Concat(Shopify_ID) as con FROM `Abandoned` where Status LIKE '%Pending%' GROUP BY Shopify_ID ASC";
    $ptotal=mysqli_num_rows(mysqli_query($mysql, $pending));
    
    //confirmed
    $confirm = "SELECT *,GROUP_Concat(Shopify_ID) as con FROM `Abandoned` where Status in ('Order Placed','Already Placed','Ordered on Chat') GROUP BY Shopify_ID ASC";
    $contotal=mysqli_num_rows(mysqli_query($mysql, $confirm));
    
    //cancel
    $cancel = "SELECT *,GROUP_Concat(Shopify_ID) as con FROM `Abandoned` where Status in ('Unreachable','Not Answering') GROUP BY Shopify_ID ASC";
    $cantotal=mysqli_num_rows(mysqli_query($mysql, $cancel));
    
    //onhold
    $hold = "SELECT *,GROUP_Concat(Shopify_ID) as con FROM `Abandoned` where Status LIKE '%Not Interested%' GROUP BY Shopify_ID ASC";
    $htotal=mysqli_num_rows(mysqli_query($mysql, $hold));
    
    //reattempt
    $reattempt = "SELECT *,GROUP_Concat(Shopify_ID) as con FROM `Abandoned` where Status in ('Payment Issue','DC Issue','Size Issue','Will Order Soon') GROUP BY Shopify_ID ASC";
    $retotal=mysqli_num_rows(mysqli_query($mysql, $reattempt));
    
    //total all
    $allord = 'SELECT *,GROUP_Concat(Shopify_ID) as con FROM `Abandoned` where Status in ("Order Placed","Pending","Already Placed","Not Answering","Unreachable","Payment Issue","DC Issue","Size Issue","Will Order Soon","Ordered on Chat","Not Interested") GROUP BY Shopify_ID ASC';
    $all=mysqli_num_rows(mysqli_query($mysql, $allord));
    
    
    //$all=$ptotal+$contotal+$cantotal+$htotal+$retotal;
    
    //array fill
    $push=array(0=>$ptotal,1=>$contotal,2=>$cantotal,3=>$htotal,4=>$retotal,5=>$all);
}


echo json_encode($push);


?>
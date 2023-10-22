<?php


include_once("../include/mysql_connection.php"); 
error_reporting(0);
$cr=$_SESSION['Username'];
date_default_timezone_set("Asia/Karachi");
$C_Date = date('Y-m-d/h:i:a');


$today=date('Y-m-d');


$sql123 = "SELECT *, GROUP_CONCAT(Items) as con FROM orders WHERE Status='None' AND Date > '2022-08-01' GROUP BY order_num DESC LIMIT 20";
// $sql123 = "SELECT *, GROUP_CONCAT(Items) as con FROM orders WHERE order_id='4635229159610'";
$resulta = mysqli_query($mysql, $sql123);    
while($row = mysqli_fetch_array($resulta)) 
{   
    $Order_Num = $row['order_num'];
    $ord=$row['order_id'];
    $str1 = substr($Order_Num, 1);
    $price = $row['Total_Amount'];
    $phone = $row['Customer_Contact'];
    if($phone[0]==0)
    {
        $try=preg_replace('/^\+?92|\|1|\D/', '', ($phone));
        $h=$try;
    }
    else
    {
        $try=preg_replace('/^\+?92|\|1|\D/', '', ($phone));
        $h="0".$try;
    }
    
    $url="https://ivr.eocean.us/cgi-bin/Swag_Kicks/outbound.cgi?caller_id=$h&order_id=$str1&Amount=$price&username=swagkicks&password=EOswagkicks@API";
    
    $curl = curl_init();
    
    curl_setopt($curl,CURLOPT_URL , $url);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER , true);
    curl_setopt($curl,CURLOPT_ENCODING , '');
    curl_setopt($curl,CURLOPT_MAXREDIRS , 10);
    curl_setopt($curl,CURLOPT_TIMEOUT , 0);
    curl_setopt($curl,CURLOPT_FOLLOWLOCATION , true);
    curl_setopt($curl,CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1);
    curl_setopt($curl,CURLOPT_CUSTOMREQUEST , 'GET');

    $response = curl_exec($curl);
    curl_close($curl);
    //echo $response;
    
    $la1="UPDATE orders SET Status='$response' WHERE order_id='$ord'";
    $rel1 = mysqli_query($mysql, $la1);
        




}


?>

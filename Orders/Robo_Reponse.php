<?php

include_once("../include/mysql_connection.php"); 
error_reporting(0);
$cr=$_SESSION['Username'];
date_default_timezone_set("Asia/Karachi");
$C_Date = date('Y-m-d/h:i:a');

$user='Robo_Call';
$today=date('Y-m-d');

//shopify and updates
$sql123 = "SELECT *, GROUP_CONCAT(Items) as con FROM orders WHERE Status='Ok 200' AND Date > '2022-08-15' GROUP BY order_num DESC LIMIT 150";
$resulta = mysqli_query($mysql, $sql123);    
while($row = mysqli_fetch_array($resulta)) 
{   

    $Order_id = $row['order_id'];
    $Order_Num = $row['order_num'];
    $str1 = substr($Order_Num, 1);

    $url="https://ivr.eocean.us/cgi-bin/Swag_Kicks/getapi.php?order_number=$str1&username=SwagKicks&password=swag_kicks@EoGET";
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
    $jso =json_decode($response,true);
    //print_r($jso);
    $view1=$jso[0]['DTMF'];
    $view2=$jso[0]['response'];
    
    
    echo $str1." : DTMF : ".$view1." Response : ".$view2;
    echo "<br>";

    if($view1== 1 && $view2== 'ANSWER')
    { 
        //confirm
        echo 'Confirmed';
        $status="Confirmed";
        $pr='Robo-Confirmed';
        $orders_array = array(
                "order" => array(
                    "id" => $Order_id,
                    "note" => $pr,
                    "tags" => $status
                    )
        );
     
        $API_KEY = '6f9c9e67fe431b576ec23b9c3ea59067';
        $PASSWORD = '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';
        $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
        $SHOPIFY_API = "https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/orders/".$Order_id.".json";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $SHOPIFY_API);
        $headers = array(
            "Authorization: Basic ".base64_encode("$API_KEY:$PASSWORD"),
            "Content-Type: application/json",
            "charset: utf-8"
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER,$headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_VERBOSE, 0);
        curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($orders_array));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        
        $result = curl_exec ($curl);
        $insert ="UPDATE orders SET Status='$status',Confirmed_By='$user',Confirmed_By_Time='$C_Date' WHERE order_id='$Order_id'";  
        $que = mysqli_query($mysql, $insert);
        // echo $str1;
        // echo "<br>";
        // sleep(1);
    }
    
    if($view1==2 && $view2== 'ANSWER')
    {
        //cancel
        echo 'Cancel';
        $insert ="UPDATE orders SET Status='Recall',Confirmed_By='$user',Confirmed_By_Time='$C_Date' WHERE order_id='$Order_id'";  
        $que = mysqli_query($mysql, $insert);
    }
    
    if($view1==3 && $view2== 'NoAnswer')
    {
        //no answer
        echo 'No Answer';
        $insert ="UPDATE orders SET Status='NoAnswer' WHERE order_id='$Order_id'";  
        $que = mysqli_query($mysql, $insert);
    }
    
    if($view1==3 && $view2== 'BUSY')
    {
        //busy
        echo 'None';
        $insert ="UPDATE orders SET Status='Busy' WHERE order_id='$Order_id'";  
        $que = mysqli_query($mysql, $insert);
    }
    
    if($view1==3 && $view2== 'ANSWER')
    {
        //busy
        echo 'None';
        $insert ="UPDATE orders SET Status='Recall' WHERE order_id='$Order_id'";  
        $que = mysqli_query($mysql, $insert);
    }
    
     if($view1==3 && $view2== 'Hangup')
    {
        //busy
        echo 'None';
        $insert ="UPDATE orders SET Status='Recall' WHERE order_id='$Order_id'";  
        $que = mysqli_query($mysql, $insert);
    }
    if($view1==3 && $view2== 'Congestion')
    {
        //busy
        echo 'None';
        $insert ="UPDATE orders SET Status='Recall' WHERE order_id='$Order_id'";  
        $que = mysqli_query($mysql, $insert);
    }
    if($view1=='' && $view2== '')
    {
        //busy
        echo 'None';
        $insert ="UPDATE orders SET Status='Recall' WHERE order_id='$Order_id'";  
        $que = mysqli_query($mysql, $insert);
    }

    

}


?>
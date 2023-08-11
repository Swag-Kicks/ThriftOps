<?php

include_once("../include/mysql_connection.php"); 
error_reporting(0);

$main=array();

$pid=$_GET['shop'];
        
if(isset($pid))
{
            
    $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
    //product item id
    $ch = curl_init("https://$SHOP_URL/admin/api/2022-01/products/$pid.json");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'X-Shopify-Access-Token: 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',
        'Content-Type: application/json'                                                                                                                                      
    ));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                
    $result = curl_exec($ch);
    $result=json_decode($result,true);
    $all=$result['product'];
    
    
    $main = array('data'=>$all);
    echo json_encode($main);


}
            




?>
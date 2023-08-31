<?php

include_once("../include/mysql_connection.php"); 
error_reporting(0);

$main=array();

$pid=$_GET['shop'];
        
if(isset($pid))
{
    //shopify token
    $sql2="Select * from `API_Credentials` Where Platform='Shopify'";
    $sh = mysqli_query($mysql, $sql2);
    $row1 = mysqli_fetch_assoc($sh);
    $shop_token=$row1['API_Pass'];         
    $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
    //product item id
    $ch = curl_init("https://$SHOP_URL/admin/api/2022-01/products/$pid.json");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        "X-Shopify-Access-Token: $shop_token",
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
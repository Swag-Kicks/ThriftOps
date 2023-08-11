<?php
session_Start();
include_once("../include/mysql_connection.php"); 
$cr=$_SESSION['id'];

if(isset($_POST['id']) && isset($_POST['war']))
{
    $Shopify=$_POST[id];
    $warhouse=$_POST['war'];
    $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
    //product item id
    $ch = curl_init("https://$SHOP_URL/admin/api/2023-01/products/$Shopify.json");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'X-Shopify-Access-Token: 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',
        'Content-Type: application/json'                                                                                                                                      
        ));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
    $result = curl_exec($ch);
    $result=json_decode($result,true);
   
    $quantity=$result['product']['variants'][0]['inventory_quantity'];
    $status=$result['product']['status'];
    $price=$result['product']['variants'][0]['price'];
    $records = mysqli_query($mysql, "Update `addition` SET Status='$status',Price='$price',Quantity='$quantity' WHERE Shopify_ID='$Shopify' AND Warehouse_ID='$warhouse'");   
    echo "1";
}


?>
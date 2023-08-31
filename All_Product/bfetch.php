<?php
session_Start();
include_once("../include/mysql_connection.php"); 
$cr=$_SESSION['id'];

if(isset($_POST['id']) && isset($_POST['war']))
{
    $warhouse=$_POST['war'];
    foreach($_POST["id"] as $Shopify)
    {
        $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
        //shopify token
        $sql2="Select * from `API_Credentials` Where Platform='Shopify'";
        $sh = mysqli_query($mysql, $sql2);
        $row1 = mysqli_fetch_assoc($sh);
        $shop_token=$row1['API_Pass'];
        //product item id
        $ch = curl_init("https://$SHOP_URL/admin/api/2023-07/products/$Shopify.json");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            "X-Shopify-Access-Token: $shop_token",
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
}

?>
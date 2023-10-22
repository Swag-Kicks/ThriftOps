<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['id'];



if(isset($_POST['shopid']) && isset($_POST['order']))
{
    $orderid=$_POST['order'];
    $C_Date = date('Y-m-d/h:i:a');
    foreach($_POST["shopid"] as $Shopify)
    {
        //fetch from shopify
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
        $id_v=$result["product"]["variants"][0]["inventory_item_id"];
        $quantity=$result['product']['variants'][0]['inventory_quantity'];
        $price=$result['product']['variants'][0]['price'];
        $sku=$result['product']['variants'][0]['sku'];
        $statsd=$result['product']['status'];
        
        //update
        $query1 =  mysqli_query($mysql, "Select * from `Order` WHERE Order_ID='$orderid' AND SKU='$sku'");
        $row1 = mysqli_fetch_array($query1);
        $index=$row1['id'];
        $total=$row1['Total'];
        
        $total-=$price;
        if($total>=2500)
        {
            $ship=0;
        }
        else
        {
            $ship=250;
        }
        //delete item
        $query2 =  mysqli_query($mysql, "Delete from `Order` WHERE id='$index'");
        
        //update order value
        $update=mysqli_query($mysql,"Update `Order` SET Total='$total',Shipping='$ship' WHERE Order_ID='$orderid' AND SKU='$sku'");
        if($update)
        {
            //product update
            $update1=mysqli_query($mysql,"Update `addition` SET Status='$statsd',Quantity='$quantity' where SKU='$sku'");
            if($update1)
            {
                $string=$sku." Items removed";
                $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$orderid', '$string', 'Add', '$C_Date')";
                $result1 = mysqli_query($mysql, $sql1);
                echo "1";
            }
            
        }
        
    }
    
}

else
{
    echo "0";
}

?>
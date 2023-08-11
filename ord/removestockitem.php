<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['id'];

if(isset($_POST['shopid']) && isset($_POST['order']) && isset($_POST['quant']))
{
    $C_Date = date('Y-m-d/h:i:a');
    $pending = "SELECT id as con FROM `Order` where Order_ID='".$_POST['order']."'";
    $check=mysqli_num_rows(mysqli_query($mysql, $pending));
    if($check<=1)
    {
        echo "2";
    }
    else
    {
        foreach($_POST["shopid"] as $Shopify)
        {
        $query = mysqli_query($mysql, "Select *	from `addition` WHERE Shopify_ID='$Shopify'");
        $row = mysqli_fetch_array($query);
        $id_v=$row['Inventory_Item_ID'];
        
        // inventory 
        $ch1 = curl_init();
        $C_Date = date('Y-m-d/h:i:a');
        curl_setopt_array($ch1, array(
            CURLOPT_URL => 'https://www-swag-kicks-com.myshopify.com/admin/api/2023-01/inventory_levels/adjust.json',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
            "location_id": 63487475898,
            "inventory_item_id": "'.$id_v.'",
            "available_adjustment": 1
            }',
            CURLOPT_HTTPHEADER => array(
            'X-Shopify-Access-Token: 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',
            'Content-Type: application/json'
            ),
            ));
        $response12 = curl_exec($ch1);
        curl_close($ch1);
        if($response12)
        {
            sleep(1);
            $stat='active';
            //active-draft
            $curl = curl_init();
              $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
            $ul="https://$SHOP_URL/admin/api/2023-01/products/$Shopify.json";
            curl_setopt_array($curl, array(
              CURLOPT_URL => $ul,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'PUT',
              CURLOPT_POSTFIELDS =>' {
                 "product": 
                 {
                    "status": "'.$stat.'"
                 }
             }',
              CURLOPT_HTTPHEADER => array(
                    'X-Shopify-Access-Token: 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',
                    'Content-Type: application/json'                                                                                                                                      
              ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            if($response)
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
                //$price=$result['product']['variants'][0]['price'];
                $sku=$result['product']['variants'][0]['sku'];
                $statsd=$result['product']['status'];
                
                //update
                $orderid=$_POST['order'];
                $query1 =  mysqli_query($mysql, "Select * from `Order` WHERE Order_ID='$orderid' AND SKU='$sku'");
                $row1 = mysqli_fetch_array($query1);
                $index=$row1['id'];
                $Total=$row1['Total'];
                $price=$row1['Price'];
                
                $Total=$Total-$price;
                if($Total>=2500)
                {
                    $ship=0;
                }
                else
                {
                    $ship=250;
                    $Total=$Total+250;
                }
                //delete item
                $query2 =  mysqli_query($mysql, "Delete from `Order` WHERE id='$index'");
                
                //update order value
                $update=mysqli_query($mysql,"Update `Order` SET Shipping='$ship',Total='$Total' WHERE Order_ID='$orderid'");
                if($update)
                {
                    //product update
                    $update1=mysqli_query($mysql,"Update `addition` SET Status='$statsd',Quantity='$quantity' WHERE SKU='$sku'");
                     if($update1)
                    {
                        $string=$sku." Items removed an restocked";
                        $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$orderid', '$string', 'Add', '$C_Date')";
                        $result1 = mysqli_query($mysql, $sql1);
                        echo "1";
                    }
                    
                }
            }
        }
        

    }
    }

    
}

else
{
    echo "0";
}
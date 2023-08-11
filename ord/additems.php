<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['id'];


if(isset($_POST['shopid']) && isset($_POST['order']) && isset($_POST['quant']))
{
    $orderid=$_POST['order'];
    $query = mysqli_query($mysql, "Select *	from `Order` WHERE Order_ID='$orderid'");
    $row = mysqli_fetch_array($query);
    $ordernum=$row['Order_Number'];
    $Date=$row['Date'];
    $Name=$row['Name'];
    $Address=$row['Address'];
    $Contact=$row['Contact'];
    $City=$row['City'];
    $Shipping=$row['Shipping'];
    $Statg=$row['Status'];
    $Dispatch_Advise=$row['Dispatch_Advise'];
    $Discount=$row['Discount'];
    $Total=$row['Total'];
    
    foreach($_POST["shopid"] as $Shopify)
    {
        foreach($_POST['quant'] as $input)
        {
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
            $sku=$result['product']['variants'][0]['sku'];
            $id_v=$result['product']['variants'][0]['inventory_item_id'];
            $price=$result['product']['variants'][0]['price'];
            $statsd=$result['product']['status'];
            $C_Date = date('Y-m-d/h:i:a');
    
            if($quantity<='0' || $statsd=='draft')
            {
                 echo "2";
            }
            else
            {
              
                if($input > $quantity)
                {
                     echo "3";
                }
                else
                {
                    $Total+=$price;
                    if($Total > 2500 || $Total ==2500)
                    {
                        $Ship=0;
                        $Total=$Total-250;
                    }
                    else
                    {
                        $Ship=250;
                    }
                    
                    
                    $adjust=(int)$quantity-1;
                    // echo $adjust;
                    // inventory 
                    $ch1 = curl_init();
                    $C_Date = date('Y-m-d/h:i:a');
                    curl_setopt_array($ch1, array(
                        CURLOPT_URL => 'https://www-swag-kicks-com.myshopify.com/admin/api/2023-01/inventory_levels/set.json',
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
                        "available": "'.$adjust.'"
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
                        $stat='draft';
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
                            $sql= "INSERT INTO `Order`(Order_ID,Order_Number,Date,Name,Address,Contact,City,SKU,Quantity,Price,Shipping,Dispatch_Advise,Discount,Total,Status) VALUES ('".$orderid."', '".$ordernum."', '".$Date."', '".$Name."', '".$Address."', '".$Contact."', '".$City."', '".$sku."', '".$input."', '".$price."', '".$Ship."', '".$Dispatch_Advise."', '".$Discount."', '".$Total."','".$Statg."')";
                            $execute = mysqli_query($mysql,$sql);
                            $update=mysqli_query($mysql,"Update `Order` SET Total='$Total',Shipping='$Ship'");
                            //product update
                            if($update)
                            {
                                $update1=mysqli_query($mysql,"Update `addition` SET Status='draft',Quantity='$adjust'");
                                
                                if($update1)
                                {
                                    $string=$sku." Items Added";
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
        
    }
    
}
else
{
    echo "0";
}

?>
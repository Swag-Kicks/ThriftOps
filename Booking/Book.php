<?php
 
session_start();
//require_once '../../upload.thriftops.com/vendor/autoload.php';
include_once('../vendor/autoload.php');
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['id'];


if(!empty($_POST["id"]) && !empty($_POST["courierstat"]) &&!empty($_POST["order"]) && !empty($_POST["name"]) && !empty($_POST["address"]) && !empty($_POST["contact"]) && isset($_POST["total"]) && !empty($_POST["city"])&& !empty($_POST["weight"])&& !empty($_POST["items"])&& !empty($_POST["dispatch_advise"]))
{
    $courier=$_POST["courierstat"];
    $id=$_POST["id"];
    $weight=$_POST["weight"];
    $dispatch_advise=$_POST["dispatch_advise"];
    $order=$_POST["order"];
    $name=$_POST["name"];
    $address=$_POST["address"];
    $contact=$_POST["contact"];
    $total=(int)$_POST["total"];
    $city=$_POST["city"];
    $items=$_POST["items"];
    $C_Date = date('Y-m-d/h:i:a'); 
    
    $sql="Select * from `Order` Where Order_ID='$id'";
    $itemcount = mysqli_num_rows(mysqli_query($mysql, $sql));
    //echo (int)$itemcount;
    
    if($courier=='PostEx')
    {
        $sql1="Select * from `API_Credentials` Where Platform='PostEx'";
        $leo = mysqli_query($mysql, $sql1);
        $row = mysqli_fetch_assoc($leo);
        $apipass=$row['API_Pass'];
        
        
        //postex api book
        $ch = curl_init('https://api.postex.pk/services/integration/api/order/v2/create-order');
        $headers = [];
        $headers[] = 'Content-Type:application/json';
        $headers[] = "token: ".$apipass;
        $headers[] ="charset: utf-8";
        curl_setopt_array($ch, array(
          CURLOPT_URL => 'https://api.postex.pk/services/integration/api/order/v2/create-order',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => '{
            "orderRefNumber" : "'.$order.'",
            "invoicePayment" : "'.$total.'",
            "orderDetail" :  "'.$items.'",
            "customerName" : "'.$name.'",
            "customerPhone" : "'.$contact.'",
            "deliveryAddress" : "'.$address.'",
            "transactionNotes" : "'.$dispatch_advise.'",
            "cityName" : "'.$city.'",
            "invoiceDivision" : "1",
            "items" : "'.(int)$itemcount.'",
            "orderType" : "Normal"
            }',
          CURLOPT_HTTPHEADER => $headers,
            ));

        $result = curl_exec($ch);
        $result = json_decode($result,true);
        curl_close($ch);
    
        $num = $result["dist"]["trackingNumber"];
        // echo $num;
        
        if(!empty($num))
        {
           //status update database
            $las="UPDATE `Order` SET Tracking='$num',Courier='PostEx',Status='Booked' WHERE Order_ID='$id'";
            $relt1 = mysqli_query($mysql, $las);
            
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$order', 'Booked', '$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
            
            
            //shopify
            $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
            $url="https://merchant.postex.pk/?cn=".$num;
            // $data = array( "fulfillment" => array("location_id" => 63487475898,"tracking_company" => "PostEx","tracking_number" => $num,"tracking_url" =>"$url"));
            // $data_string = json_encode($data); 
            
            //shopify token
            $sql2="Select * from `API_Credentials` Where Platform='Shopify'";
            $sh = mysqli_query($mysql, $sql2);
            $row1 = mysqli_fetch_assoc($sh);
            $shop_token=$row1['API_Pass'];
            
            //old
            
            // $curl = curl_init();
            // curl_setopt_array($curl, array(
            //   CURLOPT_URL => "https://$SHOP_URL/admin/api/2023-07/orders/$id/fulfillments.json",
            //   CURLOPT_RETURNTRANSFER => true,
            //   CURLOPT_ENCODING => '',
            //   CURLOPT_MAXREDIRS => 10,
            //   CURLOPT_TIMEOUT => 0,
            //   CURLOPT_FOLLOWLOCATION => true,
            //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //   CURLOPT_CUSTOMREQUEST => 'POST',
            //   CURLOPT_POSTFIELDS =>'
            //     {
            //         "fulfillment" :{
            //             "location_id" : 63487475898,
            //             "tracking_company" : "PostEx",
            //             "tracking_number" : "'.$num.'",
            //             "tracking_url" :"'.$url.'"
            //         }
            //     }',
            //   CURLOPT_HTTPHEADER => array(
            //     "X-Shopify-Access-Token: $shop_token",
            //     'Content-Type: application/json',
            //     'Cookie: request_method=POST'
            //   ),
            // ));
            
            // $response1 = curl_exec($curl);
            // curl_close($curl);
            // $result1 = json_decode($response1,true);
            
            
            
            //get fulfillment order id
            $curl23 = curl_init();
            curl_setopt_array($curl23, array(
              CURLOPT_URL => "https://www-swag-kicks-com.myshopify.com/admin/api/2023-07/orders/$id/fulfillment_orders.json",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
              CURLOPT_HTTPHEADER => array(
               "X-Shopify-Access-Token: $shop_token",
                'Content-Type: application/json',
                'Cookie: request_method=POST'
              ),
            ));
            
            $response23 = curl_exec($curl23);
            
            curl_close($curl);
            $work = json_decode($response23,true);
            $fullfilment_order_id=$work['fulfillment_orders']['0']['line_items']['0']['fulfillment_order_id'];
                        
            
            //post
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://www-swag-kicks-com.myshopify.com/admin/api/2023-07/fulfillments.json',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS =>'{
                "fulfillment":{
                    
            
                    "line_items_by_fulfillment_order" : [
                        {
                            "fulfillment_order_id" : "'.$fullfilment_order_id.'"
                        }
                    ],
                     "tracking_info":
                    {
                        "company" : "PostEx",
                        "number" : "'.$num.'",
                        "url" : "'.$url.'"
                    }
                   
                }
            }',
              CURLOPT_HTTPHEADER => array(
                "X-Shopify-Access-Token: $shop_token",
                'Content-Type: application/json',
                'Cookie: request_method=POST'
              ),
            ));
            
            $response = curl_exec($curl);
            
            curl_close($curl);
            $result1 = json_decode($response,true);
         

            $doneid=$result1['fulfillment']['order_id'];//order id
            $status=$result1['fulfillment']['status'];//success
            
            if($doneid==$id && $status=='success')
            {
                echo "1";
            }
            else
            {
              echo "3";
            } 
        }
        else
        {
            echo "0"; 
        }
        
        
        
    }
    if($courier=='Leopard')
    {

        $sql1="Select * from `API_Credentials` Where Platform='Leopard'";
        $leo = mysqli_query($mysql, $sql1);
        $row = mysqli_fetch_assoc($leo);
        $apikey=$row['API_Key'];
        $apipass=$row['API_Pass'];
        
        $stat='Booked';
        $curl_handle = curl_init();
        curl_setopt($curl_handle,CURLOPT_URL, 'http://new.leopardscod.com/webservice/bookPacket/format/json/');
        curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_handle,CURLOPT_ENCODING, '');
        curl_setopt($curl_handle, CURLOPT_MAXREDIRS, 10);
        curl_setopt($curl_handle,CURLOPT_TIMEOUT,0);
        curl_setopt($curl_handle, CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($curl_handle,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
        curl_setopt($curl_handle,CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($curl_handle,CURLOPT_POSTFIELDS , json_encode(array(
            "api_key" => "$apikey",
            "api_password" =>"$apipass",
            "booked_packet_weight" => $weight,
            "booked_packet_no_piece"        => (int)$itemcount,     
            "booked_packet_collect_amount"  => $total,               
            "booked_packet_order_id"        => $order,          
            "origin_city"                   => "self",            
            "destination_city"              => "$city",            
            "shipment_name_eng"             => "self",            
            "shipment_email"                => "self",             
            "shipment_phone"                => "03002030317",            
            "shipment_address"              => "B-165 Block D North Nazimabad, Karachi",          
            "consignment_name_eng"          => $name,                      
            "consignment_phone"             => $contact,    
            "consignment_address"           => $address, 
            "special_instructions"          => $items
    
    
        )));
    
        $response = curl_exec($curl_handle);
    
        curl_close($curl_handle);
        //echo $response;
        $jso =json_decode($response,true);
        $num = $jso["track_number"];
        // echo print($cc);
        // echo "<br>";
        
        $link = $jso["slip_link"];
        // echo print($cc1);
        
        if(!empty($num))
        {
            //status update database
            $las="UPDATE `Order` SET Tracking='$num',Pdf_link='$link',Courier='Leopard',Status='Booked' WHERE Order_ID='$id'";
            $relt1 = mysqli_query($mysql, $las);
            
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$order', 'Booked', '$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
           
            //shopify
            $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
            $url="https://trackcourier.io/track-and-trace/leopard-courier/$num";
            // $data = array( "fulfillment" => array("location_id" => 63487475898,"tracking_company" => "Leopard","tracking_number" => $num,"tracking_url" =>"$url"));
            // $data_string = json_encode($data);                                                                                   
            
            //shopify token
            $sql2="Select * from `API_Credentials` Where Platform='Shopify'";
            $sh = mysqli_query($mysql, $sql2);
            $row1 = mysqli_fetch_assoc($sh);
            $shop_token=$row1['API_Pass'];
            
            //old
            
            // $curl = curl_init();
            // curl_setopt_array($curl, array(
            //   CURLOPT_URL => "https://$SHOP_URL/admin/api/2023-07/orders/$id/fulfillments.json",
            //   CURLOPT_RETURNTRANSFER => true,
            //   CURLOPT_ENCODING => '',
            //   CURLOPT_MAXREDIRS => 10,
            //   CURLOPT_TIMEOUT => 0,
            //   CURLOPT_FOLLOWLOCATION => true,
            //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //   CURLOPT_CUSTOMREQUEST => 'POST',
            //   CURLOPT_POSTFIELDS =>'
            //     {
            //         "fulfillment" :{
            //             "location_id" : 63487475898,
            //             "tracking_company" : "Leopard",
            //             "tracking_number" : "'.$num.'",
            //             "tracking_url" :"'.$url.'"
            //         }
            //     }',
            //   CURLOPT_HTTPHEADER => array(
            //     "X-Shopify-Access-Token: $shop_token",
            //     'Content-Type: application/json',
            //     'Cookie: request_method=POST'
            //   ),
            // ));
            
            // $response1 = curl_exec($curl);
            // curl_close($curl);
            // $result1 = json_decode($response1,true);
            
            //get fulfillment order id
            $curl23 = curl_init();
            curl_setopt_array($curl23, array(
              CURLOPT_URL => "https://www-swag-kicks-com.myshopify.com/admin/api/2023-07/orders/$id/fulfillment_orders.json",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
              CURLOPT_HTTPHEADER => array(
               "X-Shopify-Access-Token: $shop_token",
                'Content-Type: application/json',
                'Cookie: request_method=POST'
              ),
            ));
            
            $response23 = curl_exec($curl23);
            
            curl_close($curl);
            $work = json_decode($response23,true);
            $fullfilment_order_id=$work['fulfillment_orders']['0']['line_items']['0']['fulfillment_order_id'];
                        
            
            //post
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://www-swag-kicks-com.myshopify.com/admin/api/2023-07/fulfillments.json',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS =>'{
                "fulfillment":{
                    
            
                    "line_items_by_fulfillment_order" : [
                        {
                            "fulfillment_order_id" : "'.$fullfilment_order_id.'"
                        }
                    ],
                     "tracking_info":
                    {
                        "company" : "Leopard",
                        "number" : "'.$num.'",
                        "url" : "'.$url.'"
                    }
                   
                }
            }',
              CURLOPT_HTTPHEADER => array(
                "X-Shopify-Access-Token: $shop_token",
                'Content-Type: application/json',
                'Cookie: request_method=POST'
              ),
            ));
            
            $response = curl_exec($curl);
            
            curl_close($curl);
            $result1 = json_decode($response,true);

            $doneid=$result1['fulfillment']['order_id'];//order id
            $status=$result1['fulfillment']['status'];//success
            
           if($doneid==$id && $status=='success')
            {
                echo "1";
            }
            else
            {
              echo "3";
            } 
        }
        else
        {
            echo "0"; 
        }
        
        
    }
    
    
    
    if($courier=='Trax')
    {

        $sql1="Select * from `API_Credentials` Where Platform='Trax'";
        $leo = mysqli_query($mysql, $sql1);
        $row = mysqli_fetch_assoc($leo);
        $apipass=$row['API_Pass'];
        $Date=date('Y-m-d');
        
        $curl_handle = curl_init();
        
        curl_setopt($curl_handle,CURLOPT_URL,'https://sonic.pk/api/shipment/book');
        curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl_handle,CURLOPT_ENCODING,'');
        curl_setopt($curl_handle,CURLOPT_MAXREDIRS,10);
        curl_setopt($curl_handle,CURLOPT_TIMEOUT,0);
        curl_setopt($curl_handle,CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($curl_handle,CURLOPT_HTTPHEADER,array("Authorization: $apipass",'Content-Type: application/json'));
        curl_setopt($curl_handle,CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($curl_handle,CURLOPT_POSTFIELDS,json_encode(array(
        
            "service_type_id" => 1, 
            "pickup_address_id" => 44201,  
            "information_display" => 1, 
            "consignee_city_id" => $city, 
            "consignee_name" => $name, 
            "consignee_address" => $address, 
            "consignee_phone_number_1" => $contact, 
            "consignee_email_address" => "contact@swag-kicks.com", 
            "order_id" => $order,
            "item_product_type_id" => 1, 
            "item_description" => $items,
            "item_quantity" => $itemcount, 
            "item_insurance" => 0,
            "pickup_date" => $Date, 
            "special_instructions" => $dispatch_advise,
            "estimated_weight"=> $weight, 
            "shipping_mode_id" => 1, 
            "amount" => $total, 
            "payment_mode_id" => 1, 
            "charges_mode_id" => 4
        )));
        
        $response = curl_exec($curl_handle);
    
        curl_close($curl_handle);
        $jso =json_decode($response,true);
        $num = $jso["tracking_number"];
        
        if(!empty($num))
        {
           //status update database
            $las="UPDATE `Order` SET Tracking='$num',Courier='Trax',Status='Booked' WHERE Order_ID='$id'";
            $relt1 = mysqli_query($mysql, $las);
            
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$order', 'Booked', '$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
            
    
            $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
            
            $url="https://sonic.pk/tracking?tracking_number=".$num;
            // $data = array( "fulfillment" => array("location_id" => 63487475898,"tracking_company" => "Trax","tracking_number" => $num,"tracking_url" => "$url"));
            // $data_string = json_encode($data);                                                                                   
            
          //shopify token
            $sql2="Select * from `API_Credentials` Where Platform='Shopify'";
            $sh = mysqli_query($mysql, $sql2);
            $row1 = mysqli_fetch_assoc($sh);
            $shop_token=$row1['API_Pass'];
            
            // old
            
            // $curl = curl_init();
            // curl_setopt_array($curl, array(
            //   CURLOPT_URL => "https://$SHOP_URL/admin/api/2023-07/orders/$id/fulfillments.json",
            //   CURLOPT_RETURNTRANSFER => true,
            //   CURLOPT_ENCODING => '',
            //   CURLOPT_MAXREDIRS => 10,
            //   CURLOPT_TIMEOUT => 0,
            //   CURLOPT_FOLLOWLOCATION => true,
            //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //   CURLOPT_CUSTOMREQUEST => 'POST',
            //   CURLOPT_POSTFIELDS =>'
            //     {
            //         "fulfillment" :{
            //             "location_id" : 63487475898,
            //             "tracking_company" : "Trax",
            //             "tracking_number" : "'.$num.'",
            //             "tracking_url" :"'.$url.'"
            //         }
            //     }',
            //   CURLOPT_HTTPHEADER => array(
            //     "X-Shopify-Access-Token: $shop_token",
            //     'Content-Type: application/json',
            //     'Cookie: request_method=POST'
            //   ),
            // ));
            
            // $response1 = curl_exec($curl);
            // curl_close($curl);
            // $result1 = json_decode($response1,true);
            
            //get fulfillment order id
            $curl23 = curl_init();
            curl_setopt_array($curl23, array(
              CURLOPT_URL => "https://www-swag-kicks-com.myshopify.com/admin/api/2023-07/orders/$id/fulfillment_orders.json",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
              CURLOPT_HTTPHEADER => array(
               "X-Shopify-Access-Token: $shop_token",
                'Content-Type: application/json',
                'Cookie: request_method=POST'
              ),
            ));
            
            $response23 = curl_exec($curl23);
            
            curl_close($curl);
            $work = json_decode($response23,true);
            $fullfilment_order_id=$work['fulfillment_orders']['0']['line_items']['0']['fulfillment_order_id'];
                        
            
            //post
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://www-swag-kicks-com.myshopify.com/admin/api/2023-07/fulfillments.json',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS =>'{
                "fulfillment":{
                    
            
                    "line_items_by_fulfillment_order" : [
                        {
                            "fulfillment_order_id" : "'.$fullfilment_order_id.'"
                        }
                    ],
                     "tracking_info":
                    {
                        "company" : "Trax",
                        "number" : "'.$num.'",
                        "url" : "'.$url.'"
                    }
                   
                }
            }',
              CURLOPT_HTTPHEADER => array(
                "X-Shopify-Access-Token: $shop_token",
                'Content-Type: application/json',
                'Cookie: request_method=POST'
              ),
            ));
            
            $response = curl_exec($curl);
            
            curl_close($curl);
            $result1 = json_decode($response,true);

            $doneid=$result1['fulfillment']['order_id'];//order id
            $status=$result1['fulfillment']['status'];//success
            
            if($doneid==$id && $status=='success')
            {
                echo "1";
            }
            else
            {
              echo "3";
            } 
        }
        else
        {
            echo "0"; 
        }
    }
    if($courier=='Rider')
    {
        $sql1="Select * from `API_Credentials` Where Platform='Rider'";
        $leo = mysqli_query($mysql, $sql1);
        $row = mysqli_fetch_assoc($leo);
        $apikey=$row['API_Key'];
        $apipass=$row['API_Pass'];
        
        $curl_handle = curl_init();
        curl_setopt($curl_handle,CURLOPT_URL, 'http://api.withrider.com/rider/v3/SaveBooking');
        curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_handle,CURLOPT_ENCODING, '');
        curl_setopt($curl_handle, CURLOPT_MAXREDIRS, 10);
        curl_setopt($curl_handle,CURLOPT_TIMEOUT,0);
        curl_setopt($curl_handle, CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($curl_handle,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
        curl_setopt($curl_handle,CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($curl_handle,CURLOPT_POSTFIELDS , json_encode(array(
            "loginId" => "$apikey",
            "ConsigneeName" => "$name",
            "ConsigneeRefNo" => "$order",
            "ConsigneeCellNo"=> "$contact",
            "Address"=> "$address",
            "OriginCityId" => "1",
            "OriginCityName" => "KHI",
            "DestCityId" => "$city",
            "ServiceTypeId" => "1",
            "DeliveryTypeId" => "1",
            "Pcs"=> "$itemcount",
            "Weight" => "$weight",
            "Description" => "$items",
            "CodAmount" => "$total",
            "remarks" => "$dispatch_advise",
            "ShipperAddress"=>"Swagkicks",
            "apikey"=> "$apipass"
        )));
    
        $response = curl_exec($curl_handle);
    
        curl_close($curl_handle);
        $jso =json_decode($response,true);
        $num = $jso["CNUM"];
        if(!empty($num))
        {
     
            //status update database
            $las="UPDATE `Order` SET Tracking='$num',Courier='Rider',Status='Booked' WHERE Order_ID='$id'";
            $relt1 = mysqli_query($mysql, $las);
            
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$order', 'Booked', '$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
           
            $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
          
            
            $url="https://track.withrider.com/";
            // $data = array( "fulfillment" => array("location_id" => 63487475898,"tracking_company" => "Rider","tracking_number" => $num,"tracking_url" =>"$url"));
            // $data_string = json_encode($data);                                                                                   
            
            //shopify token
            $sql2="Select * from `API_Credentials` Where Platform='Shopify'";
            $sh = mysqli_query($mysql, $sql2);
            $row1 = mysqli_fetch_assoc($sh);
            $shop_token=$row1['API_Pass'];
            
            //old
            
            // $curl = curl_init();
            // curl_setopt_array($curl, array(
            //   CURLOPT_URL => "https://$SHOP_URL/admin/api/2023-07/orders/$id/fulfillments.json",
            //   CURLOPT_RETURNTRANSFER => true,
            //   CURLOPT_ENCODING => '',
            //   CURLOPT_MAXREDIRS => 10,
            //   CURLOPT_TIMEOUT => 0,
            //   CURLOPT_FOLLOWLOCATION => true,
            //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //   CURLOPT_CUSTOMREQUEST => 'POST',
            //   CURLOPT_POSTFIELDS =>'
            //     {
            //         "fulfillment" :{
            //             "location_id" : 63487475898,
            //             "tracking_company" : "Rider",
            //             "tracking_number" : "'.$num.'",
            //             "tracking_url" :"'.$url.'"
            //         }
            //     }',
            //   CURLOPT_HTTPHEADER => array(
            //     "X-Shopify-Access-Token: $shop_token",
            //     'Content-Type: application/json',
            //     'Cookie: request_method=POST'
            //   ),
            // ));
            
            // $response1 = curl_exec($curl);
            // curl_close($curl);
            // $result1 = json_decode($response1,true);
            
            //get fulfillment order id
            $curl23 = curl_init();
            curl_setopt_array($curl23, array(
              CURLOPT_URL => "https://www-swag-kicks-com.myshopify.com/admin/api/2023-07/orders/$id/fulfillment_orders.json",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
              CURLOPT_HTTPHEADER => array(
               "X-Shopify-Access-Token: $shop_token",
                'Content-Type: application/json',
                'Cookie: request_method=POST'
              ),
            ));
            
            $response23 = curl_exec($curl23);
            
            curl_close($curl);
            $work = json_decode($response23,true);
            $fullfilment_order_id=$work['fulfillment_orders']['0']['line_items']['0']['fulfillment_order_id'];
                        
            
            //post
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://www-swag-kicks-com.myshopify.com/admin/api/2023-07/fulfillments.json',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS =>'{
                "fulfillment":{
                    
            
                    "line_items_by_fulfillment_order" : [
                        {
                            "fulfillment_order_id" : "'.$fullfilment_order_id.'"
                        }
                    ],
                     "tracking_info":
                    {
                        "company" : "Rider",
                        "number" : "'.$num.'",
                        "url" : "'.$url.'"
                    }
                   
                }
            }',
              CURLOPT_HTTPHEADER => array(
                "X-Shopify-Access-Token: $shop_token",
                'Content-Type: application/json',
                'Cookie: request_method=POST'
              ),
            ));
            
            $response = curl_exec($curl);
            
            curl_close($curl);
            $result1 = json_decode($response,true);

            $doneid=$result1['fulfillment']['order_id'];//order id
            $status=$result1['fulfillment']['status'];//success
            
             if($doneid==$id && $status=='success')
            {
                echo "1";
            }
            else
            {
              echo "3";
            } 
        }
        else
        {
            echo "0"; 
        }
    }
    if($courier=='CallCourier')
    {
        //city get
        $sql12 = "SELECT * FROM Call_Courier WHERE id='$city'";
        $result11 = mysqli_query($mysql, $sql12);
        $row111 = mysqli_fetch_assoc($result11);
        $pw=strtolower($row111['Name']);
        $mas=ucwords($pw);  
        
        $sql1="Select * from `API_Credentials` Where Platform='CallCourier'";
        $leo = mysqli_query($mysql, $sql1);
        $row = mysqli_fetch_assoc($leo);
        $apikey=$row['API_Key'];
        
        $str1=substr($order, 1);
        //$link="http://cod.callcourier.com.pk/api/CallCourier/SaveBooking?loginId=$apikey&ConsigneeName=".$name."&ConsigneeRefNo=".$str1."&ConsigneeCellNo=".$contact."&Address=".$address."&Origin=".$mas."&DestCityId=".$city."&ServiceTypeId=7&Pcs=".$itemcount."&Weight=".$weight."&Description=".$items."&SelOrigin=Domestic&CodAmount=".$total."&SpecialHandling=false&MyBoxId=1%2520My%2520Box%2520ID&Holiday=false&remarks=".$Special_Notes."&ShipperName=SWAG KICKS&ShipperCellNo=03002030317&ShipperArea=654&ShipperCity=2&ShipperAddress=B-165 BLOCK D NORTH NAZIMABAD&ShipperLandLineNo=03041117924&ShipperEmail=contact@swag-kicks.com";
        
        $link="http://cod.callcourier.com.pk/api/CallCourier/SaveBooking?loginId=KHI-17578&ConsigneeName=".$name."&ConsigneeRefNo=".$str1."&ConsigneeCellNo=".$contact."&Address=".$address."&Origin=".$mas."&DestCityId=".$city."&ServiceTypeId=7&Pcs=".$itemcount."&Weight=".$weight."&Description=".$items."&SelOrigin=Domestic&CodAmount=".$total."&SpecialHandling=false&MyBoxId=1%2520My%2520Box%2520ID&Holiday=false&remarks=".$dispatch_advise."&ShipperName=SWAG KICKS&ShipperCellNo=03002030317&ShipperArea=654&ShipperCity=2&ShipperAddress=B-165 BLOCK D NORTH NAZIMABAD&ShipperLandLineNo=03041117924&ShipperEmail=contact@swag-kicks.com";
        //print_r($link);
        $client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request('GET',$link);
        $res = $client->sendAsync($request)->wait();
        $response=$res->getBody();
        //print_r($response);
        $jso =json_decode($response,true);
        $num = $jso["CNNO"];
        if(!empty($num))
        {
     
            //status update database
            $las="UPDATE `Order` SET Tracking='$num',Courier='CallCourier',Status='Booked' WHERE Order_ID='$id'";
            $relt1 = mysqli_query($mysql, $las);
            
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$order', 'Booked', '$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
               
            $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
          
            
            $url="https://callcourier.com.pk/tracking/?tc=$num";
            // $data = array( "fulfillment" => array("location_id" => 63487475898,"tracking_company" => "Call Courier","tracking_number" => $num,"tracking_url" =>"$url"));
            // $data_string = json_encode($data);                                                                                   
            
            //shopify token
            $sql2="Select * from `API_Credentials` Where Platform='Shopify'";
            $sh = mysqli_query($mysql, $sql2);
            $row1 = mysqli_fetch_assoc($sh);
            $shop_token=$row1['API_Pass'];
            
            // old
            
            // $curl = curl_init();
            // curl_setopt_array($curl, array(
            //   CURLOPT_URL => "https://$SHOP_URL/admin/api/2023-07/orders/$id/fulfillments.json",
            //   CURLOPT_RETURNTRANSFER => true,
            //   CURLOPT_ENCODING => '',
            //   CURLOPT_MAXREDIRS => 10,
            //   CURLOPT_TIMEOUT => 0,
            //   CURLOPT_FOLLOWLOCATION => true,
            //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //   CURLOPT_CUSTOMREQUEST => 'POST',
            //   CURLOPT_POSTFIELDS =>'
            //     {
            //         "fulfillment" :{
            //             "location_id" : 63487475898,
            //             "tracking_company" : "Call Courier",
            //             "tracking_number" : "'.$num.'",
            //             "tracking_url" :"'.$url.'"
            //         }
            //     }',
            //   CURLOPT_HTTPHEADER => array(
            //     "X-Shopify-Access-Token: $shop_token",
            //     'Content-Type: application/json',
            //     'Cookie: request_method=POST'
            //   ),
            // ));
            
            // $response1 = curl_exec($curl);
            // curl_close($curl);
            // $result1 = json_decode($response1,true);
            
            //get fulfillment order id
            $curl23 = curl_init();
            curl_setopt_array($curl23, array(
              CURLOPT_URL => "https://www-swag-kicks-com.myshopify.com/admin/api/2023-07/orders/$id/fulfillment_orders.json",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
              CURLOPT_HTTPHEADER => array(
               "X-Shopify-Access-Token: $shop_token",
                'Content-Type: application/json',
                'Cookie: request_method=POST'
              ),
            ));
            
            $response23 = curl_exec($curl23);
            
            curl_close($curl);
            $work = json_decode($response23,true);
            $fullfilment_order_id=$work['fulfillment_orders']['0']['line_items']['0']['fulfillment_order_id'];
                        
            
            //post
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://www-swag-kicks-com.myshopify.com/admin/api/2023-07/fulfillments.json',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS =>'{
                "fulfillment":{
                    
            
                    "line_items_by_fulfillment_order" : [
                        {
                            "fulfillment_order_id" : "'.$fullfilment_order_id.'"
                        }
                    ],
                     "tracking_info":
                    {
                        "company" : "Call Courier",
                        "number" : "'.$num.'",
                        "url" : "'.$url.'"
                    }
                   
                }
            }',
              CURLOPT_HTTPHEADER => array(
                "X-Shopify-Access-Token: $shop_token",
                'Content-Type: application/json',
                'Cookie: request_method=POST'
              ),
            ));
            
            $response = curl_exec($curl);
            
            curl_close($curl);
            $result1 = json_decode($response,true);

            $doneid=$result1['fulfillment']['order_id'];//order id
            $status=$result1['fulfillment']['status'];//success
            
            if($doneid==$id && $status=='success')
            {
                echo "1";
            }
            else
            {
              echo "3";
            } 
        }
        else
        {
            echo "0"; 
        }
        
      
    }
    //tcs add mashood
    if($courier=='Tcs')
    {
        $sql1="Select * from `API_Credentials` Where Platform='Tcs'";
        $leo = mysqli_query($mysql, $sql1);
        $row = mysqli_fetch_assoc($leo);
        $apipass=$row['API_Pass'];
        
        //new
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.tcscourier.com/production/v1/cod/create-order',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "userName": "swag-tcs",
            "password": "swag123@",
            "costCenterCode": "swag",
            "consigneeName": "'.$name.'",
            "consigneeAddress": "'.$address.'",
            "consigneeMobNo": "'.$contact.'",
            "consigneeEmail": "test@123.com",
            "originCityName": "Karachi",
            "destinationCityName": "'.$city.'",
            "weight": '.$weight.',
            "pieces": '.$itemcount.',
            "codAmount": "'.$total.'",
            "customerReferenceNo": "'.$order.'",
            "services": "O",
            "productDetails": "'.$items.'",
            "fragile": "No",
            "remarks": "'.$dispatch_advise.'",
            "insuranceValue": 0
            }',
          CURLOPT_HTTPHEADER => array(
            "X-IBM-Client-Id: $apipass",
            "Content-Type: application/json"
          ),
            ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        $jso =json_decode($response,true);
        $nstr = $jso["bookingReply"]["result"];
        $num=preg_replace("/[^0-9]/", "", $nstr );
        if(!empty($num))
        {
     
            //status update database
            $las="UPDATE `Order` SET Tracking='$num',Courier='Tcs',Status='Booked' WHERE Order_ID='$id'";
            $relt1 = mysqli_query($mysql, $las);
            
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$order', 'Booked', '$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
           
            $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
          
            
            $url="https://www.tcsexpress.com/track/$num";
            //shopify token
            $sql2="Select * from `API_Credentials` Where Platform='Shopify'";
            $sh = mysqli_query($mysql, $sql2);
            $row1 = mysqli_fetch_assoc($sh);
            $shop_token=$row1['API_Pass'];
            
            //old
            
            // $curl = curl_init();
            // curl_setopt_array($curl, array(
            //   CURLOPT_URL => "https://$SHOP_URL/admin/api/2023-07/orders/$id/fulfillments.json",
            //   CURLOPT_RETURNTRANSFER => true,
            //   CURLOPT_ENCODING => '',
            //   CURLOPT_MAXREDIRS => 10,
            //   CURLOPT_TIMEOUT => 0,
            //   CURLOPT_FOLLOWLOCATION => true,
            //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //   CURLOPT_CUSTOMREQUEST => 'POST',
            //   CURLOPT_POSTFIELDS =>'
            //     {
            //         "fulfillment" :{
            //             "location_id" : 63487475898,
            //             "tracking_company" : "TCS",
            //             "tracking_number" : "'.$num.'",
            //             "tracking_url" :"'.$url.'"
            //         }
            //     }',
            //   CURLOPT_HTTPHEADER => array(
            //     "X-Shopify-Access-Token: $shop_token",
            //     'Content-Type: application/json',
            //     'Cookie: request_method=POST'
            //   ),
            // ));
            
            // $response1 = curl_exec($curl);
            // curl_close($curl);
            // $result1 = json_decode($response1,true);
            
            //get fulfillment order id
            $curl23 = curl_init();
            curl_setopt_array($curl23, array(
              CURLOPT_URL => "https://www-swag-kicks-com.myshopify.com/admin/api/2023-07/orders/$id/fulfillment_orders.json",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
              CURLOPT_HTTPHEADER => array(
               "X-Shopify-Access-Token: $shop_token",
                'Content-Type: application/json',
                'Cookie: request_method=POST'
              ),
            ));
            
            $response23 = curl_exec($curl23);
            
            curl_close($curl);
            $work = json_decode($response23,true);
            $fullfilment_order_id=$work['fulfillment_orders']['0']['line_items']['0']['fulfillment_order_id'];
                        
            
            //post
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://www-swag-kicks-com.myshopify.com/admin/api/2023-07/fulfillments.json',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS =>'{
                "fulfillment":{
                    
            
                    "line_items_by_fulfillment_order" : [
                        {
                            "fulfillment_order_id" : "'.$fullfilment_order_id.'"
                        }
                    ],
                     "tracking_info":
                    {
                        "company" : "TCS",
                        "number" : "'.$num.'",
                        "url" : "'.$url.'"
                    }
                   
                }
            }',
              CURLOPT_HTTPHEADER => array(
                "X-Shopify-Access-Token: $shop_token",
                'Content-Type: application/json',
                'Cookie: request_method=POST'
              ),
            ));
            
            $response = curl_exec($curl);
            
            curl_close($curl);
            $result1 = json_decode($response,true);

            $doneid=$result1['fulfillment']['order_id'];//order id
            $status=$result1['fulfillment']['status'];//success
            
             if($doneid==$id && $status=='success')
            {
                echo "1";
            }
            else
            {
              echo "3";
            } 
        }
        else
        {
            echo "0"; 
        }
    }
    if($courier=='Self')
    {
        
        //order id database
        $sql3="Select id from `Order` Where Order_ID='$id'";
        $sh1 = mysqli_query($mysql, $sql3);
        $row3 = mysqli_fetch_assoc($sh1);
        $reg_id=$row3['id'];
        
        $track='792454257'.$reg_id;
        $tt=$track;
        
        if(!empty($tt))
        {
        
            //status update database
            $las="UPDATE `Order` SET Tracking='$tt',Courier='Self',Status='Booked' WHERE Order_ID='$id'";
            $relt1 = mysqli_query($mysql, $las);
            
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$order', 'Booked', '$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
            
            
            $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
            $url="https://track.swagkicks.pk/index.php";
            // $data = array( "fulfillment" => array("location_id" => 63487475898,"tracking_company" => "SwagKicks","tracking_number" => $tt,"tracking_url" =>"$url"));
            // $data_string = json_encode($data);                                                                                   
            
            //shopify token
            $sql2="Select * from `API_Credentials` Where Platform='Shopify'";
            $sh = mysqli_query($mysql, $sql2);
            $row1 = mysqli_fetch_assoc($sh);
            $shop_token=$row1['API_Pass'];
            
            // old
            
            // $curl = curl_init();
            // curl_setopt_array($curl, array(
            //   CURLOPT_URL => "https://$SHOP_URL/admin/api/2023-07/orders/$id/fulfillments.json",
            //   CURLOPT_RETURNTRANSFER => true,
            //   CURLOPT_ENCODING => '',
            //   CURLOPT_MAXREDIRS => 10,
            //   CURLOPT_TIMEOUT => 0,
            //   CURLOPT_FOLLOWLOCATION => true,
            //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //   CURLOPT_CUSTOMREQUEST => 'POST',
            //   CURLOPT_POSTFIELDS =>'
            //     {
            //         "fulfillment" :{
            //             "location_id" : 63487475898,
            //             "tracking_company" : "SwagKicks",
            //             "tracking_number" : "'.$tt.'",
            //             "tracking_url" :"'.$url.'"
            //         }
            //     }',
            //   CURLOPT_HTTPHEADER => array(
            //     "X-Shopify-Access-Token: $shop_token",
            //     'Content-Type: application/json',
            //     'Cookie: request_method=POST'
            //   ),
            // ));
            
            // $response1 = curl_exec($curl);
            // curl_close($curl);
            // $result1 = json_decode($response1,true);
            
            //get fulfillment order id
            $curl23 = curl_init();
            curl_setopt_array($curl23, array(
              CURLOPT_URL => "https://www-swag-kicks-com.myshopify.com/admin/api/2023-07/orders/$id/fulfillment_orders.json",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
              CURLOPT_HTTPHEADER => array(
               "X-Shopify-Access-Token: $shop_token",
                'Content-Type: application/json',
                'Cookie: request_method=POST'
              ),
            ));
            
            $response23 = curl_exec($curl23);
            
            curl_close($curl);
            $work = json_decode($response23,true);
            $fullfilment_order_id=$work['fulfillment_orders']['0']['line_items']['0']['fulfillment_order_id'];
                        
            
            //post
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://www-swag-kicks-com.myshopify.com/admin/api/2023-07/fulfillments.json',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS =>'{
                "fulfillment":{
                    
            
                    "line_items_by_fulfillment_order" : [
                        {
                            "fulfillment_order_id" : "'.$fullfilment_order_id.'"
                        }
                    ],
                     "tracking_info":
                    {
                        "company" : "SwagKicks",
                        "number" : "'.$tt.'",
                        "url" : "'.$url.'"
                    }
                   
                }
            }',
              CURLOPT_HTTPHEADER => array(
                "X-Shopify-Access-Token: $shop_token",
                'Content-Type: application/json',
                'Cookie: request_method=POST'
              ),
            ));
            
            $response = curl_exec($curl);
            
            curl_close($curl);
            $result1 = json_decode($response,true);
            

            $doneid=$result1['fulfillment']['order_id'];//order id
            $status=$result1['fulfillment']['status'];//success
            
            if($doneid==$id && $status=='success')
            {
                echo "1";
            }
            else
            {
              echo "3";
            } 
        }
        else
        {
            echo "0"; 
        }
    }
    
    
     
     

}
// else
// {
//     echo "2";
// }

?>
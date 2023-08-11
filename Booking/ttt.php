<?php
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");


// //shopify
// $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
// $url="https://merchant.postex.pk/?cn=".$num;
// $data = array( "fulfillment" => array("location_id" => 63487475898,"tracking_company" => "PostEx","tracking_number" => '661646161631311',"tracking_url" =>"$url"));
// $data_string = json_encode($data); 

//shopify token
$sql2="Select * from `API_Credentials` Where Platform='Shopify'";
$sh = mysqli_query($mysql, $sql2);
$row1 = mysqli_fetch_assoc($sh);
$shop_token=$row1['API_Pass'];

$num=8792455666;
$SHOP_URL = 'www-swag-kicks-com.myshopify.com';
$url="https://merchant.postex.pk/?cn=".$num;
// $data = array( "fulfillment" => array("location_id" => 63487475898,"tracking_company" => "PostEx","tracking_number" => '555464312466411',"tracking_url" =>"$url"));
// $data_string = json_encode($data);                                                                                   

// $ch1 = curl_init("https://$SHOP_URL/admin/api/2023-01/orders/4975632023738/fulfillments.json");
// curl_setopt($ch1, CURLOPT_HTTPHEADER, array(                                                                          
//  "X-Shopify-Access-Token: $shop_token",
//  "Authorization: Bearer $shop_token",
//  'Content-Type: application/json'                                                                                                                                      
// ));

// curl_setopt($ch1, CURLOPT_POST, 1);
// curl_setopt($ch1, CURLOPT_POSTFIELDS, $data_string);
// curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

// $result1 = curl_exec($ch1);
// $result1 = json_decode($result1,true);


//             curl_close($ch1);
//             print_r($result1);

// $doneid=$result1['fulfillment']['order_id'];//order id
// $status=$result1['fulfillment']['status'];//success


//new


$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://$SHOP_URL/admin/api/2022-01/orders/4976879468730/fulfillments.json",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'
    {
        "fulfillment" :{
            "location_id" : 63487475898,
            "tracking_company" : "PostEx",
            "tracking_number" : "'.$num.'",
            "tracking_url" :"'.$url.'"
        }
    }',
  CURLOPT_HTTPHEADER => array(
    "X-Shopify-Access-Token: $shop_token",
    'Content-Type: application/json',
    'Cookie: request_method=POST'
  ),
));

$response1 = curl_exec($curl);
curl_close($curl);
$result1 = json_decode($response1,true);
print_r($result1);
echo "<br>";
echo $doneid=$result1['fulfillment']['order_id'];//order id
echo "<br>".$status=$result1['fulfillment']['status'];//success
?>
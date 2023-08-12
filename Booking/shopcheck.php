<?php
// $url="testurl.com";
// $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
// $curl = curl_init();
// curl_setopt_array($curl, array(
//   CURLOPT_URL => "https://$SHOP_URL/admin/api/2023-07/orders/5116744040634/fulfillments.json",
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
//             "tracking_number" : "090033899813",
//             "tracking_url" :"'.$url.'"
//         }
//     }',
//   CURLOPT_HTTPHEADER => array(
//     "X-Shopify-Access-Token: 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",
//     'Content-Type: application/json',
//     'Cookie: request_method=POST'
//   ),
// ));

// $response1 = curl_exec($curl);
// print_r($response1);
// curl_close($curl);
// $result1 = json_decode($response1,true);
// echo $result1;
$id=5122944467130;

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
    'X-Shopify-Access-Token: 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',
    'Accept: application/json',
    'Cookie: _master_udr=eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaEpJaWxtWkdFNE9ERmtOQzA0WlRaaUxUUmhaV010T0RJNVpTMWxZamhsWWpJMU5HUmhZemNHT2daRlJnPT0iLCJleHAiOiIyMDI1LTA0LTE4VDE4OjM4OjAxLjM5M1oiLCJwdXIiOiJjb29raWUuX21hc3Rlcl91ZHIifX0%3D--8fbfa7be93513c5bab937fa7df9806d427eed213; request_method=POST'
  ),
));

$response23 = curl_exec($curl23);

curl_close($curl);
$work = json_decode($response23,true);
$fullfilment_order_id=$work['fulfillment_orders']['0']['line_items']['0']['fulfillment_order_id'];



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
            "number" : "C23231232312",
            "url" :"https://merchant.postex.pk/?cn=C23231232312"
        }
       
    }
}',
  CURLOPT_HTTPHEADER => array(
    'X-Shopify-Access-Token: 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',
    'Content-Type: application/json',
    'Cookie: _master_udr=eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaEpJaWxtWkdFNE9ERmtOQzA0WlRaaUxUUmhaV010T0RJNVpTMWxZamhsWWpJMU5HUmhZemNHT2daRlJnPT0iLCJleHAiOiIyMDI1LTA0LTE4VDE4OjM4OjAxLjM5M1oiLCJwdXIiOiJjb29raWUuX21hc3Rlcl91ZHIifX0%3D--8fbfa7be93513c5bab937fa7df9806d427eed213; request_method=POST'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$result1 = json_decode($response,true);
print_r($result1);
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




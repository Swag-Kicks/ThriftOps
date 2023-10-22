<?php
include_once('../vendor/autoload.php'); 

$handler = new \GuzzleHttp\Handler\StreamHandler;


$client = new \GuzzleHttp\Client(['handler' => $handler]);
// print_r($client);
$headers = [
  'X-Shopify-Access-Token' => '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',
  'Content-Type' => 'application/json',
  'Cookie' => '_master_udr=eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaEpJaWxtWkdFNE9ERmtOQzA0WlRaaUxUUmhaV010T0RJNVpTMWxZamhsWWpJMU5HUmhZemNHT2daRlJnPT0iLCJleHAiOiIyMDI1LTA0LTE4VDE4OjM4OjAxLjM5M1oiLCJwdXIiOiJjb29raWUuX21hc3Rlcl91ZHIifX0%3D--8fbfa7be93513c5bab937fa7df9806d427eed213; _secure_admin_session_id=6e43684edc3e79c529a7be8f3163be30; _secure_admin_session_id_csrf=6e43684edc3e79c529a7be8f3163be30'
];
$body = '{
  "order": {
    "line_items": [
      {
        "variant_id": "41514195747002",
        "quantity": 1
      },
      {
        "variant_id": "41121008419002",
        "quantity": 1
      }
    ],
    "customer": {
      "first_name": "King",
      "last_name": "Faraz"
    },
    "billing_address": {
      "first_name": "King",
      "last_name": "Faraz",
      "address1": "test",
      "phone": "03123456789",
      "city": "karahi",
      "country": "Pakistan"
    },
    "shipping_address": {
      "first_name": "King",
      "last_name": "Faraz",
      "address1": "test",
      "phone": "03123456789",
      "city": "karahi",
      "country": "Pakistan"
    },
    "financial_status": "pending"
  }
}';

$request =new \GuzzleHttp\Psr7\Request('POST', 'https://www-swag-kicks-com.myshopify.com/admin/api/2023-01/orders.json', $headers, $body);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();


// //try

// $url = 'https://www-swag-kicks-com.myshopify.com/admin/api/2023-01/orders.json';


// // Create HTTP headers for the request
// $options = array(
//     'http' => array(
//         'header' => $headers,
//         'method' => 'POST',
//         'content' => http_build_query($body)
//     )
// );

// // Create the stream context
// $context = stream_context_create($options);

// // Send the POST request and capture the response
// $response = file_get_contents($url, false, $context);

// // Handle the response
// if ($response === false) {
//     // Error occurred
//     echo 'Error: ' . print_r(error_get_last(), true);
// } else {
//     // Success
//     echo $response;
// }



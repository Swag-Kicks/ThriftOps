<?php

$curl = curl_init();
$pid = $_GET['pid'];

$desc=$_POST['desc'];



$URL= "https://www-swag-kicks-com.myshopify.com/admin/api/2022-10/products/".$pid.".json" ;


  $postData =[
  "product" => [
   
      "body_html" => $desc
      
    
 
  ]
  ];
curl_setopt_array($curl, array(
  CURLOPT_URL => $URL,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS => json_encode($postData),
  CURLOPT_HTTPHEADER => array(
    'X-Shopify-Access-Token: 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',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// header("location: all_product.php");
echo $response;

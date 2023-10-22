<?php

$curl = curl_init();

$title=$_POST['title'];
$tags=$_POST['tags'];
$desc=$_POST['desc'];
$price=$_POST['price'];
$URL= "https://swagkicks-store.myshopify.com/admin/api/2022-10/products.json" ;
//   "tags" => $tags,

$postData =[
  "product" => [
      "title" => $title,
      "body_html" => $desc,
      "variants"=>[
      "price"=> $price
                     ]
 
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
// header("location:../index.html");
echo $response;

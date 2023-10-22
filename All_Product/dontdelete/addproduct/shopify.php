<?php

$curl = curl_init();

$title=$_POST['title'];
$desc=$_POST['desc'];
$price=$_POST['price'];

//   "tags" => $tags,
//       
$postData =[
  "product" => [
      "title" => $title,
      "body_html" => $desc,
      
      "variants" => array(
                    array(
                        // "title" => $waist,
                        "price" => $price,
                        // "sku" => $sku,
                        // "option1" => $size,
                        // "barcode" => $barcode,
                        // "weight" => $weight,
                        // "inventory_quantity" => $quantity,
                        // "fulfillment_service" => "manual",
                        // "inventory_management" => "shopify"
                    )
                )
 
  ]
  ];
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www-swag-kicks-com.myshopify.com/admin/api/2022-10/products.json',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>json_encode($postData),
  CURLOPT_HTTPHEADER => array(
    'X-Shopify-Access-Token: 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',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>
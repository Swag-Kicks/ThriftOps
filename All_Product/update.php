<?php

$curl = curl_init();
$pid = $_GET['pid'];
$title=$_POST['title'];
$status=$_POST['status'];
$sku=$_POST['sku'];
$desc=$_POST['desc'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];


$URL= "https://www-swag-kicks-com.myshopify.com/admin/api/2023-07/products/".$pid.".json" ;
//shopify token
$sql2="Select * from `API_Credentials` Where Platform='Shopify'";
$sh = mysqli_query($mysql, $sql2);
$row1 = mysqli_fetch_assoc($sh);
$shop_token=$row1['API_Pass'];

  $postData =[
  "product" => [
    "title" => $title,
      "status" => $status,
      "body_html" => $desc,
      
      "variants" => array(
                    array( 
                        "price" => $price,
                        "sku" => $sku,
                        "inventory_quantity" => $quantity,
                      
                    )
                )
 
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
    "X-Shopify-Access-Token: $shop_token",
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// header("location: all_product.php");
echo $response;

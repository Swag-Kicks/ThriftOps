<?php

$curl = curl_init();
$qty=$_POST['qty'];
$title=$_POST['title'];
$desc=$_POST['desc'];
$price=$_POST['price'];
$image1=$_POST['image1'];
$image2=$_POST['image2'];
$image3=$_POST['image3'];
$image4=$_POST['image4'];
$image5=$_POST['image5'];
$vendor=$_POST['vendor'];
$gender=$_POST['gender'];
$brand=$_POST['brand'];
$condi=$_POST['condition'];
$P_Name=$_POST['title'];
$Category=$_POST['category'];
$sku=$_POST['sku'];
$subCat=$_POST['subCat'];
$status=$_POST['status'];
$size=$_POST['size'];
 $weight=$row['weight'];

$postData =[
  "product" => [
      "title" => $title,
      "body_html" => $desc,
        "status" => $status,
        
      "tags" => $gender.",".$brand.",".$condi.",".$P_Name.",".$Category.','.$sku.','.$size.','.$subCat,
      "variants" => array(
                    array(
                         "title" => $title,
                        "price" => $price,
                        "sku" => $sku,
                        "barcode" => $sku,
                        "weight" => $weight,
                        "option1"=>$size,
                        "inventory_quantity" => $qty,
                        "fulfillment_service" => "manual",
                        "inventory_management" => "shopify"
                    )
                ),
                  "metafields" => array(
                    array(
                        "namespace" => "my_fields",
                        "key" => "size",
                        "value" => $size
                    ),
                    array(
                        "namespace" => "my_fields",
                        "key" => "condition",
                        "value" => $condi
                    ),
                    array(
                        "namespace" => "custom",
                        "key" => "brands",
                        "value" => $brand
                    )
                
                ),
                  "images" => array(
                    array(
                        "src" => $image1,
                        "width" => "3456",
                        "height" => "3456"
                    ),
                    array(
                        "src" =>$image2,
                        "width" => "3456",
                        "height" => "3456"
                        
                    ),
                    array(
                        "src" => $image3,
                        "width" => "3456",
                        "height" => "3456"
                    ),
                         array(
                        "src" => $image4,
                        "width" => "3456",
                        "height" => "3456"
                    ),
                         array(
                        "src" => $image5,
                        "width" => "3456",
                        "height" => "3456"
                    )
                
                
                

                 
                ),
                 "vendor" => $vendor
 
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

$info = curl_getinfo($curl);
// echo $info["http_code"];
echo $response;

curl_close($curl);


// echo $response;
?>
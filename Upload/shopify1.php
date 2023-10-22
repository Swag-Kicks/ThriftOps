<?php
include_once("../include/mysql_connection.php");

//old fetch
$sku=$_POST['sku'];
$result = mysqli_query($mysql, "SELECT * FROM addition Where SKU='$sku'");
$row = mysqli_fetch_array($result);
$shop=$row['Shopify_ID'];

$curl1 = curl_init();

curl_setopt_array($curl1, array(
  CURLOPT_URL => "https://www-swag-kicks-com.myshopify.com/admin/api/2023-01/products/$shop.json",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'DELETE',
  CURLOPT_HTTPHEADER => array(
    'X-Shopify-Access-Token: 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',
    'Content-Type: application/json'
  ),
));

$response1 = curl_exec($curl1);
curl_close($curl1);
// echo $response1;



//new upload
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
$image6=$_POST['image6'];
// $vendor=$_POST['vendor'];
$gender=$_POST['gender'];
$brand=$_POST['brand'];
$condi=$_POST['condition'];
$P_Name=$_POST['title'];
$Category=$_POST['category'];

$subCat=$_POST['subCat'];
$status=$_POST['status'];
$size=$_POST['size'];
$weight=$row['weight'];
 
 
//check sku in table
//vendor-batch
$pr="Select Vendor_ID,Batch_ID,SKU from `addition` Where SKU='$sku'";
$resu2 = mysqli_query($mysql, $pr);
$rowq1 =mysqli_fetch_array($resu2);
$vendi=$rowq1['Vendor_ID'];
$vsa=$rowq1['SKU'];
$batch=$rowq1['Batch_ID'];

if(empty($vsa))
{
    echo "1";     
}

else if(empty($vendi) && empty($batch))
{
    echo "2";
}
else
{
    



    //name
    $pr1="Select Name from `Vendor` Where Vendor_ID='$vendi'";
    $resu21 = mysqli_query($mysql, $pr1);
    $rowq11 =mysqli_fetch_array($resu21);
    $vender=$rowq11['Name'];
    
    $vendor=$vender." Batch# ".$batch;
    
    
   
    
    
    $postData =[
      "product" => [
          "title" => $title,
          "body_html" => $desc,
            "status" => $status,
            "vendor" => $vendor,
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
                    "options" => array(
                        "name" => "Size"
    
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
                        ),
                        array(
                            "src" => $image6,
                            "width" => "3456",
                            "height" => "3456"
                        )
                    
                    
                    
    
                     
                    )
                     
     
      ]
      ];
      
      if(isset($response1))
      {
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
      }
    
    
    // echo $response;
}    
?>
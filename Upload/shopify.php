<?php
include_once("../include/mysql_connection.php");




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
$sku=$_POST['sku'];
$subCat=$_POST['subCat'];
$status=$_POST['status'];
$size=$_POST['size'];
$weight=$row['weight'];
 
 
 
 //tagsfix according to csv condition
 if($Category=='Footwear' && $subCat =='Slipper' || $subCat=='Sandal' || $subCat='Sneakers')
 {
    $mod=$gender == 'Male'? 'M': ($gender == 'Female' ? 'W': ($gender == 'Unisex' ? 'Unisex': 'Kids'));
     $lower=lcfirst($subCat);
     $gen=$mod.$lower;
     $tags=$gen.",".$brand.",".$condi.",".$P_Name.",".$Category.','.$sku.','.$size.','.$subCat;
 }
if ($Category=='Footwear' &&$subCat='Formal Shoe')
 {
     $mod=$gender == 'Male'? 'M': ($gender == 'Female' ? 'W': ($gender == 'Unisex' ? 'Unisex': 'Kids'));
      $gen=$mod.'formal';
      $tags=$gen.",".$brand.",".$condi.",".$P_Name.",".$Category.','.$sku.','.$size.','.$subCat;
 }
//   else if($Category=='Accessories' && $subCat=='Bag')
//  {
//     $mod=$gender == 'Male'? 'M': ($gender == 'Female' ? 'W': ($gender == 'Unisex' ? 'Unisex': 'Kids'));
//      $lower=lcfirst($subCat);
//      $gen=$mod.$lower;
//      $tags=$gen.",".$brand.",".$condi.",".$P_Name.",".$Category.','.$sku.','.$size.','.$subCat;
//  }
if($Category=='Accessories' && $subCat!='Bag')
 {
    $mod=$gender == 'Male'? 'M': ($gender == 'Female' ? 'W': ($gender == 'Unisex' ? 'Unisex': 'Kids'));
     $lower=lcfirst($subCat);
     $gen=$mod.$lower;
     $tags=$gen.",".$brand.",".$condi.",".$P_Name.",".$Category.','.$sku.','.$size.','.$subCat;
 }
if($Category=='Topwear')
 {
    $mod=$gender == 'Male'? 'M': ($gender == 'Female' ? 'W': ($gender == 'Unisex' ? 'Unisex': 'Kids'));
     $lower=lcfirst($subCat);
     $gen=$mod.$lower;
     $Custom="Clothes";
     $tags=$gen.",".$brand.",".$condi.",".$P_Name.",".$Custom.','.$sku.','.$size.','.$subCat;
 }
if($Category=='Bottomwear')
 {
    $mod=$gender == 'Male'? 'M': ($gender == 'Female' ? 'W': ($gender == 'Unisex' ? 'Unisex': 'Kids'));
     $lower=lcfirst($subCat);
     $gen=$mod.$lower;
     $Custom="Clothes";
     $tags=$gen.",".$brand.",".$condi.",".$P_Name.",".$Custom.','.$sku.','.$size.','.$subCat;
 }
 
 
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
            "tags"=> $tags,
        //   "tags" => $gender.",".$brand.",".$condi.",".$P_Name.",".$Category.','.$sku.','.$size.','.$subCat,
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
                            "namespace" => "custom",
                            "key" => "size",
                            "value" => $size
                        ),
                        array(
                            "namespace" => "custom",
                            "key" => "condition",
                            "value" => $size
                        ),
                        array(
                            "namespace" => "custom",
                            "key" => "newcondition",
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
}    
?>
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
$material=$_POST['material'];
$code=$_POST['code'];
$color=$_POST['color'];
$producttype=$_POST['producttype'];
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
 if($Category=='Footwear')
 {
    if( $subCat=='Formal Shoe')
    {
        $mod=$gender == 'Male'? 'M': ($gender == 'Female' ? 'W': ($gender == 'Unisex' ? 'Unisex': 'Kids'));
        $gen=$mod.'formal';
        $tags=$gen.",".$brand.",".$condi.",".$P_Name.",".$Category.','.$sku.','.$size.','.$subCat;
    }
    else
    {
        $mod=$gender == 'Male'? 'M': ($gender == 'Female' ? 'W': ($gender == 'Unisex' ? 'Unisex': 'Kids'));
        $lower=lcfirst($subCat);
        $gen=$mod.$lower;
        $tags=$gen.",".$brand.",".$condi.",".$P_Name.",".$Category.','.$sku.','.$size.','.$subCat;
    }
    
 }

  else if($Category=='Bags')
 {
    $mod=$gender == 'Male'? 'M': ($gender == 'Female' ? 'W': ($gender == 'Unisex' ? 'Unisex': 'Kids'));
     $lower=lcfirst($subCat);
     $gen=$mod.$lower;
     $tags=$gen.",".$brand.",".$condi.",".$P_Name.",".$Category.','.$sku.','.$size.','.$subCat;
 }
 else if($Category=='Accessories')
 {
    $mod=$gender == 'Male'? 'M': ($gender == 'Female' ? 'W': ($gender == 'Unisex' ? 'Unisex': 'Kids'));
     $lower=lcfirst($subCat);
     $gen=$mod.$lower;
     $tags=$gen.",".$brand.",".$condi.",".$P_Name.",".$Category.','.$sku.','.$size.','.$subCat;
 }
 else if($Category=='Topwear')
 {
    $mod=$gender == 'Male'? 'M': ($gender == 'Female' ? 'W': ($gender == 'Unisex' ? 'Unisex': 'Kids'));
     $lower=lcfirst($subCat);
     $gen=$mod.$lower;
     $Custom="Clothes";
     $tags=$gen.",".$brand.",".$condi.",".$P_Name.",".$Custom.','.$sku.','.$size.','.$subCat;
 }
 else if($Category=='Bottomwear')
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
                            "option2"=>$condi,
                            "inventory_quantity" => $qty,
                            "fulfillment_service" => "manual",
                            "inventory_management" => "shopify"
                        )
                    ),
                    "metafields" => array(
                        array(
                            "namespace" => "custom",
                            "key" => "newsize",
                            "value" => $size,
                            "type" =>"single_line_text_field"
                        ),
                        array(
                            "namespace" => "custom",
                            "key" => "newcondition",
                            "value" => $condi,
                            "type" =>"single_line_text_field"
                        ),
                        array(
                            "namespace" => "custom",
                            "key" => "product_type",
                            "value" => $producttype,
                            "type" =>"single_line_text_field"
                        ),
                        array(
                            "namespace" => "custom",
                            "key" => "sub_category",
                            "value" => $subCat,
                            "type" =>"single_line_text_field"
                        ),
                        // array(
                        //     "namespace" => "custom",
                        //     "key" => "uk_size",
                        //     "value" => $size,
                        //     "type" =>"single_line_text_field"
                        // ),
                        // array(
                        //     "namespace" => "custom",
                        //     "key" => "us_size",
                        //     "value" => $size,
                        //     "type" =>"single_line_text_field"
                        // ),
                        array(
                            "namespace" => "custom",
                            "key" => "sku",
                            "value" => $sku,
                            "type" =>"single_line_text_field"
                        ),
                        array(
                            "namespace" => "custom",
                            "key" => "productcode",
                            "value" => $code,
                            "type" =>"single_line_text_field"
                        ),
                        array(
                            "namespace" => "custom",
                            "key" => "material",
                            "value" => $material,
                            "type" =>"single_line_text_field"
                        ),
                        array(
                            "namespace" => "custom",
                            "key" => "color",
                            "value" => $color,
                            "type" =>"single_line_text_field"
                        ),
                        array(
                            "namespace" => "custom",
                            "key" => "made_in",
                            "value" => $size,
                            "type" =>"single_line_text_field"
                        ),
                        array(
                            "namespace" => "custom",
                            "key" => "category",
                            "value" => $Category,
                            "type" =>"single_line_text_field"
                        ),
                        array(
                            "namespace" => "custom",
                            "key" => "brands",
                            "value" => $brand,
                            "type" =>"single_line_text_field"
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
                        )
                    
                    
                    
    
                     
                    )
                     
     
      ]
      ];
      
      //shopify token
        $sql2="Select * from `API_Credentials` Where Platform='Shopify'";
        $sh = mysqli_query($mysql, $sql2);
        $row1 = mysqli_fetch_assoc($sh);
        $shop_token=$row1['API_Pass'];
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://www-swag-kicks-com.myshopify.com/admin/api/2023-04/products.json',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>json_encode($postData),
      CURLOPT_HTTPHEADER => array(
        "X-Shopify-Access-Token: $shop_token",
        "Content-Type: application/json"
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
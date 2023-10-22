<?php

session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);
$cr=$_SESSION['Username'];
 if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
   {
      
   }
   else
   {
      
       echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
   }


// $sku='Sk-S1';
$sku=$_REQUEST['var1'];
$sql = "SELECT * FROM Product WHERE SKU='$sku'";
$result = mysqli_query($mysql, $sql);

while($row = mysqli_fetch_assoc($result)) 
{  
    $id=$row['id'];
    $title = $row['Title'];
    $brand =$row['Brand'];
    $ven_id =$row['Vendor_ID'];
    $lot_id =$row['Lot_ID'];
    $made =$row['Made_IN'];
    $code=$row['Product_Code'];
    $prod_id=$row['Product_ID'];
    $prod_cat_id=$row['Product_Cat_ID'];
    $condi=$row['Cndition'];
    $weight=$row['Weight'];
    $status=$row['Status'];
    $sku=$row['SKU'];
    $barcode=$row['Barcode'];
    $gender=$row['Gender'];
    $price=$row['Price'];
    $image1=$row['Image_1'];
    $image2=$row['Image_2'];
    $image3=$row['Image_3'];
    $image4=$row['Image_4'];
    $image5=$row['Image_5'];
    $Discription=$row['Discription'];
}



$sql1 = "SELECT Product_Name FROM products WHERE Product_ID='$prod_id'";
$result1 = mysqli_query($mysql, $sql1);
$row1 = mysqli_fetch_assoc($result1);
$P_Name = $row1['Product_Name'];


$sql2 = "SELECT Pr_Cat_Name FROM product_categories WHERE Pr_Cat_ID='$prod_cat_id'";
$result2 = mysqli_query($mysql, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$P_Cat_name = $row2['Pr_Cat_Name']; 


$sql3 = "SELECT Vendor_Name FROM vendor WHERE Vendor_ID='$ven_id'";
$result3 = mysqli_query($mysql, $sql3);
$row3 = mysqli_fetch_assoc($result3);
$v_name = $row3['Vendor_Name']; 


$sql4 = "SELECT Lot_Number FROM lot WHERE id='$lot_id'";
$result4 = mysqli_query($mysql, $sql4);
$row4 = mysqli_fetch_assoc($result4);
$l_num = $row4['Lot_Number']; 





$quantity=$_REQUEST['var2'];
$size=$_REQUEST['var3'];
$material=$_REQUEST['var4'];
$code=$_REQUEST['var5'];


$im1="http://portal.thriftops.com/Listing/uploads/".$image1;
$im2="http://portal.thriftops.com/Listing/uploads/".$image2;
$im3="http://portal.thriftops.com/Listing/uploads/".$image3;
$im4="http://portal.thriftops.com/Listing/uploads/".$image4;
$im5="http://portal.thriftops.com/Listing/uploads/".$image5;



       $products_array = array(
            "product" => array(
                "title" => $title,
                "body_html" => "$Discription",
                "vendor" => $v_name." #".$l_num,
                "status" => $status,
                "tags" => $gender.",".$brand.",".$condi.",".$P_Name.",".$P_Cat_name.','.$sku.",".$material.",".$code.",",
                "variants" => array(
                    array(
                        "title" => $brand,
                        "price" => $price,
                        "sku" => $sku,
                        "option1" => $size,
                        "barcode" => $barcode,
                        "weight" => $weight,
                        "inventory_quantity" => $quantity,
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
                        "namespace" => "my_fields",
                        "key" => "brand",
                        "value" => $brand
                    ),
                ),
                "options" => array(
                    "name" => "Size"

                ),
                "images" => array(
                    array(
                        "src" => $im1,
                        "width" => "3456",
                        "height" => "3456"
                    ),
                    array(
                        "src" =>$im2,
                        "width" => "3456",
                        "height" => "3456"
                        
                    ),
                    array(
                        "src" =>$im3,
                        "width" => "3456",
                        "height"=> "3456"
                    ),
                    array(
                        "src" =>$im4,
                        "width" => "3456",
                        "height"=> "3456",
                    ),
                    array(
                        "src" =>$im5,
                        "width" => "3456",
                        "height"=> "3456",
                    )
                )

            )
        );  


        $data_string = json_encode($products_array);
        $SHOP_URL = 'farazriaz.myshopify.com';
        $SHOPIFY_API = "https://$SHOP_URL/admin/api/2021-01/products.json";
        // $curl = curl_init();
        // curl_setopt($curl, CURLOPT_URL, $SHOPIFY_API);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        //  'X-Shopify-Access-Token: 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',
        //  'Authorization: Bearer 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',
        //  'Content-Type: application/json',
        //  "charset: utf-8"
        // ));
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_VERBOSE, 0);
        // curl_setopt($curl, CURLOPT_HEADER, 1);
        // curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        // curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        // curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($products_array));
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    
        // $response = curl_exec($curl);
        // curl_close($curl);
        // print_r($response);
        // $jso =json_decode($response,true);
         $ch= curl_init();
         curl_setopt($ch, CURLOPT_URL, $SHOPIFY_API);
         curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
         'X-Shopify-Access-Token: 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',
         'Authorization: Bearer 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',
         'Content-Type: application/json'                                                                                                                                      
         ));
         
         curl_setopt($ch, CURLOPT_POST, 1);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);
        curl_close($ch);
        print_r($response);
        $jso =json_decode($response,true);
        
        
        //print_r($jso);
        $cc = $jso['product']['id']; 
        
        $las="UPDATE Product SET Shopify_ID = '".$cc."' WHERE id='".$id."'";
        $relt1 = mysqli_query($mysql, $las);
        
        echo '<script>alert("Uploaded Successfully");window.location.href="Listing_Insert.php";</script>';
        

     



?>
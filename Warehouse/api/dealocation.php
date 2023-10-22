<?php

include_once("../../include/mysql_connection.php"); 

$removedby = $_POST['removedby'];
$reason =  $_POST['reason'];
$sku=$_POST['sku'];


$records = mysqli_query($mysql, "Select Shopify_ID from `addition` WHERE SKU='$sku'");
$row = mysqli_fetch_array($records);
$Shop=$row['Shopify_ID'];
$stat='draft';
//active-draft
$curl = curl_init();
  $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
$ul="https://$SHOP_URL/admin/api/2023-01/products/$Shop.json";
curl_setopt_array($curl, array(
  CURLOPT_URL => $ul,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS =>' {
     "product": 
     {
        "status": "'.$stat.'"
     }
 }',
  CURLOPT_HTTPHEADER => array(
        'X-Shopify-Access-Token: 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',
        'Content-Type: application/json'                                                                                                                                      
  ),
));
$response = curl_exec($curl);
curl_close($curl);
//echo $response;


$sql = "UPDATE racks set Status = 'Empty',Removed_By='$removedby',reason='$reason',SKU='',Pre_SKU='$sku',AStatus='DA' where SKU = '$sku'";
$result = mysqli_query($mysql, $sql);


$records1 = mysqli_query($mysql, "Update `addition` SET Status='$stat' WHERE Shopify_ID='$Shop'");   
if (!$result) 
{
  echo "<script>alert('Error Updating Racks !.')</script>";
  
} 
else 
{
   
  echo "<script>alert('Racks Updating Successfully !.')</script>";
  
      
}
?>





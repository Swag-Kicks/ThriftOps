<?php

include_once("../../include/mysql_connection.php"); 

$wid = $_POST['wid'];
$SKU = $_POST['sku'];
$id = $_POST['id'];

// Validate input
// if (!is_numeric($wid) || !is_numeric($id)) {
//   echo "<script>alert('Invalid input.')</script>";
//   exit;
// }

// Sanitize input
$wid = intval($wid);
$SKU = mysqli_real_escape_string($mysql, $SKU);
$id = intval($id);

$sql3 = "SELECT * FROM `racks` WHERE SKU = '' AND Status = 'Empty' AND Warehouse_ID = $wid LIMIT 1";
$result3 = mysqli_query($mysql, $sql3);
$row3 = mysqli_fetch_array($result3);

$empty_id = $row3['id'];
echo "EMPTYID" + $empty_id;

if (!$empty_id) {
  echo "<script>alert('No empty racks found.')</script>";
  exit;
}


$sql = "UPDATE `racks` SET SKU = '$SKU', Status = 'Filled', AStatus = 'Active' WHERE id = $empty_id";
$result = mysqli_query($mysql, $sql);

if (!$result) {
  echo "<script>alert('Error allocating!')</script>";
} else {
  $sql2 = "UPDATE `racks` SET AStatus = 'Active' WHERE id = $id";
  $result2 = mysqli_query($mysql, $sql2);

  if (!$result2) {
    echo "<script>alert('Error updating!')</script>";
  } else {
    echo "<script>alert('Allocated successfully!')</script>";
  }
}

//mashood work active article
//shop id get
$get = mysqli_query($mysql, "Select Shopify_ID from addtion WHERE SKU = '$SKU'");
$addit = mysqli_fetch_array($get);
$Shop= $addit['Shopify_ID'];

$stat='active';
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
// Close database connection
mysqli_close($mysql);

?>

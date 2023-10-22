<?php
session_start();
include_once("../include/mysql_connection.php");  
error_reporting(0);
date_default_timezone_set("Asia/Karachi"); 




$DateTime = date('Y-m-d');

$shoetry = "SELECT * FROM `Inventory_Sync` where DATE_FORMAT(DateTime, '%Y-%m-%d')='$DateTime' order by id DESC LIMIT 1";
//$shoetry = "SELECT * FROM `Inventory_Sync` where DateTime Between '$DateTime 00:00:00' AND '$DateTime 23:59:59' order by id DESC LIMIT 1";
$shoed = mysqli_query($mysql, $shoetry);
$asr = mysqli_fetch_assoc($shoed);
$fname = $asr['Name'];

//read the json file contents
$jsondata = file_get_contents($fname);
    
//convert json object to php associative array
$data = json_decode($jsondata, true);

foreach($data as $row) 
{
      
        $date=date('Y-m-d/h:i:a');
        $update = "INSERT INTO `addition2` (Title,Shopify_ID,Inventory_Item_ID,Variant_ID,Vendor,Cndition,Size,Weight,Status,SKU,Price,DateTime,Quantity,Image_1,Image_2,Image_3,Image_4,Image_5) VALUES('".$row['Title']."', '".$row['Shopify_ID']."', '".$row['Inventory_Item_ID']."', '".$row['Variant_ID']."','".$row['Vendor']."','".$row['Cndition']."','".$row['Size']."','".$row['Weight']."', '".$row['Status']."', '".$row['SKU']."', '".$row['Price']."', '".$date."', '".$row['Quantity']."','".$row['Image_1']."','".$row['Image_2']."','".$row['Image_3']."','".$row['Image_4']."','".$row['Image_5']."')";
        $asdfg = mysqli_query($mysql, $update);
        
}
    
    
?>
    

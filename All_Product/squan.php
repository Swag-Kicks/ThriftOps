<?php
session_Start();
include_once("../include/mysql_connection.php"); 
$cr=$_SESSION['id'];

if(isset($_POST['id']) && isset($_POST['quan']) && isset($_POST['war']))
{
    $quantity1=$_POST['quan'];
    $warhouse=$_POST['war'];
    $Shopify=$_POST[id];
    $C_Date = date('Y-m-d/h:i:a');
    $query = mysqli_query($mysql, "Select Inventory_Item_ID	from `addition` WHERE Shopify_ID='$Shopify'");
    $row = mysqli_fetch_array($query);
    $id_v=$row['Inventory_Item_ID'];
    //quantity
    $ch1 = curl_init();
    curl_setopt_array($ch1, array(
        CURLOPT_URL => 'https://www-swag-kicks-com.myshopify.com/admin/api/2023-01/inventory_levels/set.json',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
        "location_id": 63487475898,
        "inventory_item_id": "'.$id_v.'",
        "available": "'.$quantity1.'"
        }',
        CURLOPT_HTTPHEADER => array(
        'X-Shopify-Access-Token: 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',
        'Content-Type: application/json'
        ),
        ));
        $response12 = curl_exec($ch1);
        curl_close($ch1);
                
 
    $records = mysqli_query($mysql, "Update `addition` SET Quantity='$quantity1' WHERE Shopify_ID='$Shopify'");   
    $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Product','$Shopify','$quantity1', 'Adjust Quantity', '$C_Date')";
    $result1 = mysqli_query($mysql, $sql1);
    echo "1";
}
else
{
    echo "0";
}
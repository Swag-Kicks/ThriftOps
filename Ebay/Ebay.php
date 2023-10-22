<?php
session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);

$cr=$_SESSION['Username'];


$sql1 = "SELECT * FROM marketplace WHERE Shop='Ebay'";
$result1 = mysqli_query($mysql, $sql1);
$row1 = mysqli_fetch_assoc($result1);
$Client=$row1['client_cred'];
$Pass=$row1['Password'];
$Refresh=$row1['Refresh_Token'];

$link = "https://api.ebay.com/identity/v1/oauth2/token";
$codeAuth = base64_encode("$Client:$Pass");
$ch = curl_init($link);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: Basic '.$codeAuth
));
curl_setopt($ch, CURLHEADER_SEPARATE, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=refresh_token&refresh_token=$Refresh&scope=https://api.ebay.com/oauth/api_scope https://api.ebay.com/oauth/api_scope/sell.marketing.readonly https://api.ebay.com/oauth/api_scope/sell.marketing https://api.ebay.com/oauth/api_scope/sell.inventory.readonly https://api.ebay.com/oauth/api_scope/sell.inventory https://api.ebay.com/oauth/api_scope/sell.account.readonly https://api.ebay.com/oauth/api_scope/sell.account https://api.ebay.com/oauth/api_scope/sell.fulfillment.readonly https://api.ebay.com/oauth/api_scope/sell.fulfillment https://api.ebay.com/oauth/api_scope/sell.analytics.readonly");
$response = curl_exec($ch);
$json = json_decode($response, true);
$info = curl_getinfo($ch);
curl_close($ch);
$new_token=$json['access_token'];
$data = [
    'Token' => $new_token,
    'Shop' => 'Ebay'
    ];
    $sql3 = "UPDATE marketplace SET Token=:Token WHERE Shop=:Shop";
    $stmt= $dbo->prepare($sql3);
    $mai=$stmt->execute($data);
    
    
    if (!$mai) 
    {
        echo "<script>alert('error while saving')</script>";
       
    } 
    else 
    {
         echo '<script>window.location.href="Listing_Ebay12.php";</script>';
	}
        
        
?>
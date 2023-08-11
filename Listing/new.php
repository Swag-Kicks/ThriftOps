<?php

session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);

$cr=$_SESSION['Username'];

$token=$_GET['code'];
$expiry=$_GET['expires_in'];

if(isset($_GET['code']))
{
    // echo $token;
    // echo "<br>";
    // echo $cr;
    $sql = "SELECT * FROM users WHERE username='$cr'";
    $result = mysqli_query($mysql, $sql);
    $row = mysqli_fetch_assoc($result);
    $Company=$row['Company_ID'];
    
    // echo "<br>";
    // echo $Company;
    
    $sql1 = "SELECT * FROM marketplace WHERE Company_ID='$Company' AND Name='Ebay'";
    $result1 = mysqli_query($mysql, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $Client=$row1['client_cred'];
    $Pass=$row1['Password'];
    // echo "<br>";
    // echo $Client;
    // echo "<br>";
    // echo $Pass;
    
    
    
    
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
    curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=authorization_code&code=$token=&redirect_uri=Swagkicks-Swagkick-Swagki-ewniuxkz");
    $response = curl_exec($ch);
    $json = json_decode($response, true);
    $info = curl_getinfo($ch);
    curl_close($ch);
    //echo "<br>";
    // print_r($json);
    $new_token=$json['access_token'];
    
    $refresh_token=$json['refresh_token'];  
    // echo "<br>";
    // echo $new_token;
    // echo "<br>";
    // echo $refresh_token;
    
    $data = [
    'Token' => $new_token,
    'Refresh_Token' => $refresh_token,
    'Company_ID' => $Company,
    'Name' => 'Ebay'
    ];
    $sql3 = "UPDATE marketplace SET Token=:Token, Refresh_Token=:Refresh_Token WHERE Company_ID=:Company_ID AND Name=:Name";
    $stmt= $dbo->prepare($sql3);
    $mai=$stmt->execute($data);
    
    
    if (!$mai) 
    {
        echo "<script>alert('error while saving')</script>";
       
    } 
    else 
    {
         echo '<script>window.location.href="Listing_Ebay.php";</script>';
	}

}



?>
<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['id'];




if(isset($_POST['id']) && isset($_POST['stat']) && isset($_POST['war']))
{
    $stat=$_POST['stat'];
    $warhouse=$_POST['war'];
    $C_Date = date('Y-m-d/h:i:a');

        
    foreach($_POST["id"] as $Shopify)
    {
        //shopify token
        $sql2="Select * from `API_Credentials` Where Platform='Shopify'";
        $sh = mysqli_query($mysql, $sql2);
        $row1 = mysqli_fetch_assoc($sh);
        $shop_token=$row1['API_Pass']; 
        //active-draft
        $curl = curl_init();
        $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
        $ul="https://$SHOP_URL/admin/api/2023-01/products/$Shopify.json";
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
                "X-Shopify-Access-Token: $shop_token",
                'Content-Type: application/json'                                                                                                                                      
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        //echo $response;
        $records = mysqli_query($mysql, "Update `addition` SET Status='$stat' WHERE Shopify_ID='$Shopify'");
            
        $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Product','$Shopify', '$stat', '$C_Date')";
        $result1 = mysqli_query($mysql, $sql1);
    }
    
    echo '1';

}
else
{
    
}
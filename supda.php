
<?php
session_Start();
include_once("../include/mysql_connection.php"); 
$cr=$_SESSION['id'];

if(isset($_POST['id']) && isset($_POST['stat']) && isset($_POST['war']))
{
    $stat=$_POST['stat'];
    $warhouse=$_POST['war'];
    $Shopify=$_POST[id];
    $C_Date = date('Y-m-d/h:i:a');
    
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
            'X-Shopify-Access-Token: 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',
            'Content-Type: application/json'                                                                                                                                      
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    //echo $response;
    $records = mysqli_query($mysql, "Update `addition` SET Status='$stat' WHERE Shopify_ID='$Shopify'");   
    $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Product','$Shopify', '$stat', '$C_Date')";
    $result1 = mysqli_query($mysql, $sql1);
    echo "1";
                
}
else
{
    echo "0";
}
<?php

session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);
date_default_timezone_set("Asia/Karachi");



$aqw= "SELECT *,GROUP_CONCAT(Items) as con FROM Woocommerce_orders Where Woo_id='188618' GROUP BY Woo_id DESC";
$run = mysqli_query($mysql, $aqw);
$row = mysqli_fetch_array($run);
$final = array();
$as=$row["Woo_id"];
$first=$row["Customer_First_Name"];
$last=$row["Customer_Last_Name"];
$add=$row["Customer_Address"];
$city=$row["Customer_City"];
$phone=$row["Customer_Contact"];

$r = $row["con"];
$lin = explode(',',$r);
//echo $lin;
foreach($lin as $value)
{
    $sk=$value;
    $shoetry ="SELECT * FROM `addition` WHERE `SKU`='$sk'";
    $shoed = mysqli_query($mysql, $shoetry);
    $asr =mysqli_fetch_array($shoed);
    $pid=$asr['Variant_ID'];
    $try = array('variant_id' => $pid , 'quantity' =>1);
    $final[]=$try;

}
$order_array = array(
    "order" => array(
        "line_items" => $final,
        "customer" => array(
            "first_name" => $first,
            "last_name" => $last

        ),
        "billing_address" => array(
            "first_name"=> $first,
            "last_name"=> $last,
            "address1"=> $add,
            "phone"=> $phone,
            "city"=> $city,
            "country"=> "Pakistan"
        ),
          "shipping_address" => array(
            "first_name"=> $first,
            "last_name"=> $last,
            "address1"=> $add,
            "phone"=> $phone,
            "city"=> $city,
            "country"=> "Pakistan"
          ),
          "financial_status" => "pending"

    )
);
$mike=json_encode($order_array);
// print_r($mike);
     
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www-swag-kicks-com.myshopify.com/admin/api/2023-01/orders.json',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$mike,
  CURLOPT_HTTPHEADER => array(
    'X-Shopify-Access-Token: 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',
    'Content-Type: application/json',
    'Cookie: _master_udr=eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaEpJaWxtWkdFNE9ERmtOQzA0WlRaaUxUUmhaV010T0RJNVpTMWxZamhsWWpJMU5HUmhZemNHT2daRlJnPT0iLCJleHAiOiIyMDI1LTA0LTE4VDE4OjM4OjAxLjM5M1oiLCJwdXIiOiJjb29raWUuX21hc3Rlcl91ZHIifX0%3D--8fbfa7be93513c5bab937fa7df9806d427eed213; _secure_admin_session_id=6e43684edc3e79c529a7be8f3163be30; _secure_admin_session_id_csrf=6e43684edc3e79c529a7be8f3163be30'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
$jso =json_decode($response,true);
$sa=$jso['order']['id'];
print_r($jso['order']['id']);
$sql2 = "UPDATE `Woocommerce_orders` SET shop_id = '$sa' WHERE Woo_id='188618'";
$result2 = mysqli_query($mysql, $sql2);

//old code
// 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
// $headers = array(
//     'X-Shopify-Access-Token: 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',
//     'Content-Type: application/json'
// );

// while($row = mysqli_fetch_array($run)) 
// {
    
//     $as=$row["Woo_id"];
//     $first=$row["Customer_First_Name"];
//     $last=$row["Customer_Last_Name"];
//     $add=$row["Customer_Address"];
//     $city=$row["Customer_City"];
//     $phone=$row["Customer_Contact"];
    
//     $r = $row["con"];
//     $lin = explode(',',$r);
//     //echo $lin;
//     foreach($lin as $value)
//     {
//         $sk=$value;
//         $shoetry ="SELECT * FROM `addition` WHERE `SKU`='$sk'";
//         $shoed = mysqli_query($mysql, $shoetry);
//         $asr =mysqli_fetch_array($shoed);
//         $pid=$asr['Variant_ID'];
//         $try = array('variant_id' => $pid , 'quantity' =>1);
//         $final[]=$try;

//     }
//     $order_array = array(
//         "order" => array(
//             "line_items" => $final,
//             "customer" => array(
//                 "first_name" => $first,
//                 "last_name" => $last
    
//             ),
//             "billing_address" => array(
//                 "first_name"=> $first,
//                 "last_name"=> $last,
//                 "address1"=> $add,
//                 "phone"=> $phone,
//                 "city"=> $city,
//                 "country"=> "Pakistan"
//             ),
//               "shipping_address" => array(
//                 "first_name"=> $first,
//                 "last_name"=> $last,
//                 "address1"=> $add,
//                 "phone"=> $phone,
//                 "city"=> $city,
//                 "country"=> "Pakistan"
//               ),
//               "financial_status" => "pending"
    
//         )
//     );
//     $mike=json_encode($order_array);
//     // print_r($mike);
     
//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//       CURLOPT_URL => 'https://www-swag-kicks-com.myshopify.com/admin/api/2023-01/orders.json',
//       CURLOPT_RETURNTRANSFER => true,
//       CURLOPT_ENCODING => '',
//       CURLOPT_MAXREDIRS => 10,
//       CURLOPT_TIMEOUT => 0,
//       CURLOPT_FOLLOWLOCATION => true,
//       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//       CURLOPT_CUSTOMREQUEST => 'POST',
//       CURLOPT_POSTFIELDS =>$mike,
//       CURLOPT_HTTPHEADER => array(
//         'X-Shopify-Access-Token: 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',
//         'Content-Type: application/json',
//         'Cookie: _master_udr=eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaEpJaWxtWkdFNE9ERmtOQzA0WlRaaUxUUmhaV010T0RJNVpTMWxZamhsWWpJMU5HUmhZemNHT2daRlJnPT0iLCJleHAiOiIyMDI1LTA0LTE4VDE4OjM4OjAxLjM5M1oiLCJwdXIiOiJjb29raWUuX21hc3Rlcl91ZHIifX0%3D--8fbfa7be93513c5bab937fa7df9806d427eed213; _secure_admin_session_id=6e43684edc3e79c529a7be8f3163be30; _secure_admin_session_id_csrf=6e43684edc3e79c529a7be8f3163be30'
//       ),
//     ));
    
//     $response = curl_exec($curl);
    
//     curl_close($curl);
//     // echo $response;
//     $jso =json_decode($response,true);
//     $sa=$jso['order']['id'];
//     print_r($jso['order']['id']);
//     $sql2 = "UPDATE `Woocommerce_orders` SET shop_id = '$sa' WHERE Woo_id='188618'";
//     $result2 = mysqli_query($mysql, $sql2);
     
     
     
     
     
//     //  echo "<br>";
//     // //old
//     // $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
   
//     // $SHOPIFY_API = "https://$SHOP_URL/admin/api/2023-01/orders.json";
//     // $curl = curl_init();

    
//     // curl_setopt($curl, CURLOPT_URL, $SHOPIFY_API);
//     // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//     // curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
//     // curl_setopt($curl, CURLOPT_POSTFIELDS, $mike);
//     // curl_setopt($curl, CURLOPT_HTTPHEADER,$headers);
//     // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//     // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        
//     // $response = curl_exec($curl);
//     // curl_close($curl);
    
//     // //new
//     // // $curl = curl_init();

//     // // curl_setopt_array($curl, array(
//     // //   CURLOPT_URL => $SHOPIFY_API,
//     // //   CURLOPT_RETURNTRANSFER => true,
//     // //   CURLOPT_ENCODING => '',
//     // //   CURLOPT_MAXREDIRS => 10,
//     // //   CURLOPT_TIMEOUT => 0,
//     // //   CURLOPT_FOLLOWLOCATION => true,
//     // //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     // //   CURLOPT_CUSTOMREQUEST => 'POST',
//     // //   CURLOPT_POSTFIELDS =>json_encode($order_array),
//     // //   CURLOPT_HTTPHEADER => array(
//     // //     'X-Shopify-Access-Token: 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',
//     // //     'Content-Type: application/json'
//     // //   ),
//     // // ));
    
//     // // $response = curl_exec($curl);
//     // // curl_close($curl);
//     // // echo $response;
    
    
//     // $jso =json_decode($response,true);
//     // $sa=$jso['order']['id'];
//     // print_r($jso['order']['id']);
//     // $sql2 = "UPDATE `Woocommerce_orders` SET shop_id = '$sa' WHERE Woo_id='188618'";
//     // $result2 = mysqli_query($mysql, $sql2);
// }







?>
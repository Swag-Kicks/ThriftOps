<?php


include_once("../include/mysql_connection.php"); 
error_reporting(0);
date_default_timezone_set("Asia/Karachi");

$Date=date('Y-m-d',strtotime("-1 days"));
//$Date=date('Y-m-d');
// echo $Date;
$count=0;
$p=1;
$status="None";
// foreach($start as $st)
// {
//   $url='https://soleznft.com/app/wp-json/wc/v3/orders?page=2&per_page=100'; 
//   echo $url;
// }
$url='https://soleznft.com/app/wp-json/wc/v3/orders?after='.$Date.'T00:00:00&per_page=100&order=desc';
// $url='https://soleznft.com/app/wp-json/wc/v3/orders?after='.$Date.'T00:00:00';
echo $url;

 
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Basic Y2tfMWJkZGRmZDM4YmZlYzdhNmExMDZiMjRkMjRiYTI4MjIxNmFjZmRkYjpjc183MmI3MTM1Mzc1YzAyY2ZmMWVlMGUzOWQyNDRmYTExYWY2YTNlZTU3'
      ),
    ));
    $result = curl_exec($curl);
    $result = json_decode($result,true);
    // print_r($result);
    curl_close($curl);
    $product=$result;
    

    foreach ($product as $n => $value)
    {
    		$a=mysqli_real_escape_string($mysql,$value['id']);
    		echo $a."<br>";
    		$b=mysqli_real_escape_string($mysql,$value['date_created']);
    		$Date = date('Y-m-d', strtotime($b));
    		$first=mysqli_real_escape_string($mysql,$value['billing']['first_name']); 
    		$last=mysqli_real_escape_string($mysql,$value['billing']['last_name']);
    		//$name=$d." ".$e;
    		$add=mysqli_real_escape_string($mysql,$value['billing']['address_1']); 
    		$city=mysqli_real_escape_string($mysql,$value['billing']['city']); 
    		$phone=mysqli_real_escape_string($mysql,$value['billing']['phone']);
    		//$product_id=$value['product_data']['sku'];
    		//$e = mysqli_real_escape_string($mysql,$e);
            for ($i=0; $i < 500; $i++)
            { 
                $ite=mysqli_real_escape_string($mysql,$value['line_items'][$i]['sku']);
                $product_id=mysqli_real_escape_string($mysql,$value['line_items'][$i]['product_id']);
                $shop_id=mysqli_real_escape_string($mysql,$value['line_items'][$i]['product_data']['weight']);
                if(!empty($ite))
                {
                    
                    echo $ite;
                    //echo $product_id;
                    echo "<br>";
                    $aqw= "SELECT * FROM Woocommerce_orders Where Woo_id='$a' AND Items='$ite'";
                    $run = mysqli_query($mysql, $aqw);
                    $rowwe =mysqli_fetch_array($run);
                    $cc=$rowwe['id'];
                    if(!empty($cc))
                    {
                    }
                    else
                    {
                        // if( !empty($phone))
                        // {
                            $sql= "INSERT INTO Woocommerce_orders(product_Id,Woo_id,shop_id,Date,Customer_First_Name,Customer_Last_Name,Customer_Address,Customer_City,Customer_Contact,Items,Status) VALUES ('$product_id', '$a', '$shop_id', '$Date', '$first', '$last', '$add', '$city', '$phone', '$ite', '$status')";
        			        $result = mysqli_query($mysql, $sql);
                        // }
                        
                       
                    }
                }
                else
                {
                }

            }
		
    }
    
    
    //product draft and marking inventory
//     $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'https://soleznft.com/app/wp-json/wc/v3/products/182143',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => 'PUT',
//   CURLOPT_POSTFIELDS =>'{
//     "status": "publish",
//     "stock_quantity": 6
// }',
//   CURLOPT_HTTPHEADER => array(
//     'Content-Type: application/json',
//     'Authorization: Basic Y2tfMWJkZGRmZDM4YmZlYzdhNmExMDZiMjRkMjRiYTI4MjIxNmFjZmRkYjpjc183MmI3MTM1Mzc1YzAyY2ZmMWVlMGUzOWQyNDRmYTExYWY2YTNlZTU3'
//   ),
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// echo $response;

?>










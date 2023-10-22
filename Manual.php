<?php
//session_start();
include_once("include/mysql_connection.php"); 
error_reporting(0);

$p=1;
$status="None";

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www-swag-kicks-com.myshopify.com/admin/orders/4978148311226.json',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'X-Shopify-Access-Token: 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'
  ),
));

$response = curl_exec($curl);
$result=json_decode($response,true);
curl_close($curl);

$value=$result['order'];

			
			$a=mysqli_real_escape_string($mysql,$value['id']); 
			echo $a;
			$b=mysqli_real_escape_string($mysql,$value['name']);
			$c=mysqli_real_escape_string($mysql,$value['created_at']);
			$Date = date('Y-m-d', strtotime($c));
			$d=mysqli_real_escape_string($mysql,$value['billing_address']['name']); 
			$e=mysqli_real_escape_string($mysql,$value['billing_address']['address1']); 
			$f=mysqli_real_escape_string($mysql,$value['billing_address']['phone']); 
			$g=mysqli_real_escape_string($mysql,$value['billing_address']['city']); 
			$email=mysqli_real_escape_string($mysql,$value['email']);
			//$h=$value['line_items'][0]['sku'];
			$io=mysqli_real_escape_string($mysql,(int)$value['total_price']); 
			$j=mysqli_real_escape_string($mysql,$value['total_shipping_price_set']['shop_money']['amount']); 
			$dis=mysqli_real_escape_string($mysql,$value['total_discounts']);
			$e = mysqli_real_escape_string($mysql,$e);
			
            for ($i=0; $i < 500; $i++)
            { 
                $ite=mysqli_real_escape_string($mysql,$value['line_items'][$i]['sku']);
                $itep=mysqli_real_escape_string($mysql,$value['line_items'][$i]['price']);
                if(isset($ite))
                {

                    
                    $aqw= "SELECT * FROM `Order` Where SKU='$ite' AND Order_ID='$a'";
                    $run = mysqli_query($mysql, $aqw);
                    $rowwe =mysqli_fetch_array($run);
                    $cc=$rowwe['id'];
                    if(!empty($cc))
                    {
                        //echo "<script>alert('ITEMS Exists In This Table !.')</script>";
                    }
                    else
                    {
                        
                        echo $ite;
                        $p++;
                        echo "<br>";
                         $sql= "INSERT INTO `Order`(`Order_ID`, `Order_Number`, `Date`, `Name`, `Address`, `Contact`, `Email`, `City`, `SKU`, `Quantity`, `Price`, `Shipping`, `Discount`, `Total`, `Status`) VALUES ('".$a."', '".$b."', '".$c."', '".$d."', '".$e."', '".$f."', '".$email."', '".$g."', '".$ite."', '".$quan."', '".$itep."', '".$j."', '".$dis."', '".$io."', '$status')";
    			        $result = mysqli_query($mysql, $sql);
                    }
                }
                else
                {
                    
                }
			    
                
            }
        
			
			
			
	
	?>
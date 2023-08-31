<?php
//session_start();
include_once("include/mysql_connection.php"); 
error_reporting(0);

$p=1;
$status="None";
$shop = 'www-swag-kicks-com';
$api = 'api/2023-07/';
$auth = 'https://' . $shop . '.myshopify.com/admin/' . $api;


function shopify_curl_get($request, $endpoints = '', $limit = 50, $no_pagination = false) {
	$merged = array();
	$page_info = '';
	$last_page = false;
	$limit = '?limit=' . $limit;
	$debug = 0;

	while(!$last_page) {
		$url = $request . $limit . $endpoints . $page_info;
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl,CURLOPT_HTTPHEADER , array(
			'X-Shopify-Access-Token: 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',
            'Authorization: Bearer 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'
		));
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADERFUNCTION, function($curl, $header) use (&$headers) {
		    $len = strlen($header);
		    $header = explode(':', $header, 2);
		    if (count($header) >= 2) {
		        $headers[strtolower(trim($header[0]))] = trim($header[1]);
		    }
		    return $len;
		});
		$result = curl_exec($curl);
		curl_close($curl);

		if(isset($headers['link'])) {
			$links = explode(',', $headers['link']);

			foreach($links as $link) {
				$next_page = false;
				if(strpos($link, 'rel="next"')) {
					$next_page = $link;
				}
			}

			if($next_page) {
				preg_match('~<(.*?)>~', $next_page, $next);
				$url_components = parse_url($next[1]);
				parse_str($url_components['query'], $params);
				$page_info = '&page_info=' . $params['page_info'];
				$endpoints = ''; // Link pagination does not support endpoints on pages 2 and up
			} else {
				$last_page = true; // There's no next page, we're at the last page
			}

		} else {
			$last_page = true; // Couldn't find parameter link in headers, stop loop
		}
		$source_array = json_decode($result, true);
		$merged = array_merge_recursive($merged, $source_array);

		if($no_pagination) {
			$last_page = true;
		}

		// Used for debugging to prevent infinite loops, comment to disable
		//if($debug >= 150) {
		//	//break;
		//}
		//$debug++;

		sleep(1); // Limit calls to 1 per second
	}

	return $merged;
}

$records1 = mysqli_query($mysql,"SELECT * FROM `Order` ORDER BY Order_ID DESC LIMIT 1");
$data1 = mysqli_fetch_array($records1);
$id=$data1[1];
echo $id;


$request = $auth . 'orders.json';
//$fields = '&fields=ids';
$endpoints = "&since_id=".$id; //feb 1
//$endpoints = '&since_id=4387966582970'; //jan 1 
$products = shopify_curl_get($request, $endpoints, 250);

$records2 = mysqli_query($mysql,"SELECT * FROM `Order` ORDER BY Order_Number DESC LIMIT 1");
$data2 = mysqli_fetch_array($records2);
$id1=$data1[2];
echo $id1;


	foreach ($products as $u => $z)
	{
		foreach ($z as $n => $value)
		{
			
			$a=mysqli_real_escape_string($mysql,$value['id']); 
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
			if($io>=2500)
			{
			    $j=0;
			}
			else
			{
			  $j=250;  
			}
			
// 			//$j=mysqli_real_escape_string($mysql,$value['total_shipping_price_set']['shop_money']['amount']); 
			$dis=mysqli_real_escape_string($mysql,$value['total_discounts']);
			$e = mysqli_real_escape_string($mysql,$e);
			//$test=array();
            for ($i=0; $i < 500; $i++)
            { 
                $ite=$value['line_items'][$i]['sku'];
                $itep=$value['line_items'][$i]['price'];
                $quan=$value['line_items'][$i]['quantity'];
                if(isset($ite))
                {
                    //echo $ite;
                    
                    $aqw= "SELECT * FROM `Order` Where SKU='$ite' AND Order_Number='$b'";
                    $run = mysqli_query($mysql, $aqw);
                    $rowwe =mysqli_fetch_array($run);
                    $cc=$rowwe['id'];
                    if(!empty($cc))
                    {
                        //echo "<script>alert('ITEMS Exists In This Table !.')</script>";
                    }
                    else
                    {
                        
                        // echo $ite;
                        $p++;
                       // echo "<br>";
                       if($dis!=0)
                       {
                           $sql= "INSERT INTO `Order`(`Order_ID`, `Order_Number`, `Date`, `Name`, `Address`, `Contact`, `Email`, `City`, `SKU`, `Quantity`, `Price`, `Shipping`, `Discount`, `Discount_From`, `Total`, `Status`) VALUES ('".$a."', '".$b."', '".$c."', '".$d."', '".$e."', '".$f."', '".$email."', '".$g."', '".$ite."', '".$quan."', '".$itep."', '".$j."', '".$dis."', 'Shopify', '".$io."', '$status')";
    			            $result = mysqli_query($mysql, $sql);
                       }
                       else
                       {
                            $sql= "INSERT INTO `Order`(`Order_ID`, `Order_Number`, `Date`, `Name`, `Address`, `Contact`, `Email`, `City`, `SKU`, `Quantity`, `Price`, `Shipping`, `Discount`, `Total`, `Status`) VALUES ('".$a."', '".$b."', '".$c."', '".$d."', '".$e."', '".$f."', '".$email."', '".$g."', '".$ite."', '".$quan."', '".$itep."', '".$j."', '".$dis."', '".$io."', '$status')";
    			            $result = mysqli_query($mysql, $sql);
                           
                       }
                    }
                }
                else
                {
                    //echo "Null";
                    //echo "<br>";
                }
			    
                //$test[]=$va;
            }
            //$sql= "INSERT INTO orders(order_id,order_num,date,Customer_Name,Customer_Address,Customer_Contact,Customer_City,Items,Total_Discount,Total_Amount,Courier_Name,Courier_Tracking,Shopify_Status,Status) VALUES ('".$a."', '".$b."', '".$c."', '".$d."', '".$e."', '".$f."', '".$g."', '".$ite."', '".$dis."', '".$io."', '".$j."', '".$k."', '".$l."', '$status')";
			//$result = mysqli_query($mysql, $sql);
            //$r=implode(" ",$test);
			//echo $a;
			
			
			
		}
		
	}
	
	?>
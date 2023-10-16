<?php

//session_start();
include_once("include/mysql_connection.php"); 
error_reporting(0);
date_default_timezone_set("Asia/Karachi");


//shopify token
$sql2="Select * from `API_Credentials` Where Platform='Shopify'";
$sh = mysqli_query($mysql, $sql2);
$row1 = mysqli_fetch_assoc($sh);
$shop_token=$row1['API_Pass'];
$year=$row1['API_Key'];
$p=1;
$status="Pending";
$shop = 'www-swag-kicks-com';
$api = "api/$year/";
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
		));
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADERFUNCTION, function($curl, $header) use (&$headers) 
		{
		    $len = strlen($header);
		    $header = explode(':', $header, 2);
		    if (count($header) >= 2) 
		    {
		        $headers[strtolower(trim($header[0]))] = trim($header[1]);
		    }
		    return $len;
		});
	
		
        // //chck
        // curl_setopt_array($curl, array(
        // CURLOPT_URL => $url,
        // CURLOPT_RETURNTRANSFER => true,
        // CURLOPT_SSL_VERIFYPEER=>false,
        // CURLOPT_HEADERFUNCTION => function($curl, $header) use (&$headers) {
        // $len = strlen($header);
        // $header = explode(':', $header, 2);
        // if (count($header) >= 2) {
        //     $headers[strtolower(trim($header[0]))] = trim($header[1]);
        // }
        // return $len;
        // },
        // CURLOPT_HTTPHEADER => array(
        //     "X-Shopify-Access-Token: $shop_token",
        //     "Authorization: Bearer $shop_token"
        // ),
        // ));
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

$records1 = mysqli_query($mysql,"SELECT * FROM Abandoned ORDER BY Shopify_ID DESC LIMIT 1");
$data1 = mysqli_fetch_array($records1);
$id=$data1[1];
// echo $id;

// $id=32204355829946;


$request = $auth . 'checkouts.json';
//$fields = '&fields=ids';
$endpoints = "&since_id=".$id; //feb 1
// $endpoints = '&since_id=27708346040506'; //jan 1 
$products = shopify_curl_get($request, $endpoints, 250);
// print_r($products);

// $records2 = mysqli_query($mysql,"SELECT * FROM Abandoned ORDER BY order_num DESC LIMIT 1");
// $data2 = mysqli_fetch_array($records2);
// $id1=$data1[2];
// echo $id1;


	foreach ($products as $u => $z)
	{
		foreach ($z as $n => $value)
		{
		    echo $value['id'].'<br>';
			$a=$value['id']; 
			$b=$value['email'];
// 			$c=$value['note'];
			$Daas=$value['created_at'];
			$Date = date('Y-m-d/h:i:a', strtotime($Daas));
			$d=$value['shipping_address']['name']; 
			$e=$value['shipping_address']['address1']; 
			$f=$value['shipping_address']['phone']; 
			$g=$value['shipping_address']['city']; 
			$io=$value['total_price']; 
			$dis=$value['total_discounts'];
			$j=$value["abandoned_checkout_url"];
            for ($i=0; $i < 500; $i++)
            { 
                $ite=$value['line_items'][$i]['sku'];
                $itep=$value['line_items'][$i]['price'];
                if(isset($ite))
                {
                    echo $ite;
                    $aqw= "SELECT * FROM `Abandoned` Where SKU='$ite' AND Shopify_ID='$a'";
                    $run = mysqli_query($mysql, $aqw);
                    $rowwe =mysqli_fetch_array($run);
                    $cc=$rowwe['id'];
                    if(!empty($cc))
                    {
                      
                    }
                    else
                    {
                        $p++;
                        $sql= "INSERT INTO Abandoned(Shopify_ID,Email,DateTime,SKU,Price,Url,Total,Discount,Name,Address,Contact,City,Status) VALUES ('".$a."', '".$b."', '".$Date."', '".$ite."', '".$itep."', '".$j."', '".$io."', '".$dis."', '".$d."', '".$e."', '".$f."', '".$g."', '$status')";
    			        $result = mysqli_query($mysql, $sql);
                    }
                }
                

            }
   
			
			
			
		}
		
	}
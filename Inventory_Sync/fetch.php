<?php

error_reporting(0);
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");


$i=1;
$all=[];
$shop = 'www-swag-kicks-com';
$api = 'api/2023-01/';
$auth = 'https://' . $shop . '.myshopify.com/admin/' . $api;


function shopify_curl_get($request, $fields = '', $endpoints = '', $limit = 50, $no_pagination = false) {
	$merged = array();
	$page_info = '';
	$last_page = false;
	$limit = '?limit=' . $limit;
	$debug = 0;

	while(!$last_page) {
		$url = $request . $limit . $fields . $endpoints . $page_info;
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl,CURLOPT_HTTPHEADER , array(
			'X-Shopify-Access-Token: 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'
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
$request = $auth . 'products.json';
$fields = '&fields=id,title,status,images,variants,options,vendor';
$endpoints = '';
$products = shopify_curl_get($request, $fields, $endpoints, 250);


foreach ($products as $product)
{
    foreach ($product as $key => $value)
    {

        $shop= $value['id'];
		$title= $value['title']; 
		$vendor= $value['vendor']; 
		$Status= $value['status'];
		$price=$value['variants'][0]['price'];
		$weight= $value['variants'][0]['weight'];
		$sku= $value['variants'][0]['sku'];
		$barcode= $value['variants'][0]['barcode'];
		$inventory_id= $value['variants'][0]['inventory_item_id'];
		$variant_id= $value['variants'][0]['id'];
		$size= $value['options'][0]['values'][0];
		$cond= $value['options'][1]['values'][0];
		$Image1=$value['images'][0]['src'];
		$quantity=$value['variants'][0]['inventory_quantity'];
		$vendor=$value['vendor'];
		$Image2=$value['images'][1]['src'];
		$Image3=$value['images'][2]['src'];
		$Image4=$value['images'][3]['src'];
		$Image5=$value['images'][4]['src'];
		$all[] = array(
						'Title' => $title,
						'Vendor' => $vendor,
						'Shopify_ID' => $shop,
						'Cndition' => $cond,
						'Weight' => $weight,
                        'Status' => $Status,
                        'SKU' => $sku,
                        'Barcode' => $barcode,
                        'Price' => $price,
						'Size' => $size,
                        'Inventory_item_id' => $inventory_id,
                        'Variant_id' => $variant_id,
						'Quantity'=> $quantity,
						'Image1' => $Image1,
						'Image2' => $Image2,
						'Image3' => $Image3,
						'Image4' => $Image4,
						'Image5' => $Image5
									
		);

		

    }

}

$json = json_encode($all);



$sql1 = "SELECT * FROM Inventory_Sync order by id desc limit 1";
$result1 = mysqli_query($mysql, $sql1);
$rw1 = mysqli_fetch_assoc($resa); 
$namesas = $rw1['Name'];
$Fname=substr($namesas, 4);
if($Fname=='')
{
    $filename='data1.json';
}
else
{
    $Fname++;
    $filename='data'.$Fname.'.json';
}



//write json to file
if (file_put_contents($filename, $json))
{
    $DateTime = date('Y-m-d/h:i:a');
    $linkas='https://backup.thriftops.com/Inventory_Sync/'.$filename;
    $sql = "INSERT INTO `Inventory_Sync` (Name,File,DateTime) VALUES($filename,'$linkas','$DateTime')";
    $rest = mysqli_query($mysql, $sql);
    echo "JSON file created successfully...";
}
else 
{
    //echo "Oops! Error creating json file...";
}

?>
<?php

// include_once("../include/mysql_connection.php"); 
error_reporting(0);
date_default_timezone_set("Asia/Karachi");


$i=1;
$all=[];
$username = '6f9c9e67fe431b576ec23b9c3ea59067';
$password = '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';
$shop = 'www-swag-kicks-com';
$api = 'api/2020-01/';
$auth = 'https://' . $username . ':' . $password . '@' . $shop . '.myshopify.com/admin/' . $api;


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
$fields = '&fields=id,title,status,images,variants,options';
$endpoints = '';
$products = shopify_curl_get($request, $fields, $endpoints, 250);

#print_r($products);
?>

<?php include_once("header.php"); ?>

    <section>
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th colspan="1">Product Image</th>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Status</th>
						<th>Price</th>

                    </tr>
                </thead>
                <tbody id="product_products">
                    <?php
                    foreach ($products as $product)
                    {
                        foreach ($product as $key => $value)
                        {
                            //$image = count($value['images']) > 0 ? $value['images'][0]['src'] : "";
							// $image2 = count($value['images']) > 0 ? $value['images'][1]['src'] : "";
							// $image3= count($value['images']) > 0 ? $value['images'][2]['src'] : "";

                            
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $value['id'] ?></td> 
        <!--                        <td><?php //echo $value['title'] ?></td>-->
        <!--                        <td><?php //echo $value['status'] ?></td>-->
								<!--<td><?php //echo $value['variants'][0]['price']; ?></td> -->
								
                            </tr>
                            <?php

                        }

                    }

                    ?>
                </tbody>
            </table>
    </section>

    <?php include_once("footer.php"); ?>
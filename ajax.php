<?php


if(isset($_GET['call_type']))
{
	$call_type = $_GET['call_type'];

	if($call_type == "Shopify")
	{
		echo json_encode(array(
			'status'=>'success',
			'title'=> 'Shopify Page',
			'description' => 'Shopify description',
			'url' => $call_type.'',
		
		));
	}
	else if($call_type == "WooCommerce")
	{
		echo json_encode(array(
			'status'=>'success',
			'title'=> 'WooCommerce Page',
			'description' => 'WooCommerce description',
			'url' => $call_type.'',
			
		));
	}
	else if($call_type == "home")
	{
		echo json_encode(array(
			'status'=>'success',
			'title'=> 'Ebay Page',
			'description' => 'Ebay description',
			'url' =>"addProduct".'',
		));
	}
	
}
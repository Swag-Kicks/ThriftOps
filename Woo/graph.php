<?php
// Set up variables for authentication and GraphQL endpoint

$shopify_url = 'https://www-swag-kicks-com.myshopify.com';
$access_token = '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';


$shopify_domain = 'www-swag-kicks-com.myshopify.com';
// $access_token = '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';

// Customer information
$customer_data = array(
    'first_name' => 'John',
    'last_name' => 'Doe',
    'email' => 'john.doe@example.com',
);

// Line items
$line_item_data = array(
    array(
        'variant_id' => 'gid://shopify/ProductVariant/41121008419002',
        'quantity' => 1,
    ),
    array(
        'variant_id' => 'gid://shopify/ProductVariant/41514195747002',
        'quantity' => 1,
    ),
);


// Build the GraphQL query
$query = 'mutation {
            draftOrderCreate(input: {
                email: "' . $customer_data['email'] . '",
                shippingAddress: {
                    firstName: "' . $customer_data['first_name'] . '",
                    lastName: "' . $customer_data['last_name'] . '"
                },
                lineItems: [';

foreach ($line_item_data as $item) {
    $query .= '{
                    variantId: "' . $item['variant_id'] . '",
                    quantity: ' . $item['quantity'] . '
                },';
}

$query = rtrim($query, ',');
$query .= ']
            }) {
                draftOrder {
                    id
                }
                userErrors {
                    field
                    message
                }
            }
        }';

// Set CURL options for API request
$options = array(
    CURLOPT_URL => $shopify_url . '/admin/api/graphql.json',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode(array('query' => $query)),
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'X-Shopify-Access-Token: ' . $access_token
    )
);

// Send API request using CURL
$curl = curl_init();
curl_setopt_array($curl, $options);
$response = curl_exec($curl);
curl_close($curl);

// Parse API response
$response_array = json_decode($response, true);
print_r($response_array);

// if (!empty($response_array['data']['draftOrderCreate']['draftOrder']['id'])) {
//     // Success! The draft order was created
//     $draft_order_id = $response_array['data']['draftOrderCreate']['draftOrder']['id'];
// } else {
//     // Error! The draft order was not created
//     $error_message = $response_array['data']['draftOrderCreate']['userErrors'][0]['message'];
// }


?>

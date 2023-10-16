<?php
// $accessKey = 'AKIA442OQIPQ2IZFHX7H';
// $secretKey = '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';
// $bucketName = 'thriftops';
// $objectKey = 'products/'; // Change this to the desired object key

// $method = 'PUT';
// $contentType = 'image/jpeg'; // Change this to the appropriate content type for your image

// $date = gmdate('D, d M Y H:i:s T', time());
// $resource = "/$bucketName/$objectKey";

// $headers = [
//     "Host: $bucketName.s3.amazonaws.com",
//     "Date: $date",
//     "Content-Type: $contentType",
//     "Authorization: AWS $accessKey:" . signAWSRequest($method, $contentType, $date, $resource, $secretKey),
// ];

// function signAWSRequest($method, $contentType, $date, $resource, $secretKey) {
//     $stringToSign = "$method\n\n$contentType\n$date\n$resource";
//     $signature = base64_encode(hash_hmac('sha1', $stringToSign, $secretKey, true));
//     return $signature;
// }


// $curl = curl_init();
// $filePath = 'imageicon12.png'; // Replace with the local path to your image file

// curl_setopt($curl, CURLOPT_URL, "https://$bucketName.s3.amazonaws.com/$objectKey");
// curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
// curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
// curl_setopt($curl, CURLOPT_PUT, true);
// curl_setopt($curl, CURLOPT_INFILE, fopen($filePath, 'rb'));
// curl_setopt($curl, CURLOPT_INFILESIZE, filesize($filePath));
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// $response = curl_exec($curl);
// $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

// curl_close($curl);


// echo $response;
// if ($httpCode === 200) {
//     // File uploaded successfully
//     echo "Image uploaded successfully.";

//     // Save the image path in your database table
//     $imagePath = "https://$bucketName.s3.amazonaws.com/$objectKey";
//     // Use your database connection code to insert $imagePath into your database table
// } else {
//     echo "Error uploading image: HTTP $httpCode";
// }


date_default_timezone_set('Asia/Kolkata');
$accessKey = 'AKIA442OQIPQ2IZFHX7H';
$secretKey = 'GgxxAE+7RcJYsGuk2pztMZYHMcJwlXda7Hw87d6Q';
$bucketName = 'thriftops';
$objectKey = 'products/'; // Change this to the desired object key

$method = 'PUT';
$contentType = 'image/jpeg'; // Change this to the appropriate content type for your image


$currentDateTime = new DateTime('now', new DateTimeZone('UTC'));
$amzDate = $currentDateTime->format('Ymd\THis\Z');
$date = $currentDateTime->format('Ymd\THis\Z');

$region = 'ap-south-1'; // Change this to your AWS region
$service = 's3';

$canonicalRequest = implode("\n", [
    $method,
    "/$bucketName/$objectKey",
    '',
    "content-type:$contentType",
    "host:$bucketName.s3.$region.amazonaws.com",
    "x-amz-content-sha256:" . hash('sha256', ''),
    "x-amz-date:$amzDate",
    '',
    "content-type;host;x-amz-content-sha256;x-amz-date",
    hash('sha256', ''),
]);

$credentialScope = implode('/', [$amzDate, $region, $service, 'aws4_request']);
$stringToSign = implode("\n", [
    'AWS4-HMAC-SHA256',
    $amzDate,
    $credentialScope,
    hash('sha256', $canonicalRequest),
]);

$signingKey = hash_hmac('sha256', 'aws4_request', hash_hmac('sha256', $service, hash_hmac('sha256', $region, hash_hmac('sha256', $amzDate, 'AWS4' . $secretKey, true), true), true), true);
$signature = hash_hmac('sha256', $stringToSign, $signingKey);

$headers = [
    "Host: $bucketName.s3.$region.amazonaws.com",
    "x-amz-content-sha256: " . hash('sha256', ''),
    "x-amz-date: $amzDate",
    "Authorization: AWS4-HMAC-SHA256 Credential=$accessKey/$credentialScope, SignedHeaders=content-type;host;x-amz-content-sha256;x-amz-date, Signature=$signature",
    "Content-Type: $contentType",
];

$curl = curl_init();
$filePath = 'imageicon12.png'; // Replace with the local path to your image file

curl_setopt($curl, CURLOPT_URL, "https://$bucketName.s3.$region.amazonaws.com/$objectKey");
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_PUT, true);
curl_setopt($curl, CURLOPT_INFILE, fopen($filePath, 'rb'));
curl_setopt($curl, CURLOPT_INFILESIZE, filesize($filePath));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);
echo $response;
if ($httpCode === 200) {
    // echo "Image uploaded successfully.";
    $imagePath = "https://$bucketName.s3.amazonaws.com/$objectKey";
    echo $imagePath;
} else {
    // echo "Error uploading image: HTTP $httpCode";
}


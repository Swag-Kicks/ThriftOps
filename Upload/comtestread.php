<?php
require '../vendor/autoload.php'; // Load the AWS SDK for PHP
require 'config.php';
// use Aws\S3\S3Client;
// use Aws\Exception\AwsException;

// // Replace with your AWS credentials
// $aws_access_key = 'AKIA442OQIPQR3XYU3SJ';
// $aws_secret_key = 'DiJgkArwuymp9WGrLPXi1WPKi50oNiO9sgIFnxXM';
// $bucket_name = 'thriftops';
// $object_key = 'products/imageicon12.png'; // Replace with the object key you want to read

// // Create an S3 client
// $s3 = new S3Client([
//     'version'     => 'latest',
//     'region'      => 'ap-south-1', // Change to your desired AWS region
//     'credentials' => [
//         'key'    => $aws_access_key,
//         'secret' => $aws_secret_key,
//     ],
// ]);

// // Generate a pre-signed URL
// try {
//     $cmd = $s3->getCommand('GetObject', [
//         'Bucket' => $bucket_name,
//         'Key'    => $object_key,
//     ]);

//     $request = $s3->createPresignedRequest($cmd, '+15 minutes'); // Adjust the expiration time as needed
//     $presignedUrl = (string)$request->getUri();

//     echo "Pre-Signed URL: $presignedUrl";

//     // You can use this URL to read the S3 object via HTTP
// } catch (AwsException $e) {
//     echo "Error generating pre-signed URL: {$e->getMessage()}";
// }



use Aws\S3\S3Client;
$objAwsS3Client = new S3Client([
    'version' => 'latest',
    'region' => AWS_ACCESS_REGION,
    'credentials' => [
        'key'    => AWS_ACCESS_KEY_ID,
        'secret' => AWS_ACCESS_KEY_SECRET
    ]
]);
try {
    $objects = $objAwsS3Client->listObjects(['Bucket' => AWS_BUCKET_NAME]);
    // loop through all files 
    foreach ($objects['Contents'] as $object) {
        echo $object['Key'] . "<br>";
    }
} catch (Aws\S3\Exception\S3Exception $e) {
    echo "There was an error fetching data from S3: " . $e->getMessage();
}
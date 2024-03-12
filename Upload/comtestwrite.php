<?php
require '../vendor/autoload.php'; // Load the AWS SDK for PHP

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

// Replace with your AWS credentials
$aws_access_key = 'AKIA442OQIPQZ5EDQSFG';
$aws_secret_key = 'kEYOpKEgPyrLyKAt7yDN64JCYbOtPsXZSLVYZlVH';
$bucket_name = 'thriftops';

// Create an S3 client
$s3 = new S3Client([
    'version'     => 'latest',
    'region'      => 'ap-south-1', // Change to your desired AWS region
    'credentials' => [
        'key'    => $aws_access_key,
        'secret' => $aws_secret_key,
    ],
]);

// Specify the file you want to upload and its destination in the bucket
$file_path = 'imageicon12.png'; // Replace with the actual file path
$key = 'products/'.$file_path; // Replace with the desired object key in the bucket

try {
    // Upload the file to S3
    $result = $s3->putObject([
        'Bucket' => $bucket_name,
        'Key'    => $key,
        'Body'   => fopen($file_path, 'rb'), // Open the file for reading
    ]);

    echo "File uploaded successfully: {$result['ObjectURL']}";
} catch (AwsException $e) {
    echo "Error uploading the file: {$e->getMessage()}";
}
?>

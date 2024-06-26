<?php
// $folderName = 'upload/';

// $to_encode = array();

// if(!empty($_FILES))
// {
//     $file = $_FILES['file']['tmp_name'];
//     $fileLocation = $folderName . $_FILES['file']['name'];
//     move_uploaded_file($file,$fileLocation);
//     //  echo $fileLocation;
//         $to_encode[] = $fileLocation;

//      echo json_encode($to_encode);
//      die();
// } 
require '../vendor/autoload.php'; // Load the AWS SDK for PHP

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

//shopify token
$sql2 = "Select * from `API_Credentials` Where Platform='Aws'";
$sh = mysqli_query($mysql, $sql2);
$row1 = mysqli_fetch_assoc($sh);
// Replace with your AWS credentials
$aws_access_key = $row1['API_Key'];
$aws_secret_key = $row1['API_Pass'];
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

print_r($s3);

$to_encode = array();

if (!empty($_FILES)) {

    // Specify the file you want to upload and its destination in the bucket
    $file_path = $_FILES['file']['tmp_name']; // Replace with the actual file path
    $key = 'products/' . date('Ymd_His') . '_' . basename($_FILES['file']['name']);
    // $key = 'products'.$file_path; // Replace with the desired object key in the bucket

    $extension = pathinfo(basename($_FILES['file']['name']), PATHINFO_EXTENSION);
    try {
        // Upload the file to S3
        $result = $s3->putObject([
            'Bucket' => $bucket_name,
            'Key'    => $key,
            'Body'   => fopen($file_path, 'r'), // Open the file for reading
            'ContentType' => "image/$extension", // Set the content type based on the uploaded file's type'AC
            // 'ContentDisposition'=>'inline',
            'ACL' => 'public-read', // Set ACL to make the object publicly accessible
        ]);

        // echo "File uploaded successfully: {$result['ObjectURL']}";

        $to_encode[] = $result['ObjectURL'];

        echo json_encode($to_encode);

        die();
    } catch (AwsException $e) {
        echo "Error uploading the file: {$e->getMessage()}";
    }
}

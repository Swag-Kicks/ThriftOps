<?php
session_start();
include_once("../include/mysql_connection.php"); 
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.tcscourier.com/production/v1/cod/cities',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'X-IBM-Client-Id: fb9150b6-133f-4209-816c-5e6226263a04'
  ),
));



$result = curl_exec($curl);
        $result = json_decode($result,true);
        curl_close($curl);
        // var_dump($result['allCities']);
// print_r($result['allCities']);



foreach ($result['allCities'] as $key => $value)
{
 
    echo $value['cityName']."<br>";
    //logs
    $sql1 = "INSERT INTO TCS (id,Name) VALUES ('".$value['cityID']."','".$value['cityName']."')";
    $result1 = mysqli_query($mysql, $sql1);
}



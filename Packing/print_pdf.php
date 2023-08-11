<?php
include_once('../vendor/autoload.php'); 
session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);
date_default_timezone_set("Asia/Karachi");

$cr=$_SESSION['id'];

$ID= $_GET['GETID'];
//echo $ID;
$date=date('Y-m-d/h:i:a');
$space='';

$que2="SELECT * FROM `Order` WHERE Order_ID='$ID'";
$result3 = mysqli_query($mysql, $que2);

$row2 = mysqli_fetch_array($result3);
$courier=$row2['Courier'];
$tracking=$row2['Tracking'];
$pdf=$row2['Pdf_link'];


if($courier=='Self')
{
     echo '<script>window.location.href="KarachiPDF.php?GETID='.$ID.'";</script>';
}
if($courier=='Leopard')
{
    echo '<script>window.location.href="'.$pdf.'";</script>';
}
if($courier=='PostEx')
{
    echo '<script>window.location.href="https://merchant.postex.pk/get-invoice?trackingNumbers='.$tracking.'";</script>';
}
if($courier=='Rider')
{
    echo '<script>window.location.href="http://api.withrider.com/airwaybill?CN='.$tracking.'&loginId=2206&apikey=i(dSojMg0YNv5zGnTUwC90(Ru77j4eX47xqdiXb5e5XWKoAqEhuzKvdx)ByvrDrW";</script>';
    
}
if($courier=='Tcs')
{
    echo '<script>window.location.href=" https://envio.tcscourier.com/BookingReportPDF/GenerateLabels?consingmentNumber='.$tracking.'";</script>';
    
}
if($courier=='Trax')
{
    $client = new \GuzzleHttp\Client();
    $headers = [
      'Authorization' => 'OGpvZDlicGhsNENCYlNUdnNQdlEyWndIVE1oS2ZKMzVxY1FIY1ZleGtueTUwQUgxMEduVGdCcEZTeXRn60d56d6498550',
      'Content-Type' => 'application/json',
    ];
    $body = '{
      "tracking_number": "'.$tracking.'",
      "type": 0
    }';
    $request =new \GuzzleHttp\Psr7\Request('GET', 'https://sonic.pk/api/shipment/air_waybill', $headers, $body);
    $res = $client->sendAsync($request)->wait();
    $response=$res->getBody();
    
    
    $base64 = base64_encode($response);
    $mime = "image/jpeg";
    $img = ('data:' . $mime . ';base64,' . $base64);
    
    
    echo '<img src="' . $img . '" style="margin-left: 10px;margin-top: 520px;">';
    
}



 
 

 
 

 



 
 
 
 
 

?>
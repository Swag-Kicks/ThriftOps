<?php
$server="thriftops.cqmcfnfzz2yd.ap-south-1.rds.amazonaws.com";
$user="root";
$pass="Swagkicks";
$database="thriftops_30";
$mysql= mysqli_connect($server,$user, $pass, $database);

if(!$mysql)
{
    die("Error: " . mysqli_connect_error());
}


session_start();
error_reporting(0);
$tracks=array();
$lim=$_GET['var1'];
// $lim=50;

$sql = "SELECT Tracking FROM `Order` where Courier='PostEx' AND Shipping_Status NOT in ('Delivered','Returned','CReturned') OR Courier='PostEx' AND Shipping_Status='' GROUP BY Tracking DESC LIMIT $lim,50";
$result = mysqli_query($mysql, $sql);
while($row = mysqli_fetch_assoc($result))
{
    $tracks[]=$row['Tracking'];
}

$C_Date = date('Y-m-d/h:i:a');
$STRING = implode(",", $tracks);
    
$curl_handle = curl_init();
curl_setopt($curl_handle,CURLOPT_URL,'https://api.postex.pk/services/integration/api/order/v1/track-bulk-order?TrackingNumbers='.$STRING);
curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl_handle,CURLOPT_ENCODING ,'');
curl_setopt($curl_handle,CURLOPT_MAXREDIRS,10);
curl_setopt($curl_handle,CURLOPT_TIMEOUT,0);
curl_setopt($curl_handle,CURLOPT_FOLLOWLOCATION,true);
curl_setopt($curl_handle,CURLOPT_CUSTOMREQUEST,'GET');
curl_setopt($curl_handle,CURLOPT_HTTPHEADER,array('Token: ZWRkMDMyZjNiM2Y3NDA3OTgwNjZiODZiOGU4MzJhMTk6MGI5Nzk3ZTdiNzRiNDkwNjkyOTY3OTUyZDUwOTJlNDE=','Authorization: Basic Y29udGFjdEBzd2FnLWtpY2tzLmNvbTpTd2FnQDc4Ng=='));

$response = curl_exec($curl_handle);
$response= json_decode($response,true);
curl_close($curl_handle);
// print_r($response);
    
for ($i=0; $i < 50; $i++) 
{
    $track=$response['dist'][$i]['trackingResponse']['trackingNumber'];
    $sta=$response['dist'][$i]['trackingResponse']['transactionStatus'];
    if($sta=='Out For Delivery' || $sta=='En-Route to Lahore warehouse' || $sta=='En-Route to Karachi warehouse' ||$sta=='Delivery Under Review' || $sta=='Attempted')
    {
        $my='Intransit'; 
        //status update database
        $las="UPDATE `Order` SET Status='$my',Shipping_Status='$my' WHERE Tracking='$track'";
        $relt1 = mysqli_query($mysql, $las);
        $sqql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('Auto','Order','$track', '$my', '$C_Date')";
        $result1w = mysqli_query($mysql, $sqql1);
         echo $my.' - '.$track;
         echo "<br>";
    
    }
    if($sta=='Un-Assigned By Me' || $sta=='Unbooked')
    {
        $my='Pending';
        //status update database
        $las="UPDATE `Order` SET Shipping_Status='$my' WHERE Tracking='$track'";
        $relt1 = mysqli_query($mysql, $las);
        $sqql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('Auto','Order','$track', '$my', '$C_Date')";
        $result1w = mysqli_query($mysql, $sqql1);
         echo $my.' - '.$track;
         echo "<br>";
    
    }
    
    if($sta=='Return Requested' || $sta=='Returned' || $sta=='Out For Return' || $sta=='Out For Return')
    {
        $my='CReturned';
        //status update database
        $las="UPDATE `Order` SET Status='$my',Shipping_Status='$my' WHERE Tracking='$track'";
        $relt1 = mysqli_query($mysql, $las);
        $sqql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('Auto','Order','$track', '$my', '$C_Date')";
        $result1w = mysqli_query($mysql, $sqql1);
         echo $my.' - '.$track;
         echo "<br>";
    
    }
    if($sta=='Delivered')
    {
        $my='Delivered';
        //status update database
        $las="UPDATE `Order` SET Status='$my',Shipping_Status='$my' WHERE Tracking='$track'";
        $relt1 = mysqli_query($mysql, $las);
        $sqql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('Auto','Order','$track', '$my', '$C_Date')";
        $result1w = mysqli_query($mysql, $sqql1);
         echo $my.' - '.$track;
         echo "<br>";
    
    }
    
    
}



?>
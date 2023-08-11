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

$C_Date = date('Y-m-d/h:i:a');
session_start();
error_reporting(0);
$lim=$_GET['var1'];


$sql = "SELECT Tracking FROM `Order` where Courier='Rider' AND Shipping_Status NOT in ('Delivered','Returned','CReturned') OR Courier='Rider' AND Shipping_Status='' GROUP BY Tracking DESC LIMIT $lim,25";
$result = mysqli_query($mysql, $sql);
while($row = mysqli_fetch_assoc($result))
{
    $tracking=$row['Tracking'];
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://api.withrider.com/rider/v1/GetOrderStatus?cn=$tracking&loginId=2206&apikey=i(dSojMg0YNv5zGnTUwC90(Ru77j4eX47xqdiXb5e5XWKoAqEhuzKvdx)ByvrDrW",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    
    $response = curl_exec($curl);
    curl_close($curl);
    $jso =json_decode($response,true);
    $sta=$jso['order_status'];
        
        
        if($sta=='Rider on its way')
        {
            $my='Intransit'; 
            //status update database
            $las="UPDATE `Order` SET Status='$my',Shipping_Status='$my' WHERE Tracking='$tracking'";
            $relt1 = mysqli_query($mysql, $las);
            $sqql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('Auto','Order','$track', '$my', '$C_Date')";
            $result1w = mysqli_query($mysql, $sqql1);
            echo $my." - ".$tracking;
            echo "<br>";
        
        }
        if($sta=='Call a Rider')
        {
            $my='Pending';
            //status update database
            $las="UPDATE `Order` SET Shipping_Status='$my' WHERE Tracking='$tracking'";
            $relt1 = mysqli_query($mysql, $las);
            $sqql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('Auto','Order','$track', '$my', '$C_Date')";
            $result1w = mysqli_query($mysql, $sqql1);
            echo $my." - ".$tracking;
            echo "<br>";
        
        }
        
        if($sta=='Returned' || $sta=='Return In Transit' || $sta=='Awaiting Return')
        {
            $my='CReturned';
            //status update database
            $las="UPDATE `Order` SET Status='$my',Shipping_Status='$my' WHERE Tracking='$tracking'";
            $relt1 = mysqli_query($mysql, $las);
            $sqql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('Auto','Order','$track', '$my', '$C_Date')";
            $result1w = mysqli_query($mysql, $sqql1);
            echo $my." - ".$tracking;
            echo "<br>";
        
        }
        if($sta=='Delivered')
        {
            $my='Delivered';
            //status update database
            $las="UPDATE `Order` SET Status='$my',Shipping_Status='$my' WHERE Tracking='$tracking'";
            $relt1 = mysqli_query($mysql, $las);
            $sqql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('Auto','Order','$track', '$my', '$C_Date')";
            $result1w = mysqli_query($mysql, $sqql1);
            echo $my." - ".$tracking;
            echo "<br>";
        
        }
        if($sta=='Cancelled')
        {
            $my='Canceled';
            //status update database
            $las="UPDATE `Order` SET Shipping_Status='$my' WHERE Tracking='$tracking'";
            $relt1 = mysqli_query($mysql, $las);
            $sqql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('Auto','Order','$track', '$my', '$C_Date')";
            $result1w = mysqli_query($mysql, $sqql1);
            echo $my." - ".$tracking;
            echo "<br>";
        
        }

    
    
}







?>
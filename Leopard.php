<!-- <?php
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
$ids=array();
$lim=$_GET['var1'];


$sql = "SELECT Tracking FROM `Order` where Courier='Leopard' AND Shipping_Status NOT in ('Delivered','Returned','CReturned') OR Courier='Leopard' AND Shipping_Status='' GROUP BY Tracking DESC LIMIT $lim,15";
$result = mysqli_query($mysql, $sql);
while($row = mysqli_fetch_assoc($result))
{
    $ids[]=$row['Tracking'];
}

$C_Date = date('Y-m-d/h:i:a');
$STRING = implode(",", $ids);
    
$curl_handle = curl_init();
curl_setopt($curl_handle, CURLOPT_URL, 'http://new.leopardscod.com/webservice/trackBookedPacket/format/json/');  // Write here Production Link
curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl_handle, CURLOPT_POSTFIELDS, json_encode(array(
    "api_key" => "508CBAF4BDE415CD9844678E525B6C55",
    "api_password" =>"SWAGKICKS321",
    "track_numbers" => "$STRING"
    /* 'track_numbers' => 'KI191029456' */                      // E.g. array('Order Id') OR  array('Order Id-1', 'Order Id-2', 'Order Id-3')
)));
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
$buffer = curl_exec($curl_handle);
$buffer= json_decode($buffer,true);
curl_close($curl_handle);

// print_r($response);
    
for ($i=0; $i < 10; $i++) 
{
    $track=$buffer['packet_list'][$i]['track_number'];
    $sta=$buffer['packet_list'][$i]['booked_packet_status'];
        
        
    if($sta=='Assign to Courier' || $sta=='Arrived at Station')
    {
        $my='Intransit'; 
        //status update database
        $las="UPDATE `Order` SET Status='$my',Shipping_Status='$my' WHERE Tracking='$track'";
        $relt1 = mysqli_query($mysql, $las);
        echo $my." - ".$track;
        $sqql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('Auto','Order','$track', '$my', '$C_Date')";
        $result1w = mysqli_query($mysql, $sqql1);
        echo "<br>";
    
    }
    if($sta=='Pending' || $sta=='Consignment Booked')
    {
        $my='Pending';
        //status update database
        $las="UPDATE `Order` SET Shipping_Status='$my' WHERE Tracking='$track'";
        $relt1 = mysqli_query($mysql, $las);
        $sqql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('Auto','Order','$track', '$my', '$C_Date')";
        $result1w = mysqli_query($mysql, $sqql1);
        echo $my." - ".$track;
        echo "<br>";
    
    }
    
    if($sta=='Returned to shipper' || $sta=='Being Return' || $sta=='Ready for Return')
    {
        $my='CReturned';
        //status update database
        $las="UPDATE `Order` SET Status='$my',Shipping_Status='$my' WHERE Tracking='$track'";
        $relt1 = mysqli_query($mysql, $las);
        $sqql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('Auto','Order','$track', '$my', '$C_Date')";
        $result1w = mysqli_query($mysql, $sqql1);
        echo $my." - ".$track;
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
        echo $my." - ".$track;
        echo "<br>";
    

    }
    
    
}



?> -->
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
$lim=$_GET['var1'];


$sql = "SELECT Tracking FROM `Order` where Courier='Trax' AND Shipping_Status NOT in ('Delivered','Returned') OR Courier='Trax' AND Shipping_Status='' GROUP BY Tracking ASC LIMIT $lim,25";
$result = mysqli_query($mysql, $sql);
while($row = mysqli_fetch_assoc($result))
{
    $tracking=$row['Tracking'];
    $curl_handle = curl_init();
    curl_setopt($curl_handle,CURLOPT_URL,'https://sonic.pk/api/shipment/status');
    curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl_handle,CURLOPT_ENCODING,'');
    curl_setopt($curl_handle,CURLOPT_MAXREDIRS,10);
    curl_setopt($curl_handle,CURLOPT_TIMEOUT,0);
    curl_setopt($curl_handle,CURLOPT_FOLLOWLOCATION,true);
    curl_setopt($curl_handle,CURLOPT_HTTPHEADER,array('Authorization: OGpvZDlicGhsNENCYlNUdnNQdlEyWndIVE1oS2ZKMzVxY1FIY1ZleGtueTUwQUgxMEduVGdCcEZTeXRn60d56d6498550','Content-Type: application/json'));
    curl_setopt($curl_handle,CURLOPT_CUSTOMREQUEST,'GET');
    curl_setopt($curl_handle,CURLOPT_POSTFIELDS,json_encode(array(
        
        "tracking_number" => $tracking,
        "type" => 1
    
    )));
            
    $response = curl_exec($curl_handle);
    curl_close($curl_handle);
    //print_r($response);
    $jso =json_decode($response,true);
    $sta=$jso['current_status'];

    if($sta=='Shipment - In Transit')
        {
            $my='Intransit'; 
            //status update database
            $las="UPDATE `Order`` Set Shipping_Status='$my' WHERE Tracking='$tracking'";
            $relt1 = mysqli_query($mysql, $las);
            echo $my." - ".$tracking;
            echo "<br>";
        
        
        }
        
        if($sta=='Return - Delivered to Shipper' || $sta=='Return - Dispatched' || $sta=='Return - Arrived at Origin' || $sta=='Return - In Transit' || $sta=='Return - Confirm' || $sta=='Return - Not Attempted' || $sta=='Replacement - Delivered to Shipper')
        {
            $my='Returned';
            //status update database
            $las="UPDATE `Order`` Set Status='$my',Shipping_Status='$my' WHERE Tracking='$tracking'";
            $relt1 = mysqli_query($mysql, $las);
            echo $my." - ".$tracking;
            echo "<br>";
        
         
        }
        if($sta=='Shipment - Delivered')
        {
            $my='Delivered';
            //status update database
            $las="UPDATE `Order`` Set Status='$my',Shipping_Status='$my' WHERE Tracking='$tracking'";
            $relt1 = mysqli_query($mysql, $las);
            echo $my." - ".$tracking;
            echo "<br>";
        
        
        }

    
    
}







?>
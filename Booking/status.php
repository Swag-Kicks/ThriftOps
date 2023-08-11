<?php

session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);

// if (isset($_SESSION['id']) && $_SESSION['id'] == true) {
    
// }
// else {
   
//     echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';

// };




if(isset($_POST['id']))
{
    $id=$_POST['id'];
    $sql = "SELECT *,GROUP_CONCAT(SKU) as con FROM `Order` WHERE Order_ID='$id' GROUP BY Order_Number";
    $result = mysqli_query($mysql, $sql);
    $row = mysqli_fetch_assoc($result);
    
    $courier=$row['Courier'];
    $tracking=$row['Tracking'];
    $C_Date = date('Y-m-d/h:i:a');
    
    
    if($courier=='Leopard')
    {
        $sql1="Select * from `API_Credentials` Where Platform='Leopard'";
        $leo = mysqli_query($mysql, $sql1);
        $row = mysqli_fetch_assoc($leo);
        $apikey=$row['API_Key'];
        $apipass=$row['API_Pass']; 
        
       $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, 'http://new.leopardscod.com/webservice/trackBookedPacket/format/json/');  // Write here Production Link
        curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, json_encode(array(
            "api_key" => "$apikey",
            "api_password" =>"$apipass",
            "track_numbers" => "$tracking"
            /* 'track_numbers' => 'KI191029456' */                      // E.g. array('Order Id') OR  array('Order Id-1', 'Order Id-2', 'Order Id-3')
        )));
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        $buffer = curl_exec($curl_handle);
        $buffer= json_decode($buffer,true);
        curl_close($curl_handle);

        $sta=$buffer['packet_list'][0]['booked_packet_status'];
        if($sta=='Assign to Courier' || $sta=='Arrived at Station')
        {
            $my='Intransit'; 
            //status update database
            $las="UPDATE `Order` SET Shipping_Status='$my' WHERE Order_ID='$id'";
            $relt1 = mysqli_query($mysql, $las);
        
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$id', 'Fetch','$sta','$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
        
            if(isset($result1))
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }
        if($sta=='Pending' || $sta=='Consignment Booked')
        {
            $my='Pending';
            //status update database
            $las="UPDATE `Order` SET Shipping_Status='$my' WHERE Order_ID='$id'";
            $relt1 = mysqli_query($mysql, $las);
        
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$id', 'Fetch','$sta','$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
        
            if(isset($result1))
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }
        
        if($sta=='Returned to shipper' || $sta=='Being Return' || $sta=='Ready for Return')
        {
            $my='Returned';
            //status update database
            $las="UPDATE `Order` SET Shipping_Status='$my' WHERE Order_ID='$id'";
            $relt1 = mysqli_query($mysql, $las);
        
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$id', 'Fetch','$sta','$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
        
            if(isset($result1))
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }
        if($sta=='Delivered')
        {
            $my='Delivered';
            //status update database
            $las="UPDATE `Order` SET Shipping_Status='$my' WHERE Order_ID='$id'";
            $relt1 = mysqli_query($mysql, $las);
        
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$id', 'Fetch','$sta','$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
        
            if(isset($result1))
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }
        


    }
    if($courier=='Trax')
    {
        $sql1="Select * from `API_Credentials` Where Platform='Trax'";
        $leo = mysqli_query($mysql, $sql1);
        $row = mysqli_fetch_assoc($leo);
        $apipass=$row['API_Pass'];
        $Date=date('Y-m-d');
        
        $curl_handle = curl_init();
        curl_setopt($curl_handle,CURLOPT_URL,'https://sonic.pk/api/shipment/status');
        curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl_handle,CURLOPT_ENCODING,'');
        curl_setopt($curl_handle,CURLOPT_MAXREDIRS,10);
        curl_setopt($curl_handle,CURLOPT_TIMEOUT,0);
        curl_setopt($curl_handle,CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($curl_handle,CURLOPT_HTTPHEADER,array("Authorization: $apipass",'Content-Type: application/json'));
        curl_setopt($curl_handle,CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($curl_handle,CURLOPT_POSTFIELDS,json_encode(array(
            
            "tracking_number" => $tracking,
            "type" => 1
        
        )));
        
        $response = curl_exec($curl_handle);
        curl_close($curl_handle);
        //print_r($response);
        $jso =json_decode($response,true);
        // print_r($jso);
        // echo "<br>";
        $sta=$jso['current_status'];
        
        if($sta=='Shipment - In Transit')
        {
            $my='Intransit'; 
            //status update database
            $las="UPDATE `Order` SET Shipping_Status='$my' WHERE Order_ID='$id'";
            $relt1 = mysqli_query($mysql, $las);
        
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$id', 'Fetch','$sta','$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
        
            if(isset($result1))
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }
        
        if($sta=='Return - Delivered to Shipper' || $sta=='Return - Dispatched' || $sta=='Return - Arrived at Origin' || $sta=='Return - In Transit' || $sta=='Return - Confirm' || $sta=='Return - Not Attempted' || $sta=='Replacement - Delivered to Shipper')
        {
            $my='Returned';
            //status update database
            $las="UPDATE `Order` SET Shipping_Status='$my' WHERE Order_ID='$id'";
            $relt1 = mysqli_query($mysql, $las);
        
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$id', 'Fetch','$sta','$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
        
            if(isset($result1))
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }
        if($sta=='Shipment - Delivered')
        {
            $my='Delivered';
            //status update database
            $las="UPDATE `Order` SET Shipping_Status='$my' WHERE Order_ID='$id'";
            $relt1 = mysqli_query($mysql, $las);
        
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$id', 'Fetch','$sta','$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
        
            if(isset($result1))
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }
        
        
    }
    if($courier=='Rider')
    {
        $sql1="Select * from `API_Credentials` Where Platform='Rider'";
        $leo = mysqli_query($mysql, $sql1);
        $row = mysqli_fetch_assoc($leo);
        $apikey=$row['API_Key'];
        $apipass=$row['API_Pass'];

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.withrider.com/rider/v1/GetOrderStatus?cn=$tracking&loginId=$apikey&apikey=$apipass",
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
        //print_r($response);
        $jso =json_decode($response,true);
        $sta=$jso['order_status'];
        
        
        if($sta=='Rider on its way')
        {
            $my='Intransit'; 
            //status update database
            $las="UPDATE `Order` SET Shipping_Status='$my' WHERE Order_ID='$id'";
            $relt1 = mysqli_query($mysql, $las);
        
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$id', 'Fetch','$sta','$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
        
            if(isset($result1))
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }
        if($sta=='Call a Rider')
        {
            $my='Pending';
            //status update database
            $las="UPDATE `Order` SET Shipping_Status='$my' WHERE Order_ID='$id'";
            $relt1 = mysqli_query($mysql, $las);
        
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$id', 'Fetch','$sta','$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
        
            if(isset($result1))
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }
        
        if($sta=='Returned' || $sta=='Return In Transit' || $sta=='Awaiting Return')
        {
            $my='Returned';
            //status update database
            $las="UPDATE `Order` SET Shipping_Status='$my' WHERE Order_ID='$id'";
            $relt1 = mysqli_query($mysql, $las);
        
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$id', 'Fetch','$sta','$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
        
            if(isset($result1))
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }
        if($sta=='Delivered')
        {
            $my='Delivered';
            //status update database
            $las="UPDATE `Order` SET Shipping_Status='$my' WHERE Order_ID='$id'";
            $relt1 = mysqli_query($mysql, $las);
        
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$id', 'Fetch','$sta','$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
        
            if(isset($result1))
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }
        if($sta=='Cancelled')
        {
            $my='Canceled';
            //status update database
            $las="UPDATE `Order` SET Shipping_Status='$my' WHERE Order_ID='$id'";
            $relt1 = mysqli_query($mysql, $las);
        
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$id', 'Fetch','$sta','$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
        
            if(isset($result1))
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }
        
        
    }
    if($courier=='PostEx')
    {
        $sql1="Select * from `API_Credentials` Where Platform='PostEx'";
        $leo = mysqli_query($mysql, $sql1);
        $row = mysqli_fetch_assoc($leo);
        $apipass=$row['API_Pass'];
        
        $curl_handle = curl_init();
        curl_setopt($curl_handle,CURLOPT_URL,'https://api.postex.pk/services/integration/api/order/v1/track-bulk-order?TrackingNumbers='.$tracking);
        curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl_handle,CURLOPT_ENCODING ,'');
        curl_setopt($curl_handle,CURLOPT_MAXREDIRS,10);
        curl_setopt($curl_handle,CURLOPT_TIMEOUT,0);
        curl_setopt($curl_handle,CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($curl_handle,CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($curl_handle,CURLOPT_HTTPHEADER,array("Token: $apipass"));
        
        $response = curl_exec($curl_handle);
        $response= json_decode($response,true);
        curl_close($curl_handle);
        $sta=$response['dist'][0]['trackingResponse']['transactionStatus'];
        
        if($sta=='Out For Delivery' || $sta=='En-Route to Lahore warehouse' || $sta=='En-Route to Karachi warehouse' ||$sta=='Delivery Under Review' || $sta=='Attempted')
        {
            $my='Intransit'; 
            //status update database
            $las="UPDATE `Order` SET Shipping_Status='$my' WHERE Order_ID='$id'";
            $relt1 = mysqli_query($mysql, $las);
        
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$id', 'Fetch','$sta','$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
        
            if(isset($result1))
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }
        if($sta=='Un-Assigned By Me' || $sta=='Unbooked')
        {
            $my='Pending';
            //status update database
            $las="UPDATE `Order` SET Shipping_Status='$my' WHERE Order_ID='$id'";
            $relt1 = mysqli_query($mysql, $las);
        
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$id', 'Fetch','$sta','$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
        
            if(isset($result1))
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }
        
        if($sta=='Return Requested' || $sta=='Returned' || $sta=='Out For Return' || $sta=='Out For Return')
        {
            $my='Returned';
            //status update database
            $las="UPDATE `Order` SET Shipping_Status='$my' WHERE Order_ID='$id'";
            $relt1 = mysqli_query($mysql, $las);
        
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$id', 'Fetch','$sta','$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
        
            if(isset($result1))
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }
        if($sta=='Delivered')
        {
            $my='Delivered';
            //status update database
            $las="UPDATE `Order` SET Shipping_Status='$my' WHERE Order_ID='$id'";
            $relt1 = mysqli_query($mysql, $las);
        
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$id', 'Fetch','$sta','$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
        
            if(isset($result1))
            {
                echo "1";
            }
            else
            {
                echo "0";
            }
        }
        
        
    }
    if($courier=='CallCourier')
    {
        echo "0";
    }

}
?>
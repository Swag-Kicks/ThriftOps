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
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://new.leopardscod.com/webservice/cancelBookedPackets/format/json/',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "api_key" : "'.$apikey.'",
            "api_password" :"'.$apipass.'",
            "cn_numbers" : "'.$tracking.'"
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $resonse;
        // //status update database
        $las="UPDATE `Order` SET Tracking='',Courier='',Status='Confirmed' WHERE Order_ID='$id'";
        $relt1 = mysqli_query($mysql, $las);
        
        //logs
        $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$id', 'Booking_Canceled', '$C_Date')";
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
    if($courier=='Trax')
    {
        $sql1="Select * from `API_Credentials` Where Platform='Trax'";
        $leo = mysqli_query($mysql, $sql1);
        $row = mysqli_fetch_assoc($leo);
        $apipass=$row['API_Pass'];
        $Date=date('Y-m-d');
        
        $curl_handle = curl_init();
        
        curl_setopt($curl_handle,CURLOPT_URL,'https://sonic.pk/api/shipment/cancel');
        curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl_handle,CURLOPT_ENCODING,'');
        curl_setopt($curl_handle,CURLOPT_MAXREDIRS,10);
        curl_setopt($curl_handle,CURLOPT_TIMEOUT,0);
        curl_setopt($curl_handle,CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($curl_handle,CURLOPT_HTTPHEADER,array("Authorization: $apipass",'Content-Type: application/json'));
        curl_setopt($curl_handle,CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($curl_handle,CURLOPT_POSTFIELDS,json_encode(array(
            "tracking_number" => $tracking, 
        )));
        
        $response = curl_exec($curl_handle);
    
        curl_close($curl_handle);
        //print_r($response);
        $jso =json_decode($response,true);
        
        //status update database
        $las="UPDATE `Order` SET Tracking='',Courier='',Status='Confirmed' WHERE Order_ID='$id'";
        $relt1 = mysqli_query($mysql, $las);
        
        //logs
        $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$id', 'Booking_Canceled', '$C_Date')";
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
    if($courier=='Rider')
    {
        $sql1="Select * from `API_Credentials` Where Platform='Rider'";
        $leo = mysqli_query($mysql, $sql1);
        $row = mysqli_fetch_assoc($leo);
        $apikey=$row['API_Key'];
        $apipass=$row['API_Pass'];

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.withrider.com/rider/v1/CancelBooking?CNNo=$tracking&Loginid=$apikey&APIKEY=$apipass",
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
        
        //status update database
        $las="UPDATE `Order` SET Tracking='',Courier='',Status='Confirmed' WHERE Order_ID='$id'";
        $relt1 = mysqli_query($mysql, $las);
        
        //logs
        $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$id', 'Booking_Canceled', '$C_Date')";
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
    if($courier=='PostEx')
    {
        $sql1="Select * from `API_Credentials` Where Platform='PostEx'";
        $leo = mysqli_query($mysql, $sql1);
        $row = mysqli_fetch_assoc($leo);
        $apipass=$row['API_Pass'];
        
        //postex api book
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api-services.postex.pk/api/order/v1/cancel-order',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'PUT',
          CURLOPT_POSTFIELDS =>'{
            "trackingNumber" : "'.$tracking.'"
        }',
          CURLOPT_HTTPHEADER => array(
            "token: $token",
            'Content-Type: application/json'
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        //echo $response;
        
        //status update database
        $las="UPDATE `Order` SET Tracking='',Courier='',Status='Confirmed' WHERE Order_ID='$id'";
        $relt1 = mysqli_query($mysql, $las);
        
        //logs
        $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$id', 'Booking_Canceled', '$C_Date')";
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
    if($courier=='CallCourier')
    {
        echo "0";
    }
    if($courier=='Self')
    {

        //status update database
        $las="UPDATE `Order` SET Tracking='',Courier='',Status='Confirmed' WHERE Order_ID='$id'";
        $relt1 = mysqli_query($mysql, $las);
        
        //logs
        $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$id', 'Booking_Canceled', '$C_Date')";
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
    //tcs mashood
    if($courier=='Tcs')
    {
        $sql1="Select * from `API_Credentials` Where Platform='Tcs'";
        $leo = mysqli_query($mysql, $sql1);
        $row = mysqli_fetch_assoc($leo);
        $apipass=$row['API_Pass'];
        
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.tcscourier.com/production/v1/cod/cancel-order',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'PUT',
          CURLOPT_POSTFIELDS =>'{
            "userName": "swag-tcs",
            "password": "swag123@",
            "consignmentNumber": "'.$tracking.'" 
        }',
          CURLOPT_HTTPHEADER => array(
            "X-IBM-Client-Id: $apipass",
            "Content-Type: application/json"
          ),
        ));
        
        $response = curl_exec($curl);
        curl_close($curl);
        //echo $response;
        
        //status update database
        $las="UPDATE `Order` SET Tracking='',Courier='',Status='Confirmed' WHERE Order_ID='$id'";
        $relt1 = mysqli_query($mysql, $las);
        
        //logs
        $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$id', 'Booking_Canceled', '$C_Date')";
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
?>
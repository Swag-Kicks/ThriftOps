<?php
session_start();
 include_once("../include/mysql_connection.php");
error_reporting(0);
if(isset($_GET['Brand']) && isset($_GET['Size']) && isset($_GET['Cond']) && isset($_GET['SKU']) )
{

    //Values
    $brand = $_GET['Brand'];
    // $premium = $_GET['Premium'];
    $size = (int)$_GET['Size'];
    $cond = $_GET['Cond'];
    $sku = $_GET['SKU'];
    $type = $_GET['Type'];
    
    $query = "SELECT item_received.Unit_Price/item_received.Quantity as cost FROM sku inner join item_received on sku.GRN_ID=item_received.GRN_ID Where sku.SKU='".$sku."'";
    $result = mysqli_query($mysql, $query);
    $row = mysqli_fetch_assoc($result);
    $temp=$row['cost'];
    //Requester
    $curl = curl_init();
    $URL ="http://node.thriftops.com/predict?Brand=$brand&Premium=$type&Size=$size&Cond=$cond&DTS=25";
    curl_setopt_array($curl, array(
      CURLOPT_URL => $URL,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
    ));
    
    //Response
    $response = curl_exec($curl);
    $result=$response;
    
    $ip=explode(",",$result);
    $predict=(int)$ip[1];
    
    $percent=(int)$temp/100*20;
    $cost=(int)($temp+$percent);
    
    if($predict > $cost)
    {
        echo $predict;
    }
    else
    {
        echo "Suggested price is wrong";
    }

}
else
{
    echo "Please Enter Brand,Size,Condition";
}

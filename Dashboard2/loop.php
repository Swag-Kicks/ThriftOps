<?php


include_once("../include/mysql_connection.php"); 
error_reporting(0);
date_default_timezone_set("Asia/Karachi");


// $sql = "SELECT * FROM data_test";
// $result = mysqli_query($mysql, $sql);
// while($row = mysqli_fetch_array($result)) 
// {
    
    // $ph=$row['phone'];
    // $pho='0'.$ph;
    // echo $pho;
    // echo '<br>';
    // $url="http://192.168.18.56:8090/SendSMS?username=Sadiq&password=1234&phone=03171162129&message=$message";
    
    try
    {
        $message="testpurpose";
        $phoneNumber='03171162129';
    	if($message !=null && $phoneNumber !=null)
    	{
        		$url = "http://192.168.18.56:8090/SendSMS?username=Sadiq&password=1234&phone=".$phoneNumber."&message=".urlencode($message);
        		$curl = curl_init($url);
        		curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
        		$curl_response = curl_exec($curl);
    
        		if($curl_response === false)
        		{
        			$info = curl_getinfo($curl);
        			curl_close($curl);
        			die('Error occurred'.var_export($info));
        		}
    
    		    curl_close($curl);
    
    		    $response  = json_decode($curl_response);
        		if($response->status == 200)
        		{
        			echo 'Message has been sent';
        		}
        		else
        		{
        			'Technical Problem';
        		}

	       }
    }
    catch(Exception $ex)
    {
        echo "Exception: ".$ex;
    }
    
    // $curl = curl_init();
    // curl_setopt($curl,CURLOPT_URL, $url);
    // curl_setopt($curl, CURLOPT_RETURNTRANSFER , true);
    // curl_setopt($curl, CURLOPT_ENCODING , '');
    // curl_setopt($curl,CURLOPT_MAXREDIRS , 10);
    // curl_setopt($curl, CURLOPT_TIMEOUT , 0);
    // curl_setopt($curl, CURLOPT_FOLLOWLOCATION , true);
    // curl_setopt($curl, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1);
    // curl_setopt($curl,CURLOPT_CUSTOMREQUEST , 'POST');
    // $response = curl_exec($curl);
    
    // curl_close($curl);
    // print_r($response);
    // echo '<br>';
    // $delay = "1";
    // echo '<meta http-equiv="refresh" content="'.$delay.';url='.$url.'">';
    
// }


















?>
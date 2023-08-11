<?php
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);
   


if(!empty($_POST["ven"]) && !empty($_POST["taxelement"]) && !empty($_POST["pr"]) && !empty(array_filter($_POST["price"])))
{
  $PR=$_POST["pr"];
  $req=date('Y-m-d');
  $User_ID=$_SESSION['id'];
  $ven=$_POST["ven"];
  $tax=$_POST["taxelement"];
  $Datetime=date('Y-m-d/h:i:a');
  $sql11 = "SELECT * FROM PO order by PO_ID desc limit 1";
  $result11 = mysqli_query($mysql, $sql11);
  $row =mysqli_fetch_array($result11);
   
  $last_id=$row['PO_ID'];
  //echo $last_id;
  if ($last_id == " ") 
  {
    $PO_ID = "1";
  }
  else
  {
    $PO_ID = substr($last_id,0);
    $PO_ID = intval($PO_ID);
    $PO_ID = $PO_ID+1;
  }
    $sql = "INSERT INTO PO (PO_ID,PR_ID,Vendor_ID,Tax_Applied,Created) VALUES ('$PO_ID', '$PR', '".$ven."', '".$tax."','False')";
    $result = mysqli_query($mysql, $sql);
    
    $log = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$User_ID', 'PO', '$PO_ID', 'Created', '$Datetime')";
    $lgresult = mysqli_query($mysql, $log);
      
    if(isset($result))
    {
        $sql1 = "UPDATE PR SET Created = 'True' WHERE PR_ID='".$PR."'";
        $result1 = mysqli_query($mysql, $sql1);
        if(isset($result1))
        {
            for ($i=0; $i < count($_POST['price']); $i++) 
            { 
            
                $price=$_POST["price"][$i];
                $itid=$_POST["itemid"][$i];
                $insert ="UPDATE Items SET Unit_Price='$price',PO_ID='".$PO_ID."' WHERE id='".$itid."'";
                $que = mysqli_query($mysql, $insert);
            }
        }
    }
    else
    {
       echo "0";
    }
    
 //MAILER API'S
    
    
$postData = [ "pid" => $PO_ID,
            "user" => $User_ID,
            "depart" => "Product Tech"

];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://node.thriftops.com/createPO',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => json_encode($postData),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
     echo "3";
     
}
else
{
    echo "0";
}
                
                
        
?>
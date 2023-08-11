<?php 

session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$C_Date = date('Y-m-d/h:i:a');

$cr=$_SESSION['Username'];
if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
{
    $pr="Select * from Users Where Dept_ID=2 AND Username='$cr' OR Dept_ID=3 AND Username='$cr'";
    $resu2 = mysqli_query($mysql, $pr);
    $rowq1 =mysqli_fetch_array($resu2);
    $dept=$rowq1['Dept_ID'];
    //echo $dept;
    if($dept=='')
    {
        echo '<script>alert("Your Are Not Authorized !");window.location.href="../Dashboard/Home.php";</script>';
    }   
}
else {
   
    echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';

}

$ID=$_POST["id2"];
//$ID="4392938700986";
//$query="Select * from orders where order_id='$ID'";
//$result6 = mysqli_query($mysql, $query);
//$row1 = mysqli_fetch_assoc($result6); 
//$order = $row1['id'];

$status="Booked";
$user=$_SESSION['Username'];


if(isset($_POST['canc_tag']))
{

    $pr=$_POST['canc_tag'];
    
    $orders_array = array(
            "order" => array(
                "id" => $ID,
                "note" => $pr,
                "tags" => $status
                )
    );
 
    $API_KEY = '6f9c9e67fe431b576ec23b9c3ea59067';
    $PASSWORD = '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';
    $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
    $SHOPIFY_API = "https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/orders/".$ID.".json";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $SHOPIFY_API);
    $headers = array(
        "Authorization: Basic ".base64_encode("$API_KEY:$PASSWORD"),
        "Content-Type: application/json",
        "charset: utf-8"
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER,$headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_VERBOSE, 0);
    curl_setopt($curl, CURLOPT_HEADER, 1);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($orders_array));
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    
    $response = curl_exec ($curl);
    
    
    
    
    $insert ="UPDATE orders SET Status='$status',Booked_By='$user',Booked_By_Time='$C_Date' WHERE order_id='$ID'"; 
    $que = mysqli_query($mysql, $insert);

    if (!$que) {
        return 'Status Not Updated';
    }
    else
    {
        return 'Status Updated';
    }
    
    
}


?>
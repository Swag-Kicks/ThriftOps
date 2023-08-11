<?php

session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);
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
else 
{
    echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
   
}

$id=$_GET['id'];
$order=$_GET['order'];

$sql= "Select * FROM orders WHERE Items='$id'and order_id='$order'";
$result = mysqli_query($mysql, $sql);
$row = mysqli_fetch_assoc($result);
$price=$row["Total_Amount"];

$it=$row["Items_Price"];


$tot=$price-$it;


$sql2= "DELETE * FROM orders WHERE Items='$id' and order_id='$order'";
$result1 = mysqli_query($mysql, $sql2);


$sk=$id;
$ord=$order;
$num = substr($sk,0,5);
$ss=substr($sk,0,4);
$w=substr($sk,0,3);

if(substr($sk,0,4)=='WP-S' || substr($sk,0,4)=='SK-S' || substr($sk,0,4)=='wp-S' || substr($sk,0,3)=='SK-' || substr($sk,0,3)=='WP-')
{
    $image = "SELECT * FROM shoes WHERE SKU='$sk'";
    $res_img = mysqli_query($mysql, $image);
    $ro1 =mysqli_fetch_array($res_img);
    $prod=$ro1['Shopify_ID'];
    if(isset($prod))
    {
        $API_KEY = '6f9c9e67fe431b576ec23b9c3ea59067';
        $PASSWORD = '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';
        $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
         
         
        //product item id
        $ch = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        $result = curl_exec($ch);
        $result=json_decode($result,true);
        $id_v=$result["product"]["variants"][0]["inventory_item_id"];
         
        //quantity
        $ch1 = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/inventory_levels/adjust.json");
        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($ch1, CURLOPT_POST, 1);
        curl_setopt($ch1, CURLOPT_POSTFIELDS, array("location_id"=> 63487475898,"inventory_item_id"=> $id_v,"available_adjustment"=> 1));
        curl_setopt($ch1, CURLOPT_HTTPHEADER ,'Content-Type: application/json');
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        $result1 = curl_exec($ch1);
        $result1=json_decode($result1,true);
           
        //active-draft
        $curl = curl_init();
        $ul="https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json";
        curl_setopt_array($curl, array(
            CURLOPT_URL => $ul,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>' {
                "product": 
                {
                    "status": "active",
                    "tags":"adjusted".","."'.$ord.'"
                }
             }',
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
              ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
     
            
        }
 
    }
    
    else if($num=='SK-TP')
    {
        $image = "SELECT * FROM TOPS WHERE SKU='$sk'";
        $res_img = mysqli_query($mysql, $image);
        $ro1 =mysqli_fetch_array($res_img);
        $prod=$ro1['Shopify_ID'];
        if(isset($prod))
    {
        $API_KEY = '6f9c9e67fe431b576ec23b9c3ea59067';
        $PASSWORD = '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';
        $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
         
         
        //product item id
        $ch = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        $result = curl_exec($ch);
        $result=json_decode($result,true);
        $id_v=$result["product"]["variants"][0]["inventory_item_id"];
         
        //quantity
        $ch1 = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/inventory_levels/adjust.json");
        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($ch1, CURLOPT_POST, 1);
        curl_setopt($ch1, CURLOPT_POSTFIELDS, array("location_id"=> 63487475898,"inventory_item_id"=> $id_v,"available_adjustment"=> 1));
        curl_setopt($ch1, CURLOPT_HTTPHEADER ,'Content-Type: application/json');
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        $result1 = curl_exec($ch1);
        $result1=json_decode($result1,true);
           
        //active-draft
        $curl = curl_init();
        $ul="https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json";
        curl_setopt_array($curl, array(
            CURLOPT_URL => $ul,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>' {
                "product": 
                {
                    "status": "active",
                    "tags":"adjusted".","."'.$ord.'"
                }
             }',
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
              ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            
        }
    }
                                          
                                          
    else if($ss=='SK-H')
    {
        $image = "SELECT * FROM Hoodies WHERE SKU='$sk'";
        $res_img = mysqli_query($mysql, $image);
        $ro1 =mysqli_fetch_array($res_img);
        $prod=$ro1['Shopify_ID'];
        if(isset($prod))
    {
        $API_KEY = '6f9c9e67fe431b576ec23b9c3ea59067';
        $PASSWORD = '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';
        $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
         
         
        //product item id
        $ch = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        $result = curl_exec($ch);
        $result=json_decode($result,true);
        $id_v=$result["product"]["variants"][0]["inventory_item_id"];
         
        //quantity
        $ch1 = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/inventory_levels/adjust.json");
        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($ch1, CURLOPT_POST, 1);
        curl_setopt($ch1, CURLOPT_POSTFIELDS, array("location_id"=> 63487475898,"inventory_item_id"=> $id_v,"available_adjustment"=> 1));
        curl_setopt($ch1, CURLOPT_HTTPHEADER ,'Content-Type: application/json');
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        $result1 = curl_exec($ch1);
        $result1=json_decode($result1,true);
           
        //active-draft
        $curl = curl_init();
        $ul="https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json";
        curl_setopt_array($curl, array(
            CURLOPT_URL => $ul,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>' {
                "product": 
                {
                    "status": "active",
                    "tags":"adjusted".","."'.$ord.'"
                }
             }',
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
              ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            
    
        }
    }
                                           
    if($ss=='SK-C')
    {
        $image = "SELECT * FROM caps WHERE SKU='$sk'";
        $res_img = mysqli_query($mysql, $image);
        $ro1 =mysqli_fetch_array($res_img);
        $prod=$ro1['Shopify_ID'];
        if(isset($prod))
    {
        $API_KEY = '6f9c9e67fe431b576ec23b9c3ea59067';
        $PASSWORD = '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';
        $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
         
         
        //product item id
        $ch = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        $result = curl_exec($ch);
        $result=json_decode($result,true);
        $id_v=$result["product"]["variants"][0]["inventory_item_id"];
         
        //quantity
        $ch1 = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/inventory_levels/adjust.json");
        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($ch1, CURLOPT_POST, 1);
        curl_setopt($ch1, CURLOPT_POSTFIELDS, array("location_id"=> 63487475898,"inventory_item_id"=> $id_v,"available_adjustment"=> 1));
        curl_setopt($ch1, CURLOPT_HTTPHEADER ,'Content-Type: application/json');
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        $result1 = curl_exec($ch1);
        $result1=json_decode($result1,true);
           
        //active-draft
        $curl = curl_init();
        $ul="https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json";
        curl_setopt_array($curl, array(
            CURLOPT_URL => $ul,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>' {
                "product": 
                {
                    "status": "active",
                    "tags":"adjusted".","."'.$ord.'"
                }
             }',
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
              ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);

        }
    }
                                           
    else if($num=='SK-CL')
    {
        $image = "SELECT * FROM Cleaning kits WHERE SKU='$sk'";
        $res_img = mysqli_query($mysql, $image);
        $ro1 =mysqli_fetch_array($res_img);
        $prod=$ro1['Shopify_ID'];
        if(isset($prod))
    {
        $API_KEY = '6f9c9e67fe431b576ec23b9c3ea59067';
        $PASSWORD = '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';
        $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
         
         
        //product item id
        $ch = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        $result = curl_exec($ch);
        $result=json_decode($result,true);
        $id_v=$result["product"]["variants"][0]["inventory_item_id"];
         
        //quantity
        $ch1 = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/inventory_levels/adjust.json");
        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($ch1, CURLOPT_POST, 1);
        curl_setopt($ch1, CURLOPT_POSTFIELDS, array("location_id"=> 63487475898,"inventory_item_id"=> $id_v,"available_adjustment"=> 1));
        curl_setopt($ch1, CURLOPT_HTTPHEADER ,'Content-Type: application/json');
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        $result1 = curl_exec($ch1);
        $result1=json_decode($result1,true);
           
        //active-draft
        $curl = curl_init();
        $ul="https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json";
        curl_setopt_array($curl, array(
            CURLOPT_URL => $ul,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>' {
                "product": 
                {
                    "status": "active",
                    "tags":"adjusted".","."'.$ord.'"
                }
             }',
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
              ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);

        }
    }
                                           
    else if($ss=='SK-M')
    {
        $image = "SELECT * FROM Mufflers WHERE SKU='$sk'";
        $res_img = mysqli_query($mysql, $image);
        $ro1 =mysqli_fetch_array($res_img);
        $prod=$ro1['Shopify_ID'];
        if(isset($prod))
        {
        $API_KEY = '6f9c9e67fe431b576ec23b9c3ea59067';
        $PASSWORD = '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';
        $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
         
         
        //product item id
        $ch = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        $result = curl_exec($ch);
        $result=json_decode($result,true);
        $id_v=$result["product"]["variants"][0]["inventory_item_id"];
         
        //quantity
        $ch1 = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/inventory_levels/adjust.json");
        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($ch1, CURLOPT_POST, 1);
        curl_setopt($ch1, CURLOPT_POSTFIELDS, array("location_id"=> 63487475898,"inventory_item_id"=> $id_v,"available_adjustment"=> 1));
        curl_setopt($ch1, CURLOPT_HTTPHEADER ,'Content-Type: application/json');
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        $result1 = curl_exec($ch1);
        $result1=json_decode($result1,true);
           
        //active-draft
        $curl = curl_init();
        $ul="https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json";
        curl_setopt_array($curl, array(
            CURLOPT_URL => $ul,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>' {
                "product": 
                {
                    "status": "active",
                    "tags":"adjusted".","."'.$ord.'"
                }
             }',
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
              ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);

        }
    }
    
    else if($num=='SK-SC')
    {
        $image = "SELECT * FROM Socks WHERE SKU='$sk'";
        $res_img = mysqli_query($mysql, $image);
        $ro1 =mysqli_fetch_array($res_img);
        $prod=$ro1['Shopify_ID'];
        if(isset($prod))
    {
        $API_KEY = '6f9c9e67fe431b576ec23b9c3ea59067';
        $PASSWORD = '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';
        $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
         
         
        //product item id
        $ch = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        $result = curl_exec($ch);
        $result=json_decode($result,true);
        $id_v=$result["product"]["variants"][0]["inventory_item_id"];
         
        //quantity
        $ch1 = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/inventory_levels/adjust.json");
        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($ch1, CURLOPT_POST, 1);
        curl_setopt($ch1, CURLOPT_POSTFIELDS, array("location_id"=> 63487475898,"inventory_item_id"=> $id_v,"available_adjustment"=> 1));
        curl_setopt($ch1, CURLOPT_HTTPHEADER ,'Content-Type: application/json');
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        $result1 = curl_exec($ch1);
        $result1=json_decode($result1,true);
           
        //active-draft
        $curl = curl_init();
        $ul="https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json";
        curl_setopt_array($curl, array(
            CURLOPT_URL => $ul,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>' {
                "product": 
                {
                    "status": "active",
                    "tags":"adjusted".","."'.$ord.'"
                }
             }',
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
              ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);

        }
    }
                                           
                                           
    else if($tri=='SK-SHO')
    {
        $image = "SELECT * FROM shorts WHERE SKU='$sk'";
        $res_img = mysqli_query($mysql, $image);
        $ro1 =mysqli_fetch_array($res_img);
        $prod=$ro1['Shopify_ID'];
        if(isset($prod))
    {
        $API_KEY = '6f9c9e67fe431b576ec23b9c3ea59067';
        $PASSWORD = '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';
        $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
         
         
        //product item id
        $ch = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        $result = curl_exec($ch);
        $result=json_decode($result,true);
        $id_v=$result["product"]["variants"][0]["inventory_item_id"];
         
        //quantity
        $ch1 = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/inventory_levels/adjust.json");
        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($ch1, CURLOPT_POST, 1);
        curl_setopt($ch1, CURLOPT_POSTFIELDS, array("location_id"=> 63487475898,"inventory_item_id"=> $id_v,"available_adjustment"=> 1));
        curl_setopt($ch1, CURLOPT_HTTPHEADER ,'Content-Type: application/json');
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        $result1 = curl_exec($ch1);
        $result1=json_decode($result1,true);
           
        //active-draft
        $curl = curl_init();
        $ul="https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json";
        curl_setopt_array($curl, array(
            CURLOPT_URL => $ul,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>' {
                "product": 
                {
                    "status": "active",
                    "tags":"adjusted".","."'.$ord.'"
                }
             }',
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
              ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
        }
    }
                                           
    else if($num=='SK-TS')
    {
        $image = "SELECT * FROM tshirts WHERE SKU='$sk'";
        $res_img = mysqli_query($mysql, $image);
        $ro1 =mysqli_fetch_array($res_img);
        $prod=$ro1['Shopify_ID'];
        if(isset($prod))
    {
        $API_KEY = '6f9c9e67fe431b576ec23b9c3ea59067';
        $PASSWORD = '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';
        $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
         
         
        //product item id
        $ch = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        $result = curl_exec($ch);
        $result=json_decode($result,true);
        $id_v=$result["product"]["variants"][0]["inventory_item_id"];
         
        //quantity
        $ch1 = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/inventory_levels/adjust.json");
        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($ch1, CURLOPT_POST, 1);
        curl_setopt($ch1, CURLOPT_POSTFIELDS, array("location_id"=> 63487475898,"inventory_item_id"=> $id_v,"available_adjustment"=> 1));
        curl_setopt($ch1, CURLOPT_HTTPHEADER ,'Content-Type: application/json');
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        $result1 = curl_exec($ch1);
        $result1=json_decode($result1,true);
           
        //active-draft
        $curl = curl_init();
        $ul="https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json";
        curl_setopt_array($curl, array(
            CURLOPT_URL => $ul,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>' {
                "product": 
                {
                    "status": "active",
                    "tags":"adjusted".","."'.$ord.'"
                }
             }',
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
              ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);

        }
    }
                                           
    else if($num=='SK-SH')
    {
        $image = "SELECT * FROM shirts WHERE SKU='$sk'";
        $res_img = mysqli_query($mysql, $image);
        $ro1 =mysqli_fetch_array($res_img);
        $prod=$ro1['Shopify_ID'];
        if(isset($prod))
    {
        $API_KEY = '6f9c9e67fe431b576ec23b9c3ea59067';
        $PASSWORD = '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';
        $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
         
         
        //product item id
        $ch = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        $result = curl_exec($ch);
        $result=json_decode($result,true);
        $id_v=$result["product"]["variants"][0]["inventory_item_id"];
         
        //quantity
        $ch1 = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/inventory_levels/adjust.json");
        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($ch1, CURLOPT_POST, 1);
        curl_setopt($ch1, CURLOPT_POSTFIELDS, array("location_id"=> 63487475898,"inventory_item_id"=> $id_v,"available_adjustment"=> 1));
        curl_setopt($ch1, CURLOPT_HTTPHEADER ,'Content-Type: application/json');
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        $result1 = curl_exec($ch1);
        $result1=json_decode($result1,true);
           
        //active-draft
        $curl = curl_init();
        $ul="https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json";
        curl_setopt_array($curl, array(
            CURLOPT_URL => $ul,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>' {
                "product": 
                {
                    "status": "active",
                    "tags":"adjusted".","."'.$ord.'"
                }
             }',
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
              ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);

        }
    }
                                           
    else if($num=='SK-SN')
    {
        $image = "SELECT * FROM sandals WHERE SKU='$sk'";
        $res_img = mysqli_query($mysql, $image);
        $ro1 =mysqli_fetch_array($res_img);
        $prod=$ro1['Shopify_ID'];
        if(isset($prod))
    {
        $API_KEY = '6f9c9e67fe431b576ec23b9c3ea59067';
        $PASSWORD = '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';
        $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
         
         
        //product item id
        $ch = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        $result = curl_exec($ch);
        $result=json_decode($result,true);
        $id_v=$result["product"]["variants"][0]["inventory_item_id"];
         
        //quantity
        $ch1 = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/inventory_levels/adjust.json");
        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($ch1, CURLOPT_POST, 1);
        curl_setopt($ch1, CURLOPT_POSTFIELDS, array("location_id"=> 63487475898,"inventory_item_id"=> $id_v,"available_adjustment"=> 1));
        curl_setopt($ch1, CURLOPT_HTTPHEADER ,'Content-Type: application/json');
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        $result1 = curl_exec($ch1);
        $result1=json_decode($result1,true);
           
        //active-draft
        $curl = curl_init();
        $ul="https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json";
        curl_setopt_array($curl, array(
            CURLOPT_URL => $ul,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>' {
                "product": 
                {
                    "status": "active",
                    "tags":"adjusted".","."'.$ord.'"
                }
             }',
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
              ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
    
        }
    }
                                           
    else if($ss=='SK-B')
    {
        $image = "SELECT * FROM Beanies WHERE SKU='$sk'";
        $res_img = mysqli_query($mysql, $image);
        $ro1 =mysqli_fetch_array($res_img);
        $prod=$ro1['Shopify_ID'];
        if(isset($prod))
    {
        $API_KEY = '6f9c9e67fe431b576ec23b9c3ea59067';
        $PASSWORD = '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';
        $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
         
         
        //product item id
        $ch = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        $result = curl_exec($ch);
        $result=json_decode($result,true);
        $id_v=$result["product"]["variants"][0]["inventory_item_id"];
         
        //quantity
        $ch1 = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/inventory_levels/adjust.json");
        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($ch1, CURLOPT_POST, 1);
        curl_setopt($ch1, CURLOPT_POSTFIELDS, array("location_id"=> 63487475898,"inventory_item_id"=> $id_v,"available_adjustment"=> 1));
        curl_setopt($ch1, CURLOPT_HTTPHEADER ,'Content-Type: application/json');
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        $result1 = curl_exec($ch1);
        $result1=json_decode($result1,true);
           
        //active-draft
        $curl = curl_init();
        $ul="https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json";
        curl_setopt_array($curl, array(
            CURLOPT_URL => $ul,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>' {
                "product": 
                {
                    "status": "active",
                    "tags":"adjusted".","."'.$ord.'"
                }
             }',
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
              ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);

        }
    }
                                           
    else if($num=='SK-BG')
    {
        $image = "SELECT * FROM Bags WHERE SKU='$sk'";
        $res_img = mysqli_query($mysql, $image);
        $ro1 =mysqli_fetch_array($res_img);
        $prod=$ro1['Shopify_ID'];
        if(isset($prod))
    {
        $API_KEY = '6f9c9e67fe431b576ec23b9c3ea59067';
        $PASSWORD = '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';
        $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
         
         
        //product item id
        $ch = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        $result = curl_exec($ch);
        $result=json_decode($result,true);
        $id_v=$result["product"]["variants"][0]["inventory_item_id"];
         
        //quantity
        $ch1 = curl_init("https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/inventory_levels/adjust.json");
        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST,'POST');
        curl_setopt($ch1, CURLOPT_POST, 1);
        curl_setopt($ch1, CURLOPT_POSTFIELDS, array("location_id"=> 63487475898,"inventory_item_id"=> $id_v,"available_adjustment"=> 1));
        curl_setopt($ch1, CURLOPT_HTTPHEADER ,'Content-Type: application/json');
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        $result1 = curl_exec($ch1);
        $result1=json_decode($result1,true);
           
        //active-draft
        $curl = curl_init();
        $ul="https://$API_KEY:$PASSWORD@$SHOP_URL/admin/api/2022-01/products/$prod.json";
        curl_setopt_array($curl, array(
            CURLOPT_URL => $ul,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS =>' {
                "product": 
                {
                    "status": "active",
                    "tags":"adjusted".","."'.$ord.'"
                }
             }',
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
              ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);

        }
    }


if(!$result1)
{
    echo "<script>alert('Error While Delete !.')</script>";
}
else
{
    echo '<script>alert("Delete Successfully");window.location.href="item.php?GETID='.$order.'";</script>';
}



$sql3= "Update orders SET Total_Amount='$tot',Updated_By='$cr',Updated_By_Time='$C_Date' WHERE order_id='$order'";
$result2 = mysqli_query($mysql, $sql3);
if(!$result2)
{
    echo "<script>alert('Error While Updating !.')</script>";
}
else
{
    echo '<script>alert("Updated Successfully");window.location.href="item.php?GETID='.$order.'";</script>';
}





?>
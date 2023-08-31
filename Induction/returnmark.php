<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['id'];




if(isset($_POST["id"]) && isset($_POST["status"]) && isset($_POST["war"]) && isset($_POST["sku"]) )
{
 
     $id=$_POST["id"];
     $war=$_POST["war"];
     $sku=$_POST["sku"];
     $status=$_POST["status"];
     $C_Date = date('Y-m-d/h:i:a');

    if($status=='Recieved')
    {
        $search=mysqli_query($mysql, "Select Shopify_ID,Inventory_Item_ID,Sub_Category_ID from `addition` Where SKU='$sku'");
        $row2 = mysqli_fetch_assoc($search);
        $Shopify=$row2["Shopify_ID"];
        $id_v=$row2["Inventory_Item_ID"];
        $sub=$row2["Sub_Category_ID"];
        
        //check category rack
        $myresult = mysqli_query($mysql, "SELECT id,name FROM `racks` where Warehouse_ID='$war' AND Category='$sub' and SKU = '' LIMIT 1");
        $row12 = mysqli_fetch_assoc($myresult);
        $index=$row12["id"];
        //shopify token
        $sql2="Select * from `API_Credentials` Where Platform='Shopify'";
        $sh = mysqli_query($mysql, $sql2);
        $row121 = mysqli_fetch_assoc($sh);
        $shop_token=$row121['API_Pass'];
        
        
        if($index!='')
        {
            //active-draft
            $curl = curl_init();
            $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
            $ul="https://$SHOP_URL/admin/api/2023-01/products/$Shopify.json";
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
                    "status": "active"
                 }
             }',
              CURLOPT_HTTPHEADER => array(
                    "X-Shopify-Access-Token: $shop_token",
                    'Content-Type: application/json'                                                                                                                                      
              ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            
            //quantity
            $ch1 = curl_init();
            curl_setopt_array($ch1, array(
                CURLOPT_URL => 'https://www-swag-kicks-com.myshopify.com/admin/api/2023-01/inventory_levels/set.json',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                "location_id": 63487475898,
                "inventory_item_id": "'.$id_v.'",
                "available": "1"
                }',
                CURLOPT_HTTPHEADER => array(
                "X-Shopify-Access-Token: $shop_token",
                'Content-Type: application/json'
                ),
                ));
            $response12 = curl_exec($ch1);
            curl_close($ch1);
            
            // update product
            $records = mysqli_query($mysql, "Update `addition` SET Status='active',Quantity='1' WHERE SKU='$sku'");
            
            //insert rack
           
            $query1 = mysqli_query($mysql,"UPDATE `racks` SET SKU='$sku',Status='Filled' where id='$index'");
            
            //update induction
            $query = "UPDATE `Order` SET Inventory_Status='$status' where Order_ID='".$id."' AND SKU='".$sku."'";
            $result=mysqli_query($mysql, $query);
            
            //logs
            $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID, Reference,Status,DateTime) VALUES ('$cr','Induction','$id', '$sku', '$status', '$C_Date')";
            $result1 = mysqli_query($mysql, $sql1);
            
            
            echo '1';
        }
        else
        {
            echo '2';
        }
        
        
    }
    else
    {
        $query = "UPDATE `Order` SET Inventory_Status='$status' where Order_ID='".$id."' AND SKU='".$sku."'";
        $result=mysqli_query($mysql, $query);
            
        $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID, Reference,Status,DateTime) VALUES ('$cr','Induction','$id', '$sku', '$status', '$C_Date')";
        $result1 = mysqli_query($mysql, $sql1);
        echo '1';
    }
    
    
    
 

}
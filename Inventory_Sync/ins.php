<?php
session_start();
include_once("../include/mysql_connection.php");  
error_reporting(0);
date_default_timezone_set("Asia/Karachi"); 




// $DateTime = date('Y-m-d');

// $shoetry = "SELECT * FROM `inventory_sync` where DATE_FORMAT(DateTime, '%Y-%m-%d')='$DateTime' order by id DESC LIMIT 1";
// //$shoetry = "SELECT * FROM `Inventory_Sync` where DateTime Between '$DateTime 00:00:00' AND '$DateTime 23:59:59' order by id DESC LIMIT 1";
// $shoed = mysqli_query($mysql, $shoetry);
// $asr = mysqli_fetch_assoc($shoed);
// $fname = $asr['Name'];



//read the json file contents
$jsondata = file_get_contents('data3.json');
    
//convert json object to php associative array
$data = json_decode($jsondata, true);
$i=0;


$stmt = $dbo->prepare("INSERT INTO `addition` (Title,Shopify_ID,Inventory_Item_ID,Variant_ID,Cndition,Size,Weight,Status,SKU,Price,DateTime,Quantity,Image_1,Image_2,Image_3,Image_4,Image_5) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
try 
{
    //$dbo->beginTransaction();
    foreach ($data as $row)
    {
        $Shopify_ID=$row['Shopify_ID']; 
        $SKU=$row['SKU'];
        echo $i.')'.$SKU;
        //             echo "<br>";
        $sql1 = "SELECT * FROM `addition` where SKU='$SKU'";
        $result1 = mysqli_query($mysql, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $sk = $row1['SKU'];
        if(empty($sk))
        {   
            $stmt->execute($row);
        }

        
    }
    $dbo->commit();
}
catch (Exception $e)
{
    $dbo->rollback();
    throw $e;
}


// foreach($data as $row) 
// {
      
//         $date=$row['DateTime'];
//         $Title=$row['Title'];
//         $Shopify_ID=$row['Shopify_ID'];
//         $Inventory_Item_ID=$row['Inventory_Item_ID'];
//         $Variant_ID=$row['Variant_ID'];
//         $Cndition=$row['Cndition'];
//         $Size=$row['Size'];
//         $Weight=$row['Weight'];
//         $Status=$row['Status'];
//         $SKU=$row['SKU'];
//         $Price=$row['Price'];
//         $Quantity=$row['Quantity'];
//         $Image_1=$row['Image1'];
//         $Image_2=$row['Image2'];
//         $Image_3=$row['Image3'];
//         $Image_4=$row['Image4'];
//         $Image_5=$row['Image5'];
       
//         // $sql = "INSERT INTO `add` (Title,Shopify_ID,Weight,Status,SKU,Barcode,Price,DateTime,Size,Inventory_item_id,Variant_id,Quantity,Image1) VALUES('".$row['Title']."', '".$row['Shopify_ID']."', '".$row['Weight']."', '".$row['Status']."', '".$row['SKU']."', '".$row['Barcode']."', '".$row['Price']."', '".$date."','".$row['Size']."', '".$row['Inventory_item_id']."', '".$row['Variant_id']."','".$row['Quantity']."')";
//         // $sql = "INSERT INTO `add` (Title,Shopify_ID,Weight,Status,SKU,Barcode,Price,DateTime,Size,Inventory_item_id,Variant_id,Quantity,Vendor,Image1,Image2,Image3,Image4,Image5) VALUES('".$row['Title']."', '".$row['Shopify_ID']."', '".$row['Weight']."', '".$row['Status']."', '".$row['SKU']."', '".$row['Barcode']."', '".$row['Price']."', '".$date."','".$row['Size']."', '".$row['Inventory_item_id']."', '".$row['Variant_id']."','".$row['Quantity']."','".$row['Vendor']."','".$row['Image1']."','".$row['Image2']."','".$row['Image3']."','".$row['Image4']."','".$row['Image5']."')";
//         // $rest = mysqli_query($mysql, $sql);
        
//         $i++;
        
//         $sql1 = "SELECT * FROM `addition` where SKU='$SKU'";
//         $result1 = mysqli_query($mysql, $sql1);
//         $row1 = mysqli_fetch_assoc($result1);
//         $sk = $row1['SKU'];
//         if(empty($sk))
//         {   
//             echo $i.')'.$SKU;
//             echo "<br>";

//             // $data = [
//             //     'Title'=>$Title,
//             //     'Shopify_ID'=>$Shopify_ID,
//             //     'Inventory_Item_ID'=>$Inventory_Item_ID,
//             //     'Variant_ID'=>$Variant_ID,
//             //     'Cndition'=>$Cndition,
//             //     'Size'=>$Size,
//             //     'Weight'=>$Weight,
//             //     'Status'=>$Status,
//             //     'SKU'=>$SKU,
//             //     'Price'=>$Price,
//             //     'DateTime'=>$DateTime,
//             //     'Quantity'=>$Quantity,
//             //     'Image_1'=>$Image_1,
//             //     'Image_2'=>$Image_2,
//             //     'Image_3'=>$Image_3,
//             //     'Image_4'=>$Image_4,
//             //     'Image_5'=>$Image_5,
//             // ];
//             // $sql = "INSERT INTO `addition` (Title,Shopify_ID,Inventory_Item_ID,Variant_ID,Cndition,Size,Weight,Status,SKU,Price,DateTime,Quantity,Image_1,Image_2,Image_3,Image_4,Image_5) VALUES (:Title,:Shopify_ID,:Inventory_Item_ID,:Variant_ID,:Cndition,:Size,:Weight,:Status,:SKU,:Price,:DateTime,:Quantity,:Image_1,:Image_2,:Image_3,:Image_4,:Image_5)";
//             // $stmt= $pdo->prepare($dbo);
//             // $stmt->execute($data);
//             // $update = "INSERT INTO `addition` (Title,Shopify_ID,Inventory_Item_ID,Variant_ID,Cndition,Size,Weight,Status,SKU,Price,DateTime,Quantity,Image_1,Image_2,Image_3,Image_4,Image_5) VALUES('".mysql_real_escape_string($item->Title)."', '".mysql_real_escape_string($item->Shopify_ID)."', '".mysql_real_escape_string($item->Inventory_item_id)."', '".mysql_real_escape_string($item->Variant_id)."','".mysql_real_escape_string($item->Cndition)."','".mysql_real_escape_string($item->Size)."','".mysql_real_escape_string($item->Weight)."', '".mysql_real_escape_string($item->Status)."', '".mysql_real_escape_string($item->SKU)."', '".mysql_real_escape_string($item->Price)."', '".$date."', '".mysql_real_escape_string($item->Quantity)."','".mysql_real_escape_string($item->Image1)."','".mysql_real_escape_string($item->Image2)."','".mysql_real_escape_string($item->Image3)."','".mysql_real_escape_string($item->Image4)."','".mysql_real_escape_string($item->Image5)."')";
//             // $asdfg = mysqli_query($mysql, $update);
            
//         }
//         // else if($sk !='')
//         // {
//         //     echo 'already ';
//         //     echo "<br>";
//         //     //$mark="UPDATE `addition` SET Status='".$row['Status']."',Quantity='".$row['Quantity']."',Price='".$row['Price']."' Where Shopify_ID='$pid'";
//         //     //$markr= mysqli_query($mysql, $mark);
//         // }
        
        
        
//     }
    
    
?>
    

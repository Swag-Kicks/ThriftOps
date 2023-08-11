<?php

include_once("../include/mysql_connection.php"); 
error_reporting(0);



$da=date('Y-m-d');

$sql ="SELECT * FROM `addition2` WHERE Updated_At!='$da' order by id DESC LIMIT 500";
$result = mysqli_query($mysql, $sql);

$sql2 ="SELECT count(id)as co FROM `addition2` WHERE Updated_At!='$da'";
$result2= mysqli_query($mysql, $sql2);
$row2 = mysqli_fetch_array($result2);
$countcheck=$row2['co'];

if($countcheck==0)
{
    $trun="TRUCATE Table addition2";
    $truncate= mysqli_query($mysql, $trun);
}
else
{ 
    
     
    while($row = mysqli_fetch_array($result))
    {
        
        $pid=$row['Shopify_ID']; 
        $ven=$row['Vendor'];
        $SKU=$row['SKU'];
        
        
        
        
        
            $sql1 ="SELECT * FROM `addition` WHERE `SKU` LIKE '%$SKU%'";
            $result1 = mysqli_query($mysql, $sql1);
            $row1 = mysqli_fetch_assoc($result1);
            $sk=$row1['SKU'];
            if(!empty($sk))
            {
                $mark="UPDATE `addition` SET Status='".$row1['Status']."',Quantity='".$row1['Quantity']."',Price='".$row1['Price']."' Where Shopify_ID='$pid'";
                $markr= mysqli_query($mysql, $mark); 
                
                $mark1="UPDATE `addition2` SET Updated_At='$da' Where Shopify_ID='$pid'";
                $markr1= mysqli_query($mysql, $mark1); 
                echo $row1['SKU']." update";
                echo "<br>";
                
            }
            else
            {
                
                
                $update = "INSERT INTO `addition` (Title,Shopify_ID,Inventory_Item_ID,Variant_ID,Vendor_ID,Lot_ID,Cndition,Size,Weight,Status,SKU,Price,DateTime,Quantity,Image_1,Image_2,Image_3,Image_4,Image_5) VALUES('".$row['Title']."', '".$row['Shopify_ID']."', '".$row['Inventory_Item_ID']."', '".$row['Variant_ID']."', '".$row['Vendor_ID']."', '".$row['Lot_ID']."','".$row['Cndition']."','".$row['Size']."','".$row['Weight']."', '".$row['Status']."', '".$row['SKU']."', '".$row['Price']."', '".$date."', '".$row['Quantity']."','".$row['Image_1']."','".$row['Image_2']."','".$row['Image_3']."','".$row['Image_4']."','".$row['Image_5']."')";
                $asdfg = mysqli_query($mysql, $update);
                
                $update1="UPDATE `addition2` SET Updated_At='$da' Where Shopify_ID='$pid'";
                $asdfg1= mysqli_query($mysql, $update1); 
                echo  $sk." insert";
                echo "<br>";
               
            }
        
                    
    
    
    }
}
        
            




?>
<?php

include_once("../../include/mysql_connection.php"); 

$FD = $_GET['fd'];
$TD = $_GET['td'];
$sql = "SELECT id,Date,SKU,Picked_by,Order_Number from `Order` Where Status = 'Picked' AND Date > '2023-03-31'";
$result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) 
{
    //order
    
    // id
    $id=$row['id'];
    //date
    $date=$row['Date'];
    // sku
    $sku=$row['SKU'];
    // ordernumber
    $order=$row['Order_Number'];
    // pickedby
    $picked=$ow['Picked_by'];
    
    //addition
    $sql4="Select Image_1,Category_ID from addition Where SKU='$sku'";
    $result2 = mysqli_query($mysql, $sql4);
    $row2 = $result2->fetch_assoc();
    $img=$row2['Image_1'];
    $cat=$row2['Category_ID'];
    
    // image1
    //cateegory
    
     $to_encode[] = array("id"=>$id,"Image_1"=>$img,"SKU"=>$sku,"Order_Number"=>$order,"Picked_by"=>$picked,"Category_ID"=>$cat,"Date"=>$date);

}

echo json_encode($to_encode);
?>

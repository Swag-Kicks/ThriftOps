<?php

include_once("../../include/mysql_connection.php"); 

//  $id = $_GET['id'];
$id=1;
    //  $sql = "SELECT * FROM `racks` INNER JOIN Warehouse on racks.Warehouse_ID=Warehouse.Warehouse_ID where Warehouse.Warehouse_ID = $id ";
$sql = "SELECT * FROM `racks` WHERE Warehouse_ID = '$id' GROUP By number asc";
$result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc()) 
{
    
   
    $catid=$row['Category'];
    $all=$row['Allocation'];
    $date=$row['DateTime'];
    $racknumber=$row['number'];
    
    

    
    
    $confirm1 = "SELECT * FROM `racks` where Warehouse_ID='$id' AND number='$racknumber'";
    $cap=mysqli_num_rows(mysqli_query($mysql, $confirm1));
    
    $confirm2 = "SELECT * FROM `racks` where Warehouse_ID='$id' AND number='$racknumber' AND Status='Empty'";
    $cap1=mysqli_num_rows(mysqli_query($mysql, $confirm2));

    //for capacity
    // $sql2="Select * from racks Where number='$racknumber'";
    // $cap = mysqli_num_rows(mysqli_query($mysql, $sql2));
    
    //for empty space

    
    $sql4="Select * from Category Where Category_ID='$catid'";
    $result2 = mysqli_query($mysql, $sql4);
    $row2 = $result2->fetch_assoc();
    $cat=$row2['Name'];
    
    
    
    if($space==0)
    {
        $stat="Filled";
    }
    else
    {
        $stat="Empty";
    }
    
    //$to_encode[] = $row;
    $to_encode[] = array("Warehouse_ID"=>$id,"number"=>$racknumber,"product_cat"=>$cat,"space"=>$cap1,"cap"=>$cap,"Status"=>$stat,"Allocation"=>$all,"DateTime"=>$date);
}

echo json_encode($to_encode);
?>


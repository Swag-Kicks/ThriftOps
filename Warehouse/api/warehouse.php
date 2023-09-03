<?php
include_once("../../include/mysql_connection.php"); 


     $sql = "SELECT * FROM Warehouse";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
$venames;
while ($row = $result->fetch_assoc())
{
    
    $ven=$row['Vendor'];
    $wid=$row['Warehouse_ID'];
    $confirm = "SELECT * FROM `racks` where Warehouse_ID='$wid' group by number";
    $racks=mysqli_num_rows(mysqli_query($mysql, $confirm));
    
    $confirm1 = "SELECT * FROM `racks` where Warehouse_ID='$wid'";
    $cap=mysqli_num_rows(mysqli_query($mysql, $confirm1));
    
    $confirm2 = "SELECT * FROM `racks` where Warehouse_ID='$wid' AND Status='Empty'";
    $cap1=mysqli_num_rows(mysqli_query($mysql, $confirm2));
    $capacity=$cap1."/".$cap;
    
    //name fetch
    $ip=explode(",",$ven);
    
    // foreach ($ip as $venid) 
    // {
    //     $sql4="Select Name from Vendor Where Vendor_ID='$venid'";
    //     $result2 = mysqli_query($mysql, $sql4);
    //     $row2 = $result2->fetch_assoc();
    //     $cat=$row2['Name'];
    //     $venames.=$cat.',';
      				    
    // }
    
    // $concat=implode(" ",$arr);
      $to_encode[] = array("Warehouse_ID"=>$wid,"Location"=>$row['Location'],"Racks"=>$racks,"Capacity"=>$capacity,"Filled"=>$row['Filled'],"Address"=>$row['Address'],"SK_Format"=>$row['SK_Format'],"DateTime"=>$row['DateTime'],"Allocation"=>$row['Allocation'],"Status"=>$row['Status'],"Vendor"=>$venames);
      $venames='';
}

echo json_encode($to_encode);
?>

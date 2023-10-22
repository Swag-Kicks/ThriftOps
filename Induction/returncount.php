<?php

include_once("../include/mysql_connection.php"); 
error_reporting(0);

$push=array();
if(isset($_POST['from']) && isset($_POST['to']) && isset($_POST['location']))
{
 
    $vend="SELECT Vendor FROM `Warehouse` Where Warehouse_ID='".$_POST['location']."' ";
    $venres=mysqli_query($mysql, $vend);
    $venrow = mysqli_fetch_array($venres);
    $ven=$venrow['Vendor'];
    $ip=explode(",",$ven);
    
    $sk;
    foreach($ip as $map)
    {
        $vend1="SELECT SK_Prefix FROM `Vendor` Where Vendor_ID='$map' ";
        $venres1=mysqli_query($mysql, $vend1);
        $venrow1 = mysqli_fetch_array($venres1);
        $ven1=$venrow1['SK_Prefix'];
        $sk.=$ven1.",";

    }
    $arr = explode(",", $sk);
    $counts = array_count_values($arr);
    $unique = [];
    foreach($counts as $key => $value) {
      if ($value > 1) {
        array_push($unique, $key);
      }
    }
    $new_string = implode(",", $unique);
    $new_string .= "," . implode(",", array_diff($arr, $unique));
    //echo $new_string;
    $que = explode(",", $new_string);
    $inc=0;
    foreach($que as $ma)
    {
        
        if($inc>=1)
        {
            if($ma=='')
            {
                
            }
            else
            {
                $rt.=" AND SKU LIKE '%$ma%'";
            }
        }
        else
        {
            if($ma=='')
            {
                
            }
            else
            {
                $rt="SKU LIKE '%$ma%'";
                $inc++;
            }
        }
        
        
    }
    
    
    
    $from=$_POST['from'];
    $to=$_POST['to'];
    //pending
    $pending = 'SELECT * FROM `Order` where Inventory_Status LIKE "%Pending%" AND Status="Returned" AND '.$rt.' AND DateTime Between "'.$from.' 00:00:00" AND "'.$to.' 23:59:59" ORDER BY id ASC';
    $ptotal=mysqli_num_rows(mysqli_query($mysql, $pending));
    
    //confirmed
    $confirm = 'SELECT * FROM `Order` where Inventory_Status in ("Recieved","Send Back","Not Recieved") AND Status="Returned" AND '.$rt.' AND DateTime Between "'.$from.' 00:00:00" AND "'.$to.' 23:59:59" ORDER BY id ASC';
    $contotal=mysqli_num_rows(mysqli_query($mysql, $confirm));
    
    //total all
     $allord = 'SELECT * FROM `Order` where DateTime Between "'.$from.' 00:00:00" AND "'.$to.' 23:59:59" AND Inventory_Status in ("Pending","Recieved","Send Back","Not Recieved") AND '.$rt.' AND Status="Returned" ORDER BY id ASC';
     $all=mysqli_num_rows(mysqli_query($mysql, $allord));
    //$all=$ptotal+$contotal+$cantotal+$htotal+$retotal;
    
    //array fill
    $push=array(0=>$ptotal,1=>$contotal,2=>$all);
}

if(isset($_POST['location']))
{

    $locat=$_POST['location'];
    $vend="SELECT Vendor FROM `Warehouse` Where Warehouse_ID='$locat' ";
    $venres=mysqli_query($mysql, $vend);
    $venrow = mysqli_fetch_array($venres);
    $ven=$venrow['Vendor'];
    $ip=explode(",",$ven);
    
    $sk;
    foreach($ip as $map)
    {
        $vend1="SELECT SK_Prefix FROM `Vendor` Where Vendor_ID='$map' ";
        $venres1=mysqli_query($mysql, $vend1);
        $venrow1 = mysqli_fetch_array($venres1);
        $ven1=$venrow1['SK_Prefix'];
        $sk.=$ven1.",";

    }
    $arr = explode(",", $sk);
    $counts = array_count_values($arr);
    $unique = [];
    foreach($counts as $key => $value) {
      if ($value > 1) {
        array_push($unique, $key);
      }
    }
    $new_string = implode(",", $unique);
    $new_string .= "," . implode(",", array_diff($arr, $unique));
    //echo $new_string;
    $que = explode(",", $new_string);
    $inc=0;
    foreach($que as $ma)
    {
        
        if($inc>=1)
        {
            if($ma=='')
            {
                
            }
            else
            {
                $rt.=" AND SKU LIKE '%$ma%'";
            }
        }
        else
        {
            if($ma=='')
            {
                
            }
            else
            {
                $rt="SKU LIKE '%$ma%'";
                $inc++;
            }
        }
        
        
    }
    //pending
    $pending = 'SELECT * FROM `Order` where Inventory_Status LIKE "%Pending%"  AND '.$rt.' AND Status="Returned" ORDER BY id ASC';
    //echo $pending;
    $ptotal=mysqli_num_rows(mysqli_query($mysql, $pending));
    
    //confirmed
    $confirm = 'SELECT * FROM `Order` where Inventory_Status in ("Recieved","Send Back","Not Recieved")  AND '.$rt.' AND Status="Returned" ORDER BY id ASC';
    $contotal=mysqli_num_rows(mysqli_query($mysql, $confirm));
    
    //total all
    $allord = 'SELECT * FROM `Order` where Inventory_Status in ("Pending","Recieved","Send Back","Not Recieved") AND '.$rt.' AND Status="Returned" ORDER BY id ASC';
    //echo $allord;
    $all=mysqli_num_rows(mysqli_query($mysql, $allord));
    
    
    //$all=$ptotal+$contotal+$cantotal+$htotal+$retotal;
    
    //array fill
    $push=array(0=>$ptotal,1=>$contotal,2=>$all);

}

echo json_encode($push);


?>
<?php

include_once("../include/mysql_connection.php"); 
error_reporting(0);

$push=array();
if(isset($_POST['from']) && isset($_POST['to']) && isset($_POST['location']))
{
    $from=$_POST['from'];
    $to=$_POST['to'];
    $war=$_POST['location'];
    //pending
    $pending = "SELECT * FROM `addition` where Warehouse_ID='$war' AND Inventory_Status LIKE '%Pending%' AND DateTime Between '$from 00:00:00' AND '$to 23:59:59' ORDER BY id ASC";
    $ptotal=mysqli_num_rows(mysqli_query($mysql, $pending));
    
    //confirmed
    $confirm = "SELECT * FROM `addition` where Warehouse_ID='$war' AND Inventory_Status in ('Recieved','Send Back','Not Recieved') AND DateTime Between '$from 00:00:00' AND '$to 23:59:59' ORDER BY id ASC";
    $contotal=mysqli_num_rows(mysqli_query($mysql, $confirm));
    
    //total all
     $allord = "SELECT * FROM `addition` where Warehouse_ID='$war' AND DateTime Between '$from 00:00:00' AND '$to 23:59:59' AND Inventory_Status in ('Pending','Recieved','Send Back','Not Recieved') ORDER BY id ASC";
    $all=mysqli_num_rows(mysqli_query($mysql, $allord));
    //$all=$ptotal+$contotal+$cantotal+$htotal+$retotal;
    
    //array fill
    $push=array(0=>$ptotal,1=>$contotal,2=>$all);
}
if(isset($_POST['location']))
{
    $war=$_POST['location'];
    //pending
    $pending = "SELECT * FROM `addition` where Warehouse_ID='$war' AND Inventory_Status LIKE '%Pending%' ORDER BY id ASC";
    $ptotal=mysqli_num_rows(mysqli_query($mysql, $pending));
    
    //confirmed
    $confirm = "SELECT * FROM `addition` where Warehouse_ID='$war' AND Inventory_Status in ('Recieved','Send Back','Not Recieved') ORDER BY id ASC";
    $contotal=mysqli_num_rows(mysqli_query($mysql, $confirm));
    
    //total all
    $allord = 'SELECT * FROM `addition` where Warehouse_ID="'.$war.'" AND Inventory_Status in ("Pending","Recieved","Send Back","Not Recieved") ORDER BY id ASC';
    $all=mysqli_num_rows(mysqli_query($mysql, $allord));
    
    
    //$all=$ptotal+$contotal+$cantotal+$htotal+$retotal;
    
    //array fill
    $push=array(0=>$ptotal,1=>$contotal,2=>$all);
}


echo json_encode($push);


?>
<?php

session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);

// if (isset($_SESSION['id']) && $_SESSION['id'] == true) {
    
// }
// else {
   
//     echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';

// };



$main=array();
if(isset($_GET['courier']) && isset($_GET['city']))
{
    $courier=$_GET['courier'];
    $city=$_GET['city'];
    $conv=strtoupper($city);
    
    if($courier=='Leopard')
    {
        //city id
        $sql="Select id,Name from `Leopard` Where Name LIKE '%$conv%' OR Name LIKE '%$city%'";
        $row=$dbo->prepare($sql);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);
        
        $main = array('data'=>$result);
        echo json_encode($main);
    }
    if($courier=='Trax')
    {
        $ci_name=ucwords($city);
        $sql="Select id,Name from `Trax` Where Name LIKE '%UPPER($ci_name)%' OR Name LIKE '%$city%'";
        $row=$dbo->prepare($sql);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);
        
        $main = array('data'=>$result);
        echo json_encode($main);
    }
    if($courier=='Rider')
    {
        $ci_name=ucwords($city);
        $sql="Select id,Name from `Rider` Where Name LIKE '%UPPER($ci_name)%' OR Name LIKE '%$city%'";
        $row=$dbo->prepare($sql);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);
        
        $main = array('data'=>$result);
        echo json_encode($main);
    }
    if($courier=='PostEx')
    {

        $ci_name=ucwords($city);
        $try=array('id'=>$ci_name,'Name'=>$ci_name);
        $result=array($try);
        
        $main = array('data'=>$result);
        echo json_encode($main);
    }
    if($courier=='CallCourier')
    {
        $ci_name=ucwords($city);
        $sql="Select id,Name from `Call_Courier` Where Name LIKE '%UPPER($ci_name)%' OR Name LIKE '%$city%'";
        $row=$dbo->prepare($sql);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);
        
        $main = array('data'=>$result);
        echo json_encode($main);
    }
    if($courier=='Self')
    {

        $ci_name=ucwords("Karachi");
        $try=array('id'=>$ci_name,'Name'=>$ci_name);
        $result=array($try);
        
        $main = array('data'=>$result);
        echo json_encode($main);
    }
    if($courier=='Tcs')
    {

        $ci_name=ucwords($city);
        $try=array('id'=>$ci_name,'Name'=>$ci_name);
        $result=array($try);
        
        $main = array('data'=>$result);
        echo json_encode($main);
    }
    
}
?>
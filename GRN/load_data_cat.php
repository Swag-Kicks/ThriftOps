<?php

session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);

// $cat_id=$_GET['cat_id'];

/// Preventing injection attack //// 
// if(!is_numeric($cat_id)){
// echo "Data Error";
// exit;
//  }

$main=array();
$sql="SELECT * FROM `Category`";
$row=$dbo->prepare($sql);
$row->execute();
$result=$row->fetchAll(PDO::FETCH_ASSOC);

$main = array('data'=>$result);
echo json_encode($main);
?>
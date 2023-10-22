<?php
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);
   
$cr=$_SESSION['id'];
if(isset($_POST["batch"]) && isset($_POST["reason"]))
{
     $batch=$_POST["batch"];
     $reason=$_POST["reason"];
    //GRN exists check
    $scheck = "SELECT * FROM SKU WHERE Batch_ID='$batch' order by id desc limit 1";
    $resa = mysqli_query($mysql, $scheck);
    $rw1 = mysqli_fetch_assoc($resa); 
    $PR_ID = $rw1['GRN_ID'];
    if($PR_ID!='')
    {
        // batch update 
        $update="Update `SKU` SET status='Discard',Reason='$reason' where Batch_ID='$batch'";
        $my = mysqli_query($mysql, $update);
        
        //product update
        
        $update1="Update `addition` SET status='Discard' where Batch_ID='$batch'";
        $my1 = mysqli_query($mysql, $update1);
        
        echo "1";
    }
    else{
        
        echo "2";
    }
}
<?php
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);

if(!empty($_POST["po"]))
{
    $PO_ID=$_POST["po"];
    //check
    $sql2 = "SELECT * from GRN WHERE PO_ID='$PO_ID'";
    $result2 = mysqli_query($mysql, $sql2);
    $row1 = mysqli_fetch_assoc($result2);
    $chck=$row1["PO_ID"];
   
    if($chck=="")
    {
        
    }
    else
    {
        //check
        $sql1 = "SELECT Quantity,SUM(Accepted_Quantity) as acc from Items WHERE PO_ID='$PO_ID'";
        $result1 = mysqli_query($mysql, $sql1);
        $row2 = mysqli_fetch_assoc($result1);
        $Quantity=$row2["Quantity"];
        $Accept=$row2["acc"];
        if($Quantity==$Accept)
        {
            echo "2";
        }
        else
        {
            
        }
    }
}

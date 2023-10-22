<?php
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);
   
//new
if (isset($_POST['war'])) 
{
    $numb=$_POST['number'];
    $count=0;
    $rack="Rack".$numb;
	$Rows = (int)$_POST['row'];
    $Columns =(int)$_POST['col'];
    $status="Empty";
    $War_ID=$_POST['war'];
    $Rack_type=$_POST['type'];
    $Rack_Cat=$_POST['Sub_Cat'];
    $Layers=(int)$_POST['lay'];
 
    
    if(empty($_POST['lay']))
    {
        for($w=1; $w < $Rows+1; $w++) 
        {
            for ($c=1; $c < $Columns+1; $c++) 
            {
            
                $try=$rack."-R".$w."-C".$c;
                $sql = "INSERT INTO SK_Rack (Warehouse_ID,Product_ID,Category_ID,Number,Location,SKU,Status) VALUES ('$War_ID', '$Rack_type', '$Rack_Cat', '$numb', '$try', '', '$status')";
                $result = mysqli_query($mysql, $sql);
                $count++;
            
            }
        }
        
    }
    else
    {
        for($w=1; $w < $Rows+1; $w++) 
        {
            for ($c=1; $c < $Columns+1; $c++) 
            {
                for ($l=1; $l < $Layers+1; $l++) 
                {
            
                    $try=$rack."-R".$w."-C".$c."-l".$l;
                    $sql = "INSERT INTO SK_Rack (Warehouse_ID,Product_ID,Category_ID,Number,Location,SKU,Status) VALUES ('$War_ID', '$Rack_type', '$Rack_Cat', '$numb', '$try', '', '$status')";
                    $result = mysqli_query($mysql, $sql);
                    $count++;
                }
            }
        }
        
    }
    
    if ($count==0) 
    {
        echo "0";
    } 
    else 
    {
        echo "1";
	} 
    
    		
}


?>
<?php

include_once("../../include/mysql_connection.php"); 



if(isset($_GET["id"]) && isset($_GET["warehouse"]))
{
    $SK = $_GET['id'];
    $warehouse = $_GET['warehouse'];
    $parts = explode('-', $SK);
    $format = $parts[0];
    
    //check discard
    
    $discard = mysqli_query($mysql,"SELECT id,SKU,Status,Sub_Category_ID from `addition` Where SKU='$SK'");
    $row1=mysqli_fetch_array($discard);
    $status=$row1['Status'];
    $category=$row1['Sub_Category_ID'];
    // echo $category;
    if($status=='Discard')
    {
        echo "2";
    }
    else
    {
        
        //check warehouse with allocation
        // $check_war = mysqli_query($mysql,"SELECT * from `racks` Where Warehouse_ID='$warehouse' AND SKU='$SK' AND Category='$category'");
        $check_war = mysqli_query($mysql,"SELECT * from `racks` Where Warehouse_ID='$warehouse' AND SKU='$SK'");
        $row2=mysqli_fetch_array($check_war);
        $id=$row2['id'];
        
        if($id!='')
        {
            echo "3";
        }
        else
        {
            //check category 
            $check_cat = mysqli_query($mysql,"SELECT * from `racks` Where Warehouse_ID='$warehouse' AND Category='$category'");
            $row3=mysqli_fetch_array($check_cat);
            $cat=$row3['id'];
            if($cat!='')
            {
                // npc
                // $sql = " SELECT racks.id,name FROM `racks` INNER JOIN Warehouse on Warehouse.Warehouse_ID=racks.Warehouse_ID where Warehouse.SK_Format LIKE '%$SK%' and racks.SKU = '' LIMIT 1 ";
                // $result = mysqli_query($mysql, $sql);
                
                //check empty rack
                $result = mysqli_query($mysql,"SELECT id,name from `racks` Where Warehouse_ID='$warehouse' AND Category='$category' AND SKU='' LIMIT 1");
                $to_encode = array();
                $row = $result->fetch_assoc();
                $to_encode[] = $row;
                echo json_encode($to_encode);   
                
            }
            else
            {
                echo "4";
            }
            
        }
        
        
    }
    

    
}


?>



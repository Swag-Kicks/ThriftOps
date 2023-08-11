<?php

include_once("../include/mysql_connection.php"); 
error_reporting(0);

$lim=$_GET['var1'];

        $shoetry ="SELECT * FROM `addition` where Vendor_ID='' AND Lot_ID='' order by id DESC LIMIT $lim,20";
        $shoed = mysqli_query($mysql, $shoetry);
        // $asr =mysqli_fetch_array($shoed);
        while($asr = mysqli_fetch_array($shoed))
        {
            
            $pid=$asr['Shopify_ID']; 
            $ven=$asr['Vendor'];
            $first=strtok($ven,  ' ');
            
            $last=substr($ven, strpos($ven, " ") + 1); 
            
     
            $vendor ="SELECT * FROM `vendor` WHERE Vendor_Name LIKE '%$first'";
            $que = mysqli_query($mysql, $vendor);
            $ve=mysqli_fetch_array($que);
            $ve_id=$ve['Vendor_ID'];
                    
                    
            $last1=substr($last,0,1);
            if($last1=='#')
            {
                $lo121=substr($last,1);
                $lot ="SELECT * FROM `lot` WHERE Lot_Number LIKE '%$lo121'";
                $que1 = mysqli_query($mysql, $lot);
                $lo=mysqli_fetch_array($que1);
                $lo_id=$lo['id'];
                        
                        
                if($lo_id=='' &&  $ve_id=='')
                {
                    //Update
                    $update ="Update `addition` SET Vendor_ID='Not Found',Lot_ID='Not Found' WHERE Shopify_ID='$pid'";
                    $asdfg = mysqli_query($mysql, $update);
                    echo "Vendor : NOTFOUND LOT: NOTFOUND";
                    echo "<br>";
                }
                else if($ve_id=='')
                {
                    //Update
                    $update ="Update `addition` SET Vendor_ID='Not Found',Lot_ID='$lo_id' WHERE Shopify_ID='$pid'";
                    $asdfg = mysqli_query($mysql, $update);
                    echo "Vendor : NOTFOUND LOT:".$lo_id;
                    echo "<br>";
                            
                }
                        
                else if($lo_id=='')
                {
                    //Update
                    $update ="Update `addition` SET Vendor_ID='$ve_id',Lot_ID='Not Found' WHERE Shopify_ID='$pid'";
                    $asdfg = mysqli_query($mysql, $update);
                    echo "Vendor : ".$ve_id." LOT: NOTFOUND";
                    echo "<br>";
                }
                
                else
                {
                    //Update
                    $update ="Update `addition` SET Vendor_ID='$ve_id',Lot_ID='$lo_id' WHERE Shopify_ID='$pid'";
                    $asdfg = mysqli_query($mysql, $update);
                    echo "Vendor :".$ve_id." LOT:".$lo_id;
                    echo "<br>";
                }
            }
                    

        }
        
            




?>
<?php

include_once("../include/mysql_connection.php"); 
error_reporting(0);


        $shoetry ="SELECT * FROM `addition` where Vendor_ID='' AND Lot_ID='' LIMIT 20";
        $shoed = mysqli_query($mysql, $shoetry);
        // $asr =mysqli_fetch_array($shoed);
        while($asr = mysqli_fetch_array($shoed))
        {
            $pid=$asr['Shopify_ID'];
        
            if(isset($pid))
            {
            
                $SHOP_URL = 'www-swag-kicks-com.myshopify.com';
                //product item id
                $ch = curl_init("https://$SHOP_URL/admin/api/2022-01/products/$pid.json");
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
                     'X-Shopify-Access-Token: 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',
                     'Content-Type: application/json'                                                                                                                                      
                    ));
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                
                $result = curl_exec($ch);
                $result=json_decode($result,true);
                $ven=$result['product']['vendor'];
                
                // echo "Shopify: ".$ven;
                // echo "<br>";
                
                if ($ven =='')
                {
                    echo "not found";
                    echo "<br>";
                }
                else
                {
                    $first=strtok($ven,  ' ');
                    // echo $first;
                    // echo "<br>";
                    $last=substr($ven, strpos($ven, " ") + 1); 
                    // echo "Vendor: ".$first." Lot: ".$last;
                    // echo "<br>";
                    // if($check =="")
                    // {
                    //     echo $check;
                    //     echo "<br>";
                    // }
                    $vendor ="SELECT * FROM `vendor` WHERE Vendor_Name LIKE '%$first'";
                    $que = mysqli_query($mysql, $vendor);
                    $ve=mysqli_fetch_array($que);
                    $ve_id=$ve['Vendor_ID'];
                    // echo "Vendor : ".$first." has  ID: ".$ve_id;
                    // echo "<br>";
                    
                    $last1=substr($last,0,1);
                    if($last1=='#')
                    {
                        $lo121=substr($last,1);
                        $lot ="SELECT * FROM `lot` WHERE Lot_Number LIKE '%$lo121'";
                        $que1 = mysqli_query($mysql, $lot);
                        $lo=mysqli_fetch_array($que1);
                        $lo_id=$lo['id'];
                        // echo "Lot : ".$last." has  ID: ".$lo_id;
                        // echo "<br>";
                        
                        if($lo_id=='' &&  $ve_id=='')
                        {
                            //Update
                            $update ="Update addition SET Vendor_ID='Not Found',Lot_ID='Not Found' WHERE Shopify_ID='$pid'";
                            $asdfg = mysqli_query($mysql, $update);
                        }
                        else if($ve_id=='')
                        {
                            //Update
                            $update ="Update addition SET Vendor_ID='Not Found',Lot_ID='$lo_id' WHERE Shopify_ID='$pid'";
                            $asdfg = mysqli_query($mysql, $update);
                        }
                        
                        else if($lo_id=='')
                        {
                            //Update
                            $update ="Update addition SET Vendor_ID='$ve_id',Lot_ID='Not Found' WHERE Shopify_ID='$pid'";
                            $asdfg = mysqli_query($mysql, $update);
                        }
                        else
                        {
                            //Update
                            $update ="Update addition SET Vendor_ID='$ve_id',Lot_ID='$lo_id' WHERE Shopify_ID='$pid'";
                            $asdfg = mysqli_query($mysql, $update);
                        }
                    }
                    else
                    {
                        
                        $lot ="SELECT * FROM `lot` WHERE Lot_Number='$last'";
                        $que1 = mysqli_query($mysql, $lot);
                        $lo=mysqli_fetch_array($que1);
                        $lo_id=$lo['id'];
                        // echo "Lot : ".$last." has  ID: ".$lo_id;
                        // echo "<br>";
                         if($lo_id=='' &&  $ve_id=='')
                        {
                            //Update
                            $update ="Update addition SET Vendor_ID='Not Found',Lot_ID='Not Found' WHERE Shopify_ID='$pid'";
                            $asdfg = mysqli_query($mysql, $update);
                        }
                        else if($ve_id=='')
                        {
                            //Update
                            $update ="Update addition SET Vendor_ID='Not Found',Lot_ID='$lo_id' WHERE Shopify_ID='$pid'";
                            $asdfg = mysqli_query($mysql, $update);
                        }
                        
                        else if($lo_id=='')
                        {
                            //Update
                            $update ="Update addition SET Vendor_ID='$ve_id',Lot_ID='Not Found' WHERE Shopify_ID='$pid'";
                            $asdfg = mysqli_query($mysql, $update);
                        }
                        else
                        {
                            //Update
                            $update ="Update addition SET Vendor_ID='$ve_id',Lot_ID='$lo_id' WHERE Shopify_ID='$pid'";
                            $asdfg = mysqli_query($mysql, $update);
                        }
                       
                    }
                    
                    
                }


            }
        }
            




?>
<?php
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);
   
$cr=$_SESSION['id'];
if(isset($_POST["grn"]))
{
    $grn=$_POST["grn"];
    //GRN exists check
    $scheck = "SELECT * FROM SKU WHERE GRN_ID='$grn' order by id desc limit 1";
    $resa = mysqli_query($mysql, $scheck);
    $rw1 = mysqli_fetch_assoc($resa); 
    $PR_ID = $rw1['GRN_ID'];
    $Sta=$rw1['status'];
    // echo $Sta;
    if($PR_ID=='' || $Sta=='Discard')
    // if($PR_ID=='')
    {
    
        if(isset($_POST["ven"]) && isset($_POST["cat"]) && isset($_POST["quantity"]))
        {
            
            $war=$_POST["ven"];
            $scheck1 = "SELECT * FROM SKU order by Batch_ID desc limit 1";
            $resa1 = mysqli_query($mysql, $scheck1);
            $rw11 = mysqli_fetch_assoc($resa1); 
            $batch = $rw11['Batch_ID'];
            
            if($batch=="")
            {
                $bacthid=1;
            }
            else
            {
                $bacthid=(int)$batch+1;
            }
            // 
                //warehouse
                $sqw="SELECT * FROM `Vendor` WHERE Vendor_ID='$war'";
                $resw=mysqli_query($mysql, $sqw);
                $rw14=mysqli_fetch_assoc($resw);
                $format=$rw14["SK_Prefix"];
                
                for($i=0; $i < count($_POST['cat']); $i++)
                {
                    
                    $C_Date = date('Y-m-d/h:i:a');
                    $cati=$_POST['cat'][$i];
                    $Quantity=$_POST['quantity'][$i];
                    //format
                    $sk="SELECT * FROM Category Where Name='$cati' order by Category_ID DESC LIMIT 1";
                    $resk = mysqli_query($mysql, $sk);
                    $rosk =mysqli_fetch_array($resk);
                    $sk_format=$rosk['SKU_Format'];
                    $subc=$rosk['Category_ID'];
                    $cat=$rosk['Product_ID'];
                    //SKU
                    $sq1 = "SELECT * FROM SKU Where Category_ID='$subc' order by id desc limit 1";
                    $reslt1 = mysqli_query($mysql, $sq1);
                    $ro1 =mysqli_fetch_array($reslt1);
                    
                    
                    //itemcost fetch
                    $cfetch=mysqli_query($mysql, "Select Est_Price from Items where GRN_ID='$PR_ID'");
                    $caarr =mysqli_fetch_array($cfetch);
                    $cost=$caarr['Est_Price'];
                   
                    $last_sku=$ro1['SKU'];
                    // echo $last_sku."<br>";
                    // $int_var = (int)filter_var($last_sku, FILTER_SANITIZE_NUMBER_INT);
                    //  $num12  = substr($int_var, 1);
                //   echo $int_var ."<br>";
                    $int_var=preg_replace("/[^0-9]/", "", $last_sku );
                    $num12  = $int_var;
                    
                   
                    if ($num12 == " ") 
                    {
                        for($ia=0; $ia <= $num12; $ia++)
                        {
                            if ($ia<$Quantity) 
                            {   
                                // if (!empty($PR_ID)) 
                                // {
                                //     // echo "0";
                                // } 
                                // else 
                                // {
                                    $num12=$num12+1;
                                    $var= $format."-".$sk_format.$num12;
                                    // echo $var."<br>";
                                    $sql = "INSERT INTO SKU (GRN_ID,Batch_ID,Category_ID,SKU,Vendor_ID,User_ID,DateTime) VALUES ('$grn', '$bacthid', '$subc', '$var','$war','$cr', '$C_Date')";
                                    $result = mysqli_query($mysql, $sql);
                                    //same with addition
                                    $sql1 = "INSERT INTO addition (Vendor_ID,Batch_ID,SKU,Cost,Category_ID,Sub_Category_ID,DateTime) VALUES ('$war','$bacthid','$var', '$cost','$cat', '$subc','$C_Date')";
                                    $result1 = mysqli_query($mysql, $sql1);
                                // }
                            }
                        }
                    }
                    else
                    {
            
                        for($ia=0; $ia <= $num12; $ia++)
                        {
                            if ($ia<$Quantity) 
                            {   
                                // if (!empty($PR_ID)) 
                                // {
                                //     // echo "0";           
                                // } 
                                // else 
                                // {
                                    $num12=$num12+1;
                                    $var= $format."-".$sk_format.$num12;
                                    // echo $var."<br>";
                                    $sql = "INSERT INTO SKU (GRN_ID,Batch_ID,Category_ID,SKU,Vendor_ID,User_ID,DateTime) VALUES ('$grn', '$bacthid', '$subc', '$var','$war','$cr', '$C_Date')";
                                    $result = mysqli_query($mysql, $sql);
                                    //same with addition
                                    $sql1 = "INSERT INTO addition (Vendor_ID,Batch_ID,SKU,Cost,Category_ID,Sub_Category_ID,DateTime) VALUES ('$war','$bacthid','$var', '$cost','$cat', '$subc','$C_Date')";
                                    $result1 = mysqli_query($mysql, $sql1);
                                       
                                // }
                                
                            }
                        }
                    }
                   
                }
                if($result1)
                {
                    echo "1";
                }
            
            
            
        }
    }
    else
    {
        echo "3";
    }
    
}
// else
// {
//     echo "3";
// }

?>
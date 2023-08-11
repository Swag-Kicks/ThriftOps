<?php
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);
   

if(isset($_POST["GRN_ID"]))
{
    $grn=$_POST["GRN_ID"];
    $war=$_POST["war"];
    $cat=$_POST["Cat"];
    $sub_cat=$_POST["Sub_Cat"];
    $user=$_POST["USER"];
    $req=$_POST["Req_date"];
    $ven=$_POST["ven"];
    

    
    //GRN exists check
    $scheck = "SELECT * FROM SKU WHERE GRN_ID='$grn' order by id desc limit 1";
    $resa = mysqli_query($mysql, $scheck);
    $rw1 = mysqli_fetch_assoc($resa); 
    $PR_ID = $rw1['GRN_ID'];
    
    if($PR_ID=='')
    {
        //warehouse
        $sqw="SELECT * FROM Warehouse WHERE Warehouse_ID='$war'";
        $resw=mysqli_query($mysql, $sqw);
        $rw11=mysqli_fetch_assoc($resw);
        $format=$rw11["SK_Format"];
        
        
        //Item received
        $sql = "SELECT * FROM Item_Received WHERE GRN_ID='$grn'";
        $result = mysqli_query($mysql, $sql);
       
       
        while($row = mysqli_fetch_assoc($result)) 
        {
           $Quantity=$row["Quantity"];
        }
    
        //format
        $sk="SELECT * FROM Category Where Category_ID='$sub_cat'";
        $resk = mysqli_query($mysql, $sk);
        $rosk =mysqli_fetch_array($resk);
        $sk_format=$rosk['SKU_Format'];
        
        //SKU
        $sq1 = "SELECT * FROM SKU Where Category_ID='$sub_cat' order by id desc limit 1";
        $reslt1 = mysqli_query($mysql, $sq1);
        $ro1 =mysqli_fetch_array($reslt1);
       
        $last_sku=$ro1['SKU'];
        $int_var = (int)filter_var($last_sku, FILTER_SANITIZE_NUMBER_INT);

        $num12 = $str1 = substr($int_var, 1);
        // print_r($num12);
        if ($num12 == " ") 
        {
            for($ia=0; $ia <= $num12; $ia++)
            {
                if ($ia<$Quantity) 
                {   
                    if (!empty($PR_ID)) 
                    {
                        echo "0";
                    } 
                    else 
                    {
                        $num12+=1;
                        $var= $format."-".$sk_format.$num12;
                        // echo $var;
                        $sql = "INSERT INTO SKU (GRN_ID,Warehouse_ID,Product_ID,Category_ID,SKU,Vendor_ID,User_ID,DateTime) VALUES ('$grn', '$war', '$cat', '$sub_cat', '$var','$ven','$user', '$req')";
                        $result = mysqli_query($mysql, $sql);
                    }
                }
            }
        }
        else
        {

            for($ia=0; $ia <= $num12; $ia++)
            {
                if ($ia<$Quantity) 
                {   
                    if (!empty($PR_ID)) 
                    {
                        echo "0";           
                    } 
                    else 
                    {
                        $num12+=1;
                        $var= $format."-".$sk_format.$num12;
                        // echo $var;
                        $sql = "INSERT INTO SKU (GRN_ID,Warehouse_ID,Product_ID,Category_ID,SKU,Vendor_ID,User_ID,DateTime) VALUES ('$grn', '$war', '$cat', '$sub_cat', '$var','$ven','$user', '$req')";
                        $result = mysqli_query($mysql, $sql);
                           
                    }
                    
                }
            }
        }
            
          
        echo "1";
    
    }
    else
    {
        echo "0";
    }
    
    
}


?>
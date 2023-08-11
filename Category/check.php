<?php
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);


if(isset($_POST["id"]))
{
    $name=$_POST["id"];
    
    if ($name =='')
    {
        echo "0";
    }
    else
    {
        $check=strrchr( $name, ' ');
    

        if($check =="")
        {
            //First suggestion
            $first=substr($name,0 ,1);
            $last = substr($name," ");
      
            $last=substr($name,1 ,1);
        
            $main=strtoupper($first.$last);
            // echo strtoupper($main); 
            
            //second suggestion
            
            $last1=substr($name,-1);
            $main1=strtoupper($first.$last1);
            // echo strtoupper($main1); 
            
            $sql1 = "SELECT * from Category WHERE SKU_Format='$main' OR SK_Format='$main1'";
            $result1 = mysqli_query($mysql, $sql1);
            $row = mysqli_fetch_assoc($result1);
            $format=$row['SKU_Format'];
    
            
            if($format == "")
            {
                $output= "Suggested Formats: ".$main. " , ".$main1;
                echo $output;
                
            }
            else if ($main==$format)
            {
                $output= "Suggested Formats: $main Already Exists! Try $main1 as format";
                echo $output;
            }
            else if ($main1==$format)
            {
                $output= "Suggested Formats: $main1 Already Exists! Try $main as format";
                echo $output;
            }
            else 
            {
                $output= "Suggested Formats: Format Already Exists !";
                echo $output;
            }
        }
        else
        {
            
            //First suggestion
            $first=substr($name,0 ,1);
            $last = substr($name," ");
      
            $string = strrchr( $name, ' ');
            $last=substr($string,1 ,1);
        
            $main=strtoupper($first.$last);
            // echo strtoupper($main); 
            
            //second suggestion
            
            $last1=substr($string,-1);
            $main1=strtoupper($first.$last1);
            // echo strtoupper($main1); 
            
            $sql1 = "SELECT * from Category WHERE SKU_Format='$main' OR SK_Format='$main1'";
            $result1 = mysqli_query($mysql, $sql1);
            $row = mysqli_fetch_assoc($result1);
            $format=$row['SKU_Format'];
    
            
            if($format == "")
            {
                $output= "Suggested Formats: ".$main. " , ".$main1;
                echo $output;
                
            }
            else if ($main==$format)
            {
                $output= "Suggested Formats: $main Already Exists! Try $main1 as format";
                echo $output;
            }
            else if ($main1==$format)
            {
                $output= "Suggested Formats: $main1 Already Exists! Try $main as format";
                echo $output;
            }
            else 
            {
                $output= "Suggested Formats: Format Already Exists !";
                echo $output;
            }
            
            
        }
    }

}

    
    



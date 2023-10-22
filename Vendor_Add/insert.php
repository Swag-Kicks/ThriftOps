<?php
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);

   

if(isset($_POST["name"]))
{
   $name=$_POST["name"];
   $type=$_POST["type"];
   $address=$_POST["address"];
   $contact=$_POST["contact"];
   $username=$_POST["username"];
   $format=$_POST["format"];
   $email=$_POST["email"];
   $pass=$_POST["pass"];
   $hash = md5($pass);
   $datetime=date('Y-m-d/h:i:a');
   $percent= $_POST["percent"];
   
   
   
   if($percent == "" && $type == "A")
   {
        $sql = "INSERT INTO Vendor (Name,Type,Percentage,Address,Contact) VALUES ('$name', '$type', '100', '$address', '$contact')";
        $result = mysqli_query($mysql, $sql);
        
        if(isset($result))
        {
            echo "1";
        }
        else
        {
            echo "0";
        }
        
   }
   else if($percent != "" && $type == "B")
   {
       $sql134 = "SELECT * from User WHERE Username='$username' OR email='$email'";
       $result123 = mysqli_query($mysql, $sql134);
       $row12 = mysqli_fetch_assoc($result123);
       $format3=$row12['Username'];
       
       if($format3 == "")
       {

            $sql = "INSERT INTO Vendor (Name,Type,Percentage,Address,Contact) VALUES ('$name', '$type', '$percent', '$address', '$contact')";
            $result = mysqli_query($mysql, $sql);
        
            if(isset($result))
            {

                //user insertion
                $sql1 = "INSERT INTO User (Name,Username,Password,Dept_ID,Email,Contact,Address) VALUES ('$name', '$username', '$hash', '2', '$email', '$contact', '$address')";
                $result1 = mysqli_query($mysql, $sql1);
                   
                if(isset($result1))
                {
                    //warehouse insertion
                    $sql2 = "INSERT INTO Warehouse (Location,Address,SK_Format,DateTime) VALUES ('$name', '$address', '$format', '$datetime')";
                    $result2 = mysqli_query($mysql, $sql2);
                   
                    if(isset($result2))
                    {
                        echo "1";
                    }
                    else
                    {
                        echo "0";
                    }
                           
                }

            }
        }
        else
        {
            echo "3";
        }
    }
   
   
   
   
  
}
?>
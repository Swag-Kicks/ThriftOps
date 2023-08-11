<?php
include_once("../../include/mysql_connection.php"); 

if(!empty($_POST['name']) && !empty($_POST['att']) && !empty($_POST['catID']))
{
    $Name= $_POST['name'];
    $Attribute=$_POST['att'];
    $CAT_ID= $_POST['catID'];
    $result = mysqli_query($mysql,"Update `Category` SET `attribute`='$Attribute' WHERE `Category_ID`='$Name' AND Product_ID='$CAT_ID'");

   if (!$result) 
   {
       echo "0";
      
   } 
   else 
   {
       echo "1";
      }
}


?>
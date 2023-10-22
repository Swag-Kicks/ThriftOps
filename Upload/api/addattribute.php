<?php
include_once("../../include/mysql_connection.php"); 

if(!empty($_POST['name']) && !empty($_POST['code']))
{
    $Name= $_POST['name'];
    $Code=$_POST['code'];
    
    $result = mysqli_query($mysql, "INSERT INTO Attributes (Name,Code) VALUES ('$Name','$Code')");
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
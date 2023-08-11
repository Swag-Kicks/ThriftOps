<?php

session_start();
include_once("../include/mysql_connection.php"); 
// include_once("../include/mysql_connection.php"); 
    //read the json file contents
    $jsondata = file_get_contents('leo.json');
    
    //convert json object to php associative array
    $data = json_decode($jsondata, true);
    //print_r($data);
     //print_r($data['city_list']['id']);
    foreach ($data as $row) 
    {
        print_r($row['name'].'<br>');
        
        // $i=1;
        
        // $id=$row['id'];
        // echo $name=$row['name'];
        // echo "<br";
        // $i++;
         $records1 = mysqli_query($mysql, "INSERT INTO `Leopard`(`id`, `Name`, `allow_as_origin`, `allow_as_destination`) VALUES('".$row['id']."','".$row['name']."','1','1')"); 
        
    }
    
    
?>
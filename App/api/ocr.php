

<?php

include_once("../includes/Rdb.php"); 

$date = date('m/d/Y h:i:s a', time());
          
// $cr="Mobile Application";

// Importing DBConfig.php file.

     $date=date('Y-m-d/h:i:a');
     $C_Date = date('Y-m-d/h:i:a');
 
 // Getting the received JSON into $json variable.
 $json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);
 
 // Populate User name from JSON $obj array and store into $name.
$key = $obj['id'];
 
 $user =$obj['username'];

//Checking Email is already exist or not using SQL query.
 $sql = "SELECT name FROM ocr WHERE active='$key'";
 
 
// Executing SQL Query.
$check = mysqli_fetch_array(mysqli_query($mysql, $sql));
 
 
if(isset($check)){
 
 $EmailExistMSG = 'Barcode Already Updated';
 
 // Converting the message into JSON format.
$EmailExistJson = json_encode($EmailExistMSG);
 
// Echo the message.
 echo $EmailExistJson ; 
 
 }
 else{
 
 // Creating SQL query and insert the record into MySQL database table.
$sql = "UPDATE orders SET Status='Recieved', Recieved_By='$user' where Items= '$key' ORDER by Date DESC LIMIT 1";
 //UPDATE orders SET Status='Recieved',Recieved_By='$cr',Recieved_By_Time='$C_Date' where Items= '$key'
 
 if(mysqli_query($mysql, $sql)){
 
 // If the record inserted successfully then show the message.
$MSG = 'Barcode Updated Successfully' ;
 
// Converting the message into JSON format.
$json = json_encode($MSG);
 
// Echo the message.
 echo $json ;
 
 }
 else{
 
 echo 'Try Again';
 
 }
 }
 mysqli_close($con);
?>


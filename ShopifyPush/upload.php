<?php
$folderName = 'upload/';

$to_encode = array();

if(!empty($_FILES))
{
    $file = $_FILES['file']['tmp_name'];
    $fileLocation = $folderName . $_FILES['file']['name'];
    move_uploaded_file($file,$fileLocation);
    //  echo $fileLocation;
        $to_encode[] = $fileLocation;
     
     echo json_encode($to_encode);
     die();
} 

?>

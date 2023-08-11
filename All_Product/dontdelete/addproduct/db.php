<?php

$server="localhost";
$user="thriftops_swagkicks";
$pass="Swagkicks123@";
$database="thriftops_swagkicks_Thriftops";


$mysql= mysqli_connect($server,$user, $pass, $database);

if(!$mysql)
{
    die("Error: " . mysqli_connect_error());
}

try 
{
    $dbo = new PDO ('mysql:host='.$server. '; dbname='.$database, $user, $pass);
    


    $dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) 
{
    print "Error!: " . $e->getMessage ()."<br/>";
    die ();
}


?>

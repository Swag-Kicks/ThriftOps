<?php

$server="thriftops.cqmcfnfzz2yd.ap-south-1.rds.amazonaws.com";
$user="root";
$pass="Swagkicks";
$database="thriftops_30";
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

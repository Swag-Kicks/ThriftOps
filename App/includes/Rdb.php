<?php
error_reporting(0);
// $server="localhost";
// $user="thriftops_tech";
// $pass="Swagkicks123@";
// $database="thriftops_Thriftops";

//old verginia
//$server="thriftops.copzvfarwslx.us-east-1.rds.amazonaws.com";
//new mumbai
$server="thriftops.cqmcfnfzz2yd.ap-south-1.rds.amazonaws.com";
$user="root";
$pass="Swagkicks";
$database="thriftops_mg";
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


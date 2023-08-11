<?php

error_reporting(0);
date_default_timezone_set("Asia/Karachi");

$user=$_SESSION['Username'];
$datetime=date('Y-m-d/h:i:a');

//postex
// for ($x = 0; $x <= 20; $x++)
// {
//     $as+=50;
//     echo '<iframe src="https://backup.thriftops.com/Postex.php?var1='.$as.'" width="100%" height="150"></iframe>';
// }

// //leopard
// for ($x = 0; $x <= 30; $x++)
// {
//     $as+=10;
//     echo '<iframe src="https://backup.thriftops.com/Leopard.php?var1='.$as.'" width="100%" height="150"></iframe>';
// }


// //rider
// for ($x = 0; $x <= 30; $x++)
// {
//     $as+=25;
//     echo '<iframe src="https://backup.thriftops.com/Rider.php?var1='.$as.'" width="100%" height="150"></iframe>';
// }

//trax
for ($x = 0; $x <= 30; $x++)
{
    $as+=25;
    echo '<iframe src="https://backup.thriftops.com/Trax.php?var1='.$as.'" width="100%" height="150"></iframe>';
}

?>
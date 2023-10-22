<?php

session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);


$query = "SELECT *,GROUP_CONCAT(Items.Item)as item,GROUP_CONCAT(Items.Quantity)as quantity,GROUP_CONCAT(Items.Description) as description FROM PR INNER JOIN Items ON PR.PR_ID=Items.PR_ID GROUP BY PR.PR_ID DESC";
$total_filter_data = mysqli_num_rows(mysqli_query($mysql, $query));



echo $total_filter_data;
?>
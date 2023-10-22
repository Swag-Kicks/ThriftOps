<?php
include_once("../../include/mysql_connection.php");


if(isset($_POST['sku']))
{
    $sku=$_POST['sku'];
    
    $discard = mysqli_query($mysql,"SELECT Shopify_ID from `addition` Where SKU='$sku'");
    $row1=mysqli_fetch_array($discard);
    $status=$row1['Shopify_ID'];

    if($status!='')
    {
        echo "1";
    }
    else
    {
        echo "0";
    }
}

?>
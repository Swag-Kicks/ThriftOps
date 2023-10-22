<?php

include_once("../../include/mysql_connection.php"); 
$sku=$_GET['id'];
$result = mysqli_query($mysql, "SELECT * FROM addition Where SKU='$sku'");
$row = mysqli_fetch_array($result);
$string=$row['att'];
$attrID=$row['Sub_Category_ID'];
$pattern = '/"([^"]+)":\s*"([^"]+)"/';
$att=explode(",",$string);

$div="<div id='formArea'>";
foreach($att as $values)
{
	preg_match($pattern, $values, $matches);
    $div.="<label class='col-form-label pt-0' id='$matches[1]'>$matches[1]</label> <input class='form-control' id='$matches[1]' name='$matches[1]' onchange='getAttrValue()' value='$matches[2]'>";
    //$arr[]=[$matches[1],$matches[2]];
     
}
$div.="</div>";




//old
// $attrID = $_GET['id'];

     $sql = "SELECT * FROM `Category` WHERE `Category_ID` = $attrID";
              $result = mysqli_query($mysql, $sql);
   
$to_encode = array();
while ($row = $result->fetch_assoc())
{
     $to_encode[]= ['Name'=>$row['Name'],'attribute'=> $div];
}

echo json_encode($to_encode);
?>


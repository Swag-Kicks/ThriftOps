<?php
session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);

$cr=$_SESSION['Username'];
$sql = "SELECT * FROM users WHERE username='$cr'";
$result = mysqli_query($mysql, $sql);
$row = mysqli_fetch_assoc($result);
$Company=$row['Company_ID'];
    

$sql1 = "SELECT * FROM marketplace WHERE Company_ID='$Company' AND Name='Ebay'";
$result1 = mysqli_query($mysql, $sql1);
$row1 = mysqli_fetch_assoc($result1);
$Token=$row1['Token'];


$main=[];

// $cat_id="macbook";
if(isset($_GET['cat_id']))
{
    $cat_id=$_GET['cat_id'];
    $url="https://api.ebay.com/commerce/taxonomy/v1/category_tree/0/get_category_suggestions?q=$cat_id";
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL, $url);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER , true);
    curl_setopt($curl,CURLOPT_ENCODING ,'');
    curl_setopt($curl,CURLOPT_MAXREDIRS, 10);
    curl_setopt($curl,CURLOPT_TIMEOUT , 0);
    curl_setopt($curl,CURLOPT_FOLLOWLOCATION , true);
    curl_setopt($curl,CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1);
    curl_setopt($curl,CURLOPT_CUSTOMREQUEST , 'GET');
    curl_setopt($curl,CURLOPT_HTTPHEADER , array("Content-Type: application/json","Authorization: Bearer $Token"));
    $response = curl_exec($curl);
    curl_close($curl);
    $result=json_decode($response, true);
    //print_r($result);
    foreach ($result as $suggestion)
    {
        foreach ($suggestion as $item)
        {
            //print_r($item);
            //echo "<br>";
            $catID = $item['category']['categoryId'];
            //print_r("Cat: ".$catID);
            //echo "<br>";
            $catName = $item['category']['categoryName'];
            // print_r("Name: ".$catName);
            $anscestor = '';
            foreach($item['categoryTreeNodeAncestors'] as $parent)
            {
                $anscestor = $parent['categoryName'] . "-->" . $anscestor;
                
                
            }
            $fullName = $anscestor . $catName;
            $main[] = array('catid'=>$catID, 'desc'=>$fullName);
        }
        
    }
    echo json_encode($main);

}
?>

<?php
include_once("../../include/mysql_connection.php"); 

if(!isset($_POST['searchTerm'])){ 
    $fetchData = mysqli_query($mysql,"select * from Brands order by name limit 5");
}else{ 
    $search = $_POST['searchTerm'];   
    $fetchData = mysqli_query($mysql,"select * from Brands where name like '%".$search."%' limit 5");
} 

$data = array();
while ($row = mysqli_fetch_array($fetchData)) {    
    $data[] = array("id"=>$row['id'], "text"=>$row['name']);
}
echo json_encode($data);


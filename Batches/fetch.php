<?php

session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);


$user=$_SESSION['id'];

$limit = '10';
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}

$query = "SELECT * FROM SKU INNER JOIN Vendor on SKU.Vendor_ID=Vendor.Vendor_ID";

if($_POST['query'] != '')
{
    $query .= ' WHERE PR.PR_ID LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" AND PR_Log.User_ID="'.$user.'"';
}

else if(!empty($_POST['vendor']))
{
    $vendor=$_POST['vendor'];
    
    $query .= " WHERE SKU.Vendor_ID='$vendor'";
    
    
    

}
else if(!empty($_POST['type']))
{
    $type=$_POST['type'];
    
    $query .= " WHERE Vendor.Fments='$type'";
    
    
    

}

$query .= ' GROUP BY Batch_ID DESC';
//echo $query;
$total_data=mysqli_num_rows(mysqli_query($mysql, $query));
//print_r($total_data);


$filter_query = $query . ' LIMIT '.$start.', '.$limit.'';
//echo $filter_query;



$result = mysqli_query($mysql, $filter_query);

$total_filter_data = mysqli_num_rows(mysqli_query($mysql, $filter_query));
// echo $total_filter_data ;




    $output = '
    <table class="table table-hover">
      <thead>
      <tr>
            <thead>
                        <tr>
                          <th scope="col">Batch ID</th>
                          <th scope="col">GRN ID</th>
                          <th scope="col">Units</th>
                          <th scope="col">Created </th>
                          <th scope="col">Vendor </th>
                          <th scope="col">Type</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
      </tr>
      </thead>
    ';


while($row = mysqli_fetch_array($result))
{

  
      
      
    //   $records2 = mysqli_query($mysql, "SELECT Name,Dept_ID FROM `User` WHERE User_ID='".$row["User_ID"]."'"); 
    //   $data2 = mysqli_fetch_array($records2);
    //   $name= $data2[0];
    //   $deptid= $data2[1];
      
    //   $records1 = mysqli_query($mysql, "SELECT Name,Fments FROM `Vendor` WHERE Vendor_ID='".$row["Vendor_ID"]."'"); 
    //   $data1 = mysqli_fetch_array($records1);
    //   $ven = $data1[0];
    //   $type=$data1[1];
      
      $units = mysqli_num_rows(mysqli_query($mysql, "SELECT * FROM `SKU` WHERE Batch_ID='".$row["Batch_ID"]."'"));
      
            $output .= '
            <tbody>
            <tr>
              <td>'.$row["Batch_ID"].'</td>
              <td>'.$row["GRN_ID"].'</td>
              <td>'.$units.'</td>
              <td>'.$row["DateTime"].'</td>
              <td>'.$row["Name"].'</td>
              <td>'.$row["Fments"].'</td>
              <td><a href="#" name="pick" id="btnmodal" batch="'.$row["Batch_ID"].'" class=""><i data-feather="printer" style="color:black;"></i></a></td>
            </tr>
            </tbody>'
            ;
      
      

      
  
}



$output .= '
</table>
<br /><div class="hint-text">
<label class="data_count">Total Records -# '.$total_data.'</label></div>
<div align="center">
  <ul class="pagination">
';


$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;

if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}

for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id > $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}

$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>

</div>
';

echo $output;

?>
    <script src="../assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
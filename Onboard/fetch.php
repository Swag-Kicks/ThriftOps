<?php

session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);



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

$query = "SELECT * FROM User";

if($_POST['query'] != '')
{
  $query .= ' WHERE Active LIKE "0" AND Username LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR email LIKE "%'.str_replace(' ', '%', $_POST['query']).'%"';
}
else
{
    $query .= ' WHERE Active LIKE "0"';
}


$query .= ' ORDER BY User_ID ASC';
// echo $query;
$total_data=mysqli_num_rows(mysqli_query($mysql, $query));
//print_r($total_data);


$filter_query = $query . ' LIMIT '.$start.', '.$limit.'';
// echo $filter_query;



$result = mysqli_query($mysql, $filter_query);

$total_filter_data = mysqli_num_rows(mysqli_query($mysql, $filter_query));
// echo $total_filter_data ;


$output = '
<label class="data_count">Total Records - '.$total_data.'</label>
<table class="table table-hover">
  <thead style="text-align:center">
  <tr>
        <td><b>Name</b></td>
        <td><b>Username</b></td>
        <td><b>Department</b></td>
        <td><b>Address</b></td>
        <td><b>Contact</b></td>
        <td><b>Email</b></td>
        <td><b>Update</b></td>
   </tr>
  </thead>
';

while($row = mysqli_fetch_array($result))
{
     $records1 = mysqli_query($mysql, "SELECT Name FROM `Department` WHERE Dept_ID='".$row["Dept_ID"]."'"); 
     $data1 = mysqli_fetch_array($records1);
     $dept= $data1[0];
      
    $output .= '
    <tbody class="table" style="text-align:center">
    <tr>
      <td>'.$row["Name"].'</td>
      <td>'.$row["Username"].'</td>
      <td>'.$dept.'</td>
      <td>'.$row["Address"].'</td>
      <td>'.$row["Contact"].'</td>
      <td>'.$row["Email"].'</td>
      <td class="align-middle text-center">
                <div class="btn-group align-top">
                        <input type="button" name="mark" value="Save" id="'. $row["User_ID"].'" class="btn btn-md btn-primary mark_data" />
                </div></td>
   </tr>
    </tbody>'
    ;
}


$output .= '
</table>
<br />
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
    if($page_array[$count] == '..')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">..</a>
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

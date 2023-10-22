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

$query = "SELECT * FROM GRN INNER JOIN PO ON GRN.PO_ID=PO.PO_ID";

if($_POST['query'] != '')
{
  $query .= ' WHERE GRN_ID LIKE "%'.str_replace(' ', '%', $_POST['query']).'%"';
}

if(empty($_POST['status']))
{
     if(!empty($_POST['vendor']))
     {
        
        $query .= ' WHERE Vendor_ID= "'.$_POST['vendor'].'"';
        
     }
}

else if(!empty($_POST['status']))
{
  
  $status=$_POST['status'];
  if($status!=1)
  {
      if(!empty($_POST['vendor']))
      {

        $query .= ' WHERE Status LIKE "'.$_POST['status'].'" AND Vendor_ID= "'.$_POST['vendor'].'"';
 
      }
       
      else
      {
          $query .= ' WHERE Status LIKE "'.$_POST['status'].'"';
      }
  }
  else
  {
      if(!empty($_POST['vendor']))
      {
          
        $query .= ' WHERE Vendor_ID= "'.$_POST['vendor'].'"'; //will change after Status added to grn table
          
      }
       
      else
      {
          $query .= ' WHERE 1=1';
      }
  
  }
  
}


$query .= ' GROUP BY GRN.GRN_ID DESC';
echo $query;
$total_data=mysqli_num_rows(mysqli_query($mysql, $query));
//print_r($total_data);


$filter_query = $query . ' LIMIT '.$start.', '.$limit.'';
// echo $filter_query;



$result = mysqli_query($mysql, $filter_query);

$total_filter_data = mysqli_num_rows(mysqli_query($mysql, $filter_query));
// echo $total_filter_data ;


$output = '

<table class="table table-hover table-de">
  <thead style="text-align:center">
  <tr>
        <td scope="col"><b>GRN ID</b></td>
        <td scope="col"><b>PO ID</b></td>
        <td scope="col"><b>Supplier</b></td>
        <td scope="col"><b>Amount</b></td>
        <td scope="col"><b>Created</b></td>
        <td scope="col"><b>Batch Status</b></td>
   </tr>
  </thead>
';
while($row = mysqli_fetch_array($result))
{
     
     $records2 = mysqli_query($mysql, "SELECT Name FROM `Vendor` WHERE Vendor_ID='".$row["Vendor_ID"]."'"); 
     $data2 = mysqli_fetch_array($records2);
     $ven= $data2[0];
     
     $records3 = mysqli_query($mysql, "SELECT SUM(Unit_Price) FROM `Items` where PO_ID='".$row["PO_ID"]."'"); 
     $data3 = mysqli_fetch_array($records3);
     $sum= $data3[0];
      
      
    $output .= '
    <tbody class="table" style="text-align:center">
    <tr>
      <td>'.$row["GRN_ID"].'</td>
      <td>'.$row["PO_ID"].'</td>
      <td>'.$ven.'</td>
      <td>'.$sum.'</td>
      <td>'.$row["Date"].'</td>
      <td class="align-middle text-center">
                                        <div class="btn-group align-top">
                                            <a href="#" data-role="view" data-id="'.$row["GRN_ID"].'"><img class="icons"  src="https://backup.thriftops.com/assets/images/icons/eye.png"></a>
                                        </div>
                                      
                                        <div class="btn-group align-top">
                                            <a href="#" data-role="infrm" data-id="'.$row["GRN_ID"].'"><img class=""  src="https://backup.thriftops.com/assets/images/icons/edit.png"></a>
                                        </div>
                                    </td>
    </tr>
    </tbody>'
    ;
}


$output .= '
</table>
<br />
<div class="hint-text"><label class="data_count">Total Records - '.$total_data.'</label></div>

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

<?php

session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);

$query = "SELECT * FROM `Order`";

if(!empty($_POST['ordernum']))
{
    $ord=$_POST['ordernum'];
    if(is_numeric($cut))
    {
        $query .= ' WHERE Order_Number LIKE "%#'.str_replace(' ', '%', $_POST['ordernum']).'%" AND Status="Dispatched" AND City LIKE "%Kar%" AND Courier="Self" AND Date > 2023-12-01';
    }
    else
    {
       $query .= ' WHERE Order_Number LIKE "%'.str_replace(' ', '%', $_POST['ordernum']).'%" AND Status="Dispatched" AND City LIKE "%Kar%"  AND Courier="Self" AND Date > 2023-12-01';
    }
    
}

else
{
    $query .= ' Where Status="Dispatched" AND City LIKE "%Kar%" AND Courier="Self" AND Date > 2023-12-01';
}


$query .= ' GROUP BY Order_ID DESC';

//echo $query;
$total_data=mysqli_num_rows(mysqli_query($mysql, $query));
//print_r($total_data);



if(isset($_POST['limit']))
{
  $limit = $_POST['limit'];
  $page = 1;
  if($_POST['page'] > 1)
  {
    $start = (($_POST['page'] - 1) * $limit);
    $current = (($_POST['page'] +1 - 1) * $limit);
    $page = $_POST['page'];
  }
  
  else if($limit=="All")
  {
      $start = 0;
      $current=$limit;
      $limit=$total_data;
  }
  else
  {
    $start = 0;
    $current=$limit;
  }
}
else
{
  $limit = '10';
  $page = 1;
  if($_POST['page'] > 1)
  {
    $start = (($_POST['page'] - 1) * $limit);
    $current = (($_POST['page'] +1 - 1) * $limit);
    $page = $_POST['page'];
  }
  else
  {
    $start = 0;
    $current=$limit;
  }


}



$filter_query = $query . ' LIMIT '.$start.', '.$limit.'';
// echo $filter_query;



$result = mysqli_query($mysql, $filter_query);

$total_filter_data = mysqli_num_rows(mysqli_query($mysql, $filter_query));
//echo $total_filter_data ;


if($current>$total_data || $current=='All' )
{
    $try = '<div class="hint-text">Showing <b>'.$total_data.'</b> out of <b>'.$total_data.'</b> entries</div>';
} 
else
{
    $try = '<div class="hint-text">Showing <b>'.$current.'</b> out of <b>'.$total_data.'</b> entries</div>';
}


$output = '


<table class="table table-hover table-de">
  <thead>
  <tr>
        <th scope="col">Order Num</th>
        <th scope="col">Item Qty</th>
        <th scope="col">Sub Total</th>
        <th scope="col">Discount</th>
        <th scope="col">Total</th>
        <th scope="col"></th>
  </tr>
  </thead>
';

while($row = mysqli_fetch_array($result))
{
    $um=$row["Contact"];
    $cond=substr($um, 0, 1);
    if($cond=='+')
    {
         $coytact=$um;
    }
    else
    {
       $mit = substr($um, 1);
       $cas=preg_replace('/\s+/', '', $mit);
       $coytact='+92'.$cas;
    }
    
    
    $qty = mysqli_num_rows(mysqli_query($mysql, "SELECT * FROM `Order` Where Order_ID='".$row['Order_ID']."'"));
    $sub=$row["Total"]+$row["Discount"];
    // $totr=$row["Total"]-$row["Discount"];
    $output .= '
    <tbody>
    <tr>
      <td><a target = "_blank" href="../ord/Order_View.php?GETID='. $row["Order_ID"].'"<i></i><b>'.$row["Order_Number"].'</b></a></td>
      <td>'.$qty.'</td>
      <td>'.$sub.'</td>
      <td>'.$row["Discount"].'</td>
      <td>'.$row["Total"].'</td>
      <td><select class="form-control" name="stat" id="stat">
          <option value="" disabled selected>Select Status</option>
          <option value="Delivered">Delivered</option>
          <option value="Returned">Returned</option>
          <option value="Intransit">Intransit</option>
          <option value="Loss/Conflict">Loss/Conflict</option>
       </select></td>
       <td class="align-middle text-center">
            
              <div class="btn-group align-top" style="margin-top: 5px;">
              <i class="icon-check"></i>
              <input ord="'.$row["Order_ID"].'" type="button" name="qc" id="'. $row["SKU"].'" class="btn qc_data" />
              </div>
        </td>
   </tr>
    </tbody>'
    ;
}


$output .= '
</table>
<br /><div class="hint-text">
<label class="data_count">Total Records -# '.$total_data.'</label></div>
<br>
<br>
<br>
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
    }
    else
    {
      $previous_link = '
      
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id > $total_links)
    {
      $next_link = '
      
        ';
    }
    else
    {
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
<!--<div class="btn-group align-top" style="margin-top: 5px;">-->
<!--            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone-call"><path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>-->
<!--                <a href="tel:'.$coytact.'" class="btn" id="lastclear"></a>-->
<!--                </div>-->
<!--                <div class="btn-group align-top" style="margin-top: 5px;">-->
<!--                <a href="https://wa.me/'.$coytact.'" class="btn"  id="lastclear"><i class="icofont icofont-brand-whatsapp"></i></a>-->
<!--                </div>-->

<!--<div class="btn-group align-top" style="margin-top: 5px;">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone-call"><path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>-->
<!--                 <a href="tel:'.$row["Contact"].'" class="btn" id="lastclear"></a>-->
<!--              </div>-->
<!--              <div class="btn-group align-top" style="margin-top: 5px;">-->
<!--                 <a href="https://wa.me/'.$row["Contact"].'" class="btn"  id="lastclear"><i class="icofont icofont-brand-whatsapp"></i></a>-->
<!--              </div>-->
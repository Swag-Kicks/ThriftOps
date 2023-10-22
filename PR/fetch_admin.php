<?php

session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);

$user=$_SESSION['id'];

$limit = '10';

if(!isset($_POST['limit']))
{
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

$query = "SELECT *,PR.Status as st,GROUP_CONCAT(Items.Item)as item,GROUP_CONCAT(Items.Quantity)as quantity,GROUP_CONCAT(Items.Description) as description FROM PR INNER JOIN Logs ON PR.PR_ID=Logs.Type_ID INNER JOIN Items ON PR.PR_ID=Items.PR_ID ";

if($_POST['query'] != '')
{
    // $records21 = mysqli_query($mysql, "SELECT User_ID FROM `User` WHERE Name='".$row["query"]."'"); 
    // $data21 = mysqli_fetch_array($records21);
    // $name1= $data2[0];
    
    $query .= ' WHERE PR.PR_ID LIKE "%'.str_replace(' ', '%', $_POST['query']).'%"';
}



else if(!empty($_POST['status']))
{
    $status=$_POST['status'];
    
    if($status==1)
    {
        $query .= ' WHERE Logs.DateTime >= DATE_SUB(CURDATE(), INTERVAL 10 DAY)';
    }
    
    else if($status=="Rejected")
    {
        $query .= ' WHERE PR.Status LIKE "%'.$_POST['status'].'" AND Logs.DateTime >= DATE_SUB(CURDATE(), INTERVAL 10 DAY)';
    }
    
    else if($status=="Alteration")
    {
        $query .= ' WHERE PR.Status LIKE "%'.$_POST['status'].' AND Logs.DateTime >= DATE_SUB(CURDATE(), INTERVAL 10 DAY)"';
    }
    
    else if($status=="Delayed")
    {
        $query .= ' WHERE PR.Status LIKE "%'.$_POST['status'].'" AND Logs.DateTime >= DATE_SUB(CURDATE(), INTERVAL 10 DAY)';
    }
    
    else if($status=='Approved')
    {
        $query .= ' WHERE PR.Status LIKE "%'.$_POST['status'].'" AND Logs.DateTime >= DATE_SUB(CURDATE(), INTERVAL 10 DAY)';
    }
     else if($status=='Pending')
    {
        $query .= ' WHERE PR.Status LIKE "%'.$_POST['status'].'" AND Logs.DateTime >= DATE_SUB(CURDATE(), INTERVAL 10 DAY)';
    }
    
    

}
else
{
    $query .= ' WHERE Logs.DateTime >= DATE_SUB(CURDATE(), INTERVAL 10 DAY)';
}
$cc=$_POST['status'];

$query .= ' GROUP BY PR.PR_ID DESC';
//echo $query;
//print_r($total_data);


$filter_query = $query . ' LIMIT '.$start.', '.$limit.'';
//echo $filter_query;



$result = mysqli_query($mysql, $filter_query);

$total_filter_data = mysqli_num_rows(mysqli_query($mysql, $filter_query));
// echo $total_filter_data ;


$output = '
<table class="table table-hover table-de">
  <thead class="">
  <tr>
        <th scope="col">PR ID</th>
        <th scope="col">Request Date</th>
        <th scope="col">Description</th>
        <th scope="col">Items</th>
        <th scope="col">Requester</th>
        <th scope="col">Status</th>
        <th scope="col"></th>
  </tr>
  </thead>
';

while($row = mysqli_fetch_array($result))
{

      $records2 = mysqli_query($mysql, "SELECT Name,Dept_ID FROM `User` WHERE User_ID='".$row["User_ID"]."'"); 
      $data2 = mysqli_fetch_array($records2);
      $name= $data2[0];
      $deptid= $data2[1];
      $st=$row['st'];
      
      if(empty($cc))
      {
          $prst=$row['st'];
          if($prst=="Pending")
          {
                $logic="<div class='btn-group align-middle'>
                                            <a href='#' data-role='approved' id='". $row["PR_ID"]."' class='approveicon'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-check'><polyline points='20 6 9 17 4 12'></polyline></svg></a>
                                        </div>
                                        
                                       <div class='btn-group align-middle text-center'>
                                            <a href='#' data-role='reject' id='". $row["PR_ID"]."' class='sweet-12'><i class='icon-close '></i></a>
                                        </div>
                                        <div class='btn-group align-middle text-center'>
                                        <a href='#' data-role='delayed' id='". $row["PR_ID"]."'> <i class='fa fa-clock-o' width='24' height='24'></i></a>
                                         </div>
                                         <div class='btn-group align-middle text-center'>
                                        <a href='#' data-role='changes' id='". $row["PR_ID"]."'> <i class='icofont icofont-exchange' width='24' height='24'></i></a>
                                         </div>";   
          }
          else
          {
              $logic="";
          }
           
      }
      
      if($cc=='Approved' && $st=='Approved')
      {
          $prst=$row['st'];
          $logic="<div class='btn-group align-middle'>
                                            <a href='#' class='approveicon' ><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='red' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-check'><polyline points='20 6 9 17 4 12'></polyline></svg></a>
                                        </div>
                                        
                                       <div class='btn-group align-middle text-center'>
                                            <a href='#' class='sweet-12'><i class='icon-close '></i></a>
                                        </div>
                                        <div class='btn-group align-middle text-center'>
                                        <a href='#'> <i class='fa fa-clock-o' width='24' height='24'></i></a>
                                         </div>
                                         <div class='btn-group align-middle text-center'>
                                        <a href='#'> <i class='icofont icofont-exchange' width='24' height='24'></i></a>
                                         </div>"; 
      }
      if($cc=='Rejected')
      {
          $prst=$row['st'];
          $logic="<div class='btn-group align-middle'>
                                            <a href='#' class='approveicon' ><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-check'><polyline points='20 6 9 17 4 12'></polyline></svg></a>
                                        </div>
                                        
                                       <div class='btn-group align-middle text-center'>
                                            <a href='#' class='sweet-12'><i class='icon-close red'></i></a>
                                        </div>
                                        <div class='btn-group align-middle text-center'>
                                        <a href='#'> <i class='fa fa-clock-o' width='24' height='24'></i></a>
                                         </div>
                                         <div class='btn-group align-middle text-center'>
                                        <a href='#'> <i class='icofont icofont-exchange' width='24' height='24'></i></a>
                                         </div>"; 
      }
      if($cc=='Delayed')
      {
          $prst=$row['st'];
          $logic="<div class='btn-group align-middle'>
                                            <a href='#' class='approveicon' ><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-check'><polyline points='20 6 9 17 4 12'></polyline></svg></a>
                                        </div>
                                        
                                       <div class='btn-group align-middle text-center'>
                                            <a href='#' class='sweet-12'><i class='icon-close '></i></a>
                                        </div>
                                        <div class='btn-group align-middle text-center'>
                                        <a href='#'> <i class='fa fa-clock-o red' width='24' height='24'></i></a>
                                         </div>
                                         <div class='btn-group align-middle text-center'>
                                        <a href='#'> <i class='icofont icofont-exchange' width='24' height='24'></i></a>
                                         </div>"; 
      }
      
      if($cc=='Alteration' && $st== 'Alteration')
      {
          $prst=$row['st'];
          $logic="<div class='btn-group align-middle'>
                                            <a href='#' class='approveicon' ><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-check'><polyline points='20 6 9 17 4 12'></polyline></svg></a>
                                        </div>
                                        
                                       <div class='btn-group align-middle text-center'>
                                            <a href='#' class='sweet-12'><i class='icon-close '></i></a>
                                        </div>
                                        <div class='btn-group align-middle text-center'>
                                        <a href='#'> <i class='fa fa-clock-o' width='24' height='24'></i></a>
                                         </div>
                                         <div class='btn-group align-middle text-center'>
                                        <a href='#'> <i class='icofont icofont-exchange red' width='24' height='24'></i></a>
                                         </div>"; 
      }
      if($cc=='Pending')
      {
          $prst=$row['st'];
          $logic="<div class='btn-group align-middle'>
                                            <a href='#' data-role='approved' id='". $row["PR_ID"]."' class='approveicon'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-check'><polyline points='20 6 9 17 4 12'></polyline></svg></a>
                                        </div>
                                        
                                       <div class='btn-group align-middle text-center'>
                                            <a href='#' data-role='reject' id='". $row["PR_ID"]."' class='sweet-12'><i class='icon-close '></i></a>
                                        </div>
                                        <div class='btn-group align-middle text-center'>
                                        <a href='#' data-role='delayed' id='". $row["PR_ID"]."'> <i class='fa fa-clock-o' width='24' height='24'></i></a>
                                         </div>
                                         <div class='btn-group align-middle text-center'>
                                        <a href='#' data-role='changes' id='". $row["PR_ID"]."'> <i class='icofont icofont-exchange' width='24' height='24'></i></a>
                                         </div>"; 
      }
      if($cc=='1')
      {
          $prst=$row['st'];
          if($prst=="Pending")
          {
                $logic="<div class='btn-group align-middle'>
                                            <a href='#' data-role='approved' id='". $row["PR_ID"]."' class='approveicon'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-check'><polyline points='20 6 9 17 4 12'></polyline></svg></a>
                                        </div>
                                        
                                      <div class='btn-group align-middle text-center'>
                                            <a href='#' data-role='reject' id='". $row["PR_ID"]."' class='sweet-12'><i class='icon-close '></i></a>
                                        </div>
                                        <div class='btn-group align-middle text-center'>
                                        <a href='#' data-role='delayed' id='". $row["PR_ID"]."'> <i class='fa fa-clock-o' width='24' height='24'></i></a>
                                         </div>
                                         <div class='btn-group align-middle text-center'>
                                        <a href='#' data-role='changes' id='". $row["PR_ID"]."'> <i class='icofont icofont-exchange' width='24' height='24'></i></a>
                                         </div>";   
          }
          else
          {
              $logic="";
          }
      }
      
      
   

$total_data=mysqli_num_rows(mysqli_query($mysql, $query));
      
    $output .= '
    <tbody>
    <tr>
      <td>'.$row["PR_ID"].'</td>
      <td>'.$row["Required_Date"].'</td>
      <td><details><summary>View</summary> '.$row["Description"].'</details></td>
      <td><details><summary>View</summary> '.$row["item"].'</details></td>
      <td>'.$name.'</td>
      <td>'.$prst.'</td>
      <td>'.$logic.'</td>                              
       <td class="align-middle text-center">
      <div class="btn-group align-top">
                                            <a href="#" data-role="prview" data-id="'.$row["PR_ID"].'"><img class="icons" src="https://backup.thriftops.com/assets/images/icons/eye.png"></a>
                                        </div>
        </td>
         <td style="display:none;"><input type="hidden" name="pr" value="'.$row["PR_ID"].'" id="pr" /></td>
    </tr>
    </tbody>'
    ;
}


$output .= '
</table>
<br /><label class="data_count">Total Records - '.$total_data.'</label>

<div align="center">
  <ul class="pagination">
';

$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;
//  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg>
    //             <div class="" style="margin-top: 5px;">
    //                     <input type="button" id="'. $row["PR_ID"].'" class="save mark_data" />
    //             </div>
//<select class="form-control" id="stat" name="stat" style="width: 125px;">'.get_select().'</select>
// <th scope="col">Quantity</th>
//         <th scope="col">Description</th>
//   <td>'.$row["quantity"].'</td>
//   <td style="width: 30px !important; max-width: 20px;">'.$row["description"].'</td>

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
<script src="../assets/js/sweet-alert/sweetalert.min.js"></script>
<script src="../assets/js/sweet-alert/app.js"></script>


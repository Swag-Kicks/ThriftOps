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

$query = "SELECT *,GROUP_CONCAT(Items.Item)as item,GROUP_CONCAT(Items.Quantity)as quantity,GROUP_CONCAT(Items.Description) as description FROM PR INNER JOIN Items ON PR.PR_ID=Items.PR_ID";

if($_POST['query'] != '')
{
    $query .= ' WHERE PR.PR_ID LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" AND PR_Log.User_ID="'.$user.'"';
}

else if(!empty($_POST['status']))
{
    $status=$_POST['status'];
    
    if($status==1)
    {
        $query .= ' WHERE 1=1';
    }
    
    else if($status!="Approved")
    {
        $query .= ' WHERE PR.Status LIKE "%'.$_POST['status'].'"';
    }
    
    else if($status=='Approved')
    {
        $query .= ' WHERE PR.Status="Approved"';
    }
    
    

}

$query .= ' GROUP BY PR.PR_ID DESC';
//echo $query;
$total_data=mysqli_num_rows(mysqli_query($mysql, $query));
//print_r($total_data);


$filter_query = $query . ' LIMIT '.$start.', '.$limit.'';
//echo $filter_query;



$result = mysqli_query($mysql, $filter_query);

$total_filter_data = mysqli_num_rows(mysqli_query($mysql, $filter_query));
// echo $total_filter_data ;

$cc=$_POST['status'];

if($cc=='Approved')
{
    
   $output = '
    <table class="table table-hover">
      <thead >
      <tr>
            <th scope="col">PR ID</th>
            <th scope="col">Items</th>
            <th scope="col">Description</th>
            <th scope="col">Quantity</th>
            <th scope="col">Request Date</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
      </tr>
      </thead>
    '; 
}
else
{
    $output = '
    <table class="table table-hover">
      <thead>
      <tr>
            <th scope="col">PR ID</th>
            <th scope="col">Items</th>
            <th scope="col">Description</th>
            <th scope="col">Quantity</th>
            <th scope="col">Request Date</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
      </tr>
      </thead>
    ';
}


while($row = mysqli_fetch_array($result))
{

  
      
      
    //   $records2 = mysqli_query($mysql, "SELECT Name,Dept_ID FROM `User` WHERE User_ID='".$row["User_ID"]."'"); 
    //   $data2 = mysqli_fetch_array($records2);
    //   $name= $data2[0];
    //   $deptid= $data2[1];
      
    //   $records1 = mysqli_query($mysql, "SELECT Name FROM `Department` WHERE Dept_ID='".$deptid."'"); 
    //   $data1 = mysqli_fetch_array($records1);
    //   $dept = $data1[0];
      
      
    //   $records2 = "SELECT * FROM PR INNER JOIN PO ON PR.PR_ID=PO.PR_ID Where PO.PR_ID='".$row["PR_ID"]."'"; 
    //   $data2 = mysqli_num_rows(mysqli_query($mysql, $records2));
      
    //   if($data2>0)
    //   {
    //       $p2w= "<td>Created</td>";
    //   }
    //   else
    //   {
    //       $p2w= "<td>Not Created</td>";
    //   }
    
    $quanty=$row["quantity"];
    $var=explode(",",$quanty);
    $man=0;
    foreach($var as $quna)
    {
        $man+=$quna;
    }
      
      if($cc=='Approved')
      {
            $output .= '
            <tbody>
            <tr>
              <td>'.$row["PR_ID"].'</td>
              <td><details><summary>View</summary> '.$row["item"].'</details></td>
              <td><details><summary>View</summary> '.$row["description"].'</details></td>
              <td>'.$man.'</td>
              <td>'.$row["Required_Date"].'</td>
              <td><font class="app">'.$row["Status"].'</font></td>
              <td class="align-middle ">
                                        <div class="btn-group align-top">
                                            <a href="#" data-role="prview" data-id="'.$row["PR_ID"].'"><img class="icons" src="https://backup.thriftops.com/assets/images/icons/eye.png"></a>
                                        </div>
                                       <div class="btn-group align-middle text-center">
                                            <a href="#" data-role="infrm" data-id="'.$row["PR_ID"].'"><img class=""  src="https://backup.thriftops.com/assets/images/icons/edit.png"></a>
                                        </div>
                                    </td>
            </tr>
            </tbody>'
            ;
      }
      else
      {

     
          if($row["Status"]=='Approved')
          {
              $p1w="<font class='app'>".$row['Status']."</font>";
              $p2w= "<td class='align-middle'>
                    <div class='btn-group align-top'>
                       <a href='#' data-role='prview' data-id='".$row["PR_ID"]."'><img class='icons' src='https://backup.thriftops.com/assets/images/icons/eye.png'></a>
                    </div>
                    <div class='btn-group align-top'>
                        <a href='#'' data-role='infrm' data-id='".$row["PR_ID"]."'><img class=''  src='https://backup.thriftops.com/assets/images/icons/edit.png'></a>
                    </div>";
          }
          if($row["Status"]=='Rejected')
          {
              $p1w="<font class='rej'>".$row['Status']."</font>";
              $p2w= "<td class='align-middle'>
                        <div class='btn-group align-top'>
                            <a href='#' data-role='prview' data-id='".$row["PR_ID"]."'><img class='icons' src='https://backup.thriftops.com/assets/images/icons/eye.png'></a>
                        </div>
                    </div>";
          }
          
          if($row["Status"]=='Alteration')
          {
              $p1w="<font class='alt'>".$row['Status']."</font>";
              $p2w= "<td class='align-middle'>
                        <div class='btn-group align-top'>
                            <a href='#' data-role='prview' data-id='".$row["PR_ID"]."'><img class='icons' src='https://backup.thriftops.com/assets/images/icons/eye.png'></a>
                        </div>
                    </div>";
          }
          
          if($row["Status"]=='Delayed')
          {
              $p1w="<font class='del'>".$row['Status']."</font>";
              $p2w= "<td class='align-middle'>
                        <div class='btn-group align-top'>
                            <a href='#' data-role='prview' data-id='".$row["PR_ID"]."'><img class='icons' src='https://backup.thriftops.com/assets/images/icons/eye.png'></a>
                        </div>
                    </div>";
          }
          if($row["Status"]=='Pending')
          {
              $p1w="<font class='pen'>".$row['Status']."</font>";
              $p2w= "<td class='align-middle'>
                        <div class='btn-group align-top'>
                            <a href='#' data-role='prview' data-id='".$row["PR_ID"]."'><img class='icons' src='https://backup.thriftops.com/assets/images/icons/eye.png'></a>
                        </div>
                    </div>";
          }
          
          
          $output .= '
            <tbody>
            <tr>
              <td>'.$row["PR_ID"].'</td>
              <td><details><summary>View</summary> '.$row["item"].'</details></td>
              <td><details><summary>View</summary> '.$row["description"].'</details></td>
              <td>'.$man.'</td>
              <td>'.$row["Required_Date"].'</td>
              <td>'.$p1w.'</td>
              <td>'.$p2w.'</td>
            </tr>
            </tbody>'
            ;
      }

      
  
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

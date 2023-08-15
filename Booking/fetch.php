<?php

include_once("../include/mysql_connection.php"); 
error_reporting(0);

$query = "SELECT *,GROUP_Concat(SKU) as con FROM `Order`";


if(isset($_POST['cond']))
{
    $cond=$_POST['cond'];
    
    if($cond=="Confirmed")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 if($_POST['courier'] != '')
                 {
                     $query .= ' WHERE Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%" AND Status LIKE "%'.str_replace(' ', '%', $_POST['cond']).'%" AND Date > 2023-08-13';
                 }
                 if($_POST['courier'] == '')
                 {
                    $query .= ' WHERE Status LIKE "%'.str_replace(' ', '%', $_POST['cond']).'%" AND Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
                 }
             }
        }
        if($_POST['courier'] != '' && $_POST['from'] == '' && $_POST['to'] == '')
        {
          $query .= ' WHERE Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%" AND Status LIKE "%'.str_replace(' ', '%', $_POST['cond']).'%"';
        }
        if($_POST['courier'] == '' && $_POST['from'] == '' && $_POST['to'] == '')
        {
           $query .= ' WHERE Status LIKE "%'.str_replace(' ', '%', $_POST['cond']).'%"';
        }
    }
}
// else
// {
//     $query .= ' WHERE Status LIKE "%None%" OR Status LIKE "%Confirmed%" OR Status LIKE "%Cancel%" OR Status LIKE "%Hold%" OR Status LIKE "%Reattempt%" ';
// }


if(!empty($_POST['ordernum']))
{
    $ord=$_POST['ordernum'];
    if(is_numeric($cut))
    {
        $query .= ' WHERE Order_Number LIKE "%#'.str_replace(' ', '%', $_POST['ordernum']).'%" AND Status in ("Confirmed","Dispatched","InTransit","Delivered","Returned","Loss","Booked","Picked","Received")';
    }
    else
    {
       $query .= ' WHERE Order_Number LIKE "%'.str_replace(' ', '%', $_POST['ordernum']).'%" AND Status in ("Confirmed","Dispatched","InTransit","Delivered","Returned","Loss","Booked","Picked","Received")';
    }
    
}
if($_POST['customer'] != '')
{
    $cut=$_POST['customer'];
    if(is_numeric($cut))
    {
        $query .= ' WHERE Contact LIKE "%'.str_replace(' ', '%', $_POST['customer']).'%" AND Status in ("Confirmed","Exchange","Dispatched","InTransit","Delivered","Returned","Loss","Booked","Packed","Received","Picked")';
    }
    else
    {
       $query .= ' WHERE Name LIKE "%'.str_replace(' ', '%', $_POST['customer']).'%" AND Status in ("Confirmed","Exchange","Dispatched","InTransit","Delivered","Returned","Loss","Booked","Packed","Received","Picked")'; 
    }
    
}
if($_POST['city'] != '')
{
  $query .= ' WHERE City LIKE "%'.str_replace(' ', '%', $_POST['city']).'%" AND Status in ("Confirmed","Exchange","Dispatched","InTransit","Delivered","Returned","Loss","Booked","Packed","Received","Picked")';
}
if($_POST['items'] != '')
{
  $query .= ' WHERE SKU LIKE "%'.str_replace(' ', '%', $_POST['items']).'%" AND Status in ("Confirmed","Exchange","Dispatched","InTransit","Delivered","Returned","Loss","Booked","Packed","Received","Picked")';
}
if($_POST['amount'] != '')
{
  $query .= ' WHERE Total LIKE "%'.str_replace(' ', '%', $_POST['amount']).'%" AND Status in ("Confirmed","Exchange","Dispatched","InTransit","Delivered","Returned","Loss","Booked","Packed","Received","Picked")';
}

if($_POST['tracking'] != '')
{
  $query .= ' WHERE Tracking LIKE "%'.str_replace(' ', '%', $_POST['tracking']).'%" AND Status in ("Confirmed","Exchange","Dispatched","InTransit","Delivered","Returned","Loss","Booked","Packed","Received","Picked")';
}

// if($_POST['courier'] != '')
// {
//   $query .= ' WHERE Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%" AND Status in ("Confirmed","Exchange","Dispatched","InTransit","Delivered","Returned","Loss","Booked","Packed","Received","Picked")';
// }




if($_POST['sort'])
{
    $sort=$_POST['sort'];
    if($sort=='ASC')
    {
        $query .= ' GROUP BY Order_ID ASC';
    }
    if($sort=='DESC')
    {
        $query .= ' GROUP BY Order_ID DESC';
    }
}
else
{
    $query .= ' GROUP BY Order_ID DESC';
}


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

<table class="table table-hover" id="booking">
';

while($row = mysqli_fetch_array($result))
{
    
    $stat=$row['Status'];
    //items count
    $records2 = "SELECT * FROM `Order` WHERE Order_ID='".$row["Order_ID"]."'"; 
    $quantity = mysqli_num_rows(mysqli_query($mysql, $records2));
    
    if($stat=='Confirmed')
    {
        $s="Unbooked";
        $output .= '
        
        <tbody id="tbody" style="text-align:center">
        <tr>
        
          <td>'.$row["Order_Number"].'</td>
          <td class="book">'.$row["Name"].'<br>'.$row["Contact"].'</td>
          <td>'.$row['City'].'</td>
          <td><details class="onhover-dropdown clickT" id="itemcheck" data-id="'.$row["Order_ID"].'"><summary>'.$quantity.' Items</summary><div class="align-middle text-center"><ul id="itemfetch" class="chat-dropdown onhover-show-div1"></ul></div></details></td>
          <td>'.$row['Total'].'</td>
          <td >'.$row['Tracking'].'</td>
          <td>'.$row['Courier'].'</td>
          <td>'.$s.'</td>
          <td>'.$row["Date"].'</td>
           <td class="align-middle text-center">
          <div class="btn-group align-top">
                                            <select class="mark" name="'.$row["Order_ID"].'" id="unbookopt">
                                              <option disabled selected>
                                              </option>
                                              <option value="Book">Book</option>
                                              <option value="view">View Order</option>
                                              <option value="update">Add Tracking</option>
                                            </select>
                                            
            </td>
             
        </tr>
        </tbody>'
        ;
        
    }
    else
    {
        $s=$row["Status"];
        $output .= '
        
        <tbody id="tbody" style="text-align:center">
        <tr>
        
          <td>'.$row["Order_Number"].'</td>
          <td class="book">'.$row["Name"].'<br>'.$row["Contact"].'</td>
          <td>'.$row['City'].'</td>
          <td><details class="onhover-dropdown clickT" id="itemcheck" data-id="'.$row["Order_ID"].'"><summary>'.$quantity.' Items</summary><div class="align-middle text-center"><ul id="itemfetch" class="chat-dropdown onhover-show-div1"></ul></div></details></td>
          <td>'.$row['Total'].'</td>
          <td >'.$row['Tracking'].'</td>
          <td>'.$row['Courier'].'</td>
          <td>'.$s.'</td>
          <td>'.$row["Date"].'</td>
           <td class="align-middle text-center">
           
          <div class="btn-group align-top">
                                            <select class="mark" name="'.$row["Order_ID"].'" id="rebookopt">
                                              <option disabled selected></option>
                                              <option value="Rebook">Re-Book</option>
                                              <option value="fetch">Fetch Status</option>
                                              <option value="view">View Order</option>
                                              <option value="cancel">Cancel Booking</option>
                                            </select>
                                            
                                            
            </td>
             
        </tr>
        </tbody>'
        ;
         
    }

    
    
}

 
$output .= '
</table>
<br />'.$try.'
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
          <a href="#">...</a>
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
<script>
var details = [...document.querySelectorAll('details')];
document.addEventListener('click', function(e) {
  if (!details.some(f => f.contains(e.target))) {
    details.forEach(f => f.removeAttribute('open'));
  } else {
    details.forEach(f => !f.contains(e.target) ? f.removeAttribute('open') : '');
  }
})


</script>

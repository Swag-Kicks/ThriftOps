<?php

include_once("../include/mysql_connection.php"); 
error_reporting(0);

$query = "SELECT * FROM `Order`";


if(isset($_POST['cond']))
{
    $cond=$_POST['cond'];
    
    if($cond=="all")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Shipping_Status in ("RReceived","Received","Exchange") AND Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
             }
        }
        else
        {
            $query .= ' WHERE Shipping_Status in ("RReceived","Received","Exchange")';
        }
    }
    if($cond=="Tobe")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Shipping_Status in ("Received","Exchange") AND Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
             }
        }
        else
        {
            $query .= ' WHERE Shipping_Status in ("Received","Exchange")';
        }
    }
    if($cond=="Received")
    {
       if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Shipping_Status LIKE "%RReceived%" AND Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
             }
        }
        else
        {
            $query .= ' WHERE Shipping_Status LIKE "%RReceived%"';
        }
    }
    if($cond=="WReceived")
    {
       if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Shipping_Status LIKE "%WReceived%" AND Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
             }
        }
        else
        {
            $query .= ' WHERE Shipping_Status LIKE "%WReceived%"';
        }
    }

}



if(!empty($_POST['ordernum']))
{
    $ord=$_POST['ordernum'];
    if(is_numeric($cut))
    {
        $query .= ' WHERE Order_Number LIKE "%#'.str_replace(' ', '%', $_POST['ordernum']).'%" AND Status in ("Booked","Picked","Not_Found","QC_Rejected")';
    }
    else
    {
       $query .= ' WHERE Order_Number LIKE "%'.str_replace(' ', '%', $_POST['ordernum']).'%" AND Status in  ("Booked","Picked","Not_Found","QC_Rejected")';
    }
    
}


if($_POST['items'] != '')
{
  $query .= ' WHERE SKU LIKE "%'.str_replace(' ', '%', $_POST['items']).'%" AND Status in  ("Booked","Picked","Not_Found","QC_Rejected")';
}




if($_POST['sort'])
{
    $sort=$_POST['sort'];
    if($sort=='ASC')
    {
        $query .= ' ORDER BY Order_ID ASC';
    }
    if($sort=='DESC')
    {
        $query .= ' ORDER BY Order_ID DESC';
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

$count=1;
if($current>$total_data || $current=='All' )
{
    $try = '<div class="hint-text">Showing <b>'.$total_data.'</b> out of <b>'.$total_data.'</b> entries</div>';
} 
else
{
    $try = '<div class="hint-text">Showing <b>'.$current.'</b> out of <b>'.$total_data.'</b> entries</div>';
}
            
$output = '

<table class="table table-hover" id="allproduct">
';

while($row = mysqli_fetch_array($result))
{
    
 
    
    //image
    $records2 = mysqli_query($mysql,"SELECT Image_1,Title AS img FROM addition WHERE SKU='".$row["SKU"]."'"); 
    $data2 = mysqli_fetch_array($records2);
    $pr= $data2[0];
    $title=$data2[1];
    $img=  "<img src = '$pr' width='100' height='100' >";
  
 
    $output .= '
    
    <tbody id="tbody" style="text-align:center">
    <tr>
      <td><input type="checkbox" name="check[]" value="'.$row["id"].'"/>
      <td>'.$row['SKU'].'</td>
      <td>'.$title.'</td>
      <td>'.$img.'</td>
      <td>'.$row["Price"].'</td>
      <td>'.$row['Order_Number'].'</td>
      <td>'.$row['Tracking'].'</td>
      <td>'.$row["Shipping_Status"].'</td>
      <td>'.$row["Date"].'</td>
      <td class="align-middle text-center">
      <div class="btn-group align-top">
                                        <select class="mark" name="'.$row["Order_ID"].'" sku="'.$row["SKU"].'" id="mark">
                                          <option disabled selected>
                                          </option>
                                          <option value="marked">Mark As Received</option>
                                          <option value="wrong">Wrong item Received</option>
                                        </select>
        </td>
       
    </tr>
    </tbody>'
    ;
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

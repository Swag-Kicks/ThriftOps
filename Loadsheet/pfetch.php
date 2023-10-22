<?php

session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);

$query = "SELECT * FROM `LoadSheet`";


if(isset($_POST['courier']))
{
    $courier=$_POST['courier'];
    
    if($courier=="all")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                $query .= ' WHERE Courier in ("CallCourier","PostEx","Rider","Tcs","Self","Leopard") AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
             }
        }
        else
        {
            $query .= ' WHERE Courier in ("CallCourier","PostEx","Rider","Tcs","Self","Leopard")';
        }
            
    }
    if($courier=="PostEx")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%" AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
             }
        }
        else
        {
            $query .= ' WHERE Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%"';
        }
    }
    if($courier=="Leopard")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%" AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
             }
        }
        else
        {
            $query .= ' WHERE Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%"';
        }
    }
    if($courier=="Self")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%" AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
             }
        }
        else
        {
            $query .= ' WHERE Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%"';
        }
    }
    if($courier=="Rider")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%" AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
             }
        }
        else
        {
            $query .= ' WHERE Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%"';
        }
    }
    
    if($courier=="Tcs")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%" AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
             }
        }
        else
        {
            $query .= ' WHERE Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%"';
        }
    }
    
     if($courier=="CallCourier")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%" AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
             }
        }
        else
        {
            $query .= ' WHERE Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%"';
        }
    }
}



if($_POST['sort'])
{
    $sort=$_POST['sort'];
    if($sort=='ASC')
    {
        $query .= ' GROUP BY DateTime ASC';
    }
    if($sort=='DESC')
    {
        $query .= ' GROUP BY DateTime DESC';
    }
}
else
{
    $query .= ' GROUP BY DateTime DESC';
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
//echo $filter_query;



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
        <th scope="col">Sno</th>
        <th scope="col">Courier</th>
        <th scope="col">Creation Date</th>
        <th scope="col">Download</th>
  </tr>
  </thead>
';

while($row = mysqli_fetch_array($result))
{
    $find=mysqli_query($mysql, "SELECT * FROM `LoadSheet` WHERE Courier='".$row['Courier']."' AND DateTime='".$row['DateTime']."'");
    while($file=mysqli_fetch_array($find))
    {
        if($file['File']=='CSV')
        {
            $csv=$file['Path'];    
        }
        if($file['File']=='PDF')
        {
            $pdf=$file['Path'];    
        }
        
        
    }
   
    
    $qty = mysqli_num_rows(mysqli_query($mysql, "SELECT * FROM `Order` Where Order_ID='".$row['Order_ID']."'"));
    $output .= '
    <tbody>
    <tr>
      <td>#'.$row['id'].'</td> 
      <td>'.$row["Courier"].'</td>
      <td>'.$row["DateTime"].'</td>
      <td>
      <div class="btn-group align-middle">
            <div class="btn-group align-middle text-center">
                <a target="_blank" href="'.$csv.'"><img src="https://w7.pngwing.com/pngs/757/387/png-transparent-brand-artikel-market-price-csv-text-photography-logo-thumbnail.png" style="width:42px;height:42px;"></a>
            </div>
            <div class="btn-group align-middle text-center">
                <a target="_blank" href="'.$pdf.'"><img src="https://w7.pngwing.com/pngs/771/299/png-transparent-pdf-computer-icons-document-file-format-pdf-miscellaneous-text-rectangle-thumbnail.png" style="width:42px;height:42px;"></a>
            </div>
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
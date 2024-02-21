<?php

session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);
$cr=$_SESSION['id'];
//session work
$pr="Select * from User Where Dept_ID=6 AND User_ID='$cr' OR Dept_ID=18 AND User_ID='$cr' OR Dept_ID=3 AND User_ID='$cr'";
$my=  mysqli_query($mysql, $pr);
$rowq1 =mysqli_fetch_array($my);

if($rowq1['Dept_ID']==18)
{
    $war=$rowq1['Warehouse_ID'];
    $find=mysqli_query($mysql,"SELECT Vendor.SK_Prefix FROM `Vendor` inner join `User` On `Vendor`.Name=`User`.Name where `Vendor`.Warehouse_ID='$war' group by SK_Prefix");
    $rt = "SKU REGEXP '^(";
    while ($run = mysqli_fetch_assoc($find))
    {
        $skPrefix = mysqli_real_escape_string($mysql, $run['SK_Prefix']);
        $rt .="$skPrefix-|";
        
    }
    
    if (!empty($rt)) {
        $rt = rtrim($rt, " | ");
     }
     $rt.=")'";
}
else
{
    //find others
    $fd=mysqli_query($mysql,"SELECT group_concat(DISTINCT Warehouse_ID) as merge from User Where Dept_ID=18 and Warehouse_ID !=''");
    $r = mysqli_fetch_assoc($fd);
    $merge=$r['merge'];
    $commaSeparatedString = implode(',', explode(',', $merge));
    $find=mysqli_query($mysql,"SELECT Vendor.SK_Prefix FROM `Vendor` inner join `User` On `Vendor`.Name=`User`.Name where `Vendor`.Warehouse_ID NOT In ($commaSeparatedString) group by SK_Prefix");
    $rt = "SKU REGEXP '^(";
    while ($run = mysqli_fetch_assoc($find))
    {
        $skPrefix = mysqli_real_escape_string($mysql, $run['SK_Prefix']);
        $rt .="$skPrefix-|";
        
    }
    
    if (!empty($rt)) {
        $rt = rtrim($rt, " | ");
     }
     $rt.=")'";
}



$query = "SELECT * FROM `Order`";

if(!empty($_POST['ordernum']))
{
    $ord=$_POST['ordernum'];
    if(is_numeric($cut))
    {
        $query .= ' WHERE Order_Number LIKE "%#'.str_replace(' ', '%', $_POST['ordernum']).'%" AND Status="Packed" AND '.$rt.' AND Status NOT in ("Booked","Recieved","Dispatched","Confirmed","Hold","Wfr","Cancel","Picked")';
    }
    else
    {
       $query .= ' WHERE Order_Number LIKE "%'.str_replace(' ', '%', $_POST['ordernum']).'%" AND Status="Packed" AND '.$rt.' AND Status NOT in ("Booked","Recieved","Dispatched","Confirmed","Hold","Wfr","Cancel","Picked")';
    }
    
}
else if(isset($_POST['courier']))
{
    $courier=$_POST['courier'];
    
    if($courier=="all")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                $query .= ' WHERE Status="Packed" AND '.$rt.' AND Status NOT in ("Booked","Recieved","Dispatched","Confirmed","Hold","Wfr","Cancel","Picked") AND Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
             }
        }
        
        else
        {
            $query .= ' WHERE Status="Packed" AND '.$rt.' AND Status NOT in ("Booked","Recieved","Dispatched","Confirmed","Hold","Wfr","Cancel","Picked")';
        }
            
    }
    if($courier=="PostEx")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Status="Packed" AND '.$rt.' AND Status NOT in ("Booked","Recieved","Dispatched","Confirmed","Hold","Wfr","Cancel","Picked") AND Courier="PostEx" AND Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
             }
        }
        else
        {
            $query .= ' WHERE Status="Packed" AND '.$rt.' AND Status NOT in ("Booked","Recieved","Dispatched","Confirmed","Hold","Wfr","Cancel","Picked") AND Courier="PostEx"';
        }
    }
    if($courier=="Leopard")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Status="Packed" AND '.$rt.' AND Status NOT in ("Booked","Recieved","Dispatched","Confirmed","Hold","Wfr","Cancel","Picked") AND Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%" AND Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
             }
        }
        else
        {
            $query .= ' WHERE Status="Packed" AND '.$rt.' AND Status NOT in ("Booked","Recieved","Dispatched","Confirmed","Hold","Wfr","Cancel","Picked") AND Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%"';
        }
    }
    if($courier=="Self")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Status="Packed" AND '.$rt.' AND Status NOT in ("Booked","Recieved","Dispatched","Confirmed","Hold","Wfr","Cancel","Picked") AND Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%" AND Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
             }
        }
        else
        {
            $query .= ' WHERE Status="Packed" AND '.$rt.' AND Status NOT in ("Booked","Recieved","Dispatched","Confirmed","Hold","Wfr","Cancel","Picked") AND Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%"';
        }
    }
    if($courier=="Rider")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Status="Packed" AND '.$rt.' AND Status NOT in ("Booked","Recieved","Dispatched","Confirmed","Hold","Wfr","Cancel","Picked") AND Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%" AND Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
             }
        }
        else
        {
            $query .= ' WHERE Status="Packed" AND '.$rt.' AND Status NOT in ("Booked","Recieved","Dispatched","Confirmed","Hold","Wfr","Cancel","Picked") AND Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%"';
        }
    }
    
    if($courier=="Tcs")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Status="Packed" AND '.$rt.' AND Status NOT in ("Booked","Recieved","Dispatched","Confirmed","Hold","Wfr","Cancel","Picked") AND Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%" AND Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
             }
        }
        else
        {
            $query .= ' WHERE Status="Packed" AND '.$rt.' AND Status NOT in ("Booked","Recieved","Dispatched","Confirmed","Hold","Wfr","Cancel","Picked") AND Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%"';
        }
    }
    
     if($courier=="CallCourier")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Status="Packed" AND '.$rt.' AND Status NOT in ("Booked","Recieved","Dispatched","Confirmed","Hold","Wfr","Cancel","Picked") AND Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%" AND Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
             }
        }
        else
        {
            $query .= ' WHERE Status="Packed" AND '.$rt.' AND Status NOT in ("Booked","Recieved","Dispatched","Confirmed","Hold","Wfr","Cancel","Picked") AND Courier LIKE "%'.str_replace(' ', '%', $_POST['courier']).'%"';
        }
    }
}



if($_POST['sort'])
{
    $sort=$_POST['sort'];
    if($sort=='ASC')
    {
        $query .= ' GROUP BY Order_Number ASC';
    }
    if($sort=='DESC')
    {
        $query .= ' GROUP BY Order_Number DESC';
    }
}
else
{
    $query .= ' GROUP BY Order_Number DESC';
}


// echo $query;
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
        <th scope="col"><input class="checkbox1" id="allcb" type="checkbox"></th>
        <th scope="col">Order Ref</th>
        <th scope="col">Tracking#</th>
        <th scope="col">Item Qty</th>
        <th scope="col">Amount</th>
        <th scope="col">Date</th>
  </tr>
  </thead>
';

while($row = mysqli_fetch_array($result))
{
    $qty = mysqli_num_rows(mysqli_query($mysql, "SELECT * FROM `Order` Where Order_ID='".$row['Order_ID']."' AND Order_Number='".$row["Order_Number"]."'"));
    $output .= '
    <tbody>
    <tr>
      <td ><input class="checkbox1" name="check[]" type="checkbox"  ord="'.$row["Order_Number"].'" value="'.$row["Order_ID"].'"></td> 
      <td><a target = "_blank" href="../ord/Order_View.php?GETID='. $row["Order_ID"].'"<i></i><b>'.$row["Order_Number"].'</b></a></td>
      <td>'.$row["Tracking"].'</td>
      <td>'.$qty.'</td>
      <td>'.$row["Total"].'</td>
      <td>'.$row["Date"].'</td>
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
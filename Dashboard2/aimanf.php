<?php

include_once("../include/mysql_connection.php"); 
error_reporting(0);

$query = "Select Order_Number, SKU, Price, Tracking , Courier, Logs.DateTime as Date from `Order` INNER JOIN Logs on Order.Order_ID = Logs.Type_ID";

    
if(!empty($_POST['from']))
{
     if(!empty($_POST['to']))
     {
        $to=$_POST['to'];
        $from=$_POST['from'];
        
        $query .= " WHERE Logs.Status = 'Dispatched' and Logs.DateTime between '$from 00:00:00' AND '$to 23:59:59' ";
     }
}
else
{
    $query .= " WHERE Logs.Status = 'Dispatched' and  MONTH(Logs.DateTime) = MONTH(now()) and YEAR(Logs.DateTime) = YEAR(now()) ";
}
    





if($_POST['sort'])
{
    $sort=$_POST['sort'];
    if($sort=='ASC')
    {
        $query .= ' ORDER BY Order_Number ASC';
    }
    if($sort=='DESC')
    {
        $query .= ' ORDER BY Order_Number DESC';
    }
}
else
{
    $query .= ' ORDER BY Order_Number DESC';
}


{
  if(!empty($_POST['vendor']))
  {
      
    // $query .= ' WHERE Vendor_ID= "'.$_POST['vendor'].'" '; 
      
  }
   
  else
     {
       $query .= ' WHERE 1=1';
      }

}

// $query = "SELECT 'Name' FROM Vendor";

//         //vendor
// if($_POST['ven'])
//         {
//             $query .= ' WHERE Vendor_ID="'.$_POST['ven'];
//         }
      
        

echo $query;
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
<label class="data_count">Total Records - '.$total_data.'</label>
<table id="allproduct" class="table table-hover">
  <thead style="text-align:center">
  <tr>
        <th>Order ID</th>
        <th>SKU</th>
        <th>Selling Price</th>
        <th>Initital addition Price</th>
        <th>Courier Partner</th>
        <th>Tracking ID</th>
        <th>Vendor</th>
        <th>Condition</th>
        <th>Cost</th>
        <th>Category</th>
        <th>Dispatch Time</th>
   </tr>
  </thead>
';


// $output = '

// <table class="table table-hover" id="allproduct">
// ';

while($row = mysqli_fetch_array($result))
{
  if(!empty($_POST['vendor']))
  {

    $sku=$row['SKU'];
    $query1="SELECT Cndition,Category_ID, Cost, Price FROM `addition` Where SKU='$sku' ORDER By id DESC";
    $res1=mysqli_query($mysql, $query1);
    $row1=mysqli_fetch_array($res1);
    // $vendor=$row1['Vendor_ID'];
    //vendor name
    // $res2=mysqli_query($mysql, "SELECT Name FROM `Vendor` Where Vendor_ID='$vendor'");
    // $row2=mysqli_fetch_array($res2);
    //vendor
    $res2 = mysqli_query($mysql,"SELECT Name AS nam FROM Vendor WHERE Vendor_ID='".$_POST["vendor"]."'"); 
    $row2 = mysqli_fetch_array($res2);
    $veni= $row2[0];
    
    //cat name
    // $cat=$row1['Category_ID'];
    // $res3=mysqli_query($mysql, "SELECT Name FROM `Category` Where Category_ID='$cat'");
    $row3=mysqli_fetch_array($res3);
    $var=explode("-",$sku);
    $final=preg_replace('/[0-9]+/', '', $var[1]);
    $res3=mysqli_query($mysql, "SELECT Name FROM `Category` Where SKU_Format='$final'");
    $row3=mysqli_fetch_array($res3);

    $output .= '
    
    <tbody id="tbody" style="text-align:center">
    <tr>
        <td>'.$row['Order_Number'].'</td>
        <td>'.$row['SKU'].'</td>s
        <td>'.$row['Price'].'</td>
        <td>'.$row1['Price'].'</td>
        <td>'.$row['Courier'].'</td>
        <td>'.$row['Tracking'].'</td>
        <td>'.$veni.'</td>
        <td>'.$row1['Cndition'].'</td>
        <td>'.$row1['Cost'].'</td>
        <td>'.$row3['Name'].'</td>
        <td>'.$row['Date'].'</td>
       
    </tr>
    </tbody>'
    ;
  }
//   else
//   {
     $sku=$row['SKU'];
     $query1="SELECT Vendor_ID, Cndition,Category_ID, Cost, Price FROM `addition` Where SKU='$sku' ORDER By id DESC";
     $res1=mysqli_query($mysql, $query1);
     $row1=mysqli_fetch_array($res1);
     $vendor=$row1['Vendor_ID'];
     //vendor name
     // $res2=mysqli_query($mysql, "SELECT Name FROM `Vendor` Where Vendor_ID='$vendor'");
     // $row2=mysqli_fetch_array($res2);
     //vendor
     $res2 = mysqli_query($mysql,"SELECT 'Name' AS nam FROM Vendor WHERE Vendor_ID='".$row["Vendor_ID"]."'"); 
     $row2 = mysqli_fetch_array($res2);
     $veni= $row2[0];
    
     //cat name
     // $cat=$row1['Category_ID'];
     // $res3=mysqli_query($mysql, "SELECT Name FROM `Category` Where Category_ID='$cat'");
     $row3=mysqli_fetch_array($res3);
     $var=explode("-",$sku);
     $final=preg_replace('/[0-9]+/', '', $var[1]);
     $res3=mysqli_query($mysql, "SELECT Name FROM `Category` Where SKU_Format='$final'");
     $row3=mysqli_fetch_array($res3);
     echo $row['SKU'];
     $output .= '
    
     <tbody id="tbody" style="text-align:center">
     <tr>
         <td>'.$row['Order_Number'].'</td>
         <td>'.$row['SKU'].'</td>s
         <td>'.$row['Price'].'</td>
         <td>'.$row1['Price'].'</td>
         <td>'.$row['Courier'].'</td>
         <td>'.$row['Tracking'].'</td>
         <td>'.$veni['Name'].'</td>
         <td>'.$row1['Cndition'].'</td>
         <td>'.$row1['Cost'].'</td>
         <td>'.$row3['Name'].'</td>
         <td>'.$row['Date'].'</td>     
       
     </tr>
     </tbody>'
     ;
  
//   }
    
 
    // $output .= '
    
    // <tbody id="tbody" style="text-align:center">
    // <tr>
    //     <td>'.$row['Order_Number'].'</td>
    //     <td>'.$row['SKU'].'</td>s
    //     <td>'.$row['Price'].'</td>
    //     <td>'.$row1['Price'].'</td>
    //     <td>'.$row['Courier'].'</td>
    //     <td>'.$row['Tracking'].'</td>
    //     <td>'.$veni.'</td>
    //     <td>'.$row1['Cndition'].'</td>
    //     <td>'.$row1['Cost'].'</td>
    //     <td>'.$row3['Name'].'</td>
    //     <td>'.$row['Date'].'</td>

 
      
       
    // </tr>
    // </tbody>'
    // ;
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

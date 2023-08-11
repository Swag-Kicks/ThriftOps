<?php

include_once("../include/mysql_connection.php"); 
error_reporting(0);

$query = "SELECT Image_1,SKU,DateTime FROM `addition`";
$count=0;

if(isset($_POST['cond']))
{
    $cond=$_POST['cond'];
    
    if($cond=="all")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                $query .= ' WHERE Warehouse_ID="'.$_POST['location'].'" AND Inventory_Status in ("Pending","Recieved","Send Back","Not Recieved") AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
             }
        }
        else
        {
            $query .= ' WHERE Inventory_Status in ("Pending","Recieved","Send Back","Not Recieved") AND Warehouse_ID="'.$_POST['location'].'"';
        }
            
    }
    if($cond=="Pending")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Warehouse_ID="'.$_POST['location'].'" AND Inventory_Status LIKE "%Pending%" AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
             }
        }
        else
        {
            $query .= ' WHERE Inventory_Status LIKE "%Pending%" AND Warehouse_ID="'.$_POST['location'].'"';
        }
    }
    if($cond=="Recieved")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Warehouse_ID="'.$_POST['location'].'" AND Inventory_Status LIKE "%Recieved%" AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
             }
        }
        else
        {
            $query .= ' WHERE Inventory_Status LIKE "%Recieved%" AND Warehouse_ID="'.$_POST['location'].'"';
        }
    }
     if($cond=="Not Recieved")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Warehouse_ID="'.$_POST['location'].'" AND Inventory_Status LIKE "% Not Recieved%" AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
             }
        }
        else
        {
            $query .= ' WHERE Inventory_Status LIKE "% Not Recieved%" AND Warehouse_ID="'.$_POST['location'].'"';
        }
    }
     if($cond=="Send Back")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Warehouse_ID="'.$_POST['location'].'" AND Inventory_Status LIKE "%Send Back%" AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
             }
        }
        else
        {
            $query .= ' WHERE Inventory_Status LIKE "%Send Back%" AND Warehouse_ID="'.$_POST['location'].'"';
        }
    }
   
}




if($_POST['items'] != '')
{
  $query .= ' WHERE SKU LIKE "%'.str_replace(' ', '%', $_POST['items']).'%" AND Inventory_Status in ("Pending","Marked") AND Warehouse_ID="'.$_POST['location'].'"';
}






if($_POST['sort'])
{
    $sort=$_POST['sort'];
    if($sort=='ASC')
    {
        $query .= ' ORDER BY id ASC';
    }
    if($sort=='DESC')
    {
        $query .= ' ORDER BY id DESC';
    }
}
else
{
    $query .= ' ORDER BY id DESC';
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

<table class="table table-hover" id="allproduct">
';


// if($_POST['loci'] != '')
// {
//     $loci=$_POST['loci'];
//     $query .= ' WHERE Inventory_Status in ("Pending","Marked") AND Warehouse_ID="'.$_POST['location'].'"';
  
//   while($row = mysqli_fetch_array($result))
//     {
//         $count++;
  
//         //location
//         $records2 = "SELECT * FROM `racks` WHERE name='$loci' AND Warehouse_ID='".$_POST['location']."'"; 
//         $quantity = mysqli_query($mysql, $records2);
//         $row2 = mysqli_fetch_array($quantity);
//         $location=$row2['name'];
//         $catid=$row2['Category'];
//         $cs=$row2['SKU'];

//             //category
//             $records3 = "SELECT * FROM `Category` WHERE Category_ID='$catid'"; 
//             $quantity1 = mysqli_query($mysql, $records3);
//             $row3 = mysqli_fetch_array($quantity1);
//             $cat=$row3['Name'];
            
//             if($cs== $row['SKU'])
//             {
//               $output .= '
        
//                 <tbody id="tbody" style="text-align:center">
//                 <tr>
//                   <td><input type="checkbox" name="check[]" value="'.$row["SKU"].'"></td> 
//                   <td>'.$count.'</td>
//                   <td><img src="'.$row['Image_1'].'" width="100" height="100"></td>
//                   <td>'.$row['SKU'].'</td>
//                   <td>'.$location.'</td>
//                   <td>'.$cat.'</td>
//                   <td>'.date('Y-m-d', strtotime($row["DateTime"])).'</td>
//                 </tr>
//                 </tbody>'
//                  ; 
//             }
//             // else
//             // {
//             //     $output .= '
        
//             //     <tbody id="tbody" style="text-align:center">
//             //     <tr>
//             //       <td><input type="checkbox" name="check[]" value="'.$row["SKU"].'"></td> 
//             //       <td>'.$count.'</td>
//             //       <td><img src="'.$row['Image_1'].'" width="100" height="100"></td>
//             //       <td>'.$row['SKU'].'</td>
//             //       <td>'.$location.'</td>
//             //       <td>'.$cat.'</td>
//             //       <td>'.date('Y-m-d', strtotime($row["DateTime"])).'</td>
//             //     </tr>
//             //     </tbody>'
//             //      ;
//             // }
            
//             // $output .= '
        
//             // <tbody id="tbody" style="text-align:center">
//             // <tr>
//             //   <td><input type="checkbox" name="check[]" value="'.$row["SKU"].'"></td> 
//             //   <td>'.$count.'</td>
//             //   <td><img src="'.$row['Image_1'].'" width="100" height="100"></td>
//             //   <td>'.$row['SKU'].'</td>
//             //   <td>'.$location.'</td>
//             //   <td>'.$cat.'</td>
//             //   <td>'.date('Y-m-d', strtotime($row["DateTime"])).'</td>
//             // </tr>
//             // </tbody>'
//             //  ;
    
        
       
     
        
//     }
  
// }
if($_POST['loci'] == '')
{
    while($row = mysqli_fetch_array($result))
    {
        $count++;
        //confirmed:pending:cancelled:Onhold:Reattempted
        // $stat=$row['Status'];
        // if($stat=='None')
        // {
        //     // $s="<span class='logged-in'>ðŸŸ¢ </span>Active";
        //     //$s="<span class='logged-in'></span>Active";
        //     $s="Pending";
            
        // }
        // else
        // {
        //     //$s="<span><text id='tatus'>●</text><text id='status'>Draft</text></span>";
        //     // $s="<span class='logged-out'>ðŸŸ¡ </span>Draft";
        //      //$s="<span class='logged-out'></span>Draft";
        //      $s=$row["Status"];
        // }
        
        
        
        //location
        $records2 = "SELECT * FROM `racks` WHERE SKU='".$row["SKU"]."' AND Warehouse_ID='".$_POST['location']."'"; 
        $quantity = mysqli_query($mysql, $records2);
        $row2 = mysqli_fetch_array($quantity);
        $location=$row2['name'];
        $catid=$row2['Category'];
        
       
            
            //category
            $records3 = "SELECT * FROM `Category` WHERE Category_ID='$catid'"; 
            $quantity1 = mysqli_query($mysql, $records3);
            $row3 = mysqli_fetch_array($quantity1);
            $cat=$row3['Name'];
            
            $output .= '
        
            <tbody id="tbody" style="text-align:center">
            <tr>
              <td><input type="checkbox" name="check[]" value="'.$row["SKU"].'"></td> 
              <td>'.$count.'</td>
              <td class="img"><img src="'.$row['Image_1'].'" width="100" height="100"></td>
              <td>'.$row['SKU'].'</td>
              <td>'.$location.'</td>
              <td>'.$cat.'</td>
              <td>'.date('Y-m-d', strtotime($row["DateTime"])).'</td>
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

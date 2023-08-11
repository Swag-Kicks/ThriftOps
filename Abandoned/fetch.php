<?php

include_once("../include/mysql_connection.php"); 
error_reporting(0);

$query = "SELECT *,GROUP_Concat(SKU) as con FROM `Abandoned`";


if(isset($_POST['cond']))
{
    $cond=$_POST['cond'];
    
    if($cond=="all")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                if($_POST['fstatus'] != '')
                {
                    $query .= ' WHERE Status LIKE "%'.str_replace(' ', '%', $_POST['fstatus']).'%" AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
                } 
                else
                {
                    $query .= ' WHERE Status in ("Order Placed","Pending","Already Placed","Not Answering","Unreachable","Payment Issue","DC Issue","Size Issue","Will Order Soon","Ordered on Chat","Not Interested") AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
                }
                 
             }
             
             
        }
        
        else if($_POST['fstatus'] != '')
        {
          $query .= ' WHERE Status LIKE "%'.str_replace(' ', '%', $_POST['fstatus']).'%"';
        }
        
        else
        {
            $query .= ' WHERE Status in ("Order Placed","Pending","Already Placed","Not Answering","Unreachable","Payment Issue","DC Issue","Size Issue","Will Order Soon","Ordered on Chat","Not Interested")';
        }
            
    }
    if($cond=="Pending")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 if($_POST['fstatus'] != '')
                {
                    $query .= ' WHERE Status LIKE "%'.str_replace(' ', '%', $_POST['fstatus']).'%" AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
                } 
                else
                {
                    $query .= ' WHERE Status LIKE "%Pending%" AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
                }
             }
        }
        
        else if($_POST['fstatus'] != '')
        {
          $query .= ' WHERE Status LIKE "%'.str_replace(' ', '%', $_POST['fstatus']).'%"';
        }
        
        else
        {
            $query .= ' WHERE Status LIKE "%Pending%"';
        }
    }
    if($cond=="Converted")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 if($_POST['fstatus'] != '')
                {
                    $query .= ' WHERE Status LIKE "%'.str_replace(' ', '%', $_POST['fstatus']).'%" AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
                } 
                else
                {
                  $query .= ' WHERE Status in ("Order Placed","Already Placed","Ordered on Chat") AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
                }
             }
        }
        
        else if($_POST['fstatus'] != '')
        {
          $query .= ' WHERE Status LIKE "%'.str_replace(' ', '%', $_POST['fstatus']).'%"';
        }
        
        else
        {
            $query .= ' WHERE Status in ("Order Placed","Already Placed","Ordered on Chat")';
        }
    }
    if($cond=="Unresponsive")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                if($_POST['fstatus'] != '')
                {
                    $query .= ' WHERE Status LIKE "%'.str_replace(' ', '%', $_POST['fstatus']).'%" AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
                } 
                else
                {
                  $query .= ' WHERE Status in ("Unreachable","Not Answering") AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
                }
             }
             
        }
        
        else if($_POST['fstatus'] != '')
        {
          $query .= ' WHERE Status LIKE "%'.str_replace(' ', '%', $_POST['fstatus']).'%"';
        }
        
        else
        {
            $query .= ' WHERE Status in ("Unreachable","Not Answering")';
        }
    }
    if($cond=="Notinterested")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 if($_POST['fstatus'] != '')
                {
                    $query .= ' WHERE Status LIKE "%'.str_replace(' ', '%', $_POST['fstatus']).'%" AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
                } 
                else
                {
                  $query .= ' WHERE Status LIKE "%Not Interested%" AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
                }
             }
        }
        
        else if($_POST['fstatus'] != '')
        {
          $query .= ' WHERE Status LIKE "%'.str_replace(' ', '%', $_POST['fstatus']).'%"';
        }
        
        else
        {
            $query .= ' WHERE Status LIKE "%Not Interested%"';
        }
    }
    
    if($cond=="Maybuylater")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 if($_POST['fstatus'] != '')
                {
                    $query .= ' WHERE Status LIKE "%'.str_replace(' ', '%', $_POST['fstatus']).'%" AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
                } 
                else
                {
                  $query .= ' WHERE Status in ("Payment Issue","DC Issue","Size Issue","Will Order Soon") AND DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
                }
             }
             
        }
        
        else if($_POST['fstatus'] != '')
        {
          $query .= ' WHERE Status LIKE "%'.str_replace(' ', '%', $_POST['fstatus']).'%"';
        }
        
        else
        {
            $query .= ' WHERE Status in ("Payment Issue","DC Issue","Size Issue","Will Order Soon")';
        }
    }
}
// else
// {
//     $query .= ' WHERE Status LIKE "%None%" OR Status LIKE "%Confirmed%" OR Status LIKE "%Cancel%" OR Status LIKE "%Hold%" OR Status LIKE "%Reattempt%" ';
// }


if($_POST['customer'] != '')
{
    $cut=$_POST['customer'];
    if(is_numeric($cut))
    {
        $query .= ' WHERE Contact LIKE "%'.str_replace(' ', '%', $_POST['customer']).'%" AND Status in ("Order Placed","Pending","Already Placed","Not Answering","Unreachable","Payment Issue","DC Issue","Size Issue","Will Order Soon","Ordered on Chat","Not Interested")';
    }
    else
    {
       $query .= ' WHERE Name LIKE "%'.str_replace(' ', '%', $_POST['customer']).'%" AND Status in ("Order Placed","Pending","Already Placed","Not Answering","Unreachable","Payment Issue","DC Issue","Size Issue","Will Order Soon","Ordered on Chat","Not Interested")'; 
    }
    
}
if($_POST['address'] != '')
{
  $query .= ' WHERE Address LIKE "%'.str_replace(' ', '%', $_POST['city']).'%" AND Status in ("Order Placed","Pending","Already Placed","Not Answering","Unreachable","Payment Issue","DC Issue","Size Issue","Will Order Soon","Ordered on Chat","Not Interested")';
}
if($_POST['items'] != '')
{
  $query .= ' WHERE SKU LIKE "%'.str_replace(' ', '%', $_POST['items']).'%" AND Status in ("Order Placed","Pending","Already Placed","Not Answering","Unreachable","Payment Issue","DC Issue","Size Issue","Will Order Soon","Ordered on Chat","Not Interested")';
}
if($_POST['amount'] != '')
{
  $query .= ' WHERE Total LIKE "%'.str_replace(' ', '%', $_POST['amount']).'%" AND Status in ("Order Placed","Pending","Already Placed","Not Answering","Unreachable","Payment Issue","DC Issue","Size Issue","Will Order Soon","Ordered on Chat","Not Interested")';
}


// if(!empty($_POST['from']))
// {
//      if(!empty($_POST['to']))
//      {
//         $query .= ' WHERE DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
//      }
// }


// else if(!empty($_POST['status']))
// {
  
//   $status=$_POST['status'];
//   if($status!=1)
//   {
//       if(!empty($_POST['vendor']))
//       {
        //  $ve=$_POST['vendor'];
        //  $v = "SELECT Vendor_ID FROM vendor Where Vendor_Name LIKE '%$ve%'";
        //  $result1 = mysqli_query($mysql, $v);
        //  $rov = mysqli_fetch_array($result1);
        //  $ve_id=$rov['Vendor_ID'];
         
//           if(!empty($_POST['lot']))
//           {
//               $query .= ' WHERE Status LIKE "'.$_POST['status'].'" AND Vendor_ID= "'.$_POST['vendor'].'" AND Lot_ID= "'.$_POST['lot'].'"';
//           }
//           else
//           {
//               $query .= ' WHERE Status LIKE "'.$_POST['status'].'" AND Vendor_ID= "'.$_POST['vendor'].'"';
//           }
          
//       }
       
//       else
//       {
//           $query .= ' WHERE Status LIKE "'.$_POST['status'].'"';
//       }
//   }
//   else
//   {
//       if(!empty($_POST['vendor']))
//       {
//         //  $ve=$_POST['vendor'];
//         //  $v = "SELECT Vendor_ID FROM vendor Where Vendor_Name LIKE '%$ve%'";
//         //  $result1 = mysqli_query($mysql, $v);
//         //  $rov = mysqli_fetch_array($result1);
//         //  $ve_id=$rov['Vendor_ID'];
//           if(!empty($_POST['lot']))
//           {
//               $query .= ' WHERE Status!= "" AND Vendor_ID= "'.$_POST['vendor'].'" AND Lot_ID= "'.$_POST['lot'].'"';
//           }
//           else
//           {
//             $query .= ' WHERE Vendor_ID= "'.$_POST['vendor'].'" AND Status!= ""';
//           }
//       }
       
//       else
//       {
//           $query .= ' WHERE 1=1';
//       }
  
//   }
  
// }





if($_POST['sort'])
{
    $sort=$_POST['sort'];
    if($sort=='ASC')
    {
        $query .= ' GROUP BY Shopify_ID ASC';
    }
    if($sort=='DESC')
    {
        $query .= ' GROUP BY Shopify_ID DESC';
    }
}
else
{
    $query .= ' GROUP BY Shopify_ID DESC';
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

<table class="table table-hover" id="allproduct">
';

while($row = mysqli_fetch_array($result))
{
    
    //confirmed:pending:cancelled:Onhold:Reattempted
    $stat=$row['Status'];
    if($stat=='None')
    {
        // $s="<span class='logged-in'>ðŸŸ¢ </span>Active";
        //$s="<span class='logged-in'></span>Active";
        $s="Pending";
        
    }
    else
    {
        //$s="<span><text id='tatus'>●</text><text id='status'>Draft</text></span>";
        // $s="<span class='logged-out'>ðŸŸ¡ </span>Draft";
         //$s="<span class='logged-out'></span>Draft";
         $s=$row["Status"];
    }
    
    // //vendor
    // $records1 = mysqli_query($mysql,"SELECT Vendor_Name AS nam FROM vendor WHERE Vendor_ID='".$row["Vendor_ID"]."'"); 
    // $data1 = mysqli_fetch_array($records1);
    // $veni= $data1[0];
    
    //items count
    $records2 = "SELECT * FROM `Abandoned` WHERE Shopify_ID='".$row["Shopify_ID"]."'"; 
    $quantity = mysqli_num_rows(mysqli_query($mysql, $records2));
   
    // while($row = mysqli_fetch_array($result))
    // {
        //items sku
        // $records1 = mysqli_query($mysql,"SELECT * FROM addition WHERE SKU='".$row["SKU"]."'"); 
        // $data1 = mysqli_fetch_array($records1);
        // $img= $data1['Image_1'];
        // $title= $data1['Title'];
        // $input.=" <li>
        //             <div class='media'><img class='img-fluid rounded-circle me-3' src='$img' alt=''>
        //               <div class='media-body'><span>'".$row["SKU"]."'</span>
        //                 <p class='f-12 light-font'>$title</p>
        //               </div>
        //               <p class='f-12'>'".$row["Price"]."'</p>
        //             </div>
        //           </li>";
    //}


 
    $output .= '
    
    <tbody id="tbody" style="text-align:center">
    <tr>
    
      <td>'.$row["Name"].'<br>'.$row["Contact"].'</td>
      <td>'.$row['Address'].'</td>
      <td><details class="onhover-dropdown clickT" id="itemcheck" data-id="'.$row["Shopify_ID"].'"><summary>'.$quantity.' Items</summary><div class="align-middle text-center"><ul id="itemfetch" class="chat-dropdown onhover-show-div1"></ul></div></details></td>
      <td>'.$row['Total'].'</td>
      <td>'.$row['Status'].'</td>
      <td>'.$row["DateTime"].'</td>
      
       <td class="align-middle text-center">
      <div class="btn-group align-top">
                                        <select class="mark" name="'.$row["Shopify_ID"].'" id="mark">
                                          <option disabled selected>
                                          </option>
                                          <option value="Order Placed">Order Placed</option>
                                          <option value="Not Answering">Not Answering</option>
                                          <option value="Unreachable">Unreachable</option>
                                          <option value="Payment">Payment Issue</option>
                                          <option value="DC Issue">DC Issue</option>
                                          <option value="Size Issue">Size Issue</option>
                                          <option value="Will Order Soon">Will Order Soon</option>
                                          <option value="Already Placed">Already Placed</option>
                                          <option value="Ordered on Chat">Ordered on Chat</option>
                                          <option value="Not Interested">Not Interested</option>
                                        </select>
        </td>
         <td class="align-middle text-left">
      <div class="btn-group align-top">
                <a href="#" id="link" data-id="'.$row["Url"].'"><img class="icons" src="../assets/images/icons/link-2.png"></a>
                                            
                                        </div>
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

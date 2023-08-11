<?php

include_once("../include/mysql_connection.php"); 
error_reporting(0);

$query = "SELECT *,GROUP_Concat(SKU) as con FROM `Order`";


if(isset($_POST['cond']))
{
    $cond=$_POST['cond'];
    
    if($cond=="all")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                $query .= ' WHERE Status in ("Confirmed","Cancel","Hold","Picked","Not_Found","QC_Reject","Packed","Dispatched") AND Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
             }
        }
        else
        {
            $query .= ' WHERE Status in ("Confirmed","Cancel","Hold","Picked","Not_Found","QC_Reject","Packed","Dispatched")';
        }
            
    }
    if($cond=="Confirmed")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Status LIKE "%Confirmed%" AND Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
             }
        }
        else
        {
            $query .= ' WHERE Status LIKE "%Confirmed%"';
        }
    }
    if($cond=="Cancel")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Status LIKE "%'.str_replace(' ', '%', $_POST['cond']).'%" AND Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
             }
        }
        else
        {
            $query .= ' WHERE Status LIKE "%'.str_replace(' ', '%', $_POST['cond']).'%"';
        }
    }
    if($cond=="Hold")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Status LIKE "%'.str_replace(' ', '%', $_POST['cond']).'%" AND Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
             }
        }
        else
        {
            $query .= ' WHERE Status LIKE "%'.str_replace(' ', '%', $_POST['cond']).'%"';
        }
    }
    if($cond=="Picked")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' INNER JOIN Logs on `Order`.Order_ID=Logs.Type_ID WHERE Logs.Status= "Picked" AND Logs.DateTime Between "'.$_POST['from'].' 00:00:00" AND "'.$_POST['to'].' 23:59:59"';
             }
        }
        else
        {
            $query .=' INNER JOIN Logs on `Order`.Order_ID=Logs.Type_ID WHERE Logs.Status= "Picked"';
            //$query .= ' WHERE Status LIKE "%'.str_replace(' ', '%', $_POST['cond']).'%"';
        }
    }
    
    if($cond=="Not_Found")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Status LIKE "%'.str_replace(' ', '%', $_POST['cond']).'%" AND Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
             }
        }
        else
        {
            $query .= ' WHERE Status LIKE "%'.str_replace(' ', '%', $_POST['cond']).'%"';
        }
    }
    
     if($cond=="QC_Reject")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Status  LIKE "%'.str_replace(' ', '%', $_POST['cond']).'%" AND Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
             }
        }
        else
        {
            $query .= ' WHERE Status LIKE "%'.str_replace(' ', '%', $_POST['cond']).'%"';
        }
    }
    if($cond=="Packed")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Status  LIKE "%'.str_replace(' ', '%', $_POST['cond']).'%" AND Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
             }
        }
        else
        {
            $query .= ' WHERE Status LIKE "%'.str_replace(' ', '%', $_POST['cond']).'%"';
        }
    }
    if($cond=="Dispatched")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Status  LIKE "%'.str_replace(' ', '%', $_POST['cond']).'%" AND Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
             }
        }
        else
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
        $query .= ' WHERE Order_Number LIKE "%#'.str_replace(' ', '%', $_POST['ordernum']).'%" AND Status in ("None","Confirmed","Cancel","Hold","Reattempt")';
    }
    else
    {
       $query .= ' WHERE Order_Number LIKE "%'.str_replace(' ', '%', $_POST['ordernum']).'%" AND Status in ("None","Confirmed","Cancel","Hold","Reattempt")';
    }
    
}
if($_POST['customer'] != '')
{
    $cut=$_POST['customer'];
    if(is_numeric($cut))
    {
        $query .= ' WHERE Contact LIKE "%'.str_replace(' ', '%', $_POST['customer']).'%" AND Status in ("None","Confirmed","Cancel","Hold","Reattempt")';
    }
    else
    {
       $query .= ' WHERE Name LIKE "%'.str_replace(' ', '%', $_POST['customer']).'%" AND Status in ("None","Confirmed","Cancel","Hold","Reattempt")'; 
    }
    
}
if($_POST['city'] != '')
{
  $query .= ' WHERE City LIKE "%'.str_replace(' ', '%', $_POST['city']).'%" AND Status in ("None","Confirmed","Cancel","Hold","Reattempt")';
}
if($_POST['items'] != '')
{
  $query .= ' WHERE SKU LIKE "%'.str_replace(' ', '%', $_POST['items']).'%" AND Status in ("None","Confirmed","Cancel","Hold","Reattempt")';
}
if($_POST['amount'] != '')
{
  $query .= ' WHERE Total LIKE "%'.str_replace(' ', '%', $_POST['amount']).'%" AND Status in ("None","Confirmed","Cancel","Hold","Reattempt")';
}

// if(!empty($_POST['from']))
// {
//      if(!empty($_POST['to']))
//      {
//         $query .= ' WHERE Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
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
echo $filter_query;



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
    $records2 = "SELECT * FROM `Order` WHERE Order_ID='".$row["Order_ID"]."'"; 
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

    // $input="
    //             <ul class='chat-dropdown onhover-show-div'>
    //               <li>
    //                 <div class='media'><img class='img-fluid rounded-circle me-3' src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg' alt=''>
    //                   <div class='media-body'><span>SKU-S123124</span>
    //                     <p class='f-12 light-font'>Kindle, 6' Glare-Free To...</p>
    //                   </div>
    //                   <p class='f-12'>RS 1350</p>
    //                 </div>
    //               </li>
    //               <li>
    //                 <div class='media'><img class='img-fluid rounded-circle me-3' src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item2.jpg' alt=''>
    //                   <div class='media-body'><span>SKU-S123124</span>
    //                     <p class='f-12 light-font'>KS Automatic Mechanic...</p>
    //                   </div>
    //                   <p class='f-12'>RS 4532</p>
    //                 </div>
    //               </li>
    //               <li>
    //                 <div class='media'><img class='img-fluid rounded-circle me-3' src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item3.jpg' alt=''>
    //                   <div class='media-body'><span>SKU-S123124</span>
    //                     <p class='f-12 light-font'>Sony DSC-RX100M III...</p>
    //                   </div>
    //                   <p class='f-12'>RS 1245</p>
    //                 </div>
    //               </li>
    //               <li class='text-center'> <a class='f-w-700' href='javascript:void(0)'>See All </a></li>
    //             </ul>
    //           ";
 
    $output .= '
    
    <tbody id="tbody" style="text-align:center">
    <tr>
    
      <td>'.$row["Order_Number"].'</td>
      <td>'.$row["Name"].'<br>'.$row["Contact"].'</td>
      <td>'.$row['City'].'</td>
      <td><details class="onhover-dropdown clickT" id="itemcheck" data-id="'.$row["Order_ID"].'"><summary>'.$quantity.' Items</summary><div class="align-middle text-center"><ul id="itemfetch" class="chat-dropdown onhover-show-div1"></ul></div></details></td>
      <td>'.$row['Total'].'</td>
      <td>'.$s.'</td>
      <td>'.$row["Date"].'</td>
      
      
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

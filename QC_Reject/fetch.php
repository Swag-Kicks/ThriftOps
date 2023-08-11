
<?php

include_once("../include/mysql_connection.php"); 
error_reporting(0);



if(isset($_POST['cond']))
{
    $query = "SELECT * FROM addition";
    $cond=$_POST['cond'];
    
    if($cond=="all")
    {
        //vendor
        if($_POST['vendor'] != '')
        {
            //batch
            if($_POST['lot'] != '')
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Batch_ID ="'.$_POST['lot'].'" AND Status in ("","Repaired","draft","QC_Rejected","Washing","Replica")';
            }
            // //status
            // else if($_POST['status'] != '')
            // {
                
            //     $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status = "'.$_POST['status'].'" AND Warehouse_ID="'.$_POST['location'].'"';
            // }
            else
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status in ("","Repaired","draft","QC_Rejected","Washing","Replica")';
            }
        }
        
        //batch
        else if($_POST['lot'] != '')
        {
            // if($_POST['status'] != '')
            // {
                
            //     $query .= ' WHERE Lot_ID ="'.$_POST['lot'].'" AND Status = "'.$_POST['status'].'" AND Warehouse_ID="'.$_POST['location'].'"';
            // }
            // else
            // {
                $query .= ' WHERE Batch_ID ="'.$_POST['lot'].'" Status in ("","Repaired","draft","QC_Rejected","Washing","Replica")';
            // }
        }
        // //status
        // else if($_POST['status'] != '')
        // {
            
        //     $query .= ' WHERE Status = "'.$_POST['status'].'" AND Warehouse_ID="'.$_POST['location'].'"';
        // }
        else
        {
             $query .= ' WHERE Status in ("","Repaired","draft","QC_Rejected","Washing","Replica")';
        }
            
    }
    if($cond=="notupload")
    {
        //vendor
        if($_POST['vendor'] != '')
        {
            //batch
            if($_POST['lot'] != '')
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Batch_ID ="'.$_POST['lot'].'" AND Status="" AND Shopify_ID="""';
            }
            // //status
            // else if($_POST['status'] != '')
            // {
                
            //     $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status = "'.$_POST['status'].'" AND Quantity >= "1" AND Warehouse_ID="'.$_POST['location'].'"';
            // }
            else
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status="" AND Shopify_ID="""';
            }
        }
        
        //batch
        else if($_POST['lot'] != '')
        {
            // if($_POST['status'] != '')
            // {
                
            //     $query .= ' WHERE Lot_ID ="'.$_POST['lot'].'" AND Status = "'.$_POST['status'].'" AND Quantity >= "1" AND  Warehouse_ID="'.$_POST['location'].'"';
            // }
            // else
            // {
                $query .= ' WHERE Batch_ID ="'.$_POST['lot'].'" AND Status="" AND Shopify_ID="""';
            // }
        }
        // //status
        // else if($_POST['status'] != '')
        // {
            
        //     $query .= ' WHERE Status = "'.$_POST['status'].'" AND Quantity >= "1" AND Warehouse_ID="'.$_POST['location'].'"';
        // }
        else
        {
             $query .= ' WHERE Status="" AND Shopify_ID=""';
        }
            
    }
    if($cond=="repair")
    {
        //vendor
        if($_POST['vendor'] != '')
        {
            //batch
            if($_POST['lot'] != '')
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Batch_ID ="'.$_POST['lot'].'" AND Status LIKE "%Repaired%"';
            }
            // //status
            // else if($_POST['status'] != '')
            // {
                
            //     $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status = "'.$_POST['status'].'" AND Quantity >= "1" AND Warehouse_ID="'.$_POST['location'].'"';
            // }
            else
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status LIKE "%Repaired%"';
            }
        }
        
        //batch
        else if($_POST['lot'] != '')
        {
            // if($_POST['status'] != '')
            // {
                
            //     $query .= ' WHERE Lot_ID ="'.$_POST['lot'].'" AND Status = "'.$_POST['status'].'" AND Quantity >= "1" AND Warehouse_ID="'.$_POST['location'].'"';
            // }
            // else
            // {
                $query .= ' WHERE Batch_ID ="'.$_POST['lot'].'" AND Status LIKE "%Repaired%"';
            //}
        }
        // //status
        // else if($_POST['status'] != '')
        // {
            
        //     $query .= ' WHERE Status = "'.$_POST['status'].'" AND Quantity >= "1" AND  Warehouse_ID="'.$_POST['location'].'"';
        // }
        else
        {
             $query .= ' WHERE Status LIKE "%Repaired%" ';
        }
            
    }
    if($cond=="draft")
    {
        //vendor
        if($_POST['vendor'] != '')
        {
            //batch
            if($_POST['lot'] != '')
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Batch_ID ="'.$_POST['lot'].'" AND Status LIKE "%draft%"';
            }
            // //status
            // else if($_POST['status'] != '')
            // {
                
            //     $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status = "'.$_POST['status'].'" AND Quantity >= "1" AND Warehouse_ID="'.$_POST['location'].'"';
            // }
            else
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status LIKE "%draft%"';
            }
        }
        
        //batch
        else if($_POST['lot'] != '')
        {
            // if($_POST['status'] != '')
            // {
                
            //     $query .= ' WHERE Lot_ID ="'.$_POST['lot'].'" AND Status = "'.$_POST['status'].'" AND Quantity >= "1" AND Warehouse_ID="'.$_POST['location'].'"';
            // }
            // else
            // {
                $query .= ' WHERE Batch_ID ="'.$_POST['lot'].'" AND Status LIKE "%draft%"';
            //}
        }
        // //status
        // else if($_POST['status'] != '')
        // {
            
        //     $query .= ' WHERE Status = "'.$_POST['status'].'" AND Quantity >= "1" AND  Warehouse_ID="'.$_POST['location'].'"';
        // }
        else
        {
             $query .= ' WHERE Status LIKE "%draft%" ';
        }
            
    }
    if($cond=="qc")
    {
        //vendor
        if($_POST['vendor'] != '')
        {
            //batch
            if($_POST['lot'] != '')
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Batch_ID ="'.$_POST['lot'].'" AND Status LIKE "%QC_Rejected%"';
            }
            // //status
            // else if($_POST['status'] != '')
            // {
                
            //     $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status = "'.$_POST['status'].'" AND Quantity >= "1" AND Warehouse_ID="'.$_POST['location'].'"';
            // }
            else
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status LIKE "%QC_Rejected%"';
            }
        }
        
        //batch
        else if($_POST['lot'] != '')
        {
            // if($_POST['status'] != '')
            // {
                
            //     $query .= ' WHERE Lot_ID ="'.$_POST['lot'].'" AND Status = "'.$_POST['status'].'" AND Quantity >= "1" AND Warehouse_ID="'.$_POST['location'].'"';
            // }
            // else
            // {
                $query .= ' WHERE Batch_ID ="'.$_POST['lot'].'" AND Status LIKE "%QC_Rejected%"';
            //}
        }
        // //status
        // else if($_POST['status'] != '')
        // {
            
        //     $query .= ' WHERE Status = "'.$_POST['status'].'" AND Quantity >= "1" AND  Warehouse_ID="'.$_POST['location'].'"';
        // }
        else
        {
             $query .= ' WHERE Status LIKE "%QC_Rejected%" ';
        }
            
    }
    if($cond=="wash")
    {
        //vendor
        if($_POST['vendor'] != '')
        {
            //batch
            if($_POST['lot'] != '')
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Batch_ID ="'.$_POST['lot'].'" AND Status LIKE "%Washing%"';
            }
            // //status
            // else if($_POST['status'] != '')
            // {
                
            //     $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status = "'.$_POST['status'].'" AND Quantity >= "1" AND Warehouse_ID="'.$_POST['location'].'"';
            // }
            else
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status LIKE "%Washing%"';
            }
        }
        
        //batch
        else if($_POST['lot'] != '')
        {
            // if($_POST['status'] != '')
            // {
                
            //     $query .= ' WHERE Lot_ID ="'.$_POST['lot'].'" AND Status = "'.$_POST['status'].'" AND Quantity >= "1" AND Warehouse_ID="'.$_POST['location'].'"';
            // }
            // else
            // {
                $query .= ' WHERE Batch_ID ="'.$_POST['lot'].'" AND Status LIKE "%Washing%"';
            //}
        }
        // //status
        // else if($_POST['status'] != '')
        // {
            
        //     $query .= ' WHERE Status = "'.$_POST['status'].'" AND Quantity >= "1" AND  Warehouse_ID="'.$_POST['location'].'"';
        // }
        else
        {
             $query .= ' WHERE Status LIKE "%Washing%" ';
        }
            
    }
    if($cond=="replica")
    {
        //vendor
        if($_POST['vendor'] != '')
        {
            //batch
            if($_POST['lot'] != '')
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Batch_ID ="'.$_POST['lot'].'" AND Status LIKE "%Replica%"';
            }
            // //status
            // else if($_POST['status'] != '')
            // {
                
            //     $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status = "'.$_POST['status'].'" AND Quantity >= "1" AND Warehouse_ID="'.$_POST['location'].'"';
            // }
            else
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status LIKE "%Replica%"';
            }
        }
        
        //batch
        else if($_POST['lot'] != '')
        {
            // if($_POST['status'] != '')
            // {
                
            //     $query .= ' WHERE Lot_ID ="'.$_POST['lot'].'" AND Status = "'.$_POST['status'].'" AND Quantity >= "1" AND Warehouse_ID="'.$_POST['location'].'"';
            // }
            // else
            // {
                $query .= ' WHERE Batch_ID ="'.$_POST['lot'].'" AND Status LIKE "%Replica%"';
            //}
        }
        // //status
        // else if($_POST['status'] != '')
        // {
            
        //     $query .= ' WHERE Status = "'.$_POST['status'].'" AND Quantity >= "1" AND  Warehouse_ID="'.$_POST['location'].'"';
        // }
        else
        {
             $query .= ' WHERE Status LIKE "%Replica%" ';
        }
            
    }
  
    
    
  
   
}


if(isset($_POST['sku']))
{
    // $sku=$_POST['sku'];
     $query .= ' WHERE SKU LIKE "%'.str_replace(' ', '%', $_POST['sku']).'%" AND Warehouse_ID="'.$_POST['location'].'"';
}

if(isset($_POST['title']))
{
    // $title=$_POST['title'];
     $query .= ' WHERE Title LIKE "%'.str_replace(' ', '%', $_POST['title']).'%" AND Warehouse_ID="'.$_POST['location'].'"';
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
if(isset($_POST['sort']) )
{
    $sort=$_POST['sort'];
    if($sort=='ASC')
    {
        $query .= 'Order BY id ASC';
    }
    else if($sort=='DESC')
    {
        $query .= ' Order BY id DESC';
    }
    else
    {
        $query .= ' Order BY id DESC';
    }
}




$filter_query = $query . ' LIMIT '.$start.', '.$limit.'';
echo $filter_query;



$result = mysqli_query($mysql, $filter_query);

$total_filter_data = mysqli_num_rows(mysqli_query($mysql, $filter_query));
// echo $total_filter_data ;


if($current>$total_data || $current=='All' )
{
    $try = '<div class="hint-text">Showing <b>'.$total_data.'</b> out of <b>'.$total_data.'</b> entries</div>';
} 
else
{
    $try = '<div class="hint-text">Showing <b>'.$current.'</b> out of <b>'.$total_data.'</b> entries</div>';
}
            
$output = '
<table class="table table-hover" id="allproductord">
               
';
// $to_encode = array();
while($row = mysqli_fetch_array($result))
{
    //images
    $pic=$row['Image_1'];
    $ind=$pic[0];
    if(isset($pic))
    {
      if (!is_numeric($ind))
        {
                                                            
            $img= "<img src = '$pic' width='100' height='100' >";
        }
                                                    
        else if(is_numeric($ind))
        {
            $pr='https://upload.thriftops.com/Shoes/uploads/'.$pic;
            $img=  "<img src = '$pr' width='100' height='100' >";
        }
                                                    
        else
        {
            $img= "<img src = '' width='100' height='100' >";
        }
       
    }

    
    //vendor
    $records1 = mysqli_query($mysql,"SELECT Vendor_Name AS nam FROM vendor WHERE Vendor_ID='".$row["Vendor_ID"]."'"); 
    $data1 = mysqli_fetch_array($records1);
    $veni= $data1[0];
    
    // //batch
    // $records2 = mysqli_query($mysql,"SELECT Number AS nam FROM LOT WHERE id='".$row["Lot_ID"]."'"); 
    // $data2 = mysqli_fetch_array($records2);
    // $lot= $data2[0];
    
    //racks
    $records3 = mysqli_query($mysql,"SELECT name AS nam FROM racks WHERE SKU='".$row["SKU"]."'"); 
    $data3 = mysqli_fetch_array($records3);
    $rack= $data3[0];
    

    $output .= '
    
    <tbody id="tbody" style="text-align:center">
    <th>
      <td class="text-left cbox"><input class="checkbox1" name="check[]" type="checkbox" value='.$row["Shopify_ID"].'></td>
      <td class="text-left"><a href="https://backup.thriftops.com/ShopifyPush/viewProduct.php?id='.$row["SKU"].'"  >'.$row["SKU"].'</a></td>
      <td class="text-left" style="width: 230px;">
      '.$row["Title"].'</td>
      <td class="img">'.$img.'</td>
      <td>'.$row["Quantity"].'</td>
      <td>'.$veni.'</td>
      <td>'.$row['Batch_ID'].'</td>
      <td>'.$rack.'</td>
      <td>'.$row["Status"].'</td>
      <td>'.date('Y-m-d', strtotime($row["DateTime"])).'</td>
      <td><div class="btn-group align-top">
                                        <select class="mark" name="'.$row["Shopify_ID"].'"  sku="'.$row["SKU"].'" id="mark">
                                          <option disabled selected>
                                          </option>
                                          <option value="View">View</option>
                                           <option value="Edit">Edit</option>
                                          <option value="Cstatus">Change Status</option>
                                        </select>
        </td>
      <td></td>
    </th>
    </tbody>'
    ;
}

//  echo json_encode($to_encode);
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
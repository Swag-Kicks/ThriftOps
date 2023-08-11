
<?php

include_once("../include/mysql_connection.php"); 
error_reporting(0);

// $query = "SELECT `add`.SKU,`add`.Title,`add`.Image_1,`add`.Quantity,`add`.DateTime,`add`.Status,racks.SKU,racks.name FROM `add` INNER JOIN racks ON `add`.SKU=racks.SKU";
// $query = "SELECT * FROM addition INNER JOIN racks ON addition.SKU=racks.SKU";
// $query = "SELECT * FROM racks INNER JOIN addition ON racks.SKU=addition.SKU";
$query = "SELECT * FROM addition";

if(isset($_POST['cond']))
{
    $cond=$_POST['cond'];
    
    if($cond=="all")
    {
        //vendor
        if($_POST['vendor'] != '')
        {
            //lot
            if($_POST['lot'] != '')
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Lot_ID ="'.$_POST['lot'].'" AND Status in ("active","draft","archieve") AND Warehouse_ID="'.$_POST['location'].'"';
            }
            //status
            else if($_POST['status'] != '')
            {
                
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status = "'.$_POST['status'].'" AND Warehouse_ID="'.$_POST['location'].'"';
            }
            else
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status in ("active","draft","archieve") AND Warehouse_ID="'.$_POST['location'].'"';
            }
        }
        
        //lot
        else if($_POST['lot'] != '')
        {
            if($_POST['status'] != '')
            {
                
                $query .= ' WHERE Lot_ID ="'.$_POST['lot'].'" AND Status = "'.$_POST['status'].'" AND Warehouse_ID="'.$_POST['location'].'"';
            }
            else
            {
                $query .= ' WHERE Lot_ID ="'.$_POST['lot'].'" AND Status in ("active","draft","archieve") AND Warehouse_ID="'.$_POST['location'].'"';
            }
        }
        //status
        else if($_POST['status'] != '')
        {
            
            $query .= ' WHERE Status = "'.$_POST['status'].'" AND Warehouse_ID="'.$_POST['location'].'"';
        }
        else
        {
             $query .= ' WHERE Warehouse_ID="'.$_POST['location'].'"';
        }
            
    }
    if($cond=="activein")
    {
        //vendor
        if($_POST['vendor'] != '')
        {
            //lot
            if($_POST['lot'] != '')
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Lot_ID ="'.$_POST['lot'].'" AND Status ="active" AND Quantity > "1" AND Warehouse_ID="'.$_POST['location'].'"';
            }
            //status
            else if($_POST['status'] != '')
            {
                
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status = "'.$_POST['status'].'" AND Quantity > "1" AND Warehouse_ID="'.$_POST['location'].'"';
            }
            else
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status ="active" AND Quantity > "1" AND Warehouse_ID="'.$_POST['location'].'"';
            }
        }
        
        //lot
        else if($_POST['lot'] != '')
        {
            if($_POST['status'] != '')
            {
                
                $query .= ' WHERE Lot_ID ="'.$_POST['lot'].'" AND Status = "'.$_POST['status'].'" AND Quantity > "1" AND  Warehouse_ID="'.$_POST['location'].'"';
            }
            else
            {
                $query .= ' WHERE Lot_ID ="'.$_POST['lot'].'" AND Status ="active" AND Quantity > "1" AND Warehouse_ID="'.$_POST['location'].'"';
            }
        }
        //status
        else if($_POST['status'] != '')
        {
            
            $query .= ' WHERE Status = "'.$_POST['status'].'" AND Quantity > "1" AND Warehouse_ID="'.$_POST['location'].'"';
        }
        else
        {
             $query .= ' WHERE Warehouse_ID="'.$_POST['location'].'" AND Status ="active" AND Quantity > "1" ';
        }
            
    }
    if($cond=="draftin")
    {
        //vendor
        if($_POST['vendor'] != '')
        {
            //lot
            if($_POST['lot'] != '')
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Lot_ID ="'.$_POST['lot'].'" AND Status="draft" AND Quantity < "1" AND Warehouse_ID="'.$_POST['location'].'"';
            }
            //status
            else if($_POST['status'] != '')
            {
                
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status = "'.$_POST['status'].'" AND Quantity < "1" AND Warehouse_ID="'.$_POST['location'].'"';
            }
            else
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status="draft" AND Quantity < "1" AND Warehouse_ID="'.$_POST['location'].'"';
            }
        }
        
        //lot
        else if($_POST['lot'] != '')
        {
            if($_POST['status'] != '')
            {
                
                $query .= ' WHERE Lot_ID ="'.$_POST['lot'].'" AND Status = "'.$_POST['status'].'" AND Quantity < "1" AND Warehouse_ID="'.$_POST['location'].'"';
            }
            else
            {
                $query .= ' WHERE Lot_ID ="'.$_POST['lot'].'" AND Status="draft" AND Quantity < "1" AND Warehouse_ID="'.$_POST['location'].'"';
            }
        }
        //status
        else if($_POST['status'] != '')
        {
            
            $query .= ' WHERE Status = "'.$_POST['status'].'" AND Quantity < "1" AND  Warehouse_ID="'.$_POST['location'].'"';
        }
        else
        {
             $query .= ' WHERE Warehouse_ID="'.$_POST['location'].'" AND Status ="draft" AND Quantity > "1" ';
        }
            
    }
    if($cond=="activeout")
    {
        //vendor
        if($_POST['vendor'] != '')
        {
            //lot
            if($_POST['lot'] != '')
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Lot_ID ="'.$_POST['lot'].'" AND Status ="active" AND Quantity = "0" AND Warehouse_ID="'.$_POST['location'].'"';
            }
            //status
            else if($_POST['status'] != '')
            {
                
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status = "'.$_POST['status'].'" AND Quantity = "0" AND Warehouse_ID="'.$_POST['location'].'"';
            }
            else
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status ="active" AND Quantity = "0" AND Warehouse_ID="'.$_POST['location'].'"';
            }
        }
        
        //lot
        else if($_POST['lot'] != '')
        {
            if($_POST['status'] != '')
            {
                
                $query .= ' WHERE Lot_ID ="'.$_POST['lot'].'" AND Status = "'.$_POST['status'].'" AND Quantity = "0"  AND Warehouse_ID="'.$_POST['location'].'"';
            }
            else
            {
                $query .= ' WHERE Lot_ID ="'.$_POST['lot'].'" AND Status ="active" AND Quantity = "0" AND Warehouse_ID="'.$_POST['location'].'"';
            }
        }
        //status
        else if($_POST['status'] != '')
        {
            
            $query .= ' WHERE Status = "'.$_POST['status'].'" AND Quantity = "0"  AND Warehouse_ID="'.$_POST['location'].'"';
        }
        else
        {
             $query .= ' WHERE Warehouse_ID="'.$_POST['location'].'" AND Status ="active" AND Quantity = "0" ';
        }
            
    }
     if($cond=="draftout")
    {
        //vendor
        if($_POST['vendor'] != '')
        {
            //lot
            if($_POST['lot'] != '')
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Lot_ID ="'.$_POST['lot'].'" AND Status ="draft" AND Quantity = "0"  AND Warehouse_ID="'.$_POST['location'].'"';
            }
            //status
            else if($_POST['status'] != '')
            {
                
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status = "'.$_POST['status'].'" AND Quantity = "0" AND Warehouse_ID="'.$_POST['location'].'"';
            }
            else
            {
                $query .= ' WHERE Vendor_ID="'.$_POST['vendor'].'" AND Status ="draft" AND Quantity = "0" AND Warehouse_ID="'.$_POST['location'].'"';
            }
        }
        
        //lot
        else if($_POST['lot'] != '')
        {
            if($_POST['status'] != '')
            {
                
                $query .= ' WHERE Lot_ID ="'.$_POST['lot'].'" AND Status = "'.$_POST['status'].'" AND Quantity = "0" AND Warehouse_ID="'.$_POST['location'].'"';
            }
            else
            {
                $query .= ' WHERE Lot_ID ="'.$_POST['lot'].'" AND Status ="draft" AND Quantity = "0" AND Warehouse_ID="'.$_POST['location'].'"';
            }
        }
        //status
        else if($_POST['status'] != '')
        {
            
            $query .= ' WHERE Status = "'.$_POST['status'].'" AND Quantity = "0" AND Warehouse_ID="'.$_POST['location'].'"';
        }
        else
        {
             $query .= ' WHERE Warehouse_ID="'.$_POST['location'].'" AND Status ="draft" AND Quantity = "0" ';
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


if(isset($_POST['two']))
{
    $two=$_POST['two'];
    
    $query .= ' Order BY '.$two;
    
}


if(isset($_POST['date']))
{
    $two=$_POST['date'];
    
    $query .= ' Order BY '.$two;
    
}

else if(isset($_POST['sort']) && empty($_POST['date']) && empty($_POST['two']) )
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
//echo $filter_query;



$result = mysqli_query($mysql, $filter_query);

//$total_filter_data = mysqli_num_rows(mysqli_query($mysql, $filter_query));
//echo $total_filter_data ;


// if($current>$total_data || $current=='All' )
// {
//     $try = '<div class="hint-text">Showing <b>'.$total_data.'</b> out of <b>'.$total_data.'</b> entries</div>';
// } 
// else
// {
//     $try = '<div class="hint-text">Showing <b>'.$current.'</b> out of <b>'.$total_data.'</b> entries</div>';
// }
            
// $output = '
// <table class="table table-hover" id="allproductord">
               
//';
$to_encode = array();
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
    //active:draft
    $stat=$row['Status'];
    if($stat=='active')
    {
        // $s="<span class='logged-in'>ðŸŸ¢ </span>Active";
        $s="<span class='logged-in'></span>Active";
        
    }
    else if($stat=='draft')
    {
        //$s="<span><text id='tatus'>●</text><text id='status'>Draft</text></span>";
        // $s="<span class='logged-out'>ðŸŸ¡ </span>Draft";
         $s="<span class='logged-out'></span>Draft";
    }
    
    //vendor
    $records1 = mysqli_query($mysql,"SELECT Vendor_Name AS nam FROM vendor WHERE Vendor_ID='".$row["Vendor_ID"]."'"); 
    $data1 = mysqli_fetch_array($records1);
    $veni= $data1[0];
    
    //lot
    $records2 = mysqli_query($mysql,"SELECT Number AS nam FROM LOT WHERE id='".$row["Lot_ID"]."'"); 
    $data2 = mysqli_fetch_array($records2);
    $lot= $data2[0];
    
    //racks
    $records3 = mysqli_query($mysql,"SELECT name AS nam FROM racks WHERE SKU='".$row["SKU"]."'"); 
    $data3 = mysqli_fetch_array($records3);
    $rack= $data3[0];
    
 
    
    //add atrributes
    $checkbox="<input class='checkbox1' name='check[]' type='checkbox' value='".$row["Shopify_ID"]."'>";
    $skadd="<a href='https://backup.thriftops.com/ShopifyPush/viewProduct.php?id=".$row['Shopify_ID'] ."'>".$row['SKU']."</a>";
    $title="<details><summary>View</summary>".$row["Title"]."</details>";
    $date=date('Y-m-d', strtotime($row["DateTime"]));
    $select="<div class='btn-group align-top'>
                                        <select class='mark' name=".$row["Shopify_ID"]." id='mark'>
                                          <option disabled selected>
                                          </option>
                                          <option value='View'>View</option>
                                          <option value='Adjust'>Adjust Quantity</option>
                                          <option value='Cstatus'>Change Status</option>
                                          <option value='Sfetch'>Fetch Status</option>
                                        </select>";
    
    
    $to_encode[] = array(
        "check"=>$checkbox,
        "skuu"=>$skadd,
        "title"=> $title,
        "img"=>$img,
        "quantity"=>$row["Quantity"],
        "vendi"=>$veni,
        "lot"=>$lot,
        "rack"=>$rack,
        "sttatus"=>$s,
        "datetime"=>$date,
        "select"=>$select,
        );  
    // $output .= '
    
    // <tbody id="tbody" style="text-align:center">
    // <th>
    //   <td class="text-left cbox"><input class="checkbox1" name="check[]" type="checkbox" value='.$row["Shopify_ID"].'></td>
    //   <td class="text-left"><a href="https://backup.thriftops.com/ShopifyPush/viewProduct.php?id='.$row["Shopify_ID"].'"  >'.$row["SKU"].'</a></td>
    //   <td class="text-left">
    //   <details>
    //   <summary>View</summary>
    //   '.$row["Title"].'
    //   </details></td>
    //   <td class="img">'.$img.'</td>
    //   <td>'.$row["Quantity"].'</td>
    //   <td>'.$veni.'</td>
    //   <td>'.$lot.'</td>
    //   <td>'.$rack.'</td>
    //   <td>'.$s.'</td>
    //   <td>'.date('Y-m-d', strtotime($row["DateTime"])).'</td>
    //   <td><div class="btn-group align-top">
    //                                     <select class="mark" name="'.$row["Shopify_ID"].'" id="mark">
    //                                       <option disabled selected>
    //                                       </option>
    //                                       <option value="View">View</option>
    //                                       <option value="Adjust">Adjust Quantity</option>
    //                                       <option value="Cstatus">Change Status</option>
    //                                       <option value="Sfetch">Fetch Status</option>
    //                                     </select>
    //     </td>
    //   <td></td>
    // </th>
    // </tbody>'
    // ;
}

 echo json_encode($to_encode);
// $output .= '
// </table>
// <br />'.$try.'
// <div align="center">
//   <ul class="pagination">
// ';



// $total_links = ceil($total_data/$limit);
// $previous_link = '';
// $next_link = '';
// $page_link = '';

// //echo $total_links;

// if($total_links > 4)
// {
//   if($page < 5)
//   {
//     for($count = 1; $count <= 5; $count++)
//     {
//       $page_array[] = $count;
//     }
//     $page_array[] = '...';
//     $page_array[] = $total_links;
//   }
//   else
//   {
//     $end_limit = $total_links - 5;
//     if($page > $end_limit)
//     {
//       $page_array[] = 1;
//       $page_array[] = '...';
//       for($count = $end_limit; $count <= $total_links; $count++)
//       {
//         $page_array[] = $count;
//       }
//     }
//     else
//     {
//       $page_array[] = 1;
//       $page_array[] = '...';
//       for($count = $page - 1; $count <= $page + 1; $count++)
//       {
//         $page_array[] = $count;
//       }
//       $page_array[] = '...';
//       $page_array[] = $total_links;
//     }
//   }
// }
// else
// {
//   for($count = 1; $count <= $total_links; $count++)
//   {
//     $page_array[] = $count;
//   }
// }

// for($count = 0; $count < count($page_array); $count++)
// {
//   if($page == $page_array[$count])
//   {
//     $page_link .= '
//     <li class="page-item active">
//       <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
//     </li>
//     ';

//     $previous_id = $page_array[$count] - 1;
//     if($previous_id > 0)
//     {
//       $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
//     }
//     else
//     {
//       $previous_link = '
//       <li class="page-item disabled">
//         <a class="page-link" href="#">Previous</a>
//       </li>
//       ';
//     }
//     $next_id = $page_array[$count] + 1;
//     if($next_id > $total_links)
//     {
//       $next_link = '
//       <li class="page-item disabled">
//         <a class="page-link" href="#">Next</a>
//       </li>
//         ';
//     }
//     else
//     {
//       $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
//     }
//   }
//   else
//   {
//     if($page_array[$count] == '...')
//     {
//       $page_link .= '
//       <li class="page-item disabled">
//           <a href="#">...</a>
//       </li>
//       ';
//     }
//     else
//     {
//       $page_link .= '
//       <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
//       ';
//     }
//   }
// }

// $output .= $previous_link . $page_link . $next_link;
// $output .= '
//   </ul>

// </div>
// ';

// echo $output;

?>

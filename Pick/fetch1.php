<?php

session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);


$query = "SELECT SKU,Date,Order_Number,Order_ID FROM `Order`";


if(isset($_SESSION['id']) && $_SESSION['id'] == true) 
{
   $cr=$_SESSION['id'];
   
   $pr="Select * from User Where Dept_ID=13 AND User_ID='$cr' OR Dept_ID=16 AND User_ID='$cr' OR Dept_ID=3 AND User_ID='$cr'";
    $resu2 = mysqli_num_rows( mysqli_query($mysql, $pr));
    if($resu2<1)
    {
        echo '<script>alert("Your Are Not Authorized !");window.location.href="../Dashboard/Home.php";</script>';
    }  
    else
    {
        $my=  mysqli_query($mysql, $pr);
        $rowq1 =mysqli_fetch_array($my);
        $war=$rowq1['Warehouse_ID'];
        
        
        if($war==0)
        {
           $find=mysqli_query($mysql,"SELECT Vendor.SK_Prefix FROM `Vendor` inner join User On Vendor.Name=User.Name Where User.User_ID=$cr group by SK_Prefix LIMIT 1");
           $run =mysqli_fetch_array($find);
           $for=$run['SK_Prefix'];
           $rt="SKU LIKE '%$for-%'";
        }
         else if($war==1 || $war==2)
        {
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
        // else if($war==1)
        // {
        //   $find=mysqli_query($mysql,"SELECT * FROM Warehouse Where Warehouse_ID='$war'");
        //   $run =mysqli_fetch_array($find);
        //   $for=$run['SK_Format'];
        //   $rt="SKU LIKE '%SK-%' OR SKU LIKE '%FS-%'";
        //   //$rt="SKU LIKE '%$for-%'";
          
        // }
        // else if($war==2)
        // {
        //     $rt="SKU LIKE '%WP-%'";
        // }
        else
        {
            // $find=mysqli_query($mysql,"SELECT Vendor.SK_Prefix FROM `Vendor` inner join User On Vendor.Name=User.Name Where User.User_ID=$cr 
            // AND `Vendor`.Warehouse_ID='$war'group by SK_Prefix");
            
            // $rt = "SKU REGEXP '^(";
            // while ($run = mysqli_fetch_assoc($find))
            // {
            //     $skPrefix = mysqli_real_escape_string($mysql, $run['SK_Prefix']);
            //     $rt .="$skPrefix-|";
                
            // }
            
            // if (!empty($rt)) {
            //     $rt = rtrim($rt, " | ");
            //  }
            //  $rt.=")'";
        //   $find=mysqli_query($mysql,"SELECT Vendor FROM Warehouse Where Warehouse_ID='$war'");
        //   $run =mysqli_fetch_array($find);
        //   $for=$run['Vendor'];
        //   $ip=explode(",",$for);
        //   $sk;
        //     foreach($ip as $map)
        //     {
        //         $vend1="SELECT SK_Prefix FROM `Vendor` Where Vendor_ID='$map' ";
        //         $venres1=mysqli_query($mysql, $vend1);
        //         $venrow1 = mysqli_fetch_array($venres1);
        //         $ven1=$venrow1['SK_Prefix'];
        //         $sk.=$ven1.",";
        
        //     }
        //     $arr = explode(",", $sk);
            
        //     $counts = array_count_values($arr);
            
        //     $unique = [];
        //     foreach($counts as $key => $value) 
        //     {
        //       if ($value > 1) 
        //       {
        //         array_push($unique, $key);
        //       }
        //     }
        //     // $new_string = implode(",", $unique);
        //     // echo $new_string."<br>";
        //     $new_string .= "," . implode(",", array_diff($arr, $unique));
        //     // echo $new_string;
        //     $que = explode(",", $new_string);
        //     $inc=0;
            
            // foreach($que as $ma)
            // {
                
            //     if($inc>=1)
            //     {
            //         if($ma=='')
            //         {
                        
            //         }
            //         else
            //         {
            //             $rt.=" OR SKU LIKE '%$ma-%'";
            //         }
            //     }
            //     else
            //     {
            //         if($ma=='')
            //         {
                        
            //         }
            //         else
            //         {
            //             $rt="SKU LIKE '%$ma-%'";
            //             $inc++;
            //         }
            //     }
                
            // }
            //  $rt.=" AND SKU NOT LIKE '%SK-%' AND SKU NOT LIKE '%WP-%'";
            $rt.="NOT SKU REGEXP '^(SK-|WP-|SF-|FS-)'";
            // $rt.="SKU NOT LIKE '%SK-%' AND SKU NOT LIKE '%WP-%' AND SKU NOT LIKE '%SF-%'";
        }
    }
}
else 
{
   echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
}





if(isset($_POST['cond']))
{
    $cond=$_POST['cond'];
    
    if($cond=="Pick")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Status="Booked" AND '.$rt.' AND Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
             }
        }
        else
        {
            $query .= ' WHERE Status="Booked" AND '.$rt.' AND Date > "2023-04-01"';
        }
    }
    if($cond=="Picked")
    {
        if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Status LIKE "%Received%" AND '.$rt.' AND Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
             }
        }
        else
        {
            $query .= ' WHERE Status LIKE "%Received%" AND '.$rt;
        }
    }
    if($cond=="Not")
    {
       if(!empty($_POST['from']))
        {
             if(!empty($_POST['to']))
             {
                 $query .= ' WHERE Status LIKE "%Not_Found%" AND Date Between "'.$_POST['from'].'" AND "'.$_POST['to'].'"';
             }
        }
        else
        {
            $query .= ' WHERE Status LIKE "%Not_Found%" AND '.$rt;
        }
    }

}



if(!empty($_POST['ordernum']))
{
    $ord=$_POST['ordernum'];
    if(is_numeric($cut))
    {
        $query .= ' WHERE Order_Number LIKE "%#'.str_replace(' ', '%', $_POST['ordernum']).'%" AND Status in ("Booked","Picked","Not_Found","QC_Rejected") AND '.$rt;
    }
    else
    {
       $query .= ' WHERE Order_Number LIKE "%'.str_replace(' ', '%', $_POST['ordernum']).'%" AND Status in  ("Booked","Picked","Not_Found","QC_Rejected") AND '.$rt;
    }
    
}


if($_POST['items'] != '')
{
  $query .= ' WHERE SKU LIKE "%'.str_replace(' ', '%', $_POST['items']).'%" AND Status in  ("Booked","Picked","Not_Found","QC_Rejected") AND '.$rt;
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
    $query .= ' ORDER BY Order_ID DESC';
}


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

<table class="table table-hover" id="allproduct">
';

while($row = mysqli_fetch_array($result))
{
    
    //location
    $records1 = mysqli_query($mysql,"SELECT name AS nam FROM racks WHERE SKU='".$row["SKU"]."'"); 
    $data1 = mysqli_fetch_array($records1);
    $loc= $data1[0];
    
      //image
    $records2 = mysqli_query($mysql,"SELECT Image_1 AS img FROM addition WHERE SKU='".$row["SKU"]."'"); 
    $data2 = mysqli_fetch_array($records2);
    $pr= $data2[0];
    $img=  "<img src = '$pr' width='100' height='100' >";
  
 
    $output .= '
    
    <tbody id="tbody" style="text-align:center">
    <tr>
        <td>'.$count++.'</td>
      <td>'.$img.'</td>
      <td>'.$row["SKU"].'</td>
      <td>'.$row['Order_Number'].'</td>
      <td>'.$loc.'</td>
      <td>'.$row["Date"].'</td>
      <td class="align-middle text-center">
                                        <div class="btn-group align-top" style="margin-top: 5px;">
                                            <input ord="'.$row["Order_ID"].'" type="button" name="pick" value="Pick" id="'. $row["SKU"].'" class="btn btn-md btn-primary pick_data" />
                                          </div>
                                          <div class="btn-group align-top" style="margin-top: 5px;">
                                           <input ord="'.$row["Order_ID"].'" type="button" name="not" value="Not Found" id="'. $row["SKU"].'" class="btn btn-md btn-secondry not_data" />
                                          </div>
                                          <div class="btn-group align-top" style="margin-top: 5px;">
                                          <input ord="'.$row["Order_ID"].'" type="button" name="qc" value="QC Reject" id="'. $row["SKU"].'" class="btn btn-md btn-danger qc_data" />
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
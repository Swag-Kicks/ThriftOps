<?php

session_start();
include_once("../include/mysql_connection1.php"); 
error_reporting(0);




$limit = '20';
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}

$query = "SELECT * FROM orders";

if($_POST['query'] != '')
{
  $query .= ' WHERE Status!="None" AND Status="Booked" AND Items NOT LIKE "WP-%" AND Items NOT LIKE "wp-%" AND Items NOT LIKE "G-%" AND Date > "2022-07-1" AND Items LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR order_num LIKE "%#'.str_replace(' ', '%', $_POST['query']).'%"';
//   echo $query;
}
else
{
    $query .=' WHERE Status!="None" AND Status="Booked" AND Items NOT LIKE "WP-%" AND Items NOT LIKE "wp-%" AND Items NOT LIKE "G-%" AND Date > "2022-07-1"';
}


$query .= ' ORDER BY order_num ASC';
//echo $query;
$total_data=mysqli_num_rows(mysqli_query($mysql, $query));
//print_r($total_data);


$filter_query = $query . ' LIMIT '.$start.', '.$limit.'';
// echo $filter_query;



$result = mysqli_query($mysql, $filter_query);

$total_filter_data = mysqli_num_rows(mysqli_query($mysql, $filter_query));
// echo $total_filter_data ;


$output = '
<label class="data_count">Total Records - '.$total_data.'</label>
<table class="table table-hover">
  <thead>
  <tr>
        <th scope="col">Order Number</th>
        <th scope="col">SKU</th>
        <th scope="col">Rack Location</th>
        <th scope="col">Image</b></th>
        <th scope="col">Status</b></th>
        <th scope="col">Date</th>
  </tr>
  </thead>
';

while($row = mysqli_fetch_array($result))
{
    
    $que="Select * From racks where SKU='".$row["Items"]."'";
    $res = mysqli_query($mysql, $que);
    $row1 = mysqli_fetch_array($res);
    $rack=$row1["name"];
                                        
                                      $sk=$row['Items'];
                                      $num = substr($row["Items"],0,5);
                                      $ss=substr($row["Items"],0,4);
                                      $w=substr($row["Items"],0,3);
                                       
                                      if(substr($row["Items"],0,4)=='WP-S' || substr($row["Items"],0,4)=='SK-S' || substr($row["Items"],0,4)=='wp-S' || substr($row["Items"],0,3)=='SK-' || substr($row["Items"],0,3)=='WP-')
                                      {
                                          $image = "SELECT * FROM shoes WHERE SKU='$sk'";
                                          $res_img = mysqli_query($mysql, $image);
                                          $ro1 =mysqli_fetch_array($res_img);
                                          $pic=$ro1['Image_1'];
                                          $ind=$pic[0];
                                          if(isset($pic))
                                          {
                                                    if (!is_numeric($ind))
                                                    {
                                                        //echo $pic;
                                                        $img= "<img src = '$pic' width='100' height='100' >";
                                                    }
                                                    
                                                    else if(is_numeric($ind))
                                                    {
                                                         $pr='https://upload.thriftops.com/Shoes/uploads/'.$pic;
                                                         //echo $pr;
                                                         $img=  "<img src = '$pr' width='100' height='100' >";
                                                    }
                                                    
                                                    else
                                                    {
                                                        $img= "<img src = '' width='100' height='100' >";
                                                    }
       
                                           }
                                        
 
                                            else
                                            {
                                                $img= "<img src = '' width='100' height='100' >";
                                            }
                                      }
                                        //  else if($num=='SK-TP')
                                        //  {
                                        //     $image = "SELECT * FROM TOPS WHERE SKU='$sk'";
                                        //     $res_img = mysqli_query($mysql, $image);
                                        //     $ro1 =mysqli_fetch_array($res_img);
                                        //     $pic=$ro1['Image_1'];
                                        //     $ind=$pic[0];
                                             
                                             
                                        //         if(isset($pic))
                                        //         {
                                        //             if (!is_numeric($ind))
                                        //             {
                                        //                 //echo $pic;
                                        //                 $img=  "<img src = '$pic' width='100' height='100' >";
                                        //             }
                                                    
                                        //             else if(is_numeric($ind))
                                        //             {
                                        //                 $pr='https://upload.thriftops.com/Tops/uploads/'.$pic;
                                        //                  //echo $pr;
                                        //                  $img= "<img src = '$pr' width='100' height='100' >";
                                        //             }
                                                    
                                                    
                                        //         }
                                              
                                        //   }
                                          
                                          
                                        //   else if($ss=='SK-H')
                                        //   {
                                        //       $image = "SELECT * FROM Hoodies WHERE SKU='$sk'";
                                        //       $res_img = mysqli_query($mysql, $image);
                                        //       $ro1 =mysqli_fetch_array($res_img);
                                        //         $pic=$ro1['Image_1'];
                                        //         $ind=$pic[0];
                                             
                                             
                                        //         if(isset($pic))
                                        //         {
                                        //             if (!is_numeric($ind))
                                        //             {
                                        //                 //echo $pic;
                                        //                 $img= "<img src = '$pic' width='100' height='100' >";
                                        //             }
                                                    
                                        //             else if(is_numeric($ind))
                                        //             {
                                        //                 $pr='https://upload.thriftops.com/Hoddies/uploads/'.$pic;
                                        //                  //echo $pr;
                                        //                  $img= "<img src = '$pr' width='100' height='100' >";
                                        //             }
                                                    
                                                    
                                        //         }
                                              
                                               
                                        //   }
                                        //   else if($ss=='SK-C')
                                        //   {
                                        //       $image = "SELECT * FROM caps WHERE SKU='$sk'";
                                        //       $res_img = mysqli_query($mysql, $image);
                                        //       $ro1 =mysqli_fetch_array($res_img);
                                        //         $pic=$ro1['Image_1'];
                                        //         $ind=$pic[0];
                                             
                                             
                                        //         if(isset($pic))
                                        //         {
                                        //             if (!is_numeric($ind))
                                        //             {
                                        //                 //echo $pic;
                                        //                 $img= "<img src = '$pic' width='100' height='100' >";
                                        //             }
                                                    
                                        //             else if(is_numeric($ind))
                                        //             {
                                        //                 $pr='https://upload.thriftops.com/caps/uploads/'.$pic;
                                        //                  //echo $pr;
                                        //                  $img= "<img src = '$pr' width='100' height='100' >";
                                        //             }
                                                    
                                                    
                                        //         }
                                              
                                            
                                              
                                               
                                        //   }
                                           
                                        //   else if($num=='SK-CL')
                                        //   {
                                        //       $image = "SELECT * FROM Cleaning kits WHERE SKU='$sk'";
                                        //       //echo $sk;
                                        //       $res_img = mysqli_query($mysql, $image);
                                        //       $ro1 =mysqli_fetch_array($res_img);
                                        //         $pic=$ro1['Image_1'];
                                        //         $ind=$pic[0];
                                             
                                             
                                        //         if(isset($pic))
                                        //         {
                                        //             if (!is_numeric($ind))
                                        //             {
                                        //                 //echo $pic;
                                        //                 $img= "<img src = '$pic' width='100' height='100' >";
                                        //             }
                                                    
                                        //             else if(is_numeric($ind))
                                        //             {
                                        //                 $pr='https://upload.thriftops.com/Clean_kits/uploads/'.$pic;
                                        //                  //echo $pr;
                                        //                  $img= "<img src = '$pr' width='100' height='100' >";
                                        //             }
                                                    
                                                    
                                        //         }
                                              
                                               
                                        //   }
                                           
                                        //   else if($ss=='SK-M')
                                        //   {
                                        //       $image = "SELECT * FROM Mufflers WHERE SKU='$sk'";
                                        //       //echo $sk;
                                        //       $res_img = mysqli_query($mysql, $image);
                                        //       $ro1 =mysqli_fetch_array($res_img);
                                        //       $pic=$ro1['Image_1'];
                                        //         $ind=$pic[0];
                                             
                                             
                                        //         if(isset($pic))
                                        //         {
                                        //             if (!is_numeric($ind))
                                        //             {
                                        //                 //echo $pic;
                                        //                 $img= "<img src = '$pic' width='100' height='100' >";
                                        //             }
                                                    
                                        //             else if(is_numeric($ind))
                                        //             {
                                        //                 $pr='https://upload.thriftops.com/Mufflers/uploads/'.$pic;
                                        //                  //echo $pr;
                                        //                  $img= "<img src = '$pr' width='100' height='100' >";
                                        //             }
                                                    
                                                    
                                        //         }
                                              
                                               
                                        //   }
                                        //   else if($num=='SK-SC')
                                        //   {
                                        //       $image = "SELECT * FROM Socks WHERE SKU='$sk'";
                                        //       //echo $sk;
                                        //       $res_img = mysqli_query($mysql, $image);
                                        //       $ro1 =mysqli_fetch_array($res_img);
                                        //       $pic=$ro1['Image_1'];
                                        //         $ind=$pic[0];
                                             
                                             
                                        //         if(isset($pic))
                                        //         {
                                        //             if (!is_numeric($ind))
                                        //             {
                                        //                 //echo $pic;
                                        //                 $img= "<img src = '$pic' width='100' height='100' >";
                                        //             }
                                                    
                                        //             else if(is_numeric($ind))
                                        //             {
                                        //                 $pr='https://upload.thriftops.com/Socks/uploads/'.$pic;
                                        //                  //echo $pr;
                                        //                  $img= "<img src = '$pr' width='100' height='100' >";
                                        //             }
                                                    
                                                    
                                        //         }
                                              
                                               
                                        //   }
                                           
                                           
                                        //   else if($tri=='SK-SHO')
                                        //   {
                                        //       $image = "SELECT * FROM shorts WHERE SKU='$sk'";
                                        //       //echo $sk;
                                        //       $res_img = mysqli_query($mysql, $image);
                                        //       $ro1 =mysqli_fetch_array($res_img);
                                        //       $pic=$ro1['Image_1'];
                                        //         $ind=$pic[0];
                                             
                                             
                                        //         if(isset($pic))
                                        //         {
                                        //             if (!is_numeric($ind))
                                        //             {
                                        //                 //echo $pic;
                                        //                 $img= "<img src = '$pic' width='100' height='100' >";
                                        //             }
                                                    
                                        //             else if(is_numeric($ind))
                                        //             {
                                        //                 $pr='https://upload.thriftops.com/Shorts/uploads/'.$pic;
                                        //                  //echo $pr;
                                        //                  $img= "<img src = '$pr' width='100' height='100' >";
                                        //             }
                                                    
                                                    
                                        //         }
                                              
                                               
                                        //   }
                                           
                                        //   else if($num=='SK-TS')
                                        //   {
                                        //       $image = "SELECT * FROM tshirts WHERE SKU='$sk'";
                                        //       //echo $sk;
                                        //       $res_img = mysqli_query($mysql, $image);
                                        //       $ro1 =mysqli_fetch_array($res_img);
                                        //       $pic=$ro1['Image_1'];
                                        //         $ind=$pic[0];
                                             
                                             
                                        //         if(isset($pic))
                                        //         {
                                        //             if (!is_numeric($ind))
                                        //             {
                                        //                 //echo $pic;
                                        //                 $img= "<img src = '$pic' width='100' height='100' >";
                                        //             }
                                                    
                                        //             else if(is_numeric($ind))
                                        //             {
                                        //                 $pr='https://upload.thriftops.com/T-Shirts/uploads/'.$pic;
                                        //                  //echo $pr;
                                        //                  $img= "<img src = '$pr' width='100' height='100' >";
                                        //             }
                                                    
                                                    
                                        //         }
                                              
                                               
                                        //   }
                                           
                                        //   else if($num=='SK-SH')
                                        //   {
                                        //       $image = "SELECT * FROM shirts WHERE SKU='$sk'";
                                        //       //echo $sk;
                                        //       $res_img = mysqli_query($mysql, $image);
                                        //       $ro1 =mysqli_fetch_array($res_img);
                                        //       $pic=$ro1['Image_1'];
                                        //         $ind=$pic[0];
                                             
                                             
                                        //         if(isset($pic))
                                        //         {
                                        //             if (!is_numeric($ind))
                                        //             {
                                        //                 //echo $pic;
                                        //                 $img= "<img src = '$pic' width='100' height='100' >";
                                        //             }
                                                    
                                        //             else if(is_numeric($ind))
                                        //             {
                                        //                 $pr='https://upload.thriftops.com/Shirts/uploads/'.$pic;
                                        //                  //echo $pr;
                                        //                  $img= "<img src = '$pr' width='100' height='100' >";
                                        //             }
                                                    
                                                    
                                        //         }
                                              
                                               
                                        //   }
                                           
                                        //   else if($num=='SK-SN')
                                        //   {
                                        //       $image = "SELECT * FROM sandals WHERE SKU='$sk'";
                                        //       //echo $sk;
                                        //       $res_img = mysqli_query($mysql, $image);
                                        //       $ro1 =mysqli_fetch_array($res_img);
                                        //       $pic=$ro1['Image_1'];
                                        //         $ind=$pic[0];
                                             
                                             
                                        //         if(isset($pic))
                                        //         {
                                        //             if (!is_numeric($ind))
                                        //             {
                                        //                 //echo $pic;
                                        //                 $img= "<img src = '$pic' width='100' height='100' >";
                                        //             }
                                                    
                                        //             else if(is_numeric($ind))
                                        //             {
                                        //                 $pr='https://upload.thriftops.com/Sandals/uploads/'.$pic;
                                        //                  //echo $pr;
                                        //                  $img= "<img src = '$pr' width='100' height='100' >";
                                        //             }
                                                    
                                                    
                                        //         }
                                              
                                               
                                        //   }
                                           
                                        //   else if($ss=='SK-B')
                                        //   {
                                        //       $image = "SELECT * FROM Beanies WHERE SKU='$sk'";
                                        //       //echo $sk;
                                        //       $res_img = mysqli_query($mysql, $image);
                                        //       $ro1 =mysqli_fetch_array($res_img);
                                        //       $pic=$ro1['Image_1'];
                                        //         $ind=$pic[0];
                                             
                                             
                                        //         if(isset($pic))
                                        //         {
                                        //             if (!is_numeric($ind))
                                        //             {
                                        //                 //echo $pic;
                                        //                 $img= "<img src = '$pic' width='100' height='100' >";
                                        //             }
                                                    
                                        //             else if(is_numeric($ind))
                                        //             {
                                        //                 $pr='https://upload.thriftops.com/Beanies/uploads/'.$pic;
                                        //                  //echo $pr;
                                        //                  $img= "<img src = '$pr' width='100' height='100' >";
                                        //             }
                                                    
                                                    
                                        //         }
                                              
                                               
                                        //   }
                                           
                                        //   else if($num=='SK-BG')
                                        //   {
                                        //       $image = "SELECT * FROM Bags WHERE SKU='$sk'";
                                        //       //echo $sk;
                                        //       $res_img = mysqli_query($mysql, $image);
                                        //       $ro1 =mysqli_fetch_array($res_img);
                                        //       $pic=$ro1['Image_1'];
                                        //         $ind=$pic[0];
                                             
                                             
                                        //         if(isset($pic))
                                        //         {
                                        //             if (!is_numeric($ind))
                                        //             {
                                        //                 //echo $pic;
                                        //                 $img= "<img src = '$pic' width='100' height='100' >";
                                        //             }
                                                    
                                        //             else if(is_numeric($ind))
                                        //             {
                                        //                 $pr='https://upload.thriftops.com/Bags/uploads/'.$pic;
                                        //                  //echo $pr;
                                        //                  $img= "<img src = '$pr' width='100' height='100' >";
                                        //             }
                                                    
                                                    
                                        //         }
                                              
                                               
                                        //   }
                                           
                                        // else
                                        //   {
                                        //         // $img= "<img src = '' width='100' height='100' >";
                                        //   }

      
    $output .= '
     <tbody class="table" style="text-align:center">
    <tr>
      <td><a target = "_blank" href="../Order_Level/Order_Search.php?GETID='. $row["order_id"].'"<i></i><b>'.$row["order_num"].'</b></a></td>
      <td>'.$row["Items"].'</td>
      <td>'.$rack.'</td>
      <td>'.$img.'</td>
      <td class="align-middle text-center">
                                        <div class="btn-group align-top" style="margin-top: 5px;">
                                            <input ord="'.$row["order_id"].'" type="button" name="pick" value="Pick" id="'. $row["Items"].'" class="btn btn-md btn-primary pick_data" />
                                          </div>
                                          <div class="btn-group align-top" style="margin-top: 5px;">
                                           <input ord="'.$row["order_id"].'" type="button" name="not" value="Not Found" id="'. $row["Items"].'" class="btn btn-md btn-secondry not_data" />
                                          </div>
                                          <div class="btn-group align-top" style="margin-top: 5px;">
                                          <input ord="'.$row["order_id"].'" type="button" name="qc" value="QC Reject" id="'. $row["Items"].'" class="btn btn-md btn-danger qc_data" />
                                          </div>
                                    </td>
      <td>'.$row["Date"].'</td>
   </tr>
    </tbody>'
    ;
}

$output .= '
</table>
<br />
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
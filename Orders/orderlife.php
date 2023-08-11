<?php 
session_start();
   include_once("../include/mysql_connection.php"); 
   error_reporting(0);
   date_default_timezone_set("Asia/Karachi");
   $C_Date = date('Y-m-d/h:i:a');

   $$cr=$_SESSION['Username'];
if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
{
    $pr="Select * from Users Where Dept_ID=2 AND Username='$cr' OR Dept_ID=3 AND Username='$cr' OR Dept_ID=13 AND Username='daniyal.sheikh'";
    $resu2 = mysqli_query($mysql, $pr);
    $rowq1 =mysqli_fetch_array($resu2);
    $dept=$rowq1['Dept_ID'];
    //echo $dept;
    if($dept=='')
    {
        echo '<script>alert("Your Are Not Authorized !");window.location.href="../Dashboard/Home.php";</script>';
    }   
}
else 
{
    echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
   
}


       $ID= $_GET['GETID'];
       $user=$_SESSION['Username'];
       $sql = "SELECT *, GROUP_CONCAT(Items) as con FROM orders WHERE order_id='$ID' AND Date > '2022-03-20'";
       $result = mysqli_query($mysql, $sql);
       
       while($row = mysqli_fetch_assoc($result))
       {

            $Order_Num = $row['order_num'];
            $invoice_total =$row['Total_Amount'];
            $Customer_Name=$row['Customer_Name'];
            $Customer_Phone=$row['Customer_Contact'];
            $Customer_Address=$row['Customer_Address'];
            $status=$row['Status'];
            $City=$row['Customer_City'];
            $con=$row['con'];
            $dis=$row['Total_Discount'];
            $Date=$row['Date'];
            $shop_id=$row['order_id'];
            $dis=$row['Courier_Charges'];
            
            //confirm
            $confirm=$row['Confirmed_By'];
            $c_d=$row['Confirmed_By_Time'];
            $na1="SELECT * FROM Users WHERE Username='$confirm'";
            $re_1 = mysqli_query($mysql, $na1);
            $r1 = mysqli_fetch_assoc($re_1);
            $c_name=$r1['Name'];
            
            //book
            $book=$row['Booked_By'];
            $b_d=$row['Booked_By_Time'];
            $na2="SELECT * FROM Users WHERE Username='$book'";
            $re_2 = mysqli_query($mysql, $na2);
            $r2 = mysqli_fetch_assoc($re_2);
            $b_name=$r2['Name'];
            
            //dispatch advice 
            $advice=$row['Dispatch_Advice'];
            
            //courier
            
            //karachi
            $co1="Select * from karachi_courier Where order_id='$ID'";
            $co1k = mysqli_query($mysql, $co1);
            $co1kr = mysqli_fetch_assoc($co1k);
            $co1kp=$co1kr['Courier_Tracking'];
            // echo $co1kp;
            
            //leopard
            $co2="Select * from leopard_courier Where order_id='$ID'";
            $co2l = mysqli_query($mysql, $co2);
            $co2lr = mysqli_fetch_assoc($co2l);
            $co2lp=$co2lr['Courier_Tracking'];
            // echo $co2lp;
            
            //trax
            $co3="Select * from trax_courier Where order_id='$ID'";
            $co3t = mysqli_query($mysql, $co3);
            $co3tr = mysqli_fetch_assoc($co3t);
            $co3tp=$co3tr['Courier_Tracking'];
            // echo $co3tp;
            
            //postex
            $co4="Select * from post_ex_courier Where order_id='$ID'";
            $co4p = mysqli_query($mysql, $co4);
            $co4pr = mysqli_fetch_assoc($co4p);
            $co4pp=$co4pr['Courier_Tracking'];
            // echo $co4pp;
            
            
            //hold
            $hold=$row['Hold_By'];
            $h_d=$row['Hold_By_Time'];
            $na3="SELECT * FROM Users WHERE Username='$hold'";
            $re_3 = mysqli_query($mysql, $na3);
            $r3 = mysqli_fetch_assoc($re_3);
            $h_name=$r3['Name'];
            
            //cancel
            $cancel=$row['Cancel_By'];
            $cn_d=$row['Cancel_By_Time'];
            $na4="SELECT * FROM Users WHERE Username='$cancel'";
            $re_4 = mysqli_query($mysql, $na4);
            $r4 = mysqli_fetch_assoc($re_4);
            $cn_name=$r4['Name'];
            
            $pick=$row['Picked_By'];
            $pack=$row['Packed_By'];
            
            $recieve=$row['Recieved_By'];
            
            $return=$row['Returned_To'];
            
            
            //update
            $update=$row['Updated_By'];
            $u_d=$row['Updated_By_Time'];
       }
      

   
?>


<?php include ("../include/header.php"); ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <br>
   <script>
     $(document).ready(function() {
       $(document).on('click', 'a[data-role=infrm]', function() {
         var id1 = $(this).data('id');
         var conf_tag = $('#' + id1).children('td[data-target=conf_tag]').text();
         $('#conf_tag').val(conf_tag);
         $('#conf_id').val(id1);
         $('#confirm').modal('toggle');
       });
       $('#conf_save').click(function() {
         var id1 = $('#conf_id').val();
         var conf_tag = $('#conf_tag').val();
         $.ajax({
           url: 'Add_Remove_item.php',
           type: 'POST',
           data: {
             conf_tag: conf_tag,
             id1: id1
           },
           success: function(response) {
             console.log(response);
             $('#' + id1).children('td[data-target=conf_tag]').text(conf_tag);
             $('#confirm').modal('toggle');
             location.reload();
           }
         });
       });
     });
   </script>
<div class="row">
<div class="col-md-12">
   <div class="card">
      <div class="card-header">
         <h3 class="mb-0 card-title">Order Details</h3>
      </div>
      <div class="btn-group align-top" style="position: absolute;right: 10px;top: 25px;">
            <a class="btn btn-sm btn-primary" target = '_blank' href="../accounts/Print.php?GETID=<?php echo $ID ?>"></i> Print</a>
      </div>
      
      <div class="btn-group align-top" style="position: absolute;right: 78px;top: 25px;">
            <a class="btn btn-sm btn-danger" target = '_blank' href="../Return/Manual_Add.php"></i>Initiate Return</a>
      </div>
      
      <div class="btn-group align-top" style="position: absolute;right: 202px;top: 25px;">
        <a class="btn btn-sm btn-primary" href="#" data-role="infrm" data-id="<?php echo $ID; ?>">Add</a>
     </div>
      
      <form action="" method="POST">
         <div class="card-body">
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="form-label">Order Reference </label>
                     <input type="text" class="form-control" name="order_ref" value="<?php echo $Order_Num; ?>" readonly style=" padding: 20px !important;">
                  </div>
                  <div class="form-group">
                     <label class="form-label">Shopify Order ID</label>
                     <input type="text" class="form-control" name="order_ref" value="<?php echo $ID; ?>" readonly style=" padding: 20px !important;">
                  </div>
                  <div class="form-group">
                     <label class="form-label">Date</label>
                     <input type="text" class="form-control" name="date" value="<?php echo $Date; ?>" readonly style=" padding: 20px !important;">
                  </div>
                  <div class="form-group">
                     <label class="form-label">Invoice Payment</label>
                     <input type="text" class="form-control" name="invoice_pay" value="<?php echo $invoice_total; ?>" readonly  style=" padding: 20px !important;">
                  </div>
               </div>
               

               <div class="col-md-6">
                   <div class="form-group">
                     <label class="form-label">Customer Name</label>
                     <input type="text" class="form-control" name="cus_name" value="<?php echo $Customer_Name; ?>" readonly style=" padding: 20px !important;">
                  </div>
                  <div class="form-group">
                     <label class="form-label">Customer Phone</label>
                     <input type="text" class="form-control" name="cus_phone" value="<?php echo $Customer_Phone; ?>" readonly style=" padding: 20px !important;">
                  </div>
                  <div class="form-group">
                     <label class="form-label">City</label>
                     <input type="text" class="form-control" name="city" value="<?php echo $City; ?>" readonly style=" padding: 20px !important;">
                  </div>
                  <div class="form-group">
                     <label>Delivery Address</label>
                     <textarea class="form-control" name="address" placeholder="HTML tags allowed" readonly><?php echo $Customer_Address; ?> </textarea>
                  </div>
               </div>

                
                <div class="col-md-6">
                     <label class="form-label">Items</label>
                     <input type="text" class="form-control" name="items" value="<?php echo $con; ?>" readonly style=" padding: 20px !important;">
                  </div>
	
                  
				<div class="col-md-6">
                    <label class="form-label">Courier Charges</label>
                    <input type="text" class="form-control" name="co_c" value="<?php echo $dis; ?>" readonly  style=" padding: 20px !important;">
                </div>
			
				
					
            </div>
            </div>
            
            <div class="e-table">
        <div class="table-responsive table-lg">
          <table class="table table-bordered">
                            			<thead>
                            			    <th>S.No</th>
                            				<th>Items</th>
                            				<th>Price</th>
                            				<th>Image</th>
                            				<th>Add/Remove</th>
                            			</thead>
                            			<tbody>
                                				<?php
                                				$iq=1;
                                					$query=mysqli_query($mysql,"SELECT * FROM orders WHERE order_id='$ID'");
                                					while($row=mysqli_fetch_array($query)){
                                						?>
                                						<tr>
                                						    <td><?php echo $iq; ?></td>
                                							<td><?php echo $row['Items']; ?></td>
                                							<td><?php echo $row['Items_Price']; ?></td>
                                							<td>
                                                                <?php
                                                                   $sk=$row['Items'];
                                                                   $num = substr($row["Items"],0,5);
                                                                   $ss=substr($row["Items"],0,4);
                                                                   $w=substr($row["Items"],0,3);
                                                                   
                                                                   if(substr($row["Items"],0,4)=='WP-S' || substr($row["Items"],0,4)=='SK-S' || substr($row["Items"],0,4)=='wp-S' || substr($row["Items"],0,3)=='SK-' || substr($row["Items"],0,3)=='WP-')
                                                                   {
                                                                       $image = "SELECT * FROM shoes WHERE SKU='$sk'";
                                                                       //echo $sk;
                                                                       $res_img = mysqli_query($mysql, $image);
                                                                       $ro1 =mysqli_fetch_array($res_img);
                                                                       $pic=$ro1['Image_1'];
                                                                       $ind=$pic[0];
                                                                       //echo $ind;
                                                                       //print_r($pic);
                                                                       //echo "<img src = '".$ro1['Image_1']."' width='100' height='100' >";
                                                                          if(isset($pic))
                                                                          {
                                                                                if (!is_numeric($ind))
                                                                                {
                                                                                    //echo $pic;
                                                                                    echo "<img src = '$pic' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                else if(is_numeric($ind))
                                                                                {
                                                                                    $pr='https://upload.thriftops.com/Shoes/uploads/'.$pic;
                                                                                     //echo $pr;
                                                                                     echo "<img src = '$pr' width='100' height='100' >";
                                                                                }
                                   
                                                                          }
                             
                                                                    }
                                                                     else if($num=='SK-TP')
                                                                     {
                                                                        $image = "SELECT * FROM TOPS WHERE SKU='$sk'";
                                                                        $res_img = mysqli_query($mysql, $image);
                                                                        $ro1 =mysqli_fetch_array($res_img);
                                                                        $pic=$ro1['Image_1'];
                                                                        $ind=$pic[0];
                                                                         
                                                                         
                                                                            if(isset($pic))
                                                                            {
                                                                                if (!is_numeric($ind))
                                                                                {
                                                                                    //echo $pic;
                                                                                    echo "<img src = '$pic' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                else if(is_numeric($ind))
                                                                                {
                                                                                    $pr='https://upload.thriftops.com/Tops/uploads/'.$pic;
                                                                                     //echo $pr;
                                                                                     echo "<img src = '$pr' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                
                                                                            }
                                                                          
                                                                      }
                                                                      
                                                                      
                                                                      else if($ss=='SK-H')
                                                                       {
                                                                           $image = "SELECT * FROM Hoodies WHERE SKU='$sk'";
                                                                           $res_img = mysqli_query($mysql, $image);
                                                                           $ro1 =mysqli_fetch_array($res_img);
                                                                            $pic=$ro1['Image_1'];
                                                                            $ind=$pic[0];
                                                                         
                                                                         
                                                                            if(isset($pic))
                                                                            {
                                                                                if (!is_numeric($ind))
                                                                                {
                                                                                    //echo $pic;
                                                                                    echo "<img src = '$pic' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                else if(is_numeric($ind))
                                                                                {
                                                                                    $pr='https://upload.thriftops.com/Hoddies/uploads/'.$pic;
                                                                                     //echo $pr;
                                                                                     echo "<img src = '$pr' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                
                                                                            }
                                                                          
                                                                           
                                                                       }
                                                                       else if($ss=='SK-C')
                                                                       {
                                                                           $image = "SELECT * FROM caps WHERE SKU='$sk'";
                                                                           $res_img = mysqli_query($mysql, $image);
                                                                           $ro1 =mysqli_fetch_array($res_img);
                                                                            $pic=$ro1['Image_1'];
                                                                            $ind=$pic[0];
                                                                         
                                                                         
                                                                            if(isset($pic))
                                                                            {
                                                                                if (!is_numeric($ind))
                                                                                {
                                                                                    //echo $pic;
                                                                                    echo "<img src = '$pic' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                else if(is_numeric($ind))
                                                                                {
                                                                                    $pr='https://upload.thriftops.com/caps/uploads/'.$pic;
                                                                                     //echo $pr;
                                                                                     echo "<img src = '$pr' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                
                                                                            }
                                                                          
                                                                        
                                                                          
                                                                           
                                                                       }
                                                                       
                                                                       else if($num=='SK-CL')
                                                                       {
                                                                           $image = "SELECT * FROM Cleaning kits WHERE SKU='$sk'";
                                                                           //echo $sk;
                                                                           $res_img = mysqli_query($mysql, $image);
                                                                           $ro1 =mysqli_fetch_array($res_img);
                                                                            $pic=$ro1['Image_1'];
                                                                            $ind=$pic[0];
                                                                         
                                                                         
                                                                            if(isset($pic))
                                                                            {
                                                                                if (!is_numeric($ind))
                                                                                {
                                                                                    //echo $pic;
                                                                                    echo "<img src = '$pic' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                else if(is_numeric($ind))
                                                                                {
                                                                                    $pr='https://upload.thriftops.com/Clean_kits/uploads/'.$pic;
                                                                                     //echo $pr;
                                                                                     echo "<img src = '$pr' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                
                                                                            }
                                                                          
                                                                           
                                                                       }
                                                                       
                                                                       else if($ss=='SK-M')
                                                                       {
                                                                           $image = "SELECT * FROM Mufflers WHERE SKU='$sk'";
                                                                           //echo $sk;
                                                                           $res_img = mysqli_query($mysql, $image);
                                                                           $ro1 =mysqli_fetch_array($res_img);
                                                                           $pic=$ro1['Image_1'];
                                                                            $ind=$pic[0];
                                                                         
                                                                         
                                                                            if(isset($pic))
                                                                            {
                                                                                if (!is_numeric($ind))
                                                                                {
                                                                                    //echo $pic;
                                                                                    echo "<img src = '$pic' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                else if(is_numeric($ind))
                                                                                {
                                                                                    $pr='https://upload.thriftops.com/Mufflers/uploads/'.$pic;
                                                                                     //echo $pr;
                                                                                     echo "<img src = '$pr' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                
                                                                            }
                                                                          
                                                                           
                                                                       }
                                                                       else if($num=='SK-SC')
                                                                       {
                                                                           $image = "SELECT * FROM Socks WHERE SKU='$sk'";
                                                                           //echo $sk;
                                                                           $res_img = mysqli_query($mysql, $image);
                                                                           $ro1 =mysqli_fetch_array($res_img);
                                                                           $pic=$ro1['Image_1'];
                                                                            $ind=$pic[0];
                                                                         
                                                                         
                                                                            if(isset($pic))
                                                                            {
                                                                                if (!is_numeric($ind))
                                                                                {
                                                                                    //echo $pic;
                                                                                    echo "<img src = '$pic' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                else if(is_numeric($ind))
                                                                                {
                                                                                    $pr='https://upload.thriftops.com/Socks/uploads/'.$pic;
                                                                                     //echo $pr;
                                                                                     echo "<img src = '$pr' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                
                                                                            }
                                                                          
                                                                           
                                                                       }
                                                                       
                                                                       
                                                                       else if($tri=='SK-SHO')
                                                                       {
                                                                           $image = "SELECT * FROM shorts WHERE SKU='$sk'";
                                                                           //echo $sk;
                                                                           $res_img = mysqli_query($mysql, $image);
                                                                           $ro1 =mysqli_fetch_array($res_img);
                                                                           $pic=$ro1['Image_1'];
                                                                            $ind=$pic[0];
                                                                         
                                                                         
                                                                            if(isset($pic))
                                                                            {
                                                                                if (!is_numeric($ind))
                                                                                {
                                                                                    //echo $pic;
                                                                                    echo "<img src = '$pic' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                else if(is_numeric($ind))
                                                                                {
                                                                                    $pr='https://upload.thriftops.com/Shorts/uploads/'.$pic;
                                                                                     //echo $pr;
                                                                                     echo "<img src = '$pr' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                
                                                                            }
                                                                          
                                                                           
                                                                       }
                                                                       
                                                                       else if($num=='SK-TS')
                                                                       {
                                                                           $image = "SELECT * FROM tshirts WHERE SKU='$sk'";
                                                                           //echo $sk;
                                                                           $res_img = mysqli_query($mysql, $image);
                                                                           $ro1 =mysqli_fetch_array($res_img);
                                                                           $pic=$ro1['Image_1'];
                                                                            $ind=$pic[0];
                                                                         
                                                                         
                                                                            if(isset($pic))
                                                                            {
                                                                                if (!is_numeric($ind))
                                                                                {
                                                                                    //echo $pic;
                                                                                    echo "<img src = '$pic' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                else if(is_numeric($ind))
                                                                                {
                                                                                    $pr='https://upload.thriftops.com/T-Shirts/uploads/'.$pic;
                                                                                     //echo $pr;
                                                                                     echo "<img src = '$pr' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                
                                                                            }
                                                                          
                                                                           
                                                                       }
                                                                       
                                                                       else if($num=='SK-SH')
                                                                       {
                                                                           $image = "SELECT * FROM shirts WHERE SKU='$sk'";
                                                                           //echo $sk;
                                                                           $res_img = mysqli_query($mysql, $image);
                                                                           $ro1 =mysqli_fetch_array($res_img);
                                                                           $pic=$ro1['Image_1'];
                                                                            $ind=$pic[0];
                                                                         
                                                                         
                                                                            if(isset($pic))
                                                                            {
                                                                                if (!is_numeric($ind))
                                                                                {
                                                                                    //echo $pic;
                                                                                    echo "<img src = '$pic' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                else if(is_numeric($ind))
                                                                                {
                                                                                    $pr='https://upload.thriftops.com/Shirts/uploads/'.$pic;
                                                                                     //echo $pr;
                                                                                     echo "<img src = '$pr' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                
                                                                            }
                                                                          
                                                                           
                                                                       }
                                                                       
                                                                       else if($num=='SK-SN')
                                                                       {
                                                                           $image = "SELECT * FROM sandals WHERE SKU='$sk'";
                                                                           //echo $sk;
                                                                           $res_img = mysqli_query($mysql, $image);
                                                                           $ro1 =mysqli_fetch_array($res_img);
                                                                           $pic=$ro1['Image_1'];
                                                                            $ind=$pic[0];
                                                                         
                                                                         
                                                                            if(isset($pic))
                                                                            {
                                                                                if (!is_numeric($ind))
                                                                                {
                                                                                    //echo $pic;
                                                                                    echo "<img src = '$pic' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                else if(is_numeric($ind))
                                                                                {
                                                                                    $pr='https://upload.thriftops.com/Sandals/uploads/'.$pic;
                                                                                     //echo $pr;
                                                                                     echo "<img src = '$pr' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                
                                                                            }
                                                                          
                                                                           
                                                                       }
                                                                       
                                                                       else if($ss=='SK-B')
                                                                       {
                                                                           $image = "SELECT * FROM Beanies WHERE SKU='$sk'";
                                                                           //echo $sk;
                                                                           $res_img = mysqli_query($mysql, $image);
                                                                           $ro1 =mysqli_fetch_array($res_img);
                                                                           $pic=$ro1['Image_1'];
                                                                            $ind=$pic[0];
                                                                         
                                                                         
                                                                            if(isset($pic))
                                                                            {
                                                                                if (!is_numeric($ind))
                                                                                {
                                                                                    //echo $pic;
                                                                                    echo "<img src = '$pic' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                else if(is_numeric($ind))
                                                                                {
                                                                                    $pr='https://upload.thriftops.com/Beanies/uploads/'.$pic;
                                                                                     //echo $pr;
                                                                                     echo "<img src = '$pr' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                
                                                                            }
                                                                          
                                                                           
                                                                       }
                                                                       
                                                                       else if($num=='SK-BG')
                                                                       {
                                                                           $image = "SELECT * FROM Bags WHERE SKU='$sk'";
                                                                           //echo $sk;
                                                                           $res_img = mysqli_query($mysql, $image);
                                                                           $ro1 =mysqli_fetch_array($res_img);
                                                                           $pic=$ro1['Image_1'];
                                                                            $ind=$pic[0];
                                                                         
                                                                         
                                                                            if(isset($pic))
                                                                            {
                                                                                if (!is_numeric($ind))
                                                                                {
                                                                                    //echo $pic;
                                                                                    echo "<img src = '$pic' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                else if(is_numeric($ind))
                                                                                {
                                                                                    $pr='https://upload.thriftops.com/Bags/uploads/'.$pic;
                                                                                     //echo $pr;
                                                                                     echo "<img src = '$pr' width='100' height='100' >";
                                                                                }
                                                                                
                                                                                
                                                                            }
                                                                          
                                                                           
                                                                       }
                                                                       
                                                                    else
                                                                      {
                                                                            echo "<img src = '' width='100' height='100' >";
                                                                      }
                                                                       
                                                                       
                                                                       
                                                                   
                                                                   
                                                                   ?>
                                                             </td>
                                                             <td class="align-middle text-center">
                                                                  <div class="btn-group align-top" style="margin-top: 5px;">
                                                                     <a class="btn btn-sm btn-danger" href="delete.php?id=<?php echo $row['Items']; ?>&order=<?php echo $ID; ?>">Delete</a>
                                                                  </div>
                                                            </td>
                                       
                                						</tr>
                                						<?php
                                						$iq++;
                                					}
                                				?>
                                			</tbody>
                                		</table>
                                	    </div>
                                	</div>
                                	
                                	<div id="confirm" class="modal fade" role="dialog">
                   <div class="modal-dialog">
                     <div class="modal-content">
                       <div class="modal-header">
                         <h4 class="modal-title">Add Item</h4>
                       </div>
                       <div class="modal-body">
                         <div class="form-group">
                           <label>
                             <b>Enter SKU</b>
                           </label>
                           <input type="text" id="conf_tag" class="form-control">
                         </div>
                         <input type="hidden" id="conf_id" class="form-control">
                       </div>
                       <div class="modal-footer">
                         <a href="#" id="conf_save" class="btn btn-primary pull-right">Add</a>
                         <button type="button" class="btn btn-default pull-left" data-bs-dismiss="modal">Close</button>
                       </div>
                     </div>
                   </div>
                 </div>
      </form>
      
      
      
      	<!-- row -->
						<div class="row">
							<div class="col-md-12 m-b-30">
								<ul class="timelineleft pb-5">
									<li class="timeleft-label"><span class="bg-danger"><?php echo $Date;  ?></span></li>
									<?php
									    if($status=='None')
									    {
									        
    									   echo "<li>
    										<i class='fa fa-user bg-secondary'></i>
    										<div class='timelineleft-item'>
    											<h3 class='timelineleft-header no-border'><a>Order Status :</a> <span class='text-muted'><b>$Order_Num</b> is Waiting For Response</span></h3>
    										</div>
    									</li>";
									    }
									    
									    if($status!='None')
									    {
									        
									        echo "<li>
            										<i class='fa fa-user bg-secondary'></i>
            										<div class='timelineleft-item'>
            										
            											<h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$Order_Num</b> has been processed</span></h3>
            										</div>
            									</li>";
									    }
									    if($update!='')
									    {
									        
									        echo "<li>
            										<i class='fa fa-user bg-secondary'></i>
            										<div class='timelineleft-item'>
            											<span class='time'><i class='fa fa-clock-o text-danger'></i>$u_d</span>
            											<h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$Order_Num</b> has been updated by <b>$update</b></span></h3>
            										</div>
            									</li>";
									    }
									    if($confirm!='')
									    {
									        
									        echo "<li>
            										<i class='fa fa-user bg-secondary'></i>
            										<div class='timelineleft-item'>
            											<span class='time'><i class='fa fa-clock-o text-danger'></i>$c_d</span>
            											<h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$Order_Num</b> has been confirmed by <b>$c_name</b></span></h3>
            										</div>
            									</li>";
									    }
									    
									    
									    

									    if($cancel!='')
									    {
									        
									        echo "<li>
            										<i class='fa fa-user bg-secondary'></i>
            										<div class='timelineleft-item'>
            											<span class='time'><i class='fa fa-clock-o text-danger'></i>$cn_d</span>
            											<h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$Order_Num</b> has been canceled by <b>$cn_name</b></span></h3>
            										</div>
            									</li>";
									    }
									    if($hold!='')
									    {
									        
									        echo "<li>
            										<i class='fa fa-user bg-secondary'></i>
            										<div class='timelineleft-item'>
            											<span class='time'><i class='fa fa-clock-o text-danger'></i>$h_d</span>
            											<h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$Order_Num</b> has been hold by <b>$h_name</b></span></h3>
            										</div>
            									</li>";
									    }
									    
									    if($book!='')
									    {
									        
									        echo "<li>
            										<i class='fa fa-user bg-secondary'></i>
            										<div class='timelineleft-item'>
            											<span class='time'><i class='fa fa-clock-o text-danger'></i>$b_d</span>
            											<h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$Order_Num</b> has been booked by <b>$b_name</b></span></h3>
            										</div>
            									</li>";
									    }
									    //dispatch advice
									    if($advice!='')
									    {
									        
									        echo "<li>
            										<i class='fa fa-user bg-secondary'></i>
            										<div class='timelineleft-item'>
            											<span class='time'><i class='fa fa-clock-o text-danger'></i>$b_d</span>
            											<h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$Order_Num</b> has been booked with dispatch advice<b> $advice</b></span></h3>
            										</div>
            									</li>";
									    }
									    
									    //karachi
									    if($co1kp!='')
									    {
									        
									        echo "<li>
            										<i class='fa fa-user bg-secondary'></i>
            										<div class='timelineleft-item'>
            											<span class='time'><i class='fa fa-clock-o text-danger'></i>$c_d</span>
            											<h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$Order_Num</b> has been booked with consignment number <b>$co1kp</b> (Swag Rider)</span></h3>
            										</div>
            									</li>";
									    }
									    //leopard
									    if($co2lp!='')
									    {
									        
									        echo "<li>
            										<i class='fa fa-user bg-secondary'></i>
            										<div class='timelineleft-item'>
            											<span class='time'><i class='fa fa-clock-o text-danger'></i>$c_d</span>
            											<h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$Order_Num</b> has been booked with consignment number <b>$co2lp</b> (Leopard)</span></h3>
            										</div>
            									</li>";
									    }
									    //trax
									    if($co3tp!='')
									    {
									        
									        echo "<li>
            										<i class='fa fa-user bg-secondary'></i>
            										<div class='timelineleft-item'>
            											<span class='time'><i class='fa fa-clock-o text-danger'></i>$c_d</span>
            											<h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$Order_Num</b> has been booked with consignment number <b>$co3tp</b> (Trax)</span></h3>
            										</div>
            									</li>";
									    }
									    //postex
									    if($co4pp!='')
									    {
									        
									        echo "<li>
            										<i class='fa fa-user bg-secondary'></i>
            										<div class='timelineleft-item'>
            											<span class='time'><i class='fa fa-clock-o text-danger'></i>$c_d</span>
            											<h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$Order_Num</b> has been booked with consignment number <b>$co4pp</b> (Post-EX)</span></h3>
            										</div>
            									</li>";
									    }
									    
									    if($pick!='')
									    {
									           
                                                $lin = explode(',',$con);
                                                foreach($lin as $value)
                                                {
                                                    $que="Select * from orders where Items='$value' AND order_id='$ID' AND Date> '2022-03-20'";
                                                    $re= mysqli_query($mysql, $que);
                                                    $ro = mysqli_fetch_array($re);
                                                    //pick
                                                    $pickw=$ro['Picked_By'];
                                                    if($pickw!='')
                                                    {
                                                        $na5="SELECT * FROM Users WHERE Username='$pickw'";
                                                        $re_5 = mysqli_query($mysql, $na5);
                                                        $r5 = mysqli_fetch_assoc($re_5);
                                                        $pi_name=$r5['Name'];
                                                        
                                                        $p_d=$ro['Picked_By_Time'];
                                                        echo "<li>
                										<i class='fa fa-user bg-secondary'></i>
                										<div class='timelineleft-item'>
                											<span class='time'><i class='fa fa-clock-o text-danger'></i>$p_d</span>
                											<h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$value</b> has been picked by <b>$pi_name</b></span></h3>
                										</div>
                									    </li>";
                                                    }
                        //                             else 
                        //                             {
                        //                                 echo "<li>
                								// 		<i class='fa fa-user bg-secondary'></i>
                								// 		<div class='timelineleft-item'>
                								// 			<h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'>$value is Not Picked Yet !</span></h3>
                								// 		</div>
                								// 	    </li>";
                        //                             }
                                                }
									      
									    }
									    
									    if($recieve!='')
									    {
									        $lin1 = explode(',',$con);
                                                foreach($lin1 as $value1)
                                                {
                                                    $que1="Select * from orders where Items='$value1' AND order_id='$ID' AND Date> '2022-03-20'";
                                                    $re1= mysqli_query($mysql, $que1);
                                                    $ror = mysqli_fetch_array($re1);
                                                    //pick
                                                    $recievew=$ror['Recieved_By'];
                                                    $r_d=$ror['Recieved_By_Time'];
                                                    if($recievew!='')
                                                    {
                                                        $na6="SELECT * FROM Users WHERE Username='$recievew'";
                                                        $re_6 = mysqli_query($mysql, $na6);
                                                        $r6 = mysqli_fetch_assoc($re_6);
                                                        $ri_name=$r6['Name'];
                                                        
                                                        
                                                        echo "<li>
            										<i class='fa fa-user bg-secondary'></i>
            										<div class='timelineleft-item'>
            											<span class='time'><i class='fa fa-clock-o text-danger'></i>$r_d</span>
            											<h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$value1</b> has been recieved by <b>$ri_name</b></span></h3>
            										</div>
            									        </li>";
                                                    }
                    //                                 else 
                    //                                 {
                    //                                     echo "<li>
            								// 		<i class='fa fa-user bg-secondary'></i>
            								// 		<div class='timelineleft-item'>
            								// 			<h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'>$value1 is Not Recieved Yet !</span></h3>
            								// 		</div>
            								// 	        </li>";
                    //                                 }
                                                }
									        
									        
									    }
									    
									    if($pack!='')
									    {
									        
									        $lin2 = explode(',',$con);
                                                foreach($lin2 as $value2)
                                                {
                                                    $que2="Select * from orders where Items='$value2' AND order_id='$ID' AND Date> '2022-03-20'";
                                                    $re2= mysqli_query($mysql, $que2);
                                                    $ror2 = mysqli_fetch_array($re2);
                                                    //pick
                                                    $packw=$ror2['Packed_By'];
                                                    $pc_d=$ror2['Packed_By_Time'];
                                                    if($packw!='')
                                                    {
                                                        $na7="SELECT * FROM Users WHERE Username='$packw'";
                                                        $re_7 = mysqli_query($mysql, $na7);
                                                        $r7 = mysqli_fetch_assoc($re_7);
                                                        $pc_name=$r7['Name'];
                                                        
                                                        
                                                        echo "<li>
            										<i class='fa fa-user bg-secondary'></i>
            										<div class='timelineleft-item'>
            											<span class='time'><i class='fa fa-clock-o text-danger'></i>$pc_d</span>
            											<h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$value2</b> has been packed by <b>$pc_name</b></span></h3>
            										</div>
            									        </li>";
                                                    }
                    //                                 else 
                    //                                 {
                    //                                     echo "<li>
            								// 		<i class='fa fa-user bg-secondary'></i>
            								// 		<div class='timelineleft-item'>
            								// 			<h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'>$value2 is Not Packed Yet !</span></h3>
            								// 		</div>
            								// 	        </li>";
                    //                                 }
                                                }
									        
									    }
									    
									    if($return!='')
									    {
									        
									        echo "<li>
            										<i class='fa fa-user bg-secondary'></i>
            										<div class='timelineleft-item'>
            											<span class='time'><i class='fa fa-clock-o text-danger'></i>$rn_d</span>
            											<h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$Order_Num</b> has been returned to <b>$return</b></span></h3>
            										</div>
            									</li>";
									    }
									    
									    
									?>
									</ul>
									
								
					
					
				
								
					
							
						</div><!-- row -->
					</div>
					<!--footer-->
<?php include ("../include/footer.php"); ?>
      
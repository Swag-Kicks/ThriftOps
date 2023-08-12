<?php

 
session_start();
include_once("../include/mysql_connection.php"); 
$cr=$_SESSION['Username'];

$id=$_GET['GETID'];
// if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
// {
//     $pr="Select * from Users Where Dept_ID=5 AND Username='$cr' OR Dept_ID=3 AND Username='$cr'";
//     $resu2 = mysqli_query($mysql, $pr);
//     $rowq1 =mysqli_fetch_array($resu2);
//     $dept=$rowq1['Dept_ID'];
//     //echo $dept;
//     if($dept=='')
//     {
//         echo '<script>alert("Your Are Not Authorized !");window.location.href="../Dashboard/Home.php";</script>';
//     }   
// }
// else 
// {
//     echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
   
// }
if(is_numeric($id))
{
   $sql="Select *,GROUP_CONCAT(SKU) as con from `Order` Where Order_Number='#$id'"; 
}
else
{
    $sql="Select *,GROUP_CONCAT(SKU) as con from `Order` Where Order_Number='$id'";
}

$result = mysqli_query($mysql, $sql);
$row =mysqli_fetch_array($result);
$order_Num=$row['Order_Number'];
$order_ID=$row['Order_ID'];
$Courier=$row['Courier'];
$Tracking=$row['Tracking'];
$Items=$row['con'];
$Date=$row['Date'];
$Name=$row['Name'];
$Address=$row['Address'];
$Contact=$row['Contact'];
$City=$row['City'];
$ordstat=$row['Shipping_Status'];
$Dispatch_Advise=$row['Dispatch_Advise'];
$Shipping=$row['Shipping'];
$Discount=$row['Discount'];
$Total=$row['Total'];
$staa=$row['Status'];








$count=0;

// $sql1="Select * from Logs Where Type_ID='$order_Num;
$result123  = mysqli_query($mysql," Select * from Logs Where Type='Order' AND Type_ID='$order_ID' OR Type='Order' AND Type_ID='$order_Num'");

?>
<?php include ("../include/header.php"); ?>
<?php include_once("../include/mysql_connection.php");  ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>
        <!-- Page body start-->
        <div class="page-body">
          <!-- Container-fluid starts-->
          <div class="container-fluid">
              <div class="page-header">
         <div class="row">
            <div class="col-sm-6 p-t-30 p-l-28">
               <h2><b><?php echo $order_Num;  ?></b></h2>
               <input type="hidden" id="shop" value="<?php echo $id ?>" />
               <span><?php echo $id ?></span><br>
               <span><?php echo $Date; ?></span><br>
               <span>Status:<?php echo $staa; ?></span>
               
            </div>
            <div class="col-sm-6">
                <!--<a href="Order_edit?GETID=<?php echo $id ?>" name="pick" id="editicon" class="btn btn-primary-light m-l-15 f-right mb-1 edit">Edit</a>-->
                <!--<a href="#" name="pick" id="addorder" class="btn btn-primary-light m-l-15 f-right mb-1">initiate Return</a>-->
                <!--<a href="#" name="pick" id="rebookopt" class="btn btn-primary-light m-l-15 f-right mb-1">Re-Book</a>-->
            </div>
            
         </div>
      </div>
            <div class="select2-drpdwn">
              <form>
        <div class="row">
            <div class="col-lg-9">
                
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6"><b>Products</b></h5>
                    </div>
                   
                    <div class="card-body">
                        
                        <?php
                            $lin = explode(',',$Items);
                            foreach($lin as $value)
                            {
                                $count++;
                                $sql4="Select * from `addition` Where SKU='$value'";
                                $result4 = mysqli_query($mysql, $sql4);
                                $row4 =mysqli_fetch_array($result4);
                                $Title=$row4['Title'];
                                $SK=$row4['SKU'];
                                $Image=$row4['Image_1'];
                                $Cndition=$row4['Cndition'];
                                $Size=$row4['Size'];
                                $Price=$row4['Price'];
                                $Shop=$row4['Shopify_ID'];
                                
                                
                                echo "<div class='row mb-3'>
                          <div class='profile-title'>
                            <div class='media'> <img class='img-cstm' alt='' title='' src='$Image'>
                              <div class='media-body' style='margin-left:30px;'>
                                  <div class='row'>
                                       <h5 class='col-md-10 mb-4'><b>$Title</b> </h5>
                                        <h5 class='col-md-2 mb-4 ta-right'><a target='_blank' href='../ShopifyPush/viewProduct.php?id=$value' data-role='prview' data-id='72'><img class='icons' src='../assets/images/icons/eye.png'></a></h5>
                                      
                                  </div>
                               
                                <p class='linehight-1'><b>EUR $Size</b></p>
                                <p class='linehight-1'><b>$SK</b></p>
                                <p class='linehight-1'><b>$Cndition</b></p>
                                <h6 class='product-price'>Rs.$Price</h6>
                                
                              </div>
                            </div>
                          </div>
                        </div>";
                            }
                        
                        ?>
                       
                        <div class="form-group row mt-4">
                            
                            
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Sub Total</label>
                            <div class="col-md-5 f-center" style="text-align: center;">
                                <label class=""><?php echo $count ?> item(s)</label>
                            </div>
                            <div class="col-md-4 f-right">
                                <label class=" col-from-label f-right"><?php 
                                $asf=$Total - $Shipping;
                                echo Rs.'.'.$asf ?>
                                </label>
                            </div>
                            <label class="col-md-3 col-from-label">Shipping</label>
                             <div class="col-md-5 f-center" style="text-align: center;">
                                <label class="col-md-3 col-from-label"><?php
                                if($Shipping=='0')
                                {
                                    echo 'Free delivery';  
                                }
                                else
                                {
                                    echo 'Paid Delivery';
                                }
                                ?>
                                </label>
                            </div>
                            <div class="col-md-4 f-right">
                                <label class=" col-from-label f-right"><?php echo Rs.'.'.$Shipping ?></label>
                            </div>
                            <label class="col-md-3 col-from-label">Discount</label>
                             <div class="col-md-5 f-center" style="text-align: center;">
                                <label>Adjustment</label>
                            </div>
                            <div class="col-md-4 f-right">
                                <label class=" col-from-label f-right"><?php echo Rs.'.'.$Discount ?></label>
                            </div>
                            <hr>
                             <label class="col-md-3 col-from-label">Total</label>
                             <div class="col-md-5 f-center">
                            </div>
                             <div class="col-md-4 f-right">
                                <label class=" col-from-label f-right"><?php echo Rs.'.'.$Total?></label>
                            </div>
                        </div>

                       
                                            </div>
                </div>    
            
                
               
            </div>

            <div class="col-lg-3">

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">
                            <b>Contact Information</b>
                        </h5>
                    </div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label>
                                <?php echo $Name;  ?>
                            </label>
                            <label>
                                <?php echo $Contact;  ?>
                            </label>
                            <label>
                                <?php echo $City;  ?>
                            </label>
                            <label>
                                <?php echo $Address;  ?>
                            </label>
                            
                        </div> 
                    
                                            </div>
                </div>
                <div class="card">
                  <div class="card-header">
                      <h5 class="mb-0 h6"><b>Tracking  Information</b></h5>
                  </div>
                  <div class="card-body">
                      <div class="form-group row">
                          <label> <?php echo $Courier;  ?></label>
                          <label><a href="#"> <?php echo $Tracking;  ?></a></label>
                          <label><?php echo $ordstat;  ?></label>
                         
                          <div class="col-lg-12 ">
                              <a target='_blank' href="../Packing/print_pdf.php?GETID=<?php echo $Tracking;?>" class="btn btn-outline-info f-right">Print Label</a>
                          </div>
                          
                      </div>
                    
                  </div>
              </div>
              

             <div class="card">
                  <div class="card-header">
                      <h5 class="mb-0 h6"><b>Dispatch Advice</b></h5>
                  </div>
                  <div class="card-body">
                      <div class="form-group row">
                          <textarea class="form-control" rows="4" cols="50" placeholder="" readonly><?php echo $row['Dispatch_Advise'];?></textarea>
                      </div>
                     
                  </div>
              </div>

            </div>
             
    </form>
          </div>
          <!-- Container-fluid Ends-->
          <!-- row cycle --><div class="row">
              <div class="col-sm-6 p-t-30 p-l-28">
               <h2><b>Order Lifecycle</b></h2>
              
               <br><br>
            </div>
  <div class="col-md-12 m-b-30">
    <ul class="timelineleft pb-5">
        
        <?php
        
        while($row1 =mysqli_fetch_assoc($result123))
        {
            $userid=$row1['User_ID'];
            $sql3="Select * from `User` Where User_ID='$userid'";
            $result3 = mysqli_query($mysql, $sql3);
            $row3 =mysqli_fetch_array($result3);
            $name=$row3['Name'];
            
            $datetime=$row1['DateTime'];
            $status=$row1['Status'];
            
            $sku=$row1['Reference'];
            // echo $status;
            
            ///waiting
            if($status == 'Waiting')
            {
                echo "<li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                        <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>$datetime</span>
                        <h3 class='timelineleft-header no-border'><a>● Order Status:</a> <span class='text-muted'><b>$order_Num</b> is Waiting For Response</span></h3>
                    </div>
                </li>";
            }
            //confirmed
          else if($status == 'Confirmed')
            {
                echo "<li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                        <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>$datetime</span>
                        <h3 class='timelineleft-header no-border'><a>● Order</a> <span class='text-muted'><b>$order_Num</b> has been Confirmed by $name</span></h3>
                    </div>
                </li>";
            }
            
            ///hold
            else if($status == 'Hold')
            {
                echo "<li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                        <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>$datetime</span>
                        <h3 class='timelineleft-header no-border'><a>● Order</a> <span class='text-muted'><b>$order_Num</b> has been Hold by $name</span></h3>
                    </div>
                </li>";
            }
            //cancel
            else if($status == 'Cancel')
            {
                echo "<li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                        <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>$datetime</span>
                        <h3 class='timelineleft-header no-border'><a>● Order</a> <span class='text-muted'><b>$order_Num</b> has been Cancel by $name</span></h3>
                    </div>
                </li>";
            }
            //booked
            else if($status == 'Booked')
            {
                echo "<li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                        <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>$datetime</span>
                        <h3 class='timelineleft-header no-border'><a>● Order</a> <span class='text-muted'><b>$order_Num</b> has been Booked by $name -Courier $Courier - Tracking ID: $Tracking</span></h3>
                    </div>
                </li>";
            }
            //picked
            else if($status == 'Picked')
            {   
                echo "<li>
                        <i class='fa fa-circle '></i>
                        <div class='timelineleft-item'>
                            <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>$datetime</span>
                            <h3 class='timelineleft-header no-border'><a>● Order</a> <span class='text-muted'><b>$order_Num</b> has ($sku) been Picked by $name</span></h3>
                        </div>
                    </li>";
                    
            }
            //qc
            else if($status == 'QC_Rejected')
            {
                echo "<li>
                        <i class='fa fa-circle '></i>
                       
                        <div class='timelineleft-item'>
                            <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>$datetime</span>
                            <h3 class='timelineleft-header no-border'><a>● Order</a> <span class='text-muted'><b>$order_Num</b> has ($sku) been marked QC by $name</span></h3>
                        </div>
                    </li>";
            }
            //not found
            else if($status =='Not_Found')
            {
                echo "<li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                        <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>$datetime</span>
                        <h3 class='timelineleft-header no-border'><a>● Order</a> <span class='text-muted'><b>$order_Num</b> has ($sku) been Not Found by $name</span></h3>
                    </div>
                </li>";
            }
            //received
            else if($status=='Received')
            {
                echo "<li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                        <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>$datetime</span>
                        <h3 class='timelineleft-header no-border'><a>● Order</a> <span class='text-muted'><b>$order_Num</b> has ($sku) been Received by $name</span></h3>
                    </div>
                </li>";
            }
            //packed
            else if($status=='Packed')
            {
                echo "<li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                        <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>$datetime</span>
                        <h3 class='timelineleft-header no-border'><a>● Order</a> <span class='text-muted'><b>$order_Num</b> has been Packed by $name</span></h3>
                    </div>
                </li>";
            }
            //updated
            else if($status == 'Update')
            {
              echo "<li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                        <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>$datetime</span>
                        <h3 class='timelineleft-header no-border'><a>● Order</a> <span class='text-muted'><b>$order_Num</b> has been Updated by $name with Reference: $sku</span></h3>
                    </div>
                </li>";
            }
            //dispatch
             if($status == 'Dispatched')
            {
                echo "<li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                        <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>$datetime</span>
                        <h3 class='timelineleft-header no-border'><a>● Order</a> <span class='text-muted'><b>$order_Num</b> has been Dispatched by $name</span></h3>
                    </div>
                </li>";
            }
            //initiate return
            else if($status=='Initiate Return')
            {
                echo "<li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                        <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>$datetime</span>
                        <h3 class='timelineleft-header no-border'><a>● Order</a> <span class='text-muted'><b>$order_Num</b> has marked Initaite Return by $name</span></h3>
                    </div>
                </li>";
            }
            //received return
            else if($status=='Received Return')
            {
              echo "<li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                        <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>$datetime</span>
                        <h3 class='timelineleft-header no-border'><a>● Order</a> <span class='text-muted'><b>$order_Num</b> has been Received Return by $name</span></h3>
                    </div>
                </li>";
            }
            //returned
            else if($status=='Returned')
            {
                echo "<li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                        <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>$datetime</span>
                        <h3 class='timelineleft-header no-border'><a>● Order</a> <span class='text-muted'><b>$order_Num</b> has been marked Returned by $name</span></h3>
                    </div>
                </li>";
            }
            //exchange
            else if($status=='Exchanged')
            {
                echo "<li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                        <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>$datetime</span>
                        <h3 class='timelineleft-header no-border'><a>● Order</a> <span class='text-muted'><b>$order_Num</b> has been marked Exchanged by $name</span></h3>
                    </div>
                </li>";
            }
            //rebook
            else if($status=='Rebooked')
            {
                echo "<li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                        <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>$datetime</span>
                        <h3 class='timelineleft-header no-border'><a>● Order</a> <span class='text-muted'><b>$order_Num</b> has been marked Rebooked by $name</span></h3>
                    </div>
                </li>";
            }
            
        }
        ?>
    </ul>
      

</div>

</div><!-- row cycle -->
   </div>
   <!--modal batch end-->
        </div>
         
               <!--Rebook-->
                <div id="Rebook" class="modal fade" role="dialog">
                   <div class="modal-dialog modal-lg modal-dialog-centered cstm-pop">
                     <div class="modal-content">
                       <div class="modal-header p-t-20">
                             <div class="col-md-8 p-l-15">
                          <h3 class="modal-title">Rebook Order</h3>
                          </div>
                          <div class="col-md-4 p-l-30 p-r-40">
                              <select class="form-control form-select form-control-success btn-square f-left drpdncss btn-square m-b-10" id="couristat" required>
                               <option value="" disabled selected >Select Courier</option>
                                <option value="PostEx">PostEx</option>
                                <option value="Leopard">Leopard</option>
                                <option value="Trax">Trax</option>
                                <option value="Rider">Rider</option>
                                <option value="CallCourier">Call Courier</option>
                                 <option value="Self">Self Deliver</option>
                                </select>
                          </div>
                         <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                       </div>
                       <div class="row">
                           <br>
                                 <div class="col-md-3 m-b-10">&nbsp;&nbsp;&nbsp;
                                     <label id="prshow">&nbsp;&nbsp;&nbsp;<b></b></label>
                                 </div>
                                 <div class="col-md-3 ">
                                     
                                 </div>
                                 <div class="col-md-3 ">
                                     
                                 </div>
                                 <div class="col-md-3  ">
                                    
                                 </div>
                                 
                             </div>
                       <div class="modal-body">
                             <div id="dynamic_content2"></div>
                        <br>
                      
                       <div class="modal-footer">
                         <button type="button" class="btn btn-outline-primary pull-left" id="modclear" data-bs-dismiss="modal">Close</button>
                         <a href="#" data-role="conf_save" id="reord" class="btn btn-md btn-primary ref  f-right" style="padding: 6px 24px;" >Create</a>
                       </div>
                     </div>
                   
      </div>
   </div>
   
         </div>
                <!--Rebook-->  
        <!-- footer start-->
<script>
   $(document).ready(function() {
       $('#courierstat').change(function() 
       {
           var courier =document.getElementById("courierstat").value;
           var city =document.getElementById("cuscity").value;
           
           $('#couriercity').empty();
           $.get('city.php', {
               'courier': courier,'city': city
           }, function(return_data) {
            //   $("#couriercity").append("<option value='" + '' + "'>" + 'All' + "</option>");
               $.each(return_data.data, function(key, value) {
                   
                   $("#couriercity").append("<option value='" + value.id + "'>" + value.Name + "</option>");
               });
           }, "json");
       });
       //couristat
        $('#couristat').change(function() 
       {
           var courier =document.getElementById("couristat").value;
           var city =document.getElementById("cuscity").value;
           
           $('#couriercity').empty();
           $.get('city.php', {
               'courier': courier,'city': city
           }, function(return_data) {
            //   $("#couriercity").append("<option value='" + '' + "'>" + 'All' + "</option>");
               $.each(return_data.data, function(key, value) {
                   
                   $("#couriercity").append("<option value='" + value.id + "'>" + value.Name + "</option>");
               });
           }, "json");
       });
   });
</script>

 <script>
  $(document).ready(function()
  {
     $(document).on('click', '#rebookopt', function()
    {
        var $ele = $(this).parent().parent();
        var id =  document.getElementById("shop").value;
        $('#Rebook').modal('toggle');
            $.ajax({
                 url:"../Booking/check.php",
                 method:"POST",
                 data:{id:id},
                 success:function(data)
                 {
                   
                   $('#dynamic_content2').html(data);
                   
                 }
            });

    });
    
    $('#reord').click(function() 
    {
        var id =  document.getElementById("shop").value;
        var courierstat=document.getElementById("couristat").value;
        var order=document.getElementById("ordnum").value;
        var name=document.getElementById("cusname").value;
        var address=document.getElementById("cusaddress").value;
        var contact=document.getElementById("cuscontact").value;
        var total=document.getElementById("total").value;
        var city=document.getElementById("couriercity").value;
        var weight=document.getElementById("weight").value;
        var items=document.getElementById("conitems").value;
        var dispatch_advise=document.getElementById("advise").value;
        $.ajax({
                    url:"Rebook.php",
                    method:"POST",
                    data:{
                            id:id,
                            courierstat:courierstat,
                            order:order, 
                            name:name, 
                            address:address, 
                            contact:contact, 
                            total:total, 
                            city:city, 
                            weight:weight, 
                            items:items, 
                            dispatch_advise:dispatch_advise
                        },
                        success:function(data)
                             {
                                
                                if(data == 1)
                                {
                                    toastr.success('Booked Successfully!');
                                    $ele.fadeOut(900,function(){
                                    $(this).remove();
                                    });
                                    
                                    $('#Rebook').modal('hide');
                                }
                                if(data == 0)
                                {
                                    $('#Rebook').modal('hide');
                                    toastr.error('There might be some error!');
                                }
                                
                                if(data == 2)
                                {
                                    $('#Rebook').modal('hide');
                                    toastr.warning('Please Check The Fields Before Booking!');
                                }
                             }
            });
    });
});
 </script>       

<?php include ("../include/footer.php"); ?>

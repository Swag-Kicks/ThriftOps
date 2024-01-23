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

$sql="Select *,GROUP_CONCAT(SKU) as con from `Order` Where Order_ID='$id'";
$result = mysqli_query($mysql, $sql);
$row =mysqli_fetch_array($result);
$order_Num=$row['Order_Number'];
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









$count=0;

$sql1="Select * from Logs Where Type_ID='$order_Num'";
$result1 = mysqli_query($mysql, $sql1);

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
               <span><?php echo $Date; ?></span>
               
            </div>
           
            <div class="col-sm-6">
                <a href="#" name="pick" id="edit" class="btn btn-danger m-l-15 f-right mb-1">Update</a>
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
                        <a href="#" id="removerestock" class="btn btn-danger m-l-15 f-right">Remove & Restock </a>
                        <a href="#" id="remove" class="btn btn-outline-danger m-l-15 f-right"><i class="fa fa-trash-o red"></i> Remove</a>
                        <a href="#" id="additem" class="btn btn-primary-light m-l-15 f-right">New Item</a>
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
                                       <h4 class='col-md-2 mb-4 ta-right'><input class='form-check-input' type='checkbox' value='$Shop' name='items[]' /></h4>
                                        
                                      
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
                            <div class="col-md-4 f-right row">
                                <label class="col-md-3 col-from-label f-right">Rs.</label>
                                <input type="text" class="form-control mx-auto w-50 f-right mb-2" id="itemprice" value="<?php 
                                $asf=$Total - $Shipping;
                                echo $asf ?>" readonly/>
                               
                            </div>
                            <label class="col-md-3 col-from-label">Shipping</label>
                             <div class="col-md-5 f-center" style="text-align: center;">
                                <select class="mx-auto w-50 form-select text-center mb-2" id="shipi">
                                    <option value="">Select</option>
                                    <option value="freedel">Free Delivery</option>
                                    <option value="standel">Standard Delivery</option>
                                    <option value="cusdel">Custom Delivery</option>
                                </select>
                            </div>
                            <div class="col-md-4 f-right row">
                                <label class="col-md-3 col-from-label f-right">Rs.</label>
                                <input type="text" class="form-control mx-auto w-50 f-right mb-2" id="shipprice" value="<?php echo $Shipping ?>" />
                            </div>
                            <label class="col-md-3 col-from-label">Discount</label>
                             <div class="col-md-5 f-center" style="text-align: center;">
                               <select class="mx-auto w-50 form-select text-center mb-2" id="reason">
                                    <option value="">Select</option>
                                    <option value="Adjustment">Adjustment</option>
                                    <option value="Exchange">Exchange</option>
                                    <option value="cusdel">Custom</option>
                                    <option value="Employee">Employee</option>
                                    <option value="Giveaway">Giveaway</option>
                                    <option value="Influencer">Influencer</option>
                                    <option value="Paid">Paid Order</option>
                                </select>
                            </div>
                            <div class="col-md-4 f-right row">
                                <label class="col-md-3 col-from-label f-right">Rs.</label>
                                -<input type="text" class="form-control mx-auto w-50 f-right mb-2" id="disc" value="<?php echo $Discount ?>" />
                            </div>
                            
                             <label class="col-md-3 col-from-label mb-2">Total</label>
                      
                             <div class="col-md-5 f-center">
                            </div>
                             <div class="col-md-4 f-right row">
                                <label class="col-md-3 col-from-label f-right">Rs.</label>
                                 <input type="text" class="form-control mx-auto w-50 f-right" id="tota" value="  <?php echo $Total ?>" readonly/>
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
                            <input class="form-control mb-2" type='text' id="cname"
                                value="<?php echo $Name;  ?>"
                            />
                            <input class="form-control mb-2" type='text' id="contact"
                                 value="<?php echo $Contact;  ?>"
                            />
                            <input class="form-control mb-2" type='text' id="city"
                                 value="<?php echo $City;  ?>"
                            />
                            <input class="form-control mb-2" type='text' id="address"
                                 value="<?php echo $Address;  ?>"
                            />
                            
                        </div> 
                    
                                            </div>
                </div>
                <div class="card">
                  <div class="card-header">
                      <h5 class="mb-0 h6"><b>Notes</b></h5>
                  </div>
                  <div class="card-body">
                      <div class="form-group row">
                         <textarea class="form-control" rows="4" id="notes" cols="50" placeholder=""></textarea>
                          
                      </div>
                    
                  </div>
              </div>
              

             <div class="card">
                  <div class="card-header">
                      <h5 class="mb-0 h6"><b>Dispatch Advice</b></h5>
                  </div>
                  <div class="card-body">
                      <div class="form-group row">
                          <textarea class="form-control" rows="4" cols="50" id="advise" placeholder=""><?php echo $Dispatch_Advise?></textarea>
                      </div>
                     
                  </div>
              </div>

            </div>
              <div id="spinner">
      <img src="ajax-loader.gif">
    </div>
    </form>
          </div>
          <!-- Container-fluid Ends-->
          <!-- row cycle --><div class="row">
             


</div><!-- row cycle -->
   </div>
   <!--modal batch end-->
        </div>
        <!-- footer start-->
        
 <!--book-->
                <div id="itemadd" class="modal fade" role="dialog">
                   <div class="modal-dialog modal-lg modal-dialog-centered cstm-pop">
                     <div class="modal-content">
                       <div class="modal-header p-t-20">
                             <div class="col-md-8 p-l-15">
                          <h3 class="modal-title">Add Items</h3>
                          </div>
                          
                          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                       </div>
                       <div class="container">
                           <div class="row">
                        <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path></svg>
              </span>
                              <input type="text" class="form-control" placeholder="Enter SKU" id="esku" aria-describedby="basic-addon1">
                            </div>   
                           <br>
                            <div class="card-body" id="fillitems">
                               
                               
                               
                               
                               
                              </div>
                                 <div class="col-md-3 ">
                                     
                                 </div>
                                 <div class="col-md-3 ">
                                     
                                 </div>
                                 <div class="col-md-3  ">
                                    
                                 </div>
                                 
                             </div>
                       <div class="modal-body">
                            <div id="dynamic_content1"></div>
                        <br>
                      
                       <div class="modal-footer">
                         <button type="button" class="btn btn-outline-primary pull-left" id="modclear" data-bs-dismiss="modal">Close</button>
                         <a href="#" data-role="conf_save" id="func" class="btn btn-md btn-primary ref  f-right" style="padding: 6px 24px;" disabled>Add</a>
                       </div>
                     </div>
                   
      </div> 
                        </div>
   </div>
   
         </div>
                <!--book-->
                
                 <!--changestatus modal--> 
                         <div class="modal fade bd-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="exmod" role="dialog">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="" ><br>
                            <h4 class="modal-title1 text-center font-weight-bold">Exchange Order Reference</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                                <div class="mb-3">
                                                 <input class="form-control" type="text"  id="coitems"  name="removedby"  placeholder="Enter order number" aria-describedby="emailHelp">
                                             </div>
                                              <a href="#" data-role="conf_save" id="savereason" class="btn btn-md btn-primary ref mleft  f-right" style="padding: 6px 24px;">Save</a>
                                              <button type="button" class="btn btn-outline-primary pull-right" id="modclear" data-bs-dismiss="modal">Close</button>
                                              
                          </div>
                        </div>
                      </div>
                    </div>
                         <!--end changestatus modal-->
<?php include ("../include/footer.php"); ?>



<script>

  $(document).ready(function()
  {
     $(document).on('click', '#additem', function(e)
    {
        e.stopImmediatePropagation();
         $('#itemadd').modal('toggle');
         $(document).on('change', '#esku', function(e)
        {
            e.stopImmediatePropagation();
             var id=document.getElementById("esku").value;
              var up=0;
              
              $.ajax({
                    url:"viewitems.php",
                    method:"POST",
                    data:{id:id},
                    success:function(data)
                    {
                      $('#fillitems').html(data);
                      $(document).on('click', '#func', function(e)
                        {
                            e.stopImmediatePropagation();
                            document.getElementById("spinner").classList.add("show");
                           var shopid = [];
                           var quant=[];
                           $("input[name='addquantity[]']").each(function(i)  
                           {
                        
                               if($(this).val()==='0'|| $(this).val()==='')
                               {
                                  
                               }
                               else
                               {
                                  
                                    quant[up] = $(this).val();
                                    up=up+1;
                               }
                           });
                           var order=document.getElementById("shop").value;
                           $(':checkbox:checked').each(function(i){
                                shopid[i] = $(this).val();
                           });

                           if(id.length === 0) //tell you if the array is empty
                           {
                                toastr.error("Please Select at least one Entry");
                           }
                           else
                           {
                               
                                $.ajax({
                                     url:'additems.php',
                                     method:'POST',
                                     data:{shopid:shopid,order:order,quant:quant},
                                     success:function(data)
                                     {
                                        
                                        if(data == 3)
                                        {
                                            document.getElementById("spinner").classList.remove("show");
                                            toastr.error('Quantity Exceeded from Orignal Inventory');
                                            document.getElementById("esku").value='';
                                            $('#fillitems').html('');
                                            $('#itemadd').modal('toggle');
                                        }
                                        if(data == 2)
                                        {
                                            document.getElementById("spinner").classList.remove("show");
                                            toastr.error('Item is Draft/ Not Available');
                                            document.getElementById("esku").value='';
                                            $('#fillitems').html('');
                                            $('#itemadd').modal('toggle');
                                        }
                                        if(data == 1)
                                        {
                                            document.getElementById("spinner").classList.remove("show");
                                            $('#itemadd').modal('toggle');
                                            toastr.success('Added Successfully');
                                            location.reload();
                                        }
                                          

                                     }
                                 
                                        });
                            }
                        
                        });
                    }
                });
        });
    });
    
    $(document).on('click', '#edit', function(e)
    {
        e.stopImmediatePropagation();
        var order=document.getElementById("shop").value;
        var name=document.getElementById("cname").value;
        var address=document.getElementById("address").value;
        var city=document.getElementById("city").value;
        var contact=document.getElementById("contact").value;
        var advise=document.getElementById("advise").value;
        var note=document.getElementById("notes").value;
        var ship=(document.getElementById("shipprice").value);
        var disc=parseInt(document.getElementById("disc").value);
        var total=parseInt(document.getElementById("tota").value);
        var reason=document.getElementById("reason").value;
        
        
       document.getElementById("spinner").classList.add("show");
            $.ajax({
                 url:'update.php',
                 method:'POST',
                 data:{
                     order:order,
                     name:name,
                     address:address,
                     city:city,
                     contact:contact,
                     advise:advise,
                     note:note,
                     ship:ship,
                     disc:disc,
                     total:total,
                     reason:reason
                     
                 },
                 success:function(data)
                 {
                     
                   if(data == 0)
                    {
                        document.getElementById("spinner").classList.remove("show");
                        toastr.error('Please check the boxes before any operation');

                    }
                    if(data == 1)
                    {
                        
                        document.getElementById("spinner").classList.remove("show");
                        toastr.success('Updated Successfully');
                        location.reload();
                    }
                      

                 }
             
                });
        
        
        
    });
    $(document).on('click', '#shipi', function(e)
    {
        var ship=document.getElementById("shipi").value;
        if(ship=='freedel')
        {
            
            var item=document.getElementById("itemprice").value;
            var disc=document.getElementById("disc").value;
            var tot=parseInt(item)+0-parseInt(disc);
            document.getElementById("shipprice").value='0';
            document.getElementById("tota").value=tot;
        }
         if(ship=='standel')
        {
            var item=document.getElementById("itemprice").value;
            var disc=document.getElementById("disc").value;
            var tot=parseInt(item)+250-parseInt(disc);
            document.getElementById("shipprice").value='250';
            document.getElementById("tota").value=tot;
        }
        
    });
    
     $(document).on('change', '#disc', function(e)
    {
        var item=document.getElementById("itemprice").value;
        var ship=document.getElementById("shipprice").value;
        var disc=document.getElementById("disc").value;
        var tot=parseInt(item)+parseInt(ship)-parseInt(disc);
        document.getElementById("tota").value=tot;
        
    });
     $(document).on('click', '#remove', function(e)
    {
        e.stopImmediatePropagation();
        document.getElementById("spinner").classList.add("show");
         var shopid=[];
         var order=document.getElementById("shop").value;
        $(':checkbox:checked').each(function(i)
         {
            shopid[i] = $(this).val();
        });
        $.ajax({
                 url:'removeitem.php',
                 method:'POST',
                 data:{shopid:shopid,order:order},
                 success:function(data)
                 {
                    if(data == 0)
                    {
                        document.getElementById("spinner").classList.remove("show");
                        toastr.error('Please check the boxes before any operation');
                    }
                     
                    if(data == 1)
                    {
                       
                        document.getElementById("spinner").classList.remove("show");
                        toastr.success('Remove Successfully');
                        location.reload();
                    }
                      

                 }
             
                });
    });
    $(document).on('click', '#removerestock', function(e)
    {
        e.stopImmediatePropagation();
        document.getElementById("spinner").classList.add("show");
         var shopid=[];
         var order=document.getElementById("shop").value;
         var quant='1';
        $(':checkbox:checked').each(function(i)
         {
            shopid[i] = $(this).val();
        });
        $.ajax({
                 url:'removestockitem.php',
                 method:'POST',
                 data:{shopid:shopid,order:order,quant:quant},
                 success:function(data)
                 {
                     
                   if(data == 0)
                    {
                        document.getElementById("spinner").classList.remove("show");
                        toastr.error('Please check the boxes before any operation');
                    }
                    if(data == 2)
                    {
                        document.getElementById("spinner").classList.remove("show");
                        toastr.error('Last Item cannot be Removed');
                    }
                    if(data == 1)
                    {
                        document.getElementById("spinner").classList.remove("show");
                        toastr.success('Remove Successfully');
                        location.reload();
                    }
                      

                 }
             
                });
    });
     $(document).on('change', '#reason', function(e)
     {
         e.stopImmediatePropagation();
         var option=document.getElementById("reason").value;
         if(option=='Exchange')
         {
             $('#exmod').modal('toggle');
              $(document).on('click', '#savereason', function(e)
              {
                  var ref=document.getElementById("coitems").value;
                  var order=document.getElementById("shop").value;
                   $.ajax({
                        url:"markex.php",
                        method:"POST",
                        data:{order:order,ref:ref},
                        success:function(data)
                        {
                            if(data == 1)
                            {
                                $('#exmod').modal('toggle');
                                  toastr.success('Marked Successfully');
                                
                            }
                            if(data == 0)
                            {
                                
                            }
                        }
                   });    
              });
         }
         
     });
    
     
    
  });  
    
    
</script>

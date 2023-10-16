<?php

 
session_start();
include_once("../include/mysql_connection.php"); 
$cr=$_SESSION['Username'];
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
               <h2><b>#65101</b></h2>
               <span>4754470797498</span><br>
               <span>21 November 2022 at 9:47pm</span>
               
            </div>
            <div class="col-sm-6">
                <a href="Create" name="pick" id="editicon" class="btn btn-primary m-l-15 f-right mb-1 edit">Edit Order</a>
                <a href="Create" name="pick" id="addorder" class="btn btn-primary-light m-l-15 f-right mb-1">initiate Return</a>
                <a href="Create" name="pick" id="addorder" class="btn btn-primary-light m-l-15 f-right mb-1">Book Order</a>
            </div>
            
         </div>
      </div>
            <div class="select2-drpdwn">
              <form>
        <div class="row">
            <div class="col-lg-9">
                
                <div class="card">
                    <div class="card-header">
                       <div class="row">
                              <h4 class="mb-0 col-md-6"><b>Products</b></h4>
                              <div class="col-md-6"><button class="btn btn-primary-light m-l-15 f-right" type="button" id="addorder" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Add Items</button></div>
                        </div>
                    </div>
                   
                    <div class="card-body">
                       <div class="row mb-3">
                          <div class="profile-title">
                            <div class="media"> <img class="img-cstm" alt="" title="" src="https://cdn.shopify.com/s/files/1/2344/6005/products/BJ59_NIKE_DART_10_10.5_45.5_29.5_C_8.5_1899_1_1300x.jpg?v=1593500116">
                              <div class="media-body" style="margin-left:30px;">
                                  <div class="row">
                                       <h5 class="col-md-10 mb-4"><b>Nike Dart 10</b> </h5>
                                        <h5 class="col-md-2 mb-4 ta-right"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button></h5>
                                      
                                  </div>
                               
                                <p class="linehight-1"><b>Eur 44</b></p>
                                <p class="linehight-1"><b>Sku-Sk23222</b></p>
                                <p class="linehight-1"><b>10/10</b></p>
                                <h6 class="linehight-1 text-danger"><b>Rs.4002</b></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                         <div class="row mb-3">
                          <div class="profile-title">
                            <div class="media"> <img class="img-cstm" alt="" title="" src="https://www.tradeinn.com/f/13852/138528890/nike-flex-experience-run-10-running-shoes.jpg">
                              <div class="media-body" style="margin-left:30px;">
                                  <div class="row">
                                       <h5 class="col-md-10 mb-4"><b>Nike Runners Flex 2.0 </b> </h5>
                                        <h5 class="col-md-2 mb-4 ta-right"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button></h5>
                                      
                                  </div>
                               
                                <p class="linehight-1"><b>Eur 42</b></p>
                                <p class="linehight-1"><b>Sku-Sk325123</b></p>
                                <p class="linehight-1"><b>8/10</b></p>
                                <h6 class="linehight-1 text-danger"><b>Rs.6002</b></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                         <div class="row mb-3">
                          <div class="profile-title">
                            <div class="media"> <img class="img-cstm" alt="" title="" src="https://cdn.shopify.com/s/files/1/2344/6005/products/BJ59_NIKE_DART_10_10.5_45.5_29.5_C_8.5_1899_1_1300x.jpg?v=1593500116">
                              <div class="media-body" style="margin-left:30px;">
                                  <div class="row">
                                       <h5 class="col-md-10 mb-4"><b>Nike Dart 10</b> </h5>
                                        <h5 class="col-md-2 mb-4 ta-right"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button></h5>
                                      
                                  </div>
                               
                                <p class="linehight-1"><b>Eur 44</b></p>
                                <p class="linehight-1"><b>Sku-Sk23222</b></p>
                                <p class="linehight-1"><b>10/10</b></p>
                                <h6 class="linehight-1 text-danger"><b>Rs.4002</b></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row mt-4">
                            
                            
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Sub Total</label>
                            <div class="col-md-5 f-center" style="text-align: center;">
                                <label class="">4 item(s)</label>
                            </div>
                            <div class="col-md-4 f-right">
                                <label class=" col-from-label f-right">Rs.16008.00</label>
                            </div>
                            <label class="col-md-3 col-from-label">Shipping</label>
                             <div class="col-md-5 f-center" style="text-align: center;">
                                <label class="col-md-3 col-from-label">Free delivery</label>
                            </div>
                            <div class="col-md-4 f-right">
                                <label class=" col-from-label f-right">0.00</label>
                            </div>
                            <label class="col-md-3 col-from-label">Discount</label>
                             <div class="col-md-5 text-center">
                               <select class="mx-auto w-50 form-select text-center ">
                                          <option>Adjustment</option>
                                        </select>

                            </div>
                            <div class="col-md-4 f-right">
                                <input class=" form-control w-25 f-right mb-2 text-center" placeholder="Rs.500">
                            </div>
                            <hr>
                             <label class="col-md-3 col-from-label">Total</label>
                             <div class="col-md-5 f-center">
                            </div>
                             <div class="col-md-4 f-right">
                                <label class=" col-from-label f-right">Rs.4002.00</label>
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
                           <input class="form-control mb-2" type="text" placeholder="Name" >
                           <input class="form-control   mb-2" type="text" placeholder="Number" >
                        <input class="form-control   mb-2" type="text" placeholder="City" >
                        <textarea class="form-control   mb-2" type="text" placeholder="Address"  ></textarea>
                            
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
     
             <li>
            <i class='fa fa-circle '></i>
            <div class='timelineleft-item'>
                 <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>2022-10-13    01:23:00</span>
              <h3 class='timelineleft-header no-border'><a>Order Status :</a> <span class='text-muted'><b>$Order_Num</b> is Waiting For Response</span></h3>
            </div>
          </li>

              
             <li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                      <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>2022-10-13    01:23:00</span>
                      <h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$Order_Num</b> has been updated by <b>$update</b></span></h3>
                    </div>
                  </li>
       
              
              <li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                      <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>2022-10-13    01:23:00</span>
                      <h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$Order_Num</b> has been updated by <b>$update</b></span></h3>
                    </div>
                  </li>
  
              
              <li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                      <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>2022-10-13    01:23:00</span>
                      <h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$Order_Num</b> has been confirmed by <b>$c_name</b></span></h3>
                    </div>
                  </li>

              
              <li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                      <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>2022-10-13    01:23:00</span>
                      <h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$Order_Num</b> has been canceled by <b>$cn_name</b></span></h3>
                    </div>
                  </li>

              
              <li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                      <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>2022-10-13    01:23:00</span>
                      <h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$Order_Num</b> has been hold by <b>$h_name</b></span></h3>
                    </div>
                  </li>
          
              
              <li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                      <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>2022-10-13    01:23:00</span>
                      <h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$Order_Num</b> has been booked by <b>$b_name</b></span></h3>
                    </div>
                  </li>
    
              <li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                      <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>2022-10-13    01:23:00</span>
                      <h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$Order_Num</b> has been booked with dispatch advice<b> $advice</b></span></h3>
                    </div>
                  </li>

              <li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                      <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>2022-10-13    01:23:00</span>
                      <h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$Order_Num</b> has been booked with consignment number <b>$co1kp</b> (Swag Rider)</span></h3>
                    </div>
                  </li>

              
              <li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                      <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>2022-10-13    01:23:00</span>
                      <h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$Order_Num</b> has been booked with consignment number <b>$co2lp</b> (Leopard)</span></h3>
                    </div>
                  </li>

              
              <li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                      <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>2022-10-13    01:23:00</span>
                      <h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'>Order Number <b>$Order_Num</b> has Status <b>$co2ls</b></span></h3>
                    </div>
                  </li>

              
              <li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                      <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>2022-10-13    01:23:00</span>
                      <h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$Order_Num</b> has been booked with consignment number <b>$co3tp</b> (Trax)</span></h3>
                    </div>
                  </li>

              
              <li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                      <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>2022-10-13    01:23:00</span>
                      <h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'>Order Number <b>$Order_Num</b> has Status <b>$co3ts</b></span></h3>
                    </div>
                  </li>

              <li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                      <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>2022-10-13    01:23:00</span>
                      <h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$Order_Num</b> has been booked with consignment number <b>$co4pp</b> (Post-EX)</span></h3>
                    </div>
                  </li>

              <li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                      <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>2022-10-13    01:23:00</span>
                      <h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'>Order Number <b>$Order_Num</b> has Status <b>$co4ps</b></span></h3>
                    </div>
                  </li>
          
                                            <li>
                        <i class='fa fa-circle '></i>
                        <div class='timelineleft-item'>
                          <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;</i>2022-10-13    01:23:00</span>
                          <h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$value</b> has been picked by <b>$pi_name</b></span></h3>
                        </div>
                          </li>
        
  
      
                                            
                                            
                                            <li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                      <span class='time'><i class='fa fa-clock-o text-danger'></i>2022-10-13    01:23:00</span>
                      <h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$value1</b> has been recieved by <b>$ri_name</b></span></h3>
                    </div>
                          </li>
         
                                            
              <li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                      <span class='time'><i class='fa fa-clock-o text-danger'></i>2022-10-13    01:23:00</span>
                      <h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$value2</b> has been packed by <b>$pc_name</b></span></h3>
                    </div>
                          </li>
                                       
              
              <li>
                    <i class='fa fa-circle '></i>
                    <div class='timelineleft-item'>
                      <span class='time'><i class='fa fa-clock-o text-danger'></i>2022-10-13    01:23:00</span>
                      <h3 class='timelineleft-header no-border'><a>Order Status:</a> <span class='text-muted'><b>$ID</b> has been returned to <b>$return</b></span></h3>
                    </div>
                  </li>
       
      </ul>
      

</div>

</div><!-- row cycle -->
   </div>
   <!--modal batch end-->
        </div>
        <!-- footer start-->
        

<?php include ("../include/footer.php"); ?>

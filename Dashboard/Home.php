<?php 
session_start();

include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0); 
$cr=$_SESSION['Username'];
$sql = "SELECT * FROM User WHERE username='$cr'";
$result = mysqli_query($mysql, $sql);
$er = mysqli_fetch_assoc($result);
$Dept=$er['Dept_ID'];

$name="Wellcome, ".$cr."!!";

 


?>

<?php include ("../include/header.php");
include ("../include/side_admin.php"); ?>

   <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="../assets/css/daterange-picker.css">
    <!-- Plugins JS start-->
    <script src="../assets/js/datepicker/daterange-picker/moment.min.js"></script>
    <script src="../assets/js/datepicker/daterange-picker/daterangepicker.js"></script>
    <script src="../assets/js/datepicker/daterange-picker/daterange-picker.custom.js"></script>
    <!-- Plugins JS Ends-->
      <!-- Page Body Start-->
      <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        <!-- Page Sidebar Ends-->
        <div class="page-body">
            <div class="row mt-3">
          <div class="col-md-4">
              <h3 class=" modal-title m-l-10"><b>Dashboard</b></h3>
                
               
            </div>
            <div class="col-md-2">
                <div class="form-group ">
                          <label class="col-sm-3 col-form-label">From</label>
                          <div class="">
                            <div class="input-group">
                              <input class=" form-control digits" id="fromdate" type="date" data-language="en" data-bs-original-title="" title=""  style;"border-radius: 6px;">
                            </div>
                          </div>
                        </div>
         </div>
          <div class="col-md-2">
              
            <div class="form-group ">
                          <label class="col-sm-3 col-form-label">To</label>
                          <div class="">
                            <div class="input-group">
                              <input class=" form-control digits" type="date" id="todate" data-language="en" data-bs-original-title="" title="" style;"border-radius: 6px;">

                            </div>
                          </div>
                        </div>
            
         </div>
         <div class="col-md-2">
             <div class="form-group ">
                          
                          <div class="">
                            <div class="input-group">
                              <a href="#" class="btn btn-primary" style="margin-top: 33px;" id="ref">Refresh</a>
                            </div>
                          </div>
                        </div>
             
                        
         </div>
         
        
         
    
            
          <!-- Container-fluid starts-->
          <div class="container-fluid dashboard-default-sec">
            <div class="row">
                 <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="map"></i></div>
                      <div class="media-body"><span class="m-0">Mothly Revenue</span>
                        <h4 class="mb-0 counter" id="month">0</h4><i class="icon-bg" data-feather="dollar-sign"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="shopping-bag"></i></div>
                      <div class="media-body"><span class="m-0">Today's Revenue</span>
                        <h4 class="mb-0 counter" id="today">0</h4><i class="icon-bg" data-feather="shopping-bag"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="upload-cloud"></i></div>
                      <div class="media-body"><span class="m-0">Uploads</span>
                        <h4 class="mb-0 counter" id="upload"></h4><i class="icon-bg" data-feather="upload-cloud"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="package"></i></div>
                      <div class="media-body"><span class="m-0">Orders</span>
                        <h4 class="mb-0 counter" id="orders"></h4><i class="icon-bg" data-feather="package"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12"> 
                <div class="row">
                  <!--<div class="col-xl-12 col-md-6 box-col-6 des-xl-50">-->
                  <!--  <div class="card ">-->
                  <!--    <div class="card-header">-->
                  <!--      <div class="header-top">-->
                  <!--        <div class="setting-list bg-primary position-unset">-->
                  <!--        </div>-->
                  <!--      </div>-->
                  <!--    </div>-->
                      <!--<div class="card-body text-center p-b-50 p-t-0">-->
                      <!--  <h3 class="font-dark"><?php echo $name ?></h3>-->
                      <!--  <p>Welcome to the ThriftOps Family! we are glad that you are visite this dashboard. we will be happy to help you grow your business.</p>-->
                      <!--</div>-->
                      
                  <!--  </div>-->
                  <!--</div>-->
                  
            </div>
            <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
                 <h6 class="text-xxl font-weight-bolder" style="display: inline-block;">Courier</h6>
              <a href="../Courier/View.php" class="btn btn-primary" style="float: right;">View All</a>
             
            </div>
            <div class="card-body">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="align-middle text-center">Service Providers</th>
                      <th class="align-middle text-center">Booked</th>
                      <th class="align-middle text-center">Dispatched</th>
                      <th class="align-middle text-center">Intransit</th>
                      <th class="align-middle text-center">Delivered</th>
                      <th class="align-middle text-center">Returned</th>
                      <th class="align-middle text-center">Loss/Conflict</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                           <div class="d-flex px-2 py-1">
                            <img src="../assets/images/dashboard/laopards.png" class="img-50 img-fluid m-r-50 rounded-circle" alt="">
                          
                        <div class="align-middle text-center">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Leopards</h6>
                            <p class="text-xs text-secondary mb-0">Orders</p>
                          </div>
                        </div>
                        </div>
                      </td>
                       <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="lbook"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="ldispatch"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="lintransit"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="ldelivered"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="lreturned"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="lloss"></p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                          <div class="d-flex px-2 py-1">
                            <img src="../assets/images/dashboard/trax.png" class="img-50 img-fluid m-r-50 rounded-circle" alt="">
                        <div class="align-middle text-center">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">TRAX</h6>
                            <p class="text-xs text-secondary mb-0">Orders</p>
                          </div>
                        </div>
                        </div>
                      </td>
                     <td class="align-middle text-center" >
                        <p class="text-xs font-weight-bold mb-0" id="tbook"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="tdispatch"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="tintransit"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="tdelivered"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="treturned"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="tloss"></p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                          <div class="d-flex px-2 py-1">
                            <img src="../assets/images/dashboard/local.png" class="img-50 img-fluid m-r-50 rounded-circle" alt="">
                        <div class="align-middle text-center">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Karachi</h6>
                            <p class="text-xs text-secondary mb-0">Orders</p>
                          </div>
                        </div>
                        </div>
                      </td>
                      <td class="align-middle text-center" >
                        <p class="text-xs font-weight-bold mb-0" id="sbook"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="sdispatch"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="sintransit"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="sdelivered"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="sreturned"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="sloss"></p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                          <div class="d-flex px-2 py-1">
                            <img src="../assets/images/dashboard/postex.png" class="img-50 img-fluid m-r-50 rounded-circle" alt="">
                        <div class="align-middle text-center">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">PostEx</h6>
                            <p class="text-xs text-secondary mb-0">Orders</p>
                          </div>
                        </div>
                        </div>
                      </td>
                      <td class="align-middle text-center" >
                        <p class="text-xs font-weight-bold mb-0" id="pbook"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="pdispatch"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="pintransit"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="pdelivered"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="preturned"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="ploss"></p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                          <div class="d-flex px-2 py-1">
                            <img src="../assets/images/dashboard/firefox.png" class="img-50 img-fluid m-r-50 rounded-circle" alt="">
                        <div class="align-middle text-center">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Rider</h6>
                            <p class="text-xs text-secondary mb-0">Orders</p>
                          </div>
                        </div>
                        </div>
                      </td>
                      <td class="align-middle text-center" >
                        <p class="text-xs font-weight-bold mb-0" id="rbook"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="rdispatch"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="rintransit"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="rdelivered"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="rreturned"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="rloss"></p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                          <div class="d-flex px-2 py-1">
                            <img src="../assets/images/dashboard/chrome.png" class="img-50 img-fluid m-r-50 rounded-circle" alt="">
                        <div class="align-middle text-center">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Call Courier</h6>
                            <p class="text-xs text-secondary mb-0">Orders</p>
                          </div>
                        </div>
                        </div>
                      </td>
                      <td class="align-middle text-center" >
                        <p class="text-xs font-weight-bold mb-0" id="cbook"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="cdispatch"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="cintransit"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="cdelivered"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="creturned"></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0" id="closs"></p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row my-4">
        <div class="col-6">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6 class="text-xxl font-weight-bolder" style="display: inline-block;">Sales By Categories</h6>
              <a href="../Category_Analytics/View.php" class="btn btn-primary" style="float: right;">View All</a>
            </div>
            <div class="card-body ">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10 ps-2"># of Items</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10 ">Revenue</th>
                    
                    
                    </tr>
                  </thead>
                  <tbody id="catfill">
                    <!--<tr>-->
                    <!--  <td>-->
                    <!--    <div class="d-flex px-4 py-1">-->
                         
                    <!--      <div class="d-flex flex-column justify-content-center">-->
                    <!--        <h6 class="mb-0 text-sm">Shoes-Sk</h6>-->
                            
                    <!--      </div>-->
                    <!--    </div>-->
                    <!--  </td>-->
                    <!--  <td>-->
                    <!--    <p class="text-xs font-weight-bold mb-0">10243</p>-->
                    <!--  </td>-->
                    <!--  <td class="align-middle text-center text-sm">-->
                    <!--    <p class="text-xs font-weight-bold mb-0">10243</p>-->
                    <!--  </td>-->
                    <!--</tr>-->
                    <!--<tr>-->
                    <!--  <td>-->
                    <!--    <div class="d-flex px-4 py-1">-->
                        
                    <!--      <div class="d-flex flex-column justify-content-center">-->
                    <!--        <h6 class="mb-0 text-sm">Shoe-WP</h6>-->
                    <!--      </div>-->
                    <!--    </div>-->
                    <!--  </td>-->
                    <!--  <td>-->
                    <!--    <p class="text-xs font-weight-bold mb-0">30243</p>-->
                    <!--  </td>-->
                    <!--  <td class="align-middle text-center text-sm">-->
                    <!--    <p class="text-xs font-weight-bold mb-0">40243</p>-->
                    <!--  </td>-->
              
                    <!--</tr>-->
                    <!--<tr>-->
                    <!--  <td>-->
                    <!--    <div class="d-flex px-4 py-1">  -->
                        
                    <!--      <div class="d-flex flex-column justify-content-center">-->
                    <!--        <h6 class="mb-0 text-sm">Sandals</h6>-->
                
                    <!--      </div>-->
                    <!--    </div>-->
                    <!--  </td>-->
                    <!--  <td>-->
                    <!--    <p class="text-xs font-weight-bold mb-0">30243</p>-->
                    <!--  </td>-->
                    <!--  <td class="align-middle text-center text-sm">-->
                    <!--    <p class="text-xs font-weight-bold mb-0">40243</p>-->
                    <!--  </td>-->
                     
                    <!--</tr>-->
                    <!--<tr>-->
                    <!--  <td>-->
                    <!--    <div class="d-flex px-4 py-1">-->
                        
                    <!--      <div class="d-flex flex-column justify-content-center">-->
                    <!--        <h6 class="mb-0 text-sm">T-shirts</h6>-->
                            
                    <!--      </div>-->
                    <!--    </div>-->
                    <!--  </td>-->
                    <!--  <td>-->
                    <!--    <p class="text-xs font-weight-bold mb-0">30243</p>-->
                    <!--  </td>-->
                    <!--  <td class="align-middle text-center text-sm">-->
                    <!--    <p class="text-xs font-weight-bold mb-0">40243</p>-->
                    <!--  </td>-->
                  
                    <!--</tr>-->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6 class="text-xxl font-weight-bolder" style="display: inline-block;">Sales By Vendors</h6>
              <a href="#" class="btn btn-primary" style="float: right;">View All</a>
            </div>
            <div class="card-body">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Vendors/lots</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10 ps-2"># of Items</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10 ">Revenue</th>
                    
                      
                    </tr>
                  </thead>
                  <tbody id="venfill">
                    
                    <!--<tr>-->
                    <!--  <td>-->
                    <!--    <div class="d-flex px-4 py-1">-->
                        
                    <!--      <div class="d-flex flex-column justify-content-center">-->
                    <!--        <h6 class="mb-0 text-sm">Vendor2</h6>-->
                    <!--      </div>-->
                    <!--    </div>-->
                    <!--  </td>-->
                    <!--  <td>-->
                    <!--    <p class="text-xs font-weight-bold mb-0">30243</p>-->
                    <!--  </td>-->
                    <!--  <td class="align-middle text-center text-sm">-->
                    <!--    <p class="text-xs font-weight-bold mb-0">40243</p>-->
                    <!--  </td>-->
              
                    <!--</tr>-->
                    <!--<tr>-->
                    <!--  <td>-->
                    <!--    <div class="d-flex px-4 py-1">  -->
                        
                    <!--      <div class="d-flex flex-column justify-content-center">-->
                    <!--        <h6 class="mb-0 text-sm">Vendor3</h6>-->
                
                    <!--      </div>-->
                    <!--    </div>-->
                    <!--  </td>-->
                    <!--  <td>-->
                    <!--    <p class="text-xs font-weight-bold mb-0">30243</p>-->
                    <!--  </td>-->
                    <!--  <td class="align-middle text-center text-sm">-->
                    <!--    <p class="text-xs font-weight-bold mb-0">40243</p>-->
                    <!--  </td>-->
                     
                    <!--</tr>-->
                    <!--<tr>-->
                    <!--  <td>-->
                    <!--    <div class="d-flex px-4 py-1">-->
                        
                    <!--      <div class="d-flex flex-column justify-content-center">-->
                    <!--        <h6 class="mb-0 text-sm">Vendor4</h6>-->
                            
                    <!--      </div>-->
                    <!--    </div>-->
                    <!--  </td>-->
                    <!--  <td>-->
                    <!--    <p class="text-xs font-weight-bold mb-0">30243</p>-->
                    <!--  </td>-->
                    <!--  <td class="align-middle text-center text-sm">-->
                    <!--    <p class="text-xs font-weight-bold mb-0">40243</p>-->
                    <!--  </td>-->
                  
                    <!--</tr>-->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        
        
<script>
     $(document).ready(function()
     {
         
            Post();
            Leopard();
            Self();
            Trax();
            CallCourier();
            Rider();
            vendor();
            cat();
            counter();
        function counter(from,to)
        {
           $.ajax({
                    url:"Data/Order_Product/Track.php",
                    method:"POST",
                    data:{from:from,to:to},
                     success:function(response)
                     {
                        var test=JSON.parse(response);
                        var book=test[0];
                        var dispatch=test[1];
                        var intransit=test[2];
                        var delivered=test[3];
                       
                        
                        $('#month').html(book);
                        $('#today').html(dispatch);
                        $('#upload').html(intransit);
                        $('#orders').html(delivered);
                      
                        
                     }
                }); 
        } 
        function Post(from,to)
        {
             $.ajax({
                    url:"Data/Courier/Postex.php",
                    method:"POST",
                    data:{from:from,to:to},
                     success:function(response)
                     {
                        var test=JSON.parse(response);
                        var book=test[0];
                        var dispatch=test[1];
                        var intransit=test[2];
                        var delivered=test[3];
                        var returned=test[4];
                        var lost=test[5];
                        // var all=test[6];
                        
                        $('#pbook').html(book);
                        $('#pdispatch').html(dispatch);
                        $('#pintransit').html(intransit);
                        $('#pdelivered').html(delivered);
                        $('#preturned').html(+returned);
                        $('#ploss').html(lost);
                        // $('#allb').html('('+all+')');
                        
                     }
                });
        } 
        function Leopard(from,to)
        {
            $.ajax({
                    url:"Data/Courier/Leopard.php",
                    method:"POST",
                    data:{from:from,to:to},
                     success:function(response)
                     {
                        var test=JSON.parse(response);
                        var book=test[0];
                        var dispatch=test[1];
                        var intransit=test[2];
                        var delivered=test[3];
                        var returned=test[4];
                        var lost=test[5];
                        // var all=test[6];
                        
                        $('#lbook').html(book);
                        $('#ldispatch').html(dispatch);
                        $('#lintransit').html(intransit);
                        $('#ldelivered').html(delivered);
                        $('#lreturned').html(+returned);
                        $('#lloss').html(lost);
                        // $('#allb').html('('+all+')');
                        
                     }
                });
        } 
        function Trax(from,to)
        {
             $.ajax({
                    url:"Data/Courier/Trax.php",
                    method:"POST",
                    data:{from:from,to:to},
                     success:function(response)
                     {
                        var test=JSON.parse(response);
                        var book=test[0];
                        var dispatch=test[1];
                        var intransit=test[2];
                        var delivered=test[3];
                        var returned=test[4];
                        var lost=test[5];
                        // var all=test[6];
                        
                        $('#tbook').html(book);
                        $('#tdispatch').html(dispatch);
                        $('#tintransit').html(intransit);
                        $('#tdelivered').html(delivered);
                        $('#treturned').html(+returned);
                        $('#tloss').html(lost);
                        // $('#allb').html('('+all+')');
                        
                     }
                });
        } 
        function Rider(from,to)
        {
            $.ajax({
                    url:"Data/Courier/Rider.php",
                    method:"POST",
                    data:{from:from,to:to},
                     success:function(response)
                     {
                        var test=JSON.parse(response);
                        var book=test[0];
                        var dispatch=test[1];
                        var intransit=test[2];
                        var delivered=test[3];
                        var returned=test[4];
                        var lost=test[5];
                        // var all=test[6];
                        
                        $('#rbook').html(book);
                        $('#rdispatch').html(dispatch);
                        $('#rintransit').html(intransit);
                        $('#rdelivered').html(delivered);
                        $('#rreturned').html(+returned);
                        $('#rloss').html(lost);
                        // $('#allb').html('('+all+')');
                        
                     }
                });
        } 
        function Self(from,to)
        {
             $.ajax({
                    url:"Data/Courier/Self.php",
                    method:"POST",
                    data:{from:from,to:to},
                     success:function(response)
                     {
                        var test=JSON.parse(response);
                        var book=test[0];
                        var dispatch=test[1];
                        var intransit=test[2];
                        var delivered=test[3];
                        var returned=test[4];
                        var lost=test[5];
                        // var all=test[6];
                        
                        $('#sbook').html(book);
                        $('#sdispatch').html(dispatch);
                        $('#sintransit').html(intransit);
                        $('#sdelivered').html(delivered);
                        $('#sreturned').html(+returned);
                        $('#sloss').html(lost);
                        // $('#allb').html('('+all+')');
                        
                     }
                });
        } 
         
        function CallCourier(from,to)
        {
             $.ajax({
                    url:"Data/Courier/CallCourier.php",
                    method:"POST",
                    data:{from:from,to:to},
                     success:function(response)
                     {
                        var test=JSON.parse(response);
                        var book=test[0];
                        var dispatch=test[1];
                        var intransit=test[2];
                        var delivered=test[3];
                        var returned=test[4];
                        var lost=test[5];
                        // var all=test[6];
                        
                        $('#cbook').html(book);
                        $('#cdispatch').html(dispatch);
                        $('#cintransit').html(intransit);
                        $('#cdelivered').html(delivered);
                        $('#creturned').html(+returned);
                        $('#closs').html(lost);
                        // $('#allb').html('('+all+')');
                        
                     }
                });
        }
        
        function vendor(from,to)
        {
            $.ajax({
                    url:"Data/Vendor/Revenue.php",
                    method:"POST",
                    data:{from:from,to:to},
                     success:function(response)
                     {
                        var test=JSON.parse(response);
                        // var book=test[0];
                        // var dispatch=test[1];
                        // var intransit=test[2]
                        var fill='';
                        for(var i=0; i<test.length; i++)
                        {
                            fill+="<tr>";
                            fill+="<td><div class='d-flex px-4 py-1'><div class='d-flex flex-column justify-content-center'>";
                            fill+="<h6 class='mb-0 text-sm'>"+test[i]["ven"]+"</h6>";
                            
                            fill+="</div></div></td><td><p class='text-xs font-weight-bold mb-0'>"+test[i]["count"]+"</p></td>";
                            fill+="<td class='align-middle text-center text-sm'><p class='text-xs font-weight-bold mb-0'>"+test[i]["total"]+"</p></td>";
                            fill+="</tr>";
                            //${response[i].Percentage}
                            
                            
                        }
                        
                        $('#venfill').append(fill);
                    }
                });
        }
         function cat(from,to)
        {
            $.ajax({
                    url:"Data/Category/Category.php",
                    method:"POST",
                    data:{from:from,to:to},
                     success:function(response)
                     {
                        var test=JSON.parse(response);
                        // var book=test[0];
                        // var dispatch=test[1];
                        // var intransit=test[2]
                        var fill='';
                        for(var i=0; i<test.length; i++)
                        {
                            fill+="<tr>";
                            fill+="<td><div class='d-flex px-4 py-1'><div class='d-flex flex-column justify-content-center'>";
                            fill+="<h6 class='mb-0 text-sm'>"+test[i]["cat"]+"</h6>";
                            
                            fill+="</div></div></td><td><p class='text-xs font-weight-bold mb-0'>"+test[i]["count"]+"</p></td>";
                            fill+="<td class='align-middle text-center text-sm'><p class='text-xs font-weight-bold mb-0'>"+test[i]["total"]+"</p></td>";
                            fill+="</tr>";
                            //${response[i].Percentage}
                            
                            
                        }
                        
                        $('#catfill').append(fill);
                    }
                });
        }
       
         
         
         
        setInterval(function () 
      {
        from=document.getElementById("fromdate").value;
        to=document.getElementById("todate").value;
        
        
        if(from!='' && to!='')
        {
            //$('#venfill').empty();
            //$('#catfill').empty();
            counter(from,to);
            Post(from,to);
            Leopard(from,to);
            Self(from,to);
            Trax(from,to);
            CallCourier(from,to);
            Rider(from,to);
            //vendor(from,to);
            //cat(from,to);
        }
        else
        {
            //$('#venfill').empty();
             //$('#catfill').empty();
            counter();
            Post();
            Leopard();
            Self();
            Trax();
            CallCourier();
            Rider();
            //vendor();
            //cat();
        }
                
           
            
         
     }, 20000); 
    
        $(document).on('click', '#ref', function(){
            toastr.info('Refreshed!');
            $('#venfill').empty();
             $('#catfill').empty();
            counter();
            Post();
            Leopard();
            Self();
            Trax();
            CallCourier();
            Rider();
            vendor();
            document.getElementById("fromdate").value='';
            document.getElementById("todate").value='';
        }); 
        
        //date
    $("#fromdate").change(function()
    {
      from=document.getElementById("fromdate").value;
        $("#todate").change(function()
        {
             to=document.getElementById("todate").value;
             $('#venfill').empty();
            $('#catfill').empty();
            counter(from,to);
            Post(from,to);
            Leopard(from,to);
            Self(from,to);
            Trax(from,to);
            CallCourier(from,to);
            Rider(from,to);
            vendor(from,to);
            cat(from,to);
        });
    });
     });
</script>
        <?php include ("../include/footer.php"); ?>
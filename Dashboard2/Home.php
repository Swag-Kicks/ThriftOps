<?php 
   session_start();
   include_once("../include/mysql_connection.php"); 
   error_reporting(0);
   
   if (isset($_SESSION['id']) && $_SESSION['id'] == true) {
       //echo "Welcome to the member's area :". $_SESSION['Username'] ." !";
   }
   else {
      
       echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
   }
   
   ?>
<?php include ("../include/header.php"); ?>
<!-- page-header -->
<div class="page-header">
   <ol class="breadcrumb">
      <!-- breadcrumb -->
      <li class="breadcrumb-item"><a href="#">ThriftOps</a></li>
      <li class="breadcrumb-item active" aria-current="page">SwagKicks</li>
   </ol>
   <!-- End breadcrumb -->
   <!--<div class="ml-auto">-->
   <!--   <div class="input-group">-->
   <!--      <a  class="btn btn-primary text-white mr-2"  id="daterange-btn">-->
   <!--      <span>-->
   <!--      <i class="fa fa-calendar"></i> Date Filter-->
   <!--      </span>-->
   <!--      <i class="fa fa-caret-down"></i>-->
   <!--      </a>-->
   <!--      <a href="#" class="btn btn-secondary text-white" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Rating">-->
   <!--      <span>-->
   <!--      <i class="fa fa-star"></i>-->
   <!--      </span>-->
   <!--      </a>-->
   <!--   </div>-->
   <!--</div>-->
</div>
<!-- carousel status -->
<div class="row">
   <div class="col-md-12">
      <div class="owl-carousel owl-carousel2 owl-theme mb-5">
         <div class="item">
            <div class="card mb-0">
               <div class="row">
                  <div class="col-4">
                     <div class="feature">
                        <div class="fa-stack fa-lg fa-2x icon bg-primary-transparent">
                           <i class="si si-briefcase  fa-stack-1x text-primary"></i>
                        </div>
                     </div>
                  </div>
                  <div class="col-8">
                     <div class="card-body p-3  d-flex">
                        <div>
                           <p class="text-muted mb-1">Total Income</p>
                           <h2 class="mb-0 text-dark">18,367K</h2>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="card mb-0">
               <div class="row">
                  <div class="col-4">
                     <div class="feature">
                        <div class="fa-stack fa-lg fa-2x icon bg-success-transparent">
                           <i class="si si-drawer fa-stack-1x text-success"></i>
                        </div>
                     </div>
                  </div>
                  <div class="col-8">
                     <div class="card-body p-3  d-flex">
                        <div>
                           <p class="text-muted mb-1">Total Profit</p>
                           <h2 class="mb-0 text-dark">35%</h2>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="card mb-0">
               <div class="row">
                  <div class="col-4">
                     <div class="feature">
                        <div class="fa-stack fa-lg fa-2x icon bg-pink-transparent">
                           <i class="si si-layers fa-stack-1x text-pink"></i>
                        </div>
                     </div>
                  </div>
                  <div class="col-8">
                     <div class="card-body p-3  d-flex">
                        <div>
                           <p class="text-muted mb-1">Total Revenue</p>
                           <h2 class="mb-0 text-dark">3,548K</h2>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="card mb-0">
               <div class="row">
                  <div class="col-4">
                     <div class="feature">
                        <div class="fa-stack fa-lg fa-2x icon bg-warning-transparent">
                           <i class="si si-chart fa-stack-1x text-warning"></i>
                        </div>
                     </div>
                  </div>
                  <div class="col-8">
                     <div class="card-body p-3  d-flex">
                        <div>
                           <p class="text-muted mb-1">Total Sales</p>
                           <h2 class="mb-0 text-dark">9,756</h2>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Endcarousel status -->
<!-- Page Content -->
<div class="row">
   <div class="col-xl-8 col-lg-12 col-md-12">
      <div class="card">
         <div class="card-header custom-header">
            <div>
               <h3 class="card-title">Departmen Tasks</h3>
               <h6 class="card-subtitle">Overview of all Department Tasks information</h6>
            </div>
            <div class="card-options">
               <a href="" class="mr-4 text-default" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
               <span class="fa fa-ellipsis-v"></span>
               </a>
            </div>
         </div>
         <div class="card-body">
           <div id="echart1" class="chartsh chart-dropshadow" _echarts_instance_="ec_1649618798668" style="-webkit-tap-highlight-color: transparent; user-select: none; position: relative; background: transparent;"><div style="position: relative; overflow: hidden; width: 640px; height: 256px; padding: 0px; margin: 0px; border-width: 0px; cursor: pointer;"><canvas width="863" height="345" data-zr-dom-id="zr_0" style="position: absolute; left: 0px; top: 0px; width: 640px; height: 256px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div style="position: absolute; display: block; border-style: solid; white-space: nowrap; z-index: 9999999; transition: left 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s, top 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgba(50, 50, 50, 0.7); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); font: 14px / 21px &quot;Microsoft YaHei&quot;; padding: 5px; left: 291px; top: 114px;">Sat<br><span style="display:inline-block;margin-right:5px;border-radius:10px;width:9px;height:9px;background-color:#1753fc ;"></span>Complete Tasks: 15<br><span style="display:inline-block;margin-right:5px;border-radius:10px;width:9px;height:9px;background-color:#9258f1;"></span>Uncomplete Tasks: 25</div></div>
            <div class="text-center mt-3">
               <span class="dot-label bg-primary"></span><span class="mr-4 text-dark">Conplete Task</span>
               <span class="dot-label bg-secondary"></span><span class="mr-3 text-dark">Unconplete Task</span>
            </div>
         </div>
      </div>
   </div>
   <div class="col-xl-4 col-lg-12 col-md-12">
      <div class="card">
         <div class="card-header custom-header">
            <div>
               <h3 class="card-title">All Orders Satisfaction</h3>
               <h6 class="card-subtitle">Overview of all Orders information</h6>
            </div>
            <div class="card-options">
               <a href="" class="mr-4 text-default" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
               <span class="fa fa-ellipsis-v"></span>
               </a>
            </div>
         </div>
         <div class="card-body">
            <div id="echart-1" class="chart-visitors chart-dropshadow" _echarts_instance_="ec_1649616995716" style="-webkit-tap-highlight-color: transparent; user-select: none; position: relative; background: transparent;"><div style="position: relative; overflow: hidden; width: 284px; height: 288px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas width="383" height="388" data-zr-dom-id="zr_0" style="position: absolute; left: 0px; top: 0px; width: 284px; height: 288px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div style="position: absolute; display: none; border-style: solid; white-space: nowrap; z-index: 9999999; transition: left 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s, top 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgba(50, 50, 50, 0.7); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); font: 14px / 21px &quot;Microsoft YaHei&quot;; padding: 5px; left: 140px; top: 60px;"> <br>Bad : 40 (23.53%)</div></div>
         </div>
      </div>
   </div>
</div>
<!-- ECharts js -->
		<script src="../assets/plugins/echarts/echarts.js"></script>

		<!-- Custom-charts js-->
		<script src="../assets/js/index4.js"></script>

		<!-- Custom js-->
		<script src="../assets/js/custom.js"></script>
<?php include ("../include/footer.php"); ?>
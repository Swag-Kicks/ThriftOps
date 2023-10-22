<?php





?>





<!doctype html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="Hogo– Creative Admin Multipurpose Responsive Bootstrap4 Dashboard HTML Template" name="description">
      <meta content="Spruko Technologies Private Limited" name="author">
      <meta name="keywords" content="html admin template, bootstrap admin template premium, premium responsive admin template, admin dashboard template bootstrap, bootstrap simple admin template premium, web admin template, bootstrap admin template, premium admin template html5, best bootstrap admin template, premium admin panel template, admin template"/>
      <!-- Favicon -->
      <link rel="icon" href="../assets/images/brand/favicon.png" type="image/x-icon"/>
      <link rel="shortcut icon" type="image/x-icon" href="../assets/images/brand/favicon.png" />
      <!-- Title -->
      <title>ThriftOps | Swag-Kicks</title>
      <!--Bootstrap.min css-->
      <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
      <!-- Dashboard css -->
      <link href="../assets/css/style.css" rel="stylesheet" />
      <!-- Custom scroll bar css-->
      <link href="../assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />
      <!-- Sidemenu css -->
      <link href="../assets/plugins/toggle-sidebar/full-sidemenu-dark.css" rel="stylesheet" />
      <!--Daterangepicker css-->
      <link href="../assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
      <!-- Rightsidebar css -->
      <link href="../assets/plugins/sidebar/sidebar.css" rel="stylesheet">
      <!-- Sidebar Accordions css -->
      <link href="../assets/plugins/accordion1/css/easy-responsive-tabs-dark.css" rel="stylesheet">
      <!-- Owl Theme css-->
      <link href="../assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
      <!-- Morris  Charts css-->
      <link href="../assets/plugins/morris/morris.css" rel="stylesheet" />
      <!--Select2 css -->
      <link href="../assets/plugins/select2/select2.min.css" rel="stylesheet" />
      <!-- Time picker css-->
      <link href="../assets/plugins/time-picker/jquery.timepicker.css" rel="stylesheet" />
      <!-- Date Picker css-->
      <link href="../assets/plugins/date-picker/spectrum.css" rel="stylesheet" />
      <!-- File Uploads css-->
      <link href="../assets/plugins/fileuploads/css/dropify.css" rel="stylesheet" type="text/css" />
      <!--Mutipleselect css-->
      <link rel="stylesheet" href="../assets/plugins/multipleselect/multiple-select.css">
      <!---Font icons css-->
      <link href="../assets/plugins/iconfonts/plugin.css" rel="stylesheet" />
      <link href="../assets/plugins/iconfonts/icons.css" rel="stylesheet" />
      <link  href="../assets/fonts/fonts/font-awesome.min.css" rel="stylesheet">
      <!-- Style-->  
      <link rel="stylesheet" href="../include/sidebar/main/css/style.css">
      <link rel="stylesheet" href="../include/sidebar/main/css/skin_color.css">
      
      <!--pagination beautify-->
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
      <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
   </head>
   <style>
       
@keyframes blink {
	0% {opacity: 0}
	49%{opacity: 0}
	50% {opacity: 1}
}

blink{
    animation: blink 1s infinite;
    padding: 2px 5px;
    color: #d00000;
    font-size: 10px !important;
    position: relative;
    left: 8px;
    top: -12px;
}
}
   </style>
   <body class="app sidebar-mini">
      <div class="page">
      <div class="page-main">
      <!--app-header-->
      <div class="app-header header d-flex">
         <div class="container-fluid">
            <div class="d-flex">
               <a class="header-brand" href="https://upload.thriftops.com/Dashboard/Home.php">
               <img src="../assets/images/brand/logo.png" class="header-brand-img main-logo">
               <img src="../assets/images/brand/icon.png" class="header-brand-img icon-logo">
               </a><!-- logo-->
               <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
               <a href="#" data-toggle="search" class="nav-link nav-link  navsearch"><i class="fa fa-search"></i></a><!-- search icon -->
               <div class="header-form">
                  <form class="form-inline">
                     <div class="search-element mr-3">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <span class="Search-icon"><i class="fa fa-search"></i></span>
                     </div>
                  </form>
                  <!-- search-bar -->
               </div>
               <!--<ul class="nav navbar-nav horizontal-nav header-nav">-->
               <!-- <li class="mega-dropdown nav-item">-->
               <!--      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">-->
               <!--           <i class="fe fe-grid mr-2"></i>UI Kit <i class="fa fa-angle-down ml-1"></i>-->
               <!--      </a>-->
               <!--      <ul class="dropdown-menu mega-dropdown-menu container row p-5">-->
               <!--           <li>-->
               <!--                <div class="row">-->
               <!--                     <div class="col-md-4">-->
               <!--                          <div class="">-->
               <!--                               <div class="card-body p-0 relative">-->
               <!--                                    <div class="arrow-ribbon">Comming Events</div>-->
               <!--                                    <img class="" alt="img" src="../assets/images/photos/32.jpg">-->
               <!--                                    <div class="btn-absolute">-->
               <!--                                         <a class="btn btn-primary btn-pill btn-sm" href="#">More info</a>-->
               <!--                                         <span id="timer-countercallback1" class="h5 text-white float-right mb-0 mt-1"></span>-->
               <!--                                    </div>-->
               <!--                               </div>-->
               <!--                          </div>-->
               <!--                     </div>-->
               <!--                     <div class="col-2">-->
               <!--                          <h4  class="mb-3">Pages</h4>-->
               <!--                          <a class="dropdown-item pl-0 pr-0" href="#"><i class="fa fa-angle-double-right text-muted mr-1"></i> Client Support</a>-->
               <!--                          <a class="dropdown-item pl-0 pr-0" href="#"><i class="fa fa-angle-double-right text-muted mr-1"></i> About Us</a>-->
               <!--                          <a class="dropdown-item pl-0 pr-0" href="#"><i class="fa fa-angle-double-right text-muted mr-1"></i> Calendar</a>-->
               <!--                          <a class="dropdown-item pl-0 pr-0" href="#"><i class="fa fa-angle-double-right text-muted mr-1"></i> Add New Pages</a>-->
               <!--                          <a class="dropdown-item pl-0 pr-0" href="#"><i class="fa fa-angle-double-right text-muted mr-1"></i> Login Pages</a>-->
               <!--                     </div>-->
               <!--                     <div class="col-2">-->
               <!--                          <h4  class="mb-3">Pages</h4>-->
               <!--                          <a class="dropdown-item pl-0 pr-0" href="#"><i class="fa fa-angle-double-right text-muted mr-1"></i> Documentation</a>-->
               <!--                          <a class="dropdown-item pl-0 pr-0" href="#"><i class="fa fa-angle-double-right text-muted mr-1"></i> Multi Pages</a>-->
               <!--                          <a class="dropdown-item pl-0 pr-0" href="#"><i class="fa fa-angle-double-right text-muted mr-1"></i> Edit Profile</a>-->
               <!--                          <a class="dropdown-item pl-0 pr-0" href="#"><i class="fa fa-angle-double-right text-muted mr-1"></i> Mail Settings</a>-->
               <!--                          <a class="dropdown-item pl-0 pr-0" href="#"><i class="fa fa-angle-double-right text-muted mr-1"></i> Default Setting</a>-->
               <!--                     </div>-->
               <!--                     <div class="col-md-4">-->
               <!--                          <h4  class="mb-3">Current projects</h4>-->
               <!--                          <div class="overflow-hidden">-->
               <!--                               <div class="card-body p-0">-->
               <!--                                    <div class="list-group list-lg-group list-group-flush">-->
               <!--                                         <a class="list-group-item list-group-item-action overflow-hidden pl-0 pr-0 pb-4" href="#">-->
               <!--                                              <div class="d-flex">-->
               <!--                                                   <img class="avatar-xl br-7 mr-3" src="../assets/images/photos/33.jpg" alt="Image description">-->
               <!--                                                   <div class="media-body">-->
               <!--                                                        <div class="align-items-center">-->
               <!--                                                             <h5 class="mb-0">-->
               <!--                                                                  Wordpress project-->
               <!--                                                             </h5>-->
               <!--                                                        </div>-->
               <!--                                                        <div class="mb-2 mt-2">-->
               <!--                                                             <p class="mb-2">Project Status<span class="float-right text-default">85%</span></p>-->
               <!--                                                             <div class="progress progress-sm mb-0 h-1">-->
               <!--                                                                  <div class="progress-bar progress-bar-striped progress-bar-animated bg-success w-85"></div>-->
               <!--                                                             </div>-->
               <!--                                                        </div>-->
               <!--                                                   </div>-->
               <!--                                              </div>-->
               <!--                                         </a>-->
               <!--                                         <a class="list-group-item list-group-item-action overflow-hidden pl-0 pr-0 pt-4" href="#">-->
               <!--                                              <div class="d-flex">-->
               <!--                                                   <img class="avatar-xl br-7 mr-3" src="../assets/images/photos/34.jpg" alt="Image description">-->
               <!--                                                   <div class="media-body">-->
               <!--                                                        <div class="align-items-center">-->
               <!--                                                             <h5 class="mb-0">-->
               <!--                                                                  Html project-->
               <!--                                                             </h5>-->
               <!--                                                        </div>-->
               <!--                                                        <div class="mb-2 mt-2">-->
               <!--                                                             <p class="mb-2">Project Status<span class="float-right text-default">75%</span></p>-->
               <!--                                                             <div class="progress progress-sm mb-0 h-1">-->
               <!--                                                                  <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-75"></div>-->
               <!--                                                             </div>-->
               <!--                                                        </div>-->
               <!--                                                   </div>-->
               <!--                                              </div>-->
               <!--                                         </a>-->
               <!--                                    </div>-->
               <!--                               </div>-->
               <!--                          </div>-->
               <!--                     </div>-->
               <!--                </div>-->
               <!--           </li>-->
               <!--      </ul>-->
               <!-- </li>-->
               <!--</ul>-->
               <ul class="nav header-nav">
                  <li class="nav-item dropdown header-option m-2">
                     <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                     <i class="fe fe-settings mr-2"></i>Settings
                     </a>
                     <div class="dropdown-menu dropdown-menu-left">
                        <a class="dropdown-item" href="#">Option 1</a>
                        <a class="dropdown-item" href="#">Option 2</a>
                        <a class="dropdown-item" href="#">Option 3</a>
                        <a class="dropdown-item" href="#">Option 4</a>
                        <a class="dropdown-item" href="#">Option 5</a>
                     </div>
                  </li>
               </ul>
               
               <div class="d-flex order-lg-2 ml-auto header-rightmenu">
                  <div class="dropdown">
                     <a  class="nav-link icon full-screen-link" id="fullscreen-button">
                     <i class="fe fe-maximize-2"></i>
                     </a>
                  </div>
                  <!-- full-screen -->
                  <div class="dropdown header-notify">
                     <a class="nav-link icon" data-toggle="dropdown" aria-expanded="false">
                     <i class="fe fe-bell "></i>
                     <span class="pulse bg-success"></span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
                        <a href="#" class="dropdown-item text-center">4 New Notifications</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item d-flex pb-3">
                           <div class="notifyimg bg-green">
                              <i class="fe fe-mail"></i>
                           </div>
                           <div>
                              <strong>Message Sent.</strong>
                              <div class="small text-muted">12 mins ago</div>
                           </div>
                        </a>
                        <a href="#" class="dropdown-item d-flex pb-3">
                           <div class="notifyimg bg-pink">
                              <i class="fe fe-shopping-cart"></i>
                           </div>
                           <div>
                              <strong>Order Placed</strong>
                              <div class="small text-muted">2  hour ago</div>
                           </div>
                        </a>
                        <a href="#" class="dropdown-item d-flex pb-3">
                           <div class="notifyimg bg-blue">
                              <i class="fe fe-calendar"></i>
                           </div>
                           <div>
                              <strong> Event Started</strong>
                              <div class="small text-muted">1  hour ago</div>
                           </div>
                        </a>
                        <a href="#" class="dropdown-item d-flex pb-3">
                           <div class="notifyimg bg-orange">
                              <i class="fe fe-monitor"></i>
                           </div>
                           <div>
                              <strong>Your Admin Lanuch</strong>
                              <div class="small text-muted">2  days ago</div>
                           </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item text-center">View all Notifications</a>
                     </div>
                  </div>
                  <!-- notifications -->
                    <!--<div class="col-6 text-center">-->
                    <!--             <a class="" href=""><i class="dropdown-icon mdi mdi-logout-variant fs-30 m-0 leading-tight"></i></a>-->
                    <!--             <div>Sign out</div>-->
                    <!--          </div>-->
                  <div class="dropdown header-user">
                     <a class="nav-link leading-none siderbar-link"  data-toggle="sidebar-right" data-target=".sidebar-right">
                     <span class="mr-3 d-none d-lg-block ">
                     <span class="text-gray-white"><span class="ml-2"><?php echo $_SESSION['Username']; ?></span></span>
                     </span>
                     <span class="avatar avatar-md brround"><img src="../assets/images/users/female/33.png" alt="Profile-img" class="avatar avatar-md brround"></span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <div class="header-user text-center mt-4 pb-4">
                           <span class="avatar avatar-xxl brround"><img src="../assets/images/users/female/33.png" alt="Profile-img" class="avatar avatar-xxl brround"></span>
                           <a href="#" class="dropdown-item text-center font-weight-semibold user h3 mb-0"><?php echo $_SESSION['Username']; ?></a>
                           <small>
                           </small>
                        </div>
                        <a class="dropdown-item" href="#">
                        <i class="dropdown-icon mdi mdi-account-outline "></i> Spruko technologies
                        </a>
                        <a class="dropdown-item" href="#">
                        <i class="dropdown-icon  mdi mdi-account-plus"></i> Add another Account
                        </a>
                        <div class="card-body border-top">
                           <div class="row">
                              <div class="col-6 text-center">
                                 <a class="" href=""><i class="dropdown-icon mdi  mdi-message-outline fs-30 m-0 leading-tight"></i></a>
                                 <div>Inbox</div>
                              </div>
                              <div class="col-6 text-center">
                                 <a class="" href=""><i class="dropdown-icon mdi mdi-logout-variant fs-30 m-0 leading-tight"></i></a>
                                 <div>Sign out</div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- profile -->
                  <div class="dropdown">
                     <a  class="nav-link icon siderbar-link" data-toggle="sidebar-right" data-target=".sidebar-right">
                     <i class="fe fe-more-horizontal"></i>
                     </a>
                  </div>
                  <!-- Right-siebar-->
               </div>
            </div>
         </div>
      </div>
      <!--app-header end-->
      <!-- Sidebar menu-->
      <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
      <aside class="app-sidebar">
         <section class="sidebar position-relative">
            <div class="multinav">
               <div class="multinav-scroll" style="height: 100%;">
                  <!-- sidebar menu-->
                  <ul class="sidebar-menu" data-widget="tree">
                        <li>
                        <a href="https://live.thriftops.com/Dashboard/Sales_Report.php">
                        <i class="ti-files" style="font-size: 16px;"><span class="path1"></span><span class="path2"></span></i>
                        <span>Sale Reports</span>
                        </a>
                     </li>
			  <li>
                        <a href="https://live.thriftops.com/Dashboard/Marketplace.php">
                        <i class="ti-files" style="font-size: 16px;"><span class="path1"></span><span class="path2"></span></i>
                        <span>Marketplace</span>
                        </a>
                     </li>
                     <li>
                        <a href="https://live.thriftops.com/Dashboard/track.php">
                        <i class="ti-files" style="font-size: 16px;"><span class="path1"></span><span class="path2"></span></i>
                        <span>Analytics/Track</span>
                        </a>
                     </li>
                     <li><a href="https://upload.thriftops.com/Dashboard/Analytics.php"><i class="glyphicon-stats"><span class="path1"></span><span class="path2"></span></i>Analytics<blink>NEW</blink></a></li>
                     <li><a href="https://upload.thriftops.com/Dashboard/Inventory.php"><i class="glyphicon-stats"><span class="path1"></span><span class="path2"></span></i>Warehouse Report<blink>NEW</blink></a></li>
                     
                     <li class="treeview">
                        <a href="#">
                        <i class="icon-Barcode-read"><span class="path1"></span><span class="path2"></span></i>
                        <span>Procurement</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Purchase Request 
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                 <li><a href="https://upload.thriftops.com/PR/PR_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Create</a></li>
                                 <li><a href="https://upload.thriftops.com/PR/PR_View.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>View</a></li>
                                 <li><a href="https://upload.thriftops.com/PR/PR_Admin.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Admin</a></li>
                              </ul>
                           </li>
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Purchase Order 
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                 <li><a href="https://upload.thriftops.com/PO/PO_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Create</a></li>
                                 <li><a href="https://upload.thriftops.com/PO/PO_View.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>View</a></li>
                              </ul>
                           </li>
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Good Received Notes 
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                 <li><a href="https://upload.thriftops.com/GRN/GRN_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Create</a></li>
                                 <li><a href="https://upload.thriftops.com/GRN/GRN_View.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>View</a></li>
                              </ul>
                           </li>
                           
                           
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Product Barcodes
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                 <li><a href="https://upload.thriftops.com/SKU/SKU_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Generate</a></li>
                                 <li><a href="https://upload.thriftops.com/SKU/SKU_Select.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Print</a></li>
                                 <li><a href="https://upload.thriftops.com/SKU/view.all.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Search & Print </a></li>
                                 <li><a href="https://upload.thriftops.com/Dashboard/grntoupload.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Remains leftover<blink>NEW</blink></a></li>
                                 
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <li class="treeview">
                        <a href="#">
                        <i class="ti-export" style="font-size: 16px;"><span class="path1"></span><span class="path2"></span></i>
                        <span>Product Listing</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Apparel
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                 <li><a href="https://upload.thriftops.com/Tops/Tops_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Top</a></li>
                                 <li><a href="https://upload.thriftops.com/Bottoms/Bottoms_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Bottom</a></li>
                                 <li><a href="https://upload.thriftops.com/Shirts/Shirts_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Shirt</a></li>
                                 <li><a href="https://upload.thriftops.com/T-Shirts/T-Shirts_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Tee Shirt</a></li>
                                 <li><a href="https://upload.thriftops.com/Shorts/Shorts_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Short</a></li>
                                 <li><a href="https://upload.thriftops.com/Hoodies/Hoodies_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Hoodies</a></li>
                                 <li><a href="https://upload.thriftops.com/Jackets/Jackets_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Jackets</a></li>
                                 
                                 
                              </ul>
                           </li>
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Footwear
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                 <li><a href="https://upload.thriftops.com/Shoes/Shoes_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Sneaker</a></li>
                                 <li><a href="https://upload.thriftops.com/Sandals/Sandals_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Sandal</a></li>
                                 <li><a href="https://upload.thriftops.com/Slippers/Slippers_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Slipper</a></li>
                                 <li><a href="https://upload.thriftops.com/Khussa/Khussa_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Khussa</a></li>
                              </ul>
                           </li>
                           <!--gadget-->
                            <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Electronics
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                 <li><a href="https://upload.thriftops.com/Gadgets/Gadget_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Gadget</a></li>
                              </ul>
                           </li>
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Accessories
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                 <li><a href="https://upload.thriftops.com/belts/belts_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Belt</a></li>
                                 <li><a href="https://upload.thriftops.com/Socks/Socks_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Sock</a></li>
                                 <li><a href="https://upload.thriftops.com/Ties/Tie_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Tie</a></li>
                                 <li><a href="https://upload.thriftops.com/Watch/Watch_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Watch</a></li>
                              </ul>
                           </li> <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Bags
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                 <li><a href="https://upload.thriftops.com/Bags/Bags_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Bags</a></li>
                              </ul>
                           </li>
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Headwear
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                 <li><a href="https://upload.thriftops.com/caps/caps_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Cap</a></li>
                              </ul>
                           </li>
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Mannay's CLothes
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                       <li><a href="https://upload.thriftops.com/Manny's%20Closet/Bottoms_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Bottom</a></li>
                                    </ul>
                             </li>
                           
                        </ul>
                     </li>
                     <li>
                         <li class="treeview">
                        <a href="#">
                        <i class="ti-cloud-up" style="font-size: 16px;"><span class="path1"></span><span class="path2"></span></i>
                        <span> Products Details</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="https://upload.thriftops.com/Product_Life_Cycle/Product_Search.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Product Images</a></li>
                           <!--<li><a href="https://upload.thriftops.com/Product_Life_Cycle/SKU.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Product Cycle</a></li>-->
                        </ul>
                     </li>
                     <li class="treeview">
                        <a href="#">
                        <i class="ti-headphone-alt" style="font-size: 16px;"><span class="path1"></span><span class="path2"></span></i>
                        <span>Orders</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="https://upload.thriftops.com/Orders/View_Orders.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Orders Confirmation</a></li>
                           <li><a href="https://upload.thriftops.com/Abandoned/index.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i><span>Abandoned<blink>NEW</blink></span></a></li>
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Orders Status
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                               
                             
                              <ul class="treeview-menu">
                                 <li class="treeview">
                                    <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Other Cities orders
                                    <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                    </a>
                                    <ul class="treeview-menu">
                                       <li><a href="https://upload.thriftops.com/Orders/View_Confirm.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Confirmed Orders</a></li>
                                       <li><a href="https://upload.thriftops.com/Orders/View_Cancel.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Cancel Orders </a></li>
                                       <li><a href="https://upload.thriftops.com/Orders/View_Hold.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>On-hold Orders </a></li>
                                    </ul>
                                 </li>
                                 <li class="treeview">
                                    <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Karachi orders Status
                                    <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                    </a>
                                    <ul class="treeview-menu">
                                       <li><a href="https://upload.thriftops.com/Karachi/View_Confirm.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Confirmed Orders</a></li>
                                       <li><a href="https://upload.thriftops.com/Karachi/View_Cancel.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Cancel Orders </a></li>
                                       <li><a href="https://upload.thriftops.com/Karachi/View_Hold.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>On-hold Orders </a></li>
                                    </ul>
                                 </li>
                                 <li><a href="https://upload.thriftops.com/Order_Level/Order_View.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Orders Lifecycle</a></li>
                                 
                                 
                                 
                              </ul>
                               <li class="treeview">
                                    <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Returns<blink>NEW</blink>
                                    <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                    </a>
                                    <ul class="treeview-menu">
                                       <li><a href="https://upload.thriftops.com/Return/Manual_Add.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i><span>Initiate Return<blink>NEW</blink></span></a></li>
                                       <li><a href="https://upload.thriftops.com/Orders/Return.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i><span>Returns/Exchange<blink>NEW</blink></span></a></li>
                                       <li><a href="https://upload.thriftops.com/Return/Return.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i><span>Action<blink>NEW</blink></span></a></li>
                                       <li><a href="https://upload.thriftops.com/Return/Refund_View.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i><span>Refund<blink>NEW</blink></span></a></li>
                                    </ul>
                                 </li>
                           </li>
                           <li><a href="https://upload.thriftops.com/Order_Split/index.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Order Split</a></li>
                        </ul>
                     </li>
                     <li class="treeview">
                        <a href="#">
                        <i class="ti-shopping-cart" style="font-size: 16px;"><span class="path1"></span><span class="path2"></span></i>
                        <span>Inventory</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Warehouse & Rack
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                 <li><a href="https://upload.thriftops.com/Warehouse/Warehouse_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add</a></li>
                                 <li><a href="https://upload.thriftops.com/Warehouse/Warehouse_View.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>View</a></li>
                                  <li><a href="https://upload.thriftops.com/Rack/Rack_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Racks Creation</a></li>
                                  <li><a href="https://upload.thriftops.com/Rack/Rack_View.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Racks View</a></li>
                              </ul>
                           </li>
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>SWAG
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                 <li><a href="https://upload.thriftops.com/Swag_Pick/index.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pick<blink>NEW</blink></a></li>
                                 <!--<li><a href="https://upload.thriftops.com/Racks/Rack_Pick.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pick</a></li>-->
                                 <li><a href="https://upload.thriftops.com/Rack/Manual_Allocation.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Article Allocation</a></li>
                                 <li><a href="https://upload.thriftops.com/Rack/Remove_Allocation.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Article Delocation</a></li>
                                <li><a href="https://upload.thriftops.com/Return/Return_Manage.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Restock<blink>NEW</blink></a></li>
                              </ul>
                           </li>
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>WINPAK
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                  <li><a href="https://upload.thriftops.com/Winpak_Pick/index.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pick<blink>NEW</blink></a></li>
                                  <li><a href="https://upload.thriftops.com/Winpak_Pick/Return_Manage.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Restock<blink>NEW</blink></a></li>
                                  <!--<li><a href="https://upload.thriftops.com/Racks/Winpak_Rack_Pick.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pick</a></li>-->
                              </ul>
                           </li>
                           
                           <!--gadget-->
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>SK Gadgets
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                  <li><a href="https://upload.thriftops.com/Gadget_Pick/index.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pick<blink>NEW</blink></a></li>
                                 <!--<li><a href="https://upload.thriftops.com/Racks/Winpak_Rack_Pick.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pick</a></li>-->
                              </ul>
                           </li>
                           <!--Giorgio Luxus-->
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Giorgio Luxus
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                  <li><a href="https://upload.thriftops.com/GL_Pick/index.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pick<blink>NEW</blink></a></li>
                              </ul>
                           </li>
                           
                           <!--Rosh Myer-->
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Rosh Myer
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                  <li><a href="https://upload.thriftops.com/Rosh_Myer_Pick/index.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pick<blink>NEW</blink></a></li>
                              </ul>
                           </li>
                           <!--watches-->
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Watches
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                  <li><a href="https://upload.thriftops.com/Watches_pick/index.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pick<blink>NEW</blink></a></li>
                              </ul>
                           </li>
                           <!--<Swag Basics>-->
                            <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Swag Basics
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                  <li><a href="https://upload.thriftops.com/Swag Basics_Pick/index.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pick<blink>NEW</blink></a></li>
                              </ul>
                           </li>
                           <!--<Mendeez>-->
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Mendeez
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                  <li><a href="https://upload.thriftops.com/Mendeez_Pick/index.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pick<blink>NEW</blink></a></li>
                              </ul>
                           </li>
                           <!--R&H-->
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>R&H
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                  <li><a href="https://upload.thriftops.com/R&H_Pick/index.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pick<blink>NEW</blink></a></li>
                              </ul>
                           </li>
                           <!--<Bemble>-->
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Bemble
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                  <li><a href="https://upload.thriftops.com/Bemble_Pick/index.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pick<blink>NEW</blink></a></li>
                              </ul>
                           </li>
                            <!--<Aybeez>-->
                            <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Aybeez
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                  <li><a href="https://upload.thriftops.com/Aybeez_Pick/index.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pick<blink>NEW</blink></a></li>
                              </ul>
                           </li>
                           <!--<AKteez>-->
                            <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>AKteez
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                  <li><a href="https://upload.thriftops.com/AKteez_Pick/index.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pick<blink>NEW</blink></a></li>
                              </ul>
                           </li>
                            <!--marketplace-->
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Marketplace Orders
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                  <li><a href="https://upload.thriftops.com/Marketplace_Pick/index.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pick<blink>NEW</blink></a></li>
                              </ul>
                           </li>
                           <!--leathershop-->
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>LeatherShop Mart
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                  <li><a href="https://upload.thriftops.com/LeatherShop_Mart/index.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pick</a></li>
                                  <li><a href="https://upload.thriftops.com/LeatherShop_Mart/indexp.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pack<blink>NEW</blink></a></li>
                                  <li><a href="https://upload.thriftops.com/LeatherShop_Mart/Packed.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pack View<blink>NEW</blink></a></li>
                              </ul>
                           </li>
                           
                          
                           </li>
                        </ul>
                     </li>
            
                     <li class="treeview">
                        <a href="#">
                        <i class="icon-Box2"><span class="path1"></span><span class="path2"></span></i>
                        <span>Dispatch</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                             <!--<li><a href="https://upload.thriftops.com/Outbound/Recieved.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Receive</a></li>-->
                           <li><a href="https://upload.thriftops.com/Receiving/index.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Receive</a></li>
                           <!--<li><a href="https://upload.thriftops.com/Outbound/Recieved.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Receive Articles</a></li>-->
                           <li><a href="https://upload.thriftops.com/Packing/index.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pack</a></li>
                           <li><a href="https://upload.thriftops.com/Dispatch/index.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Mark Dispatch</a></li>
                           <li><a href="https://upload.thriftops.com/Dispatch/Dispatch_View.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>View Dispatch<blink>NEW</blink></a></li>
                           <li><a href="https://upload.thriftops.com/Loadsheet/index.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Load Sheet<blink>NEW</blink></a></li>
                           <!--<li><a href="https://upload.thriftops.com/Outbound/Packed.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pack Orders</a></li>-->
                           <li><a href="https://upload.thriftops.com/Outbound/Reattempt.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Re-Attempt Orders</a></li>
                        </ul>
                     </li>
                    <li class="treeview">
                        <a href="#">
                        <i class="ti-back-left" style="font-size: 16px;"><span class="path1"></span><span class="path2"></span></i>
                        <span>Returns <blink>NEW</blink></span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <!--<li><a href="https://upload.thriftops.com/Return/All_Status.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Returning (Courier)</a></li>-->
                          <li><a href="https://upload.thriftops.com/Return/Manual_Add.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i><span>Initiate Return<blink>NEW</blink></span></a></li>
                           <li><a href="https://upload.thriftops.com/Return/Mark_Return.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Receiving</a></li>
                           <li><a href="https://upload.thriftops.com/Return/Return.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Action</a></li>
                           
                        </ul>
                     </li>
                     
                     <li class="treeview">
                        <a href="#">
                        <i class="ti-share-alt" style="font-size: 16px;"><span class="path1"></span><span class="path2"></span></i>
                        <span>Lifecycle</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="https://upload.thriftops.com/Product_Life_Cycle/SKU.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Product</a></li>
                           <li><a href="https://upload.thriftops.com/Product_Life_Cycle/Order.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Order</a></li>
                        </ul>
                     </li>
                     <li class="treeview">
                        <a href="#">
                        <i class="ti-truck" style="font-size: 16px;"><span class="path1"></span><span class="path2"></span></i>
                        <span>Tracking</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                        <a href="https://upload.thriftops.com/Courier/All_Status.php">
                        <i class="icon-Globe"><span class="path1"></span><span class="path2"></span></i>
                        <span>Tracking Status</span>
                        </a>
                     </li>
                           <li><a href="https://upload.thriftops.com/Karachi/Status_Update.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Update Order Status</a></li>
                           <li><a href="https://upload.thriftops.com/Courier/Karachi_Status_Dispatched.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i> Dispatched Orders</a></li>
                           <li><a href="https://upload.thriftops.com/Courier/Karachi_Status_Delivered.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i> Delivered Orders</a></li>
                           <li><a href="https://upload.thriftops.com/Courier/Karachi_Status_Pay_Recieved.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Paid Orders </a></li>
                           <li><a href="https://upload.thriftops.com/Courier/Karachi_Status_Return.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i> Returned Orders</a></li>
                            <li>
                        <a href="https://upload.thriftops.com/PostEx_Status/Postex_View.php">
                        <i class="ti-direction" style="font-size: 16px;"><span class="path1"></span><span class="path2"></span></i>
                        <span>Postex Status</span>
                        </a>
                     </li>
                     <li>
                        <a href="https://upload.thriftops.com/Leopard_Status/Leopard_View.php">
                        <i class="ti-direction-alt" style="font-size: 16px;"><span class="path1"></span><span class="path2"></span></i>
                        <span>Leopard Status</span>
                        </a>
                     </li>
                     <li>
                        <a href="https://upload.thriftops.com/Trax_Status/Trax_View.php">
                        <i class="ti-direction" style="font-size: 16px;"><span class="path1"></span><span class="path2"></span></i>
                        <span>Trax Status</span>
                        </a>
                     </li>
                        </ul>
                     </li>
                     <li class="treeview">
                        <a href="#">
                        <i class="ti-share-alt" style="font-size: 16px;"><span class="path1"></span><span class="path2"></span></i>
                        <span>Accounts</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="https://upload.thriftops.com/accounts/View_Orders.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Orders</a></li>
                           <li><a href="https://upload.thriftops.com/Return/Refund_View.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Refund</a></li>
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Vendor
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                 <li><a href="https://upload.thriftops.com/vendor 2/Vendor_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Create</a></li>
                                 <li><a href="https://upload.thriftops.com/vendor 2/Vendor_View.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>View</a></li>
                              </ul>
                           </li>
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Lot
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                 <li><a href="https://upload.thriftops.com/Lot/Lot_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Create</a></li>
                                 <li><a href="https://upload.thriftops.com/Lot/Lot_View.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>View</a></li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <li class="treeview">
                        <a href="#">
                        <i class="ti-user" style="font-size: 16px;"><span class="path1"></span><span class="path2"></span></i>
                        <span>Admin</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="https://upload.thriftops.com/Users/User_Insert.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i> Add Users</a></li>
                           <li><a href="https://upload.thriftops.com/Users/User_View.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i> All Users</a></li>
                        </ul>
                     </li>
                     
                     <li><a href="https://upload.thriftops.com/Logout.php"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i> Sign Out</a></li>
                   
                     <!--  <li class="treeview">
                        <a href="#">
                        <i class="icon-Box2"><span class="path1"></span><span class="path2"></span></i>
                        <span>Forms, Tables & Charts</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                        </a>              
                        <ul class="treeview-menu">
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Forms
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                 <li><a href="forms_advanced.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Form Elements</a></li>
                                 <li><a href="forms_general.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Form Layout</a></li>
                                 <li><a href="forms_wizard.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Form Wizard</a></li>
                                 <li><a href="forms_validation.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Form Validation</a></li>
                                 <li><a href="forms_mask.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Formatter</a></li>
                                 <li><a href="forms_xeditable.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Xeditable Editor</a></li>
                                 <li><a href="forms_dropzone.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dropzone</a></li>
                                 <li><a href="forms_code_editor.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Code Editor</a></li>
                                 <li><a href="forms_editors.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Editor</a></li>
                                 <li><a href="forms_editor_markdown.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Markdown</a></li>
                              </ul>
                           </li>
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Tables
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                 <li><a href="tables_simple.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Simple tables</a></li>
                                 <li><a href="tables_data.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Data tables</a></li>
                                 <li><a href="tables_editable.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Editable Tables</a></li>
                                 <li><a href="tables_color.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Table Color</a></li>
                              </ul>
                           </li>
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Charts
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                 <li><a href="charts_chartjs.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>ChartJS</a></li>
                                 <li><a href="charts_flot.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Flot</a></li>
                                 <li><a href="charts_inline.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Inline charts</a></li>
                                 <li><a href="charts_morris.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Morris</a></li>
                                 <li><a href="charts_peity.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Peity</a></li>
                                 <li><a href="charts_chartist.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Chartist</a></li>
                                 <li><a href="charts_c3_axis.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Axis Chart</a></li>
                                 <li><a href="charts_c3_bar.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Bar Chart</a></li>
                                 <li><a href="charts_c3_data.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Data Chart</a></li>
                                 <li><a href="charts_c3_line.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Line Chart</a></li>
                                 <li><a href="charts_echarts_basic.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Basic Charts</a></li>
                                 <li><a href="charts_echarts_bar.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Bar Chart</a></li>
                                 <li><a href="charts_echarts_pie_doughnut.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pie & Doughnut Chart</a></li>
                              </ul>
                           </li>
                        </ul>
                        </li>
                        <li class="treeview">
                        <a href="#">
                        <i class="icon-Globe"><span class="path1"></span><span class="path2"></span></i>
                        <span>Apps & Widgets</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Apps
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                 <li><a href="extra_calendar.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Calendar</a></li>
                                 <li><a href="contact_app.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Contact List</a></li>
                                 <li><a href="contact_app_chat.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Chat</a></li>
                                 <li><a href="extra_taskboard.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Todo</a></li>
                                 <li><a href="mailbox.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Mailbox</a></li>
                              </ul>
                           </li>
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Widgets
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                 <li class="treeview">
                                    <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Custom
                                    <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                    </a>
                                    <ul class="treeview-menu">
                                       <li><a href="widgets_blog.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Blog</a></li>
                                       <li><a href="widgets_chart.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Chart</a></li>
                                       <li><a href="widgets_list.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List</a></li>
                                       <li><a href="widgets_social.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Social</a></li>
                                       <li><a href="widgets_statistic.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Statistic</a></li>
                                       <li><a href="widgets_weather.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Weather</a></li>
                                       <li><a href="widgets.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Widgets</a></li>
                                       <li><a href="email_index.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Emails</a></li>
                                    </ul>
                                 </li>
                                 <li class="treeview">
                                    <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Maps
                                    <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                    </a>
                                    <ul class="treeview-menu">
                                       <li><a href="map_google.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Google Map</a></li>
                                       <li><a href="map_vector.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Vector Map</a></li>
                                    </ul>
                                 </li>
                                 <li class="treeview">
                                    <a href="#">
                                    <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Modals
                                    <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                    </a>
                                    <ul class="treeview-menu">
                                       <li><a href="component_modals.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Modals</a></li>
                                       <li><a href="component_sweatalert.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Sweet Alert</a></li>
                                       <li><a href="component_notification.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Toastr</a></li>
                                    </ul>
                                 </li>
                              </ul>
                           </li>
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Ecommerce
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                 <li><a href="ecommerce_products.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Products</a></li>
                                 <li><a href="ecommerce_cart.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Products Cart</a></li>
                                 <li><a href="ecommerce_products_edit.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Products Edit</a></li>
                                 <li><a href="ecommerce_details.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Product Details</a></li>
                                 <li><a href="ecommerce_orders.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Product Orders</a></li>
                                 <li><a href="ecommerce_checkout.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Products Checkout</a></li>
                              </ul>
                           </li>
                           <li class="treeview">
                              <a href="#">
                              <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Sample Pages
                              <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                              </span>
                              </a>
                              <ul class="treeview-menu">
                                 <li><a href="invoice.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Invoice</a></li>
                                 <li><a href="invoicelist.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Invoice List</a></li>
                                 <li><a href="extra_app_ticket.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Support Ticket</a></li>
                                 <li><a href="extra_profile.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>User Profile</a></li>
                                 <li><a href="contact_userlist_grid.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Userlist Grid</a></li>
                                 <li><a href="contact_userlist.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Userlist</a></li>
                                 <li><a href="sample_faq.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>FAQs</a></li>
                                 <li><a href="sample_blank.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Blank</a></li>
                                 <li><a href="sample_coming_soon.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Coming Soon</a></li>
                                 <li><a href="sample_custom_scroll.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Custom Scrolls</a></li>
                                 <li><a href="sample_gallery.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Gallery</a></li>
                                 <li><a href="sample_lightbox.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Lightbox Popup</a></li>
                                 <li><a href="sample_pricing.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pricing</a></li>
                              </ul>
                           </li>
                        </ul>
                        </li>
                        <li class="treeview">
                        <a href="#">
                        <i class="icon-Lock-overturning"><span class="path1"></span><span class="path2"></span></i>
                        <span>Authentication</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="auth_login.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Login</a></li>
                           <li><a href="auth_register.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Register</a></li>
                           <li><a href="auth_lockscreen.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Lockscreen</a></li>
                           <li><a href="auth_user_pass.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Recover password</a></li>
                        </ul>
                        </li>
                        <li class="treeview">
                        <a href="#">
                        <i class="icon-Warning-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                        <span>Miscellaneous</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="error_404.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Error 404</a></li>
                           <li><a href="error_500.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Error 500</a></li>
                           <li><a href="error_maintenance.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Maintenance</a></li>
                        </ul>
                        </li> -->
                  </ul>
                  <div class="sidebar-widgets">
                     <!-- <div class="mx-25 mb-30 pb-20 side-bx bg-primary-light rounded20">
                        <div class="text-center">
                           <img src="https://multipurposethemes.com/admin/doclinic-admin-template/images/svg-icon/color-svg/custom-17.svg" class="sideimg p-5" alt="">
                           <h4 class="title-bx text-primary">Make an Appointments</h4>
                           <a href="#" class="py-10 fs-14 mb-0 text-primary">
                           Best Helth Care here <i class="mdi mdi-arrow-right"></i>
                           </a>
                        </div>
                        </div> -->
                     <div class="copyright text-center m-25">
                        <p>
                           <strong class="d-block">ThriftOps</strong>
                           
                           <b><span style="font-size: 14px; color:#ba0707;">Powered by SwagKicks </span></b>
                           <br>
                           &copy;<script>document.write(new Date().getFullYear())</script> All Rights Reserved
                           <br>
                           
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </aside>
      <!--sidemenu end-->
      <!-- app-content-->
      <div class="app-content  my-3 my-md-5">
  
      <script src="../include/sidebar/main/js/vendors.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script src="../include/sidebar/main/js/pages/chat-popup.js"></script>
      <script src="../include/icons/feather-icons/feather.min.js"></script>
      <script src="../include/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
      <script src="../include/vendor_components/OwlCarousel2/dist/owl.carousel.js"></script>
      <script src="../include/vendor_components/date-paginator/moment.min.js"></script>
      <script src="../include/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
      <script src="../include/vendor_components/date-paginator/bootstrap-datepaginator.min.js"></script> 
      <!-- Doclinic App -->
      <script src="../include/sidebar/main/js/template.js"></script>
      <script src="../include/sidebar/main/js/pages/dashboard2.js"></script>
      <script src="https://use.fontawesome.com/09424002de.js"></script>
       <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

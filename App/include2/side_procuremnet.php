

<!-- Page Body Start-->
      <div class="page-body-wrapper horizontal-menu">
        <!-- Page Sidebar Start-->
        <header class="main-nav">
          <div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="../assets/images/dashboard/1.png" alt="">
            <div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="user-profile.html">
              <h6 class="mt-3 f-14 f-w-600"><?php echo $_SESSION['Username']; ?></h6></a>
            <p class="mb-0 font-roboto">Product</p>
          </div>
          <nav>
            <div class="main-navbar">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="mainnav">           
                <ul class="nav-menu custom-scrollbar">
                  <li class="back-btn">
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                  <!--<li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="activity"></i><span>Dashboard</span></a>-->
                  <!--  <ul class="nav-submenu menu-content">-->
                  <!--    <li><a href="index.html">Default</a></li>-->
                  <!--    <li><a href="All_Product/all_product">All Products</a></li>-->
                  <!--  </ul>-->
                  <!--</li>-->
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="box"></i><span>Products</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="../All_Product/all_product">All Products</a></li>
                      <li><a href="../Ebay/Ebay.php">Ebay Listing</a></li>
                      <li><a href="https://backup.thriftops.com/ShopifyPush/addProduct.php">Shopify Listing</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="shopping-cart"></i><span>Procurement</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="<?php echo $prw?>">Purchase Request</a></li>
                      <li><a href="../PO/PR_Admin">PR Admin</a></li>
                      <li><a href="../PO/PO_View">Purcahse Order</a></li>
                      <li><a href="../SKU/View_SKU">Good Recieve Note</a></li>
                    </ul>
                  </li>
                  <!--<li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="users"></i><span>Customer Support</span></a>-->
                  <!--  <ul class="nav-submenu menu-content">-->
                  <!--    <li><a href="#">Orders confirmation</a></li>-->
                  <!--    <li><a href="#">Abondent</a></li>-->
                  <!--    <li><a href="#">Order status</a></li>-->
                  <!--    <li><a href="#">Confirmed</a></li>-->
                  <!--    <li><a href="#">Cancel</a></li>-->
                  <!--    <li><a href="#">Hold</a></li>-->
                  <!--  </ul>-->
                  <!--</li>-->
                  <!--<li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="file-text"></i><span>Inventory</span></a>-->
                  <!--  <ul class="nav-submenu menu-content">-->
                  <!--    <li><a href="../Warehouse/Warehouse_View.php">Warehouses</a></li>-->
                  <!--    <li><a href="#">Racks</a></li>-->
                  <!--    <li><a href="#">Allocation</a></li>-->
                  <!--  </ul>-->
                  <!--</li>-->
                  <!--<li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="truck"></i><span>Outbound</span></a>-->
                  <!--  <ul class="nav-submenu menu-content">-->
                  <!--    <li><a href="#">Received</a></li>-->
                  <!--    <li><a href="#">Pack</a></li>-->
                  <!--  </ul>-->
                  <!--</li>-->


                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
        </header>
        <!-- Page Sidebar Ends-->
        
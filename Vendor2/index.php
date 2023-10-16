<?php 
   session_start();
   include_once("../include/mysql_connection.php"); 
   date_default_timezone_set("Asia/Karachi");
   error_reporting(0);
   
   if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
   {
       $cr=$_SESSION['id'];
       
       $pr="Select * from User Where Dept_ID=8 AND User_ID='$cr' OR Dept_ID=3 AND User_ID='$cr'";
        $resu2 = mysqli_num_rows( mysqli_query($mysql, $pr));
        // $rowq1 =mysqli_fetch_array($resu2);
        // $dept=$rowq1['Dept_ID'];
        //echo $dept;
        if($resu2<1)
        {
            echo '<script>alert("Your Are Not Authorized !");window.location.href="../Dashboard/Home.php";</script>';
        }   
   }
   else 
   {
       echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
   }
   


   
   ?>
<?php include ("../include/header.php"); ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>
<link rel="stylesheet" type="text/css" href="assets/css/dropzone.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="application/javascript" src="assets/custom/elements.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/core.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>
<!--Data Table-->
<!-- Page Body Start-->
<div class="page-body">
<!-- Container-fluid starts-->
<div class="container-fluid">
<div class="row project-cards">
<div class="col-md-12 project-list">
   <div class="">
      <div class="row">
         <div class="col-md-6 p-0">
            <h3 class=""><b>Vendors</b></h3>
            <!--<ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">-->
            <!--<li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="false"><i data-feather="target"></i>Ebay</a></li>-->
            <!--   <li class="nav-item"><a class="nav-link active" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false"><i data-feather="shopping-bag"></i>Add</a></li>-->
            <!--<li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false"><i data-feather="check-circle"></i>WooCommerce</a></li>-->
            <!--</ul>-->
         </div>
         <div class="col-md-6 p-0">
            <div class="form-group mb-0 me-0"></div>
            <button class="btn btn-light active txt-primary" type="button" id="addNew" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                  <circle cx="12" cy="12" r="10"></circle>
                  <line x1="12" y1="8" x2="12" y2="16"></line>
                  <line x1="8" y1="12" x2="16" y2="12"></line>
               </svg>
               Add New
            </button>
            <!--<a class="btn btn-primary" href="projectcreate.html"> <i class="icofont icofont-plus-circle"> </i>&nbsp;  Add New </a>-->
         </div>
      </div>
   </div>
</div>
<!--<button onclick="asc();"> EXPORT </button>-->
<div class="col-sm-12">
   <div  id="modalID" class="modal fade bd-example-modal-lg p-t-10" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title" id="myLargeModalLabel"><b>Add Vendor</b></h4>
               <button class="btn-close" type="button" id="modalclose1"  data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="target">
               <style>
                  .cardshadow {
                  box-shadow: 3px 3px rgb(8 36 0 / 7%);
                  },
                  .inputborder{
                  border-color: 2px solid black;
                  }
               </style>
               <div class="card" >
                  <iframe id="txtArea1" style="display:none"></iframe>
                  <h5 class="card-title mb-0" style="margin:15px;
                     font-size: 16px;" >Vendor Details</h5>
                  <div class="card-body cardshadow ">
                     <div class="col-sm-12 row">
                        <div class="mb-3 col-sm-4">
                           <label class="col-form-label pt-0" for="exampleInputEmail1">Name*</label>
                           <input class="form-control inputborder"  type="text" name="name" onchange="nameChecker()" aria-describedby="emailHelp">
                           <span id="checkN" ></span>
                        </div>
                        <div class="mb-3 col-sm-4">
                           <label class="col-form-label pt-0" for="exampleInputEmail1">Contact*</label>
                           <input class="form-control inputborder" type="number" name="contact" aria-describedby="emailHelp" >
                        </div>
                        <div class="mb-3 col-sm-4">
                           <label class="col-form-label pt-0" for="exampleInputEmail1">Email*</label>
                           <input class="form-control inputborder" type="email" name="email" aria-describedby="emailHelp" >
                        </div>
                     </div>
                     <div class="mb-3 col-sm-12">
                        <label class="col-form-label pt-0" for="exampleInputEmail1">Address</label>
                        <input class="form-control inputborder" type="text" style="width:97%;" name="address" aria-describedby="emailHelp" >
                     </div>
                     <div class="col-sm-12 row">
                        <div class="mb-3 col-sm-6">
                           <label class="col-form-label pt-0" for="exampleInputEmail1">Type*</label>
                           <select class="form-control form-select" name="Vtype" onchange="val()" id="select_id"   >
                              <option value=" " disabled selected>Select Type</option>
                              <option value="Supplier">Supplier</option>
                              <option value="Peer">Peer</option>
                              <option value="Seller">Seller</option>
                           </select>
                        </div>
                        <div class="mb-3 col-sm-6">
                           <label class="col-form-label pt-0" for="exampleInputEmail1">Agreement*</label>
                           <select class="form-control form-select" name="type" onchange="agrchange()" id="agr_id"  >
                              <option value=" " disabled selected>Select Agreement Type</option>
                              <option value="A">Cash</option>
                              <option value="B">Percentage</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-sm-12 row" id="divpercent" style="margin-top:20px;"></div>
                  </div>
               </div>
               <div class="card" >
                  <h5 class="card-title mb-0" style="margin:15px;
                     font-size: 16px;" >Bank Details</h5>
                  <div class="card-body cardshadow ">
                     <div class="col-sm-12 row">
                        <div class="mb-3 col-sm-6">
                           <label class="col-form-label pt-0" for="exampleInputEmail1">Title</label>
                           <input class="form-control"  type="text" name="bTitle" aria-describedby="emailHelp" placeholder="Enter Name">
                        </div>
                        <div class="mb-3 col-sm-6">
                           <label class="col-form-label pt-0" for="exampleInputEmail1">Bank Name</label>
                           <input class="form-control" type="text" name="bName" aria-describedby="emailHelp" placeholder="Enter Contact">
                        </div>
                     </div>
                     <div class="mb-3 col-sm-12">
                        <label class="col-form-label pt-0" for="exampleInputEmail1">Account Number</label>
                        <input class="form-control" type="text" style="width:97%;" name="bAccount" aria-describedby="emailHelp" placeholder="Enter Address">
                     </div>
                  </div>
               </div>
               <div class="card" >
                  <h5 class="card-title mb-0" style="margin:15px;
                     font-size: 16px;" >Login Credentials</h5>
                  <div class="card-body cardshadow ">
                     <div class="col-sm-12 row">
                        <div class="mb-3 col-sm-6">
                           <label class="col-form-label pt-0" for="exampleInputEmail1">Username</label>
                           <input class="form-control"  type="text" name="uname" aria-describedby="emailHelp" placeholder="Enter Name">
                        </div>
                        <div class="mb-3 col-sm-6">
                           <label class="col-form-label pt-0" for="exampleInputEmail1">Password</label>
                           <input class="form-control" type="password" name="password" aria-describedby="emailHelp" placeholder="Enter Contact">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card" >
                  <h5 class="card-title mb-0" style="margin:15px;
                     font-size: 16px;" >SKU Format</h5>
                  <div class="card-body cardshadow ">
                     <div class="col-sm-12 row">
                        <div class="mb-3 col-sm-6">
                           <label class="col-form-label pt-0" for="exampleInputEmail1">SKU Prefix*</label>
                           <input class="form-control"  type="text" name="SKUP" id="SKUP" onchange="skuCheck()" aria-describedby="emailHelp" placeholder="Enter SKU Prefix">
                           <span id="checkSK" ></span>
                           <div id="suggest"></div>
                        </div>
                     </div>
                  </div>
                  <input class="form-control" type="text" name="vid" style="display:none;" >
                  <input class="form-control" type="text" name="lastId" style="display:none;" >
               </div>
               <div style="float:right;">
                  <button class="btn btn-outline-danger" type="button">Close</button>
                  <button class="btn btn-primary" type="button" id="createButton" onclick="SendData()" disabled>Create</button>
                  <button class="btn btn-primary" type="button" id="updateButton" onclick="updateVendor()" disabled>Update</button>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="card">
      <div class="">
         <div class="tab-content" id="top-tabContent">
            <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
               <div class="row">
                  <div class="col-sm-12 col-xl-12">
                     <div class="row">
                        <div class="col-sm-12" style="background: #f5f7fb;">
                           <div class="card">
                              <script>
                                 function asc(){
                                     var table = $('#example').DataTable({
                                          "bDestroy": true,
                                           order: [[2, 'asc']],
                                     });
                                 }
                                 
                                 function desc(){
                                     var table = $('#example').DataTable({
                                          "bDestroy": true,
                                         order: [[2, 'desc']],
                                     });
                                 }
                                 
                                 function show10(){
                                     var table = $('#example').DataTable({
                                          "bDestroy": true,
                                          "pageLength": 10
                                     });
                                 }
                                 
                                 function show20(){
                                     var table = $('#example').DataTable({
                                          "bDestroy": true,
                                          "pageLength": 20
                                     });
                                 }
                                 
                                 function show50(){
                                     var table = $('#example').DataTable({
                                          "bDestroy": true,
                                          "pageLength": 50
                                     });
                                 }
                                 
                                 function show100(){
                                     var table = $('#example').DataTable({
                                          "bDestroy": true,
                                          "pageLength": 100
                                     });
                                 }
                                 
                                 
                                 
                                  
                                 
                                       $('#example').dataTable( {
                                     "paging": true
                                 } );
                              </script>
                              <div class="row" style="background-color:#DFDFDF;margin:0.8px;height:100px;">
                                 <div class="col-sm-6 "  style="margin-top:30px;">
                                    <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                                       <li class="nav-item"><a onclick="typeAll()" class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true">All</a></li>
                                       <li class="nav-item"><a onclick="typeSupplier()" class="nav-link" id="totalSuppliers" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false"></a></li>
                                       <li class="nav-item"><a onclick="typePeer()" class="nav-link" id="totalPeer" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Peers</a></li>
                                       <li class="nav-item"><a onclick="typeSeller()" class="nav-link" id="totalSeller" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Sellers</a></li>
                                    </ul>
                                 </div>
                                 <div class="col-sm-6 p-r-30" style="margin-top:30px;">
                                    <!-- Bookmark Start-->
                                    <div class="bookmark">
                                       <ul>
                                          <li ><button class="dropbtn"><i class="icon-reload" onClick="history.go(0);"></i></button></li>
                                          <li ><button class="dropbtn"><i class="icon-import" id="btnExport" onclick="fnExcelReport();"></i></button></li>
                                          <li >
                                             <div class="dropdown">
                                                <button class="dropbtn"><i class="fa fa-sliders"></i></button>
                                                <div class="dropdown-content">
                                                   <a  style=" background-color: #e0e3ec; "><b>Show Rows</b></a>
                                                   <a href="#" onclick="show10()">10</a>
                                                   <a href="#" onclick="show20()">20</a>
                                                   <a href="#" onclick="show50()">50</a>
                                                   <a href="#" onclick="show10()">100</a>
                                                   <a  style=" background-color: #e0e3ec; "><b>Sort By Order Date</b></a>
                                                   <a href="#" onclick="asc()">ASC</a>
                                                   <a href="#" onclick="desc()">DEC</a>
                                                </div>
                                             </div>
                                          </li>
                                          <li ><button class="dropbtn"><i class="icon-settings"></i></button></li>
                                       </ul>
                                    </div>
                                    <!-- Bookmark Ends-->
                                 </div>
                              </div>

                              <div class="table-responsive">
                                 <table  id="example" class="dataTable no-footer css-serial" role="grid" style="margin-left: 0px; width: 1787.12px;" >
                                 <thead>
                                    <tr id="test" style="background-color:#F4F5F8;">
                                       <th>Name</th>
                                       <th>Type</th>
                                       <th>Contact</th>
                                       <th>Stock Keeping</th>
                                       <th>Fullfillment</th>
                                       <th>Batches</th>
                                       <td id="action" style="width:30px"><b>Action</b></td>
                                    </tr>
                                 </thead>
                                 <tbody id="table_body">
                                 </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid Ends-->
</div>
<!--CUSTOM JS-->
<!--(WASAY Scripts) Don't Change it-->
<!--SIKANDAR NOT ALLOWED-->
<style>
   .dataTables_length,.dataTables_filter{
   display:none;
   }
</style>
<script>
   function typeAll(){
       //alert("hello")
       
       var settings = {
     "url": "https://backup.thriftops.com/Vendor2/api/all.php",
     "method": "GET",
     "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
     console.log(response);
     var rows = JSON.parse(response);
         let tableData = "";
                       rows.forEach((values => {
                           tableData += `
                           <tr>
                              
                                <td style="text-align: center;">${values.Name}</td>
                                <td style="text-align: center;">${values.Type}</td>
                                <td style="text-align: center;">${values.Contact}</td>
                                <td style="text-align: center;">${values.Warehouse_ID}</td>
                                 <td style="text-align: center;">${values.Fments}</td>
                                   <td style="text-align: center;">${values.batches}</td>
                                   <td style="text-align: center;"><a href="#" data-role="view" ><img class="icons" onclick="viewVendor(${values.Vendor_ID})"  src="https://backup.thriftops.com/assets/images/icons/eye.png"></a>
                                   <a href="#" data-role="infrm" ><img class=""  src="https://backup.thriftops.com/assets/images/icons/edit.png" onclick="editVendor(${values.Vendor_ID})"></a></td>
                                   
                           </tr > `;
   
                       }))
                       document.getElementById("table_body").
                           innerHTML = tableData;
     
   });
   
       
   }
   
   function typeSeller(){
       //alert("hello")
       
       var settings = {
     "url": "https://backup.thriftops.com/Vendor2/api/vendorType.php?type=Seller",
     "method": "GET",
     "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
     console.log(response);
     var rows = JSON.parse(response);
         let tableData = "";
                       rows.forEach((values => {
                           tableData += `
                           <tr>
                              
                                <td>${values.Name}</td>
                                <td>${values.Type}</td>
                                <td>${values.Contact}</td>
                                <td>${values.Warehouse_ID}</td>
                                 <td>${values.Fments}</td>
                                   <td>${values.batches}</td>
                                   <td>   <a href="#" data-role="view" ><img class="icons" onclick="viewVendor(${values.Vendor_ID})"  src="https://backup.thriftops.com/assets/images/icons/eye.png"></a>
                                   <a href="#" data-role="infrm" ><img class=""  src="https://backup.thriftops.com/assets/images/icons/edit.png" onclick="editVendor(${values.Vendor_ID})"></a></td>
                                   
                           </tr > `;
   
                       }))
                       document.getElementById("table_body").
                           innerHTML = tableData;
     
   });
   
       
   }
   
   
   
   
   function typePeer(){
       //alert("hello")
       
       var settings = {
     "url": "https://backup.thriftops.com/Vendor2/api/vendorType.php?type=Peer",
     "method": "GET",
     "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
     console.log(response);
     var rows = JSON.parse(response);
         let tableData = "";
                       rows.forEach((values => {
                           tableData += `
                           <tr>
                              
                                <td>${values.Name}</td>
                                <td>${values.Type}</td>
                                <td>${values.Contact}</td>
                                <td>${values.Warehouse_ID}</td>
                                 <td>${values.Fments}</td>
                                   <td>${values.batches}</td>
                                   <td>   <a href="#" data-role="view" ><img class="icons" onclick="viewVendor(${values.Vendor_ID})"  src="https://backup.thriftops.com/assets/images/icons/eye.png"></a>
                                   <a href="#" data-role="infrm" ><img class=""  src="https://backup.thriftops.com/assets/images/icons/edit.png" onclick="editVendor(${values.Vendor_ID})"></a></td>
                                   
                           </tr > `;
   
                       }))
                       document.getElementById("table_body").
                           innerHTML = tableData;
     
   });
   
       
   }
   
   
   function typeSupplier(){
       //alert("hello")
       
       var settings = {
     "url": "https://backup.thriftops.com/Vendor2/api/vendorType.php?type=Supplier",
     "method": "GET",
     "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
     console.log(response);
     var rows = JSON.parse(response);
         let tableData = "";
                       rows.forEach((values => {
                           tableData += `
                           <tr>
                              
                                <td>${values.Name}</td>
                                <td>${values.Type}</td>
                                <td>${values.Contact}</td>
                                <td>${values.Warehouse_ID}</td>
                                 <td>${values.Fments}</td>
                                   <td>${values.batches}</td>
                                   <td>   <a href="#" data-role="view" ><img class="icons" onclick="viewVendor(${values.Vendor_ID})"  src="https://backup.thriftops.com/assets/images/icons/eye.png"></a>
                                   <a href="#" data-role="infrm" ><img class=""  src="https://backup.thriftops.com/assets/images/icons/edit.png" onclick="editVendor(${values.Vendor_ID})"></a></td>
                                   
                           </tr > `;
   
                       }))
                       document.getElementById("table_body").
                           innerHTML = tableData;
     
   });
   
       
   }
   
   
   
   
   
   
   //export excel
   function fnExcelReport()
   {
       var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>  <th>Name</th><th>Type</th><th>Contact</th><th>Stock Keeping</th><th>Fullfillment</th><th>Batches</th></tr>";
       var textRange; var j=0;
       tab = document.getElementById('table_body'); // id of table
   
       for(j = 0 ; j < tab.rows.length ; j++) 
       {     
           tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
           //tab_text=tab_text+"</tr>";
       }
   
       tab_text=tab_text+"</table>";
       tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
       tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
       tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params
   
       var ua = window.navigator.userAgent;
       var msie = ua.indexOf("MSIE "); 
   
       if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
       {
           txtArea1.document.open("txt/html","replace");
           txtArea1.document.write(tab_text);
           txtArea1.document.close();
           txtArea1.focus(); 
           sa=txtArea1.document.execCommand("SaveAs",true);
       }  
       else                 //other browser not tested on IE 11
           sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  
   
       return (sa);
   }
   
   
   var PercentDiv = ` <div class="mb-3 col-sm-6" id="sCash">
                                                   <label class="col-form-label pt-0" for="exampleInputEmail1">Seller's Share*</label>
                                                   <input class="form-control inputborder"  type="number" name="percent" aria-describedby="emailHelp" >
                                                </div>
                                                 <div class="mb-3 col-sm-6">
                                                   <label class="col-form-label pt-0" for="exampleInputEmail1">FullFillment Type</label>
                                                    <select class="form-control form-select" name="fments" >
                                                      <option value=" " disabled selected>Select Fullfillment Type</option>
                                                      <option value="InHouse">InHouse</option>
                                                      <option value="Dropship">Dropship</option>
                                                   </select>
                                                </div>`;
                                                
                                                
                                                var PeerDiv = ` <div class="mb-3 col-sm-6" >
                                                   <label class="col-form-label pt-0" for="exampleInputEmail1">Peer's Share*</label>
                                                   <input class="form-control inputborder" placeholder="%" id="percent_id"  type="text" name="percent" aria-describedby="emailHelp">
                                                </div>
                                            `;
                                            
                                            
                                            
                                             
   
   function val() {
        var agreement =  $("select[name=type]");
       d = document.getElementById("select_id").value;
       console.log(d)
       if(d == "Seller"){
           
            document.getElementById('divpercent').innerHTML = PercentDiv
          
            agreement.removeAttr("disabled");
       }else if(d == "Peer") {
           document.getElementById('divpercent').innerHTML= ""
            document.getElementById('divpercent').innerHTML = PeerDiv
           agreement.val("B");
   agreement.attr('disabled', 'disabled');
   
       }else if(d == "Supplier") {
           document.getElementById('divpercent').innerHTML= ""
           agreement.val("A");
   agreement.attr('disabled', 'disabled');
   
       }
   }
   
   
   
   function agrchange(){
        var agreementV =  document.getElementById("agr_id").value;
         d = document.getElementById("select_id").value;
       //alert(agreementV)
       if(d == "Seller" && agreementV == "A"){
           
           $("#sCash").hide();
           
       }
       
   }
   
</script>
<!--FOR TABLE-->
<style>
   tfoot {
   display: table-header-group;
   }
   th{
   text-align:center;
   }
</style>
<script>
   $("#updateButton").hide();
   var addSerialNumber = function () {
      var i = 1
      $('table tr').each(function(index) {
          $(this).find('td:nth-child(1)').html(index+1);
      });
   };
   
   addSerialNumber();
   
   
   $(document).ready(function() {
      // Setup - add a text input to each footer cell
      $('#example thead #test th').each( function () {
          var title = $(this).text();
          $(this).append( '<br><input type="text" style="width:130px;"  />' );
      } );
      
       
   
      // DataTable
      v
   
      // Apply the search
      table.columns().every( function () {
          var that = this;
   
          $( 'input', this.header() ).on( 'keyup change', function () {
              if ( that.search() !== this.value ) {
                  that
                      .search( this.value )
                      .draw();
              }
          } );
      } );
   } );
            
   // IF YOU'RE still here please leave
   // haha i was here!
   // Chala ja BH***KE
   
   
   
   typeAll();
   
   
   
</script>
<script>
   var settings = {
   "url": "/theme/html_admin/api/Warehouse.php",
   "method": "POST",
   "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
   var data = JSON.parse(response);
   
   
   
   
   for (var i = 0; i < data.length; i++) {
   
      console.log(data[i].Location);
   var select = document.getElementById("Select");
   var option = document.createElement("option");
   option.text = data[i].Location;
   option.value = data[i].Warehouse_ID;
   select.add(option);
   
   }
   });
   
   
   
   var settings = {
   "url": "https://backup.thriftops.com/Vendor2/api/lastVid.php",
   "method": "POST",
   "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
   
   $("input[name=lastId]").val(response);
   
   });
   
   function addBank(btitle,bname,baccount){
      var lastID = $("input[name=lastId]").val();
    
   
   var form = new FormData();
   form.append("title", btitle);
   form.append("bank_name", bname);
   form.append("account_no", baccount);
   form.append("user_id",lastID);
   form.append("user_type", "Vendor");
   
   var settings = {
   "url": "https://backup.thriftops.com/Vendor2/api/banksAdd.php",
   "method": "POST",
   "timeout": 0,
   "processData": false,
   "mimeType": "multipart/form-data",
   "contentType": false,
   "data": form
   };
   
   $.ajax(settings).done(function (response) {
   console.log(response);
   });
   
   }
   
   // Watch it if you're still here ('https://www.youtube.com/shorts/dOtMlUmTQm4')
   
   
   
   function SendData(){
   
   
   var FINALTYPE = $("#select_id option:selected").text();
   var FINALAGR = $("#agr_id option:selected").text();
   
   
    var password = $("input[name=password]").val();
   var passhash = CryptoJS.MD5(password).toString();
     var bName = $("input[name=bName]").val();
         var bTitle = $("input[name=bTitle]").val();
            var bAccount = $("input[name=bAccount]").val();
            
            
   
   var skup = $("input[name=SKUP]").val();
   var name = $("input[name=name]").val();
   var uname = $("input[name=uname]").val();
      var email = $("input[name=email]").val();
        var contact = $("input[name=contact]").val();
         var address = $("input[name=address]").val();
           var vtype = $("select[name=Vtype]").val();
        var warehouse = $("select[name=warehouse]").val();
          var fments = $("select[name=fments]").val();
          var type = $("select[name=type]").val();
            var percent = $("input[name=percent]").val();
        
   
   
   var form = new FormData();
   form.append("name", name);
   form.append("percentage",percent);
   form.append("warehouse", warehouse);
   form.append("fments", FINALAGR);
   form.append("type", FINALTYPE);
   form.append("skup", skup);
   
   
   var settings = {
   "url": "https://backup.thriftops.com/Vendor2/api/vendorAdd.php",
   "method": "POST",
   "timeout": 0,
   "processData": false,
   "mimeType": "multipart/form-data",
   "contentType": false,
   "data": form
   };
   
   
   addBank(bTitle,bName,bAccount);
   addUser(name,uname,passhash,email,contact,address);
   
   $.ajax(settings).done(function (response) {
   //console.log(response);
   Swal.fire({
   position: 'top-center',
   icon: 'success',
   title: 'Vendor Added Successfully',
   showConfirmButton: false,
   timer: 1500
   })
   typeAll();
   $("#modalclose1").click()
   
   });
   
   }
   
   
   function addUser(name,uname,password,email,contact,address){
   
   var form = new FormData();
   form.append("name", name);
   form.append("username", uname);
   form.append("password", password);
   form.append("D_id", 4);
   form.append("email", email);
   form.append("contact", contact);
   form.append("address", address);
   
   var settings = {
   "url": "https://backup.thriftops.com/Vendor2/api/addUser.php",
   "method": "POST",
   "timeout": 0,
   "processData": false,
   "mimeType": "multipart/form-data",
   "contentType": false,
   "data": form
   };
   
   $.ajax(settings).done(function (response) {
   console.log(response);
   });
   
   
   
   }
   
   
   function nameChecker(){
   
   
   
   
   var name = $("input[name=name]").val();
   
       var settings = {
   "url": "https://backup.thriftops.com/Vendor2/api/nCheck.php?colmn=Name&name="+name,
   "method": "POST",
   "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
   var check = parseInt(response);
   var last = name.length -1
   var secondlast = name.length -2 
   var middle = (name.length / 2).toFixed()
   console.log(check)
   
   if(check == 0){
     
   
   document.getElementById("checkN").innerHTML = "";
   document.getElementById("checkN").innerHTML +=  '<em class="txt-danger">Name <b>'+name+'</b> already exists</em>';
   document.getElementById('createButton').disabled = true;
   }else{
     
     var suggest =  document.getElementById("suggest")
     document.getElementById("checkN").innerHTML = "";
       suggest.innerHTML = '<br/><h6>Suggested SKU\'s</h6> <em  id="ssku1"><i class="fa fa-angle-double-right txt-primary m-r-10"></i> '+ name[0].toUpperCase()+name[last].toUpperCase() +' </em>'
     suggest.innerHTML += '<br/><em  id="ssku2"><i class="fa fa-angle-double-right txt-primary m-r-10"></i> '+ name[0].toUpperCase()+name[middle].toUpperCase() +' </em>'
         suggest.innerHTML += '<br/><em  id="ssku3"><i class="fa fa-angle-double-right txt-primary m-r-10"></i> '+ name[0].toUpperCase()+name[secondlast].toUpperCase() +' </em>'
    
    
       document.getElementById('createButton').disabled = false;
   }
   
   $('#ssku1').click(function(){
   $('#SKUP').val(name[0].toUpperCase()+name[last].toUpperCase());
   
   });
   
   $('#ssku2').click(function(){
   $('#SKUP').val(name[0].toUpperCase()+name[middle].toUpperCase());
   
   });
   
   $('#ssku3').click(function(){
   $('#SKUP').val(name[0].toUpperCase()+name[secondlast].toUpperCase());
   
   });
   
   });
   
   
   
   
   }
   
   function skuCheck(){
   
       var SKU = $("input[name=SKUP]").val();
   
       var settings = {
   "url": "https://backup.thriftops.com/Vendor2/api/nCheck.php?colmn=SK_Prefix&name="+SKU,
   "method": "POST",
   "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
   var check = parseInt(response);
   
   console.log(check)
   
   if(check == 0){
     
   
   document.getElementById("checkSK").innerHTML = "";
   document.getElementById("checkSK").innerHTML +=  '<em class="txt-danger">SKU <b>'+SKU+'</b> already exists please choose another one</em>';
   document.getElementById('createButton').disabled = true;
   }
   
   
   
   });
   }
   
   function viewVendor(value){
   
   
   
     $("#createButton").hide();
   
    $("#addNew").click();
    $("#target :input").prop("disabled", true);
   var settings = {
   "url": "https://backup.thriftops.com/Vendor2/api/viewVendor.php?id="+value,
   "method": "POST",
   "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
   
   jsonRES = JSON.parse(response)
   
   console.log(jsonRES);
   
   $("input[name=vid]").val(jsonRES[0].Vendor_ID)   
   $("input[name=name]").val(jsonRES[0].Name)   
     $("input[name=contact]").val(jsonRES[0].Contact)   
   $("input[name=email]").val(jsonRES[0].Email)   
    $("input[name=address]").val(jsonRES[0].Address)   
     $("select[name=Vtype]").val(jsonRES[0].Vtype)   
     $("select[name=type]").val(jsonRES[0].Type)   
     
        $("input[name=bTitle]").val(jsonRES[0].title)   
           $("input[name=bName]").val(jsonRES[0].bank_name)   
               $("input[name=bAccount]").val(jsonRES[0].account_no)   
                $("input[name=SKUP]").val(jsonRES[0].SK_Prefix)   
                  $("input[name=uname]").val(jsonRES[0].Username)   
                
     
   
   });
   }
   
   
   function editVendor(value){
    $("#updateButton").show();
   $("#createButton").hide();
    $("#addNew").click();
    $("#target :input").prop("disabled", false);
   var settings = {
   "url": "https://backup.thriftops.com/Vendor2/api/viewVendor.php?id="+value,
   "method": "POST",
   "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
   
   jsonRES = JSON.parse(response)
   
   console.log(jsonRES);
   $("input[name=vid]").val(jsonRES[0].Vendor_ID)   
   $("input[name=name]").val(jsonRES[0].Name)   
     $("input[name=contact]").val(jsonRES[0].Contact)   
   $("input[name=email]").val(jsonRES[0].Email)   
    $("input[name=address]").val(jsonRES[0].Address)   
     $("select[name=Vtype]").val(jsonRES[0].Vtype)   
     $("select[name=type]").val(jsonRES[0].Type)   
     
        $("input[name=bTitle]").val(jsonRES[0].title)   
           $("input[name=bName]").val(jsonRES[0].bank_name)   
               $("input[name=bAccount]").val(jsonRES[0].account_no)   
                $("input[name=SKUP]").val(jsonRES[0].SK_Prefix)   
                  $("input[name=uname]").val(jsonRES[0].Username)   
                
     
   
   });
   }
   
   
   function updateVendor(){
    var vid = $("input[name=vid]").val();
   
         var bName = $("input[name=bName]").val();
         var bTitle = $("input[name=bTitle]").val();
            var bAccount = $("input[name=bAccount]").val();
            
            
   
   var skup = $("input[name=SKUP]").val();
   var name = $("input[name=name]").val();
   var uname = $("input[name=uname]").val();
      var email = $("input[name=email]").val();
        var contact = $("input[name=contact]").val();
         var address = $("input[name=address]").val();
           var vtype = $("select[name=Vtype]").val();
        var warehouse = $("select[name=warehouse]").val();
          var fments = $("select[name=fments]").val();
          var type = $("select[name=type]").val();
            var percent = $("input[name=percent]").val();
   
   var form = new FormData();
   form.append("vname", name);
   form.append("vwareid", warehouse);
   form.append("vtype", vtype);
   form.append("vpercent", percent);
   form.append("vfments", fments);
   form.append("vvtype", vtype);
   form.append("vskpref", skup);
   form.append("uname", uname);
   form.append("uemail", email);
   form.append("ucontact", contact);
   form.append("uaddress", address);
   form.append("btitle", bTitle);
   form.append("bname", bName);
   form.append("bacc", bAccount);
   
   
   var settings = {
   "url": "https://backup.thriftops.com/Vendor2/api/editVendor.php?id="+vid,
   "method": "POST",
   "timeout": 0,
   "processData": false,
   "mimeType": "multipart/form-data",
   "contentType": false,
   "data": form
   };
   
   $.ajax(settings).done(function (response) {
   Swal.fire({
   position: 'top-center',
   icon: 'success',
   title: 'Vendor Updated Successfully',
   showConfirmButton: false,
   timer: 1500
   })
   typeAll();
   $("#modalclose1").click()
   
   });
   
   }
   
   
   var settings = {
   "url": "https://backup.thriftops.com/Vendor2/api/countTypes.php?type=Peer",
   "method": "POST",
   "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
   
   var JSONRES = JSON.parse(response)
   
   document.getElementById("totalPeer").innerText =  "Peers ("+JSONRES[0].total + ")"
   
   });
   
   
   var settings = {
   "url": "https://backup.thriftops.com/Vendor2/api/countTypes.php?type=Seller",
   "method": "POST",
   "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
   
   var JSONRES = JSON.parse(response)
   
   document.getElementById("totalSeller").innerText =  "Sellers ("+JSONRES[0].total + ")"
   
   });
   
   
   var settings = {
   "url": "https://backup.thriftops.com/Vendor2/api/countTypes.php?type=Supplier",
   "method": "POST",
   "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
   
   var JSONRES = JSON.parse(response)
   
   document.getElementById("totalSuppliers").innerText =  "Suppliers ("+JSONRES[0].total + ")"
   
   });
   
   
   
   
   
   
</script>
<script>
   $(document).ready(function($){
   var url = window.location.href;
   $('li a[href="'+url+'"]').addClass('active');
   });
</script>    
<!-- footer start-->
<?php include("../include/footer.php");?>
<?php  
session_Start();
include_once("../include/mysql_connection.php");
$cr=$_SESSION['id'];
// echo "<script>alert($cr);</script>";
?>
<!--  -->
<?php include ("../include/header.php"); ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>

<!-- Page Body Start-->

<!--<div class="page-body-wrapper horizontal-menu">-->
<!-- Page Sidebar Ends-->
<div class="page-body">
   <div class="container-fluid">
      <div class="page-header">
       <div class="row mt-3">
          <div class="col-md-6">
              <h3 class=" modal-title">All Products</h3>
                
               
            </div>
            <div class="col-md-6"> 
            <a href="javascript:void(0)" name="pick" id="addorder" class="btn btn-outline-danger m-l-15 f-right" data-bs-toggle="modal" data-bs-target="#barcodeModalCenter" data-bs-original-title="" title="" onclick="getFocus()"><i class="icofont icofont-qr-code" ></i> Add via QR Code</a>
             <a href="../Upload/new" name="pick" id="addorder" class="btn btn-primary-light m-l-15 f-right">Add New</a>
             
         </div>
         <div class='col-md-3 mt-3'>
    <select class='form-control form-select form-control-secondary f-left' id='location'>
      <option disabled selected value=''>Select Warhouse</option>";
            <?php 
            $records = mysqli_query($mysql, "SELECT * FROM `Warehouse`");                              
            while($data = mysqli_fetch_array($records))
            {
                echo "<option value='". $data['Warehouse_ID'] ."'>" .$data['Location'] ."</option>";
               
            
            }
              ?>              
        </select>
        </div>
         
        </div>
      
      </div>
   </div>
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="row project-cards">
         <div class="col-md-12 project-list">
           
         </div>
         <div class="col-sm-12">
            <div class="card">
               <div class="table-responsive">
                  
                <div class="">
       <div class="row" style="background-color:#F9FCFF;margin:0.8px;height:100px;">
                <div class="col-md-8 " style="margin-top:34px;">
              <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                      <li class="nav-item"><a class="nav-link active" id="all_ord" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true">All<span id="allc"></span></a></li>
                      <li class="nav-item"><a class="nav-link" id="pen_ord" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false">Active & Instock<span id="pendingc"></span></a></li>
                      <li class="nav-item"><a class="nav-link" id="conf_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Active & OOS<span id="confirmc"></span> </a></li>
                      <li class="nav-item"><a class="nav-link" id="can_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Draft & OOS<span id="cancelc"></span> </a></li>
                      <li class="nav-item"><a class="nav-link" id="hold_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Draft & Instock<span id="holdc"></span> </a></li>
                      

                  
                
                    </ul>
                </div>
                <div class="col-md-4 p-r-20" style="margin-top:30px;">
                    
             
                  <div class="bookmark">
                    <ul>
                            <li>
                                <select id="bulkstatus" class="form-select">
                                  <option value="" selected disabled>Bulk Action</option>
                                  <option value="dstatus">Adjust Status</option>
                                  <option value="dquantity">Adjust Quantity</option>
                                  <option value="dfetch">Fetch Status</option>
                                 
                                  
                            </select>
                            </li>
                        
                            <li><button class="dropbtn"><i class="icon-reload" id="ref"></i></button></li>

                            <li><div class="dropdown" >
                            <button class="dropbtn" onmouseover="JSDropDown()"><i class="fa fa-sliders"></i></button>
                            <div class="dropdown-content">
                            <a  style=" background-color: #e0e3ec; "><b>Show Rows</b></a>
                            
                             <select id="limit" class="form-control">
                                  <option>10</option>
                                  <option>20</option>
                                  <option>50</option>
                                  <option>100</option>
                                  <option>500</option>
                                  <option>All</option>
                            </select>
                            <a  style=" background-color: #e0e3ec; "><b>Sort By Order Date</b></a>
                             <select id="sort" class="form-control">
                                  <option>DESC</option>
                                  <option>ASC</option>
                           </select>
                          </div>
                        </div>
                        </li>
                            <li><button class="dropbtn"><i class="icon-import" id="excel" onclick="fnExcelReport();"></i></button></li>
                          
                            
                            
                    
                    </ul>
                   
                  </div>
                  
                </div>
              </div>
        <div class="dataTables_scrollHeadInner" style="box-sizing: content-box; width: 1787.12px; padding-right: 0px;">
        <table class="dataTable no-footer" role="grid" style="margin-left: 0px; width: 1787.12px;">
              <thead>
    
          <tr id="test" style="background-color:#E0E3EC;" role="row">
              <th class="res"></th>
              <th class="res">
            	<br>
            	 <input class="checkbox1" id="allcb" type="checkbox" >
            </th>
               <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >SKU
            	<br>
            	<input id="sku" type="text" >
            </th>
          <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Product
            	<br>
            	<input id="title" type="text" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Image
            	<br>
            <input id="city" type="text " style="visibility: hidden;" >
            </th>
            <th class="res" id="quantity" tabindex="0" aria-controls="example" rowspan="1" colspan="1">QTY&nbsp;<i class="fa fa-sort"></i>
            	<br>
            	<input id="tracking" type="text" style="visibility: hidden;"   >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Vendor 
            	<br>
            		<select class='form-control form-select form-control-secondary f-left' id='ven'>
                <option disabled selected value=''></option>";
            <?php 
            $records = mysqli_query($mysql, "SELECT * FROM `Vendor`");                              
            while($data = mysqli_fetch_array($records))
            {
                echo "<option value='". $data['Vendor_ID'] ."'>" .$data['Name'] ."</option>";
               
            
            }
              ?>              
        </select>
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Batch 
            	<br>
              	<select class='form-control form-select form-control-secondary f-left' name="lot" id="lot">
                   <option disabled selected value=''></option>";
            <?php 
            $records = mysqli_query($mysql, "SELECT Batch_ID FROM `SKU` GROUP BY Batch_ID DESC");                              
            while($data = mysqli_fetch_array($records))
            {
                echo "<option value='". $data['Batch_ID'] ."'>" .$data['Batch_ID'] ."</option>";
               
            
            }
              ?>              
        </select>
            </th>
             <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Location
             <br>
              <input id="number" type="text"  >
              </th>
             
              <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Status 
            	<br>
              <select class='form-control form-select form-control-secondary f-left' id='status'>
                  <option disabled selected value=''></option>";
                  <option value='active'>Active</option>";
                  <option value='draft'>Draft</option>";
                  <option value='archive'>Archive</option>";
                  </select>
            </th>
            <th class="res" id="date" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Date&nbsp;<i class="fa fa-sort"></i>
             <br>
              <input type="text" style="visibility: hidden;" >
              </th>
             <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"> 
            	<br>
              <input type="text" style="visibility: hidden;" >
            </th>
            <th></th>
            </tr>    
            </thead>
            </table>
            </div>
                </div>
                
                <div class="" id="dynamic_content">
        
          
            
      </div>
   </div>
    <!--Quantity modal--> 
                         <div class="modal fade bd-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="quantity_modal" role="dialog">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="" ><br>
                            <h4 class="modal-title1 text-center font-weight-bold">Adjust Quantity</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                                <div class="mb-3">
                                    <input class="form-control" type="number"  id="quanval"  name="removedby" aria-describedby="emailHelp">
                                </div>
                                <a href="#" data-role="conf_save" id="upquan" class="btn btn-md btn-primary ref mleft  f-right" style="padding: 6px 24px;">Save</a>
                                <button type="button" class="btn btn-outline-primary pull-right" id="modclear" data-bs-dismiss="modal">Close</button>
                                              
                          </div>
                        </div>
                      </div>
                    </div>
                         <!--Quantity modal-->
                         
                         
                          <!--Status modal--> 
                         <div class="modal fade bd-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="status_modal" role="dialog">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="" ><br>
                            <h4 class="modal-title1 text-center font-weight-bold">Adjust Status</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                                <div class="mb-3">
                                                <select class="form-control form-select form-control-success btn-square f-left drpdncss btn-square m-b-10" id="statval" required>
                                               <option value="" disabled selected >Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="draft">Draft</option>
                                                </select>
                                             </div>
                                              <a href="#" data-role="conf_save" id="upstat" class="btn btn-md btn-primary ref mleft  f-right" style="padding: 6px 24px;">Save</a>
                                              <button type="button" class="btn btn-outline-primary pull-right" id="modclear" data-bs-dismiss="modal">Close</button>
                                              
                          </div>
                        </div>
                      </div>
                    </div>
                         <!--Status modal-->
   
                      <!--Barcode modal--> 
                         <div class="modal fade" id="barcodeModalCenter" tabindex="-1" aria-labelledby="barcodeModalCenter" style="display: none;" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="" ><br>
                            <h4 class="modal-title1 text-center font-weight-bold">Scan QR Code</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                                <div class="mb-3">
                                    <img src="barcode-scan.gif" class=" " id="qrcodeimage" > 
                                               <input class="form-control" type="text" name="barcode" id="barcode" aria-describedby="barcode" onkeyup="searchBarcode()" placeholder="Enter QR Code" style="opacity:0;" >
                                                
                                             </div>
                                              <!--<a href="#" data-role="conf_save" id="upstat" class="btn btn-md btn-primary ref mleft  f-right" style="padding: 6px 24px;">Search</a>-->
                                              <!--<button type="button" class="btn btn-outline-primary pull-right" id="modclear" onclick="ResetBarcode()" data-bs-dismiss="modal">NEW </button>-->
                                              
                          </div>
                        </div>
                      </div>
                    </div>
                         <!--Barcode modal-->
   
</div>
<script>
    function getFocus() {
   document.getElementById('barcode').value='';
  
   setTimeout(function() { 
     var input  =  document.getElementById("barcode").focus();
  
    }, 1000);
   
  
}
</script>
<script>

function JSDropDown() {
            var x = document.getElementById("limit").options.length;
            document.getElementById("limit").size = x;
            
            var y = document.getElementById("sort").options.length;
            document.getElementById("sort").size = y;
            
        }

   $(document).ready(function(){
    $(document).on('click', '#location', function()
    { 
        var location1 = document.getElementById("location").value;
        setInterval(function () 
         {
            
            
            
            
        //         $.ajax({
        //             url:"count.php",
        //             method:"POST",
                 
        //              success:function(response)
        //              {
        //                 var test=JSON.parse(response);
        //                 var pending=test[0];
        //                 var confirm=test[1];
        //                 var cancel=test[2];
        //                 var hold=test[3];
        //                 var all=test[4];
                        
        //                 $('#pendingc').html('('+pending+')');
        //                 $('#confirmc').html('('+confirm+')');
        //                 $('#cancelc').html('('+cancel+')');
        //                 $('#holdc').html('('+hold+')');
        //                 $('#allc').html('('+all+')');
                        
        //              }
        //   });
            
                    
               
                
             
         }, 5000);    
        $(document).on('click', '#allcb', function()
        {
    		$('[name="check[]"]').prop('checked', this.checked);
    	});
        var cond="all";
        load_data(1,'10','','','','',cond,location1);
         
       
         function load_data(page, limit, sort, status, vendor, lot, cond, location)
         {
           $.ajax({
             url:"fetch.php",
             method:"POST",
             data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location},
             success:function(data)
             {
               $('#dynamic_content').html(data);
             }
           });
         }
         
       
         
        $(document).on('click', '#ref', function()
        {
                                    
            toastr.info('Refreshed');
            //search 
            var items = $('#items').val("");
            from=document.getElementById("fromdate").value='';
            var drop=$("#bulkstatus").val("");
            to=document.getElementById("todate").value='';
            var limit=document.getElementById("limit").value='10';
            var sort=document.getElementById("sort").value='DESC';
            $('input[id=allcb]').trigger('click'); 
            var cond="all";
            load_data(1,'10','','','','',location1,cond);
        });
        
        $(document).on('click', '.page-link', function()
        {

            var location = document.getElementById("location").value;
            var vendor = document.getElementById("ven").value;
            var lot = document.getElementById("lot").value;
            var limit=document.getElementById("limit").value;
            var sort=document.getElementById("sort").value;
            var status = document.getElementById("status").value;
            var page = $(this).data('page_number');
                      
            //condition
            //all
            $(document).on('click', '#all_ord', function()
            {
                cond='all';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //activein
            $(document).on('click', '#pen_ord', function()
            {
                cond='activein';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //activeout
            $(document).on('click', '#conf_ord', function()
            {
                cond='activeout';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //draftin
            $(document).on('click', '#can_ord', function()
            {
                cond='draftout';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //draftout
            $(document).on('click', '#hold_ord', function()
            {
                cond='draftin';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //for default page load 
            load_data(page,limit,sort,status,vendor,lot,cond,location);
                 
        });
                    
                    
        //items
        $('#sku').keyup(function(){
            var location = document.getElementById("location").value;
            var vendor = document.getElementById("ven").value;
            var lot = document.getElementById("lot").value;
            var limit=document.getElementById("limit").value;
            var sort=document.getElementById("sort").value;
            var status = document.getElementById("status").value;
            var page = $(this).data('page_number');
            var sku=document.getElementById("sku").value;
            $.ajax({
                        url:"fetch.php",
                        method:"POST",
                        data:{sku:sku,location:location},
                        success:function(data)
                        {
                          $('#dynamic_content').html(data);
                          
                          
                        }
            });    
            if(sku == '')
            {
                cond='all';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            }
                     
                      
                  
        });
        
        //title
        $('#title').keyup(function(){
            var location = document.getElementById("location").value;
            var vendor = document.getElementById("ven").value;
            var lot = document.getElementById("lot").value;
            var limit=document.getElementById("limit").value;
            var sort=document.getElementById("sort").value;
            var status = document.getElementById("status").value;
            var page = $(this).data('page_number');
            var title=document.getElementById("title").value;
            $.ajax({
                        url:"fetch.php",
                        method:"POST",
                        data:{title:title},
                        success:function(data)
                        {
                          $('#dynamic_content').html(data);
                          
                          
                        }
                          
             });      
            if(title=='')
            {
                cond='all';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            }
                     
                      
            
                    
        });             
                    
        //location name
        // $('#lname').keyup(function(){
                    //   //search 
                    //   var name = $('#lname').val();
                    //   var location = document.getElementById("location").value;
                    //   var cat = document.getElementById("cat").value;
                    //   //others
                    //   from=document.getElementById("fromdate").value;
                    //   to=document.getElementById("todate").value;
                    //   var limit=document.getElementById("limit").value;
                    //   var sort=document.getElementById("sort").value;
                    //   var page = $(this).data('page_number');
                      
                    //   $.ajax({
                    //     url:"transeferfetch.php",
                    //     method:"POST",
                    //     data:{location:location, cond:cond , name:name},
                    //     success:function(data)
                    //     {
                    //       $('#dynamic_content').html(data);
                          
                          
                    //     }
                    //   });
                      
                    //   if(name=='')
                    //   {
                    //       load_data(page,limit,sort,from,to,items,location,'all');
                    //   }
                      
                      
                      
                    // });
                    
               
                    
                
        //limit 
        $(document).on('click', '#limit', function()
        {
            var location = document.getElementById("location").value;
            var vendor = document.getElementById("ven").value;
            var lot = document.getElementById("lot").value;
            var limit=document.getElementById("limit").value;
            var sort=document.getElementById("sort").value;
            var status = document.getElementById("status").value;
            var page = $(this).data('page_number');
                      
            //condition
            //all
            $(document).on('click', '#all_ord', function()
            {
                cond='all';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //activein
            $(document).on('click', '#pen_ord', function()
            {
                cond='activein';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //activeout
            $(document).on('click', '#conf_ord', function()
            {
                cond='activeout';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //draftin
            $(document).on('click', '#can_ord', function()
            {
                cond='draftout';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //draftout
            $(document).on('click', '#hold_ord', function()
            {
                cond='draftin';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //for default page load 
            load_data(page,limit,sort,status,vendor,lot,cond,location);
        });
            
        //sort 
        $(document).on('click', '#sort', function(){
            var location = document.getElementById("location").value;
            var vendor = document.getElementById("ven").value;
            var lot = document.getElementById("lot").value;
            var limit=document.getElementById("limit").value;
            var sort=document.getElementById("sort").value;
            var status = document.getElementById("status").value;
            var page = $(this).data('page_number');
                      
            //condition
            //all
            $(document).on('click', '#all_ord', function()
            {
                cond='all';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //activein
            $(document).on('click', '#pen_ord', function()
            {
                cond='activein';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //activeout
            $(document).on('click', '#conf_ord', function()
            {
                cond='activeout';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //draftin
            $(document).on('click', '#can_ord', function()
            {
                cond='draftout';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //draftout
            $(document).on('click', '#hold_ord', function()
            {
                cond='draftin';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //for default page load 
            load_data(page,limit,sort,status,vendor,lot,cond,location);
        });
            
              
        $(document).on('click', '#ven', function()
        {
            var location = document.getElementById("location").value;
            var vendor = document.getElementById("ven").value;
            var lot = document.getElementById("lot").value;
            var limit=document.getElementById("limit").value;
            var sort=document.getElementById("sort").value;
            var status = document.getElementById("status").value;
            var page = $(this).data('page_number');
                      
            //condition
            //all
            $(document).on('click', '#all_ord', function()
            {
                cond='all';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //activein
            $(document).on('click', '#pen_ord', function()
            {
                cond='activein';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //activeout
            $(document).on('click', '#conf_ord', function()
            {
                cond='activeout';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //draftin
            $(document).on('click', '#can_ord', function()
            {
                cond='draftout';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //draftout
            $(document).on('click', '#hold_ord', function()
            {
                cond='draftin';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //for default page load 
            load_data(page,limit,sort,status,vendor,lot,cond,location);
        }); 
        
        $(document).on('click', '#lot', function()
        {
            var location = document.getElementById("location").value;
            var vendor = document.getElementById("ven").value;
            var lot = document.getElementById("lot").value;
            var limit=document.getElementById("limit").value;
            var sort=document.getElementById("sort").value;
            var status = document.getElementById("status").value;
            var page = $(this).data('page_number');
                      
            //condition
            //all
            $(document).on('click', '#all_ord', function()
            {
                cond='all';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //activein
            $(document).on('click', '#pen_ord', function()
            {
                cond='activein';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //activeout
            $(document).on('click', '#conf_ord', function()
            {
                cond='activeout';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //draftin
            $(document).on('click', '#can_ord', function()
            {
                cond='draftout';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //draftout
            $(document).on('click', '#hold_ord', function()
            {
                cond='draftin';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //for default page load 
            load_data(page,limit,sort,status,vendor,lot,cond,location);
        });
        
        $(document).on('click', '#status', function()
        {
            var location = document.getElementById("location").value;
            var vendor = document.getElementById("ven").value;
            var lot = document.getElementById("lot").value;
            var limit=document.getElementById("limit").value;
            var sort=document.getElementById("sort").value;
            var status = document.getElementById("status").value;
            var page = $(this).data('page_number');
                      
            //condition
            //all
            $(document).on('click', '#all_ord', function()
            {
                cond='all';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //activein
            $(document).on('click', '#pen_ord', function()
            {
                cond='activein';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //activeout
            $(document).on('click', '#conf_ord', function()
            {
                cond='activeout';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //draftin
            $(document).on('click', '#can_ord', function()
            {
                cond='draftout';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //draftout
            $(document).on('click', '#hold_ord', function()
            {
                cond='draftin';
                load_data(page,limit,sort,status,vendor,lot,cond,location);
            });
            //for default page load 
            load_data(page,limit,sort,status,vendor,lot,cond,location);
        });
        
     
        //quantity
        var count;
        $(document).on('click', '#quantity', function()
        {
            var location = document.getElementById("location").value;
            var vendor = document.getElementById("ven").value;
            var lot = document.getElementById("lot").value;
            var limit=document.getElementById("limit").value;
            var sort=document.getElementById("sort").value;
            var status = document.getElementById("status").value;
            var page = $(this).data('page_number');
            if(count=='')
            {
                var two="Quantity ASC";
                
                          
                //condition
                //all
                $(document).on('click', '#all_ord', function()
                {
                    cond='all';
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,two:two},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                });
                //activein
                $(document).on('click', '#pen_ord', function()
                {
                    cond='activein';
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,two:two},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                });
                //activeout
                $(document).on('click', '#conf_ord', function()
                {
                    cond='activeout';
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,two:two},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                });
                //draftin
                $(document).on('click', '#can_ord', function()
                {
                    cond='draftout';
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,two:two},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                });
                //draftout
                $(document).on('click', '#hold_ord', function()
                {
                    cond='draftin';
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,two:two},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                });
                //for default page load 
                // cond='all';
                // $.ajax({
                //      url:"fetch.php",
                //      method:"POST",
                //      data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,two:two},
                //      success:function(data)
                //      {
                //       $('#dynamic_content').html(data);
                //      }
                //     });
                    count++;
            }
            
            else if(count=>1)
            {
                var two="Quantity DESC";
                
                          
                //condition
                //all
                $(document).on('click', '#all_ord', function()
                {
                    cond='all';
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,two:two},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                });
                //activein
                $(document).on('click', '#pen_ord', function()
                {
                    cond='activein';
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,two:two},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                });
                //activeout
                $(document).on('click', '#conf_ord', function()
                {
                    cond='activeout';
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,two:two},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                });
                //draftin
                $(document).on('click', '#can_ord', function()
                {
                    cond='draftout';
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,two:two},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                });
                //draftout
                $(document).on('click', '#hold_ord', function()
                {
                    cond='draftin';
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,two:two},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                });
                // for default page load 
                // cond='all';
                // $.ajax({
                //      url:"fetch.php",
                //      method:"POST",
                //      data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,two:two},
                //      success:function(data)
                //      {
                //       $('#dynamic_content').html(data);
                //      }
                //     });
                count=0;
            }
        });
        
         //date
        var count1;
        $(document).on('click', '#date', function()
        {
            var location = document.getElementById("location").value;
            var vendor = document.getElementById("ven").value;
            var lot = document.getElementById("lot").value;
            var limit=document.getElementById("limit").value;
            var sort=document.getElementById("sort").value;
            var status = document.getElementById("status").value;
            var page = $(this).data('page_number');
            if(count1=='')
            {
                var date="DateTime ASC";
                
                          
                //condition
                //all
                $(document).on('click', '#all_ord', function()
                {
                    cond='all';
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,date:date},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                });
                //activein
                $(document).on('click', '#pen_ord', function()
                {
                    cond='activein';
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,date:date},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                });
                //activeout
                $(document).on('click', '#conf_ord', function()
                {
                    cond='activeout';
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,date:date},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                });
                //draftin
                $(document).on('click', '#can_ord', function()
                {
                    cond='draftout';
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,date:date},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                });
                //draftout
                $(document).on('click', '#hold_ord', function()
                {
                    cond='draftin';
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,date:date},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                });
                //for default page load 
                // cond='all';
                // $.ajax({
                //      url:"fetch.php",
                //      method:"POST",
                //      data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,date:date},
                //      success:function(data)
                //      {
                //       $('#dynamic_content').html(data);
                //      }
                //     });
                    count1++;
            }
            
            else if(count1=>1)
            {
                var date="DateTime DESC";
                
                          
                //condition
                //all
                $(document).on('click', '#all_ord', function()
                {
                    cond='all';
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,date:date},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                });
                //activein
                $(document).on('click', '#pen_ord', function()
                {
                    cond='activein';
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,date:date},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                });
                //activeout
                $(document).on('click', '#conf_ord', function()
                {
                    cond='activeout';
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,date:date},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                });
                //draftin
                $(document).on('click', '#can_ord', function()
                {
                    cond='draftout';
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,date:date},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                });
                //draftout
                $(document).on('click', '#hold_ord', function()
                {
                    cond='draftin';
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,date:date},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                });
                // for default page load 
                // cond='all';
                // $.ajax({
                //      url:"fetch.php",
                //      method:"POST",
                //      data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,date:date},
                //      success:function(data)
                //      {
                //       $('#dynamic_content').html(data);
                //      }
                //     });
                count1=0;
            }
        });
        

        
        
        //condition
        //all
        $(document).on('click', '#all_ord', function()
        {
            cond='all';
            var location = document.getElementById("location").value;
            var vendor = document.getElementById("ven").value;
            var lot = document.getElementById("lot").value;
            var limit=document.getElementById("limit").value;
            var sort=document.getElementById("sort").value;
            var status = document.getElementById("status").value;
            var page = $(this).data('page_number');
            
            $(document).on('click', '#quantity', function()
            {
                 if(count=='')
                {
                    var two="Quantity ASC";
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,two:two},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                    
                }
                else if(count=>1)
                {
                    var two="Quantity DESC";
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,two:two},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });

                }
            });
            load_data(page,limit,sort,status,vendor,lot,cond,location);
        });
        //activein
        $(document).on('click', '#pen_ord', function(){
            cond='activein';
            var location = document.getElementById("location").value;
            var vendor = document.getElementById("ven").value;
            var lot = document.getElementById("lot").value;
            var limit=document.getElementById("limit").value;
            var sort=document.getElementById("sort").value;
            var status = document.getElementById("status").value;
            var page = $(this).data('page_number');
            $(document).on('click', '#quantity', function()
            {
                 if(count=='')
                {
                    var two="Quantity ASC";
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,two:two},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                    
                }
                else if(count=>1)
                {
                    var two="Quantity DESC";
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,two:two},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });

                }
            });
             $(document).on('click', '#date', function()
            {
                 if(count1=='')
                {
                    var date="DateTime ASC";
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,date:date},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                    
                }
                else if(count=>1)
                {
                    var date="DateTime DESC";
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,date:date},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });

                }
            });
            load_data(page,limit,sort,status,vendor,lot,cond,location);
                      
        });
        
        //activeout
        $(document).on('click', '#conf_ord', function(){
            cond='activeout';
            var location = document.getElementById("location").value;
            var vendor = document.getElementById("ven").value;
            var lot = document.getElementById("lot").value;
            var limit=document.getElementById("limit").value;
            var sort=document.getElementById("sort").value;
            var status = document.getElementById("status").value;
            var page = $(this).data('page_number');
            $(document).on('click', '#quantity', function()
            {
                 if(count=='')
                {
                    var two="Quantity ASC";
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,two:two},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                    
                }
                else if(count=>1)
                {
                    var two="Quantity DESC";
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,two:two},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });

                }
            });
             $(document).on('click', '#date', function()
            {
                 if(count1=='')
                {
                    var date="DateTime ASC";
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,date:date},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                    
                }
                else if(count=>1)
                {
                    var date="DateTime DESC";
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,date:date},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });

                }
            });
            load_data(page,limit,sort,status,vendor,lot,cond,location);
        });
        //draftin
        $(document).on('click', '#can_ord', function(){
            cond='draftout';
            var location = document.getElementById("location").value;
            var vendor = document.getElementById("ven").value;
            var lot = document.getElementById("lot").value;
            var limit=document.getElementById("limit").value;
            var sort=document.getElementById("sort").value;
            var status = document.getElementById("status").value;
            var page = $(this).data('page_number');
            $(document).on('click', '#quantity', function()
            {
                 if(count=='')
                {
                    var two="Quantity ASC";
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,two:two},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                    
                }
                else if(count=>1)
                {
                    var two="Quantity DESC";
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,two:two},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });

                }
            });
             $(document).on('click', '#date', function()
            {
                 if(count1=='')
                {
                    var date="DateTime ASC";
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,date:date},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                    
                }
                else if(count=>1)
                {
                    var date="DateTime DESC";
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,date:date},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });

                }
            });
            load_data(page,limit,sort,status,vendor,lot,cond,location);
        });
        //draftout
        $(document).on('click', '#hold_ord', function(){
            cond='draftin';
            
            var location = document.getElementById("location").value;
            var vendor = document.getElementById("ven").value;
            var lot = document.getElementById("lot").value;
            var limit=document.getElementById("limit").value;
            var sort=document.getElementById("sort").value;
            var status = document.getElementById("status").value;
            var page = $(this).data('page_number');
            $(document).on('click', '#quantity', function()
            {
                 if(count=='')
                {
                    var two="Quantity ASC";
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,two:two},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                    
                }
                else if(count=>1)
                {
                    var two="Quantity DESC";
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,two:two},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });

                }
            });
             $(document).on('click', '#date', function()
            {
                 if(count1=='')
                {
                    var date="DateTime ASC";
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,date:date},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });
                    
                }
                else if(count=>1)
                {
                    var date="DateTime DESC";
                    $.ajax({
                     url:"fetch.php",
                     method:"POST",
                     data:{page:page, limit:limit, sort:sort, status:status, vendor:vendor, lot:lot, cond:cond, location:location ,date:date},
                     success:function(data)
                     {
                      $('#dynamic_content').html(data);
                     }
                    });

                }
            });
            load_data(page,limit,sort,status,vendor,lot,cond,location);
        });
        
        //single mark
        //rebook
         $(document).on('change', '#mark', function(e)
        {
             e.stopImmediatePropagation();
           var $ele = $(this).parent().parent();
            var id = $(this).attr('name');
            var skdu=$(this).attr('sku');
            var currentRow = $(this).closest("td");
            var option = currentRow.find("#mark").val();
            var war = document.getElementById("location").value;
            
        
          if(option == 'Cstatus')
            {
                $('#status_modal').modal('toggle');
                $('#upstat').click(function() 
                {
                    var stat=document.getElementById("statval").value;
                    
                     $.ajax({
                         url:"supda.php",
                         method:"POST",
                         data:{
                             id:id,
                             stat:stat,
                             war:war
                         },
                         success:function(data)
                         {
                            if(data == 1)
                            {
                                toastr.success('Updated Successfully!');
                                $ele.fadeOut(900,function(){
                                $(this).remove();
                                });
                                var cond="all";
                                load_data(1,'10','','','','',cond,war);
                                $('#status_modal').modal('hide');
                            }
                            if(data == 0)
                            {
                                $('#status_modal').modal('hide');
                                load_data(1);
                                toastr.error('There might be some error!');
                            }
                            
                            if(data == 2)
                            {
                                $('#status_modal').modal('hide');
                                load_data(1);
                                toastr.warning('Please Check The Fields Before Booking!');
                            }
                         }
                             });
                });
                
            currentRow.find("#mark").val('');
            }
          if(option =='Adjust')
          {
                $('#quantity_modal').modal('toggle');
                $('#upquan').click(function() 
                {
                    var quan=document.getElementById("quanval").value
                    console.log(id);
                     $.ajax({
                         url:"squan.php",
                         method:"POST",
                          data:{
                             id:id,
                             quan:quan,
                             war:war
                         },
                         success:function(data)
                         {
                            if(data == 1)
                            {
                                toastr.success('Updated Successfully!');
                                $ele.fadeOut(900,function(){
                                $(this).remove();
                                });
                                var cond="all";
                                load_data(1,'10','','','','',cond,war);   
                                $('#quantity_modal').modal('hide');
                            }
                            if(data == 0)
                            {
                                $('#quantity_modal').modal('hide');
                                load_data(1);
                                toastr.error('There might be some error!');
                            }
                            
                            // if(data == 2)
                            // {
                            //     $('#status_modal').modal('hide');
                            //     load_data(1);
                            //     toastr.warning('Please Check The Fields Before Booking!');
                            // }
                         }
                             });
                });
                
            currentRow.find("#mark").val('');
            }
          if(option =='View')
          {
            href='../ShopifyPush/viewProduct.php?GETID='+skdu;
            window.open(href);
            currentRow.find("#mark").val('');
          }
          if(option =='Edit')
          {
            href='../Upload/Edit.php?SKU='+skdu;
            window.open(href);
            currentRow.find("#mark").val('');
          }
          if(option =='Sfetch')
          {
            $.ajax({
                         url:"sfetch.php",
                         method:"POST",
                          data:{
                             id:id,
                             war:war
                         },
                         success:function(data)
                         {
                            if(data == 1)
                            {
                                toastr.success('Updated Successfully!');
                                $ele.fadeOut(900,function(){
                                $(this).remove();
                                });
                                var cond="all";
                                load_data(1,'10','','','','',cond,war);   
                                $('#quantity_modal').modal('hide');
                            }
                            if(data == 0)
                            {
                                $('#quantity_modal').modal('hide');
                                load_data(1);
                                toastr.error('There might be some error!');
                            }
                            
                         }
                    });
            
                
            currentRow.find("#mark").val('');
          }
         
          
        });
                  
      //bulk mark
      $(document).on('change', '#bulkstatus', function(e)
        {
             e.stopImmediatePropagation();
            var option = document.getElementById("bulkstatus").value;
            var war = document.getElementById("location").value;
            var id = [];
            $(':checkbox:checked').each(function(i){
                id[i] = $(this).val();
            });
            if(option =='dstatus')
            {
                $('#status_modal').modal('toggle');
                $('#upstat').click(function() 
                {
                    var stat=document.getElementById("statval").value;       
                    if(id.length === 0) //tell you if the array is empty
                    {
                        toastr.error("Please Select at least one Entry");
                    }
                    else
                    {
                        $.ajax({
                            url:'bupda.php',
                            method:'POST',
                            data:{id:id, stat:stat, war:war},
                            success:function()
                            {
                                for(var i=0; i<id.length; i++)
                                {
                                    $('tr#'+id[i]+'').css('background-color', '#ccc');
                                    $('tr#'+id[i]+'').fadeOut('slow');
                                       
                                }
                                toastr.success('Marked Successfully');
                                 var drop=document.getElementById("bulkstatus").value='';
                                var cond="all";
                                $('#status_modal').modal('hide');
                                load_data(1,'10','','','','',war,cond);
                            }
                     
                        });
                    }
                });
             
                
            }
            if(option =='dquantity')
            {
                $('#quantity_modal').modal('toggle');
                 $('#upquan').click(function() 
                {
                    var quan=document.getElementById("quanval").value;
                    if(id.length === 0) //tell you if the array is empty
                    {
                        toastr.error("Please Select at least one Entry");
                    }
                    else
                    {
                        $.ajax({
                            url:'bquan.php',
                            method:'POST',
                            data:{id:id, quan:quan, war:war},
                            success:function()
                            {
                                for(var i=0; i<id.length; i++)
                                {
                                    $('tr#'+id[i]+'').css('background-color', '#ccc');
                                    $('tr#'+id[i]+'').fadeOut('slow');
                                       
                                }
                                toastr.success('Marked Successfully');
                                var cond="all";
                                 var drop=document.getElementById("bulkstatus").value='';
                                $('#quantity_modal').modal('hide');
                                load_data(1,'10','','','','',war,cond);
                            }
                     
                        });
                    }
                });
            }
            if(option =='dfetch')
            {
               
                if(id.length === 0) //tell you if the array is empty
                {
                    toastr.error("Please Select at least one Entry");
                }
                else
                {
                        $.ajax({
                            url:'bfetch.php',
                            method:'POST',
                            data:{id:id, war:war},
                            success:function()
                            {
                                for(var i=0; i<id.length; i++)
                                {
                                    $('tr#'+id[i]+'').css('background-color', '#ccc');
                                    $('tr#'+id[i]+'').fadeOut('slow');
                                       
                                }
                                toastr.success('Updated Successfully');
                                var cond="all";
                                var drop=document.getElementById("bulkstatus").value='';
                                load_data(1,'10','','','','',war,cond);
                            }
                     
                        });
                    }
                
            }
           
            
           
        });
    
    });
      
      

    

    
  });
  
 //export excel
function fnExcelReport()
{
    
    var tab_text="<table border='2px'><tr bgcolor='#878780'>  <th>Order</th><th>Customer</th><th>City</th><th>Items</th><th>Amount</th><th>Status</th><th>Date</th></tr>";
    var textRange; var j=0;
    tab = document.getElementById('allproduct'); // id of table
    
    
    

    for(j = 0 ; j < tab.rows.length ; j++) 
    {   
        console.log();
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params
    tab_text= tab_text.replace(/<select[^>]*>|<\/select>/gi, ""); // reomves select params
    tab_text= tab_text.replace(/Confirm Hold Cancel/gi, ""); // reomves select params
    
    // tab_text= tab_text.replace(/Confirm/gi,"");
    // tab_text= tab_text.replace(/Hold/gi,"");
    // tab_text= tab_text.replace(/Cancel/gi,"");
     

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

  
</script>


<script>

const searchBarcode = () =>{
    
    var Barcode = $('#barcode').val()
    //alert(Barcode)
    
   
    // window.location.href = 'newPage.html';
    
  document.location =("../ShopifyPush/addProductBarcode.php?id="+Barcode);
  
//   setTimeout(() => window.location.reload(), 1000);
     
         
    
    
}





 </script>

<?php include ("../include/footer.php"); ?>

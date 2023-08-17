<?php  
session_Start();
?>
<?php include ("../include/header.php"); ?>
<?php include_once("../include/mysql_connection.php");  ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>

<!-- Page Body Start-->

<!--<div class="page-body-wrapper horizontal-menu">-->
<!-- Page Sidebar Ends-->
<div class="page-body">
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
          <div class="col-md-4">
              <h3 class=" modal-title"> All Bookings</h3>
               
            </div>
            <div class="col-md-4 mt-3">
             <a href="#"  name="pick"  id="addorder" class="btn btn-primary-light m-l-15 f-right" >New Booking</a>
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
                <div class="col-md-9 " style="margin-top:34px;">
              <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                      <li class="nav-item"><a class="nav-link active" id="all_ord" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true">All<span id="allb"></span></a></li>
                      <li class="nav-item"><a class="nav-link" id="conf_ord" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false">Unbooked<span id="unbookedb"></span></a></li>
                      <li class="nav-item"><a class="nav-link" id="dis_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Dispatched <span id="dispatchedb"></span> </a></li>
                      <li class="nav-item"><a class="nav-link" id="ins_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">InTransit<span id="intransitb"></span> </a></li>
                      <li class="nav-item"><a class="nav-link" id="del_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Delivered<span id="deliveredb"></span> </a></li>
                      <li class="nav-item"><a class="nav-link" id="ret_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Returned<span id="returnedb"></span></a></li>
                      <li class="nav-item"><a class="nav-link" id="loss_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Conflict/Lost<span id="lostb"></span></a></li>
                      <li class="nav-item"><a class="nav-link" id="book_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Booked<span id="bookb"></span></a></li>

                  
                
                    </ul>
                </div>
                <div class="col-md-3 p-r-20" style="margin-top:30px;">
                    
             
                  <div class="bookmark">
                    <ul>
           
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
          <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Order#
            	<br>
            	<input id="ordernum" type="text" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Customer
            	<br>
            	<input id="customer" type="text">
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">City
            	<br>
            	<input id="city" type="text" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Item(s)
            	<br>
            	<input id="items" type="text" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Amount
            	<br>
            	<input id="amount" type="text" >
            </th>
             <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Tracking 
            	<br>
            	<input id="tracking" type="text" >
            </th>
             <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Courier
            	<br>
            	<select class="form" id="courier">
                    <option disabled selected></option>
                    <option value="PostEx">PostEx</option>
                    <option value="Tcs">TCS</option>
                    <option value="Leopard">Leopard</option>
                    <option value="Call Courier">Call Courier</option>
                    <option value="Trax">Trax</option>
                    <option value="Rider">Rider</option>
                    <option value="Self">Self Deliver</option>
                </select>
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Status
            	<br>
            	<input type="text" style="visibility: hidden;">
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Date
            	<br>
            	<input type="text"  style="visibility: hidden;" >
            </th>
             <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">
            	<br>
            	<input type="text" style="visibility: hidden;">
            </th>
            </tr>    
            </thead>
            </table>
            </div>
                </div>
                
                <div class="table-responsive" id="dynamic_content"></div>
                <!--book-->
                <div id="Book" class="modal fade" role="dialog">
                   <div class="modal-dialog modal-lg modal-dialog-centered cstm-pop">
                     <div class="modal-content">
                       <div class="modal-header p-t-20">
                             <div class="col-md-8 p-l-15">
                          <h3 class="modal-title">Order Booking</h3>
                          </div>
                          <div class="col-md-4 p-l-30 p-r-40">
                              <select class="form-control form-select form-control-success btn-square f-left drpdncss btn-square m-b-10" id="courierstat" required>
                               <option value="" disabled selected >Select Courier</option>
                                <option value="PostEx">PostEx</option>
                                <option value="Tcs">TCS</option>
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
                            <div id="dynamic_content1"></div>
                        <br>
                      
                       <div class="modal-footer">
                         <button type="button" class="btn btn-outline-primary pull-left" id="modclear" data-bs-dismiss="modal">Close</button>
                         <a href="#" data-role="conf_save" id="func" class="btn btn-md btn-primary ref  f-right" style="padding: 6px 24px;" disabled>Create</a>
                       </div>
                     </div>
                   
      </div>
   </div>
   
         </div>
                <!--book-->
                
                
                <!--update tracking-->
                <div id="Update" class="modal fade" role="dialog">
                   <div class="modal-dialog modal-lg modal-dialog-centered cstm-pop">
                     <div class="modal-content">
                       <div class="modal-header p-t-20">
                             <div class="col-md-8 p-l-15">
                          <h3 class="modal-title">Update Booking</h3>
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
                           <label class="col-md-2">Courier</label>
                            <div class="col-md-4 p-l-30 p-r-40">
                              <select class="form-control form-select form-control-success btn-square f-left drpdncss btn-square m-b-10" id="co_name" required>
                               <option value="" disabled selected >Select Courier</option>
                                <option value="PostEx">PostEx</option>
                                <option value="Leopard">Leopard</option>
                                <option value="Trax">Trax</option>
                                <option value="Rider">Rider</option>
                                <option value="CallCourier">Call Courier</option>
                                 <option value="Self">Self Deliver</option>
                                </select>
                          </div>
                          
                          <label class="col-md-2">Tracking Number</label>
                            <div class="col-md-4 p-l-30 p-r-40"> 
                            <input class="form-control" type="text" name="track" id="track" required> 
                            </div>
                          
                        <br>
                      
                       <div class="modal-footer">
                         <button type="button" class="btn btn-outline-primary pull-left" id="modclear" data-bs-dismiss="modal">Close</button>
                         <a href="#" data-role="conf_save" id="upd" class="btn btn-md btn-primary ref  f-right" style="padding: 6px 24px;" disabled>Update</a>
                       </div>
                     </div>
                   
      </div>
   </div>
   
         </div>
                <!--update tracking-->
                
               <!--new book-->
                <div id="Newbook" class="modal fade" role="dialog">
                   <div class="modal-dialog modal-lg modal-dialog-centered cstm-pop">
                     <div class="modal-content">
                       <div class="modal-header p-t-20">
                             <div class="col-md-8 p-l-15">
                          <h3 class="modal-title">Create a Booking</h3>
                          </div>
                          <div class="col-md-4 p-l-30 p-r-40">
                              <select class="form-control form-select form-control-success btn-square f-left drpdncss btn-square m-b-10" id="courstat" required>
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
                            <div>
                                <div class="col-sm-12 row p-4">
                                             <div class="mb-3 col-sm-6">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Customer Name</label>
                                                <input class="form-control" type="text" name="bTitle" id="cuname" aria-describedby="emailHelp">
                                             </div>
                                              <div class="mb-3 col-sm-6">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Order Reference Number</label>
                                                <input class="form-control" type="text" name="bName" id="ornum" aria-describedby="emailHelp">
                                             </div>
                                  <div class="mb-3 col-sm-6">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Customer Phone</label>
                                                <input class="form-control" type="text" name="bTitle" id="cucontact" aria-describedby="emailHelp">
                                             </div>
                                              <div class="mb-3 col-sm-6">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Invoice Payment</label>
                                                <input class="form-control" type="text" name="bName" id="ctotal" aria-describedby="emailHelp">
                                             </div>            
                                                <div class="mb-3 col-sm-6">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">City</label>
                                                <input class="form-control" type="text" name="bTitle" id="cucity" aria-describedby="emailHelp">
                                             </div>
                                              <div class="mb-3 col-sm-6">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Weight</label>
                                                <input class="form-control" type="text" name="bName" id="cweight" aria-describedby="emailHelp" placeholder="Enter Weight">
                                             </div>
                                              <div class="mb-3 col-sm-12">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">SKU</label>
                                                <input class="form-control" type="text" name="conitems" id="coitems" aria-describedby="emailHelp">
                                             </div>
                                             
                                             <div class="mb-3 col-sm-6">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Courier City</label>
                                                <select class="form-control" id="courcity">
                                                </select>
                                             </div>
                                              <div class="mb-3 col-sm-6">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Total Items</label>
                                                <input class="form-control" type="text" name="bName" id="count" aria-describedby="emailHelp" placeholder="Enter items count">
                                             </div>
                                              <div class="mb-3 col-sm-12">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Address</label>
                                                <input class="form-control" type="text" name="bName" id="cuaddress" aria-describedby="emailHelp">
                                             </div>
                                              <div class="mb-3 col-sm-12">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Dispatch Advise</label>
                                                <input class="form-control" type="text" name="bName" id="cadvise" aria-describedby="emailHelp" placeholder="Enter Dispatch Advise">
                                             </div>
                         
                       </div>
                            </div>
                        <br>
                      
                       <div class="modal-footer">
                         <button type="button" class="btn btn-outline-primary pull-left" id="modclear" data-bs-dismiss="modal">Close</button>
                         <a href="#" data-role="conf_save" id="addord" class="btn btn-md btn-primary ref  f-right" style="padding: 6px 24px;" >Create</a>
                       </div>
                     </div>
                   
      </div>
   </div>
   
         </div>
                <!--new book--> 
               
               
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
            
      </div>
   </div>
   
   <!-- Container-fluid Ends-->
   
</div>
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
       //newbookcityfetch
       $('#cucity').change(function() 
       {
           var courier =document.getElementById("courstat").value;
           var city =document.getElementById("cucity").value;
           
           $('#courcity').empty();
           $.get('city.php', {
               'courier': courier,'city': city
           }, function(return_data) {
            //   $("#couriercity").append("<option value='" + '' + "'>" + 'All' + "</option>");
               $.each(return_data.data, function(key, value) {
                   
                   $("#courcity").append("<option value='" + value.id + "'>" + value.Name + "</option>");
               });
           }, "json");
       });
       
   });
</script>

<script>
var from;
var to;
function JSDropDown() {
            var x = document.getElementById("limit").options.length;
            document.getElementById("limit").size = x;
            
            var y = document.getElementById("sort").options.length;
            document.getElementById("sort").size = y;
            
        }
  $(document).ready(function(){
      
      
      setInterval(function () 
      {
        from=document.getElementById("fromdate").value;
        to=document.getElementById("todate").value;
        
        
        if(from!='' && to!='')
        {
            $.ajax({
                    url:"count.php",
                    method:"POST",
                    data:{from:from,to:to},
                     success:function(response)
                     {
                        var test=JSON.parse(response);
                        var confirm=test[0];
                        var dispatch=test[1];
                        var intransit=test[2];
                        var delivered=test[3];
                        var returned=test[4];
                        var lost=test[5];
                        var book=test[6];
                        var all=test[7];
                        
                        $('#unbookedb').html('('+confirm+')');
                        $('#dispatchedb').html('('+dispatch+')');
                        $('#intransitb').html('('+intransit+')');
                        $('#deliveredb').html('('+delivered+')');
                        $('#returnedb').html('('+returned+')');
                        $('#lostb').html('('+lost+')');
                        $('#bookb').html('('+book+')');
                        $('#allb').html('('+all+')');
                        
                     }
                });
        }
        else
        {
            $.ajax({
                url:"count.php",
                method:"POST",
             
                 success:function(response)
                 {
                    var test=JSON.parse(response);
                    var confirm=test[0];
                        var test=JSON.parse(response);
                        var confirm=test[0];
                        var dispatch=test[1];
                        var intransit=test[2];
                        var delivered=test[3];
                        var returned=test[4];
                        var lost=test[5];
                        var book=test[6];
                        var all=test[7];
                        
                        $('#unbookedb').html('('+confirm+')');
                        $('#dispatchedb').html('('+dispatch+')');
                        $('#intransitb').html('('+intransit+')');
                        $('#deliveredb').html('('+delivered+')');
                        $('#returnedb').html('('+returned+')');
                        $('#lostb').html('('+lost+')');
                        $('#bookb').html('('+book+')');
                        $('#allb').html('('+all+')');
                    
                 }
      });
        }
                
           
            
         
     }, 5000);  
    var cond="all";
    load_data(1,'','10','','','','','','','',cond);
    
    var count=0;
    function enable()
    {
        $('#func').removeClass("disabled");
        $('#reord').removeClass("disabled");
        
       
    }
    function load_data(page, ordernum = '', limit,sort,from,to, customer = '',city = '', items='', amount='',cond,courier)
    {
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{page:page, ordernum:ordernum, limit:limit, sort:sort, from:from, to:to, customer:customer, city:city, items:items, amount:amount,cond:cond,courier:courier},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }
   
   //api city list get
   $('#cucity').keyup(function(){
       var courier =document.getElementById("couriestat").value;
           var city =document.getElementById("cucity").value;
           
           $('#couriecity').empty();
           $.get('city.php', {
               'courier': courier,'city': city
           }, function(return_data) {
            //   $("#couriercity").append("<option value='" + '' + "'>" + 'All' + "</option>");
               $.each(return_data.data, function(key, value) {
                   
                   $("#couriecity").append("<option value='" + value.id + "'>" + value.Name + "</option>");
               });
           }, "json");
    });
    
    
   

    $(document).on('click', '.page-link', function()
    {
      //search 
      var ordernum = $('#ordernum').val();
      var customer = $('#customer').val();
      var city = $('#city').val();
      var items = $('#items').val();
      var amount = $('#amount').val();
      var courier=document.getElementById("courier").value;
      //others
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      var page = $(this).data('page_number');
      
      //condition
      //all
      $(document).on('click', '#all_ord', function(){
          cond='all';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //confirm
      $(document).on('click', '#conf_ord', function(){
          cond='Confirmed';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
          
      });
      //dispatch
      $(document).on('click', '#dis_ord', function(){
          cond='Dispatched';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //intransit
      $(document).on('click', '#ins_ord', function(){
          cond='Intransit';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //Delivered
      $(document).on('click', '#del_ord', function(){
          cond='Delivered';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //Returned
      $(document).on('click', '#ret_ord', function(){
          cond='Returned';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
       //Loss
      $(document).on('click', '#loss_ord', function(){
          cond='Loss';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //book
      $(document).on('click', '#book_ord', function(){
          cond='Booked';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //for default page load 
      
      load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
 
    });
        
    //ordernum
    $('#ordernum').keyup(function(){
      var ordernum = $('#ordernum').val();
      load_data(1, ordernum);
    });
    
    //customer
    $('#customer').keyup(function(){
      var customer = $('#customer').val();
      $.ajax({
            url:"fetch.php",
            method:"POST",
            data:{customer:customer},
            success:function(data)
            {
              $('#dynamic_content').html(data);
            }
        });
    });
    
    //city
    $('#city').keyup(function(){
      var city = $('#city').val();
      $.ajax({
            url:"fetch.php",
            method:"POST",
            data:{city:city},
            success:function(data)
            {
              $('#dynamic_content').html(data);
            }
        });
    });
    
    //items
    $('#items').keyup(function(){
      var items = $('#items').val();
      $.ajax({
            url:"fetch.php",
            method:"POST",
            data:{items:items},
            success:function(data)
            {
              $('#dynamic_content').html(data);
            }
        });
    });
    
    //amount
    $('#amount').keyup(function(){
      var amount = $('#amount').val();
      $.ajax({
            url:"fetch.php",
            method:"POST",
            data:{amount:amount},
            success:function(data)
            {
              $('#dynamic_content').html(data);
            }
        });
    });
    
    
    //tracking
    $('#tracking').keyup(function(){
      var tracking = $('#tracking').val();
      $.ajax({
            url:"fetch.php",
            method:"POST",
            data:{tracking:tracking},
            success:function(data)
            {
              $('#dynamic_content').html(data);
            }
        });
    });
    
    //courier

    $(document).on('click', '#courier', function(){
       //search 
      var ordernum = $('#ordernum').val();
      var customer = $('#customer').val();
      var city = $('#city').val();
      var items = $('#items').val();
      var amount = $('#amount').val();
      var courier=document.getElementById("courier").value;
      //others
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      var page = $(this).data('page_number');
      load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
    });

    //limit 
    $(document).on('click', '#limit', function(){
      var page = $(this).data('page_number');
      //search 
      var ordernum = $('#ordernum').val();
      var customer = $('#customer').val();
      var city = $('#city').val();
      var items = $('#items').val();
      var amount = $('#amount').val();
      var courier=document.getElementById("courier").value;
      //others
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      
      
       //condition
      //all
      $(document).on('click', '#all_ord', function(){
          cond='all';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //confirm
      $(document).on('click', '#conf_ord', function(){
          cond='Confirmed';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
          
      });
      //dispatch
      $(document).on('click', '#dis_ord', function(){
          cond='Dispatched';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //intransit
      $(document).on('click', '#ins_ord', function(){
          cond='Intransit';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //Delivered
      $(document).on('click', '#del_ord', function(){
          cond='Delivered';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //Returned
      $(document).on('click', '#ret_ord', function(){
          cond='Returned';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
       //Loss
      $(document).on('click', '#loss_ord', function(){
          cond='Loss';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //book
      $(document).on('click', '#book_ord', function(){
          cond='Booked';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //for default page load 
      
      load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
    });
    
    //sort 
    $(document).on('click', '#sort', function(){
      var page = $(this).data('page_number');
      //search 
      var ordernum = $('#ordernum').val();
      var customer = $('#customer').val();
      var city = $('#city').val();
      var items = $('#items').val();
      var amount = $('#amount').val();
      var courier=document.getElementById("courier").value;
      //others
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
       //condition
      //all
      $(document).on('click', '#all_ord', function(){
          cond='all';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //confirm
      $(document).on('click', '#conf_ord', function(){
          cond='Confirmed';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
          
      });
      //dispatch
      $(document).on('click', '#dis_ord', function(){
          cond='Dispatched';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //intransit
      $(document).on('click', '#ins_ord', function(){
          cond='Intransit';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //Delivered
      $(document).on('click', '#del_ord', function(){
          cond='Delivered';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //Returned
      $(document).on('click', '#ret_ord', function(){
          cond='Returned';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
       //Loss
      $(document).on('click', '#loss_ord', function(){
          cond='Loss';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //book
      $(document).on('click', '#book_ord', function(){
          cond='Booked';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //for default page load 
      
      load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
    });
    
    //date
    $("#fromdate").change(function()
    {
      var page = $(this).data('page_number');
      //search 
      var ordernum = $('#ordernum').val();
      var customer = $('#customer').val();
      var city = $('#city').val();
      var items = $('#items').val();
      var amount = $('#amount').val();
      var courier=document.getElementById("courier").value;
      //others
      from=document.getElementById("fromdate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      
        $("#todate").change(function()
        {
            to=document.getElementById("todate").value;
             //condition
              //all
              $(document).on('click', '#all_ord', function(){
                  cond='all';
                  load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
              });
              //confirm
              $(document).on('click', '#conf_ord', function(){
                  cond='Confirmed';
                  load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
                  
              });
              //dispatch
              $(document).on('click', '#dis_ord', function(){
                  cond='Dispatched';
                  load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
              });
              //intransit
              $(document).on('click', '#ins_ord', function(){
                  cond='Intransit';
                  load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
              });
              //Delivered
              $(document).on('click', '#del_ord', function(){
                  cond='Delivered';
                  load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
              });
              //Returned
              $(document).on('click', '#ret_ord', function(){
                  cond='Returned';
                  load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
              });
               //Loss
              $(document).on('click', '#loss_ord', function(){
                  cond='Loss';
                  load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
              });
              //book
              $(document).on('click', '#book_ord', function(){
                  cond='Booked';
                  load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
              });
          //for default page load 
          
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
        });
    });
    
    //options dropdown
    //unbook
    $(document).on('change', '#unbookopt', function()
    {
        var $ele = $(this).parent().parent();
        var id = $(this).attr("name"); 
        var currentRow = $(this).closest("td");
        var option = currentRow.find("#unbookopt").val();
        
        
        if(option == 'Book')
        {
            
            $.ajax({
                 url:"check.php",
                 method:"POST",
                 data:{id:id},
                 success:function(data)
                 {
                   $('#Book').modal('toggle');
                   $('#dynamic_content1').html(data);
                   $('#func').click(function(e) 
                    {
                        e.stopImmediatePropagation();
                        $(this).addClass('disabled');
                        var courierstat=document.getElementById("courierstat").value;
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
                             url:"Book.php",
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
                                    var cond="all";
                                    load_data(1,'','10','','','','','','','',cond);
                                    enable();
                                    $('#Book').modal('hide');
                                }
                                if(data == 0)
                                {
                                    $('#Book').modal('hide');
                                    var cond="all";
                                    load_data(1,'','10','','','','','','','',cond);
                                    enable();
                                    toastr.error('There might be some error!');
                                }
                                if(data == 3)
                                {
                                    $('#Book').modal('hide');
                                    var cond="all";
                                    load_data(1,'','10','','','','','','','',cond);
                                    enable();
                                    toastr.error('Order Booked But was already fulfilled!');
                                }
                                
                                if(data == 2)
                                {
                                    $('#Book').modal('hide');
                                    var cond="all";
                                    load_data(1,'','10','','','','','','','',cond);
                                    enable();
                                    toastr.warning('Please Check The Fields Before Booking!');
                                }
                             }
                         });
                    });
                 }
            });
            currentRow.find("#unbookopt").val('');
                
        }
        if(option =='view')
        {
            href='../ord/Order_View.php?GETID='+id;
            window.open(href);
            currentRow.find("#unbookopt").val('');
        }
        if(option =='update')
        {
            $('#Update').modal('toggle');
            $('#upd').click(function() 
            {
                var cou=document.getElementById("co_name").value;
                
                var track=document.getElementById("track").value;
                    
                $.ajax({
                            url:"Update_tracking.php",
                             method:"POST",
                             data:{id:id, cou:cou, track:track},
                             success:function(data)
                             {
                                if(data == 1)
                                {
                                    toastr.success('Updated Successfully!');
                                    $ele.fadeOut(900,function(){
                                    $(this).remove();
                                    });
                                    var cond="all";
                                    load_data(1,'','10','','','','','','','',cond);
                                    $('#Update').modal('hide');
                                    currentRow.find("#Update").val('');
                                }
                                if(data == 0)
                                {
                                    toastr.error('There might be some error!');
                                    $('#Update').modal('hide');
                                    var cond="all";
                                    load_data(1,'','10','','','','','','','',cond);
                                    currentRow.find("#Update").val('');
                                }
                                
                                if(data == 2)
                                {
                                    toastr.warning('Please Check The Fields Before Updating!');
                                    $('#Update').modal('hide');
                                    var cond="all";
                                    load_data(1,'','10','','','','','','','',cond);
                                    currentRow.find("#Update").val('');
                                }
                             }
                         });
            });
            currentRow.find("#unbookopt").val('');
        }

        
    });
    //rebook
     $(document).on('change', '#rebookopt', function()
    {
       var $ele = $(this).parent().parent();
        var id = $(this).attr("name"); 
        var currentRow = $(this).closest("td");
        var option = currentRow.find("#rebookopt").val();
    
      if(option == 'Rebook')
        {
            $.ajax({
                 url:"check.php",
                 method:"POST",
                 data:{id:id},
                 success:function(data)
                 {
                   $('#Rebook').modal('toggle');
                   $('#dynamic_content2').html(data);
                   $('#reord').click(function(e) 
                    {
                        e.stopImmediatePropagation();
                        $(this).addClass('disabled');
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
                                    var cond="all";
                                    load_data(1,'','10','','','','','','','',cond);
                                      enable();
                                    $('#Rebook').modal('hide');
                                }
                                if(data == 0)
                                {
                                    $('#Rebook').modal('hide');
                                    var cond="all";
                                    load_data(1,'','10','','','','','','','',cond);
                                      enable();
                                    toastr.error('There might be some error!');
                                }
                                 if(data == 3)
                                {
                                    $('#Book').modal('hide');
                                    var cond="all";
                                    load_data(1,'','10','','','','','','','',cond);
                                    enable();
                                    toastr.error('Order Booked But was already fulfilled!');
                                }
                                
                                if(data == 2)
                                {
                                    $('#Rebook').modal('hide');
                                    var cond="all";
                                    load_data(1,'','10','','','','','','','',cond);
                                      enable();
                                    toastr.warning('Please Check The Fields Before Booking!');
                                }
                             }
                         });
                    });
                 }
            });
            currentRow.find("#rebookopt").val('');
        }
      if(option =='fetch')
      {
          $.ajax({
                    url:"status.php",
                    method:"POST",
                    data:{id:id},
                    success:function(data)
                    {
                        if(data == 1)
                        {
                            toastr.success('Updated Successfully!');
                            $ele.fadeOut(900,function(){
                            $(this).remove();
                            });
                            var cond="all";
                            load_data(1,'','10','','','','','','','',cond);
                            
                        }
                        if(data == 0)
                        {
                            toastr.error('There might be some error!');
                            
                        }

                    }
                });
            currentRow.find("#rebookopt").val('');
      }
      if(option =='view')
      {
        href='../ord/Order_View.php?GETID='+id;
        window.open(href);
        currentRow.find("#rebookopt").val('');
      }
      if(option =='cancel')
      {
          $.ajax({
                    url:"cancel.php",
                    method:"POST",
                    data:{id:id},
                    success:function(data)
                    {
                        if(data == 1)
                        {
                            toastr.success('Updated Successfully!');
                            $ele.fadeOut(900,function(){
                            $(this).remove();
                            });
                            var cond="all";
                            load_data(1,'','10','','','','','','','',cond);
                            
                        }
                        if(data == 0)
                        {
                            toastr.error('There might be some error!');
                            
                        }

                    }
                });
            currentRow.find("#rebookopt").val('');
      }
      
    });
    
    $(document).on('click', '#ref', function(){
        
        toastr.info('Refreshed');
        //search 
        var ordernum = $('#ordernum').val("");
        var customer = $('#customer').val("");
        var city = $('#city').val("");
        var items = $('#items').val("");
        var amount = $('#amount').val("");
        from=document.getElementById("fromdate").value='';
        to=document.getElementById("todate").value='';
        var limit=document.getElementById("limit").value='10';
        var sort=document.getElementById("sort").value='DESC';
        var courier=document.getElementById("courier").value='';
        var cond="all";
        load_data(1,'','10','','','','','','','',cond);
     });
     
     //condition
      //all
      $(document).on('click', '#all_ord', function(){
          cond='all';
          //search 
          var ordernum = $('#ordernum').val();
          var customer = $('#customer').val();
          var city = $('#city').val();
          var items = $('#items').val();
          var amount = $('#amount').val();
          var courier=document.getElementById("courier").value;
          
          //others
          from=document.getElementById("fromdate").value;
          to=document.getElementById("todate").value;
          var limit=document.getElementById("limit").value;
          var sort=document.getElementById("sort").value;
          var page = $(this).data('page_number');
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //confirm
      $(document).on('click', '#conf_ord', function(){
          cond='Confirmed';
          //search 
          var ordernum = $('#ordernum').val();
          var customer = $('#customer').val();
          var city = $('#city').val();
          var items = $('#items').val();
          var amount = $('#amount').val();
          var courier=document.getElementById("courier").value;
          
          //others
          from=document.getElementById("fromdate").value;
          to=document.getElementById("todate").value;
          var limit=document.getElementById("limit").value;
          var sort=document.getElementById("sort").value;
          var page = $(this).data('page_number');
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
          
      });
      //Dispatch
      $(document).on('click', '#dis_ord', function(){
          cond='Dispatched';
          //search 
          var ordernum = $('#ordernum').val();
          var customer = $('#customer').val();
          var city = $('#city').val();
          var items = $('#items').val();
          var amount = $('#amount').val();
          var courier=document.getElementById("courier").value;
          
          //others
          from=document.getElementById("fromdate").value;
          to=document.getElementById("todate").value;
          var limit=document.getElementById("limit").value;
          var sort=document.getElementById("sort").value;
          var page = $(this).data('page_number');
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //Intransit
      $(document).on('click', '#ins_ord', function(){
          cond='Intransit';
          //search 
          var ordernum = $('#ordernum').val();
          var customer = $('#customer').val();
          var city = $('#city').val();
          var items = $('#items').val();
          var amount = $('#amount').val();
          var courier=document.getElementById("courier").value;
          
          //others
          from=document.getElementById("fromdate").value;
          to=document.getElementById("todate").value;
          var limit=document.getElementById("limit").value;
          var sort=document.getElementById("sort").value;
          var page = $(this).data('page_number');
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //Delivered
      $(document).on('click', '#del_ord', function(){
          cond='Delivered';
          //search 
          var ordernum = $('#ordernum').val();
          var customer = $('#customer').val();
          var city = $('#city').val();
          var items = $('#items').val();
          var amount = $('#amount').val();
          var courier=document.getElementById("courier").value;
          //others
          from=document.getElementById("fromdate").value;
          to=document.getElementById("todate").value;
          var limit=document.getElementById("limit").value;
          var sort=document.getElementById("sort").value;
          var page = $(this).data('page_number');
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //Return
      $(document).on('click', '#ret_ord', function(){
          cond='Returned';
          //search 
          var ordernum = $('#ordernum').val();
          var customer = $('#customer').val();
          var city = $('#city').val();
          var items = $('#items').val();
          var amount = $('#amount').val();
          var courier=document.getElementById("courier").value;
          //others
          from=document.getElementById("fromdate").value;
          to=document.getElementById("todate").value;
          var limit=document.getElementById("limit").value;
          var sort=document.getElementById("sort").value;
          var page = $(this).data('page_number');
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //loss
      $(document).on('click', '#loss_ord', function(){
          cond='Loss';
          //search 
          var ordernum = $('#ordernum').val();
          var customer = $('#customer').val();
          var city = $('#city').val();
          var items = $('#items').val();
          var amount = $('#amount').val();
          var courier=document.getElementById("courier").value;
          //others
          from=document.getElementById("fromdate").value;
          to=document.getElementById("todate").value;
          var limit=document.getElementById("limit").value;
          var sort=document.getElementById("sort").value;
          var page = $(this).data('page_number');
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
      //booked
      $(document).on('click', '#book_ord', function(){
          cond='Booked';
          //search 
          var ordernum = $('#ordernum').val();
          var customer = $('#customer').val();
          var city = $('#city').val();
          var items = $('#items').val();
          var amount = $('#amount').val();
          var courier=document.getElementById("courier").value;
          //others
          from=document.getElementById("fromdate").value;
          to=document.getElementById("todate").value;
          var limit=document.getElementById("limit").value;
          var sort=document.getElementById("sort").value;
          var page = $(this).data('page_number');
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond,courier);
      });
     
    
    //new book
    
    $(document).on('click', '#addorder', function()
    {
        $('#Newbook').modal('toggle');
        
    });
    
    $('#addord').click(function()
    {
        var courierstat=document.getElementById("courstat").value;
        var order=document.getElementById("ornum").value;
        var name=document.getElementById("cuname").value;
        var address=document.getElementById("cuaddress").value;
        var contact=document.getElementById("cucontact").value;
        var total=document.getElementById("ctotal").value;
        var city=document.getElementById("courcity").value;
        var cname=document.getElementById("cucity").value;
        var weight=document.getElementById("cweight").value;
        var items=document.getElementById("coitems").value;
        var dispatch_advise=document.getElementById("cadvise").value;
        var count=document.getElementById("count").value;
        $.ajax({
                    url:"Newbook.php",
                    method:"POST",
                    data:{
                            courierstat:courierstat,
                            order:order, 
                            name:name, 
                            address:address, 
                            contact:contact, 
                            total:total, 
                            city:city, 
                            weight:weight, 
                            items:items, 
                            dispatch_advise:dispatch_advise,
                            count: count,
                            cname: cname
                        },
                        success:function(data)
                        {
                            if(data == 1)
                            {
                                toastr.success('Booked Successfully!');
                                $ele.fadeOut(900,function(){
                                $(this).remove();
                                });
                                var cond="all";
                                load_data(1,'','10','','','','','','','',cond);
                                $('#Newbook').modal('hide');
                                
                            }
                            if(data == 0)
                            {
                                $('#Newbook').modal('hide');
                                var cond="all";
                                load_data(1,'','10','','','','','','','',cond);
                                toastr.error('There might be some error!');
                            }
                                    
                            if(data == 2)
                            {
                                $('#Newbook').modal('hide');
                                var cond="all";
                                load_data(1,'','10','','','','','','','',cond);
                                toastr.warning('Please Check The Fields Before Booking!');
                            }
                        }
                });
    });
    $(document).on('click', '#itemcheck', function()
    {
        var id =$(this).data('id');
        var ul = $('details ul[id="itemfetch"]');
        ul.html("");
        count=0; 
        if(count<1)
        {
             $.ajax({
                url:"items.php",
                method:"POST",
                data:{id:id},
                success:function(data)
                {
                    ul.append(data);
                    count++;
                }
                
            });
        }

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
            
            (function(){
 
  
  $("clickT").on("click", function() {
    $(".onhover-show-div1").fadeToggle( "fast");
  });
  
})();
        </script>
        
        
        
        
<?php include ("../include/footer.php"); ?>
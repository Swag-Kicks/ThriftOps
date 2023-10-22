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
              <h3 class=" modal-title">Shopify Abandoned Checkouts</h3>
               
            </div>
            <div class="col-md-4 mt-2">
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
                      <li class="nav-item"><a class="nav-link active" id="all_ord" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true">All<span id="allc"></span></a></li>
                      <li class="nav-item"><a class="nav-link" id="pen_ord" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false">Pending <span id="pendingc"></span></a></li>
                      <li class="nav-item"><a class="nav-link" id="conf_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Converted <span id="confirmc"></span> </a></li>
                      <li class="nav-item"><a class="nav-link" id="can_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Unresponsive<span id="cancelc"></span> </a></li>
                      <li class="nav-item"><a class="nav-link" id="hold_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Not Interested<span id="holdc"></span> </a></li>
                      <li class="nav-item"><a class="nav-link" id="re_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">May Buy later<span id="reatemptc"></span></a></li>

                  
                
                    </ul>
                </div>
                <div class="col-md-3 p-r-20" style="margin-top:30px;">
                    
             
                  <div class="bookmark">
                    <ul>
           
                            <li><button class="dropbtn"><i class="icon-reload" id="ref"></i></button></li>
                            <li><button class="dropbtn"><i class="icon-import" id="excel" onclick="fnExcelReport();"></i></button></li>
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
                            <li><button class="dropbtn"><i class="icon-settings"></i></button></li>
                            
                    
                    </ul>
                   
                  </div>
                  
                </div>
              </div>
        <div class="dataTables_scrollHeadInner" style="box-sizing: content-box; width: 1787.12px; padding-right: 0px;">
        <table class="dataTable no-footer" role="grid" style="margin-left: 0px; width: 1787.12px;">
              <thead>
    
          <tr id="test" style="background-color:#E0E3EC;" role="row">
          <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Name
            	<br>
            	<input id="customer" type="text" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Address
            	<br>
            	<input id="address" type="text">
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Item(s)
            	<br>
            	<input id="items" type="text" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Amount
            	<br>
            	<input id="amount" type="text" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Status
            	<br>
            	 <select id="fstatus">
                                          <option disabled selected>
                                          </option>
                                          <option value="Order Placed">Order Placed</option>
                                          <option value="Not Answering">Not Answering</option>
                                          <option value="Unreachable">Unreachable</option>
                                          <option value="Payment">Payment Issue</option>
                                          <option value="DC Issue">DC Issue</option>
                                          <option value="Size Issue">Size Issue</option>
                                          <option value="Will Order Soon">Will Order Soon</option>
                                          <option value="Already Placed">Already Placed</option>
                                          <option value="Ordered on Chat">Ordered on Chat</option>
                                          <option value="Not Interested">Not Interested</option>
                                        </select>
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">DateTime
            	<br>
            	<input type="text" style="visibility: hidden;">
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Reason
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
         </div>
      </div>
   </div>
          
  
   <!-- Container-fluid Ends-->
   
</div>
<!--placeorder modal--> 
                         <div class="modal fade bd-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="orderref" role="dialog">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="" ><br>
                            <h4 class="modal-title1 text-center font-weight-bold">Enter Order Number</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                                <div class="mb-3">
                                               <input type="text" class="form-control" placeholder="#6436.." name="" id="reftext" required="">
                                             </div>
                                              <a href="#" data-role="conf_save" id="addord" class="btn btn-md btn-primary ref mleft  f-right" style="padding: 6px 24px;">Save</a>
                                              <button type="button" class="btn btn-outline-primary pull-right" id="modclear" data-bs-dismiss="modal">Close</button>
                                              
                          </div>
                        </div>
                      </div>
                    </div>
                         <!--end placeorder modal-->    

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
                        var pending=test[0];
                        var confirm=test[1];
                        var cancel=test[2];
                        var hold=test[3];
                        var reattempt=test[4];
                        var all=test[5];
                        
                        $('#pendingc').html('('+pending+')');
                        $('#confirmc').html('('+confirm+')');
                        $('#cancelc').html('('+cancel+')');
                        $('#holdc').html('('+hold+')');
                        $('#reatemptc').html('('+reattempt+')');
                        $('#allc').html('('+all+')');
                        
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
                    var pending=test[0];
                    var confirm=test[1];
                    var cancel=test[2];
                    var hold=test[3];
                    var reattempt=test[4];
                    var all=test[5];
                    
                    $('#pendingc').html('('+pending+')');
                    $('#confirmc').html('('+confirm+')');
                    $('#cancelc').html('('+cancel+')');
                    $('#holdc').html('('+hold+')');
                    $('#reatemptc').html('('+reattempt+')');
                    $('#allc').html('('+all+')');
                    
                 }
      });
        }
                
           
            
         
     }, 5000);  
    var cond="all";
    load_data(1,'','10','','','','','','','',cond);
    
    var count=0;
    
    function load_data(page, fstatus = '', limit,sort,from,to, customer = '',address = '', items='', amount='',cond)
    {
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{page:page, fstatus:fstatus, limit:limit, sort:sort, from:from, to:to, customer:customer, address:address, items:items, amount:amount,cond:cond},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }
   
    

    $(document).on('click', '.page-link', function()
    {
      //search 
      var customer = $('#customer').val();
      var address = $('#address').val();
      var items = $('#items').val();
      var amount = $('#amount').val();
      
      //others
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      var page = $(this).data('page_number');
      var fstatus=document.getElementById("fstatus").value;
      
      //condition
      //all
      $(document).on('click', '#all_ord', function(){
          cond='all';
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
      });
      //pending
      $(document).on('click', '#pen_ord', function(){
          cond='Pending';
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
          
      });
      //confirmed
      $(document).on('click', '#conf_ord', function(){
          cond='Converted';
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
      });
      //cancel
      $(document).on('click', '#can_ord', function(){
          cond='Unresponsive';
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
      });
      //hold
      $(document).on('click', '#hold_ord', function(){
          cond='Notinterested';
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
      });
      //reattempt
      $(document).on('click', '#re_ord', function(){
          cond='Maybuylater';
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
      });
      //for default page load 
      
      load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
 
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
    
    //address
    $('#address').keyup(function(){
      var address = $('#address').val();
      $.ajax({
            url:"fetch.php",
            method:"POST",
            data:{address:address},
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
    
    $(document).on('click', '#fstatus', function()
    {
      //search 
      var customer = $('#customer').val();
      var address = $('#address').val();
      var items = $('#items').val();
      var amount = $('#amount').val();
      
      //others
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      var page = $(this).data('page_number');
      var fstatus=document.getElementById("fstatus").value;
      
      load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
    
        
    });

    //limit 
    $(document).on('click', '#limit', function(){
      var page = $(this).data('page_number');
      //search 
      var fstatus = $('#fstatus').val();
      var customer = $('#customer').val();
      var address = $('#address').val();
      var items = $('#items').val();
      var amount = $('#amount').val();
      //others
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      
      
      //condition
      //all
      $(document).on('click', '#all_ord', function(){
          cond='all';
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
      });
      //pending
      $(document).on('click', '#pen_ord', function(){
          cond='Pending';
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
          
      });
      //confirmed
      $(document).on('click', '#conf_ord', function(){
          cond='Converted';
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
      });
      //cancel
      $(document).on('click', '#can_ord', function(){
          cond='Unresponsive';
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
      });
      //hold
      $(document).on('click', '#hold_ord', function(){
          cond='Notinterested';
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
      });
      //reattempt
      $(document).on('click', '#re_ord', function(){
          cond='Maybuylater';
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
      });
      //for default page load 
      
      load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
    });
    
    //sort 
    $(document).on('click', '#sort', function(){
      var page = $(this).data('page_number');
      //search 
      var fstatus = $('#fstatus').val();
      var customer = $('#customer').val();
      var address = $('#address').val();
      var items = $('#items').val();
      var amount = $('#amount').val();
      //others
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      //condition
      //all
      $(document).on('click', '#all_ord', function(){
          cond='all';
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
      });
      //pending
      $(document).on('click', '#pen_ord', function(){
          cond='Pending';
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
          
      });
      //confirmed
      $(document).on('click', '#conf_ord', function(){
          cond='Converted';
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
      });
      //cancel
      $(document).on('click', '#can_ord', function(){
          cond='Unresponsive';
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
      });
      //hold
      $(document).on('click', '#hold_ord', function(){
          cond='Notinterested';
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
      });
      //reattempt
      $(document).on('click', '#re_ord', function(){
          cond='Maybuylater';
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
      });
      //for default page load 
      
      load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
    });
    
    //date
    $("#fromdate").change(function()
    {
      var page = $(this).data('page_number');
      //search 
      var fstatus = $('#fstatus').val();
      var customer = $('#customer').val();
      var address = $('#address').val();
      var items = $('#items').val();
      var amount = $('#amount').val();
      to=document.getElementById("todate").value;
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
                  load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
              });
              //pending
              $(document).on('click', '#pen_ord', function(){
                  cond='Pending';
                  load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
                  
              });
              //confirmed
              $(document).on('click', '#conf_ord', function(){
                  cond='Converted';
                  load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
              });
              //cancel
              $(document).on('click', '#can_ord', function(){
                  cond='Unresponsive';
                  load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
              });
              //hold
              $(document).on('click', '#hold_ord', function(){
                  cond='Notinterested';
                  load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
              });
              //reattempt
              $(document).on('click', '#re_ord', function(){
                  cond='Maybuylater';
                  load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
              });
              //for default page load 
              load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
        });
        
        //all
        $(document).on('click', '#all_ord', function(){
                  cond='all';
                  load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
        });
        //pending
        $(document).on('click', '#pen_ord', function(){
                  cond='Pending';
                  load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
                  
        });
        //confirmed
        $(document).on('click', '#conf_ord', function(){
                  cond='Converted';
                  load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
        });
        //cancel
        $(document).on('click', '#can_ord', function(){
                  cond='Unresponsive';
                  load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
        });
        //hold
        $(document).on('click', '#hold_ord', function(){
                  cond='Notinterested';
                  load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
        });
        //reattempt
        $(document).on('click', '#re_ord', function(){
                  cond='Maybuylater';
                  load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
        });
        //for default page load 
        load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
    });
    
    $(document).on('click', '#ref', function(){
        
        toastr.info('Refreshed');
        //search 
        var fstatus = $('#fstatus').val("");
        var customer = $('#customer').val("");
        var address = $('#address').val("");
        var items = $('#items').val("");
        var amount = $('#amount').val("");
        from=document.getElementById("fromdate").value='';
        from=document.getElementById("todate").value='';
        var limit=document.getElementById("limit").value='10';
        var sort=document.getElementById("sort").value='DESC';
        load_data(1);
     });
      //condition
      //all
      $(document).on('click', '#all_ord', function(){
          cond='all';
          //search 
          var fstatus = $('#fstatus').val();
          var customer = $('#customer').val();
          var address = $('#address').val();
          var items = $('#items').val();
          var amount = $('#amount').val();
          
          //others
          from=document.getElementById("fromdate").value;
          to=document.getElementById("todate").value;
          var limit=document.getElementById("limit").value;
          var sort=document.getElementById("sort").value;
          var page = $(this).data('page_number');
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
      });
      //pending
      $(document).on('click', '#pen_ord', function(){
          cond='Pending';
          //search 
          var fstatus = $('#fstatus').val();
          var customer = $('#customer').val();
          var address = $('#address').val();
          var items = $('#items').val();
          var amount = $('#amount').val();
          
          //others
          from=document.getElementById("fromdate").value;
          to=document.getElementById("todate").value;
          var limit=document.getElementById("limit").value;
          var sort=document.getElementById("sort").value;
          var page = $(this).data('page_number');
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
          
      });
      //confirmed
      $(document).on('click', '#conf_ord', function(){
          cond='Converted';
          //search 
          var fstatus = $('#fstatus').val();
          var customer = $('#customer').val();
          var address = $('#address').val();
          var items = $('#items').val();
          var amount = $('#amount').val();
          
          //others
          from=document.getElementById("fromdate").value;
          to=document.getElementById("todate").value;
          var limit=document.getElementById("limit").value;
          var sort=document.getElementById("sort").value;
          var page = $(this).data('page_number');
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
      });
      //cancel
      $(document).on('click', '#can_ord', function(){
          cond='Unresponsive';
          //search 
          var fstatus = $('#fstatus').val();
          var customer = $('#customer').val();
          var address = $('#address').val();
          var items = $('#items').val();
          var amount = $('#amount').val();
          
          //others
          from=document.getElementById("fromdate").value;
          to=document.getElementById("todate").value;
          var limit=document.getElementById("limit").value;
          var sort=document.getElementById("sort").value;
          var page = $(this).data('page_number');
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
      });
      //hold
      $(document).on('click', '#hold_ord', function(){
          cond='Notinterested';
          //search 
          var fstatus = $('#fstatus').val();
          var customer = $('#customer').val();
          var address = $('#address').val();
          var items = $('#items').val();
          var amount = $('#amount').val();
          
          //others
          from=document.getElementById("fromdate").value;
          to=document.getElementById("todate").value;
          var limit=document.getElementById("limit").value;
          var sort=document.getElementById("sort").value;
          var page = $(this).data('page_number');
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
      });
      //reattempt
      $(document).on('click', '#re_ord', function(){
          cond='Maybuylater';
          //search 
          var fstatus = $('#fstatus').val();
          var customer = $('#customer').val();
          var address = $('#address').val();
          var items = $('#items').val();
          var amount = $('#amount').val();
          
          //others
          from=document.getElementById("fromdate").value;
          to=document.getElementById("todate").value;
          var limit=document.getElementById("limit").value;
          var sort=document.getElementById("sort").value;
          var page = $(this).data('page_number');
          load_data(page,fstatus,limit,sort,from,to,customer,address,items,amount,cond);
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
    //copyclipboard
    $(document).on('click', '#link', function()
    {
        event.preventDefault();
        navigator.clipboard.writeText($(this).attr("data-id"));
        toastr.success('Copied To ClipBoard');
    });
    
    
    //marking status
     $(document).on('change', '#mark', function()
    {
       var $ele = $(this).parent().parent();
       var id = $(this).attr("name"); 
       var currentRow = $(this).closest("td");
       var option = currentRow.find("#mark").val();
    
      if(option == 'Order Placed')
      {
        $('#orderref').modal('toggle');
        
        
        $(document).on('click', '#addord', function()
        {
            var ordtesxt =document.getElementById("reftext").value;
            $.ajax({  
                    url:"ordermark.php",  
                    method:"POST",  
                    data:{id:id, ordtesxt:ordtesxt},  
                    success:function(data)
                    {  
                        if(data == 1)
                        {
                            toastr.success('Saved Successfully!');
                            $ele.fadeOut(900,function(){
                            $(this).remove();
                            });
                            var fstatus = $('#reftext').val("");
                            load_data(1);
                             $('#orderref').modal('hide');
                        }
                        if(data == 0)
                        {
                            toastr.error('There might be some error!');
                        }
                    }
                });
        });
        currentRow.find("#orderref").val('');
        
        
      }
      else
      {
        $.ajax({  
                    url:"mark.php",  
                    method:"POST",  
                    data:{id:id, option:option},  
                    success:function(data)
                    {  
                        if(data == 1)
                        {
                            toastr.success('Saved Successfully!');
                            $ele.fadeOut(900,function(){
                            $(this).remove();
                            });
                            load_data(1);
                        }
                        if(data == 0)
                        {
                            toastr.error('There might be some error!');
                        }
                    }
                });  
      }
    });
    

    
  });
  
 //export excel
function fnExcelReport()
{
    
    var tab_text="<table border='2px'><tr bgcolor='#878780'>  <th>Order</th><th>Customer</th><th>address</th><th>Items</th><th>Amount</th><th>Status</th><th>Date</th></tr>";
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
 <?php  
session_Start();
?>
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
          <div class="col-md-9">
              <h3 class=" modal-title">Receive Articles</h3>
                <div class=" " style="margin-top:34px;">
                <a href="#" id="newupload" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light active" >Newly Uploaded</a>
                <a href="#" id="return" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light" >Returned </a>
                 <a href="#" id="ordercancel" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light" >Order Cancelled </a>
                <a href="#" id="transefer" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light" >Transferred</a>
                </div>
               
            </div>
            <div class="col-md-3">
            
              <select class="form-select w-75 f-right">
                                  <option selected> Swag Warehosue</option>
                                  <option>Winpak Wrhs</option>
                                  <option>MarketPlace</option>
                                  
                            </select>
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
                      <li class="nav-item"><a class="nav-link" id="conf_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Marked <span id="confirmc"></span> </a></li>
                    </ul>
                </div>
                <div class="col-md-3 p-r-20" style="margin-top:30px;">
                    
             
                  <div class="bookmark">
                    <ul>
                            <li>
                                <select id="change" class="form-select">
                                  <option value="" selected disabled>Bulk Action</option>
                                  <option value="Reason for deallocation">Deallocate</option>
                                 
                                  
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
              <th class="res">
            	<br>
            	 <input class="checkbox1" id="" type="checkbox" >
            </th>
               <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Sno
            	<br>
            	<input id="ordernum" type="text" style="visibility: hidden;" >
            </th>
          <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Image
            	<br>
            	<input id="ordernum" type="text" style="visibility: hidden;" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Items
            	<br>
            <input id="city" type="text">
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Location
            	<br>
            	<input id="tracking" type="text"  >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Product Type 
            	<br>
            		<input id="tracking" type="text" style="visibility: hidden;" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Allocation Date
            	<br>
              <input id="tracking" type="text" style="visibility: hidden;" >
            </th>
            

             <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">
            <th></th>
            </tr>    
            </thead>
            </table>
            </div>
                </div>
                
                <div class="table-responsive" id="dynamic_content"></div>
        
               
            
      </div>
   </div>
    <div id="pagination"></div>
   <!-- Container-fluid Ends-->
   
</div>
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
    
    function load_data(page, ordernum = '', limit,sort,from,to, customer = '',city = '', items='', amount='',cond)
    {
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{page:page, ordernum:ordernum, limit:limit, sort:sort, from:from, to:to, customer:customer, city:city, items:items, amount:amount,cond:cond},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }
   
    

    $(document).on('click', '.page-link', function()
    {
      //search 
      var ordernum = $('#ordernum').val();
      var customer = $('#customer').val();
      var city = $('#city').val();
      var items = $('#items').val();
      var amount = $('#amount').val();
      
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
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
      });
      //pending
      $(document).on('click', '#pen_ord', function(){
          cond='Pending';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
          
      });
      //confirmed
      $(document).on('click', '#conf_ord', function(){
          cond='Confirmed';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
      });
      //cancel
      $(document).on('click', '#can_ord', function(){
          cond='Cancel';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
      });
      //hold
      $(document).on('click', '#hold_ord', function(){
          cond='Hold';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
      });
      //reattempt
      $(document).on('click', '#re_ord', function(){
          cond='Reattempt';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
      });
      //for default page load 
      
      load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
 
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

    //limit 
    $(document).on('click', '#limit', function(){
      var page = $(this).data('page_number');
      //search 
      var ordernum = $('#ordernum').val();
      var customer = $('#customer').val();
      var city = $('#city').val();
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
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
      });
      //pending
      $(document).on('click', '#pen_ord', function(){
          cond='Pending';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
          
      });
      //confirmed
      $(document).on('click', '#conf_ord', function(){
          cond='Confirmed';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
      });
      //cancel
      $(document).on('click', '#can_ord', function(){
          cond='Cancel';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
      });
      //hold
      $(document).on('click', '#hold_ord', function(){
          cond='Hold';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
      });
      //reattempt
      $(document).on('click', '#re_ord', function(){
          cond='Reattempt';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
      });
      //for default page load 
      
      load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
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
      //others
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      //condition
      //all
      $(document).on('click', '#all_ord', function(){
          cond='all';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
      });
      //pending
      $(document).on('click', '#pen_ord', function(){
          cond='Pending';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
          
      });
      //confirmed
      $(document).on('click', '#conf_ord', function(){
          cond='Confirmed';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
      });
      //cancel
      $(document).on('click', '#can_ord', function(){
          cond='Cancel';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
      });
      //hold
      $(document).on('click', '#hold_ord', function(){
          cond='Hold';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
      });
      //reattempt
      $(document).on('click', '#re_ord', function(){
          cond='Reattempt';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
      });
      //for default page load 
      
      load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
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
              load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
          });
          //pending
          $(document).on('click', '#pen_ord', function(){
              cond='Pending';
              load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
              
          });
          //confirmed
          $(document).on('click', '#conf_ord', function(){
              cond='Confirmed';
              load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
          });
          //cancel
          $(document).on('click', '#can_ord', function(){
              cond='Cancel';
              load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
          });
          //hold
          $(document).on('click', '#hold_ord', function(){
              cond='Hold';
              load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
          });
          //reattempt
          $(document).on('click', '#re_ord', function(){
              cond='Reattempt';
              load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
          });
          //for default page load 
          
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
        });
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
          var ordernum = $('#ordernum').val();
          var customer = $('#customer').val();
          var city = $('#city').val();
          var items = $('#items').val();
          var amount = $('#amount').val();
          
          //others
          from=document.getElementById("fromdate").value;
          to=document.getElementById("todate").value;
          var limit=document.getElementById("limit").value;
          var sort=document.getElementById("sort").value;
          var page = $(this).data('page_number');
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
      });
      //pending
      $(document).on('click', '#pen_ord', function(){
          cond='Pending';
          //search 
          var ordernum = $('#ordernum').val();
          var customer = $('#customer').val();
          var city = $('#city').val();
          var items = $('#items').val();
          var amount = $('#amount').val();
          
          //others
          from=document.getElementById("fromdate").value;
          to=document.getElementById("todate").value;
          var limit=document.getElementById("limit").value;
          var sort=document.getElementById("sort").value;
          var page = $(this).data('page_number');
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
          
      });
      //confirmed
      $(document).on('click', '#conf_ord', function(){
          cond='Confirmed';
          //search 
          var ordernum = $('#ordernum').val();
          var customer = $('#customer').val();
          var city = $('#city').val();
          var items = $('#items').val();
          var amount = $('#amount').val();
          
          //others
          from=document.getElementById("fromdate").value;
          to=document.getElementById("todate").value;
          var limit=document.getElementById("limit").value;
          var sort=document.getElementById("sort").value;
          var page = $(this).data('page_number');
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
      });
      //cancel
      $(document).on('click', '#can_ord', function(){
          cond='Cancel';
          //search 
          var ordernum = $('#ordernum').val();
          var customer = $('#customer').val();
          var city = $('#city').val();
          var items = $('#items').val();
          var amount = $('#amount').val();
          
          //others
          from=document.getElementById("fromdate").value;
          to=document.getElementById("todate").value;
          var limit=document.getElementById("limit").value;
          var sort=document.getElementById("sort").value;
          var page = $(this).data('page_number');
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
      });
      //hold
      $(document).on('click', '#hold_ord', function(){
          cond='Hold';
          //search 
          var ordernum = $('#ordernum').val();
          var customer = $('#customer').val();
          var city = $('#city').val();
          var items = $('#items').val();
          var amount = $('#amount').val();
          
          //others
          from=document.getElementById("fromdate").value;
          to=document.getElementById("todate").value;
          var limit=document.getElementById("limit").value;
          var sort=document.getElementById("sort").value;
          var page = $(this).data('page_number');
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
      });
      //reattempt
      $(document).on('click', '#re_ord', function(){
          cond='Reattempt';
          //search 
          var ordernum = $('#ordernum').val();
          var customer = $('#customer').val();
          var city = $('#city').val();
          var items = $('#items').val();
          var amount = $('#amount').val();
          
          //others
          from=document.getElementById("fromdate").value;
          to=document.getElementById("todate").value;
          var limit=document.getElementById("limit").value;
          var sort=document.getElementById("sort").value;
          var page = $(this).data('page_number');
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
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
    
    //mark
    $(document).on('change', '#mark', function()
    {
       var $ele = $(this).parent().parent();
       var id = $(this).attr("name"); 
       var currentRow = $(this).closest("td");
       var stats = currentRow.find("#mark").val();
       
        $.ajax({  
                    url:"Save.php",  
                    method:"POST",  
                    data:{id:id, stats:stats},  
                    success:function(data)
                    {  
                        if(data == 1)
                        {
                            toastr.success('Saved Successfully!');
                            $ele.fadeOut(900,function(){
                            $(this).remove();
                            });
                            var ordernum = $('#ordernum').val("");
                            var customer = $('#customer').val("");
                            var city = $('#city').val("");
                            var items = $('#items').val("");
                            var amount = $('#amount').val("");
                            from=document.getElementById("fromdate").value='';
                            from=document.getElementById("todate").value='';
                            var limit=document.getElementById("limit").value='';
                            var sort=document.getElementById("sort").value='';
                            load_data(1);
                        }
                        if(data == 0)
                        {
                            toastr.error('There might be some error!');
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
    var header = document.getElementById("currentbutton");
    var btns = header.getElementsByClassName("btn-primary-light");
    for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function() {
      var current = document.getElementsByClassName("curent");
      if(current[0] != undefined){
      current[0].className = current[0].className.replace(" curent", "");
      }
      this.className += " curent";
      });
}
</script>


<!--WASAY CUSTOM CODE PAGINATIOIN WITHOUT DATATABLES-->

<script>



$(document).ready(function() {
    
    
     let table = document.getElementById('example');
let rowsPerPage = 11;
let currentPage = 1;

function showTableRows(page) {
  let start = (page - 1) * rowsPerPage;
  let end = start + rowsPerPage;

  for (let i = 1; i < table.rows.length; i++) {
    if (i < start || i >= end) {
      table.rows[i].style.display = 'none';
    } else {
      table.rows[i].style.display = '';
    }
  }
}



function generatePaginationButtons() {
  let numPages = Math.ceil(table.rows.length / rowsPerPage);

  let pagination = document.getElementById('pagination');
  pagination.innerHTML = '';

  for (let i = 1; i <= numPages; i++) {
    let button = document.createElement('button');
    button.innerHTML = i;
    button.addEventListener('click', function() {
      showTableRows(i);
      currentPage = i;
      updateActiveButton();
    });
    pagination.appendChild(button);
  }
}

function updateActiveButton() {
  let buttons = document.getElementById('pagination').getElementsByTagName('button');
  for (let i = 0; i < buttons.length; i++) {
    if (buttons[i].innerHTML == currentPage) {
      buttons[i].classList.add('active');
    } else {
      buttons[i].classList.remove('active');
    }
  }
}

showTableRows(currentPage);
generatePaginationButtons();
updateActiveButton();

  
    
    
} );

</script>

<style>
    button {
  background-color: #fff;
  border: 1px solid #ddd;
  color: #333;
  cursor: pointer;
  padding: 5px 10px;
  margin-right: 5px;
}

button.active {
  background-color: red;
  border-color: crimson;
  color: #fff;
}
</style>


<!--//CODE ENDS-->
        
        
        
<?php include ("../include/footer.php"); ?>
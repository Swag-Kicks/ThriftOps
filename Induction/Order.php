<?php  
session_Start();
?>
<?php include ("../include/header.php"); ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>
<?php include_once("../include/mysql_connection.php");  ?>

<!-- Page Body Start-->

<!--<div class="page-body-wrapper horizontal-menu">-->
<!-- Page Sidebar Ends-->
<div class="page-body">
   <div class="container-fluid">
      <div class="page-header">
       <div class="row mt-3">
          <div class="col-md-8">
              <h3 class=" modal-title">Receive Articles</h3>
                <div class=" " style="margin-top:34px;" id="currentbutton">
                <a href="Induction/New.php" id="newupload" class="btn btn-primary-light">Newly Uploaded</a>
                <a href="Return.php" id="return"  class="btn btn-primary-light " >Returned </a>
                 <a href="#" id="ordercancel"  class="btn btn-primary-light curent" >Order Cancelled </a>
                <a href="Transfer.php" id="transefer" class="btn btn-primary-light" >Transferred</a>
                </div>
               
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
            
            
         <div class='col-md-3 mt-3'>
    <select class='form-control form-select form-control-secondary f-left' id='location'>
      <option disabled selected value=''>Select Warehouse</option>";
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
                <div class="col-md-9 " style="margin-top:34px;">
              <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                      <li class="nav-item"><a class="nav-link active" id="all_ord" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true">All<span id="allc"></span></a></li>
                      <li class="nav-item"><a class="nav-link" id="pen_ord" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false">Pending <span id="pendingc"></span></a></li>
                      <li class="nav-item"><a class="nav-link" id="rec_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Recieved <span id="recc"></span> </a></li>
                      <li class="nav-item"><a class="nav-link" id="nrec_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Not Recieved <span id="nrecc"></span> </a></li>
                      <li class="nav-item"><a class="nav-link" id="send_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Send Back<span id="sendc"></span> </a></li>
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

                </div>
                <div class='dataTables_scrollHeadInner' style='box-sizing: content-box; width: 1787.12px; padding-right: 0px;'>
        <table class='dataTable no-footer' role='grid' style='margin-left: 0px; width: 1787.12px;'>
              <thead>
    
          <tr id='test' style='background-color:#E0E3EC;' role='row'>
              <th class='res' tabindex='0' aria-controls='example' rowspan='1' colspan='1'  aria-sort='ascending' >Sno
            	<br>
            	<input type='text' style='visibility: hidden;' >
            </th>
          <th class='res' tabindex='0' aria-controls='example' rowspan='1' colspan='1'  aria-sort='ascending' >Image
            	<br>
            	<input type='text' style='visibility: hidden;' >
            </th>
            <th class='res' tabindex='0' aria-controls='example' rowspan='1' colspan='1'>Items
            	<br>
            <input id='items' type='text'>
            </th>
            <th class='res' tabindex='0' aria-controls='example' rowspan='1' colspan='1'>Location
            	<br>
            	<input type='text' id="loci" >
            </th>
            <th class='res' tabindex='0' aria-controls='example' rowspan='1' colspan='1'>Order# 
            	<br>
            		<input type='text' id="order" >
            </th>
            <th class='res' tabindex='0' aria-controls='example' rowspan='1' colspan='1'>Product Type 
            	<br>
            		<input type='text' style='visibility: hidden;' >
            </th>
            <th class='res' tabindex='0' aria-controls='example' rowspan='1' colspan='1'>Allocation Date
            	<br>
              <input type='text' style='visibility: hidden;' >
            </th>
            

             <th class='res' tabindex='0' aria-controls='example' rowspan='1' colspan='1'>
            <th></th>
            </tr>    
            </thead>
            </table>
            </div>
                <div class="table-responsive" id="dynamic_content"></div>
        
               
            
      </div>
   </div>
   
   <!-- Container-fluid Ends-->
   
</div>
<!--newuploaded-->
<script>
var from;
var to;
function JSDropDown() 
{
            var x = document.getElementById("limit").options.length;
            document.getElementById("limit").size = x;
            
            var y = document.getElementById("sort").options.length;
            document.getElementById("sort").size = y;
            
}
$(document).ready(function()
{
    $(document).on('click', '#allcb', function()
    {
		$('[name="cb[]"]').prop('checked', this.checked);
	});
    
    $(document).on('click', '#location', function()
    {
         
        var location1 = document.getElementById("location").value;
        setInterval(function () 
                  {
                    from=document.getElementById("fromdate").value;
                    to=document.getElementById("todate").value;
                     var location = document.getElementById("location").value;
                    
                    if(from!='' && to!='')
                    {
                        $.ajax({
                                url:"ordercancelcount.php",
                                method:"POST",
                                data:{from:from,to:to, location:location},
                                 success:function(response)
                                 {
                                    var test=JSON.parse(response);
                                    var pending=test[0];
                                    var confirm=test[1];
                                    var cancel=test[2];
                                   
                                    
                                    $('#pendingc').html('('+pending+')');
                                    $('#confirmc').html('('+confirm+')');
                                    $('#allc').html('('+cancel+')');
                                    
                                    
                                 }
                            });
                    }
                    else
                    {
                         var location = document.getElementById("location").value;
                        $.ajax({
                            url:"ordercancelcount.php",
                            method:"POST",
                            data:{location:location},
                             success:function(response)
                             {
                                var test=JSON.parse(response);
                                var pending=test[0];
                                var confirm=test[1];
                                var cancel=test[2];
                              
                                
                                $('#pendingc').html('('+pending+')');
                                $('#confirmc').html('('+confirm+')');
                                $('#allc').html('('+cancel+')');
                               
                                
                             }
                        });
                    }
                        
                   
                    
                 
                     }, 5000);  
                    var cond="all";
                    load_data(1,'10','','','','',location1,cond);
                    
                    var count=0;
                    
                   
                    function load_data(page, limit,sort,from,to, items='', location,cond)
                    {
                      $.ajax({
                        url:"ordercancelfetch.php",
                        method:"POST",
                        data:{page:page, limit:limit, sort:sort, from:from, to:to, items:items, location:location, cond:cond},
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
                         var order=document.getElementById("order").value='';           
                        from=document.getElementById("fromdate").value='';
                        to=document.getElementById("todate").value='';
                        var limit=document.getElementById("limit").value='10';
                        var sort=document.getElementById("sort").value='DESC';
                        
                        var cond="all";
                        load_data(1,'10','','','','',location1,cond);
                    });
            
        
                    $(document).on('click', '.page-link', function()
                    {
                      //search 
                      var items = $('#items').val();
                      var location = document.getElementById("location").value;
                      
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
                          load_data(page,limit,sort,from,to,items,location,cond);
                      });
                      //pending
                      $(document).on('click', '#pen_ord', function(){
                          cond='Pending';
                          load_data(page,limit,sort,from,to,items,location,cond);
                          
                      });
                      //rec
                      $(document).on('click', '#rec_ord', function(){
                          cond='Recieved';
                          load_data(page,limit,sort,from,to,items,location,cond);
                      });
                       //not rec
                      $(document).on('click', '#nrec_ord', function(){
                          cond='Not Recieved';
                          load_data(page,limit,sort,from,to,items,location,cond);
                      });
                       //sendback
                      $(document).on('click', '#send_ord', function(){
                          cond='Send Back';
                          load_data(page,limit,sort,from,to,items,location,cond);
                      });
                      //for default page load 
                      load_data(page,limit,sort,from,to,items,location,cond);
                 
                    });
                    
                    
                    //items
                    $('#items').keyup(function(){
                      //search 
                      var items = $('#items').val();
                      var location = document.getElementById("location").value;
                      
                      //others
                      from=document.getElementById("fromdate").value;
                      to=document.getElementById("todate").value;
                      var limit=document.getElementById("limit").value;
                      var sort=document.getElementById("sort").value;
                      var page = $(this).data('page_number');
                      load_data(page,limit,sort,from,to,items,location);
                      
                      if(items=='')
                      {
                          load_data(page,limit,sort,from,to,items,location,'all');
                      }
                      else
                      {
                          load_data(page,limit,sort,from,to,items,location);
                      }
                      
                      
                    });
                    
                    
                     //order
                    $(document).on('change', '#order', function(){
                      //search 
                      var order = $('#order').val();
                      var location = document.getElementById("location").value;
                      
                      //others
                      from=document.getElementById("fromdate").value;
                      to=document.getElementById("todate").value;
                      var limit=document.getElementById("limit").value;
                      var sort=document.getElementById("sort").value;
                      var page = $(this).data('page_number');
                      $.ajax({
                        url:"returnfetch.php",
                        method:"POST",
                        data:{location:location, order:order},
                        success:function(data)
                        {
                          $('#dynamic_content').html(data);
                          
                          
                        }
                      });
                      
                      if(order=='')
                      {
                          load_data(page,limit,sort,from,to,items,location,'all');
                      }
        
                    });
                    
                    //loci
                    $('#loci').keyup(function(){
                      //search 
                      var loci =document.getElementById("loci").value;
                      var location = document.getElementById("location").value; 
                      //others
                      from=document.getElementById("fromdate").value;
                      to=document.getElementById("todate").value;
                      var limit=document.getElementById("limit").value;
                      var sort=document.getElementById("sort").value;
                      var page = $(this).data('page_number');
                      
                      
                      if(loci =='')
                      {
                          var cond="all";
                          load_data(1,'10','','','','',location1,cond);
                      }
                      else
                      {
                          $.ajax({
                            url:"orderlocationfetch.php",
                            method:"POST",
                            data:{ location:location, loci:loci},
                            success:function(data)
                            {
                              $('#dynamic_content').html(data);
                              
                              
                            }
                            });
                      }
                      
                      
                    });
                
                //limit 
                $(document).on('click', '#limit', function(){
                  var page = $(this).data('page_number');
                  //search 
                  var items = $('#items').val();
                  var location = document.getElementById("location").value;
                  //others
                  from=document.getElementById("fromdate").value;
                  to=document.getElementById("todate").value;
                  var limit=document.getElementById("limit").value;
                  var sort=document.getElementById("sort").value;
                  
                  
                  //condition
                      //all
                      $(document).on('click', '#all_ord', function(){
                          cond='all';
                          load_data(page,limit,sort,from,to,items,location,cond);
                      });
                      //pending
                      $(document).on('click', '#pen_ord', function(){
                          cond='Pending';
                          load_data(page,limit,sort,from,to,items,location,cond);
                          
                      });
                      //rec
                      $(document).on('click', '#rec_ord', function(){
                          cond='Recieved';
                          load_data(page,limit,sort,from,to,items,location,cond);
                      });
                       //not rec
                      $(document).on('click', '#nrec_ord', function(){
                          cond='Not Recieved';
                          load_data(page,limit,sort,from,to,items,location,cond);
                      });
                       //sendback
                      $(document).on('click', '#send_ord', function(){
                          cond='Send Back';
                          load_data(page,limit,sort,from,to,items,location,cond);
                      });
                  //for default page load 
                  
                  load_data(page,limit,sort,from,to,items,location,cond);
                });
            
                //sort 
                $(document).on('click', '#sort', function(){
                  var page = $(this).data('page_number');
                  //search 
                  
                  var items = $('#items').val();
                  var location = document.getElementById("location").value;
                  //others
                  from=document.getElementById("fromdate").value;
                  to=document.getElementById("todate").value;
                  var limit=document.getElementById("limit").value;
                  var sort=document.getElementById("sort").value;
                 //condition
                      //all
                      $(document).on('click', '#all_ord', function(){
                          cond='all';
                          load_data(page,limit,sort,from,to,items,location,cond);
                      });
                      //pending
                      $(document).on('click', '#pen_ord', function(){
                          cond='Pending';
                          load_data(page,limit,sort,from,to,items,location,cond);
                          
                      });
                      //rec
                      $(document).on('click', '#rec_ord', function(){
                          cond='Recieved';
                          load_data(page,limit,sort,from,to,items,location,cond);
                      });
                       //not rec
                      $(document).on('click', '#nrec_ord', function(){
                          cond='Not Recieved';
                          load_data(page,limit,sort,from,to,items,location,cond);
                      });
                       //sendback
                      $(document).on('click', '#send_ord', function(){
                          cond='Send Back';
                          load_data(page,limit,sort,from,to,items,location,cond);
                      });
                  //for default page load 
                  
                  load_data(page,limit,sort,from,to,items,location,cond);
                });
            
                //date
                $("#fromdate").change(function()
                {
                  var page = $(this).data('page_number');
                  //search 
                  var items = $('#items').val();
                  var location = document.getElementById("location").value;
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
                          load_data(page,limit,sort,from,to,items,location,cond);
                      });
                      //pending
                      $(document).on('click', '#pen_ord', function(){
                          cond='Pending';
                          load_data(page,limit,sort,from,to,items,location,cond);
                          
                      });
                      //rec
                      $(document).on('click', '#rec_ord', function(){
                          cond='Recieved';
                          load_data(page,limit,sort,from,to,items,location,cond);
                      });
                       //not rec
                      $(document).on('click', '#nrec_ord', function(){
                          cond='Not Recieved';
                          load_data(page,limit,sort,from,to,items,location,cond);
                      });
                       //sendback
                      $(document).on('click', '#send_ord', function(){
                          cond='Send Back';
                          load_data(page,limit,sort,from,to,items,location,cond);
                      });
                      //for default page load 
                      
                      load_data(page,limit,sort,from,to,items,location,cond);
                    });
                 });
            
                  //condition
                  //all
                  $(document).on('click', '#all_ord', function(){
                      cond='all';
                      //search 
                      var items = $('#items').val();
                      var location = document.getElementById("location").value;
                      
                      //others
                      from=document.getElementById("fromdate").value;
                      to=document.getElementById("todate").value;
                      var limit=document.getElementById("limit").value;
                      var sort=document.getElementById("sort").value;
                      var page = $(this).data('page_number');
                      load_data(page,limit,sort,from,to,items,location,cond);
                  });
                  //pending
                  $(document).on('click', '#pen_ord', function(){
                      cond='Pending';
                      //search 
                      var items = $('#items').val();
                      var location = document.getElementById("location").value;
                      
                      //others
                      from=document.getElementById("fromdate").value;
                      to=document.getElementById("todate").value;
                      var limit=document.getElementById("limit").value;
                      var sort=document.getElementById("sort").value;
                      var page = $(this).data('page_number');
                      load_data(page,limit,sort,from,to,items,location,cond);
                      
                  });
                 //rec
                  $(document).on('click', '#rec_ord', function(){
                      cond='Recieved';
                      //search 
                      var items = $('#items').val();
                      var location = document.getElementById("location").value;
                      
                      //others
                      from=document.getElementById("fromdate").value;
                      to=document.getElementById("todate").value;
                      var limit=document.getElementById("limit").value;
                      var sort=document.getElementById("sort").value;
                      var page = $(this).data('page_number');
                      load_data(page,limit,sort,from,to,items,location,cond);
                  });
                   //not rec
                  $(document).on('click', '#nrec_ord', function(){
                      cond='Not Recieved';
                      //search 
                      var items = $('#items').val();
                      var location = document.getElementById("location").value;
                      
                      //others
                      from=document.getElementById("fromdate").value;
                      to=document.getElementById("todate").value;
                      var limit=document.getElementById("limit").value;
                      var sort=document.getElementById("sort").value;
                      var page = $(this).data('page_number');
                      load_data(page,limit,sort,from,to,items,location,cond);
                  });
                   //send
                  $(document).on('click', '#send_ord', function(){
                      cond='Send Back';
                      //search 
                      var items = $('#items').val();
                      var location = document.getElementById("location").value;
                      
                      //others
                      from=document.getElementById("fromdate").value;
                      to=document.getElementById("todate").value;
                      var limit=document.getElementById("limit").value;
                      var sort=document.getElementById("sort").value;
                      var page = $(this).data('page_number');
                      load_data(page,limit,sort,from,to,items,location,cond);
                  });
                  
                  
                   //unbook
    $(document).on('change', '#unbookopt', function()
    {
        var $ele = $(this).parent().parent();
        var id = $(this).attr("name"); 
        var sku =$(this).attr("sku");
        var currentRow = $(this).closest("td");
        var option = currentRow.find("#unbookopt").val();
        var war = document.getElementById("location").value;
        
        
        if(option =='Recieved')
        {
            var status="Recieved";
             $.ajax({
                 url:"ordermark.php",
                 method:"POST",
                 data:{id:id, status:status, war:war, sku:sku},
                 success:function(data)
                 {
                    if(data == 1)
                    {
                       toastr.success('Marked Successfully');
                       var cond="all";
                       load_data(1,'10','','','','',war,cond);
                        
                    }
                    if(data == 0)
                    {
                        toastr.error('There might be some error!');
                        
                    }
                  
                 }
            });
            currentRow.find("#unbookopt").val('');
                
        }
        if(option =='Sendback')
        {
            var status="Send Back";
            $.ajax({
                 url:"ordermark.php",
                 method:"POST",
                 data:{id:id, status:status, war:war, sku:sku},
                 success:function(data)
                 {
                    if(data == 1)
                    {
                       toastr.success('Marked Successfully');
                       var cond="all";
                       load_data(1,'10','','','','',war,cond);
                        
                    }
                    if(data == 0)
                    {
                        toastr.error('There might be some error!');
                        
                    }
                  
                 }
            });
            currentRow.find("#unbookopt").val('');
        }
        if(option =='not')
        {
            var status="Not Recieved";
            
             $.ajax({
                 url:"ordermark.php",
                 method:"POST",
                 data:{id:id, status:status, war:war, sku:sku},
                 success:function(data)
                 {
                    if(data == 1)
                    {
                       toastr.success('Marked Successfully');
                       var cond="all";
                       load_data(1,'10','','','','',war,cond);
                        
                    }
                    if(data == 0)
                    {
                        toastr.error('There might be some error!');
                        
                    }
                  
                 }
            });
            currentRow.find("#unbookopt").val('');
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



        
        
        
<?php include ("../include/footer.php"); ?>
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
              <h3 class=" modal-title"> Pack List</h3>
               
            </div>
         <div class="col-md-4 mt-3">
             <!--<select onchange="changeWarehouse()" id="SelectW" class="form-select w-50 f-right">-->
                                
                                 
                                  
             <!--               <option value="SK">Swag Kicks</option><option value="WP">Winpak</option></select>-->
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
                <div class="col-md-6 " style="margin-top:34px;" id="currentbutton">
                    <a href="../Receiving/index.php" class="btn btn-primary-light ">Receive</a>
                    <a href="#" id="" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light curent">Pack </a>
                    <a href="../Receiving/index.php" class="btn btn-primary-light">Extra items </a>
                    <a href="../Receiving/index.php" class="btn btn-primary-light">Received </a>
                    <a href="../Receiving/index.php" class="btn btn-primary-light">Packed </a>
                    
                </div>
                <div class="col-md-6 p-r-20" style="margin-top:30px;">
                    
             
                  <div class="bookmark">
                    <ul>
                            <!--<li>-->
                            <!--    <select id="change" class="form-select"  onchange="Picked(this);">-->
                            <!--      <option value="" selected disabled>Bulk Action</option>-->
                            <!--      <option value="Reason for deallocation">Pick</option>-->
                            <!--      <option value="Reason for deallocation">Not Found</option>-->
                                 
                                  
                            <!--</select>-->
                            <!--</li>-->
                        
                            <li><button class="dropbtn"><i class="icon-reload" id="ref"></i></button></li>

                              <li><div class="dropdown">
                            <button class="dropbtn" onmouseover="JSDropDown()"><i class="fa fa-sliders"></i></button>
                            <div class="dropdown-content">
                            <a style=" background-color: #e0e3ec; "><b>Show Rows</b></a>
                            
                             <select id="limit" class="form-control">
                                  <option value="10">10</option>
                                  <option value="20">20</option>
                                  <option value="50">50</option>
                                  <option value="100">100</option>
                                  <option value="500">500</option>
                                  <option value="1000">All</option>
                            </select>
                            <a style=" background-color: #e0e3ec; "><b>Sort By Order Date</b></a>
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
               <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >
            	<br>
            	<input id="" type="text" style="visibility: hidden;" >
            </th>
          <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Sno
            	<br>
            	<input type="text" style="visibility: hidden;">
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Order#
            	<br>
            	<input id="ordernum" type="text">
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Tracking
            	<br>
            	<input id="track" type="text" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Courier
            	<br>
            	<input type="text" style="visibility: hidden;">
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Customer
            	<br>
            	<input id="customer" type="text" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">City
            	<br>
            	<input id="city" type="text" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Item(s)
            	<br>
            	<input id="items" type="text"  >
            </th>
             <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Amount
            	<br>
            	<input type="text" style="visibility: hidden;">
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Date
            	<br>
            	<input type="text" style="visibility: hidden;">
            </th>
              <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">
            	<br>
            	<input type="text" style="visibility: hidden;">
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
      
      
    var cond="Pick";
    load_data(1,'','10','','','','');
    
    var count=0;
    function load_data(page, ordernum = '', limit,sort,from,to, items='')
    {
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{page:page, ordernum:ordernum, limit:limit, sort:sort, from:from, to:to, items:items},
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
      var items = $('#items').val();
      //others
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      var page = $(this).data('page_number');
     
      //for default page load 
      load_data(page,ordernum,limit,sort,from,to,items);
 
    });
        
    //ordernum'

    $(document).on('change', '#ordernum', function(){
      var ordernum = $('#ordernum').val();
      load_data(1, ordernum);
    });
    
    
    //items
    $(document).on('change', '#items', function(){
      var ordernum = $('#ordernum').val();
      var items = $('#items').val();
      //others
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      var page = $(this).data('page_number');
     
      //for default page load 
      load_data(page,ordernum,limit,sort,from,to,items);
    });
    
    //tarck
    $(document).on('change', '#track', function(){
      var track = $('#track').val();
      $.ajax({
            url:"fetch.php",
            method:"POST",
            data:{track:track},
            success:function(data)
            {
              $('#dynamic_content').html(data);
            }
        });
    });
    
    //customer
    $(document).on('change', '#customer', function(){
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
    $(document).on('change', '#city', function(){
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
    
    

    //limit 
    $(document).on('click', '#limit', function(){
     //search 
      var ordernum = $('#ordernum').val();
      var items = $('#items').val();
      //others
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      var page = $(this).data('page_number');
    
      //for default page load 
      load_data(page,ordernum,limit,sort,from,to,items);
    });
    
    //sort 
    $(document).on('click', '#sort', function(){
    //search 
      var ordernum = $('#ordernum').val();
      var items = $('#items').val();
      //others
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      var page = $(this).data('page_number');
      
      //for default page load 
      load_data(page,ordernum,limit,sort,from,to,items);
    });
    
    //date
    $("#fromdate").change(function()
    {
      var page = $(this).data('page_number');
      //search 
      var ordernum = $('#ordernum').val();
      var items = $('#items').val();
      //others
      from=document.getElementById("fromdate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      
        $("#todate").change(function()
        {
            to=document.getElementById("todate").value;
            //for default page load 
            load_data(page,ordernum,limit,sort,from,to,items,cond);
        });
    });
    
    
    $(document).on('click', '#ref', function(){
        
        toastr.info('Refreshed');
        //search 
        var ordernum = $('#ordernum').val("");
        var items = $('#items').val("");
        from=document.getElementById("fromdate").value='';
        to=document.getElementById("todate").value='';
        var limit=document.getElementById("limit").value='10';
        var sort=document.getElementById("sort").value='DESC';
        load_data(1,'','10','','','','');
     });
     
      
       $(document).on('click', '.pack_data', function(){
       var $ele = $(this).parent().parent();
       var id = $(this).attr("id"); 
        $.ajax({  
                    url:"mark.php",  
                    method:"POST",  
                    data:{id:id},  
                    success:function(data)
                    {  
                        toastr.success('Packed Successfully!');
                        $ele.fadeOut(500,function(){
                        $(this).remove();
                        });
                        load_data(1,'','10','','','','');
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
// function fnExcelReport()
// {
    
//     var tab_text="<table border='2px'><tr bgcolor='#878780'>  <th>Order</th><th>Customer</th><th>City</th><th>Items</th><th>Amount</th><th>Status</th><th>Date</th></tr>";
//     var textRange; var j=0;
//     tab = document.getElementById('allproduct'); // id of table
    
    
    

//     for(j = 0 ; j < tab.rows.length ; j++) 
//     {   
//         console.log();
//         tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
//         //tab_text=tab_text+"</tr>";
//     }

//     tab_text=tab_text+"</table>";
//     tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
//     tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
//     tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params
//     tab_text= tab_text.replace(/<select[^>]*>|<\/select>/gi, ""); // reomves select params
//     tab_text= tab_text.replace(/Confirm Hold Cancel/gi, ""); // reomves select params
    
//     // tab_text= tab_text.replace(/Confirm/gi,"");
//     // tab_text= tab_text.replace(/Hold/gi,"");
//     // tab_text= tab_text.replace(/Cancel/gi,"");
     

//     var ua = window.navigator.userAgent;
//     var msie = ua.indexOf("MSIE "); 

//     if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
//     {
//         txtArea1.document.open("txt/html","replace");
//         txtArea1.document.write(tab_text);
//         txtArea1.document.close();
//         txtArea1.focus(); 
//         sa=txtArea1.document.execCommand("SaveAs",true);
//     }  
//     else                 //other browser not tested on IE 11
//         sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

//     return (sa);
// }

  
</script>
<script>
            
            (function(){
 
  
  $("clickT").on("click", function() {
    $(".onhover-show-div1").fadeToggle( "fast");
  });
  
})();
        </script>
        
        
        
        
<?php include ("../include/footer.php"); ?>
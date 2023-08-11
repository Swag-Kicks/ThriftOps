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
                <a href="New.php" id="newupload" class="btn btn-primary-light " >Newly Uploaded</a>
                <a href="Return.php" id="return"  class="btn btn-primary-light " >Returned </a>
                 <a href="Order.php" id="ordercancel"  class="btn btn-primary-light" >Order Cancelled </a>
                <a href="#" id="transefer" class="btn btn-primary-light curent" >Transferred</a>
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
                <div class="col-md-8 " style="margin-top:34px;">
              <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                      <li class="nav-item"><a class="nav-link active" id="all_ord" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true">All<span id="allc"></span></a></li>
                      <li class="nav-item"><a class="nav-link" id="pen_ord" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false">No Action<span id="pendingc"></span></a></li>
                      <li class="nav-item"><a class="nav-link" id="conf_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Moved<span id="confirmc"></span> </a></li>
                    </ul>
                </div>
                <div class="col-md-4 p-r-20" style="margin-top:30px;">
                    
             
                  <div class="bookmark">
                    <ul>
                            <li>
                                <select id="allmark" class="form-select">
                                  <option value="" selected disabled>Bulk Action</option>
                                  <option value="Recieved">Mark Recieved</option>
                                  <option value="Sendback">Send Back</option>
                                  <option value="Notrecieved">Not Recieved</option>
                                 
                                  
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

                </div>
                <div class='dataTables_scrollHeadInner' style='box-sizing: content-box; width: 1787.12px; padding-right: 0px;'>
        <table class='dataTable no-footer' role='grid' style='margin-left: 0px; width: 1787.12px;'>
              <thead>
    
          <tr id='test' style='background-color:#E0E3EC;' role='row'>
              <th class='res'>
            	<br>
            	 <input class='checkbox1' id='allcb' type='checkbox' >
            </th>
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
            	<input type='text' id="lname">
            </th>
            <th class='res' tabindex='0' aria-controls='example' rowspan='1' colspan='1'>Product Type 
            	<br>
            	
            		 <select class='form-control form-select form-control-secondary f-left' id='cat'>
                <option disabled selected value=''></option>";
                    <?php 
                    $records = mysqli_query($mysql, "SELECT Category_ID,Name FROM `Category`");                              
                    while($data = mysqli_fetch_array($records))
                    {
                        echo "<option value='". $data['Category_ID'] ."'>" .$data['Name'] ."</option>";
                       
                    
                    }
                      ?>              
                </select>
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
		$('[name="check[]"]').prop('checked', this.checked);
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
                                url:"transfercount.php",
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
                            url:"transfercount.php",
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
                    
                   
                    function load_data(page, limit,sort,from,to, items='', location,cond,cat)
                    {
                      $.ajax({
                        url:"transeferfetch.php",
                        method:"POST",
                        data:{page:page, limit:limit, sort:sort, from:from, to:to, items:items, location:location, cond:cond, cat:cat},
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
                        to=document.getElementById("todate").value='';
                        var limit=document.getElementById("limit").value='10';
                        var sort=document.getElementById("sort").value='DESC';
                        $('input[id=allcb]').trigger('click'); 
                        var cond="all";
                        load_data(1,'10','','','','',location1,cond);
                    });
        
                    $(document).on('click', '.page-link', function()
                    {
                      //search 
                      var items = $('#items').val();
                      var location = document.getElementById("location").value;
                      var cat = document.getElementById("cat").value;
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
                          load_data(page,limit,sort,from,to,items,location,cond,cat);
                      });
                      //pending
                      $(document).on('click', '#pen_ord', function(){
                          cond='No Action';
                          load_data(page,limit,sort,from,to,items,location,cond,cat);
                          
                      });
                      //confirmed
                      $(document).on('click', '#conf_ord', function(){
                          cond='Moved';
                          load_data(page,limit,sort,from,to,items,location,cond,cat);
                      });
                      //for default page load 
                      load_data(page,limit,sort,from,to,items,location,cond,cat);
                 
                    });
                    
                    
                    //items
                    $('#items').keyup(function(){
                      //search 
                      var items = $('#items').val();
                      var location = document.getElementById("location").value;
                      var cat = document.getElementById("cat").value;
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
                    
                    
                    
                     //location name
                    $('#lname').keyup(function(){
                      //search 
                      var name = $('#lname').val();
                      var location = document.getElementById("location").value;
                      var cat = document.getElementById("cat").value;
                      //others
                      from=document.getElementById("fromdate").value;
                      to=document.getElementById("todate").value;
                      var limit=document.getElementById("limit").value;
                      var sort=document.getElementById("sort").value;
                      var page = $(this).data('page_number');
                      
                      $.ajax({
                        url:"transeferfetch.php",
                        method:"POST",
                        data:{location:location, cond:cond , name:name},
                        success:function(data)
                        {
                          $('#dynamic_content').html(data);
                          
                          
                        }
                      });
                      
                      if(name=='')
                      {
                          load_data(page,limit,sort,from,to,items,location,'all');
                      }
                      
                      
                      
                    });
                    
                     //category
                     $(document).on('click', '#cat', function(){
                      //search 
                      var items = $('#items').val();
                      var location = document.getElementById("location").value;
                      var cat = document.getElementById("cat").value;
                      //others
                      from=document.getElementById("fromdate").value;
                      to=document.getElementById("todate").value;
                      var limit=document.getElementById("limit").value;
                      var sort=document.getElementById("sort").value;
                      var page = $(this).data('page_number');
                      load_data(page,limit,sort,from,to,items,location,cond,cat);
                      
                    });
                    
                
                //limit 
                $(document).on('click', '#limit', function(){
                  var page = $(this).data('page_number');
                  //search 
                  var items = $('#items').val();
                  var location = document.getElementById("location").value;
                  var cat = document.getElementById("cat").value;
                  //others
                  from=document.getElementById("fromdate").value;
                  to=document.getElementById("todate").value;
                  var limit=document.getElementById("limit").value;
                  var sort=document.getElementById("sort").value;
                  
                  
                  //condition
                  //all
                  $(document).on('click', '#all_ord', function(){
                      cond='all';
                      load_data(page,limit,sort,from,to,items,location,cond,cat);
                  });
                  //pending
                  $(document).on('click', '#pen_ord', function(){
                      cond='No Action';
                      load_data(page,limit,sort,from,to,items,location,cond,cat);
                      
                  });
                  //confirmed
                  $(document).on('click', '#conf_ord', function(){
                      cond='Moved';
                      load_data(page,limit,sort,from,to,items,location,cond,cat);
                  });
                  //for default page load 
                  
                  load_data(page,limit,sort,from,to,items,location,cond,cat);
                });
            
                //sort 
                $(document).on('click', '#sort', function(){
                  var page = $(this).data('page_number');
                  //search 
                  var cat = document.getElementById("cat").value;
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
                      load_data(page,limit,sort,from,to,items,location,cond,cat);
                  });
                  //pending
                  $(document).on('click', '#pen_ord', function(){
                      cond='No Action';
                      load_data(page,limit,sort,from,to,items,location,cond,cat);
                      
                  });
                  //confirmed
                  $(document).on('click', '#conf_ord', function(){
                      cond='Moved';
                      load_data(page,limit,sort,from,to,items,location,cond,cat);
                  });
                  //for default page load 
                  
                  load_data(page,limit,sort,from,to,items,location,cond,cat);
                });
            
                //date
                $("#fromdate").change(function()
                {
                  var page = $(this).data('page_number');
                  //search 
                  var items = $('#items').val();
                  var location = document.getElementById("location").value;
                  var cat = document.getElementById("cat").value;
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
                          load_data(page,limit,sort,from,to,items,location,cond,cat);
                      });
                      //pending
                      $(document).on('click', '#pen_ord', function(){
                          cond='No Action';
                          load_data(page,limit,sort,from,to,items,location,cond,cat);
                          
                      });
                      //confirmed
                      $(document).on('click', '#conf_ord', function(){
                          cond='Moved';
                          load_data(page,limit,sort,from,to,items,location,cond,cat);
                      });
                      //for default page load 
                      
                      load_data(page,limit,sort,from,to,items,location,cond,cat);
                    });
                 });
            
                  //condition
                  //all
                  $(document).on('click', '#all_ord', function(){
                      cond='all';
                      //search 
                      var items = $('#items').val();
                      var location = document.getElementById("location").value;
                      var cat = document.getElementById("cat").value;
                      //others
                      from=document.getElementById("fromdate").value;
                      to=document.getElementById("todate").value;
                      var limit=document.getElementById("limit").value;
                      var sort=document.getElementById("sort").value;
                      var page = $(this).data('page_number');
                      load_data(page,limit,sort,from,to,items,location,cond,cat);
                  });
                  //pending
                  $(document).on('click', '#pen_ord', function(){
                      cond='No Action';
                      //search 
                      var items = $('#items').val();
                      var location = document.getElementById("location").value;
                      var cat = document.getElementById("cat").value;
                      //others
                      from=document.getElementById("fromdate").value;
                      to=document.getElementById("todate").value;
                      var limit=document.getElementById("limit").value;
                      var sort=document.getElementById("sort").value;
                      var page = $(this).data('page_number');
                      load_data(page,limit,sort,from,to,items,location,cond,cat);
                      
                  });
                  //confirmed
                  $(document).on('click', '#conf_ord', function(){
                      cond='Moved';
                      //search 
                      var items = $('#items').val();
                      var location = document.getElementById("location").value;
                      var cat = document.getElementById("cat").value;
                      //others
                      from=document.getElementById("fromdate").value;
                      to=document.getElementById("todate").value;
                      var limit=document.getElementById("limit").value;
                      var sort=document.getElementById("sort").value;
                      var page = $(this).data('page_number');
                      load_data(page,limit,sort,from,to,items,location,cond,cat);
                  });
                  
                  //mark
                  $(document).on('change', '#allmark', function()
                    {
                        var option = document.getElementById("allmark").value;
                        var war = document.getElementById("location").value;
                        if(option =='Recieved')
                        {
                            var id = [];
                            var status="Recieved";
                            $(':checkbox:checked').each(function(i){
                                id[i] = $(this).val();
                            });
                                   
                            if(id.length === 0) //tell you if the array is empty
                            {
                                toastr.error("Please Select at least one Entry");
                            }
                            else
                            {
                                $.ajax({
                                    url:'transfermark.php',
                                    method:'POST',
                                    data:{id:id, status:status, war:war},
                                    success:function()
                                    {
                                        for(var i=0; i<id.length; i++)
                                        {
                                            $('tr#'+id[i]+'').css('background-color', '#ccc');
                                            $('tr#'+id[i]+'').fadeOut('slow');
                                               
                                        }
                                        toastr.success('Marked Successfully');
                                        var cond="all";
                                        load_data(1,'10','','','','',war,cond);
                                    }
                             
                                });
                            }
                         
                            
                        }
                        if(option =='Sendback')
                        {
                           var id = [];
                           var status="Send Back";
                            $(':checkbox:checked').each(function(i){
                                id[i] = $(this).val();
                            });
                                   
                            if(id.length === 0) //tell you if the array is empty
                            {
                                toastr.error("Please Select at least one Entry");
                            }
                            else
                            {
                                $.ajax({
                                    url:'transfermark.php',
                                    method:'POST',
                                    data:{id:id, status:status, war:war},
                                    success:function()
                                    {
                                        for(var i=0; i<id.length; i++)
                                        {
                                            $('tr#'+id[i]+'').css('background-color', '#ccc');
                                            $('tr#'+id[i]+'').fadeOut('slow');
                                               
                                        }
                                        toastr.success('Marked Successfully');
                                        var cond="all";
                                        load_data(1,'10','','','','',war,cond);
                                    }
                             
                                });
                            }
                        }
                        if(option =='not')
                        {
                           var id = [];
                           var status="Not Recieved";
                            $(':checkbox:checked').each(function(i){
                                id[i] = $(this).val();
                            });
                                   
                            if(id.length === 0) //tell you if the array is empty
                            {
                                toastr.error("Please Select at least one Entry");
                            }
                            else
                            {
                                $.ajax({
                                    url:'transfermark.php',
                                    method:'POST',
                                    data:{id:id, status:status, war:war},
                                    success:function()
                                    {
                                        for(var i=0; i<id.length; i++)
                                        {
                                            $('tr#'+id[i]+'').css('background-color', '#ccc');
                                            $('tr#'+id[i]+'').fadeOut('slow');
                                               
                                        }
                                        toastr.success('Marked Successfully');
                                        var cond="all";
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
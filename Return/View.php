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
              <h3 class=" modal-title"> Returns</h3>
               
            </div>
            <div class="col-md-4 mt-2">
             <a href="#"  name="pick"  id="initiate" class="btn btn-primary-light m-l-15 f-right" >Initiate Return</a>
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
                      <li class="nav-item"><a class="nav-link" id="pen_ord" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false">Exchange <span id="pendingc"></span></a></li>
                      <li class="nav-item"><a class="nav-link" id="conf_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Reattempt <span id="confirmc"></span> </a></li>
                      <li class="nav-item"><a class="nav-link" id="ret_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Returned <span id="returnc"></span> </a></li>
                
                    </ul>
                </div>
                <div class="col-md-3 p-r-20" style="margin-top:30px;">
                    
             
                  <div class="bookmark">
                    <ul>
                           <li>
                                <select id="bulk" class="form-select"  >
                                  <option value="" selected disabled>Bulk Action</option>
                                          <option value="marked">Mark As Received</option>
                                          <!--<option value="wrong">Wrong item Received</option>-->
                                 
                                  
                            </select>
                            </li>
                        
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
               <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">
            	<br>
            	 <input class="checkbox1" id="allcb" type="checkbox">
            </th>
          <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Orders
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
         </div>
      </div>
   </div>
   
   <!-- Container-fluid Ends-->
   
   
</div>
<div class="modal fade show" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenter" aria-modal="true" role="dialog">
                      <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                              
                            <h4 class="modal-title" id="myLargeModalLabel"><b>Initiate a Return</b></h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
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
                              <div class="row">
                             <div class="card col-md-7">
                                  
               
                      
                      <div class="card-body cardshadow ">
                                         <div class="row">
                                             <div class="mb-3 col-sm-8">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Order#</label>
                                                 <input class="form-control" type="text" name="orderno" aria-describedby="" placeholder="Order no">
                                                
                                              
                                             </div>
                                               <div class=" col-sm-4">
                                                 <label class="col-form-label pt-0 invisible" for="exampleInputEmail1">&lt;&gt;</label>
                                                 <button class="btn btn-primary f-right" type="button" onclick="fetchOrder()" style="font-size: 12px;">Fetch Details</button>
                                              
                                             </div>
                                             </div>
                                             <div class="col-md-12 row">
                                              <div id="orderdetails">
                                                  
                                              </div>
                                                 
                                                 
                                                 
                                             <div id="orderfooter">
                                                 
                                             </div>    
                                            
                                                 
                                             </div>
                                             
                                             
                                           
                                            
                                                         <div class="col-md-12 row" id="customerdetails" style="display:none">
                                        <div class="col-md-6"> <label class="col-form-label pt-0" for="exampleInputEmail1">Customer</label>  <input style="background-color:" class="form-control" type="text" name="customer" aria-describedby="" disabled=""><br> <label class="col-form-label pt-0" for="exampleInputEmail1">Contact</label><input class="form-control" type="text" name="contact" aria-describedby="" disabled=""></div>
                                        <div class="col-md-6">   <label class="col-form-label pt-0" for="exampleInputEmail1">Order Date</label> <input class="form-control" type="text" name="odate" aria-describedby="" disabled=""><br>  <label class="col-form-label pt-0" for="exampleInputEmail1">Return Eligibility</label><input class="form-control" type="text" name="returnE" aria-describedby="" disabled=""></div>
                                             </div>
                                             
                                                 
                                                 
                                             
                                                   
                                            
                                       
                                             </div>
                   
                   
                   
                   
                        
                   
                   
                   
                              </div>
                               <div class="card col-md-5">
                                  
                
                      
                      <div class="card-body cardshadow ">
                                         <div class="col-sm-12 row">
                                             <div class="mb-3 col-sm-12">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Return Type</label>
                                                 <select class="form-control form-select" name="returntype" id="returntype" onchange="changeselect()">
                                                   <option value=" " disabled="" selected="">Select Return Type </option>
                                                   <option value="1">Refund</option>
                                                   <option value="2">Exchange</option>
                                                    <option value="3">Reattempt</option>
                                                    <option value="4">Returned</option>
                                                </select>
                                               
                                              
                                             </div>
                                              
                                             </div>
                                             
                                                   
                                            
                                       
                                             </div>
                                             
                                             <div class="card-body cardshadow " id="accountdetails" style="display: none;">
                                                        <h6>Account Details</h6>
                                                        <br>
                                         <div class="mb-3 col-sm-12 row">
                                             <div class=" mb-3 col-sm-6">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Mode of Payment</label>
                                                 <select class="form-control form-select" id="moc" name="moc">
                                                   <option value=" " disabled="" selected="">Select Return Type </option>
                                                   <option value="Easypaisa">Easypaisa</option>
                                                   <option value="Jazzcash">Jazzcash</option>
                                                    
                                                </select>
                                               
                                              
                                             </div>
                                               <div class="mb-3 col-sm-6">
                                               
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Account Number</label>
                                                <input class="form-control" type="text" name="cnumber" aria-describedby="" placeholder="Order no">
                                               
                                              
                                             </div>
                                              
                                             </div>
                                             
                                                   
                                            
                                       
                                             </div>
                                           
                                           
                                           
                                            <div class="card-body cardshadow " id="exchangedetails" style="display: none;">
                                                        <h6>Exchange Order</h6>
                                                        <br>
                                         <div class="mb-3 col-sm-12 row">
                                            <label class="col-form-label pt-0" for="exampleInputEmail1">Order Number</label>
                                                <input class="form-control" type="text" name="exchangeO" aria-describedby="" placeholder="Order no">
                                              
                                             </div>
                                             
                                                   
                                            
                                       
                                             </div>
                                             
                   
                                 
                              </div>
                                    </div>
                              <div style="float:right;">
                                    <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal" aria-label="Close">Close</button>
                                      <button class="btn btn-primary" type="button" id="initbutton" onclick="initReturn()">Initiate</button>
                                      
                                     
                              </div>
                              
                          </div>
                        </div>
                      </div>
                    </div>

<script>
var from;
var to;
$("#accountdetails").hide();
$("#exchangedetails").hide();


const changeselect = () =>{
    
      var selectvalue = $("select[name=returntype]").val();
  
      if(selectvalue == "1"){
         
         
          $("#accountdetails").show();
$("#exchangedetails").hide();
          
      }else if(selectvalue == "2"){
          
          
          
             $("#exchangedetails").show();
             $("#accountdetails").hide();
          
      }
    
}
    
    const fetchOrder = () =>{
    
    
    
       var ordernumber = $("input[name=orderno]").val();
        var settings = {
          "url": "Api/fetchorder.php",
          "data":{ordernumber:ordernumber},
          "method": "POST",
          "timeout": 0,
        };

        $.ajax(settings).done(function (response) 
        {
          var JRES = JSON.parse(response)
          
               $("#customerdetails").removeAttr("style");
              $("input[name=customer]").val(JRES[0].Name);
              $("input[name=odate]").val(JRES[0].Date);
              $("input[name=returnE]").val();
              $("input[name=contact]").val(JRES[0].Contact);
                $("input[name=cnumber]").val(JRES[0].Contact);
      
  
    
             var price = parseInt(JRES[0].Total)
    

            var someDate = new Date(JRES[0].Date);
            someDate.setDate(someDate.getDate() + 70); //number  of days to add, e.x. 15 days
            var dateFormated = moment(someDate).format('DD-MM-YYYY')
            
            var todayDate = new Date()
            var todayDate2 = moment(todayDate).format('DD-MM-YYYY')
            // console.log(   typeof(todayDate2)   );



            var today = moment(todayDate2),
                 specifiedDate = moment(dateFormated);
                //  console.log("ttt",today.isAfter(specifiedDate))
    
    
  
    if (today.isAfter(specifiedDate)){
          $("input[name=returnE]").val("Eligible");
    }
    else
    {
       $("input[name=returnE]").val("Eligible");
    }
    
    
    
    for (var i = 0; i < JRES.length; i++) 
    {

        // console.log("JRES",JRES)
          
        document.getElementById("orderdetails").innerHTML +=   `<hr>
                                                 <div class="media mb-3">
                                                <input style="height:15px;width:15px;align-self: center;" type="checkbox" value="${JRES[i].SKU}">
                                                <img class="img-cstm1 ms-4 me-4" alt="" title="" src="${JRES[i].Image_1} ">
                                                  <div class="media-body mt-2">
                                                      <span><b>${JRES[i].Title} </b></span><br>
                                                      <span>${JRES[i].SKU}</span>
                                                
                                                  </div>
                                                  <p class="f-14"><b>${JRES[i].Price}</b></p>
                                                </div>
                                           <hr/>`

    }
        document.getElementById("orderfooter").innerHTML = ''
        document.getElementById("orderfooter").innerHTML =  `<div class="col-md-8">
                                                    
                                                </div>
                                                <div class="">
                                                    <span style="position:relative;left:201%%" class=" col-from-label f-right"><b>Total</b>  Rs: ${JRES[0].Total}</span>
                                                
                                                </div>`
  
  
  
});  
}


const initReturn = () =>{
    
    
   var status =  $("#returntype option:selected").text();
   
   
  var moc = $("select[name=moc]").val();
    
    var ordernumber = $("input[name=orderno]").val();
    var customer = $("input[name=customer]").val();
    var account = $("input[name=cnumber]").val();
    var exchange = $("input[name=exchangeO]").val();
    var shopid=[];
    $(':checkbox:checked').each(function(i)
     {
        shopid[i] = $(this).val();
    });
    var form = new FormData();
    form.append("order", ordernumber);
    form.append("status", status);
    form.append("exchange", exchange);
    form.append("sku", shopid);
    form.append("method", moc);
    form.append("account", account);
    form.append("name", customer);
    
    var settings = {
      "url": "https://backup.thriftops.com/Return/Api/init.php",
      "method": "POST",
      "timeout": 0,
      "processData": false,
      "mimeType": "multipart/form-data",
      "contentType": false,
      "data": form
    };


    $.ajax(settings).done(function (response) 
    {
        if(response==0)
        {
            toastr.error('There might be some error!');
        }
        if(response==1)
        {
            $('#exampleModalCenter').modal('toggle');
            toastr.success('Order Initiated Successfully');
            $("#customerdetails").removeAttr("style");
            $("input[name=customer]").val('');
            $("input[name=odate]").val('');
            $("input[name=returnE]").val();
            $("input[name=contact]").val('');
            $("input[name=cnumber]").val('');
            setTimeout(function(){
               window.location.reload(1);
            }, 2000);
        }
        
     
        // Swal.fire({
        //   position: 'top-center',
        //   icon: 'success',
        //   title: 'Return Initiated Successfully',
        //   showConfirmButton: false,
        //   timer: 1500
        // })
      
      
    });

}

function JSDropDown() {
            var x = document.getElementById("limit").options.length;
            document.getElementById("limit").size = x;
            
            var y = document.getElementById("sort").options.length;
            document.getElementById("sort").size = y;
            
        }
  $(document).ready(function(){
    

   function enable()
    {
        $('#all_ord').prop('aria-selected', true);
        $('#pen_ord').prop('aria-selected', false);
        $('#conf_ord').prop('aria-selected', false);
        $('#ret_ord').prop('aria-selected', false);
    }
    
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
                        var ret=test[2];
                        var all=test[3];
                       
                        
                        $('#pendingc').html('('+pending+')');
                        $('#confirmc').html('('+confirm+')');
                        $('#returnc').html('('+ret+')');
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
                    var ret=test[2];
                    var all=test[3];
                   
                    
                    $('#pendingc').html('('+pending+')');
                    $('#confirmc').html('('+confirm+')');
                    $('#returnc').html('('+ret+')');
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
    
    $(document).on('click', '#initiate', function()
    {
        $('#exampleModalCenter').modal('toggle');
    });
    $(document).on('click', '#allcb', function()
    {
		$('[name="check[]"]').prop('checked', this.checked);
	});
    

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
      //exchage
      $(document).on('click', '#pen_ord', function(){
          cond='Exchange';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
          
      });
      //reattempt
      $(document).on('click', '#conf_ord', function(){
          cond='Reattempt';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
      });
      //returned
      $(document).on('click', '#ret_ord', function(){
          cond='Returned';
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
      //exchage
      $(document).on('click', '#pen_ord', function(){
          cond='Exchange';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
          
      });
      //reattempt
      $(document).on('click', '#conf_ord', function(){
          cond='Reattempt';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
      });
      //returned
      $(document).on('click', '#ret_ord', function(){
          cond='Returned';
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
      //exchage
      $(document).on('click', '#pen_ord', function(){
          cond='Exchange';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
          
      });
      //reattempt
      $(document).on('click', '#conf_ord', function(){
          cond='Reattempt';
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
      });
      //returned
      $(document).on('click', '#ret_ord', function(){
          cond='Returned';
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
          //exchage
          $(document).on('click', '#pen_ord', function(){
              cond='Exchange';
              load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
              
          });
          //reattempt
          $(document).on('click', '#conf_ord', function(){
              cond='Reattempt';
              load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
          });
          //returned
          $(document).on('click', '#ret_ord', function(){
              cond='Returned';
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
          
          //others
          from=document.getElementById("fromdate").value;
          to=document.getElementById("todate").value;
          var limit=document.getElementById("limit").value;
          var sort=document.getElementById("sort").value;
          var page = $(this).data('page_number');
          load_data(page,ordernum,limit,sort,from,to,customer,city,items,amount,cond);
      });
      //exchange
      $(document).on('click', '#pen_ord', function(){
          cond='Exchange';
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
      $(document).on('click', '#conf_ord', function(){
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
      //returned
      $(document).on('click', '#ret_ord', function(){
          cond='Returned';
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
    
     $(document).on('change', '#mark', function()
    {
        
       var $ele = $(this).parent().parent();
       var id = $(this).attr("name"); 
       var sku = $(this).attr("sku"); 
       var currentRow = $(this).closest("td");
       var stats = currentRow.find("#mark").val();
       
        $.ajax({  
                    url:"Save.php",  
                    method:"POST",  
                    data:{id:id, stats:stats, sku:sku},  
                    success:function(data)
                    {  
                        if(data == 1)
                        {
                            toastr.success('Saved Successfully!');
                            $ele.fadeOut(900,function(){
                            $(this).remove();
                            });
                             var cond="all";
                             load_data(1,'','10','','','','',cond);
                            enable();
                        }
                        if(data == 0)
                        {
                            toastr.error('There might be some error!');
                        }
                    }
                });
    }); 
     //bulk
    $(document).on('change', '#bulk', function()
    {
        var val=document.getElementById("bulk").value;
        if(val=='marked')
        {
          var id = [];
   
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
                     url:'bmark.php',
                     method:'POST',
                     data:{id:id},
                     success:function()
                     {
                          for(var i=0; i<id.length; i++)
                          {
                              $('tr#'+id[i]+'').css('background-color', '#ccc');
                              $('tr#'+id[i]+'').fadeOut('slow');
                               
                          }
                        toastr.success('Received Successfully');
                        load_data(1);
                     }
                 
                });
            }
        }
        if(val=='wrong')
        {
            var id = [];
   
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
                     url:'bnot.php',
                     method:'POST',
                     data:{id:id},
                     success:function()
                     {
                          for(var i=0; i<id.length; i++)
                          {
                              $('tr#'+id[i]+'').css('background-color', '#ccc');
                              $('tr#'+id[i]+'').fadeOut('slow');
                               
                          }
                        toastr.success('Received Successfully');
                        load_data(1);
                     }
                 
                });
            }
            
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
        // console.log();
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params
    tab_text= tab_text.replace(/<select[^>]*>|<\/select>/gi, ""); // reomves select params
    tab_text= tab_text.replace(/Confirm Hold Cancel/gi, ""); // reomves select params
     
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))     
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
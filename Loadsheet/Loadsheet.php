<?php  
   session_Start();
   ?>
<?php include ("../include/header.php"); ?>
<?php include_once("../include/mysql_connection.php");  ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>
<!-- Page Body Start-->
<style>
   td {
   text-align-last: center;
   }
   th {
   text-align-last: center;
   }
</style>
<!--<div class="page-body-wrapper horizontal-menu">-->
<!-- Page Sidebar Ends-->
<div class="page-body">
<div class="container-fluid">
   <div class="page-header">
      <div class="row mt-3">
         <div class="col-md-4">
            <h3 class=" modal-title">Load Sheet</h3>
         </div>
         
         <div class="col-md-4 mt-3">
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
        
         <div class="col-md-2">
              <a href="Print.php" class="btn btn-primary" >View</a>
         </div>
         
         <div class="col-md-2">
             
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
            <div class="row" style="background-color:#F9FCFF;margin:0.8px;">
               <div class="col-md-4 p-r-20" style="margin-top:30px;">
                  <div class="form-group has-search">
                     <span class="fa fa-search form-control-feedback"></span>
                     <input id="search" type="text" class="form-control" placeholder="Search . . . .">
                  </div>
               </div>
               <div class="col-md-7 text-end " style="margin-top:34px;">
                   
                  <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" id="ref" class="btn btn-primary" >Refresh</a>
                  <a href="#" name="pick" id="btnmodal" class="btn btn-primary-light m-l-15 f-right">Generate  New</a>
                  <a href="javascript:void(0)" name="pick" id="addorder" class="btn btn-outline-danger m-l-15 f-right" data-bs-toggle="modal" data-bs-original-title="" title=""><i class="icofont icofont-qr-code"></i> Add via QR Code</a>
               </div>
               <div class="col-md-1" style="margin-top:34px;">
                     <ul>
                        <li>
                           <div class="dropdown">
                              <button class="dropbtn" onmouseover="JSDropDown()"><i class="fa fa-sliders"></i></button>
                              <div class="dropdown-content">
                                 <a style=" background-color: #e0e3ec; "><b>Show Rows</b></a>
                                 <select id="limit" class="form-control" size="6">
                                    <option Selected>10</option>
                                    <option>20</option>
                                    <option>50</option>
                                    <option>100</option>
                                    <option>500</option>
                                    <option>All</option>
                                 </select>
                                 <a style=" background-color: #e0e3ec; "><b>Sort By Order Date</b></a>
                                 <select id="sort" class="form-control" size="2">
                                    <option Selected>DESC</option>
                                    <option>ASC</option>
                                 </select>
                              </div>
                           </div>
                        </li>
                     </ul>
               </div>
            </div>
            <div class="row" style="background-color:#F9FCFF;margin:0.8px">
               <div class="col-md-10 p-r-20">
                  <div class=" " style="margin-top:10px;margin-bottom:25px;" id="currentbutton">
                     <a href="#" id="all" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light curent">All</a>
                     <a href="#" id="postex" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light">Postex </a>
                     <a href="#" id="leopard" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light">Leopard</a>
                     <a href="#" id="rider" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light">Rider </a>
                     <a href="#" id="self" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light">Self Delivery</a>
                     <a href="#" id="call" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light">Call Courier</a>
                     <a href="#" id="Tcs" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light">TCS </a>
                  </div>
               </div>
            </div>
            <div class="table-responsive" id="dynamic_content"></div>
         </div>
         
          <!--Status modal-->
   
                      <!--Barcode modal--> 
            <div id="barcodeModalCenter" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-centered cstm-pop">
               <div class="modal-content" >
                  <div class="modal-body" style="padding: 2rem;padding-top: 3em;">
                     <div class="form-group">
                        <div class="row">
                           <div class="col-md-6 ">
                              <img src="../assets/images/print/print">
                           </div>
                           <div class="col-md-6 f-right t-r">
                              <h3><b>Load Sheet</b></h3>
                           </div>
                             
                        </div>
                        <br><br>
                        <div class="row">
                           <div class="col-md-6">
                              </label><br>
                             <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                      
                                    <input class="form-control" type="text" name="qrcode" id="qrcode" aria-describedby="barcode" placeholder="Search QR code" >
                                  </div>
                                  <div class="mb-3"><a href="#" class="btn btn-primary pull-right" id="dataclear">Clear All</a></div>
                                    
                              </div>
                               
                              </label><br><br>
                              </label><br>
                           </div>
                           <div class="col-md-6 f-right t-r" >
                               <label class="Pon f-18">
                                 Date:&nbsp;
                                 <lable style="font-weight: bold;">
                                 22/11/2022
                              </label>
                              <h4><b>Swagkicks</b></h4>
                              <label class="f-18">B-165, Block D,<br>North Nazimabad,<br> Karachi</label>
                           </div>
                        </div>
                        <table class="table table-striped" id="main">
                           <thead class="table-inverse table-striped">
                              <tr class="text-center">
                                  <td scope="col">S.no</td>
                                 <td scope="col">Order Ref</td>
                                 <td scope="col">Courier</td>
                                 <td scope="col">Tracking#	</td>
                                 <td scope="col">Item Qty</td>
                                 <td scope="col">Amount</td>
                                <td scope="col">Date</td>
                              </tr>
                           </thead>
                           <tbody class="text-center" id="append">
                          </tbody>
                        </table>
                       
                        <div class="modal-footer">
                            <a href="#" class="btn btn-primary pull-right" style="margin-right: 480px;" id="lastclear">Remove</a>
                           <button type="button" class="btn  btn-outline-primary pull-left" data-bs-dismiss="modal">Close</button>
                           <a href="#" class="btn btn-primary pull-right" id="saveload">Save</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
                         <!--Barcode modal-->
      </div>
   </div>
   <!-- Container-fluid Ends-->
</div>
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
     var courier='all';
     load_data(1,'','','10','',courier);
     function load_data(page,from,to,limit,sort,courier)
     {
       $.ajax({
         url:"fetch.php",
         method:"POST",
         data:{
             page:page, 
             from:from,
             to:to,
             limit:limit,
             sort:sort,
             courier:courier
             
         },
         success:function(data)
         {
           $('#dynamic_content').html(data);
         }
       });
     }
     
     $('#search_box').change(function(){
           var query = $('#search_box').val();
           load_data(1, query);
     });
     
      $(document).on('click', '#allcb', function()
         {
     		$('[name="check[]"]').prop('checked', this.checked);
     	});
     
     
     $(document).on('click', '#ref', function(){
        
         toastr.info('Refreshed!');
         load_data(1,'','','10','',courier);
     });
     $(document).on('change', '#search', function()
     {
         var ordernum = $('#search').val();
         $.ajax({
         url:"fetch.php",
         method:"POST",
         data:{
            ordernum:ordernum
         },
         success:function(data)
         {
           $('#dynamic_content').html(data);
         }
         });
     });
     var count=1;
     //QR code
     $(document).on('change', '#qrcode', function()
     {
      var tracking =  document.getElementById("qrcode").value;
      document.getElementById("qrcode").value="";
      $(this).focus();
      $.ajax({
         url:"Append.php",
         method:"POST",
         data:{tracking:tracking},
         success:function(data)
         {
             if(data==1)
             {
                 toastr.error('Order Not Packed Yet');
             }
             if(data==2)
             {
                 toastr.warning('Order Canceled By CS Team');
             }
             if(data==3)
             {
                 toastr.info('Order Exists in this Loadsheet');
             }
             if(data==4)
             {
                 toastr.error('Order Already Marked Dispatched');
             }
            //  else
            //  {
             if(data!=2 && data!=1 && data!=3  && data!=4)
             {
                var merge="<tr><td>"+count+"</td>";
                document.getElementById ("append").insertRow(). innerHTML = merge+data;
                count=count+1;
             }
           
         }
       });
     
    });
    //allclear
     $(document).on('click', '#dataclear', function()
     {
         $("#append").empty();
     });
     //last row clear
     $("#lastclear").click(function ()
     {
        var $tbody = $("#main tbody")
        var $last = $tbody.find('tr:last');
        if($last.is(':first-child'))
        {
            alert('last is the only one')
        }
        else 
        {
            $last.remove()
        }
    });
    //craete load sheet 
     $("#saveload").click(function()
     {
         var orderid= $('input[name="order[]"]').map(function(){ return this.value; }).get();
         var table=document.getElementById ("append").innerHTML;
         
         $.ajax
            ({
                  url: 'Add.php',
                  type: 'POST',
                  data: {
                     orderid:orderid
                  },
                  success: function(response) 
                  {
                          if(response == 0)
                          {
                              toastr.error('There mightbe some issue');
                          }
                      
                          if(response==1)
                          {
                            //  $('#' + pr).children('td[data-target=conf_tag]').text(conf_tag);
                            //  $('#confirm').modal('toggle');
                            //  $("#status").val([1]);
                             load_data(1,'','','10','',courier);
                             $("#barcodeModalCenter").modal('toggle');
                             toastr.success('Created Successfully');
                          }
                    }
            });
     });
    
   
     $(document).on('click', '.page-link', function()
     {
      var page = $(this).data('page_number');
      //others
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      
      //courier
      //all
      $(document).on('click', '#all', function(){
          courier='all';
          load_data(page,from,to,limit,sort,courier);
      });
      //postex
      $(document).on('click', '#postex', function(){
          courier='PostEx';
         load_data(page,from,to,limit,sort,courier);
          
      });
      //leopard
      $(document).on('click', '#leopard', function(){
          courier='Leopard';
          load_data(page,from,to,limit,sort,courier);
      });
      //rider
      $(document).on('click', '#rider', function(){
          courier='Rider';
          load_data(page,from,to,limit,sort,courier);
      });
      //self
      $(document).on('click', '#self', function(){
          courier='Self';
          load_data(page,from,to,limit,sort,courier);
      });
      //call
      $(document).on('click', '#call', function(){
          courier='CallCourier';
          load_data(page,from,to,limit,sort,courier);
      });
      //Tcs
      $(document).on('click', '#Tcs', function(){
          courier='Tcs';
          load_data(page,from,to,limit,sort,courier);
      });
      //for default page load 
      
      load_data(page,from,to,limit,sort,courier);
       
       
       });
    //limit 
    $(document).on('click', '#limit', function(){
      var page = $(this).data('page_number');
      //others
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      
      //courier
      //all
      $(document).on('click', '#all', function(){
          courier='all';
          load_data(page,from,to,limit,sort,courier);
      });
      //postex
      $(document).on('click', '#postex', function(){
          courier='PostEx';
         load_data(page,from,to,limit,sort,courier);
          
      });
      //leopard
      $(document).on('click', '#leopard', function(){
          courier='Leopard';
          load_data(page,from,to,limit,sort,courier);
      });
      //rider
      $(document).on('click', '#rider', function(){
          courier='Rider';
          load_data(page,from,to,limit,sort,courier);
      });
      //self
      $(document).on('click', '#self', function(){
          courier='Self';
          load_data(page,from,to,limit,sort,courier);
      });
      //call
      $(document).on('click', '#call', function(){
          courier='CallCourier';
          load_data(page,from,to,limit,sort,courier);
      });
      //Tcs
      $(document).on('click', '#Tcs', function(){
          courier='Tcs';
          load_data(page,from,to,limit,sort,courier);
      });
      //for default page load 
      
      load_data(page,from,to,limit,sort,courier);
    });
    
    //sort 
    $(document).on('click', '#sort', function(){
      var page = $(this).data('page_number');
      //others
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      
      //courier
      //all
      $(document).on('click', '#all', function(){
          courier='all';
          load_data(page,from,to,limit,sort,courier);
      });
      //postex
      $(document).on('click', '#postex', function(){
          courier='PostEx';
         load_data(page,from,to,limit,sort,courier);
          
      });
      //leopard
      $(document).on('click', '#leopard', function(){
          courier='Leopard';
          load_data(page,from,to,limit,sort,courier);
      });
      //rider
      $(document).on('click', '#rider', function(){
          courier='Rider';
          load_data(page,from,to,limit,sort,courier);
      });
      //self
      $(document).on('click', '#self', function(){
          courier='Self';
          load_data(page,from,to,limit,sort,courier);
      });
      //call
      $(document).on('click', '#call', function(){
          courier='CallCourier';
          load_data(page,from,to,limit,sort,courier);
      });
      //Tcs
      $(document).on('click', '#Tcs', function(){
          courier='Tcs';
          load_data(page,from,to,limit,sort,courier);
      });
      //for default page load 
      
      load_data(page,from,to,limit,sort,courier);
      
    });
     
    //courier
    //all
    $(document).on('click', '#all', function(){
      courier='all';
      var page = $(this).data('page_number');
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      load_data(page,from,to,limit,sort,courier);
    });
    //postex
    $(document).on('click', '#postex', function(){
      courier='PostEx';
       var page = $(this).data('page_number');
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
     load_data(page,from,to,limit,sort,courier);
      
    });
    //leopard
    $(document).on('click', '#leopard', function(){
      courier='Leopard';
       var page = $(this).data('page_number');
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      load_data(page,from,to,limit,sort,courier);
    });
    //rider
    $(document).on('click', '#rider', function(){
      courier='Rider';
       var page = $(this).data('page_number');
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      load_data(page,from,to,limit,sort,courier);
    });
    //self
    $(document).on('click', '#self', function(){
      courier='Self';
       var page = $(this).data('page_number');
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      load_data(page,from,to,limit,sort,courier);
    });
    //call
    $(document).on('click', '#call', function(){
      courier='CallCourier';
       var page = $(this).data('page_number');
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      load_data(page,from,to,limit,sort,courier);
    });
    //Tcs
    $(document).on('click', '#Tcs', function(){
      courier='Tcs';
       var page = $(this).data('page_number');
      from=document.getElementById("fromdate").value;
      to=document.getElementById("todate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      load_data(page,from,to,limit,sort,courier);
    });
    
    //date
    $("#fromdate").change(function()
    {
      var page = $(this).data('page_number');
      from=document.getElementById("fromdate").value;
      var limit=document.getElementById("limit").value;
      var sort=document.getElementById("sort").value;
      
        $("#todate").change(function()
        {
            to=document.getElementById("todate").value;
           //courier
          //all
          $(document).on('click', '#all', function(){
              courier='all';
              load_data(page,from,to,limit,sort,courier);
          });
          //postex
          $(document).on('click', '#postex', function(){
              courier='PostEx';
             load_data(page,from,to,limit,sort,courier);
              
          });
          //leopard
          $(document).on('click', '#leopard', function(){
              courier='Leopard';
              load_data(page,from,to,limit,sort,courier);
          });
          //rider
          $(document).on('click', '#rider', function(){
              courier='Rider';
              load_data(page,from,to,limit,sort,courier);
          });
          //self
          $(document).on('click', '#self', function(){
              courier='Self';
              load_data(page,from,to,limit,sort,courier);
          });
          //call
          $(document).on('click', '#call', function(){
              courier='CallCourier';
              load_data(page,from,to,limit,sort,courier);
          });
          //Tcs
          $(document).on('click', '#Tcs', function(){
              courier='Tcs';
              load_data(page,from,to,limit,sort,courier);
          });
          
          load_data(page,from,to,limit,sort,courier);
        });
    });
    
    $('#btnmodal').click(function(){
       
         var orderid = [];
         $(':checkbox:checked').each(function(i){
             orderid[i] = $(this).val();
         });
            
         if(orderid.length === 0) //tell you if the array is empty
         {
             toastr.error("Please Select at least one Entry");
         }
         else
         {
             $.ajax({
                 url:'Add.php',
                 method:'POST',
                 data:{orderid:orderid},
                 success:function()
                 {
                     for(var i=0; i<orderid.length; i++)
                     {
                         $('tr#'+orderid[i]+'').css('background-color', '#ccc');
                         $('tr#'+orderid[i]+'').fadeOut('slow');
                        
                     }
                     toastr.success('Created Successfully');
                     load_data(1,'','','10','',courier);
                 }
                  
             });
         }
            
     
         });
             
   
        $("#addorder").click(function(){
            $("#barcodeModalCenter").modal('toggle');
            $('#qrcode').focus();
        });
        $('#barcodeModalCenter').on('shown.bs.modal', function() {
        $('#qrcode').trigger('focus');
  });
   
   });
</script>
<?php include ("../include/footer.php"); ?>
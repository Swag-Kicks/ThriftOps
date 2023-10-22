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
            <h3 class=" modal-title">Load Sheet Print</h3>
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
             <a href="Loadsheet.php" class="btn btn-primary" >Create</a>
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
                     <input type="text" class="form-control" placeholder="Search . . . .">
                  </div>
               </div>
               <div class="col-md-7 text-end " style="margin-top:34px;">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" id="ref" class="btn btn-primary" >Refresh</a>
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
                     <a href="#" id="Tcs" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary-light">Tcs </a>
                  </div>
               </div>
            </div>
            <div class="table-responsive" id="dynamic_content"></div>
         </div>
         
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
         url:"pfetch.php",
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
     
     
     
     $(document).on('click', '#ref', function(){
        
         toastr.info('Refreshed!');
         load_data(1,'','','10','',courier);
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
    
             
             


   
   });
</script>
<?php include ("../include/footer.php"); ?>
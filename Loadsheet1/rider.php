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

<!-- Container-fluid starts-->
<div class="container-fluid">
<div class="row project-cards">
<div class="col-md-12 project-list">
</div>
<div class="col-sm-12">
   <div class="card">
      <div class="table-responsive">
         <div>
          <!--Status modal-->
   
                      <!--Barcode modal--> 
            <div>
            <div>
               <div>
                  <div style="padding: 2rem;padding-top: 3em;">
                     <div class="form-group">
                        <div class="row">
                           <div class="col-md-12 center">
                              <img src="../assets/images/print/print">
                           </div>
                             
                        </div>
                        <br><br>
                        <div class="row">
                           <div class="col-md-12" style="margin-bottom: 40px;" >
                              </label>
                               <div class="input-group-prepend">
                                      
                                    <input class="form-control" type="text" name="qrcode" id="qrcode" aria-describedby="barcode" placeholder="Search Order Number" >
                                  </div>
                              </div>
                              <br>
                        </div>
                        <table class="table table-striped" id="main">
                           <thead class="table-inverse table-striped">
                              <tr class="text-center">
                                 <td scope="col">Order Num</td>
                                 <td scope="col">Item Qty</td>
                                 <td scope="col">Amount</td>
                                <td scope="col">Date</td>
                              </tr>
                           </thead>
                           <tbody class="text-center" id="append">
                          </tbody>
                        </table>
                       
                        <div class="modal-footer">
                            <a href="#" class="btn btn-secondary pull-right" id="lastclear">Call Number</a>
                            <a href="#" class="btn btn-primary pull-right"  id="lastclear">Call WhatsApp</a>
                           <button type="button" class="btn  btn-outline-primary pull-left" data-bs-dismiss="modal">Delivered</button>
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
            //  else
            //  {
             if(data!=2 && data!=1 && data!=3)
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
      //trax
      $(document).on('click', '#trax', function(){
          courier='Trax';
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
      //trax
      $(document).on('click', '#trax', function(){
          courier='Trax';
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
      //trax
      $(document).on('click', '#trax', function(){
          courier='Trax';
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
    //trax
    $(document).on('click', '#trax', function(){
      courier='Trax';
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
          //trax
          $(document).on('click', '#trax', function(){
              courier='Trax';
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
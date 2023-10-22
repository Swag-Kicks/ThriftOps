<?php 
   session_start();
   include_once("../include/mysql_connection.php"); 
   date_default_timezone_set("Asia/Karachi");
   error_reporting(0);
   
   if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
   {
       $cr=$_SESSION['id'];
       
       $pr="Select * from User Where Dept_ID=5 AND User_ID='$cr' OR Dept_ID=3 AND User_ID='$cr'";
        $resu2 = mysqli_num_rows( mysqli_query($mysql, $pr));
        // $rowq1 =mysqli_fetch_array($resu2);
        // $dept=$rowq1['Dept_ID'];
        //echo $dept;
        if($resu2<1)
        {
            echo '<script>alert("Your Are Not Authorized !");window.location.href="../Dashboard/Home.php";</script>';
        }   
   }
   else 
   {
       echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
   }
   


   
   ?>
<?php include ("../include/header.php"); ?>
<?php include_once("../include/mysql_connection.php");  ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>

<!-- Page Body Start-->
<!--<div class="page-body-wrapper horizontal-menu">-->
<!-- Page Sidebar Ends-->
<div class="page-body">
 
   <!-- Container-fluid starts-->
   <div class="container-fluid">
        <div class="page-header">
         <div class="row">
            <div class="col-sm-6">
              <h3 class="p-t-30 modal-title"> Purchase Order</h3>
               
            </div>
            
         </div>
      </div>
      <div class="row project-cards">
         <div class="col-md-12 project-list">
          
         </div>
         <div class="col-sm-12">
            <div class="card">
               <div class="card-body">
                  <div class="card-body">
       <form action="" method="POST" id="main">                
        <div class="e-table">
          <div class="row">
         <div class="col-md-4">
            <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Search...." />
            
         </div>
         <!--<div class="col-md-3">-->
         <!--   <select class="form-control form-select form-control-secondary  m-r-15 f-left" id="sta">-->
         <!--                 <option value="" Selected disabled>Filter by status</option>-->
         <!--                 <option value="1">All</option>-->
         <!--                 <option value="Pending">Pending</option>-->
         <!--                 <option value="Approved">Approved</option>-->
         <!--                 <option value="Rejected">Rejected</option>-->
         <!--                 <option value="Delayed">Delayed</option>-->
         <!--                 <option value="Changes_Required">Changes Required</option>-->
         <!--               </select>-->
            
         <!--</div>-->
         <div class="col-md-3">
            <select class="form-control form-select form-control-secondary f-left" id="ven">
                           <option disabled selected value="">Filter By Supplier</option>
                              <?php
                                 $records = mysqli_query($mysql, "SELECT * FROM `Vendor`"); 
                                 while($data = mysqli_fetch_array($records))
                                 {
                                     echo "<option value='". $data['Vendor_ID'] ."'>" .$data['Name'] ."</option>";
                                 }   
                                 ?> 
                          
                        </select>
         </div>
         <div class="col-md-2">
             <input type="button" name="pick" value="⟳ Refresh" id="refresh" class="btn btn-md btn-primary f-right ref" />
         </div>
        </div>
        <br>
         <div class="table-responsive" id="dynamic_content">
        </div>
        
<!--PURCHASE ORDER start-->
        <div id="view" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content" >
        <div class="modal-body" style="padding: 2rem;padding-top: 3em;">
         <div class="form-group">
                         
                     
        
     
          <div class="table-responsive" id="dynamic_content2"></div>
       
        <div class="modal-footer">
          
          <button type="button" class="btn  btn-outline-primary pull-left" data-bs-dismiss="modal">Close</button>
          <a href="#" target = "_blank" class="btn btn-primary pull-right" id="poprint">Print</a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!--PURCHASE ORDER end-->
            <div id="confirm" class="modal fade" role="dialog">
                   <div class="modal-dialog modal-lg modal-dialog-centered cstm-pop">
                     <div class="modal-content p-25" >
                       <div class="modal-header justify-content-center">
                         <h3 class="modal-title ">Create GRN</h3>
                         <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                       </div>
                       <div class="modal-body">
                         <div class="form-group">

                    
                            <div class="" id="dynamic_content1">    
                         
                       </div>
                       <div class="f-right">
                           <button class="btn btn-square btn-light disabled" ><span class="bg-drk bradius">Order Total:&nbsp;</span><label id="tot" style="font-size: 18px;font-weight: bolder; padding-right:10px; margin-left:15px;" >0</label></button>
                       </div>
                     </div>
                     <br><br>
                     <div class="modal-footer cstm-pos">
                         
                         <button type="button" class="btn  btn-outline-primary pull-left" data-bs-dismiss="modal">Close</button>
                         <a href="#" id="conf_save" class="btn btn-primary pull-right">Create</a>
                       </div>
                   </div>
                 </div>
        </div>
    </div>
               </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid Ends-->
</div>

<script>

function getID()
{

        var rec = $('input[name="rec_quan[]"]').map(function(){ return this.value; }).get();
        var rej= $('input[name="rej_quan[]"]').map(function(){ return this.value; }).get();
        var accs = $('input[name="acc_quan[]"]').map(function(){ return this.value; }).get();
        var x=[];
        //quantity
        for(var i = 0;i<=rej.length-1;i++)
        {
            if(isNaN(parseInt(rej[i]))) 
            {
                $('[name="rej_quan[]"]').eq(i).val(x[0]);
                x.push(rec[i] - rej[i]);
            }
                 
            else if(parseInt(rej[i]) > parseInt(rec[i]))
            {
              $('[name="rej_quan[]"]').eq(i).val(rec[i]);
              x.push(rec[i] - rej[i]);
              
            }
            
            else
            { 
                $('[name="rej_quan[]"]').eq(i).val(rej[i]);
                x.push(rec[i] - rej[i]);
            }
            
            
            //x.push(rec[i] - rej[i]);
            
        }
        for(var i = 0;i<=x.length-1;i++)
        {
            $('[name="acc_quan[]"]').eq(i).val(x[i]);
        } 
        
        //price
        var price= $('input[name="unit_price[]"]').map(function(){ return this.value; }).get();
        var y=[];
        
        for(var i = 0;i<=price.length-1;i++)
        {
            y.push(accs[i] * price[i]);
            
        }
        for(var i = 0;i<=y.length-1;i++)
        {
            $('[name="tot_price[]"]').eq(i).val(y[i]);

        } 
         
        var z=0;
        for(var i = 0;i<=y.length-1;i++)
        {
           z= y[i]+z;

        } 
        $('#tot').html(z); 
        

}

   $(document).ready(function(){
   
     load_data(1);
     var pr=$('#pr').val();
      function enable()
    {
        $('#conf_save').removeClass("disabled");
       
    }
     function load_data(page, query = '', vendor)
     {
       $.ajax({
         url:"fetch.php",
         method:"POST",
         data:{page:page, query:query, vendor:vendor},
         success:function(data)
         {
           $('#dynamic_content').html(data);
         }
       });
     }
     
     
     
   
     $(document).on('click', '.page-link', function(){
       var page = $(this).data('page_number');
       var vendor = document.getElementById("ven").value; 
       var query = $('#search_box').val();
         load_data(page,query,vendor);
     });
   
     $('#search_box').keyup(function(){
       var query = $('#search_box').val();
       load_data(1, query);
     });
     
     $(document).on('click', '#ven', function()
    {
        var vendor = document.getElementById("ven").value; 
        var page = $(this).data('page_number');
        var query = $('#search_box').val();
        load_data(page,query,vendor);
     });
     
    // $(document).on('click', '#sta', function()
    // {
   
    //     var vendor = document.getElementById("ven").value;
    //     var status = document.getElementById("sta").value;
    //     var page = $(this).data('page_number');
    //     var query = $('#search_box').val();
    //     load_data(page,query,status,vendor);
    //  });
     $(document).on('click', '.ref', function(){
       
        toastr.info('Refreshed!');
        var vendor = document.getElementById("ven").value=''; 
        document.getElementById("search_box").value='';
        load_data(1);
    });
    
    $(document).on('click', 'a[data-role=infrm]', function() 
    {
         
         var id = $(this).data('id');
         var conf_tag = $('#' + id).children('td[data-target=conf_tag]').text();
         $('#conf_tag').val(conf_tag);
         $('#conf_id').val(id);
         
         var po = id;
         $.ajax
            ({
                url: '../GRN/assure.php',
                type: 'POST',
                data: {po: po,},
                success: function(response) 
                {
                    if(response == 2)
                    {
                        toastr.error('Quantity Exceeded');
                    }
                          
                    else
                    { 
                      
                        $.ajax
                        ({  
                            url:"../GRN/check.php",  
                            method:"POST",  
                            data:{id:id}, 
                        
                            success:function(data)
                            { 
                                if(data == 0)
                                {
                                    toastr.error('GRN already exists');
                                }
                                else
                                {
                                      $('#confirm').modal('toggle');
                                    $('#dynamic_content1').html(data);
                                    $('#conf_save').click(function(e) 
                                    {
                                        e.stopImmediatePropagation();
                                        $(this).addClass('disabled');
                                        var delivery=$('#delivered').val();
                                        var contact=$('#contact').val();
                                        var itemid= $('input[name="item_id[]"]').map(function(){ return this.value; }).get();
                                        var rec = $('input[name="rec_quan[]"]').map(function(){ return this.value; }).get();
                                        var rej= $('input[name="rej_quan[]"]').map(function(){ return this.value; }).get();
                                        var acc= $('input[name="acc_quan[]"]').map(function(){ return this.value; }).get();
                                        var u_price= $('input[name="unit_price[]"]').map(function(){ return this.value; }).get();
                                        var t_price= $('input[name="tot_price[]"]').map(function(){ return this.value; }).get();
                                        
                                        
                                        $.ajax({  
                                            url:"../GRN/insert.php",  
                                            method:"POST",  
                                            data:{ po:po, itemid: itemid, rec:rec, u_price:u_price, t_price:t_price, rej:rej, acc:acc, delivery:delivery, contact:contact}, 
                                            success:function(response)
                                            { 
                                                if(response==1)
                                                {    
                                                    //('#' + po).children('td[data-target=ven]').text();
                                                    $('#confirm').modal('hide');
                                                    toastr.success('Created Successfully');
                                                    //location.reload();
                                                    load_data(1);
                                                     enable();
                                                }
                                                if(response==2)
                                                {
                                                    toastr.error('GRN already exists');
                                                     enable();
                                                }
                                                 if(response==0)
                                                {
                                                     toastr.error('Please fill out details carefully');
                                                      enable();
                                                }
                                                
                                            }
                                        });
                                    });
                                }
                            }
                        });
                    }
                }        
            });
    });
    
    
    $(document).on('click', 'a[data-role=view]', function() {
         
         var id = $(this).data('id');
         $('#pp1').html(id);
         $('#view').modal('toggle');
         $.ajax({  
                    url:"View.php",  
                    method:"POST",  
                    data:{id:id}, 
                    
                    success:function(data)
                    { 
                        if(data == 0)
                        {
                        
                        }
                        else
                        {
                            $('#dynamic_content2').html(data);
                            
                            
                        }
                        var unit= $('input[name="unit[]"]').map(function(){ return this.value; }).get();
                        var quan = $('input[name="quan[]"]').map(function(){ return this.value; }).get();
                            
                            var x=[];                 
                            for(var i = 0;i<=quan.length-1;i++)
                            {
                                x.push(unit[i] * quan[i]);
                                
                            }
                            
                            for(var i = 0;i<=x.length-1;i++)
                            {
                                $('td[name="tot[]"]').eq(i).html(x[i]);
                    
                            } 
                            var tot = $('input[name="tot[]"]').map(function(){ return this.value; }).get();
                            
                            var to=0;
                            for(var i = 0;i<=x.length-1;i++)
                            {
                                to= x[i]+to;
                    
                            } 
                            $('#printo').html(to);
                            var a = document.getElementById('poprint'); //or grab it by tagname etc
                            a.href = "Print.php?id="+id;
                    }
            });
    });

    // $('#conf_save').click(function() {
            
    //     // var po = $('#po').val();
    //     var po = $(this).data('id');
    //     var delivery=$('#delivered').val();
    //     var contact=$('#contact').val();
        
    //     var rec = $('input[name="rec_quan[]"]').map(function(){ return this.value; }).get();
    //     var rej= $('input[name="rej_quan[]"]').map(function(){ return this.value; }).get();
    //     var acc= $('input[name="acc_quan[]"]').map(function(){ return this.value; }).get();
    //     var u_price= $('input[name="unit_price[]"]').map(function(){ return this.value; }).get();
    //     var t_price= $('input[name="tot_price[]"]').map(function(){ return this.value; }).get();
            
            
    //     $.ajax({  
    //             url:"../GRN/insert.php",  
    //             method:"POST",  
    //             data:{ po:po, rec:rec, u_price:u_price, t_price:t_price, rej:rej, acc:acc, delivery:delivery, contact:contact}, 
    //             success:function(response)
    //             { 
    //                 if(response==1)
    //                 {    
    //                     //('#' + po).children('td[data-target=ven]').text();
    //                     $('#confirm').modal('hide');
    //                     toastr.success('Created Successfully');
    //                     //location.reload();
    //                     load_data(1);
    //                 }
    //                 if(response==2)
    //                 {
    //                     toastr.error('GRN already exists');
    //                 }
                      
                    
    //             }
    //         });
    // });

   });
</script>
<?php include ("../include/footer.php"); ?>
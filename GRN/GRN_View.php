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
        <!-- Page body start-->
        <div class="page-body">
          <!-- Container-fluid starts-->
          <div class="container-fluid">
              <div class="page-header">
         <div class="row">
            <div class="col-sm-6 p-t-30">
               <h3>Goods Received Notes</h3>
               
            </div>
            
         </div>
      </div>
            <div class="select2-drpdwn">
              <div class="row">
                <!-- Default Textbox start-->
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                        <div class="row"> 
                             <div class="col-md-4">
                                <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Search...." />
                                
                             </div>
                             <!--<div class="col-md-3">-->
                             <!--   <select class="form-control form-select btn-square f-left drpdncss  m-r-15 f-left" id="sta">-->
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
                                <select class="form-control form-select btn-square f-left drpdncss" id="ven" >
                                             <option disable selected value="" disabled>Filter By Supplier</option>
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
                                     <input type="button" id="ref" value="⟳ Refresh" id="refresh" class="btn btn-md btn-primary f-right ref" />
                                 </div>
                            </div>
                      <!-- paste your code -->
                      <div class="card-body">
                        <div class="e-table">
                             <div class="form-group">
                                <div class="table-responsive" id="dynamic_content">
                                </div>
                            </div>
                            </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
          
                  
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
          <!--modal grn-->
          <div id="confirm" class="modal fade" role="dialog">
                   <div class="modal-dialog modal-lg modal-dialog-centered cstm-pop">
                     <div class="modal-content">
                       <div class="modal-header justify-content-center">
                          <h3 class="p-t-30 modal-title">Create Batch</h3>
                         <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                       </div>
                       <div class="row">
                           <br>
                                 <div class="col-md-7">
                                     
                                 </div>
                                 <div class="col-md-4">
                                     <label id="grnshow" class="f-right"></label>
                                 </div>
                                
                                 <div class="col-md-3  ">
                                    
                                 </div>
                                 
                             </div>
                       <div class="modal-body">
                         <div class="table-responsive1" id="dynamic_content1" style="margin-top: -47px;">
                             
                             
                                       
                                  
                              
                                
                                <br><br>
                             
                         <input type="hidden" id="conf_id" class="form-control">
                       </div>
                        <div class="row">
                            <div class="col-md-3 ">
                            </div>
                            <div class="col-md-3 ">
                            
                            </div>
                             <div class="col-md-3 ">
                            
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                       <div class="modal-footer">
                         <button type="button" class="btn btn-outline-primary pull-left" id="modclear" data-bs-dismiss="modal">Close</button>
                         <a href="#" data-role="conf_save" id="func" class="btn btn-md btn-primary ref  f-right" style="padding: 8px 30px;" disabled>Create</a>
                       </div>
                     </div>
                   </div>
                 </div>
      </div>
   </div>
   <!--modal batch end-->
        </div>
        <!-- footer start-->
        
        
<script>
    var count=0;
        // function category()
        // {
            
            
        //     if(count== 0)
        //     {
        //         $.get('load_data_cat.php',{},function(return_data)
        //       {
        //           $.each(return_data.data, function(key,value)
        //             {
        //                 $('td Select[name="Cat[]"]').append("<option value='"+value.Category_ID+"'>"+value.Name+"</option>");
        //             });
                        
        //          count++;
        //       }, "json");
 
        //     }

            
           
        // }
         
        //  function format()
        // {
            
        //     var cat= $('td Select[name="Cat[]"]').map(function(){ return this.value; }).get();
        //     var ven= $('td input[name="ven"]').val();
        //     var x=[];       
              
        //     for(var i = 0;i<=cat.length-1;i++)
        //     {
        //         var v=cat[i];
        //         $.ajax({  
        //                     url:"format_sku.php",  
        //                         method:"POST",  
        //                         data:{cat:v,ven:ven}, 
                                        
        //                         success:function(data)
        //                         { 
        //                              //x.push(data.replace(/\r\n+/g, ' ').trim());
        //                             // var try1=data.replace(/\r\n+/g, ' ').trim();
        //                             // x.push(try1.slice(0, -1));
        //                             //x=x+","+data.replace(/\r\n+/g, ' ').trim()+",";
        //                             x.push(data);
        //                             for(var j = x.length - 1; j >= 0; j--)
        //                             {
        //                                 $('input[name="sku[]"]').eq(j).val(x[j]);
        //                             } 
                                    
        //                         }
                                
        //             });
        //     }
            
            
         
           
            // for(var j = 0;j<=cat.length-1;j++)
            // {
            //     $('input[name="sku[]"]').eq(j).val([j]);
            //     //console.log(x[j]);
            // } 

            // $.get('load_data_cat.php',{},function(return_data)
            //   {
            //       $.each(return_data.data, function(key,value)
            //         {
            //             $('td Select[name="Cat[]"]').append("<option value='"+value.Category_ID+"'>"+value.Name+"</option>");
            //         });
                        
            //      count++;
            //   }, "json");

           
       // }
        
        
    //     function sub()
    //   {
           
    //         var data = JSON.parse(response);
      
      
    
    
    //   for (var i = 0; i < data.length; i++) {
    
    //       //console.log(data[i].Location);
    //     var select = document.getElementById("Cat[]");
    //     var option = document.createElement("option");
    //     option.text = data[i].Name;
    //     option.value = data[i].Category_ID;
        
    //     select.add(option);
           
        //   var cat_id=$('td Select[name="Cat[]"]').map(function(){ return this.value; }).get();
        // //   $('td Select[name="Sub_Cat[]"]').empty(); 
           
        //     var x=[];
           
        //     for(var i = 0;i<=cat_id.length-1;i++)
        //     {
        //         x=cat_id[i];
        //         //$('td Select[name="Sub_Cat[]"]').eq(i).append("<option value='"+value.Category_ID+"'>"+value.Name+"</option>");
        //         $.get('load_data_cat.php',{'cat_id':x},function(return_data)
        //         {
        //             $.each(return_data.data, function(key,value)
        //             {
                        
                        
                        
                         
                  
        //                 $('td Select[name="Sub_Cat[]"]').append("<option value='"+value.Category_ID+"'>"+value.Name+"</option>");
                        
                        
                        
                        
        //             });
                   
                   
        //         }, "json");
                
        //         // $('td[name="tot[]"]').eq(i).html(x[i]);
        //     } 
            
                
           
           
           
       //}

</script>
<script>
  $(document).ready(function(){
      
   

    load_data(1);
    // $(document).on('change','td Select[name="Cat[]"]', function()
    // {
    //     var $ele = $(this).parent().parent();
    //     var ven= $('td input[name="ven"]').val();
    //     var currentRow = $(this).closest("td");
    //     var append3 =$ele.find('#sku');
    //     var cat = currentRow.find('Select').val();
    //      $.ajax({  
    //                 url:"format_sku.php",  
    //                     method:"POST",  
    //                     data:{cat:cat,ven:ven}, 
                        
    //                     success:function(data)
    //                     {
    //                         append3.val(data);
    //                     }
    //      });    
      
    // });
    function enable()
    {
        $('#func').removeClass("disabled");
       
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
      var vendor = document.getElementById("ven").value; 
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query,vendor);
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
    
    $(document).on('click', '#ref', function(){
       
        var vendor = document.getElementById("ven").value='';
        toastr.info('Refreshed!');
        load_data(1);
    });

    $('#search_box').keyup(function(){
      var query = $('#search_box').val();
      load_data(1, query);
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
    $(document).on('click', 'a[data-role=infrm]', function() 
     {
         var grn = $(this).data('id');
         $('#grnshow').html('GRN ID: '+grn);
         var conf_tag = $('#' + grn).children('td[data-target=conf_tag]').text();
         $('#conf_tag').val(conf_tag);
         $('#conf_id').val(grn);
         
          $.ajax
            ({
                  url: '../Batches/insert.php',
                  type: 'POST',
                  data: {
                     grn: grn,
                    },
                    success: function(response) 
                    {
                        
                        if(response==3)
                        {
                             toastr.error('Batch Already Exists');
                        }    
                        if(response==0)
                        {
                            $('#confirm').modal('toggle');
                          
                            $.ajax({  
                                        url:"../Batches/check.php",  
                                        method:"POST",  
                                        data:{grn:grn}, 
                                        
                                        success:function(data)
                                        { 
                                            if(data == 0)
                                            {
                                            
                                            }
                                            else
                                            {
                                                $('#dynamic_content1').html(data);
                                                //  $.get('load_data_cat.php',{},function(return_data)
                                                //   {
                                                //       $.each(return_data.data, function(key,value)
                                                //         {
                                                //             $('td Select[name="Cat[]"]').append("<option value='"+value.Category_ID+"'>"+value.Name+"</option>");
                                                //         });
                                                            
                                                //      count++;
                                                //   }, "json");
                                                var tax = $('input[name="prtax"]').val();
                                                $('#taxq').html('(Tax'+tax+'%) ');
                                                
                                                $(document).on('click', '#func', function(e)
                                                {
                                                     e.stopImmediatePropagation();
                                                     $(this).addClass('disabled');
                                                    var ven= $('td input[name="ven"]').val();
                                                    var cat=$('td input[name="Cat[]"]').map(function(){ return this.value; }).get();
                                                    var quantity=$('td input[name="it_quantity[]"]').map(function(){ return this.value; }).get();
                                                    $.ajax({
                                                            url:"../Batches/insert.php",
                                                            method:"POST",
                                                            data:{
                                                                ven:ven,
                                                                grn:grn,
                                                                cat:cat,
                                                                quantity:quantity
                                                                
                                                            },
                                                            success:function(data)
                                                            {
                                                                if(data==0)
                                                                {
                                                                    toastr.error('Batch Already Exists');
                                                                    enable();
                                                                }
                                                                if(data==1)
                                                                {
                                                                    $('#confirm').modal('toggle');
                                                                    toastr.success('Created Successfully');
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
      
    
      
      
     

  });
</script>
<?php include ("../include/footer.php"); ?>
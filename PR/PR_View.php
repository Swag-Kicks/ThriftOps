<?php 
   session_start();
   include_once("../include/mysql_connection.php"); 
   date_default_timezone_set("Asia/Karachi");
   error_reporting(0);
   
   if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
   {
       $cr=$_SESSION['id'];
       
    //   $pr="Select * from User Where Dept_ID=5 AND User_ID='$cr' OR Dept_ID=3 AND User_ID='$cr'";
    //     $resu2 = mysqli_num_rows( mysqli_query($mysql, $pr));
    //     // $rowq1 =mysqli_fetch_array($resu2);
    //     // $dept=$rowq1['Dept_ID'];
    //     //echo $dept;
    //     if($resu2<1)
    //     {
            // echo '<script>alert("Your Are Not Authorized !");window.location.href="../Dashboard/Home.php";</script>';
        // }   
   }
   else 
   {
       echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
   }
   


   
   ?>
<?php include ("../include/header.php"); ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>
<style>
br {
    display: none;
}
    </style>

<!-- Page Body Start-->
<!--<div class="page-body-wrapper horizontal-menu">-->
<!-- Page Sidebar Ends-->
<div class="page-body">
   <!-- Container-fluid starts-->
   <div class="container-fluid">
       <div class="page-header">
         <div class="row">
            <div class="col-sm-12">
               <h3 class="p-t-30">Purchase Requests</h3>
            </div>
         </div>
      </div>
      <div class="row project-cards">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-body">
                   
                   <div class="row">
                  <div class="col-md-4">
                        <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Search...." />
                  </div>
                  <div class="col-md-4">
                      <select class="form-control form-select form-control-secondary btn-square f-left drpdncss" id="status">
                          <option value="" Selected disabled>Filter by status</option>
                          <option value="1">All</option>
                          <option value="Pending">Pending</option>
                          <option value="Approved">Approved</option>
                          <option value="Rejected">Rejected</option>
                          <option value="Delayed">Delayed</option>
                          <option value="Alteration">Alteration</option>
                        </select>
                  </div>
                <div class="col-md-4">       
                    <a href="#" data-role="prnew" class="btn btn-primary-light m-l-15 f-right" style="padding: 6px 10px;">Create New</a>
                        <input type="button" name="pick" value="⟳ Refresh" id="refresh" class="btn btn-md btn-primary ref  f-right"></div>     
               </div>
                  <div class="card-body">
                      
      <div class="e-table">
         <div class="table-responsive" id="dynamic_content">
         </div>
 <div id="confirm" class="modal fade" role="dialog">
                   <div class="modal-dialog modal-lg modal-dialog-centered cstm-pop">
                     <div class="modal-content">
                       <div class="modal-header justify-content-center">
                          <h3 class="p-t-30 modal-title">Create Purchase Order</h3>
                         <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                       </div>
                       <div class="row">
                           <br>
                                 <div class="col-md-3 m-b-10">&nbsp;&nbsp;&nbsp;
                                     <label id="prshow">&nbsp;&nbsp;&nbsp;<b></b></label>
                                 </div>
                                 <div class="col-md-3 ">
                                     
                                 </div>
                                 <div class="col-md-3 ">
                                     
                                 </div>
                                 <div class="col-md-3  ">
                                    
                                 </div>
                                 
                             </div>
                       <div class="modal-body">
                         <div class="form-group" style="width: 18%;">
                               <select class="form-control form-select form-control-success btn-square f-left drpdncss btn-square m-b-10" name="conf_tag" id="conf_tag" placeholder="Select Vendor" onchange="validate();" required>
                               <option value="" disabled selected >Select Supplier</option>
                            <?php
                                $records = mysqli_query($mysql, "SELECT * FROM `Vendor`"); 
                           
                                while($data = mysqli_fetch_array($records))
                                {
                                    echo "<option value='". $data['Vendor_ID'] ."'>" .$data['Name'] ."</option>";
                                }   
                            ?>
                                </select>
                         </div>
                         <div class="table-responsive1" id="dynamic_content1">
                             
                         <input type="hidden" id="conf_id" class="form-control">
                       </div>
                        <div class="row">
                            <div class="col-md-3 ">
                            </div>
                            <div class="col-md-3 ">
                            
                            </div>
                             <div class="col-md-3 ">
                            
                            </div>
                            <div class="mt-4  gridp ">
                            <div class="media m-l-30">
                            <label class="col-form-label m-r-10">Apply Tax?</label>
                            <div class="">
                          <label class="switch">
                            <input type="checkbox" id="chkPassport" onclick="pototal();"><span class="switch-state"></span>
                          </label>
                        </div>
                          
                          </div>
                          
                            <button class="btn btn-square btn-light disabled  mt-0" style="padding-bottom: 0px;" ><span class= "bg-drk bradius m-r-30" >Sub Total</span>&nbsp;<label id="posubt" style="font-size: 18px;font-weight: bolder;" >  0</label></button>
                       <div class="mb-0 mt-2" id="inter" style="display: none; padding-top: 0px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    						<span id="taxq" class="bg-drk bradius mt-2" ></span>&nbsp;&nbsp;<label  class="" id="potaax" style="font-size: 18px;font-weight: bolder;" >0</label>
    					 </div>
                            <button class="btn btn-square btn-light disabled  mt-2" style="padding-top: 0px;"> <span class= "bg-drk bradius m-r-10" >Order Total</span>&nbsp;<label id="potot" style="font-size: 18px;font-weight: bolder;" >  0</label></button>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                       <div class="modal-footer">
                         <button type="button" class="btn btn-outline-primary pull-left" id="modclear" data-bs-dismiss="modal">Close</button>
                         <a href="#" data-role="conf_save" id="func" class="btn btn-md btn-primary ref  f-right"  disabled>Create</a>
                       </div>
                     </div>
                   </div>
                 </div>
      </div>
   </div>
   
   
 <!--PURCHASE ORDER start-->
        <div id="view" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content" >
        <div class="modal-body" style="padding: 4rem;padding-top: 3em;">
         <div class="form-group">
                             <div class="row">
                                 <div class="col-md-3 ">
                                     <img src="../assets/images/print/print">
                                 </div>
                                 <div class="col-md-3 ">
                                     
                                 </div>
                                 <div class="col-md-3 ">
                                     
                                 </div>
                                 <div class="col-md-3 f-right " style="padding-left: 50px;">
                                     <h5><b>Purchase Request</b></h5>
                                 </div>
                                 
                             </div>
     
          <div class="" id="dynamic_content2"></div>
      
          
          
          <div class=" modal-footer col-md-4 f-right">
          <button type="button" class="btn  btn-outline-primary pull-left" data-bs-dismiss="modal">Close</button>
          <a href="#" target = "_blank" class="btn btn-primary pull-right" id="prprint">Print</a>
              
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!--PURCHASE ORDER end-->
   <div id="pr-new" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered cstm-pop">
      <div class="modal-content" >
        <div class="modal-header justify-content-center">
            <h3 class="p-t-30 modal-title">Create Purchase Request</h3>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
        </div>
        <div class="modal-body">
        
            <div class="form-group">
                
                <div class="row">
                              <div class="col-md-3">
                                 <div class="form-group">
                                     <input class="form-control" type="hidden" name="USER" id="USER" value="<?php echo $_SESSION['id']; ?>" readonly>
                                     <!--<input class="form-control" type="hidden" name="PR" id="PR" value="<?php //echo $PR_ID ?>" readonly>-->
                                    <label class="form-label">Requested Date</label>
                                    <input type="text" class="form-control" name="Req_date" id="Req_date" value="<?php echo date('Y-m-d'); ?>" readonly="">
                                 </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Date Needed</label>
                                    <div class="input-group">
                                        
                                        <input class="form-control" id="Date_needed" name="Date_needed" type="date" required/>
                                        <!--<div class="input-group-text" data-target="#dt-minimum" data-toggle="datetimepicker"><i class="fa fa-calendar"> </i>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-3">
                              </div>
                              <div class="col-md-3">
                              </div>

                              <div class="col-md-12">
                                 <div class="e-table">
                                    <div class="table-responsive table-lg">
                                       <table class="table" id="crud_table">
                                          <thead class="thead-dark">
                                             <tr>
                                                <th  class="text-center">
                                                   #ID
                                                </th>
                                                <th >Item Name*</th>
                                                <th>Quantity*</th>
                                                <th class="text-center"> Description*</th>
                                                <th class="text-center">Expected Unit Price*</th>
                                                <th class="text-center">Add</th>
                                             </tr>
                                          </thead>
                                          <tbody id="table_data" >
                                             <tr>
                                                <td class="text-nowrap align-middle">
                                                  <b>1</b> 
                                                </td>
                                                <td class="text-nowrap align-middle">
                                                   <div class="form-group">
                                                     <select class="form-control form-select form-control-secondary btn-square f-left drpdncss" id="item[]" name="item[]">
                                                         <option value="" disabled selected >Select</option>
                                                     <?php
                                                        $records = mysqli_query($mysql, "SELECT Category_ID,Name FROM `Category`"); 
                                                   
                                                        while($data = mysqli_fetch_array($records))
                                                        {
                                                            echo "<option value='". $data['Name'] ."'>" .$data['Name'] ."</option>";
                                                        }   
                                                    ?>
                                                        </select>  
                                                      <!--<input type="text" class="form-control" placeholder="Item Name" name="item[]" id="item[]" required>-->
                                                   </div>
                                                </td>
                                                <td class="text-nowrap align-middle">
                                                   <div class="form-group">
                                                      <input type="text" class="form-control" placeholder="Quantity" onchange='total()' name="quantity[]" id="quantity[]" required>
                                                   </div>
                                                </td>
                                                </td>
                                                <td class="text-nowrap align-middle">
                                                   <div class="form-group">
                                                      <input type="text" class="form-control" name="desc[]" id="desc[]" placeholder="Description" required>
                                                   </div>
                                                </td>
                                                <td class="text-nowrap align-middle">
                                                   <div class="form-group">
                                                      <input type="text" class="form-control" name="expected[]" id="expected[]" onchange='total()' placeholder="Expected Price" required>
                                                   </div>
                                                </td>
                                                <td class="text-nowrap align-middle center_center">
                                                   <div class="btn-group align-top">
                                                      <span class="align-center" onclick="addItem();"><i class=" fa fa-plus-square-o"></i></span>
                                                   </div>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                                 <div class="f-right">
            <button class="btn btn-square btn-light disabled" ><span class="bg-drk bradius">Total </span> &nbsp;<label id="prtot" style="font-size: 18px;font-weight: bolder;" >&nbsp;0</label></button>
        </div>
                              </div>
               </div>
                <div class="modal-footer">
                  
                      <button type="button" class="btn  btn-outline-primary pull-left" data-bs-dismiss="modal">Close</button>
                      <a href="#" id="create_pr" class="btn btn-primary pull-right">Create</a>
                </div>
            </div>
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
</div>
<script>

   var items=1;
   
   function validate()
    {
        var ven=$('#conf_tag').val();
        if (ven.length > 0)
        {
            $('#func').prop("disabled", false);
        }
        else 
        {
            $('#func').prop("disabled", true);
        }
    }
   function addItem() 
   {
       items++;
       var html = "<tr>";
           html += "<td><b>" + items + "<b></td>";
        //   html += "<td class='text-nowrap align-middle'><div class='form-group'><br><input type='text' class='form-control' placeholder='Item Name' name='item[]' id='item[]' required></div></td>";
           html += "<td class='text-nowrap align-middle'><div class='form-group'><br><select class='form-control form-select form-control-secondary btn-square f-left drpdncss' id='item[]' name='item[]' required><option value='' disabled selected >Select</option></select</div></td>";
           html += "<td class='text-nowrap align-middle'><div class='form-group'><br><input type='text' class='form-control' placeholder='Quantity' name='quantity[]' id='quantity[]' onchange='total()' required></div></td>";              
           html += " <td class='text-nowrap align-middle'><div class='form-group'><br><input type='text' class='form-control' name='desc[]' id='desc[]' placeholder='Description' required></div></td>";
           html += " <td class='text-nowrap align-middle'><div class='form-group'><br><input type='text' class='form-control' name='expected[]' id='expected[]' placeholder='Expected Price' onchange='total()' required></div></td>";
           html += "<td class='center_center'><span  onclick='deleteRow(this)' class='warning'><i class='fa fa-minus-square-o'></i></span></td>"
       html += "</tr>";
       document.getElementById ("table_data").insertRow(). innerHTML = html;
       
       $.get('load_data_cat.php',{},function(return_data)
      {
        //   $('td Select[id="item[]"]').append("<option value='' disabled selected >Select</option>");
          $.each(return_data.data, function(key,value)
            {
                $('td Select[name="item[]"]').append("<option value='"+value.Name+"'>"+value.Name+"</option>");
            });
                
         count++;
      }, "json");
   }
   
   function deleteRow(self) 
   {
       items--;
       self.parentElement.parentElement.remove();
       $('[name="item[]"]').html();
       $('[name="quantity[]"]').html();
       $('[name="desc[]"]').html();
       $('[name="expected[]"]').html();
       
       var estprice= $('input[name="expected[]"]').map(function(){ return this.value; }).get();
       var quantity= $('input[name="quantity[]"]').map(function(){ return this.value; }).get();
                
            
        var x=[];                 
        for(var i = 0;i<=quantity.length-1;i++)
        {
            x.push(estprice[i] * quantity[i]);
                                    
        }
        var prtot=0;
        for(var i = 0;i<=x.length-1;i++)
        {
            prtot= x[i]+prtot;
                        
        } 
        console.log(prtot);
        $('#prtot').html(prtot); 
   }
   
   function total()
    {
                
        var estprice= $('input[name="expected[]"]').map(function(){ return this.value; }).get();
        var quantity= $('input[name="quantity[]"]').map(function(){ return this.value; }).get();
        
                
            
        var x=[];                 
        for(var i = 0;i<=quantity.length-1;i++)
        {
            x.push(estprice[i] * quantity[i]);
                                    
        }
        
        
        var prtot=0;
        for(var i = 0;i<=x.length-1;i++)
        {
            prtot= x[i]+prtot;
                        
        }
        console.log(prtot);
        $('#prtot').html(prtot); 
    }
    
    
    function pototal()
    {
            if(!$("#chkPassport").is(":checked"))  
            {
                var iteprice= $('input[name="item_price[]"]').map(function(){ return this.value; }).get();
                var quantity= $('input[name="it_quantity[]"]').map(function(){ return this.value; }).get();
                
            
                var x=[];                 
                for(var i = 0;i<=quantity.length-1;i++)
                {
                    x.push(iteprice[i] * quantity[i]);
                                            
                }
                for(var i = 0;i<=x.length-1;i++)
                {
                    $('[name="tot_po[]"]').eq(i).val(x[i]);
                } 
                var potot=0;
                for(var i = 0;i<=x.length-1;i++)
                {
                    potot= x[i]+potot;
                                
                }
                $('#posubt').html(potot);
               
                $('#potaax').html('');
                $('#potot').html(potot);
                
            }
            
            if ($("#chkPassport").is(":checked")) 
            {
                var iteprice= $('input[name="item_price[]"]').map(function(){ return this.value; }).get();
                var tax = $('input[name="prtax"]').val();
                var quantity= $('input[name="it_quantity[]"]').map(function(){ return this.value; }).get();
                        
                    
                var x=[];                 
                for(var i = 0;i<=quantity.length-1;i++)
                {
                    x.push(iteprice[i] * quantity[i]);
                                            
                }
                //tot_po[];
                for(var i = 0;i<=x.length-1;i++)
                {
                    $('[name="tot_po[]"]').eq(i).val(x[i]);
        
                } 
                var potot=0;
                for(var i = 0;i<=x.length-1;i++)
                {
                    potot= x[i]+potot;
                                
                }
                
                
                $('#posubt').html(potot);
                var taxe=potot*tax/100;
                $('#potaax').html(taxe);
                
                var ttr=taxe+potot;
                $('#potot').html(ttr);
            } 
            
        
    }
    
</script> 

<script>



   $(document).ready(function(){
   
     load_data(1);


        // var today = new Date();
        // var sdate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+(today.getDate() < 10 ? '0'+today.getDate() : today.getDate());
        // $('#Date_needed').prop('min', sdate);
        
         var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#Date_needed').attr('min',today);
    
     

    function enable()
    {
        $('#create_pr').removeClass("disabled");
        $('#func').removeClass("disabled");
    }
     
   
     function load_data(page, query = '',status)
     {
       $.ajax({
         url:"fetch.php",
         method:"POST",
         data:{page:page, query:query, status:status},
         success:function(data)
         {
           $('#dynamic_content').html(data);
         }
       });
     }
    
     $(document).on('click', '.page-link', function(){
       var page = $(this).data('page_number');
       var query = $('#search_box').val();
       var status = document.getElementById("status").value;
       load_data(page, query);
     });
     
      $(document).on('click', '#status', function()
    {

        var status = document.getElementById("status").value;
        var page = $(this).data('page_number');
        var query = $('#search_box').val();
        load_data(page,query,status);
     });
   
     $('#search_box').keyup(function(){
       var query = $('#search_box').val();
       load_data(1, query);
     });
     
    
     
     $(document).on('click', 'a[data-role=infrm]', function(e) 
     {
          
         var pr = $(this).data('id');
         $('#prshow').html('PR#'+pr);
         var conf_tag = $('#' + pr).children('td[data-target=conf_tag]').text();
         $('#conf_tag').val(conf_tag);
         $('#conf_id').val(pr);
          $.ajax
            ({
                  url: '../PO/assure.php',
                  type: 'POST',
                  data: {
                     pr: pr,
                    },
                    success: function(response) 
                    {
                        if(response == 2)
                        {
                            toastr.error('PO already exists');
                            
                        }
                          
                        if(response==1)
                        {
                            $('#confirm').modal('toggle');
                            $.ajax({  
                                        url:"../PO/check.php",  
                                        method:"POST",  
                                        data:{pr:pr}, 
                                        
                                        success:function(data)
                                        { 
                                            if(data == 0)
                                            {
                                            
                                            }
                                            else
                                            {
                                                //$('#confirm').modal('toggle');
                                                $('#dynamic_content1').html(data);
                                                var tax = $('input[name="prtax"]').val();
                                                $('#taxq').html('(Tax'+tax+'%) ');
                                            }
                                          
                                        
                                        }
                                });
                        }
                    }
            });
       });
       
    
    $(document).on('click', 'a[data-role=conf_save]', function(e) 
    {
         
          
        if ($("#chkPassport").is(":checked")) 
        {
            var pr = $('#pr').val();
            var taxelement= "True";
            var price= $('input[name="item_price[]"]').map(function(){ return this.value; }).get();
            var itemid= $('input[name="item_id[]"]').map(function(){ return this.value; }).get();
            var ven=$('#conf_tag').val();
            $(this).addClass('disabled');
            $.ajax
            ({
                  url: '../PO/insert.php',
                  type: 'POST',
                  data: {
                     ven: ven,
                     pr: pr,
                     price: price,
                     taxelement: taxelement,
                     itemid: itemid
                    },
                    success: function(response) 
                    {
                        if(response == 2)
                        {
                            toastr.error('PO already exists');
                            enable();
                        }
                          
                        if(response==3)
                        {
                            $('#' + pr).children('td[data-target=conf_tag]').text(conf_tag);
                            $('#confirm').modal('toggle');
                            $("#status").val([1]);
                            load_data(1);
                            toastr.success('Created Successfully');
                            enable();
                        }
                         if(response==0)
                        {
                            enable();
                            toastr.error('Please fill out details carefully');
                        }
                        
                    }
            });
              
        } 
        if (!$("#chkPassport").is(":checked"))  
        {
            
            var pr = $('#pr').val();
            var itemid= $('input[name="item_id[]"]').map(function(){ return this.value; }).get();
            var taxelement= "False";
            var price= $('input[name="item_price[]"]').map(function(){ return this.value; }).get();
            var ven=$('#conf_tag').val();
            $(this).addClass('disabled');
            $.ajax
            ({
                  url: '../PO/insert.php',
                  type: 'POST',
                  data: {
                     ven: ven,
                     pr: pr,
                     price: price,
                     taxelement: taxelement,
                     itemid: itemid
                  },
                  success: function(response) 
                  {
                          if(response == 2)
                          {
                              toastr.error('PO already exists');
                          }
                      
                          if(response==3)
                          {
                             $('#' + pr).children('td[data-target=conf_tag]').text(conf_tag);
                             $('#confirm').modal('toggle');
                             $("#status").val([1]);
                             load_data(1);
                             toastr.success('Created Successfully');
                          }
                           if(response==0)
                        {
                            enable();
                            toastr.error('Please fill out details carefully');
                        }
                    }
            });
        }
    });
      
    
     
      $(document).on('click', 'a[data-role=prview]', function(e) {
           
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
                        var tax = $('input[name="tax"]').val();
                            
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
                            
                            var taxe=to*tax/100;
                            $('#prtax').html(taxe);
                            
                            var al=taxe+to;
                            $('#pr1tot').html(al);
                            
                            var a = document.getElementById('prprint'); //or grab it by tagname etc
                            a.href = "Print.php?id="+id;
                            
                    }
                });
        });
      
        
       $(document).on('click', 'a[data-role=prnew]', function(e) {
            
            
            $('#pr-new').modal('toggle');
            // $('#pr-new').modal('toggle');
            $('input[name="item[]"]').val('');
            $('input[name="quantity[]"]').val('');
            $('input[name="expected[]"]').val('');
            $('input[name="desc[]"]').val('');
            $('#Date_needed').val('');
            
            

            
       });
        $(document).on('click', '#create_pr', function(e) 
            // $('#create_pr').click(function(e) 
            {
                 //
                e.stopImmediatePropagation();
                
                var need = $('#Date_needed').val();
                var req = $('#Req_date').val();
                var user = $('#USER').val();
                var item= $('td Select[name="item[]"]').map(function(){ return this.value; }).get();
                var estprice= $('input[name="expected[]"]').map(function(){ return this.value; }).get();
                var quantity= $('input[name="quantity[]"]').map(function(){ return this.value; }).get();
                var desc= $('input[name="desc[]"]').map(function(){ return this.value; }).get();
                 $(this).addClass('disabled');
                 $.ajax({
                      url: 'insert.php',
                      type: 'POST',
                      data: {
                         need: need,
                         req: req,
                         user: user,
                         item: item,
                         estprice: estprice,
                         quantity: quantity,
                         desc: desc
                      },
                    success: function(response) 
                    {
                      
                             
                          if(response==0)
                          {
                             enable();
                             toastr.error('Please fill out details carefully');
                             
                          }
                          else
                          {
                             $('#pr-new').modal('toggle');
                             $('td Select[name="item[]"]').val('');
                             $('input[name="quantity[]"]').val('');
                             $('input[name="expected[]"]').val('');
                             $('input[name="desc[]"]').val('');
                             $('#Date_needed').val('');
                             load_data(1);
                             toastr.success('PR number'+''+ response +''+'  has been created Successfully');
                             enable();
                          }
              
                    }
                });
            });
         
            
    
     
     $(document).on('click', '#refresh', function(){

         load_data(1);
         document.getElementById("status").value='';
         document.getElementById("search_box").value='';
         toastr.info('Refreshed');
     });
     
   
   });
   
    
</script>

<script type="text/javascript">



    $(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#inter").show();
                pototal();
                
            } 
            else 
            {
                $("#inter").hide();
                
            }
        });
    });
    
    
    
</script>
<?php include ("../include/footer.php"); ?>

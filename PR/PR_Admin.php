<?php
   session_start();
   include_once("../include/mysql_connection.php"); 
   $cr=$_SESSION['Username'];
//   if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
//   {
//       $pr="Select * from User Where Dept_ID=3 AND Username='$cr' OR Dept_ID=1 AND Username='$cr'";
//       $resu2 = mysqli_query($mysql, $pr);
//       $rowq1 =mysqli_fetch_array($resu2);
//       $dept=$rowq1['Dept_ID'];
//       //echo $dept;
//       if($dept=='')
//       {
//           echo '<script>alert("Your Are Not Authorized !");window.location.href="../Dashboard/Home.php";</script>';
//       }   
//   }
//   else 
//   {
//       echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
      
   //}
   
    if (isset($_SESSION['id']) && $_SESSION['id'] == true) {
       
   }
   else {
      
       echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
   
   }
   
   
   ?>
<?php include ("../include/header.php"); ?>
<?php include ("../include/side_admin.php"); ?>

<script>

window.onload = function(){
  document.getElementById("undodiv").style.display='none';
};
window.addEventListener("beforeunload", function(e){
   localStorage.setItem("lastpage", window.location.href);
});
</script>
<!-- Page Body Start-->
<div class="page-body-wrapper horizontal-menu">
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
   <div class="container-fluid">
      <div class="row project-cards">
         <div class="col-sm-12">
            <div class="card">
                  <div class="card-body">
                      <div class="row">
                  <div class="col-md-6">
                       <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Search..." />
                       
                      
                  </div>
                   <div class="col-md-3">
                      <select class="form-control form-select form-control-secondary btn-square f-left" id="status">
                          <option value="0" selected="" disabled="">Select status</option>
                          <option value="1">All</option>
                          <option value="Pending">Pending</option>
                          <option value="Approved">Approved</option>
                          <option value="Rejected">Rejected</option>
                          <option value="Delayed">Delayed</option>
                          <option value="Alteration">Alteration</option>
                        </select> 
                       
                      
                  </div>
                  <div class="col-md-3">
                        <!--<input type="button" name="pick" value="🗘Refresh List" id="refresh" class="btn btn-primary"/>	
                        -->
                       <a href="#" data-role="prnew" class="btn btn-primary-light m-l-15 f-right" style="padding: 8px 30px;">Create</a>
                         <input type="button" name="pick" value="⟳ Refresh"  id="refresh" class="btn btn-primary f-right ref" />
                         
                     </div>
                     <div class="alert alert-light alert-dismissible fade show undo-btn" role="alert" data-notify-position="top-right" id="undodiv">
                        
                     </div>
                     
                       <div id="poper">
                        
                     </div>
                     
                     
                     
               </div>
                     <div class="e-table">
                        <div class="form-group">
                           
                        </div>
                        
                        <div class="table-responsive" id="dynamic_content">
                        </div>
                        
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
                                        
                                        <input class="form-control" id="Date_needed" name="Date_needed" type="date" />
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
                         
                              <div class="table-responsive" id="dynamic_content2"></div>
                          
                              
                              
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
   function addItem() 
   {
       items++;
       var html = "<tr>";
           html += "<td><b>" + items + "<b></td>";
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
</script>

    <script src="../assets/js/sweet-alert/sweetalert.min.js"></script>
    <script src="../assets/js/sweet-alert/app.js"></script>
<script>



window.addEventListener("beforeunload", function(e){
   localStorage.setItem("lastpage", window.location.href);
});



   $(document).ready(function(){
     var find=Number(0);
     
     load_data(1);
    //  var today = new Date();
    //  var sdate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+(today.getDate() < 10 ? '0'+today.getDate() : today.getDate());
    //  $('#Date_needed').prop('min', sdate);
    var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#Date_needed').attr('min',today);
     
     setInterval(function () {
         //console.log("prev"+find);
         $.ajax({
         url:"new_entry_fetch.php",
         method:"POST",
         success:function(data)
         {
            var cc= Number(data);
            
            if(+cc > +find)
            {
                if(+find==+cc)
                {
                    //document.getElementById("poper").style.display = "none";
                }
                
                if(+find==0)
                {
                    find=Number(cc);
                }
                
                else
                {
                    //console.log("data"+cc);
                    var toas=cc-find;
                    document.getElementById("poper").style.display = "block";
                    document.getElementById("poper").innerHTML = "<a href='#' class='resr'><strong>Refresh</strong></a>"+" "+ toas +" New Purchase Request Added!<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close' data-bs-original-title='' title=''></button>";
                    find=Number(cc);
                
                }
           
            }
            
         }
       });
         
     }, 5000);
     
     $(document).on('click', '.resr', function() 
    {
        document.getElementById("poper").style.display = "none";
        load_data(1);
    });
   
   function enable()
    {
        $('#create_pr').removeClass("disabled");
    }
     function load_data(page, query = '',status)
     {
       $.ajax({
         url:"fetch_admin.php",
         method:"POST",
         data:{page:page, query:query, status:status},
         success:function(data)
         {
           $('#dynamic_content').html(data);
         }
       });
     }
      //approved
      $(document).on('click', 'a[data-role=approved]', function() 
      {
          var $ele = $(this).parent().parent();
          var id = $(this).attr("id");
          var stat="Approved";
          document.getElementById("undodiv").style.display='block';
          var timeleft = 10;
          var downloadTimer = setInterval(function() 
        {
            document.getElementById("undodiv").innerHTML = "<a href='#' data-role='undo'><strong>Undo</strong></a> Action has been performed <button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close' data-bs-original-title='' title=''></button>";
            timeleft -= 1;

            if(timeleft <= 0)
            {
                $.ajax({  
                url:"save.php",  
                method:"POST",  
                data:{id:id,stat:stat},  
                    success:function(data)
                    {  
                        if(data == 1)
                        {
                            toastr.success('Saved Successfully!');
                            document.getElementById("undodiv").style.display = "none";
                            clearInterval(downloadTimer);
                            id= "";
                            $ele.fadeOut(900,function(){
                            $(this).remove();});
                            document.getElementById("status").prop('selectedIndex',0);
                            load_data(1);
                            
                        }
                         
                        if(data == 0)
                        {
                            toastr.error('There might be some error!');
                        }
                    }
                });
                
            }

            
        }, 1000);
            $(document).on('click', 'a[data-role=undo]', function() 
            {
                document.getElementById("undodiv").style.display = "none";
                clearInterval(downloadTimer);
                id= "";
            });
            
       }); 
       
       //rejected
      $(document).on('click', 'a[data-role=reject]', function() 
      {
          var $ele = $(this).parent().parent();
          var id = $(this).attr("id");
          var stat="Rejected";
          document.getElementById("undodiv").style.display='block';
          var timeleft = 10;
          var downloadTimer = setInterval(function() 
        {
            document.getElementById("undodiv").innerHTML = "<a href='#' data-role='undo'><strong>Undo</strong></a> you can undo the action by clicking it<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close' data-bs-original-title='' title=''></button>";
            timeleft -= 1;

            if(timeleft <= 0)
            {
                $.ajax({  
                url:"save.php",  
                method:"POST",  
                data:{id:id,stat:stat},  
                    success:function(data)
                    {  
                        if(data == 1)
                        {
                            toastr.success('Saved Successfully!');
                            document.getElementById("undodiv").style.display = "none";
                            clearInterval(downloadTimer);
                            id= "";
                            $ele.fadeOut(900,function(){
                            $(this).remove();});
                            load_data(1);
                            document.getElementById("status").prop('selectedIndex',0);
                        }
                         
                        if(data == 0)
                        {
                            toastr.error('There might be some error!');
                        }
                    }
                });
                
            }

            
        }, 1000);
            $(document).on('click', 'a[data-role=undo]', function() 
            {
                document.getElementById("undodiv").style.display = "none";
                clearInterval(downloadTimer);
                id= "";
            });
            
       }); 
       
       //delay
      $(document).on('click', 'a[data-role=delayed]', function() 
      {
          var $ele = $(this).parent().parent();
          var id = $(this).attr("id");
          var stat="Delayed";
          document.getElementById("undodiv").style.display='block';
          var timeleft = 10;
          var downloadTimer = setInterval(function() 
        {
            document.getElementById("undodiv").innerHTML = "<a href='#' data-role='undo'><strong>Undo</strong></a> you can undo the action by clicking it<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close' data-bs-original-title='' title=''></button>";
            timeleft -= 1;

            if(timeleft <= 0)
            {
                $.ajax({  
                url:"save.php",  
                method:"POST",  
                data:{id:id,stat:stat},  
                    success:function(data)
                    {  
                        if(data == 1)
                        {
                            toastr.success('Saved Successfully!');
                            document.getElementById("undodiv").style.display = "none";
                            clearInterval(downloadTimer);
                            id= "";
                            $ele.fadeOut(900,function(){
                            $(this).remove();});
                            load_data(1);
                            document.getElementById("status").prop('selectedIndex',0);
                        }
                         
                        if(data == 0)
                        {
                            toastr.error('There might be some error!');
                        }
                    }
                });
                
            }

            
        }, 1000);
            $(document).on('click', 'a[data-role=undo]', function() 
            {
                document.getElementById("undodiv").style.display = "none";
                clearInterval(downloadTimer);
                id= "";
            });
            
       }); 
    
    //changes req
      $(document).on('click', 'a[data-role=changes]', function() 
      {
          var $ele = $(this).parent().parent();
          var id = $(this).attr("id");
          var stat="Alteration";
          document.getElementById("undodiv").style.display='block';
          var timeleft = 10;
          var downloadTimer = setInterval(function() 
        {
            document.getElementById("undodiv").innerHTML = "<a href='#' data-role='undo'><strong>Undo</strong></a> you can undo the action by clicking it<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close' data-bs-original-title='' title=''></button>";
            timeleft -= 1;

            if(timeleft <= 0)
            {
                $.ajax({  
                url:"save.php",  
                method:"POST",  
                data:{id:id,stat:stat},  
                    success:function(data)
                    {  
                        if(data == 1)
                        {
                            toastr.success('Saved Successfully!');
                            document.getElementById("undodiv").style.display = "none";
                            clearInterval(downloadTimer);
                            id= "";
                            $ele.fadeOut(900,function(){
                            $(this).remove();});
                            load_data(1);
                            document.getElementById("status").prop('selectedIndex',0);
                        }
                         
                        if(data == 0)
                        {
                            toastr.error('There might be some error!');
                        }
                    }
                });
                
            }

            
        }, 1000);
            $(document).on('click', 'a[data-role=undo]', function() 
            {
                document.getElementById("undodiv").style.display = "none";
                clearInterval(downloadTimer);
                id= "";
            });
            
       }); 
      $(document).on('click', '.page-link', function(){
       var page = $(this).data('page_number');
       var query = $('#search_box').val();
       var status = document.getElementById("status").value;
       load_data(page, query, status);
     });
     
      $(document).on('click', '#status', function()
    {

        var status = document.getElementById("status").value;
        var page = $(this).data('page_number');
        var query = $('#search_box').val();
        load_data(page,query,status);
     });
   
     $('#search_box').change(function(){
       var query = $('#search_box').val();
       load_data(1, query);
     });
     
     $(document).on('click', '.ref', function(){
        
         toastr.info('Refreshed!');
         document.getElementById("status").value='0';
         document.getElementById("search_box").value='';
         load_data(1);
     });
     
      $(document).on('click', 'a[data-role=prview]', function() {
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
                            
                            var a = document.getElementById('prprint'); 
                            a.href = "Print.php?id="+id;
                    }
                });
        });
     
       $(document).on('click', 'a[data-role=prnew]', function() {
         $('#pr-new').modal('toggle');
            $('#pr-new').modal('toggle');
            $('input[name="item[]"]').val('');
            $('input[name="quantity[]"]').val('');
            $('input[name="expected[]"]').val('');
            $('input[name="desc[]"]').val('');
            $('#Date_needed').val('');
            
       });
         
            $('#create_pr').click(function() {
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
    
       
   });
    
   
   
</script>
<?php include ("../include/footer.php"); ?>
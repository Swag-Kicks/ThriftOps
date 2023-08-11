<?php
session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);
date_default_timezone_set("Asia/Karachi");
//$ia=0;
   
// $cr=$_SESSION['Username'];
// if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
// {
//     $pr="Select * from Users Where Dept_ID=5 AND Username='$cr' OR Dept_ID=3 AND Username='$cr'";
//     $resu2 = mysqli_query($mysql, $pr);
//     $rowq1 =mysqli_fetch_array($resu2);
//     $dept=$rowq1['Dept_ID'];
//     //echo $dept;
//     if($dept=='')
//     {
//         echo '<script>alert("Your Are Not Authorized !");window.location.href="../Dashboard/Home.php";</script>';
//     }   
// }
// else 
// {
//     echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
   
// }


   ?>
<script>
   $(document).ready(function()
   {
       $('#Cat').change(function()
       {
           var cat_id=$('#Cat').val();
           $('#Sub_Cat').empty(); 
           $.get('load_data_cat.php',{'cat_id':cat_id},function(return_data)
           {
               $.each(return_data.data, function(key,value)
                   {
                       $("#Sub_Cat").append("<option value='"+value.Category_ID+"'>"+value.Name+"</option>");
                   });
           }, "json");
           
       });
   });
</script>
<script>
   $(document).ready(function()
   {
       $('#Vendor').change(function()
       {
           var ven_id=$('#Vendor').val();
           $('#Lot').empty(); 
           $.get('load_data_ven.php',{'ven_id':ven_id},function(return_data)
           {
               $.each(return_data.data, function(key,value)
                   {
                       $("#Lot").append("<option value='"+value.id+"'>"+value.Lot_Number+"</option>");
                   });
           }, "json");
           
       });
   });
</script>'



<script>
   $(document).ready(function()
   {
    $('#SKU').on('submit', function(event){
        event.preventDefault();
        var error = '';
        var grn = $('#GRN_ID').val();
        // alert(grn);
        var war = $('#war').val();
        // alert(war);
        var cat = $('#Cat').val();
        // alert("cat:"+cat);
        var user = $('#USER').val();
        // alert("user:"+user);
        var sub = $('#Sub_Cat').val();
        // alert("sub:"+sub);
        var req = $('#Req_date').val();
        // alert(req);
        var ven = $('#ven').val();
        // alert("ven:"+ven);



        var form_data = $(this).serialize();
        if(error == '')
        {
            $.ajax({
            url:"insert.php",
            method:"POST",
            data:form_data,
            success:function(data)
            {
                if(data == 1)
                {
                     toastr.success('Success!');
                     document.getElementById("SKU").reset();
                }
                if(data == 0)
                {
                     toastr.error('SKU already allocated on this GRN!');
                     
                }
            }
            });
        }
        else
        {
            // $('#error').html('<div class="alert alert-danger">'+error+'</div>');
        }
    });
   });
</script>
<?php include ("../include/header.php"); ?>
<?php include ("../include/sidebar.php"); ?>
        <!-- Page body start-->
        <div class="page-body">
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="select2-drpdwn">
              <div class="row">
                <!-- Default Textbox start-->
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <!-- paste your code -->
                      <form action="" method="POST" id="SKU">
            <div class="card-body">
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label class="form-label">Created At</label>
                        <input type="text" class="form-control" name="Req_date" id="Req_date" value="<?php echo date('Y-m-d/h:i:a'); ?>"readonly>
                        <input class="form-control" type="hidden" name="USER" id="USER" value="<?php echo $_SESSION['id']; ?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <input type="text" class="form-control" name="GRN_ID" id="GRN_ID" placeholder="Enter GRN ID" required=" style=" padding: 20px !important; ">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label class="form-label">Warehouse</label>
                        <select class="form-control" name="war" id="war">
                           <option disabled selected>Select Warehouse</option>
                           <?php $records = mysqli_query($mysql, "SELECT * FROM `Warehouse`"); 
                              while($data = mysqli_fetch_array($records))
                              {
                                  echo "<option value='". $data['Warehouse_ID'] ."'>" .$data['Location'] ."</option>";
                              } 
                              ?>
                        </select>
                     </div>
                  </div>
                  
                   <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label">Vendor</label>
                        <select class="form-control" name="ven" id="ven">
                           <option disabled selected>Select Vendor</option>
                           <?php $records = mysqli_query($mysql, "SELECT * FROM `Vendor`"); 
                              while($data = mysqli_fetch_array($records))
                              {
                                  echo "<option value='". $data['Vendor_ID'] ."'>" .$data['Name'] ."</option>";
                              } 
                              ?>
                        </select>
                     </div>
                  </div>
                  
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label">Cateory</label>
                        <select class="form-control" name="Cat" id="Cat">
                           <option disabled selected>Select Category</option>
                           <?php $records = mysqli_query($mysql, "SELECT * FROM `Product_Type`"); 
                              while($data = mysqli_fetch_array($records))
                              {
                                  echo "<option value='". $data['Product_ID'] ."'>" .$data['Name'] ."</option>";
                              } 
                              ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                         <label class="form-label">Sub-Category</label>
                        <select class="form-control" name="Sub_Cat" id="Sub_Cat">
                           <option disabled selected>Select Sub-Category</option>
                        </select>
                     </div>
                  </div>
    
                  <div class="col-12">
                      <button class="btn btn-primary btn-block" id="submit" name="submit" data-toggle="modal">Save</button>
                  </div>
               </div>
            </div>
         </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        
<?php include ("../include/footer.php"); ?>
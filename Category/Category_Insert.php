<?php


session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);
date_default_timezone_set("Asia/Karachi");



?>

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
                    <div class="card-header pb-0">
                      <h5 class="card-title">Rack View</h5>
                    </div>
                    <div class="card-body">
                      <div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h3 class="mb-0 card-title">Create Product Category</h3>
         </div>
         <form action="" method="POST" id="category">
            <div class="card-body">
                <div class="row">
                <div class="col-md-6">
               <h6> Fill Out The Details as Follows:</h6>
               </br>
               </div>
                <div class="col-md-6">
                                 <a href="Category_View"> <input type="button" value="View Category" class="btn btn-primary-light m-l-15 f-right" style="padding: 8px 30px;"></a>
                         <input type="button" name="pick" value="⟳ Refresh" id="refresh" class="btn btn-primary f-right ref">
                     </div>
                     </div>
               <div class="row">
                <div class="col-12">
                     <div class="form-group has-success">
                        <label class="form-label">Created Date</label>
                        <input class="form-control" type="hidden" name="USER" id="USER" value="<?php echo $_SESSION['id']; ?>" readonly>
                        <input type="text" class="form-control" name="Req_date" value="<?php echo date('Y-m-d/h:i:a'); ?>" readonly="">
                     </div>
                  </div>
                 <div class="col-md-6">
                     <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                            
                     </div>
                     </div>
                     
                   <div class="col-md-6">
                     <div class="form-group">
                        <label>SKU Format</label>
                        <input type="text" class="form-control" name="format" id="format" required>
                        <label id="dynamic_content"> </label>
                         
                     </div>
                    </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Choose Product</label>
                        <select class="custom-select form-control aiz-tag-input" name="pr" id="pr">
                            <option disabled selected>Select Product</option>
                            <?php
            
                            $records = mysqli_query($mysql, "SELECT * FROM `Product_Type`"); 

                            while($data = mysqli_fetch_array($records))
                            {
                                echo "<option value='". $data['Product_ID'] ."'>" .$data['Name'] ."</option>";
                            }   
                            ?> 
                        </select>                       
                    </div>
                  </div>
                  <div class="col-md-6">
                 
                        <input type="button" class="btn btn-primary btn-block f-right" id="check" name="check" value="Check">
                                
                               
                                
                      <button class="btn btn-primary btn-block f-right" name="submit" data-toggle="modal" data-target="#exampleModal" style="margin-right: 3px;">Save</button>
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
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
<script>
$(document).ready(function(){

    $(document).on('click', '#check', function(){
      var id = $('#name').val();
        $.ajax({  
                    url:"check.php",  
                    method:"POST",  
                    data:{id:id}, 
                    
                    success:function(data)
                    { 
                        if(data == 0)
                        {
                            toastr.error('Error while suggestions!');
                        }
                        else
                        {
                            $('#dynamic_content').html(data);
                        }
                      
                    
                    }
                });

    }); 
}); 
</script>

<!--for insertion-->

<script>
   
 $('#category').on('submit', function(event){
        event.preventDefault();
        var error = '';
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
                    document.getElementById("category").reset();
                    
                }
                
                if(data == 0)
                {
                    toastr.error('Category Name,SKU Format already exists!');
                    document.getElementById("category").reset();
                    
                }
            }
            });
        }
        else
        {
           
        }
    });


   
</script>
<?php include ("../include/footer.php"); ?>
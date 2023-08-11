<?php
session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);


// $cr=$_SESSION['Username'];
// if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
// {
//     $pr="Select * from User Where Dept_ID=1 AND Username='$cr'";
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

<?php include ("../include/header.php"); ?>
<div class="row">
   <div class="col-md-12">
       <br>
      <div class="card">
         <div class="card-header">
            <h3 class="mb-0 card-title">Create Vendor Account</h3>
         </div>
         <form action="" method="POST" id="vendor">
            <div class="card-body">
               <h6> Fill Out The Details as Follows:</h6>
               <br><br>
               <div class="row">
                  <div class="col-md-6">
                     
                     <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" id="address" required>
                     </div>
                     <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" name="type" id="type"> 
                            <option disabled selected>Select Type</option>
                            <option value="A">Cash</option>
                            <option value="B">Percentage</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Contact</label>
                        <input class="form-control" name="contact" id="contact" required>
                     </div>
                      
                     <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                    </div> 
                   <div id="B" class="row data">
    <div class="col-md-3">
       <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="username" id="username">
       </div>
       <div class="form-group">
          <label>SK Format</label>
          <input type="text" class="form-control" name="format" id="format">
           <label id="dynamic_content"> </label>
       </div>
         <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" id="email">
         </div>
       
    </div>
    <div class="col-md-3">
       <div class="form-group">
           <label>Percentage</label>
          <input type="text" class="form-control" name="percent" id="percent" >
       </div>
       <div class="form-group" style=" margin-top: 40px;">
          <input type="button" class="btn btn-primary btn-block" id="check" name="check" value="Check">
       </div>
       <class="col-md-3">
         <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="pass" id="pass">
         </div>
    </div>
</div>
                                
                            </div>
                                <br>
                               
                     </div>

                   
                   <div class="col-md-6">
                       <div class="form-group">
                        
                           <br>
                     <button class="btn btn-primary btn-block" name="submit" data-toggle="modal" data-target="#exampleModal">Save</button>
                     </div>
                  </div>
                 
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
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
<script>
   
 $('#vendor').on('submit', function(event){
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
                    document.getElementById("vendor").reset();
                    
                }
                
                if(data == 0)
                {
                    toastr.error('Error while creating!');
                    document.getElementById("vendor").reset();
                    
                }
                if(data == 3)
                {
                    toastr.error('Enteries exits!');
                    document.getElementById("vendor").reset();
                    
                }
            }
            });
        }
        else
        {
           
        }
    });


   
</script>
<script>
    $(document).ready(function() {
        $('#type').change(function() {
            $(".data").hide();
            $("#"+$(this).val()).fadeIn();
        }).change();
    });        
</script>
	
    <?php include ("../include/footer.php"); ?>
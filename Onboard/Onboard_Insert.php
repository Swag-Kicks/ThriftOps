<?php


session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);

// $cr=$_SESSION['Username'];
// if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
// {
//     $pr="Select * from Users Where Dept_ID=3 AND Username='$cr'";
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
                      <div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h3 class="mb-0 card-title">Add User</h3>
         </div>
         <form action="" method="POST" id="onboard">
            <div class="card-body">
               <h6> Fill Out The Details as Follows:</h6>
               </br>
               <div class="row">
                 <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="Name" id="Name" placeholder="Enter Your Full Name" required="">
                     </div>
                     <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="Password" id="Password" placeholder="Enter Tour Password" required="">
                     </div>
                     <div class="form-group">
                        <label class="form-label">Contact Number</label>
                        <input type="text" class="form-control" name="Cont" id="Cont" placeholder="Enter Tour Password" required="">
                     </div>
                     
                     
                     <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required="">
                     </div>
                     
                </div>     
                  <div class="col-md-6">
                     <div class="form-group has-success">
                        <label class="form-label">User Name</label>
                        <input type="text" class="form-control" name="Username" id="Username" placeholder="Enter User Name" required>
                     </div>
                     <div class="form-group">
                        <label>Select Department</label>
                        <select class="custom-select form-control" data-placeholder="Choose Department" name="Dept_id" id="Dept_id"  required="">
                           <option disabled selected>Select Department</option>
                           <?php
        
                            $records = mysqli_query($mysql, "SELECT * FROM `Department`"); 

                            while($data = mysqli_fetch_array($records))
                            {
                                echo "<option value='". $data['Dept_ID'] ."'>" .$data['Name'] ."</option>";
                            }   
                        ?>  
                        </select>
                     </div>
                     <div class="form-group">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="Add" id="Add" required="">
                     </div>
                  </div>
                  <div class="col-12">
                     <button class="btn btn-primary btn-block f-right" name="submit" data-toggle="modal" data-target="#exampleModal">Create Request</button>
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
 $('#onboard').on('submit', function(event){
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
                    document.getElementById("onboard").reset();
                    
                }
                
                if(data == 0)
                {
                    toastr.error('Error while creating!');
                    document.getElementById("onboard").reset();
                    
                }
                
                if(data == 2)
                {
                    toastr.error('User already exists!');
                    document.getElementById("onboard").reset();
                    
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

<?php
   session_start();
   include_once("../include/mysql_connection.php"); 
   error_reporting(0);
   date_default_timezone_set("Asia/Karachi");
   
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
<?php include ("../include/header.php"); ?>
<br>
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h3 class="mb-0 card-title">Create Product Category</h3>
         </div>
         <form action="" method="POST" id="type">
            <div class="card-body">
               <h6> Fill Out The Details as Follows:</h6>
               </br>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <input type="text" class="form-control is-valid state-valid" name="Pr_name" id="Pr_name" placeholder="Enter Your Product Category Name" required="">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group has-success">
                        <input type="text" class="form-control" name="Req_date" value="<?php echo date('Y-m-d/h:i:a'); ?>" readonly="">
                     </div>
                  </div>
                  <div class="col-12">
                     <button class="btn btn-primary btn-block" name="submit" data-toggle="modal" data-target="#exampleModal">Create</button>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>

<script>
   
 $('#type').on('submit', function(event){
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
                    document.getElementById("type").reset();
                    
                }
                
                if(data == 0)
                {
                    toastr.error('Error while creating!');
                    document.getElementById("type").reset();
                    
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
<?php


session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);

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
   
//}
// if (isset($_POST['submit'])) 
// {
    

// 	$Lot_Number = $_POST['Lot_name'];
//     $Vendor_ID =$_POST['ven_id'];
//     $Lot_Unit_Quantity=$_POST['Lot_quantity'];
//     $Lot_Description=$_POST['Lot_desc'];

 
    

//     $sql = "INSERT INTO lot (Lot_Number,Vendor_ID,Lot_Unit_Quantity,Lot_Description) VALUES ('$Lot_Number', '$Vendor_ID', '$Lot_Unit_Quantity','$Lot_Description')";
//     $result = mysqli_query($mysql, $sql);

    

//     if (!$result) 
//     {
//         echo "<script>alert('Lot Not Generating !.')</script>";
       
//     } 
//     else 
//     {
//         echo "<script>alert('Lot Generate Completed !.')</script>";
       
           
// 	}
		
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
                      <div class="card">
                <div class="card-header">
                    <h3 class="mb-0 card-title">Create Lot</h3>
                </div>
		        <form action="" method="POST" id="lot">
                    <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                            <label class="form-label">Number</label>
                            <input type="text" class="form-control" name="number" id="number" placeholder="Type Your Lot Name" required>
                         </div>
                      </div> 
                      <div class="col-md-6">
                         <div class="form-group">
                            <label class="form-label">Vendor</label>
                            <select name="ven_id" id="ven_id" class="form-control">
                                <option disabled selected>Select Vendor</option>
                                    <?php
                    
                                    $records = mysqli_query($mysql, "SELECT * FROM `Vendor`"); 

                                    while($data = mysqli_fetch_array($records))
                                    {
                                        echo "<option value='". $data['Vendor_ID'] ."'>" .$data['Name'] ."</option>";
                                    }   
                                    ?>                       
                            </select>
                        </div>
                      </div>
                      <div class="col-md-12"> 
                         <div class="form-group">
                            <label class="form-label">Quantity</label>
                            <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Lot Quantity">
                         </div>
                         <div class="form-group">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" id="desc" rows="3" name="desc" ></textarea>
                         </div>
                      </div>
                       <div class="col-md-12" >
                            <button class="btn btn-primary btn-block f-right" name="submit" data-toggle="modal" data-target="#exampleModal">Save</button>
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
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
	       
<script>
   
 $('#lot').on('submit', function(event){
        event.preventDefault();
        var error = '';
        var num = $('#number').val();
        var ven = $('#ven_id').val();
        var quantity = $('#quantity').val();
        var desc = $('#desc').val();

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
                    document.getElementById("lot").reset();
                    
                }
                
                if(data == 0)
                {
                    toastr.error('Error while creating!');
                    document.getElementById("lot").reset();
                    
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
<?php


session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);

// $cr=$_SESSION['Username'];
// if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
// {
//     $pr="Select * from Users Where Dept_ID=13 AND Username='$cr' OR Dept_ID=3 AND Username='$cr'";
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


$sql1 = "SELECT * FROM SK_Rack order by Rack_ID desc limit 1";
$result1 = mysqli_query($mysql, $sql1);
$row =mysqli_fetch_array($result1);

$last_id=$row['number'];
if ($last_id == " ") 
{
    $number = "1";
}
else
{
    $number = substr($last_id,0);
    $number = intval($number);
    $number = $number+1;
}

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
            <h3 class="mb-0 card-title">Create Rack</h3>
         </div>
         <form action="" method="POST" id="rack">
            <div class="card-body">
               <h6> Fill Out The Details as Follows:</h6>
               </br>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label">Rack Number</label>
                        <input type="text" class="form-control" name="number" id="number" value="<?php echo $number; ?>"  placeholder="Enter Rack Number" required>
                     </div>
                     <div class="form-group">
                        <label class="form-label">Number Of Columns</label>
                        <input type="text" class="form-control" name="col" id="col" placeholder="Enter Number Of Columns" required>
                     </div>
                     <div class="form-group">
                        <label>Select Type</label>
                        <select class="form-control" id="type" name="type">
                           <option disabled selected>Select Category</option>
                           <?php $records = mysqli_query($mysql, "SELECT * FROM `Product_Type`"); 
                            while($data = mysqli_fetch_array($records))
                            {
                                echo "<option value='". $data['Product_ID'] ."'>" .$data['Name'] ."</option>";
                            }   
                            ?>
                        </select>
                     </div>
                     
                     <div class="form-group mb-0">
                     <label>Product Child Category</label>
                     <select class="form-select form-control custom-select" name="Sub_Cat" id="Sub_Cat" required>
                        <option disabled selected>Select Category</option>
                     </select>
                  </div>
                     
                 </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Number Of Rows</label>
                        <input type="text" class="form-control" name="row" id="row" placeholder="Enter Number Of Rows" required="">
                     </div>
                     <div class="form-group">
                        <label class="form-label">Number Of Layers</label>
                        <input type="text" class="form-control" name="lay" id="lay" placeholder="Enter Number Of Layers">
                     </div>
                     <div class="form-group">
                        <label>Warehouse</label>
                        <select class="form-control" id="war" name="war">
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
                  
                  <div class="">
                      <br>
                     <button class="btn btn-primary btn-block f-right" name="submit">Create</button>
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
   $(document).ready(function() {
   	$('#type').change(function() {
   		var cat_id = $('#type').val();
   		$('#Sub_Cat').empty();
   		$.get('load_data_cat.php', {
   			'cat_id': cat_id
   		}, function(return_data) {
   			$.each(return_data.data, function(key, value) {
   				$("#Sub_Cat").append("<option value='" + value.Category_ID + "'>" + value.Name + "</option>");
   			});
   		}, "json");
   	});
   });
</script>

<script>
   
 $('#rack').on('submit', function(event){
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
                    document.getElementById("rack").reset();
                    
                }
                
                if(data == 0)
                {
                    toastr.error('Error while creating!');
                    document.getElementById("rack").reset();
                    
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
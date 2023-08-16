<?php 
session_start();

include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0); 
$cr=$_SESSION['Username'];
$sql = "SELECT * FROM User WHERE username='$cr'";
$result = mysqli_query($mysql, $sql);
$er = mysqli_fetch_assoc($result);
$Dept=$er['Dept_ID'];

$name="Wellcome, ".$cr."!!";

 


?>

<?php include ("../include/header.php"); ?>
<?php  
include ("../include/side_admin.php");
   
   ?>
   <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="../assets/css/daterange-picker.css">
    <!-- Plugins JS start-->
    <script src="../assets/js/datepicker/daterange-picker/moment.min.js"></script>
    <script src="../assets/js/datepicker/daterange-picker/daterangepicker.js"></script>
    <script src="../assets/js/datepicker/daterange-picker/daterange-picker.custom.js"></script>
    <!-- Plugins JS Ends-->
      <!-- Page Body Start-->
      <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        <!-- Page Sidebar Ends-->
        <div class="page-body">
            <div class="row mt-3">
          <div class="col-md-4">
              <h3 class=" modal-title m-l-10"><b>Sales By Category</b></h3>
                
               
            </div>
            <div class="col-md-2">
                <div class="form-group ">
                          <label class="col-sm-3 col-form-label">From</label>
                          <div class="">
                            <div class="input-group">
                              <input class=" form-control digits" id="fromdate" type="date" data-language="en" data-bs-original-title="" title=""  style;"border-radius: 6px;">
                            </div>
                          </div>
                        </div>
         </div>
          <div class="col-md-2">
              
            <div class="form-group ">
                          <label class="col-sm-3 col-form-label">To</label>
                          <div class="">
                            <div class="input-group">
                              <input class=" form-control digits" type="date" id="todate" data-language="en" data-bs-original-title="" title="" style;"border-radius: 6px;">

                            </div>
                          </div>
                        </div>
            
         </div>
         <div class="col-md-2">
             <div class="form-group ">
                          
                          <div class="">
                            <div class="input-group">
                              <a href="#" class="btn btn-primary" style="margin-top: 33px;" id="ref">Refresh</a>
                            </div>
                          </div>
                        </div>
             
                        
         </div>
         
        
         
    
            
          <!-- Container-fluid starts-->
          <div class="container-fluid dashboard-default-sec">
            <div class="row">
                
           
    
              <div class="col-md-12"> 
                <div class="row">
        

            </div>
            <div class="row">
        
      </div>
      <div class="row my-4">
        <div class="col">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6 class="text-xxl font-weight-bolder" style="display: inline-block;">Sales By Categories</h6>
              <a href="Dashboard2/Sales_Report.php" class="btn btn-primary" style="float: right;">View All</a>
            </div>
            <div class="card-body ">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10 ps-2"># of Items</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10 ">Revenue</th>
                    
                    
                    </tr>
                  </thead>
                  <tbody id="catfill">
                  </tbody>
                </table>
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
$(document).ready(function()
{

    cat();
    function cat(from,to)
    {
        $.ajax({
                url:"Track.php",
                method:"POST",
                data:{from:from,to:to},
                 success:function(response)
                 {
                    var test=JSON.parse(response);
                    console.log(test);
                    // var book=test[0];
                    // var dispatch=test[1];
                    // var intransit=test[2]
                    var fill='';
                    for(var i=0; i<test.length; i++)
                    {
                        fill+="<tr>";
                        fill+="<td><div class='d-flex px-4 py-1'><div class='d-flex flex-column justify-content-center'>";
                        fill+="<h6 class='mb-0 text-sm'>"+test[i]["cat"]+"</h6>";
                        
                        fill+="</div></div></td><td><p class='text-xs font-weight-bold mb-0'>"+test[i]["count"]+"</p></td>";
                        fill+="<td class='align-middle text-center text-sm'><p class='text-xs font-weight-bold mb-0'>"+test[i]["total"]+"</p></td>";
                        fill+="</tr>";
                        //${response[i].Percentage}
                        
                        
                    }
                    
                    $('#catfill').append(fill);
                }
            });
    }
    $(document).on('click', '#ref', function()
    {
        toastr.info('Refreshed!');
        $('#catfill').empty();
        document.getElementById("fromdate").value='';
        document.getElementById("todate").value='';
    }); 
     //date
    $("#fromdate").change(function()
    {
       from=document.getElementById("fromdate").value;
        $("#todate").change(function()
        {
            to=document.getElementById("todate").value;
            $('#catfill').empty();
            cat(from,to);
        });
    });
 });
</script>
        <?php include ("../include/footer.php"); ?>
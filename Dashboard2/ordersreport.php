<?php 
   //___________________________________________________________________________________________________________________________________________________________________
   //Initialization
   session_start();
   include_once("mysql.php"); 
   error_reporting(0);
   date_default_timezone_set("Asia/Karachi");
   $monthinwords=date('F');
   $monthinnumbers=date('m');
   $year=date('Y');
   
   $total_Count = 0;
   
   if(isset($_POST['filter']))
   {
       $startDate = $_POST["from"];
       $endDate = $_POST["To"];
       $sql = "SELECT orders.Status, COUNT(orders.Status) AS `res`FROM orders WHERE Date Between '$startDate' AND '$endDate' GROUP BY orders.Status;";
       $sql_Courier = "SELECT orders.Courier_Status, COUNT(orders.Courier_Status) As 'Cou' FROM `orders` WHERE Courier='Leopard' And Date Between '$startDate' AND '$endDate'  GROUP BY orders.Courier_Status;";
       $sql_Post = "SELECT orders.Courier_Status, COUNT(orders.Courier_Status) As 'Post' FROM `orders` WHERE Courier='PostEx' And Date Between '$startDate' AND '$endDate' GROUP BY orders.Courier_Status";
       $sql_Rider = "SELECT orders.Courier_Status, COUNT(orders.Courier_Status) As 'Rider' FROM `orders` WHERE Courier='Rider' And Date Between '$startDate' AND '$endDate' GROUP BY orders.Courier_Status;";
       $sql_Self = "SELECT orders.Courier_Status, COUNT(orders.Courier_Status) As 'Self' FROM `orders` WHERE Courier='Self' And Date Between '$startDate' AND '$endDate' GROUP BY orders.Courier_Status;";
   
       $result = mysqli_query($mysql, $sql);
       $courier_result = mysqli_query($mysql, $sql_Courier);
       $Post_result = mysqli_query($mysql, $sql_Post);
       $Rider_result = mysqli_query($mysql, $sql_Rider);
       $Self_result = mysqli_query($mysql, $sql_Self);
   } 
   else 
   {
       $tot = 0;
       $sql = "SELECT orders.Status, COUNT(orders.Status) AS `res`FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' GROUP BY orders.Status;";
       $sql_Courier = "SELECT orders.Courier_Status, COUNT(orders.Courier_Status) As 'Cou' FROM `orders` WHERE Courier='Leopard' And YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers'  GROUP BY orders.Courier_Status;";
       $sql_Post = "SELECT orders.Courier_Status, COUNT(orders.Courier_Status) As 'Post' FROM `orders` WHERE Courier='PostEx' And YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' GROUP BY orders.Courier_Status;";
       $sql_Rider = "SELECT orders.Courier_Status, COUNT(orders.Courier_Status) As 'Rider' FROM `orders` WHERE Courier='Rider' And YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' GROUP BY orders.Courier_Status;";
       $sql_Self = "SELECT orders.Courier_Status, COUNT(orders.Courier_Status) As 'Self' FROM `orders` WHERE Courier='Self' And YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' GROUP BY orders.Courier_Status;";
   
       $result = mysqli_query($mysql, $sql);
       $courier_result = mysqli_query($mysql, $sql_Courier);
       $Post_result = mysqli_query($mysql, $sql_Post);
       $Rider_result = mysqli_query($mysql, $sql_Rider);
       $Self_result = mysqli_query($mysql, $sql_Self);
       
   }
   ?> 
<?php include ("../include/header.php"); ?> 
<?php include ("../include/side_admin.php"); ?>
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
                      <h5 class="card-title">Order Reports</h5>
                    </div>
                    <div class="card-body">
                     <form action="" method="POST" class="PR">
                         <div class="row">
          <div class="col-md-4">
              <h3 class=" modal-title"></h3>
               
            </div>
            <div class="col-md-2 mt-2">
             
         </div>
         <div class="col-md-3">
            <div class="form-group ">
                          <label class="col-sm-3 col-form-label">From</label>
                          <div class="">
                            <div class="input-group">
                              <input  class=" form-control digits" placeholder="YYYY-DD-MM" type="date" name="from" style;"border-radius:6px;">
                            </div>
                          </div>
                        </div>
            
         </div>
         <div class="col-md-3">
            <div class="form-group ">
                          <label class="col-sm-3 col-form-label">To</label>
                          <div class="">
                            <div class="input-group">
                              <input  class=" form-control digits" placeholder="YYYY-DD-MM" type="date" name="To" style;"border-radius:6px;">
                             
                            </div>
                            <button name="filter" class="btn btn-primary f-right mt-2">Filter</button>
                          </div>
                        </div>
         </div>
         
        </div>
  

   <div class="container-fluid dashboard-default-sec">
  <div class="row">
    <div class="col-md-4 ">
       <div class="card o-hidden border-0">
          <div class="b-r-4 card-body">
             <?php
                     echo $tableHead = "
                         <table class='table table-hover' id='crud_table'>
                         <tr>
                             <th>Swag Status</th>
                             <th>Count</th>
                         </tr>";
                         while ($row = mysqli_fetch_array($result)) {
                             echo $e="
                                 <tr>
                                     <td>$row[Status]</td>
                                     <td>$row[res]</td>
                                 </tr>";
                         $total_Count += $row[res];
                         }
                                     echo $tableEnd = "
                                         <tr>
                                         <td>Total Count</td>
                                         <td>$total_Count</td>
                                         </tr>
                                     </table>";?> 
          </div>
       </div>
    </div>
    <div class="col-md-4 ">
       <div class="card o-hidden border-0">
          <div class="b-r-4 card-body">
             <?php
                  echo $tableHead = "
                      <table class='table table-hover' id='crud_table'>
                      <tr>
                          <th>Leopard Status</th>
                          <th>Count</th>
                      </tr>";
                      while ($row = mysqli_fetch_array($courier_result)) {
                          echo $e="
                              <tr>
                                  <td>$row[Courier_Status]</td>
                                  <td>$row[Cou]</td>
                              </tr>";
                      }
                                  echo $tableEnd = "
                                      <tr>
                                      <td>Total Count</td>
                                      <td></td>
                                      </tr>
                                  </table>";?> 
          </div>
       </div>
    </div>
    <div class="col-md-4">
       <div class="card o-hidden border-0">
          <div class="b-r-4 card-body">
            <?php
                  echo $tableHead = "
                      <table class='table table-hover' id='crud_table'>
                      <tr>
                          <th>PostEx Status</th>
                          <th>Count</th>
                      </tr>";
                      while ($row = mysqli_fetch_array($Post_result)) {
                          echo $e="
                              <tr>
                                  <td>$row[Courier_Status]</td>
                                  <td>$row[Post]</td>
                              </tr>";
                      }
                                  echo $tableEnd = "
                                      <tr>
                                      <td>Total Count</td>
                                      <td></td>
                                      </tr>
                                  </table>";?> 
          </div>
       </div>
    </div>
    <div class="col-md-4">
       <div class="card o-hidden border-0">
          <div class="b-r-4 card-body">
             <?php
                  echo $tableHead = "
                      <table class='table table-hover' id='crud_table'>
                      <tr>
                          <th>Rider Status</th>
                          <th>Count</th>
                      </tr>";
                      while ($row = mysqli_fetch_array($Rider_result)) {
                          echo $e="
                              <tr>
                                  <td>$row[Courier_Status]</td>
                                  <td>$row[Rider]</td>
                              </tr>";
                      }
                                  echo $tableEnd = "
                                      <tr>
                                      <td>Total Count</td>
                                      <td></td>
                                      </tr>
                                  </table>";?> 
          </div>
       </div>
    </div>
    <div class="col-md-4">
       <div class="card o-hidden border-0">
          <div class="b-r-4 card-body">
              <?php
                  echo $tableHead = "
                      <table class='table table-hover' id='crud_table'>
                      <tr>
                          <th>Self Status</th>
                          <th>Count</th>
                      </tr>";
                      while ($row = mysqli_fetch_array($Self_result)) {
                          echo $e="
                              <tr>
                                  <td>$row[Courier_Status]</td>
                                  <td>$row[Self]</td>
                              </tr>";
                      }
                                  echo $tableEnd = "
                                      <tr>
                                      <td>Total Count</td>
                                      <td></td>
                                      </tr>
                                  </table>";?> 
          </div>
       </div>
    </div>
  </div>
</div>  
<!--<div class="col-xl-4 col-sm-6">-->
<!--                <div class="card browser-widget">-->
<!--                  <div class="media card-body">-->
<!--                    <div class="media-img"><img src="../assets/images/dashboard/firefox.png" alt=""></div>-->
<!--                    <div class="media-body align-self-center">-->
<!--                      <div>-->
<!--                        <p>Daily </p>-->
<!--                        <h4><span class="counter">6</span>%</h4>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <p>Month </p>-->
<!--                        <h4><span class="counter">16</span>%</h4>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <p>Week </p>-->
<!--                        <h4><span class="counter">7</span>%</h4>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
</form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>

<?php include ("../include/footer.php"); ?> 
</body>
</html>
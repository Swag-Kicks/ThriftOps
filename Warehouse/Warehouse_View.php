<?php
 
session_start();
include_once("../include/mysql_connection1.php"); 
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


if (isset($_POST['submit'])) {
    $input= $_POST['input'];
    $sql = "SELECT * FROM warehouse WHERE id='$input'";
    $result = mysqli_query($mysql, $sql);
    
}
else{
    $sql = "SELECT * FROM warehouse";
    $result = mysqli_query($mysql, $sql);
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
                    <div class="card-header pb-0">
                      <h5 class="card-title">Rack View</h5>
                    </div>
                    <div class="card-body">
                      <div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h3 class="mb-0 card-title">View Warehouse List</h3>
         </div>
         <form action="" method="POST" class="View">
            <div class="card-body">
               <div class="row">
                  <div class="card-body">
                    <div class="row w-50" style="position: relative; bottom: 25px; margin: 0 auto;">
                        <div class="col has-success">
                            <input name="input" type="text" class="form-control" placeholder="Enter What You Want To FInd...." style="padding: 20px !important;">
                        </div>
                        <span class="input-group-append">
                            <button class="btn btn-info" name="submit" style="position: relative; left: -15px; border-radius: 0px 5px 5px 0px;">🔎</button>
                        </span>
                    </div>
                     <div class="e-table">
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                        ?>
                        <div class="table-responsive table-lg">
                           <table class="table table-bordered" id="crud_table">
                              <thead>
                                 <tr>
                                     <td>ID</td>
                                    <td>Location Name</td>
                                    <td>Location Address</td>
                                    <td>Edit</td>
                                 </tr>
                                  <?php
                                $i=0;
                                while($row = mysqli_fetch_array($result)) {
                                ?>
                              </thead>
                              <tbody id="table_data">
                                 <tr>
                                 	<td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["Warhouse_Location"]; ?></td>
                                    <td><?php echo $row["Warehouse_Address"]; ?></td>
                                    <td><a class="btn btn-sm btn-primary" href="Warehouse_Update.php?GETID=<?php echo $row["id"]; ?>"><i class="fa fa-edit"></i> Edit</a></td>
                                 </tr>
                                 <?php
                                $i++;
                                }   
                                ?>
                              </tbody>
                              <?php
                        }
                        else{
                            echo "No result found";
                        }   
                        ?>
                           </table>
                        </div>
                     </div>
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

<?php include ("../include/footer.php"); ?>
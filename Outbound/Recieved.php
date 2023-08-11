<?php
 
session_start();
include_once("../include/mysql_connection1.php"); 
error_reporting(0);
date_default_timezone_set("Asia/Karachi");
$C_Date = date('Y-m-d/h:i:a');
$z=1;





if (isset($_POST['submit'])) {
    $input= $_POST['input'];
    $sql = "SELECT * FROM orders WHERE Status='Picked' AND order_num LIKE '#$input%' OR Items='$input' AND `Date` BETWEEN '2022-08-01' AND '2022-08-13' LIMIT 50";
    $result = mysqli_query($mysql, $sql);
    
}
else{
    $sql = "SELECT * FROM orders WHERE Status='Picked' AND Date > '2022-03-20'";
    $result = mysqli_query($mysql, $sql);
}
// $user=$_SESSION['Username'];
// if (isset($_POST['update'])) 
// {
//     if (isset($_POST['check'])) 
//     {
//         foreach($_POST['check'] as $updateid)
//         {
//             $exq = "UPDATE orders SET Status='Recieved',Recieved_By='$user',Recieved_By_Time='$C_Date' WHERE id='$updateid' ORDER BY id ASC LIMIT 1";
//             $res = mysqli_query($mysql, $exq);
//             if(!$res)
//             {
                
//             }
//             else
//             {
//                 echo '<script>window.location.href="Recieved.php";</script>';
//             }
//         }
//     }
    
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
            <h3 class="mb-0 card-title">Receiving Orders List</h3>
         </div>
         <form action="" method="POST" class="View">
            <div class="card-body">
               <div class="row">
                  <div class="card-body">
                        <div class="row">
                           <div class="col-md-6">
                         <input name="input" type="text" class="form-control" placeholder="Search Order...." ">
                     </div>
                     <div class="col-md-6">
                     <button class="btn btn-primary" name="submit"  >Search</button>
                          </div>
                      </div>
                   
                    <!--<div class="row">-->
                    <!--    <span>-->
                    <!--    <button class="btn btn-info" type="submit" name="update" onclick="location.reload()" style="position: relative; left: -15px; border-radius: 0px 5px 5px 0px;">Recieved</button>-->
                    <!--    </span>-->
                    <!--</div>-->
                    
                     <div class="e-table">
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                        ?>
                        <div class="table-responsive">
                           <table class="table table-hover" id="crud_table">
                              <thead>
                                 <tr>
                                     <th style="width: 85px;">Select</th>
                                    <th>ID</th>
                                    <th>Order Number</th>
                                    <th>SKU</th>
                                    <th class="align-middle text-center">QC Reject</th>
                                   
                                 </tr>
                                  <?php
                                $i=0;
                                while($row = mysqli_fetch_array($result)) {
                                ?>
                              </thead>
                              <tbody id="table_data">
                                 <tr>
                                 	<td ><input type="checkbox" name="check[]" value="<?php echo $row["id"]; ?>"></td>
                                 	<td><?php echo $z; ?></td>
                                        <td>
                                            <?php
                                            echo $row["order_num"];
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $row["Items"];
                                            ?>
                                        </td>
                                        <td class="align-middle text-center">
                                       
                                          <div class="btn-group align-top" style="margin-top: 5px;">
                                          <a class="btn btn-md btn-danger" href="../Racks/QC_Rejected.php?GETID=<?php echo $row["Items"]; ?>"><i class="fa fa-edit"></i> QC Rejected</a>
                                          </div>
                                        
                                       
                                 </tr>
                                 <?php
                                $i++;
                                $z++;
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
               <div class="col-12"  style=" margin-top: 20px;">
                    <button value="submit"  name="update" onclick="location.reload()"class="btn btn-primary btn-block">Received</button>
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
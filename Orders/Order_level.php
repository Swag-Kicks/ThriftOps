<?php


session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);
$z=1;

// $cr=$_SESSION['Username'];
// if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
// {
//     $pr="Select * from Users Where Dept_ID=2 AND Username='$cr' OR Dept_ID=3 AND Username='$cr'OR Dept_ID=13 AND Username='daniyal.sheikh'";
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
    $sql = "SELECT *, GROUP_CONCAT(Items) as con FROM orders WHERE order_num LIKE '#$input%'";
    $result = mysqli_query($mysql, $sql);
    
}
else{
    $sql = "SELECT *, GROUP_CONCAT(Items) as con FROM orders WHERE Date > '2022-03-20' GROUP BY order_id DESC ";
    $result = mysqli_query($mysql, $sql);
}

?>

<?php include ("../include/header.php"); ?>
    <br>
    
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h3 class="mb-0 card-title">Order Life Cycle List</h3>
         </div>
         <form action="" method="POST" class="View">
            <div class="card-body">
                
            </div>
               <div class="row">
                  <div class="card-body">
                     <div class="e-table">
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                        ?>
                        <div class="table-responsive table-lg">
                           <table class="table table-bordered" id="crud_table">
                              <thead>
                                 <tr>
                                    <th>O-Num</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>items</th>
                                    <th>price</th>
                                    <th>Date</th>
                                    <th>Edit</th>
                                    
                                 </tr>
                                  <?php
                                $i=0;
                                while($row = mysqli_fetch_array($result)) {
                                ?>
                              </thead>
                              <tbody id="table_data">
                                 <tr>
                                    <td><a target = '_blank' href="https://www-swag-kicks-com.myshopify.com/admin/orders/<?php echo $row["order_id"]; ?>"<i class="fa fa-edit"></i><?php echo $row['order_num'] ?></a></td>
                                    <td><?php echo $row['Customer_Name'] ?></td>
                                    <td><?php echo $row['Customer_Contact'] ?></td>
                                    <td><?php echo $row['Customer_Address'] ?></td>
                                    <td><?php echo $row['con']?></td>
                                    <td>RS.<?php echo $row['Total_Amount'] ?></td>
                                    <td><?php echo $row['Date']; ?></td>
                                    <td><a class="btn btn-sm btn-secondary" target = '_blank' href="orderlife.php?GETID=<?php echo $row["order_id"]; ?>"<i class="fa fa-edit"></i>Check</a></td>
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
            </div>
                  </div>
               </div>
            </div>
            </div>
         </form>
      </div>
   </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
   $(document).ready( function () {
       $("#crud_table").DataTable();
   } );
</script>
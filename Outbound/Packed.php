<?php
 
session_start();
include_once("../include/mysql_connection1.php"); 
error_reporting(0);
$z=1;

// $cr=$_SESSION['Username'];
// if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
// {
//     $pr="Select * from Users Where Dept_ID=6 AND Username='$cr' OR Dept_ID=3 AND Username='$cr'";
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

$sql = "SELECT *, GROUP_CONCAT(Items) as con FROM orders where Status='Recieved' OR Status='Picked' and Date > '2022-08-9' GROUP by order_num DESC";
$result = mysqli_query($mysql, $sql);

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
            <h3 class="mb-0 card-title">Pack Orders List</h3>
         </div>
         <form action="" method="POST" class="View">
            <div class="card-body">
               <div class="row">
                  <div class="card-body">
                    <div class="e-table">
                     <div class="table-responsive table-lg">
                        <table class="table table-hover" id="crud_table">
                           <thead>
                              <tr>
                                    <th>ID</th>
                                    <th>Order Number</th>
                                    <th>City</th>
                                    <th>SKU</th>
                                    <th>Pack</th>
                                </tr>
                           </thead>
                           <tbody class="table">
                              <?php
                                 $i=0;
                                 while($row = mysqli_fetch_assoc($result)) {
                                 ?>
                              <tr>
                                 	<td><?php echo $z; ?></td>
                                        <td>
                                        <a target='_blank' href="https://www-swag-kicks-com.myshopify.com/admin/orders/<?php echo $row["order_id"]; ?>" <i class="fa fa-edit"></i> <?php echo $row['order_num'] ?> </a>
                                        </td>
                                        <td><?php echo $row["Customer_City"] ?></td>
                                        <td>
                                            <?php
                                            
                                               
                                                $r = $row["con"];
                                                
                                                $lin = explode(',',$r);
                                                $as=$row["order_id"];
                                                //print_r($lin);
                                                foreach($lin as $value)
                                                {
                                                    $que="Select * from orders where Items='$value' AND order_id='$as'";
                                                    $re= mysqli_query($mysql, $que);
                                                    $ro = mysqli_fetch_array($re);
                                                   // echo $ro['Status'];
                                                    //echo "<br>";
                                                    if($ro['Status']=='Recieved')
                                                    {
                                                        echo $value ." ✅". "<br>";
                                                    } 
                                                    else if ($ro['Status']=='Picked')
                                                    {
                                                        echo $value ." ❌". "<br>";
                                                    }
                                                    //echo $value . "<br>";
                                                    
                                                }   
                                            ?>
                                        </td>
                                        <td class="align-middle text-center">
                                       <a class="btn btn-sm btn-secondary" href="Pack_Update.php?GETID=<?php echo $row["order_id"]; ?>"><i class="fa fa-edit"></i> Pack</a>
                                        <a class="btn btn-sm btn-primary" target = '_blank' href="print_pdf.php?GETID=<?php echo $row['order_id'] ?>"><i class="fa fa-edit"></i> Print</a>
                                
                                    </td>
                                 </tr>
                              <?php
                                 $z++;}
                                ?>
                           </tbody>
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
   $(document).ready( function () {
       $("#crud_table").DataTable();
   } );
</script>

<?php include ("../include/footer.php"); ?>

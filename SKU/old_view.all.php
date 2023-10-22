<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);

if (isset($_SESSION['id']) && $_SESSION['id'] == true) {
    
}
else {
   
    echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';

}


if (isset($_POST['submit'])) {
    $input= $_POST['input'];
    $sql = "SELECT * FROM sku WHERE SKU='$input'";
    $result = mysqli_query($mysql, $sql);
    
}
else{
    $sql = "SELECT * FROM sku";
    $result = mysqli_query($mysql, $sql);
}



?>

<?php include ("../include/header.php"); ?>
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h3 class="mb-0 card-title">Print selected sku</h3>
         </div>
         <form action="" method="POST" class="View">
            <div class="card-body">
               <div class="row">
                  <div class="card-body">
                     <div class="e-table">
                        <div class="table-responsive table-lg">
                           <table class="table table-bordered" id="crud_table">
                              <thead>
                                 <tr>
                                    <td>ID</td>
                                    <td>Grn Id</td>
                                    <td>Product ID</td>
                                    <td>Category</td>
                                    <td>SKU</td>
                                    <td>Date</td>
                                    <td>Print</td>
                                 </tr>
                              </thead>
                              <tbody id="table_data">
                                <?php
                                $i=0;
                                while($row = mysqli_fetch_array($result)) {
                                ?>
                                 <tr>
                                    <td class="align-middle text-center">
                                       <?php echo $row["id"]; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                       <?php echo $row["GRN_ID"]; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                       <?php echo $row["Product_ID"]; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                       <?php echo $row["Product_Cat_ID"]; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                       <?php echo $row["SKU"]; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                       <div class="btn-group align-top">
                                            <?php echo $row["DateTime"]; ?>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                       <div class="btn-group align-top">
                                           <a class="btn btn-sm btn-secondary" href="print.php?GETID=<?php echo $row["SKU"]; ?>"> Print</a>
                                        </div>
                                    </td>
                                 </tr>
                                <?php
                                 $i++;}
                                ?>
                              </tbody>
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
   $(document).ready( function () {
       $("#crud_table").DataTable();
   } );
</script>
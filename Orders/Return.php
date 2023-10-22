<?php

session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);
$z=1;
$cr=$_SESSION['Username'];



if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
{
    $pr="Select * from Users Where Dept_ID=2 AND Username='$cr' OR Dept_ID=3 AND Username='$cr'";
    $resu2 = mysqli_query($mysql, $pr);
    $rowq1 =mysqli_fetch_array($resu2);
    $dept=$rowq1['Dept_ID'];
    //echo $dept;
    if($dept=='')
    {
        echo '<script>alert("Your Are Not Authorized !");window.location.href="../Dashboard/Home.php";</script>';
    }   
}
else 
{
    echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
   
}
   
   

$sql="SELECT *,GROUP_CONCAT(Items)as con FROM returns where Status='Restocked' OR Status='Exchange' GROUP BY order_id DESC";
$result=mysqli_query($mysql,$sql);


   
?>
<?php include ("../include/header.php"); ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<br>
   <script>
     $(document).ready(function() {
       $(document).on('click', 'a[data-role=infrm]', function() {
         var id1 = $(this).data('id');
         var conf_tag = $('#' + id1).children('td[data-target=conf_tag]').text();
         $('#conf_tag').val(conf_tag);
         $('#conf_id').val(id1);
         $('#confirm').modal('toggle');
       });
       $('#conf_save').click(function() {
         var id1 = $('#conf_id').val();
         var conf_tag = $('#conf_tag').val();
         $.ajax({
           url: 'exchange.php',
           type: 'POST',
           data: {
             conf_tag: conf_tag,
             id1: id1
           },
           success: function(response) {
             console.log(response);
             $('#' + id1).children('td[data-target=conf_tag]').text(conf_tag);
             $('#confirm').modal('toggle');
             location.reload();
           }
         });
       });
     });
   </script>
 
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h3 class="mb-0 card-title">Exchange/Refund Orders List</h3>
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
                                    <th>#</th>
                                    <th>O-Num</th>
                                    <th>Date</th>
                                    <th>Items</th>
                                    <th>Status</th>
                                    <th>Mark</th>
                                </tr>
                           </thead>
                           <tbody class="table">
                              <?php
                                 $i=0;
                                 while($row = mysqli_fetch_assoc($result)) {
                                 ?>
                              <tr>
                                    <td><?php echo $z++ ?></td>
                                    <td><a target='_blank' href="https://www-swag-kicks-com.myshopify.com/admin/orders/<?php echo $row["order_id"]; ?>" <i class="fa fa-edit"></i> <?php echo $row['order_num'] ?> </a></td>
                                    <td><?php echo $row['Date'] ?></td>
                                    <td><?php echo $row['con'] ?></td>
                                    <td><?php echo $row['Status'] ?></td>
                                    <td class="align-middle text-center">
                                        <div>
                                            <input  name='val' value="<?php echo $row["items"]; ?>" style="display: none;" readonly>
                                            <input  name='val1' value="<?php echo $row["order_id"]; ?>" style="display: none;" readonly>
                                        </div>
                                        <div class="btn-group align-top" style="margin-top: 5px;">
                                             <a class="btn btn-sm btn-primary" href="#" data-role="infrm" data-id="<?php echo $row["order_id"]; ?>"><i class="fa fa-edit"></i>Exchange</a>
                                          </div>
                                          <div class="btn-group align-top" style="margin-top: 5px;">
                                             <a class="btn btn-sm btn-danger" href="../Return/Refund.php?GETID=<?php echo $row["order_id"]; ?>"><i class="fa fa-edit"></i>Refund</a>
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
                     
                     <div id="confirm" class="modal fade" role="dialog">
                   <div class="modal-dialog">
                     <div class="modal-content">
                       <div class="modal-header">
                         <h4 class="modal-title">Exchange</h4>
                       </div>
                       <div class="modal-body">
                         <div class="form-group">
                           <label>
                             <b>Return/Exchange Order Referece</b>
                           </label>
                           <input type="text" id="conf_tag" class="form-control">
                         </div>
                         <input type="hidden" id="conf_id" class="form-control">
                       </div>
                       <div class="modal-footer">
                         <a href="#" id="conf_save" class="btn btn-primary pull-right">Update</a>
                            <button type="button" class="btn btn-default pull-left" data-bs-dismiss="modal">Close</button>
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
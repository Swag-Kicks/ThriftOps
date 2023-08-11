<?php
   session_start();
   include_once("../include/mysql_connection.php"); 
   error_reporting(0);
   $z=1;
   
  
   
   
   if (isset($_POST['submit'])) {
       $input= $_POST['input'];
       $sql = "SELECT *, GROUP_CONCAT(Items) as con FROM orders WHERE order_num LIKE '#$input%' OR Items='$input'";
       $result = mysqli_query($mysql, $sql);
       
   }
   else{
       
       
       $sql = "SELECT *, GROUP_CONCAT(Items) as con FROM orders where Status='Packed' AND Date > '2022-04-5' GROUP by order_num DESC";
       $result = mysqli_query($mysql, $sql);
       // while($row1 = mysqli_fetch_array($result))
       // {
       //     $va=$row["order_num"];
       // }
       
   
          //echo print_r($va);
       // $sql1 = "SELECT Items FROM orders WHERE order_num='$va'";
       // $res = mysqli_query($mysql, $sql1);
       // $row1 = mysqli_fetch_array($res);
       
   }
   ?>

<?php include ("../include/header.php"); ?>
<?php include ("../include/sidebar.php"); ?>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
   $(document).ready(function(){
       $(document).on('click','a[data-role=failed]', function(){
           
           
           var id2 = $(this).data('id');
           var canc_tag =$('#'+id2).children('td[data-target=canc_tag]').text();
           
           
   
           
           $('#canc_tag').val(canc_tag);
           $('#canc_id').val(id2);
           $('#fail').modal('toggle'); 
       });
   
       $('#canc_save').click(function(){
           var id2 = $('#canc_id').val();
           var canc_tag = $('#canc_tag').val();
           
   
           $.ajax({
               url     : 'Cancel.php',
               type    : 'POST',
               data    : {canc_tag: canc_tag,id2: id2},
               success : function(response)
               {           
                   console.log(response);
                   $('#'+id2).children('td[data-target=canc_tag]').text(canc_tag);
                   $('#fail').modal('toggle');
                   location.reload();
               }
           });
   
       });
   });
</script>
<script>
   $(document).ready(function(){
       $(document).on('click','a[data-role=infrm]', function(){
           
           
           var id1 = $(this).data('id');
           var conf_tag =$('#'+id1).children('td[data-target=conf_tag]').text();
           
           
   
           
           $('#conf_tag').val(conf_tag);
           $('#conf_id').val(id1);
           $('#confirm').modal('toggle'); 
       });
   
       $('#conf_save').click(function(){
           var id1 = $('#conf_id').val();
           var conf_tag = $('#conf_tag').val();
           
   
           $.ajax({
               url     : 'Confirmed.php',
               type    : 'POST',
               data    : {conf_tag: conf_tag,id1: id1},
               success : function(response)
               {           
                   console.log(response);
                   $('#'+id1).children('td[data-target=conf_tag]').text(conf_tag);
                   $('#confirm').modal('toggle');
                   location.reload();
               }
           });
   
       });
   });
</script>
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
            <h3 class="mb-0 card-title">Re-Attempt Pick Orders List</h3>
         </div>
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
                                 <th>SKU</th>
                                 <th>Status</th>
                                 <th>Date</th>
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
                                 <td><?php echo $row['Items']?></td>
                                 <td class="align-middle text-center">
                                    <a class="btn btn-sm btn-danger" href="#" data-role="failed" data-id="<?php echo $row["order_id"]; ?>"><i class="fa fa-edit"></i> Cancel </a>
                                    <a class="btn btn-sm btn-primary" href="#" data-role="infrm" data-id="<?php echo $row["order_id"]; ?>"><i class="fa fa-edit"></i> Confirm</a>
                                    <a class="btn btn-sm btn-primary" target = '_blank' href="print_pdf.php?GETID=<?php echo $row['order_id'] ?>"><i class="fa fa-edit"></i> Print</a>
                                 </td>
                                 <td> <?php echo $row['Date'] ?> </td>
                              </tr>
                              <?php
                                 $i++;
                                 }   
                                 ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <div id="fail" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h4 class="modal-title">Reason For Cancelation</h4>
                        </div>
                        <div class="modal-body">
                           <div class="form-group">
                              <label><b>Any Reason For Cancelation</b></label>
                              <input type="text" id="canc_tag" class="form-control">
                           </div>
                           <input type="hidden" id="canc_id" class="form-control">
                        </div>
                        <div class="modal-footer">
                           <a href="#" id="canc_save" class="btn btn-primary pull-right">Update</a>
                           <button type="button" class="btn btn-default pull-left" data-bs-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div id="confirm" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h4 class="modal-title">Dispatch Advice</h4>
                        </div>
                        <div class="modal-body">
                           <div class="form-group">
                              <label><b>Any Advice For Dispatch Order</b></label>
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
   $(document).ready( function () {
       $("#crud_table").DataTable();
   } );
</script>

<?php include ("../include/footer.php"); ?>



<?php
session_start();
include_once("../include/mysql_connection1.php"); 
// error_reporting(0);
// $cr=$_SESSION['Username'];
// $z=1;

// if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
// {
//     $pr="Select * from Users Where Dept_ID=2 AND Username='$cr' OR Dept_ID=3 AND Username='$cr'";
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
    $sql = "SELECT *, GROUP_CONCAT(Items) as con FROM orders WHERE order_num='$input' AND Status='Hold' AND Customer_City NOT LIKE 'Karachi%' OR 'Khi%' OR 'Karac%'";
    $result = mysqli_query($mysql, $sql);
    
}
else{
    $sql = "SELECT *, GROUP_CONCAT(Items) as con FROM orders WHERE Status='Hold' AND Customer_City NOT LIKE 'Karachi%' OR 'Khi%' OR 'Karac%' GROUP BY order_num DESC";
    $result = mysqli_query($mysql, $sql);
}

?>


        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
                  url     : 'Target.php',
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
$('#submit').click(function(event){
   $("#div_allorders").load('All_Orders'); 
       
});
</script> 
<script>
$('#submit1').click(function(event){
   $("#div_allorders").load('Confirm_Orders'); 
       
});
</script> 
<script>
$('#submit2').click(function(event){
   $("#div_allorders").load('Cencel_Orders'); 
       
});
</script> 

     <div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <div class="row">
             <div class="col-md-3"> <h3 class="mb-0 card-title">Hold Orders</h3></div>
            <div class="col-md-9">
             <input type="button" value="Canceled Orders" class="btn btn-primary-light m-l-15 f-right" style="padding: 8px 30px;"  id="submit2">
             <!--<a href="View_Hold"> <input type="button" value="Hold Orders" class="btn btn-primary-light m-l-15 f-right" style="padding: 8px 30px;"></a>-->
             <input type="button" value="Confirmed Orders" class="btn btn-primary-light m-l-15 f-right" style="padding: 8px 30px;"  id="submit1">
             <input type="button" value="All Orders" class="btn btn-primary-light m-l-15 f-right"  style="padding: 8px 30px;" id="submit"> 
          </div>
           </div>
         </div>
         <form action="" method="POST" class="View">
            <div class="card-body">
               <div class="row">
                  <div class="card-body">
                     <div class="e-table">
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                        ?>
                        <div class="table-responsive">
                           <table class="table table-hover" id="crud_table">
                              <thead>
                                 <tr>
                                    <th>Order-Num</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>city</th>
                                    <th>items</th>
                                    <th>price</th>
                                    <th>Date</th>
                                    <th>Status</th>
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
                                    <td><?php echo $row['Customer_City'] ?></td>
                                    <td><?php echo $row['Items']?></td>
                                    <td>RS.<?php echo $row['Total_Amount'] ?></td>
                                    <td><?php echo $row['Date'] ?></td>
                                     <td class="align-middle text-center">
                                       <div class="btn-group align-top" style="margin-top: 5px;">
                                             <a class="btn btn-sm btn-success" href="#" data-role="infrm" data-id="<?php echo $row["order_id"]; ?>"><i class="fa fa-check"></i> </a>
                                          </div>
                                         <div class="btn-group align-top" style="margin-top: 5px;">
                                             <a class="btn btn-sm btn-primary" href="#" data-role="failed" data-id="<?php echo $row["order_id"]; ?>"><i class="fa fa-times"></i>  </a>
                                          </div>
                                        <div class="btn-group align-top" style="margin-top: 5px;">
                                           <a class="btn btn-sm btn-secondary" target = '_blank' href="Order_Details.php?GETID=<?php echo $row["id"]; ?>"><i class="fa fa-pencil-square-o"></i> </a>
                                        </div>
                                    </td>
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
                     
                  </div>
               </div>
            </div>
            </div>
         </form>
      </div>
   </div>
</div>

                  

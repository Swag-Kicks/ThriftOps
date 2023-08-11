<?php
session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);
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

$ID= $_GET['GETID'];



if (isset($_POST['items'])) 
{
    $ref=$_POST['ref'];
    $sql = "Select * orders where order_num like '#$ref%'";
    $result = mysqli_query($mysql, $sql);
}


?>        





<?php include ("../include/header.php"); ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0 card-title">Return-Exchange</h3>
                </div>
		        <form action="" method="POST" class="PR">
                    <div class="card-body">
                    <div class="row">
                        
                       <div class="col-md-6">
                     <div class="form-group">
                        <input type="text" class="form-control" name="ref" placeholder="Enter Order Number" required="" style=" padding: 20px !important;">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <button class="btn btn-primary btn-block" name="items" data-toggle="modal" data-target="#exampleModal">Lets Get Items 👉</button>
                     </div>
                  </div>
                
                      <div class="e-table">
                       <?php
                        if (mysqli_num_rows($result) > 0) {
                        ?>
                     <div class="table-responsive table-lg">
                        <table class="table table-bordered" id="crud_table">
                            <thead>
                                <tr>
                                    <td>SKU</td>
                                    <td>Price</td>
                                    <td>Status</td>

                                 
                                </tr>
                            </thead>    
                            <tbody id="table_data">
                                <?php
                                $i=0;
                                while($roww = mysqli_fetch_assoc($result)) {
                                ?>
                                 
                                        <td><?php echo $roww["id"]; ?></td>
                                        <td><?php echo $roww["Quantity"]; ?></td>
                                        <td><?php echo $roww["Item_Description"]; ?></td>
                                    </tr>
                                </tbody>    
                                <?php
                                $i++;
                                }   
                                ?>
                            </table>
                            
                        <?php
                        }
                        else{
                           
                        }   
                        ?>
                        </table>
                     </div>
                  </div>
                    
                      <div class="col-md-12"> 
                         <div class="form-group">
                            <label class="form-label">SKU</label>
                            <input type="text" class="form-control" name="SKU"  placeholder="SKU">
                         </div>
                         
                         
                         <div class="form-group">
                            <label class="form-label">Reason With Order</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write a large text here ..." name="reason"></textarea>
                         </div>
                         
                         
                      </div>
                      <div class="col-md-12">
                         <button class="btn btn-primary btn-block" name="submit">Update Adjustment</button>
                      </div>
                   </div>
		        </form>
	       </div>
<?php include ("../include/footer.php"); ?>
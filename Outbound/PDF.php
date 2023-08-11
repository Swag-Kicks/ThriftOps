<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);
$z=1;

// if (isset($_SESSION['id']) && $_SESSION['id'] == true) {
    
// }
// else 
// {
   
//     echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';

// }



if (isset($_POST['submit'])) {
    $input= $_POST['input'];
    $sql = "SELECT * FROM racks WHERE name='$input' OR SKU='$input'";
    $result = mysqli_query($mysql, $sql);
    
}
else{
    
    
    $sql = "SELECT *, GROUP_CONCAT(Items) as con FROM orders where Status='Recieved' OR Status='Packed' GROUP by order_num DESC";
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
                                    <th>ID</th>
                                    <th>Order Number</th>
                                    <th>SKU</th>
                                    <th>Print</th>
                                 </tr>
                                  <?php
                                $i=0;
                                while($row = mysqli_fetch_array($result)) {
                                ?>
                              </thead>
                              <tbody id="table_data">
                                 <tr>
                                 	<td><?php echo $z; ?></td>
                                        <td>
                                        <a target='_blank' href="https://www-swag-kicks-com.myshopify.com/admin/orders/<?php echo $row["order_id"]; ?>" <i class="fa fa-edit"></i> <?php echo $row['order_num'] ?> </a>
                                        </td>
                                        <td>
                                            <?php
                                            
                                               
                                                $r = $row["con"];
                                                
                                                $lin = explode(',',$r);
                                               
                                                //print_r($lin);
                                                foreach($lin as $value)
                                                {
                                                    $que="Select * from orders where Items='$value'";
                                                    $re= mysqli_query($mysql, $que);
                                                    $ro = mysqli_fetch_array($re);
                                                   // echo $ro['Status'];
                                                    //echo "<br>";
                                                    if($ro['Status']=='Packed')
                                                    {
                                                        echo $value ." ✅". "<br>";
                                                    } 
                                                    else if ($ro['Status']=='Recieved')
                                                    {
                                                        echo $value ." ❌". "<br>";
                                                    }
                                                    //echo $value . "<br>";
                                                    
                                                }   
                                            ?>
                                        </td>
                                       <td class="align-middle text-center">
                                        <div class="btn-group align-top" style="margin-top: 5px;">
                                             <a class="btn btn-sm btn-primary" target = '_blank' href="print_pdf.php?GETID=<?php echo $row['order_id'] ?>"><i class="fa fa-edit"></i> Print</a>
                                          </div>
                                         
                                    </td>
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
            </div>
         </form>
      </div>
   </div>
</div>
<?php include ("../include/footer.php"); ?>
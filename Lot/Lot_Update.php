<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);

$cr=$_SESSION['Username'];
// if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
// {
//     $pr="Select * from Users Where Dept_ID=5 AND Username='$cr' OR Dept_ID=3 AND Username='$cr'";
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
$ID= $_GET['GETID'];
$Name=$_POST['Lot_name'];
$ven_id=$_POST['ven_id'];
$quantity=$_POST['Lot_quantity'];
$desc=$_POST['Lot_desc'];


$sql = "SELECT * FROM lot WHERE id='$ID'";
$result = mysqli_query($mysql, $sql);

while($row = mysqli_fetch_assoc($result)) 
{   
    
    $Lot_Number=$row["Lot_Number"];
    $Vendor_ID=$row["Vendor_ID"];
    $Lot_Quantity=$row["Lot_Unit_Quantity"];
    $Lot_Description=$row["Lot_Description"];
    

}



if (isset($_POST['update'])) 
{

    
    $sql2= "UPDATE lot SET Lot_Number = '".$Name."', Vendor_ID = '".$ven_id."', Lot_Unit_Quantity = '".$quantity."', Lot_Description = '".$desc."' WHERE id='".$ID."'";  
    $result1 = mysqli_query($mysql, $sql2);

    
    if(!$result1)
    {
        echo "<script>alert('Error While Updating !.')</script>";
    }
    else
    {
        echo '<script>alert("Updated Successfully");window.location.href="Lot_View.php";</script>';
        //header("Location: Lot_View.php");
        
    } 
   
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
                    <div class="card-body">
                      <div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h3 class="mb-0 card-title">Update Lot Information</h3>
         </div>
         <form action="" method="POST" class="PR">
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label">Vendor Name</label>
                        <input type="text" class="form-control"name="Lot_name" value="<?php echo $Lot_Number; ?>" placeholder="Enter Lot Name" required="">
                     </div>
                      <div class="form-group">
                          <label class="form-label">Lot Units Quantity </label>
                        <input type="text" class="form-control" name="Lot_quantity" value="<?php echo $Lot_Quantity; ?>"  required="" >
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                         <label class="form-label">Choose Vendor</label>
                        <select class="form-control select2 custom-select" name="ven_id" >
                        
                        <?php

                        $recrds = mysqli_query($mysql, "SELECT * FROM vendor WHERE Vendor_ID='$Vendor_ID'");
                        $rw = mysqli_fetch_assoc($recrds); 
                        echo "<option selected hidden value='". $rw['Vendor_ID'] ."'>" .$rw['Vendor_Name'] ."</option>";
                                
                        $records = mysqli_query($mysql, "SELECT * FROM `vendor`"); 
                        while($data = mysqli_fetch_array($records))
                        {
                            
                            echo "<option value='". $data['Vendor_ID'] ."'>" .$data['Vendor_Name'] ."</option>";
                        }  
                        ?> 
                        </select>
                     </div>
                      <div class="form-group">
                          <label class="form-label">Write Details About Vendor...</label>
                        <input type="text" class="form-control" name="Ven_ntn" value="<?php echo $Vendor_NTN; ?>" placeholder="Enter Vendor NTN" required="" >
                     </div>
                  </div>
                  <div class="col-12">
                     <button class="btn btn-primary btn-block f-right" name="update" data-toggle="modal" data-target="#exampleModal">Update</button>
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

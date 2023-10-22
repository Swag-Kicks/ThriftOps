<?php
 
session_start();
include_once("../include/mysql_connection1.php"); 
// error_reporting(0);

// $cr=$_SESSION['Username'];
// if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
// {
//     $pr="Select * from Users Where Dept_ID=13 AND Username='$cr' OR Dept_ID=3 AND Username='$cr'";
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
$Name=$_POST['war_name'];
$Address=$_POST['war_address'];



$sql = "SELECT * FROM warehouse WHERE id='$ID'";
$result = mysqli_query($mysql, $sql);

while($row = mysqli_fetch_assoc($result)) 
{   
    
    $war_name=$row["Warhouse_Location"];
    $war_address=$row["Warehouse_Address"];
    
  

}



if (isset($_POST['update'])) 
{

    
    $sql2= "UPDATE warehouse SET Warhouse_Location = '".$Name."', Warehouse_Address = '".$Address."' WHERE id='".$ID."'";  
    $result1 = mysqli_query($mysql, $sql2);

    
    if(!$result1)
    {
        echo "<script>alert('Error While Updating !.')</script>";
    }
    else
    {
        echo '<script>alert("Updated Successfully");window.location.href="Warehouse_View.php";</script>';
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
            <h3 class="mb-0 card-title">Update Old Warehouse</h3>
         </div>
         <form action="" method="POST" class="PR">
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label">Location Name</label>
                        <input type="text" class="form-control" name="war_name" value="<?php echo $War_Name; ?>"  placeholder="Enter Location Name" required="">
                     </div>
                 </div>
                <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label">Location Address</label>
                        <input type="text" class="form-control" placeholder="Enter Location Address" name="war_address" value="<?php echo $War_Address; ?>" required="">
                     </div>
                 </div>
                  <div class="col-12">
                     <button class="btn btn-primary btn-block" name="submit" data-toggle="modal" data-target="#exampleModal">Lets Create 👉</button>
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
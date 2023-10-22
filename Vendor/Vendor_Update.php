<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);

$cr=$_SESSION['Username'];
if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
{
    $pr="Select * from Users Where Dept_ID=5 AND Username='$cr' OR Dept_ID=3 AND Username='$cr'";
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
$Name=$_POST["Ven_name"];
$Address=$_POST["Ven_address"];
$phone=$_POST["Ven_phone"];
$NTN=$_POST["Ven_ntn"];
$Discription=$_POST["Ven_desc"];
$sql = "SELECT * FROM vendor WHERE Vendor_ID='$ID'";
$result = mysqli_query($mysql, $sql);

while($row = mysqli_fetch_assoc($result)) 
{   
    $Vendor_ID=$row["Vendor_ID"];
    $Vendor_Name=$row["Vendor_Name"];
    $Vendor_Address=$row["Vendor_Address"];
    $Vendor_phone=$row["Vendor_Contact"];
    $Vendor_NTN=$row["Vendor_NTN"];
    $Vendor_Discription=$row["Description"];
}
if (isset($_POST['update'])) 
{
    
    $sql2= "UPDATE vendor SET Vendor_Name = '".$Name."', Vendor_Address = '".$Address."', Vendor_Contact = '".$phone."', Vendor_NTN = '".$NTN."', Description = '".$Discription."' WHERE Vendor_ID='".$ID."'";  
    $result1 = mysqli_query($mysql, $sql2);

    if(!$result1)
    {
        echo "<script>alert('Error While Updating !.')</script>";
    }
    else
    {
        echo '<script>alert("Updated Successfully");window.location.href="Vendor_View.php";</script>';
        //header("Location: Vendor_View.php");
        
    }
   
} 


?>


<?php include ("../include/header.php"); ?>
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h3 class="mb-0 card-title">Update Vendor Information</h3>
         </div>
         <form action="" method="POST" class="PR">
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label">Vendor Name</label>
                        <input type="text" class="form-control" name="Ven_name" value="<?php echo $Vendor_Name; ?>" placeholder="Enter Vendor Name" required="">
                     </div>
                      <div class="form-group">
                          <label class="form-label">Vendor Address</label>
                        <input type="text" class="form-control" name="Ven_address" placeholder="Enter Vendor Address" <?php echo $Vendor_Address; ?>  required="" >
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                         <label class="form-label">Vendor Phone Number</label>
                        <input type="text" class="form-control" name="Ven_phone" value="<?php echo $Vendor_phone; ?>" placeholder="Enter Vendor Phone" required="" >
                     </div>
                      <div class="form-group">
                          <label class="form-label">Vendor NTN</label>
                        <input type="text" class="form-control" name="Ven_ntn" value="<?php echo $Vendor_NTN; ?>" placeholder="Enter Vendor NTN" required="" >
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Ven_desc" placeholder="Write Details About Vendor..."> <?php echo $Vendor_Discription; ?></textarea>
                     </div>
                  </div>
                  <div class="col-12">
                     <button class="btn btn-primary btn-block" name="submit" data-toggle="modal" data-target="#exampleModal">Lets Update 👉</button>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
    <?php include ("../include/footer.php"); ?>
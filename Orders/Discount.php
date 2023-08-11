<?php
session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);
date_default_timezone_set("Asia/Karachi");
$C_Date = date('Y-m-d/h:i:a');

$cr=$_SESSION['Username'];
$ID= $_GET['GETID'];

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

$sql = "SELECT *,GROUP_CONCAT(Items) FROM orders WHERE order_id='$ID' GROUP BY order_num ASC";
$result = mysqli_query($mysql, $sql);

while($row = mysqli_fetch_assoc($result))
{
    $pr=$row['Total_Amount'];
}

$user=$_SESSION['Username'];

if(isset($_POST['submit']) && isset($_POST['dis']))
{
   // echo "Price: ".$pr;
    $dis=$_POST['dis'];
    //echo $dis;
   // echo "<br>";
    $res=$pr/100*$dis;
    //echo $res;
    $tot=$pr-$res;
   // echo "Final: ".$tot;
    
    $up="UPDATE orders SET Total_Amount='$tot',Updated_By='$user',Updated_By_Time='$C_Date' WHERE order_id='$ID'";
    $res_up=mysqli_query($mysql,$up);
    if(!$res_up)
    {
        echo "<script>alert('Error While Updating !.')</script>";
    }
    else
    {
         echo '<script>alert("Updated Successfully");window.location.href="View_Orders.php";</script>';
       
    }
}



?>        





<?php include ("../include/header.php"); ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0 card-title">Discount</h3>
                </div>
		        <form action="" method="POST" class="PR">
                    <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                            <label class="form-label">Discount</label>
                            <input type="text" class="form-control" name="dis" placeholder="Add Discount %" required>
                         </div>
                      </div> 
                    

                         
                      </div>
                      <div class="col-md-12">
                         <button class="btn btn-primary btn-block" name="submit">Update Discount 👉</button>
                      </div>
                   </div>
		        </form>
	       </div>
<?php include ("../include/footer.php"); ?>
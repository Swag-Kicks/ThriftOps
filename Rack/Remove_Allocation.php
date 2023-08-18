<?php


// session_start();
// include_once("../include/mysql_connection.php"); 
// error_reporting(0);
// date_default_timezone_set("Asia/Karachi");



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


if (isset($_POST['submit'])) 
{
    $SKU = $_POST['SKU'];
    $war_id=$_POST['war'];
    $filled='Empty';
    $prod_id=$_POST['prdo'];
    $datetime=$_POST['Req_date'];
    $sql = "SELECT * FROM racks WHERE Warehouse_ID='$war_id' AND Category='$prod_id' AND SKU='$SKU'";
    $result = mysqli_query($mysql, $sql);
    $row1 = mysqli_fetch_assoc($result); 
    $PR_ID = $row1['SKU'];
   

    if (!($PR_ID)) 
    {
        
        //echo $PR_ID;
        echo "<script>alert('SKU Already Deallocated !')</script>";
       
    } 
    else 
    {
        //echo "Not Found";
        $query="SELECT * from racks WHERE SKU = '".$SKU."' AND Warehouse_ID='$war_id' AND Category='$prod_id' order by Rack_ID ASC limit 1";
        $res = mysqli_query($mysql, $query);
        $row1 = mysqli_fetch_assoc($res); 
        $ID = $row1['Rack_ID'];
        //$Pre_Sku = $row1['Pre_SKU'];
        $st="Empty";
    
        
        $las="UPDATE racks SET Empty_at='$datetime',status='$st',SKU ='',Pre_SKU ='$SKU' WHERE Rack_ID='".$ID."'";
        $relt1 = mysqli_query($mysql, $las);

    

        if (!$relt1) 
        {
            echo "<script>alert('Allocation Not Assigned !')</script>";
       
        } 
        else 
        {
            echo "<script>alert('SKU Deallocated Completed !')</script>";
	    }
        //echo "<script>alert('Barcode Not Found !.')</script>";
        
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
         <div class="row card-header">
         <div class="col-md-6">
            <h3 class="mb-0 card-title">Deallocate Article By Your Self</h3>
         </div>
         <div class="col-md-6">
                        
                       <a href="../Rack/Manual_Allocation.php"> <input type="button" value="Allocate Article" class="btn btn-primary-light m-l-15 f-right" style="padding: 8px 30px;"></a>
                        
                     </div>
                     </div>
         <form action="" method="POST" class="PR">
            <div class="card-body">
               <div class="row">
                   <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">Created At</label>
                        <input type="text" class="form-control" name="Req_date" value="<?php echo date('Y-m-d/h:i:a'); ?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label">Select Category</label>
                        <select class="form-select form-control" data-placeholder="Choose Category" name="prdo">
                           <option disabled selected>Select Category</option>
                            <?php $records1 = mysqli_query($mysql, "SELECT * FROM product_categories"); 
                            while($data1 = mysqli_fetch_array($records1))
                            {
                                echo "<option value='". $data1['Pr_Cat_ID'] ."'>" .$data1['Pr_Cat_Name'] ."</option>";
                            }	
                            ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label">SKU</label>
                        <input type="text" class="form-select form-control" name="SKU" value="<?php echo $SKU; ?>"  placeholder="Enter SKU Number" required="">
                     </div>
                 </div>
                 
                <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label">Select Warehouse</label>
                        <select class="form-select form-control" data-placeholder="Choose Warehouse" name="war">
                           <option disabled selected>Select Warehouse</option>
                            <?php $records = mysqli_query($mysql, "SELECT * FROM `warehouse`"); 
                            while($data = mysqli_fetch_array($records))
                            {
                                echo "<option value='". $data['War_ID'] ."'>" .$data['Warhouse_Location'] ."</option>";
                            }	
                            ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-12">
                     <button class="btn btn-primary btn-block f-right" name="submit" data-toggle="modal" data-target="#exampleModal">Deallocate Your SKU</button>
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
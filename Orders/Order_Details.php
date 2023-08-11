<?php
   session_start();
   include_once("../include/mysql_connection.php"); 
   error_reporting(0);
   date_default_timezone_set("Asia/Karachi");
   $C_Date = date('Y-m-d/h:i:a');

//   $cr=$_SESSION['Username'];
//     if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
//     {
//         $pr="Select * from Users Where Dept_ID=2 AND Username='$cr' OR Dept_ID=3 AND Username='$cr'";
//         $resu2 = mysqli_query($mysql, $pr);
//         $rowq1 =mysqli_fetch_array($resu2);
//         $dept=$rowq1['Dept_ID'];
//         //echo $dept;
//         if($dept=='')
//         {
//             echo '<script>alert("Your Are Not Authorized !");window.location.href="../Dashboard/Home.php";</script>';
//         }   
//     }
//     else 
//     {
//         echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
       
//     }


       $ID= $_GET['GETID'];
       $user=$_SESSION['Username'];
       $sql = "SELECT *, GROUP_CONCAT(Items) as con FROM orders WHERE order_id='$ID' AND Date > '2022-03-20'";
       $result = mysqli_query($mysql, $sql);
       
       while($row = mysqli_fetch_assoc($result)) 
       {   
           
           $Order_Num = $row['order_num'];
           $invoice_total =$row['Total_Amount'];
           $Customer_Name=$row['Customer_Name'];
           $Customer_Phone=$row['Customer_Contact'];
           $Customer_Address=$row['Customer_Address'];
           $City=$row['Customer_City'];
           $con=$row['con'];
           $Date=$row['Date'];
           $shop_id=$row['order_id'];
           $dis=$row['Courier_Charges'];
           
       
       }
       
       
   if (isset($_POST['submit'])) 
    {
            
         $na=$_POST['cus_name']; 
         $ci=$_POST['city'];
         $ad=$_POST['address'];
         $ph=$_POST['cus_phone'];
         $d=$_POST['co_c'];
        $sq = "UPDATE orders SET Customer_Name='$na',Customer_Address ='$ad',Customer_Contact='$ph',Customer_City='$ci',Updated_By='$user',Courier_Charges='$d',Updated_By_Time='$C_Date' WHERE order_id='$ID'";  
        $resu = mysqli_query($mysql, $sq);
    
        if(!$resu)
        {
            echo "<script>alert('Error While Updating !.')</script>";
        }
        else
        {
            echo '<script>alert("Updated Successfully");window.location.href="View_Orders.php";</script>';
            //header("Location: PR_View.php");
            
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
         <h3 class="mb-0 card-title">Order Details</h3>
      </div>
      <form action="" method="POST">
         <div class="card-body">
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="form-label">Order Reference </label>
                     <input type="text" class="form-control" name="order_ref" value="<?php echo $Order_Num; ?>" readonly style=" padding: 20px !important;">
                  </div>
                  <div class="form-group">
                     <label class="form-label">Shopify Order ID</label>
                     <input type="text" class="form-control" name="order_ref" value="<?php echo $shop_id; ?>" readonly style=" padding: 20px !important;">
                  </div>
                  <div class="form-group">
                     <label class="form-label">Date</label>
                     <input type="text" class="form-control" name="date" value="<?php echo $Date; ?>" readonly style=" padding: 20px !important;">
                  </div>
                  <div class="form-group">
                     <label class="form-label">Invoice Payment</label>
                     <input type="text" class="form-control" name="invoice_pay" value="<?php echo $invoice_total; ?>" readonly  style=" padding: 20px !important;">
                  </div>
                  
                  
               </div>
               
                
              
               <div class="col-md-6">
                   <div class="form-group">
                     <label class="form-label">Customer Name</label>
                     <input type="text" class="form-control" name="cus_name" value="<?php echo $Customer_Name; ?>" required style=" padding: 20px !important;">
                  </div>
                  <div class="form-group">
                     <label class="form-label">Customer Phone</label>
                     <input type="text" class="form-control" name="cus_phone" value="<?php echo $Customer_Phone; ?>" required style=" padding: 20px !important;">
                  </div>
                  <div class="form-group">
                     <label class="form-label">City</label>
                     <input type="text" class="form-control" name="city" value="<?php echo $City; ?>" required style=" padding: 20px !important;">
                  </div>
                  <div class="form-group">
                     <label>Delivery Address</label>
                     <textarea class="form-control" name="address" placeholder="HTML tags allowed"><?php echo $Customer_Address; ?> </textarea>
                  </div>
               </div>
               
                <div class="col-md-6">
					<div class="form-group mb-0">
						<label><b>Select Adjustment</b></label>
						<select class="custom-select form-control" name="adjust" onchange="la(this.value)" style=" padding: 20px !important;">
							   <option disable selected>Select Adjustment</option>
                                <option value="Return_Exchange.php?GETID=<?php echo $ID; ?> ">Return-Exchange</option>
                                <option value="Discount.php?GETID=<?php echo $ID; ?>" >Discount</option>
                                <option value="Giveaway.php?GETID=<?php echo $ID; ?>" >Giveaway</option>
                                <option value="Influencer.php?GETID=<?php echo $ID; ?> ">Influencer</option>
                                
						</select>
					</div>
				</div>

                
                <div class="col-md-6">
                     <label class="form-label">Items</label>
                     <input type="text" class="form-control" name="items" value="<?php echo $con; ?>" readonly style=" padding: 20px !important;">
                  </div>
				 <div class="form-group">
				         <br>
				         <br>
				         
                     	 <a class="btn btn-sm btn-secondary" target = '_blank' href="item.php?GETID=<?php echo $ID ?>"><i class="fa fa-edit"></i>Add / View / Remove Items</a>
                     	<br>
                  </div>
                  
				<div class="col-md-6">
                    <label class="form-label">Courier Charges</label>
                    <input type="text" class="form-control" name="co_c" value="<?php echo $dis; ?>"  style=" padding: 20px !important;">
                </div>
			
				<div class="col-12"  style=" margin-top: 20px;">
					<button name='submit' id='submit' class="btn btn-primary btn-block">Update</button>
				</div>	
					
            </div>
            </div>
      </form>
      
      <script>
        function la(src)
        {
            var newWin = window.open(src);             

            if(!newWin || newWin.closed || typeof newWin.closed=='undefined') 
            { 
                //POPUP BLOCKED
            }
          //  window.location=window.open(src);
           
        }
    </script>
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
<?php


   session_start();
   include_once("../include/mysql_connection.php"); 
   error_reporting(0);
   $iq=1;
   $cr=$_SESSION['Username'];
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
   
   $ID= $_GET['GETID'];
//     // RE order_id='$ID'";
//     // $result = mysqli_query($mysql, $sql);

//   while($row = mysqli_fetch_assoc($result)) 
//   {   
//       $Order_Num = $row['order_num'];
//       $invoice_total =$row['Total_Amount'];
//       $Customer_Name=$row['Customer_Name'];
//       $Customer_Phone=$row['Customer_Contact'];
//       $Customer_Address=$row['Customer_Address'];
//       $City=$row['Customer_City'];
//       $Date=$row['Date'];

//   }
   
   
   
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
                      <form method="POST" action="add.php?id=<?php echo $ID ?>">
        <div class="card-body">
            <div class="row">
    			<label>SKU:</label>
    			<input type="text" name="sku" class="form-control">
    			<br>
    			<br>
    			<label>Price:</label>
    			<input type="text" name="price" class="form-control"> 
    			
    		</div>
    		<div>	<br><input type="submit" name="add" value='Add' class="btn btn-primary f-right ref"></div>
         
    		
    
    		
    		
    	</div>
    </form>
    	</div>
    	<br>
    	<div>
    		<table class="table table-hover" border="1">
    			<thead>
    			    <th>S.No</th>
    				<th>Items</th>
    				<th>Price</th>
    				<th></th>
    			</thead>
    			<tbody>
    				<?php
    					$query=mysqli_query($mysql,"SELECT * FROM orders WHERE order_id='$ID'");
    					while($row=mysqli_fetch_array($query)){
    						?>
    						<tr>
    						    <td><?php echo $iq; ?></td>
    							<td><?php echo $row['Items']; ?></td>
    							<td><?php echo $row['Items_Price']; ?></td>
    							<td>
    								<a href="delete.php?id=<?php echo $row['Items']; ?>">Delete</a>
    							</td>
    							
    						</tr>
    						<?php
    						$iq++;
    					}
    				?>
    			</tbody>
    		</table>
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
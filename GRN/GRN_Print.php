<?php
session_start();

include_once("../include/mysql_connection.php"); 
if (isset($_SESSION['id']) && $_SESSION['id'] == true) {
    
   
}
else {
   
      echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
}

$id=$_GET['GETID'];
$sql = "SELECT * FROM GRN WHERE GRN_ID='$id'";
$result = mysqli_query($mysql, $sql);


while($row = mysqli_fetch_assoc($result)) 
{
    $GRN_ID=$row["GRN_ID"]; 
    $PO_ID=$row["PO_ID"]; 
    $GRN_Date=$row["Date"]; 
    $GRN_Delivered_By=$row["Delivered_By"]; 
    $GRN_Delivered_Contact=$row["Delivered_Contact"]; 
    $User_ID=$row["User_ID"]; 
}


$sels1="SELECT SUM(Unit_Price) as price FROM Item_Received WHERE GRN_ID='$id'";
$rss1=mysqli_query($mysql, $sels1);
$row3 = mysqli_fetch_array($rss1);
$Total=$row3[0];

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container">
	
	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: center;">GRN Invoice</h1>
			<p style="text-align: center;">Recieved Items</p>
			<?php
			
      $sel="SELECT * FROM GRN WHERE GRN_ID='$id'";
      $rs=$mysql->query($sel);
      while($row=$rs->fetch_assoc()){

      ?>
      <div class="row">
        <div class="col-md-6">
        <p><b>Bill no: </b> GRN-<?php echo str_pad($_GET['GETID'],"8","0",STR_PAD_LEFT); ?></p>
        <br>
        <p>Purchase Order ID :<b> <?php echo $row['PO_ID'] ?></b></p>
        <p>Goods Recieved Note Date :<b> <?php echo $row['Date'] ?></b></p>
        <p>Goods Recieved Note Delivered By :<b> <?php echo $row['Delivered_By'] ?></b></p>
        <p>Goods Recieved Note Delivery Contact :<b> <?php echo $row['Delivered_Contact'] ?></b></p>
        <p>Goods Recieved Note User ID :<b> <?php echo $row['User_ID'] ?></b></p>
       
      </div>
  </div>
      
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Item Names</th>
        <th>Quantity</th>
        <th>Item Description</th>
        <th>Unit Prices</th>
      </tr>
    </thead>
    <tbody>

      <?php 
        $sels="SELECT * FROM Item_Received WHERE GRN_ID='$id'";
        $rss=$mysql->query($sels);
        while($rows=$rss->fetch_assoc())
        {
        	?>
    <tr>
        <td><?php echo $rows['Item']?></td>
        <td><?php echo $rows['Quantity']?></td>
        <td><?php echo $rows['Description']?></td>
        <td><?php echo $rows['Unit_Price']?></td>
      </tr>
        <?php
      }
       
         ?>

          <tr>
          	<th colspan="3">Sub Total</th>
          	<th><?php echo $Total; ?></th>
          </tr>


      </tbody>
  </table>


  <?php  } ?>





		
	</div>
</div>
<div class="row" style="margin-top: 100px;">
		<div class="col-md-6">
			<p style="float: left;">Date : <?php echo date('d-m-Y');?></p>
		</div>
		<div class="col-md-6">
			<p style="float: right;">Signature :</p>
		</div>
	</div>
	
</div>

<script>
  window.print();
</script>
<?php

// session_start();
include_once("mysql.php"); 
error_reporting(0);
date_default_timezone_set("Asia/Karachi");
$monthinwords = date("F");
$monthinnumbers = date("m");
$year = date("Y");

$total_Count = 0;




if (isset($_POST["filter"])) {
    echo "Filtered";

    //Get date from the filter
    $startDate = $_POST["from"];
    $endDate = $_POST["To"];
    $sql = "SELECT orders.Courier_Status, COUNT(orders.Courier_Status) AS `res`FROM orders WHERE Date Between '$startDate' AND '$endDate' GROUP BY orders.Courier_Status;";
    $sql_Courier = "SELECT orders.Status, COUNT(orders.Courier_Status) As 'Cou' FROM `orders` WHERE Courier='Leopard' And Date Between '$startDate' AND '$endDate'  GROUP BY orders.Courier_Status;";
    $sql_Post = "SELECT orders.Status, COUNT(orders.Courier_Status) As 'Post' FROM `orders` WHERE Courier='PostEx' And Date Between '$startDate' AND '$endDate' GROUP BY orders.Courier_Status;";
    $sql_Rider = "SELECT orders.Status, COUNT(orders.Courier_Status) As 'Rider' FROM `orders` WHERE Courier='Rider' And Date Between '$startDate' AND '$endDate' GROUP BY orders.Courier_Status;";
    $sql_Self = "SELECT orders.Status, COUNT(orders.Courier_Status) As 'Self' FROM `orders` WHERE Courier='Self' And Date Between '$startDate' AND '$endDate' GROUP BY orders.Courier_Status;";

    $result = mysqli_query($mysql, $sql);
    $courier_result = mysqli_query($mysql, $sql_Courier);
    $Post_result = mysqli_query($mysql, $sql_Post);
    $Rider_result = mysqli_query($mysql, $sql_Rider);
    $Self_result = mysqli_query($mysql, $sql_Self);
} else {
    $tot = 0;
    $sql = "SELECT orders.Courier_Status, COUNT(orders.Courier_Status) AS `res`FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' GROUP BY orders.Status;";
    $sql_Courier = "SELECT orders.Courier_Status, COUNT(orders.Courier_Status) As 'Cou' FROM `orders` WHERE Courier='Leopard' And YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers'  GROUP BY orders.Courier_Status;";
    $sql_Post = "SELECT orders.Courier_Status, COUNT(orders.Courier_Status) As 'Post' FROM `orders` WHERE Courier='PostEx' And YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' GROUP BY orders.Courier_Status;";
    $sql_Rider = "SELECT orders.Courier_Status, COUNT(orders.Courier_Status) As 'Rider' FROM `orders` WHERE Courier='Rider' And YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' GROUP BY orders.Courier_Status;";
    $sql_Self = "SELECT orders.Courier_Status, COUNT(orders.Courier_Status) As 'Self' FROM `orders` WHERE Courier='Self' And YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' GROUP BY orders.Courier_Status;";

    $result = mysqli_query($mysql, $sql);
    $courier_result = mysqli_query($mysql, $sql_Courier);
    $Post_result = mysqli_query($mysql, $sql_Post);
    $Rider_result = mysqli_query($mysql, $sql_Rider);
    $Self_result = mysqli_query($mysql, $sql_Self);
    
}
?> 
<style>
  table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
  }

  th,td {
    padding: 5px;
    text-align: left;
  }
</style>
<h1>
  <b> Orders Statuses</b>
</h1>
<form action="" method="POST" class="PR">
  <div class="col-md-4">
    <label>
      <b>From</b>
    </label>
    <input placeholder="YYYY-DD-MM" type="date" name="from" style="padding: 5px !important;">
  </div>
  <div class="col-md-4">
    <label>
      <b>To</b>
    </label>
    <input placeholder="YYYY-DD-MM" type="date" name="To" style="padding: 5px !important;">
  </div>
  <div class="form-group" style="display: flex;">
    <button name="filter" class="btn btn-info">Filter</button>
  </div>
  <br>
  <br>
  <br>
  <br>
  <table style="border:2px solid black; width:100%" colspan="1">
    <thead>
      <tr>
        <th scope="col" colspan="1">Status</th>
        <th scope="col">Order Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th>Booked</th>
        <th>cancel</th>
        <th>conforimed</th>
        <th>Dispatched</th>
        <th>Exchanged</th>
        <th>Hold</th>
        <th>None</th>
        <th>Not_Found</th>
        <th>Packed</th>
        <th>Picked</th>
        <th>QC_Rejected</th>
        <th>Recieved</th>
        <th>Returend</th>
      </tr>
      <tr> 
      <?php while ($row = mysqli_fetch_array($result)) {
        $count_status = $row["res"];
        echo "<td style='border:1px solid black;'>" . $count_status . "</td>";
        $total_Count += $count_status;
    }?> 
        <p> Total Orders: <?php echo $total_Count; ?> </p>
    </tr>
    </tbody>
  </table>
  <br>
  <table style="width:100%">
    <thead>
      <tr>
        <th scope="col" colspan="1">Leopard</th>
      </tr>
    </thead>
    <tr>
      <th> </th>
      <th>Delivered</th>
      <th>Intransit</th>
      <th>Pending</th>
      <th>Returned</th>
    </tr>
    <tr> <?php while ($row = mysqli_fetch_array($courier_result)) {
      $CouName = $row["Cou"];
      echo "
										<td style='border:1px solid black;'>" . $CouName . "</td>";
  } ?> </tr>
  </table>
  <br>
  <table style="width:100%">
    <thead>
      <tr>
        <th scope="col" colspan="1">Post</th>
      </tr>
    </thead>
    <tr>
      <th> </th>
      <th>Delivered</th>
      <th>Intransit</th>
      <th>Pending</th>
      
    </tr>
    <tr> <?php while ($row = mysqli_fetch_array($Post_result)) {
      $Post = $row["Post"];
      echo "
											<td style='border:1px solid black;'>" . $Post . "</td>";
  } ?> </tr>
  </table>
  <br>
  <table style="width:100%">
    <thead>
      <tr>
        <th scope="col" colspan="1">Rider</th>
      </tr>
    </thead>
    <tr>
      <th> </th>
      <th>Canceled</th>
      <th>Delivered</th>
      <th>Returned</th>
    </tr>
    <tr> <?php while ($row = mysqli_fetch_array($Rider_result)) {
      $Rider = $row["Rider"];
      echo "
												<td style='border:1px solid black;'>" . $Rider . "</td>";
  } ?> </tr>
  </table>
  <br>
  <table style="width:100%">
    <thead>
      <tr>
        <th scope="col" colspan="1">Self</th>
      </tr>
    </thead>
    <tr>
      
      <th>Dispatched</th>
      
    </tr>
    <tr> <?php while ($row = mysqli_fetch_array($Self_result)) {
      $Self = $row["Self"];
      echo "
													<td style='border:1px solid black;'>" . $Self . "</td>";
  } ?> </tr>
  </table>
</form>
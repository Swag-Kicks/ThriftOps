<?php 


   
  

    //___________________________________________________________________________________________________________________________________________________________________
    //Initialization
    session_start();
    include_once("mysql.php"); 
    error_reporting(0);
    date_default_timezone_set("Asia/Karachi");
    $monthinwords=date('F');
    $monthinnumbers=date('m');
    $year=date('Y');
    



    //___________________________________________________________________________________________________________________________________________________________________
    //Call category names and queries
    
    $categoryNameQuery = "SELECT Category as cat ,Query as query FROM Analytics";
    $analyticsResult = mysqli_query($mysql, $categoryNameQuery);
    $categoriesArray = array();
    $queryArray = array();
    while($responseRow = mysqli_fetch_assoc($analyticsResult)) 
    { 
        $category = $responseRow['cat'];
        $query = $responseRow['query'];
        array_push($categoriesArray,$category);
        array_push($queryArray,$query);
    }
    
    //___________________________________________________________________________________________________________________________________________________________________
    //If the date filter is used - use this query
    if(isset($_POST['filter']))
    {
        //Get date from the filter
        $startDate = $_POST['from'];
        $endDate = $_POST['To'];
        
        //Get the total count of orders and their Sum(Revenue) in the given time.
        $tot = 0;
        $sql = "SELECT *,GROUP_CONCAT(Items) FROM orders WHERE Date Between '$startDate' AND '$endDate' GROUP BY order_id DESC";
        $result = mysqli_query($mysql, $sql);
        while($row = mysqli_fetch_assoc($result)) 
        { 
            $co++;
            $sum=$i=$row['Total_Amount'];
            $tot=$tot+$sum;
            $i=$row['order_id'];
        }
        $or_total=$co;
        
        //From the array of the collection created from the DB - this part of the code generated other queries to run, fetch data, and store in the respected arrays.
        $arrSum = array();
        $arrTotal = array();
        
        for ($x = 0; $x < count($categoriesArray); $x++) 
        {
            $generalQuery = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE Date Between '$startDate' AND '$endDate' AND Items $queryArray[$x]";
            $generalResult = mysqli_query($mysql, $generalQuery);
            $generalRow = mysqli_fetch_assoc($generalResult);
            $generalSum = $generalRow['sum'];
            $generalTotal = $generalRow['total']; 
            
            if($generalSum=='')
            {
              $generalTotal=0;
              $generalSum=0;
            }
            
            array_push($arrSum,$generalSum);
            array_push($arrTotal,$generalTotal);
        }
        
        //___________________________________________________________________________________________________________________________________________________________________
        //Uploads Data
        
        $uploadCollections = array("Bags", "Beanies", "belts", "bottoms", "caps", "Cleaning kits", "Gadget", "Hoodies", "Jackets", "khussa", "Kids", "Mufflers", "R&H", "sandals", "shirts", "shoes", "shorts", "Slippers", "Socks", "Tie", "TOPS", "tshirts", "Watch");
        $uploadSum = array();
        for ($x = 0; $x < count($uploadCollections); $x++) 
        {
            $uploadQuery = "Select Count(Shopify_ID) as total from $uploadCollections[$x] WHERE Shopify_ID!='' AND DateTime Between '$startDate' AND '$endDate'";
            $uploadResult = mysqli_query($mysql, $uploadQuery);
            $uploadRow = mysqli_fetch_assoc($uploadResult);
            $uploadData = $uploadRow['total'];
            array_push($uploadSum,$uploadData);
        }
    }

    //When the page is loaded without any date filters - month to date filter will be automatically selected and this part of the code will be executed.
    
    else{
        
        //Get the total count of orders and their Sum(Revenue) with the month to date filter.
        $tot=0;
        $sql = "SELECT *,GROUP_CONCAT(Items) FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' GROUP BY order_id DESC";
        $result = mysqli_query($mysql, $sql);
        while($row = mysqli_fetch_assoc($result)) 
        { 
            $co++;
            $sum=$i=$row['Total_Amount'];
            $tot=$tot+$sum;
            $i=$row['order_id'];
        }
        $or_total=$co;
        
        //From the array of the collection created from the DB - this part of the code generated other queries to run, fetch data, and store in the respected arrays.
        $arrSum = array();
        $arrTotal = array();
        
        for ($x = 0; $x < count($categoriesArray); $x++) 
        {
            $generalQuery = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' AND Items $queryArray[$x]";
            $generalResult = mysqli_query($mysql, $generalQuery);
            $generalRow = mysqli_fetch_assoc($generalResult);
            $generalSum = $generalRow['sum'];
            $generalTotal = $generalRow['total']; 
            
            if($generalSum=='')
            {
                $generalTotal=0;
                $generalSum=0;
            }
            
            array_push($arrSum,$generalSum);
            array_push($arrTotal,$generalTotal);
        }
        
        //___________________________________________________________________________________________________________________________________________________________________
        //Uploads Data
        
        $uploadCollections = array("Bags", "Beanies", "belts", "bottoms", "caps", "Cleaning kits", "Gadget", "Hoodies", "Jackets", "khussa", "Kids", "Mufflers", "`R&H`", "sandals", "shirts", "shoes", "shorts", "Slippers", "Socks", "Tie", "TOPS", "tshirts", "Watch");
        $uploadSum = array();
        for ($x = 0; $x < count($uploadCollections); $x++) 
        {
            $uploadQuery = "Select Count(Shopify_ID) as total from $uploadCollections[$x] WHERE Shopify_ID!='' AND YEAR(DateTime) = '$year' AND MONTH(DateTime) = '$monthinnumbers'";
            $uploadResult = mysqli_query($mysql, $uploadQuery);
            $uploadRow = mysqli_fetch_assoc($uploadResult);
            $uploadData = $uploadRow['total'];
            array_push($uploadSum,$uploadData);
        }
    } 
?> 
<?php include ("../include/header.php"); ?>
<?php include ("../include/side_admin.php"); ?>
<div class="page-body">

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

  <div class="row">
    <div class="col-md-12">
      <label>
        <b>Order Count</b>: <?php echo number_format($or_total) ?></label>
      <br>
      <br>
      <br>
      <div class="e-table">
        <div class="table-responsive table-lg">
            <?php
                $totalSum = 0;
                $totalTotal = 0;
                $totalAvg = 0;
                echo $tableHead = "
                    <table class='table table-bordered' id='crud_table'>
                        <tr>
                            <th>Category</th>
                            <th>Revenue Generated</th>
                            <th>Articles Sold</th>
                            <th>Avg Item Value</th>
                        </tr>";
        
            for ($x = 0; $x < count($categoriesArray); $x++) 
            {
                $aiv = number_format(round($arrSum[$x]/$arrTotal[$x]));
                $totalSum = $totalSum + $arrSum[$x];
                $totalTotal = $totalTotal + $arrTotal[$x];
                $num_rev = number_format($arrSum[$x]);
                echo $e="
    				    <tr>
                            <td>$categoriesArray[$x]</td>
                            <td>$num_rev</td>
                            <td>$arrTotal[$x]</td>
                            <td>$aiv</td>
                        </tr>";
    	    }
    	    $totalAvg = number_format(round($totalSum/$totalTotal));
    	    
    	    $totalSum = number_format($totalSum);
    	    echo $tableEnd = "
    	                <tr>
                            <td>Total</td>
                            <td>$totalSum</td>
                            <td>$totalTotal</td>
                            <td>$totalAvg</td>
                        </tr>
    	            </table>";
    ?> 
          </table>
        </div>
      </div>
    </div>
  </div>
</form> 
</div>
        <?php include ("../include/footer.php"); ?></body>


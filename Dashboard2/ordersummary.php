<?php 
    //___________________________________________________________________________________________________________________________________________________________________
    //Initialization
    session_start();
    include_once("mysql.php"); 
    error_reporting(0);
    date_default_timezone_set("Asia/Karachi");
    // $monthinwords=date('F');
    // $monthinnumbers=date('m');
    // $year=date('Y');
    $count = 0;

    //___________________________________________________________________________________________________________________________________________________________________
    //If the date filter is used - use this query
    if(isset($_POST['filter']))
    {
      $filterWarn = "";
    }

   else
    {
        $filterWarn = "Select the date range to check data";
    }
?> 

<?php include ("header.php"); ?> 

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
    <h1 style="margin-left: 376px;top: 32px;position: relative;">Order Summary Page</h1>
    <br>
    <br>
    <br>
    <h5><?php echo $filterWarn ?> </h5>
    <div class="row">
        <div class="col-md-12">
            <label>
                <!--<b>Order Count</b>: <?php echo number_format($count) ?></label>-->
                <br>
               
        <div class="e-table">
            <div class="table-responsive table-lg">
                <?php
                $totalCost = 0;
                $totalSP = 0;
                $totalLP = 0;
                    echo $tableHead = "
                        <table class='table table-bordered' id='crud_table'>
                            <tr>
                                <th>Order Number</th>
                                <th>Order Date</th>
                                <th>Confirmed By</th>
                                <th>Booked By</th>
                                <th>Cancelled By</th>
                                <th>Picked By</th>
                                <th>Packed By</th>
                                <th>Dispatched By</th>
                            </tr>";
                        if(isset($_POST['filter']))
                        {
                            $filterWarn = "";
                            $startDate = $_POST['from'];
                            $endDate = $_POST['To'];
                            $totalConfirmed = 0;
                            $totalBooked = 0;
                            $totalCancelled = 0;
                            $totalPicked = 0;
                            $totalPacked = 0;
                            $total = 0;
                            $totalDispatched = 0;
                            $sql = "SELECT order_num, Date, MAX(Confirmed_By) AS confirmed, MAX(Booked_By) AS booked, MAX(Cancel_By) AS cancelled, MAX(Picked_By) AS picked, MAX(Packed_By) AS packed, MAX(Dispatch_By) AS dispatched FROM orders where date between '$startDate' and '$endDate' GROUP BY order_num HAVING confirmed IS NOT NULL OR booked IS NOT NULL OR cancelled IS NOT NULL OR picked IS NOT NULL OR packed IS NOT NULL  OR dispatched IS NOT NULL";
                            $result = mysqli_query($mysql, $sql);
                            while($row = mysqli_fetch_assoc($result)) 
                            { 
                                $total = $total + 1;
                                if ($row[confirmed] <> "")
                                {
                                    $totalConfirmed = 1+ $totalConfirmed;
                                }
                                if ($row[booked] <> "")
                                {
                                    $totalBooked = 1+ $totalBooked;
                                }
                                if ($row[cancelled] <> "")
                                {
                                    $totalCancelled = 1+ $totalCancelled;
                                }
                                if ($row[picked] <> "")
                                {
                                    $totalPicked = 1+ $totalPicked;
                                }
                                if ($row[packed] <> "")
                                {
                                    $totalPacked = 1+ $totalPacked;
                                }
                                if ($row[dispatched] <> "")
                                {
                                    $totalDispatched = 1+ $totalDispatched;
                                }
                                
                                echo $e="
                                    <tr>
                                        <td>$row[order_num]</td>
                                        <td>$row[Date]</td>
                                        <td>$row[confirmed]</td>
                                        <td>$row[booked]</td>
                                        <td>$row[cancelled]</td>
                                        <td>$row[picked]</td>
                                        <td>$row[packed]</td>
                                        <td>$row[dispatched]</td>
                                    </tr>";
                            }
                        }
                        echo $tableEnd = "
                            <tr>
                            <td> Total Count </td>
                            <td>$total</td>
                            <td>$totalConfirmed</td>
                            <td>$totalBooked</td>
                            <td>$totalCancelled</td>
                            <td>$totalPicked</td>
                            <td>$totalPacked</td>
                            <td>$totalDispatched</td>
                            </tr>
                            <tr>
                            <td> Labels </td>
                            <td>TOTAL </td>
                            <td>CONFIRMED </td>
                            <td>BOOKED </td>
                            <td>CANCELLED</td>
                            <td>PICKED </td>
                            <td>PACKED </td>
                            <td>DISPATCHED </td>
                            </tr>
                        </table>";?> 
            </div>
        </div>
    </div>
</form>

<button onclick="fnExcelReport()">EXPORT CSV</button>
<script>
       function fnExcelReport()
   {
       var tab_text="<table border='2px'><tr bgcolor='#87AFC6'> </tr>";
       var textRange; var j=0;
       tab = document.getElementById('crud_table'); // id of table
   
       for(j = 0 ; j < tab.rows.length ; j++) 
       {     
           tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
           //tab_text=tab_text+"</tr>";
       }
   
       tab_text=tab_text+"</table>";
       tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
       tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
       tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params
   
       var ua = window.navigator.userAgent;
       var msie = ua.indexOf("MSIE "); 
   
       if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
       {
           txtArea1.document.open("txt/html","replace");
           txtArea1.document.write(tab_text);
           txtArea1.document.close();
           txtArea1.focus(); 
           sa=txtArea1.document.execCommand("SaveAs",true);
       }  
       else                 //other browser not tested on IE 11
           sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  
   
       return (sa);
   }
</script>
<?php include ("footer.php"); ?> 
</body>
</html>

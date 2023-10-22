<?php 
   
    session_start();
    include_once("mysql.php"); 
    error_reporting(0);
    date_default_timezone_set("Asia/Karachi");
    // $monthinwords=date('F');
    // $monthinnumbers=date('m');
    // $year=date('Y');
    $count = 0;


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

<?php include ("../include/header.php"); ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>
<style>
    .table-lg td, .table-lg th {
    font-size: 75%;
}
</style>
    <!-- Page body start-->
        <div class="page-body">
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="select2-drpdwn">
              <div class="row">
                <!-- Default Textbox start-->
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header pb-0">
                      <!--<h5 class="card-title"></h5>-->
                    </div>
                    <div class="card-body">
                     <form action="" method="POST" class="PR">
    
    <div class="row">
          <div class="col-md-4">
              <h3 class=" modal-title">PNL REPORT</h3>
               
            </div>
            <div class="col-md-2 mt-2">
             
         </div>
         <div class="col-md-3">
            <div class="form-group ">
                          <label class="col-sm-3 col-form-label">From</label>
                          <div class="">
                            <div class="input-group">
                              <input  class=" form-control digits" placeholder="YYYY-DD-MM" type="date" name="from" style;"border-radius:6px;">
                            </div>
                          </div>
                        </div>
            
         </div>
         <div class="col-md-3">
            <div class="form-group ">
                          <label class="col-sm-3 col-form-label">To</label>
                          <div class="">
                            <div class="input-group">
                              <input  class=" form-control digits" placeholder="YYYY-DD-MM" type="date" name="To" style;"border-radius:6px;">
                             
                            </div>
                            <button name="filter" class="btn btn-primary f-right mt-2">Filter</button>
                          </div>
                        </div>
         </div>
         
        </div>
    
   
    <h5><?php echo $filterWarn ?> </h5>
        
                <!--<b>Order Count</b>: <?php echo number_format($count) ?></label>-->
                 <button class="btn btn-outline-success" onclick="fnExcelReport()"><i class="fa fa-file-excel-o"></i> Download CSV</button>
                <br>
                <br>
                <br>
               
        <div class="e-table">
            <div class="table-responsive table-lg">
                <?php
                $totalCost = 0;
                $totalSP = 0;
                $totalLP = 0;
                    echo $tableHead = "
                       <div class='table-responsive'><table class='table table-hover ' id='crud_table'>
                            <tr>
                                <th>Order ID</th>
                                <th>SKU</th>
                                <th>Selling Price</th>
                                <th>Initital addition Price</th>
                                <th>Courier Partner</th>
                                <th>Tracking ID</th>
                                <th>Vendor</th>
                                <th>Condition</th>
                                <th>Cost</th>
                                <th>Category</th>
                                <th>Dispatch Time</th>
                            </tr>";
                        if(isset($_POST['filter']))
                        {
                            $filterWarn = "";
                            $startDate = $_POST['from'];
                            $endDate = $_POST['To'];
                            $sql = "Select Order_Number, SKU, Price, Tracking , Courier, Logs.DateTime as Date from `Order` INNER JOIN Logs on Order.Order_ID = Logs.Type_ID Where Order.Status = 'Dispatched' and Logs.DateTime between '$startDate % 00:00:00' AND '$endDate % 23:59:59' order by Logs.DateTime desc";
                            $result = mysqli_query($mysql, $sql);
                            while($row = mysqli_fetch_assoc($result)) 
                            { 
                                $sku=$row['SKU'];
                                $query="SELECT Vendor_ID, Cndition, Cost, Category_ID, Price FROM `addition` Where SKU='$sku'";
                                $res1=mysqli_query($mysql, $query);
                                $row1=mysqli_fetch_array($res1);
                                $vendor=$row1['Vendor_ID'];
                                //vendor name
                                $res2=mysqli_query($mysql, "SELECT Name FROM `Vendor` Where Vendor_ID='$vendor'");
                                $row2=mysqli_fetch_array($res2);
                                
                                //cat name
                                $cat=$row1['Category_ID'];
                                $res3=mysqli_query($mysql, "SELECT Name FROM `Category` Where Category_ID='$cat'");
                                $row3=mysqli_fetch_array($res3);
                                
                                $count = $count + 1;
                                echo $e="
                                    <tr>
                                        <td>$row[Order_Number]</td>
                                        <td>$row[SKU]</td>
                                        <td>$row[Price]</td>
                                        <td>$row1[Price]</td>
                                        <td>$row[Courier]</td>
                                        <td>$row[Tracking]</td>
                                        <td>$row2[Name]</td>
                                        <td>$row1[Cndition]</td>
                                        <td>$row1[Cost]</td>
                                        <td>$row3[Name]</td>
                                        <td>$row[Date]</td>
                                    </tr>";
                            }
                        }
                        echo $tableEnd = "
                            <tr>
                            <td class='bold'> Total Count </td>
                            <td class='bold'>$count</td>
                            // <td class='bold'></td>
                            // <td class='bold'>$totalCost</td>
                            // <td class='bold'>$totalSP</td>
                            // <td class='bold'>$totalLP</td>
                            </tr>
                        </table></div>";?> 
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
          <!-- Container-fluid Ends-->
        </div>


<!--<div class="page-body">-->


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
        <?php include ("../include/footer.php"); ?></body>

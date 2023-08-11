<?php 
session_start();

include_once("mysql.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0); 
$cr=$_SESSION['Username'];
$sql = "SELECT * FROM User WHERE username='$cr'";
$result = mysqli_query($mysql, $sql);
$er = mysqli_fetch_assoc($result);
$Dept=$er['Dept_ID'];

$name="Wellcome, ".$cr."!!";
    error_reporting(0);
    $selected_option = 100;
    $filter_option = "";
    $Sno = 1;

 


?>

<?php include ("../include/header.php"); ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>

<?php 
    //___________________________________________________________________________________________________________________________________________________________________
    //Initialization
    session_start();
    include_once("mysql.php"); 
    error_reporting(0);
    date_default_timezone_set("Asia/Karachi");
    $selected_option = 100;
    $filter_option = "";
    $Sno = 1;
?> 
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
                     
                    </div>
                    <div class="card-body">
                      <form action="" method="POST" class="PR">
    <!--<div class="form-group" style="display: flex;">-->
    <!--    <button name="filter" class="btn btn-info">Filter</button>-->
    <!--</div>-->
    <div class="row">
          <div class="col-md-4">
              <h3 class=" modal-title">HVC Visiblity</h3>
               
            </div>
            <div class="col-md-4 mt-2">
                
         </div>
         <div class="col-md-2">
           <label for="selection">Number of HVC's</label>
             <select class="form-control form-select form-control-secondary f-left" id="selection" name="selection">
        <option value="100">100</option>
        <option value="500">500</option>
        <option value="1000">1000</option
        <option value="1500">1500</option>
        <option value="3000">3000</option>
        <option value="50000">Max</option>
    </select>
            
         </div>
         <div class="col-md-2 pt-4">
              <select class="form-control form-select form-control-secondary f-left" id="filter" name="filter">
        <option value="">No Dispatched Filter</option>
        <option value="where Status = 'Dispatched'">Dispatched Filter</option>
    </select>
           <input class="btn btn-primary f-right mt-2" type="submit" value="Submit">
         </div>
         
        </div>
    
    
    <div class="form-group" style="display: flex;">
        
    
   
    
    
    </div>
    <!--<button onclick="fnExcelReport()">Export CSV</button>-->
     <button class="btn btn-outline-success" onclick="fnExcelReport()"><i class="fa fa-file-excel-o"></i> Download CSV</button>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selected_option = $_POST["selection"];
        $filter_option = $_POST["filter"];
    }
?>
    
    <br>
    <div class="row">
        <div class="col-md-12">
            <label>
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
                                <th>S.No</th>
                                <th>Customer Name</th>
                                <th>Customer Phone No.</th>
                                <th>LTV</th>
                                <th>Order Count</th>
                                <th>AOV</th>
                            </tr>";
                       
                        $sql = "SELECT Customer_Contact,Customer_Name, SUM(Items_Price) AS total_price, COUNT(*) AS order_count FROM orders $filter_option GROUP BY Customer_Contact order by total_price desc LIMIT 4,".$selected_option.";";
                        $result = mysqli_query($mysql, $sql);
                        while($row = mysqli_fetch_assoc($result)) 
                        { 
                           
                            $AOV =  round((int)$row[total_price]/(int)$row[order_count]);
                            echo $e="
                                <tr>
                                    <td>$Sno</td>
                                    <td>$row[Customer_Name]</td>
                                    <td>$row[Customer_Contact]</td>
                                    <td>$row[total_price]</td>
                                    <td>$row[order_count]</td>
                                    <td>$AOV</td>
                                </tr>";
                                $Sno = $Sno+1;
                        }    
                        
                        echo $tableEnd = "
                        </table>";?> 
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
   
       if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))     \ // If Internet Explorer  js
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
       <?php include ("../include/footer.php"); ?>
</body>
</html>

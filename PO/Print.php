<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
<link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
<!-- Responsive css-->
<link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
<?php
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);


if(isset($_GET["id"]))
{
    $id=$_GET["id"];
    
    $count=1;
   
    $sql1 = "SELECT * from PO WHERE PO_ID='$id'";
    $result1 = mysqli_query($mysql, $sql1);
    $row = mysqli_fetch_assoc($result1);
    
    
    //item required
    $sql2 = "SELECT * from Items WHERE PO_ID='$id'";
    $result2 = mysqli_query($mysql, $sql2);
    
    //pr
    // $sql3 = "SELECT * from  WHERE PO_ID='$id'";
    // $result3 = mysqli_query($mysql, $sql2);
    
   
    if($row !="")
    {
        //vendor
        $records1 = mysqli_query($mysql, "SELECT Name FROM `Vendor` WHERE Vendor_ID='".$row["Vendor_ID"]."'"); 
        $data1 = mysqli_fetch_array($records1);
        $ve= $data1[0];
        
        //logs 
        $sql3 = "SELECT * FROM Logs WHERE Type='PO' AND Type_ID='$id' order by id ASC LIMIT 1";
        $result3 = mysqli_query($mysql, $sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $userid=$row3['User_ID'];
        $req=$row3['DateTime'];
        
        //user and dept
        $sql7 = "SELECT * FROM User WHERE User_ID='$userid'";
        $result7 = mysqli_query($mysql, $sql7);
        $row7 = mysqli_fetch_assoc($result7);
        $requetser=$row7['Name'];
        $dept=$row7['Dept_ID'];
        
        //dept
        $sql8 = "SELECT * FROM Department WHERE Dept_ID='$dept'";
        $result8 = mysqli_query($mysql, $sql8);
        $row8 = mysqli_fetch_assoc($result8);
        $deptname=$row8['Name'];
        
        //pr
        $sql9 = "SELECT * FROM PR WHERE PR_ID='".$row['PR_ID']."'";
        $result9 = mysqli_query($mysql, $sql9);
        $row9 = mysqli_fetch_assoc($result9);
        $date=$row9['Required_Date'];
        
        //logs
        $sqli = "SELECT * FROM Logs WHERE Type='PR' AND Type_ID='".$row['PR_ID']."' AND Status='Approved' order by id ASC LIMIT 1";
        $resulti = mysqli_query($mysql, $sqli);
        $rowi = mysqli_fetch_assoc($resulti);
        $appuser=$rowi['User_ID'];
        
        //user
        $sqli1 = "SELECT * FROM User WHERE User_ID='$appuser'";
        $resulti1 = mysqli_query($mysql, $sqli1);
        $rowi1 = mysqli_fetch_assoc($resulti1);
        $app=$rowi1['Name'];
        
        $records3 = mysqli_query($mysql, "SELECT SUM(Unit_Price*Quantity) FROM `Items` where PO_ID='".$row["PO_ID"]."'"); 
        $data3 = mysqli_fetch_array($records3);
        $sum= $data3[0];
        
        if($req!='')
        {
             $reqdate=date('Y-m-d', strtotime($row3['DateTime']));
        }
        else
        {
             $reqdate='Not Found';
        }
                     
            $output = '  
                        <div class="row">
                                 <div class="col-md-6 ">
                                     <img src="../assets/images/print/print">
                                 </div>

                                 <div class="col-md-6 f-right " style="padding-left: 40px;">
                                     <span class="invoice-number t-r"><h4><b>Purchase Order</b></h4></span>
                                 </div>
                                 
                             </div>
                       <br><br>
                       <div class="row">
                       <div class=" col-md-6">
                            <label class="Pon">Purchase Request #&nbsp;<lable style="font-weight: bold;">'.$row['PR_ID'].'</label></label><br>
                            <label class="Pon">Purchase Order #&nbsp;<lable style="font-weight: bold;">'.$id.'</label></label><br>
                            <label class="Pon">Date:&nbsp;<lable style="font-weight: bold;">'.$reqdate.'</label></label><br>
                            <label class="Pon">Supplier:&nbsp;<lable style="font-weight: bold;">'.$ve.'</label></label>
                        </div>
                        <div class="from col-md-6 f-r">
                            <span class="invoice-number t-r"> <h5><b>Swagkicks</b></h5>
                            <label>B-165, Block D,<br>North Nazimabad,<br> Karachi</label></span>
                        </div>
                       </div>
                    
                    <table class="table table-striped m-t-20">
                      <thead class="table-inverse table-striped">
                      <tr class="text-center">
                            <td scope="col">SNO</td>
                            <td scope="col">Item Name</td>
                            <td scope="col">Description</td>
                            <td scope="col">Quantity</td>
                            <td scope="col">Unit Price</td>
                            <td scope="col">Total</td>
                            
                            
                       </tr>
                      </thead>
                    ';

                    while($row = mysqli_fetch_array($result2))
                    {
                        
                        $utot=$row['Quantity']*$row['Unit_Price'];
                    
                        $output .= '

                                       <tbody class="text-center">
                                        <tr>
                                          <td>'.$count++.'</td>
                                          <td>'.$row["Item"].'</td>
                                          <td>'.$row["Description"].'</td>
                                           <td>'.$row["Quantity"].'</td>
                                          <td>'.$row["Unit_Price"].'</td>
                                          <td>'.$utot.'</td>
                                          
                                                                        
                                     </tr>
                                        </tbody>
                                                    '
                                        
                                        
                                        
                                        ;
                    }


        $output .= '
        </table>
        
        <br><br>
       
         <div class="f-right">
            <button class="btn btn-square btn-light disabled" >Order Total:&nbsp;<label id="printo" style="font-size: 18px;font-weight: bolder;" >'.$sum.'</label></button>
        </div>
        <br><br><br>
        
        </div>
        
        <table class="table table-striped">
                      <thead class="table-inverse table-striped">
                      <tr class="text-center">
                            <td scope="col">Delivery Date</td>
                            <td scope="col">Requested By</td>
                            <td scope="col">Approved By</td>
                            <td scope="col">Department</td>
                       </tr>
                      </thead>
                       <tbody class="text-center">
                            <tr>
                                <td>'.$date.'</td>
                                <td>'.$requetser.'</td>
                                <td>'.$app.'</td>
                                <td>'.$deptname.'</td>
                            </tr>
                        </tbody>
                        </table>
        ';
        
        echo $output;
        
    }
    else
    {
        echo "0";
    }
    
}
?>




<style>
body {
   width: 950px;
  margin:auto;
  padding-top:50px;
  padding:50px;
}

.container {
  width: 21cm;
  min-height: 29.7cm;
}

.invoice {
  background: #fff;
  width: 100%;
  padding: 50px;
}
.for {
            position: absolute;
            top: 1.5in;
            left: .5in;
            width: 2.5in;
        }
.from {
    /* text-align: left; */
    /* position: absolute; */
    top: -109px;
    right: -6.5in;
    width: 219px;
}
        }

.logo {
  width: 2.5cm;
}

.document-type {
  text-align: right;
  color: #444;
}
.invoice-number {
            
            float: right;
        }
.conditions {
  font-size: 0.7em;
  color: #666;
}

.bottom-page {
  font-size: 0.7em;
}
</style>
<div class="invoice-box">
</div>
<script>
  window.print();
</script>
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
   
    $sql1 = "SELECT * from PR WHERE PR_ID='$id'";
    $result1 = mysqli_query($mysql, $sql1);
    $row = mysqli_fetch_assoc($result1);
    
    
    //item required
    $sql2 = "SELECT * from Items WHERE PR_ID='$id'";
    $result2 = mysqli_query($mysql, $sql2);
    // $row1 = mysqli_fetch_assoc($result2);
    
    //logs 
    
    $sql3 = "SELECT * FROM Logs WHERE Type='PR' AND Type_ID='$id' And Status='Pending' order by id LIMIT 1";
    $result3 = mysqli_query($mysql, $sql3);
    $row3 = mysqli_fetch_assoc($result3);
    $userid=$row3['User_ID'];
    $req=$row3['DateTime'];
    
    if($req!='')
    {
         $reqdate=date('Y-m-d', strtotime($row3['DateTime']));
    }
    else
    {
         $reqdate='Not Found';
    }
   
    
    
    $sql4 = "SELECT * FROM User WHERE User_ID='$userid'";
    $result4 = mysqli_query($mysql, $sql4);
    $row4 = mysqli_fetch_assoc($result4);
    $name=$row4['Name'];
    
    $sql5 = "SELECT * FROM Tax WHERE Tax_Type='Procurement'";
    $result5 = mysqli_query($mysql, $sql5);
    $row5 = mysqli_fetch_assoc($result5);
    $Tax=$row5['Tax'];
    
    
    //sum sub total 
    $recods3 = mysqli_query($mysql, "SELECT SUM(Est_Price*Quantity) FROM `Items` where PR_ID='".$row["PR_ID"]."'"); 
    $dat3 = mysqli_fetch_array($recods3);
    $subtot= $dat3[0];
    
    if($row !="")
    {
                //logs approved fetch
                $sql6= "SELECT * FROM Logs WHERE Type='PR' AND Type_ID='$id' And Status='Approved' order by id LIMIT 1";
                $result6 = mysqli_query($mysql, $sql3);
                $row6 = mysqli_fetch_assoc($result3);
                $userid1=$row6['User_ID'];
                //user name fetch
                $sql7 = "SELECT * FROM User WHERE User_ID='$userid'";
                $result7 = mysqli_query($mysql, $sql7);
                $row7 = mysqli_fetch_assoc($result7);
                $name1=$row7['Name'];
                
                $records3 = mysqli_query($mysql, "SELECT SUM(Est_Price) FROM `Items` where PR_ID='".$row["PR_ID"]."'"); 
                $data3 = mysqli_fetch_array($records3);
                $sum= $data3[0];
                
                $status=$row['Status'];
                
                if($status=='Approved')
                {
                    $show='<h5>Approved by:</h5><br><h5>'.$name.'</h5>';
                }
                else if($status=='Pending')
                {
                    $show='<h5>Approved by:</h5><h5><b>Pending Approval</b></h5>';
                }
                 $output = '  
                 
                        <div class="row">
                                 <div class="col-md-4 ">
                                     <img src="https://backup.thriftops.com/assets/images/print/print">
                                 </div>
                                 <div class="col-md-4 ">
                                     
                                 </div>
                                
                                 <div class="col-md-4 f-right " style="padding-left: 85px;">
                                     
                                 </div>
                                 
                             </div>
                             <span class="invoice-number"><h5><b>Purchase Request</b></h5></span>
                 <div class="row"  style=" margin-top:30px;margin-bottom:30px;">
                        <div class="col-md-3 ">
                            <label class="Pon">Requisition No.&nbsp;<lable id="pp1" style="font-weight: bold;">'.$id.'</label></label><br>
                            <label>Request Date:&nbsp;<lable id="pp1" style="font-weight: bold;">'.$reqdate.'</label></label><br>
                            <label>Requester:&nbsp;<lable id="pp1" style="font-weight: bold;">'.$name.'</label></label><br>
                            <label>Date Required:&nbsp;<lable id="pp1" style="font-weight: bold;">'.$row['Required_Date'].'</label></label>
                             
                        </div>
                        <div class="col-md-3 ">
                            
                       </div>
                      <div class="col-md-3 ">
                      </div>
                       <div class="col-md-3">
                           
                      </div>
                        </div>
             
                    <table class="table table-striped">
                      <thead class="table-inverse table-striped">
                      <tr class="text-center">
                            <td scope="col">SNO</td>
                            <td scope="col">Item Name</td>
                            <td scope="col">Description</td>
                            <td scope="col">Quantity</td>
                            <td scope="col">Est.Price</td>
                            <td scope="col">Total</td>
                            
                            
                       </tr>
                      </thead>
                    ';

                    while($row1 = mysqli_fetch_assoc($result2))
                    {
                        $utot=$row1['Quantity']*$row1['Est_Price'];
                        
                        
                        
                        $taxi=$subtot*$Tax/100;
                        $tot=$subtot+$taxi;
                        $output .= '
                                       <tbody class="text-center">
                                        <tr>
                                          <td>'.$count++.'</td>
                                          <td>'.$row1["Item"].'</td>
                                          <td>'.$row1["Description"].'</td>
                                           <td>'.$row1["Quantity"].'</td>
                                          <td>'.$row1["Est_Price"].'</td>
                                          <td>'.$utot.'</td>
                                        </tr>
                                        </tbody>';
                    }

    
        
        $output .= '
        </table>
       
         <div >
           
          </div>
        
        <br><br>
        <div class="">
            <div class="row">
             <div class="col-md-6">
             '.$show.'
              
          </div>
          <div class="totals col-md-6 f-right" style="text-align-last: end;">
           <span class="" >Sub Total:&nbsp;<label id="printo" style="font-size: 18px;font-weight: bolder;" >'.$subtot.'</label></span><br>
            <span class="" >Tax('.$Tax.'%):&nbsp;<label id="prtax" style="font-size: 18px;font-weight: bolder;" >'.$taxi.'</label></span><br>
            <span class="" >Order Total:&nbsp;<label id="pr1tot" style="font-size: 18px;font-weight: bolder;" >'.$tot.'</label></span>
          </div>
        
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
.invoice-number {
            padding-top: .17in;
            float: right;
        }
@media (max-width: 768px)
.col-md-4 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    width: 33.33333%;
}

@media (max-width: 950px) {
  .resp .page-wrap { width: 100%; }
}
</style>
<div class="invoice-box">
</div>
<script>
  window.print();
</script>
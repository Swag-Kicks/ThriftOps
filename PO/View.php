<?php
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);


if(isset($_POST["id"]))
{
    $id=$_POST["id"];
    
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
                                 <div class="col-md-6 f-right t-r">
                                     <h3><b>Purchase Order</b></h3>
                                 </div>
                                 
                             </div>
                        
                       <br><br>
                       <div class="row">
                       
                    <div class="col-md-6">
                        <label class="Pon f-18">Purchase Request #&nbsp;<lable style="font-weight: bold;">'.$row['PR_ID'].'</label></label><br>
                        <label class="Pon f-18">Purchase Order #&nbsp;<lable style="font-weight: bold;">'.$id.'</label></label><br>
                        
                        <label class="Pon f-18">Date:&nbsp;<lable style="font-weight: bold;">'.$reqdate.'</label></label><br>
                        <label class="Pon f-18">Supplier:&nbsp;<lable style="font-weight: bold;">'.$ve.'</label></label><br>

                    </div>
                  
                   <div class="col-md-6 f-right t-r" >
                        <h4><b>Swagkicks</b></h4>
                      <label class="f-18">B-165, Block D,<br>North Nazimabad,<br> Karachi</label>
                  </div>
              </div>
                        
                    
                    <table class="table table-striped">
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
                    
                        $output .= '
                        <br>
                        <br>
                                       <tbody class="text-center">
                                        <tr>
                                          <td>'.$count++.'</td>
                                          <td>'.$row["Item"].'</td>
                                          <td>'.$row["Description"].'</td>
                                           <td>'.$row["Quantity"].'</td>
                                          <td>'.$row["Unit_Price"].'</td>
                                          <td name="tot[]" id="tot[]"></td>
                                          <td style="display:none;"><input type="hidden" name="unit[]" value="'.$row['Unit_Price'].'" id="tot[]" /></td>
                                          <td style="display:none;"><input type="hidden" name="quan[]" value="'.$row['Quantity'].'" id="tot[]" /></td>
                                          
                                                                        
                                     </tr>
                                        </tbody>
                                                    '
                                        
                                        
                                        
                                        ;
                    }


        $output .= '
        </table>
        
        <br><br>
       
         <div class="f-right">
            <button class="btn btn-square btn-light disabled" >Order Total:&nbsp;<label id="printo" style="font-size: 18px;font-weight: bolder;" >0</label></button>
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
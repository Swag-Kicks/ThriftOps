<?php
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);


if(isset($_POST["id"]))
{
    $id=$_POST["id"];

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
    
    if($row !="")
    {
                //logs approved fetch
                $sql6= "SELECT * FROM Logs WHERE Type='PR' AND Type_ID='$id' And Status='Approved' order by id DESC LIMIT 1";
                $result6 = mysqli_query($mysql, $sql6);
                $row6 = mysqli_fetch_assoc($result6);
                $userid1=$row6['User_ID'];
                // echo $userid1;
                //user name fetch
                $sql7 = "SELECT * FROM User WHERE User_ID='$userid1'";
                $result7 = mysqli_query($mysql, $sql7);
                $row7 = mysqli_fetch_assoc($result7);
                $name1=$row7['Name'];
                // echo $name1;
                
                $status=$row['Status'];
                
                if($status=='Approved')
                {
                    $show='<h5>Approved by:</h5><br><h5>'.$name1.'</h5>';
                }
                else if($status=='Pending')
                {
                    $show='<h5>Approved by:</h5><h5><b>Pending Approval</b></h5>';
                }
                else
                {
                    $show='<h5>Eact Status:</h5><h5><b>'.$status.'</b></h5>';
                }
                 $output = '  
                 
                 <div class="row"  style=" margin-top:30px;margin-bottom:30px;">
                        <div class="col-md-3 ">
                            <label class="Pon">Requisition No.&nbsp;<lable id="pp1" style="font-weight: bold;">'.$id.'</label></label>
                            <label>Request Date:&nbsp;<lable id="pp1" style="font-weight: bold;">'.$reqdate.'</label></label>
                            <label>Requester:&nbsp;<lable id="pp1" style="font-weight: bold;">'.$name.'</label></label>
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
                        $output .= '
                                       <tbody class="text-center">
                                        <tr>
                                          <td>'.$count++.'</td>
                                          <td>'.$row1["Item"].'</td>
                                          <td>'.$row1["Description"].'</td>
                                           <td>'.$row1["Quantity"].'</td>
                                          <td>'.$row1["Est_Price"].'</td>
                                          <td name="tot[]" id="tot[]"></td>
                                          <td style="display:none;"><input type="hidden" name="unit[]" value="'.$row1['Est_Price'].'" id="unit[]" /></td>
                                          <td style="display:none;"><input type="hidden" name="quan[]" value="'.$row1['Quantity'].'" id="quan[]" /></td>
                                          <td style="display:none;"><input type="hidden" name="tax" value="'.$Tax.'" id="tax" /></td>
                                        </tr>
                                        </tbody>';
                    }


        $output .= '
        </table>
       
         <div class="totals mt-4 row">
            <span class="" >Sub Total:&nbsp;<label id="printo" style="font-size: 18px;font-weight: bolder;" >0</label></span>
            <span class="" >Tax('.$Tax.'%):&nbsp;<label id="prtax" style="font-size: 18px;font-weight: bolder;" >0</label></span>
            <span class="" >Order Total:&nbsp;<label id="pr1tot" style="font-size: 18px;font-weight: bolder;" >0</label></span>
            </div>
        
            </div>
        <div class="">
            <div class="row">
             <div class="col-md-4">
             '.$show.'
              
          </div>
          <div class="col-md-4 ">
          </div>
        
        ';
        
        echo $output;
        
    }
    else
    {
        echo "0";
    }
    
}
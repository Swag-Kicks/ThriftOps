<?php
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);


if(isset($_POST["grn"]))
{
    $id=$_POST["grn"];

    $count=1;
   
    $sql1 = "SELECT * from GRN WHERE GRN_ID='$id'";
    $result1 = mysqli_query($mysql, $sql1);
    $row = mysqli_fetch_assoc($result1);
    $po=$row['PO_ID'];
    
    //item required
    $sql2 = "SELECT * from Items WHERE GRN_ID='$id'";
    $result2 = mysqli_query($mysql, $sql2);
    
    
    //po
    $sql3 = "SELECT * from PO WHERE PO_ID='$po'";
    $result3 = mysqli_query($mysql, $sql3);
    $ro1 = mysqli_fetch_assoc($result3);
    $ven=$ro1['Vendor_ID'];
    
    //vendor
    $sql4 = "SELECT * from Vendor WHERE Vendor_ID='$ven'";
    $result4 = mysqli_query($mysql, $sql4);
    $ro2 = mysqli_fetch_assoc($result4);
    $name=$ro2['Name'];
    $st=$ro2['SK_Prefix'];
    
    $scheck1 = "SELECT * FROM SKU order by Batch_ID desc limit 1";
    $resa1 = mysqli_query($mysql, $scheck1);
    $rw11 = mysqli_fetch_assoc($resa1); 
    $batch = $rw11['Batch_ID'];
    
    if($batch=="")
    {
        $bacthid=1;
    }
    else
    {
        $bacthid=(int)$batch+1;
    }
   
    if($row !="")
    {
        
            $output = ' 
                        <div class="row">
                        <div class="col-md-2 ">
                            <label>Batch ID:</label>
                            
                        </div>
                        <div class="col-md-3">
                         <label>'.$bacthid.'</label>
                        </div>
                        <div class="col-md-7">
                        
                        </div>
                        </div>
                       
                        <div class="row">
                        <div class="col-md-2 ">
                            <label>Vendor:</label>
                            
                        </div>
                        <div class="col-md-3">
                         <label>'.$name.'</label>
                        </div>
                        </div>
                        <br><br>
                    <table class="table table-hover cmodaltable">
                      <thead>
                      <tr class="text-center">
                            <th scope="col">Sno</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Category</th>
                            <th scope="col">SKU Format</th>
                       </tr>
                      </thead>
                    ';

                    while($row = mysqli_fetch_array($result2))
                    {
                        //po
                        $format = "SELECT SKU_Format from Category WHERE Name='".$row["Item"]."'";
                        $res03 = mysqli_query($mysql, $format);
                        $roq1 = mysqli_fetch_assoc($res03);
                        $sk=$roq1['SKU_Format'];
                        
                        $output .= '
                        
                                       <tbody>
                                        <tr class="text-center">
                                          <td>'.$count++.'</td>
                                          <td>'.$row["Item"].'</td>
                                          <td>'.$row["Description"].'</td>
                                          <td>'.$row["Recieved_Quantity"].'</td>
                                          <td>'.$row["Item"].'</td>
                                          <td class="none"><input type="hidden" name="ven" value="'.$ven.'" id="ven"></td>
                                          <td class="none"><input type="hidden" name="it_quantity[]" value="'.$row["Recieved_Quantity"].'" id="it_quantity[]"></td>
                                          <td class="none"><input type="hidden" name="Cat[]" value="'.$row["Item"].'" id="Cat[]"></td>
                                          <td>'.$st."-".$sk.'</td>
                                          <td><input type="hidden" class="form-control text-center" value="'.$bacthid.'" id="batch" readonly></td>';
                                          
                    }
     $output .= '   
      </tr>
      </tbody>
          </table>';
          
        echo $output;
        
    }
    else
    {
        echo "0";
    }
    
}

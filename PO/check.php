<?php
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);


if(isset($_POST["pr"]))
{
    $id=$_POST["pr"];
    
    $count=1;
   
    $sql1 = "SELECT * from PR WHERE PR_ID='$id' AND Status='Approved'";
    $result1 = mysqli_query($mysql, $sql1);
    $row = mysqli_fetch_assoc($result1);
    
    
    //item required
    $sql2 = "SELECT * from Items WHERE PR_ID='$id'";
    $result2 = mysqli_query($mysql, $sql2);
    
   
    if($row !="")
    {
        
            $sql5 = "SELECT * FROM Tax WHERE Tax_Type='Procurement'";
            $result5 = mysqli_query($mysql, $sql5);
            $row5 = mysqli_fetch_assoc($result5);
            $Tax=$row5['Tax'];          
            $output = '         
                    <table class="table table-hover">
                      <thead>
                      <tr>
                            <td scope="col">#</td>
                            <td scope="col">Item Name</td>
                            <td scope="col">Quantity</td>
                            <td scope="col">Description</td>
                            <td scope="col">Price</td>
                            <td scope="col">Total</td>
                            
                            
                       </tr>
                      </thead>
                    ';

                    while($row = mysqli_fetch_array($result2))
                    {
                    
                        $output .= '
                        <br>
                        <br>
                                       <tbody>
                                        <tr>
                                          <td>'.$count++.'</td>
                                          <td>'.$row["Item"].'</td>
                                          <td>'.$row["Quantity"].'</td>
                                          <td>'.$row["Description"].'</td>
                                          <td><input type="text" class="form-control" name="item_price[]" onkeyup="pototal()" placeholder="'."Est.Price ".$row["Est_Price"].'" id="item_price[]"></td>
                                          <td><input type="text" class="form-control" name="tot_po[]" id="tot_po[]" readonly></td>
                                          <td class="none"><input type="hidden" name="it_quantity[]" value="'.$row["Quantity"].'" id="it_quantity[]"></td>
                                          <td class="none"><input type="hidden" name="item_id[]" value="'.$row["id"].'" id="item_id[]"></td>
                                          <td class="none"><input type="hidden" name="pr" value="'.$row["PR_ID"].'" id="pr"></td>
                                          <td style="display:none;"><input type="hidden" name="prtax" value="'.$Tax.'" id="prtax" /></td>
                                                                        
                                     </tr>
                                        </tbody>'
                                        ;
                    }


        $output .= '
        </table>
        
        <br><br>
       
        
        ';
        
        echo $output;
        
    }
    else
    {
        echo "0";
    }
    
}


<?php
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);
if(isset($_POST["id"]))
{
    $id=$_POST["id"];
    $count=1;
    $sql1 = "SELECT * FROM `PO` WHERE PO_ID='$id'";
    $result1 = mysqli_query($mysql, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $ma=$row1['PR_ID'];
     if($ma !="")
    {
    //item required
 
        $sql2 = "SELECT * from Items WHERE PR_ID='$ma'";
        $result2 = mysqli_query($mysql, $sql2);
        
        

            $output = '
            <div class="row">
              <div class="col-md-6 ">
                  <label class="f-16"><b>Delivered By</b>:</label>
              </div>
                <div class="col-md-6 f-right t-r">
                  <label class="Pon">
                      Purchase Request No.&nbsp;
                      <lable id="prid" style="font-weight: bold;">
                      '.$ma.'
                  </label>
                  </label><br>
                  <label class="Pon">
                      Purchase Order No.&nbsp;
                      <lable id="pp" style="font-weight: bold;">
                      '.$id.'
                  </label>
                  </label>
                </div>
            </div>
            <div class="form-group">
            <div class="mb-3 row">
              <label class="col-md-2">Name*</label>
              <div class="col-md-3">
                  <input class="form-control" type="text" name="delivered" id="delivered" required>
              </div>
              <div class="col-md-4"></div>
              <div class="col-md-3"></div>
            </div>
            <div class="mb-3 row">
              <label class="col-md-2">Contact*</label>
              <div class="col-md-3">
                  <input class="form-control" type="text" name="contact" id="contact" required>
              </div>
              <div class="col-md-4"></div>
              <div class="col-md-3"></div>
            </div>
            <table class="table table-hover ">
              <thead>
                  <tr>
                     <th scope="col">Sno</th>
                     <th scope="col">Item Name</th>
                     <th scope="col">Description</th>
                     <th scope="col">PO Quantity</th>
                     <th scope="col">Received Quantity</th>
                     <th scope="col">Rejected Quantity</th>
                     <th scope="col">Accepted Quantity</th>
                     <th scope="col">Unit Price</th>
                     <th scope="col">Total Value</th>
                  </tr>
              </thead>
              ';
              while($row = mysqli_fetch_array($result2))
              {
                  $ite=$row['Item'];
                    //valid
                    $sql12 = "SELECT Quantity,SUM(Accepted_Quantity) as acc from Items WHERE PR_ID='$ma' and Item='$ite'";
                    $result12 = mysqli_query($mysql, $sql12);
                    $row2 = mysqli_fetch_assoc($result12);
                    $Quantity=(int)$row2["Quantity"];
                    $Accept=(int)$row2["acc"];
                    
                    if($Quantity==$Accept)
                    {
                        // echo "2";
                    }
                    else
                    {
                        $left=$Quantity-$Accept;
                    }
              $output .= '
                      <tbody>
                          <tr>
                             <td>'.$count++.'</td>
                             <td>'.$row["Item"].'</td>
                             <td>'.$row["Description"].'</td>
                             <td>'.$left.'</td>
                             <td><input type="number" class="form-control" name="rec_quan[]" id="rec_quan[]" onkeyup="getID()" onchange="getID()" onclick="getID()" min="1" required /></td>
                             <td><input type="number" class="form-control" name="rej_quan[]" id="rej_quan[]" onkeyup="getID()" onchange="getID()" onclick="getID()" min="0" required/></td>
                             <td><input type="text" class="form-control" name="acc_quan[]" id="acc_quan[]" min="1" readonly></td>
                             <td><input type="text" class="form-control" name="unit_price[]" id="unit_price[]" value="'.$row["Unit_Price"].'" onkeyup="getID()" onclick="getID()" onchange="getID()" required></td>
                             <td><input type="text" class="form-control" name="tot_price[]" id="tot_price[]" readonly></td>
                             <td><input type="hidden" name="item_id[]" value="'.$row["id"].'" id="item_id[]"></td>
                          </tr>
                      </tbody>
                      '
                      ;
                 }
                  $output .= '
                            </table>
                            <br>
                                ';
                echo $output;
        
    }
    else
    {
        echo "0";
    }
}
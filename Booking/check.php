<?php
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);
if(isset($_POST["id"]))
{
    $id=$_POST["id"];
    $count=1;
    $sql1 = "SELECT *,GROUP_CONCAT(SKU) as con FROM `Order` WHERE Order_ID='$id' GROUP BY Order_Number";
    $result1 = mysqli_query($mysql, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    
    $ord_num=$row1['Order_Number'];
    $cus_name=$row1['Name'];
    $cus_contact=$row1['Contact'];
    $cus_add=$row1['Address'];
    $price=$row1['Total'];
    $items=$row1['con'];
    $cus_city=$row1['City'];
    if($row1 !="")
    {
        $output = '<div class="col-sm-12 row p-4">
                                             <div class="mb-3 col-sm-6">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Customer Name</label>
                                                <input class="form-control" type="text" name="bTitle" id="cusname" aria-describedby="emailHelp" value="'.$cus_name.'">
                                             </div>
                                              <div class="mb-3 col-sm-6">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Order Reference Number</label>
                                                <input class="form-control" type="text" name="bName" id="ordnum" aria-describedby="emailHelp" value="'.$ord_num.'">
                                             </div>
                                  <div class="mb-3 col-sm-6">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Customer Phone</label>
                                                <input class="form-control" type="text" name="bTitle" id="cuscontact" aria-describedby="emailHelp" value="'.$cus_contact.'">
                                             </div>
                                              <div class="mb-3 col-sm-6">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Invoice Payment</label>
                                                <input class="form-control" type="text" name="bName" id="total" aria-describedby="emailHelp" value="'.$price.'" readonly>
                                             </div>            
                            <div class="mb-3 col-sm-6">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">City</label>
                                                <input class="form-control" type="text" name="bTitle" id="cuscity" aria-describedby="emailHelp" value="'.$cus_city.'">
                                             </div>
                                              <div class="mb-3 col-sm-6">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Weight</label>
                                                <input class="form-control" type="text" name="bName" id="weight" aria-describedby="emailHelp" placeholder="Enter Weight">
                                             </div>
                                              <div class="mb-3 col-sm-12">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">SKUs</label>
                                                <input class="form-control" type="text" name="conitems" id="conitems" aria-describedby="emailHelp" value="'.$items.'">
                                             </div>
                                             
                                             <div class="mb-3 col-sm-6">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Courier City</label>
                                                <select class="form-control" id="couriercity">
                                                </select>
                                             </div>
                                              <div class="mb-3 col-sm-12">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Address</label>
                                                <input class="form-control" type="text" name="bName" id="cusaddress" aria-describedby="emailHelp" value="'.$cus_add.'">
                                             </div>
                                              <div class="mb-3 col-sm-12">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Dispatch Advise</label>
                                                <input class="form-control" type="text" name="bName" id="advise" aria-describedby="emailHelp" placeholder="Enter Dispatch Advise">
                                             </div>
                         
                       </div>';
        echo $output;
    }
    else
    {
        echo "0";
    }
}
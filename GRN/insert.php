<?php
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);


if(!empty($_POST["po"]) && !empty($_POST["delivery"]) && !empty($_POST["contact"]) && !empty(array_filter($_POST["itemid"])) && !empty(array_filter($_POST["rec"],'is_numeric')) && !empty(array_filter($_POST["u_price"], 'is_numeric')) && !empty(array_filter($_POST["t_price"], 'is_numeric')) && !empty(array_filter($_POST["rej"], 'is_numeric')) && !empty(array_filter($_POST["acc"], 'is_numeric')))
{
    $Req_Date=date('Y-m-d');
    $delivered=$_POST["delivery"];
    $PO_ID=$_POST["po"];
    $contact=$_POST["contact"];
    $User_ID=$_SESSION['id'];
    $Datetime=date('Y-m-d/h:i:a');
    
    // //check
    // $sql2 = "SELECT * from GRN WHERE PO_ID='$PO_ID'";
    // $result2 = mysqli_query($mysql, $sql2);
    // $row1 = mysqli_fetch_assoc($result2);
    // $chck=$row1["PO_ID"];
   
    // if($chck=="")
    // {
     
      $sql1 = "SELECT * FROM GRN order by GRN_ID desc limit 1";
      $result1 = mysqli_query($mysql, $sql1);
      $row =mysqli_fetch_array($result1);
       
      $last_id=$row['GRN_ID'];
      //echo $last_id;
        if ($last_id == " ") 
        {
            $GRN_ID = "1";
        }
        else
        {
            $GRN_ID = substr($last_id,0);
            $GRN_ID = intval($GRN_ID);
            $GRN_ID = $GRN_ID+1;
        }

    
        if(isset($_POST["contact"]) && isset($_POST["delivery"]))
        {
            $sql = "INSERT INTO GRN (GRN_ID,PO_ID,Date,Delivered_By,Delivered_Contact) VALUES ('$GRN_ID', '$PO_ID', '$Req_Date', '$delivered', '$contact')";
            $result = mysqli_query($mysql, $sql);
        
            $log = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$User_ID', 'GRN', '$GRN_ID', 'Created', '$Datetime')";
            $lgresult = mysqli_query($mysql, $log);
        

            for ($i=0; $i < count($_POST['rec']); $i++) 
            { 
                $itid=$_POST["itemid"][$i];
                $rec=$_POST["rec"][$i];
                $u_price=$_POST["u_price"][$i];
                $t_price=$_POST["t_price"][$i];
                $rej=$_POST["rej"][$i];
                $acc=$_POST["acc"][$i];
                
                  
    
                $insert ="UPDATE Items SET Unit_Price='$u_price',GRN_ID='$GRN_ID',Recieved_Quantity='$rec',Rejected_Quantity='$rej',Accepted_Quantity='$acc',Total_Price='$t_price' WHERE id='$itid'";
                $que = mysqli_query($mysql, $insert);
                
                $log1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$User_ID', 'Items', '$itid', 'Update', '$Datetime')";
                $lgresult1 = mysqli_query($mysql, $log1);
            }
            echo "1";
        }

    
        // if(isset($que))
        // {
        //     $sqw = "UPDATE PO SET Created='True' Where PO_ID='$PO_ID'";
        //     $ret1 = mysqli_query($mysql, $sqw);
        //     echo "1";
        // }
    // }
    // else
    // {
    //     echo "2";
    // }
}
// else
// {
//     echo "0";
// }
?>
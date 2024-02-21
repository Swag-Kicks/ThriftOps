<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['id'];


if(isset($_POST["tracking"]))
{
    $track=$_POST['tracking'];
    //   $tracking='KI195563414';
    if( strpos($track, ',') !== false ) 
    {
         $tracking=preg_replace('/^([^,]*).*$/', '$1', $track);
    }
    else
    {
        $tracking=$track;
    }
    
    $records2 = "SELECT * FROM `Order` WHERE Tracking='$tracking' and Status='Packed' AND Picked_by='' GROUP BY Status,Order_Number"; 
    $result = mysqli_query($mysql, $records2);
    $row = mysqli_fetch_array($result);
    $id=$row['Order_ID'];
    $num=$row['Order_Number'];
    if(!empty($id))
    {
       
        $courier=$row['Courier'];
        $ord=$row['Order_Number'];
        $total=$row['Total'];
        $date=$row['Date'];
        $qty = mysqli_num_rows(mysqli_query($mysql, "SELECT * FROM `Order` Where Order_ID='$id'"));
      
        // $html .= "<tr>";
        $html .= "<td>" . $ord . "</td>";
        $html .= "<td>" . $courier . "</td>";
        $html .= "<td>" . $tracking . "</td>";
        $html .= "<td>" . $qty . "</td>";
        $html .= "<td>" . $total . "</td>";
        $html .= "<td>" . $date . "</td>";
        $html .= " <td style='display:none;'><input type='hidden'  name='order[]' value='$id'/></td>";
        $html .= " <td style='display:none;'><input type='hidden'  name='ord[]' value='$num'/></td>";
        $html .= "</tr>";
        
        $update1 = mysqli_query($mysql, "Update `Order` Set Picked_by='Insert' WHERE Tracking='$tracking'");
        if($update1)
        {
            echo $html;
        }
        
        
    }
    if(empty($id))
    {
        $records3 = "SELECT * FROM `Order` WHERE Tracking='$tracking' and Status='Packed' and Picked_by='Insert' GROUP BY Status,Order_Number"; 
        $result3 = mysqli_query($mysql, $records3);
        $row3 = mysqli_fetch_array($result3);
        $id11=$row3['Order_ID'];
        if(!empty($id11))
        {
            echo "3";
        }
        else
        {
            $result3sa2 = mysqli_query($mysql, "SELECT * FROM `Order` WHERE Tracking='$tracking' and Status='Dispatched' and Status NOT in('Booked','Cancel','Picked','Rebooked','Returned','Recieved','Reattempt','QC_Rejected','Packed','Hold','Delivered','CReturned','Confirmed') and Picked_by='Insert' GROUP BY Status,Order_Number");
            $row3as2 = mysqli_fetch_array($result3sa2);
            $id3=$row3as2['Order_ID'];
            if(!empty($id3))
            {
                echo "4";
            }
            else
            {
                $records32 = "SELECT * FROM `Order` WHERE Status='Cancel' GROUP BY Status,Order_Number"; 
                $result32 = mysqli_query($mysql, $records32);
                $row32 = mysqli_fetch_array($result32);
                $id1=$row32['Order_ID'];
                if(empty($id1))
                {
                    echo "2";
                }
                else
                {
                     echo "1";
                }
                
            }
        }
       
    }
    // else 
    // {
        
    //     echo "1";
    //     // $records32 = "SELECT * FROM `Order` WHERE Tracking='$tracking' and Status='Cancel' GROUP BY Status,Order_Number"; 
    //     // $result32 = mysqli_query($mysql, $records32);
    //     // $row32 = mysqli_fetch_array($result32);
    //     // $id1=$row32['Order_ID'];
    //     // if(empty($id1))
    //     // {
    //     //     echo "2";
    //     // }
    //     // else
    //     // {
            
            
    //     // }
    // }
    
}



?>
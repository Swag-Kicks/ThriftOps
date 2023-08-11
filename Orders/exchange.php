<?php 

session_start();
include_once("../include/mysql_connection.php");
date_default_timezone_set("Asia/Karachi");
$C_Date = date('Y-m-d/h:i:a');

$cr=$_SESSION['Username'];
if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
{
    $pr="Select * from Users Where Dept_ID=2 AND Username='$cr' OR Dept_ID=3 AND Username='$cr'";
    $resu2 = mysqli_query($mysql, $pr);
    $rowq1 =mysqli_fetch_array($resu2);
    $dept=$rowq1['Dept_ID'];
    //echo $dept;
    if($dept=='')
    {
        echo '<script>alert("Your Are Not Authorized !");window.location.href="../Dashboard/Home.php";</script>';
    }    
}
else 
{
   
    echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';

}

$ID=$_POST["id1"];
$status="Exchanged";
$user=$_SESSION['Username'];



if(isset($_POST['conf_tag']))
{

    $pr=$_POST['conf_tag'];
    $insert ="UPDATE orders SET Status='$status',Updated_By='$user',Updated_By_Time='$C_Date' WHERE order_id='$ID'";  
    $que = mysqli_query($mysql, $insert);
    
    $insert1 ="UPDATE returns SET Status='$status',Reason='$pr',Marked_By='$user',Marked_By_Date='$C_Date' WHERE order_id='$ID'";  
    $que1 = mysqli_query($mysql, $insert1);

    if (!$que) 
    {
        return 'Status Not Updated';
    }
    else
    {
        return 'Status Updated';
    }
    
    
}


?>
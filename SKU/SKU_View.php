<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
include_once("../include/barcode128.php");
error_reporting(0);
$cr=$_SESSION['Username'];
if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
{
    $pr="Select * from Users Where Dept_ID=5 AND Username='$cr' OR Dept_ID=3 AND Username='$cr'";
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


/*if (isset($_POST['submit'])) {
    $input= $_POST['input'];
    $sql = "SELECT * FROM sku WHERE DateTime='$input'";
    $result = mysqli_query($mysql, $sql);
    
}
else{
    $sql = "SELECT * FROM sku";
    $result = mysqli_query($mysql, $sql);
}*/

$date=$_REQUEST['var1'];
$sq1 = "SELECT * FROM sku Where DateTime='$date' order by SKU ASC";
$result = mysqli_query($mysql, $sq1);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" class="View">
    <?php
        if (mysqli_num_rows($result) > 0) {
        ?>
        <?php
        $i=0;
        while($row = mysqli_fetch_array($result)) {
        ?>
        <?php
                                      
                                            
        //$SKU=$row["SKU"]; 
        $bar=bar128(stripcslashes($row["SKU"])); 
        echo ($bar);
        echo "<p style='page-break-after: always;'></p>"
        ?>
        <?php
        $i++;
        }   
        ?>
        <?php
        }
        else{
            echo "No result found";
            }   
        ?>
    </form>
    
</body>
</html>
                
		        
        
                        
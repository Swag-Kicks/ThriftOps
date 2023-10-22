

<?php

include_once("../includes/Rdb.php"); 



 $json = file_get_contents('php://input');
 
 
 $obj = json_decode($json,true);
 


$uname = $obj['username'];
 $upass =$obj['password'];
 

 $pass=md5($upass);


  
  $sql = "SELECT * FROM Users WHERE Username='$uname' AND Password='$pass'";
  $result = mysqli_query($mysql, $sql);

  $row=mysqli_fetch_array($result);
  $name=$row['Username'];
  $counter=mysqli_num_rows ($result);
  $id=$row['User_ID'];
  $msg = "Invalid USER";
  if ($counter == 0) 
  {
    echo json_encode($msg);

  }
  else
  {
   
    echo json_encode($name);
  }


?>
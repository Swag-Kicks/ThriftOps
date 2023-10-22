<?php
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);

   

if(!empty(array_filter($_POST["item"])) && !empty(array_filter($_POST["estprice"])) && !empty(array_filter($_POST["quantity"])) && !empty(array_filter($_POST["desc"])) && !empty($_POST["user"]) && !empty($_POST["req"]) && !empty($_POST["need"]))
{

    
  $sql1 = "SELECT * FROM PR order by PR_ID desc limit 1";
  $result1 = mysqli_query($mysql, $sql1);
  $row =mysqli_fetch_array($result1);
  
    $User_ID=$_POST["user"];
    $sql3 = "SELECT Department.Name as dname , User.Name as uname from User INNER JOIN Department on User.Dept_ID = Department.Dept_ID WHERE User_ID  = $User_ID";
  $result3 = mysqli_query($mysql, $sql3);
  $row3 =mysqli_fetch_array($result3);
  

  $Depart= $row3['dname'];
  $Uname = $row3['uname'];
  
  
   
  $last_id=$row['PR_ID'];
  if ($last_id == " ") 
  {
      $PR_ID = "1";
  }
  else
  {
      $PR_ID = substr($last_id,0);
      $PR_ID = intval($PR_ID);
      $PR_ID = $PR_ID+1;
  }
    
    $Datetime=date('Y-m-d/h:i:a');
    $PR_Req_Date=date('Y-m-d', strtotime($_POST["req"]));
    $User_ID=$_POST["user"];
    $PR_Date_Need= date('Y-m-d', strtotime($_POST["need"]));

    $sql = "INSERT INTO PR (PR_ID,Required_Date,Type,Status,Created) VALUES ('$PR_ID', '$PR_Req_Date', 'A', 'Pending', 'False')";
    $result = mysqli_query($mysql, $sql);
      
    $sql2= "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$User_ID', 'PR', '$PR_ID', 'Pending', '$Datetime')";
    $result1 = mysqli_query($mysql, $sql2);
   
   
      for ($i=0; $i < count($_POST['item']); $i++) { 
    
          $s_id=$_POST["item"][$i];
          $s_quan=$_POST["quantity"][$i];
          $s_des=$_POST["desc"][$i];
          $s_est=$_POST["estprice"][$i];
   
   
          $insert ="INSERT INTO Items (PR_ID,Item,Quantity,Description,Est_Price) VALUES ('$PR_ID', '$s_id', '$s_quan', '$s_des','$s_est')";
          $que = mysqli_query($mysql, $insert);
      }

 
    if(!empty($que))
    {
        echo $PR_ID;
        
        
        
        //MAILER API'S
        
        
        $postData = [ "pid" => $PR_ID,
    "user" => $Uname,
    "depart" => $Depart,
    "date" => "$PR_Date_Need",
    
];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://node.thriftops.com/createPR',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => json_encode($postData),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;
        

        
    }
}
else
{
    echo "0";
}
?>
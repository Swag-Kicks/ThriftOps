<?php

session_start();
include_once("../include/mysql_connection.php"); 


require_once ('../vendor/autoload.php');

$mpdf = new \Mpdf\Mpdf();


$sql = 'SELECT * FROM `Order` WHERE Status="Packed" AND Status NOT in ("Booked","Recieved","Dispatched","Confirmed","Hold","Wfr","Cancel","Picked") AND Courier LIKE "%Leopard%" GROUP BY Order_ID DESC LIMIT 0, 10';
$result = mysqli_query($mysql, $sql);
$app;
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{
    //$data[]=array($row['Order_Number'],$row['Tracking'],$row['SKU'],$row['Price'],$row['Total'],$row['Date']);
    // $data[] = $row;
    $app.="<tr>";
     $app.="<td>".$row['Order_Number']."</td>";
      $app.="<td>".$row['Tracking']."</td>";
       $app.="<td>".$row['SKU']."</td>";
        $app.="<td>".$row['Total']."</td>";
        $app.="<td>".$row['Date']."</td>";
     $app.="</tr>";
    
}
// echo $app;
      $content .= '  
      <h3 align="center">Export HTML Table data to PDF using TCPDF in PHP</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5" style="width:100%">  
          <tr>  
                <th width="5%">ID</th>  
                <th width="30%">Name</th>  
                <th width="10%">Gender</th>  
                <th width="45%">Designation</th>  
                <th width="10%">Age</th>  
          </tr>  
      ';  
      $content .= $app;  
      $content .= '</table>';  
      //echo $content;
  $mpdf->WriteHTML($content);
  $mpdf->Output('filename.pdf', \Mpdf\Output\Destination::FILE);
    
?>
<?php
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['id'];
require_once("../vendor/autoload.php");
$C_Date = date('Y-m-d/h:i:a');
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

//aws token
$sql2="Select * from `API_Credentials` Where Platform='Aws'";
$sh = mysqli_query($mysql, $sql2);
$row1 = mysqli_fetch_assoc($sh);
// Replace with your AWS credentials
$aws_access_key = $row1['API_Key'];
$aws_secret_key = $row1['API_Pass'];
$bucket_name = 'thriftops';


// Create an S3 client
$s3 = new S3Client([
    'version'     => 'latest',
    'region'      => 'ap-south-1', // Change to your desired AWS region
    'credentials' => [
        'key'    => $aws_access_key,
        'secret' => $aws_secret_key,
    ],
]);

if(isset($_POST["orderid"]))
{
    $postex=[];
    $leopard=[];
    $trax=[];
    $self=[];
    $rider=[];
    $callcourier=[];
    $tcs=[];
    $dir="upload/";
    
    $C_Date = date('Y-m-d/h:i:a');

    foreach($_POST['orderid'] as $id)
    {
        $records2 = "SELECT *,GROUP_CONCAT(SKU) as Items FROM `Order` WHERE Order_ID='$id' GROUP BY Order_Number"; 
        $result = mysqli_query($mysql, $records2);
        $row = mysqli_fetch_array($result);  
        $courier=$row['Courier'];
        
        if($courier=='PostEx')
        {
            $postex[]=array($row['Order_Number'],$row['Tracking'],$row['Items'],$row['Total'],$row['Date']);
             $app.="<tr>";
             $app.="<td>".$row['Order_Number']."</td>";
              $app.="<td>".$row['Tracking']."</td>";
               $app.="<td>".$row['Items']."</td>";
                $app.="<td>".$row['Total']."</td>";
                $app.="<td>".$row['Date']."</td>";
             $app.="</tr>";
            $logs= mysqli_query($mysql, "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$id', 'Dispatched', '$C_Date')");
            $update = mysqli_query($mysql, "UPDATE `Order` SET Status = 'Dispatched' WHERE Order_ID='$id'"); 
        }
        if($courier=='Leopard')
        {
            $leopard[]=array($row['Order_Number'],$row['Tracking'],$row['Items'],$row['Total'],$row['Date']);
            $app1.="<tr>";
             $app1.="<td>".$row['Order_Number']."</td>";
              $app1.="<td>".$row['Tracking']."</td>";
               $app1.="<td>".$row['Items']."</td>";
                $app1.="<td>".$row['Total']."</td>";
                $app1.="<td>".$row['Date']."</td>";
             $app1.="</tr>";
             $logs= mysqli_query($mysql, "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$id', 'Dispatched', '$C_Date')");
            $update = mysqli_query($mysql, "UPDATE `Order` SET Status = 'Dispatched' WHERE Order_ID='$id'"); 
        }
        if($courier=='Self')
        {
            $self[]=array($row['Order_Number'],$row['Tracking'],$row['Items'],$row['Total'],$row['Date']);
            $app2.="<tr>";
             $app2.="<td>".$row['Order_Number']."</td>";
              $app2.="<td>".$row['Tracking']."</td>";
               $app2.="<td>".$row['Items']."</td>";
                $app2.="<td>".$row['Total']."</td>";
                $app2.="<td>".$row['Date']."</td>";
             $app2.="</tr>";
             $logs= mysqli_query($mysql, "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$id', 'Dispatched', '$C_Date')");
            $update = mysqli_query($mysql, "UPDATE `Order` SET Status = 'Dispatched' WHERE Order_ID='$id'"); 
        }
        if($courier=='Trax')
        {
            $trax[]=array($row['Order_Number'],$row['Tracking'],$row['Items'],$row['Total'],$row['Date']);
            $app3.="<tr>";
             $app3.="<td>".$row['Order_Number']."</td>";
              $app3.="<td>".$row['Tracking']."</td>";
               $app3.="<td>".$row['Items']."</td>";
                $app3.="<td>".$row['Total']."</td>";
                $app3.="<td>".$row['Date']."</td>";
             $app3.="</tr>";
             $logs= mysqli_query($mysql, "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$id', 'Dispatched', '$C_Date')");
            $update = mysqli_query($mysql, "UPDATE `Order` SET Status = 'Dispatched' WHERE Order_ID='$id'"); 
        }
        if($courier=='Rider')
        {
            $rider[]=array($row['Order_Number'],$row['Tracking'],$row['Items'],$row['Total'],$row['Date']);
            $app4.="<tr>";
             $app4.="<td>".$row['Order_Number']."</td>";
              $app4.="<td>".$row['Tracking']."</td>";
               $app4.="<td>".$row['Items']."</td>";
                $app4.="<td>".$row['Total']."</td>";
                $app4.="<td>".$row['Date']."</td>";
             $app4.="</tr>";
             $logs= mysqli_query($mysql, "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$id', 'Dispatched', '$C_Date')");
            $update = mysqli_query($mysql, "UPDATE `Order` SET Status = 'Dispatched' WHERE Order_ID='$id'"); 
        }
        if($courier=='CallCourier')
        {
            $callcourier[]=array($row['Order_Number'],$row['Tracking'],$row['Items'],$row['Total'],$row['Date']);
                $app5.="<tr>";
                 $app5.="<td>".$row['Order_Number']."</td>";
                  $app5.="<td>".$row['Tracking']."</td>";
                   $app5.="<td>".$row['Items']."</td>";
                    $app5.="<td>".$row['Total']."</td>";
                    $app5.="<td>".$row['Date']."</td>";
                 $app5.="</tr>";
                 $logs= mysqli_query($mysql, "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$id', 'Dispatched', '$C_Date')");
            $update = mysqli_query($mysql, "UPDATE `Order` SET Status = 'Dispatched' WHERE Order_ID='$id'"); 
    
        }
        // tcs added
        if($courier=='Tcs')
        {
            $tcs[]=array($row['Order_Number'],$row['Tracking'],$row['Items'],$row['Total'],$row['Date']);
                $app6.="<tr>";
                 $app6.="<td>".$row['Order_Number']."</td>";
                  $app6.="<td>".$row['Tracking']."</td>";
                   $app6.="<td>".$row['Items']."</td>";
                    $app6.="<td>".$row['Total']."</td>";
                    $app6.="<td>".$row['Date']."</td>";
                 $app6.="</tr>";
                 $logs= mysqli_query($mysql, "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Order','$id', 'Dispatched', '$C_Date')");
            $update = mysqli_query($mysql, "UPDATE `Order` SET Status = 'Dispatched' WHERE Order_ID='$id'"); 
    
        }
        
    }
    
    //pdf
    //postex
    $content .= '  
      <h3 align="center">Loadsheet (PostEX)</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5" style="width:100%">  
          <tr>  
                <th width="5%">Order Ref</th>  
                <th width="30%">Tracking</th>  
                <th width="10%">Items</th>  
                <th width="45%">Total</th>  
                <th width="10%">Date</th>  
          </tr>  
      ';  
      $content .= $app;  
      $content .= '</table>';  
    //leopard
     $content1 .= '  
      <h3 align="center">Loadsheet (Leopard)</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5" style="width:100%">  
          <tr>  
                <th width="5%">Order Ref</th>  
                <th width="30%">Tracking</th>  
                <th width="10%">Items</th>  
                <th width="45%">Total</th>  
                <th width="10%">Date</th>  
          </tr>  
      ';  
      $content1 .= $app1;  
      $content1 .= '</table>';  
      //self
     $content2 .= '  
      <h3 align="center">Loadsheet (Self)</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5" style="width:100%">  
          <tr>  
                <th width="5%">Order Ref</th>  
                <th width="30%">Tracking</th>  
                <th width="10%">Items</th>  
                <th width="45%">Total</th>  
                <th width="10%">Date</th>  
          </tr>  
      ';  
      $content2 .= $app2;  
      $content2 .= '</table>';  
      //trax
     $content3.= '  
      <h3 align="center">Loadsheet (Trax)</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5" style="width:100%">  
          <tr>  
                <th width="5%">Order Ref</th>  
                <th width="30%">Tracking</th>  
                <th width="10%">Items</th>  
                <th width="45%">Total</th>  
                <th width="10%">Date</th>  
          </tr>  
      ';  
      $content3 .= $app3;  
      $content3 .= '</table>';  
      //rider
     $content4 .= '  
      <h3 align="center">Loadsheet (Rider)</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5" style="width:100%">  
          <tr>  
                <th width="5%">Order Ref</th>  
                <th width="30%">Tracking</th>  
                <th width="10%">Items</th>  
                <th width="45%">Total</th>  
                <th width="10%">Date</th>  
          </tr>  
      ';  
      $content4 .= $app4;  
      $content4 .= '</table>';  
      //call courier
     $content5 .= '  
      <h3 align="center">Loadsheet (Call Courier)</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5" style="width:100%">  
          <tr>  
                <th width="5%">Order Ref</th>  
                <th width="30%">Tracking</th>  
                <th width="10%">Items</th>  
                <th width="45%">Total</th>  
                <th width="10%">Date</th>  
          </tr>  
      ';  
      $content5 .= $app5;  
      $content5 .= '</table>';  
      
    //tcs
     $content6 .= '  
      <h3 align="center">Loadsheet (TCS)</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5" style="width:100%">  
          <tr>  
                <th width="5%">Order Ref</th>  
                <th width="30%">Tracking</th>  
                <th width="10%">Items</th>  
                <th width="45%">Total</th>  
                <th width="10%">Date</th>  
          </tr>  
      ';  
      $content6 .= $app6;  
      $content6 .= '</table>';  
        
    
    
    $header=array('Order Ref', 'Tracking', 'SKU', 'Total', 'Date');
    //for csv 
    
    //postex
    
    if(!empty($postex))
    {
        $pfilename = $dir."Postex_".date('Y-m-d h:i:a').".csv";
        $pfile = fopen($pfilename, 'w');
        fputcsv($pfile, $header);
        foreach ($postex as $row) 
        {
          fputcsv($pfile, $row);
        }
        fclose($pfile);
      
        //s3 postex csv 
        $watch = $s3->putObject([
            'Bucket' => $bucket_name,
            'Key' => 'loadsheet/' . basename($pfilename), // Modify the S3 key as needed
            'SourceFile' => $pfilename,
            'ContentType' => "text/csv", 
            'ACL' => 'public-read', 
        ]);
        
        if($watch)
        {
              $csvinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('CSV','PostEx','".$watch['ObjectURL']."','$C_Date')"); 
              unlink($pfilename);
        }
        
        //pdf
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($content);
        $pdfn=$dir."PostEx_".date('Y-m-d h:i:a').".pdf";
        $mpdf->Output($pdfn, \Mpdf\Output\Destination::FILE);
       
        
        //s3 postex pdf 
        $watch1 = $s3->putObject([
            'Bucket' => $bucket_name,
            'Key' => 'loadsheet/' . basename($pdfn), // Modify the S3 key as needed
            'SourceFile' => $pdfn,
            'ContentType' => "application/pdf", 
            'ACL' => 'public-read', 
        ]);
        
        if($watch1)
        {
            $pdfinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('PDF','PostEx','".$watch1['ObjectURL']."','$C_Date')"); 
            unlink($pdfn);
        }
    }
    
    
    //leopard
    if(!empty($leopard))
    {
        $lfilename = $dir."Leopard_".date('Y-m-d h:i:a').".csv";
        $lfile = fopen($lfilename, 'w');
        
        fputcsv($lfile, $header);
        foreach ($leopard as $row) 
        {
          fputcsv($lfile, $row);
        }
        fclose($lfile);
        
        //s3 leopard csv 
        $watch = $s3->putObject([
            'Bucket' => $bucket_name,
            'Key' => 'loadsheet/' . basename($lfilename), // Modify the S3 key as needed
            'SourceFile' => $lfilename,
            'ContentType' => "text/csv", 
            'ACL' => 'public-read', 
        ]);
        
        if($watch)
        {
              $csvinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('CSV','Leopard','".$watch['ObjectURL']."','$C_Date')"); 
              unlink($lfilename);
        }
        // $csvinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('CSV','Leopard','$lfilename','$C_Date')"); 
        //pdf
        $mpdf1 = new \Mpdf\Mpdf();
        $mpdf1->WriteHTML($content1);
        $pdfn=$dir."Leopard_".date('Y-m-d h:i:a').".pdf";
        $mpdf1->Output($pdfn, \Mpdf\Output\Destination::FILE);
        
        //s3 leopard pdf 
        $watch1 = $s3->putObject([
            'Bucket' => $bucket_name,
            'Key' => 'loadsheet/' . basename($pdfn), // Modify the S3 key as needed
            'SourceFile' => $pdfn,
            'ContentType' => "application/pdf", 
            'ACL' => 'public-read', 
        ]);
        
        if($watch1)
        {
            $pdfinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('PDF','Leopard','".$watch1['ObjectURL']."','$C_Date')"); 
            unlink($pdfn);
        }
        // $pdfinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('PDF','Leopard','$pdfn','$C_Date')"); 
    }
    
    
    
    //self
    if(!empty($self))
    {
        $sfilename = $dir."Self_".date('Y-m-d h:i:a').".csv";
        $sfile = fopen($sfilename, 'w');
        fputcsv($sfile, $header);
        foreach ($self as $row) 
        {
          fputcsv($sfile, $row);
        }
        fclose($sfile);
        
        //s3 self csv 
        $watch = $s3->putObject([
            'Bucket' => $bucket_name,
            'Key' => 'loadsheet/' . basename($sfilename), // Modify the S3 key as needed
            'SourceFile' => $sfilename,
            'ContentType' => "text/csv", 
            'ACL' => 'public-read', 
        ]);
        
        if($watch)
        {
              $csvinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('CSV','Self','".$watch['ObjectURL']."','$C_Date')"); 
              unlink($sfilename);
        }
        // $csvinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('CSV','Self','$sfilename','$C_Date')");
        
        //pdf
         $mpdf2 = new \Mpdf\Mpdf();
        $mpdf2->WriteHTML($content2);
        $pdfn=$dir."Self_".date('Y-m-d h:i:a').".pdf";
        $mpdf2->Output($pdfn, \Mpdf\Output\Destination::FILE);
        
        //s3 self pdf 
        $watch1 = $s3->putObject([
            'Bucket' => $bucket_name,
            'Key' => 'loadsheet/' . basename($pdfn), // Modify the S3 key as needed
            'SourceFile' => $pdfn,
            'ContentType' => "application/pdf", 
            'ACL' => 'public-read', 
        ]);
        
        if($watch1)
        {
            $pdfinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('PDF','Self','".$watch1['ObjectURL']."','$C_Date')"); 
            unlink($pdfn);
        }
        // $pdfinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('PDF','Self','$pdfn','$C_Date')"); 
    }
    
    
    
    //trax
    if(!empty($trax))
    {
        $tfilename = $dir."Trax_".date('Y-m-d h:i:a').".csv";
        $tfile = fopen($pfilename, 'w');
        fputcsv($tfile, $header);
        foreach ($trax as $row) 
        {
          fputcsv($tfile, $row);
        }
        fclose($tfile);
        
        //s3 trax csv 
        $watch = $s3->putObject([
            'Bucket' => $bucket_name,
            'Key' => 'loadsheet/' . basename($tfilename), // Modify the S3 key as needed
            'SourceFile' => $tfilename,
            'ContentType' => "text/csv", 
            'ACL' => 'public-read', 
        ]);
        
        if($watch)
        {
              $csvinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('CSV','Trax','".$watch['ObjectURL']."','$C_Date')"); 
              unlink($tfilename);
        }
        
        // $csvinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('CSV','Trax','$tfilename','$C_Date')");
        $mpdf3 = new \Mpdf\Mpdf();
        $mpdf3->WriteHTML($content3);
        $pdfn=$dir."Trax_".date('Y-m-d h:i:a').".pdf";
        $mpdf3->Output($pdfn, \Mpdf\Output\Destination::FILE);
        
        //s3 trax pdf 
        $watch1 = $s3->putObject([
            'Bucket' => $bucket_name,
            'Key' => 'loadsheet/' . basename($pdfn), // Modify the S3 key as needed
            'SourceFile' => $pdfn,
            'ContentType' => "application/pdf", 
            'ACL' => 'public-read', 
        ]);
        
        if($watch1)
        {
            $pdfinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('PDF','Trax','".$watch1['ObjectURL']."','$C_Date')"); 
            unlink($pdfn);
        }
        // $pdfinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('PDF','Trax','$pdfn','$C_Date')");
    }
    
    
    
    //rider
    if(!empty($rider))
    {
        $rfilename = $dir."Rider_".date('Y-m-d h:i:a').".csv";
        $rfile = fopen($rfilename, 'w');
        fputcsv($rfile, $header);
        foreach ($rider as $row) 
        {
          fputcsv($rfile, $row);
        }
        fclose($rfile);
        
        //s3 rider csv 
        $watch = $s3->putObject([
            'Bucket' => $bucket_name,
            'Key' => 'loadsheet/' . basename($rfilename), // Modify the S3 key as needed
            'SourceFile' => $rfilename,
            'ContentType' => "text/csv", 
            'ACL' => 'public-read', 
        ]);
        
        if($watch)
        {
              $csvinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('CSV','Rider','".$watch['ObjectURL']."','$C_Date')"); 
              unlink($rfilename);
        }
        // $csvinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('CSV','Rider','$rfilename','$C_Date')");
        //pdf
        $mpdf4 = new \Mpdf\Mpdf();
        $mpdf4->WriteHTML($content4);
        $pdfn=$dir."Rider_".date('Y-m-d h:i:a').".pdf";
        $mpdf4->Output($pdfn, \Mpdf\Output\Destination::FILE);
        
        //s3 rider pdf 
        $watch1 = $s3->putObject([
            'Bucket' => $bucket_name,
            'Key' => 'loadsheet/' . basename($pdfn), // Modify the S3 key as needed
            'SourceFile' => $pdfn,
            'ContentType' => "application/pdf", 
            'ACL' => 'public-read', 
        ]);
        
        if($watch1)
        {
            $pdfinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('PDF','Rider','".$watch1['ObjectURL']."','$C_Date')"); 
            unlink($pdfn);
        }
        // $pdfinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('PDF','Rider','$pdfn','$C_Date')");
    }
    
    
    //callcourier
    if(!empty($callcourier))
    {
        $cfilename = $dir."CallCourier_".date('Y-m-d h:i:a').".csv";
        $cfile = fopen($cfilename, 'w');
        fputcsv($cfile, $header);
        foreach ($callcourier as $row) 
        {
          fputcsv($cfile, $row);
        }
        fclose($cfile);
        
        //s3 call csv 
        $watch = $s3->putObject([
            'Bucket' => $bucket_name,
            'Key' => 'loadsheet/' . basename($cfilename), // Modify the S3 key as needed
            'SourceFile' => $cfilename,
            'ContentType' => "text/csv", 
            'ACL' => 'public-read', 
        ]);
        
        if($watch)
        {
              $csvinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('CSV','CallCourier','".$watch['ObjectURL']."','$C_Date')"); 
              unlink($cfilename);
        }
        // $csvinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('CSV','CallCourier','$cfilename','$C_Date')");
        //pdf
        $mpdf5 = new \Mpdf\Mpdf();
        $mpdf5->WriteHTML($content5);
        $pdfn=$dir."CallCourier_".date('Y-m-d h:i:a').".pdf";
        $mpdf5->Output($pdfn, \Mpdf\Output\Destination::FILE);
        
        //s3 call pdf 
        $watch1 = $s3->putObject([
            'Bucket' => $bucket_name,
            'Key' => 'loadsheet/' . basename($pdfn), // Modify the S3 key as needed
            'SourceFile' => $pdfn,
            'ContentType' => "application/pdf", 
            'ACL' => 'public-read', 
        ]);
        
        if($watch1)
        {
            $pdfinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('PDF','CallCourier','".$watch1['ObjectURL']."','$C_Date')"); 
            unlink($pdfn);
        }
        // $pdfinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('PDF','CallCourier','$pdfn','$C_Date')");
    }
    
     //TCS
    if(!empty($tcs))
    {
        $tcfilename = $dir."TCS_".date('Y-m-d h:i:a').".csv";
        $tcfile = fopen($tcfilename, 'w');
        fputcsv($tcfile, $header);
        foreach ($tcs as $row) 
        {
          fputcsv($tcfile, $row);
        }
        fclose($tcfile);
        
        //s3 tcs csv 
        $watch = $s3->putObject([
            'Bucket' => $bucket_name,
            'Key' => 'loadsheet/' . basename($tcfilename), // Modify the S3 key as needed
            'SourceFile' => $tcfilename,
            'ContentType' => "text/csv", 
            'ACL' => 'public-read', 
        ]);
        
        if($watch)
        {
              $csvinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('CSV','Tcs','".$watch['ObjectURL']."','$C_Date')"); 
              unlink($tcfilename);
        }
        
        // $csvinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('CSV','Tcs','$tfilename','$C_Date')");
        //pdf
        $mpdf6 = new \Mpdf\Mpdf();
        $mpdf6->WriteHTML($content6);
        $pdfn=$dir."TCS_".date('Y-m-d h:i:a').".pdf";
        $mpdf5->Output($pdfn, \Mpdf\Output\Destination::FILE);
        
        //s3 tcs pdf 
        $watch1 = $s3->putObject([
            'Bucket' => $bucket_name,
            'Key' => 'loadsheet/' . basename($pdfn), // Modify the S3 key as needed
            'SourceFile' => $pdfn,
            'ContentType' => "application/pdf", 
            'ACL' => 'public-read', 
        ]);
        
        if($watch1)
        {
            $pdfinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('PDF','Tcs','".$watch1['ObjectURL']."','$C_Date')"); 
            unlink($pdfn);
        }
        // $pdfinsert = mysqli_query($mysql, "INSERT INTO `LoadSheet`(`File`, `Courier`, `Path`, `DateTime`) VALUES('PDF','Tcs','$pdfn','$C_Date')");
    }
    
    echo "1";
    
}
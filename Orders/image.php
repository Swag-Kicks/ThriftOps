<?php


   session_start();
   include_once("../include/mysql_connection.php"); 
   error_reporting(0);
   $iq=1;
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
   
   $ID= $_GET['GETID'];
//     // RE order_id='$ID'";
//     // $result = mysqli_query($mysql, $sql);

//   while($row = mysqli_fetch_assoc($result)) 
//   {   
//       $Order_Num = $row['order_num'];
//       $invoice_total =$row['Total_Amount'];
//       $Customer_Name=$row['Customer_Name'];
//       $Customer_Phone=$row['Customer_Contact'];
//       $Customer_Address=$row['Customer_Address'];
//       $City=$row['Customer_City'];
//       $Date=$row['Date'];

//   }
   
   
   
?>
<?php include ("../include/header.php"); ?>
    <form method="POST" action="add.php?id=<?php echo $ID ?>">
        <div class="card-body">

    	</div>
    </form>
    	</div>
    	<br>
    	<div>
    		<table border="1">
    			<thead>
    			    <th>S.No</th>
    				<th>Items</th>
    				<th>Price</th>
    				<th>Image</th>
    			</thead>
    			<tbody>
    				<?php
    					$query=mysqli_query($mysql,"SELECT * FROM orders WHERE order_id='$ID'");
    					while($row=mysqli_fetch_array($query)){
    						?>
    						<tr>
    						    <td><?php echo $iq; ?></td>
    							<td><?php echo $row['Items']; ?></td>
    							<td><?php echo $row['Items_Price']; ?></td>
    							<td>
                                    <?php
                                       $sk=$row['Items'];
                                       $num = substr($row["Items"],0,5);
                                       $ss=substr($row["Items"],0,4);
                                       $w=substr($row["Items"],0,3);
                                       
                                       if(substr($row["Items"],0,4)=='WP-S' || substr($row["Items"],0,4)=='SK-S' || substr($row["Items"],0,4)=='wp-S' || substr($row["Items"],0,3)=='SK-' || substr($row["Items"],0,3)=='WP-')
                                       {
                                           $image = "SELECT * FROM shoes WHERE SKU='$sk'";
                                           //echo $sk;
                                           $res_img = mysqli_query($mysql, $image);
                                           $ro1 =mysqli_fetch_array($res_img);
                                           $pic=$ro1['Image_1'];
                                           $ind=$pic[0];
                                           //echo $ind;
                                           //print_r($pic);
                                           //echo "<img src = '".$ro1['Image_1']."' width='100' height='100' >";
                                              if(isset($pic))
                                              {
                                                    if (!is_numeric($ind))
                                                    {
                                                        //echo $pic;
                                                        echo "<img src = '$pic' width='100' height='100' >";
                                                    }
                                                    
                                                    else if(is_numeric($ind))
                                                    {
                                                        $pr='https://upload.thriftops.com/Shoes/uploads/'.$pic;
                                                         //echo $pr;
                                                         echo "<img src = '$pr' width='100' height='100' >";
                                                    }
       
                                              }
 
                                        }
                                         else if($num=='SK-TP')
                                         {
                                            $image = "SELECT * FROM TOPS WHERE SKU='$sk'";
                                            $res_img = mysqli_query($mysql, $image);
                                            $ro1 =mysqli_fetch_array($res_img);
                                            $pic=$ro1['Image_1'];
                                            $ind=$pic[0];
                                             
                                             
                                                if(isset($pic))
                                                {
                                                    if (!is_numeric($ind))
                                                    {
                                                        //echo $pic;
                                                        echo "<img src = '$pic' width='100' height='100' >";
                                                    }
                                                    
                                                    else if(is_numeric($ind))
                                                    {
                                                        $pr='https://upload.thriftops.com/Tops/uploads/'.$pic;
                                                         //echo $pr;
                                                         echo "<img src = '$pr' width='100' height='100' >";
                                                    }
                                                    
                                                    
                                                }
                                              
                                          }
                                          
                                          
                                          else if($ss=='SK-H')
                                           {
                                               $image = "SELECT * FROM Hoodies WHERE SKU='$sk'";
                                               $res_img = mysqli_query($mysql, $image);
                                               $ro1 =mysqli_fetch_array($res_img);
                                                $pic=$ro1['Image_1'];
                                                $ind=$pic[0];
                                             
                                             
                                                if(isset($pic))
                                                {
                                                    if (!is_numeric($ind))
                                                    {
                                                        //echo $pic;
                                                        echo "<img src = '$pic' width='100' height='100' >";
                                                    }
                                                    
                                                    else if(is_numeric($ind))
                                                    {
                                                        $pr='https://upload.thriftops.com/Hoddies/uploads/'.$pic;
                                                         //echo $pr;
                                                         echo "<img src = '$pr' width='100' height='100' >";
                                                    }
                                                    
                                                    
                                                }
                                              
                                               
                                           }
                                           else if($ss=='SK-C')
                                           {
                                               $image = "SELECT * FROM caps WHERE SKU='$sk'";
                                               $res_img = mysqli_query($mysql, $image);
                                               $ro1 =mysqli_fetch_array($res_img);
                                                $pic=$ro1['Image_1'];
                                                $ind=$pic[0];
                                             
                                             
                                                if(isset($pic))
                                                {
                                                    if (!is_numeric($ind))
                                                    {
                                                        //echo $pic;
                                                        echo "<img src = '$pic' width='100' height='100' >";
                                                    }
                                                    
                                                    else if(is_numeric($ind))
                                                    {
                                                        $pr='https://upload.thriftops.com/caps/uploads/'.$pic;
                                                         //echo $pr;
                                                         echo "<img src = '$pr' width='100' height='100' >";
                                                    }
                                                    
                                                    
                                                }
                                              
                                            
                                              
                                               
                                           }
                                           
                                           else if($num=='SK-CL')
                                           {
                                               $image = "SELECT * FROM Cleaning kits WHERE SKU='$sk'";
                                               //echo $sk;
                                               $res_img = mysqli_query($mysql, $image);
                                               $ro1 =mysqli_fetch_array($res_img);
                                                $pic=$ro1['Image_1'];
                                                $ind=$pic[0];
                                             
                                             
                                                if(isset($pic))
                                                {
                                                    if (!is_numeric($ind))
                                                    {
                                                        //echo $pic;
                                                        echo "<img src = '$pic' width='100' height='100' >";
                                                    }
                                                    
                                                    else if(is_numeric($ind))
                                                    {
                                                        $pr='https://upload.thriftops.com/Clean_kits/uploads/'.$pic;
                                                         //echo $pr;
                                                         echo "<img src = '$pr' width='100' height='100' >";
                                                    }
                                                    
                                                    
                                                }
                                              
                                               
                                           }
                                           
                                           else if($ss=='SK-M')
                                           {
                                               $image = "SELECT * FROM Mufflers WHERE SKU='$sk'";
                                               //echo $sk;
                                               $res_img = mysqli_query($mysql, $image);
                                               $ro1 =mysqli_fetch_array($res_img);
                                               $pic=$ro1['Image_1'];
                                                $ind=$pic[0];
                                             
                                             
                                                if(isset($pic))
                                                {
                                                    if (!is_numeric($ind))
                                                    {
                                                        //echo $pic;
                                                        echo "<img src = '$pic' width='100' height='100' >";
                                                    }
                                                    
                                                    else if(is_numeric($ind))
                                                    {
                                                        $pr='https://upload.thriftops.com/Mufflers/uploads/'.$pic;
                                                         //echo $pr;
                                                         echo "<img src = '$pr' width='100' height='100' >";
                                                    }
                                                    
                                                    
                                                }
                                              
                                               
                                           }
                                           else if($num=='SK-SC')
                                           {
                                               $image = "SELECT * FROM Socks WHERE SKU='$sk'";
                                               //echo $sk;
                                               $res_img = mysqli_query($mysql, $image);
                                               $ro1 =mysqli_fetch_array($res_img);
                                               $pic=$ro1['Image_1'];
                                                $ind=$pic[0];
                                             
                                             
                                                if(isset($pic))
                                                {
                                                    if (!is_numeric($ind))
                                                    {
                                                        //echo $pic;
                                                        echo "<img src = '$pic' width='100' height='100' >";
                                                    }
                                                    
                                                    else if(is_numeric($ind))
                                                    {
                                                        $pr='https://upload.thriftops.com/Socks/uploads/'.$pic;
                                                         //echo $pr;
                                                         echo "<img src = '$pr' width='100' height='100' >";
                                                    }
                                                    
                                                    
                                                }
                                              
                                               
                                           }
                                           
                                           
                                           else if($tri=='SK-SHO')
                                           {
                                               $image = "SELECT * FROM shorts WHERE SKU='$sk'";
                                               //echo $sk;
                                               $res_img = mysqli_query($mysql, $image);
                                               $ro1 =mysqli_fetch_array($res_img);
                                               $pic=$ro1['Image_1'];
                                                $ind=$pic[0];
                                             
                                             
                                                if(isset($pic))
                                                {
                                                    if (!is_numeric($ind))
                                                    {
                                                        //echo $pic;
                                                        echo "<img src = '$pic' width='100' height='100' >";
                                                    }
                                                    
                                                    else if(is_numeric($ind))
                                                    {
                                                        $pr='https://upload.thriftops.com/Shorts/uploads/'.$pic;
                                                         //echo $pr;
                                                         echo "<img src = '$pr' width='100' height='100' >";
                                                    }
                                                    
                                                    
                                                }
                                              
                                               
                                           }
                                           
                                           else if($num=='SK-TS')
                                           {
                                               $image = "SELECT * FROM tshirts WHERE SKU='$sk'";
                                               //echo $sk;
                                               $res_img = mysqli_query($mysql, $image);
                                               $ro1 =mysqli_fetch_array($res_img);
                                               $pic=$ro1['Image_1'];
                                                $ind=$pic[0];
                                             
                                             
                                                if(isset($pic))
                                                {
                                                    if (!is_numeric($ind))
                                                    {
                                                        //echo $pic;
                                                        echo "<img src = '$pic' width='100' height='100' >";
                                                    }
                                                    
                                                    else if(is_numeric($ind))
                                                    {
                                                        $pr='https://upload.thriftops.com/T-Shirts/uploads/'.$pic;
                                                         //echo $pr;
                                                         echo "<img src = '$pr' width='100' height='100' >";
                                                    }
                                                    
                                                    
                                                }
                                              
                                               
                                           }
                                           
                                           else if($num=='SK-SH')
                                           {
                                               $image = "SELECT * FROM shirts WHERE SKU='$sk'";
                                               //echo $sk;
                                               $res_img = mysqli_query($mysql, $image);
                                               $ro1 =mysqli_fetch_array($res_img);
                                               $pic=$ro1['Image_1'];
                                                $ind=$pic[0];
                                             
                                             
                                                if(isset($pic))
                                                {
                                                    if (!is_numeric($ind))
                                                    {
                                                        //echo $pic;
                                                        echo "<img src = '$pic' width='100' height='100' >";
                                                    }
                                                    
                                                    else if(is_numeric($ind))
                                                    {
                                                        $pr='https://upload.thriftops.com/Shirts/uploads/'.$pic;
                                                         //echo $pr;
                                                         echo "<img src = '$pr' width='100' height='100' >";
                                                    }
                                                    
                                                    
                                                }
                                              
                                               
                                           }
                                           
                                           else if($num=='SK-SN')
                                           {
                                               $image = "SELECT * FROM sandals WHERE SKU='$sk'";
                                               //echo $sk;
                                               $res_img = mysqli_query($mysql, $image);
                                               $ro1 =mysqli_fetch_array($res_img);
                                               $pic=$ro1['Image_1'];
                                                $ind=$pic[0];
                                             
                                             
                                                if(isset($pic))
                                                {
                                                    if (!is_numeric($ind))
                                                    {
                                                        //echo $pic;
                                                        echo "<img src = '$pic' width='100' height='100' >";
                                                    }
                                                    
                                                    else if(is_numeric($ind))
                                                    {
                                                        $pr='https://upload.thriftops.com/Sandals/uploads/'.$pic;
                                                         //echo $pr;
                                                         echo "<img src = '$pr' width='100' height='100' >";
                                                    }
                                                    
                                                    
                                                }
                                              
                                               
                                           }
                                           
                                           else if($ss=='SK-B')
                                           {
                                               $image = "SELECT * FROM Beanies WHERE SKU='$sk'";
                                               //echo $sk;
                                               $res_img = mysqli_query($mysql, $image);
                                               $ro1 =mysqli_fetch_array($res_img);
                                               $pic=$ro1['Image_1'];
                                                $ind=$pic[0];
                                             
                                             
                                                if(isset($pic))
                                                {
                                                    if (!is_numeric($ind))
                                                    {
                                                        //echo $pic;
                                                        echo "<img src = '$pic' width='100' height='100' >";
                                                    }
                                                    
                                                    else if(is_numeric($ind))
                                                    {
                                                        $pr='https://upload.thriftops.com/Beanies/uploads/'.$pic;
                                                         //echo $pr;
                                                         echo "<img src = '$pr' width='100' height='100' >";
                                                    }
                                                    
                                                    
                                                }
                                              
                                               
                                           }
                                           
                                           else if($num=='SK-BG')
                                           {
                                               $image = "SELECT * FROM Bags WHERE SKU='$sk'";
                                               //echo $sk;
                                               $res_img = mysqli_query($mysql, $image);
                                               $ro1 =mysqli_fetch_array($res_img);
                                               $pic=$ro1['Image_1'];
                                                $ind=$pic[0];
                                             
                                             
                                                if(isset($pic))
                                                {
                                                    if (!is_numeric($ind))
                                                    {
                                                        //echo $pic;
                                                        echo "<img src = '$pic' width='100' height='100' >";
                                                    }
                                                    
                                                    else if(is_numeric($ind))
                                                    {
                                                        $pr='https://upload.thriftops.com/Bags/uploads/'.$pic;
                                                         //echo $pr;
                                                         echo "<img src = '$pr' width='100' height='100' >";
                                                    }
                                                    
                                                    
                                                }
                                              
                                               
                                           }
                                           
                                        else
                                          {
                                                echo "<img src = '' width='100' height='100' >";
                                          }
                                           
                                           
                                           
                                       
                                       
                                       ?>
                                 </td>
    						</tr>
    						<?php
    						$iq++;
    					}
    				?>
    			</tbody>
    		</table>
    	</div>
	
	<?php include ("../include/footer.php"); ?>
<?php
session_start();
include_once("../include/mysql_connection.php"); 
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



if(isset($_POST['submit']) && isset($_POST['Sub_Cat']))
{
    $s_cat=$_POST['Sub_Cat'];
    
    $sqew = "SELECT * FROM sku Where Product_Cat_ID='$s_cat' order by id desc limit 1";
    $reslt1 = mysqli_query($mysql, $sqew);
    $row =mysqli_fetch_array($reslt1);
    $Date=$row['DateTime'];
    echo $Date;
    
    if(!$Date)
    {
        echo "<script>alert('Data Not Found !.')</script>";
    }
    else
    {
        echo "<script>alert('Data Generate Completed !.')</script>";
        $url = "SKU_Print.php?var1=".$Date."&var2=".$GRN;
        $delay = "1";
        echo '<meta http-equiv="refresh" content="'.$delay.';url='.$url.'">';
        die(); 
    }

}

if(isset($_POST['submit']) && isset($_POST['grn']))
{
   
    $GRN=$_POST['grn'];
    $sqew = "SELECT * FROM sku Where GRN_ID='$GRN' order by id asc limit 1";
    $reslt1 = mysqli_query($mysql, $sqew);
    $row =mysqli_fetch_array($reslt1);
    $Date=$row['DateTime'];
    echo $Date;
    
    if(!$Date)
    {
        echo "<script>alert('Data Not Found !.')</script>";
    }
    else
    {
        if(isset($GRN))
        {
            echo "<script>alert('Data Generate Completed !.')</script>";
            $url = "SKU_Print.php?var2=".$GRN;
            $delay = "1";
            echo '<meta http-equiv="refresh" content="'.$delay.';url='.$url.'">';
            die(); 
        }
        
        else if(isset($Date))
        {
            echo "<script>alert('Data Generate Completed !.')</script>";
            $url = "SKU_Print.php?var1=".$Date;
            $delay = "1";
            echo '<meta http-equiv="refresh" content="'.$delay.';url='.$url.'">';
            die(); 
        }
        
        
        
    }

}


?>


<?php include_once("../include/header.php"); ?>
<br>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function()
        {
            $('#Cat').change(function()
            {
                var cat_id=$('#Cat').val();
                $('#Sub_Cat').empty(); 
                $.get('load_data_cat.php',{'cat_id':cat_id},function(return_data)
                {
                    $.each(return_data.data, function(key,value)
                        {
                            $("#Sub_Cat").append("<option value='"+value.Pr_Cat_ID+"'>"+value.Pr_Cat_Name+"</option>");
                        });
                }, "json");
                
            });
        });
    </script>
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h3 class="mb-0 card-title">Print Barcodes</h3>
         </div>
         <form action="" method="POST" class="PR">
            <div class="card-body">
               <h6> Fill Out The Details as Follows:</h6>
               </br>
               <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label">GRN ID</label>
                        <select class="form-control" name="grn" id="grn">
                            <option disabled selected>Select GRN</option>
                            <?php $records = mysqli_query($mysql, "SELECT * FROM `goods_recieved_note`"); 
                            while($data = mysqli_fetch_array($records))
                            {
                                echo "<option value='". $data['GRN_ID'] ."'>" .$data['GRN_ID'] ."</option>";
                            }	
                            ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="form-label">Select Category</label>
                        <select class="form-control " data-placeholder="Choose Department"name="Cat" id="Cat">
                            <option disabled selected>Select Category</option>
                            <?php $records = mysqli_query($mysql, "SELECT * FROM `products`"); 
                            while($data = mysqli_fetch_array($records))
                            {
                                echo "<option value='". $data['Product_ID'] ."'>" .$data['Product_Name'] ."</option>";
                            }	
                            ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label class="form-label">Select Sub Category</label>
                        <select class="form-control " data-placeholder="Choose Department" name="Sub_Cat" id="Sub_Cat">
                            <option disabled selected>Select Sub-Category</option> 
                        </select>
                     </div>
                  </div>
                  <div class="col-12">
                     <button class="btn btn-primary btn-block" name="submit" data-toggle="modal" data-target="#exampleModal">Lets Print Barcodes 👉</button>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>    
<?php include_once("../include/footer.php"); ?>
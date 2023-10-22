<?php



session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);
 if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
   {
      
   }
   else
   {
      
       echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
   }
   



date_default_timezone_set("Asia/Karachi");
   
$sql1 = "SELECT * FROM Product order by id desc limit 1";
$result1 = mysqli_query($mysql, $sql1);
$row =mysqli_fetch_array($result1);
   
$last_id=$row['id'];
if ($last_id == " ") 
{
    $number = "1";
}
else
{
    $number = substr($last_id,0);
    $number = intval($number);
    $number = $number+1;
}

if (isset($_POST['submit']) && isset($_POST['war']) && isset($_POST['Cat']) && isset($_POST['Sub_Cat']) && isset($_POST['Vendor']) && isset($_POST['Lot']) )  
{
       
    $dis =$_POST['results'];
    $title = $_POST['product_title'];
    $brand =$_POST['Brand'];
    $ven_id =$_POST['Vendor'];
    $lot_id =$_POST['Lot'];
    $made =$_POST['Madein'];
    $material =$_POST['Material']; //Material
    
    $prod_id=$_POST['Cat'];
    $prod_cat_id=$_POST['Sub_Cat'];
    $condi=$_POST['Condition'];
    $weight=$_POST['Weight'];
    $status=$_POST['Status'];
    $sku=$_POST['SKU'];
    $barcode=$_POST['Barcode'];
    $gender=$_POST['Gender'];
    $war_id=$_POST['war'];
    $cost=$_POST['Cost'];
    $price=$_POST['Price'];
    $datetime=$_POST['Req_date'];
    $size=$_POST['Size'];
    $code=$_POST['ProductCode'];
    
   
    $filled="Filled";

    
    $quantity=$_POST['Quantity'];
    $user= $_SESSION['Username'];
    
    $sql98 = "SELECT * FROM racks WHERE Warehouse_ID='$war_id' AND Category='$prod_id' AND SKU='$sku'";
    $result6 = mysqli_query($mysql, $sql98);
    $rowsa1 = mysqli_fetch_assoc($result6); 
    $PR_ID = $rowsa1['SKU'];
    
    if (!empty($PR_ID)) 
    {
            
        //echo $PR_ID;
        echo "<script>alert('SKU Already Allocated !')</script>";
       
    } 
    else 
    {
   
        $fileName1 = time().'_'.basename($_FILES["rimg"]["name"]);
        $fileName2 = time().'_'.basename($_FILES["fimg"]["name"]);
        $fileName3 = time().'_'.basename($_FILES["limg"]["name"]);
        $fileName4 = time().'_'.basename($_FILES["bimg"]["name"]);
        $fileName5 = time().'_'.basename($_FILES["bcimg"]["name"]);
        $targetDir = "uploads/";
        $targetFilePath1=$targetDir.$fileName1;
        $targetFilePath2=$targetDir.$fileName2;
        $targetFilePath3=$targetDir.$fileName3; 
        $targetFilePath4=$targetDir.$fileName4;
        $targetFilePath5=$targetDir.$fileName5;
   
       
        move_uploaded_file($_FILES["rimg"]["tmp_name"], $targetFilePath1);
        move_uploaded_file($_FILES["fimg"]["tmp_name"], $targetFilePath2);
        move_uploaded_file($_FILES["limg"]["tmp_name"], $targetFilePath3);
        move_uploaded_file($_FILES["bimg"]["tmp_name"], $targetFilePath4);
        move_uploaded_file($_FILES["bcimg"]["tmp_name"], $targetFilePath5);
        
        $aqw= "SELECT * FROM Product Where SKU='$sku' order by id desc limit 1";
        $run = mysqli_query($mysql, $aqw);
        $rowwe =mysqli_fetch_array($run);
        $cc=$rowwe['SKU'];
        if(!empty($cc))
        {
            echo "<script>alert('SKU Exists In This Table !.')</script>";
        }
        else
        {   
            $sql = "INSERT INTO Product (Title, Brand, Vendor_ID, Lot_ID, Made_IN,Product_ID,Product_Cat_ID,Cndition,Weight,Status,SKU,Barcode,Gender,Warehouse_ID,Cost,Price,Image_1,Image_2,Image_3,Image_4,Image_5,Username,DateTime,Discription) VALUES ('$title', '$brand', '$ven_id', '$lot_id', '$made', '$prod_id', '$prod_cat_id','$condi', '$weight', '$status', '$sku', '$barcode' ,'$gender', '$war_id', '$cost', '$price', '$fileName1', '$fileName2', '$fileName3', '$fileName4', '$fileName5', '$user', '$datetime', '$dis')";
            $result = mysqli_query($mysql, $sql);
       
       
           
       
            if (!$result) 
            {
                echo "<script>alert('Product Not Generating !.')</script>";
                  
            } 
            else 
            {
                $query="SELECT Rack_ID from racks WHERE Warehouse_ID='$war_id' AND Category='$prod_id' AND Status='Empty' order by number ASC limit 1";
                $res = mysqli_query($mysql, $query);
                $row1 = mysqli_fetch_assoc($res); 
                $ID = $row1['Rack_ID'];
                   
                $las="UPDATE racks SET Filled_at='$datetime',Status='$filled',SKU='$sku' WHERE Rack_ID='$ID'";
                $relt1 = mysqli_query($mysql, $las);
                echo "<script>alert('Product Generate Completed !.')</script>";
                $url = "Shopify_Upload.php?var1=".$sku."&var2=".$quantity."&var3=".$size."&var4=".$material."&var5=".$code; 
                $delay = "1";
                echo '<meta http-equiv="refresh" content="'.$delay.';url='.$url.'">';
                die(); 
                  
            }
        }
    }
}

   
function get_gender()
{
    $genders = array('Select Option'=>NULL,'Men'=>'Men','Women'=>'Women','Unisex'=>'Unisex','Kids'=>'Kids','Boys'=>'Boys','Girls'=>'Girls');
    $options = '';
    foreach ($genders as $k => $genders) //while(list($k,$v)= each($genders))
    {
        if($options==$k)
        {
            $options.='<option value="'.$genders.'">'.$k.'</option>';
        }
        else
        {
            $options.='<option value="'.$genders.'">'.$k.'</option>';
        }
        

    }
    return $options;
}


function get_type()
{
    $rw = array('Select Option'=>NULL,'Analog'=>'Analog','Digital'=>'Digital');
    $options = '';
    foreach ($rw as $k => $rw) //while(list($k,$v)= each($genders))
    {
        if($options==$k)
        {
            $options.='<option value="'.$rw.'">'.$k.'</option>';
        }
        else
        {
            $options.='<option value="'.$rw.'">'.$k.'</option>';
        }
        

    }
    return $options;
}


function get_water()
{
    $wat = array('Select Option'=>NULL,'Yes'=>'Yes','No'=>'No');
    $options = '';
    foreach ($wat as $k => $wat) //while(list($k,$v)= each($genders))
    {
        if($options==$k)
        {
            $options.='<option value="'.$wat.'">'.$k.'</option>';
        }
        else
        {
            $options.='<option value="'.$wat.'">'.$k.'</option>';
        }
        

    }
    return $options;
}

function get_quantity()
{
    $quanti = array('Select Option'=>NULL,'1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10');
    $options = '';
    foreach ($quanti as $k => $quanti) //while(list($k,$v)= each($genders))
    {
        if($options==$k)
        {
            $options.='<option value="'.$quanti.'">'.$k.'</option>';
        }
        else
        {
            $options.='<option value="'.$quanti.'">'.$k.'</option>';
        }
        
    }
    return $options;
}
function get_condition()
{
    $conditions = array('Select Option'=>NULL,'7/10'=>'7/10','8/10'=>'8/10','9/10'=>'9/10','10/10'=>'10/10','Brand New'=>'Brand New');
    $options = '';
    foreach ($conditions as $k => $conditions) //while(list($k,$v)= each($conditions))
    {
        if($options==$k)
        {
            $options.='<option value="'.$conditions.'">'.$k.'</option>';
        }
        else
        {
            $options.='<option value="'.$conditions.'">'.$k.'</option>';
        }
        

    }
    return $options;
}

function get_weightkg()
{
    $weights = array('Select Option'=>NULL,'0.25g'=>'0.25','0.5g'=>'0.5');
    $options = '';
    foreach ($weights as $k => $weights) //while(list($k,$v)= each($weights))
    {
        if($options==$k)
        {
            $options.='<option value="'.$weights.'">'.$k.'</option>';
        }
        else
        {
            $options.='<option value="'.$weights.'">'.$k.'</option>';
        }
        

    }
    return $options;
}
function get_status()
{
    $statues = array('Select Option'=>NULL,'Active'=>'active','Draft'=>'draft','Archive'=>'archive');
    $options = '';
    foreach($statues as $k => $statues) //while(list($k,$v)=$statues))
    {
        if($options==$k)
        {
            $options.='<option value="'.$statues.'">'.$k.'</option>';
        }
        else
        {
            $options.='<option value="'.$statues.'">'.$k.'</option>';
        }
        

    }
    return $options;
}

?>
    <?php include_once("../include/header.php"); ?>
    <br>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
    <script>
        var button_Var = document.getElementById('btn');
        var textarea = document.getElementById('results');

        function formdataa()
       {
        
        var productname1= document.getElementById("ProductTitle").value;
        var madein1= document.getElementById("Madein").value;
        var category = document.getElementById("Cat").value;
        var subcategry = document.getElementById("Sub_Cat").value;
        var Wearhouse1 = document.getElementById("wearhouse").value;
        var Vendor1= document.getElementById("Vendor").value;
        var Lot1 = document.getElementById("Lot").value;
        var Brand1 = document.getElementById("Brand").value;
        var condition_id1 = document.getElementById("Condition").value;
        var Status1 = document.getElementById("status").value;
        var gender1 = document.getElementById("gender").value;
        var cost1= document.getElementById("Cost").value;
        var productprice1 = document.getElementById("price").value;
        var Size1 = document.getElementById("Size").value;
        var quantity1 = document.getElementById("quantity").value;
        var SKU1 = document.getElementById("SKU").value;
        var weight1 = document.getElementById("weight").value;
       

        results.value = ("Product Title :" + productname1 + "\n" + "Made In :" + madein1+ "\n"+" Main Category :" + category+ "\n"+"Sub category :" + subcategry+ "\n"+"Wearhouse :" + Wearhouse1+ "\n"+"Size :" + Size1+"\n"+"Lot :" + Lot1+ "\n"+"vendor :" + Vendor1+ "\n"+"Weight :" + weight1+ "\n" +"SKU :" + SKU1+ "\n"+"Enter Price :" + productprice1+ "\n"+"Cost Price :" + cost1+"\n"+"Quantity :" + quantity1+ "\n"+"Status :" + Status1+ "\n");
        
       }
 
    </script>
        <script>
        $(document).ready(function() {
            $('#Cat').change(function() {
                var cat_id = $('#Cat').val();
                $('#Sub_Cat').empty();
                $.get('load_data_cat.php', {
                    'cat_id': cat_id
                }, function(return_data) {
                    $.each(return_data.data, function(key, value) {
                        $("#Sub_Cat").append("<option value='" + value.Pr_Cat_ID + "'>" + value.Pr_Cat_Name + "</option>");
                    });
                }, "json");
            });
        });
        </script>
        <script>
        $(document).ready(function() {
            $('#Vendor').change(function() {
                var ven_id = $('#Vendor').val();
                $('#Lot').empty();
                $.get('load_data_ven.php', {
                    'ven_id': ven_id
                }, function(return_data) {
                    $.each(return_data.data, function(key, value) {
                        $("#Lot").append("<option value='" + value.id + "'>" + value.Lot_Number + "</option>");
                    });
                }, "json");
            });
        });
        </script>
        <div class="card">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" name="shoes" enctype="multipart/form-data">
                <input type="hidden" name="action_type" value="create_product">
                <div class="card-header">
                    <h3 class="mb-0 card-title">Shopify Entry Form..!</h3> </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">ID</label>
                                <input type="text" class="form-control" name="ID" value="<?php echo $number; ?>" disabled=""> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Date</label>
                                <input type="text" class="form-control" name="Req_date" value="<?php echo date('Y-m-d/h:i:a'); ?>" readonly=""> </div>
                        </div>
                        <div class="col-md-12 " style="margin-bottom: 20px;">
                            <div class="form-group mb-0">
                                <label class="form-label">Product Title</label>
                                <input type="text" class="form-control is-valid" name="product_title" id="ProductTitle" placeholder=" Enter Product Title" required> </div>
                        </div>
                        </br>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Made In</label>
                                <input type="text" class="form-control " name="Madein" id="Madein" required="" placeholder="Made In"> </div>
                            <div class="form-group mb-0">
                                <label>Product Category</label>
                                <select required="required" class="custom-select" name="Cat" id="Cat">
                                    <option disabled selected>Select Category</option>
                                    <?php $records = mysqli_query($mysql, "SELECT * FROM `products`"); 
                           while($data = mysqli_fetch_array($records))
                           {
                               echo "<option value='". $data['Product_ID'] ."'>" .$data['Product_Name'] ."</option>";
                           }   
                           ?>
                                </select>
                            </div>
                            <div class="form-group mb-0">
                                <label>Vendor</label>
                                <select required="required" class="custom-select" name="Vendor" id="Vendor">
                                    <option disabled selected>Select Vendor</option>
                                    <?php
                           $records = mysqli_query($mysql, "SELECT * FROM `vendor`"); 
                           
                           while($data = mysqli_fetch_array($records))
                           {
                               echo "<option value='". $data['Vendor_ID'] ."'>" .$data['Vendor_Name'] ."</option>";
                           }   
                           ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Material</label>
                                <input type="text" class="form-control " id="Material" name="Material" required="" placeholder="Material"> </div>
                                
                                <div class="form-group">
                                <label class="form-label">Product Code</label>
                                <input type="text" class="form-control " id="ProductCode" name="ProductCode" required="" placeholder="Product Code"> </div>
                          
                            
                            
                          
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Brand</label>
                                <input type="text" class="form-control " name="Brand" required="" placeholder="Brand"> </div>
                            <div class="form-group mb-0">
                                <label>Product Child Category</label>
                                <select required="required" class="custom-select" name="Sub_Cat" id="Sub_Cat">
                                    <option disabled selected>Select Sub-Category</option>
                                </select>
                            </div>
                            <div class="form-group mb-0">
                                <label>Lot</label>
                                <select required="required" class="custom-select" name="Lot" id="Lot">
                                    <option disabled selected>Select Lot</option>
                                </select>
                            </div>
                            
                            
                            
                            <div class="form-group mb-0">
                                <label>Condition</label>
                                <select class="custom-select" name="Condition" required>
                                    <?php echo get_condition(); ?>
                                </select>
                            </div>
                            
                            <div class="form-group mb-0">
                                <label>Select Warehouse</label>
                                <select required="required" class="custom-select" name="war">
                                    <option disabled selected>Select Warehouse</option>
                                    <?php $records = mysqli_query($mysql, "SELECT * FROM `warehouse`"); 
                           while($data = mysqli_fetch_array($records))
                           {
                               echo "<option value='". $data['War_ID'] ."'>" .$data['Warhouse_Location'] ."</option>";
                           }  
                           ?>
                                </select>
                            </div>
                        </div> 
                        
                           
                            
                            <div class="col-md-6">
                                <div class="form-group mb-0">
                                    <label>Select Weight</label>
                                    <select class="custom-select" name="Weight" required>
                                        <?php echo get_weightkg(); ?>
                                    </select>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Select Status</label>
                                    <select class="custom-select" name="Status" required>
                                        <?php echo get_status(); ?>
                                    </select>
                                </div>
                                <div class="form-group mb-0">
                                    <label class="form-label">Product SKU</label>
                                    <input type="text" class="form-control is-valid" name="SKU" required> </div>
                                <div class="form-group mb-0">
                                    <label class="form-label">Cost Price</label>
                                    <input type="text" class="form-control is-valid" name="Cost" placeholder="Enter Cost Price" required> </div>
                                    <div class="form-group">
                                <label class="form-label">Size</label>
                                <input type="text" class="form-control " name="Size" id="Size" required="" placeholder="Size"> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-0">
                                    <label>Select Gender</label>
                                    <select class="custom-select" name="Gender" required>
                                        <?php echo get_gender(); ?>
                                    </select>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Select Quantity</label>
                                    <select class="custom-select" name="Quantity" required>
                                        <?php echo get_quantity(); ?>
                                    </select>
                                </div>
                                <div class="form-group mb-0">
                                    <label class="form-label">Product Barcode</label>
                                    <input type="text" class="form-control is-valid" name="Barcode" value="<?php echo $sku_assign; ?>" required> </div>
                                <div class="form-group mb-0">
                                    <label class="form-label">Enter Price</label>
                                    <input type="text" class="form-control is-valid" name="Price" placeholder="Enter Price" required> </div>
                            </div>
                             <div class="col-sm-2 product-imgs">
                                <div class="card shadow" style="margin-top: 20px;">
                                    <div class="card-body">
                                        <input type="file" class="dropify" name="rimg" required> </div>
                                </div>
                            </div>
                            <div class="col-sm-2 product-imgs">
                                <div class="card shadow" style="margin-top: 20px;">
                                    <div class="card-body">
                                        <input type="file" class="dropify" name="fimg" required> </div>
                                </div>
                            </div>
                            <div class="col-sm-2 product-imgs">
                                <div class="card shadow" style="margin-top: 20px;">
                                    <div class="card-body">
                                        <input type="file" class="dropify" name="limg" required> </div>
                                </div>
                            </div>
                            <div class="col-sm-2 product-imgs">
                                <div class="card shadow" style="margin-top: 20px;">
                                    <div class="card-body">
                                        <input type="file" class="dropify" name="bimg" > </div>
                                </div>
                            </div>
                            <div class="col-sm-2 product-imgs">
                                <div class="card shadow" style="margin-top: 20px;">
                                    <div class="card-body">
                                        <input type="file" class="dropify" name="bcimg" > </div>
                                </div>
                            </div> 
                             <div class="card Description">
                <div class="card-header">
                    <h6 class="">Product Description</h6>
                </div>
                <div class="card-body">
                    <div class="">
                        <label class="h6">Description</label>
                        <div class="">
                         
                          <textarea class="" id="editor1" name="results" style="height:273px;width: 577px;"></textarea>
                      
                       </div>
                       <!--<input value="Add to preview"  type="button" onclick="formdataa()" id="btn">-->
                    </div>
                </div>
            </div>
                            <div class="col-12" style=" margin-top: 20px;">
                                <button name="submit" value="Submit" class="btn btn-primary btn-block">Lets Add 👉</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </article>
        </section>
        <script>  
  CKEDITOR.replace('editor1');  
</script> 
        <?php include("../include/footer.php"); ?>
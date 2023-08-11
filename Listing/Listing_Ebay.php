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
$user=$_SESSION['Username'];
$sql1 = "SELECT * FROM Ebay order by id desc limit 1";
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

if (isset($_POST['submit']))  
{
       
    
    $title = $_POST['product_title'];
    //echo $title;
    $dis =$_POST['results'];
    //echo $dis;
    $brand =$_POST['Brand'];
    //echo $brand;
    $material =$_POST['Material'];
    //echo $material;
    $condi=$_POST['Condition'];
    //echo $condi;
    $gender=$_POST['Gender'];
   // echo $gender;
    $price=$_POST['Price'];
    //echo $price;
    $datetime=$_POST['Req_date'];
    $size=$_POST['Size'];
    //echo $size;
    $code=$_POST['ProductCode'];
    //echo $code;
    $quantity=$_POST['Quantity'];
    //echo $quantity;
    
    //extra
    $postal =$_POST['Postal'];
    // echo $postal;
    $country=$_POST['country'];
    // echo $country;
    $cat=$_POST['Sub_Cat'];
    // echo $cat;
    $currency=$_POST['Currency'];
    // echo $currency;
    $colour=$_POST['Colour'];
    // echo $colour;
    $size=$_POST['Size'];
    // echo $size;
    $type=$_POST['Type'];
    //echo $type;
    $size_type=$_POST['s_type'];
    $int_pr=$_POST['int_price'];
    $dom_pr=$_POST['dom_price'];
    $style=$_POST['style'];
    $loc=$_POST['location'];
    
    $fileNa1 =uniqid().time();
    $ext1=pathinfo( $_FILES["rimg"]["name"],PATHINFO_EXTENSION );
    $fileName1   = $fileNa1 . "." . $ext1;
    
    $fileNa2 =uniqid().time();
    $ext2=pathinfo( $_FILES["fimg"]["name"],PATHINFO_EXTENSION );
    $fileName2   = $fileNa2 . "." . $ext2;
    
    $fileNa3 =uniqid().time();
    $ext3=pathinfo( $_FILES["limg"]["name"],PATHINFO_EXTENSION );
    $fileName3   = $fileNa3 . "." . $ext3;
    
    $fileNa4 =uniqid().time();
    $ext4=pathinfo( $_FILES["bimg"]["name"],PATHINFO_EXTENSION );
    $fileName4   = $fileNa4 . "." . $ext4;
    
    $fileNa5 =uniqid().time();
    $ext5=pathinfo( $_FILES["bcimg"]["name"],PATHINFO_EXTENSION );
    $fileName5   = $fileNa5 . "." . $ext5;
    
    // $fileName1 = time().'_'.basename($_FILES["rimg"]["name"]);
    // $fileName2 = time().'_'.basename($_FILES["fimg"]["name"]);
    // $fileName3 = time().'_'.basename($_FILES["limg"]["name"]);
    // $fileName4 = time().'_'.basename($_FILES["bimg"]["name"]);
    // $fileName5 = time().'_'.basename($_FILES["bcimg"]["name"]);
    
    $targetDir = "ebay_uploads/";
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
    
    $domestic=$_POST['dom_co'];
    //echo $domestic;
    $internationl=$_POST['inter_co'];
    //echo $internationl;   
        
    // $query="SELECT * FROM `Ebay_Site WHERE Name=";
    // $res = mysqli_query($mysql, $query);
    // $row1 = mysqli_fetch_assoc($res); 
    // $country = $row1['Country'];
     
    if(isset($_POST['inter_co'])=='' && isset($_POST['inter_price'])=='')
    //if(isset($internationl)=='' && isset($int_pr)=='')
    {
        $sql = "INSERT INTO Ebay (Title,Category_ID,Price,Currency,Country,Postal_code,Quantity,Cndition,Gender,Size,Size_Type,Type,Style,Material,Brand,Colour,MPN,Description,Image_1,Image_2,Image_3,Image_4,Image_5,Username,DateTime,Domestic_Courier,International_Courier,Domestic_Charges,Location) VALUES ('$title', '$cat', '$price', '$currency', '$country', '$postal', '$quantity','$condi', '$gender', '$size', '$size_type', '$type', '$style', '$material' ,'$brand', '$colour', '$code', '$dis', '$fileName1', '$fileName2', '$fileName3', '$fileName4', '$fileName5', '$user', '$datetime', '$domestic', '', '$dom_pr', '$loc')";
        $result = mysqli_query($mysql, $sql);

        if (!$result) 
        {
            echo "<script>alert('Product Not Generating !.')</script>";
        } 
        else 
        {
    
            $url = "Ebay_Upload.php?var1=".$number; 
            $delay = "1";
            echo '<meta http-equiv="refresh" content="'.$delay.';url='.$url.'">';
            die(); 
    
        }
    }
    
    else
    {
        $sql = "INSERT INTO Ebay (Title,Category_ID,Price,Currency,Country,Postal_code,Quantity,Cndition,Gender,Size,Size_Type,Type,Style,Material,Brand,Colour,MPN,Description,Image_1,Image_2,Image_3,Image_4,Image_5,Username,DateTime,Domestic_Courier,International_Courier,Domestic_Charges,International_Charges,Location) VALUES ('$title', '$cat', '$price', '$currency', '$country', '$postal', '$quantity','$condi', '$gender', '$size', '$size_type', '$type', '$style', '$material' ,'$brand', '$colour', '$code', '$dis', '$fileName1', '$fileName2', '$fileName3', '$fileName4', '$fileName5', '$user', '$datetime', '$domestic', '$internationl', '$dom_pr', '$int_pr', '$loc')";
        $result = mysqli_query($mysql, $sql);

        if (!$result) 
        {
            echo "<script>alert('Product Not Generating !.')</script>";
        } 
        else 
        {
    
            $url = "Ebay_Upload.php?var1=".$number; 
            $delay = "1";
            echo '<meta http-equiv="refresh" content="'.$delay.';url='.$url.'">';
            die(); 
    
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



?>
    <?php include_once("../include/header.php"); ?>
    <br>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
    <script>
        var button_Var = document.getElementById('btn');
        var textarea = document.getElementById('results');

    //     function formdataa()
    //   {
        
    //     var productname1= document.getElementById("ProductTitle").value;
    //     var madein1= document.getElementById("Madein").value;
    //     var category = document.getElementById("Cat").value;
    //     var subcategry = document.getElementById("Sub_Cat").value;
    //     var Wearhouse1 = document.getElementById("wearhouse").value;
    //     var Vendor1= document.getElementById("Vendor").value;
    //     var Lot1 = document.getElementById("Lot").value;
    //     var Brand1 = document.getElementById("Brand").value;
    //     var condition_id1 = document.getElementById("Condition").value;
    //     var Status1 = document.getElementById("status").value;
    //     var gender1 = document.getElementById("gender").value;
    //     var cost1= document.getElementById("Cost").value;
    //     var productprice1 = document.getElementById("price").value;
    //     var Size1 = document.getElementById("Size").value;
    //     var quantity1 = document.getElementById("quantity").value;
    //     var SKU1 = document.getElementById("SKU").value;
    //     var weight1 = document.getElementById("weight").value;
       

    //     results.value = ("Product Title :" + productname1 + "\n" + "Made In :" + madein1+ "\n"+" Main Category :" + category+ "\n"+"Sub category :" + subcategry+ "\n"+"Wearhouse :" + Wearhouse1+ "\n"+"Size :" + Size1+"\n"+"Lot :" + Lot1+ "\n"+"vendor :" + Vendor1+ "\n"+"Weight :" + weight1+ "\n" +"SKU :" + SKU1+ "\n"+"Enter Price :" + productprice1+ "\n"+"Cost Price :" + cost1+"\n"+"Quantity :" + quantity1+ "\n"+"Status :" + Status1+ "\n");
        
    //   }
 
    </script>
<script>
    $(document).ready(function() {
        $(document).on('click', '#check', function(){
            var cat_id = $('#category_fetch').val();
            $('#Sub_Cat').empty();
                $.get('get_category.php', {
                    'cat_id': cat_id
                }, function(return_data) {
                    var options = return_data.map(function(val, ind){
                    return $("<option></option>").val(val.catid).html(val.desc);
                });
                $('#Sub_Cat').append(options);
                }, "json");
            });
        });
</script>

<script>
     $(document).ready(function() { 
            $('#country').change(function() {
                var ved = $('#country').val();
                $('#dom_co').empty();

                //domestic
                $.get('get_domestic.php', {
                    'ven_id': ved
                }, function(return_data) {
                    $.each(return_data.data, function(key, value) {
                        $("#dom_co").append("<option value='" + value.Courier_Service_Domestic + "'>" + value.Courier_Service_Domestic + "</option>");
                    });
                }, "json");
            });

        });
</script>

 <script>
 
        $(document).ready(function() {
            $('#country').change(function() {
                var ven_id = $('#country').val();
                $('#Currency').empty();
                //currency
                $.get('load_currency.php', {
                    'ven_id': ven_id
                }, function(return_data) {
                    $.each(return_data.data, function(key, value) {
                        $("#Currency").append("<option value='" + value.Currency + "'>" + value.Currency + "</option>");
                    });
                }, "json");
            });
            
            
        });
</script>

 <script>
 
        $(document).ready(function() {
            $('#country').change(function() {
                var vedi = $('#country').val();
                $('#inter_co').empty();

                //domestic
                    $.get('get_international.php', {
                        'ven_id': vedi
                    }, function(return_data) {
                        $("#inter_co").append("<option disabled selected value='" + '' + "'>" + 'Select Courier' + "</option>");
                        $.each(return_data.data, function(key, value) {
                            $("#inter_co").append("<option value='" + value.Courier_Service_International + "'>" + value.Courier_Service_International + "</option>");
                        });
                    }, "json");
                });
            
            
        });
</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#inter").show();
                $("#inter_p").show();
            } 
            else 
            {
                $("#inter_p").hide();
                $("#inter").hide();
                
            }
        });
    });
</script>  

       <style>
	
		.buttonIn {
			height: 29px;
			position: relative;
		}
		
input#category_fetch {
			margin: 0px;
			padding: 0px;
			width: 100%;
			outline: none;
			height: 35px;
			border-radius: 5px;
		}
input#check {
    position: absolute;
    border-radius: 3px;
    right: 5px;
    z-index: 2;
    border: none;
    top: 30px;
    height: 30px;
    cursor: pointer;
    color: white;
    background-color: #1e90ff;
    transform: translateX(2px);
    width: 66px;
}
	</style> 
<div class="">
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#menu1">Ebay</a></li>
    <li><a data-toggle="pill" href="#menu2">Shopify</a></li>
  </ul>
        <div class="card">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" name="shoes" enctype="multipart/form-data">
                <input type="hidden" name="action_type" value="create_product">
                <div class="card-header">
                    <h3 class="mb-0 card-title">Ebay Entry Form</h3> </div>
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
                                <label>Product Title</label>
                                <input type="text" class="form-control" name="product_title" id="ProductTitle" placeholder=" Enter Product Title"> </div>
                                
                            <div class="form-group mb-0 buttonIn">
                                <label>Category</label>
                                <input type="text" class="form-control" name="category_fetch" id="category_fetch" placeholder=" Enter Query to get specific Categories">
                                <input type="button" class="btn btn-primary btn-block" id="check" name="check" value="Check">
                            </div>
                            <br>
                            <!--<div class="col-md-2" style="margin-bottom: -5px;"><input type="button" class="btn btn-primary btn-block" id="check" name="check" value="Check"></div>-->
                        </div>
                        </br>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Postal Code</label>
                                <input type="text" class="form-control " name="Postal" id="Postal" placeholder="Postal Code"> </div>
                            
                          <div class="form-group mb-0">
                                <label>Country</label>
                                <select required="required" class="custom-select" name="country" id="country">
                                    <option disabled selected>Select Ebay Country</option>
                                    <?php
                               $records = mysqli_query($mysql, "SELECT * FROM `Ebay_Site` WHERE Site_ID=0 OR Site_ID=2 OR Site_ID=3"); 
                               
                               while($data = mysqli_fetch_array($records))
                               {
                                   echo "<option value='". $data['Site_ID'] ."'>" .$data['Name'] ."</option>";
                               }   
                               ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Material</label>
                                <input type="text" class="form-control " id="Material" name="Material" placeholder="Material"> </div>
                                
                                <div class="form-group">
                                <label>MPN</label>
                                <input type="text" class="form-control " id="ProductCode" name="ProductCode"  placeholder="Product Code"> </div>
                          
                            
                            
                          
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Brand</label>
                                <input type="text" class="form-control " name="Brand"  placeholder="Brand"> </div>
                            <div class="form-group mb-0">
                                <label>Category</label>
                                <select class="custom-select" name="Sub_Cat" id="Sub_Cat">
                                    <option disabled selected>Select Category</option>
                                </select>
                            </div>
                            <div class="form-group mb-0">
                                <label>Currency</label>
                                <select class="custom-select" name="Currency" id="Currency">
                                    <option disabled selected>Select Curency</option>
                                </select>
                            </div>
                            
                            
                            
                            <div class="form-group mb-0">
                                <label>Condition</label>
                                <select class="custom-select" name="Condition" >
                                    <option disabled selected>Select Condition</option>
                                    <option value="1000">Brand New</option>
                                    <option value="3000">Used</option>
                                </select>
                            </div>
                            
                        </div> 
    
                            <div class="col-md-6">
                                <div class="form-group mb-0">
                                    <label>Colour</label>
                                    <input type="text" class="form-control" name="Colour"> </div>
                                    <div class="form-group">
                                        <label>Size</label>
                                        <input type="text" class="form-control" name="Size" id="Size" placeholder="Size"> 
                                    </div>
                            
                                    
                                    <div class="form-group">
                                        <label>Domestic Courier</label>
                                            <select class="custom-select" id="dom_co" name="dom_co">
                                                <option disabled selected>Select Courier</option>
                                            </select>
                                    </div>
                                   
                                    
                                     <div class="form-group">
                                    
                                            <label for="chkPassport">
                                                <input type="checkbox" id="chkPassport" style="
                                                    display: inline-flex;
                                                    margin-left: 124px;
                                                    margin-top: -1px;
                                                " />
                                                Required International?
                                            </label>
                                    </div>
                                    
                                     <div class="form-group" id="inter" style="display: none">
                                        <label>International Courier</label>
                                       <select class="custom-select" name="inter_co" id="inter_co">
                                        </select>
                                    </div>
                                    
                                    <div class="form-group mb-0" id="inter_p" style="display: none">
                                    <label>International Ship Price</label>
                                    <input type="text" class="form-control" name="int_price" id="int_price" placeholder="Enter Ship Price"> 
                                    </div>
                                    
                                    <div class="form-group mb-0">
                                    <label>Domestic Ship Price</label>
                                    <input type="text" class="form-control" name="dom_price" placeholder="Enter Ship Price"> 
                                    </div>
                                    
                                    <div class="form-group mb-0">
                                    <label>Location</label>
                                    <input type="text" class="form-control" name="location" placeholder="Enter Your Location"> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group mb-0">
                                    <label>Select Gender</label>
                                    <select class="custom-select" name="Gender">
                                        <?php echo get_gender(); ?>
                                    </select>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Select Quantity</label>
                                    <input class="form-control" name="Quantity" min="1" max="1000" type="number">
                                   
                                </div>
                                <div class="form-group mb-0">
                                    <label>Type</label>
                                    <input type="text" class="form-control" name="Type"> </div>
                                <div class="form-group mb-0">
                                    <label>Price</label>
                                    <input type="text" class="form-control" name="Price" placeholder="Enter Price"> 
                                </div>
                                
                                
                                <div class="form-group mb-0">
                                    <label>Size Type</label>
                                    <input type="text" class="form-control" name="s_type" placeholder="Enter Size Type"> 
                                </div>
                                
                                
                                
                                
                                <div class="form-group mb-0">
                                    <label>Style</label>
                                    <input type="text" class="form-control" name="style" placeholder="Enter Style"> 
                                </div>
                            </div>
                             <div class="col-sm-2 product-imgs">
                                <div class="card shadow" style="margin-top: 20px;">
                                    <div class="card-body">
                                        <input type="file" class="dropify" name="rimg"> </div>
                                </div>
                            </div>
                            <div class="col-sm-2 product-imgs">
                                <div class="card shadow" style="margin-top: 20px;">
                                    <div class="card-body">
                                        <input type="file" class="dropify" name="fimg"> </div>
                                </div>
                            </div>
                            <div class="col-sm-2 product-imgs">
                                <div class="card shadow" style="margin-top: 20px;">
                                    <div class="card-body">
                                        <input type="file" class="dropify" name="limg"> </div>
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
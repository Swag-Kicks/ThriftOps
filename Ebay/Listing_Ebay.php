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

function myFunction() {
  //   $(document).on('keyup', '#category_fetch', function(){
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
        //    });
    
    
  
}
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





<?php include("../include/header.php");?>
<?php include("../include/sidebar.php");?>


<link rel="stylesheet" type="text/css" href="assets/css/dropzone.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>    
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="../assets/css/fontawesome.css">

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
<script>
    $(document).ready(function(){
		 $("#div_refresh").load("index.php");
        setInterval(function() {
            $("#div_refresh").load("index.php");
        }, 1000);
    });
 
</script>
<!-- Page Body Start-->
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" name="shoes" enctype="multipart/form-data">
<div class="page-body">
   <div class="container-fluid">
      <div class="page-header">
         
      </div>
   </div>
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="row project-cards">
         <div class="col-md-12 project-list">
            <div class="card">
                
               <div class="row">
                  <div class="col-md-6 p-0">
                     <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                        <li class="nav-item "><a class="nav-link active btn_load_screen" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="false" call_type="home"><i  class="btn_load_screen" data-feather="shopping-cart" call_type="home"></i>Ebay</a></li>
                        <!--<li class="nav-item "><a class="nav-link btn_load_screen" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false" call_type="Shopify"><i class="btn_load_screen" data-feather="shopping-bag" call_type="Shopify"></i>Shopify</a></li>-->
                        <!--<li class="nav-item "><a class="nav-link btn_load_screen" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false" call_type="WooCommerce"><i class="btn_load_screen"data-feather="check-circle" call_type="WooCommerce"></i>WooCommerce</a></li>-->
                     </ul>
                  </div>
                  <div class="col-md-6 p-0">
                     <div class="form-group mb-0 me-0 btn-showcase"></div>
                      <button class="btn btn-success" name="submit" value="Submit">Save & Publish</button>
                    <!--<button class="btn btn-secondary" type="button" style="margin-right:5px !important;">Save & Draft</button>-->
                  </div>
               </div>
            </div>
         </div>
         
         <div class="col-sm-12">
            <div class="card">
               <div class="card-body">
                  <div class="tab-content" id="top-tabContent">
                     <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                        <div class="row">
                           <div class="col-sm-12 col-xl-6">
                              <div class="row">
                                 <div class="col-sm-12">
                                    <div class="card">
                                       <div class="card-header pb-0">
                                           
                                             
                                        <div class="product-search">
                                            
                                              <div class="form-group m-0"><i class="fa fa-search new" style="margin-left: 648px;position: absolute;margin-top: 10px;"></i>
                                                <input class="form-control" type="search" placeholder="Search Categories..." name="category_fetch" id="category_fetch" placeholder=" data-original-title="" title="" data-bs-original-title="" onChange="myFunction()">
                                              </div>
                                            </form>
                                          </div>
                                          <h5>Product Information</h5>
                                       </div>
                                       <div class="card-body">
                                          <form class="theme-form">
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Product Title</label>
                                                <input type="text" class="form-control" name="product_title" id="ProductTitle" placeholder=" Enter Product Title"> 
                                             </div>
                                            
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Category</label>
                                               <select class="custom-select form-control aiz-tag-input" name="Sub_Cat" id="Sub_Cat">
                                                    <option disabled selected>Select Category</option>
                                                </select>
                                                                
                                             </div>
                                             <hr class="mt-4 mb-4">
                                             <h5>Attributes</h5>
                                             <br/>
                                            
                                              <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Gender</label>
                                                           <select class="custom-select form-control aiz-tag-input" name="Gender">
                                                    <?php echo get_gender(); ?>
                                                </select>
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Brand</label>
                                               <input type="text" class="form-control " name="Brand"  placeholder="Brand">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Colour</label>
                                                 <input type="text" class="form-control" name="Colour">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Size</label>
                                                <input type="text" class="form-control aiz-tag-input" name="Size" id="Size" placeholder="Size" >
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Size Type</label>
                                                <input type="text" class="form-control" name="s_type" placeholder="Enter Size Type">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Type</label>
                                               <input type="text" class="form-control form-control aiz-tag-input" name="Type">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Style</label>
                                                <input type="text" class="form-control" name="style" placeholder="Enter Style"> 
                                             </div>
											
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Material</label>
                                                <input type="text" class="form-control " id="Material" name="Material" placeholder="Material">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Condition</label>
                                                <select class="custom-select form-control aiz-tag-input" name="Condition" >
                                                <option disabled selected>Select Condition</option>
                                                <option value="1000">Brand New</option>
                                                <option value="3000">Used</option>
                                            </select>
                                             </div>
                                              
                                          <hr class="mt-4 mb-4">
                                          <h6 class="pb-3 mb-0">Product Images</h6>
                                          
                                                    <input class="form-control" type="file" name="rimg"><br>
                                                    <input class="form-control" type="file" name="fimg"><br>
                                                    <input class="form-control" type="file" name="limg"><br>
                                                    <input class="form-control" type="file" name="bimg"><br>
                                                    <input class="form-control" type="file" name="bcimg">
                                            
                                             </form>
                                       </div>
                                       
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-12 col-xl-6">
                              <div class="row">
                                 <div class="col-sm-12">
                                    <div class="card">
                                       <div class="card-header pb-0">
                                          <h5>Product price & Quantity</h5>
                                       </div>
                                       <div class="card-body">
                                          <form class="theme-form mega-form">
                                          <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Country</label>
                                                <select required="required" class="custom-select form-control aiz-tag-input" name="country" id="country">
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
                                               <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Currency</label>
                                                <select class="custom-select form-control aiz-tag-input" name="Currency" id="Currency">
                                                    <option disabled selected>Select Curency</option>
                                                </select>
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">Product price</label>
                                                <input type="text" class="form-control" name="Price" placeholder="Enter Price">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">Quantity</label>
                                                <input class="form-control" name="Quantity" min="1" max="1000" type="number">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">MPN</label>
                                                <input type="text" class="form-control " id="ProductCode" name="ProductCode"  placeholder="Product Code">
                                             </div>
                                              
                                          </form>
                                          <hr class="mt-4 mb-4">
                                          <h6 class="pb-3 mb-0">Shipping</h6>
                                          
										  <div class="mb-3">
											<label class="col-form-label">Postal Code</label>
											<input type="text" class="form-control " name="Postal" id="Postal" placeholder="Postal Code">
										 </div>
                                                 <div class="mb-3">
                                                <label class="col-form-label">Domestic Courier</label>
                                                <select class="custom-select form-control aiz-tag-input" id="dom_co" name="dom_co">
                                                <option disabled selected>Select Courier</option>
                                            </select>
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">Domestic Ship Price</label>
                                                 <input type="text" class="form-control" name="dom_price" placeholder="Enter Ship Price"> 
                                             </div>
                                              <div class="mb-3">
                                                <label class="col-form-label">Location</label>
                                                <input type="text" class="form-control" name="location" placeholder="Enter Your Location"> 
                                             </div>
                                             <div class="media">
                        <label class="col-form-label m-r-10">Required International?</label>
                        <div class="media-body text-end icon-state">
                          <label class="switch" for="chkPassport">
                            <input type="checkbox" id="chkPassport"><span class="switch-state"></span>
                          </label>
                        </div>
                      </div>
					  <div class="mb-3" id="inter" style="display: none">
						<label class="col-form-label">International Courier</label>
						 <select class="custom-select form-control aiz-tag-input" name="inter_co" id="inter_co">
                                        </select>
					 </div> <div class="mb-3" id="inter_p" style="display: none">
						<label class="col-form-label">International Ship Price</label>
						<input type="text" class="form-control" name="int_price" id="int_price" placeholder="Enter Ship Price"> 
					 </div>
                                   <h6>Product Status</h6>
                                             <div class="mb-3">
                                                <label class="col-form-label">ID</label>
                                                <input type="text" class="form-control" name="ID" value="<?php echo $number; ?>" disabled="">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">Date</label>
                                                <input type="text" class="form-control" name="Req_date" value="<?php echo date('Y-m-d/h:i:a'); ?>" readonly="">
                                             </div>           
                                                 
                                        
                                          <div class="mb-3">
                                              <h6>Description</h6>
                                           <div class="">
                                              <textarea  class="form-control" id="editor1" name="results"></textarea>   
                                           </div>
                                        </div> 
                                        
                                       </div>
                              
                                       
                                       
                                    </div>
                                  </form>
                                    <div class="card-footer">
                                       </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                   
                     
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid Ends-->
</div>
</form>
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $("#categorySelect").on('change',function(){
            // alert($(this).val());
            $(".Data").hide();
            $("#" + $(this).val()).fadeIn(700);
        }).change();

    });

</script>
<script type="text/javascript">
    CKEDITOR.replace( 'editor1' );

        var editorText = CKEDITOR.instances.editor1.getData();
        $('#trackingDiv').html(editorText);
    
    CKEDITOR.replace( 'editor2' );

        var editorText1 = CKEDITOR.instances.editor2.getData();
        $('#trackingDiv').html(editorText1);
</script>  
<!-- footer start-->
<?php include("../include/footer.php");?>

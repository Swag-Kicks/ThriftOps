<?php
   session_start();
   require_once("mysql_connection.php"); 
   
   $cr=$_SESSION['id'];
   $id=$_GET['GETID'];
   $sql1 = "Select * from `addition` Where SKU='$id'";
   $result = mysqli_query($mysql, $sql1);
   $row1 =mysqli_fetch_array($result);
   $shopify_ID=$row1['Shopify_ID'];
   
   $sql2 = "Select * from `Logs` where Type in ('Induction','Allocate','Product') AND Type_ID in ('$shopify_ID','$id') OR Reference in ('$shopify_ID','$id')";
   $result2 = mysqli_query($mysql, $sql2);
   
   // select rack using SKU
   $sql3="SELECT * FROM  `racks` Where SKU ='$id' LIMIT 1";
   $result3 = mysqli_query($mysql, $sql3);
   $row3 =mysqli_fetch_array($result3);
   $rack_pos=$row3['name'];
   $warehouse_id = $row['Warehouse_ID'];
   if ($warehouse_id != 0){
     $sql4="SELECT * FROM  `Warehouse` Where Warehouse_ID = '$warehouse_id' LIMIT 1";
     $result4 = mysqli_query($mysql, $sql4);
     $row4 =mysqli_fetch_array($result4);
     $warehouse_location=$row4['Location'];
   
   }
   
   
   ?>
   
<?php include ("../include/header.php"); ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>

<link rel="stylesheet" type="text/css" href="assets/css/dropzone.css">
<!--//sortable-->
<script type="application/javascript" src="assets/custom/elements.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- Script -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<!-- Page Body Start-->
<script type="text/javascript">
   var subcategory = {
       Tops: ["Select Category","Shirts", "T-Shirts", "Hoodies","TrackTops", "Tank tops", "Polo", "SweatShirts","Jackets", "Coats&Blazzers","Sweater","Shrugs"],
       Bottoms: ["Select Category","Jeans", "Shorts", "Yoga Pants", "Trouser", "Skirts", "Track Pants", "Sweat Pants/joggar pants"],
       Suit: ["Select Category","Tracksuit", "Romper", "Jumpsuit", "Peplum", "Dress"],
       Headwear: ["Select Category","Caps", "Beanies", "Hats"],
       Footwear: ["Select Category","Sneakers", "Sandals", "Slippers","Khussa","Formals","Heels","Boots"],
       Gadget: ["Select Category","Watches", "Headphones", "Speakers"],
       Accessories: ["Select Category","Tie", "Socks", "Belts","Handbags","Bags","Mufflers","Wallets","Gloves","Shoecare","Scarfs"] 
   }
   
   function makeSubmenu(value) {
       if (value.length == 0) document.getElementById("categorySelect").innerHTML = "<option></option>";
       else {
           var citiesOptions = " ";
           for (categoryId in subcategory[value]) {
               citiesOptions += "<option>" + subcategory[value][categoryId] + "</option>";
           }
           document.getElementById("categorySelect").innerHTML = citiesOptions;
       }
   }
   
   
</script>
<style>
   /*            .switch-sm1 .switch1 {*/
   /*    width: 37px;*/
   /*    height: 18px;*/
   /*    margin-top: 10px;*/
   /*    margin-bottom: 0px;*/
   /*}*/
   /*.switch-sm1 input:checked + .switch-state1:before {*/
   /*    left: -4px;*/
   /*}*/
   .{
   border:1px solid grey;
   }
   .cardshadow{
   box-shadow: 0px 3px 5px rgba(9, 30, 66, 0.2), 0px 0px 1px rgba(9, 30, 66, 0.31);
   }
   .switchfont{
   font-family: 'Montserrat';
   font-style: normal;
   font-weight: 500;
   font-size: 18px;
   line-height: 17px;
   }
</style>
<div class="page-body" style="background-color:#F6F6F6;">
   <div class="container-fluid mt-3">
      <div class="px-3" style="float:right;">
         <button class="btn btn-outline-info" type="button">View Product </button>
         <button class="btn btn-outline-info" type="button">QC Rejected </button>
         <button class="btn btn-primary" onclick="EditPro()" type="button">Edit</button>
         <!--<a class="btn btn-primary" href="https://backup.thriftops.com/ShopifyPush/editProduct.php">Edit</a>-->
      </div>
      <h3 ><b class="mleft" id="skuz">SKU</b></h3>
      <label class="mleft"  >Created:&nbsp;&nbsp;<label id="datez"></label></label>
   </div>
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="row project-cards">
         <div class="col-md-12 project-list">
         </div>
         <div class="col-sm-12">
            <!--<div class="card">-->
            <div class="card-body" style="background-color:#F6F6F6;">
               <div class="row">
                  <div class="col-sm-12 col-xl-8">
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="card cardshadow" >
                              <div class="card-header pb-0">
                                 <h5>Product Info</h5>
                              </div>
                              <div class="card-body">
                                 <form class="theme-form">
                                    <div class="mb-3">
                                       <label class="col-form-label pt-0">Title</label>
                                       <input disabled class="form-control " id="title" type="title"  onchange="SendData()" name="title" placeholder="Enter Product Name">
                                    </div>
                                    <div class="col-sm-12 row">
                                       <div class="col-sm-6">
                                          <div class="mb-3">
                                             <label class="col-form-label pt-0">Condition</label>
                                             <select disabled class="form-control form-select  " name="condition" onchange="SendData()" id="condition_id">
                                                <option value=" ">Select condition</option>
                                                <option value="7/10">7/10</option>
                                                <option value="8/10">8/10</option>
                                                <option value="9/10">9/10</option>
                                                <option value="10/10">10/10</option>
                                                <option value="Brand New">Brand New</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-sm-6">
                                          <div class="mb-3">
                                             <label class="col-form-label pt-0">Brand</label>
                                             <select disabled id='selUser' class="form-control form-select " >
                                                <option value='0'>- Search Brand -</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row">
                                       <div class="col-sm-6">
                                          <label class="col-form-label pt-0" >Quantity</label>
                                          <input disabled class="form-control " type="number" name="quantity"  onchange="SendData()"  placeholder="Enter Quantity">
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="col-form-label pt-0" >Made in</label>
                                          <input disabled class="form-control " type="text" name="made"  onchange="SendData()" aria-describedby="emailHelp" placeholder="Enter Made in">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row">
                                       <div class="col-sm-6">
                                          <label class="col-form-label pt-0" >Material</label>
                                          <input disabled class="form-control "  type="text" name="material"  onchange="SendData()" placeholder="Enter Material">
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="col-form-label pt-0" >Weight</label>
                                          <input disabled class="form-control "  type="text" name="weight"  onchange="SendData()" placeholder="Enter Weight">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row">
                                       <div class="col-sm-6">
                                          <label class="col-form-label pt-0" >Price</label>
                                          <input disabled class="form-control " id="price" type="number"  onchange="SendData()" name="price"  placeholder="Enter Price">
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="col-form-label pt-0">Gender</label>
                                          <select disabled class="form-control form-select  "  onchange="SendData()" name="gender">
                                             <option value=" ">Select Gender</option>
                                             <option value="Male">Male</option>
                                             <option value="Female">Female</option>
                                          </select>
                                       </div>
                                    </div>
                              </div>
                              <!--<div class="mb-3">-->
                              <!--   <label class="col-form-label pt-0" for="exampleInputEmail1">Made in</label>-->
                              <!--   <input disabled class="form-control"  type="text" name="made" onchange="SendData()" aria-describedby="emailHelp" placeholder="Enter Made in">-->
                              <!--</div>-->
                              <!--<div class="mb-3">-->
                              <!--   <label class="col-form-label pt-0" for="exampleInputEmail1">Category</label>-->
                              <!--   <select disabled class="form-control" style="border:1px solid grey;" id="category"  onchange="makeSubmenu(this.value)">-->
                              <!--      <option value=" " disabled selected>Select Category</option>-->
                              <!--      <option value="Tops">Tops</option>-->
                              <!--      <option>Bottoms</option>-->
                              <!--      <option>Suit</option>-->
                              <!--      <option>Headwear</option>-->
                              <!--      <option>Footwear</option>-->
                              <!--      <option>Gadget</option>-->
                              <!--      <option>Accessories</option>-->
                              <!--   </select>-->
                              <!--</div>-->
                              <!--<div class="mb-3">-->
                              <!--   <label class="col-form-label pt-0" for="exampleInputEmail1">Sub Category</label>-->
                              <!--   <select disabled class="form-control" name="subCat" onchange="changeSub()" id="categorySelect" >-->
                              <!--      <option value=" " disabled selected>Select Category First</option>-->
                              <!--      <option></option>-->
                              <!--   </select>-->
                              <!--</div>-->
                              <!--<div class="mb-3">-->
                              <!--   <label class="col-form-label pt-0" for="exampleInputEmail1">Warehouse</label>-->
                              <!--   <select disabled class="form-control  "id="Select" name="warehouse"  onChange="myNewFunction(this);"  required></select>-->
                              <!--</div>-->
                              <!--<div class="mb-3">-->
                              <!--   <label class="col-form-label pt-0" for="exampleInputEmail1">Vendor</label>-->
                              <!--   <select disabled class="form-control  " id="WSelect" name="vendor"  onChange="myVFunction(this);" id="category_id"  required>-->
                              <!--   </select>-->
                              <!--</div>-->
                              <!--<div class="mb-3">-->
                              <!--   <label class="col-form-label pt-0" for="exampleInputEmail1">Lot</label>-->
                              <!--   <select disabled class="form-control  " id="VSelect" name="lot" id="category_id"  required>-->
                              <!--   </select>-->
                              <!--</div>-->
                              <!--<div class="card-header pb-0">-->
                              <!--   <h5>Attributes</h5>-->
                              <!--</div>-->
                              <!--<br/>-->
                              <!--<div class="mb-3">-->
                              <!--   <label class="col-form-label pt-0" for="exampleInputEmail1">Material</label>-->
                              <!--   <input disabled type="text" class="form-control aiz-tag-input" onchange="SendData()" name="material" >-->
                              <!--</div>-->
                              <!--<br/><br/>-->
                              <!--<div class="card-header" id="heading"> </div>-->
                              <!--<div class="card-body" id="mainBody"> </div>-->
                              </form>
                              <br/>  
                           </div>
                           <!--<div class="card-footer">-->
                           <!--   <button class="btn btn-primary" onclick="ShopifyPush()" id="Sbutton" disabled>Add to Shopify</button>-->
                           <!--   <button class="btn btn-secondary">Cancel</button>-->
                           <!--</div>-->
                        </div>
                     </div>
                     <div  class="col-sm-12" id="Mattr" style="display:none;">
                        <div class="card cardshadow">
                           <div class="card-header pb-0">
                              <h5>Attributes</h5>
                           </div>
                           <div class="card-body">
                              <div class="card-header" id="heading"> </div>
                              <div class="card-body" id="mainBody"> </div>
                           </div>
                        </div>
                     </div>
                     <div  class="col-sm-12" id="ebadyAttr">
                     </div>
                     <div class="card-body" id="snCDN" >
                        <div id="summernote"></div>
                     </div>
                     <div  class="col-sm-12">
                        <!--<button onclick="finalImages1()">GET</button>-->
                        <div class="card cardshadow">
                           <div class="card-header pb-0">
                              <h5>Images</h5>
                           </div>
                           <div class="card-body">
                              <ul id=""  class=" ulS">
                                 <li id="" class="imgLI"><img  id="img1" name="img1" class="productImage" src="https://icons-for-free.com/iconfiles/png/512/mountains+photo+photos+placeholder+sun+icon-1320165661388177228.png" /></li>
                                 <li   id=""   class="imgLI"><img  id="img2" name="img2" class="productImage" src="https://icons-for-free.com/iconfiles/png/512/mountains+photo+photos+placeholder+sun+icon-1320165661388177228.png" /></li>
                                 <li    id=""  class="imgLI"><img  id="img3" name="img3" class="productImage" src="https://icons-for-free.com/iconfiles/png/512/mountains+photo+photos+placeholder+sun+icon-1320165661388177228.png" /></li>
                                 <li   id=""    class="imgLI"><img  id="img4" name="img4" class="productImage" src="https://icons-for-free.com/iconfiles/png/512/mountains+photo+photos+placeholder+sun+icon-1320165661388177228.png" /></li>
                                 <li     id="" class="imgLI"><img  id="img5" name="img5" class="productImage" src="https://icons-for-free.com/iconfiles/png/512/mountains+photo+photos+placeholder+sun+icon-1320165661388177228.png" /></li>
                              </ul>
                           </div>
                           <!--<img src="close.png" height="25" width="25" style="position:relative;left:1px;top:1px;"/>-->
                           <!--/*<style>*/-->
                           <!--/*    .closeIcon{*/-->
                           <!--/*        position: relative;*/-->
                           <!--/*    }*/-->
                           <!--/*</style>*/-->
                           <!--begin::Form-->
                           <form class="form" action="#" method="post" id="dzform1">
                              <!--begin::Input group-->
                              <div class="fv-row">
                                 <!--begin::Dropzone-->
                                 <!--end::Dropzone-->
                              </div>
                              <!--end::Input group-->
                           </form>
                           <!--end::Form-->
                           <!--<button onclick="GETS()">GETZ</button>-->
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12 col-xl-4">
                     <div class="row">
                        <div  class="col-sm-12">
                           <div class="card cardshadow">
                              <div class="card-body">
                                 <div class="mb-3" >
                                    <h5>Category</h5>
                                    <select disabled class="form-control form-select  " id="SelectC" name="catID"  onchange="MakeSubcat()"   required></select>
                                 </div>
                                 <div class="mb-3">
                                    <h5>Sub-Category</h5>
                                    <select disabled class="form-control  form-select  " id="Select1" name="subcatValue"  onChange="subcatchange()"  required></select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div  class="col-sm-12">
                           <div class="card cardshadow">
                              <div class="card-body">
                                 <div class="mb-3" >
                                    <h5>Status</h5>
                                    <input disabled class="form-control " id="title" type="text" name="status" aria-describedby="emailHelp" placeholder="Enter Status">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div  class="col-sm-12">
                           <div class="card cardshadow">
                              <div class="card-body">
                                 <div class="mb-3" >
                                    <h5>Warehouse</h5>
                                    <br>
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Vendor</label>
                                    <select disabled class="form-control form-select  "id="Select" name="warehouse"  onChange="myNewFunction(this);"  required></select>
                                 </div>
                                 <div class="mb-3">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Batch</label>
                                    <input disabled class="form-control " id="title" type="text" name="batch" aria-describedby="emailHelp" placeholder="Enter Batch">
                                 </div>
                                 <div class="mb-3">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">SKU/Barcode</label>
                                    <input disabled class="form-control " id="SKU" type="text" name="sku" aria-describedby="emailHelp" placeholder="Enter SKU/Barcode">
                                 </div>
                                 <div class="mb-3">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Location</label>
                                    <input disabled class="form-control " id="title" type="text" name="location" aria-describedby="emailHelp" placeholder="Enter Location">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div  class="col-sm-12" id="ebayAttr2" >
                           <div class="card cardshadow">
                              <div class="card-body">
                                 <div class="mb-3" >
                                    <h5>Ebay Logistic Details</h5>
                                    <select disabled class="form-control form-select  "id="Select" name="warehouse"  onChange="myNewFunction(this);"  required></select>
                                 </div>
                                 <div class="mb-3">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Country</label>
                                    <select disabled class="form-control form-select  "  onchange="SendData()" name="gender">
                                       <option value=" ">Select  </option>
                                       <option value="PK">Pakistan</option>
                                       <option value="UK">UK</option>
                                    </select>
                                 </div>
                                 <div class="mb-3">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Currency</label>
                                    <select disabled class="form-control form-select  "  onchange="SendData()" name="gender">
                                       <option value=" ">Selectr</option>
                                       <option value="pkr">PKR</option>
                                       <option value="pound">POUND</option>
                                    </select>
                                 </div>
                                 <div class="mb-3">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Domestic Shipping Cost</label>
                                    <input disabled class="form-control " id="title" type="text" name="location" aria-describedby="emailHelp" placeholder="Enter Location">
                                 </div>
                                 <div class="mb-3">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Location</label>
                                    <input disabled class="form-control " id="title" type="text" name="location" aria-describedby="emailHelp" placeholder="Enter Location">
                                 </div>
                                 <div class="mb-3">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Postal Code</label>
                                    <input disabled class="form-control " id="title" type="text" name="location" aria-describedby="emailHelp" placeholder="Enter Location">
                                 </div>
                                 <div class="mb-3">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Domestic Courier</label>
                                    <select disabled class="form-control form-select  "  onchange="SendData()" name="gender">
                                       <option value=" ">Selectr</option>
                                       <option value="pkr">PKR</option>
                                       <option value="pound">POUND</option>
                                    </select>
                                 </div>
                                 <div class="media">
                                    <div class=" switch-sm">
                                       <label class="switch">
                                       <input disabled type="checkbox" id="depopSwitch" ><span class="switch-state"></span>
                                       </label>
                                    </div>
                                    <label class="col-form m-l-10 m-t-10 switchfont">Ebay International Shipping</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!--<div class="col-sm-12">-->
                        <!--   <div class="card cardshadow">-->
                        <!--      <div class="card-header pb-0">-->
                        <!--         <h5>Product price & Quantity</h5>-->
                        <!--      </div>-->
                        <!--      <div class="card-body">-->
                        <!--         <form class="theme-form mega-form">-->
                        <!--            <div class="mb-3">-->
                        <!--               <label class="col-form-label">Product price</label>-->
                        <!--               <input disabled class="form-control" type="number"  id="price" name="price" placeholder="Product price">-->
                        <!--                  <p class="col-md-7 text-muted  ">Suggested Price(For Sneakers Only): <b id="Predict"></b> <b  id="sAPI"></b> </p>-->
                        <!--<b  id="sAPI">0</b>-->
                        <!--            </div>-->
                        <!--            <div class="mb-3">-->
                        <!--               <label class="col-form-label">Quantity</label>-->
                        <!--               <input disabled class="form-control" type="text" placeholder="Quantity">-->
                        <!--            </div>-->
                        <!--            <div class="mb-3">-->
                        <!--               <label class="col-form-label">SKU</label>-->
                        <!--               <input disabled class="form-control" id="SKU" type="text" placeholder="Enter SKU">-->
                        <!--            </div>-->
                        <!--            <div class="mb-3">-->
                        <!--               <label class="col-form-label">Weight(In Kg)</label>-->
                        <!--               <input disabled class="form-control" type="text" placeholder="Enter Weight(In Kg)">-->
                        <!--            </div>-->
                        <!--            <hr class="mt-4 mb-4">-->
                        <!--            <h6>Product Status</h6>-->
                        <!--            <div class="mb-3">-->
                        <!--               <label class="col-form-label">ID</label>-->
                        <!--               <input disabled class="form-control" type="text" id="pID" placeholder="ID" disabled>-->
                        <!--            </div>-->
                        <!--            <div class="mb-3">-->
                        <!--               <label class="col-form-label">Date</label>-->
                        <!--               <input disabled class="form-control" id="pDate" type="text" placeholder="DATE" disabled>-->
                        <!--            </div>-->
                        <!--         </form>-->
                        <!--         <br/><br/><br/>-->
                        <!--         <hr class="mt-4 mb-4">-->
                        <!--         <h6 class="pb-3 mb-0">Product Images</h6>-->
                        <!--         <div class="col-sm-12">-->
                        <!--            <div class="card">-->
                        <!--               <div class="card-header pb-0">-->
                        <!--<h5>Image Upload</h5>-->
                        <!--               </div>-->
                        <!--               <div class="card-body">-->
                        <!--                     <form action="upload.php" class="dropzone"  id="myDropzone">-->
                        <!--                          <div class="dz-message needsclick">-->
                        <!--                        <i class="icon-cloud-up"></i>-->
                        <!--                        <h6>Drop files here OR Click to upload.</h6>-->
                        <!--                        <span class="note needsclick"></span>-->
                        <!--                     </div>-->
                        <!--                     </form>-->
                        <!--                      <br/>-->
                        <!--<button type="button" class="btn btn-success" id="submit">Upload</button>-->
                        <!--               </div>-->
                        <!--            </div>-->
                        <!--         </div>-->
                        <!--         <div class="card card-absolute">-->
                        <!--            <div class="card-header bg-primary">-->
                        <!--               <h5 class="text-white">Product Description</h5>-->
                        <!--            </div>-->
                        <!--            <div class="card-body">-->
                        <!--               <div style="background-color:#F6F2F2;" id="iDetails"></div>-->
                        <!--            </div>-->
                        <!--         </div>-->
                        <!--<button class="btn btn-secondary" onclick="SendData()">Preview</button>-->
                        <!--      </div>-->
                        <!--      <div class="card-footer">-->
                        <!--      </div>-->
                        <!--   </div>-->
                        <!--</div>-->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- row cycle -->
   <div class="row">
      <div class="col-sm-6 p-t-30 p-l-40">
         <h2><b>Lifecycle</b></h2>
         <br><br>
      </div>
      <div class="col-md-12 m-b-30">
         <ul class="timelineleft pb-5" id="timeline">
            <?php
               while($row2 =mysqli_fetch_array($result2))
               {
                 $status=$row2['Status'];
                 $datetime=$row2['DateTime'];
                 $userid = $row2['User_ID'];
                 // echo "<h2>" . $reference . "</h2>";
                 if($userid!=0)
                 {
                   $sql3="Select * from `User` Where User_ID='$userid'";
                   $result3 = mysqli_query($mysql, $sql3);
                   $row3 =mysqli_fetch_array($result3);
                   $name=$row3['Name'];
                   echo 
                   "<li>
                     <i class='fa fa-circle '></i>
                     <div class='timelineleft-item'>
                       <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;$datetime</i></span>
                       <h3 class='timelineleft-header no-border'>$status by $name</h3>
                     </div>
                   </li>"; 
                 }
                 else if ($userid == 0)
                 {
                   echo 
                   "<li>
                     <i class='fa fa-circle '></i>
                     <div class='timelineleft-item'>
                       <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;$datetime</i></span>
                       <h3 class='timelineleft-header no-border'> $status by Unknown user </h3>
                     </div>
                   </li>"; 
                 }
                 
                 
               }
               if ($warehouse_id != 0){
               echo 
               "
                 <li>
                 <i class='fa fa-circle '></i>
                 <div class='timelineleft-item'>
                 <h3 class='timelineleft-header no-border'>Item has been auto-allocated at echo $rack_pos in a $warehouse_location</h3>
                 </div>
                 </li>
               ";
               }
               else{
               echo 
               "
                 <li>
                 <i class='fa fa-circle '></i>
                 <div class='timelineleft-item'>
                 <h3 class='timelineleft-header no-border'>Item has been auto-allocated at echo $rack_pos in a warehouse</h3>
                 </div>
                 </li>
               ";
               
               
               }
               
               
               
               ?>
            <!-- <li>
               <i class='fa fa-circle '></i>
               <div class='timelineleft-item'>
               <?php
                  if ($warehouse_id != 0){
                  "<h3 class='timelineleft-header no-border'>Item has been auto-allocated at echo $rack_pos in a $warehouse_location</h3>";
                  }
                  else{
                  "<h3 class='timelineleft-header no-border'>Item has been auto-allocated at echo $rack_pos in a warehouse</h3>";
                  
                  
                  }
                  ?>
               </div>
               </li> -->
            <li>
               <i class='fa fa-circle '></i>
               <div class='timelineleft-item'>
                  <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;2023-03-20 11:31:00</i></span>
                  <h3 class='timelineleft-header no-border'>Item has been received in Swag Warehouse by Daniyal Sheikh.</h3>
               </div>
            </li>
            <li>
               <i class='fa fa-circle '></i>
               <div class='timelineleft-item'>
                  <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;2023-03-20 11:31:00</i></span>
                  <h3 class='timelineleft-header no-border'>Item has been restocked by Muteeb Ahmed.</h3>
               </div>
            </li>
            <li>
               <i class='fa fa-circle '></i>
               <div class='timelineleft-item'>
                  <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;2023-03-20 11:31:00</i></span>
                  <h3 class='timelineleft-header no-border'>Item has been received as return by Muteeb Ahmed.</h3>
               </div>
            </li>
            <li>
               <i class='fa fa-circle '></i>
               <div class='timelineleft-item'>
                  <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;2023-03-20 11:31:00</i></span>
                  <h3 class='timelineleft-header no-border'>Return initiated by Nimra Khan.</h3>
               </div>
            </li>
            <li>
               <i class='fa fa-circle '></i>
               <div class='timelineleft-item'>
                  <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;2023-03-20 11:31:00</i></span>
                  <h3 class='timelineleft-header no-border'>SK-H19021 has been dispatched by M Ahmed.</h3>
               </div>
            </li>
            <li>
               <i class='fa fa-circle '></i>
               <div class='timelineleft-item'>
                  <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;2023-03-20 11:31:00</i></span>
                  <h3 class='timelineleft-header no-border'>Order #68306 has been packed by M Ahmed at packing station.</h3>
               </div>
            </li>
            <li>
               <i class='fa fa-circle '></i>
               <div class='timelineleft-item'>
                  <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;2023-03-20 11:31:00</i></span>
                  <h3 class='timelineleft-header no-border'>SK-H19021 has been received by M Ahmed at packing station.</h3>
               </div>
            </li>
            <li>
               <i class='fa fa-circle '></i>
               <div class='timelineleft-item'>
                  <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;2023-03-20 11:31:00</i></span>
                  <h3 class='timelineleft-header no-border'>SK-H19021 has been picked by Ayub Khawar.</h3>
               </div>
            </li>
            <li>
               <i class='fa fa-circle '></i>
               <div class='timelineleft-item'>
                  <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;2023-03-20 11:31:00</i></span>
                  <h3 class='timelineleft-header no-border'>Order #68306 has been received..</h3>
               </div>
            </li>
            <li>
               <i class='fa fa-circle '></i>
               <div class='timelineleft-item'>
                  <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;2023-03-20 11:31:00</i></span>
                  <h3 class='timelineleft-header no-border'>Item Price has been edited by Saiban Ahmed from Rs.1500 to Rs.2000.</h3>
               </div>
            </li>
            <li>
               <i class='fa fa-circle '></i>
               <div class='timelineleft-item'>
                  <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;2023-03-20 11:31:00</i></span>
                  <h3 class='timelineleft-header no-border'>Item has been received in Swag Warehouse by Daniyal Sheikh.</h3>
               </div>
            </li>
            <li>
               <i class='fa fa-circle '></i>
               <div class='timelineleft-item'>
                  <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;2023-03-20 11:31:00</i></span>
                  <h3 class='timelineleft-header no-border'>Item has been auto-allocated at R1-R5-C9 in Swag Warehouse.</h3>
               </div>
            </li>
            <li>
               <i class='fa fa-circle '></i>
               <div class='timelineleft-item'>
                  <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;2023-03-20 11:31:00</i></span>
                  <h3 class='timelineleft-header no-border'>Item has been published by Saiban Ahmed.</h3>
               </div>
            </li>
            <li>
               <i class='fa fa-circle '></i>
               <div class='timelineleft-item'>
                  <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp;2023-03-20 11:31:00</i></span>
                  <h3 class='timelineleft-header no-border'>Images have been added by Ahmed Imran.</h3>
               </div>
            </li>
            <li>
               <i class='fa fa-circle '></i>
               <div class='timelineleft-item'>
                  <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp; 2023-03-20 11:31:00</i></span>
                  <h3 class='timelineleft-header no-border'><a>SKU :</a> <span class='text-muted'><b>SK-H19021</b> has been generated via Batch #00018 by Tabish Khan</span></h3>
               </div>
            </li>
         </ul>
      </div>
   </div>
   <!-- row cycle -->
   <!--</div>-->
</div>
</div>
<!-- Container-fluid Ends-->
</div>
<!--CUSTOM JS-->
<style>
   input:focus, textarea:focus{
   background-color: red;
   }
</style>
<script>
   function CategoryChange(){
   
   var settings = {
   "url": "/ShopifyPush/api/getCat.php",
   "method": "POST",
   "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
   var data = JSON.parse(response);
   
   
   
   
   for (var i = 0; i < data.length; i++) {
   
      
   var select = document.getElementById("SelectC");
   var option = document.createElement("option");
   option.text = data[i].Name;
   option.value = data[i].Category_ID;
   select.add(option);
   
   }
   });
   
   }
   
   
   const myTimeout1 = setTimeout( CategoryChange(), 500);
   
   
   
   var inputvalues = []
   var finalValues = ""
   function getAttrValue(){
   
   var inputs = document.querySelectorAll('#formArea input');
   for(var i = 0; i < inputs.length; i++){
   
   inputvalues.push({[inputs[i].id]:inputs[i].value})
   
   
   var finalInputarray = inputvalues.slice((inputvalues.length - inputs.length), inputvalues.length)
   
   finalValues = finalInputarray 
   }
   
   
   
   
   
   }
   
   
   
   
   
   $('#imageInput').change(function(){
   var frm = new FormData();
   frm.append('imageInput', input.files[0]);
   $.ajax({
   method: 'POST',
   address: 'backup.thriftops.com/ShopifyPush/upload',
   data: frm,
   contentType: false,
   processData: false,
   cache: false
   });
   alert("UPLOADED")
   });
   
   $('#summernote').summernote({
   placeholder: 'Product Details',
   tabsize: 2,
   height: 120,
   toolbar: [
     ['style', ['style']],
     ['font', ['bold', 'underline', 'clear']],
     ['color', ['white']],
     ['para', ['ul', 'ol', 'paragraph']],
     ['table', ['table']],
     ['insert', ['link', 'picture', 'video']],
     ['view', ['fullscreen', 'codeview', 'help']]
   ]
   });
   
   
   
   $(document).ready(function (){
   validate();
   $('#title, #price, #SKU').change(validate);
   });
   
   function validate(){
   if ($('#title').val().length   >   0   &&
   $('#price').val().length  >   0   &&
   $('#SKU').val().length    >   0) {
   $('#Sbutton').prop("disabled", false);
   }
   else {
   
   $('#Sbutton').prop("disabled", true);
   }
   }
   
   function loadFormData(customerObj) {
   let fields = ['id', 'fullName', 'email'];
   
   fields.forEach((field) => {
   $(`#${field}`).val(customerObj[field])
   });
   }
   
   
   function Retvalues(){
   
   var form = new FormData();
   var settings = {
   "url": "https://backup.thriftops.com/ShopifyPush/api/getProduct.php?id=67",
   "method": "POST",
   "timeout": 0,
   "processData": false,
   "mimeType": "multipart/form-data",
   "contentType": false,
   "data": form
   };
   
   $.ajax(settings).done(function (response) {
   var JRES = JSON.parse(response)
   //   console.log(JRES)
   //console.log(JRES[0].att)
   var attArr = JSON.parse(JRES[0].att)
   console.log("attArr",JRES[0].att)
   var KEYSARR = []
   var KEYSARR2 = []
   var KEYS =  Object.keys(attArr)
   
   
   
   var KEYSARR = []
   var KEYSARR2 = []
   for (let i = 0; i < attArr.length; i++) {
   var KEYS =  Object.keys(attArr[i])
   KEYSARR.push(KEYS);
   
   
   
   
   
   }
   
   for (let a = 0; a < KEYSARR.length; a++) {
   
   var K2S = KEYSARR[a].toString();
   
   KEYSARR2.push(K2S);
   
   
   
   }
   
   
   // Returns a Promise that resolves after "ms" Milliseconds
   const timer = ms => new Promise(res => setTimeout(res, ms))
   
   async function forwardMapping () { // We need to wrap the loop into an async function for this to work
   for (var i = 0; i < attArr.length; i++) {
   
   var key = [KEYSARR2[i]];
   var K2S = key.toString();
   var keyValue = attArr[i][key]
   console.log("VALUE IS "+keyValue ,  "INPUT NAME IS " + K2S)
   
   
   valuesMapper(K2S,keyValue)
   
   
   await timer(1000); // then the created Promise can be awaited
   }
   }
   
   forwardMapping();
   
   function valuesMapper(input1,value1){
   
   $("#"+ input1).val(value1);
   
   
   }
   
   
   
   
   
   
   
   
   });
   }
   
   
   
   
   // CUSTOM SCRIPT(WASAY)
   
   // SIKANDAR NOT ALLOWED HERE
   
   
   
   
   function MakeSubcat(){
    var id = $("select[name=catID]").val();
    //console.log("idssss",id)
   var settings = {
   "url": "https://backup.thriftops.com/ShopifyPush/api/getallattr.php?id=" + id,
   "method": "POST",
   "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
   var data = JSON.parse(response);
   
   
   
   
   for (var i = 0; i < data.length; i++) {
   
     
   var select = document.getElementById("Select1");
   var option = document.createElement("option");
   option.text = data[i].Name;
   option.value = data[i].Sub_Category_ID;
   select.add(option);
   
   }
   });
   
   }
   
   
   
   
   
   
   
   
   
   
   
   // const myTimeout2 = setTimeout( MakeSubcat(), 500);
   
   
   
   
   
   
                                                                                                                                                                                                                                                  
   
   
   
   
   function subcatchange(){
                          Retvalues()                                                                                                                                                                                                                                    
   
   d = document.getElementById("Select1").value;
   alert(d);
   var settings = {
   "url": "https://backup.thriftops.com/ShopifyPush/api/getSubattr.php?id="+d,
   "method": "GET",                        
   "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
   var jRES = JSON.parse(response)
   console.log("jRES",jRES[0])
   document.getElementById('mainBody').innerHTML =" "  ; 
   document.getElementById('heading').innerHTML =" "  ; 
   $("#Mattr").removeAttr("style");
   document.getElementById("heading").innerHTML +=`<h5 class='mb-0 h6'>Product Variations for <small>${jRES[0].Name}</small></h5> `  ; 
   document.getElementById('mainBody').innerHTML += jRES[0].attribute
   });
   }
   
   
   
   
   
   $("#ebayAttr2").hide();
   $("#snCDN").hide();
   function suggestionApi(){
   
   var brand = $("select[name=brand]").val();
   var size = $("input[name=sneakerSize]").val();
   var conS = $("select[name=condition]").val();
   
   
   $("#Predict").text("Fetching Data....");
   setTimeout(function() {
   $("#Predict").delay(2000).text("Calculating Price....")
   }, 1000);
   
   var Cond = ( conS == "9/10") ? "Nine" : ( conS == "8/10") ? "Eight" :  ( conS == "7/10") ? "Seven" :( conS == "10/10") ? "Ten" : "Ten";
   
   
   
   
   var settings = {
   "url": "https://skshoesapi.herokuapp.com/predict?brand="+brand+"&size="+size+"&cond="+Cond+"&dts=10",
   "method": "POST",
   "timeout": 0,
   };
   
   
   
   $.ajax(settings).done(function (response) {
   console.log(response)
   $("#Predict").hide(),
   document.getElementById("sAPI").innerHTML=response;
   
   
   
   });
   
   
   }
   
   var subCatValue = " "
   
                     
   
   
   
   
   
   
   
   
   
   function Warehouse(){
   
   var settings = {
   "url": "/ShopifyPush/api/Warehouse.php",
   "method": "POST",
   "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
   var data = JSON.parse(response);
   
   
   
   
   for (var i = 0; i < data.length; i++) {
   
      console.log(data[i].Location);
   var select = document.getElementById("Select");
   var option = document.createElement("option");
   option.text = data[i].Location;
   option.value = data[i].Warehouse_ID;
   select.add(option);
   
   }
   });
   
   }
   
   
   const myTimeout = setTimeout( Warehouse(), 500);
   
   
   
   
   
   function myNewFunction(sel) {
       
       
     var value = sel.options[sel.selectedIndex].text;    
       
       var settings = {
   "url": "/ShopifyPush/api/SKU.php?name=" + value,
   "method": "POST",
   "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
   
   var SKU = response
   document.getElementById("SKU").value= SKU;
   });
       
       
       
       
       
       
       
        var wselect = document.getElementById("WSelect");
   $('#WSelect')
   .empty()
   .append('<option selected="selected" value="whatever">Select Vendor</option>')
   ;
       
   
   
   var settings = {
   "url": "/ShopifyPush/api/Vendor.php?name="+ value,
   "method": "POST",
   "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
   
    var data = JSON.parse(response);
   for (var i = 0; i < data.length; i++) {
   
          
       var woption = document.createElement("option");
   woption.text = data[i].Name;
   woption.value = data[i].Vendor_ID;
   wselect.add(woption);
   
   }
   });
   
   
   }
   
   
   
   function myVFunction(vsel) {
       
        var vselect = document.getElementById("VSelect");
   $('#VSelect')
   .empty()
   .append('<option selected="selected" value="whatever">Select Lot</option>')
   ;
       
   var value = vsel.options[vsel.selectedIndex].value;
   
   var settings = {
   "url": "/ShopifyPush/api/Lot.php?name="+ value,
   "method": "POST",
   "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
   
    var data = JSON.parse(response);
   for (var i = 0; i < data.length; i++) {
      console.log(data[i].Location);
          
       var voption = document.createElement("option");
   voption.text = data[i].Number;
   voption.value = data[i].Lot_ID;
   vselect.add(voption);
   
   }
   });
   
   
   }
   
     //image PUSHER
   
    var imageA = []  
   
   Dropzone.options.myDropzone = {
   
       parallelUploads: 5,
   autoProcessQueue: true, //This stops auto processing
   acceptedFiles:".png,.jpg", //Change it according to your requirement.
   
   // var submit = document.querySelector('#submit');
   // submit.click();
   init: function(){
       var submit = document.querySelector('#submit');
       mydropzone = this;
     
           mydropzone.processQueue();
    
       this.on("success", function(file,response){
       var dataI = JSON.parse(response)
       
        image1 = String(dataI[0]);
        
    imageA.push('https://backup.thriftops.com/ShopifyPush/'+image1)
    
       console.log(dataI)
           
        
       });
   },
      
   };
   
   
   
   
   
   $("#selUser").select2({
   ajax: { 
    url: "https://backup.thriftops.com/ShopifyPush/api/Brands.php",
    type: "post",
    dataType: 'json',
    delay: 250,
    data: function (params) {
        return {
            searchTerm: params.term // search term
        };
    },
    processResults: function (response) {
        return {
            
            results: response
        };
    },
    cache: true
   }
   });
   
   
   function selectAllSwitches(){
     
       document.getElementById("wcSwitch").click();
       document.getElementById("fbSwitch").click();
       document.getElementById("depopSwitch").click();
       document.getElementById("ebaySwitch").click();
     
   }
   
   
   var ebayattr = ` <div class="card cardshadow">
                                          <div class="card-header pb-0">
                                     <h5>Ebay Attributes</h5>
                                  </div>
                                   <div class="card-body">
                                    <div class="col-sm-12 row">
                                              <div class="col-sm-6">
                                                       <label class="col-form-label pt-0" >Category</label>
                                                     <input disabled class="form-control "  type="text" name="material"  placeholder="Enter Material">
                                              </div>
                                              <div class="col-sm-6">
                                                       <label class="col-form-label pt-0" >Style</label>
                                                     <input disabled class="form-control "  type="number" name="weight"  placeholder="Enter Weight">
                                              </div>
                                          </div>
                                                    <div class="col-sm-12 row">
                                              <div class="col-sm-6">
                                                       <label class="col-form-label pt-0" >Type</label>
                                                     <input disabled class="form-control "  type="text" name="material" placeholder="Enter Material">
                                              </div>
                                              <div class="col-sm-6">
                                                       <label class="col-form-label pt-0" >MPN</label>
                                                     <input disabled class="form-control "  type="number" name="weight"  placeholder="Enter Weight">
                                              </div>
                                          </div>
                                          <div class="col-sm-12 row">
                                              <div class="col-sm-6">
                                                       <label class="col-form-label pt-0" >Size Type</label>
                                                     <input disabled class="form-control "  type="text" name="material" placeholder="Enter Material">
                                              </div>
                                              <div class="col-sm-6">
                                                       <label class="col-form-label pt-0" >Condition</label>
                                                              <select disabled class="form-control form-select  "  name="gender">
                                          <option value=" ">Select condition</option>
                                              <option value="7/10">7/10</option>
                                              <option value="8/10">8/10</option>
                                              <option value="9/10">9/10</option>
                                              <option value="10/10">10/10</option>
                                              <option value="Brand New">Brand New</option>
                                           
                                           </select>
                                              </div>
                                          </div>
                                                                         
                                       </div>
                                          
                                     </div>  `
   
   
   function EbayHandler(){
   
   if( $('#ebaySwitch').is(':checked')){
   
   document.getElementById('ebadyAttr').innerHTML = ebayattr
   // $("#snCDN").removeAttr("style");
     $("#ebayAttr2").show();
   $("#snCDN").show();
   
   }else{
   
   document.getElementById('ebadyAttr').innerHTML = " ";
   $("#ebayAttr2").hide();
   $("#snCDN").hide();
   
   
    
   }
   
   }
   
   
   
</script>
<script>
   $( function() {
     $( "#sortable" ).sortable();
     $( "#sortable" ).disableSelection();
   } );
</script>
<style>
   .ulS {
   margin: 0;
   padding: 0;
   }
   .liS {
   margin: 5px 0;
   padding: 0 20px;
   line-height: 40px;
   color: #fff;
   list-style: none;
   }
   .ulS li {
   object-fit: contain;
   display: inline-block;
   list-style-type: none;
   background-color: #f7f7f7;
   color: #198eff;
   width: 182px;
   box-shadow: 5px 5px 10px #d7d7d7;
   }
   .liS.drag-sort-active {
   background: transparent;
   color: transparent;
   border: 1px solid #4ca1af;
   }
   .span.drag-sort-active {
   background: transparent;
   color: transparent;
   }
   .productImage{
   pointer-events: none; 
   height:180px;
   width:180px;
   }
</style>
<script>
   //alert("STARTED")
   function enableDragSort(listClass) {
   const sortableLists = document.getElementsByClassName(listClass);
   Array.prototype.map.call(sortableLists, (list) => {enableDragList(list)});
   }
   
   function enableDragList(list) {
   Array.prototype.map.call(list.children, (item) => {enableDragItem(item)});
   }
   
   function enableDragItem(item) {
   item.setAttribute('draggable', true)
   item.ondrag = handleDrag;
   item.ondragend = handleDrop;
   }
   
   function handleDrag(item) {
   const selectedItem = item.target,
      list = selectedItem.parentNode,
      x = event.clientX,
      y = event.clientY;
   
   selectedItem.classList.add('drag-sort-active');
   let swapItem = document.elementFromPoint(x, y) === null ? selectedItem : document.elementFromPoint(x, y);
   
   if (list === swapItem.parentNode) {
   swapItem = swapItem !== selectedItem.nextSibling ? swapItem : swapItem.nextSibling;
   list.insertBefore(selectedItem, swapItem);
   }
   }
   
   function handleDrop(item) {
   item.target.classList.remove('drag-sort-active');
   }
   
   (()=> {enableDragSort('drag-sort-enable')})();
   
   
   
   
</script>
<script>
   //      function GETS(){
   //       var someimage = document.getElementById('sortUl');
   // //var myimg = someimage.getElementsByTagName('img')[0];
   // // var mysrc = myimg.src;
   
   //  var myimg = someimage.getElementsByTagName('img')
   
    
   // console.log(myimg[0].currentSrc)
   
   // }
             var URL =  "https://backup.thriftops.com/ShopifyPush/upload/"
            var imgSrc = []
           //DropZone
           var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
       url: "https://backup.thriftops.com/ShopifyPush/upload.php", // Set the url for your upload script location
       paramName: "file", // The name that will be used to transfer the file
       maxFiles: 10,
       maxFilesize: 10, // MB
       addRemoveLinks: true,
       accept: function(file, done) {
   imgSrc.push(file.name) 
         
        
              
              swapImage(imgSrc[0],imgSrc[1],imgSrc[2],imgSrc[3],imgSrc[4])
          
           
       }
   });
   
   
   function swapImage(img1,img2,img3,img4,img5){
       
         
   
      $("#img1").attr("src",URL+img1);
        $("#img2").attr("src",URL+img2);
          $("#img3").attr("src",URL+img3);
            $("#img4").attr("src",URL+img4);
              $("#img5").attr("src",URL+img5);
              
              
              $("#dzform1").hide();
                $("#sortUl").show();
          
   }
   
     
   
    
</script>
<script>
   var params = new window.URLSearchParams(window.location.search);
   var gid = params.get('id');
   
   var settings = {
   "url": "https://backup.thriftops.com/ShopifyPush/api/Viewproduct.php?id="+gid,
   "method": "GET",
   "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
   var JRES = JSON.parse(response);
   console.log(JRES)
   //     console.log(JRES[0])
   //  console.log(JRES[0].SKU)
   var skuz =JRES[0].SKU;
   $("#skuz").text(JRES[0].SKU);
   $("#datez").text(JRES[0].DateTime);
         
   $("input[name=title]").val(JRES[0].Title);
   
   $("select[name=condition]").val(JRES[0].Cndition);
   $("input[name=quantity]").val(JRES[0].qty);
   $("input[name=made]").val(JRES[0].Made);
   $("input[name=material]").val(JRES[0].qty);
   $("input[name=weight]").val(JRES[0].Weight);
   $("input[name=price]").val(JRES[0].Price);
   $("select[name=gender]").val(JRES[0].Gender);
   $("select[name=catID]").val(JRES[0].Category_ID);
   $("select[name=subcatValue]").val(JRES[0].Sub_Category_ID);
   $("select[name=warehouse]").val(JRES[0].Warehouse_ID);
   $("input[name=status]").val(JRES[0].Status);
   $("input[name=sku]").val(JRES[0].SKU);
   $("#selUser").val(JRES[0].Brand);
   
   
   document.getElementById('img1').src=JRES[0].Image_1
   document.getElementById('img2').src=JRES[0].Image_2
   document.getElementById('img3').src=JRES[0].Image_3
   document.getElementById('img4').src=JRES[0].Image_4
   document.getElementById('img5').src=JRES[0].Image_5
   
   
   
   
   MakeSubcat()
   
   
   
   
   // var title = $("input[name=title]").val();
   //   var made = $("input[name=made]").val();
   //      var category =  $('#category option:selected').val()
   //      var subCategory = $("select[name=subCat]").val();
   //      var warehouse = $("select[name=warehouse]").val();
   //       var vendor = $("select[name=vendor]").val();
   //         var lot = $("input[name=Lot]").val();
   
   
   
   });
</script>
<script>
   function EditPro(){
       
              var params = new window.URLSearchParams(window.location.search);
   var gid = params.get('id');
    
       document.location.href = 'editProduct.php?id='+gid
   
       
       
   }
   
   //     const getLogs = () =>{
   // var params = new window.URLSearchParams(window.location.search);
   // var gid = params.get('id');
   
   
   // var settings = {
   //   "url": "https://backup.thriftops.com/ShopifyPush/api/getLogs.php?id="+gid,
   //   "method": "GET",
   //   "timeout": 0,
   // };
   
   // $.ajax(settings).done(function (response) {
   //   var JRES = JSON.parse(response)
   //   console.log("JRES",JRES)
   //   var time = JRES[0].DateTime
   //     var Name = JRES[0].Name
   //   document.getElementById('timeline').innerHTML +=`  <li>
   //             <i class='fa fa-circle '></i>
   //             <div class='timelineleft-item'>
   //                  <span class='time'><i class='fa fa-clock-o text-danger'>&nbsp; ${time}</i></span>
   //               <h3 class='timelineleft-header no-border'><a>Product Status :</a> <span class='text-muted'><b>${Name}</b> has added a product</span></h3>
   //             </div>
   //           </li>`
   
   // });
   
   
   
   
   
   // }
   
   //  getLogs()
   
   
</script>
<!-- footer start-->
<?php include("../include/footer.php");?>
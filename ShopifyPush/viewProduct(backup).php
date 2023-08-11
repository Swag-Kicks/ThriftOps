<?php include("../include/header.php");?>
<?php include("../include/sidebar.php");?>
<link rel="stylesheet" type="text/css" href="assets/css/dropzone.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.16.6/lodash.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="application/javascript" src="assets/custom/elements.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

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
                .borderdark{
                    
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
   <div class="container-fluid">
        <div style="float:right;">
          <button class="btn btn-outline-info" type="button">QC Rejected </button>
       <button class="btn btn-danger"  type="button"  onclick="ShopifyPush()" id="Sbutton" disabled>Save</button>
     </div>
     <h3><b>Add Products</b></h3>
    
   
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
                                          <h5>Product Information</h5>
                                       </div>
                                       <div class="card-body">
                                          <form class="theme-form">
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0">Title</label>
                                                <input class="form-control borderdark" id="title" type="title"  onchange="SendData()" name="title" placeholder="Enter Product Name">
                                             </div>
                                             <div class="col-sm-12 row">
                                                 <div class="col-sm-6">
                                                       <div class="mb-3">
                                                <label class="col-form-label pt-0">Condition</label>
                                                <select class="form-control form-select borderdark " name="condition" onchange="SendData()" id="condition_id">
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
                                            
           <select id='selUser' class="form-control form-select borderdark" >
 <option value='0'>- Search Brand -</option>
</select>
                                             </div>
                                                  </div>
                                                 
                                             </div>
                                             
                                               <div class="col-sm-12 row">
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Quantity</label>
                                                          <input class="form-control borderdark" type="number" name="quantity"  onchange="SendData()"  placeholder="Enter Quantity">
                                                   </div>
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Made in</label>
                                                          <input class="form-control borderdark" type="text" name="made"  onchange="SendData()" aria-describedby="emailHelp" placeholder="Enter Made in">
                                                   </div>
                                               </div>
                                               
                                                        <div class="col-sm-12 row">
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Material</label>
                                                          <input class="form-control borderdark"  type="text" name="material"  onchange="SendData()" placeholder="Enter Material">
                                                   </div>
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Weight</label>
                                                          <input class="form-control borderdark"  type="number" name="weight"  onchange="SendData()" placeholder="Enter Weight">
                                                   </div>
                                               </div>
                                               
                                                           <div class="col-sm-12 row">
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Price</label>
                                                          <input class="form-control borderdark" id="price" type="number"  onchange="SendData()" name="price"  placeholder="Enter Price">
                                                   </div>
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0">Gender</label>
                                                          <select class="form-control form-select borderdark "  onchange="SendData()" name="gender">
                                                   <option value=" ">Select Gender</option>
                                                   <option value="Male">Male</option>
                                                   <option value="Female">Female</option>
                                                
                                                </select>
                                                   </div>
                                               </div>
                                                  </div>
                                                 
                            
                                          
                                             
                                             <!--<div class="mb-3">-->
                                             <!--   <label class="col-form-label pt-0" for="exampleInputEmail1">Made in</label>-->
                                             <!--   <input class="form-control"  type="text" name="made" onchange="SendData()" aria-describedby="emailHelp" placeholder="Enter Made in">-->
                                             <!--</div>-->
                                             <!--<div class="mb-3">-->
                                             <!--   <label class="col-form-label pt-0" for="exampleInputEmail1">Category</label>-->
                                             <!--   <select class="form-control" style="border:1px solid grey;" id="category"  onchange="makeSubmenu(this.value)">-->
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
                                             <!--   <select class="form-control" name="subCat" onchange="changeSub()" id="categorySelect" >-->
                                             <!--      <option value=" " disabled selected>Select Category First</option>-->
                                             <!--      <option></option>-->
                                             <!--   </select>-->
                                             <!--</div>-->
                                             <!--<div class="mb-3">-->
                                             <!--   <label class="col-form-label pt-0" for="exampleInputEmail1">Warehouse</label>-->
                                             <!--   <select class="form-control  "id="Select" name="warehouse"  onChange="myNewFunction(this);"  required></select>-->
                                            
                                             
                                             <!--</div>-->
                                             <!--<div class="mb-3">-->
                                             <!--   <label class="col-form-label pt-0" for="exampleInputEmail1">Vendor</label>-->
                                             <!--   <select class="form-control  " id="WSelect" name="vendor"  onChange="myVFunction(this);" id="category_id"  required>-->
                                             <!--   </select>-->
                                             <!--</div>-->
                                             <!--<div class="mb-3">-->
                                             <!--   <label class="col-form-label pt-0" for="exampleInputEmail1">Lot</label>-->
                                             <!--   <select class="form-control  " id="VSelect" name="lot" id="category_id"  required>-->
                                             <!--   </select>-->
                                             <!--</div>-->
                                             <!--<div class="card-header pb-0">-->
                                             <!--   <h5>Attributes</h5>-->
                                             <!--</div>-->
                                             <!--<br/>-->
                                           
                                           
                                             <!--<div class="mb-3">-->
                                             <!--   <label class="col-form-label pt-0" for="exampleInputEmail1">Material</label>-->
                                             <!--   <input type="text" class="form-control aiz-tag-input" onchange="SendData()" name="material" >-->
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
                                                                             <button onclick="finalImages1()">GET</button>
                                          <div class="card cardshadow">
                                               <div class="card-header pb-0">
                                          <h5>Images</h5>
                                       </div>
                                          <div class="card-body">
                                                      <!--<form action="upload.php" class="dropzone" id="myDropzone">-->
                                                      <!--     <div class="dz-message needsclick">-->
                                                      <!--   <i data-feather="upload-cloud" style="color:#D00000; height:150px;width:150px;"></i>-->
                                                      <!--   <h6>Drop files here OR Click to upload.</h6>-->
                                                      <!--   <span class="note needsclick"></span>-->
                                                      <!--</div>-->
                                                      <!--</form>-->
                                                      
                                                      
                                             <!--//custom DZ         -->
                                                      
                                                     
                                                      <form method="post" action="upload.php" enctype="multipart/form-data" id="form">
    <!-- <input type="file" name="images[]" id="input" multiple> -->

    <label for="file-upload" class="custom-file-upload">
        <i class="fa fa-cloud-upload"></i> Upload
    </label>
    <!-- <input id="file-upload" type="file"/> -->
    <input type="file" name="images[]"  id="file-upload" multiple>
     <button type="submit">Save</button> 
</form>


<!-- 
<button onclick="finalImages1()">kk</button> -->

<!-- This <div> will be made sortable with SortableJS -->
<div id="preview-parent">

</div>
                                                      
                                                      
                                                      
                                          <input type='file' id="imageInput" name="imageInput" accept="image/*"/>            
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                       <br/>
                                                         <!--<button type="button" class="btn btn-success" id="submit">Upload</button>-->
                                                       
                                                </div>
                                               
                                          </div>  
                                          
                                                   <div class="card card-absolute">-->
                                             <div class="card-header bg-primary">
                                                <h5 class="text-white">Product Description</h5>
                                             </div>
                                             <div class="card-body">
                                                <div style="background-color:#F6F2F2;" id="iDetails"></div>
                                             </div>
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
                                                 <select class="form-control borderdark form-select" style="border:1px solid grey;" id="category"  onchange="makeSubmenu(this.value)">-->
                                                   <option value=" " disabled selected>Select Category</option>
                                                   <option value="Tops">Tops</option>
                                                   <option>Bottoms</option>
                                                   <option>Suit</option>
                                                   <option>Headwear</option>
                                                   <option>Footwear</option>
                                                   <option>Gadget</option>
                                                   <option>Accessories</option>
                                                </select>
                                             </div>
                                             
                                                       <div class="mb-3">
                                                   <h5>Sub-Category</h5>
                                                <select class="form-control borderdark form-select" name="subCat" onchange="changeSub()" id="categorySelect" >
                                                   <option value=" " disabled selected>Select Category First</option>
                                                   <option></option>
                                                </select>
                                             </div>
                                             
                                               <select class="form-control  "id="Select1" name="subcatValue"  onChange="subcatchange()"  required></select>
                                            
                                            </div>
                                               
                                          </div>  
                                        
                                               </div>
                                               
                                               
                                                              <div  class="col-sm-12">
                                          <div class="card cardshadow">
                                       
                                        <div class="card-body">
                                            
                                                    <div class="mb-3" >
                                                   <h5>Status</h5>
                                                <select class="form-control  form-select borderdark" name="subCat" onchange="changeSub()" id="categorySelect" >
                                                   <option value=" " disabled selected>Select Category First</option>
                                                   <option></option>
                                                </select>
                                             </div>
                                             
                                                     <div class="mb-3" >
                                                   <h5>Push Product to</h5>
                                                   
                                                   <a href="#" ><i  onclick="selectAllSwitches()">Select All</i></a>
                                                   
                                                      <div class="media">
                 
                        <div class=" switch-sm" >
                          <label class="switch" >
                            <input type="checkbox" checked="" disabled ><span class="switch-state"  style="background-color:rgba(208, 0, 0, 0.54);"></span>
                          </label>
                        </div>
                               <h6 class="col-form m-l-10 m-t-10 switchfont">Shopify</h6>
                      </div>
                                          
                                                                            <div class="media">
                 
                        <div class=" switch-sm">
                          <label class="switch">
                            <input type="checkbox" id="ebaySwitch" onchange="EbayHandler()" ><span class="switch-state"></span>
                          </label>
                        </div>
                               <h6 class="col-form m-l-10 m-t-10 switchfont">Ebay</h6>
                      </div>
                      
                                                        <div class="media">
                 
                        <div class=" switch-sm">
                          <label class="switch">
                            <input type="checkbox" id="depopSwitch" ><span class="switch-state"></span>
                          </label>
                        </div>
                               <label class="col-form m-l-10 m-t-10 switchfont">Depop</label>
                      </div>
                        
                                                        <div class="media">
                 
                        <div class=" switch-sm">
                          <label class="switch">
                            <input type="checkbox" id="fbSwitch"><span class="switch-state"></span>
                          </label>
                        </div>
                               <h6 class="col-form m-l-10 m-t-10 switchfont">Facebook</h6>
                      </div>  
                  
                                                        <div class="media">
                 
                        <div class=" switch-sm">
                          <label class="switch">
                            <input type="checkbox" id="wcSwitch"><span class="switch-state"></span>
                          </label>
                        </div>
                               <h6 class="col-form m-l-10 m-t-10 switchfont">Woocommerce</h6>
                      </div>
             
                                             </div>
                                             
                                            
                                            
                                            </div>
                                               
                                          </div>  
                                        
                                               </div>
                                               
                                               
                                                               <div  class="col-sm-12">
                                          <div class="card cardshadow">
                                       
                                        <div class="card-body">
                                            
                                                    <div class="mb-3" >
                                                   <h5>Warehouse</h5>
                                               <select class="form-control form-select  borderdark"id="Select" name="warehouse"  onChange="myNewFunction(this);"  required></select>
                                             </div>
                                             
                                                       <div class="mb-3">
                                                   <label class="col-form-label pt-0" for="exampleInputEmail1">Batch</label>
                                                          <input class="form-control borderdark" id="title" type="text" name="batch" aria-describedby="emailHelp" placeholder="Enter Batch">
                                             </div>
                                             
                                                   <div class="mb-3">
                                                   <label class="col-form-label pt-0" for="exampleInputEmail1">SKU/Barcode</label>
                                                          <input class="form-control borderdark" id="SKU" type="text" name="sku" aria-describedby="emailHelp" placeholder="Enter SKU/Barcode">
                                             </div>
                                             
                                                   <div class="mb-3">
                                                   <label class="col-form-label pt-0" for="exampleInputEmail1">Rack Location</label>
                                                          <input class="form-control borderdark" id="title" type="text" name="location" aria-describedby="emailHelp" placeholder="Enter Location">
                                             </div>
                                              <button onclick="getAttrValue()">GET INPUT VAlUES</button>
                                            </div>
                                               
                                          </div>  
                                        
                                               </div>
                                               
                                                            <div  class="col-sm-12" id="ebayAttr2" >
                                          <div class="card cardshadow">
                                       
                                        <div class="card-body">
                                            
                                                    <div class="mb-3" >
                                                   <h5>Ebay Logistic Details</h5>
                                               <select class="form-control form-select  borderdark"id="Select" name="warehouse"  onChange="myNewFunction(this);"  required></select>
                                             </div>
                                             
                                                       <div class="mb-3">
                                                   <label class="col-form-label pt-0" for="exampleInputEmail1">Country</label>
                                                               <select class="form-control form-select borderdark "  onchange="SendData()" name="gender">
                                                   <option value=" ">Select  </option>
                                                   <option value="PK">Pakistan</option>
                                                   <option value="UK">UK</option>
                                                
                                                </select>
                                             </div>
                                             
                                                   <div class="mb-3">
                                                   <label class="col-form-label pt-0" for="exampleInputEmail1">Currency</label>
                                                              <select class="form-control form-select borderdark "  onchange="SendData()" name="gender">
                                                   <option value=" ">Selectr</option>
                                                   <option value="pkr">PKR</option>
                                                   <option value="pound">POUND</option>
                                                
                                                </select>
                                             </div>
                                             
                                                   <div class="mb-3">
                                                   <label class="col-form-label pt-0" for="exampleInputEmail1">Domestic Shipping Cost</label>
                                                          <input class="form-control borderdark" id="title" type="text" name="location" aria-describedby="emailHelp" placeholder="Enter Location">
                                             </div>
                                             
                                                  <div class="mb-3">
                                                   <label class="col-form-label pt-0" for="exampleInputEmail1">Location</label>
                                                          <input class="form-control borderdark" id="title" type="text" name="location" aria-describedby="emailHelp" placeholder="Enter Location">
                                             </div>
                                             
                                                  <div class="mb-3">
                                                   <label class="col-form-label pt-0" for="exampleInputEmail1">Postal Code</label>
                                                          <input class="form-control borderdark" id="title" type="text" name="location" aria-describedby="emailHelp" placeholder="Enter Location">
                                             </div>
                                             
                                                  <div class="mb-3">
                                                   <label class="col-form-label pt-0" for="exampleInputEmail1">Domestic Courier</label>
                                                         <select class="form-control form-select borderdark "  onchange="SendData()" name="gender">
                                                   <option value=" ">Selectr</option>
                                                   <option value="pkr">PKR</option>
                                                   <option value="pound">POUND</option>
                                                
                                                </select>
                                             </div>
                                             
                                                  <div class="media">
                 
                        <div class=" switch-sm">
                          <label class="switch">
                            <input type="checkbox" id="depopSwitch" ><span class="switch-state"></span>
                          </label>
                        </div>
                               <label class="col-form m-l-10 m-t-10 switchfont">Ebay International Shipping</label>
                      </div>
                                            
                                            </div>
                                               
                                          </div>  
                                      
                                               </div>
                                               
                                             <button onclick="addProductDB()">addProductDB ()</button>     
                                               
                                  
                                 <!--<div class="col-sm-12">-->
                                 <!--   <div class="card cardshadow">-->
                                 <!--      <div class="card-header pb-0">-->
                                 <!--         <h5>Product price & Quantity</h5>-->
                                 <!--      </div>-->
                                 <!--      <div class="card-body">-->
                                 <!--         <form class="theme-form mega-form">-->
                                 <!--            <div class="mb-3">-->
                                 <!--               <label class="col-form-label">Product price</label>-->
                                           
                                 <!--               <input class="form-control" type="number"  id="price" name="price" placeholder="Product price">-->
                                 <!--                  <p class="col-md-7 text-muted  ">Suggested Price(For Sneakers Only): <b id="Predict"></b> <b  id="sAPI"></b> </p>-->
                                                    <!--<b  id="sAPI">0</b>-->
                                 <!--            </div>-->
                                 <!--            <div class="mb-3">-->
                                 <!--               <label class="col-form-label">Quantity</label>-->
                                 <!--               <input class="form-control" type="text" placeholder="Quantity">-->
                                 <!--            </div>-->
                                 <!--            <div class="mb-3">-->
                                 <!--               <label class="col-form-label">SKU</label>-->
                                 <!--               <input class="form-control" id="SKU" type="text" placeholder="Enter SKU">-->
                                 <!--            </div>-->
                                 <!--            <div class="mb-3">-->
                                 <!--               <label class="col-form-label">Weight(In Kg)</label>-->
                                 <!--               <input class="form-control" type="text" placeholder="Enter Weight(In Kg)">-->
                                 <!--            </div>-->
                                 <!--            <hr class="mt-4 mb-4">-->
                                 <!--            <h6>Product Status</h6>-->
                                 <!--            <div class="mb-3">-->
                                 <!--               <label class="col-form-label">ID</label>-->
                                 <!--               <input class="form-control" type="text" id="pID" placeholder="ID" disabled>-->
                                 <!--            </div>-->
                                 <!--            <div class="mb-3">-->
                                 <!--               <label class="col-form-label">Date</label>-->
                                 <!--               <input class="form-control" id="pDate" type="text" placeholder="DATE" disabled>-->
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

function addProductDB (){
   
   var  inputObj = JSON.stringify(finalValues)
   
//   console.log(finalValues)
    
    var form = new FormData();
form.append("att", inputObj);

var settings = {
  "url": "https://backup.thriftops.com/ShopifyPush/api/addProduct.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
  console.log(response);
});

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
   

  
//   for (let i = 0; i < attArr.length; i++) {
       
//       var  Kval = ValueArr[i]
//       var Kname = KEYSARR2[i]
       
//       $("#"+ Kname).val(Kval);
       
//   }
  
  
//   console.log("Kval",Kval)
//   console.log("Kname",Kname)
  
  
  
  
  
  
  
  
  
  
  
  
  
  
//   var resArray = JRES[0].att.replace(/[{}]/g, "");
//   console.log("resArray",resArray)
  
  
  
  
//   var resArrayp = JSON.parse('\''+resArray+'\'')
    // console.log(KEYS.map((val)=>{
    //     return val;
    // }))
  
  
//     for (let i = 0; i < attArr.length; i++) {
//  var V2S =attArr[i]

// console.log(V2S)

   
   
// }

// console.log("resArray",resArray)
// for (let i = 0; i < resArray.length; i++) {
//     console.log(resArray[i])
    
// }


// //   console.log(VALARR)
  
  
//   for (let i = 0; i < attArr.length; i++) {
//   var KEYS =  Object.keys(attArr[i])
//   KEYSARR.push(KEYS);

   
   
// }

//  for (let i = 0; i < KEYSARR.length; i++) {

// var K2S = KEYSARR[i].toString();

//  KEYSARR2.push(K2S);
   

   
// }






















// Returns a Promise that resolves after "ms" Milliseconds
// const timer = ms => new Promise(res => setTimeout(res, ms))

// async function load () { // We need to wrap the loop into an async function for this to work
//   for (var i = 0; i < 3; i++) {
//       var idV = KEYSARR2[i].toString();
//       console.log("current isteration is" + i + attArr[i].idV)
//     console.log(idV);
    
    
    
    
    
    
    
    
    
//     await timer(1500); // then the created Promise can be awaited
//   }
// }

// load();




//  for (let i = 0; i < KEYSARR2.length; i++) {

// var idV = KEYSARR2[i].toString();



//  console.log("attArr",attArr[i])

// const findOne = attArr.find(item => item.hasOwnProperty("size"))
// console.log("findOne",findOne.idV)





//     // console.log(idV)
    
//     setTimeout(function() { 
//     $("#"+ idV).val();
//     }, 1000);

   
   
// }

// var i = 1;                  //  set your counter to 1

// function myLoop() {         //  create a loop function
//   setTimeout(function() {   //  call a 3s setTimeout when the loop is called
//     console.log('hello');   //  your code here
//     i++;                    //  increment the counter
//  for (let i = 0; i < KEYSARR2.length; i++) {       //  if the counter < 10, call the loop function
//       myLoop();             //  ..  again which will trigger another 
//     }                       //  ..  setTimeout()
//   }, 500)
// }

// myLoop(); 




});
}

// Retvalues().then(f => { console.log(KEYSARR);f();})

// for (let i = 0; i < attArr.length; i++) {
//     console.log(attArr)

   
//      var keyNames = Object.keys(attArr[i]);
//       var idV = keyNames[0]
//      keyArr.push(idV)
     
//          for (let ki = 0; ki < keyArr.length; ki++) {
//          console.log("keys",keyArr[ki])
         
//           console.log("values",attArr[i])
//      }
  
     

        
//          console.log(document.getElementById(idV))
//             document.getElementById('mainBody').innerHTML = ""  ;
        
//     //   console.log("VALUES 1",attArr[0])
//     //   console.log("VALUES 2",attArr[1])
//     //   console.log("VALUES 3",attArr[2])
     
//}


// CUSTOM SCRIPT(WASAY)

// SIKANDAR NOT ALLOWED HERE




       function MakeSubcat(){
        
        var settings = {
      "url": "https://backup.thriftops.com/ShopifyPush/api/getallattr.php",
      "method": "POST",
      "timeout": 0,
    };
    
    $.ajax(settings).done(function (response) {
      var data = JSON.parse(response);
      
      
    
    
      for (var i = 0; i < data.length; i++) {
    
          
        var select = document.getElementById("Select1");
        var option = document.createElement("option");
        option.text = data[i].name;
        option.value = data[i].id;
        select.add(option);
       
    }
    });
        
    }
    
    
    const myTimeout2 = setTimeout( MakeSubcat(), 500);
    





                                                                                                                                                                                                                                                       
       



function subcatchange(){
                               Retvalues()                                                                                                                                                                                                                                    
    
     d = document.getElementById("Select1").value;
    // alert(d);
    var settings = {
  "url": "https://backup.thriftops.com/ShopifyPush/api/getSubattr.php?id="+d,
  "method": "GET",                        
  "timeout": 0,
};

$.ajax(settings).done(function (response) {
var jRES = JSON.parse(response)
 document.getElementById('mainBody').innerHTML =" "  ; 
  document.getElementById('heading').innerHTML =" "  ; 
    $("#Mattr").removeAttr("style");
 document.getElementById("heading").innerHTML +=`<h5 class='mb-0 h6'>Product Variations for <small>${jRES[0].name}</small></h5> `  ; 
     document.getElementById('mainBody').innerHTML += jRES[0].attribute
});
}





 $("#ebayAttr2").hide();
  $("#snCDN").hide();
    function suggestionApi(){
    
     var brand = $("input[name=brand]").val();
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
    
                          
    
        
    
    
      function changeSub(){
             var subCategory = $("select[name=subCat]").val();
    
             subCatValue = subCategory
       var heading = document.getElementById("heading")
       
              
                          
          if (subCategory == "Shirts"){
            document.getElementById('mainBody').innerHTML =" "  ; 
             $("#Mattr").removeAttr("style");
      heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Shirts</small></h5>"
     document.getElementById('mainBody').innerHTML += gender  ;
     document.getElementById('mainBody').innerHTML += sizeLabel;
     document.getElementById('mainBody').innerHTML += collar;
     document.getElementById('mainBody').innerHTML += sleeveStyle;
     document.getElementById('mainBody').innerHTML += fitType;
     document.getElementById('mainBody').innerHTML += sleeveLength;
     document.getElementById('mainBody').innerHTML += chest;
     document.getElementById('mainBody').innerHTML += length;
              
          }else if (subCategory == "T-Shirts"){
            document.getElementById('mainBody').innerHTML =" "  ;  
             $("#Mattr").removeAttr("style");
            heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>T-Shirts</small></h5>"
            document.getElementById('mainBody').innerHTML += gender  ;
            document.getElementById('mainBody').innerHTML += sizeLabel;
            document.getElementById('mainBody').innerHTML += sleeveStyle;
            document.getElementById('mainBody').innerHTML += neckStyle;
            document.getElementById('mainBody').innerHTML += fitType;
            document.getElementById('mainBody').innerHTML += chest;
            document.getElementById('mainBody').innerHTML += length;
    
          }else if (subCategory == "Hoodies"){ 
            document.getElementById('mainBody').innerHTML =" "  ;  
             $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Hoodies</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += sizeLabel;
    document.getElementById('mainBody').innerHTML += hoodieType;
    
    }else if (subCategory == "TrackTops"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>TrackTops</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += sizeLabel;
    document.getElementById('mainBody').innerHTML += length;
    document.getElementById('mainBody').innerHTML += sleeveSize;
    
    
    
    
    }else if (subCategory == "Polo"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Polo</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += sizeLabel;
    document.getElementById('mainBody').innerHTML += collar;
    document.getElementById('mainBody').innerHTML += sleeveType;
    document.getElementById('mainBody').innerHTML += fitType;
    document.getElementById('mainBody').innerHTML += chest;
    document.getElementById('mainBody').innerHTML += length;
    
    }else if (subCategory == "Jackets"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Jackets</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += sizeLabel;
    document.getElementById('mainBody').innerHTML += chest;
    document.getElementById('mainBody').innerHTML += length;
    document.getElementById('mainBody').innerHTML += sleeveSize;
    document.getElementById('mainBody').innerHTML += jacketType;
    
    
    }else if (subCategory == "Jeans"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Jeans</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += waist;
    document.getElementById('mainBody').innerHTML += inseam;
    document.getElementById('mainBody').innerHTML += rise;
    document.getElementById('mainBody').innerHTML += jeansFitType;
    document.getElementById('mainBody').innerHTML += jeansType;
    
    
    }else if (subCategory == "Shorts"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Shorts</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += waist;
    document.getElementById('mainBody').innerHTML += inseam;
    document.getElementById('mainBody').innerHTML += rise;
    
    
    }else if (subCategory == "Trouser"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Trouser</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += waist;
    document.getElementById('mainBody').innerHTML += inseam;
    document.getElementById('mainBody').innerHTML += rise;
    document.getElementById('mainBody').innerHTML += jeansFitType;
    
    }else if (subCategory == "Tracksuit"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Tracksuit</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += sizeLabel;
    document.getElementById('mainBody').innerHTML += sleeveSize;
    document.getElementById('mainBody').innerHTML += fitType;
    document.getElementById('mainBody').innerHTML += trackNeck;
    
    }else if (subCategory == "Romper"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Romper</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += sizeLabel;
    document.getElementById('mainBody').innerHTML += sleeveStyle;
    document.getElementById('mainBody').innerHTML += romperNeck;
    document.getElementById('mainBody').innerHTML += chest;
    document.getElementById('mainBody').innerHTML += length;
    
    }else if (subCategory == "Jumpsuit"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Jumpsuit</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += sizeLabel;
    document.getElementById('mainBody').innerHTML += sleeveStyle;
    document.getElementById('mainBody').innerHTML += neckStyle;
    document.getElementById('mainBody').innerHTML += chest;
    document.getElementById('mainBody').innerHTML += length;
    
    }else if (subCategory == "Peplum"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Peplum</small></h5>"
    
    document.getElementById('mainBody').innerHTML += sizeLabel;
    document.getElementById('mainBody').innerHTML += sleeveStyle;
    document.getElementById('mainBody').innerHTML += neckStyle;
    
    }
    else if (subCategory == "Dress"){
        document.getElementById('mainBody').innerHTML =" "  ; 
         $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Dress</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += sizeLabel;
    document.getElementById('mainBody').innerHTML += dressType;
    document.getElementById('mainBody').innerHTML += sleeveStyle;
    document.getElementById('mainBody').innerHTML += fitType;
    document.getElementById('mainBody').innerHTML += sleeveLength;
    document.getElementById('mainBody').innerHTML += chest;
    document.getElementById('mainBody').innerHTML += length;
    
    }else if (subCategory == "Cap"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Cap</small></h5>"
    document.getElementById('mainBody').innerHTML += Size  ;
    
    
    }else if (subCategory == "Hats"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Hats</small></h5>"
    document.getElementById('mainBody').innerHTML += Type  ;
    
    
    }else if (subCategory == "Sneakers"){
       document.getElementById('mainBody').innerHTML =" "  ;  
        $("#Mattr").removeAttr("style");
heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Sneakers</small></h5>"
document.getElementById('mainBody').innerHTML += gender  ;
document.getElementById('mainBody').innerHTML += `<div class="form-group row">
<label class="col-md-3 col-from-label">Sneaker Size</label>
<div class="col-md-8">
    <input type="text" class="form-control" name="sneakerSize" onChange="suggestionApi()" placeholder="Sneaker Size " max="52" min="14" value="">
</div>
</div>`  ;
document.getElementById('mainBody').innerHTML += sneakerType  ;

    
    }
    else if (subCategory == "Sandals"){
        document.getElementById('mainBody').innerHTML =" "  ;  
        $("#Mattr").removeAttr("style");
        
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Sandals</small></h5>"
    document.getElementById('mainBody').innerHTML += Size  ;
    document.getElementById('mainBody').innerHTML += Color  ;
    
    }else if (subCategory == "Khussa"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Khussa</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += Size  ;
    }
    else if (subCategory == "Formals"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Formals</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += heelSize  ;
    document.getElementById('mainBody').innerHTML += Size  ;
    }
    else if (subCategory == "Heels"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Heels</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += heelType  ;
    document.getElementById('mainBody').innerHTML += heelSize  ;
    }
    else if (subCategory == "Boots"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Boots</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += heelType  ;
    document.getElementById('mainBody').innerHTML += heelSize  ;
    }
    else if (subCategory == "Watches"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Watches</small></h5>"
    document.getElementById('mainBody').innerHTML += Color  ;
    document.getElementById('mainBody').innerHTML += watchType  ;
    
    
         
      }
      else if (subCategory == "Headphones"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Headphones</small></h5>"
    document.getElementById('mainBody').innerHTML += Color  ;
    document.getElementById('mainBody').innerHTML += headConnect  ;
    document.getElementById('mainBody').innerHTML += headType  ;
    
    
    
         
      }
      else if (subCategory == "Tie"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Tie</small></h5>"
    document.getElementById('mainBody').innerHTML += Size  ;
    document.getElementById('mainBody').innerHTML += tietype  ;
    document.getElementById('mainBody').innerHTML += tiePattern  ;
    
    
    
         
      }
    
      else if (subCategory == "Socks"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Socks</small></h5>"
    document.getElementById('mainBody').innerHTML += socksType  ;
    document.getElementById('mainBody').innerHTML += socksLength  ;
    
    
    
         
      }
    
      else if (subCategory == "Belts"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Belts</small></h5>"
    document.getElementById('mainBody').innerHTML += Size;
    
      
      }
      else if (subCategory == "Handbags"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
         
         
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Handbags</small></h5>"
    document.getElementById('mainBody').innerHTML += Height;
    document.getElementById('mainBody').innerHTML += Width;
    document.getElementById('mainBody').innerHTML += length;
    
      
      }
      else if (subCategory == "Mufflers"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
         
         
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Mufflers</small></h5>"
    document.getElementById('mainBody').innerHTML += length;
    
    
      
      }
      else if (subCategory == "Gloves"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Gloves</small></h5>"
    document.getElementById('mainBody').innerHTML += Size;
    
    
      
      }  else if (subCategory == "Scarfs"){
        document.getElementById('mainBody').innerHTML =" "  ;  
         $("#Mattr").removeAttr("style");
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Scarfs</small></h5>"
    document.getElementById('mainBody').innerHTML += scarfPattern;
    
    
      
      }
    
    
    
    
      
      }
    //   var date = new Date();
    //   document.getElementById("pDate").value = date
      
    
         var items = [];
      function submit2(){
       
    
    
      boxvalue = document.getElementsByTagName('gender')[0].elements;
      items.push(boxvalue);
      console.log(items);
      return false; // stop submission
    
      }
    

     
    function SubmitData(){
        
        // Product Information 
        var title = $("input[name=title]").val();
       var made = $("input[name=made]").val();
         var category =  $('#category option:selected').val()
         var subCategory = $("select[name=subCat]").val();
         var warehouse = $("select[name=warehouse]").val();
           var vendor = $("select[name=vendor]").val();
            var lot = $("input[name=Lot]").val();
           
         //Attriubutes
           var brand = $("input[name=Brand]").val();
         
             
             
             //Tops-Shirts
             
             
             // Product Variations for Shirts
            var gender = $("select[name=gender]").val();
              
                       //Product Status
                    
                        var PdateS = $("input[name=Pdate]").val();
                       
                      
                      
                  
            
           
        console.log(gender)
        
        
        
        
    }
    
    
    // var settings = {
    //   "url": "/ShopifyPush/api/last.php",
    //   "method": "POST",
    //   "timeout": 0,
    // };
    
    // $.ajax(settings).done(function (response) {
    //  var last_id = response;
    //   document.getElementById("pID").value = last_id
     
     
    // });
        
        
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
                                                          <input class="form-control borderdark"  type="text" name="material"  placeholder="Enter Material">
                                                   </div>
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Style</label>
                                                          <input class="form-control borderdark"  type="number" name="weight"  placeholder="Enter Weight">
                                                   </div>
                                               </div>
                                                         <div class="col-sm-12 row">
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Type</label>
                                                          <input class="form-control borderdark"  type="text" name="material" placeholder="Enter Material">
                                                   </div>
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >MPN</label>
                                                          <input class="form-control borderdark"  type="number" name="weight"  placeholder="Enter Weight">
                                                   </div>
                                               </div>
                                               <div class="col-sm-12 row">
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Size Type</label>
                                                          <input class="form-control borderdark"  type="text" name="material" placeholder="Enter Material">
                                                   </div>
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Condition</label>
                                                                   <select class="form-control form-select borderdark "  name="gender">
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
    
    <style>
    #preview-parent {
  display: flex;
}
.preview {
  display: flex;
  flex-direction: column;
  margin: 1rem;
}
img {
  width: 100px;
  height: 100px;
  object-fit: cover;
}
/*input[type="file"] {*/
/*    display: none;*/
/*}*/
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
</style>
<script>





    var finalImages = ""

    function finalImages1(){
console.log(finalImages)

    }
    // DataTransfer allows updating files in input
var dataTransfer = new DataTransfer()

const form = document.querySelector('#form')
const input = document.querySelector('#file-upload')

input.addEventListener('change', () => {

  let files = input.files

  for (let i = 0; i < files.length; i++) {
    // A new upload must not replace images but be added
    dataTransfer.items.add(files[i])

    // Generate previews using FileReader
    let reader, preview, previewImage
    reader = new FileReader()

    preview = document.createElement('div')
    previewImage = document.createElement('img')
    deleteButton = document.createElement('button')
    orderInput = document.createElement('input')

    preview.classList.add('preview')
    document.querySelector('#preview-parent').appendChild(preview)
    deleteButton.setAttribute('data-index', i)
    deleteButton.setAttribute('onclick', 'deleteImage(this)')
    deleteButton.innerText = 'Delete'
    orderInput.type = 'hidden'
    orderInput.name = 'images_order[' + files[i].name + ']'

    preview.appendChild(previewImage)
    preview.appendChild(deleteButton)
    preview.appendChild(orderInput)

    reader.readAsDataURL(files[i])
    reader.onloadend = () => {
      previewImage.src = reader.result
    }
  }

  // Update order values for all images
  updateOrder()
  // Finally update input files that will be sumbitted
  input.files = dataTransfer.files
})

const updateOrder = () => {
  let orderInputs = document.querySelectorAll('input[name^="images_order"]')
  let deleteButtons = document.querySelectorAll('button[data-index]')
  for (let i = 0; i < orderInputs.length; i++) {
    orderInputs[i].value = [i]
    deleteButtons[i].dataset.index = [i]
    
    // Just to show that order is always correct I add index here
    // deleteButtons[i].innerText = 'Delete (index ' + i + ')'
    deleteButtons[i].innerHTML = '<i class="icofont icofont-ui-delete"></i>'
    // console.log(orderInputs[0].name)
    var Allimages = [];

   var ImageArr = orderInputs[0].name
    var image = ImageArr.replace(/images_order/g,'');
    finalimage = image.replace(/[\[\]']+/g,'');
    // console.log(finalimage)
    Allimages.push(finalimage)

    var ImageArr1 = orderInputs[1].name
    var image1 = ImageArr1.replace(/images_order/g,'');
    finalimage1 = image1.replace(/[\[\]']+/g,'');
    //console.log(finalimage1)
    Allimages.push(finalimage1)

    var ImageArr2 = orderInputs[2].name
    var image2 = ImageArr2.replace(/images_order/g,'');
    finalimage2 = image2.replace(/[\[\]']+/g,'');
    //console.log(finalimage2)
    Allimages.push(finalimage2)


    var ImageArr3 = orderInputs[3].name
    var image3 = ImageArr3.replace(/images_order/g,'');
    finalimage3 = image3.replace(/[\[\]']+/g,'');
    //console.log(finalimage3)
    Allimages.push(finalimage3)



    var ImageArr4 = orderInputs[4].name
    var image4 = ImageArr4.replace(/images_order/g,'');
    finalimage4 = image4.replace(/[\[\]']+/g,'');
    //console.log(finalimage4)
    Allimages.push(finalimage4)

    // console.log(Allimages)

    finalImages = Allimages
  }
}

const deleteImage = (item) => {
  // Remove image from DataTransfer and update input
  dataTransfer.items.remove(item.dataset.index)
  input.files = dataTransfer.files
  // Delete element from DOM and update order
  item.parentNode.remove()
  updateOrder()
}

// I make the images sortable by means of SortableJS
const el = document.getElementById('preview-parent')
new Sortable(el, {
  animation: 150,

  // Update order values every time a change is made
  onEnd: (event) => {
    updateOrder()
  }
})
</script>
    



<!-- footer start-->
<?php include("../include/footer.php");?>

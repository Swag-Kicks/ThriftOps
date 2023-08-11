<?php include("../include/header.php");?>
<?php include("../include/sidebar.php");?>

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
                                                <input class="form-control borderdark" id="title" type="title"  onchange="iDetails()" name="title" placeholder="Enter Product Name">
                                             </div>
                                             <div class="col-sm-12 row">
                                                 <div class="col-sm-6">
                                                       <div class="mb-3">
                                                <label class="col-form-label pt-0">Condition</label>
                                                <select class="form-control form-select borderdark " name="condition"  onchange="iDetails()" id="condition_id">
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
                                            
           <select id='selUser' name="brand"  onchange="iDetails()" class="form-control form-select borderdark" >
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
                                                          <input class="form-control borderdark" type="text" name="made"   onchange="iDetails()" aria-describedby="emailHelp" placeholder="Enter Made in">
                                                   </div>
                                               </div>
                                               
                                                        <div class="col-sm-12 row">
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Material</label>
                                                          <input class="form-control borderdark"  type="text" name="material"   onchange="iDetails()" placeholder="Enter Material">
                                                   </div>
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Weight</label>
                                                          <input class="form-control borderdark"  type="number" name="weight"  onchange="SendData()" placeholder="Enter Weight">
                                                   </div>
                                               </div>
                                               
                                                           <div class="col-sm-12 row">
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Price</label>
                                                          <input class="form-control borderdark" id="price" type="number"   onchange="iDetails()" name="price"  placeholder="Enter Price">
                                                   </div>
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0">Gender</label>
                                                          <select class="form-control form-select borderdark "   onchange="iDetails()" name="gender">
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
                                                                             <!--<button onclick="finalImages1()">GET</button>-->
                                          <div class="card cardshadow">
                                               <div class="card-header pb-0">
                                          <h5>Images</h5>
                                       </div>
                                          <div class="card-body">
                                              
 <ul id="sortUl"  class="drag-sort-enable ulS">
    <li id="1li" class="imgLI"><img  id="img1" class="productImage" src="https://assets.reebok.com/images/w_383,h_383,f_auto,q_auto,fl_lossy,c_fill,g_auto/829cd925efe54c5caf3aae820176f1ee_9366/floatride-energy-4-adventure-mens-running-shoes.jpg" /></li>
    <li   id="2li"   class="imgLI"><img  id="img2" class="productImage" src="https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/29abad8d7ae64654b001adb90136819e_9366/RUNMAGICA_SHOES_Blue_EY2972_01_standard.jpg" /></li>
    <li    id="3li"  class="imgLI"><img  id="img3" class="productImage" src="https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/302c66583be8471f97a6ae8e0071f59f_9366/TURBO_GLIDE_SHOES_Blue_GA0928_01_standard.jpg" /></li>
    <li   id="4li"    class="imgLI"><img  id="img4" class="productImage" src="https://assets.adidas.com/images/w_600,f_auto,q_auto/ffd783bcf0b8498e8b60ae8e007285f5_9366/TURBO_GLIDE_SHOES_Black_GA0929.jpg" /></li>
    <li     id="5li" class="imgLI"><img  id="img5" class="productImage" src="https://assets.ajio.com/medias/sys_master/root/20211119/cyv8/6196a51baeb2690110cc7e30/-473Wx593H-460930028-grey-MODEL.jpg" /></li>
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
        <div class="dropzone" id="kt_dropzonejs_example_1">
            <!--begin::Message-->
            <div class="dz-message needsclick">
                <!--begin::Icon-->
                <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                <!--end::Icon-->

                <!--begin::Info-->
                <div class="ms-4">
                    <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload.</h3>
                    <span class="fs-7 fw-bold text-gray-400">Upload up to 10 files</span>
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Dropzone-->
    </div>
    <!--end::Input group-->
</form>
<!--end::Form-->
                                                <!--<button onclick="GETS()">GETZ</button>-->
                                               
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
                                            <select class="form-control form-select  borderdark" id="SelectC" name="catID"  onchange="MakeSubcat()"   required></select>
                                             </div>
                                             
                                                       <div class="mb-3">
                                                   <h5>Sub-Category</h5>
                                              <select class="form-control borderdark form-select  " id="Select1" name="subcatValue"  onChange="subcatchange()"  required></select>
                                             </div>
                                             
                                              
                                            
                                            </div>
                                               
                                          </div>  
                                        
                                               </div>
                                               
                                               
                                                              <div  class="col-sm-12">
                                          <div class="card cardshadow">
                                       
                                        <div class="card-body">
                                            
                                                    <div class="mb-3" >
                                                   <h5>Status</h5>
                                                <select class="form-control  form-select borderdark" name="status"  >
                                                <option value="Active">Active</option>
                                                   <option value="Draft">Draft</option>
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
                                                  <button onclick="idetails()">  idetails()</button>    
                                                    <button onclick="addShopify()">addShopify()</button>    
                                                
                                
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





// function idetails(){

// var  inputObj =finalValues
// console.log("inputObj",inputObj)

//  for (var i = 0; i < inputObj.length; i++) {
     
//     inputObj[]
//  }



// }

var div1 =`<div style="background-color:#F6F2F2;border-radius:8px;">`;
var ul1 =`<ul style="columns:2;-webkit-columns:2;-moz-columns:2">`;



function iDetails(){
 var titleI = $("input[name=title]").val();
   var priceI = $("input[name=price]").val();
    var made = $("input[name=made]").val();
    var material = $("input[name=material]").val();
    var cond = $("select[name=condition]").val();
    var brand = $("select[name=brand]").val();
 
  document.getElementById('iDetails').innerHTML = `
 
    <h2>Item Details</h2>
    <br/>
    ${ul1}
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
    <li><b>Made in: </b>${made}</li>
  

   
    </ul>     <br/>
 
     <h2>Size <a href='https://www.swag-kicks.com/pages/size-chart'><h4 style="color:red">(View Size Chart)</h4></a></h2>
    <br/>
       ${ul1}
   
    </ul>     <br/>
    <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    
    
    </div>`;

}







function addShopify(){
    
    var someimage = document.getElementById('sortUl');

 var myimg = someimage.getElementsByTagName('img')

 
    var image1 =myimg[0].currentSrc;
        var image2 = myimg[1].currentSrc;
            var image3 = myimg[2].currentSrc;
                var image4 = myimg[3].currentSrc;
                    var image5 = myimg[4].currentSrc;
   

   var  inputObj = JSON.stringify(finalValues)
    var title = $('#title').val()
       var brand = $('#selUser').val()
    
     var condition = $('#condition_id').val()
     var qty = $("input[name=quantity]").val();
       var made = $("input[name=made]").val();
      var weight = $("input[name=weight]").val();
        var price = $("input[name=price]").val();
    var gender = $("select[name=gender]").val();
     var sku = $("input[name=gender]").val();
     var warehouse = $("select[name=warehouse]").val();
     var location = $("input[name=location]").val();
        var status = $("select[name=status]").val();

//   console.log(finalValues)
    
    var form = new FormData();
form.append("att", inputObj);
form.append("title", title);
form.append("condition", condition);
form.append("qty", qty);
form.append("brand", brand);
form.append("made", made);
form.append("weight", weight);
form.append("price", price);
form.append("sku", sku);
form.append("gender", gender);
 form.append("status", status);
form.append("image1", image1);
form.append("image2", image2);
form.append("image3", image3);
form.append("image4", image4);
form.append("image5", image5);

var settings = {
  "url": "https://backup.thriftops.com/ShopifyPush/shopify.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
 
 var jres = JSON.parse(response);
 
  //console.log(jres.product.variants[0].id);
  var sid = jres.product.id
  
  var vid = jres.product.variants[0].id
  addProductDB(sid,vid)
  
  
});

}












function addProductDB(id,vid){
     var sid = id
     var v_id = vid
    var someimage = document.getElementById('sortUl');

 var myimg = someimage.getElementsByTagName('img')

 
    var image1 =myimg[0].currentSrc;
        var image2 = myimg[1].currentSrc;
            var image3 = myimg[2].currentSrc;
                var image4 = myimg[3].currentSrc;
                    var image5 = myimg[4].currentSrc;
   
 
   
   var  inputObj = JSON.stringify(finalValues)
    var title = $('#title').val()
       var brand = $('#selUser').val()
    
     var condition = $('#condition_id').val()
     var qty = $("input[name=quantity]").val();
       var made = $("input[name=made]").val();
      var weight = $("input[name=weight]").val();
        var price = $("input[name=price]").val();
    var gender = $("select[name=gender]").val();
     var sku = $("input[name=gender]").val();
     var warehouse = $("select[name=warehouse]").val();
     var location = $("input[name=location]").val();
        var status = $("select[name=status]").val();
       
//   console.log(finalValues)
    
    var form = new FormData();
form.append("att", inputObj);
form.append("title", title);
form.append("condition", condition);
form.append("qty", qty);
form.append("brand", brand);
form.append("made", made);
form.append("weight", weight);
form.append("price", price);
form.append("sku", sku);
form.append("gender", gender);
 form.append("status", status);
form.append("image1", image1);
form.append("image2", image2);
form.append("image3", image3);
form.append("image4", image4);
form.append("image5", image5);
form.append("sid", sid);
form.append("vid", v_id);


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
//   console.log(response);
 alert("ADDED")
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
.ulS li{
    
      display: inline-block;
    list-style-type: none;
    margin:1.5%;
    text-align: center;
    background-color: #ffff;
    color: #198eff;
    width: 200px;
    border:2px solid black;
    border-radius:6px;
    
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

    $("#sortUl").hide();

 </script>
    



<!-- footer start-->
<?php include("../include/footer.php");?>

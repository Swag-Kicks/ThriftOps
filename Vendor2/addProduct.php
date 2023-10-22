<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>
<link rel="stylesheet" type="text/css" href="assets/css/dropzone.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="application/javascript" src="assets/custom/elements.js"></script>

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
<div class="page-body">
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col-sm-6">
               <h3>Add Products</h3>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item">dashboard</li>
                  <li class="breadcrumb-item active">project list</li>
               </ol>
            </div>
            <div class="col-sm-6">
               <!-- Bookmark Start-->
               <div class="bookmark">
                  <ul>
                     <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="inbox"></i></a></li>
                     <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li>
                     <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Icons"><i data-feather="command"></i></a></li>
                     <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="layers"></i></a></li>
                     <li>
                        <a href="javascript:void(0)"><i class="bookmark-search" data-feather="star"></i></a>
                        <form class="form-inline search-form">
                           <div class="form-group form-control-search">
                              <input type="text" placeholder="Search..">
                           </div>
                        </form>
                     </li>
                  </ul>
               </div>
               <!-- Bookmark Ends-->
            </div>
         </div>
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
                        <!--<li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="false"><i data-feather="target"></i>Ebay</a></li>-->
                        <li class="nav-item"><a class="nav-link active" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false"><i data-feather="shopping-bag"></i>Shopify</a></li>
                        <!--<li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false"><i data-feather="check-circle"></i>WooCommerce</a></li>-->
                     </ul>
                  </div>
                  <div class="col-md-6 p-0">
                     <div class="form-group mb-0 me-0"></div>
                     <a class="btn btn-primary" href="projectcreate.html"> <i data-feather="plus-square"> </i>Create New Project</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-12">
            <div class="card">
               <div class="card-body">
                  <div class="tab-content" id="top-tabContent">
                     <!--<div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">-->
                     <!--   <div class="row">-->
                     <!--      <div class="col-sm-12 col-xl-6">-->
                     <!--         <div class="row">-->
                     <!--            <div class="col-sm-12">-->
                     <!--               <div class="card">-->
                     <!--                  <div class="card-header pb-0">-->
                     <!--                     <h5>Product Information</h5>-->
                     <!--                  </div>-->
                     <!--                  <div class="card-body">-->
                     <!--                     <form class="theme-form">-->
                     <!--                        <div class="mb-3">-->
                     <!--                           <label class="col-form-label pt-0" for="exampleInputEmail1">Product Name</label>-->
                     <!--                           <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter email">-->
                     <!--                        </div>-->
                     <!--                        <div class="mb-3">-->
                     <!--                           <label class="col-form-label pt-0" for="exampleInputEmail1">Made in</label>-->
                     <!--                           <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter email">-->
                     <!--                        </div>-->
                     <!--                        <div class="mb-3">-->
                     <!--                           <label class="col-form-label pt-0" for="exampleInputEmail1">Category</label>-->
                     <!--                           <select class="form-control"   >-->
                     <!--                              <option value=" " disabled selected>Select Category</option>-->
                     <!--                              <option value="Tops">Tops</option>-->
                     <!--                              <option>Bottoms</option>-->
                     <!--                              <option>Suit</option>-->
                     <!--                              <option>Headwear</option>-->
                     <!--                              <option>Footwear</option>-->
                     <!--                              <option>Gadget</option>-->
                     <!--                              <option>Accessories</option>-->
                     <!--                           </select>-->
                     <!--                        </div>-->
                     <!--                        <div class="mb-3">-->
                     <!--                           <label class="col-form-label pt-0" for="exampleInputEmail1">Sub Category</label>-->
                     <!--                           <select class="form-control"  >-->
                     <!--                              <option value=" " disabled selected>Select Category First</option>-->
                     <!--                              <option></option>-->
                     <!--                           </select>-->
                     <!--                        </div>-->
                     <!--                        <div class="mb-3">-->
                     <!--                           <label class="col-form-label pt-0" for="exampleInputEmail1">Warehouse</label>-->
                     <!--                           <select class="form-control"  required></select>-->
                     <!--                        </div>-->
                     <!--                        <div class="mb-3">-->
                     <!--                           <label class="col-form-label pt-0" for="exampleInputEmail1">Vendor</label>-->
                     <!--                           <select class="form-control"  required>-->
                     <!--                           </select>-->
                     <!--                        </div>-->
                     <!--                        <div class="mb-3">-->
                     <!--                           <label class="col-form-label pt-0" for="exampleInputEmail1">Lot</label>-->
                     <!--                           <select class="form-control  "  required>-->
                     <!--                           </select>-->
                     <!--                        </div>-->
                     <!--                        <div class="card-header pb-0">-->
                     <!--                           <h5>Attributes</h5>-->
                     <!--                        </div>-->
                     <!--                        <br/>-->
                     <!--                        <div class="mb-3">-->
                     <!--                           <label class="col-form-label pt-0" for="exampleInputEmail1">Gender</label>-->
                     <!--                           <input type="text" class="form-control aiz-tag-input" name="gender" >-->
                     <!--                        </div>-->
                     <!--                        <div class="mb-3">-->
                     <!--                           <label class="col-form-label pt-0" for="exampleInputEmail1">Brand</label>-->
                     <!--                           <input type="text" class="form-control aiz-tag-input" name="Brand" >-->
                     <!--                        </div>-->
                     <!--                        <div class="mb-3">-->
                     <!--                           <label class="col-form-label pt-0" for="exampleInputEmail1">Material</label>-->
                     <!--                           <input type="text" class="form-control aiz-tag-input" name="material" >-->
                     <!--                        </div>-->
                     <!--                        <div class="mb-3">-->
                     <!--                           <label class="col-form-label pt-0" for="exampleInputEmail1">Condition</label>-->
                     <!--                           <select class="form-control " name="condition" id="condition_id">-->
                     <!--                              <option value=" ">Select condition</option>-->
                     <!--                              <option value="7/10">7/10</option>-->
                     <!--                              <option value="8/10">8/10</option>-->
                     <!--                              <option value="9/10">9/10</option>-->
                     <!--                              <option value="10/10">10/10</option>-->
                     <!--                              <option value="Brand New">Brand New</option>-->
                     <!--                           </select>-->
                     <!--                        </div>-->
                     <!--                        <br/><br/>-->
                     <!--                        <div class="card-header" id="heading"> </div>-->
                     <!--                        <div class="card-body" id="mainBody"> </div>-->
                     <!--                     </form>-->
                     <!--                  </div>-->
                     <!--                  <div class="card-footer">-->
                     <!--                     <button class="btn btn-primary">Submit</button>-->
                     <!--                     <button class="btn btn-secondary">Cancel</button>-->
                     <!--                  </div>-->
                     <!--               </div>-->
                     <!--            </div>-->
                     <!--         </div>-->
                     <!--      </div>-->
                     <!--      <div class="col-sm-12 col-xl-6">-->
                     <!--         <div class="row">-->
                     <!--            <div class="col-sm-12">-->
                     <!--               <div class="card">-->
                     <!--                  <div class="card-header pb-0">-->
                     <!--                     <h5>Product price & Quantity</h5>-->
                     <!--                  </div>-->
                     <!--                  <div class="card-body">-->
                     <!--                     <form class="theme-form mega-form">-->
                     <!--                        <div class="mb-3">-->
                     <!--                           <label class="col-form-label">Product price</label>-->
                     <!--                           <input class="form-control" type="text" placeholder="Product price">-->
                     <!--                        </div>-->
                     <!--                        <div class="mb-3">-->
                     <!--                           <label class="col-form-label">Quantity</label>-->
                     <!--                           <input class="form-control" type="text" placeholder="Enter email">-->
                     <!--                        </div>-->
                     <!--                        <div class="mb-3">-->
                     <!--                           <label class="col-form-label">SKU</label>-->
                     <!--                           <input class="form-control" type="text" placeholder="Enter contact number">-->
                     <!--                        </div>-->
                     <!--                        <div class="mb-3">-->
                     <!--                           <label class="col-form-label">Weight(In Kg)</label>-->
                     <!--                           <input class="form-control" type="text" placeholder="Enter contact number">-->
                     <!--                        </div>-->
                     <!--                        <hr class="mt-4 mb-4">-->
                     <!--                        <h6>Product Status</h6>-->
                     <!--                        <div class="mb-3">-->
                     <!--                           <label class="col-form-label">ID</label>-->
                     <!--                           <input class="form-control" type="text" placeholder="ID">-->
                     <!--                        </div>-->
                     <!--                        <div class="mb-3">-->
                     <!--                           <label class="col-form-label">Date</label>-->
                     <!--                           <input class="form-control" id="pDate" type="text" placeholder="DATE">-->
                     <!--                        </div>-->
                     <!--                     </form>-->
                     <!--                     <br/><br/><br/>-->
                     <!--                     <hr class="mt-4 mb-4">-->
                     <!--                     <h6 class="pb-3 mb-0">Product Images</h6>-->
                     <!--                     <div class="col-sm-12">-->
                     <!--                        <div class="card">-->
                     <!--                           <div class="card-header pb-0">-->
                     <!--                              <h5>Multi File Upload</h5>-->
                     <!--                           </div>-->
                     <!--                           <div class="card-body">-->
                     <!--                              <form class="dropzone dropzone-primary dz-clickable" id="multiFileUpload" action="/upload.php">-->
                     <!--                                 <div class="dz-message needsclick">-->
                     <!--                                    <i class="icon-cloud-up"></i>-->
                     <!--                                    <h6>Drop files here or click to upload.</h6>-->
                     <!--                                    <span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>-->
                     <!--                                 </div>-->
                     <!--                              </form>-->
                     <!--                           </div>-->
                     <!--                        </div>-->
                     <!--                     </div>-->
                     <!--                     <div class="card card-absolute">-->
                     <!--                        <div class="card-header bg-primary">-->
                     <!--                           <h5 class="text-white">Product Description</h5>-->
                     <!--                        </div>-->
                     <!--                        <div class="card-body">-->
                     <!--                           <div style="background-color:#F6F2F2;" id="iDetails"></div>-->
                     <!--                        </div>-->
                     <!--                     </div>-->
                     <!--                     <button class="btn btn-secondary" onclick="SendData()">Preview</button>-->
                     <!--                  </div>-->
                     <!--                  <div class="card-footer">-->
                     <!--                  </div>-->
                     <!--               </div>-->
                     <!--            </div>-->
                     <!--         </div>-->
                     <!--      </div>-->
                     <!--   </div>-->
                     <!--</div>-->
                     <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                        <div class="row">
                           <div class="col-sm-12 col-xl-6">
                              <div class="row">
                                 <div class="col-sm-12">
                                    <div class="card">
                                       <div class="card-header pb-0">
                                          <h5>Product Information</h5>
                                       </div>
                                       <div class="card-body">
                                          <form class="theme-form">
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Product Name</label>
                                                <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter email">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Made in</label>
                                                <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter email">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Category</label>
                                                <select class="form-control" id="category"  onchange="makeSubmenu(this.value)">
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
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Sub Category</label>
                                                <select class="form-control" name="subCat" onchange="changeSub()" id="categorySelect" >
                                                   <option value=" " disabled selected>Select Category First</option>
                                                   <option></option>
                                                </select>
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Warehouse</label>
                                                <select class="form-control  "id="Select" name="warehouse"  onChange="myNewFunction(this);"  required></select>
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Vendor</label>
                                                <select class="form-control  " id="WSelect" name="vendor"  onChange="myVFunction(this);" id="category_id"  required>
                                                </select>
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Lot</label>
                                                <select class="form-control  " id="VSelect" name="lot" id="category_id"  required>
                                                </select>
                                             </div>
                                             <div class="card-header pb-0">
                                                <h5>Attributes</h5>
                                             </div>
                                             <br/>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Gender</label>
                                                <input type="text" class="form-control aiz-tag-input" name="gender" >
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Brand</label>
                                                <input type="text" class="form-control aiz-tag-input" name="brand" >
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Material</label>
                                                <input type="text" class="form-control aiz-tag-input" name="material" >
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Condition</label>
                                                <select class="form-control " name="condition" id="condition_id">
                                                   <option value=" ">Select condition</option>
                                                   <option value="7/10">7/10</option>
                                                   <option value="8/10">8/10</option>
                                                   <option value="9/10">9/10</option>
                                                   <option value="10/10">10/10</option>
                                                   <option value="Brand New">Brand New</option>
                                                </select>
                                             </div>
                                             <br/><br/>
                                             <div class="card-header" id="heading"> </div>
                                             <div class="card-body" id="mainBody"> </div>
                                          </form>
                                       </div>
                                       <div class="card-footer">
                                          <button class="btn btn-primary">Submit</button>
                                          <button class="btn btn-secondary">Cancel</button>
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
                                                <label class="col-form-label">Product price</label>
                                                <input class="form-control" type="text" placeholder="Product price">
                                                   <p class="col-md-7 text-muted  ">Suggested Price(For Sneakers Only):   <b  id="sAPI">0</b></p>
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">Quantity</label>
                                                <input class="form-control" type="text" placeholder="Quantity">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">SKU</label>
                                                <input class="form-control" type="text" placeholder="Enter SKU">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">Weight(In Kg)</label>
                                                <input class="form-control" type="text" placeholder="Enter Weight(In Kg)">
                                             </div>
                                             <hr class="mt-4 mb-4">
                                             <h6>Product Status</h6>
                                             <div class="mb-3">
                                                <label class="col-form-label">ID</label>
                                                <input class="form-control" type="text" placeholder="ID">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">Date</label>
                                                <input class="form-control" id="pDate" type="text" placeholder="DATE">
                                             </div>
                                          </form>
                                          <br/><br/><br/>
                                          <hr class="mt-4 mb-4">
                                          <h6 class="pb-3 mb-0">Product Images</h6>
                                          <div class="col-sm-12">
                                             <div class="card">
                                                <div class="card-header pb-0">
                                                   <h5>Image Upload</h5>
                                                </div>
                                                <div class="card-body">
                                                   <form class="dropzone dropzone-primary dz-clickable" id="multiFileUpload" action="/upload.php">
                                                      <div class="dz-message needsclick">
                                                         <i class="icon-cloud-up"></i>
                                                         <h6>Drop files here or click to upload.</h6>
                                                         <span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                                                      </div>
                                                   </form>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="card card-absolute">
                                             <div class="card-header bg-primary">
                                                <h5 class="text-white">Product Description</h5>
                                             </div>
                                             <div class="card-body">
                                                <div style="background-color:#F6F2F2;" id="iDetails"></div>
                                             </div>
                                          </div>
                                          <button class="btn btn-secondary" onclick="SendData()">Preview</button>
                                       </div>
                                       <div class="card-footer">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                        <div class="row">
                           <div class="col-sm-12 col-xl-6">
                              <div class="row">
                                 <div class="col-sm-12">
                                    <div class="card">
                                       <div class="card-header pb-0">
                                          <h5>Product Information</h5>
                                       </div>
                                       <div class="card-body">
                                          <form class="theme-form">
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Product Name</label>
                                                <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter email">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Made in</label>
                                                <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter email">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Category</label>
                                                <select class="form-control" id="category"  onchange="makeSubmenu(this.value)">
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
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Sub Category</label>
                                                <select class="form-control" name="subCat" onchange="changeSub()" id="categorySelect" >
                                                   <option value=" " disabled selected>Select Category First</option>
                                                   <option></option>
                                                </select>
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Warehouse</label>
                                                <select class="form-control  "id="Select" name="warehouse"  onChange="myNewFunction(this);"  required></select>
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Vendor</label>
                                                <select class="form-control  " id="WSelect" name="vendor"  onChange="myVFunction(this);" id="category_id"  required>
                                                </select>
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Lot</label>
                                                <select class="form-control  " id="VSelect" name="lot" id="category_id"  required>
                                                </select>
                                             </div>
                                             <div class="card-header pb-0">
                                                <h5>Attributes</h5>
                                             </div>
                                             <br/>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Gender</label>
                                                <input type="text" class="form-control aiz-tag-input" name="gender" >
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Brand</label>
                                                <input type="text" class="form-control aiz-tag-input" name="Brand" >
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Material</label>
                                                <input type="text" class="form-control aiz-tag-input" name="material" >
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Condition</label>
                                                <select class="form-control " name="condition" id="condition_id">
                                                   <option value=" ">Select condition</option>
                                                   <option value="7/10">7/10</option>
                                                   <option value="8/10">8/10</option>
                                                   <option value="9/10">9/10</option>
                                                   <option value="10/10">10/10</option>
                                                   <option value="Brand New">Brand New</option>
                                                </select>
                                             </div>
                                             <br/><br/>
                                             <div class="card-header" id="heading"> </div>
                                             <div class="card-body" id="mainBody"> </div>
                                          </form>
                                       </div>
                                       <div class="card-footer">
                                          <button class="btn btn-primary">Submit</button>
                                          <button class="btn btn-secondary">Cancel</button>
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
                                                <label class="col-form-label">Product price</label>
                                                <input class="form-control" type="text" placeholder="Product price">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">Quantity</label>
                                                <input class="form-control" type="text" placeholder="Enter email">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">SKU</label>
                                                <input class="form-control" type="text" placeholder="Enter contact number">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">Weight(In Kg)</label>
                                                <input class="form-control" type="text" placeholder="Enter contact number">
                                             </div>
                                             <hr class="mt-4 mb-4">
                                             <h6>Product Status</h6>
                                             <div class="mb-3">
                                                <label class="col-form-label">ID</label>
                                                <input class="form-control" type="text" placeholder="ID">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">Date</label>
                                                <input class="form-control" id="pDate" type="text" placeholder="DATE">
                                             </div>
                                          </form>
                                          <br/><br/><br/>
                                          <hr class="mt-4 mb-4">
                                          <h6 class="pb-3 mb-0">Product Images</h6>
                                          <div class="col-sm-12">
                                             <div class="card">
                                                <div class="card-header pb-0">
                                                   <h5>Multi File Upload</h5>
                                                </div>
                                                <div class="card-body">
                                                   <form class="dropzone dropzone-primary dz-clickable" id="multiFileUpload" action="/upload.php">
                                                      <div class="dz-message needsclick">
                                                         <i class="icon-cloud-up"></i>
                                                         <h6>Drop files here or click to upload.</h6>
                                                         <span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                                                      </div>
                                                   </form>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="card card-absolute">
                                             <div class="card-header bg-primary">
                                                <h5 class="text-white">Product Description</h5>
                                             </div>
                                             <div class="card-body">
                                                <div style="background-color:#F6F2F2;" id="iDetails"></div>
                                             </div>
                                          </div>
                                          <button class="btn btn-secondary" onclick="SendData()">Preview</button>
                                       </div>
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

<!--CUSTOM JS-->





<script>


    function suggestionApi(){
    
     var brand = $("input[name=brand]").val();
      var size = $("input[name=sneakerSize]").val();
      var conS = $("select[name=condition]").val();
      
   

    
  var Cond = ( conS == "9/10") ? "Nine" : ( conS == "8/10") ? "Eight" :  ( conS == "7/10") ? "Seven" :( conS == "10/10") ? "Ten" : "Ten";
 
 

    
var settings = {
  "url": "https://skshoesapi.herokuapp.com/predict?brand="+brand+"&size="+size+"&cond="+Cond+"&dts=10",
  "method": "POST",
  "timeout": 0,
};

$.ajax(settings).done(function (response) {
    console.log(response)
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
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Hoodies</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += sizeLabel;
    document.getElementById('mainBody').innerHTML += hoodieType;
    
    }else if (subCategory == "TrackTops"){
        document.getElementById('mainBody').innerHTML =" "  ;  
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>TrackTops</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += sizeLabel;
    document.getElementById('mainBody').innerHTML += length;
    document.getElementById('mainBody').innerHTML += sleeveSize;
    
    
    
    
    }else if (subCategory == "Polo"){
        document.getElementById('mainBody').innerHTML =" "  ;  
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
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Jackets</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += sizeLabel;
    document.getElementById('mainBody').innerHTML += chest;
    document.getElementById('mainBody').innerHTML += length;
    document.getElementById('mainBody').innerHTML += sleeveSize;
    document.getElementById('mainBody').innerHTML += jacketType;
    
    
    }else if (subCategory == "Jeans"){
        document.getElementById('mainBody').innerHTML =" "  ;  
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Jeans</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += waist;
    document.getElementById('mainBody').innerHTML += inseam;
    document.getElementById('mainBody').innerHTML += rise;
    document.getElementById('mainBody').innerHTML += jeansFitType;
    document.getElementById('mainBody').innerHTML += jeansType;
    
    
    }else if (subCategory == "Shorts"){
        document.getElementById('mainBody').innerHTML =" "  ;  
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Shorts</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += waist;
    document.getElementById('mainBody').innerHTML += inseam;
    document.getElementById('mainBody').innerHTML += rise;
    
    
    }else if (subCategory == "Trouser"){
        document.getElementById('mainBody').innerHTML =" "  ;  
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Trouser</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += waist;
    document.getElementById('mainBody').innerHTML += inseam;
    document.getElementById('mainBody').innerHTML += rise;
    document.getElementById('mainBody').innerHTML += jeansFitType;
    
    }else if (subCategory == "Tracksuit"){
        document.getElementById('mainBody').innerHTML =" "  ;  
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Tracksuit</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += sizeLabel;
    document.getElementById('mainBody').innerHTML += sleeveSize;
    document.getElementById('mainBody').innerHTML += fitType;
    document.getElementById('mainBody').innerHTML += trackNeck;
    
    }else if (subCategory == "Romper"){
        document.getElementById('mainBody').innerHTML =" "  ;  
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Romper</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += sizeLabel;
    document.getElementById('mainBody').innerHTML += sleeveStyle;
    document.getElementById('mainBody').innerHTML += romperNeck;
    document.getElementById('mainBody').innerHTML += chest;
    document.getElementById('mainBody').innerHTML += length;
    
    }else if (subCategory == "Jumpsuit"){
        document.getElementById('mainBody').innerHTML =" "  ;  
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Jumpsuit</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += sizeLabel;
    document.getElementById('mainBody').innerHTML += sleeveStyle;
    document.getElementById('mainBody').innerHTML += neckStyle;
    document.getElementById('mainBody').innerHTML += chest;
    document.getElementById('mainBody').innerHTML += length;
    
    }else if (subCategory == "Peplum"){
        document.getElementById('mainBody').innerHTML =" "  ;  
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Peplum</small></h5>"
    
    document.getElementById('mainBody').innerHTML += sizeLabel;
    document.getElementById('mainBody').innerHTML += sleeveStyle;
    document.getElementById('mainBody').innerHTML += neckStyle;
    
    }
    else if (subCategory == "Dress"){
        document.getElementById('mainBody').innerHTML =" "  ;  
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
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Cap</small></h5>"
    document.getElementById('mainBody').innerHTML += Size  ;
    
    
    }else if (subCategory == "Hats"){
        document.getElementById('mainBody').innerHTML =" "  ;  
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Hats</small></h5>"
    document.getElementById('mainBody').innerHTML += Type  ;
    
    
    }else if (subCategory == "Sneakers"){
       document.getElementById('mainBody').innerHTML =" "  ;  
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
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Sandals</small></h5>"
    document.getElementById('mainBody').innerHTML += Size  ;
    document.getElementById('mainBody').innerHTML += Color  ;
    
    }else if (subCategory == "Khussa"){
        document.getElementById('mainBody').innerHTML =" "  ;  
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Khussa</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += Size  ;
    }
    else if (subCategory == "Formals"){
        document.getElementById('mainBody').innerHTML =" "  ;  
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Formals</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += heelSize  ;
    document.getElementById('mainBody').innerHTML += Size  ;
    }
    else if (subCategory == "Heels"){
        document.getElementById('mainBody').innerHTML =" "  ;  
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Heels</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += heelType  ;
    document.getElementById('mainBody').innerHTML += heelSize  ;
    }
    else if (subCategory == "Boots"){
        document.getElementById('mainBody').innerHTML =" "  ;  
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Boots</small></h5>"
    document.getElementById('mainBody').innerHTML += gender  ;
    document.getElementById('mainBody').innerHTML += heelType  ;
    document.getElementById('mainBody').innerHTML += heelSize  ;
    }
    else if (subCategory == "Watches"){
        document.getElementById('mainBody').innerHTML =" "  ;  
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Watches</small></h5>"
    document.getElementById('mainBody').innerHTML += Color  ;
    document.getElementById('mainBody').innerHTML += watchType  ;
    
    
         
      }
      else if (subCategory == "Headphones"){
        document.getElementById('mainBody').innerHTML =" "  ;  
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Headphones</small></h5>"
    document.getElementById('mainBody').innerHTML += Color  ;
    document.getElementById('mainBody').innerHTML += headConnect  ;
    document.getElementById('mainBody').innerHTML += headType  ;
    
    
    
         
      }
      else if (subCategory == "Tie"){
        document.getElementById('mainBody').innerHTML =" "  ;  
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Tie</small></h5>"
    document.getElementById('mainBody').innerHTML += Size  ;
    document.getElementById('mainBody').innerHTML += tietype  ;
    document.getElementById('mainBody').innerHTML += tiePattern  ;
    
    
    
         
      }
    
      else if (subCategory == "Socks"){
        document.getElementById('mainBody').innerHTML =" "  ;  
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Socks</small></h5>"
    document.getElementById('mainBody').innerHTML += socksType  ;
    document.getElementById('mainBody').innerHTML += socksLength  ;
    
    
    
         
      }
    
      else if (subCategory == "Belts"){
        document.getElementById('mainBody').innerHTML =" "  ;  
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Belts</small></h5>"
    document.getElementById('mainBody').innerHTML += Size;
    
      
      }
      else if (subCategory == "Handbags"){
        document.getElementById('mainBody').innerHTML =" "  ;  
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Handbags</small></h5>"
    document.getElementById('mainBody').innerHTML += Height;
    document.getElementById('mainBody').innerHTML += Width;
    document.getElementById('mainBody').innerHTML += length;
    
      
      }
      else if (subCategory == "Mufflers"){
        document.getElementById('mainBody').innerHTML =" "  ;  
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Mufflers</small></h5>"
    document.getElementById('mainBody').innerHTML += length;
    
    
      
      }
      else if (subCategory == "Gloves"){
        document.getElementById('mainBody').innerHTML =" "  ;  
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Gloves</small></h5>"
    document.getElementById('mainBody').innerHTML += Size;
    
    
      
      }  else if (subCategory == "Scarfs"){
        document.getElementById('mainBody').innerHTML =" "  ;  
    heading.innerHTML = "<h5 class='mb-0 h6'>Product Variations for <small>Scarfs</small></h5>"
    document.getElementById('mainBody').innerHTML += scarfPattern;
    
    
      
      }
    
    
    
    
      
      }
       var date = new Date();
      document.getElementById("pDate").value = date
      
    
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
    
    
    var settings = {
      "url": "https://developer.thriftops.com/dontdelete/addproduct/api/last.php",
      "method": "POST",
      "timeout": 0,
    };
    
    $.ajax(settings).done(function (response) {
     var last_id = response;
       document.getElementById("pID").value = last_id
     
     
    });
        
        
        function Warehouse(){
        
        var settings = {
      "url": "https://developer.thriftops.com/dontdelete/addproduct/api/Warehouse.php",
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
      "url": "https://developer.thriftops.com/dontdelete/addproduct/api/SKU.php?name=" + value,
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
      "url": "https://developer.thriftops.com/dontdelete/addproduct/api/Vendor.php?name="+ value,
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
      "url": "https://developer.thriftops.com/dontdelete/addproduct/api/Lot.php?name="+ value,
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
        
        
        
    </script>
<script>
$(document).on('keyup', 'input[name=sneakerSize]', function() {
  var _this = $(this);
  var min = parseInt(_this.attr('min')) || 1; // if min attribute is not defined, 1 is default
  var max = parseInt(_this.attr('max')) || 100; // if max attribute is not defined, 100 is default
  var val = parseInt(_this.val()) || (min - 1); // if input char is not a number the value will be (min - 1) so first condition will be true
  if (val < min)
    _this.val(min);
  if (val > max)
    _this.val(max);
});
</script>


<!-- footer start-->
<?php include("includes/footer.php");?>

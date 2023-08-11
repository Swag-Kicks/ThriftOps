<?php include("include/header.php");?>
<?php include("include/sidebar.php");?>
<link rel="stylesheet" type="text/css" href="assets/css/dropzone.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function($)
{
   var page_url = '<?php echo $app_url?>/';

   $(document).on('click', '.btn_load_home', function(event)
   {
      event.preventDefault();

      $(document).attr("title", 'Orders');
      $(document).find('meta[name=description]').attr('content', data.description);

      window.history.pushState("", "", page_url);
      $(document).find('.post_msg').html(" ");
   });

   $(document).on('click', '.btn_load_screen', function(event)
   {
      event.preventDefault();

      var call_type = $(this).attr('call_type');

      $.getJSON(page_url+'ajax.php', {call_type: call_type}, function(data, textStatus, xhr)
      {
         console.log(data);

         $(document).attr("title", data.title);
         $(document).find('meta[name=description]').attr('content', data.description);

         $(document).find('.post_msg').html(data.data);

         window.history.pushState("", "", page_url+data.url);
      });
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
<div class="page-body">
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col-sm-6">
               <h3>project list</h3>
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
                        <li class="nav-item "><a class="nav-link btn_load_screen" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="false" call_type="home"><i  class="btn_load_screen" data-feather="target" call_type="home"></i>Ebay</a></li>
                        <li class="nav-item "><a class="nav-link btn_load_screen" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false" call_type="Shopify"><i class="btn_load_screen" data-feather="info" call_type="Shopify"></i>Shopify</a></li>
                        <li class="nav-item "><a class="nav-link active btn_load_screen" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false" call_type="WooCommerce"><i class="btn_load_screen"data-feather="check-circle" call_type="WooCommerce"></i>WooCommerce</a></li>
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
                     <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
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
                     <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
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
<!-- footer start-->
<?php include("includes/footer.php");?>

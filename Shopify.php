<?php include("include/header.php");?>
<?php include("include/sidebar.php");?>
<link rel="stylesheet" type="text/css" href="assets/css/dropzone.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>    
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
                        <li class="nav-item "><a class="nav-link  btn_load_screen" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="false" call_type="home"><i  class="btn_load_screen" data-feather="shopping-cart" call_type="home"></i>Ebay</a></li>
                        <li class="nav-item "><a class="nav-link active btn_load_screen" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false" call_type="Shopify"><i class="btn_load_screen" data-feather="shopping-bag" call_type="Shopify"></i>Shopify</a></li>
                        <!--<li class="nav-item "><a class="nav-link btn_load_screen" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false" call_type="WooCommerce"><i class="btn_load_screen"data-feather="check-circle" call_type="WooCommerce"></i>WooCommerce</a></li>-->
                     </ul>
                  </div>
                  <div class="col-md-6 p-0">
                     <div class="form-group mb-0 me-0 btn-showcase"></div>
                      <button class="btn btn-success" type="button">Save & Publish</button>
                    <button class="btn btn-secondary" type="button" style="margin-right:5px !important;">Save & Draft</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-12">
            <div class="card">
               <div class="card-body">
                  <div class="tab-content" id="top-tabContent">
                     <div class="tab-pane fade " id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                        <div class="row">
                           <div class="col-sm-12 col-xl-6">
                              <div class="row">
                                 <div class="col-sm-12">
                                    <div class="card">
                                       <div class="card-header pb-0">
                                           <h6>Product Status</h6>
                                             <div class="mb-3">
                                                <label class="col-form-label">ID</label>
                                                <input class="form-control" type="text" placeholder="ID" readonly>
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">Date</label>
                                                <input class="form-control" id="pDate" type="text" placeholder="DATE" readonly>
                                             </div>
                                             <hr class="mt-4 mb-4">
                                              <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Specify Category</label>
                                                <input class="form-control" id="" type="text" aria-describedby="" placeholder="Check Category">
                                                <br>
                                                <button class="btn btn-danger" onclick="SendData()">check</button>
                                             </div>
                                              
                                          <h5>Product Information</h5>
                                       </div>
                                       <div class="card-body">
                                          <form class="theme-form">
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Product Title</label>
                                                <input class="form-control" id="" type="text" aria-describedby="" placeholder="Product Title">
                                             </div>
                                            
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Category</label>
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
                                                <label class="col-form-label pt-0" for="">Sub Category</label>
                                                <select class="form-control" name="subCat" onchange="changeSub()" id="categorySelect" >
                                                   <option value=" " disabled selected>Select Category First</option>
                                                   <option></option>
                                                </select>
                                             </div>
                                             
                                             <div class="card-header pb-0">
                                                <h5>Attributes</h5>
                                             </div>
                                             <br/>
                                            
                                              <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Gender</label>
                                                <select class="form-control " name="Gender" id="Gender">
                                                   <option value=" ">Select Gender</option>
                                                   <option value="Male">Male</option>
                                                   <option value="Female">Female</option>
                                                   <option value="Unisex">Unisex</option>
                                                   <option value="Kids">Kids</option>
                                                   <option value="Brand New">Brand New</option>
                                                </select>
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Brand</label>
                                                <input type="text" class="form-control aiz-tag-input" name="Brand" >
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">color</label>
                                                <input type="text" class="form-control aiz-tag-input" name="color" >
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Size</label>
                                                <input type="text" class="form-control aiz-tag-input" name="Size" id="Size" placeholder="Size" >
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Size Type</label>
                                                <input type="text" class="form-control aiz-tag-input" name="SizeType" id="SizeType" placeholder="Size Type" >
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Type</label>
                                                <input type="text" class="form-control aiz-tag-input" name="Type" id="Type" placeholder="Type" >
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Style</label>
                                                <input type="text" class="form-control aiz-tag-input" name="Style" id="Style" placeholder="Style" >
                                             </div>
                                             
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Material</label>
                                                <input type="text" class="form-control aiz-tag-input" name="material" >
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Condition</label>
                                                <select class="form-control " name="condition" id="condition_id">
                                                   <option value=" ">Select condition</option>
                                                   <option value="7/10">7/10</option>
                                                   <option value="8/10">8/10</option>
                                                   <option value="9/10">9/10</option>
                                                   <option value="10/10">10/10</option>
                                                   <option value="Brand New">Brand New</option>
                                                </select>
                                             </div>
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
                                                <label class="col-form-label">Product price</label>
                                                <input class="form-control" type="text" placeholder="Product price" name="Productprice">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">Quantity</label>
                                                <input class="form-control" type="text" placeholder="Enter Quantity" name="Quantity">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">MPN</label>
                                                <input class="form-control" type="text" placeholder="Enter MPN" name="MPN">
                                             </div>
                                              
                                          </form>
                                          <hr class="mt-4 mb-4">
                                          <h6 class="pb-3 mb-0">Shipping</h6>
                                          
                                             
                                                 <div class="mb-3">
                                                <label class="col-form-label">Domestic Courier</label>
                                                <input class="form-control" type="text" placeholder="Enter Domestic Courier" name="Domestic">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">Domestic Ship Price</label>
                                                <input class="form-control" type="text" placeholder="Enter Domestic Ship Price" name="Domestic">
                                             </div>
                                              <div class="mb-3">
                                                <label class="col-form-label">Location</label>
                                                <input class="form-control" type="text" placeholder="Location" name="Location">
                                             </div>
                                             <div class="media">
                        <label class="col-form-label m-r-10">Required International?</label>
                        <div class="media-body text-end icon-state">
                          <label class="switch">
                            <input type="checkbox"><span class="switch-state"></span>
                          </label>
                        </div>
                      </div>
                                              
                                                 
                                          <br/>
                                          <hr class="mt-4 mb-4">
                                          <h6 class="pb-3 mb-0">Product Images</h6>
                                          
                                                    <input class="form-control" type="file"><br>
                                                    <input class="form-control" type="file"><br>
                                                    <input class="form-control" type="file"><br>
                                                    <input class="form-control" type="file"><br>
                                                    <input class="form-control" type="file">
                                            
                                          
                                        
                                       </div>
                              
                                       
                                       
                                    </div>
                                     <div class="">
                        <label class="h6">Description</label>
                        <div class="">
                          <textarea  class="form-control" name="editor1"></textarea>   
                       </div>
                    </div>
                                    <div class="card-footer">
                                       </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                        <div class="row">
                           <div class="col-sm-12 col-xl-6">
                              <div class="row">
                                 <div class="col-sm-12">
                                    <div class="card">
                                       <div class="card-header pb-0">
                                           <h6>Product Status</h6>
                                             <div class="mb-3">
                                                <label class="col-form-label">ID</label>
                                                <input class="form-control" type="text" placeholder="ID" readonly>
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">Date</label>
                                                <input class="form-control" id="pDate" type="text" placeholder="DATE" readonly>
                                             </div>
                                            
                                              
                                          <h5>Product Information</h5>
                                       </div>
                                       <div class="card-body">
                                          <form class="theme-form">
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Product Title</label>
                                                <input class="form-control" id="" type="text" aria-describedby="" placeholder="Product Title">
                                             </div>
                                            
                                              <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Made In</label>
                                                <input class="form-control" id="" type="text" aria-describedby="" placeholder="Made In">
                                        </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Category</label>
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
                                                <label class="col-form-label pt-0" for="">Sub Category</label>
                                                <select class="form-control" name="subCat" onchange="changeSub()" id="categorySelect" >
                                                   <option value=" " disabled selected>Select Category First</option>
                                                   <option></option>
                                                </select>
                                             </div>
                                              <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Product BarCode</label>
                                                <input class="form-control" id="" type="text" aria-describedby="" placeholder="Product BarCode">
                                        </div>
                                              <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Vendor</label>
                                                <input class="form-control" id="" type="text" aria-describedby="" placeholder="Vendor">
                                        </div>
                                        
                                         <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Lot</label>
                                                <input class="form-control" id="" type="text" aria-describedby="" placeholder="Lot">
                                        </div>
                                          <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Product Code</label>
                                                <input class="form-control" id="" type="text" aria-describedby="" placeholder="Product Code">
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label pt-0" for="">Product Barcode</label>
                                            <input class="form-control" id="" type="text" aria-describedby="" placeholder="Product Barcode">
                                    </div>
                                             <div class="card-header pb-0">
                                                <h5>Attributes</h5>
                                             </div>
                                             <br/>
                                            
                                              <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Gender</label>
                                                <select class="form-control " name="Gender" id="Gender">
                                                   <option value=" ">Select Gender</option>
                                                   <option value="Male">Male</option>
                                                   <option value="Female">Female</option>
                                                   <option value="Unisex">Unisex</option>
                                                   <option value="Kids">Kids</option>
                                                   <option value="Brand New">Brand New</option>
                                                </select>
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Brand</label>
                                                <input type="text" class="form-control aiz-tag-input" name="Brand" placeholder="Brand">
                                             </div>
                                             
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Size</label>
                                                <input type="text" class="form-control aiz-tag-input" name="Size" id="Size" placeholder="Size" >
                                             </div>
                                           
                                             
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Material</label>
                                                <input type="text" class="form-control aiz-tag-input" name="material" placeholder="Material" >
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="">Condition</label>
                                                <select class="form-control " name="condition" id="condition_id">
                                                   <option value=" ">Select condition</option>
                                                   <option value="7/10">7/10</option>
                                                   <option value="8/10">8/10</option>
                                                   <option value="9/10">9/10</option>
                                                   <option value="10/10">10/10</option>
                                                   <option value="Brand New">Brand New</option>
                                                </select>
                                             </div>
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
                                                <label class="col-form-label">Enter price</label>
                                                <input class="form-control" type="text" placeholder="Product price" name="Enter price">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">Cost price</label>
                                                <input class="form-control" type="text" placeholder="Product Cost price" name="Cost price">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">Quantity</label>
                                                <input class="form-control" type="text" placeholder="Enter Quantity" name="Quantity">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">SKU</label>
                                                <input class="form-control" type="text" placeholder="Enter SKU" name="SKU">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">Weight (kg)</label>
                                                <input class="form-control" type="text" placeholder="Enter Weight" name="Weight">
                                             </div>
                                              
                                          </form>
                                          
                                             
                                              
                                                 
                                          <br/>
                                          <hr class="mt-4 mb-4">
                                          <h6 class="pb-3 mb-0">Product Images</h6>
                                          
                                                    <input class="form-control" type="file"><br>
                                                    <input class="form-control" type="file"><br>
                                                    <input class="form-control" type="file"><br>
                                                    <input class="form-control" type="file"><br>
                                                    <input class="form-control" type="file">
                                            
                                          
                                       </div>
                                       
                                       
                                    </div>
                                     <div class="">
                        <label class="h6">Description</label>
                        <div class="">
                          <textarea  class="form-control" name="editor2"></textarea>   
                       </div>
                    </div><div class="card-footer">
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
        $('#trackingDiv').html(editorText);
    
</script>  
<!-- footer start-->
<?php include("include/footer.php");?>

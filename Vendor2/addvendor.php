<?php include("../include/header.php");?>
<?php include("../include/side_admin.php");?>
<link rel="stylesheet" type="text/css" href="assets/css/dropzone.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="application/javascript" src="assets/custom/elements.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Page Body Start-->

<div class="page-body">

   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="row project-cards">
         <div class="col-md-12 project-list">
            <div class="card">
               <div class="row">
                  <div class="col-md-6 p-0">
                     <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                        <!--<li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="false"><i data-feather="target"></i>Ebay</a></li>-->
                        <li class="nav-item"><a class="nav-link active" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false"><i data-feather="shopping-bag"></i>Add</a></li>
                        <!--<li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false"><i data-feather="check-circle"></i>WooCommerce</a></li>-->
                     </ul>
                  </div>
                  <div class="col-md-6 p-0">
                     <div class="form-group mb-0 me-0"></div>
                     <!--<a class="btn btn-primary" href="projectcreate.html"> <i data-feather="plus-square"> </i>Create New Project</a>-->
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
                                          <h5>Basic Information</h5>
                                       </div>
                                       <div class="card-body">
                                          <form class="theme-form">
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Name</label>
                                                <input class="form-control" id="exampleInputEmail1" type="text" name="name" aria-describedby="emailHelp" placeholder="Inventory">
                                             </div>
                                              <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Email</label>
                                                <input class="form-control" id="exampleInputEmail1" type="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Phone</label>
                                                <input class="form-control" id="exampleInputEmail1" type="text" name="contact" aria-describedby="emailHelp" placeholder="Enter Phone">
                                             </div>
                                               <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Address</label>
                                                <input class="form-control" id="exampleInputEmail1" type="text"  name="address" aria-describedby="emailHelp" placeholder="Enter Address">
                                             </div>
                                             
                                         
                                              <label class="col-form-label pt-0" for="exampleInputEmail1">Type</label>
                                             <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                                 
                          <div class="radio radio-primary">
                            <input id="radioinline1" type="radio" name="Vtype" value="Peer">
                            <label class="mb-0" for="radioinline1">Peer</label>
                          </div>
                          <div class="radio radio-primary">
                            <input id="radioinline2" type="radio" name="Vtype" value="Seller">
                            <label class="mb-0" for="radioinline2">Seller/Vendor</label>
                          </div>
                      
                        </div>
                                           
                                          
                                            
                                          </form>
                                       </div>
                                      
                                    </div>
                                 </div>
                                       <div class="col-sm-12">
                                    <div class="card">
                                       <div class="card-header pb-0">
                                          <h5>Inventory</h5>
                                       </div>
                                       <div class="card-body">
                                          <form class="theme-form">
                                             <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Select Warehouse</label>
                                                  <select class="form-control  "id="Select" name="warehouse"   required></select>
                                             </div>
                                              <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Fullfillment</label>
                                                <select class="form-control" name="fments" >
                                                   <option value=" " disabled selected>Select Fulfillment Type</option>
                                                   <option value="Swag">Swag</option>
                                                   <option value="Dropship">Dropship</option>
                                                </select>
                                             </div>
                                                <div class="mb-3">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Contract</label>
                                                <select class="form-control" name="type" >
                                                   <option value=" " disabled selected>Contract Type</option>
                                                   <option value="A">Cash</option>
                                                   <option value="B">Percentage</option>
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
                                          <h5>Credentials</h5>
                                       </div>
                                       <div class="card-body">
                                          <form class="theme-form mega-form">
                                             <div class="mb-3">
                                                <label class="col-form-label">Username</label>
                                                <input class="form-control" type="text" placeholder="Username">
                                                 
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">Password</label>
                                                <input class="form-control" type="password" placeholder="Password">
                                             </div>
                                             <div class="mb-3">
                                                <label class="col-form-label">Confirm Password</label>
                                                <input class="form-control" type="password" placeholder="Confirm Password">
                                             </div>
                                       
                                            
                                          </form>
                                     
                                      
                                    
                                          </div>
                                         
                                       </div>
                                       <div class="card-footer">
                                            <button class="btn btn-danger" onclick="SendData()">Submit</button>
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







  

<!--(WASAY Scripts) Don't Change it-->

<script>
    
    var settings = {
  "url": "/theme/html_admin/api/Warehouse.php",
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

function SendData(){


 var name = $("input[name=name]").val();
       var email = $("input[name=email]").val();
         var contact = $("input[name=contact]").val();
          var address = $("input[name=address]").val();
            var vtype = $("input[name=Vtype]").val();
         var warehouse = $("select[name=warehouse]").val();
           var fments = $("select[name=fments]").val();
           var type = $("select[name=type]").val();
         


var form = new FormData();
form.append("name", name);
form.append("email", email);
form.append("contact", contact);
form.append("percentage", "aa");
form.append("address",address);
form.append("vtype", vtype);
form.append("warehouse", warehouse);
form.append("fments", fments);
form.append("type", type);

var settings = {
  "url": "/theme/html_admin/api/vendorAdd.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
  //console.log(response);
Swal.fire({
  position: 'top-center',
  icon: 'success',
  title: 'Vendor Added Successfully',
  showConfirmButton: false,
  timer: 1500
})
  
  
});

}
</script>


















<!-- footer start-->
<?php include("includes/footer.php");?>

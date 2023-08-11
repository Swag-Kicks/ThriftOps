<?php

 
session_start();
include_once("../include/mysql_connection.php"); 
$cr=$_SESSION['Username'];
// if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
// {
//     $pr="Select * from Users Where Dept_ID=5 AND Username='$cr' OR Dept_ID=3 AND Username='$cr'";
//     $resu2 = mysqli_query($mysql, $pr);
//     $rowq1 =mysqli_fetch_array($resu2);
//     $dept=$rowq1['Dept_ID'];
//     //echo $dept;
//     if($dept=='')
//     {
//         echo '<script>alert("Your Are Not Authorized !");window.location.href="../Dashboard/Home.php";</script>';
//     }   
// }
// else 
// {
//     echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
   
// }


?>
<?php include ("../include/header.php"); ?>
<?php include_once("../include/mysql_connection.php");  ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>
        <!-- Page body start-->
        <div class="page-body">
          <!-- Container-fluid starts-->
          <div class="container-fluid">
              <div class="page-header">
         <div class="row">
            <div class="col-sm-6 p-t-30 p-l-35">
               <h3>Create Order</h3>
               
            </div>
            
         </div>
      </div>
            <div class="select2-drpdwn">
              <form>
        <div class="row">
            <div class="col-lg-7">
                
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Products</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Product Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="title" placeholder="Product Name" onchange="update_sku()" required>
                            </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 col-from-label">Made In</label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" name="name" placeholder="USA , CHINA ">
                          </div>
                      </div>
                       

                    <div class="form-group row" id="category">
                        <label class="col-md-3 col-from-label">Category</label>
                        <div class="col-md-8">
                            <select class="form-control" id="category"  onchange="makeSubmenu(this.value)">
                                <option value="" disabled selected>Select Category</option>
                                <option>Tops</option>
                                <option>Bottoms</option>
                                <option>Suit</option>
                                <option>Headwear</option>
                                <option>Footwear</option>
                                <option>Gadget</option>
                                <option>Accessories</option>
                                </select>
                        </div>
                    </div>
                    <div class="form-group row" id="category">
                        <label class="col-md-3 col-from-label">Sub Category</label>
                        <div class="col-md-8">
                            <select class="form-control" id="categorySelect" >
                                <option value="" disabled selected>Select Category First</option>
                                <option></option>
                                </select>
                        </div>
                    </div>
                      <div class="form-group row" id="Sub_category">
                        <label class="col-md-3 col-from-label">Warehouse</label>
                        <div class="col-md-8">
                            <select class="form-control  " name="Sub_category_id" id="category_id"  required>
                              <option value="">Select Warehouse</option>
                                                                    <option value="2">Nazimabad</option>
                                                                    <option value="3">khalid bin walid Road</option>
                                                                    <option value="4">China</option> </select>
                        </div>
                    </div>
                    <div class="form-group row" id="Sub_category">
                      <label class="col-md-3 col-from-label">vendor</label>
                      <div class="col-md-8">
                          <select class="form-control  " name="Sub_category_id" id="category_id"  required>
                            <option value="">Select Vendor</option>
                                                                  <option value="2">Vendor1</option>
                                                                  <option value="3">Vendor2</option>
                                                                  <option value="4">Vendor3</option> </select>
                      </div>
                  </div>
                   

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Lot</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control aiz-tag-input" name="Lot" required >
                            </div>
                        </div>
                        <h5 class="mb-0 h6">Attributes</h5>
                        <hr>
                        <div class="form-group row" id="brand">
                            <label class="col-md-3 col-from-label">Brand</label>
                            <div class="col-md-8">
                            
                                    <input type="text" class="form-control aiz-tag-input" name="Brand" >
                                
                            </div>
                        </div>
                        <div class="form-group row" id="brand">
                            <label class="col-md-3 col-from-label">Condition</label>
                            <div class="col-md-8">
                                <select class="form-control " name="condition_id" id="condition_id">
                                    <option value="">Select condition</option>
                                                                        <option value="Con1">7/10</option>
                                                                        <option value="Con2">8/10</option>
                                                                        <option value="Con3">9/10</option>
                                                                        <option value="Con4">10/10</option>
                                                                        <option value="Con4">Brand New</option>
                                                                    </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Material</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control aiz-tag-input" name="material" >
                            </div>
                        </div>

                       
                                            </div>
                </div>    
                <!-- T-shirts -->
                <div class="card Data" id="T-Shirts" >
                  <div class="card-header">
                      <h5 class="mb-0 h6">Product Variations  <small> for T-Shirts</small></h5>
                  </div>
                  <div class="card-body">
                    <div class="form-group row" id="Sub_category">
                        <label class="col-md-3 col-from-label">Gender</label>
                        <div class="col-md-8">
                            <select class="form-control  " name="Sub_category_id" id="category_id"  required>
                              <option value="">Select Gender</option>
                                                                    <option value="2">Male</option>
                                                                    <option value="3">Female</option>
                                                                    <option value="4">Unisex</option> </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Size on Label</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" placeholder="Size on Label ">
                        </div>
                    </div>
                    <div class="form-group row" id="Sub_category">
                        <label class="col-md-3 col-from-label">Sleeve Style</label>
                        <div class="col-md-8">
                            <select class="form-control  " name="Sub_category_id" id="category_id"  required>
                              <option value="">Select Sleeve Style</option>
                                                                    <option value="2">Full</option>
                                                                    <option value="3">Short</option>
                                                                    <option value="4">3/4</option>
                                                                    <option value="4">sleeveless</option> </select>
                        </div>
                    </div>
                    <div class="form-group row" id="Sub_category">
                        <label class="col-md-3 col-from-label">Neck Style</label>
                        <div class="col-md-8">
                            <select class="form-control  " name="Sub_category_id" id="category_id"  required>
                              <option value="">Select Neck Style</option>
                                                                    <option value="2">V Neck</option>
                                                                    <option value="3">Round Neck</option>
                                                                    <option value="4">Boat Neck</option> </select>
                        </div>
                    </div>
                    <div class="form-group row" id="Sub_category">
                        <label class="col-md-3 col-from-label">Fit Type</label>
                        <div class="col-md-8">
                            <select class="form-control  " name="Sub_category_id" id="category_id"  required>
                              <option value="">Select Fit Type</option>
                                                                    <option value="2">Slim</option>
                                                                    <option value="3">Regular</option>
                                                                    <option value="4">Wide/loose</option> </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Chest(P2P)</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" name="name" placeholder="Chest(P2P) ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Length</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" name="name" placeholder="Length">
                        </div>
                    </div>
                  </div>
              </div>
               

            <!--<div class="aiz-titlebar text-center mt-6 mb-3">-->
            <!--    <h6 class="mb-0 h6">Description Preview</h6>-->
            <!--</div>-->
              <div class="card">
                <div class="card-header">
                    <h6 class="">Product Description</h6>
                    <button class="btn btn-outline-warning" onclick="formdataa()" id="btn">Preview</button>
                </div>
                <div class="card-body">
                    <div class="">
                        <label class="h6">Description</label>
                        <div class="">
                          <textarea  class="form-control" name="editor1"></textarea>   
                       </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="col-lg-5">

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">
                            Product Status
                        </h5>
                    </div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">
                                ID
                            </label>
                            <div class="col-md-8">
                                <input type="" placeholder="2401" name="Weight" class="form-control" readonly>
                            </div>
                        </div> <div class="form-group row">
                            <label class="col-md-3 col-from-label">
                                Date
                            </label>
                            <div class="col-md-8">
                                <input type="" placeholder="12/9/2022  10:23 pm" name="Weight" class="form-control" readonly>
                            </div>
                        </div>
                        <hr>
                        <div class="col-lg-12">
                          <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                              <div class="btn-group mr-2">
                                  <button type="submit" name="button" value="Preview" class="btn btn-dark action-btn">Save &amp; Draft</button>
                              </div>
                              <div class="btn-group"  >
                                  <button name="publish" class="btn btn-success action-btn">Save &amp; publish</button>
                              </div>
                          </div>
                      </div>
                                            </div>
                </div>
                <div class="card">
                  <div class="card-header">
                      <h5 class="mb-0 h6">Product price & Quantity</h5>
                  </div>
                  <div class="card-body">
                      <div class="form-group row">
                          <label class="col-md-3 col-from-label">Product price</label>
                          <div class="col-md-8">
                              <input type="number" lang="en" placeholder="Enter Product price" name="unit_price" class="form-control" required>
                              <p class="col-md-7 text-muted  ">Suggested Price  <a href=""> Rs 1850</a></p>
                          </div>
                          
                          
                      </div>
                      
                      
                      <div id="show-hide-div">
                          <div class="form-group row">
                              <label class="col-md-3 col-from-label">Quantity</label>
                              <div class="col-md-8">
                                  <input type="number"  placeholder="Quantity" name="current_stock" class="form-control" required>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-md-3 col-from-label">
                                  SKU
                              </label>
                              <div class="col-md-8">
                                  <input type="text" placeholder="SKU" name="sku" class="form-control" required>
                              </div>
                          </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-from-label">
                            Weight<small>(In Kg)</small>
                        </label>
                        <div class="col-md-8">
                            <input type="text" placeholder="Weight" name="Weight" class="form-control" required>
                        </div>
                    </div>
                      <br>
                  </div>
              </div>
              

             <div class="card">
                  <div class="card-header">
                      <h5 class="mb-0 h6">Product Images</h5>
                  </div>
                  <div class="card-body">
                      <div class="form-group row">
                          <label class="col-md-3 col-form-label" for="signinSrEmail">Main image</label>
                          <div class="col-md-8">
                              <div class="input-group" data-type="image" data-multiple="true">
                                  <div class="input-group-prepend">
                                      <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                  </div>
                                  <div class="form-control file-amount">Choose File</div>
                                  <input type="hidden" name="photos" class="selected-files">
                              </div>
                              <div class="file-preview box sm">
                              </div>
                              <small class="text-muted">Main Product Image.</small>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-3 col-form-label" for="signinSrEmail">Secondary Img (1)</label>
                          <div class="col-md-8">
                              <div class="input-group" data-toggle="aizuploader" data-type="image">
                                  <div class="input-group-prepend">
                                      <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                  </div>
                                  <div class="form-control file-amount">Choose File</div>
                                  <input type="hidden" name="thumbnail_img" class="selected-files">
                              </div>
                              <div class="file-preview box sm">
                              </div>
                          </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">Secondary Img (2)</label>
                        <div class="col-md-8">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose File</div>
                                <input type="hidden" name="thumbnail_img" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label" for="signinSrEmail">Secondary Img (3)</label>
                      <div class="col-md-8">
                          <div class="input-group" data-toggle="aizuploader" data-type="image">
                              <div class="input-group-prepend">
                                  <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                              </div>
                              <div class="form-control file-amount">Choose File</div>
                              <input type="hidden" name="thumbnail_img" class="selected-files">
                          </div>
                          <div class="file-preview box sm">
                          </div>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="signinSrEmail">Secondary Img (4)</label>
                    <div class="col-md-8">
                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                            </div>
                            <div class="form-control file-amount">Choose File</div>
                            <input type="hidden" name="thumbnail_img" class="selected-files">
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div>
                </div>
                  </div>
              </div>

            </div>

        </div>
    </form>
          </div>
          <!-- Container-fluid Ends-->
          
   </div>
   <!--modal batch end-->
        </div>
        <!-- footer start-->
        

<?php include ("../include/footer.php"); ?>

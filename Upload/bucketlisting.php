<?php  
   session_Start();
   ?>
<?php include("../include/header.php");?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<style>
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
   <div class="container-fluid px-4">
      <div style="float:right;">
         <button class="btn btn-outline-info"  onclick="QCreject()" type="button" id="qcrb">QC Rejected </button>
         <button class="btn btn-danger"  type="button"  onclick="addProductDB('draft','draft')" id="save1" disabled>Save</button>
         <button class="btn btn-danger"  type="button"  onclick="addShopify()" id="Sbutton" disabled>Publish</button>
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
                                       <input class="form-control " id="title" type="title"  onchange="iDetails();button();" name="title" placeholder="Enter Product Name">
                                    </div>
                                    <div class="col-sm-12 row">
                                       <div class="col-sm-6">
                                          <div class="mb-3">
                                             <label class="col-form-label pt-0">Condition</label>
                                             <select class="form-control form-select  " name="condition"  onchange="iDetails();predict2();button();"  id="condition_id">
                                                <option value="07/10">07/10</option>
                                                <option value="08/10">08/10</option>
                                                <option value="09/10">09/10</option>
                                                <option value="10/10">10/10</option>
                                                <option value="Brand New">Brand New</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-sm-6">
                                          <div class="mb-3">
                                             <label class="col-form-label pt-0">Brand</label>
                                             <select id='selUser' name="brand"  onchange="iDetails();predict2();button();" class="form-control form-select " >
                                                <option value='0'>Other</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row">
                                       <div class="col-sm-6">
                                          <label class="col-form-label pt-0" >Quantity</label>
                                          <input class="form-control " type="number" name="quantity"  onchange="SendData();button();"  placeholder="Enter Quantity">
                                       </div>
                                       <div class="col-sm-6">
                                          <label class="col-form-label pt-0" >Made in</label>
                                          <input class="form-control " type="text" name="made" id="madein"  onchange="iDetails()button();" aria-describedby="emailHelp" placeholder="Enter Made in">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row">
                                       <div class="col-sm-4">
                                          <label class="col-form-label pt-0" >Material</label>
                                          <input class="form-control "  type="text" name="material" onchange="SendData()button();" placeholder="Enter Material">
                                       </div>
                                       <div class="col-sm-4">
                                          <label class="col-form-label pt-0" >Weight</label>
                                          <input class="form-control "  type="number" name="weight" onchange="SendData()button();" placeholder="Enter Weight">
                                       </div>
                                       <div class="col-sm-4">
                                          <label class="col-form-label pt-0" >color</label>
                                          <input class="form-control "  type="text" name="color" onchange="SendData()button();" placeholder="Enter color">
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row">
                                        <div class="col-sm-4">
                                          <label class="col-form-label pt-0" >Product Type</label>
                                          <input class="form-control " type="text" name="producttype" onchange="SendData()button();" placeholder="Enter Product Type">
                                       </div>
                                       <div class="col-sm-4">
                                          <label class="col-form-label pt-0" >Product Code</label>
                                          <input class="form-control " id="pcode" type="text" onchange="SendData()button();" name="pcode"  placeholder="Enter Product Code">
                                       </div>
                                       <div class="col-sm-4">
                                          <label class="col-form-label pt-0">Gender</label>
                                          <select class="form-control form-select  "   onchange="iDetails();button();" name="gender">
                                             <option value="Men">Men</option>
                                             <option value="Women">Women</option>
                                             <option value="Unisex">Unisex</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label pt-0" >Size</label>
                                             <!--<input class="form-control "  type="number" name="SizeEURO"  onchange="SendData()" placeholder="Enter Size">-->
                                             <select class="form-control form-select"  name="SizeEURO"  onchange="iDetails();predict2();button();" name="gender">
                                                <option value="6">6</option>
                                                <option value="6.5">6.5</option>
                                                <option value="7">7</option>
                                                <option value="7.5">7.5</option>
                                                <option value="8">8</option>
                                                <option value="8.5">8.5</option>
                                                <option value="9">9</option>
                                                <option value="9.5">9.5</option>
                                                <option value="10">10</option>
                                                <option value="10.5">10.5</option>
                                                <option value="11">11</option>
                                                <option value="11.5">11.5</option>
                                                <option value="12">12</option>
                                                <option value="12.5">12.5</option>
                                                <option value="13">13</option>
                                                <option value="13.5">13.5</option>
                                                <option value="14">14</option>
                                                <option value="14.5">14.5</option>
                                                <option value="15">15</option>
                                                <option value="15.5">15.5</option>
                                                <option value="16">16</option>
                                                <option value="16.5">16.5</option>
                                                <option value="17">17</option>
                                                <option value="17.5">17.5</option>
                                                <option value="18">18</option>
                                                <option value="18.5">18.5</option>
                                                <option value="19">19</option>
                                                <option value="19.5">19.5</option>
                                                <option value="20">20</option>
                                                <option value="20.5">20.5</option>
                                                <option value="21">21</option>
                                                <option value="21.5">21.5</option>
                                                <option value="22">22</option>
                                                <option value="22.5">22.5</option>
                                                <option value="23">23</option>
                                                <option value="23.5">23.5</option>
                                                <option value="24">24</option>
                                                <option value="24.5">24.5</option>
                                                <option value="25">25</option>
                                                <option value="25.5">25.5</option>
                                                <option value="26">26</option>
                                                <option value="26.5">26.5</option>
                                                <option value="27">27</option>
                                                <option value="27.5">27.5</option>
                                                <option value="28">28</option>
                                                <option value="28.5">28.5</option>
                                                <option value="29">29</option>
                                                <option value="29.5">29.5</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>
                                                <option value="37">37</option>
                                                <option value="38">38</option>
                                                <option value="39">39</option>
                                                <option value="40">40</option>
                                                <option value="41">41</option>
                                                <option value="42">42</option>
                                                <option value="43">43</option>
                                                <option value="44">44</option>
                                                <option value="45">45</option>
                                                <option value="46">46</option>
                                                <option value="47">47</option>
                                                <option value="48">48</option>
                                                <option value="49">49</option>
                                                <option value="50">50</option>
                                                <option value="51">51</option>
                                                <option value="XXXXS">XXXXS</option>
                                                <option value="XXXS">XXXS</option>
                                                <option value="XXS">XXS</option>
                                                <option value="XS">XS</option>
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>
                                                <option value="XXXL">XXXL</option>
                                                <option value="XXXXL">XXXXL</option>
                                                <option value="XXXXXL">XXXXXL</option>
                                                <option value="onesize">One Size</option>

                                             </select>
                                        </div>
                                        <div class="col-sm-6">
                                          <label class="col-form-label pt-0" >Price</label>
                                          <input type="hidden" id="predi" />
                                          <input class="form-control " id="price" type="number"   onchange="iDetails();button();" name="price"  placeholder="Enter Price" required>
                                          <p class="col-form-label pt-0" id="predict" ></p>
                                       </div>
                                    </div>
                              </div>
                              </form>
                              <br/>  
                           </div>
                        </div>
                     </div>
                     <div  class="col-sm-12" id="Mattr" style="display:none;">
                        <div class="card cardshadow">
                           <div class="card-header pb-0">
                              <h5>Attributes</h5>
                           </div>
                           <div class="card-body">
                              <div class="card-header" id="heading" style="display:none"> </div>
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
                           <form action="upload.php" enctype="multipart/form-data" class="dropzone" id="image-upload">
                              <div>
                                 <ul id="sortUl"  class="drag-sort-enable ulS">
                                    <li id="1li" class="imgLI"><img  id="img1" class="productImage" src="" /><button class="btn-close clz" type="button" aria-label="Close" data-bs-original-title="" title=""  onclick="deleteImg('1li')" onchange="button();"></button> </li>
                                    <li   id="2li"   class="imgLI"><img  id="img2" class="productImage" src="" /><button class="btn-close clz" type="button" aria-label="Close" data-bs-original-title="" title=""  onclick="deleteImg('2li')" onchange="button();" ></button> </li>
                                    <li    id="3li"  class="imgLI"><img  id="img3" class="productImage" src="" /><button class="btn-close clz" type="button" aria-label="Close" data-bs-original-title="" title=""   onclick="deleteImg('3li')" onchange="button();"></button> </li>
                                    <li   id="4li"    class="imgLI"><img  id="img4" class="productImage" src="" /><button class="btn-close clz" type="button" aria-label="Close" data-bs-original-title="" title=""   onclick="deleteImg('4li')" onchange="button();"></button> </li>
                                    <li     id="5li" class="imgLI"><img  id="img5" class="productImage" src="" /><button class="btn-close clz" type="button" aria-label="Close" data-bs-original-title="" title=""   onclick="deleteImg('5li')" onchange="button();"></button> </li>
                                    <li     id="6li" class="imgLI"><img  id="img6" class="productImage" src="" /><button class="btn-close clz" type="button" aria-label="Close" data-bs-original-title="" title=""   onclick="deleteImg('6li')" onchange="button();"></button> </li>
                                 </ul>
                                 <div id="dzonetitle">
                                    <h3><i class="icon-cloud-up"></i></h3>
                                    <p>Drop Images OR Click to Upload</p>
                                 </div>
                              </div>
                           </form>
                        </div>
                        <div class="card ">
                           <div class="card-header">sortUl
                              <h5 class="">Shopify Description</h5>
                           </div>
                           <div class="card-body">
                              <div style="padding: 40px;background-color:#E6E6E6;" id="iDetails"></div>
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
                                    <select class="form-control form-select  " id="SelectC" name="catID"  onchange="MakeSubcat();button();"   required>
                                       <option selected="true" disabled="disabled">-SELECT CATEGORY</option>
                                    </select>
                                 </div>
                                 <div class="mb-3">
                                    <h5>Sub-Category</h5>
                                    <select class="form-control  form-select  " id="Select1" name="subcatValue"  onChange="subcatchange();button();"  required>
                                       <option selected="true" disabled="disabled">-SELECT SUB-CATEGORY</option>
                                    </select>
                                 </div>
                                 <div class="mb-3" id="shoetypediv">
                                    <h5>Shoe Type</h5>
                                    <select class="form-control form-select" id="shoetype" name="shoetype"  onchange="predict2();"   required>
                                       <option selected="true" disabled="disabled">-SELECT Shoe Type</option>
                                       <option value="0">Normal</option>
                                       <option value="1">Premium</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div  class="col-sm-12">
                           <div class="card cardshadow">
                              <div class="card-body">
                                 <div class="mb-3" >
                                    <h5>Status</h5>
                                    <select class="form-control  form-select" onchange="button();" name="status"  >
                                       <option value="active">Active</option>
                                       <option value="draft">Draft</option>
                                    </select>
                                 </div>
                                 <div class="mb-3" >
                                    <h5>Push Product to</h5>
                                    <a href="javascript:void(0)" ><i  onclick="selectAllSwitches()" style="color: #d00000 !important;">Select All</i></a>
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
                                    <select class="form-control form-select" name="Warehouse"  id="SelectW" name="warehouse" onchange="getSKU();button();"   required>
                                       <option selected="true" disabled="disabled">-SELECT WAREHOUSE</option>
                                    </select>
                                 </div>
                                 <!--<div class="mb-3">-->
                                    <!--<label class="col-form-label pt-0" for="exampleInputEmail1">Vendor</label>-->
                                    <!--<select class="form-control form-select" id="SelectV" name="Vendor"    required></select>-->
                                 <!--</div>-->
                                 <div class="mb-3">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">SKU/Barcode</label>
                                    <input class="form-control " id="SKU" type="text" name="sku" aria-describedby="emailHelp" placeholder="Enter SKU/Barcode" onchange="checkAlocation();predict2();button();" onkeyup="checkSKU()" >
                                    <span id="noteSKU"></span>
                                 </div>
                                 <div class="mb-3">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Rack Location</label>
                                    <input class="form-control " id="location" type="text" name="location" onchange="button();" aria-describedby="emailHelp" placeholder="Enter Location">
                                    <span id="noteR"></span>
                                 </div>
                                 <!--<button onclick="getAttrValue()">GET INPUT VAlUES</button>-->
                              </div>
                           </div>
                        </div>
                        <div  class="col-sm-12" id="ebayAttr2" >
                           <div class="card cardshadow">
                              <div class="card-body">
                                 <div class="mb-3" >
                                    <h5>Ebay Logistic Details</h5>
                                    <select class="form-control form-select  "id="Select" name="warehouse"  onChange="myNewFunction(this);"  required></select>
                                 </div>
                                 <div class="mb-3">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Country</label>
                                    <select class="form-control form-select  "  onchange="SendData()" name="gender">
                                       <option value=" ">Select  </option>
                                       <option value="PK">Pakistan</option>
                                       <option value="UK">UK</option>
                                    </select>
                                 </div>
                                 <div class="mb-3">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Currency</label>
                                    <select class="form-control form-select  "  onchange="SendData()" name="gender">
                                       <option value=" ">Selectr</option>
                                       <option value="pkr">PKR</option>
                                       <option value="pound">POUND</option>
                                    </select>
                                 </div>
                                 <div class="mb-3">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Domestic Shipping Cost</label>
                                    <input class="form-control " id="title" type="text" name="location" aria-describedby="emailHelp" placeholder="Enter Location">
                                 </div>
                                 <div class="mb-3">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Location</label>
                                    <input class="form-control " id="title" type="text" name="location" aria-describedby="emailHelp" placeholder="Enter Location">
                                 </div>
                                 <div class="mb-3">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Postal Code</label>
                                    <input class="form-control " id="title" type="text" name="location" aria-describedby="emailHelp" placeholder="Enter Location">
                                 </div>
                                 <div class="mb-3">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Domestic Courier</label>
                                    <select class="form-control form-select  "  onchange="SendData()" name="gender">
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
$('#shoetypediv').hide();
    //price algo start
    const predict2 = () =>{
        // iDetails();
       var conS = $("select[name=condition]").val();
         var Cond = ( conS == "09/10") ? "Nine" : ( conS == "08/10") ? "Eight" :  ( conS == "07/10") ? "Seven" :( conS == "10/10") ? "Ten" : "Ten";
        var shoe_type=document.getElementById("shoetype").value;
        // var Price = $("input[name=Price]").val(Cond);
        var Brand = $("#selUser option:selected").text();
        var Size = $("select[name=SizeEURO]").val();
        var SKU =  $("input[name=sku]").val();
   
       //console.log("Cond",Cond ,"Brand",Brand,"Size",Size,"SKU",SKU )
        var subcats=document.getElementById("Select1").value;
        if(subcats==71)
        {
           
            // $('#shoetypediv').show();
            
            var settings = {
                      "url": "Pricecurl.php?Brand="+Brand+"&Size="+Size+"&Cond="+Cond+"&SKU="+SKU+"&Type="+shoe_type,
                      "method": "GET",
                      "timeout": 0,
                };
    
                $.ajax(settings).done(function (response) {
                console.log(response);
                document.getElementById('predi').value=response;
            document.getElementById('predict').innerHTML = `<p style="margin-left:38%;position: relative;top: -55px;float: right;font-size: 12px;">Suggested price is: <b style="color:red">${response}</b></p>`
    
            });
        }
    }

    //price algo end
</script>
<script>

   var catname1;
           function CategoryChange(){
           
           var settings = {
         "url": "api/getCat.php",
         "method": "POST",
         "timeout": 0,
       };
       
       $.ajax(settings).done(function (response) {
         var data = JSON.parse(response);
         
         
        
       
         for (var i = 0; i < data.length; i++) {
       
              
           var select = document.getElementById("SelectC");
           var option = document.createElement("option");
           option.text = data[i].Name;
           option.value = data[i].Product_ID;
           select.add(option);
          
       }
       });
           
       }
       
       
       const myTimeout1 = setTimeout( CategoryChange(), 500);
   
   
   
   var inputvalues = []
   var finalValues = ""
   function getAttrValue(){
       
   
    var allVal = '';
     $("#formArea > input").each(function() {
       allVal +=  ' <li><b>' + $(this).attr('name') +': </b>'+ $(this).val();+'</li>'
     });
     document.getElementById('innerAtr').innerHTML = allVal
   
     
     innerAtr
       
     var inputs = document.querySelectorAll('#formArea input');
    for(var i = 0; i < inputs.length; i++){
        
        inputvalues.push({[inputs[i].id]:inputs[i].value})
   
   
     var finalInputarray = inputvalues.slice((inputvalues.length - inputs.length), inputvalues.length)
     
    finalValues = finalInputarray 
     }
       
   
      
       
       
   }
   
   var div1 =`<div style="background-color:#F6F2F2;border-radius:8px;">`;
   var ul1 =`<ul style="columns:2;-webkit-columns:2;-moz-columns:2">`;
   
   
   
   function iDetails(){
       
           
           
    var titleI = $("input[name=title]").val();
      var priceI = $("input[name=price]").val();
       var made = $("input[name=made]").val();
       var material = $("input[name=material]").val();
       var cond = $("select[name=condition]").val();
       var size = $("select[name=SizeEURO]").val();
       var brand = $("#selUser option:selected").text();
       var sku = $("input[name=sku]").val();
       var code = $("input[name=pcode]").val();

    
     document.getElementById('iDetails').innerHTML = `
    
       <h2>Item Details</h2>
       <br/>
       ${ul1}
       <li><b>Material: </b>${material}</li>
       <li><b>Condition: </b>${cond}</li>
       <li><b>Brand: </b>${brand}</li>
       <li><b>Made in: </b>${made}</li>
       <li><b>Product Code: </b>${code}</li>
       <li><b>SKU: </b>${sku}</li>
     
   
      
       </ul>     <br/>
    
        <h2>Size <a href='https://www.swag-kicks.com/pages/size-chart'><h4 style="color:red">(View Size Chart)</h4></a></h2>
     
          ${ul1}
          <div id="innerAtr">
         
     
          </div>
      
       </ul>    
       <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine ${catname1}. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
       
       
       </div>`;
   
   }
   
   function button()
   {
        var brand = $("#selUser option:selected").text();
        var category = $("#SelectC option:selected").text();
        var subCat = $("#Select1 option:selected").text();
        var someimage = document.getElementById('sortUl');
        var title = $('#title').val()
        var size = $("select[name=SizeEURO]").val()
        var condition = $('#condition_id').val()
        var qty = $("input[name=quantity]").val();
        var made = $("input[name=made]").val();
        var weight = $("input[name=weight]").val();
        var color = $("input[name=color]").val();
        var producttype = $("input[name=producttype]").val();
        var material = $("input[name=material]").val();
        var price = $("input[name=price]").val();
        var gender = $("select[name=gender]").val();
        var sku = $("#SKU").val();
        var warehouse = $("select[name=warehouse]").val();
        var location = $("input[name=location]").val();
        var status = $("select[name=status]").val();
        var code = $("input[name=pcode]").val();
        var img1 = document.getElementById('img1');
        var img2 = document.getElementById('img2');
        var img3 = document.getElementById('img3');
        var img4 = document.getElementById('img4');
        var img5 = document.getElementById('img5');
        var img6 = document.getElementById('img6');
        
        if((price!='' || price!= null) && (location!='' || location!= null))
        {
            if(brand!= '' && category!= '' && subCat!= '' &&someimage != '' && title!= '' &&size!= '' && condition!= '' && qty!= '' && made!= '' && weight!= '' && price != '' && gender!= '' && sku!= '' && warehouse!= '' && location!= '' && status!= '' && code!= '' && img1!= '' && img2!= '' && img3!= '' && img4!= '' && img5!= '')
            {
                $('#Sbutton').removeClass("disabled");
            }
        }
        
   }
   
   
   
   
   
   
   
   
   
   function addShopify(){
        $('#Sbutton').addClass("disabled");
    //   $('#Sbutton').prop("disabled", true);
       
    //   document.getElementById('Sbutton').innerHTML= `Publishing  <i class="fa fa-circle-o-notch fa-spin"></i>`
       var brand = $("#selUser option:selected").text();
    var category = $("#SelectC option:selected").text();
     var subCat = $("#Select1 option:selected").text();
       var desc  = document.getElementById('iDetails').outerHTML
            
       var someimage = document.getElementById('sortUl');
   
    var myimg = someimage.getElementsByTagName('img')
   
    
       var image1 =myimg[0].currentSrc;
           var image2 = myimg[1].currentSrc;
               var image3 = myimg[2].currentSrc;
                   var image4 = myimg[3].currentSrc;
                       var image5 = myimg[4].currentSrc;
                       var image6 = myimg[5].currentSrc;
      
   
      var  inputObj = JSON.stringify(finalValues)
       var title = $('#title').val()
       var size = $("select[name=SizeEURO]").val()
       var cas=document.getElementById('SelectC').value;
       if(cas==1)
       {
           var sizeEur = "EUR " + size;
       }
       else
       {
          var sizeEur = size ;
       }
          
       
        var condition = $('#condition_id').val()
        var qty = $("input[name=quantity]").val();
          var made = $("input[name=made]").val();
         var weight = $("input[name=weight]").val();
         var color = $("input[name=color]").val();
          var producttype = $("input[name=producttype]").val();
          var material = $("input[name=material]").val();
           var price = $("input[name=price]").val();
           
       var gender = $("select[name=gender]").val();
        var sku = $("#SKU").val();
        var warehouse = $("select[name=warehouse]").val();
        var location = $("input[name=location]").val();
           var status = $("select[name=status]").val();
        var code = $("input[name=pcode]").val();
           
            //  var vendor = $("#SelectV option:selected").text();
   
       var form = new FormData();
        // form.append("vendor", vendor);
   form.append("category", category);
   form.append("subCat", subCat);
   form.append("att", inputObj);
   form.append("title", title);
   form.append("condition", condition);
   form.append("size", sizeEur);
   form.append("qty", qty);
   form.append("brand", brand);
   form.append("made", made);
   form.append("weight", weight);
   form.append("color", color);
   form.append("producttype", producttype);
   form.append("code", pcode);
   form.append("material", material);
   form.append("price", price);
   form.append("sku", sku);
   form.append("gender", gender);
    form.append("status", status);
   form.append("image1", image1);
   form.append("image2", image2);
   form.append("image3", image3);
   form.append("image4", image4);
   form.append("image5", image5);
   form.append("image6", image6);
   form.append("desc",desc);
   form.append("subcat_id",cas);
   
   if(price==0 || price=='')
   {
       toastr.error('Price must not be zero');
   }
   else if (image1=='' && image2 =='')
   {
       toastr.error('Image 1 & Image 2 cannot be empty');
   }
   
   else if(sku!='')
   {
       $.ajax({
                url:"api/skucheck.php",
                method:"POST",
                data:{ sku:sku},
                success:function(data)
                {
                  if(data==1)
                  {
                      toastr.error('SKU already uploaded to shopify');
                  }
                  if(data==0)
                  {
                    var settings = {
                     "url": "shopify.php",
                     "method": "POST",
                     "timeout": 0,
                     "processData": false,
                     "mimeType": "multipart/form-data",
                     "contentType": false,
                     "data": form
                   };
   
                        $.ajax(settings).done(function (response) {
                    
                        if(response==1)
                        {
                             toastr.error('SKU not present in the table');
                        }
                        if(response==2)
                        {
                             toastr.error('Vendor and Batch not in the table');
                        }
                        if(response!=1 && response!=2)
                        {
                             updateRacks()
                        
                            var jres = JSON.parse(response);
                        
                            console.log(jres);
                            var sid = jres.product.id
                         
                            var vitid = jres.product.variants[0].inventory_item_id
                            var vid = jres.product.variants[0].id
                            addProductDB(sid,vid,vitid)
                        }
                   
                       
                      // window.setTimeout(function(){window.location.reload();},2000)
                     
                        }); 
                  }
                  
                  
                }
            });
   }
   
   
   
       
   
   
 }
   
   
   
   
   
   
   
   
   
   
   
   
   function addProductDB(id,vid,vitid){
        var sid = id
        var v_id = vid
        var v_it_id=vitid
       var someimage = document.getElementById('sortUl');
   
       $('#save1').prop("disabled", true);
       
   document.getElementById('save1').innerHTML= `Saving <i style="color:white;" class="fa fa-circle-o-notch fa-spin"></i>`
   
   
    var myimg = someimage.getElementsByTagName('img')
   
    
       var image1 =myimg[0].currentSrc;
           var image2 = myimg[1].currentSrc;
               var image3 = myimg[2].currentSrc;
                   var image4 = myimg[3].currentSrc;
                       var image5 = myimg[4].currentSrc;
                       var image6 = myimg[5].currentSrc;
      
    
      
      var  inputObj = JSON.stringify(finalValues)
       var title = $('#title').val()
          //var brand = $('#selUser').val()
           var brand = $("#selUser option:selected").text();
        var condition = $('#condition_id').val()
        var qty = $("input[name=quantity]").val();
          var made = $("input[name=made]").val();
         var weight = $("input[name=weight]").val
          var color = $("input[name=color]").val();
          var producttype = $("input[name=producttype]").val();
           var price = $("input[name=price]").val();
       var gender = $("select[name=gender]").val();
        var sku = $("#SKU").val();
        var warehouse = $("select[name=Warehouse]").val();
        var location = $("input[name=location]").val();
           var status = $("select[name=status]").val();
           var size = $("select[name=SizeEURO]").val()
            // var vendor = $("select[name=Vendor]").val();
            // var made = $("input[name=made]").val();
            var material = $("input[name=material]").val();
            // var brand = $("#selUser option:selected").text();
             var code = $("input[name=pcode]").val();
             var predicta=document.getElementById('predi').value;
          
   //   console.log(finalValues)
       
            
            var category = $("select[name=catID]").val();
            var subCat = $("select[name=subcatValue]").val();
            
           //  console.log(category,subCat)
       var form = new FormData();
       
       
       
    //   form.append("vendor", vendor);
       form.append("category", category);
   form.append("subCat", subCat);
   form.append("att", inputObj);
   form.append("title", title);
   form.append("condition", condition);
   form.append("qty", qty);
   form.append("brand", brand);
   form.append("made", made);
   form.append("weight", weight);
   form.append("color", color);
   form.append("producttype", producttype);
   form.append("price", price);
   form.append("sku", sku);
   form.append("size", size);
   form.append("material", material);
   form.append("code", code);

    form.append("war", warehouse);
   form.append("gender", gender);
    form.append("status", status);
   form.append("image1", image1);
   form.append("image2", image2);
   form.append("image3", image3);
   form.append("image4", image4);
   form.append("image5", image5);
   form.append("image6", image6);
   form.append("Prediction", predicta);
   form.append("sid", sid);
   form.append("vid", v_id);
   form.append("v_it_id",v_it_id);
   
   
   var settings = {
     "url": "api/addProduct.php",
     "method": "POST",
     "timeout": 0,
     "processData": false,
     "mimeType": "multipart/form-data",
     "contentType": false,
     "data": form
   };
   
   $.ajax(settings).done(function (response) {
    console.log(response);
    
    toastr.success("Product Added")
    addLog();
      window.setTimeout(function(){window.location.reload();},2000)
   });
   
   }
   
   
   
   
   
   
   //QC REJECT
   
   function QCreject(){
       
       var someimage = document.getElementById('sortUl');
   
    var myimg = someimage.getElementsByTagName('img')
   
    
       var image1 =myimg[0].currentSrc;
           var image2 = myimg[1].currentSrc;
               var image3 = myimg[2].currentSrc;
                   var image4 = myimg[3].currentSrc;
                       var image5 = myimg[4].currentSrc;
      
     var vendor = $("select[name=Vendor]").val();
      
      var  inputObj = JSON.stringify(finalValues)
       var title = $('#title').val()
             var brand = $("#selUser option:selected").text();
        var condition = $('#condition_id').val()
        var qty = $("input[name=quantity]").val();
          var made = $("input[name=made]").val();
         var weight = $("input[name=weight]").val();
         var color = $("input[name=color]").val();
         var producttype = $("input[name=producttype]").val();
         var code = $("input[name=pcode]").val();
         var material = $("input[name=material]").val();
           var price = $("input[name=price]").val();
       var gender = $("select[name=gender]").val();
        var sku = $("#SKU").val();
        var warehouse = $("select[name=warehouse]").val();
        var location = $("input[name=location]").val();
         
    
            var vendor = $("select[name=Vendor]").val();
          
   //   console.log(finalValues)
       
            
            var category = $("select[name=catID]").val();
            var subCat = $("select[name=subcatValue]").val();
            
           //  console.log(category,subCat)
       var form = new FormData();
       
       
       
       form.append("vendor", vendor);
       form.append("category", category);
   form.append("subCat", subCat);
   form.append("att", inputObj);
   form.append("title", title);
   form.append("condition", condition);
   form.append("qty", qty);
   form.append("brand", brand);
   form.append("made", made);
   form.append("weight", weight);
    form.append("color", color);
    form.append("producttype", producttype);
    form.append("code", pcode);
    form.append("material", material);
   form.append("price", price);
   form.append("sku", sku);
   form.append("gender", gender);
   
   form.append("image1", image1);
   form.append("image2", image2);
   form.append("image3", image3);
   form.append("image4", image4);
   form.append("image5", image5);
   
   
   
   var settings = {
     "url": "api/Qcreject.php",
     "method": "POST",
     "timeout": 0,
     "processData": false,
     "mimeType": "multipart/form-data",
     "contentType": false,
     "data": form
   };
   
   $.ajax(settings).done(function (response) {
    console.log(response);
   
    toastr.error("QC REJECTED")
   });
   
   }
   
   
   
   
   
   
   
   
   
   
   
   
   
   
     $('#imageInput').change(function(){
       var frm = new FormData();
       frm.append('imageInput', input.files[0]);
       $.ajax({
           method: 'POST',
           address: 'upload',
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
       
       
       QCRB();
       $('#SKU').change(QCRB);
   });
   
   
   
   
   function validate(){
       if ($('#title').val().length   >   0   &&
           $('#price').val().length  >   0   &&
           $('#madein').val().length  >   0   &&
           $('#location').val().length  >   0   &&
           $('#SKU').val().length    >   0) {
           $('#Sbutton').prop("disabled", false);
       }
       else {
           
           $('#Sbutton').prop("disabled", true);
       }
   }
   
   
   function QCRB(){
       if ($('#SKU').val().length    >   0) {
           $('#qcrb').prop("disabled", false);
       }
       else {
           
           $('#qcrb').prop("disabled", true);
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
     "url": "api/getProduct.php?id=67",
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
              document.getElementById("Select1").innerHTML = "";
            var id = $("select[name=catID]").val();
            console.log("idssss",id)
           var settings = {
         "url": "api/getallattr.php?id=" + id,
         "method": "POST",
         "timeout": 0,
       };
       
       
      
       
      
       $.ajax(settings).done(function (response) {
         var data = JSON.parse(response);
         console.log(data);
          document.getElementById('Select1').innerHTML += `<option selected="true" disabled="disabled">-SELECT SUB-CATEGORY</option>`;
       
       
         for (var i = 0; i < data.length; i++) {
      
              
           var select = document.getElementById("Select1");
           var option = document.createElement("option");
           option.text = data[i].Name;
           option.value = data[i].Category_ID;
           select.add(option);
          
       }
       });
           
       }
       
       
                                                                                                                                                                                                                         
          
   
   
   
   function subcatchange(){
                                  Retvalues()                                                                                                                                                                                                                                    
       
        d = document.getElementById("Select1").value;
        
        // console.log(catname1);
        if(d==71)
        {

            $('#shoetypediv').show();
            
        }
        else
        {
             $('#shoetypediv').hide();
        }
       //  alert(d);
       var settings = {
     "url": "api/getSubattr.php?id="+d,
     "method": "GET",                        
     "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
   var jRES = JSON.parse(response)
   console.log("jRES",jRES[0])
   catname1=jRES[0].Name;
   console.log(catname1);
    document.getElementById('mainBody').innerHTML =" "  ; 
     document.getElementById('heading').innerHTML =" "  ; 
       $("#Mattr").removeAttr("style");
   
        document.getElementById('mainBody').innerHTML += jRES[0].attribute
   });
   }
   
   
   
   
   
    $("#ebayAttr2").hide();
     $("#snCDN").hide();
       function suggestionApi(){
       
            var brand = $("#selUser option:selected").text();
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
                  var brand = $("#selUser option:selected").text();
            
                
                
                //Tops-Shirts
                
                
                // Product Variations for Shirts
               var gender = $("select[name=gender]").val();
                 
                          //Product Status
                       
                           var PdateS = $("input[name=Pdate]").val();
                          
                         
                         
                     
               
              
           console.log(gender)
           
           
           
           
       }
       
       
    
           
           
           function Warehouse(){
           
           var settings = {
         "url": "api/Warehouse.php",
         "method": "POST",
         "timeout": 0,
       };
       
       $.ajax(settings).done(function (response) {
         var data = JSON.parse(response);
         
         
       
       
         for (var i = 0; i < data.length; i++) {
       
              console.log(data[i].Location);
           var select = document.getElementById("SelectW");
           var option = document.createElement("option");
           option.text = data[i].Location;
           option.value = data[i].Warehouse_ID;
           select.add(option);
          
       }
       });
           
       }
          const myTimeout2 = setTimeout( Warehouse(), 500);
       
        function Vendor(){
           
           var settings = {
         "url": "api/allvendors.php",
         "method": "POST",
         "timeout": 0,
       };
       
       $.ajax(settings).done(function (response) {
         var data = JSON.parse(response);
         
         
       
       
         for (var i = 0; i < data.length; i++) {
       
              console.log(data[i].Location);
           var select = document.getElementById("SelectV");
           var option = document.createElement("option");
           option.text = data[i].Name;
           option.value = data[i].Vendor_ID;
           select.add(option);
          
       }
       });
           
       }
       
       
       const myTimeout3 = setTimeout( Vendor(), 500);
       
       
       
          
       
           function myNewFunction(sel) {
               
               
             var value = sel.options[sel.selectedIndex].text;    a
               
               var settings = {
         "url": "api/SKU.php?name=" + value,
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
         "url": "api/Vendor.php?name="+ value,
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
         "url": "api/Lot.php?name="+ value,
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
   
       
   
   
   
   
    $("#selUser").select2({
        ajax: { 
            url: "api/Brands.php",
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
                                                             <input class="form-control "  type="text" name="material"  placeholder="Enter Material">
                                                      </div>
                                                      <div class="col-sm-6">
                                                               <label class="col-form-label pt-0" >Style</label>
                                                             <input class="form-control "  type="number" name="weight"  placeholder="Enter Weight">
                                                      </div>
                                                  </div>
                                                            <div class="col-sm-12 row">
                                                      <div class="col-sm-6">
                                                               <label class="col-form-label pt-0" >Type</label>
                                                             <input class="form-control "  type="text" name="material" placeholder="Enter Material">
                                                      </div>
                                                      <div class="col-sm-6">
                                                               <label class="col-form-label pt-0" >MPN</label>
                                                             <input class="form-control "  type="number" name="weight"  placeholder="Enter Weight">
                                                      </div>
                                                  </div>
                                                  <div class="col-sm-12 row">
                                                      <div class="col-sm-6">
                                                               <label class="col-form-label pt-0" >Size Type</label>
                                                             <input class="form-control "  type="text" name="material" placeholder="Enter Material">
                                                      </div>
                                                      <div class="col-sm-6">
                                                               <label class="col-form-label pt-0" >Condition</label>
                                                                      <select class="form-control form-select  "  name="gender">
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
   position: relative;
   display: inline-block;
   list-style-type: none;
   color: #198eff;
   width: 157px;
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
   .productImage {
   pointer-events: none;
   height: 140px;
   width: 140px;
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
   //           var URL =  "https://backup.thriftops.com/ShopifyPush/upload/"
   //          var imgSrc = []
   //         //DropZone
   //         Dropzone.autoDiscover = false;
   //         var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
   //     url: "https://backup.thriftops.com/ShopifyPush/uploads.php", // Set the url for your upload script location
   //      autoProcessQueue: true, //This stops auto processing
   //         acceptedFiles:".png,.jpg", //Change it according to your requirement.
   //     paramName: "file", // The name that will be used to transfer the file
   //     maxFiles: 5,
   //     maxFilesize: 10, // MB
   //     addRemoveLinks: false,
   //     accept: function(file, done) {
   // imgSrc.push(file.name) 
         
        
              
   //           swapImage(imgSrc[0],imgSrc[1],imgSrc[2],imgSrc[3],imgSrc[4])
          
           
   //     }
   // });
   
    var URL =  "upload/"
         var imgSrc = []
       Dropzone.options.imageUpload = {
       maxFilesize: 10, // MB
       maxFiles: 8,
       addRemoveLinks: true,
       init: function() {
           this.on("addedfile", function(file) { fileupload_flag = 1; });
           this.on("complete", function(file) { fileupload_flag = 0; });
       },
       accept: function(file, done) 
      {
           var re = /(?:\.([^.]+))?$/;
           var ext = re.exec(file.name)[1];
           ext = ext.toUpperCase();
           if ( ext == "JPG" || ext == "JPEG" || ext == "PNG" ||  ext == "GIF" ||  ext == "BMP") 
           {
               done();
           }else { 
               done("Please select only supported picture files."); 
           }
       },
       success: function( file, response ){
            obj = JSON.parse(response);
           //  alert(file.name); // <---- here is your filename
       
           file.previewElement.parentNode.removeChild(file.previewElement);
         console.log(imgSrc)
        
        
       //  console.log(imgSrc.length)
        
        if(imgSrc.length==5){
            
           
             imgSrc.splice(-2,1);
   
        }
     
             imgSrc.push(file.name) 
       
             
             swapImage(imgSrc[0],imgSrc[1],imgSrc[2],imgSrc[3],imgSrc[4])
             
            setTimeout(() => {
               this.removeFile(file); // right here after 3 seconds you can clear
             }, 500);
           
       }
       
   
   };
   
         
       //   const ImagesrcR = (src) =>{
             
       //       document.getElementById(src).removeAttribute('src');
       //   }
   
   
   
   function swapImage(img1,img2,img3,img4,img5){
       
      
   
      $("#img1").attr("src",URL+img1);
        $("#img2").attr("src",URL+img2);
          $("#img3").attr("src",URL+img3);
            $("#img4").attr("src",URL+img4);
              $("#img5").attr("src",URL+img5);
              
              
    
              
             var imgsrc1 = document.getElementById("img1").src;
               var imgsrc2 = document.getElementById("img2").src;
               var imgsrc3 = document.getElementById("img3").src;
               var imgsrc4 = document.getElementById("img4").src;
               var imgsrc5 = document.getElementById("img5").src;
               
             // console.log("imgsrc1",typeof(imgsrc2))
              
             var img1thumb = imgsrc1.split("/").pop();
             var img2thumb = imgsrc2.split("/").pop();
               var img3thumb = imgsrc3.split("/").pop();
                var img4thumb = imgsrc4.split("/").pop();
                 var img5thumb = imgsrc5.split("/").pop();
              
              
             if(img1thumb == "undefined"){
                   $("#1li").hide()
             }else{
                  $("#1li").show()
             }
             
             if(img2thumb == "undefined"){
                   $("#2li").hide();
             }else{
                  $("#2li").show();
                 
             }
             
             if(img3thumb == "undefined"){
                   $("#3li").hide();
             }else{
                  $("#3li").show();
             }
             if(img4thumb == "undefined"){
                   $("#4li").hide();
             }
             else{
                  $("#4li").show();
             }
             if(img5thumb == "undefined"){
                  $("#5li").hide();
             }
              else{
                  $("#5li").show();
             }
              
            $("#dzform1").hide();
                $("#sortUl").show();
                
                  $("#dzonetitle").hide();
       
         $('#save1').prop("disabled", false);         
          
   }
   
       
   
   
   
   
   //   Dropzone.options.imageUpload = {
   //         maxFilesize:1,
   //         acceptedFiles: ".jpeg,.jpg,.png,.gif"
   //     };
       
   
      var settings = {
         "url": "api/last.php",
         "method": "POST",
         "timeout": 0,
       };
       
       $.ajax(settings).done(function (response) {
        var last_id = response;
         document.getElementById("pID").value = last_id
        
        
       });
   
     
      const addLog = () =>{ 
          var uid = $("#uid").val();   
     var Pid = $("#pID").val();   
   
   
   var form = new FormData();
   form.append("uid", uid);
   form.append("type", "Product");
   form.append("status", "Added");
   form.append("typeid", Pid);
   
   var settings = {
     "url": "api/addLog.php",
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
   
   
   const checkAlocation =() =>{
       var warehouse=$("#SelectW").val();
       var SKU_INPUT = $("#SKU").val();
       var SKUP = SKU_INPUT;
       var WSKU =  $("input[name=sku]").val
       
      
       
       var settings = {
     "url": "api/racksalocation.php?id="+SKUP+"&warehouse="+warehouse,
     "method": "POST",
     "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
       
       if(response==2)
       {
            toastr.error('SKU Discard/Batch Discard');
            // setTimeout(function() {
            //     location.reload(); 
            // }, 9000);
       }
       if(response==3)
       {
            toastr.error('SKU already allocated');
            // setTimeout(function() {
            //     location.reload(); 
            // }, 9000);
       }
       if(response==4)
       {
            toastr.error('Rack not found on this category');
            // setTimeout(function() {
            //     location.reload(); 
            // }, 9000);
       }
     
     var JRES = JSON.parse(response)
     
     
     
     var r_id  =  parseInt(JRES[0].id)
     
     
   //   if(typeof r_id == "undefined") {
   //     document.getElementById("noteR").innerHTML = '<p style="color:red;"><b>Alert:</b> All racks in warehouse are filled</p>'
   //      $('#Sbutton').prop("disabled", true);
   // }else if (typeof r_id == "undefined") {
   //     document.getElementById("noteR").innerHTML = '<p style="color:red;"><b>Alert:</b> All racks in warehouse are filled</p>'
   //      $('#Sbutton').prop("disabled", true);
   // }
     
     
     
    if(isNaN(r_id) ){
        //alert("RACKS FULL")
       document.getElementById("noteR").innerHTML = '<p style="color:red;"><b>Alert:</b> All racks in warehouse are filled</p>'
        //$('#Sbutton').prop("disabled", true);
        
    }
    else{
         $("input[name=location]").val(JRES[0].name);
         document.getElementById("noteR").innerHTML = ''
     $('#Sbutton').prop("disabled", false);
    }
   });
   
       
       
   }
   
   const getSKU = () =>{
       
    var e = document.getElementById("SelectW");
   var value = e.options[e.selectedIndex].value;
       
       var settings = {
     "url": "api/singleWarehouse.php?id="+value,
     "method": "POST",
     "timeout": 0,
   };
   
   $.ajax(settings).done(function (response) {
     var JRES = JSON.parse(response)
     //console.log(JRES[0].SK_Format)
     $("input[name=sku]").val(JRES[0].SK_Format);
     
     checkAlocation()
   });
   
   
       
       
   }
   
   
   const checkSKU =()=>{
       iDetails();
        var SKU_INPUT = $("input[name=sku]").val();
       var SKUP = SKU_INPUT[0]+SKU_INPUT[1]
       var WSKU =  $("input[name=sku]").val()
       
       var SKUW = WSKU[0]+WSKU[1]
       console.log(WSKU)
       if( SKUP != SKUW  ){
            document.getElementById("noteSKU").innerHTML = '<p style="color:red;"><b>Alert:</b> WRONG SKU FORMAT </p>'
             $('#Sbutton').prop("disabled", true);
       }else{
           
             document.getElementById("noteSKU").innerHTML = 'FINE'
               $('#Sbutton').prop("disabled", false);
       }
       
       
   }
   
   
   
   document.addEventListener("DOMContentLoaded", () => {
       $("#sortUl").hide();
   
   });
   
   
   
   
   
   //add racks data
   
   
   
   
   
   function updateRacks(){
       
         var rnum = $("input[name=location]").val();
         
       
       
         var sku = $("#SKU").val();
       
      
      var form = new FormData();
      form.append("rnum", rnum);
      form.append("sku", sku);
    
      
      var settings = {
      "url": "api/updaterack.php",
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
   
   
   
   
   
   
   
   // function deleteFileFromDropzone(filename) {
   //     // Get the file object by filename
   //     var file = myDropzone.getFilesWithStatus(Dropzone.SUCCESS).find(function(f) {
   //         return f.name === filename;
   //     });
   
   //     // Remove the file from the Dropzone UI
   //     if (file !== undefined) {
   //         myDropzone.removeFile(file);
   //     } else {
   //         console.error("File not found: ", filename);
   //     }
   // }
   
   // // Example usage: delete a file by filename
   // deleteFileFromDropzone("example.jpg");
   
   
    
   
   
   const deleteImg = (isrc) =>{
       
       
       
       
       // document.getElementById(isrc).removeAttribute('src');
       
       if(isrc == "1li"){
         
             var imagesrc = document.getElementById('img1').src
              var imgthumb = imagesrc.split("/").pop();
             
               imgSrc.splice(imgSrc.indexOf(imgthumb), 1);
          
             dzoneTitle()
           
           
       }else if(isrc == "2li"){
           var imagesrc = document.getElementById('img2').src
              var imgthumb = imagesrc.split("/").pop();
          imgSrc.splice(imgSrc.indexOf(imgthumb), 1);
          dzoneTitle()
       }
       else if(isrc == "3li"){
          var imagesrc = document.getElementById('img3').src
              var imgthumb = imagesrc.split("/").pop();
             imgSrc.splice(imgSrc.indexOf(imgthumb), 1);
             dzoneTitle()
       }
       else if(isrc == "4li"){
            var imagesrc = document.getElementById('img4').src
              var imgthumb = imagesrc.split("/").pop();
           imgSrc.splice(imgSrc.indexOf(imgthumb), 1);
           dzoneTitle()
       }else if(isrc == "5li"){
            var imagesrc = document.getElementById('img5').src
              var imgthumb = imagesrc.split("/").pop();
            imgSrc.splice(imgSrc.indexOf(imgthumb), 1);
            dzoneTitle()
       }
       
       
         $("#"+isrc).hide()
   //       var imgsrc = document.getElementById(isrc).src;
   //   alert(imgsrc)
       
   }
   
   
   function dzoneTitle(){
       
       if(imgSrc.length == 0){
             $("#dzonetitle").show();
       }
       
   }
   
// for new
   
    
</script>
<script>
   //         $('.clz').on('click', function() {
   //   $(this).closest('.imgLI ').removeAttribute('src');
   // });
       
</script>
<!-- footer start-->
<?php include("../include/footer.php");?>
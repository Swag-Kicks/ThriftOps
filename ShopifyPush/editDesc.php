<?php include("../include/header.php");?>
<?php include("../include/sidebar.php");?>
<link rel="stylesheet" type="text/css" href="assets/css/dropzone.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

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
     <h3><b>Edit Description</b></h3>
    
   
   </div>
   
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="row project-cards">
         <div class="col-md-12 project-list">
          
         </div>
         <div class="col-sm-12">
            <!--<div class="card">-->
               <div class="card-body" style="background-color:#F6F6F6;">
                  <div class="tab-content" id="top-tabContent">
              
                     <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
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
                                                          <input class="form-control borderdark" type="number" name="quantity" id="quantity" onchange="SendData()"  placeholder="Enter Quantity">
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

//GET QUERY PARAMETER CUSTOM SCRYPT(WASAY)
function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

var sid = getParameterByName('sid')

// SCRIPT END

getValue(sid)


    function getValue(value){
       
        var form = new FormData();
var settings = {
  "url": "https://backup.thriftops.com/All_Product/single.php?shop="+value,
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
   rdata = JSON.parse(response);
   


      
console.log(rdata)


      document.getElementById("title").value = rdata.data.title
         document.getElementById("condition_id").value = rdata.data.variants[0].option2
          document.getElementById("status").value = rdata.data.status
         document.getElementById("quantity").value = rdata.data.variants[0].inventory_quantity
         
 
      // document.getElementById("CKdesc").innerHTML = rdata.data.body_html
//  document.getElementById("sid").value = rdata.data.id
//       document.getElementById("Mstatus").value = rdata.data.status
//       document.getElementById("Mprice").value = rdata.data.variants[0].price
//       document.getElementById("Msku").value = rdata.data.variants[0].sku
//       document.getElementById("inventory").value = rdata.data.variants[0].inventory_quantity
       
       
//         document.getElementById("modelshow").click();
       
       
});
   
        
    }
    










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







// CUSTOM SCRIPT(WASAY)

// SIKANDAR NOT ALLOWED HERE
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



<!-- footer start-->
<?php include("../include/footer.php");?>

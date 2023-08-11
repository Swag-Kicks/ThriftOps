<?php  
session_Start();
?>
<?php include ("../include/header.php"); ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>
<link rel="stylesheet" type="text/css" href="assets/css/dropzone.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="application/javascript" src="assets/custom/elements.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script><?php include("../include/header.php");?>

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
   <div class="mt-2 px-3 ">
        <div style="float:right;">
          
         
       
     </div>
     <h3 class="mleft"><b>Add Category</b></h3>
    
   
   </div>
   
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="row project-cards">
         
         <div class="col-sm-12">
            <!--<div class="card">-->
               <div class="card-body" style="background-color:#F6F6F6;">
                  <div class="tab-content" id="top-tabContent">
              
                     <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                        
                           

                                                
                                               
                                                          
                                          <div class="">
                              <div class="row">
                                  
                                                 <div  class="col-sm-12">
                                          <div class="card cardshadow">
                                       
                                        <div class="card-body">
                                            
                                                    <div class="mb-3" >
                                                   <h5>Category</h5>
                                                  <select class="form-select  " id="Select" name="catID"    required></select>
                                             </div>
                                             <h5>Sub Category</h5>
                                              <input class="form-control "  name="Cat_name" id="Cat_name" onchange="checkdisable()" placeholder="Enter Sub-Category Name">
                                                       <div class="mb-3" ><br>
                                                  
                                                  
                                             </div> 
                                               <div style="float:right;">
          
                                                 
                                                  <!--<button class="btn btn-primary-light" onclick="SAVE()" id="saveB" >Save</button>-->
                                               
                                             </div>
                                                       
                                                   
                                            
                                            
                                            
                                                      
                                                      <!--<button class="btn btn-primary" onclick="SAVE()">SAVE</button>-->
                    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="" ><br>
                            <!--<h4 class="modal-title" id="mySmallModalLabel">Add Attribute</h4>-->
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                                <div class="mb-3">
                                                <label class="col-form-label pt-0">Attribute Name</label>
                                                <input class="form-control" id="name"  name="name" placeholder="Enter New Attribute Name">
                                             </div>
                                             
                                             <button class="btn btn btn-primary-light" onclick="addAttr()">ADD</button>
                          </div>
                        </div>
                      </div>
                    </div>
                                            </div>
                                               
                                          </div>  
                                        
                                               </div>
                                              
                                               
                                         
                                               
                                                  
                                               
                                    
                                        
                                
                              </div>
                           </div>   
                           <div class="mb-3">
        
     <h3 class=""><b>Add Attribute</b></h3>
    
   
   </div>
                                    <div class="">
                              <div class="row">
                                 <div class="col-sm-12">
                                    <div class="card cardshadow" >
                                       <div class="card-header pb-0">
                                           <div class="row">
                                               <div class="col-md-9"><h6>Standard Attributes</h6><br>
                                               <select class="form-control  form-select" id="Select1" name="attrS"  ></select></div>
                                                 <div  class="col-md-3"><button class="btn btn-primary f-right" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm">Add Custom Attribute</button></div>
                                                </div>
                                           
                                       </div>
                                       <div class="card-body">
                                         
                                             <!--<div class="mb-3">-->
                                             <!--   <label class="col-form-label pt-0">Title</label>-->
                                             <!--   <input class="form-control borderdark" id="title" type="title"  name="title" placeholder="Enter Product Name">-->
                                             <!--</div>-->
                                             <div id="formArea">
                                                 
                                             </div>
                                              <div class="col-md-12">
                                                  <br>
                                                  <a name="pick" id="addorder" class="btn btn-outline-primary " onclick="addInput()">Add</a>
                                                  <a name="pick" id="removeorder" class="btn btn-outline-secondary " onclick="removeInput()" disabled >Undo</a>
                                                  <!--<i class="icofont icofont-plus" onclick="addInput()" style="font-size:32px;color:red;"></i>-->
                                                    <div style="float:right;">
          
         
          <button class="btn btn-primary-light" onclick="SAVE()" id="saveB" > Save</button>
       
     </div>
                                            </div>
                                             
                                           <!--<div id="Inputattr">-->
                                               
                                           </div>
                                               
                                                   
                                               
                                                      
                                                  </div>
                                                 
                            
                                             
                                             
                                        
                                        
                                          
                                       <br/>  
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
    
           console.log(data[i].Location);
        var select = document.getElementById("Select");
        var option = document.createElement("option");
        option.text = data[i].Name;
        option.value = data[i].Category_ID;
        select.add(option);
       
    }
    });
        
    }
    
    
    const myTimeout1 = setTimeout( CategoryChange(), 500);

var settings = {
  "url": "https://backup.thriftops.com/ShopifyPush/api/getSubattr.php?id=3",
  "method": "GET",
  "timeout": 0,
};

$.ajax(settings).done(function (response) {
  console.log(response);
});


  
           function Attribute(){
        
        var settings = {
      "url": "https://backup.thriftops.com/ShopifyPush/api/getattribute.php",
      "method": "POST",
      "timeout": 0,
    };
    
    $.ajax(settings).done(function (response) {
      var data = JSON.parse(response);
      
      
    
    
      for (var i = 0; i < data.length; i++) {
    
           //console.log(data[i].Location);
        var select = document.getElementById("Select1");
        var option = document.createElement("option");
        option.text = data[i].Name;
        option.value = data[i].Code;
        
        select.add(option);
       
    }
    });
        
    }
    
    
    const myTimeout = setTimeout( Attribute(), 500);
    

const checkdisable = () =>{
   
    
   
        $('#saveB').prop("disabled", false);
 
    
}


function SAVE(){
    
      var name = $("input[name=Cat_name]").val();
       var catID = $("select[name=catID]").val();
    var attribute =  document.getElementById('formArea').outerHTML;
    console.log("catID",catID)
    var form = new FormData();
form.append("name", name);
form.append("attribute", attribute);
form.append("catID", catID);
var settings = {
  "url": "https://backup.thriftops.com/ShopifyPush/api/addCatattr.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
  //console.log(response);
   var name = $("input[name=Cat_name]").val('');
   toastr.success('Category Created Successfully');
     $('#saveB').prop("disabled", true);
  
});
    
    
    
    
}

 

function addInput(){
    
    var attrS = $("select[name=attrS]").val();
    
  
       
          document.getElementById('formArea').innerHTML +=  attrS   ;  
}

function removeInput(){
    var id = $('#formArea input:last').attr('id')
    
    console.log(id)
    
    
    var element = document.getElementById(id); // notice the change
element.parentNode.removeChild(element);

    var element2 = document.getElementById(id); // notice the change
element2.parentNode.removeChild(element2);

    
  
       
  
}
// function removeInput(){
    
//     var attrS = $("select[name=attrS]").val();
    
  
       
//           document.getElementById('formArea').innerHTML +=  attrS + '<br/>&nbsp;<span id='remove_" + nextindex + "' class='remove'>X</span>'  ;  
// }

function addSelect(){
    
   
       var selectbox = ` <div class="mb-3">
                                               
                                                <select class="form-control form-select" style="border:1px solid grey;" >-->
                                                   <option value=" " disabled selected>Select Category</option>
                                                   <option value="Tops">Tops</option>
                                                   <option>Bottoms</option>
                                                   <option>Suit</option>
                                                   <option>Headwear</option>
                                                  
                                                </select>
                                             </div>`
       
          document.getElementById('formArea').innerHTML +=selectbox  ;  
        //   var elementsForm = document.getElementById('formArea')
        //   console.log(elementsForm);
}



  function addAttr(){
         var name = $("input[name=name]").val();
         var parsedTest = name.replace(/\s/g, '') 
         var code = `   <label class="col-form-label pt-0" id="${parsedTest}" >${name}</label> <input class="form-control " id="${parsedTest}"  name="${parsedTest}" onchange="getAttrValue()" placeholder="Enter ${name} Name">`
      var form = new FormData();
form.append("name", parsedTest);
form.append("code", code);

var settings = {
  "url": "https://backup.thriftops.com/ShopifyPush/api/addattribute.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
  toastr.success('Attribute Added Successfully');
   var name = $("input[name=name]").val('');
   Attribute()
   
 
});
      
      
  }
 
   
    </script>
    
    <style>
    
    #formArea {
    pointer-events:none;
}
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

    



<!-- footer start-->
<?php include("../include/footer.php");?>


<!doctype html>
<html lang="en">
<head>
	<meta name="csrf-token" content="6f7Po0BqmVCN6IQ28DttGzAk2kVpY829KFdCWd0P">
	<meta name="app-url" content=" ">
	<meta name="file-base-url" content=" ">

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Favicon -->
	
	<title>Add Product </title>

	<!-- google font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

	
  <link rel="stylesheet" href="uploads\assets\aiz-core.css">
  <link rel="stylesheet" href="uploads\assets\vendors.css">
   <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>    
<script type="application/javascript" src="elements.js"></script>
    <style>
        body {
            font-size: 14px;
            --light: #fcfcfc;
        }
        .card {
    border-radius: 1.10rem;
}
.card .card-body {
    padding: 30px 25px;
    border-radius: 4px;
}
.Data {
     /* display:none; */
}
p.col-md-7.text-muted {
    left: -11px;
}

    </style>
    
<script>

function changeStatus()
{
  var status = document.getElementById("category_id");
  if(status.value == "CLT")
  {
    document.getElementById("Waist").style.visibility="visible";
  }
  else
  {
    document.getElementById("Waist").style.visibility="hidden";
  }
}

</script>
<script>
 var button_Var = document.getElementById('btn');

    function formdataa()
       {
        alert(CKEDITOR.instances.editor1.getData());
        console.log(CKEDITOR.instances.editor1.getData()); 
       }
</script>
<script>
// document.addEventListener("contextmenu", function(event){
// event.preventDefault();
    
// }, false);
document.onkeydown = function(e) {
if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
return false;
}
}
</script>

<!-- dropdownmanu -->
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

        // function displaySelected() {
        //     var categry = document.getElementById("category").value;
        //     var subcategry = document.getElementById("categorySelect").value;
        //     alert(categry + "\n" + subcategry);
        // }

        // function resetSelection() {
        //     document.getElementById("category").selectedIndex = 0;
        //     document.getElementById("categorySelect").selectedIndex = 0;
        // }
    </script>
</head>
<body class="side-menu-closed">

	<div class="aiz-main-wrapper">
        
		<div class="aiz-content-wrapper">
            <div class="aiz-topbar px-15px px-lg-25px d-flex align-items-stretch justify-content-between">
    <div class="d-flex">
      
    </div>
    <div class="d-flex justify-content-between flex-grow-xl-1">
       
       
    </div>
</div>
			<div class="aiz-main-content">
				<div class="px-15px px-lg-25px">
                    

<div class="aiz-titlebar text-center  mt-6 mb-3">
    <h6 class="mb-0 h6" style="font-size: 20px;">Add New Product</h6>
</div>


             <button onclick="pushData()">SUBMIT</button>   
                <!-- <button onclick="showPreview()">Preview</button>   
                
              
                       <button onclick="submit2()">get log</button>
                       <button onclick="SendData()">SendData</button>
                       <button onclick="getinputs()">Get Input Values</button>
                                  -->
<div class=" ">
    <form class="form form-horizontal mar-top" id="formId" action=" " method="POST">
        <div class="row gutters-5">
            <div class="col-lg-7">
                
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Product Information</h5>
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
                              <input type="text" class="form-control" name="made" placeholder="USA , CHINA ">
                          </div>
                      </div>
                       

                    <div class="form-group row" id="category">
                        <label class="col-md-3 col-from-label">Category</label>
                        <div class="col-md-8">
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
                    </div>
                    <div class="form-group row" id="category">
                        <label class="col-md-3 col-from-label">Sub Category</label>
                        <div class="col-md-8">
                            <select class="form-control" name="subCat" onchange="changeSub()" id="categorySelect" >
                                <option value=" " disabled selected>Select Category First</option>
                                <option></option>
                                </select>
                        </div>
                    </div>
                      <div class="form-group row" id="Sub_category">
                        <label class="col-md-3 col-from-label">Warehouse</label>
                        <div class="col-md-8">
                          
                            <select class="form-control  "id="Select" name="warehouse"  onChange="myNewFunction(this);"  required></select>
                        </div>
                    </div>
                    <div class="form-group row" id="Sub_category">
                      <label class="col-md-3 col-from-label">vendor</label>
                      <div class="col-md-8">
                          <select class="form-control  " id="WSelect" name="vendor"  onChange="myVFunction(this);" id="category_id"  required>
                         </select>
                      </div>
                  </div>
                   

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Lot</label>
                               <div class="col-md-8">
                          <select class="form-control  " id="VSelect" name="lot" id="category_id"  required>
                         </select>
                      </div>
                        </div>
                        <h5 class="mb-0 h6">Attributes</h5>
                        <hr>
                        <div class="form-group row" id="brand">
                            <label class="col-md-3 col-from-label">Brand</label>
                            <div class="col-md-8">
                            
                                    <input type="text" class="form-control aiz-tag-input" name="brand" >
                                
                            </div>
                        </div>
                        <div class="form-group row" id="brand">
                            <label class="col-md-3 col-from-label">Condition</label>
                            <div class="col-md-8">
                                <select class="form-control " name="condition" id="condition_id">
                                    <option value=" ">Select condition</option>
                                                                        <option value="7/10">7/10</option>
                                                                        <option value="8/10">8/10</option>
                                                                        <option value="9/10">9/10</option>
                                                                        <option value="10/10">10/10</option>
                                                                        <option value="New">New</option>
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
                
         
          
    
           
         
          
            <!-- Belts -->
        
          
        

    
              <div class="card">
                <div class="card-header">
                    <h6 class=" ">Product Description</h6>
                     <button class="btn btn-outline-warning" onclick="SendData()" >Preview</button>
                </div>
                <div >
                <div>
                  <div class="card-header" id="heading"> </div>
                  <div class="card-body" id="mainBody"> </div>
                  </div>
                

                    
                </div>
                <style>
                    ul {
  columns: 2;
  -webkit-columns: 2;
  -moz-columns: 2;
}
                    </style>
                <div style="margin:15px;background-color:#F6F2F2;border-radius:8px;" id="iDetails">
                    
                </div>
                <br/>
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
                                <input type=" " placeholder="2401" name="pID" id="pID" class="form-control" readonly>
                            </div>
                        </div> <div class="form-group row">
                            <label class="col-md-3 col-from-label">
                                Date
                            </label>
                            <div class="col-md-8">
                                <input type=" " name="pDate" id="pDate" class="form-control" readonly>
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
                              <input type="number" lang="en" placeholder="Enter Product price" name="price" class="form-control" required>
                              <p class="col-md-7 text-muted  ">Suggested Price(For Sneakers Only):   <b  id="sAPI">0</b></p>
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
                                  <input type="text" placeholder="SKU" id="SKU" name="sku" class="form-control" required>
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
    <hr>

</div>

				</div>
			</div>
		</div>
	</div>

    
<!-- 
	<script src="https://../public/assets/js/vendors.js" ></script>
	<script src="https://../public/assets/js/aiz-core.js" ></script> -->
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
<script>



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
    <input type="text" class="form-control" name="sneakerSize" onChange="suggestionApi()" placeholder="Sneaker Size ">
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

//   function getinputs(){
//     $('#formId input, #formId select').each(
//     function(index){  
//         var input = $(this);
//         alert('Type: ' + input.attr('type') + 'Name: ' + input.attr('name') + 'Value: ' + input.val());
//     }
// );
//   }
 
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

function suggestionApi(){
    
     var brand = $("input[name=brand]").val();
      var size = $("input[name=sneakerSize]").val();
      var conS = $("select[name=condition]").val();
      
   

    
  var Cond = ( conS == "9/10") ? "Nine" : ( conS == "8/10") ? "Eight" :  ( conS == "7/10") ? "Seven" :( conS == "10/10") ? "Ten" : "Ten";
 
 
//  alert(Cond)
    
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
<script type="text/javascript">
    CKEDITOR.replace( 'editor1' );

        var editorText = CKEDITOR.instances.editor1.getData();
        $('#trackingDiv').html(editorText);
    
</script>  
</body>
</html>

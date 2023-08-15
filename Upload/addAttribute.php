<?php  
session_Start();
include_once("../include/mysql_connection.php"); 
?>
<?php include ("../include/header.php"); ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>


          
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
                                                  <select class="form-select" id="Cat" name="catID"  required>
                                                      <option disabled selected>Select Category</option>
                                                      <?php $records = mysqli_query($mysql, "SELECT * FROM `Product_Type`"); 
                                                           while($data = mysqli_fetch_array($records))
                                                           {
                                                               echo "<option value='". $data['Product_ID'] ."'>" .$data['Name'] ."</option>";
                                                           }   
                                                           ?>
                                                  </select>
                                             </div>
                                        
                                             <h5>Sub Category</h5>
                                               <select required="required" class="form-select" name="Sub_Cat" id="Sub_Cat">
                                                    <option disabled selected>Select Sub-Category</option>
                                            </select>
                                                       <div class="mb-3" ><br>
                                                  
                                                  
                                             </div> 
                                               <div style="float:right;">
          
                                               
                                             </div>

                                                
                
                    
                    <!--placeorder modal--> 
                         <div class="modal fade bd-example-modal-sm " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="modal" role="dialog">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="" ><br>
                            <h4 class="modal-title1 text-center font-weight-bold">Add Attribute</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                                <div class="mb-3">
                                               <label class="col-form-label pt-0">Attribute Name</label>
                                                <input class="form-control" id="name"  name="name" placeholder="Enter New Attribute Name">
                                             </div>
                                              <a href="#" data-role="conf_save" id="attribute" class="btn btn-md btn-primary ref mleft  f-right" style="padding: 6px 24px;">Save</a>
                                              <button type="button" class="btn btn-outline-primary pull-right"  data-bs-dismiss="modal">Close</button>
                                              
                          </div>
                        </div>
                      </div>
                    </div>
                         <!--end placeorder modal-->    
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
                                               <select class="form-control  form-select" id="Select1" name="attrS"  >
                                                   <option disabled selected value="">Select Attribute</option>
                                               </select></div>
                                                 <div  class="col-md-3">
                                                     <a class="btn btn-primary f-right" id="open">Add Custom Attribute</a>
                                                     </div>
                                                </div>
                                           
                                       </div>
                                       <div class="card-body">
                                         
                                             <div id="formArea">
                                                 
                                             </div>
                                              <div class="col-md-12">
                                                  <br>
                                                  <a name="pick" id="addorder" class="btn btn-outline-primary " onclick="addInput()">Add</a>
                                                  <a name="pick" id="removeorder" class="btn btn-outline-secondary " onclick="removeInput()" disabled >Undo</a>
                                                  <!--<i class="icofont icofont-plus" onclick="addInput()" style="font-size:32px;color:red;"></i>-->
                                                    <div style="float:right;">
          
         
                                                      <a class="btn btn-primary-light"  id="save" > Save</a>
                                                 </div>
                                            </div>
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
      </div>
   </div>
   <!-- Container-fluid Ends-->
</div>
<script>

 $(document).ready(function() 
 {
    $('#Cat').change(function() 
    {
        var cat_id = $('#Cat').val();
        $('#Sub_Cat').empty();
        $.get('api/getallattr.php', {
            'id': cat_id
        }, function(return_data) {
            $.each(return_data, function(key, value) {
                $("#Sub_Cat").append("<option value='" + value.Category_ID + "'>" + value.Name + "</option>");
            });
        }, "json");
    });
    $(document).on('click', '#open', function()
    {
        $('#modal').modal('toggle');
    });
    $(document).on('click', '#attribute', function()
    {
        $(this).addClass('disabled');
       
        var name = $("input[name=name]").val();
        var parsedTest = name.replace(/\s/g, '') 
        var code = `   <label class="col-form-label pt-0" id="${parsedTest}" >${name}</label> <input class="form-control " id="${parsedTest}"  name="${parsedTest}" onchange="getAttrValue()" placeholder="Enter ${name} Name">`
        $.ajax({
             url:"api/addattribute.php",
             method:"POST",
             data:{name:name, code:code},
             success:function(data)
             {
                 if(data==0)
                 {
                    $(this).removeClass("disabled");
                    toastr.error('Error while Adding');
                 }
                 if(data==1)
                 {
                    $(this).removeClass("disabled");
                    toastr.success('Attribute Added Successfully');
                    $('#modal').modal('toggle');
                 }
                
             }
       });
        
    });
    
    $(document).on('click', '#save', function()
    {
        $(this).addClass('disabled');
        var name = $("select[name=Sub_Cat]").val();
        var catID = $("select[name=catID]").val();
        var att =  document.getElementById('formArea').outerHTML;
         $.ajax({
             url:"api/addCatattr.php",
             method:"POST",
             data:{
                 name:name, 
                 catID:catID,
                 att:att
                 
             },
             success:function(data)
             {
                 if(data==0)
                 {
                    $(this).removeClass("disabled");
                    toastr.error('Error while Saving');
                 }
                 if(data==1)
                 {
                    $(this).removeClass("disabled");
                    toastr.success('Saved Successfully');
                    window.location.reload();
                 }
                
             }
       });
    });   
    
     
     
     
     
 });
</script>
        
        
        
        
<script>

//attibutes get and fill
// start
function Attribute()
{
        
    var settings = {
      "url": "../ShopifyPush/api/getattribute.php",
      "method": "POST",
      "timeout": 0,
    };
    
    $.ajax(settings).done(function (response)
    {
      var data = JSON.parse(response);
      
          for (var i = 0; i < data.length; i++) 
          {
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

// stop




// function SAVE(){
    
//       var name = $("input[name=Cat_name]").val();
//       var catID = $("select[name=catID]").val();
//     var attribute =  document.getElementById('formArea').outerHTML;
//     var form = new FormData();
// form.append("name", name);
// form.append("attribute", attribute);
// form.append("catID", catID);
// var settings = {
//   "url": "https://backup.thriftops.com/ShopifyPush/api/addCatattr.php",
//   "method": "POST",
//   "timeout": 0,
//   "processData": false,
//   "mimeType": "multipart/form-data",
//   "contentType": false,
//   "data": form
// };

// $.ajax(settings).done(function (response) {
//   var name = $("input[name=Cat_name]").val('');
//   toastr.success('Category Created Successfully');
//      $('#saveB').prop("disabled", true);
  
// });
    
    
    
    
// }

 

function addInput(){
    
    var attrS = $("select[name=attrS]").val();
    document.getElementById('formArea').innerHTML +=  attrS   ;  
    document.getElementById('Select1').value="";
}

function removeInput()
{
    var id = $('#formArea input:last').attr('id')
    var element = document.getElementById(id); // notice the change
    element.parentNode.removeChild(element);
    var element2 = document.getElementById(id); // notice the change
    element2.parentNode.removeChild(element2);

    
  
}

// function addSelect()
// {
//     var selectbox = ` <div class="mb-3">
                                               
//                         <select class="form-control form-select" style="border:1px solid grey;" >-->
//                           <option value=" " disabled selected>Select Category</option>
//                           <option value="Tops">Tops</option>
//                           <option>Bottoms</option>
//                           <option>Suit</option>
//                           <option>Headwear</option>
                          
//                         </select>
//                      </div>`
//           document.getElementById('formArea').innerHTML +=selectbox ;  
// }


    </script>
    



    



<!-- footer start-->
<?php include("../include/footer.php");?>

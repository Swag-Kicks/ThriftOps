<?php  
session_Start();
?>
<?php include ("../include/header.php"); ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>
<?php

   function get_status()
   {
       $statues = array('Select'=>NULL,'All'=>'1','Active'=>'active','Draft'=>'draft','Archive'=>'archive');
       $options = '';
       foreach($statues as $k => $statues) //while(list($k,$v)=$statues))
       {
           if($options==$k)
           {
               $options.='<option value="'.$statues.'">'.$k.'</option>';
           }
           else
           {
               $options.='<option value="'.$statues.'">'.$k.'</option>';
           }
           
   
       }
       return $options;
   }
   
   
   include_once("../include/mysql_connection.php"); 
   
   error_reporting(0);
   ?>

<script>
   $(document).ready(function() {
       $('#location').change(function() {
           var ven_id = $('#location').val();
           $('#Lot').empty();
           $.get('load_data_ven.php', {
               'ven_id': ven_id
           }, function(return_data) {
               $("#Lot").append("<option value='" + '' + "'>" + 'All' + "</option>");
               $.each(return_data.data, function(key, value) {
                   
                   $("#Lot").append("<option value='" + value.id + "'>" + value.Lot_Number + "</option>");
               });
           }, "json");
       });
   });
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>
<!-- Page Sidebar Ends-->
<div class="page-body">
   <div class="container-fluid">
      <div class"card-body"
      <div class="row">
         <div class="col-sm-12">
           <div class="card">
                <div class="card-body">
               <div class="table-filter">
                  <div class="row">
                     <div class="col-md-6 p-15">
                        <h3 class="m-0">All Products</h3>
                     </div>
                     <div class="col-md-6 p-15">
                        <!--<input type="button" name="pick" value="🗘Refresh List" id="refresh" class="btn btn-primary"/>	
                        -->
                        <a href="#" name="pick" class="btn btn-primary f-right" id="refresh"><i class="material-icons"></i> <span style="position: relative; bottom: 8px;">Refresh List</span></a>
                        <a href="#" class="btn btn-info f-right" id="excel"><i class="material-icons"></i> <span style="position: relative; bottom: 8px;">Export to Excel</span></a>
                     </div>
                  </div>
                  <a href="#editEmployeeModal" data-toggle="modal" id="modelshow" style="display:none;">SHOWMODEL</a>
                  <div class="row">
                     <div class="col-sm-3">
                        <div class="show-entries">
                           <span>Show</span>
                           <select id="limit" class="form-control" >
                              <option selected>10</option>
                              <option>20</option>
                              <option>50</option>
                              <option>100</option>
                              <option>500</option>
                              <option>All</option>
                           </select>
                           <span>entries</span>
                        </div>
                     </div>
                     <div class="col-sm-9">
                        <div class="filter-group">
                           <form method="get" action="/search" id="searchbox5">
                              <input id="search51" name="q" type="text" size="40" placeholder="Search..." />
                           </form>
                        </div>
                        <div class="filter-group" >
                           <label>Vendors</label>
                           <!--<select id="select-location" class="form-control">-->
                           <!--  <option>All</option>-->
                           <!--  <option>Multan</option>-->
                           <!--  <option>Karachi</option>-->
                           <!--  <option>Lahore</option>-->
                           <!--  <option>Hyderabad</option>-->
                           <!--  <option>islamabad</option>                -->
                           <!--</select>-->
                           <!--<input class="form-control" list="select-location" id="location" required style="padding: 4px !important;" placeholder="Select Vendor">-->
                           <!--<input class="form-control" list="select-location" id="location" required style="padding: 11px !important;width: 80px;" placeholder="Select Vendor">-->
                           <!--<datalist id='select-location'>-->
                           <select id='location' class="form-control form-control-primary btn-square">
                              <option disable selected value="">Select</option>
                              <?php
                                 $records = mysqli_query($mysql, "SELECT * FROM `vendor`"); 
                                 while($data = mysqli_fetch_array($records))
                                 {
                                     echo "<option value='". $data['Vendor_ID'] ."'>" .$data['Vendor_Name'] ."</option>";
                                 }   
                                 ?> 
                           </select>
                           <div class="filter-group">
                              <select required="required" class="form-control"  name="Lot" id="Lot">
                                 <option disabled selected value="">Auto Fetch</option>
                              </select>
                           </div>
                        </div>
                        <div class="filter-group">
                           <label>Status</label>
                           <select id="status" class="form-control">
                              <!--<option selected disabled>All</option>-->
                              <?php echo get_status(); ?>
                           </select>
                        </div>
                        <!--<span class="filter-icon"><i class="fa fa-filter"></i></span>-->
                     </div>
                  </div>
               </div>
               <div class="table-responsive" id="dynamic_content">
               </div>
            </div>
           </div>
         </div>
      </div>
   </div>
</div>

 <div id="editEmployeeModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                            <div class="modal-content">
         
            <div class="modal-header">
                        <button  class="btn btn-primary pull-right" onclick="updateDesc(pushDesc)">Update</button>
               <h4 class="modal-title">Edit Product</h4>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 row">
                     <div class="col-sm-6">
               <div class="form-group">
                  <label>Title</label>
                  <input type="text"  name="title" id="title" class="form-control" >
               </div>
               </div>
                <div class="col-sm-6">
               <div class="form-group">
                  <label>Condition</label>
                         <select class="form-control form-select" id="condition" name="condition" onchange="editDesc()" >
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
               
                   <div class="col-sm-12 row">
                     <div class="col-sm-6">
               <div class="form-group">
                  <label>Size</label>
                  <input type="text"  onchange="editDesc()" name="size" class="form-control">
               </div>
               </div>
                <div class="col-sm-6">
               <div class="form-group">
                  <label>Brand</label>
                  <input type="text" onchange="editDesc()" name="brand"  class="form-control">
               </div>
               </div>
               </div>
               
                   <div class="col-sm-12 row">
                     <div class="col-sm-6">
               <div class="form-group">
                  <label>Made In</label>
                  <input type="text" onchange="editDesc()" name="made" class="form-control">
               </div>
               </div>
                <div class="col-sm-6">
               <div class="form-group">
                  <label>Color</label>
                  <input type="text" onchange="editDesc()" name="color" class="form-control">
               </div>
               </div>
               </div>
                  <input type="text"  name="sid" id="sid" disabled >
                  
                  <!--<textarea type="text" onchange="editDesc()" id="descEdit" name="descEdit" >-->
                   <div class="col-sm-12 row">
                     <div class="col-sm-6">
               <div class="form-group">
                  <label>Gender</label>
            <select class="form-control form-select borderdark " onchange="editDesc()" name="gender">
                                                   <option value=" ">Select Gender</option>
                                                   <option value="Male">Male</option>
                                                   <option value="Female">Female</option>
                                                
                                                </select>
               </div>
               </div>
                <div class="col-sm-6">
               <div class="form-group">
                  <label>Material</label>
                  <input type="text" onchange="editDesc()" name="material"  class="form-control">
               </div>
               </div>
               </div>
               
               
                <div class="col-sm-12 row">
                 <div class="col-sm-6">
               <div class="form-group">
                  <label>Product Code</label>
                  <input type="text" onchange="editDesc()" name="Pcode" class="form-control">
               </div>
               </div>
                 <div class="col-sm-6">
               <div class="form-group">
                  <label>SKU</label>
                  <input type="text" onchange="editDesc()" id="sku" name="sku" class="form-control">
               </div>
               </div>
               
               
               </div>
               
                 <div class="col-sm-12" id="mainBody">
              
               </div>
               </div>
               </div>
             
               
        
            </div>
                      </div>
                    </div>



<!-- Container-fluid Ends-->
</div>
<!-- footer start-->

</div>
<script>
  let theEditor;

ClassicEditor
  .create(document.querySelector('#editor1'))
  .then(editor => {
    theEditor = editor;

  })
  .catch(error => {
    console.error(error);
  });


function getDataFromTheEditor() {
  return theEditor.getData();
}

document.getElementById('getdata').addEventListener('click', () => {
  alert(getDataFromTheEditor());
});
</script> 
<script>
   $(document).ready(function(){
       
       
   
     load_data(1);
     
   
     function load_data(page, query = '', limit, status, vendor, lot)
     {
       $.ajax({
         url:"fetch.php",
         method:"POST",
         data:{page:page, query:query, limit:limit, status:status, vendor:vendor, lot:lot},
         success:function(data)
         {
           $('#dynamic_content').html(data);
         }
       });
     }
     
   
     
      $(document).on('click', '#close', function()
     {
         // var editorText = CKEDITOR.instances.editor1.setData('');
         // $('#txt1').val('');
         // $('#txt2').val('');
         // $('#trackingDiv').html(editorText);
         // $('#txt3').val('');
         // $('#txt4').val('');
         // $('#txt5').val('');
     });
     
     $(document).on('click', '.page-link', function()
     {
       var vendor = document.getElementById("location").value;
       var lot = document.getElementById("Lot").value;
       var limit = document.getElementById("limit").value;
       var status = document.getElementById("status").value;
    var page = $(this).data('page_number');
       var query = $('#search_box').val();
       load_data(page, query, limit,status,vendor,lot);
       
     });
   
   //for limit
   $(document).on('click', '#limit', function()
   {
    var lot = document.getElementById("Lot").value;
    var vendor = document.getElementById("location").value;
    var limit = document.getElementById("limit").value;
    var page = $(this).data('page_number');
       var query = $('#search_box').val();
       var status = document.getElementById("status").value;
       load_data(page, query, limit, status, vendor, lot);
     });
     
     
     //vendor
     $(document).on('click', '#location', function()
   {
    var vendor = document.getElementById("location").value; 
    var status = document.getElementById("status").value;
    var limit = document.getElementById("limit").value;
    var page = $(this).data('page_number');
    var query = $('#search_box').val();
       load_data(page,query,limit,status,vendor);
     });
     
     //lot
     $(document).on('click', '#Lot', function()
   {
    var lot = document.getElementById("Lot").value;
    var vendor = document.getElementById("location").value;
    var status = document.getElementById("status").value;
    var limit = document.getElementById("limit").value;
    var page = $(this).data('page_number');
    var query = $('#search_box').val();
       load_data(page,query,limit,status,vendor,lot);
     });
     
     $(document).on('click', '#allcb', function()
     {
   $('[name="cb[]"]').prop('checked', this.checked);
   });
   
     $('#search51').keyup(function()
     {
       var query = $('#search51').val();
       load_data(1, query,1);
     });
     
     //active:draft
     $(document).on('click', '#status', function()
   {
    var lot = document.getElementById("Lot").value;
    var vendor = document.getElementById("location").value;
    var status = document.getElementById("status").value;
    var limit = document.getElementById("limit").value;
    var page = $(this).data('page_number');
    var query = $('#search_box').val();
       load_data(page,query,limit,status,vendor,lot);
     });
     
      $(document).on('click', '#refresh', function(){
        
         toastr.info('Refreshed');
         load_data(1);
     });
     
     
     $(document).on('click', '#excel', function()
     {
         var excel_data = $('#tbody').html();
         $("table").tableToCSV();
          
     }); 
   
   });
</script>
<script>
   $(document).ready(function(){
       $(document).on('click', '#get', function()
       {
           // var shop = document.getElementById("shopify").value;
           var shop = $('#shopify').val();
           // var shop=document.getElementById('shopify').innerText; 
           alert(shop);
               // $.get('single.php', {
               //         'shop': shop
               //     }, function(return_data) 
               //     {
               //         var title =return_data.data.title;
               //         var desc =return_data.data.body_html;
               //         var sku =return_data.data.variants[0].sku;
               //         var price =return_data.data.variants[0].price;
               //         var stas =return_data.data.status;
               //         var Invetory =return_data.data.variants[0].inventory_quantity;
               //         var editorText = CKEDITOR.instances.editor1.setData(desc);
                       
                       
               //         $('#txt1').val(title);
               //         $('#txt2').val(stas);
               //         $('#trackingDiv').html(editorText);
               //         $('#txt3').val(price);
               //         $('#txt4').val(sku);
               //         $('#txt5').val(Invetory);
                       
               //         // $.each(return_data.data, function(key, value) {
               //         //     alert(value.title);
                           
               //         //     // $("#Lot").append("<option value='" + value.id + "'>" + value.Lot_Number + "</option>");
               //         // });
               //     }, "json");
       });
   });
   
  
   
   function editDesc() {
       
     var title = $("input[name=title]").val();
     var size = $("input[name=size]").val();
     var color = $("input[name=color]").val();
      var material = $("input[name=material]").val();
       var sku = $("input[name=sku]").val();
         var brand = $("input[name=brand]").val();
          var gender = $("select[name=gender]").val();
           var condition = $("select[name=condition]").val();
            var made = $("input[name=made]").val();
             var Pcode = $("input[name=Pcode]").val();
              var sid = $("input[name=sid]").val();
             
             
             var Cond = ( condition == "9/10") ? "Product with very little sign of use." : ( condition == "8/10") ? "Product with sign of use but not very clear." :  ( condition == "7/10") ? "Product with some visible signs of wear." :( condition == "10/10") ? "Product with no sign of use." : "Product that is not used before.";
   
   var descEdit =
   `     <div class="description" style="
    background: #f6f6f6;
    padding: 30px;
    max-width: 100%;">
    <h2 class="items">Item Details</h2>
    <div>
    	<ul class="list-disc desc-items" style="column-count: 2;">
    		<li style="margin-bottom: 5px;">Size: ${size}</li>
    		<li style="margin-bottom: 5px;">Product code: ${Pcode}</li>
    		<li style="margin-bottom: 5px;">Color: ${color}</li>
    		<li style="margin-bottom: 5px;">Material: ${material}</li>
    		<li style="margin-bottom: 5px;">Condition: ${condition}</li>
    		<li style="margin-bottom: 5px;">Sku: ${sku}</li>
    		<li style="margin-bottom: 5px;">Brand: ${brand}</li>
    		<li style="margin-bottom: 5px;">Gender: ${gender}</li>
    	</ul>
    	
    </div>
 <div class="descrip-cond">
 	<h2 class="condition">Condition</h2>
 	<ul class="list-disc cond-desc">
     		<li>${Cond}</li>
 	</ul>
 </div>
 <div class="descrip-same">
 	<h2 class="condition">Product Details</h2>
 	<ul class="list-disc cond-desc">
 	    <li style="margin-bottom: 5px;">Gender: ${gender}</li>
 		<li style="margin-bottom: 5px;">Made in ${made}</li>
    	<li style="margin-bottom: 5px;">For further assurance of originality, Google the product code referenced ${Pcode}</li>
    	<li style="margin-bottom: 5px;">All items sold are personally examined by SWAG KICKS Team for Originality & Quality</li>
    	<li style="margin-bottom: 5px;">Not a Fake/ Not a First Copy/ Not a Replica</li>
    	<li style="margin-bottom: 5px;">Imported from USA</li>
    	<li style="margin-bottom: 5px;">Pre-Owned & Pre-Used</li>
 	</ul>
 </div>
</div>`

 document.getElementById('mainBody').innerHTML = descEdit;
 
 pushDesc = descEdit;
  
 

 

}
 var pushDesc = ""
 
  

    function updateDesc(value){
        var sid = $("input[name=sid]").val();
 
    console.log("NEW",sid)
        var form = new FormData();
        form.append("desc", pushDesc);
var settings = {
  "url": "https://backup.thriftops.com/All_Product/updateDesc.php?pid="+sid,
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {

       alert("UPDATED")
       console.log(response)
      console.log(pushDesc)
});
   
        
    }
</script>





<!--https://www.swag-kicks.com/pages/condition-guide-->
<?php include ("../include/footer.php"); ?>

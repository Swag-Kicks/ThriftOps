<?php  
session_Start();
?>
<?php include ("../include/header.php"); ?>
<?php include_once("../include/mysql_connection.php");  ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer></script>
<script src="https://underscorejs.org/underscore-umd-min.js"></script>






<!-- Page Body Start-->

<!--<div class="page-body-wrapper horizontal-menu">-->
<!-- Page Sidebar Ends-->
<div class="page-body">
   <div class="container-fluid">
      <div class="page-header">
         <div class="row mt-3">
          <div class="col-md-8 d-flex">
              
            <a href="#" onclick="history.back()"><i class="fa fa-arrow-left arrow235" ></i> </a>&nbsp;&nbsp;&nbsp;&nbsp;<h3 class=" modal-title" id="mainHeading"></h3>
               
            </div>
            <div class="col-md-4">
            
             <!--    <a href="Create"  name="pick"  class="btn btn-primary-light mleft arrow f-right" ><i class="fa fa-angle-right"></i></a>-->
             <!--<a href="Create"  name="pick"  class="btn btn-primary-light mleft arrow f-right" ><i class="fa fa-angle-left"></i></a>-->
             <a href="Create"  name="pick"  id="addorder" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" class="btn btn-primary-light m-l-15 f-right" >Add Rack</a>
              <select class="form-select w-50 f-right" id="SelectW" onchange="changeWarehouse()">
                                  
                                  
                            </select>
         </div>
        
         <!--=IF(A2="*WP-S*", "Sneakers", IF(A2="*SK-SN*", "Sandals", IF(A2="*SK-BG*", "BAGS", IF(A2="*SK-TS*", "TSHIRTS", ""))))-->
        </div>
      </div>
   </div>
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="row project-cards">
         <div class="col-md-12 project-list">
           
         </div>
         <div class="col-sm-12">
            <div class="card">
               <div class="table-responsive">
                  
                <div class="">
       <div class="row" style="background-color:#F9FCFF;margin:0.8px;height:100px;">
                <div class="col-md-6 " style="margin-top:34px;">
              <!--<ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">-->
              <!--        <li class="nav-item"><a class="nav-link active" id="all_ord" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true">All<span id="allb"></span></a></li>-->
              <!--        <li class="nav-item"><a class="nav-link" id="conf_ord" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false">Unbooked<span id="unbookedb"></span></a></li>-->
              <!--        <li class="nav-item"><a class="nav-link" id="dis_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Dispatched <span id="dispatchedb"></span> </a></li>-->
              <!--        <li class="nav-item"><a class="nav-link" id="ins_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">InTransit<span id="intransitb"></span> </a></li>-->
              <!--        <li class="nav-item"><a class="nav-link" id="del_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Delivered<span id="deliveredb"></span> </a></li>-->
              <!--        <li class="nav-item"><a class="nav-link" id="ret_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Returned<span id="returnedb"></span></a></li>-->
              <!--        <li class="nav-item"><a class="nav-link" id="loss_ord" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Conflict/Lost<span id="lostb"></span></a></li>-->

                  
                
              <!--      </ul>-->
                </div>
                <div class="col-md-6 p-r-20" style="margin-top:30px;">
                    
          
                  <div class="bookmark">
                      
                    <ul>
                            <!--<li>-->
                            <!--    <select class="form-select">-->
                            <!--      <option selected>Bulk Action</option>-->
                            <!--      <option>Change Allocation Status</option>-->
                            <!--      <option>Change Status</option>-->
                                  
                            <!--</select>-->
                            <!--</li>-->
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" id="manual" class="btn btn-primary">Allocate</a></li>
                            <li><button class="dropbtn" onclick="window.location.reload();"><i class="icon-reload" id="ref"></i></button></li>

                              <li><div class="dropdown" >
                            <button class="dropbtn" onmouseover="JSDropDown()"><i class="fa fa-sliders"></i></button>
                            <div class="dropdown-content">
                            <a  style=" background-color: #e0e3ec; "><b>Show Rows</b></a>
                            
                             <select id="limit" class="form-control">
                                  <option value="10">10</option>
                                  <option value="20">20</option>
                                  <option value="50">50</option>
                                  <option value="100">100</option>
                                  <option value="500">500</option>
                                  <option value="-1">All</option>
                            </select>
                            <a  style=" background-color: #e0e3ec; "><b>Sort By Order Date</b></a>
                             <select id="sort" class="form-control">
                                  <option>DESC</option>
                                  <option>ASC</option>
                           </select>
                          </div>
                        </div>
                        </li>
                            <li><button class="dropbtn"><i class="icon-import" id="excel" onclick="fnExcelReport();"></i></button></li>
                          
                            
                            
                    
                    </ul>
                   
                  </div>
                  
                </div>
              </div>
              
        <div class="dataTables_scrollHeadInner" style="box-sizing: content-box; width: 1787.12px; padding-right: 0px;">
            
        <table id="example" class="dataTable no-footer css-serial"  role="grid" style="margin-left: 0px; width: 1787.12px;">
              <thead>
    
          <tr id="test" style="background-color:#E0E3EC;" role="row">
        
               <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Sno
            	<br>
            	<input id="ordernum" type="text" style="visibility: hidden;" >
            </th>
          <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1"  aria-sort="ascending" >Racks
            	<br>
            	<input id="search" type="text" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Product Type
            	<br>
            	<input id="search2" type="text">
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Space Available
            	<br>
            	<input id="city" type="text" style="visibility: hidden;" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Capacity
            	<br>
            	<input id="items" type="text" style="visibility: hidden;" >
            </th>
            <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Status
            	<br>
            	<select class="form" id="search3">
                    <option disabled selected></option>
                    <option value="Empty">Empty</option>
                    <option value="Filled">Filled</option>
                   
                </select>
            </th>
             <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Auto Allocation 
            	<br>
            	<input id="tracking" type="text" >
            </th>
             <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Created Date
            	<br>
                <input id="items" type="text"  >
            </th>
          
           
             <th class="res" tabindex="0" aria-controls="example" rowspan="1" colspan="1">
            <th></th>
            </tr>    
            </thead>
            <tbody id="table_body">
                
            </tbody>
            </table>
            
             <div id="pagination"></div>
            </div>
                </div>
                
                <div class="table-responsive" id="dynamic_content"></div>
                
               <!--rackadd modal start    -->
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Add Rack</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                                <div class="card-body cardshadow">
                                          <div class="col-sm-12 row">
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Warehouse*</label>
                                                          <input class="form-control  " type="text" name="warehouse" placeholder="Enter Warehouse" disabled>
                                                            <input class="form-control  " type="text" name="wID" placeholder="Enter Warehouse" disabled style="display:none">
                                                   </div>
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Rack Number*</label>
                                                          <input class="form-control " type="number" name="numberR"   aria-describedby="emailHelp" placeholder="Enter Rack Number">
                                                   </div>
                                               </div>
                                               
                                                  <div class="col-sm-12 row">
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Columns*</label>
                                                          <input class="form-control "  name="column"  minlength="1" maxlength="2"  onkeyup="creategrid();"  onkeypress="return isNumberKey(event);"   id="column"  creategrid()  placeholder="Enter Column">
                                                   </div>
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Rows*</label>
                                                          <input class="form-control " type="text" name="row"  id="row"  minlength="1" maxlength="2" onkeyup="creategrid();"  onkeypress="return isNumberKey(event);"   aria-describedby="emailHelp" placeholder="Enter Row">
                                                   </div>
                                               </div>
                                               
                                                  <div class="col-sm-12 row">
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Layers</label>
                                                          <input class="form-control " type="number" name="layer" value="0" id="layers"   placeholder="Enter Layers">
                                                   </div>
                                                   <div class="col-sm-6">
                                                            <label class="col-form-label pt-0" >Category*</label>
                                                          <Select class="form-control " type="text" name="Category" id="SelectC"   aria-describedby="emailHelp" placeholder="Enter Made in"> 
                                                          
                                                          </Select>
                                                   </div>
                                               </div>
                                    </div>
                             
                                     <div class="card-body cardshadow">
                                           <div id="container" class="container Conrack"></div> 
                                         </div>
                              
                              <br/>
                                 <button onclick="addRacks()" class="btn btn-primary-light m-l-15 f-right">Add</button>
                             
                          </div>
                             
                        </div>
                      
                      </div>
                    </div>
                       <!--rackadd modal end    -->
                       
                       
                       
                        <!--manual allocation-->
                <div id="manualadd" class="modal fade" role="dialog">
                   <div class="modal-dialog modal-lg modal-dialog-centered cstm-pop">
                     <div class="modal-content">
                       <div class="modal-header p-t-20">
                             <div class="col-md-8 p-l-15">
                          <h3 class="modal-title">Manual Allocation</h3>
                          </div>
                          
                         <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                       </div>
                       <div class="row">
                           <br>
                                 <div class="col-md-3 m-b-10">&nbsp;&nbsp;&nbsp;
                                     <label id="prshow">&nbsp;&nbsp;&nbsp;<b></b></label>
                                 </div>
                                 <div class="col-md-3 ">
                                     
                                 </div>
                                 <div class="col-md-3 ">
                                     
                                 </div>
                                 <div class="col-md-3  ">
                                    
                                 </div>
                                 
                             </div>
                       <div class="modal-body">
                            <div class="px-2">
                                <div class="mleft"><h5>Details</h5></div>
                                
                                <div class="col-sm-12 row p-4">
                                             <div class="mb-3 col-sm-6">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">SKU*</label>
                                                <input class="form-control" type="text" name="msku" id="msku" aria-describedby="emailHelp">
                                             </div>
                                            
                                              <div class="mb-3 col-sm-6">
                                                <label class="col-form-label pt-0" for="exampleInputEmail1">Category*</label>
                                               <select class="form-control form-select form-control-success btn-square f-left drpdncss btn-square m-b-10" id="mcat" required>
                                              <option disabled selected value=''>Select Category</option>";
                                                    <?php 
                                                    $records = mysqli_query($mysql, "SELECT * FROM `Category`");                              
                                                    while($data = mysqli_fetch_array($records))
                                                    {
                                                        echo "<option value='". $data['Category_ID'] ."'>" .$data['Name'] ."</option>";
                                                       
                                                    
                                                    }
                                                      ?>              
                                                
                                                </select>
                                             </div>       
                                              
                         
                       </div>
                            </div>
                        <br>
                      
                       <div class="modal-footer">
                         <button type="button" class="btn btn-outline-primary pull-left" id="modclear" data-bs-dismiss="modal">Close</button>
                            <a href="#" data-role="conf_save" id="manadd" class="btn btn-md btn-primary ref  f-right" style="padding: 6px 24px;" >Add</a>
                       </div>
                     </div>
                   
      </div>
   </div>
   
         </div>
               <!--manual allocation-->
            
      </div>
   </div>
   
   <!-- Container-fluid Ends-->
   
</div>

        
        <style>
.tablet {
  border: 1px solid black;
  table-layout: fixed;
  width: 100%;

}

th,
.tdd {
  width: 50px;
  overflow: hidden;
}
hr{
    background-color:grey;
    width:100%;
}

</style>

        
        <style>
               .cardshadow{
                    box-shadow: 0px 3px 5px rgba(9, 30, 66, 0.2), 0px 0px 1px rgba(9, 30, 66, 0.31);
                }
                
                .inputblack{
                 border:1px solid grey;   
                    
                }
        </style>
        
        
        
<script>
 $(document).ready(function()
 {
        $(document).on('click', '#manual', function(){
             $('#manualadd').modal('toggle');
        });
         $(document).on('click', '#manadd', function()
         {
             console.log("n");
            var sku = document.getElementById("msku").value;
            var cat = document.getElementById("mcat").value;
            var war= $("input[name=wID]").val();
            $.ajax({  
                url:"api/manualallo.php",  
                method:"POST",  
                data:{sku:sku,war:war,cat:cat}, 
                success:function(data)
                { 
                    if(data == 0)
                    {
                        toastr.error('Something Went Wrong!');
                    }
                    if(data == 1)
                    {
                        $('#manualadd').modal('toggle');
                        toastr.success('Allocated Successfully');
                    }
                    
                }
            });
             
        });
        
 }); 
        
      
        
  function CategoryChange(){
        
        var settings = {
      "url": "https://sys.thriftops.com/ShopifyPush/api/getCat.php",
      "method": "POST",
      "timeout": 0,
    };
    
    $.ajax(settings).done(function (response) {
      var data = JSON.parse(response);
      
      
    
    
      for (var i = 0; i < data.length; i++) {
    
           
        var select = document.getElementById("SelectC");
        var option = document.createElement("option");
        option.text = data[i].Name;
        option.value = data[i].Category_ID;
        select.add(option);
       
    }
    });
        
    }
    
    
    const myTimeout1 = setTimeout( CategoryChange(), 500);
    
    
      function Warehouse(){
        
        var settings = {
      "url": "https://sys.thriftops.com/Warehouse/api/warehouse.php",
      "method": "POST",
      "timeout": 0,
    };
    
    $.ajax(settings).done(function (response) {
      var data = JSON.parse(response);
      
      
    
    
      for (var i = 0; i < data.length; i++) {
    
           
        var select = document.getElementById("SelectW");
        var option = document.createElement("option");
        option.text = data[i].Location;
        option.value = data[i].Warehouse_ID;
        select.add(option);
       
    }
    });
        
    }
    
    
    const myTimeout2 = setTimeout( Warehouse(), 500);
    
    
    const changeWarehouse = () =>{
        
       
       var warehouse = $('#SelectW').find(":selected").text();
        var warehouse2 = $('#SelectW').find(":selected").val();
       $("input[name=warehouse]").val(warehouse);
        $("input[name=wID]").val(warehouse2);
          document.getElementById('mainHeading').innerHTML  = warehouse + " Warehouse"
            
var settings = {
  "url": "https://sys.thriftops.com/Warehouse/api/getRacks.php?id="+warehouse2,
  "method": "GET",
  "timeout": 0,
};

$.ajax(settings).done(function (response) {
    
 
    
var countrn = []

  var rows = JSON.parse(response);
    console.log("rows",rows)

// Ensure that objects are always stringified
// with the keys in alphabetical order.
function replacer(key, value) {
    if (!_.isObject(value)) return value;
    var sortedKeys = _.keys(value).sort();
    return _.pick(value, sortedKeys);
}

// Create a modified JSON.stringify that always
// uses the above replacer.
var stringify = _.partial(JSON.stringify, _, replacer, null);

var deduped = _.uniq(rows, stringify);

console.log(deduped);

// console.log(result);

       let tableData = "";
       
                    deduped.forEach((values => {
                         var rn = values.number
                         
                         countrn.push(rn)
                        tableData += `
                        <tr>
                          
                             <td></td>
                           <td><a href="View_Allocation.php?id=${values.Warehouse_ID}&rn=${values.number}">RACK - ${values.number}</a></td>
                             <td>${values.product_cat}</td>
                              <td>${values.space}</td>
                                 <td>${values.cap}</td>
                                   <td>${values.Status}</td>
                                   <td>${values.Allocation}</td>
                                     <td>${values.DateTime}</td>
                                     
                        </tr > `;

                    }))
                    document.getElementById("table_body").
                        innerHTML = tableData;
                        




  
});


       
       
      
        
    }
    
    

        
      
        function creategrid(){
             var layers = document.getElementById('layers').value;
            var row = document.getElementById('row').value;
            var column = document.getElementById('column').value;
            if(row == '' || row == 'null' ){
                // alert('Enter row value');
            }
            if(column == '' || column == 'null' ){
                //alert('Enter column value');
            }
            var output = '<div >'+'<table border="1"  class="tablet">'
            function createTable(row, column){
                for(var i = 1; i <= row; i++){
                    output += '<tr>'
                    for(var j = 1;j <= column; j++){
                        output += '<td class="tdd" style="border:1px solid black;"></td>'
                    }
                    output += '</tr>'
                }
                output += '</div>'+'</table>'
                document.getElementById('container').innerHTML=output;
            }   
            createTable(row,column); 
        };
        //Enter Only Numeric Value
        function isNumberKey(my_event){
          
            var charCode = (my_event.which) ? my_event.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                {
                    alert("Enter Only Numbers");
                    return false;
                }
            return true;
            
           
        }
        
        //Fetch Warehouse Details
        
        const fetchDetails = () =>{
var params = new window.URLSearchParams(window.location.search);
var gid = params.get('id');
            
            var settings = {
  "url": "https://sys.thriftops.com/Warehouse/api/singleWarehouse.php?id="+gid,
  "method": "POST",
  "timeout": 0,
};

$.ajax(settings).done(function (response) {
  
  var JRES = JSON.parse(response)
  console.log(JRES);
   document.getElementById('mainHeading').innerHTML = JRES[0].Location +" Warehouse"
   $("input[name=warehouse]").val( JRES[0].Location);
      $("input[name=wID]").val( JRES[0].Warehouse_ID);
 
});
            
            
            
        
        } 
        
  
 fetchDetails()
 
 
//  const paging = () =>{
    

// }

const fetchCapacity = (RackNo) =>{
    
    var settings = {
  "url": "https://sys.thriftops.com/Warehouse/api/countCapacity.php?id="+RackNo,
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  
};

$.ajax(settings).done(function (response) {
  
  
  var CapRES = JSON.parse(response)
  var theCapacity = CapRES[0].capacity
  
//   alert(theCapacity)
  
       var myClasses = document.getElementsByClassName("tdcapacity");

if(myClasses.innerHTML = RackNo){

for (var i = 0; i < myClasses.length; i++) {
  myClasses[i].innerHTML = theCapacity;
  }

}
    
  
  
  

  
  
  
});
}

//   const changeCap = (theVal) =>{
     
     
 
     
     
//  }




 
// const fetchTable = () =>{
    
//     var params = new window.URLSearchParams(window.location.search);
// var gid = params.get('id');
    
    
// var settings = {
//   "url": "https://sys.thriftops.com/Warehouse/api/getRacks.php?id="+gid,
//   "method": "GET",
//   "timeout": 0,
// };

// $.ajax(settings).done(function (response) {
    
 
    
// var countrn = []

//   var rows = JSON.parse(response);
//     console.log("rows",rows)

// // Ensure that objects are always stringified
// // with the keys in alphabetical order.
// function replacer(key, value) {
//     if (!_.isObject(value)) return value;
//     var sortedKeys = _.keys(value).sort();
//     return _.pick(value, sortedKeys);
// }

// // Create a modified JSON.stringify that always
// // uses the above replacer.
// var stringify = _.partial(JSON.stringify, _, replacer, null);

// var deduped = _.uniq(rows, stringify);

// console.log(deduped);

// // console.log(result);

//       let tableData = "";
       
//                     deduped.forEach((values => {
//                          var rn = values.number
                         
//                          countrn.push(rn)
//                         tableData += `
//                         <tr>
                          
//                              <td></td>
//                           <td><a href="View_Allocation.php?id=${values.Warehouse_ID}&rn=${values.number}">RACK-${values.number}</a></td>
//                              <td>${values.product_cat}</td>
//                               <td>${values.space}</td>
//                                  <td>${values.cap}</td>
//                                   <td>${values.Status}</td>
//                                   <td>${values.Allocation}</td>
//                                      <td>${values.DateTime}</td>
//                                      <td><div class="btn-group dropstart" style=" background: url(https://sys.thriftops.com/assets/images/icons/kebabmenu.png) no-repeat; background-position: left 34px top 50%;">
//   <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
  
//   </button>
//   <ul class="dropdown-menu">
//     <li><a  class="dropdown-item" href="View_Allocation.php?id=${values.Warehouse_ID}&rn=${values.number}" style="text-align:center"><b>View</b></a></li>
//     <li><a class="dropdown-item" href="#" style="text-align:center"><b>Edit</b></a></li>
    
//   </ul>
// </div> </td>
                                     
//                         </tr > `;

//                     }))
//                     document.getElementById("table_body").
//                         innerHTML = tableData;
                        




  
// });


 




// }




//fetchTable()

const addRacks = () =>{
    
    var wID = $("input[name=wID]").val();
    var category = $("select[name=Category]").val();
      var Rnumber = $("input[name=numberR]").val();
    
    
    // alert(wID)
    var rackArray = []
    
     var row = $("input[name=row]").val();
      var col = $("input[name=column]").val();
     var layer = $("input[name=layer]").val();
    
    if(layer == 0){
        for(var r = 1; r <= row; r++){
          
         
            for(var c = 1; c <= col; c++){
              var currentRack = "R"+r+"-"+"C"+c
                 
                 rackArray.push(currentRack)
                
            }
      }
    }else{
              for(var r = 1; r <= row; r++){
          
         
            for(var c = 1; c <= col; c++){
                
                 for(var l = 1; l <= layer; l++){
              var currentRack = "R"+r+"-"+"C"+c+"-"+"L"+l
                 
                 rackArray.push(currentRack)
                 }
                
            }
      }
    }
    console.log(rackArray)
    
var form = new FormData();
form.append("rackArray", JSON.stringify(rackArray));
form.append("wID", wID);
form.append("category", category);
form.append("Rnumber", Rnumber);


var settings = {
  "url": "https://sys.thriftops.com/Warehouse/api/addRack.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
  //console.log(response);
  toastr.success("RACK ADDED")
});
    
    
    
    
    
    
    
    
    
     
     //console.log("row =",row , "col=",col,"layer=",layer)
}


// Search

$("#search").on("keyup", function() {
    var value = 'RACK-'+ $(this).val();

    $("table tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td:nth-child(2)").text();
            
            // console.log(id)

            if (id.indexOf(value) !== 0) {
                $row.hide();
            }
            else {
                $row.show();
            }
        }
    });
});

$("#search2").on("keyup", function() {
    var value = $(this).val();

    $("table tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td:nth-child(3)").text();
            
            // console.log(id)

            if (id.indexOf(value) !== 0) {
                $row.hide();
            }
            else {
                $row.show();
            }
        }
    });
});

$("#search3").on("change", function() {
    var value = $(this).val();

    $("table tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td:nth-child(6)").text();
            
            // console.log(id)

            if (id.indexOf(value) !== 0) {
                $row.hide();
            }
            else {
                $row.show();
            }
        }
    });
});


function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'> <th>Sno</th> <th>Racks</th><th>Product Type</th><th>Space Available</th><th>Capacity</th><th>Status</th><th>Auto Allocation</th><th>Created Date</th></tr>";
    var textRange; var j=0;
    tab = document.getElementById('table_body'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true);
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}


const kebabmenu = () =>{
    
    
    
    
}




</script>



<style>
   

td{
    text-align:center;
}
</style>
<!--WASAY CUSTOM CODE PAGINATIOIN WITHOUT DATATABLES-->

<script>



$(document).ready(function() {

$.fn.dataTable.ext.errMode = 'none';


  load_data(1);
    var t=$("#example").DataTable
    ({
        searching: false,
        ordering: false,
        lengthChange: false,
        info: false,
        "columnDefs": [
    {
      "data": null,
      "defaultContent": "",
      "targets": -1
    }
  ],
   "language": {
      "emptyTable": "<img src='https://media.tenor.com/axAeNjNIUBsAAAAC/spinner-loading.gif' height='50' width='50' />"
    }
    });
  
    function load_data(page)
    {
        
        
 var params = new window.URLSearchParams(window.location.search);
 var gid = params.get('id');
    
        
        
      $.ajax({
        url:"https://sys.thriftops.com/Warehouse/api/getRacks.php?id="+gid,
        method:"POST",
        data:{page:page},
        success:function(data)
        {
            var response=JSON.parse(data);
            console.log("response",response)
            var fill=''; 
            for(var i=0; i<response.length; i++)
            {
                t.row.add([ [i+1] , "<a href='View_Allocation.php?id="+response[i].Warehouse_ID+"&rn="+response[i].number+"'>RACK-"+response[i].number+"</a>",response[i].product_cat,response[i].space,response[i].cap,response[i].Status,response[i].Allocation,response[i].DateTime ]).draw(false);
               
            }
            
         
        }
      
      });
      
      
      
      
      
    }






 });

</script>

<style>
    button {
  background-color: #fff;
  border: 1px solid #ddd;
  color: #333;
  cursor: pointer;
  padding: 5px 10px;
  margin-right: 5px;
}

button.active {
  background-color: red;
  border-color: crimson;
  color: #fff;
}
</style>

<script>
    document.getElementById('limit').addEventListener('change', function() {
  console.log('You selected: ', this.value);
  
  
  load_data(1,this.value)
     
    });      

  
      function load_data(page,limit)
    {
        var lim = parseInt(limit)
        
                
         var table = $('#example').DataTable();

//clear datatable
table.clear().draw();

//destroy datatable
table.destroy();
        
        
        
        
        
        
         var t=$("#example").DataTable
    ({
        searching: false,
        ordering: false,
        lengthChange: false,
        pageLength: lim,
        info: false,
        "columnDefs": [
    {
      "data": null,
      "defaultContent": "",
      "targets": -1
    }
  ],
   "language": {
      "emptyTable": "<img src='https://media.tenor.com/axAeNjNIUBsAAAAC/spinner-loading.gif' height='50' width='50' />"
    }
    });
        
 var params = new window.URLSearchParams(window.location.search);
 var gid = params.get('id');
    
        
        
      $.ajax({
        url:"https://sys.thriftops.com/Warehouse/api/getRacks.php?id="+gid,
        method:"POST",
        data:{page:page},
        success:function(data)
        {
            var response=JSON.parse(data);
            console.log("response",response)
            var fill=''; 
            for(var i=0; i<response.length; i++)
            {
                t.row.add([ [i+1] , "<a href='View_Allocation.php?id="+response[i].Warehouse_ID+"&rn="+response[i].number+"'>RACK-"+response[i].number+"</a>",response[i].product_cat,response[i].space,response[i].cap,response[i].Status,response[i].Allocation,response[i].DateTime ]).draw(false);
               
            }
            
         
        }
      
      });
      
      
      
      
      
    }
  
  
  
  //load_data2(1,this.value)
 



</script>

<!--//CODE ENDS-->
        
        
        
        
<?php include ("../include/footer.php"); ?>